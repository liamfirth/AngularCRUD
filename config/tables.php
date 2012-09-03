<?php

return array(
	
	'tables' => array(
		
		'guests' => array(
			
			// How many records per page?
			'records-per-page' => 1,
			
			/*
			|--------------------------------------------------------------------------
			| Listing fields
			|--------------------------------------------------------------------------
			| 
			| List of columns to be displayed on the main page of the CRUD interface.
			| Leaving the array empty will display all the columns in the database
			| table. It's probably best to specify which columns to display.
			| 
			*/
			'listing' => array( 'id' , 'name' , 'email' , 'age' ),
			
			/*
			|--------------------------------------------------------------------------
			| Create fields
			|--------------------------------------------------------------------------
			| 
			| Which fields to display when creating a new record.
			| 
			*/
			'create' => array( 'name' , 'email' , 'age' , 'bio' ),
			
			/*
			|--------------------------------------------------------------------------
			| Update fields
			|--------------------------------------------------------------------------
			| 
			| Which fields to display when updating a record.
			| 
			*/
			'update' => array( 'name' , 'email' , 'age' , 'bio' ),
			
			/*
			|--------------------------------------------------------------------------
			| Field types
			|--------------------------------------------------------------------------
			| 
			| Specify whether each of the columns should be a text field, textarea,
			| drop-down menu, radio or checkbox.
			| 
			| Drop-down, radio and checkbox items are required to be in an array,
			| as demonstrated by the 'age' field.
			| 
			*/
			'field_types' => array(
				'name'	=> 'text',
				'email'	=> 'text',
				'age'	=> array(
					'type' => 'select',
					'options' => array(
						'age-group-1' => '1 - 10',
						'age-group-2' => '11 - 20',
						'age-group-3' => '21 - 30',
						'age-group-4' => '31 - 40',
						'age-group-5' => '41 and over',
					),
				),
				'bio'	=> 'textarea',
			),
			
			/*
			|--------------------------------------------------------------------------
			| Validation
			|--------------------------------------------------------------------------
			| 
			| Validation rules against specific fields. Follows the Laravel validation
			| rules.
			| 
			*/
			'validation' => array(
				'name'	=> 'required|min_length:3',
				'email'	=> 'required|email',
				'bio'	=> 'min_length:10',
			),
			
		)
		
	),
	
);