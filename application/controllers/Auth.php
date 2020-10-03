<?php
class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}

	public function index()
	{
		if($this->session->userdata('name')){
			$this->load->view('student/home');
		}else{
			echo "Not Authenticated";
		}

	}
	public function login(){
        $retunr_login = $this->User_model->login();
        $this->load->view('student/page/login');
	}

	public function register()
	{
			$this->load->view('student/register');
	}

	public function setSession($user)
	{
		//setting user authentication
	}

	public function getSession($user)
	{
		//getting user authentication
	}

}
