<?php
if (isset($_SERVER["HTTP_X_FORWARDED_PROTO"]) && $_SERVER["HTTP_X_FORWARDED_PROTO"] == "https") $_SERVER["HTTPS"] = "on";
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
define('DB_NAME', 'heroku_46d5b4a515560e5');

/** MySQL database username */
define('DB_USER', 'bc784e00644c66');

/** MySQL database password */
define('DB_PASSWORD', '01155b80');

/** MySQL hostname */
define('DB_HOST', 'us-cdbr-iron-east-03.cleardb.net');

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
define('AUTH_KEY',         'BoX1U1~Prwhsr>iO#4.;!{1U?M3+6Iv4}t%nydJ%<gLbeSr<{(5fg?J`^C4UXhnY');
define('SECURE_AUTH_KEY',  '+:.vRuSk`EhXqTiG!7^htgVM55IF%P9MgfFZ3m&M%{5MO3{R=2#,)nG@f)G3+=J-');
define('LOGGED_IN_KEY',    'RG&+Y`,|,V.-)5K;]DuY*A$5+nK9,o83{4GM3V1mZ1|<crBSZ/nWBT|51Fxj*y)|');
define('NONCE_KEY',        '<n%}oybr4EYF(&vL+RVK}b8q`o-P(0p?cAert5#W+9LJPL|&iE#c^jYlL[Mp<eQx');
define('AUTH_SALT',        'wp^ce.U|6*NwM04=+R<=bbTAUU~n6cB%U?Dg|W9g8+UOYE?HaV:WW N#[@m=dCI0');
define('SECURE_AUTH_SALT', '++>HdX-zmp@b !gNK+}P9kS<S,+<GNpj],)i8)*};7X5TafKVu85[gy4{T]3Xn%+');
define('LOGGED_IN_SALT',   '_NpkW0.Hc%GYPe2kkd3U EPdcvX+~A:r)@=xE<`IVtJK9hcCXH4|h^kJEajF_X#+');
define('NONCE_SALT',       'X{zPx8710NO+:gS$B2$yN{f nV/f,8;VRHO7I{ZT;vwl42V}Gji</wq]Iaiqi[S]');

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
$_SERVER["HTTP_HOST"] = $_SERVER["SERVER_NAME"];
$_SERVER["HTTP_HOST"] = $_SERVER["SERVER_NAME"];

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
