<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	/* Action Items: */
	// 1. 
	// 2.
	// 3.
	
	public function main()
	{
		parent::__construct();
		
		// Load Models
		$this->load->model('Main_model','main');
	}

	public function index()
	{
		// Get Session Data
		$sessionData = $this->session->userdata;
		
		// Load Data
		$this->view_data['session'] = $sessionData;
		$this->view_data['message'] = $this->main->home_page();
		
		//if($this->input->post('field')){$this->view_data['deals'] = $this->main->get_deals($this->input->post('field'));}
		
		// Load View
		$this->load->view('main/index',$this->view_data);
	}
	
	public function result()
	{
		// Get Session Data
		$sessionData = $this->session->userdata;
		
		// Load Data
		$this->view_data['session'] = $sessionData;
		$this->view_data['message'] = $this->main->home_page();
		
		if($this->input->post('field'))
		{
			$this->view_data['deals'] = $this->main->get_deals($this->input->post('field'));
			$this->view_data['score'] = $this->main->get_sentiment_analysis($this->input->post('field'));
		}
		
		// Load View
		$this->load->view('main/result',$this->view_data);
	}
	
	public function create()
	{
		// Get Session Data
		$sessionData = $this->session->userdata;
		
		// Load Data
		$this->view_data['session'] = $sessionData;
		$this->view_data['message'] = $this->main->create_page();
		
		// Load View
		$this->load->view('main/create',$this->view_data);
	}
	
	/*** Functions ***/
	
	public function login_status()
	{
		// Get Session Data
		$session_data = $this->session->userdata;
		
		// Redirect if Not Logged In
		if(!isset($session_data['logged_in']) || $session_data['logged_in'] == FALSE)
		{
			redirect(base_url()."login");
		}
		else
		{
			return $session_data;	
		}
	}
	
	public function login_hide()
	{
		// Get Session Data
		$session_data = $this->session->userdata;
		
		// Redirect if Logged In
		if(isset($session_data['logged_in']) && $session_data['logged_in'] == TRUE)
		{
			redirect(base_url()."home");
		}
		else
		{
			return $session_data;	
		}
	}
	
}