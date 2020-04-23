<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_puskesmas extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model("Cetakm");
		$this->load->model("Puskesmas_mdl");
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
		$this->Bord	= "border:1px black solid;";
		$this->L	= "border-left:1px black solid;";
		$this->T	= "border-top:1px black solid;";
		$this->R	= "border-right:1px black solid;";
		$this->B	= "border-bottom:1px black solid;";
		$this->xL	= "border-left:none;";
		$this->xT	= "border-top:none;";
		$this->xR	= "border-right:none;";
		$this->xB	= "border-bottom:none;";
		date_default_timezone_set('Asia/Jakarta');
	}
	
	public function formpersediaan(){
		if($this->session->userdata('nama')<>''){
			$data['prev']=$this->mmenu->main_menu();
			$this->load->view('head',$data);
			$datax['puskesmas']=$this->Puskesmas_mdl->by_puskesmas();
			$this->load->view('Puskesmas/formcetak',$datax);
		}else{
			redirect('welcome/index');
		}
	}

	public function rpt_persediaan(){
		$tgl_awal	= $this->uri->segment(3);
		$tgl_akhir 	= $this->uri->segment(4);
		$puskesmas 	= $this->uri->segment(5);
		
		
		
		$Rpt = "";
		$Rpt .= "<table width=100% border=1 style='border-collapse: collapse;'>
				  <tr>
					<td width=24>No</td>
					<td width=91>Batch Obat</td>
					<td width=111>Nama Obat</td>
					<td width=117>Stok Obat</td>
				  </tr>";
				  
		$q = $this->db->query("select BATCH_OBAT, NAMA_OBAT, SUM(JUMLAH) STOK from obat_in_puskesmas WHERE ID_PUSKESMAS = '$puskesmas' AND (DATE(CDATE) BETWEEN '$tgl_awal' AND '$tgl_akhir') GROUP BY BATCH_OBAT, NAMA_OBAT ");
		$NO = 1;
		foreach($q->result() as $r)
		{
			$NO 			= $NO++ ;
			$BATCH_OBAT		= $r->BATCH_OBAT;
			$NAMA_OBAT		= $r->NAMA_OBAT;
			$STOK			= $r->STOK;
			
		$Rpt .= "<tr>
					<td>".$NO++."</td>
					<td>$BATCH_OBAT</td>
					<td>$NAMA_OBAT</td>
					<td>$STOK</td>
				  </tr>";
		}
		if($q->num_rows() < 1){
			$Rpt .="<tr>
						<td colspan=4><center><b>Data Kosong</b></center></td>
					  </tr>";
		}
		$Rpt .="</table>";

			$SenD["TitlE"]	= "Cetak Persediaan";
			$SenD["OutpuT"]	= $Rpt;
			$SenD["CetaK"]	= "1";
			$SenD["Kertas"]	= "A4-P";
			$SenD["tmargin"]= "15";
			$SenD["bmargin"]= "2";
			$this->load->view("Report",$SenD);

	}


	public function terbilang_get_valid($str,$from,$to,$min=1,$max=9){
		$val=false;
		$from=($from<0)?0:$from;
		for ($i=$from;$i<$to;$i++){
			if (((int) $str{$i}>=$min)&&((int) $str{$i}<=$max)) $val=true;
		}
		return $val;
	}

	public function terbilang_get_str($i,$str,$len){
		$numA=array("","satu","dua","tiga","empat","lima","enam","tujuh","delapan","sembilan");
		$numB=array("","se","dua ","tiga ","empat ","lima ","enam ","tujuh ","delapan ","sembilan ");
		$numC=array("","satu ","dua ","tiga ","empat ","lima ","enam ","tujuh ","delapan ","sembilan ");
		$numD=array(0=>"puluh",1=>"belas",2=>"ratus",4=>"ribu", 7=>"juta", 10=>"milyar", 13=>"triliun");
		$buf="";
		$pos=$len-$i;
		switch($pos){
			case 1:
					if (!$this->terbilang_get_valid($str,$i-1,$i,1,1))
						$buf=$numA[(int) $str{$i}];
				break;
			case 2:	case 5: case 8: case 11: case 14:
					if ((int) $str{$i}==1){
						if ((int) $str{$i+1}==0)
							$buf=($numB[(int) $str{$i}]).($numD[0]);
						else
							$buf=($numB[(int) $str{$i+1}]).($numD[1]);
					}
					else if ((int) $str{$i}>1){
							$buf=($numB[(int) $str{$i}]).($numD[0]);
					}
				break;
			case 3: case 6: case 9: case 12: case 15:
					if ((int) $str{$i}>0){
							$buf=($numB[(int) $str{$i}]).($numD[2]);
					}
				break;
			case 4: case 7: case 10: case 13:
					if ($this->terbilang_get_valid($str,$i-2,$i)){
						if (!$this->terbilang_get_valid($str,$i-1,$i,1,1))
							$buf=$numC[(int) $str{$i}].($numD[$pos]);
						else
							$buf=$numD[$pos];
					}
					else if((int) $str{$i}>0){
						if ($pos==4)
							$buf=($numB[(int) $str{$i}]).($numD[$pos]);
						else
							$buf=($numC[(int) $str{$i}]).($numD[$pos]);
					}
				break;
		}
		return $buf;
	}

	public function terbilang($nominal){
		$buf="";
		$str=$nominal."";
		$len=strlen($str);
		for ($i=0;$i<$len;$i++){
			$buf=trim($buf)." ".$this->terbilang_get_str($i,$str,$len);
		}
		return trim($buf." rupiah");
	}

	public function terbilang_angka($nominal){
		$buf="";
		$str=$nominal."";
		$len=strlen($str);
		for ($i=0;$i<$len;$i++){
			$buf=trim($buf)." ".$this->terbilang_get_str($i,$str,$len);
		}
		return trim($buf);
	}


}
