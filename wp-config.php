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
define( 'DB_NAME', 'u585144271_MjIk0' );

/** Database username */
define( 'DB_USER', 'u585144271_i5WeI' );

/** Database password */
define( 'DB_PASSWORD', '0rxz9wcVHO' );

/** Database hostname */
define( 'DB_HOST', 'mysql' );

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
define( 'AUTH_KEY',          'xQw<{5ssM&odE+[&LH^9p}cFo(O9zn,?U=dLy!+PC?SoW~YK5PP?5>YW=M8QN$/{' );
define( 'SECURE_AUTH_KEY',   'G2V!Hn|&i7kEvTy3h3I_q~4;4d}t@3=G<tEi8#uFX/HEK9Ow/Il:iJ1*4FB!_VYa' );
define( 'LOGGED_IN_KEY',     'iHAoWQUrb@0*T9oWW4QJAuihq$]7-{V?f8>`ih,cn7)$uN|%,i)fiou6~UdnUHp-' );
define( 'NONCE_KEY',         '(;raM}MNIG,FTKIsPy+zc4sUTB)k1D7EB%]e|dM|Gop[f=&rnHs5gs~`)Xm{1r#Z' );
define( 'AUTH_SALT',         '(^Iv#9VJs4OI6;-Q4|;hxgli(!LQ,%|<dm|qR47ts-*CE7IF(U>;l#ulY ~?Ak3V' );
define( 'SECURE_AUTH_SALT',  'U+$8Et9|t9b!%E7jN4qtHP^c}!R,00`bKlOzH|:Kl)t]1}Mu?%vlb2e;q;6A+{GY' );
define( 'LOGGED_IN_SALT',    'IvteF7jX80WN+ox7GcA7sGhj_Sd~FLgf`YpnLCmlEz(;yC2M=mL~b3`e?ah3.vjh' );
define( 'NONCE_SALT',        '4zo}f,)a7|gKg}L3ID,6-9`1oRc5vB#N0MpUx1.J2(F>ASwvBc{rXs2:X/EI4<dE' );
define( 'WP_CACHE_KEY_SALT', '<`/50UkLnlIN!)vA+D*JH>qUot2M]XmsVCKxP[m=/:~zQDEra:fP/DgWxt!RN4nU' );


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



define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
