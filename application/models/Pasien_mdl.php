<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_mdl extends CI_Model {

	var $table = 'pasien';
	var $column_order = array('ID_PASIEN','NAMA_PASIEN','ALAMAT_PASIEN','KOTA_PASIEN','PROV_PASIEN',null); 
	var $column_search = array('ID_PASIEN','NAMA_PASIEN','ALAMAT_PASIEN');
	var $order = array('id' => 'asc'); 

	public function __construct()
	{
		parent::__construct();
	}

	private function _get_datatables_query()
	{
		$this->db->select('pasien.*, tr_kec.nama KEC_PASIEN, tr_kab.nama KAB_PASIEN, tr_prov.nama PROV_PASIEN');
		$this->db->from('pasien');
		$this->db->join('tr_kec', 'pasien.kec_pasien = tr_kec.id_kec');
		$this->db->join('tr_kab', 'pasien.kota_pasien = tr_kab.id_kab');
		$this->db->join('tr_prov', 'pasien.prov_pasien = tr_prov.id_prov');
		$i = 0;
		foreach ($this->column_search as $item) 
		{
			if($_POST['search']['value'])
			{
				
				if($i===0)
				{
					$this->db->group_start(); 
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		
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

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
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

	public function get_by_id($id)
	{
		$this->db->from('pasien');
		$this->db->where('id_pasien',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function get_by_id_full($id)
	{
		$this->db->select('pasien.*, tr_kec.nama KEC_PASIEN, tr_kab.nama KAB_PASIEN, tr_prov.nama PROV_PASIEN');
		$this->db->from('pasien');
		$this->db->join('tr_kec', 'pasien.kec_pasien = tr_kec.id_kec');
		$this->db->join('tr_kab', 'pasien.kota_pasien = tr_kab.id_kab');
		$this->db->join('tr_prov', 'pasien.prov_pasien = tr_prov.id_prov');
		$this->db->where('id_pasien',$id);
		$query = $this->db->get();

		return $query->row();
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
		$this->db->where('id_pasien', $id);
		$this->db->delete($this->table);		
	}
	
	public function get_otoidpasien()
    {
        $query = $this->db->query("SELECT IFNULL(LPAD(MAX(SUBSTRING(id_pasien,5,5))+1,5,'00000'),'00001') AS id_pasien FROM pasien");
        return $idpasien = $query->result();
    }
	
	public function get_chain_kab($id='')
    {
		$query = $this->db->query("SELECT * FROM tr_kab WHERE id_prov = '$id' ");
		return $kab = $query->result();
    }

	public function get_chain_kec($id='')
    {
		$query = $this->db->query("SELECT * FROM tr_kec WHERE id_kab = '$id' ");
		return $kec = $query->result();
    }
	
	public function by_kec()
    {
        $query = $this->db->query("SELECT * FROM tr_kec ORDER BY id_kec ASC");
        $dropdowns = $query->result();
        if(! $dropdowns){
            $finaldropdown[''] = " - Pilih - ";
            return $finaldropdown;
        }
        else{
            foreach ($dropdowns as $dropdown){
                $dropdownlist[$dropdown->id_kec] = $dropdown->nama;
            }
            $finaldropdown = $dropdownlist;
            $finaldropdown[''] = " - Pilih - ";
            return $finaldropdown;
        }
    }

	public function by_kab()
    {
        $query = $this->db->query("SELECT * FROM tr_kab ORDER BY id_kab ASC");
        $dropdowns = $query->result();
        if(! $dropdowns){
            $finaldropdown[''] = " - Pilih - ";
            return $finaldropdown;
        }
        else{
            foreach ($dropdowns as $dropdown){
                $dropdownlist[$dropdown->id_kab] = $dropdown->nama;
            }
            $finaldropdown = $dropdownlist;
            $finaldropdown[''] = " - Pilih - ";
            return $finaldropdown;
        }
    }

	public function by_prov()
    {
        $query = $this->db->query("SELECT * FROM tr_prov ORDER BY id_prov ASC");
        $dropdowns = $query->result();
        if(! $dropdowns){
            $finaldropdown[''] = " - Pilih - ";
            return $finaldropdown;
        }
        else{
            foreach ($dropdowns as $dropdown){
                $dropdownlist[$dropdown->id_prov] = $dropdown->nama;
            }
            $finaldropdown = $dropdownlist;
            $finaldropdown[''] = " - Pilih - ";
            return $finaldropdown;
        }
    }

}
