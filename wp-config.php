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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'safarihelps_wildones' );

/** MySQL database username */
define( 'DB_USER', 'admin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'admin' );

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
define( 'AUTH_KEY',         'S2nP{L=Xc(1ZDhPIvFdCa `zQR6oD7&w6pLIo,~1FZ!oQX0x{kbYk2nLcS#s@pW3' );
define( 'SECURE_AUTH_KEY',  '#XG(bQ2JmSf;?[>~9pUqa}krz4%$1NQQO%tox+oc#Hp7>f(KwTMn7xhp+DM]:6C|' );
define( 'LOGGED_IN_KEY',    'djunM/IVPUI1t|jH/W(N`!LZGgaB}SZm6.qyyLy*3n2r3QxWc~Eylmc+Xx|oE0[A' );
define( 'NONCE_KEY',        ' 9Jhmfjq:--_N5~SG`>zW@~d&64Gpjg}7gUKa6S=0q9yy4~Ep,HEvQ*h&xxik=D#' );
define( 'AUTH_SALT',        'm@BR@^+GQ~vqlxn:p`@}mK0e}]gyMH.Bh@>iI4x[,s;*fAk]5=tXlEZ9&y2DBEx7' );
define( 'SECURE_AUTH_SALT', '^R[Cqen<N>MP$m# W:*vr8hcT2f}r?JX:,m&hhsa^X}l4a`>6c=Can#X_@B3j}Y~' );
define( 'LOGGED_IN_SALT',   '}M.#x^6/YX&z u:t87f$(kcgq.MNARdYixV>Th/!Z0[J4PCqTl/W!Wr5?L!vBi{v' );
define( 'NONCE_SALT',       '83L,(f{A=`06.wTP|VBY-IDI}ZjP6qn;=l.rKpgbD9yGoU|vx3D}O&8x3-+!h/dv' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'sh_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', 'wp-content/themes/SafariHelps/errors.log' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
