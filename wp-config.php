<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'raptavares_multi');

/** MySQL database username */
define('DB_USER', 'raptavares_multi');

/** MySQL database password */
define('DB_PASSWORD', 'D2pjMOig');

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
define('AUTH_KEY', 'hXzLy3WjM4Y4LXfYsCQeSbZ0KRKoh8riN4JOVDr7fpP4ymu4lKsdrexmsQahp6ji');
define('SECURE_AUTH_KEY', 'Re0FlKCkapfL78IsnZVe6aR0bHNcw0bdNa3nS0FmdgQDX2D9Bw3Tpk1ivCaOKwmn');
define('LOGGED_IN_KEY', 'Xbv3e1KNurEouL3geiJcBhqkRvkyxI7n5I9K89H9WQ4Rob6Ye3rbM6wfVfGypk11');
define('NONCE_KEY', 'uAebsnVhGwBc5xoFGKoB7NRzGhBos8gVKSrFFrrv4C8LVLF4GATSkEu5wDDoCbnT');
define('AUTH_SALT', 'pM7jNccQWibjW8xSKON8ZX7jdl3a3flnU17eNkwIvkOQ8Mdo7VEWnXYufNbtwFRn');
define('SECURE_AUTH_SALT', '4HIfGNPRvDZpyHHncjapZQjjXHwNHhLi1FBW4qDDYXI5uF0gYPxflgeSZc4dHVyF');
define('LOGGED_IN_SALT', 'rb9ASWYZwoCbPwtFVSNmnh099TSdjP8m3JBOt1AcZSMhMmOQm6ZRPcFBTWfluLgA');
define('NONCE_SALT', '6lnKhps1Cuq40lLgdz0VitCjIxWe63Pb27gtuHIjPLzY7ZbN7e07Q3D9O8ZhM3Ly');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
