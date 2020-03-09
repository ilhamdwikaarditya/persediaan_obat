<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang_mdl extends CI_Model {

	var $table = 'obat_in_gudang';
	var $column_order = array('ID_OBAT','NAMA_OBAT','JENIS_OBAT','JUMLAH','EXPIRED'); 
	var $order = array('id_obat' => 'asc'); 

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
		
		$this->db->from('obat_in_gudang');
		$this->db->join('tr_jenisobat', 'obat_in_gudang.jenis_obat = tr_jenisobat.id_jenisobat');
		$this->db->join('tr_satuan', 'obat_in_gudang.satuan = tr_satuan.id_satuan');
		$this->db->join('tr_distributor', 'obat_in_gudang.id_dist = tr_distributor.id_dist');
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

	public function get_by_id_full($id)
	{
		$this->db->from('obat');
		$this->db->where('ID_OBAT',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($tabel,$data)
	{
		if($data['id_obat'] <> ''){
			$this->db->insert($tabel, $data);
			return $this->db->insert_id();
		}else{
			$insert_masterobat = array(
										'BATCH_OBAT' => $data['batch_obat'],
										'NAMA_OBAT' => $data['nama_obat'],
										'JENIS_OBAT' => $data['jenis_obat'],
										'EFEK_OBAT' => $data['efek_obat'],
										'CDATE' => date("Y-m-d H:i:s"),
										);
			$this->db->insert('obat', $insert_masterobat);
			$this->db->insert_id();
			
			$ido = $this->db->query("SELECT ID_OBAT FROM OBAT WHERE NAMA_OBAT = '".$data['nama_obat']."' AND BATCH_OBAT = '".$data['batch_obat']."' ")->row("ID_OBAT");
			$insert_ingudang = array(
										'ID_OBAT' => $ido,
										'BATCH_OBAT' => $data['batch_obat'],
										'ID_DIST' => $data['id_dist'],
										'NAMA_OBAT' => $data['nama_obat'],
										'JENIS_OBAT' => $data['jenis_obat'],
										'EFEK_OBAT' => $data['efek_obat'],
										'EXPIRED' => $data['expired'],
										'JUMLAH' => $data['jumlah'],
										'SATUAN' => $data['satuan'],
										'CDATE' => date("Y-m-d H:i:s"),
									  );
										
			$this->db->insert($tabel, $insert_ingudang);
			return $this->db->insert_id();
		}
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
	
	public function by_distributor()
    {
        $query = $this->db->query("SELECT * FROM tr_distributor ORDER BY id_dist ASC");
        $dropdowns = $query->result();
        if(! $dropdowns){
            $finaldropdown[''] = " - Pilih - ";
            return $finaldropdown;
        }
        else{
            foreach ($dropdowns as $dropdown){
                $dropdownlist[$dropdown->ID_DIST] = $dropdown->NAMA_DIST;
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
			$this->db->from('obat');
			$this->db->like('NAMA_OBAT',$txtcari);
			$query = $this->db->get();	
			return $query->result();
		}else{
			$txtcari = $var['id_obat'];
			$this->db->from('obat');
			$this->db->where('ID_OBAT',$txtcari);
			$query = $this->db->get();	
			return $query->result();
		}
	}

}
