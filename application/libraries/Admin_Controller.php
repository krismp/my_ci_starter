<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Controller extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/auth_model', 'auth');
		$this->load->library(array('form_validation','session'));
		$this->load->helper('cms');

		// User Check
		$exception_uris = array(
			'admin/auth/login',
			'admin/auth/logout'
		);

		if (in_array(uri_string(), $exception_uris) == FALSE) {
			if ($this->auth->loggedin() == FALSE) {
				redirect('admin/auth/login');
			}
		}
	}

}

/* End of file Admin_Controller.php */
/* Location: ./application/controllers/Admin_Controller.php */