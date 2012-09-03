<?php

return array(
	
	'tables' => array(
		
		'guests' => array(
			
			/*
			|--------------------------------------------------------------------------
			| Listing fields
			|--------------------------------------------------------------------------
			| 
			| List of columns to be displayed on the main page of the CRUD interface.
			| Leaving the array empty will display all the columns in the database
			| table. It's probably best to specify which columns to display.
			| 
			| Example:
			| 			'listing' => array( 'id' , 'name' , 'email' ),
			| 
			*/
			'listing' => array(),
			
			/*
			|--------------------------------------------------------------------------
			| Create fields
			|--------------------------------------------------------------------------
			| 
			| Which fields to display when creating a new record.
			| 
			| Example:
			| 			'create' => array( 'name' , 'email' ),
			| 
			*/
			'create' => array(),
			
			/*
			|--------------------------------------------------------------------------
			| Update fields
			|--------------------------------------------------------------------------
			| 
			| Which fields to display when updating a record.
			| 
			| Example:
			| 			'update' => array( 'name' , 'email' ),
			| 
			*/
			'update' => array(),
			
			/*
			|--------------------------------------------------------------------------
			| Validation
			|--------------------------------------------------------------------------
			| 
			| Validation rules against specific fields. Follows the Laravel validation
			| rules.
			| 
			| Example:
			| 			'validation' => array(
			| 				'name'  => 'required|min_length:3',
			| 				'email' => 'required|email',
			|			),
			| 
			*/
			'validation' => array()
			
		)
		
	),
	
);