<?php

class AngularCRUD {
	
	/**
	 * Database table name.
	 * @var string
	 */
	private $_table;
	
	/**
	 * Table configuration.
	 * @var array
	 */
	private $_config;
	
	/**
	 * Initialiser - checks validity of table name and handles actions.
	 * 
	 * @param string $table Database table name - must be identical to what's in the tables.php config file
	 */
	public function __construct( $table )
	{
		
		// Load the table configuration.
		$table_config = Config::get( _("tables.tables.{$table}") );
		
		if ( !$table_config ) {
			throw new Exception( __( _('errors.no-table') , array('table' => $table) ) );
		}
		
		// Set some class variables.
		$this->_table = $table;
		$this->_config = $table_config;
		
		// Handle the action parameter, used for and by AngularJS
		$this->_handle_action();
		
	}
	
	/**
	 * Creates a new instance of the AngularJS
	 * @param  [type] $table [description]
	 * @return [type]        [description]
	 */
	public static function make( $table )
	{
		
		// Create a new instance and let the magic happen.
		new AngularCRUD( $table );
		
	}
	
	/**
	 * Handles the $_GET['action'] parameter.
	 * It will be used by AngularJS to make calls to this script.
	 * 
	 * @return void
	 */
	private function _handle_action()
	{
		
		$action = Input::get('action', 'list');
		
		switch ( $action ) {
			
			case 'list':
				$this->_list();
				break;
			
			case 'create':
				$this->_create();
				break;
			
			case 'read':
				$this->_read();
				break;
			
			case 'update':
				$this->_update();
				break;
			
			case 'delete':
				$this->_delete();
				break;
			
			default:
				throw new Exception( __( _('errors.unrecognised-action') , array('action' => $action) ) );
				break;
			
		}
		
	}
	
	private function _list()
	{
		
		// Get total record count.
		$total = DB::table( $this->_table )->count();
		
		// Prepare variables
		$listing = $this->_config['listing'];
		$take = Input::get( 'take' , $this->_config['records-per-page'] );
		$skip = Input::get( 'skip' , 0 );
		
		// Generate the query
		$query = DB::table( $this->_table )
			->skip( $skip )
			->take( $take );
		
		// Get the results based on whether displaying a few db columns or all.
		$results = ( !$listing ) ? $query->get() : $query->get( $listing );
		
		$this->_return(array(
			'total_records'	=> $total,
			'results_count'	=> count($results),
			'results'		=> $results,
		));
		
	}
	
	private function _create()
	{
		
		$this->_return( 'create' );
		
	}
	
	private function _read()
	{
		
		$this->_return( 'read' );
		
	}
	
	private function _update()
	{
		
		$this->_return( 'update' );
		
	}
	
	private function _delete()
	{
		
		$this->_return( 'delete' );
		
	}
	
	
	/**
	 * Outputs JSON from the reponse being sent back to the browser.
	 * 
	 * @param  mixed $response
	 * @return void
	 */
	private function _return( $response ) {
		die( json_encode( $response ) );
	}
	
}