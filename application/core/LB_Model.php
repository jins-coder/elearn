<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class LB_Model extends CI_Model
{
    public $affected_rows;
    public $inserted_id;
    public $total_rows;
    protected $tableName = NULL;
    function __construct($table_name)
    {
        parent::__construct();
        $this->tableName = $table_name;
        $this->inserted_id = 0;
        $this->affected_rows = 0;
        $this->total_rows = 0;
        $this->load->helper('security');
    }
    // calling select query based on parameters
    public function select($column = '*', $where = FALSE, $fetch_row = FALSE, $order_by = FALSE, $limit = FALSE)
    {
        $this->total_rows = 0;
        $this->db->select($column);
        if ($where) {
            $this->security->xss_clean($where);
            $this->db->where($where);
        }
        if ($fetch_row == TRUE) {
            $method = "row";
        } else {
            $method = "result";
        }
        if ($order_by) {
            $this->db->order_by($order_by);
        }
        if ($limit) {
            $this->db->limit($limit);
        }
        $result = $this->db->get($this->tableName)->$method();
	    $this->total_rows = $result? count($result):0;
        return $result;
    }
    // calling insert or update query based on parameter
    public function insert($data, $where = FALSE)
    {
        $this->inserted_id = 0;
        $this->affected_rows = 0;
        //for insert
        if ($where == FALSE) {
            $this->security->xss_clean($data);
            $this->db->set($data);
            $this->db->insert($this->tableName);
            $this->inserted_id = $this->db->insert_id();
            return $this->db->insert_id();
        } //for update
        else {
            $this->security->xss_clean($data);
            $this->security->xss_clean($where);
            $this->db->set($data);
            $this->db->where($where);
            $this->db->update($this->tableName);
            $this->affected_rows = $this->db->affected_rows();
            return TRUE;
        }
        return FALSE;
    }
    // calling delete query based on parameter
    public function delete($where = FALSE, $limit = TRUE)
    {
        $this->affected_rows = 0;
        if ($where == FALSE) {
            return FALSE;
        }
        $this->db->where($where);
        $this->security->xss_clean($where);
        if ($limit == TRUE)
            $this->db->limit(1);
        $this->db->delete($this->tableName);
        $this->affected_rows = $this->db->affected_rows();
        return TRUE;
    }
    // checking table exits or note
    public function tableExists()
    {
        return $this->db->table_exists($this->tableName);
    }
    // get count of all the rows in table
    public function countTotalRows($where = NULL, $column = '*')
    {
        if ($where != NULL) {
            $this->security->xss_clean($where);
            $this->db->where($where);
        }
        $this->db->select($column);
        return $this->db->count_all_results($this->tableName);
    }
    //execute long query 
    public function full_query($query, $fetch_row = FALSE)
    {
        if ($fetch_row == TRUE) {
            $method = "row";
        } else {
            $method = "result";
        }
        $result = $this->db->query($query)->$method();
        return $result;
    }
}