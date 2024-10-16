<?php
	function isActive($path)
	{
		$currentPath = $_SERVER["REQUEST_URI"];
		echo $currentPath == $path ? "text-blue-500" : "hover:text-blue-500";
	}
?>