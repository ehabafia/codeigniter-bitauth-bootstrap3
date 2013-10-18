<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manager extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		if( ! $this->bitauth->logged_in())
		{
			$this->session->set_userdata('redir', current_url());
			redirect('/login');
		}
		if ( ! $this->bitauth->has_role('manager'))
		{
			$this->content_view = 'accounts/noAccess';
			return;
		}
	}

	public function index()
	{
		$this->data['pageName'] = 'Managers Page';
		$this->data['parentCat'] = NULL;
	}

}

/* End of file manager.php */
/* Location: ./application/controllers/manager.php */