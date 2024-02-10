<?php
require_once(__DIR__ . '/../includes/loader.php');

if (isset($_POST['type']) && $_POST['type'] === 'create')
{
	$user = new User();

	foreach ($_POST as $key => $value)
	{
		if (property_exists($user, $key))
			$user->$key = $value;
		unset($_POST[$key]);
	}

	if ($user->createAccount() === true)
	{
		$_SESSION['account']['authenticated'] = true;
		headerExit(APP_ROOT . 'index.php');
	}
	else
		$error = 'Invalid credentials. Please try again.';
}

if (isAuthenticated())
	headerExit(APP_ROOT . 'index.php');

require_once(__DIR__ . '/../templates/header.php');

?>

<main id="account-page">
	<form id="login" method="post">
		<input type="text" name="username" placeholder="Username" maxlength="64">
		<input type="password" name="password" placeholder="Password">
		<input type="text" name="firstName" placeholder="First" maxlength="64">
		<input type="text" name="lastName" placeholder="Last" maxlength="64">
		<input type="email" name="email" placeholder="Email" maxlength="254">
		<div>
			<button type="submit" name="type" value="create">Create Account</button>
			<a href="<?php echo APP_ROOT; ?>account/login.php" hx-get="<?php echo APP_ROOT; ?>account/login.php" hx-select="main" hx-target="main" hx-swap="outerHTML" hx-push-url="true">Sign in with existing account</button>
		</div>
	</form>
</main>

<!-- Preventing POST resubmission -->
<script>
	if (window.history.replaceState)
		window.history.replaceState(null, null, window.location.href);
</script>

<?php require_once(__DIR__ . '/../templates/footer.php'); ?>