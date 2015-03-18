<?php ini_set("memory_limit","32M"); ?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-15"><style>#div_laporan{	margin:0 auto;}table.laporan {	  border-spacing: 0;	  margin:0 auto;	   font-size: 0.8em;	     font-family: sans-serif;}tr.border,th.th_border,td.use_border {  border:0.5px solid #ccc;  padding:2pt;}</style><div id="div_laporan" align="center">	<table class="laporan" >
<tr><td colspan="7" align="left"><b>SAWERI GADING CELL</b></td></tr>		
<tr><td colspan="7" align="left"><b>JL. S PARMAN 18 BANYUWANGI</b></td></tr>
<tr><td colspan="7" align="left"><b>TELP (0333)-411345</b></td></tr>		
<tr><td colspan="7" align="left"><b></b><br/></td></tr>		
<tr><td colspan="7" div align="center"><b>LAPORAN BIAYA</b></td></tr>		
<tr><td colspan="0" div align="left"><b>&nbsp;</b></td></tr>
<tr><td colspan="7" align="left"><b>TANGGAL CETAK : <?php echo $this->fungsi->dateindo3('-',date('Y-m-d')) ?></b></td></tr>		

<?php foreach($results->result() as $row) {?>

	<tr><td colspan="0" div align="left"><b>Nomor PO : <?php echo $row->po_no?></b></td></tr>
	<tr><td colspan="0" div align="left"><b>Tanggal Pembelian : <?php echo $this->fungsi->dateindo3('-',$row->tanggal) ?></b></td></tr>
	<tr><td colspan="0" div align="left"><b>Cabang : <?php echo $row->nama_cabang;?></b></td></tr>
	<tr><td colspan="0" div align="left"><b>Suplier : <?php echo $row->nama_supplier;?></td></tr>
	<tr><td colspan="0" div align="left"><b>Diskon : <?php echo $row->diskon;?> %</b></td></tr>
	<tr><td colspan="0" div align="left"><b>Kas : <?php echo $row->nama_kas;?></b></td></tr>
	<tr><td colspan="0" div align="left"><b>Cara Pembayaran : <?php  
			if($row->cara_bayar == 1)
				{print "Tunai";}
			else if ($row->cara_bayar == 2)
				{
					print  "Hutang ";
					print $row->jatuh_tempo;
					print " Hari"; 
				}?></b></td></tr>
	
<?php  }?>
<tr><td colspan="0" div align="left"><b>&nbsp;</b></td></tr>
<tr class="border">
	<th class="th_border" colspan="0" scope="col">NO</th>
	<th class="th_border" scope="col">Nama Barang</th>
	<th class="th_border" scope="col">SN</th>
	<th class="th_border" scope="col">QTY</th>
	<th class="th_border" scope="col">Harga Barang</th>
	<th class="th_border" scope="col">Harga Toko</th>
	<th class="th_border" scope="col">Harga Partai</th>
	<th class="th_border" scope="col">Harga Cabang</th>


<?php 
	$i=1;
			$total_bayar=0;
			foreach($results2->result() as $row){
?>

<tr class="border">
		<td class="use_border" align="right" valign="middle"><?=$i++?></td>
		<td class="use_border" align="right" valign="middle"><?=$row->nama_barang?></td>
		<td class="use_border" align="right" valign="middle"><?=$row->sn?></td>
		<td class="use_border" align="right" valign="middle"><?=$row->qty?></td>
		<td class="use_border" align="right" valign="middle"><?=$row->harga?></td>
		<td class="use_border" align="right" valign="middle"><?=$row->harga_toko?></td>
		<td class="use_border" align="right" valign="middle"><?=$row->harga_partai?></td>
		<td class="use_border" align="right" valign="middle"><?=$row->harga_cabang?></td>		
	</tr>	
</tr>
	<?php
}
	?>
	