<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Getdata_Model extends CI_Model {
    
    public function GetKeywords(){
        $rows=array();
        $userId=$this->session->userdata('UserId');
        $this->db->select("Keyword_id,Keyword,Entered_On");
        $this->db->from('keyword_data');
        $this->db->where('User_Id', $userId);
        $this->db->order_by("Keyword_id","desc");
        $this->db->limit(5);
        $query = $this->db->get();
        if ($query->num_rows()>0)
        {
            $row=$query->result();
            $rows[]=$row;
        }
        $this->db->select("Id,Keyword,Key_Count");
        $this->db->from('keyword_count');
        $this->db->order_by("Key_Count","desc");
        $this->db->limit(5);
        $query = $this->db->get();
        if ($query->num_rows()>0)
        {
            $row1=$query->result();
            $rows[]=$row1;
        }
        return $rows;
    }


}