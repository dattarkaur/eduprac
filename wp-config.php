<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'dattarwp' );

/** Database username */
define( 'DB_USER', 'dattar' );

/** Database password */
define( 'DB_PASSWORD', '123456' );

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
define( 'AUTH_KEY',         'fz4_*!}NN=eSkAEstn_}s(*hZB904d&/.scjb!|Cl1~Z3;ch=/bctTbqOAJ2r/]]' );
define( 'SECURE_AUTH_KEY',  'GmHe]O#3)|zUv.80F!@LiM3=&,PB=/o&H0}#Yg_{:])?CLX)l^Vm&@5D^]4:`wZm' );
define( 'LOGGED_IN_KEY',    'Kt}M4{Ca(+:a%O5dtw~WrPoU(5dlsNrAV2bZ4GDvcz;YdKo#tnTw]r owkRNJ[Z)' );
define( 'NONCE_KEY',        '(,s8SrvSN6{pb!(uHeGziL=CSiRlmZM.~v5}jAg}C+k0i0 f><A>Ut2jKUU>NfwA' );
define( 'AUTH_SALT',        '`SHB-3WTS3y`:TXCZ3[$MYa>Z{u=FP,QIE/k=(bS`r??}6BvAa[MdJK^C)q7l&8h' );
define( 'SECURE_AUTH_SALT', '<V&1;-h=Z8gztfK{Ir4n<[K)TNL?vI`dHxSY?UX{WYzg0kc9f>t>u|Z~6Qu[r#Rm' );
define( 'LOGGED_IN_SALT',   '<t2PH=6R$SvjC+w,Z{%!!{l%!*Z#}wWr`12m9-u<Z;l,WWLoo*Pb}@7%&nqLKRB5' );
define( 'NONCE_SALT',       '<:MJF(_aaqGhV|$d)fqZ)x1Imt)`${O7R53AmUu`dv8bp#qS7U1T3Ey<ON9.WqS$' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );
define('FS_METHOD', 'direct');

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

