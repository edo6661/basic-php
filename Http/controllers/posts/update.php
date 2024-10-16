<?php
	
	use Core\Database;
	use Core\Validator;
	use Core\App;
	require basePath('utils/isAuthorized.php');
	
	$validator = new Validator();
	
	
	$db= App::resolve(Database::class);
	
	$currentUserId = 1;
	
	$id = $_POST['id'];
	$title = $_POST['title'];
	$userId = $_POST['user_id'];
	
	$editedPost = $db -> getById("select * from posts where id = :id", [
		"id" => $id
	]) -> findOrFail();
	
	isAuthorized($editedPost['id']=== $currentUserId);
	
	if (!$validator -> string($title, 1, 10)) {
		$errors['title'] = "title min 1, max 10";
		view("posts/show.view.php", [
			"post" => $editedPost,
			"title" => $title,
			"errors" => $errors,
			"heading" => "Post",
		]);
	} else {
		$db -> query("UPDATE posts SET title = :title, user_id = :user_id WHERE id = :id", [
			"id" => $id,
			"title" => $title,
			"user_id" => $userId
		]);
		
		header("location: /posts ");
	}


?>