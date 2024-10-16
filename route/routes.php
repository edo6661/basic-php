<?php
	
	use Core\Router;
	
	$router = new Router();
	
	$router -> get('/', "index.php");
	$router -> get('/about', "about.php");
	$router -> get('/contact', "contact.php");
	$router -> get('/posts', "posts/index.php");
	$router -> get('/post', "posts/show.php");
	$router -> delete('/post', "posts/destroy.php");
	$router -> patch('/post', "posts/update.php");
	$router -> get('/posts/create', "posts/create.php")->only('auth');
	$router -> post('/posts/create', "posts/store.php");
	
	//	auth
	$router -> get('/register', "auth/register.php")->only("guest");
	$router -> post('/register', "auth/signUp.php");
	$router -> get('/login', "auth/login.php")->only("guest");
	$router -> post('/login', "auth/signIn.php");
	$router -> post('/logout', "auth/signOut.php");
	
	
	//	! router lama
	
	//	$routes = [
	//		"/" => basePath('index.php'),
	//		"/about" => basePath('about.php'),
	//		"/contact" => basePath('contact.php'),
	//		"/posts" => basePath('posts/index.php'),
	//		"/post" => basePath('posts/show.php'),
	//		"/posts/create" => basePath('posts/create.php'),
	//	];
	//
	//	routeToController($requestedPath, $routes);
?>
