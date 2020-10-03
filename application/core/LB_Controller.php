<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LB_Controller extends CI_Controller{
    // declaring public variable array for sending data to view 
    public $data = array();
    // setting default values in the data variable
     function __construct() {
        parent::__construct();
        $this->load_migration();
        $this->data = array();
        $this->data['error'] = '';
        $this->data['alert'] = '';
        $this->data['website_title'] = config_item('website_title');
        $this->data['website_meta_tag'] = config_item('website_meta_tag');
        $this->data['segment'] = array('website_controller'=>'','website_method'=>'','admin_controller'=>'','admin_method'=>'');
		$this->data['site_content'] = '';		
    }
    // calling codeigniter migration class
    private function load_migration()
    {
        if(config_item('migration')==TRUE) {
            $this->load->library('migration');
            if ($this->migration->current() === FALSE) {
                show_error($this->migration->error_string());
            } else {
                // loading session library
                $this->load->library('session');
            }
        }else {
            //loading session library
            $this->load->library('session');
        }
    }
}
