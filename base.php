<?php
/* The goal here is to define some base functions to use to build up the system from the bottom. 
 * I tried to use as little built-in functions as possible, but some were unavoidable. When I did have to use them 
 * I attempted to only use those that I thought were pretty standard, such as array_[un]shift, is_numeric, and is_string. The lambda functionality 
 * is stolen from http://functional-php.sourceforge.net/show_source.php/functional.php. I slightly modified them to fit my needs better.
 * I started implementing it on my own, ran into a wall, did some googling and found that. 
 */
function is_atom($a) {
	return is_numeric($a) || is_string($a);
}

function is_lat($list) {
	return is_null($list) ? 
		true : 
		(is_atom(car($list)) ? 
			is_lat(cdr($list)) : 
			false);
}

function car($list) {
	$new_list = $list;
	return array_shift($new_list);
}

function cdr($list) {
	$new_list = $list;
	array_shift($new_list); //@todo: don't want to use array_shift.
	return $new_list;
}

function cons($value, $list) {
	$new_list = $list;
	array_unshift($new_list, $value); //@todo: don't want to use array_unshift.
	return $new_list;
}

function caar($list) {
	return car(car($list));
}

function cadr($list) {
	return car(cdr($list));
}

/* returns a list of ($k, $v) of the car of the hash. */
function hashcar($hash) {
	$new_hash = $hash;
	list($k, $v) = each($new_hash);
	return array($k, $v);
}

/* stole and modified these from http://functional-php.sourceforge.net/show_source.php/functional.php */
function def_fun($name, $args, $code) {
	@eval( "function $name ($args) { $code }");
	if (!function_exists($name)) {
		die("Failed to define function: \n\nfunction $name ($args) {\n\n$code\n\n}");
	}
}

function lambda($args, $expr) {
	$name = gensym();
	def_fun($name, $args, "return $expr;");
	return $name;
}

function gensym() {
	$number = rand();
	return "__lambda_$number";
}

// one argument lambda.
function fx($body) {
	return lambda('$x', $body);
}

?>
