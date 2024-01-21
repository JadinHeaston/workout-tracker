<?PHP
DEFINE('DEBUG', false);
DEFINE('DISABLE_ERROR_EMAILS', false);
DEFINE('ERROR_EMAIL_ADDRESSES', array('<EMAIL>'));
DEFINE('APP_ROOT', '/');

//SMTP
DEFINE('ENABLE_SMTP', false);
DEFINE('APPLICATION_EMAIL', 'workout_tracker@example.com');

//Database
define('DB_HOST', 'wt-mariadb');
define('DB_USERNAME', '');
define('DB_PASSWORD', '');
define('DB_DATABASE', '');
define('DB_TYPE', 'mysql');
define('DB_PORT', 3306);
define('DB_TRUST_CERT', 1);
define('DB_CHARSET', 'utf8mb4');

//AUTHENTICATION
DEFINE('AUTHENTICATION_ENABLE', true);
