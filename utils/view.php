<?php
	function view($path, $data = []) {
		extract($data);
		require basePath('views/'. $path);
	}
?>