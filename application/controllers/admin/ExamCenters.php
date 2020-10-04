<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ExamCenters extends LB_Admin_Controller
{

	public function __construct()
 {
 	parent::__construct();
    $this->load->model('examcenter_model');
	 //$this->data['examcenters'] = $this->examcenter_model->getcenters();
	 $this->load->library('form_validation');
	 $this->data['examcenters'] = '';
 }
	 public function index(){
		$this->listCenters();
	 }
	 public function listCenters(){
		 $this->data['examcenters'] = $this->examcenter_model->getcenters();
		 //echo "<pre>";print_r($this->data['examcenters']);exit;
		 $this->data['alert'] = $this->alertMessage() ?: '';
		 $this->data['site_content'] = 'admin/pages/examcenters';
		 $this->load->view('admin/section', $this->data);
	 }
	 public function addcenters(){
		$validationRules =  array(


			 array('field' => 'center_name', 'label' => 'Center Name', 'rules' => 'trim|required',
				 'errors' => array(
					 'required' => 'Center name  required.'
				 )),
			 array('field' => 'contact', 'label' => 'Contact Name', 'rules' => 'trim|required|numeric',
				 'errors' => array(
					 'required' => 'Contact required.'
				 )),
			 array('field' => 'email', 'label' => 'Email', 'rules' => 'trim|required|valid_email|strtolower',
				 'errors' => array(
					 'required' => 'Email  required.'
				 )),

		 );
		$this->form_validation->set_rules($validationRules);
		if ($this->form_validation->run() == TRUE) {
			$district_name = $this->input->post('district');
			$place = $this->input->post('place');
			$center_name = $this->input->post('center_name');
			$contact = $this->input->post('contact');
			$email = $this->input->post('email');



			$centerDetails = array(
				'dis' => $district_name,
				'place' => $place,
				'cname' => $center_name,
				'contact' => $contact,
				'email' => $email,


			);
			$result = $this->examcenter_model->savecenter($centerDetails);
			if($result){
				$this->session->set_flashdata('success', 'Center Saved !');
				 redirect('admin/examcenters/listCenters');
			}else{
				$this->session->set_flashdata('error', 'Something went wrong!');
            }
			$this->data['alert'] = $this->alertMessage() ?: '';
		}else{
			echo validation_errors();
			exit;
		}

	 }
}
