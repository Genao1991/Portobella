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
define('DB_NAME', 'portobella');

/** MySQL database username */
define('DB_USER', 'PortobellaUser');

/** MySQL database password */
define('DB_PASSWORD', 'portobellastore');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '2%0GC/?R$9-F|pGg)}J+h8/!8Bk^y[&X-$5lb:H-CN}GT9vG`F6:Cj8k@87}iE$C');
define('SECURE_AUTH_KEY',  ';UPP@#yQ[D_%ex{oVpnA6sHbf,q.hK,k+@yfBBk!x7XhghFa;Z-bj4LKG~ZiqWlW');
define('LOGGED_IN_KEY',    '%_o@~OU:~Z,Whh:L&Fg0(~%r_E%}D:jhpNN{x-osCGG/60FDi(<saJk7oLZ:cBsv');
define('NONCE_KEY',        '~3x)jP=4,:^$2}>0Dm3)NYBhfEJcv@.`?e=RW Fmi/zE..Z!>T0^EU?@2?&G$Nf[');
define('AUTH_SALT',        '?EK>$YBnZVLHW0mFuoM>qQB{QW=KkZb&2g5~6a^+p[.cznY$8FxQ!zCL#ythgR]a');
define('SECURE_AUTH_SALT', '=UD5yL<fI !fIQVL=g}Gx|!ej=>E:<.S1DV=`bwh)3d6Q`TbtM|v y3>ws*|05Q]');
define('LOGGED_IN_SALT',   'GFx0KGj v$d}WmMulOk<[nK&R>Z,pcs9?~R,,:C:l>Mb.z;OMe` 8(2x]_I|DMgh');
define('NONCE_SALT',       'LaZtGOI?<Sh/>6naAbXvu`5P5FNWS4L:u$cy~b]DUx4HR_mHV[Gfed(9{Q)lyac`');

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
