<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Examcenter_model extends CI_Model
{
   public function __construct()
   {
   	parent::__construct();
   }
   public function getcenters(){
     return $this->db->get('centre')->result();
   }
   public function savecenter($data){
   	return $this->db->insert('centre',$data);

   }
}
