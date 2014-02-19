<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penumpang extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/penumpang_model', 'penumpang');
		$this->data['current'] = 'penumpang';

		// Only admin can access this page
		if ($this->session->userdata('group_id') != 1) {
			$this->session->set_flashdata('warning', msg_error("You don't have permissions to manage this page"));
			redirect('admin/dashboard');
		}
	}

	public function index()
	{
		$this->data['title'] = 'Daftar Jenis Penumpang';
		$this->data['breadcrumb'] = array(
			'Daftar Jenis Penumpang' => base_url() . 'admin/penumpang',
		);
		$this->data['trains'] = $this->penumpang->get();

		$this->load->view('admin/penumpang/list', $this->data);
	}

	public function details($id)
	{
		$this->data['title'] = 'Info Jenis Penumpang';
		$this->data['breadcrumb'] = array(
			'Daftar Jenis Penumpang' => base_url() . 'admin/penumpang',
			'Info Jenis Penumpang' => base_url() . 'admin/penumpang/details/'.$id
		);
		$this->data['trains'] = $this->penumpang->get($id);
		$this->load->view('admin/penumpang/view', $this->data);
	}

	public function add()
	{
		$this->data['title'] = 'Tambah Jenis Penumpang Baru';
		$this->data['breadcrumb'] = array(
			'Daftar Jenis Penumpang' => base_url() . 'admin/penumpang',
			'Tambah Jenis Penumpang baru' => base_url() . 'admin/penumpang/add/'
		);

		$this->load->view('admin/penumpang/add', $this->data);
	}

	public function save()
	{
		$rules = $this->penumpang->rules;
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'kode_penumpang' => $this->input->post('kode_penumpang'),
				'jenis_penumpang' 		=> $this->input->post('jenis_penumpang'),
				'keterangan' 		=> $this->input->post('keterangan'),
				'created' 			=> date('Y-m-d H:i:s'),
				'updated' 			=> date('Y-m-d H:i:s'),
				'created_by' 		=> $this->session->userdata['username'],
				'updated_by' 		=> $this->session->userdata['username']
			);

			$this->penumpang->save($data);
			$this->session->set_flashdata('message', msg_success('Insert Success'));
			redirect('admin/penumpang');
		}
		else{
			$this->session->set_flashdata('message', validation_errors());
			redirect('admin/penumpang/add');
		}
	}

	public function edit($id)
	{
		$this->data['title'] = 'Edit Jenis Penumpang';
		$this->data['breadcrumb'] = array(
			'Daftar Jenis Penumpang' => base_url() . 'admin/penumpang',
			'Edit Jenis Penumpang' => base_url() . 'admin/penumpang/edit/'.$id
		);
		$this->data['trains'] = $this->penumpang->get($id);

		$this->load->view('admin/penumpang/edit', $this->data);
	}

	public function update($id)
	{
		$rules = $this->penumpang->rules;
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'kode_penumpang' => $this->input->post('kode_penumpang'),
				'jenis_penumpang' 		=> $this->input->post('jenis_penumpang'),
				'keterangan' 		=> $this->input->post('keterangan'),
				'updated' 			=> date('Y-m-d H:i:s'),
				'updated_by' 		=> $this->session->userdata['username']
			);

			$this->penumpang->save($data, $id);
			$this->session->set_flashdata('message', msg_success('Update Success'));
			redirect('admin/penumpang');
		}else{
			$this->session->set_flashdata('message', validation_errors());
			redirect('admin/penumpang/edit/'.$id);
		}
	}

	public function delete($id)
	{
		$this->penumpang->delete($id);
		$this->session->set_flashdata('message', msg_success('Delete Success'));
		redirect('admin/penumpang');
	}

	// Callback function custom form_validation rules for unique nama_penumpang

	public function _unique_jenis_penumpang($str)
	{
		$id = $this->uri->segment(4);

		$this->db->where('jenis_penumpang', $this->input->post('jenis_penumpang'));
		!$id || $this->db->where('id !=', $id);
		$jenis_penumpang = $this->penumpang->get();

		if (count($jenis_penumpang)) {
			$this->form_validation->set_message('_unique_jenis_penumpang', '%s already taken');
			return FALSE;
		}

		return TRUE;
	}

	public function _unique_kode_penumpang($str)
	{
		$id = $this->uri->segment(4);

		$this->db->where('kode_penumpang', $this->input->post('kode_penumpang'));
		!$id || $this->db->where('id !=', $id);
		$kode_penumpang = $this->penumpang->get();

		if (count($kode_penumpang)) {
			$this->form_validation->set_message('_unique_kode_penumpang', '%s already taken');
			return FALSE;
		}

		return TRUE;
	}

}

/* End of file penumpang.php */
/* Location: ./application/controllers/penumpang.php */