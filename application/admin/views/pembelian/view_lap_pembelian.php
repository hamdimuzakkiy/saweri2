<?php ini_set("memory_limit","12M"); ?>
<link href="<?=base_url()?>asset/admin/css/style.css" rel="stylesheet" type="text/css">

<script type="text/javascript">
	function report_pdf(){		      
            var site = "<?php echo site_url()?>";           
            
			var id = document.getElementById('id_pembelian').value;			
			 location.href = site+"/pembelian/report_pdf/"+id;
	}
	
	function report_excel(){
		document.getElementById("rekap_tabel1").value = document.getElementById("div_laporan").innerHTML;
		document.getElementById("myform").submit();
	}
	
	
	function print(){
		/*<form>
		<input type="button" value="Print This Page" onClick="window.print()" />
		</form>*/
	}
	
	
</script>
			<div id="tab-settings" class="tabs-content">
					<button type="button" onclick="report_pdf()"><img src="<?=base_url()?>asset/admin/images/icons/fugue/tick-circle.png" width="16" height="16">REKAP PDF</button>
					<button type="submit" onclick="report_excel()"><img src="<?=base_url()?>asset/admin/images/icons/fugue/tick-circle.png" width="16" height="16">REKAP EXCEL</button>
					
			</div>	
			<!--
<?php
	$attributes = array('class' => 'formccs', 'id' => 'myform', 'name'=> 'myform');	
	echo form_open('laporan_hutang/report_excel', $attributes);
?>	-->
<div id="div_laporan">	<input name="rekap_tabel1" id="rekap_tabel1" type="hidden" value="rekap_tabel1" />	

<table class="laporan" width="90%" border="1">		
	<tr><td colspan="10"><b>SAWERI GADING CELL</b></td></tr>		
	<tr><td colspan="10"><b>JL. S PARMAN 18 BANYUWANGI</b></td></tr>		
	<tr><td colspan="10"><b>TELP (0333)-411345</b></td></tr>		
	<tr><td colspan="10"><b></b><br/></td></tr>		
	<tr><td colspan="10" div align="center"><b>LAPORAN PEMBELIAN</b></td></tr>		
	<!--tr><td colspan="10"><b>PERIODE : <?php echo $this->fungsi->dateindo3('-',$periode_awal) . ' S/D ' .  $this->fungsi->dateindo3('-',$periode_akhir); ?></b></td></tr-->		
	<?php foreach($results->result() as $row) {?>
	<input type = "hidden" id = "id_pembelian" value = "<?php print $row->id_pembelian; ?>">  
	<tr><td colspan="10"><b>TANGGAL CETAK : <?php echo $this->fungsi->dateindo3('-',date('Y-m-d')) ?></b></td></tr>			
	<tr>
			<td colspan="10"><b>Nomor PO : <?php echo $row->po_no?></b></td>	

	</tr>
	<tr>
			<td colspan="10"><b>Tanggal Pembelian : <?php echo $this->fungsi->dateindo3('-',$row->tanggal) ?></b></td>				
	</tr>
	<tr>
			<td colspan="10"><b>Cabang : <?php echo $row->nama_cabang;?></b>
			</td>				
	</tr>
	<tr>
			<td colspan="10"><b>Suplier : <?php echo $row->nama_supplier;?></b></td>				
	</tr>
	<tr>
			<td colspan="10"><b>Diskon : <?php echo $row->diskon;?> %</b></td>				
	</tr>
	<tr>
			<td colspan="10"><b>Kas : <?php echo $row->nama_kas;?></b></td>				
	</tr>
	<tr>
			<td colspan="10"><b>Cara Pembayaran : <?php  
			if($row->cara_bayar == 1)
				{print "Tunai";}
			else if ($row->cara_bayar == 2)
				{
					print  "Hutang ";
					print $row->jatuh_tempo;
					print " Hari"; 
				}

			?></b></td>				
	</tr>
	<tr><td colspan="10">&nbsp;</td></tr>
	<?php } ?>
	<tr>			
		<th scope="col">NO</th>			
		<th scope="col">Nama Barang</th>			
		<th scope="col">SN</th>						
		<th scope="col">QTY</th>			
		<th scope="col">Harga Barang</th>
		<th scope="col">Harga Toko</th>			
		<th scope="col">Harga Partai</th>			
		<th scope="col">Harga Cabang</th>					
	</tr>			  
	<?php
			$i=1;
			$total_bayar=0;
			foreach($results2->result() as $row){
	?>
	<tr>
		<td scope="col"><?=$i++?></td>
		<td scope="col"><?=$row->nama_barang?></td>
		<td scope="col"><?=$row->sn?></td>
		<td scope="col"><?=$row->qty?></td>
		<td scope="col"><?=$row->harga?></td>
		<td scope="col"><?=$row->harga_toko?></td>
		<td scope="col"><?=$row->harga_partai?></td>
		<td scope="col"><?=$row->harga_cabang?></td>		
	</tr>				
	<?php
				//$total_bayar = $total_bayar + $row->total;
			}
	?>
</form>