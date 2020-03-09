<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Puskesmas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Puskesmas_mdl');
	}

	public function Puskesmas_in(){
		if($this->session->userdata('nama')<>''){
			$data['prev']=$this->mmenu->main_menu();
			$this->load->view('head',$data);
			$datax['jenis_obat']=$this->Puskesmas_mdl->by_jenis();
			$datax['satuan']=$this->Puskesmas_mdl->by_satuan();
			$datax['puskesmas']=$this->Puskesmas_mdl->by_puskesmas();
			$this->load->view('Puskesmas/Puskesmas_in',$datax);
		}else{
			redirect('welcome/index');
		}
	}
	
	public function Puskesmas_out(){
		if($this->session->userdata('nama')<>''){
			$data['prev']=$this->mmenu->main_menu();
			$this->load->view('head',$data);
			$datax['jenis_obat']=$this->Puskesmas_mdl->by_jenis();
			$datax['satuan']=$this->Puskesmas_mdl->by_satuan();
			$datax['pasien']=$this->Puskesmas_mdl->by_pasien();
			$this->load->view('Puskesmas/Puskesmas_out',$datax);
		}else{
			redirect('welcome/index');
		}
	}

	public function add()
	{
		
			$datac = array(
				'BATCH_OBAT' => $this->input->post('batch_obat'),
				'NAMA_OBAT' => $this->input->post('nama_obat'),
				'JENIS_OBAT' => $this->input->post('jenis_obat'),
				'EFEK_OBAT' => $this->input->post('efek_obat'),
				'EXPIRED' => $this->input->post('expired'),
				'CDATE' => date('Y-m-d H:i:s'),
				'USER_ENTRY' => $this->session->userdata('nama')
			);
			$insert = $this->Puskesmas_mdl->save('obat',$datac);
			echo json_encode(array("status" => TRUE));
	}

	public function delete($id)
	{
		$this->Puskesmas_mdl->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	function otoidobat(){
		$otoidobat = $this->Puskesmas_mdl->get_otoidobat();
		echo json_encode($otoidobat);
	}
	
	function getObat(){
		$var = $this->input->post();
		$data_id = $this->Puskesmas_mdl->getObat($var);
		echo json_encode($data_id);
	}
	
	function getObatPuskesmas(){
		$var = $this->input->post();
		$data_id = $this->Puskesmas_mdl->getObatPuskesmas($var);
		echo json_encode($data_id);
	}
	
	function saveObat(){
		$var = $this->input->post();
		$data_id = $this->Puskesmas_mdl->save('obat_in_Puskesmas',$var);
		echo json_encode($data_id);
	}
	
	function saveObatPasien(){
		$var = $this->input->post();
		$data_id = $this->Puskesmas_mdl->save('obat_out_Puskesmas',$var);
		echo json_encode($data_id);
	}
	
	public function Obat_in_Puskesmas()
	{
		$param = $this->input->post('param');
		$list = $this->Puskesmas_mdl->get_datatables($param);
		$data = array();
		foreach ($list as $obat) {
			
			$row = array();
			$row[] = $obat->PUSKESMAS;
			$row[] = $obat->NAMA_OBAT;
			$row[] = $obat->JENISOBAT;
			$row[] = $obat->JUMLAH;
			$row[] = $obat->EXPIRED;
			$row[] = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_obat('."'".$obat->ID_IN_PUSKESMAS."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
			$data[] = $row;
		}
		$output = array(
						"recordsTotal" => $this->Puskesmas_mdl->count_all(),
						"recordsFiltered" => $this->Puskesmas_mdl->count_filtered(),
						"data" => $data,
				);
		echo json_encode($output);
	}
	
	public function Obat_out_Puskesmas()
	{
		$param = $this->input->post('param');
		$tanggal = $this->input->post('tanggal');
		$list = $this->Puskesmas_mdl->get_datatables_out($param,$tanggal);
		$data = array();
		foreach ($list as $obat) {
			
			$row = array();
			$row[] = $obat->NAMA_PASIEN;
			$row[] = $obat->NAMA_OBAT;
			$row[] = $obat->JENISOBAT;
			$row[] = $obat->JUMLAH;
			$row[] = $obat->EXPIRED;
			$row[] = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_obat('."'".$obat->ID_OUT_PUSKESMAS."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
			$data[] = $row;
		}
		$output = array(
						"recordsTotal" => $this->Puskesmas_mdl->count_all_out(),
						"recordsFiltered" => $this->Puskesmas_mdl->count_filtered_out(),
						"data" => $data,
				);
		echo json_encode($output);
	}

}
