<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts extends CI_Controller {

	public function index()
	{
		$allPosts = $this->Post->get_all_posts();
		$this->load->view('index', array('posts' => $allPosts));
	}

	public function create()
	{	
		if(trim($this->input->post('description')) != '')
		{
			$post = $this->Post->add_post($this->input->post('description'));
			$this->get_last_post();
		}	
	}

	public function get_last_post()
	{
		$lastPost = $this->Post->get_last_post();
		
		echo json_encode($lastPost);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */