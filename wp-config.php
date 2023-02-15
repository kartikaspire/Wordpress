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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3308' );

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
define( 'AUTH_KEY',         '!;Y2#;n}afq0Zm5u9c&%{Q(1ZdO?_K$#y).=?.c_4{]d7CV$.s;`7*M/^!&u=Dj#' );
define( 'SECURE_AUTH_KEY',  '0Bo-=;>*#&/7-J`}T%K*lbQc7.ryT|%KNGjBUG(6b5!PFvinTfkj2e9imto?bwOX' );
define( 'LOGGED_IN_KEY',    '.9ZGkO^*z;?Ir5AJu;wJ8. 5 fiA8!OUdVBYON&|n=jVcy9q+cY`gRq$]@6.j`&V' );
define( 'NONCE_KEY',        'mJlg4gwb5DD(OAt&2N/ &hu5!li*{+}4ef.^%=#E^<z5w,KX?1*7--93)ss;-fx<' );
define( 'AUTH_SALT',        ']{7;R9KM/2^o>kVpJpZ=aY8Bp:#^6Ct91`qhxZu&dH*-xp12+d >eroD)4ZETUJq' );
define( 'SECURE_AUTH_SALT', 'T)q*.;$=I]nRKt|mV ?tysZ329Tq!*S[NzTwVTD]NDs<6;UY7FY)m{uf-?I7hx-A' );
define( 'LOGGED_IN_SALT',   'z+OO[eHuc*aW]1{s1LNQKvorG1kQXwC7QiY7MKLiXnbf;zzOz(>,7xLz[^jn`FOU' );
define( 'NONCE_SALT',       '(JhR}|KH/XOT4&B#%cj(t[,O-u ]R%HV%WZRW?+Zg(>jwf9@6{zy?+sR.E^lX*87' );

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



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
