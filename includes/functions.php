<?PHP

/**
 * Converts a number of seconds into a human readable format.
 *
 * @param integer $seconds
 * @return string
 */
function secondsToHumanTime(int $seconds): string
{
	if ($seconds >= 86400)
		$format[] = '%a day' . ($seconds > 86400 * 2 ? 's' : '');
	if ($seconds >= 3600)
		$format[] = '%h hour' . ($seconds > 3600 * 2 ? 's' : '');
	if ($seconds >= 60)
		$format[] = '%i minute' . ($seconds > 60 * 2 ? 's' : '');
	$format[] = '%s ' . ($seconds !== 1 ? 'seconds' : 'second');

	$dateHandle = new DateTime('@0');
	return str_replace(' 1 seconds', ' 1 second', $dateHandle->diff(new DateTime("@$seconds"))->format(implode(', ', $format)));
}

/**
 * Determines if a request is made by HTMX.
 *
 * @return boolean
 */
function isHTMX(): bool
{
	$headers = getallheaders();
	return ($headers !== false && isset($headers['Hx-Request']) && boolval($headers['Hx-Request']) === true);
}


/**
 * Checks if a user has been previously authenticated.
 *
 * @return boolean
 */
function isAuthenticated(): bool
{
	if ((AUTHENTICATION_ENABLE === false) || (isset($_SESSION['account']['authenticated']) && $_SESSION['account']['authenticated'] === true))
		return true;
	else
		return false;
}

/**
 * Authenticates a user.
 *
 * @return boolean
 */
function authenticate(string $username, string $password): bool
{
	global $connection;

	$user = $connection->select('SELECT password FROM User WHERE username = ?', array($username));
	if ($user === false || count($user) !== 1)
		return false;
	$user = $user[0];
	return password_verify($password, $user['password']);
}

function headerExit(string $destination): void
{
	header('Location: ' . $destination);
	exit(1);
}

function rotate(array $array)
{
	array_unshift($array, null);
	$array = call_user_func_array('array_map', $array);
	$array = array_map('array_reverse', $array);
	return $array;
}

function getAllPermission(): array
{
	global $connection;
	$output = array();

	$results = $connection->select('SELECT * FROM Permission');
	if ($results === false)
		throw new Exception('Query failed. Contact adminstrator.');
	foreach ($results as $row)
	{
		$output[] = Permission::from($row['id']);
	}
	return $output;
}

function getAllPriority(): array
{
	global $connection;
	$output = array();

	$results = $connection->select('SELECT * FROM Priority');
	if ($results === false)
		throw new Exception('Query failed (Priority). Contact adminstrator.');
	foreach ($results as $row)
	{
		$output[] = Priority::from($row['id']);
	}
	return $output;
}

function getAllType(): array
{
	global $connection;
	$output = array();

	$results = $connection->select('SELECT * FROM Type');
	if ($results === false)
		throw new Exception('Query failed (Type). Contact adminstrator.');
	foreach ($results as $row)
	{
		$output[] = Type::from($row['id']);
	}
	return $output;
}

function getAllStatus(): array
{
	global $connection;
	$output = array();

	$results = $connection->select('SELECT * FROM Status');
	if ($results === false)
		throw new Exception('Query failed (Status). Contact adminstrator.');
	foreach ($results as $row)
	{
		$output[] = Status::from($row['id']);
	}
	return $output;
}

function getAllResult(): array
{
	global $connection;
	$output = array();

	$results = $connection->select('SELECT * FROM Result');
	if ($results === false)
		throw new Exception('Query failed (Result). Contact adminstrator.');
	foreach ($results as $row)
	{
		$output[] = Result::from($row['id']);
	}
	return $output;
}

function getAllUser(): array
{
	global $connection;
	$output = array();

	$results = $connection->select('SELECT * FROM User');
	if ($results === false)
		throw new Exception('Query failed (User). Contact adminstrator.');
	foreach ($results as $row)
	{
		$output[] = new User($row);
	}
	return $output;
}
