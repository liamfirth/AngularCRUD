<?php

/**
 * Map AngularCRUD to the angularcrud class in the lib directory.
 */
Autoloader::map(array(
	'AngularCRUD' => path('bundle') . 'angularcrud' . DS . 'lib' . DS . 'angularcrud.php',
));


/**
 * Returns angularcrud:: as a prefix. Helpful if I need to change
 * the bundle name or directory.
 * 
 * @param  string $string
 * @return string
 */
function _( $string ) {
	return 'angularcrud::' . $string;
}