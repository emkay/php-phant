<?php 
require('base.php');
require('math.php');

function map($fn, $list, $new_list=array()) {
	if (!car($list)) {
		return $new_list;
	}
	$new_list[] = $fn(car($list));
	return map($fn, cdr($list), $new_list);
}

function filter($fn, $list, $new_list=array()) {
	if (!car($list)) {
		return $new_list;
	}
	if ($fn(car($list))) {
		$new_list[] = car($list);
	}
	return filter($fn, cdr($list), $new_list);
}

/* @todo: this isn't really what I wanted to acomplish. 
 * It forces the callback to accept value, which is limiting to use. maybe this will change. 
 * Maybe it isn't that bad. I guess time will tell. 
 */
function reduce($fn, $list, $value=null) {
	if (empty($list)) {
		return $value;
	}
	$value = $fn(car($list), $value);
	return reduce($fn, cdr($list), $value);
}

function when($x, $test, $y, $fn, $args=null) {
	if($test($x,$y)) {
		$fn($args);
	}
}

function pick($n, $lat) {
	return is_zero(sub($n, 1)) ? 
		car($lat) :
		pick(sub($n, 1), cdr($lat));
}

function is_member($a, $lat) {
	return empty($lat) ? 
		false : 
		(eq(car($lat), $a) ? 
			true : 
			is_member($a, cdr($lat)));
}

function rember($a, $lat) {
	return empty($lat) ? 
		array() : 
		(eq(car($lat), $a) ? 
			cdr($lat) : 
			cons(car($lat), rember($a, cdr($lat))));
}

function firsts($list) {
	return empty($list) ? 
		array() : 
		cons(car(car($list)), firsts(cdr($list)));
}

function insertR($new, $old, $lat) {
	return empty($lat) ? 
		array() : 
		(eq(car($lat), $old) ? 
			cons($old, cons($new, cdr($lat))) : 
			cons(car($lat), insertR($new, $old, cdr($lat))));
}

function insertL($new, $old, $lat) {
	return empty($lat) ? 
		array() : 
		(eq(car($lat), $old) ? 
			cons($new, cons($old, cdr($lat))) : 
			cons(car($lat), insertL($new, $old, cdr($lat))));
}

function subst($new, $old, $lat) {
	return empty($lat) ? 
		array() : 
		(eq(car($lat), $old) ? 
			cons($new, cdr($lat)) : 
			cons(car($lat), subst($new, $old, cdr($lat))));
}

/* this has to be here. because of the limitations on using print() for callback functions this is used as a wrapper to circumvent that problem. */
function print_it($it) {
	print($it);
}

function list_length($s, $length=0) {
	return car($s) ? 
		list_length(cdr($s), add(1, $length))  : 
		$length;
}

function string_length($s) {
	if (!is_string($s)) {
		return false;
	}
	$s = str_split($s);
	return list_length($s);
}

function occur($a, $lat) {
	return empty($lat) ? 
		0 : 
		(eq(car($lat), $a) ? 
			add(1, occur($a, cdr($lat))) : 
			occur($a, cdr($lat)));
}

function leftmost($list) {
	return is_atom(car($list)) ? 
		car($list) : 
		leftmost(car($list));
} 

?>
