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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wpriders' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'O{Ko.XfMPBe}4LA&*NUmM9,=xi94.)gTmz-;m&s1ihzKmy$(V+^D;SX`gD,%R>:j' );
define( 'SECURE_AUTH_KEY',  'FVmZj*2-T&BwI$pHG#>|k`R}/Xt{dM|cxU3g1}6sQZJ^_65ZPL3}xH]dZj2U.o;!' );
define( 'LOGGED_IN_KEY',    'dkgFB|lEu`AolaM.U6M$T9v>w;{Y/%>aBHkSAhO{0ar-JH]?$=)^$8`ZzUbkdYz>' );
define( 'NONCE_KEY',        'S{y5.8#ZhU1w6j277|z`|mBp]XT4slk[DwL9 l(#Oea_zIN/r?llz({bK!r?9h}|' );
define( 'AUTH_SALT',        'w%QK<FT?w:ih9?@fv;`cCOU`L@o)JKfT)xxMa>FR4hEw#kB-PWKuE s~Va>_Q?Ni' );
define( 'SECURE_AUTH_SALT', '$^E{{Z9~d#X+d<^R4.m%p&ujIo&9}JyY5_P=NS>%7-Xc8!/QvSANkg&}1?+8)D]O' );
define( 'LOGGED_IN_SALT',   '#<;Dc(GIZwCvN@1+`q2D^D:IK~ittl-f,A@$;mSu,LVqs,$:Y#~S-,8{a4c%x(7z' );
define( 'NONCE_SALT',       'b3^K]evb[ExGY7D3wPX3;+l qyCjfJgIC<z&ShT~Z$%U650ua_UsrSa{vf9#BU##' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wprd_';

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



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
