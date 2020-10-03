<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class University extends LB_Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('university_model');
	}

	public function index() //uiversity approval list
	{
	  $this->data['universitylists'] = $this->university_model->getApprovalList();
	  $this->data['site_content'] = 'admin/pages/universityapprove_list';
      $this->load->view('admin/section', $this->data);
	}
	public function universityList() // All universities
	{
		$this->data['universities'] = $this->university_model->getuniversityList();
		$this->data['site_content'] = 'admin/pages/university_list';
		$this->load->view('admin/section', $this->data);
	}
}
