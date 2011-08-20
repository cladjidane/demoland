<?php
class tools extends CI_Controller {

	public function index() {
		
		$data = $this->getBasicData();
		
		//
		// Chargement des vues
		//
		$this->load->view('commons/header-demo.php', $data);
		$this->load->view('tools/listing.php');
		$this->load->view('commons/footer-demo.php');
	}
	
	
	/**
	 * Definition des paramètres data de base 
	 *
	*/
	protected function getBasicData() {
	
		$data = array();

		//
		// Styles
		//
		$data['styles'] = array(
			'demo.css'
		);
		
		//
		// Scripts
		//
	
	
		//
		// Meta
		//
		
		
		return $data;
	
	}
}