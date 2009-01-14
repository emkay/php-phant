<?php
require('phpphant.php');

//callback for test
function mul5($n) {
	return $n * 5;
}

// examples
print(cadr(array('one','two','three','four')));
//print_r(caar(array(array('one','two'),array('three'))));
/*
print_r(firsts(array(
	array('apple', 'peach', 'pumpkin'), 
	array('plum', 'pear', 'cherry'),
	array('grape', 'raisin', 'pea'))));
*/

//print(pick(3, array('first', 'second', 'third', 'fourth')));

//print_r(leftmost(array(array('potato'), array('chips', array(array('with'), array('fish')), array('chips')))));
//print(occur('a', array('a','b','a','a')));
//print_r(insertR('new', 'old', array('old', 'no', 'yes', 'old')));

//print(is_member('something', array('nothing', 'no', 'yes')));
//print_r(rember('a', array('a','b','a','c','d','a','e','f','a','f','d')));

//$mul = mul(4,5,6,7,8,9);
//print($mul);

//print(mul_list(array(5,5)));

//$sum = add(1,5);
//print($sum);

//$sub = sub(10,8);
//print($sub);

//print(sub_list(array(10,1)));

//$sum = sum_list(array(5,5,10));
//print($sum);

//$numbers = map($mul5, range(1, 100));
//$numbers = map(fx('$x*5'), range(1,100));
//print_r($numbers);

//print(string_length('this is some string!!!'));
//print(list_length(array('a','b','c', 'd', 'e', 'f', 'g')));

/*
foreach (range(1,100) as $number) {
	when($number, gte, 50, print_it, $number);
}
*/

//$numbers = filter(fx('$x == 5 || $x == \'a\''), array('z',1,2,3,4,5,'a','b',6,7,8,9,'c'));
//print_r($numbers);

/*
$somearray = cons('a', array());
$somearray = cons('b', $somearray);
$somearray = cons('c', $somearray);
$somearray = cdr($somearray);
print_r($somearray);
*/

/*
function adder($x) {
	return lambda('$n', '$n + ' . $x);
}

$add5 = adder(5);
print($add5(5));
*/

?>
