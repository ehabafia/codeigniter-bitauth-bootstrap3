<?php

class MY_Controller extends CI_Controller
{
	// Layout / autoview functionality
	protected $template_name = 'application';
	protected $content_view = '';
	protected $data = array();
	
	function __construct()
	{
		parent::__construct();
		$lang = $this->session->userdata('lang')==null? "english":$this->session->userdata('lang');
		$this->lang->load("message", $lang);
		$this->lang->load("form_validation", $lang);
		$this->lang->load("bitauth", $lang);
	}
	
	public function _output($output)
	{
		if($this->input->is_ajax_request() == TRUE){
			
		}
		else
		{
			if (!empty($this->content_view))
				$this->data['content_view'] = $this->content_view;
			else $this->data['content_view'] = $this->router->method;
			
			// set the default content view
			if($this->content_view !== FALSE and empty($this->content_view))
				$this->content_view = $this->router->class . '/' . $this->router->method;
	
			//render the content view
			$yield = file_exists(APPPATH . 'views/' . $this->content_view . EXT) ? $this->load->view($this->content_view, $this->data, TRUE) : 	$this->load->view('layouts/noLayout.php', $this->data, TRUE)
			;
			
			// render the layout
			if($this->template_name)
				echo $this->load->view('layouts/' . $this->template_name, array ('yield' => $yield), TRUE);
			else
				echo $yield;
		}
	}
	
	public function checkRole($roles){
		if( ! $this->bitauth->logged_in())
		{
			$this->session->set_userdata('redir', current_url());
			redirect('/login');
		}
				
		if(is_array($roles)){
			$i = count($roles);
			$if = "if(";
			for ($x = 0; $x < $i ; $x++){
				$if .= "! \$this->bitauth->has_role('$roles[$x]') and ";
			}
			$if = substr($if, 0, -4);
			$if .= ") { \$this->content_view = '/noAccess'; return false; }";
			eval($if);
		} else {
			if(! $this->bitauth->has_role($roles)){
				$this->content_view = '/noAccess';
				return false;
			}
		}
		return true;
	}
}