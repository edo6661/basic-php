<?php
	use Core\Database;
	use Core\Validator;
	
	$heading = "CREATE POST";
	
	view("posts/create.view.php",[
		"heading" => $heading,
		"title" => ""
	])

?>