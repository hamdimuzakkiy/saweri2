<?php ini_set("memory_limit","32M"); ?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-15"><style>#div_laporan{	margin:0 auto;}table.laporan {	  border-spacing: 0;	  margin:0 auto;	   font-size: 0.8em;	     font-family: sans-serif;}tr.border,th.th_border,td.use_border {  border:0.5px solid #ccc;  padding:2pt;}</style><div id="div_laporan" align="center">	<table class="laporan" >
<tr><td colspan="7" align="left"><b>SAWERI GADING CELL</b></td></tr>		
<tr><td colspan="7" align="left"><b>JL. S PARMAN 18 BANYUWANGI</b></td></tr>
<tr><td colspan="7" align="left"><b>TELP (0333)-411345</b></td></tr>		
<tr><td colspan="7" align="left"><b></b><br/></td></tr>		
<tr><td colspan="7" div align="center"><b>LAPORAN BIAYA</b></td></tr>		
<tr><td colspan="7" align="left"><b>TANGGAL CETAK : <?php echo $this->fungsi->dateindo3('-',date('Y-m-d')) ?></b></td></tr>		

<?php foreach($results->result() as $row) {?>
	<tr><td colspan="0" div align="center"><b>Nomor PO : <?php echo $row->po_no?></b></td></tr>
	
<?php  }?>

	