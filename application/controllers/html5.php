<?php
class Html5 extends CI_Controller {

	public function index() {
	
		$this->load->view('html5/listing.php');
	
	}
	
	public function file_api( $page = '' ) {
	
		switch( strtolower($page) ) {
		
			case 'debut':
			default:
				$this->file_api_page1();
			break;
			
			case 'fin' :
				$this->file_api_page2();
			break;
		
		}

	}
	
	protected function file_api_page1() {
		echo 'page1';
	}
	
	protected function file_api_page2() {
		echo 'page2';
	}

}