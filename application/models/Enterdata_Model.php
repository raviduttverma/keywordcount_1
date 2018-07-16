<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Enterdata_Model extends CI_Model {
    
    public function InsertKeywords(){
        $keyword=$this->security->xss_clean($this->input->post('keyword'));
        $userId=$this->session->userdata('UserId');
        $data = array('Keyword'=> $keyword,
            'User_Id'=>$userId
        );
        $dataForCount = array('Keyword'=> $keyword, 'Key_Count'=>1
        );
        $keywodCount=strlen($keyword);
        if($userId!="" && $keywodCount<=5){
            $this->db->select("Id,Keyword");
            $this->db->from('keyword_count');
            $this->db->where('Keyword', $keyword);
            $query = $this->db->get();
            if ($query->num_rows()>0)
            {
                $row = $query->row_array();
                $this->db->insert('keyword_data', $data);
                $sqlquery='UPDATE keyword_count SET "Key_Count"="Key_Count"+1 WHERE "Id" = '.$row["Id"];
                $run=$this->db->query($sqlquery);
                return true;
            }else{
                $keycount=$this->db->insert('keyword_count', $dataForCount);
                $keyInsert=$this->db->insert('keyword_data', $data);
                return true;
            }
            
        }else{
            return false;
        }
    }


}