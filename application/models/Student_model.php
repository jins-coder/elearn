<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public  function getStudentList(){
		$sql = $this->db->query("select * from studreg where  status='1'");
		return $sql->result();
	}
}
