<?php
class Map_Settings_List {
	public function __construct() {
		$db = new Map_Settings_Admin_Db();
		$db->insert();
		$this->page_render();
	}
	
	private function page_render() {
		$html  = '';
		$html .= '<div class="wrap">';
		$html .= '<h1>リスト</h1>';
		$html .= '</div>';
		
		echo $html;
	}
}