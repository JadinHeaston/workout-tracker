<?php
require_once(__DIR__ . '/../includes/loader.php');

if (isset($_POST['type']) && $_POST['type'] === 'login')
{
	$user = new User();

	foreach ($_POST as $key => $value)
	{
		if (property_exists($user, $key))
			$user->$key = $value;
		unset($_POST[$key]);
	}
	if ($user->authenticate() === true)
	{
		$_SESSION['account']['id'] = $user->id;
		$_SESSION['account']['authenticated'] = true;
	}
	else
		$error = 'Invalid credentials. Please try again.';
}

if (isAuthenticated()) //Flipped from normal. A logged in user can't see the login page.
	headerExit(APP_ROOT . 'index.php');

require_once(__DIR__ . '/../templates/header.php');

?>

<main id="account-page">
	<form id="login" method="post">
		<div>
			<?php
			echo file_get_contents(__DIR__ . '/../assets/favicon.svg');
			?>
			<input type="text" name="username" placeholder="Username">
			<input type="password" name="password" placeholder="Password">
			<button type="submit" name="type" value="login">Login</button>
			<hr>
			<a href="<?php echo APP_ROOT; ?>account/new.php" hx-get="<?php echo APP_ROOT; ?>account/new.php" hx-select="main" hx-target="main" hx-swap="outerHTML" hx-push-url="true">New Account</button>
		</div>
	</form>
</main>

<?php require_once(__DIR__ . '/../templates/footer.php'); ?>