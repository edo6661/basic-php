<?php
	
	use Http\Forms\LoginForm;
	use Core\Authenticator;
	
	require_once basePath('utils/redirect.php');
	
	$form = LoginForm ::validate($attributes = [
		'email' => $_POST['email'],
		'password' => $_POST['password']
	]);
	
	$isAttempSuccess = (new Authenticator()) -> attempt($attributes['email'], $attributes['password']);
	
	if (!$isAttempSuccess) {
		$form -> error('email', 'no matching account for that email and password')
			-> throw();
	}
	redirect('/');


?>