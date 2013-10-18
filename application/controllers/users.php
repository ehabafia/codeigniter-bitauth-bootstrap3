<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		if( ! $this->bitauth->logged_in())
		{
			$this->session->set_userdata('redir', current_url());
			redirect('/login');
		}
		if ( ! $this->bitauth->has_role('admin'))
		{
			$this->content_view = 'accounts/noAccess';
			return;
		}
	}

	/**
	 * Users::index()
	 *
	 */
	public function index()
	{
		$this->data['javascriptFile'] = array('usersList.js');
		$this->data['users'] = $this->bitauth->get_users(true);
		$groups = array();
		$groups[''] = t('chooseGroup');
		foreach($this->bitauth->get_groups() as $_group)
		{
			$groups[$_group->group_id] = $_group->name;
		}
		$this->data['groups'] = $groups;
		$this->data['bitauth'] = $this->bitauth;
		$this->data['pageName'] = t('listUsers');
		$this->data['parentCat'] = 'Users';
		$this->data['selected'] = t('listUsers');
	}

	public function addUser(){

		// Checking if the user have the right to access;
		$this->checkRole(array('admin'));
		
		if($this->input->post())
		{
			$this->form_validation->set_rules('username', t('username'), 'trim|required|bitauth_unique_username');
			$this->form_validation->set_rules('password', t('password'), 'required|bitauth_valid_password');
			$this->form_validation->set_rules('passwordConf', t('passwordConf'), 'required|matches[password]');
			$this->form_validation->set_rules('fullName', t('fullName'), 'required|trim|min_length[10]');
			$this->form_validation->set_rules('email', t('email'), 'trim|required|valid_email');
			
			if($this->form_validation->run() == TRUE)
			{
				unset($_POST['submit'], $_POST['passwordConf']);
				$fields = array(
					'username'			=> $this->input->post('username'),
					'password'			=> $this->input->post('password'),
					'fullname' 			=> $this->input->post('fullName'),
					'email'				=> $this->input->post('email'),
				);
				
				$rs = $this->bitauth->add_user($fields);
			}
			
			if(isset($rs))
			{
				$this->data['msg'] = $this->user->getMessage(t('userAdded'), $rs->fullname);
				$this->data['msgStatus'] = 'success';
				$this->data['rs'] = $rs;
			} else {
				$this->data['msg'] = t('userNotAdded');
				$this->data['msgStatus'] = 'error';
			}
			/* echo json_encode($return); sleep(3); */
		}
		$groups = array();
		$groups[''] = t('chooseGroup');
		foreach($this->bitauth->get_groups() as $_group)
		{
			$groups[$_group->group_id] = $_group->name;
		}
		$this->data['groups'] = $groups;
		$this->data['pageName'] = 'addUser';
		$this->data['parentCat'] = 'Users';
	}

	public function editUser($user_id){

		if($this->input->post())
		{
			//$this->form_validation->set_rules('username', 			t('username'), 'trim|required|bitauth_unique_username['.$user_id.']');
			$this->form_validation->set_rules('fullName', 			t('fullName'), '');
			$this->form_validation->set_rules('email', 				t('email'), 'trim|required|valid_email');
			if($user_id !=1)
				$this->form_validation->set_rules('groups[]', 			t('group'), '');

			if($this->input->post('password'))
			{
				$this->form_validation->set_rules('password', 		t('password'), 'bitauth_valid_password');
				$this->form_validation->set_rules('passwordConf', 	t('passwordConf'), 'required|matches[password]');
			}

			if($this->form_validation->run() == TRUE)
			{
				unset($_POST['submit'], $_POST['passwordConf']);
				$this->bitauth->update_user($user_id, $this->input->post());
				redirect('/users');
			}

		}

		$groups = array();
		$groups[''] = t('chooseGroup');
		foreach($this->bitauth->get_groups() as $_group)
		{
			$groups[$_group->group_id] = $_group->name;
		}
		$this->data['user'] = $this->bitauth->get_user_by_id($user_id);
		$this->data['groups'] = $groups;
		$this->data['pageName'] = 'editUser';
		$this->data['parentCat'] = 'Users';
	}

	public function dd($str="")
	{
		
		if($str =='')
		{
			$this->form_validation->set_message('dd', t('userGroup'));
			return false;
		}
		else
		{
			return TRUE;
		}
	}

	public function userBlock(){
		return $this->user->updateUserStatus();
	}

	public function userDelete(){
			return $this->user->deleteUser();
	}


}





/* End of file  */
/* Location: ./application/controllers/ */