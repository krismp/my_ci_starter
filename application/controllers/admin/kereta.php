<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kereta extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/kereta_model', 'kereta');
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
		$this->data['title'] = 'Daftar Kereta';
		$this->data['breadcrumb'] = array(
			'Daftar kereta' => base_url() . 'admin/kereta',
		);
		$this->data['trains'] = $this->kereta->get_kelas_kereta();
		$this->load->view('admin/kereta/list', $this->data);
	}

	public function details($id)
	{
		$this->data['title'] = 'Info Kereta';
		$this->data['breadcrumb'] = array(
			'Daftar kereta' => base_url() . 'admin/kereta',
			'Info kereta' => base_url() . 'admin/kereta/details/'.$id
		);
		$this->data['trains'] = $this->kereta->get($id);
		$this->load->view('admin/kereta/view', $this->data);
	}

	public function add()
	{
		$this->data['title'] = 'Tambah Kereta Baru';
		$this->data['breadcrumb'] = array(
			'Daftar kereta' => base_url() . 'admin/kereta',
			'Tambah kereta baru' => base_url() . 'admin/kereta/add/'
		);
		$this->data['trains'] = $this->kelas_kereta->get();

		$this->load->view('admin/kereta/add', $this->data);
	}

	public function save()
	{		
		$rules = $this->kereta->rules;
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {

			$selected_kls = implode(', ', $_POST['kelas_kereta_id']);

			$data = array(
				'kode_kereta' 		=> $this->input->post('kode_kereta'),
				'nama_kereta' 		=> $this->input->post('nama_kereta'),
				'kelas_kereta' 		=> $selected_kls,
				'status' 			=> $this->input->post('status'),
				'created' 			=> date('Y-m-d H:i:s'),
				'updated' 			=> date('Y-m-d H:i:s'),
				'created_by' 		=> $this->session->userdata['username'],
				'updated_by' 		=> $this->session->userdata['username']
			);

			$this->kereta->save($data);
			$this->session->set_flashdata('message', msg_success('Insert Success'));
			redirect('admin/kereta');
		}
		else{
			$this->session->set_flashdata('message', validation_errors());
			redirect('admin/kereta/add');
		}
	}

	public function edit($id)
	{
		$this->data['title'] = 'Edit kereta';
		$this->data['breadcrumb'] = array(
			'Daftar kereta' => base_url() . 'admin/kereta',
			'Edit kereta' => base_url() . 'admin/kereta/edit/'.$id
		);
		$this->data['trains'] = $this->kereta->get($id);
		$this->data['kls_kereta'] = $this->kelas_kereta->get();

		$this->load->view('admin/kereta/edit', $this->data);
	}

	public function update($id)
	{
		$rules = $this->kereta->rules;
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {

			$selected_kls = implode(', ', $_POST['kelas_kereta_id']);

			$data = array(
				'kode_kereta' 		=> $this->input->post('kode_kereta'),
				'nama_kereta' 		=> $this->input->post('nama_kereta'),
				'kelas_kereta' 		=> $selected_kls,
				'status' 			=> $this->input->post('status'),
				'updated' 			=> date('Y-m-d H:i:s'),
				'updated_by' 		=> $this->session->userdata['username']
			);

			$this->kereta->save($data, $id);
			$this->session->set_flashdata('message', msg_success('Update Success'));
			redirect('admin/kereta');
		}else{
			$this->session->set_flashdata('message', validation_errors());
			redirect('admin/kereta/edit/'.$id);
		}
	}

	public function delete($id)
	{
		$this->kereta->delete($id);
		$this->session->set_flashdata('message', msg_success('Delete Success'));
		redirect('admin/kereta');
	}

	// Callback function custom form_validation rules for unique kode_kereta

	public function _unique_kode_kereta($str)
	{
		$id = $this->uri->segment(4);

		$this->db->where('kode_kereta', $this->input->post('kode_kereta'));
		!$id || $this->db->where('id !=', $id);
		$kode_kereta = $this->kereta->get();

		if (count($kode_kereta)) {
			$this->form_validation->set_message('_unique_kode_kereta', '%s already taken');
			return FALSE;
		}

		return TRUE;
	}

	// Callback function custom form_validation rules for unique nama_kereta

	public function _unique_nama_kereta($str)
	{
		$id = $this->uri->segment(4);

		$this->db->where('nama_kereta', $this->input->post('nama_kereta'));
		!$id || $this->db->where('id !=', $id);
		$nama_kereta = $this->kereta->get();

		if (count($nama_kereta)) {
			$this->form_validation->set_message('_unique_nama_kereta', '%s already taken');
			return FALSE;
		}

		return TRUE;
	}

}

/* End of file kereta.php */
/* Location: ./application/controllers/kereta.php */