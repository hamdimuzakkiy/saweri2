<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class mdl_cabang extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function getItem($num=0, $offset=0)
	{
		$this->db->flush_cache();
		return $this->db->get('cabang', $num, $offset);
	}
	
	function getItemById($id)
	{
		$this->db->flush_cache();
		$this->db->where('id_cabang', $id);
		return $this->db->get('cabang');
	}

	function insert($data)
	{
		$this->db->flush_cache();
		$this->db->insert('cabang', $data);
	}
	
	function update($id, $data)
	{
		$this->db->flush_cache();
		$this->db->where('id_cabang', $id);
		$this->db->update('cabang', $data);
	}
	
	function delete($id)
	{
		$this->db->flush_cache();
		$this->db->delete('cabang', array('id_cabang' => $id));
	}
	
}