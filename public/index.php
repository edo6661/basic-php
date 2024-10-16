<?php
	
	use Core\Router;
	use Core\Session;
	use Core\ValidationException;
	
	session_start();
	const BASE_PATH = __DIR__ . '/../';
	// autoload baru
	
	require BASE_PATH . 'vendor/autoload.php';
	
	// tujuannya agar cuman ngambil path nya
	$requestedPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	
	
	require BASE_PATH . 'utils/basePath.php';
	require basePath('utils/view.php');
	require basePath('utils/dd.php');
	
	// ! auto load lama, yang baru bakal di handle ama composer
//	spl_autoload_register(function ($class) {
//		$result = str_replace('\\', DIRECTORY_SEPARATOR, $class);
//		require basePath("{$result}.php");
//	});
	
	require basePath("config/initializeContainer.php");
	
	$router = new Router();
	require basePath('route/routes.php');
	
	$method = isset($_POST["_method"]) ? $_POST["_method"] : $_SERVER['REQUEST_METHOD'];
	
	
	try {
		$router -> route($requestedPath, $method);
	} catch (ValidationException $e) {
		Session ::flash('errors', $e -> getErrors());
		Session ::flash('old', $e -> getOld());
		redirect(Router ::previousUrl());
	}
	
	
	Session ::unflash();


?>