<?php
require_once(__DIR__ . '/../includes/loader.php');
$_SESSION['account']['authenticated'] = false;
headerExit(APP_ROOT . 'account/login.php');
