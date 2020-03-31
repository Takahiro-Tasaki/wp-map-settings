<?php
/*
Plugin Name: WP Map Settings
Plugin URI: 
Description: プラグインの説明
Version: 1.0.0
Author: Tasaki Takahiro
Author URI: 
License: GPLv2 or later
*/

require_once( plugin_dir_path( __FILE__ ) . 'includes/wp-map-settings-admin-db.php' );

/**
 * Base Class
 *
 * @author  Tasaki Takahiro
 * @version 1.0.0
 * @since   1.0.0
 */
class Map_Settings {
	public function __construct() {
		register_activation_hook( __FILE__, array( $this, 'create_table' ) );
		if( is_admin() ) {
			add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		}
	}
	
	public function create_table () {
		$db = new Map_Settings_Admin_Db();
		$db->create_table();
	}
	
	public function admin_menu () {
		add_menu_page(
			'タイトル',
			'メニュー名',
			'manage_options',
			plugin_basename( __FILE__ ),
			array( $this, 'list_page_render' )
		);
		add_submenu_page(
			__FILE__,
			'リスト',
			'リスト',
			'manage_options',
			plugin_basename( __FILE__ ),
			array( $this, 'list_page_render' )
		);
		add_submenu_page(
			__FILE__,
			'サブメニュータイトル2',
			'サブメニュー名2',
			'manage_options',
			plugin_dir_path( __FILE__ ) . 'includes/wp-map-settings-post.php',
			array( $this, 'post_page_render' )
		);
	}
	
	public function list_page_render () {
		require_once( plugin_dir_path( __FILE__ ) . 'includes/wp-map-settings-list.php' );
		new Map_Settings_List();
	}
	
	public function post_page_render () {
		require_once( plugin_dir_path( __FILE__ ) . 'includes/wp-map-settings-post.php' );
		new Map_Settings_Post();
	}
}

new Map_Settings();