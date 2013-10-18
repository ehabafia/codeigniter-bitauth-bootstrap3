<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		if( ! $this->bitauth->logged_in())
		{
			$this->session->set_userdata('redir', current_url());
			redirect('/login');
		}
		
		if ( $this->bitauth->has_role('admin') ){
			redirect('/users');
		} elseif ($this->bitauth->has_role('manager')){
			redirect('/manager');
		} elseif ($this->bitauth->has_role('supervisor')){
			redirect('/supervisor');			
		} elseif ($this->bitauth->has_role('salesman')){
			redirect('/salesman');						
		} else {
			$this->content_view = 'accounts/noAccess';
			return;
		}

		/*$this->data['javascriptFile'][] = 'addClient.js';*/
	}
	
	public function submit(){
		
		$honeypot = $this->input->post('honeypot');
		$humancheck = $this->input->post('humancheck');

		if($honeypot == 'http://' && empty($humancheck))
		{
			/* sleep(3); */
			$fields = array(
					'restaurant_name' => serialize($this->input->post('restaurant_name')),
					'head_office_location' => serialize($this->input->post('head_office_location'))
			);
			$id = $this->client->insert($fields);
		}
		if(isset($id))
		{
			$rs = $this->client->find($id);
			
			
			$data = array(
					'restaurant_name' => unserialize($rs->restaurant_name),
					'head_office_location' => unserialize($rs->head_office_location)
			);
			$return['msg'] = $this->client->getMessage(t('clientAdded'), $data['restaurant_name'][$this->session->userdata('lang')]);
			$return['msgStatus'] = 'message-text';
			$return['id'] = $id;
			$return['rs'] = $rs;
		} else {
			$return['msg'] = $this->client->getMessage(t('clientNotAdded'), $data['restaurant_name'][$this->session->userdata('lang')]);
			$return['msgStatus'] = 'error';
		}
		echo json_encode($return);
	}
	
	/*
	 * 		Checking the session in ajax to logout
	 * 		if the session is expired
	 */
	public function checkSession(){
		if(!($this->session->userdata('ba_user_id')))
			echo "Expired";
	}
	public function change($type){
		$this->session->set_userdata('lang',$type);
		redirect('main');
	}
	
}