<?php
	
	use Core\Database;
	use Core\App;
	require basePath('utils/isAuthorized.php');
	
	$db= App::resolve(Database::class);
	
	$id = $_POST['id'];
	$currentUserId = 1;
	
	
	$post = $db -> getById("select * from posts where id = :id",
		['id' => $id]) -> findOrFail();
	
	
	isAuthorized($currentUserId === $post["user_id"]);
	
	$db -> query("DELETE FROM posts where id = :id", ['id' => $id]);
	header('location: /posts');
	exit();


?>