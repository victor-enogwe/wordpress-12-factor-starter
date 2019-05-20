<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 * Php Version 7
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @category Regane_Store
 * @package  Regane_Store
 * @author   Regame <regame@regame.store>
 * @license  N/A http://
 * @link     https://codex.wordpress.org/Editing_wp-config.php
 */

$onProd = getenv('APPLICATION_ENV') === 'production' ?? false;
$THEME_NAME = getenv('THEME_NAME');

// database credentials
$DB_HOST = getenv('DB_HOST');
$DB_NAME = getenv('DB_NAME');
$DB_USER = getenv('DB_USER');
$DB_PASSWORD = getenv('DB_PASSWORD');

// Determine HTTP or HTTPS, then set WP_SITEURL and WP_HOME
if (isset($_SERVER['HTTP_HOST'])) {
    define('HTTP_HOST', $_SERVER['HTTP_HOST']);
} else {
    define('HTTP_HOST', 'localhost');
}

// Use https on production.
define('WP_HOME', $onProd ? 'https://' . HTTP_HOST : 'http://' . HTTP_HOST);
define('WP_SITEURL', $onProd ? 'https://' . HTTP_HOST : 'http://' . HTTP_HOST);

// Force SSL for admin pages
define('FORCE_SSL_ADMIN', $onProd);

// MySQL settings - You can get this info from your web host.
define('DB_HOST', $DB_HOST);

// The name of the database for WordPress
define('DB_NAME', $DB_NAME);

// MySQL database username
define('DB_USER', $DB_USER);

// MySQL database password
define('DB_PASSWORD', $DB_PASSWORD);

// Database Charset to use in creating database tables.
define('DB_CHARSET', 'utf8');

// The Database Collate type. Don't change this if in doubt.
define('DB_COLLATE', '');

// enable caching with batcache and  memcached
// define('WP_CACHE', true);

// define('DISALLOW_FILE_MODS', true);

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/}
 * You can change these at any point in time to invalidate all existing cookies.
 *
 * @since 2.6.0
 */

define('AUTH_KEY',         getenv('AUTH_KEY'));
define('SECURE_AUTH_KEY',  getenv('SECURE_AUTH_KEY'));
define('LOGGED_IN_KEY',    getenv('LOGGED_IN_KEY'));
define('NONCE_KEY',        getenv('NONCE_KEY'));
define('AUTH_SALT',        getenv('AUTH_SALT'));
define('SECURE_AUTH_SALT', getenv('SECURE_AUTH_SALT'));
define('LOGGED_IN_SALT',   getenv('LOGGED_IN_SALT'));
define('NONCE_SALT',       getenv('NONCE_SALT'));

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'lt_';

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
// Disable pseudo cron behavior
define('DISABLE_WP_CRON', false);
define('SCRIPT_DEBUG', !$onProd);
define('WP_DEBUG', !$onProd);
define('WP_MEMORY_LIMIT', '512M');
// activate default theme
if ($THEME_NAME) {
    define('WP_DEFAULT_THEME', $THEME_NAME);
}
// disable automatic updates
define('WP_AUTO_UPDATE_CORE', false);
define('AUTOMATIC_UPDATER_DISABLED', true);
// exclude wp-content from any upgrade
define('CORE_UPGRADE_SKIP_NEW_BUNDLED', true);
// disbale plugin and theme edit
define('DISALLOW_FILE_EDIT', true);
// remove trash posts after 1  week
define('EMPTY_TRASH_DAYS', 7);
// fix db automatically
define('WP_ALLOW_REPAIR', true);
// Limit revisions to one per post
define('WP_POST_REVISIONS', 1);
// increase auto save interval to 3 mins
define('AUTOSAVE_INTERVAL', 120);

/* That's all, stop editing! Happy blogging. */

// Absolute path to the WordPress directory.
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/');
}

// Sets up WordPress vars and included files.
require_once ABSPATH . 'wp-settings.php';
