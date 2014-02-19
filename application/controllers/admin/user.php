<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/user_model', 'user');
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
		$this->data['title'] = 'Users';
		$this->data['breadcrumb'] = array(
			'Users' => base_url() . 'admin/user',
		);
		$this->data['users'] = $this->user->get_user_group();

		$this->load->view('admin/user/list', $this->data);
	}

	public function details($id)
	{
		$this->data['title'] = 'User Details';
		$this->data['breadcrumb'] = array(
			'Users' => base_url() . 'admin/user',
			'User Details' => base_url() . 'admin/user/details/'.$id
		);
		$this->data['users'] = $this->user->get($id);
		$this->load->view('admin/user/view', $this->data);
	}

	public function add()
	{
		$this->data['title'] = 'Add New User';
		$this->data['breadcrumb'] = array(
			'Users' => base_url() . 'admin/user',
			'Add User' => base_url() . 'admin/user/add/'
		);

		$this->data['groups'] = $this->group->get_by(array(
			'status' => '1'
		));

		$this->load->view('admin/user/add', $this->data);
	}

	public function save()
	{
		$rules = $this->user->rules;
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'nama' 			=> $this->input->post('nama'),
				'username' 		=> $this->input->post('username'),
				'email' 		=> $this->input->post('email'),
				'password' 		=> md5($this->input->post('password')),
				'group_id' 		=> $this->input->post('group_id'),
				'status' 		=> $this->input->post('status'),
				'created' 		=> date('Y-m-d H:i:s'),
				'updated' 		=> date('Y-m-d H:i:s'),
				'created_by' 	=> $this->session->userdata['username'],
				'updated_by' 	=> $this->session->userdata['username']
			);

			$this->user->save($data);
			$this->session->set_flashdata('message', msg_success('Insert Success'));
			redirect('admin/user');
		}
		else{
			$this->session->set_flashdata('message', validation_errors());
			redirect('admin/user/add');
		}
	}

	public function edit($id)
	{
		$this->data['title'] = 'Edit User';
		$this->data['breadcrumb'] = array(
			'Users' => base_url() . 'admin/user',
			'Edit User' => base_url() . 'admin/user/edit/'.$id
		);
		$this->data['users'] = $this->user->get($id);
		$this->data['groups'] = $this->group->get_by(array(
			'status' => '1'
		));

		$this->load->view('admin/user/edit', $this->data);
	}

	public function update($id)
	{
		$rules = $this->user->rules;
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'nama' 			=> $this->input->post('nama'),
				'username' 		=> $this->input->post('username'),
				'email' 		=> $this->input->post('email'),
				'password' 		=> md5($this->input->post('password')),
				'group_id' 		=> $this->input->post('group_id'),
				'status' 		=> $this->input->post('status'),
				'updated' 		=> date('Y-m-d H:i:s'),
				'updated_by' 	=> $this->session->userdata['username']
			);

			$this->user->save($data, $id);
			$this->session->set_flashdata('message', msg_success('Update Success'));
			redirect('admin/user');
		}else{
			$this->session->set_flashdata('message', validation_errors());
			redirect('admin/user/edit/'.$id);
		}
	}

	public function delete($id)
	{
		$this->user->delete($id);
		$this->session->set_flashdata('message', msg_success('Delete Success'));
		redirect('admin/user');
	}

	// Callback function custom form_validation rules for unique email

	public function _unique_username($str)
	{
		$id = $this->uri->segment(4);

		$this->db->where('username', $this->input->post('username'));
		!$id || $this->db->where('id !=', $id);
		$username = $this->user->get();

		if (count($username)) {
			$this->form_validation->set_message('_unique_username', '%s already taken');
			return FALSE;
		}

		return TRUE;
	}

	// Callback function custom form_validation rules for unique email

	public function _unique_email($str)
	{
		$id = $this->uri->segment(4);

		$this->db->where('email', $this->input->post('email'));
		!$id || $this->db->where('id !=', $id);
		$email = $this->user->get();

		if (count($email)) {
			$this->form_validation->set_message('_unique_email', '%s already exist');
			return FALSE;
		}

		return TRUE;
	}

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */