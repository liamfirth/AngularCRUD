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
	 * Creates a new instance of the AngularCRUD
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
		
		// Get the 'action' URL param or use 'list' as a default
		$action = Input::get('action', 'index');
		
		switch ( $action ) {
			
			// The main view. Lists items that can be edited.
			case 'index':				$this->_index();		break;
			
			// Core AJAX functions
			case 'list':				$this->_list();			break;
			case 'create':				$this->_create();		break;
			case 'view':				$this->_view();			break;
			case 'update':				$this->_update();		break;
			case 'delete':				$this->_delete();		break;
			
			// Helper AJAX functions
			case 'config':				$this->_config();		break;
			
			// If all above fail.
			default:
				throw new Exception( __( _('errors.unrecognised-action') , array( 'action' => $action ) ) );
				break;
			
		}
		
	}
	
	private function _index()
	{
		$this->_render();
	}
	
	private function _list()
	{
		
		// Get total record count.
		$total = DB::table( $this->_table )->count();
		
		// Prepare variables.
		$listing = $this->_config['listing'];
		$take = Input::get( 'take' , $this->_config['records_per_page'] );
		$skip = Input::get( 'skip' , 0 );
		
		// Make sure that the records per page is a number higher than zero.
		$take = $take ? $take : $this->_config['records_per_page'];
		
		// Generate the query.
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
		
		var_dump( Input::json() );
		exit;
		
		
		$this->_return( 'create' );
		
	}
	
	private function _view()
	{
		
		var_dump( Input::json() );
		exit;
		
		
		$this->_return( 'read' );
		
	}
	
	private function _update()
	{
		
		var_dump( Input::json() );
		exit;
		
		
		$this->_return( 'update' );
		
	}
	
	private function _delete()
	{
		
		var_dump( Input::json() );
		exit;
		
		
		$this->_return( 'delete' );
		
	}
	
	
	/**
	 * Outputs the configuration data.
	 * 
	 * @return JSON
	 */
	private function _config()
	{
		$this->_return( $this->_config );
	}
	
	/**
	 * Outputs JSON from the reponse being sent back to the browser.
	 * 
	 * @param  mixed $response
	 * @return void
	 */
	private function _return( $response ) {
		echo json_encode( $response );
		exit;
	}
	
	/**
	 * Outputs the view and passes some default variables to it along
	 * with any optional data that needs to be passed to the template.
	 * 
	 * @param  array $data Data to pass to the template
	 * @return void
	 */
	private function _render( $data = array() ) {
		$default_data = array(
			'table'			=> $this->_table,
			'config'		=> $this->_config,
			'bundle_path'	=> '/bundles/angularcrud',
		);
		
		echo View::make( _('template') , array_merge( $default_data , $data ) );
		exit;
	}
	
}