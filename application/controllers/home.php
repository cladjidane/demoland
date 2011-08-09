<?php
class Home extends CI_Controller {

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
		$this->load->view('home/home.php');
		$this->load->view('commons/footer.php');
	
	}

}