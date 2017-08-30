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
define('DB_NAME', 'dk_wp1');

/** MySQL database username */
define('DB_USER', 'dk_wp1');

/** MySQL database password */
define('DB_PASSWORD', 'D!mmak1090');

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
define('AUTH_KEY',         ']}/<H2(b;rKZ>fHhMT?4COTPg-BKND`SN&r1./Fg$K(/4<G.sJ/=YoVy$9G9Vdb=');
define('SECURE_AUTH_KEY',  'g_%c#oH~VkUNvNZ}vkuj$}pdMF`B!,;vYDVN2a(}i=A+%0Xy<^^;|a8Y*C+/`f] ');
define('LOGGED_IN_KEY',    '/V<>)bqUybVWAg/<#%^k6o5~1R<ZWtV&-YP$A*3_<5j9j/kHa=8B#L:vU*C`9Me/');
define('NONCE_KEY',        'eoBW=y{8p&I$5#&)6Lre 0t3BlWy|p:@{u+Z<nv!x^ H|t[1;QI(|CIhKEIxGpL(');
define('AUTH_SALT',        '0,^.m%Et%$s1rcmzTTll%wpOx-|a.fP&Vsy}n,^+h?@!WEiXRiC7%XzxrKEsszd}');
define('SECURE_AUTH_SALT', '3#S@:@4.jP$*Ap_k$|Ao79.3=#NRu;Hj<;?u|Y[xn#t9.vSi xG eAI&)f/k|2fC');
define('LOGGED_IN_SALT',   '_GW~(fw!A)I_L_VX(;9g8w}zaKPv<K[.9RM`&(,d>ASBYZsQp3SQT*qj/QS>A}9%');
define('NONCE_SALT',       '?Dbj3bM;9|RY@bkLInnEG`k&Tk3`RM|6~|x31||>|XK~ipt,OPwU}i$|HKE^gy|]');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'tcz_';

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
