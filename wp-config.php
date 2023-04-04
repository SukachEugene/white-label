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
define( 'DB_NAME', 'whitelabel' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'S}-VGRrwL}N[wAM[TmT8hp.Y8!lLJ-,U4A&i+7 _[noBF[~);4L92 5~[PM2:P$S' );
define( 'SECURE_AUTH_KEY',  ':Vs0o?t8ss. C@V)e1P3(P#KTFjUwEi_V.O*(8~yGK+S4*S7Ta9W1,DA<v4zYPw5' );
define( 'LOGGED_IN_KEY',    '7BP#30(d{^R*DdG|zT:*T@mW8b{(8[EW6eqNlef-PNlzeC$npfv^~#PN]R9h>g@a' );
define( 'NONCE_KEY',        '3oM%tYYSAW&^Yj~^R#sEp@?ZYrOoM|4+]:WYF:O$37H9gZZBKoX+8X.0&|%UwA] ' );
define( 'AUTH_SALT',        'L_ kX+1z]&B0k3{A!;jvgIolKfI^60aK7*%P=1dyCY?:ut7oY1bD4](,P(HI(r6^' );
define( 'SECURE_AUTH_SALT', 'M1mhhYu*y4CK!,/FI({X1qGDP{T{pYi2?y^}.8uG}nu~}8}=F4q%$L}iWns>;wCz' );
define( 'LOGGED_IN_SALT',   'X lPV44~%,lY&mCZyM@C3yat!9}K+e5VlFe_gQS/&B`&+IOs/?fgZ},k$C11z^=$' );
define( 'NONCE_SALT',       'VLx8A/8vjFHuljjE37EM`b1B0uNo^9{7Vs.0O-R=9B)^8hQ^$you(w9{eU1/fCY ' );

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
