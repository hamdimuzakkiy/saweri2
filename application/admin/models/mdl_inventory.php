<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class mdl_inventory extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function getItem($num=0, $offset=0)
	{
		$query = 'SELECT sum(detail_pembelian.qty) AS qty, barang.nama_barang, barang.id_barang, jenis.jenis, kategori.kategori, supplier.nama FROM (`pembelian`) 
					JOIN `supplier` ON `supplier`.`id_supplier` = `pembelian`.`id_supplier` 
					JOIN `detail_pembelian` ON `detail_pembelian`.`id_pembelian` = `pembelian`.`id_pembelian` 
					JOIN `barang` ON `barang`.`id_barang` = `detail_pembelian`.`id_barang` 
					JOIN `jenis` ON `jenis`.`id_jenis` = `barang`.`id_jenis` 
					JOIN `kategori` ON `kategori`.`id_kategori` = `barang`.`id_kategori` 
					group by barang.id_barang, barang.nama_barang, jenis.jenis, kategori.kategori, supplier.nama ';
	
		$this->db->flush_cache();
		return $this->db->query($query);
	}
	
	function getItem_cabang($num=0, $offset=0)
	{
		$query = 'SELECT sum(detail_pembelian.qty) AS qty, barang.nama_barang, barang.id_barang, jenis.jenis, kategori.kategori, cabang.nama_cabang, supplier.nama FROM (`pembelian`) 
					JOIN `supplier` ON `supplier`.`id_supplier` = `pembelian`.`id_supplier` 
					JOIN `detail_pembelian` ON `detail_pembelian`.`id_pembelian` = `pembelian`.`id_pembelian` 
					JOIN `barang` ON `barang`.`id_barang` = `detail_pembelian`.`id_barang` 
					JOIN `jenis` ON `jenis`.`id_jenis` = `barang`.`id_jenis` 
					JOIN `cabang` ON `cabang`.`id_cabang` = `pembelian`.`id_cabang` 
					JOIN `kategori` ON `kategori`.`id_kategori` = `barang`.`id_kategori` 
					where pembelian.id_cabang =  '.get_idcabang().'
					group by barang.id_barang, barang.nama_barang, jenis.jenis, kategori.kategori, supplier.nama, cabang.nama_cabang ';
	
		
		$this->db->flush_cache();
		return $this->db->query($query);
	}
	
	function getItempenjualan($id_barang)
	{
		$query = 'SELECT sum(detail_penjualan.qty) AS kredit, detail_pembelian.id_barang FROM (`detail_penjualan`) JOIN `detail_pembelian` ON `detail_pembelian`.id_detail_pembelian = detail_penjualan.id_detail_pembelian where detail_pembelian.id_barang = '.$id_barang.' group by detail_pembelian.id_barang';
		$this->db->flush_cache();
		return $this->db->query($query);
	}
	
	function getItempenjualan_cabang($id_barang)
	{
		$query = 'SELECT sum(detail_penjualan.qty) AS kredit, detail_pembelian.id_barang FROM (`detail_penjualan`) 
					JOIN `detail_pembelian` ON `detail_pembelian`.id_detail_pembelian = detail_penjualan.id_detail_pembelian 
					JOIN `penjualan` ON `penjualan`.id_penjualan = detail_penjualan.id_penjualan
					where detail_pembelian.id_barang = '.$id_barang.' and penjualan.id_cabang = '.get_idcabang().'
					group by detail_pembelian.id_barang';
		$this->db->flush_cache();
		return $this->db->query($query);
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