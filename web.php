<?php
require_once('phpphant.php');
require_once('urls.php');

function doctype() {
	return '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">\n';
}

function html_encode($s) {
	return htmlentities($s, ENT_QUOTES, 'UTF-8') ;
}

function linker($words, $href, $attributes=array()) {
	$href = 'href=' . "'$href'";
	return tag('a', $words, cons($href, $attributes));
}

function tag($tag, $body, $attributes=array(), $print=false) {
	return start_tag($tag, $attributes) . html_encode($body) . end_tag($tag);
}

function start_tag($tag, $attributes=array()) {
	$ret = '<' . $tag;
	if (!empty($attributes)) {
		$ret .= ' ';
		$ret .=  reduce(lambda('$x, $y', '$x . \' \' . $y'), $attributes);
	}
	$ret .= '>';
	return $ret;
}

function end_tag($tag) {
	return '</' . $tag . '>';
}

function print_br($it) {
	print($it . '<br/>');
}

function ul($elements, $name=null) {
	print(start_tag('ul', isset($name) ? array('name' => $name) : array()));
	$lis = map(li, $elements);
	map(print_it, $lis);
	print(end_tag('ul'));
}

function li($body) {
	return tag('li', $body);
}

function form($name, $fields, $action='post') {
	print(start_tag('form', array('name' => $name, 'action' => $action)));
	map(print_it, $fields);
	print(end_tag('form'));
}

function fieldize($name, $type='text', $ret=array()) {
	$ret[] = label($name, strtolower($name)) . 
		print_br() .
		input($name, $type);
	return $ret;	
}

function label($name, $for) {
	return tag('label', $name, array('for' => $for));
}

function input($name, $type='text', $class=null) {
	return tag('input', '', array('type' => $type));
}

?>
