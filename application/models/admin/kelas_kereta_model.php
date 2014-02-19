<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kelas_kereta_model extends MY_Model {

	protected $_table_name 	= 'ka_kelas_kereta';
	protected $_primary_key = 'id';
	protected $_primary_filter = 'intval';
	protected $_order_by = 'id';
	public $rules = array(
		'kode_kelas_kereta' => array(
			'field' => 'kode_kelas_kereta',
			'label' => 'Kode Kelas',
			'rules' => 'callback__unique_kode_kelas_kereta|required'
		),
		'nama_kelas' => array(
			'field' => 'nama_kelas',
			'label' => 'Nama Kelas',
			'rules' => 'callback__unique_nama_kelas_kereta|required'
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
/* Location: ./application/models/kelas_kereta_model.php */