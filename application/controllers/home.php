<?php
class Home extends CI_Controller {

	public function index() {
			
		//
		// Définition de data
		//		
		$data = $this->getBasicData();
		
		//
		// Chargement des vues
		//
		$this->load->view('commons/header.php', $data);
		$this->load->view('home/home.php');
		$this->load->view('commons/footer.php');
	
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
			'main.css'
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