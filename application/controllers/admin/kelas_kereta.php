<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kelas_kereta extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/kelas_kereta_model', 'kelas_kereta');
		$this->data['current'] = 'master';

		// Only admin can access this page
		if ($this->session->userdata('group_id') != 1) {
			$this->session->set_flashdata('warning', msg_error("You don't have permissions to manage this page"));
			redirect('admin/dashboard');
		}
	}

	public function index()
	{
		$this->data['title'] = 'Daftar Kelas Kereta';
		$this->data['breadcrumb'] = array(
			'Daftar Kelas Kereta' => base_url() . 'admin/kelas_kereta',
		);
		$this->data['trains'] = $this->kelas_kereta->get();

		$this->load->view('admin/kelas_kereta/list', $this->data);
	}

	public function details($id)
	{
		$this->data['title'] = 'Info Kelas Kereta';
		$this->data['breadcrumb'] = array(
			'Daftar Kelas Kereta' => base_url() . 'admin/kelas_kereta',
			'Info Kelas Kereta' => base_url() . 'admin/kelas_kereta/details/'.$id
		);
		$this->data['trains'] = $this->kelas_kereta->get($id);
		$this->load->view('admin/kelas_kereta/view', $this->data);
	}

	public function add()
	{
		$this->data['title'] = 'Tambah Kelas Kereta Baru';
		$this->data['breadcrumb'] = array(
			'Daftar Kelas Kereta' => base_url() . 'admin/kelas_kereta',
			'Tambah Kelas Kereta baru' => base_url() . 'admin/kelas_kereta/add/'
		);

		$this->load->view('admin/kelas_kereta/add', $this->data);
	}

	public function save()
	{
		$rules = $this->kelas_kereta->rules;
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'kode_kelas_kereta' => $this->input->post('kode_kelas_kereta'),
				'nama_kelas' 		=> $this->input->post('nama_kelas'),
				'keterangan' 		=> $this->input->post('keterangan'),
				'created' 			=> date('Y-m-d H:i:s'),
				'updated' 			=> date('Y-m-d H:i:s'),
				'created_by' 		=> $this->session->userdata['username'],
				'updated_by' 		=> $this->session->userdata['username']
			);

			$this->kelas_kereta->save($data);
			$this->session->set_flashdata('message', msg_success('Insert Success'));
			redirect('admin/kelas_kereta');
		}
		else{
			$this->session->set_flashdata('message', validation_errors());
			redirect('admin/kelas_kereta/add');
		}
	}

	public function edit($id)
	{
		$this->data['title'] = 'Edit Kelas Kereta';
		$this->data['breadcrumb'] = array(
			'Daftar Kelas Kereta' => base_url() . 'admin/kelas_kereta',
			'Edit Kelas Kereta' => base_url() . 'admin/kelas_kereta/edit/'.$id
		);
		$this->data['trains'] = $this->kelas_kereta->get($id);

		$this->load->view('admin/kelas_kereta/edit', $this->data);
	}

	public function update($id)
	{
		$rules = $this->kelas_kereta->rules;
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'kode_kelas_kereta' => $this->input->post('kode_kelas_kereta'),
				'nama_kelas' 		=> $this->input->post('nama_kelas'),
				'keterangan' 		=> $this->input->post('keterangan'),
				'updated' 			=> date('Y-m-d H:i:s'),
				'updated_by' 		=> $this->session->userdata['username']
			);

			$this->kelas_kereta->save($data, $id);
			$this->session->set_flashdata('message', msg_success('Update Success'));
			redirect('admin/kelas_kereta');
		}else{
			$this->session->set_flashdata('message', validation_errors());
			redirect('admin/kelas_kereta/edit/'.$id);
		}
	}

	public function delete($id)
	{
		$this->kelas_kereta->delete($id);
		$this->session->set_flashdata('message', msg_success('Delete Success'));
		redirect('admin/kelas_kereta');
	}

	// Callback function custom form_validation rules for unique nama_kelas_kereta

	public function _unique_nama_kelas_kereta($str)
	{
		$id = $this->uri->segment(4);

		$this->db->where('nama_kelas', $this->input->post('nama_kelas'));
		!$id || $this->db->where('id !=', $id);
		$nama_kelas_kereta = $this->kelas_kereta->get();

		if (count($nama_kelas_kereta)) {
			$this->form_validation->set_message('_unique_nama_kelas_kereta', '%s already taken');
			return FALSE;
		}

		return TRUE;
	}

	public function _unique_nama_kode_kelas_kereta($str)
	{
		$id = $this->uri->segment(4);

		$this->db->where('kode_kelas_kereta', $this->input->post('kode_kelas_kereta'));
		!$id || $this->db->where('id !=', $id);
		$kode_kelas_kereta = $this->kelas_kereta->get();

		if (count($kode_kelas_kereta)) {
			$this->form_validation->set_message('_unique_kode_kelas_kereta', '%s already taken');
			return FALSE;
		}

		return TRUE;
	}

}

/* End of file kelas_kereta.php */
/* Location: ./application/controllers/kelas_kereta.php */