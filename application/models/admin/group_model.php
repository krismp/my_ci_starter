<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group_model extends MY_Model {

	protected $_table_name 	= 'cms_group_user';
	protected $_primary_key = 'id';
	protected $_primary_filter = 'intval';
	protected $_order_by = 'id';
	public $rules = array(
		'group_name' => array(
			'field' => 'group_name',
			'label' => 'Group Name',
			'rules' => 'required'
		),
		'description' => array(
			'field' => 'description',
			'label' => 'Description',
			'rules' => 'required'
		)

	);

	public function __construct()
	{
		parent::__construct();		
	}

}

/* End of file cms_user_model.php */
/* Location: ./application/models/group_model.php */