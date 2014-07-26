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
define('DB_NAME', 'peterjwa_fps');

/** MySQL database username */
define('DB_USER', 'peterjwa_fps');

/** MySQL database password */
define('DB_PASSWORD', '6dh58pomSP');

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
define('AUTH_KEY',         'g0zycwnvxx8mzukkdncpm2jzpijqwvlq12zx5rkdtcb2eqpbxufpu9izyqbj3paq');
define('SECURE_AUTH_KEY',  '6j11oropcnqchjjbmh8tnksjrigs9twhyhlhuvanlye36td52ymnqyw43clugk9j');
define('LOGGED_IN_KEY',    'ssd9xzpfmcizkoj7vq9yrgscjrfxx2ao5zc9w69hizasv4ccg65gjm8yftnz3moe');
define('NONCE_KEY',        'zobfk3ppwgyszod0v86w7jnrsrlumbjdmgo0f6vxwnz4srjj37gomqooojmlcisu');
define('AUTH_SALT',        'acwn5tfjseuryf5okokkwdbna3kmlsexczdjt1fzsaizgixt0trtmnwmc8dy6nfd');
define('SECURE_AUTH_SALT', 'e9ivkmusiyokfz1illmo9zfxuqi0pjvcfoelyatlbgtupniubhagm46cnnlofhcy');
define('LOGGED_IN_SALT',   '7hytq0pmjmjef8fajhssu4u7m0fhnkq6ibgdiptl1fkimzb9t1qsdb08ofljblvo');
define('NONCE_SALT',       'zs5hyrd0ngqxrkrbxk0mk47kjfcs3px28ibt0mn4symcqivvhzeglup5g9v1esqx');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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

/* Added by pete after migrate from live */
define('WP_HOME','http://peterjwatters.com/portfolio/fitnessperformacesystems/'); 
define('WP_SITEURL','http://peterjwatters.com/portfolio/fitnessperformacesystems/');
