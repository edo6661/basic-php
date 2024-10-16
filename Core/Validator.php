<?php
	namespace Core;
class Validator {
	public function string($value, $min = 1, $max = INF) {
		$val = trim($value);
		return strlen($val) >= $min && strlen($val) <= $max;
	}
	public function email($value) {
		return filter_var($value, FILTER_VALIDATE_EMAIL);
	}
	public function greaterThan($value, $min) {
		return $value > $min;
	}
}
?>