<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Courses_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public  function getCoursesList(){
		$sql = $this->db->query("select * from course");
		return $sql->result();
	}

	public function saveCourse($data,$id=null)
	{
		// data is array;

		if($this->db->insert('course', $data)){
			return true;
		}else{
			return false;
		}

	}

}
