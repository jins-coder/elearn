<?php
class Home extends CI_Controller
{
  public function __construct()
  {
  	parent::__construct();
  }

	public function index()
	{
		$this->execute();
      //$this->load->view('welcome_message');
    }

	public function execute($parm='')
	{

       $this->data['param'] = array(
       	'id'=>2,
		   'name'=>'myname',
	   );
		$this->load->view('welcome_message',$this->data);
    }
}
