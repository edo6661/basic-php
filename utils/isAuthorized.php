<?php
	use Core\Response;
function isAuthorized($condition,$status = Response::FORBIDDEN) {
	if(!$condition) {
		abort($status);
	}
}
function abort($code) {
	http_response_code($code);
	require basePath("controllers/status/$code.php");
	die();
	
}
?>