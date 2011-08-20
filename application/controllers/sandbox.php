<?php
class Sandbox extends CI_Controller {

	public function image_background_relative() {
		
		// On ne charge rien de particulier, tout sera déclaré dans la vue
		$this->load->view('demo/sandbox/divers/image_background_relative/bg-image-full-size.php');
	}


}