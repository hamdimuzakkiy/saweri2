<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class mdl_area extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function getItem($num=0, $offset=0)
	{
		
		$this->db->flush_cache();		
		$this->db->order_by("kecamatan", "asc");
		$this->db->order_by("kabupaten", "asc");
		$this->db->select('area.id_area, area.area, kecamatan.kecamatan, kabupaten.kabupaten, count(pelanggan.id_area) as jumlah_pelanggan');
		$this->db->from('area');		
		$this->db->join('pelanggan', 'pelanggan.id_area = area.id_area','left');		
		$this->db->join('kecamatan', 'area.id_kecamatan = kecamatan.id_kecamatan');
		$this->db->join('kabupaten', 'area.id_kabupaten = kabupaten.id_kabupaten');				
		$this->db->group_by('area.id_area');		
		$this->db->limit($num, $offset);				
		return $this->db->get();		
		/*		$query="select  data_area.id_area, data_area.area,data_pelanggan.jumlah_pelanggan from
		(SELECT `area`.`id_area`, `area`.`area`, `kecamatan`.`kecamatan`,
		`kabupaten`.`kabupaten` 					FROM (`area`) 					JOIN `kecamatan` ON `area`.`id_kecamatan` = `kecamatan`.`id_kecamatan` 					JOIN `kabupaten` ON `area`.`id_kabupaten` = `kabupaten`.`id_kabupaten` 					) as data_area										LEFT JOIN (select count(pelanggan.id_area) as jumlah_pelanggan,pelanggan.id_area from pelanggan group by pelanggan.id_area) as data_pelanggan 									ON `data_pelanggan`.`id_area` = `data_area`.`id_area` 				" ;
		select area.id_area, area.area, count(pelanggan.id_area) as jml_pelanggan from arealeft join pelanggan on (area.id_area=pelanggan.id_area)group by area.id_area						$this->db->flush_cache();		return $this->db->query($query);*/
	}
	
	function getItemById($id)
	{
		$this->db->flush_cache();
		$this->db->where('id_area', $id);
		return $this->db->get('area');
	}

	function insert($data)
	{
		$this->db->flush_cache();
		$this->db->insert('area', $data);
	}
	
	function update($id, $data)
	{
		$this->db->flush_cache();
		$this->db->where('id_area', $id);
		$this->db->update('area', $data);
		

	}
	
	function delete($id)
	{
		$this->db->flush_cache();
		$this->db->delete('area', array('id_area' => $id));
	}
	
	function getAll()
	{
		$this->db->select('area.*, kecamatan.*, kabupaten.*');
		$this->db->from('area', 'kecamatan', 'kabupaten');
		$this->db->where('id_cabang', 'kecamatan', 'kabupaten', $id);
		return $this->db->get('cabang', 'kecamatan', 'kabupaten');
		
		return $this->db->get();
	}
	
}