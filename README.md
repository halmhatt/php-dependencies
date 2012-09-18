Php Dependencies
================

This is a class responsible of solving dependencies. General class but useful for example javascript or css dependencies.

## Usage
The class can be used as the following

```php
<?php
// Require file
require_once('dependencies.php');
	
$dep = new Dependencies();
	
$dep -> add('module-name', array('jquery', 'underscore'));
$dep -> add('jquery');
	
// Then sort the dependencies
foreach($dep -> sort() as $dependency) {
	printf('%s (%s)', $dependency -> name, implode(', ', $dependency -> dependencies));
	echo PHP_EOL;
}
	
/* Results in
	jquery ()
	module-name (jquery, underscore)
*/
?>
```