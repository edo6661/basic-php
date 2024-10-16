<?php
	
	use Core\Container;
	
	it("it should resolve something out of the container", function () {
		$container = new Container();
		
		// ! key foo returning function with return type of string = bar
		$container -> bind('foo', fn () => 'bar');
		// ! result key of foo should be returning function with return of = bar
		$result = $container -> resolve('foo');
		expect($result) -> toBe('bar');
	})

?>