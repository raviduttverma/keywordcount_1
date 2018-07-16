<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RegisterData_Model extends CI_Model {
    
    public function register(){
        $username = $this->security->xss_clean($this->input->post('username'));
        $email = $this->security->xss_clean($this->input->post('email'));
        $phone = $this->security->xss_clean($this->input->post('phone'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $password_confirm = $this->security->xss_clean($this->input->post('password_confirm'));
        $encryptedpsd=md5(Cookie_Key.$password);
        $data = array('User_name'=> $username,
            'Email_Id'=>$email,
            'Mobile_Number'=>$phone,
            'Password'=>$encryptedpsd
        );
        if($password==$password_confirm){
            $this->db->insert('user_info', $data);
            return true;
        }else{
            return false;
        }
    }


}