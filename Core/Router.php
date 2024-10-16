<?php
	
	namespace Core;
	
	use Core\Middleware\Middleware;
	
	class Router
	{
		protected $routes = [];
		
		public function add($method, $uri, $controller)
		{
			$this -> routes[] = [
				'uri' => $uri,
				'method' => $method,
				'controller' => $controller,
				'middleware' => null,
			];
			return $this;
		}
		
		public function only($key)
		{
			$this -> routes[array_key_last($this -> routes)]['middleware'] = $key;
			return $this;
		}
		
		public function get($uri, $controller)
		{
			return $this -> add("GET", $uri, $controller);
		}
		
		public function post($uri, $controller)
		{
			return $this -> add("POST", $uri, $controller);
		}
		
		public function patch($uri, $controller)
		{
			return $this -> add("PATCH", $uri, $controller);
		}
		
		public function put($uri, $controller)
		{
			return $this -> add("PUT", $uri, $controller);
		}
		
		public function delete($uri, $controller)
		{
			return $this -> add("DELETE", $uri, $controller);
		}
		
		public function route($uri, $method)
		{
			foreach ($this -> routes as $route) {
				if ($route['uri'] === $uri && $route['method'] === $method) {
					Middleware ::resolve($route['middleware']);
					return require basePath('Http/controllers/' . $route['controller']);
				}
			}
			$this -> abort(Response::NOT_FOUND);
		}
		
		public function abort($code)
		{
			http_response_code($code);
			require basePath("controllers/status/$code.php");
			die();
		}
		public static function previousUrl() {
			return $_SERVER['HTTP_REFERER'];
		}
	}
	
	?>