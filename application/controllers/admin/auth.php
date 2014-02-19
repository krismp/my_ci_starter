<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function login()
	{
		$this->auth->loggedin() == FALSE || redirect ('admin/dashboard');
		$rules = $this->auth->rules;
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == TRUE) {
			if ($this->auth->login() == TRUE) {
				if ($this->session->userdata('group_id') == '1') {
					$this->session->set_flashdata('greeting', msg_success('Welcome administrator'));	
					redirect ('admin/dashboard');
				}else{
					$this->session->set_flashdata('greeting', msg_success('Welcome guest'));	
					redirect ('admin/dashboard');
				}
			}else{
				$this->session->set_flashdata('message', msg_error('Wrong password and email combination'));
				redirect('admin/auth/login', 'refresh');
			}
		}

		$this->load->view('admin/login');
	}

	public function logout()
	{
		$this->auth->logout();

		$this->session->set_flashdata('message', msg_success('Logout Success!'));
		redirect('admin/auth/login');
	}

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */