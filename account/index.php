<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once(__DIR__ . '/../includes/loader.php');

if (!isAuthenticated())
	headerExit(APP_ROOT . 'account/login.php');
$user = new User();
$user->loopkup($_SESSION['account']['id']);
require_once(__DIR__ . '/../templates/header.php');

echo <<<HTML
	<main id="account-page">
		<h2>Account</h2>
		<form id="account-information" method="post">
			<label>ID: </label><span>{$user->id}</span>
			<label>Username: </label><input type="text" value="{$user->username}" disabled>
			<label>Email: </label><input type="email" value="{$user->email}" disabled>
			<label>First Name: </label><input type="text" value="{$user->firstName}" disabled>
			<label>Last Name: </label><input type="text" value="{$user->lastName}" disabled>
			<button type="submit">Submit</button>
		</form>
	</main>
	HTML;

require_once(__DIR__ . '/../templates/footer.php');
