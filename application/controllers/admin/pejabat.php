<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pejabat extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/pejabat_model', 'pejabat');
		$this->data['current'] = 'master';

		// Only admin can access this page
		if ($this->session->userdata('group_id') != 1) {
			$this->session->set_flashdata('warning', msg_error("You don't have permissions to manage this page"));
			redirect('admin/dashboard');
		}
	}

	public function index()
	{
		$this->data['title'] = 'Daftar Pejabat';
		$this->data['breadcrumb'] = array(
			'Daftar Pejabat' => base_url() . 'admin/pejabat',
		);
		$this->data['pejabats'] = $this->pejabat->get();

		$this->load->view('admin/pejabat/list', $this->data);
	}

	public function details($id)
	{
		$this->data['title'] = 'Info Pejabat';
		$this->data['breadcrumb'] = array(
			'Daftar Pejabat' => base_url() . 'admin/pejabat',
			'Info Pejabat' => base_url() . 'admin/pejabat/details/'.$id
		);
		$this->data['pejabats'] = $this->pejabat->get($id);
		$this->load->view('admin/pejabat/view', $this->data);
	}

	public function add()
	{
		$this->data['title'] = 'Tambah Pejabat Baru';
		$this->data['breadcrumb'] = array(
			'Daftar Pejabat' => base_url() . 'admin/pejabat',
			'Tambah Pejabat Baru' => base_url() . 'admin/pejabat/add/'
		);

		$this->load->view('admin/pejabat/add', $this->data);
	}

	public function save()
	{
		$rules = $this->pejabat->rules;
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'nnip' 			=> $this->input->post('nnip'),
				'nama' 			=> $this->input->post('nama'),
				'jabatan' 		=> $this->input->post('jabatan'),
				'created' 		=> date('Y-m-d H:i:s'),
				'updated' 		=> date('Y-m-d H:i:s'),
				'created_by' 	=> $this->session->userdata['username'],
				'updated_by' 	=> $this->session->userdata['username']
			);

			$this->pejabat->save($data);
			$this->session->set_flashdata('message', msg_success('Insert Success'));
			redirect('admin/pejabat');
		}
		else{
			$this->session->set_flashdata('message', validation_errors());
			redirect('admin/pejabat/add');
		}
	}

	public function edit($id)
	{
		$this->data['title'] = 'Edit Pejabat';
		$this->data['breadcrumb'] = array(
			'Daftar Pejabat' => base_url() . 'admin/pejabat',
			'Edit Pejabat' => base_url() . 'admin/pejabat/edit/'.$id
		);
		$this->data['pejabats'] = $this->pejabat->get($id);
		$this->load->view('admin/pejabat/edit', $this->data);
	}

	public function update($id)
	{
		$rules = $this->pejabat->rules;
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'nnip' 			=> $this->input->post('nnip'),
				'nama' 			=> $this->input->post('nama'),
				'jabatan' 		=> $this->input->post('jabatan'),
				'updated' 		=> date('Y-m-d H:i:s'),
				'updated_by' 	=> $this->session->userdata['username']
			);

			$this->pejabat->save($data, $id);
			$this->session->set_flashdata('message', msg_success('Update Success'));
			redirect('admin/pejabat');
		}else{
			$this->session->set_flashdata('message', validation_errors());
			redirect('admin/pejabat/edit/'.$id);
		}
	}

	public function delete($id)
	{
		$this->pejabat->delete($id);
		$this->session->set_flashdata('message', msg_success('Delete Success'));
		redirect('admin/pejabat');
	}

}

/* End of file pejabat.php */
/* Location: ./application/controllers/pejabat.php */