<?php
	
	namespace Core;
	use Core\Database;
	use Core\Session;
	class Authenticator
	{
		public  function attempt($email,$password) {
			$userExist = App::resolve(Database::class) -> query("SELECT * FROM users WHERE email = :email", ["email" => $email]) -> find();
			if($userExist) {
				if(password_verify($password,$userExist['password'])) {
					$this->login($userExist['id'],$userExist['email']);
					return true;
				}
			}
			return false;
		}
		
		public function login($id, $email) {
			$_SESSION["user"] = [
				"id" => $id,
				"email" => $email,
			];
			session_regenerate_id(true);
		}
		
		public static function logout() {
			Session::destroy();
			
			header('location: /');
			exit();
			
		}
		
	}