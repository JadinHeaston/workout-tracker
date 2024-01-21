<?php
require_once(__DIR__ . '/../includes/loader.php');

if (!isAuthenticated())
	headerExit(APP_ROOT . 'account/login.php');
$user = new User();
$user = $user->loopkup($_SESSION['account']['id']);
var_dump($_SESSION);
require_once(__DIR__ . '/../templates/header.php');

echo <<<HTML
	<main>
		<h2>Account</h2>
	</main>
	HTML;

require_once(__DIR__ . '/../templates/footer.php');
