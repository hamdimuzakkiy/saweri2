<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class mdl_retur_pembelian extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function getItem($num=0, $offset=0)
	{
		$this->db->flush_cache();
		$this->db->select('retur_pembelian.id_retur_pembelian, pembelian.po_no, supplier.kode_supplier, detail_pembelian.sn, supplier.nama AS nama_supplier, retur_pembelian.tanggal, barang.nama_barang, retur_pembelian.qty');
		$this->db->from('retur_pembelian');
		$this->db->join('detail_pembelian', 'retur_pembelian.id_detail_pembelian = detail_pembelian.id_detail_pembelian');
		$this->db->join('pembelian', 'pembelian.id_pembelian = detail_pembelian.id_pembelian');
		$this->db->join('barang', 'barang.id_barang = detail_pembelian.id_barang');
		$this->db->join('supplier', 'supplier.id_supplier = pembelian.id_supplier');
		$this->db->where('pembelian.id_cabang', get_idcabang());
		$this->db->limit($num, $offset);
		return $this->db->get();

	}
	
	function getItemById($id)
	{
		$this->db->flush_cache();
		$this->db->where('id_retur_pembelian', $id);
		return $this->db->get('retur_pembelian');
	}

	function insert($data)
	{
		$this->db->flush_cache();
		$this->db->insert('retur_pembelian', $data);
	}
	
	function update($id, $data)
	{
		$this->db->flush_cache();
		$this->db->where('id_retur_pembelian', $id);
		$this->db->update('retur_pembelian', $data);
	}
	
	function delete($id)
	{
		$this->db->flush_cache();
		$this->db->delete('retur_pembelian', array('id_retur_pembelian' => $id));
	}
	
}