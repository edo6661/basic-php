<?php
	
	namespace Core\Middleware;
	
	class Auth
	{
		public function handle(){
			if(false ?? ! $_SESSION['user']){
				header('location: /');
				exit();
			}
			
		}
		
	}