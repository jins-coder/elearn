<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends LB_Model
{
    protected $tableName = 'login';
    public function __construct()
    {
        parent::__construct($this->tableName);
		$this->load->helper('common');

	}
    public function userExists()
    {
        $where = array('role' => 'A');
        return $this->countTotalRows($where);
    }
    public function register($data)
    {
        return $this->insert($data);
    }
    public function login()
    {
        $where = "username = '" . $this->input->post('username') . "'
            and password = '" . hash_input($this->input->post('password')) . "'
            and role= 'A'";
        $column = array('logid', 'username', 'role');
        return $this->select($column, $where, TRUE);
    } public function loginuser()
    {
        $where = "(username ='" . $this->input->post('lUsernameEmail') . "'
            or user_email = '" . $this->input->post('lUsernameEmail') . "')
            and user_password = '" . hash_input($this->input->post('lPassword')) . "'
            and user_type= 'U'";
        $column = array('user_id', 'username', 'user_email', 'user_type', 'user_current_login', 'user_last_login', 'user_account_status');
        return $this->select($column, $where, TRUE);
    }
    public function update_previous_login($user_id, $user_last_login)
    {
        $data = array('user_last_login' => $user_last_login, 'user_current_login' => date('Y-m-d H:i:s'));
        $where = "(user_id='" . $user_id . "')";
        return $this->insert($data, $where);
    }
    public function recover_by_email()
    {
        $where = "(user_email = '" . $this->input->post('recoverUsernameEmail') . "') or (username = '" . $this->input->post('recoverUsernameEmail') . "')";
        $column = array('user_type', 'user_id', 'username', 'user_email', 'user_account_status');
        return $this->select($column, $where, TRUE);
    }
    public function generate_recovery_key($user_id)
    {
        $this->load->helper(config_item('admin_folder') . '/common');
        $recovery_key = random_string(6);
        $where = "(user_id = '" . $user_id . "')";
        $data = array('user_security_key_created_on' => date('Y-m-d H:i:s'),
            'user_security_key ' => $recovery_key);
        return $this->insert($data, $where) ? $recovery_key : FALSE;
    }
    public function check_recovery_key_expired()
    {
        $where = "(username ='" . $this->input->post('usernameEmail') . "'
        or user_email = '" . $this->input->post('usernameEmail') . "') 
        and user_security_key_created_on > DATE_SUB('" . date('Y-m-d H:i:s') . "', INTERVAL 1 HOUR)";
        $column = array('user_type', 'user_id', 'username', 'user_email', 'user_account_status');
        return $this->select($column, $where, TRUE);
    }
    public function change_password()
    {
        $this->load->helper(config_item('admin_folder') . '/common');
        $data = array('user_password' => hash_input($this->input->post('newPassword')));
        $where = " user_account_status= 'A'";
        if ($this->data['admin_logged_in']) {
            $where .= " and username ='" . $this->session->admin_username . "'";
            $where .= " and user_password = '" . hash_input($this->input->post('oldPassword')) . "'";
            if ($this->select('user_id', $where, TRUE)) {
                return $this->insert($data, $where);
            } else {
                return FALSE;
            }
        } else {
            $where .= " and (username ='" . $this->input->post('usernameEmail') . "'
                 or user_email = '" . $this->input->post('usernameEmail') . "')";
            $where .= " and user_security_key = '" . $this->input->post('recoveryKey') . "'";
            if ($this->select('user_id', $where, TRUE)) {
                return $this->insert($data, $where);
            } else {
                return FALSE;
            }
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
    }
}
