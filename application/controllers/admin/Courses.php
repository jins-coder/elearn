<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends LB_Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('courses_model');
		$this->load->library('form_validation');

	}
	public function listcourses() //Student  list
	{
		$this->data['courses'] = $this->courses_model->getCoursesList();
		$this->data['alert'] = $this->alertMessage() ?: '';
		$this->data['site_content'] = 'admin/pages/courses_list';
		$this->load->view('admin/section', $this->data);
	}
	public function addcourses() //Student  list
	{
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
    public function editcourse($id){
		$this->data['course_name'] ='';
		$this->data['course_id'] = $id;
		if(!$id && $id<=0){
			redirect('admin/courses'); //it redirect to controller of index function i have declared index function beacuse if not exist cause error.
			// and if exit i have called an list function from index controller
		}
		//no need of else statement because system works line by line executon
		//if id is present
        //check if is present in db of particluar record
		//if exist take the record
       $result = $this->courses_model->getCourse($id);
		if(empty($result)){
			//no records found...
			redirect('admin/courses');
		}
		if($result){
			//if result has value aassign the value to respective fields include id
			$this->data['course_name'] = $result->cname;
			//after aassign save to db.. here i use update in codeigniter table pass to model
			//$this->course_model->updateCourse()
		}
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
				'cname' => $course_name
			);
			$result = $this->courses_model->updateCourse($course_details,$id);
			if($result){
				$this->session->set_flashdata('success', 'Course Updated Successfully');
				redirect('admin/courses/listcourses');
			}else{
				$this->session->set_flashdata('error', 'Something went wrong!');

			}
			$this->data['alert'] = $this->alertMessage() ?: '';
		}
		$this->data['site_content'] = 'admin/pages/edit_course';
		$this->load->view('admin/section', $this->data);
	}
	public function removeList($id){
		$result = $this->courses_model->remove($id);
		if($result){
			$this->session->set_flashdata('success', 'Course Removed Successfully');
			redirect('admin/courses/listcourses');
		}else{
			$this->session->set_flashdata('error', 'Something went wrong!');

		}

	}
}
