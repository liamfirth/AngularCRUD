<?php

return array(
	
	'tables' => array(
		
		'guests' => array(
			
			// How many records per page? (Used for pagination)
			'records_per_page' => 2,
			
			// Set the primary key of the database table.
			'primary_key' => 'id',
			
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
			| Viewing records
			|--------------------------------------------------------------------------
			| 
			| Which fields to show when viewing a record.
			| 
			*/
			'view' => array( 'id' , 'name' , 'email' , 'age' , 'created_at' , 'updated_at' ),
			
			/*
			|--------------------------------------------------------------------------
			| Create records
			|--------------------------------------------------------------------------
			| 
			| Which fields to display when creating a new record.
			| 
			*/
			'create' => array( 'name' , 'email' , 'age' , 'bio' ),
			
			/*
			|--------------------------------------------------------------------------
			| Update records
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
			| Specify how to render each of the columns in the form, whether to render
			| them as a text field, textarea, drop-down menu, radio or checkbox.
			| 
			| There are also special field types, such as 'wysiwyg' and 'upload'.
			| 
			| Drop-down, radio and checkbox items are required to be in an array,
			| and must provide 2 keys; 'type' (select, radio, checkbox) and 'options'.
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