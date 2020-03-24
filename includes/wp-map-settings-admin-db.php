<?php
class Map_Settings_Admin_Db {
	private $table_name;
	
	public function __construct() {
		global $wpdb;
		$this->table_name = $wpdb->prefix . 'map_settings';
		
		$this->create_table();
	}
	
	private function create_table() {
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		
		$prepare      = $wpdb->prepare( "SHOW TABLES LIKE %s", $this->table_name );
		$is_db_exists = $wpdb->get_var( $prepare );
		var_dump( $is_db_exists );
		
		$query  = "";
		$query .= "CREATE TABLE " . $this->table_name . " (";
		$query .= "id MEDIUMINT(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,";
		$query .= "name TEXT NOT NULL,";
		$query .= "post_num TINYTEXT NOT NULL,";
		$query .= "pref TINYINT NOT NULL,";
		$query .= "address1 TEXT NOT NULL,";
		$query .= "address2 TEXT,";
		$query .= "map_url TEXT,";
		$query .= "add_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,";
		$query .= "modify_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP";
		$query .= ");";
		
		// dbDelta( $query );
	}
}