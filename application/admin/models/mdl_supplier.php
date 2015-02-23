<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class mdl_supplier extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function getItem($num=0, $offset=0)
	{
		$this->db->flush_cache();
		$this->db->order_by("nama", "asc");
		return $this->db->get('supplier', $num, $offset);
	}
	
	function getItemById($id)
	{
		$this->db->flush_cache();
		$this->db->where('id_supplier', $id);
		return $this->db->get('supplier');
	}

	function insert($data)
	{
		$this->db->flush_cache();
		$this->db->insert('supplier', $data);
	}
	
	function update($id, $data)
	{
		$this->db->flush_cache();
		$this->db->where('id_supplier', $id);
		$this->db->update('supplier', $data);
	}
	
	function delete($id)
	{
		$this->db->flush_cache();
		$this->db->delete('supplier', array('id_supplier' => $id));
	}
	
	function get_kode_supplier()
	{
		# ambil nomer running berdasarkan
		$this->db->flush_cache();
		$this->db->from('supplier');
		$this->db->like('kode_supplier', 'P', 'after');
		$query = $this->db->get();
		
		$kode_supplier = $query->num_rows();
		$kode_supplier = (int) $kode_supplier + 1;
		$kode_supplier = str_pad($kode_supplier, 4, '0', STR_PAD_LEFT);
		
		return 'P'.$kode_supplier;
		
	}
}