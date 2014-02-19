<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('cms');
	}
	public function index()
	{
		dump("If You see this, you're awesome");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */