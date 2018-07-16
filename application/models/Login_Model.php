<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_Model extends CI_Model {
    
    public function login(){
        $email = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $encryptedpsd=md5(Cookie_Key.$password);
        $data = array(
            'Email_Id'=>$email,
            'Password'=>$encryptedpsd
        );
        $this->db->select("User_Id, User_name");
        $this->db->from('user_info');
        $this->db->where('Email_Id', $email);
        $this->db->where('Password', $encryptedpsd);
        $query = $this->db->get();
        if ($query->num_rows()==1)
        {
            $row = $query->row_array();
            return $row;
        }else{
            return false;
        }
    }


}