<?php
require_once('dependencies.php');
require_once('js-dependencies.php');

$dep = new Dependencies();

$dep -> add('jquery');
$dep -> add('my-script', array('jquery', 'my-first'));
$dep -> add('my-first', array('jquery'));

// Or dependencies as a string
$dep -> add('awsome', 'jquery, my-script');

foreach($dep -> sort() as $dependency) {
	echo $dependency -> name . ' (' . join(', ', $dependency -> dependencies) .')' . PHP_EOL;
}


$js = new JSDependencies();
$js -> add('jquery', 'home/jquery.js');
$js -> add('myname', 'home/my.js', array('jquery'));
$js -> print_dependencies();
?>