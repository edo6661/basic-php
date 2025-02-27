<?php
	
	namespace Core;
	
	use PDO;
	
	class Database
	{
		public $connection;
		public $statement;
		
		
		public function __construct($config)
		{
//	$dsn = "mysql:host=localhost;port=3306;dbname=shaka;user=root;charset=utf8mb4";
			//!  same thing
			$dsn = "mysql:" . http_build_query($config, '', ';');
			$this -> connection = new PDO($dsn, "root", "", [
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			]);
		}
		
		
		public function query($query, $params = [])
		{
			$this -> statement = $this -> connection -> prepare($query);
			$this -> statement -> execute($params);
			return $this;
		}
		
		public function getById($query, $params = [])
		{
			$this -> statement = $this -> connection -> prepare($query);
			$this -> statement -> execute($params);
			return $this;
		}
		
		public function find()
		{
			return $this -> statement -> fetch();
		}
		
		public function findAll()
		{
			return $this -> statement -> fetchAll();
		}
		
		public function findOrFail()
		{
			$result = $this -> statement -> fetch();
			if (!$result) return abort(Response::NOT_FOUND);
			return $result;
		}
	}
	
	?>