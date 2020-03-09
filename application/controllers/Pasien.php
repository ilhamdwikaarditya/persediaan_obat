<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pasien_mdl');
	}

	public function listpasien(){
		if($this->session->userdata('nama')<>''){
			$data['prev']=$this->mmenu->main_menu();
			$this->load->view('head',$data);
			$datax['prov_mohon']=$this->pasien_mdl->by_prov();
			$this->load->view('listpasien/listpasien',$datax);
		}else{
			redirect('welcome/index');
		}
	}

	public function list_pasien()
	{
		$list = $this->pasien_mdl->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $pasien) {
			$no++;
			$row = array();
			$row[] = $pasien->ID_PASIEN;
			$row[] = $pasien->NAMA_PASIEN;
			$row[] = $pasien->ALAMAT_PASIEN;
			$row[] = $pasien->KAB_PASIEN;
			$row[] = $pasien->PROV_PASIEN;
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_pasien('."'".$pasien->ID_PASIEN."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_pasien('."'".$pasien->ID_PASIEN."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
			$data[] = $row;
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->pasien_mdl->count_all(),
						"recordsFiltered" => $this->pasien_mdl->count_filtered(),
						"data" => $data,
				);
		echo json_encode($output);
	}

	public function edit($id)
	{
		$data = $this->pasien_mdl->get_by_id_full($id);
		echo json_encode($data);
	}

	public function add()
	{
		$urutpasien= substr($this->input->post('id_pasien'),4,5);
		$cekpasien = $this->db->query("SELECT ID_PASIEN FROM PASIEN WHERE SUBSTRING(ID_PASIEN,5,5)='$urutpasien' ");
		if($cekpasien->num_rows()>0){
			$urut = $this->db->query("SELECT LPAD(MAX(SUBSTRING(ID_PASIEN,5,5))+1,5,'00000') AS ID_PASIEN FROM PASIEN")->row("id_PASIEN");
			$ambilrand = $urutpasien= substr($this->input->post('id_pasien'),-1);
			$years = date("y");
			$month = date("m");
			$pasien = $years.$month.$urut.$ambilrand;
		}else{
			$pasien = $this->input->post('id_pasien');
		}
			$datac = array(
				'ID_PASIEN' => $pasien,
				'NAMA_PASIEN' => $this->input->post('nama_pasien'),
				'ALAMAT_PASIEN' => $this->input->post('alamat_pasien'),
				'KEC_PASIEN' => $this->input->post('kec_pasien'),
				'KOTA_PASIEN' => $this->input->post('kota_pasien'),
				'PROV_PASIEN' => $this->input->post('prov_pasien'),
				'KDPOS_PASIEN' => $this->input->post('kdpos_pasien'),
				'KTP_PASIEN' => $this->input->post('ktp_pasien'),
				'BPJS_PASIEN' => $this->input->post('bpjs_pasien'),
				'HP' => $this->input->post('hp1'),
				'EMAIL' => $this->input->post('email1'),
				'TELP' => $this->input->post('telp'),
				'CDATE' => date('Y-m-d H:i:s'),
				'USER_ENTRY' => $this->session->userdata('nama')
			);
			$insert = $this->pasien_mdl->save('pasien',$datac);
			echo json_encode(array("status" => TRUE));
	}

	public function update()
	{
		$datac = array(
				'ID_PASIEN' => $pasien,
				'NAMA_PASIEN' => $this->input->post('nama_pasien'),
				'ALAMAT_PASIEN' => $this->input->post('alamat_pasien'),
				'KEC_PASIEN' => $this->input->post('kec_pasien'),
				'KOTA_PASIEN' => $this->input->post('kota_pasien'),
				'PROV_PASIEN' => $this->input->post('prov_pasien'),
				'KDPOS_PASIEN' => $this->input->post('kdpos_pasien'),
				'KTP_PASIEN' => $this->input->post('ktp_pasien'),
				'BPJS_PASIEN' => $this->input->post('bpjs_pasien'),
				'HP' => $this->input->post('hp1'),
				'EMAIL' => $this->input->post('email1'),
				'TELP' => $this->input->post('telp'),
				'UDATE' => date('Y-m-d H:i:s'),
				'USER_ENTRY' => $this->session->userdata('nama')
		);
		$this->pasien_mdl->update('pasien',array('ID_PASIEN' => $this->input->post('id_pasien')), $datac);
		echo json_encode(array("status" => TRUE));
	}

	public function delete($id)
	{
		$this->pasien_mdl->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	function otoidpasien(){
		$otoidpasien = $this->pasien_mdl->get_otoidpasien();
		echo json_encode($otoidpasien);
	}

	public function get_chain_kab($id){
		$data_id = $this->pasien_mdl->get_chain_kab($id);
		echo json_encode($data_id);
	}

	public function get_chain_kec($id){
		$data_id = $this->pasien_mdl->get_chain_kec($id);
		echo json_encode($data_id);
	}

}
