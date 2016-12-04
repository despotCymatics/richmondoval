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
define('DB_NAME', 'richmondoval');

/** MySQL database username */
define('DB_USER', 'richmond');

/** MySQL database password */
define('DB_PASSWORD', 'kgVpeKz1cG!@Zm15$L%z');

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
define('AUTH_KEY',         'O+&8EW <P~d,PT`7MF_%(6[+&6-!No2DBX-,J4OFs_9k9<EdL+4X&Zc?ol,p2{c#');
define('SECURE_AUTH_KEY',  '3`2b)^x?q+zT-w3v.-%u?~9,5kaoBJLZ58v_;gb&sN|(u{QL+r#]frnzQ1}&:+*{');
define('LOGGED_IN_KEY',    '-2*kA+&-~_H>~o.=riAOmXF`W>*9&A(88k4~#_0Y#8t&nx4uH#=pdRuzu7g^lOoB');
define('NONCE_KEY',        'Y{5n1x+(l+`Opk&5*R&-RV+ #l7)&i Be0Q2[#^<@(u. Qa;{V-|I<B=5vfYRt23');
define('AUTH_SALT',        'mQ_KMOK,[,{4SX<EPwz_ot0k|H<xJXj1>Jt@s:ke#Z|SC@K_Ne6]6K&R3uz`[*Rk');
define('SECURE_AUTH_SALT', '^k9O|- M0G0q@(|{84x,,wg+b-Rk@Tw*nC)sHQW,M[V=,Fu,-tBpwj!zFU,8cb0Z');
define('LOGGED_IN_SALT',   '4vQk7*[XTDUp<JZ6j9H|5vlHa&I|yKCg`Sp-)<pLh|Z%Gr1:%913AJrHXK[@O[}S');
define('NONCE_SALT',       '.6k5ooNO39@wXz8q)W&&ZT!1P&-#o&v:cZkQ.7j}J{-V|h&r_5MrN;jiDm#FOuz<');

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
define('WP_DEBUG_LOG', true); 
define('WP_DEBUG_DISPLAY', false); 

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
