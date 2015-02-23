<?php
	# Jenis penjualan
	# 1. Cabang
	# 2. Toko
	# 3. Partai
	
	echo '<input name="jenis" value="'.$jenis.'" type="hidden" />';
	
	$i=0;
	$harga = 0;
	$readonly = '';
	
	foreach($query->result() as $row){

		$harga = 0;
		$readonly = '';
		
		if($jenis == 1){ // cabang
			if($row->is_hargajual == '0'){
				$readonly = 'readonly = "readonly"';
			}
			$harga = $row->harga_cabang;
		
		}else if($jenis == 2){ // toko
			if($row->is_hargatoko == '0'){
				$readonly = 'readonly = "readonly"';
			}
			$harga = $row->harga_toko;
			
		}else{	// partai
			if($row->is_hargapartai == '0'){
				$readonly = 'readonly = "readonly"';
			}
			$harga = $row->harga_partai;
		}
		
		echo 	'
					<tr class="penjualantemp">
						<td>'.($i + 1).'</td>
							<input name="items['.$i.'][id_barang]" value="'.$row->id_barang.'" type="hidden"  />
							<input name="items['.$i.'][nama_barang]" value="'.$row->nama_barang.'" type="hidden"  />
							<input name="items['.$i.'][sn]" value="'.$row->sn.'" type="hidden"  />														
						<td><input name="items['.$i.'][id_detail_pembelian]" value="'.$row->id_detail_pembelian.'" type="checkbox" /></td>
						<td>'.$row->nama_barang.'</td>
						<td><input name="items['.$i.'][harga]" value="'.$harga.'" type="text" '.$readonly.' /></td>												<td>'.$row->qty.'</td>												<td><input name="items['.$i.'][qty]" value="'.$row->qty.'" type="text" /></td>
						<td>'.$row->sn.'</td>
					</tr>
				';
		$i++;
	}
	
?>