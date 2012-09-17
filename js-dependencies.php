<?php 
/**
 * Extends the Dependencies class and adds functionality for javascript files
 */
class JSDependencies extends Dependencies {
	
	/**
	 * Add javascript source
	 */
	public function add($name, $url, $dependencies = array()) {
		// If dependencies is a string, split into array
		if(gettype($dependencies) == 'string') {
			$dependencies = preg_split('/,\s?/', $dependencies);
		}
		
		// Add 
		$this -> sources[$name] = (object) array(
			'name' => $name, 
			'url' => $url,
			'dependencies' => (array) $dependencies
		);
	}
	
	/**
	 * Create script element
	 */
	public function script_tag($attributes, $body = '') {
		$tag = '<script %s>%s</script>';
		$attributeStrings = array();
		
		foreach($attributes as $key => $val) {
			if(gettype($val) == 'array') {
				$val = implode(',', $val);
			}
			
			$attributeStrings[] = sprintf('%s="%s"', $key, $val);
		}
		
		return sprintf($tag, implode(' ', $attributeStrings), $body);
	}
	
	/**
	 * Print dependencies
	 */
	public function print_dependencies() {
		$sorted = $this -> sort();
		
		foreach($sorted as $source) {
			echo $this -> script_tag(array(
				'id' => $source -> name,
				'src' => $source -> url,
				'data-dependencies' => $source -> dependencies
			));
			echo PHP_EOL;
		}
	}
} 


?>