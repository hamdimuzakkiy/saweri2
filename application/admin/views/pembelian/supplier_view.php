<div align="center">
<strong>Detail Pembelian</strong>
<div>
<br/>
<table width="686" border="1" cellpadding="1" cellspacing="1">
  <!--
  <tr>
    <td width="64" align="left" valign="top"><strong>Tanggal</strong></td>
    <td width="372" align="left" valign="top" colspan="4"></td>
  </tr>
  <tr>
    <td align="left" valign="top"><strong>Cabang</strong></td>
    <td align="left" valign="top" colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" colspan="5">&nbsp;</td>
  </tr>
  -->
  <tr>
    <td align="left" valign="top" bgcolor="#CCCCFF"><strong>No</strong></td>
    <td align="left" valign="top" bgcolor="#CCCCFF"><strong>Nama Barang</strong></td>
    <td align="left" valign="top" bgcolor="#CCCCFF"><strong>Harga</strong></td>
    <td align="left" valign="top" bgcolor="#CCCCFF"><strong>Qty</strong></td>
	<td align="left" valign="top" bgcolor="#CCCCFF"><strong>Total Bayar</strong></td>
  </tr>
	<?php
			$i=1;
			$total_bayar=0;
			foreach($result->result() as $row){
	?>
			  <tr>
				<td align="left" valign="top"><?=$i++?></td>
				<td align="left" valign="top"><?=$row->nama_barang?></td>
				<td align="left" valign="top"><?=convert_rupiah($row->harga_toko)?></td>
				<td align="left" valign="top"><?=$row->qty?></td>
				<td align="left" valign="top"><?=convert_rupiah($row->total)?></td>
			  </tr>
	<?php
				$total_bayar = $total_bayar + $row->total;
			}
	?>
 	  <tr>
		<td align="left" valign="top" colspan="5">&nbsp;</td>
	  </tr>
	  <tr>
		<td align="left" valign="top" bgcolor="#CCCCFF" colspan="4"><div align="right"><strong>Total Bayar&nbsp;&nbsp;:&nbsp;&nbsp;</strong></div></td>
		<td align="left" valign="top" bgcolor="#CCCCFF"><?=convert_rupiah($total_bayar)?></td>
	  </tr>
</table>