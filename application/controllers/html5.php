<?php
class Html5 extends CI_Controller {

	public function index() {
	
		//
		// Préparation des données des vues
		//
		$data = array();
		
		// Header
		$data['header'] = array();
		
			// Header - styles
			$data['header']['styles'][] = 'main.css';
		
		//
		// Chargement des vues
		//
		$this->load->view('commons/header.php', $data);
		$this->load->view('html5/listing.php');
		$this->load->view('commons/footer.php');
	
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