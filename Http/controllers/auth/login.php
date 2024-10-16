<?php
	
	use Core\App;
	use Core\Database;
	use Core\Session;
	
	$db = App ::resolve(Database::class);
	view("auth/login.view.php", [
		'errors' => Session ::get('errors') ?? [],
		'email' => Session ::getOld('email') ?? '',
	]);
?>