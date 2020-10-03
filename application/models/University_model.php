<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class University_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
  	}
  	public  function getApprovalList(){
		$sql = $this->db->query("select * from unireg where 1 and status = 0");
		return $sql->result();
	}

	public function getuniversityList()
	{
		$sql = $this->db->query("select * from unireg where 1 and status = 1");
		return $sql->result();
	}

}
