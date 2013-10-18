<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('lang') == NULL)
			$this->session->set_userdata('lang', "english");
	}
	
	public function index()
	{
		// Checking if the user have the right to access;
		/*$this->checkRole(array('admin'));

		redirect('/main');*/
		redirect('/login');
	}

	public function login(){
		
		if( $this->bitauth->logged_in())
		{
			redirect('main');
		}

		$this->template_name =  $this->data['pageName'] = 'login';
		
		$data = array();
		
		if($this->input->post())
		{
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			$data = $this->input->post();
			if(!empty($data['username']) and !empty($data['password'])){
				if($this->bitauth->login($this->input->post('username'), $this->input->post('password'))){
					if($redir = $this->session->userdata('redir'))
					{
						$this->session->unset_userdata('redir');
					}
					
					redirect($redir ? $redir : '/main');
				}
				else
				{
					$this->data['error'] = t('noLogin');
				}
			}
			else {
				$this->data['error'] = t('noLogin');
			}			
		}
	}
		
	public function forgot_password()
	{
		if( $this->bitauth->logged_in())
		{
			redirect('main');
		}
		
		$this->template_name =  $this->data['pageName'] = 'login';

		if($this->input->post())
		{
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_userAvailable');

			if($this->form_validation->run() == TRUE)
			{
				$this->bitauth->generate_forgot_code($this->form_validation->set_value('email'));
				$this->data['success'] = t('emailSent');
			}
		}
	}

	public function userAvailable($email){
		$user = $this->bitauth->get_user_by_email($email);
		if (!$user){
			$this->form_validation->set_message('userAvailable', 'No user is registered with this email.');
			return false;	
		} else {
			return true;
		}
	}

	public function logout()
	{
		$this->bitauth->logout();
		redirect('app');
	}
		
	public function change($lang = "english", $class, $method, $param=""){
		/* $this->config->set_item('lang', $lang); */
		$this->session->set_userdata('lang',$lang);
		$this->lang->is_loaded = array();
		$this->lang->language = array();
		/* $this->lang->load('form_validation', $type);
		$this->lang->load('message', $type); */
		
		if(empty($method)) $method = 'index';
			redirect("/".$class."/".$method."/".$param);
	}
	
	/* public function create(){
		$id = $this->user->createUser('ihabafia', 'Ghadah11');
		echo "Insert Id = ". $id;
	} */
}


/* 
function test()
{
$this->template_name = 'admin';
$this->data['title'] = 'This is dynamic';
} */
