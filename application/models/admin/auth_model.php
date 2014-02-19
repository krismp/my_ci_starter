<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends MY_Model {

	protected $_table_name 	= 'cms_users';
	protected $_primary_key = 'id';
	protected $_primary_filter = 'intval';
	protected $_order_by = 'id';
	public $rules = array(
		'username' => array(
			'field' => 'username',
			'label' => 'username',
			'rules' => 'trim|required|xss_clean'
		),
		'password' => array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'trim|required'
		)
	);

	public function __construct()
	{
		parent::__construct();
		
	}

	public function login()
	{
		$user = $this->get_by(array(
			'username' 	=> $this->input->post('username'),
			'password'	=> md5($this->input->post('password')),
			'status'	=> '1'
		), TRUE);

		if (count($user)) {
			$data = array(
				'username' 	=> $user->username, 
				'email' 	=> $user->email,
				'id' 		=> $user->id,
				'group_id'	=> $user->group_id,
				'loggedin' 	=> TRUE
			);
			
			$this->session->set_userdata($data);
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
	}

	public function loggedin()
	{
		return (bool) $this->session->userdata('loggedin');
	}

	public function is_admin()
	{
		return $this->session->userdata('group_id') == '1';
	}

	public function is_guest()
	{
		return $this->session->userdata('group_id') == '2';
	}

}

/* End of file auth_model.php */
/* Location: ./application/models/auth_model.php */