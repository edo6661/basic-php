<?php
	
	namespace Http\Forms;
	
	use Core\ValidationException;
	use Core\Validator;
	
	class LoginForm
	{
		protected $errors = [];
		
		public function __construct(public array $attributes)
		{
			$validator = new Validator();
			if (!$validator -> email($attributes['email'])) {
				$this -> error('email', "please make sure correct format email");
			}
			if (!$validator -> string($attributes['password'], 1, 6)) {
				$this -> error('password', "min 1 max 6 characters");
			}
		}
		
		public static function validate($attributes)
		{
			$instance = new static($attributes);
			return $instance -> hasError() ? $instance -> throw() : $instance;
		}
		
		public function throw()
		{
			ValidationException ::throw($this -> getErrors(), $this -> attributes);
		}
		
		public function hasError()
		{
			return count($this -> errors);
		}
		
		public function getErrors()
		{
			return $this -> errors;
		}
		
		public function error($field, $message)
		{
			$this -> errors[$field] = $message;
			return $this;
		}
		
	}