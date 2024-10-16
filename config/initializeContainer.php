<?php
use Core\Container;
use Core\Database;
use Core\App;

$c = new Container();
$c->bind("Core\Database", function () {
	$dbConfig = require basePath("config/db.php");
	return new Database($dbConfig["database"]);
});

App::setContainer($c);

?>