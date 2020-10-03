<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LB_Website_Controller extends LB_Controller {
	// declaring public variable array for sending data to view
	public $data = array();
	
	// setting default values in the data variable
	function __construct() {
		parent::__construct();
		$this->get_website_segment();
		$this->general();
	}
	
	//getting segment, storing controller name and method name
	protected function get_website_segment() {
		$this->data['segment']['website_controller'] = $this->uri->segment(1) ?: 'home';
		$this->data['segment']['website_method'] = $this->uri->segment(2);
	}
	
	public function general() {
		$this->load->model(config_item('admin_folder') . '/Article_model');
		$this->load->model(config_item('admin_folder') . '/Contact_model');
		$this->load->model(config_item('admin_folder') . '/Social_model');
		$this->load->model(config_item('admin_folder') . '/Category_model');
		$this->data['footer_about'] = $this->Article_model->get_article(3);
		$this->data['contact'] = $this->Contact_model->get_contact(1);
		$this->data['social'] = $this->Social_model->get_social(1);
		$this->data['service'] =$this->Category_model->getAll_category();
		$this->data['search'] = '';
	}
}