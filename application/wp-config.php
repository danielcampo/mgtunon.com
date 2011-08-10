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
define('DB_NAME', 'mgtdb');

/** MySQL database username */
define('DB_USER', 'mgtusr');

/** MySQL database password */
define('DB_PASSWORD', 'mgtpass');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

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
define('AUTH_KEY',         '4=c-)+6JFuDac},X~<oz&9?1l%j6%}*PE>q6[JzV_2lWl c$hJw+iW #R%I;Zivx');
define('SECURE_AUTH_KEY',  'v{+cC:/^.cwo18OY<r}draiw6-{.N!!I^-0OeDS/vQ#U6YNDm+QD#$-^Gp i @- ');
define('LOGGED_IN_KEY',    '|WbUbq{ygrzZGFo#^.}?DI|=Jh)O[H{h%.p_n+%Df$#c)9mhM5;gLC[OC)!]y70-');
define('NONCE_KEY',        'vVfS~kn0O&9|a8pY,-9S`~H+-FMyY!bx)D%>gvQ%7G3v::2)pH0<6ZP aTF-io8L');
define('AUTH_SALT',        'XQezzGnkF|a0R}QVd-w-kHV~Z6Z12=T:qr(@ipAzEO{|h+_ahfv.j u/P!<N,+S/');
define('SECURE_AUTH_SALT', 'o=v,4wBeq bM{r na08+6vQTFi%2T@Q;wgY=;fk?CF{|7^tUMf+wa[Kg!4n3h!MM');
define('LOGGED_IN_SALT',   ']R+|x4G_J!=vp}l}+`YPf$J*R|t9|y77d?GDr&,Tyb(bM<;@{4v2)@x]SA6aOX2S');
define('NONCE_SALT',       'Em<Y+Wmk,LmHmO?mFmyaguHYEr5G$&&/ZWkXmWU@^BmkjmSTO:ttiHfzo0[mD-6q');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'mgt_wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
