<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends LB_Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        #redirect(config_item('admin_folder').'/dashboard/welcome');
        $this->data['link_map']['controller'] = 'Dashboard';
		$this->load->model('user_model');
    }
    public function index()
    {

        $this->welcome();
    }
    public function welcome()
    {
		$this->data['link_map']['method'] = 'Welcome';
        $this->data['site_content'] = 'admin/pages/home';
        $this->load->view('admin/section', $this->data);

    }
    public function change_password()
    {
        $this->load->library('form_validation');
        $validationRules = array(
            array('field' => 'newPassword', 'label' => 'Password', 'rules' => 'required|min_length[5]|max_length[50]',
                'errors' => array(
                    'required' => 'New password required.'
                )
            ),
            array('field' => 'newConfirmPassword', 'label' => 'Confirm Password', 'rules' => 'required|matches[newPassword]',
                'errors' => array(
                    'required' => 'Confirm password required.',
                    'matches' => 'New password and confirm password don\'t match.'
                )
            ),
            array('field' => 'oldPassword', 'label' => 'Old password', 'rules' => 'required',
                'errors' => array(
                    'required' => 'Old password required.'
                )
            ));
        $this->form_validation->set_rules($validationRules);
        if ($this->form_validation->run() == TRUE) {
            $this->load->model(config_item('admin_folder') . '/User_model');
            $result = $this->User_model->check_recovery_key_expired();
            if ($this->User_model->change_password()) {
                $this->session->set_flashdata('success', 'Your account password changed successfully.');
                $this->data['alert'] = $this->alertMessage() ?: '';
            } else {
                $this->session->set_flashdata('error', 'Your account password change unsuccessful.');
                $this->data['alert'] = $this->alertMessage() ?: '';
            }
        }
        $this->data['site_content'] = config_item('admin_folder') . '/page/change_password';
        $this->load->view(config_item('admin_folder') . '/section', $this->data);
    }
    public function logout()
    {
        $this->user_model->logout();
        redirect('admin/user/login');
    }
}
