<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$UserId=$this->session->userdata('UserId');
		if($UserId!=""){
			$this->load->view('home_view');
		}else{
			header("location: Login"); 
		}
	}

	public function InsertKeywords(){
		$this->load->model('Enterdata_Model');
		$data=$this->Enterdata_Model->InsertKeywords();
		echo $data;
	}

	public function Getkeywords(){
		$this->load->model('Getdata_Model');
		$data=$this->Getdata_Model->GetKeywords();
		echo json_encode($data);
	}
}