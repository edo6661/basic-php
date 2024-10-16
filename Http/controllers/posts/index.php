<?php
	
	use Core\Database;
	use Core\App;
	
	$heading = "Posts";
	
	$db = App::resolve(Database::class);
	$posts = $db->query("select * from posts")->findAll();
	
	
	view("posts/index.view.php",[
		"posts" => $posts,
		"heading" => $heading
	])
?>