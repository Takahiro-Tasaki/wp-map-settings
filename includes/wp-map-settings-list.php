<?php
class Map_Settings_List {
	public function __construct() {
		new Map_Settings_Admin_Db();
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