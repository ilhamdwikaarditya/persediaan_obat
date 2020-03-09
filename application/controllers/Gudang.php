<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('gudang_mdl');
	}

	public function gudang_in(){
		if($this->session->userdata('nama')<>''){
			$data['prev']=$this->mmenu->main_menu();
			$this->load->view('head',$data);
			$datax['jenis_obat']=$this->gudang_mdl->by_jenis();
			$datax['satuan']=$this->gudang_mdl->by_satuan();
			$datax['dist']=$this->gudang_mdl->by_distributor();
			$this->load->view('gudang/gudang_in',$datax);
		}else{
			redirect('welcome/index');
		}
	}

	public function edit($id)
	{
		$data = $this->gudang_mdl->get_by_id_full($id);
		echo json_encode($data);
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
			$insert = $this->gudang_mdl->save('obat',$datac);
			echo json_encode(array("status" => TRUE));
	}

	public function delete($id)
	{
		$this->gudang_mdl->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	function otoidobat(){
		$otoidobat = $this->gudang_mdl->get_otoidobat();
		echo json_encode($otoidobat);
	}
	
	function getObat(){
		$var = $this->input->post();
		$data_id = $this->gudang_mdl->getObat($var);
		echo json_encode($data_id);
	}
	
	function saveObat(){
		$var = $this->input->post();
		$data_id = $this->gudang_mdl->save('obat_in_gudang',$var);
		echo json_encode($data_id);
	}
	
	public function Obat_in_Gudang()
	{
		$param = $this->input->post('param');
		$list = $this->gudang_mdl->get_datatables($param);
		$data = array();
		foreach ($list as $obat) {
			
			$row = array();
			$row[] = $obat->NAMA_DIST;
			$row[] = $obat->NAMA_OBAT;
			$row[] = $obat->JENISOBAT;
			$row[] = $obat->JUMLAH;
			$row[] = $obat->EXPIRED;
			$row[] = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_obat('."'".$obat->ID_IN_GUDANG."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
			$data[] = $row;
		}
		$output = array(
						"recordsTotal" => $this->gudang_mdl->count_all(),
						"recordsFiltered" => $this->gudang_mdl->count_filtered(),
						"data" => $data,
				);
		echo json_encode($output);
	}

}
