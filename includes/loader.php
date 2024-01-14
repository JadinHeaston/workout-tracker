<?PHP
//Starting session.
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start();
require_once(__DIR__ . '/config.php');
if (DEBUG === true) require_once(__DIR__ . '/debug.php');
require_once(__DIR__ . '/enumerators.php');
require_once(__DIR__ . '/globals.php');
require_once(__DIR__ . '/functions.php');
require_once(__DIR__ . '/models.php');
$connection = new WTConnector(DB_TYPE, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD, DB_CHARSET, DB_TRUST_CERT);
