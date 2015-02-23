<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class mdl_barang extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function getItem($num=0, $offset=0)
	{
		$this->db->flush_cache();
		$this->db->select('barang.id_barang, barang.nama_barang, jenis.jenis AS nama_jenis, kategori.kategori AS nama_kategori, barang.harga_toko, barang.harga_partai, barang.harga_cabang');
		$this->db->from('barang');
		$this->db->join('jenis', 'jenis.id_jenis = barang.id_jenis');
		$this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori');
		$this->db->where('barang.id_jenis !=', '3');
		$this->db->order_by("barang.nama_barang", "asc");
		$this->db->limit($num, $offset);
		return $this->db->get();
	}
	
	function getItemById($id)
	{
		$this->db->flush_cache();
		$this->db->where('id_barang', $id);
		return $this->db->get('barang');
	}

	function insert($data)
	{
		$this->db->flush_cache();
		$this->db->insert('barang', $data);
	}
	
	function update($id, $data)
	{
		$this->db->flush_cache();
		$this->db->where('id_barang', $id);
		$this->db->update('barang', $data);
	}
	
	function delete($id)
	{
		$this->db->flush_cache();
		$this->db->delete('barang', array('id_barang' => $id));
	}
	
}
