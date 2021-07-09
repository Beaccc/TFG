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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_desarrollo_bd' );

/** MySQL database username */
define( 'DB_USER', 'wp_user' );

/** MySQL database password */
define( 'DB_PASSWORD', 'PPkeDI38A7R5JC5Z' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '`<rQPhSK)>7xRgskBtc.y49@ajMm.7.-7j*f5uc^)qXCPHMRsqEB<goH&nWArun#' );
define( 'SECURE_AUTH_KEY',  '>$[m|M6E,fgf;|4u9ja?%0d=vfa8rov+Vp_@aoE!gAU<xiB-T}PuTorD?WEJ8HyE' );
define( 'LOGGED_IN_KEY',    'M~d^Ly}!PKX+S<CW15oZZ=3_4i]O1O h7H5J<*|KId9b:4>cb5X5.3h2N>KYW1bh' );
define( 'NONCE_KEY',        'BEUW1$Z3C$Y/I/MWYe,IG:}b)yj!Ee(_eTs|7z+-46$ny~iCk6rw2ATpI/*k2YY/' );
define( 'AUTH_SALT',        'efbB[Gxpf!y<<qQjO[jJOU/3>cGn=_{W0zs0S)Y9ixuonm4Z;]L#KuJS`+OHT^xj' );
define( 'SECURE_AUTH_SALT', '@j(W;~ZCy/8gn/?y;;RcC22.a$n/XPEcT+6xt8I16vF@PaRj?fK{M8)UUA6]~Z(H' );
define( 'LOGGED_IN_SALT',   '>&m9id~hJ6=4RG|@$!xr5jk6+qqgj#nwSLiA!@Ss`6l-MM/U_]j)OJuUBK+6vTyl' );
define( 'NONCE_SALT',       'LsL4]SMww({ %juy+TY68!1mkte%^_f4aF64^|8tut^hi685ZbGm>KTK+{p.zle_' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
