<?php
namespace MailPoetVendor\Twig\Extension;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Twig\TwigFunction;
final class StringLoaderExtension extends AbstractExtension
{
 public function getFunctions()
 {
 return [new TwigFunction('template_from_string', '\\MailPoetVendor\\twig_template_from_string', ['needs_environment' => \true])];
 }
}
\class_alias('MailPoetVendor\\Twig\\Extension\\StringLoaderExtension', 'MailPoetVendor\\Twig_Extension_StringLoader');
namespace MailPoetVendor;
use MailPoetVendor\Twig\Environment;
use MailPoetVendor\Twig\TemplateWrapper;
function twig_template_from_string(Environment $env, $template, string $name = null)
{
 return $env->createTemplate((string) $template, $name);
}
