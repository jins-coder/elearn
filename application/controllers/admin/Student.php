<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends LB_Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('student_model');
	}
	public function index() //Student  list
	{
		$this->data['students'] = $this->student_model->getStudentList();
		$this->data['site_content'] = 'admin/pages/studentlist';
		$this->load->view('admin/section', $this->data);
	}
}
