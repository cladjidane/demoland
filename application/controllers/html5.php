<?php
class Html5 extends CI_Controller {

	public function index() {
		
		$data = $this->getBasicData();
		
		//
		// Chargement des vues
		//
		$this->load->view('commons/header.php', $data);
		$this->load->view('html5/listing.php');
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
	
	/** 
	 * Demo File Api - Routing
	 *
	 * Description du routing blah blah 
	 *
	*/
	public function file_api( $page = '' ) {
		
		//
		// Définition de data
		//		
		$data = $this->getBasicData();
		
		$toolBar = array(			
				array('title' => 'Modifier une image','src' => '/html5/file_api/file-api-modifier-image'),
				array('title' => 'Manipuler une image','src' => '/html5/file_api/file-api-manipulation-image'),
				array('title' => 'Accéder aux données Exif','src' => '/html5/file_api//file-api-exif'),
				array('title' => 'Exemple complet','src' => '/html5/file_api/file-api-poster')
		);		
		
		$this->load->helper('toolbar');
		$data['toolBar'] = toolbar($toolBar);
		$data['styles'] = array();
		
		//
		// Header
		//
		$this->load->view('commons/header-demo.php', $data);
	
	
		//
		// Contenu
		// 
		switch( strtolower($page) ) {
		
			case 'file-api':
			default:
				$this->load->view('/demo/html5/file_api/file-api.php');
				break;	
			case 'file-api-modifier-image':
				$this->load->view('/demo/html5/file_api/file-api-modifier-image.php');
				break;			
			case 'file-api-manipulation-image' :
				$this->load->view('/demo/html5/file_api/file-api-manipulation-image.php');
				break;		
			case 'file-api-exif' :
				$this->load->view('/demo/html5/file_api/file-api-exif.php');
				break;
			case 'file-api-poster' :
				$this->load->view('/demo/html5/file_api/file-api-poster.php');
				break;
		
		}
		
		//
		// Footer
		//
		$this->load->view('commons/footer-demo.php');

	}
	
	/** 
	 * Demo WebSockets
	 *
	*/
	public function websockets( $page = '' ) {
		
		//
		// Définition de data
		//		
		$data = $this->getBasicData();
		
		$toolBar = array();		
		$data['styles'] = array();
		
		//
		// Header
		//
		$this->load->view('commons/header-demo.php', $data);
	
	
		//
		// Contenu
		// 
		$this->load->view('/demo/html5/websockets/websockets.php');
		
		//
		// Footer
		//
		$this->load->view('commons/footer-demo.php');

	}
	
	/** 
	 * Demo WebSockets
	 *
	*/
	public function balises( $page = '' ) {
		
		//
		// Définition de data
		//		
		$data = $this->getBasicData();
		
		$toolBar = array();		
		$data['styles'] = array();
		
		//
		// Header
		//
		$this->load->view('commons/header-demo.php', $data);
	
	
		//
		// Contenu
		// 
		$this->load->view('/demo/html5/balises/balises.php');
		
		//
		// Footer
		//
		$this->load->view('commons/footer-demo.php');

	}


}