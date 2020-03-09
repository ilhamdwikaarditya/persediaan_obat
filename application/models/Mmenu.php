<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mmenu extends CI_Model {
	private $temp = array();
	function __construct() {
		parent::__construct();
	}

public function validate($username,$password){
	$app='2';
	$this->db->select("user_name,password,type,nama,ket");
	$this->db->from("USER");
	$this->db->where("user_name",$username);
	$sql = $this->db->get();
	$this->db->query("SET GLOBAL query_cache_size = 999424");
	$hasil=false;
	foreach($sql->result_array() as $resulte){
		if(md5($password)==$resulte['password']){		
				$hasil=true;				
				$data = array(
				'user' => $username,
				'app' => $app,
				'ket' => $resulte['ket'],
				'nama'=> $resulte['nama'],
				'type'=> $resulte['type']
				);
				$this->session->set_userdata($data);			
		}else{
				$hasil=false;
				$this->session->userdata['user'] = '';                
		}
	}

return $hasil;	
}

protected function parent_menu($menu) {
	$this->db->select("*");
	$this->db->from("user_menu");
	$this->db->where("id",$menu[0]['kategori']);
	$this->db->where("index_id <",$menu[0]['index_id']);
	$this->db->order_by("no_urut","asc");

	$query = $this->db->get();
	$res = $query->result_array();
	if (count($res)>0) {
		array_unshift($menu,$res[0]);
		return $this->parent_menu($menu);
	} else {
		return $menu;
	}
}

protected function linier_menu($menu) {
	foreach ($menu as $resul) {
		$this->temp[] = $resul;
		if ($resul['child']) $this->linier_menu($resul['child']);
	}
}

public function main_menu() {
	$hasil = array();
	$hasil2 = array();
	if (empty($this->session->userdata['user'])){
		$hasil=false;
		$this->load->helper('url');
		redirect('/', 'refresh');
	} else {
		$ket = strtoupper($this->session->userdata['ket']);	
		if (empty($this->session->userdata['usermenu'])) {
			$sql=$this->db->query("SELECT user_name,password,type,nama,ket FROM USER WHERE user_name='".
				$this->db->escape_str($this->session->userdata['user'])."'");
			if($sql->num_rows()>0){
				$tmp = $sql->result_array();
				$resulte = @$tmp[0];
				$load = $this->db->query("SELECT a.id,a.menu,a.controller,a.index_id,a.kategori,a.kategori_sub FROM user_menu a  
					LEFT JOIN user_otoritas b ON b.id = a.id WHERE b.type='".$resulte['type']."' and a.index_id='0' 
					order by a.no_urut");
				foreach($load->result_array() as $resul) {
					$child = $this->child_menu($resulte['type'],($resul['index_id']+1),$resul['id']);
					$resul['child'] = $child;
					$hasil[] = $resul;
				}
			}
			$this->linier_menu($hasil);
			$this->session->set_userdata('usermenu',$hasil);
			$this->session->set_userdata('usermenu2',$this->temp);
		} else {
			$hasil = $this->session->userdata['usermenu'];
		}
		
	}
	$coba = array('hasil'=>$hasil,'linit'=>@$ket);    
    return $coba;
}

protected function child_menu($type,$indexid,$kategori) {
	$child = array();
	$load2 = $this->db->query("SELECT a.id,a.menu,a.controller,a.index_id,a.kategori,a.kategori_sub FROM user_menu a  
		LEFT JOIN user_otoritas b ON b.id = a.id WHERE b.type='".$type."' AND a.index_id='".$indexid."' AND a.kategori='".$kategori."'
		ORDER by a.no_urut");
	foreach($load2->result_array() as $resul3){
		$resul3['child'] = $this->child_menu($type,($resul3['index_id']+1),$resul3['id']);
		$child[] = $resul3;
	};
	return $child;
}

public function active_menu() {
	$aruristr = explode("/",$this->uri->uri_string);
	$uristr = @implode("/",array($aruristr[0],$aruristr[1]));
	$uristr = preg_replace('/_(line|pie|det|detail|baru|otoritas|create|edit)$/', '', $uristr);
	$uristr = preg_replace('/^(lap)_$/', '', $uristr);
	
	$this->db->from('user_menu');
	$this->db->like('controller',$uristr);
	$query = $this->db->get();
	$res = $query->result_array();
	if (count($res)>0) {
		$res = $this->parent_menu($res);
		return $res;
	} else {
		return null;
	}
}

	function islogin(){
		if($this->session->userdata['thn']!=''){
			$hasil=true;        
		}else{
			$hasil=false;
		}
		return $hasil;
	}
	
	function totcust(){
		$this->db->from('pasien');
		$query = $this->db->get();
		$rowcount = $query->num_rows();

		return $rowcount;
	}
	
	function totlang(){
		$this->db->from('dil_listrik_new');
		$query = $this->db->get();
		$rowcount = $query->num_rows();

		return $rowcount;
	}
	
	function totkwh(){
		$kwh = $this->db->query("Select Sum(PEMKWH) PEMKWH From billing_listrik_ref")->row("PEMKWH");
		return $kwh;
	}
	
	function totrptag(){
		$rptag = $this->db->query("Select Sum(RPTAG) RPTAG From billing_listrik_ref")->row("RPTAG");
		return $rptag;
	}
	
	function totlogin(){
		$this->db->from('user');
		$this->db->where('sts','1');
		$query = $this->db->get();
		$rowcount = $query->num_rows();

		return $rowcount;
	}
	
	function totlogout(){
		$this->db->from('user');
		$this->db->where('sts','0');
		$query = $this->db->get();
		$rowcount = $query->num_rows();

		return $rowcount;
	}
	
	function totrpepi(){
		$this->db->select('SUM(RP_EPI) RPEPI');
		$this->db->from('billing_listrik_ref');
		$query = $this->db->get();
		$ret = $query->row();
		return $ret->RPEPI;
	}

	function get_chart_langbyarea(){
		$query = $this->db->query("select b.nm_area area, count(a.id_lang) jml
									from dil_listrik_ref a
									join tr_area b on a.kd_area=b.kd_area
									group by a.kd_area ");
		return $all = $query->result();
	}
	
	function get_chart_langbygol(){
		$query = $this->db->query("select b.uraian gol, count(a.id_lang) jml
									from dil_listrik_ref a
									join tr_golongan b on a.kogol=b.kd_gol
									group by a.kogol ");
		return $all = $query->result();
	}
	
	function get_chart_dayabyarea(){
		$query = $this->db->query("select b.nm_area area, sum(a.daya) jml
									from dil_listrik_ref a
									join tr_area b on a.kd_area=b.kd_area
									group by a.kd_area ");
		return $all = $query->result();
	}
	
	function get_chart_dayabygol(){
		$query = $this->db->query("select b.uraian gol, sum(a.daya) jml
									from dil_listrik_ref a
									join tr_golongan b on a.kogol=b.kd_gol
									group by a.kogol ");
		return $all = $query->result();
	}
	
	function get_chart_kwhbyarea(){
		$query = $this->db->query("select b.nm_area area, sum(a.PEMKWH) jml
									from billing_listrik_ref a
									join tr_area b on a.kd_area=b.kd_area
									group by a.kd_area ");
		return $all = $query->result();
	}
	
	function get_chart_kwhbygol(){
		$query = $this->db->query("select b.uraian gol, sum(a.PEMKWH) jml
									from billing_listrik_ref a
									join tr_golongan b on a.kogol=b.kd_gol
									group by a.kogol ");
		return $all = $query->result();
	}
	
	function get_chart_pendapatanbyarea(){
		$query = $this->db->query("select b.nm_area area, sum(a.RPTAG) jml
									from billing_listrik_ref a
									join tr_area b on a.kd_area=b.kd_area
									group by a.kd_area ");
		return $all = $query->result();
	}
	
	function get_chart_pendapatanbygol(){
		$query = $this->db->query("select b.uraian gol, sum(a.RPTAG) jml
									from billing_listrik_ref a
									join tr_golongan b on a.kogol=b.kd_gol
									group by a.kogol ");
		return $all = $query->result();
	}
	
	function get_grafik_kwh(){
		$query = $this->db->query("select Tahun, sum(a.Januari) Januari,sum(a.Februari) Februari,sum(a.Maret) Maret,sum(a.April) April,sum(a.Mei) Mei,sum(a.Juni) Juni,sum(a.Juli) Juli,sum(a.Agustus) Agustus,sum(a.September) September,sum(a.Oktober) Oktober,sum(a.November) November,sum(a.Desember) Desember, sum(a.Januarikom) Januarikom,sum(a.Februarikom) Februarikom,sum(a.Maretkom) Maretkom,sum(a.Aprilkom) Aprilkom,sum(a.Meikom) Meikom,sum(a.Junikom) Junikom,sum(a.Julikom) Julikom,sum(a.Agustuskom) Agustuskom,sum(a.Septemberkom) Septemberkom,sum(a.Oktoberkom) Oktoberkom,sum(a.Novemberkom) Novemberkom,sum(a.Desemberkom) Desemberkom from (
									select Tahun,
										case when Nama_Bulan = 'Januari' Then Target_KWH_Bln else 0 End Januari,
										case when Nama_Bulan = 'Februari' Then Target_KWH_Bln else 0 End Februari,
										case when Nama_Bulan = 'Maret' Then Target_KWH_Bln else 0 End Maret,
										case when Nama_Bulan = 'April' Then Target_KWH_Bln else 0 End April,
										case when Nama_Bulan = 'Mei' Then Target_KWH_Bln else 0 End Mei,
										case when Nama_Bulan = 'Juni' Then Target_KWH_Bln else 0 End Juni,
										case when Nama_Bulan = 'Juli' Then Target_KWH_Bln else 0 End Juli,
										case when Nama_Bulan = 'Agustus' Then Target_KWH_Bln else 0 End Agustus,
										case when Nama_Bulan = 'September' Then Target_KWH_Bln else 0 End September,
										case when Nama_Bulan = 'Oktober' Then Target_KWH_Bln else 0 End Oktober,
										case when Nama_Bulan = 'November' Then Target_KWH_Bln else 0 End November,
										case when Nama_Bulan = 'Desember' Then Target_KWH_Bln else 0 End Desember,
										
										case when Nama_Bulan = 'Januari' Then Real_KWH_Bln else 0 End Januarikom,
										case when Nama_Bulan = 'Februari' Then Real_KWH_Bln else 0 End Februarikom,
										case when Nama_Bulan = 'Maret' Then Real_KWH_Bln else 0 End Maretkom,
										case when Nama_Bulan = 'April' Then Real_KWH_Bln else 0 End Aprilkom,
										case when Nama_Bulan = 'Mei' Then Real_KWH_Bln else 0 End Meikom,
										case when Nama_Bulan = 'Juni' Then Real_KWH_Bln else 0 End Junikom,
										case when Nama_Bulan = 'Juli' Then Real_KWH_Bln else 0 End Julikom,
										case when Nama_Bulan = 'Agustus' Then Real_KWH_Bln else 0 End Agustuskom,
										case when Nama_Bulan = 'September' Then Real_KWH_Bln else 0 End Septemberkom,
										case when Nama_Bulan = 'Oktober' Then Real_KWH_Bln else 0 End Oktoberkom,
										case when Nama_Bulan = 'November' Then Real_KWH_Bln else 0 End Novemberkom,
										case when Nama_Bulan = 'Desember' Then Real_KWH_Bln else 0 End Desemberkom
									From v_target_dan_realisasi) a GROUP BY Tahun order by tahun desc limit 1 ");
		return $all = $query->result_array();
	}
	
	function get_grafik_income(){
		$query = $this->db->query("select Tahun, sum(a.Januari) Januari,sum(a.Februari) Februari,sum(a.Maret) Maret,sum(a.April) April,sum(a.Mei) Mei,sum(a.Juni) Juni,sum(a.Juli) Juli,sum(a.Agustus) Agustus,sum(a.September) September,sum(a.Oktober) Oktober,sum(a.November) November,sum(a.Desember) Desember, sum(a.Januarikom) Januarikom,sum(a.Februarikom) Februarikom,sum(a.Maretkom) Maretkom,sum(a.Aprilkom) Aprilkom,sum(a.Meikom) Meikom,sum(a.Junikom) Junikom,sum(a.Julikom) Julikom,sum(a.Agustuskom) Agustuskom,sum(a.Septemberkom) Septemberkom,sum(a.Oktoberkom) Oktoberkom,sum(a.Novemberkom) Novemberkom,sum(a.Desemberkom) Desemberkom from (
									select Tahun,
										case when Nama_Bulan = 'Januari' Then Target_Rp else 0 End Januari,
										case when Nama_Bulan = 'Februari' Then Target_Rp else 0 End Februari,
										case when Nama_Bulan = 'Maret' Then Target_Rp else 0 End Maret,
										case when Nama_Bulan = 'April' Then Target_Rp else 0 End April,
										case when Nama_Bulan = 'Mei' Then Target_Rp else 0 End Mei,
										case when Nama_Bulan = 'Juni' Then Target_Rp else 0 End Juni,
										case when Nama_Bulan = 'Juli' Then Target_Rp else 0 End Juli,
										case when Nama_Bulan = 'Agustus' Then Target_Rp else 0 End Agustus,
										case when Nama_Bulan = 'September' Then Target_Rp else 0 End September,
										case when Nama_Bulan = 'Oktober' Then Target_Rp else 0 End Oktober,
										case when Nama_Bulan = 'November' Then Target_Rp else 0 End November,
										case when Nama_Bulan = 'Desember' Then Target_Rp else 0 End Desember,
										
										case when Nama_Bulan = 'Januari' Then Target_Kum_Rp else 0 End Januarikom,
										case when Nama_Bulan = 'Februari' Then Target_Kum_Rp else 0 End Februarikom,
										case when Nama_Bulan = 'Maret' Then Target_Kum_Rp else 0 End Maretkom,
										case when Nama_Bulan = 'April' Then Target_Kum_Rp else 0 End Aprilkom,
										case when Nama_Bulan = 'Mei' Then Target_Kum_Rp else 0 End Meikom,
										case when Nama_Bulan = 'Juni' Then Target_Kum_Rp else 0 End Junikom,
										case when Nama_Bulan = 'Juli' Then Target_Kum_Rp else 0 End Julikom,
										case when Nama_Bulan = 'Agustus' Then Target_Kum_Rp else 0 End Agustuskom,
										case when Nama_Bulan = 'September' Then Target_Kum_Rp else 0 End Septemberkom,
										case when Nama_Bulan = 'Oktober' Then Target_Kum_Rp else 0 End Oktoberkom,
										case when Nama_Bulan = 'November' Then Target_Kum_Rp else 0 End Novemberkom,
										case when Nama_Bulan = 'Desember' Then Target_Kum_Rp else 0 End Desemberkom
									From tp_target) a GROUP BY Tahun order by tahun desc limit 1 ");
		return $all = $query->result_array();
	}
	
}
?>