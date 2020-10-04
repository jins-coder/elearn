<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Courses_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public  function getCoursesList(){
		$sql = $this->db->query("select * from course where status='1'");
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
	public function getCourse($id){
		 $this->db->select('*');
		 $this->db->from('course');
		 $this->db->where('cid',$id);
		$this->db->where('status','1');
		 $query = $this->db->get();
 			return $query->row();
		 //print_r($this->db->last_query());exit; execute which query is last executed
	}
	public function updateCourse($data,$id)
	{
		// data is array;

		$this->db->where('cid', $id);
	   $query = $this->db->update('course', $data);
		if($query){
			return true;
		}else{
			return false;
		}

	}
  public function remove($id){
		//setting status to 0
		  $this->db->where('cid', $id);
		  $this->db->set('status', '0');
		  $query = $this->db->update('course');
	  if($query){
		  return true;
	  }else{
		  return false;
	  }
  }
}
