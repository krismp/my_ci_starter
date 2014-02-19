<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends MY_Model {

	protected $_table_name 	= 'cms_users';
	protected $_primary_key = 'id';
	protected $_primary_filter = 'intval';
	protected $_order_by = 'id';
	public $rules = array(
		'username' => array(
			'field' => 'username',
			'label' => 'Username',
			'rules' => 'trim|callback__unique_username|required'
		),
		'email' => array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|valid_email|callback__unique_email|xss_clean|required'
		),
		'group_id' => array(
			'field' => 'group_id',
			'label' => 'Group',
			'rules' => 'trim|is_natural|xss_clean|required'
		),
		'password' => array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'trim|matches[password_confirm]|required'
		),
		'password_confirm' => array(
			'field' => 'password_confirm',
			'label' => 'Confirm Password',
			'rules' => 'trim|matches[password]|required'
		)
	);

	public function __construct()
	{
		parent::__construct();		
	}

	public function get_user_group()
	{

		$this->db->select('cms_users.*, cms_group_user.group_name');
		$this->db->from('cms_users');
		$this->db->join('cms_group_user', 'cms_users.group_id=cms_group_user.id', 'LEFT');

		$query = $this->db->get();

		return $query->result();
	}

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */