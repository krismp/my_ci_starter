<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['current'] = 'dashboard';
	}

	public function index()
	{
		$this->data['title'] = 'Dashboard';
		$this->data['breadcrumb'] = array(
			'Dashboard' => base_url() . 'admin/dashboard',
		);

		$this->load->view('admin/dashboard/index', $this->data);
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */