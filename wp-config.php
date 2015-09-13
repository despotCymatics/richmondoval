<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'richmondoval-wp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'cym4t1ka');

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
define('AUTH_KEY',         '+A^U-9nW$y=eu=U3i/>+_ml`ota-8yNN&f|W%s+%;o+`&^&hW?NY_ep_m9OL%^H;');
define('SECURE_AUTH_KEY',  'TqJ4_~KW%IO32gx!a$n!!6SuO.4a7:wZSN2-|^!(RBb(LyUGc@#+2c%pjlpHC%*|');
define('LOGGED_IN_KEY',    '(;nmVTuiT&Xh|O.z[2F`GoKsj(=4sYawhy/p5{r-:9q=T3NyC<gd/530ghax.75a');
define('NONCE_KEY',        '##nk]=YL8]e6>ZH9%Z+uX *]wX/ffud6n=Id|~hop>bHQqEaC+b+w}*<[liwzCg[');
define('AUTH_SALT',        'UE]NI]/]cx7]M)HbeMx-. )g!3*TqL<;a)T3vQs~Ez$s9_rXzD8/Shq-77KFU~t6');
define('SECURE_AUTH_SALT', '#bgzg;,WBM/BifQGW;2;^w!|[.(VgElE`0x?ulP^Cu=z2}#-}sS XOBE:Z;+1].H');
define('LOGGED_IN_SALT',   'Ks0(3+vREtJLYS&daq+4jK<ct_bS7?NaPN5_Nv|d@9q{Pw<8{*/X.1LmxU2d?@h7');
define('NONCE_SALT',       '`8dFQX5*:,d}!Xe&ppDE$|^)+e+(P1s(o8|/HmrKNRY2-6dv*|L-$;-!JroLoGd1');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
