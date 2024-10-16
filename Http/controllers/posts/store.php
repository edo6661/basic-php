<?php
	
	use Core\Validator;
	use Core\Database;
	use Core\App;
	
	$db= App::resolve(Database::class);
	$validator = new Validator();
	
		$title = $_POST["title"];
		
		if(!$validator->string($title, 1, 10)) {
			$errors['title'] = "title min 1, max 10";
		}
		if (empty($errors)) {
			$db -> query("INSERT INTO posts(title,user_id) VALUES(:title, :userId)", [
				"title" => $title,
				'userId' => 1,
			]);
			$title = "";
			header("location: /posts");
			exit();
		}else {
			view("posts/create.view.php", [
					"errors" => $errors,
					"heading" => "Create"
				]
			);
		}
		
		?>