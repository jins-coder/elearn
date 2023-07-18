<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends LB_Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model('user_model');
		$this->load->helper('common');


	}
    // loading login
    public function index() {
        redirect('admin/user/login');
    }
    // loading register for first admin, it only work when there is no admin account
    public function register() {
    	//print_r($_POST);exit;
        $this->load->library('form_validation');
        if ($this->user_model->userExists()) {
           // redirect('admin/user/login');
        }
        $validationRules = array(
            array('field' => 'username', 'label' => 'Username', 'rules' => 'trim|required|regex_match[/^[A-Za-z0-9]*$/]|min_length[5]|max_length[15]|is_unique[login.username]|strtolower',
                'errors' => array(
                    'required' => 'Username required.',
                    'username_check' => 'Username name already exists. Please use a different username.',
                    'regex_match' => 'Please use only letters (A-Z, a-z) and numbers.',
                    'is_unique' => 'That Username is taken. Try another.'
                )
            ),
            /*array('field' => 'rEmail', 'label' => 'Email', 'rules' => 'trim|required|valid_email|max_length[255]|is_unique[LB_user.user_email]|strtolower',
                'errors' => array(
                    'required' => 'Email required.',
                    'valid_email' => 'Invalid email address.',
                    'is_unique' => 'That Email address is taken. Try another.'
                )
            ),*/
            array('field' => 'password', 'label' => 'Password', 'rules' => 'required|min_length[5]|max_length[50]',
                'errors' => array(
                    'required' => 'Password required.'
                )
            ),
            array('field' => 'cpassword', 'label' => 'Confirm Password', 'rules' => 'required|matches[password]',
                'errors' => array(
                    'required' => 'Confirm password required.',
                    'matches' => 'Password and confirm password don\'t match.'
                )
            )
        );
        $this->form_validation->set_rules($validationRules);
        if ($this->form_validation->run() == TRUE) {
            $input_data = array(
                'username' => $this->input->post('username'),
                'password' => hash_input($this->input->post('password')),
                'role' => 'A',
				'status'=>1
            );
            if ($this->user_model->register($input_data)) {
                $this->session->set_flashdata('success', 'Account created successfully.');
                redirect('admin/user/login');
            } else {
                $this->session->set_flashdata('error', 'Account creation unsuccessful.');
            }
        }
        $this->data['alert'] = $this->alertMessage() ?: '';
        $this->data['site_content']='admin/pages/register';
        $this->load->view('admin/section',$this->data);
    }
    // loading login 
    public function login() {
       
        $this->load->library('form_validation');
        $validationRules = array(
            array('field' => 'username', 'label' => 'Username', 'rules' => 'trim|required|strtolower',
                'errors' => array(
                    'required' => 'Username  required.'
                )
            ),
            array('field' => 'password', 'label' => 'Password', 'rules' => 'required',
                'errors' => array(
                    'required' => 'Password required.'
                )
            )
        );
        $this->form_validation->set_rules($validationRules);
        if ($this->form_validation->run()) {
            $result = $this->user_model->login();
            if (count($result) > 0) {
                if($result->role=='A'){
                $session_data = array(
                    'admin_user_id' => $result->logid,
                    'admin_username' => $result->username,
                    'admin_user_type' => $result->role,
                    'admin_logged_in' => TRUE
                );
                //$this->User_model->update_previous_login($result->user_id,$result->user_current_login);
                $this->session->set_userdata($session_data);
                redirect('admin/dashboard/welcome');
                }else{
                    $this->session->set_flashdata('error', 'Your account is deactivated.');
                    $this->data['alert'] = $this->alertMessage() ?: '';     
                }               
            } else if (!$this->user_model->userExists()) {
                redirect('admin/user/register');
            } else {
                $this->session->set_flashdata('error', 'Invalid Username or Password.');
                $this->data['alert'] = $this->alertMessage() ?: '';
            }
        }
        $this->data['site_content']='admin/pages/login';
        $this->load->view('admin/section',$this->data);
    }
    //loading forgot password
    public function forgot_password(){
        redirect('admin/user/login');
        $this->load->library('form_validation');
        $validationRules = array(
            array('field' => 'recoverUsernameEmail', 'label' => 'Username or Email', 'rules' => 'trim|required|strtolower',
                'errors' => array(
                    'required' => 'Username or Email ID required.'
                )
            )
        );
        $this->form_validation->set_rules($validationRules);
        if ($this->form_validation->run()) {
            $result=$this->user_model->recover_by_email();
            if(count($result)>0){
                if($result->user_account_status=='D'){
                    $this->session->set_flashdata('error', 'Your account is deactivated.');
                    $this->data['alert'] = $this->alertMessage() ?: '';
                }else{
                    if($recovery_key=$this->User_model->generate_recovery_key($result->user_id)){
                        $this->load->helper(config_item('admin_folder').'/mail');
                        send_recovery_mail($result->user_email,$recovery_key,'','',$result->username);
                        $this->session->set_flashdata('success', 'Please check your email for confirmation code.');
                        $this->data['alert'] = $this->alertMessage() ?: '';
                    }else{
                        $this->session->set_flashdata('error', 'Recovery process unsuccessful.');
                        $this->data['alert'] = $this->alertMessage() ?: '';
                    }
                }
            }else{
                $this->session->set_flashdata('error', 'Invalid username or email Id.');
                $this->data['alert'] = $this->alertMessage() ?: '';
            }            
        }
        $this->data['site_content']=config_item('admin_folder').'/page/forgot_password';
        $this->load->view(config_item('admin_folder').'/main',$this->data);
    }   
    //loading change password
    public function change_password($recovery_key="",$usernameEmail=""){
        $this->data['recovery_key']=$recovery_key;
        $this->data['usernameEmail']=$usernameEmail;
        $this->load->library('form_validation');
        $validationRules = array(
            array('field' => 'usernameEmail', 'label' => 'Username or Email ID', 'rules' => 'trim|required|strtolower',
                'errors' => array(
                    'required' => 'Username or Email ID required.'
                )
                ),
        
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
                array('field' => 'recoveryKey', 'label' => 'recoveryKey', 'rules' => 'trim|required',
            'errors' => array(
                'required' => 'Confirmation code required, that is send to your email.'
            ))
               
        );       
        $this->form_validation->set_rules($validationRules);
        if ($this->form_validation->run() == TRUE) {
            $this->load->model(config_item('admin_folder').'/User_model');
            $result=$this->User_model->check_recovery_key_expired();
            if(count($result)>0){            
                if($this->User_model->change_password()){
                    $this->session->set_flashdata('success','Your account password changed successfully.');
                    $this->data['alert'] = $this->alertMessage() ?: '';     
                }else{
                    $this->session->set_flashdata('error', 'Your account password change unsuccessful.');
                    $this->data['alert'] = $this->alertMessage() ?: ''; 
                }
            }else{
                $this->session->set_flashdata('error', 'The given confirmation code is expired.');
                $this->data['alert'] = $this->alertMessage() ?: ''; 
            }                 
        }
        $this->data['site_content']=config_item('admin_folder').'/page/change_password';
        $this->load->view(config_item('admin_folder').'/main',$this->data);
    }


}
