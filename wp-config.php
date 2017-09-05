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
define('DB_NAME', 'wp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '?Q@PWBo-!& K4.4D)@!iq^n~h6rcVe!I-BH+-jbQvBP=uzS_| t[hP,z2$6kw@!U');
define('SECURE_AUTH_KEY',  '0y45[(1)A Go?dPq3z0=PM$P8Bq/hxW,>=A~md/wpW5,u$3-gQ>.0;_Q2i7@f76p');
define('LOGGED_IN_KEY',    'hhpAeeAfvvfz{.:cmIRtM)w!Bm@D?^oU1:D?FfvXe:Wd6xoCwJ_n~Wzkh+0Lz5<f');
define('NONCE_KEY',        'QK:{!q#o]6f$jIbUF&rz9s.yJ..$}=bXGtmgOriVtli_/AZO8&{8iZqk|N9A.>$6');
define('AUTH_SALT',        'Go.(k;$8CU},+ZxRV)@DoR*K1+HuYSoP?r`|Uxsq62KX9fK[Jv1^Zw<c/l.;fD}^');
define('SECURE_AUTH_SALT', ':E|345wo{q8Cu4F1cx<$DO`<+ !2WC]SX)Fq0`,<LYxg0K>vStR_*K-1 c!Lz82[');
define('LOGGED_IN_SALT',   'ih/,}!|a6)bAZo[]V{~TeZ>{@pNjvyWu+>evUQlxi,c|sUZr!mSR})VFp1AiS&KZ');
define('NONCE_SALT',       '5rb$0|T,$U:#ko&:(T/b3dWdCXIAWg-9LH~{=?,pA/~DeBOAzQOrCruBui-G1uNa');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
