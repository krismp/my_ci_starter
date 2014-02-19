<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penumpang_model extends MY_Model {

	protected $_table_name 	= 'ka_penumpang';
	protected $_primary_key = 'id';
	protected $_primary_filter = 'intval';
	protected $_order_by = 'id';
	public $rules = array(
		'kode_penumpang' => array(
			'field' => 'kode_penumpang',
			'label' => 'Kode Penumpang',
			'rules' => 'callback__unique_kode_penumpang|required'
		),
		'jenis_penumpang' => array(
			'field' => 'jenis_penumpang',
			'label' => 'Nama Penumpang',
			'rules' => 'callback__unique_jenis_penumpang|required'
		),
		'keterangan' => array(
			'field' => 'keterangan',
			'label' => 'Keterangan',
			'rules' => 'required'
		)
	);

	public function __construct()
	{
		parent::__construct();		
	}

}

/* End of file cms_user_model.php */
/* Location: ./application/models/penumpang_model.php */