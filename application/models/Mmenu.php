<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mmenu extends CI_Model {
	private $temp = array();
	function __construct() {
		parent::__construct();
	}

public function validate($username,$password){
	$app='2';
	$this->db->select("id_user,user_name,password,type,nama,ket");
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
					'id_user' => $resulte['id_user'],
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
	
	function totpasiendaftar(){
		$this->db->from('pasien');
		$query = $this->db->get();
		$rowcount = $query->num_rows();

		return $rowcount;
	}
	
	function totpasienhariini(){
		$this->db->from('pasien');
		$this->db->where('DATE(CDATE)',date("Y-m-d"));
		$query = $this->db->get();
		$rowcount = $query->num_rows();

		return $rowcount;
	}
	
	function totobat(){
		$this->db->from('obat');
		$query = $this->db->get();
		$rowcount = $query->num_rows();

		return $rowcount;
	}
	
	function totobatakanexpired(){
		$total = $this->db->query("select sum(jumlah) totalobat from obat_in_gudang WHERE DATEDIFF(EXPIRED,now()) < 30")->row("totalobat");
		return $total;
	}	

	
}
?>