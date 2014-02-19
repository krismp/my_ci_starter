<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pejabat_model extends MY_Model {

	protected $_table_name 	= 'ka_pejabat';
	protected $_primary_key = 'id';
	protected $_primary_filter = 'intval';
	protected $_order_by = 'id';
	public $rules = array(
		'nnip' => array(
			'field' => 'nnip',
			'label' => 'NNIP',
			'rules' => 'required|callback__unique_nnip'
		),
		'nama' => array(
			'field' => 'nama',
			'label' => 'Nama',
			'rules' => 'required'
		),
		'jabatan' => array(
			'field' => 'jabatan',
			'label' => 'Jabatan',
			'rules' => 'required'
		)

	);

	public function __construct()
	{
		parent::__construct();		
	}

}

/* End of file Pejabat_model.php */
/* Location: ./application/models/Pejabat_model.php */