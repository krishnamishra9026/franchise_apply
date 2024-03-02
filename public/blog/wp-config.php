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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'trading_blogs' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'Temp#@9921' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'jpF3D}l>Jk)XkfDpFXEtNE44|wKH*EkYSe/NopUNK^lg<H`@=,Wr?do${iFt0Br$' );
define( 'SECURE_AUTH_KEY',  '$>Pd|rCK{n~V|jXaHNs#)])TZHrPEe@{#7.rW(L~j_ejR#0qYVB`u1kb(A5R3?*]' );
define( 'LOGGED_IN_KEY',    '4D4NU4N+h?Rm802)3s#NHVF` >vg^5{mVf^xXTv;w[I+*hOR;#j@94Sk)r>&mF>!' );
define( 'NONCE_KEY',        '<`2-rAB_2k7S[AM-38<s}doL| NJgJQ}v!uexU5KO~V ;8ph6inq7LB13O=ERzQ-' );
define( 'AUTH_SALT',        'N.r~@TNG8+X|Y2!J]9bb:]8=q^Kj8!TK<ornf8OkHnZ 1W&ovm~i4 f^xa^,rI?B' );
define( 'SECURE_AUTH_SALT', 'FU{B-[[}SMPndo3#UU0_<2MlH?)Z~E&<~N)GsheL`Iu)3S`n6Bz)5u^A%.;XtSS~' );
define( 'LOGGED_IN_SALT',   ':~AUvn_#a?kVE3)v6XuRS<|>GD *9b!5mSvWCo_4PpqoALQ?C8)J6AO+=Wcp<=i ' );
define( 'NONCE_SALT',       'SL{t}h,KB>QD@Z>yrRJx_CIg1 IsN&1Og?=Ccg+QHZf}iLjV;_W=,%? XgB9OQ|E' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
