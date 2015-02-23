<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class mdl_kategori extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function getItem($num=0, $offset=0)
	{
		$this->db->flush_cache();
		$this->db->order_by("kategori", "asc");
		return $this->db->get('kategori', $num, $offset);
	}
	
	function getItemById($id)
	{
		$this->db->flush_cache();
		$this->db->where('id_kategori', $id);
		return $this->db->get('kategori');
	}

	function insert($data)
	{
		$this->db->flush_cache();
		$this->db->insert('kategori', $data);
	}
	
	function update($id, $data)
	{
		$this->db->flush_cache();
		$this->db->where('id_kategori', $id);
		$this->db->update('kategori', $data);
	}
	
	function delete($id)
	{
		$this->db->flush_cache();
		$this->db->delete('kategori', array('id_kategori' => $id));
	}
	
}