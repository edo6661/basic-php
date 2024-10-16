<?php
	use Core\Response;
//	$routes = [
//		$basePath => 'controllers/index.php',
//		$basePath . $aboutPath => 'controllers/about.php',
//		$basePath . $contactPath => 'controllers/contact.php',
//		$basePath . $postsPath => 'controllers/posts/index.php',
//		$basePath . $postPath => 'controllers/posts/show.php',
//		$basePath . $createPostPath => 'controllers/posts/create.php',
//	];
	function abort($code = Response::NOT_FOUND)
	{
		http_response_code($code);
		require "controllers/status/$code.php";
		die();
	}
	
	function routeToController($requestedPath, $routes)
	{
		// Fungsi array_key_exists() digunakan untuk memeriksa apakah suatu key (kunci) tertentu ada dalam sebuah array
		// Fungsi ini memeriksa apakah $requestedsPath (misalnya /seperatedLogic/about.php) ada sebagai key di dalam array $routes.
		if (array_key_exists($requestedPath, $routes)) {
			require $routes[$requestedPath];
		} else {
			// kalo di inspect element, bakal ada GET (url,dll), status not found
			abort();
		}
	}

?>