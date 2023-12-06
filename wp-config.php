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
define( 'DB_NAME', 'wp' );

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
define( 'AUTH_KEY',         'Ey8]p*c)gWikLNV2qogosG#oA6IBd#V!A$c11k-E.ekJ`O]zFd*CU,a.v9`zuC-v' );
define( 'SECURE_AUTH_KEY',  '$ri)a,t<bv:y(rH3X=3iy7X&W;bg_{u*{1_JdXZGxg8D|6gD@31_,I=_-%via7V_' );
define( 'LOGGED_IN_KEY',    'C&AjSSueM$R1VldWDcNO(=eNUG9rIn%Y>`;-M*p%e8YKeSw,tWE%_d3xLoOLsDDS' );
define( 'NONCE_KEY',        'TO./{PKB]{$crU&X%V.>U@3M9DC-r*t+|ElCA1k>2=kyrs;@ORS18<[8%)0./`+x' );
define( 'AUTH_SALT',        'InDdGD[oQFRJfvSyTv6=:tJk|O-9srSmbD@{R?Vc=Iu;WiKbS}a[1d<in6xFI=SA' );
define( 'SECURE_AUTH_SALT', '0 i#9xkGc%)7B&)W%5Ck`/qO^&R~<s5%EN2EkqeQ^w:UZ]PT0wB!Q[/Gn/Lx<PO)' );
define( 'LOGGED_IN_SALT',   ' [!JD,T :VXqg8PS[=%&zu@_7gpdAc=ZZpYt ,jJQAXj! &q/7Ak4]*dFjOs+4BI' );
define( 'NONCE_SALT',       '%5rFMqK6xURdYai1=pp/], NgMq-1p|L2/p=Oy Ux({T3[Y?:5rh.$ mLRFH .Zm' );

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
