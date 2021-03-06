<?php
namespace MailPoetVendor;
if (!defined('ABSPATH')) exit;
class Swift_FileSpool extends Swift_ConfigurableSpool
{
 private $path;
 private $retryLimit = 10;
 public function __construct($path)
 {
 $this->path = $path;
 if (!\file_exists($this->path)) {
 if (!\mkdir($this->path, 0777, \true)) {
 throw new Swift_IoException(\sprintf('Unable to create path "%s".', $this->path));
 }
 }
 }
 public function isStarted()
 {
 return \true;
 }
 public function start()
 {
 }
 public function stop()
 {
 }
 public function setRetryLimit($limit)
 {
 $this->retryLimit = $limit;
 }
 public function queueMessage(Swift_Mime_SimpleMessage $message)
 {
 $ser = \serialize($message);
 $fileName = $this->path . '/' . $this->getRandomString(10);
 for ($i = 0; $i < $this->retryLimit; ++$i) {
 $fp = @\fopen($fileName . '.message', 'xb');
 if (\false !== $fp) {
 if (\false === \fwrite($fp, $ser)) {
 return \false;
 }
 return \fclose($fp);
 } else {
 $fileName .= $this->getRandomString(1);
 }
 }
 throw new Swift_IoException(\sprintf('Unable to create a file for enqueuing Message in "%s".', $this->path));
 }
 public function recover($timeout = 900)
 {
 foreach (new \DirectoryIterator($this->path) as $file) {
 $file = $file->getRealPath();
 if ('.message.sending' == \substr($file, -16)) {
 $lockedtime = \filectime($file);
 if (\time() - $lockedtime > $timeout) {
 \rename($file, \substr($file, 0, -8));
 }
 }
 }
 }
 public function flushQueue(Swift_Transport $transport, &$failedRecipients = null)
 {
 $directoryIterator = new \DirectoryIterator($this->path);
 if (!$transport->isStarted()) {
 foreach ($directoryIterator as $file) {
 if ('.message' == \substr($file->getRealPath(), -8)) {
 $transport->start();
 break;
 }
 }
 }
 $failedRecipients = (array) $failedRecipients;
 $count = 0;
 $time = \time();
 foreach ($directoryIterator as $file) {
 $file = $file->getRealPath();
 if ('.message' != \substr($file, -8)) {
 continue;
 }
 if (\rename($file, $file . '.sending')) {
 $message = \unserialize(\file_get_contents($file . '.sending'));
 $count += $transport->send($message, $failedRecipients);
 \unlink($file . '.sending');
 } else {
 continue;
 }
 if ($this->getMessageLimit() && $count >= $this->getMessageLimit()) {
 break;
 }
 if ($this->getTimeLimit() && \time() - $time >= $this->getTimeLimit()) {
 break;
 }
 }
 return $count;
 }
 protected function getRandomString($count)
 {
 // This string MUST stay FS safe, avoid special chars
 $base = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_-';
 $ret = '';
 $strlen = \strlen($base);
 for ($i = 0; $i < $count; ++$i) {
 $ret .= $base[\random_int(0, $strlen - 1)];
 }
 return $ret;
 }
}
