<?php
define( 'WP_CACHE', true );
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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u436230069_A5NRt' );

/** Database username */
define( 'DB_USER', 'u436230069_wc5sI' );

/** Database password */
define( 'DB_PASSWORD', 'pymHXBIzoC' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '{NvOS%z(Be]tI31#f-2cJyl.S6@x66G/>tltBuCf!XYmQSgZ{Q#Yo<5p&jE<sC#B' );
define( 'SECURE_AUTH_KEY',   '!^Gv5oG?2(p;P8F ]y:xh !t@0+$OB m68Ezb{pHc2~-( f9v!Q+_{sEuJ<0V,on' );
define( 'LOGGED_IN_KEY',     'B}hZ~6<C]PrP6t-&QUH|)op+*Dc@rUj$$qMz}#<6%t^aV7jL[X(Fph/%JInim$$R' );
define( 'NONCE_KEY',         '>_/+PYp$Mqf+M{S`vt(zM7T)W*w>fN/O$I;uC4B:+tW#<EW>%M5X(LK7/]cx3Q&j' );
define( 'AUTH_SALT',         '-qT3dR5e^-bi@zVOAIoA6o^J6W7{OENPE3Y<)r2badZ!Id-JRw39[(rSGLNQ_MXU' );
define( 'SECURE_AUTH_SALT',  '2~ ,Eg$soziX^-ZAq&8H.!u&A0f<||)y!QIxoCuC1@ra+d>LI vXRbL6dlr&XgvV' );
define( 'LOGGED_IN_SALT',    'tn%vuxK$N]gNDV(r%SIlq : ;yXJ,#vu9q3t7vDo1,24[=bAx~mtU]XOpC_tM?o.' );
define( 'NONCE_SALT',        'J%~,c6nxId>Z5vRr~ziY|WsOX-i(OcE?eb}9|c+8`S&9n5XW3BD.w,+]|jh>rD;o' );
define( 'WP_CACHE_KEY_SALT', '@~ThS2.h&4KmY&Y~5g*3N-f;hr]HiC:5*P4^(^4A>#%_sg#74iW+l2/>i2.-fbYg' );


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



define( 'FS_METHOD', 'direct' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
