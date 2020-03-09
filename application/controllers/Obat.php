<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('obat_mdl');
	}

	public function listobat(){
		if($this->session->userdata('nama')<>''){
			$data['prev']=$this->mmenu->main_menu();
			$this->load->view('head',$data);
			$datax['jenis_obat']=$this->obat_mdl->by_jenis();
			$this->load->view('listobat/listobat',$datax);
		}else{
			redirect('welcome/index');
		}
	}

	public function list_obat()
	{
		$list = $this->obat_mdl->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $obat) {
			$no++;
			$row = array();
			$row[] = $obat->ID_OBAT;
			$row[] = $obat->NAMA_OBAT;
			$row[] = $obat->JENISOBAT;
			$row[] = $obat->EFEK_OBAT;
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_obat('."'".$obat->ID_OBAT."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_obat('."'".$obat->ID_OBAT."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
			$data[] = $row;
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->obat_mdl->count_all(),
						"recordsFiltered" => $this->obat_mdl->count_filtered(),
						"data" => $data,
				);
		echo json_encode($output);
	}

	public function edit($id)
	{
		$data = $this->obat_mdl->get_by_id_full($id);
		echo json_encode($data);
	}

	public function add()
	{
		
			$datac = array(
				'BATCH_OBAT' => $this->input->post('batch_obat'),
				'NAMA_OBAT' => $this->input->post('nama_obat'),
				'JENIS_OBAT' => $this->input->post('jenis_obat'),
				'EFEK_OBAT' => $this->input->post('efek_obat'),
				'CDATE' => date('Y-m-d H:i:s'),
				'USER_ENTRY' => $this->session->userdata('nama')
			);
			$insert = $this->obat_mdl->save('obat',$datac);
			echo json_encode(array("status" => TRUE));
	}

	public function update()
	{
		$datac = array(
				'ID_obat' => $obat,
				'NAMA_obat' => $this->input->post('nama_obat'),
				'ALAMAT_obat' => $this->input->post('alamat_obat'),
				'KEC_obat' => $this->input->post('kec_obat'),
				'KOTA_obat' => $this->input->post('kota_obat'),
				'PROV_obat' => $this->input->post('prov_obat'),
				'KDPOS_obat' => $this->input->post('kdpos_obat'),
				'KTP_obat' => $this->input->post('ktp_obat'),
				'BPJS_obat' => $this->input->post('bpjs_obat'),
				'HP' => $this->input->post('hp1'),
				'EMAIL' => $this->input->post('email1'),
				'TELP' => $this->input->post('telp'),
				'UDATE' => date('Y-m-d H:i:s'),
				'USER_ENTRY' => $this->session->userdata('nama')
		);
		$this->obat_mdl->update('obat',array('ID_obat' => $this->input->post('id_obat')), $datac);
		echo json_encode(array("status" => TRUE));
	}

	public function delete($id)
	{
		$this->obat_mdl->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	function otoidobat(){
		$otoidobat = $this->obat_mdl->get_otoidobat();
		echo json_encode($otoidobat);
	}

	public function get_chain_kab($id){
		$data_id = $this->obat_mdl->get_chain_kab($id);
		echo json_encode($data_id);
	}

	public function get_chain_kec($id){
		$data_id = $this->obat_mdl->get_chain_kec($id);
		echo json_encode($data_id);
	}

}
