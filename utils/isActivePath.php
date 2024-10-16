<?php
	function isActivePath($path)
	{
		$requestedPath = $_SERVER['REQUEST_URI'];
		echo $requestedPath == $path ? "text-blue-500" : "hover:text-blue-500";
	}

?>