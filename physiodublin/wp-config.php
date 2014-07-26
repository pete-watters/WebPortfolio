<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'peterjwa_wp877');

/** MySQL database username */
define('DB_USER', 'peterjwa_wp877');

/** MySQL database password */
define('DB_PASSWORD', 'ubP36Srn88');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '7keb6qmbkj9vvlpbjd8xvmz3svxujmiwlqf7ztt5o0ezzgxy6uzqj4v5amfmw4cf');
define('SECURE_AUTH_KEY',  'lmd2heqfb42grykhmuy4lasynjumc4pwkozkbf6dutwqz2oigb3wtzhk5fwozref');
define('LOGGED_IN_KEY',    '0jhukueoykhajw7uanmmvivqmz4ck7msxhd3uoqvyhxikk8ih36effsmowdyh1zh');
define('NONCE_KEY',        'lvu9jxklxihuhn3gcbaigbpakoajgrcjieppas7zwx59xskght0hyrajcub93dyy');
define('AUTH_SALT',        'xedhp8ez2z8sbp9nnqhfkhcbmzo4glrq0utjeayuxml1iskhrwmhc6jt7y7osgng');
define('SECURE_AUTH_SALT', 'fyfcjfuxhnktowrzkc4g4udzfg1a2l91abbcksf2fk1xbdjdqplnzeyd3mnp8dbq');
define('LOGGED_IN_SALT',   '487ggetpiz8c5kwbrmanbuhroavogfb4zuu5ybm8dznxdgp5vdbthy5f7vbus9eg');
define('NONCE_SALT',       'c3dobqzemq2ozbwestyz4oh2r5qycl9oim4ir6fltjojoiipqr5pwhb4sz2sxodn');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/* Added by pete to fix login after cloning 
define('RELOCATE', true);
*/


/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define ('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

/*  Added by Pete to migrate from live site 
define('WP_HOME','http://peterjwatters.com/portfolio/physiodublin/'); 
define('WP_SITEURL','http://peterjwatters.com/portfolio/physiodublin/');

*/