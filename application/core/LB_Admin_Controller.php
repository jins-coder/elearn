<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LB_Admin_Controller extends LB_Controller{
    // setting default values in the data variable
	public $data;
    function __construct() {
        parent::__construct();
        // calling migration class to create table
        $this->data['admin_logged_in'] = $this->session->admin_logged_in?:TRUE;
        $this->data['pagination'] = '';
		$this->get_admin_segment();
        $this->check_admin_logged_in();
		//$this->data['link_map']=array('controller'=>'','method'=>'');
        // loading left menu of admin panel
        //$this->load->helper(config_item('admin_folder').'/left_menu');
        //$this->data['admin_panel_left_menu']=admin_panel_left_menu();
    }
    // error message based on sesssion flashdata of codeigniter
    public function alertMessage() {
        if ($this->session->flashdata('error')) {
		return '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
			  <strong class="font-bold">Holy smokes!</strong>
			  <span class="block sm:inline">'.$this->session->flashdata('error').'</span>
			  <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
				<svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
			  </span>
			</div>';

        } else if ($this->session->flashdata('success')) {
            return'<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
			  <strong class="font-bold">Holy smokes!</strong>
			  <span class="block sm:inline">'.$this->session->flashdata('success').'</span>
			  <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
				<svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
			  </span>
			</div>';

        } else if ($this->session->flashdata('info')) {
            return'<div class="alert alert-info alert-dismissable">
            <button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
            <strong>Info!</strong> ' . $this->session->flashdata('info') . '</div>';
        } else if ($this->session->flashdata('warning')) {
            return'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
            <strong>Warning!</strong> ' . $this->session->flashdata('warning') . '</div>';
        }
    }
    // checking admin logged in redirecting based on it
    private function check_admin_logged_in() {
        if ($this->data['admin_logged_in']) {
			$this->data['admin_username'] = $this->session->userdata('admin_username')?:'NA';
			if ($this->data['segment']['admin_controller'] == 'user') {
				redirect('admin/dashboard/welcome',$this->data);
            }
        } else if ($this->data['segment']['admin_controller'] != 'user') {
            redirect('admin/user/login');
        }
    }
    //getting admin panel segment, storing controller name and method name
    protected function get_admin_segment(){
        $this->data['segment']['admin_controller'] = $this->uri->segment(2) ? $this->uri->segment(2) : '';
        $this->data['segment']['admin_method'] = $this->uri->segment(3) ? $this->uri->segment(3) : '';
    }

}
