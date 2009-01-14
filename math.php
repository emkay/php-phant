<?php
/* These math functions do use the php math operators. The only built in function I think that is used in this code is is_null.
 */
function eq($x, $y) {
	return $x == $y;
}

function neq($x, $y) {
	return $x != $y;
}

function lt($x, $y) {
	return $x < $y;
}

function lte($x, $y) {
	return $x <= $y;
}

function gt($x, $y) {
	return $x > $y;
}

function gte($x, $y) {
	return $x >= $y;
}

function is($x, $y) {
	return $x === $y;
}

function is_not($x, $y) {
	return $x !== $y;
}

function divisable($x,$y) {
	if (($x % $y) == 0) {
		return true;
	}
	return false;
}

function not_divisable($x, $y) {
	return !divisable($x, $y);
}

function is_zero($a) {
	return is($a, 0);
}

/* @todo: refactor these. They are so alike that they could probably be the same function. need to figure out the operator. 
 * I'm also thinking if I should write these functions in a way that does not use the mathimatical operators. That should probably happen.
 */

function sum_list($list, $total=0) {
	return car($list) ? 
		sum_list(cdr($list), $total + car($list)) : 
		$total;
}

function sub_list($list, $total=null) {
	if (!car($list)) {
		return $total;
	}
	$total = is_null($total) ? car($list) : $total - car($list);
	return sub_list(cdr($list), $total);
}

function mul_list($list, $total=null) {
	if (!car($list)) {
		return $total;
	}
	$total = is_null($total) ? car($list) : $total * car($list);
	return mul_list(cdr($list), $total);
}

function add() {
	$numbers = func_get_args();
	return sum_list($numbers);
}

function sub() {
	$numbers = func_get_args();
	return sub_list($numbers);
}

function mul() {
	$numbers = func_get_args();
	return mul_list($numbers);
}

function div($x, $y) {
	return lt($x, $y) ? 
		0 : 
		add(1, div(sub($x, $y), $y));
}
?>
