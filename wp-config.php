<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost:8889' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'lpCnw[jE)xjbyI>>,XE+kn1l8yR5uUVB9YobI/f.q[TJ+H@(eB7)odVS%m/r7Osl');
define('SECURE_AUTH_KEY',  'nB(w|Nnk_7t.[q5Osh_C{UV86OUjd}^](3h7<^N[y67iShw{[v)v[EZrSt$va]hJ');
define('LOGGED_IN_KEY',    'p)<b5=LY6>6+VY5F:o13s$P{oLc[@9|mt{(T{|rm}SgDqGIev#DI5T,PeRAb%|)p');
define('NONCE_KEY',        '6w8mqU+Ynab=gkd%PhF^0$G=NHbJBLy87cPTwJsFj,E]Zi(p[:gk)mk%t}Gv/4Yz');
define('AUTH_SALT',        'Bn:yxh4BW8<wL0G%omgX|<UnyaEqAcLC]A0jhZk3DXVO/bLg)r48e|R@UVnUyzWk');
define('SECURE_AUTH_SALT', 'z/:CSZ6Vx%kpXv.GIw)mqBj#W/A^sXbMPPPip^3H<IxK4oQ}FAUvC3bYwbPJzqW)');
define('LOGGED_IN_SALT',   '6lRQb^YO=^Y3fpllq5Csed<%5BFarcJT(bjKS7ZRyx^=IckyDmMi]_erAk<s(%{v');
define('NONCE_SALT',       'YQ6q+A8ryzr6%%a=jmiUl}}mSy=Av{w:%Xf^YIi/7|y4^|4ZhHu:,baH$aHqG4fD');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
