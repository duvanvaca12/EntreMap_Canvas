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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u436230069_2G0Td' );

/** Database username */
define( 'DB_USER', 'u436230069_GTDFn' );

/** Database password */
define( 'DB_PASSWORD', 'YXSfacNjGB' );

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
define( 'AUTH_KEY',          'b-/*nO5.x<0E9_+SMF_#C]O3Y]el{K+k]ljw;}|9e 50h-nX;Zeq6YUu;(zr3[K6' );
define( 'SECURE_AUTH_KEY',   'YhsY*iZEztxmrRoykM~Yq6<2axuDIiN:oBC%Bh m=PS1UB^7LFx]3>|9U(WJ%zO%' );
define( 'LOGGED_IN_KEY',     '1k@78mG#/S$wUI7VmF= fwrf :W^dmt1l:ZMfx)nxgyqrXw5R6Ez>n@~AM1IEFaJ' );
define( 'NONCE_KEY',         '3r<n,LHuta]$z[@ne]P[OS<k8O2Q@~ydR_#wOC[>mg)Q7Fr]v[{tLGsa=9]%)X`m' );
define( 'AUTH_SALT',         '<UD7)mcvR]VC-iy8RRz_rOz|gZHFF>u|:qfs;Gs:ycU U^mArzI/XDrd7y*}E@4+' );
define( 'SECURE_AUTH_SALT',  '~K)_H@);8iH`]QK+@ 6|eb,]bd+K85K>I=40i|+;U8UUhQC(s0QI/]~`jH[K#.7q' );
define( 'LOGGED_IN_SALT',    'K!!xQz 6%JN|h//0;e<!B?r:Z3760.;_Fv9}c?eG3EB6.xV*SqLK#VOHZ44V}~9d' );
define( 'NONCE_SALT',        'ja`Z.-MkKf9?-vGCh8]Dt_6LuRM~gvu$o?Gc07r,b^_#*e6(Al@hlv0$:7b<:<7q' );
define( 'WP_CACHE_KEY_SALT', '0887QuK?([Gs8d67Ct~*R;~u3AtG*Qpb>tg5_sVAvn>PrqFoM2;,!HIM>_0vu!-J' );


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
