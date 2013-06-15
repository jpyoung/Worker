<?php

class Uploader extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
	}
	
	
	function index() {
		
		$this->load->view('uploader_view');
	}
	
}


?>