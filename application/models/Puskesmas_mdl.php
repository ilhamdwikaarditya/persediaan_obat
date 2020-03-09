<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Puskesmas_mdl extends CI_Model {

	var $table = 'obat_in_puskesmas';
	var $column_order = array('ID_OBAT','NAMA_OBAT','JENIS_OBAT','JUMLAH','EXPIRED'); 
	var $order = array('id_obat' => 'asc'); 
	
	var $tableout = 'obat_out_puskesmas';
	var $column_orderout = array('ID_OBAT','NAMA_OBAT','JENIS_OBAT','JUMLAH','EXPIRED'); 
	var $orderout = array('id_obat' => 'asc'); 

	public function __construct()
	{
		parent::__construct();
	}
	
	function get_datatables($param="")
	{
		$this->_get_datatables_query($param);
		$query = $this->db->get();
		return $query->result();
	}
	private function _get_datatables_query($param="")
	{
		
		$this->db->from('obat_in_puskesmas');
		$this->db->join('tr_jenisobat', 'obat_in_puskesmas.jenis_obat = tr_jenisobat.id_jenisobat');
		$this->db->join('tr_satuan', 'obat_in_puskesmas.satuan = tr_satuan.id_satuan');
		$this->db->join('tr_puskesmas', 'obat_in_puskesmas.id_puskesmas = tr_puskesmas.id_puskesmas');
		$this->db->where('batch_obat',$param);
		$this->db->order_by('cdate','DESC');
		
		$i = 0;
		
		
		if(isset($_POST['order']))
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function save($tabel,$data)
	{
		$this->db->insert($tabel, $data);
		return $this->db->insert_id();
	}

	public function update($table, $where, $data)
	{
		$this->db->update($table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('ID_IN_GUDANG', $id);
		$this->db->delete($this->table);		
	}
	
	public function by_jenis()
    {
        $query = $this->db->query("SELECT * FROM tr_jenisobat ORDER BY id_jenisobat ASC");
        $dropdowns = $query->result();
        if(! $dropdowns){
            $finaldropdown[''] = " - Pilih - ";
            return $finaldropdown;
        }
        else{
            foreach ($dropdowns as $dropdown){
                $dropdownlist[$dropdown->ID_JENISOBAT] = $dropdown->JENISOBAT;
            }
            $finaldropdown = $dropdownlist;
            $finaldropdown[''] = " - Pilih - ";
            return $finaldropdown;
        }
    }
	
	public function by_satuan()
    {
        $query = $this->db->query("SELECT * FROM tr_satuan ORDER BY id_satuan ASC");
        $dropdowns = $query->result();
        if(! $dropdowns){
            $finaldropdown[''] = " - Pilih - ";
            return $finaldropdown;
        }
        else{
            foreach ($dropdowns as $dropdown){
                $dropdownlist[$dropdown->ID_SATUAN] = $dropdown->SATUAN;
            }
            $finaldropdown = $dropdownlist;
            $finaldropdown[''] = " - Pilih - ";
            return $finaldropdown;
        }
    }
	
	public function by_puskesmas()
    {
        $query = $this->db->query("SELECT * FROM tr_puskesmas ORDER BY id_puskesmas ASC");
        $dropdowns = $query->result();
        if(! $dropdowns){
            $finaldropdown[''] = " - Pilih - ";
            return $finaldropdown;
        }
        else{
            foreach ($dropdowns as $dropdown){
                $dropdownlist[$dropdown->ID_PUSKESMAS] = $dropdown->PUSKESMAS;
            }
            $finaldropdown = $dropdownlist;
            $finaldropdown[''] = " - Pilih - ";
            return $finaldropdown;
        }
    }
	
	public function by_pasien()
    {
        $query = $this->db->query("SELECT * FROM pasien ORDER BY id ASC");
        $dropdowns = $query->result();
        if(! $dropdowns){
            $finaldropdown[''] = " - Pilih - ";
            return $finaldropdown;
        }
        else{
            foreach ($dropdowns as $dropdown){
                $dropdownlist[$dropdown->ID_PASIEN] = $dropdown->NAMA_PASIEN;
            }
            $finaldropdown = $dropdownlist;
            $finaldropdown[''] = " - Pilih - ";
            return $finaldropdown;
        }
    }
	
	public function getObat($var)
	{
		if($var['type'] == 1){
			$txtcari = $var['cari'];
			$query = $this->db->query("SELECT *,RIGHT(BATCH_OBAT,8) BATCH FROM obat_in_gudang WHERE NAMA_OBAT LIKE '%$txtcari%' GROUP BY NAMA_OBAT, BATCH_OBAT ");
			return $query->result();
		}else{
			$txtcari = $var['batch'];
			$this->db->select('*,SUM(JUMLAH) STOK, tr_satuan.satuan NM_SATUAN');
			$this->db->from('obat_in_gudang');
			$this->db->join('tr_satuan','obat_in_gudang.satuan = tr_satuan.id_satuan');
			$this->db->like('BATCH_OBAT',$txtcari);
			$this->db->group_by('NAMA_OBAT,BATCH_OBAT');
			$query = $this->db->get();	
			return $query->result();
		}
	}
	
	public function getObatPuskesmas($var)
	{
		if($var['type'] == 1){
			$txtcari = $var['cari'];
			$query = $this->db->query("SELECT *,RIGHT(BATCH_OBAT,8) BATCH FROM obat_in_puskesmas WHERE NAMA_OBAT LIKE '%$txtcari%' GROUP BY NAMA_OBAT, BATCH_OBAT ");
			return $query->result();
		}else{
			$txtcari = $var['batch'];
			$this->db->select('*,SUM(JUMLAH) STOK, tr_satuan.satuan NM_SATUAN');
			$this->db->from('obat_in_puskesmas');
			$this->db->join('tr_satuan','obat_in_puskesmas.satuan = tr_satuan.id_satuan');
			$this->db->like('BATCH_OBAT',$txtcari);
			$this->db->group_by('NAMA_OBAT,BATCH_OBAT');
			$query = $this->db->get();	
			return $query->result();
		}
	}
	
	function get_datatables_out($param="",$tanggal="")
	{
		$this->_get_datatables_query_out($param,$tanggal);
		$query = $this->db->get();
		return $query->result();
	}
	
	private function _get_datatables_query_out($param="",$tanggal="")
	{
		
		$this->db->from('obat_out_puskesmas');
		$this->db->join('tr_jenisobat', 'obat_out_puskesmas.jenis_obat = tr_jenisobat.id_jenisobat');
		$this->db->join('tr_satuan', 'obat_out_puskesmas.satuan = tr_satuan.id_satuan');
		$this->db->join('pasien', 'obat_out_puskesmas.id_pasien = pasien.id_pasien');
		$this->db->where('obat_out_puskesmas.id_pasien',$param);
		$this->db->where('DATE(obat_out_puskesmas.CDATE)',$tanggal);
		$this->db->order_by('obat_out_puskesmas.cdate','DESC');
		
		$i = 0;
		
		
		if(isset($_POST['order']))
		{
			$this->db->order_by($this->column_orderout[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->orderout))
		{
			$order = $this->orderout;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function count_filtered_out()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_out()
	{
		$this->db->from($this->tableout);
		return $this->db->count_all_results();
	}

}
