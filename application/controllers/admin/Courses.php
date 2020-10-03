<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends LB_Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('courses_model');
	}
	public function listcourses() //Student  list
	{
		$this->data['courses'] = $this->courses_model->getCoursesList();
		$this->data['site_content'] = 'admin/pages/courses_list';
		$this->load->view('admin/section', $this->data);
	}
	public function addcourses() //Student  list
	{
		$this->load->library('form_validation');
		$validationRules = array(
			array('field' => 'course_name', 'label' => 'Course Name', 'rules' => 'trim|required',
				'errors' => array(
					'required' => 'Course name  required.'
				)
			)

		);
		$this->form_validation->set_rules($validationRules);
		if ($this->form_validation->run() == TRUE) {
			$course_name = $this->input->post('course_name');
			$course_details = array(
				'cname'=>$course_name
			);
			$result = $this->courses_model->saveCourse($course_details);
			if($result){
				$this->session->set_flashdata('success', 'Course Added Successfully');
				redirect('admin/courses/listcourses');
			}else{
				$this->session->set_flashdata('error', 'Something went wrong!');

			}
			$this->data['alert'] = $this->alertMessage() ?: '';
		}
		$this->data['site_content'] = 'admin/pages/courses_add';
		$this->load->view('admin/section', $this->data);
	}
	public function index(){
		$this->listcourses();
	}

}
