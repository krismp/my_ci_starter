<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kereta_model extends MY_Model {

	protected $_table_name 	= 'ka_kereta';
	protected $_primary_key = 'id';
	protected $_primary_filter = 'intval';
	protected $_order_by = 'id';
	public $rules = array(
		'kode_kereta' => array(
			'field' => 'kode_kereta',
			'label' => 'Kode Kereta',
			'rules' => 'trim|callback__unique_kode_kereta|required'
		),
		'nama_kereta' => array(
			'field' => 'nama_kereta',
			'label' => 'Nama Kereta',
			'rules' => 'callback__unique_nama_kereta|required'
		),
		'kelas_kereta_id' => array(
			'field' => 'kelas_kereta_id',
			'label' => 'Kelas Kereta',
			'rules' => 'required'
		),
	);

	public function __construct()
	{
		parent::__construct();		
	}

	public function get_kelas_kereta()
	{

		$this->db->select('ka_kereta.*, ka_kelas_kereta.nama_kelas');
		$this->db->from('ka_kereta');
		$this->db->join('ka_kelas_kereta', 'ka_kereta.kelas_kereta=ka_kelas_kereta.nama_kelas', 'LEFT');

		$query = $this->db->get();

		return $query->result();
	}
}

/* End of file Kereta_model.php */
/* Location: ./application/models/Kereta_model.php */