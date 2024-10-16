<?php
	
	use Core\Validator;
	
	
	it("it should validate input string", function () {
		$v = new Validator();
		$inputString = "ab";
		
		$result = $v -> string($inputString, 2, 10);
		
		expect($result) -> toBe(true);
	});
	
	it("it should validate that first paramss is greater than second param", function () {
		$v = new Validator();
		$n = 10;
		$min = 11;
		
		$result = $v -> greaterThan($n, $min);
		expect($result) -> toBe(false);
		
	}) -> only();


?>