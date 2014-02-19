<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/group_model', 'group');
		$this->data['current'] = 'setting';

		// Only admin can access this page
		if ($this->session->userdata('group_id') != 1) {
			$this->session->set_flashdata('warning', msg_error("You don't have permissions to manage this page"));
			redirect('admin/dashboard');
		}
	}

	public function index()
	{
		$this->data['title'] = 'Groups';
		$this->data['breadcrumb'] = array(
			'Groups' => base_url() . 'admin/group',
		);
		$this->data['groups'] = $this->group->get();

		$this->load->view('admin/group/list', $this->data);
	}

	public function details($id)
	{
		$this->data['title'] = 'Group Details';
		$this->data['breadcrumb'] = array(
			'Groups' => base_url() . 'admin/group',
			'Group Details' => base_url() . 'admin/group/details/'.$id
		);
		$this->data['groups'] = $this->group->get($id);
		$this->load->view('admin/group/view', $this->data);
	}

	public function add()
	{
		$this->data['title'] = 'Add New Group';
		$this->data['breadcrumb'] = array(
			'Groups' => base_url() . 'admin/group',
			'Add Group' => base_url() . 'admin/group/add/'
		);

		$this->load->view('admin/group/add', $this->data);
	}

	public function save()
	{
		$rules = $this->group->rules;
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'group_name' 	=> $this->input->post('group_name'),
				'status' 		=> $this->input->post('status'),
				'description' 	=> $this->input->post('description'),
				'created' 		=> date('Y-m-d H:i:s'),
				'updated' 		=> date('Y-m-d H:i:s'),
				'created_by' 	=> $this->session->userdata['username'],
				'updated_by' 	=> $this->session->userdata['username']
			);

			$this->group->save($data);
			$this->session->set_flashdata('message', msg_success('Insert Success'));
			redirect('admin/group');
		}
		else{
			$this->session->set_flashdata('message', validation_errors());
			redirect('admin/group/add');
		}
	}

	public function edit($id)
	{
		$this->data['title'] = 'Edit Group';
		$this->data['breadcrumb'] = array(
			'Groups' => base_url() . 'admin/group',
			'Edit Group' => base_url() . 'admin/group/edit/'.$id
		);
		$this->data['groups'] = $this->group->get($id);
		$this->load->view('admin/group/edit', $this->data);
	}

	public function update($id)
	{
		$rules = $this->group->rules;
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'group_name' 	=> $this->input->post('group_name'),
				'status' 		=> $this->input->post('status'),
				'description' 	=> $this->input->post('description'),
				'updated' 		=> date('Y-m-d H:i:s'),
				'updated_by' 	=> $this->session->userdata['username']
			);

			$this->group->save($data, $id);
			$this->session->set_flashdata('message', msg_success('Update Success'));
			redirect('admin/group');
		}else{
			$this->session->set_flashdata('message', validation_errors());
			redirect('admin/group/edit/'.$id);
		}
	}

	public function delete($id)
	{
		$this->group->delete($id);
		$this->session->set_flashdata('message', msg_success('Delete Success'));
		redirect('admin/group');
	}

}

/* End of file group.php */
/* Location: ./application/controllers/group.php */