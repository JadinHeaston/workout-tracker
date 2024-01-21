<?php
require_once(__DIR__ . '/includes/loader.php');

if (!isAuthenticated())
	headerExit(APP_ROOT . 'account/login.php');

require_once(__DIR__ . '/templates/header.php');
?>

<main>
	Plans:
	<ul>
		<li>
			Add last week/month (selectable) step average.
		</li>
		<li>
			Show GitHub like step target grid.
		</li>
		<li>
			Add a "last workout" link.
		</li>
	</ul>
</main>

<?php require_once(__DIR__ . '/templates/footer.php'); ?>