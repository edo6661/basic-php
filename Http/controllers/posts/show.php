<?php
	use Core\Database;
	require basePath('utils/isAuthorized.php');
	
	
	$heading = "Post";
	
	
	$configDb = require basePath("config/db.php");
	$db = new Database($configDb["database"]);
	
	$id = $_GET["id"];
	$currentUserId = 1;
	
		$post = $db -> getById("select * from posts where id = :id",
			['id' => $id]) -> findOrFail();
		
		isAuthorized($currentUserId === $post["user_id"]);
	
	view("posts/show.view.php", [
		"post" => $post,
		"heading" => $heading,
	])
?>