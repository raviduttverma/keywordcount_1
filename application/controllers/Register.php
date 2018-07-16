<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	public function index()
	{
		$this->load->view('register_view');
    }
    public function SaveRegisterForm(){
        $this->load->model('RegisterData_Model');
        $reg=$this->RegisterData_Model->register();

        if($reg==1){
            header("location: ../Login"); 
        }else{
            header("location: Register");
        }
        
       
    }
}
