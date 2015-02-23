<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class mdl_karyawan extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function getItem($num=0, $offset=0)
	{
		$this->db->flush_cache();
		$this->db->select('karyawan.*, cabang.nama_cabang, users.username, users.password, users.level_id');
		$this->db->from('karyawan');
		$this->db->join('cabang', 'cabang.id_cabang = karyawan.id_cabang');
		$this->db->join('users','users.userid = karyawan.userid');
		$this->db->order_by("nama", "asc");
		$this->db->limit($num, $offset);
		return $this->db->get();
	}
	
	function getItemById($id)
	{
		$this->db->flush_cache();
		$this->db->select('karyawan.*, cabang.nama_cabang, users.username, users.password, users.level_id');
		$this->db->from('karyawan');
		$this->db->join('cabang', 'cabang.id_cabang = karyawan.id_cabang');
		$this->db->join('users','users.userid = karyawan.userid');
		$this->db->where('karyawan.id_karyawan', $id);
		return $this->db->get();
	}

	function insert($data)
	{
		$this->db->flush_cache();
		$this->db->insert('karyawan', $data);
	}
	
	function update($id, $data)
	{		
		$this->db->flush_cache();		
		$this->db->where('id_karyawan', $id);
		$this->db->update('karyawan', $data);
	}
	
	function delete_karyawan($id)
	{
		$this->db->flush_cache();
		$this->db->delete('karyawan', array('id_karyawan' => $id));
	}
	
	function delete_users($id)
	{
		$this->db->flush_cache();
		$this->db->delete('users', array('userid' => $id));
	}
	
	// ngambil id otomatis
	function get_idkaryawan(){
		$this->db->flush_cache();
		$query1 = $this->db->query("SHOW TABLE STATUS LIKE 'karyawan'");
		
		// ngambil no autoincrement dan akhirnya jadi-> '000x'
		$tmp_no = $query1->row()->Auto_increment;
		$no = str_pad($tmp_no, 4, '0', STR_PAD_LEFT);
		
		return 'SG-'.$no.substr(date('Y'),2,2).date('md');
		
	}
	
	function getAll($num=false)
	{
		$this->db->flush_cache();
		$this->db->select('karyawan.*, cabang.nama_cabang, users.username, users.password, users.level_id');
		$this->db->from('karyawan');
		$this->db->join('cabang', 'cabang.id_cabang = karyawan.id_cabang');
		$this->db->join('users','users.userid = karyawan.userid');

		$this->db->order_by("nama", "asc");
		$get_id_cabang=get_idcabang();
		if ($get_id_cabang!='1'){
			$this->db->where('cabang.id_cabang',$get_id_cabang);
		}
		if($num)
		{
		    return $this->db->count_all_results();
		}
		
		return $this->db->get();
	}
}