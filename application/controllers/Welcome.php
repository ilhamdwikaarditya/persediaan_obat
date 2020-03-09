<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$username = $this->input->post('username');
		$password =  $this->input->post('password');
		$hasil= $this->mmenu->validate($username,$password);
		if($hasil==true){
			$this->dashboard();
		}else{			 
            $this->load->view('login');
		}
	}
	
	public function dashboard(){
		if($this->session->userdata('ket')<>''){
			$data['prev']=$this->mmenu->main_menu();			
			$this->load->view('head',$data);
			$datax['totcust']=$this->mmenu->totcust();
			#$datax['totlang']=$this->mmenu->totlang();
			#$datax['totkwh']=$this->mmenu->totkwh();
			#$datax['totrptag']=$this->mmenu->totrptag();
			#$datax['grafikkwh']=$this->mmenu->get_grafik_kwh();
			#$datax['grafikincome']=$this->mmenu->get_grafik_income();
			$this->load->view('content',$datax);
		}else{
			$this->load->view('login');
		}
	}
	
	public function get_chart_langbyarea(){
		$data_id = $this->mmenu->get_chart_langbyarea();
		echo json_encode($data_id);
	}
	
	public function get_chart_langbygol(){
		$data_id = $this->mmenu->get_chart_langbygol();
		echo json_encode($data_id);
	}
	
	public function get_chart_dayabyarea(){
		$data_id = $this->mmenu->get_chart_dayabyarea();
		echo json_encode($data_id);
	}
	
	public function get_chart_dayabygol(){
		$data_id = $this->mmenu->get_chart_dayabygol();
		echo json_encode($data_id);
	}
	
	public function get_chart_kwhbyarea(){
		$data_id = $this->mmenu->get_chart_kwhbyarea();
		echo json_encode($data_id);
	}
	
	public function get_chart_kwhbygol(){
		$data_id = $this->mmenu->get_chart_kwhbygol();
		echo json_encode($data_id);
	}
	
	public function get_chart_pendapatanbyarea(){
		$data_id = $this->mmenu->get_chart_pendapatanbyarea();
		echo json_encode($data_id);
	}
	
	public function get_chart_pendapatanbygol(){
		$data_id = $this->mmenu->get_chart_pendapatanbygol();
		echo json_encode($data_id);
	}
	
	public function logout(){
		$this->session->userdata['username']='';
		$this->session->userdata['usermenu']='';
		$this->session->userdata['usermenu2']='';
		$this->session->userdata['ket']='';
		
		$CI =& get_instance();
		$CI->session->sess_destroy();
		$this->load->view('login');
	}
	
}
