<?php
class Home extends MY_Controller
{
  public function __construct()
  {
  	parent::__construct();
  }
  public function index(){
  	//$this->load->view('home'); //
  	$this->render('home'); //if nothing is passed view page name is home, else passed name
  }
}
