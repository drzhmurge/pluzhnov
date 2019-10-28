<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ig.pluzhnov.ru532223');

/** MySQL database username */
define('DB_USER', 'u945476');

/** MySQL database password */
define('DB_PASSWORD', 'HhpeC4Gd7fUV');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'sKtOc*Ej!(SVk7#d2&9qyCjiD!PsNUhWyA^F2HsgeAO9Qr^zT3Yox)dX1tWhV5Od');
define('SECURE_AUTH_KEY',  'NL!L8b*Yo%&A#UJs6x2XU%al2syL3m!t^rWKnjbAvPmp2h#8WeJa!AsZn4b!tRuu');
define('LOGGED_IN_KEY',    'mlBRDCmXI(%c!&**zIG!oB37xDn7ule*RY6Cc1jn6^s%dI%KQ(ot(TTZPoOH%!ua');
define('NONCE_KEY',        'lYyMGJiVNMB5fs%a6qTVV5WPJQy)Lj4gZ)wDyb(zFcvFQm&pTgpfnAuAq9a3ljYz');
define('AUTH_SALT',        'CG!#J5xVgm8p4zwy2Xqz)5aGJUsM!HwJW!X6W%u*T7rgu)tMyA&WbWCMCZ!Zqm%&');
define('SECURE_AUTH_SALT', 'SF1&ofjzbMM6u8)WtLI9yhltRVvr#d&#zJHh5FHZnXk4V7BXJrZKk2TLo%MOYgeB');
define('LOGGED_IN_SALT',   'DF@fwDVHNceahR^8CNZj6QpytnHCWFLK!pvY^W9Q6wUAdBA9Lpp4WHsNm%7ZkiEq');
define('NONCE_SALT',       'MLJ1K8zKC^3@yOgJg#Yy^0MWiCTYWnRw)&SJmminTzp1l7L0DY!SiPxEIMvUN0cO');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define( 'WP_ALLOW_MULTISITE', true );

define ('FS_METHOD', 'direct');
