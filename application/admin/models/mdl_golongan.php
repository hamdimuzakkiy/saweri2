<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class mdl_golongan extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function getItem($num=0, $offset=0)
	{
		$this->db->flush_cache();
		$this->db->order_by("golongan", "asc");
		return $this->db->get('golongan', $num, $offset);
	}
	
	function getItemById($id)
	{
		$this->db->flush_cache();
		$this->db->where('id_golongan', $id);
		return $this->db->get('golongan');
	}

	function insert($data)
	{
		$this->db->flush_cache();
		$this->db->insert('golongan', $data);
	}
	
	function update($id, $data)
	{
		$this->db->flush_cache();
		$this->db->where('id_golongan', $id);
		$this->db->update('golongan', $data);
	}
	
	function delete($id)
	{
		$this->db->flush_cache();
		$this->db->delete('golongan', array('id_golongan' => $id));
	}
	
}