<?php
	
	use Core\App;
	use Core\Database;
	use Core\Validator;
	
	$db = App ::resolve(Database::class);
	$validator = new Validator();
	
	$email = $_POST["email"];
	$password = $_POST["password"];
	
	function returnView($errors
	) {
		view('auth/register.view.php', [
			'errors' => $errors,
		]);
	}
	
	$errors = [];
	if (!$validator -> email($email)) {
		$errors["email"] = "please make sure correct format email";
		return returnView($errors);
	}
	if (!$validator -> string($password, 1, 6)) {
		$errors["password"] = "min 1 max 6 characters";
		return returnView($errors);
	}
	if (!empty($errors)) {
		return returnView($errors);
	}
	
	
	$userExist = $db -> query("SELECT * FROM users WHERE email = :email", ["email" => $email]) -> find();
	if ($userExist) {
		$errors["email"] = "email already exists";
		return returnView($errors);
	}
	
	$db -> query("INSERT INTO users(email,admin,password) VALUES (:email,:admin, :password)", [
		"email" => $email,
		"admin" => 1,
		"password" => password_hash($password, PASSWORD_DEFAULT)
	]);
	$_SESSION["user"] = [
		"id" => $userExist["id"],
		"email" => $userExist["email"],
	];
	header("location: /");
	exit();


?>