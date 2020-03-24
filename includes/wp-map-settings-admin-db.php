<?php
class Map_Settings_Admin_Db {
	private $table_name;
	
	public function __construct() {
		global $wpdb;
		$this->table_name = $wpdb->prefix . 'map_settings';
	}
}