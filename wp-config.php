<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'drmed');

/** MySQL database username */
define('DB_USER', 'drmed');

/** MySQL database password */
define('DB_PASSWORD', 'rahsite');

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
define('AUTH_KEY',         'UwP0(>>hM8Ik*pqMTW9PvFL;xy3*TxIge)CUJ2tS__1XU`k_gyIQX]raG3s8Qx|+');
define('SECURE_AUTH_KEY',  'yX:0W{cArBN;.nN!p-IKbk9D8tP:B+wG@g[0|ncB9|`wxN$:7ws$/nD.mK!3.c5[');
define('LOGGED_IN_KEY',    'HTn_A-O|:Upv/.?gT:Qib0,182yy=-|W=GNca4y?CdR9#{5h~/{{qLRV)_}9IQO~');
define('NONCE_KEY',        '>sd>n{.Hx|h_0=C<g_;`S;3@/Z@Pq9QBGN<U&Y+f4jb-_hZ$jA zL!E|CmrC1C^_');
define('AUTH_SALT',        '$)q+YU9^[|#ydEN:0Fk:{X!#uvw+Ol@j6DdLLg3y$p|V /S~|V^=nn_nQ(>f7<^T');
define('SECURE_AUTH_SALT', 'P_7<]FT[2rBQyu]Ulm)!/1meZK`+q+&+0Rj5m/]|Fg+;h2|4c6-Mi`,hvUU`gX8]');
define('LOGGED_IN_SALT',   'l[+sHA3{WG#f|j WyIKP=+rU1z56grwC2n2Oe+_o3.C$i#H0g4?;N;F0Am:oQowE');
define('NONCE_SALT',       '&t}5xAYPh=g|)&XBg,fX+!t?RJGz_&_o9JZDbL86F:mlKUD-A|^!K.0QQu~!k1i{');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', 'it_IT');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
