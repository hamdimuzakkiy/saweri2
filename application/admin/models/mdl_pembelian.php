<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class mdl_pembelian extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function getItem($num=0, $offset=0)
	{
		$this->db->flush_cache();
		$this->db->select('pembelian.id_pembelian, pembelian.po_no, supplier.kode_supplier, supplier.nama AS nama_supplier, cabang.nama_cabang, pembelian.tanggal');
		$this->db->from('pembelian');
		$this->db->join('supplier', 'supplier.id_supplier = pembelian.id_supplier');
		$this->db->join('cabang', 'cabang.id_cabang = pembelian.id_cabang');		
		$this->db->where('cabang.id_cabang', $this->session->userdata('idcabang'));		$this->db->where('pembelian.posting', '0');
		$this->db->limit($num, $offset);

		//print $this->db->last_query();

		return $this->db->get();
	}

	function count()
	{
		$this->db->flush_cache();
		$this->db->select('pembelian.id_pembelian, pembelian.po_no, supplier.kode_supplier, supplier.nama AS nama_supplier, cabang.nama_cabang, pembelian.tanggal');
		$this->db->from('pembelian');
		$this->db->join('supplier', 'supplier.id_supplier = pembelian.id_supplier');
		$this->db->join('cabang', 'cabang.id_cabang = pembelian.id_cabang');		
		$this->db->where('cabang.id_cabang', $this->session->userdata('idcabang'));		$this->db->where('pembelian.posting', '0');		
		return $this->db->get();
	}
	
	function getItemById($id)
	{
		$this->db->flush_cache();
		$this->db->select('pembelian.*, supplier.id_supplier, supplier.kode_supplier, supplier.nama AS nama_supplier, cabang.id_cabang, cabang.nama_cabang,kas.nama as nama_kas');
		$this->db->from('pembelian');
		$this->db->join('supplier', 'supplier.id_supplier = pembelian.id_supplier');		
		$this->db->join('cabang', 'cabang.id_cabang = pembelian.id_cabang');
		$this->db->join('kas', 'kas.kode = pembelian.kode_kas');
		$this->db->where('pembelian.id_pembelian', $id);
		return $this->db->get();
	}

	function insert($data)
	{
		$this->db->flush_cache();
		$this->db->insert('pembelian', $data);
	}
	
	function insert_detail($data)
	{
		$this->db->flush_cache();
		$this->db->insert('detail_pembelian', $data);
	}
		
	function update($id, $data)
	{
		$this->db->flush_cache();
		$this->db->where('id_pembelian', $id);
		$this->db->update('pembelian', $data);
	}
	
	function delete($id)
	{
		$this->db->flush_cache();
		$this->db->delete('pembelian', array('id_pembelian' => $id));
	}
	
	function get_detail($id_request)
	{
		$this->db->flush_cache();
		$this->db->select('detail_pembelian.*, barang.*,detail_pembelian.sn as sn');
		$this->db->from('detail_pembelian');
		$this->db->join('barang', 'barang.id_barang = detail_pembelian.id_barang');
		$this->db->where('id_pembelian', $id_request);
		$this->db->order_by('detail_pembelian.id_detail_pembelian', 'ASC');
		return $this->db->get();
	}
	
	function get_po($kd_awal)
	{

		$code_user = get_userid();
		$code_user = str_pad($code_user, 3, '0', STR_PAD_LEFT);
		
		$this->db->flush_cache();
		$this->db->select('users.*, cabang.*, karyawan.*');
		$this->db->from('users');
		$this->db->join('karyawan', 'karyawan.userid = users.userid');
		$this->db->join('cabang', 'cabang.id_cabang = karyawan.id_cabang');
		$this->db->where('users.userid', get_userid());
		$kode_cabang = $this->db->get()->row()->kode_cabang;
		
		$tanggal = date('dmy');
		
		$this->db->flush_cache();
		$this->db->from('pembelian');
		//$this->db->like('po_no', $kd_awal . '-'.$kode_cabang.$code_user.$tanggal, 'after');
		$this->db->like('po_no', $kd_awal . '-'.$kode_cabang.$tanggal, 'after');
		$query = $this->db->get();
		
		//print $this->db->last_query();

		$no_po = $query->num_rows();
		$no_po = (int) $no_po + 1;
		$no_po = str_pad($no_po, 4, '0', STR_PAD_LEFT);
		
		/*return $kd_awal . '-'.$kode_cabang.$code_user.$tanggal.$no_po; */
		return $kd_awal . '-'.$kode_cabang.$tanggal.$no_po; 
		//return $no_po; 
		
		
	}
	
	function get_barang()
	{
		$this->db->flush_cache();
		$this->db->select('*, jenis.jenis AS jenis_barang,jenis.id_jenis, kategori.kategori AS kategori_barang');
		$this->db->from('barang');
		$this->db->join('jenis', 'jenis.id_jenis = barang.id_jenis');
		$this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori');
		$this->db->where('barang.id_jenis <>', '3');
		return $this->db->get();
	}		
	function get_total_kas()	
	{		$this->db->flush_cache();		
		$this->db->select('Sum(detail_jurnal.DEBET)-Sum(detail_jurnal.KREDIT) as total_kas');		
		$this->db->from('detail_jurnal'); 		$this->db->like('akunid','1','after');		return $this->db->get();	
	}
	function get_total_kas_v2($data)
	{
		
		$this->db->where('kode', $data);
		return $this->db->get('kas');
	}

	function update_kas($id, $data)
	{
		$this->db->flush_cache();
		$this->db->where('kode', $id);
		$this->db->update('kas', $data);
	}
}