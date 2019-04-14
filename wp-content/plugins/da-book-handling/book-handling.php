<?php
/*
Plugin Name: Book-handling
Description: Handles the custom type books.
Version: 1.0
Author: Daniel Andersen
Author URI: http://dnest.se/
*/

/**
 * Advanced Custom Field settings
 * Based on their own documentation. Only works with Classic Editor.
 */
add_filter('acf/validate_value/name=isbn', 'da_acf_validate_isbn', 10, 4);

function da_acf_validate_isbn($valid, $value, $field, $input){
	// bail early if value is already invalid
	if(!$valid) {
		return $valid;
	}
	
	if (strlen($value) < 9) {
		$valid = 'ISBN-nummret måste vara minst 9 tecken, högst 10!';	
	}
	
	// return
	return $valid;
}