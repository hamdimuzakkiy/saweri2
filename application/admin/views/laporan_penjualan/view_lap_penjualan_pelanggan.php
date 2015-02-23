<?php ini_set("memory_limit","12M"); ?>
<link href="<?=base_url()?>asset/admin/css/style.css" rel="stylesheet" type="text/css">

<script type="text/javascript">
	
	function report_pdf(){	
			var periode_awal=document.getElementById('tanggal_awal').value;
			var periode_akhir=document.getElementById('tanggal_akhir').value;
            var site = "<?php echo site_url()?>";
			
			myForm = document.getElementById('form1');
			// open a *BLANK* WINDOW!!!!
			
			// save form info:
			var saveTarget = myForm.target;
			var saveAction = myForm.action;
			var saveMethod = myForm.method; // not needed if already post
			// change form info:
			myForm.target = 'report_pdf';
			myForm.action = "<?=site_url();?>/laporan_penjualan/pdf_lap_penjualan_pelanggan/";
			myForm.method = "post"; // not needed if <form> was already post
			myForm.submit( );  // invoke the form, submitting to the popup window

			// restore form:
			myForm.target = saveTarget;
			myForm.action = saveAction;
			myForm.method = saveMethod; // if used

			return true ; // why does this matter? ordinary buttons ignore return value
	}
	
	function report_excel(){
		document.getElementById("rekap_tabel1").value = document.getElementById("div_laporan").innerHTML;
		document.getElementById("form1").submit();
	}
	
</script>
			<div id="tab-settings" class="tabs-content">
					<button type="button" onclick="report_pdf()"><img src="<?=base_url()?>asset/admin/images/icons/fugue/tick-circle.png" width="16" height="16">REKAP PDF</button>
					<button type="submit" onclick="report_excel()"><img src="<?=base_url()?>asset/admin/images/icons/fugue/tick-circle.png" width="16" height="16">REKAP EXCEL</button>	
			</div>	
<?php
			$attributes = array('name' => 'form1', 'id' => 'form1', 'class'=>'block-content form', 'target'=>'_top');
			echo form_open('laporan_penjualan/view_lap_penjualan_pelanggan/v_excel', $attributes);
?>
	<input name="rekap_tabel1" id="rekap_tabel1" type="hidden" value="rekap_tabel1" />
	<input name="periode_awal" id="tanggal_awal" type="hidden" value="<?=$periode_awal;?>" />
	<input name="periode_akhir" id="tanggal_akhir" type="hidden" value="<?=$periode_akhir;?>" />
	
	<?php
		$i=0;
		foreach ($dt_nama_supplier as $nama_supplier){
			echo "<input type='hidden' id='nama_supplier' name='nama_supplier[$i]' value='" . $nama_supplier . "' checked />";
			$i++;
		}
	?>
<div id="div_laporan">
	<table class="laporan" width="90%" border="1">
		<tr><td colspan="8"><b>SAWERI GADING CELL</b></td></tr>
		<tr><td colspan="8"><b>JL. S PARMAN 18 BANYUWANGI</b></td></tr>
		<tr><td colspan="8"><b>TELP (0333)-411345</b></td></tr>
		<tr><td colspan="8"><b></b><br/></td></tr>
		<tr><td colspan="8" div align="center"><b>LAPORAN PENJUALAN [PELANGGAN]</b></td></tr>
		<tr><td colspan="8"><b>PERIODE : <?php echo $periode_awal . ' s/d ' .  $periode_akhir; ?></b></td></tr>
		<tr><td colspan="8"><b>TANGGAL CETAK : <?php echo date('d-M-Y') ?></b></td></tr>
		<tr>
			<th scope="col">NO</th>
			<th scope="col">TANGGAL </th>
			<th scope="col">SO</th>
			<th scope="col">NAMA BARANG</th>
			<th scope="col">QTY</th>
			<th scope="col">PELANGGAN</th>
			<th scope="col">CABANG</th>
			<th scope="col">RUPIAH</th>
		</tr>
		
		<?php
		$j=0;
		$nama_brg = null;
		$total_brg = 0;
		$qty_perbrg = 0;
			foreach($results->result() as $row)
			{
				$j=$j+1;
				
				if ($nama_brg==null){
					$nama_brg=$row->id_pelanggan;
					
				}
			
				
				if($row->id_pelanggan != $nama_brg){		
		?>
					<tr class="rowjumlah">
						<td class="use_border" colspan="4"><b>Jumlah : </b></td>
						<td align="right"><b><?=$qty_perbrg;?></b></td>
						<td colspan="2"></td>
						<td align="right"><b><?=$this->fungsi->uangindo($total_brg)?></b></td>
					</tr>
		<?php			
						$total_brg=0;
						$qty_perbrg=0;
						$nama_brg=$row->id_pelanggan;
				}
		?>
					<tr>
						<td align="right" valign="middle"><?=$j;?></td>
						<td align="center" valign="middle"><?=$row->tanggal?></td>
						<td align="right" valign="middle"><?php echo '\''.$row->so_no?></td>
						<td align="left" valign="middle"><?=$row->nama_barang?></td>
						<td align="right" valign="middle"><?=$row->qty?></td>					
						<td align="left" valign="middle"><?=$row->nama_pelanggan?></td>
						<td align="left" valign="middle"><?=$row->nama_cabang?></td>
						<td align="right" valign="middle"><?=$this->fungsi->uangindo($row->total);?></td>
						
						<?php $sum_total[]=$row->total ;?>
						<?php $sum_qty[]=$row->qty ;?>
						<?php $qty_perbrg=$row->qty+$qty_perbrg; ?>
						<?php $total_brg=$row->total+$total_brg; ?>
					</tr>
		<?php
			}
		?>
				<tr class="rowjumlah">
						<td colspan="4"><b>Jumlah : </b></td>
						<td align="right"><b><?=$qty_perbrg;?></b></td>
						<td colspan="2"></td>
						<td align="right"><b><?=$this->fungsi->uangindo($total_brg)?></b></td>
						
				</tr>
			
			<tr>
				<td colspan="4"><b>Jumlah Keseluruhan : </b></td>
				<td align="right"><b><?php echo array_sum($sum_qty); ?></b></td>
				<td colspan="2"></td>
				<td align="right"><b><?php if(isset($row->total)){ echo  $this->fungsi->uangindo(array_sum($sum_total));} ?></b></td>
				</tr>
	</table>
</div>