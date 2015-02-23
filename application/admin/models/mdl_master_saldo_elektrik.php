<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class mdl_master_saldo_elektrik extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function getItem($num=0, $offset=0)
	{
		$this->db->flush_cache();		$this->db->order_by("nama_mastersaldo", "asc");		return $this->db->get('master_saldo_elektrik', $num, $offset);
	}
	
	function getItemById($id)
	{
		$this->db->flush_cache();
		$this->db->where('id_saldo', $id);
		return $this->db->get('master_saldo_elektrik');
	}

	function insert($data)
	{
		$this->db->flush_cache();
		$this->db->insert('master_saldo_elektrik', $data);
	}
	
	function update($id, $data)
	{
		$this->db->flush_cache();
		$this->db->where('id_saldo', $id);
		$this->db->update('master_saldo_elektrik', $data);
	}
	
	function delete($id)
	{
		$this->db->flush_cache();
		$this->db->delete('master_saldo_elektrik', array('id_saldo' => $id));
	}
	
}
