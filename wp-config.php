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
 * @category Regane_Store
 * @package  Regane_Store
 * @author   Regame <regame@regame.store>
 * @license  N/A http://
 * @link     https://codex.wordpress.org/Editing_wp-config.php
 */

// load composer dependencies
require_once __DIR__ . '/vendor/autoload.php';

$onProd = false;
$THEME_DIR = getenv('THEME_DIR');
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
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */

define('AUTH_KEY',         'XO+EmIWVlXa7uSR5cE7rzihlngPyObiREX9ClxM291PNUMZ1FN8IK0EDGmlGy66PsQjoUeGGmtvJ/OnR');
define('SECURE_AUTH_KEY',  'nmQL19in8S9tersN4ysI6U4spGcf4RCrjjuNDdrPUqDLYPlBujJnVvYU+Np7uNiMKs5qCQYZqsg/ZFyX');
define('LOGGED_IN_KEY',    '5NFDj+3Iz8uG/EMMm363TYJGCRQFt66sOhTlKVdTkQqkiWK4zVeBhio5wp3mMzm2XOTB2JV4G6iN+6ol');
define('NONCE_KEY',        '7MVmYrOsTocUvpnJlAOP/ymS3Ck8TOiEdKizCmyLJsl70h+31LAcFqNpy0PltDOybzP4+rbzN8oEKqqj');
define('AUTH_SALT',        'Vy/Etjv+SMIkkDaTVGOTqIftD4qasF1gq6HW6nKjHjV0rJVVPB1z20WSfrlqa6JdI/ED9H/aIfn4rrel');
define('SECURE_AUTH_SALT', '7lFSSDmIIKyDZuZlajEV31ZY47rY/HG44VXUI6XRHr8htNEQjMmkCOdKJkQJBsrUe2JHlwG2hljguuIk');
define('LOGGED_IN_SALT',   'f4Q55MjWElhR6OWKo/LuU3GAbJDrwB62fteTQSJtwuG1Auj0aS7u3SH6bUcmR2H+v/zwLr9dvhY+0Rzg');
define('NONCE_SALT',       'HVnDbLlDRBonYWoCX8/8LsPbOZtWBrV8EGxGexIUuU51VrR3/7yif2FDpgklYVpk2uN6vOnZ0IlWpB12');

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
define('WP_DEBUG', !$onProd);
define('WP_MEMORY_LIMIT', '512M');
// activate default theme
if ($THEME_DIR) {
    define('WP_DEFAULT_THEME_DIR', $THEME_DIR);
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
