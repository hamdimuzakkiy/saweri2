<?php
	#
	include('convert_rupiah.php');
	
	# memasukan detail barang ke list detail di form add barang
	function add_detail_3($jum,$diskon) // pas add
	{
		
		$data['detail_idbarang'] 		= $_POST['detail_idbarang'];
		$data['detail_namabarang'] 		= $_POST['detail_namabarang'];
		$data['detail_harga']	 		= $_POST['detail_harga'];				$data['detail_idjenis']	 		= $_POST['detail_idjenis'];
		$data['detail_harga_toko'] 		= $_POST['detail_harga_toko'];
		$data['detail_harga_partai'] 	= $_POST['detail_harga_partai'];
		$data['detail_harga_cabang'] 	= $_POST['detail_harga_cabang'];
		$data['detail_qty'] 			= 1;
		$data['detail_jatuh_tempo'] 	= $_POST['detail_jatuh_tempo'];
		$data['detail_total'] 			= $data['detail_harga']; //* $data['detail_qty'];
		
		$i=0;
		$sum = 0;
		//print_r($detail);
				
		if (isset($_POST['detail']))
		{
			$detail = $_POST['detail'];
			$count_detail = count($detail);
			$sum  = 0;
			for($i=0; $i<$count_detail; $i++)
			{

				$sum = $sum + ($detail[$i]['harga'] * $detail[$i]['qty']);
				echo '
						<tr>
							<td>'.($i + 1).'</td>
							<td>
								'.$detail[$i]['nama_barang'].'
								<input type="hidden" name="detail['.$i.'][nama_barang]" value="'.$detail[$i]['nama_barang'].'" />
								<input type="hidden" name="detail['.$i.'][id_barang]" id="detail_idbarang'.$i.'" value="'.$detail[$i]['id_barang'].'" />								<input type="hidden" name="detail['.$i.'][id_jenis]" id="detail_idjenis'.$i.'" value="'.$detail[$i]['id_jenis'].'" />
							</td>
							<td>
								'.convert_rupiah($detail[$i]['harga']).'
								<input type="hidden" name="detail['.$i.'][harga]" value="'.$detail[$i]['harga'].'" />
								<input type="hidden" name="detail['.$i.'][total]" value="'.$detail[$i]['total'].'" />
							</td>
							<td>
								'.convert_rupiah($detail[$i]['harga_toko']).'
								<input type="hidden" name="detail['.$i.'][harga_toko]" value="'.$detail[$i]['harga_toko'].'" />
							</td>
							<td>
								'.convert_rupiah($detail[$i]['harga_partai']).'
								<input type="hidden" name="detail['.$i.'][harga_partai]" value="'.$detail[$i]['harga_partai'].'" />
							</td>
							<td>
								'.convert_rupiah($detail[$i]['harga_cabang']).'
								<input type="hidden" name="detail['.$i.'][harga_cabang]" value="'.$detail[$i]['harga_cabang'].'" />
							</td>
							<td>
								'; if ($detail[$i]['issn'] == '0'){ echo'
								<input hidden class="tblInput" id="detail_sn'.$i.'" type="text" name="detail['.$i.'][sn]" value="'.$detail[$i]['sn'].'" />
								'; } if ($detail[$i]['issn'] == '1') {echo '
								<input style = "width:100%;" required  class="tblInput" id="detail_sn'.$i.'" type="text" name="detail['.$i.'][sn]" value="'.$detail[$i]['sn'].'" />
								';} print '
								<input hidden class="tblInput" id="detail_issn'.$i.'" type="text" name="detail['.$i.'][issn]" value="'.$detail[$i]['issn'].'" />
							</td>
							<td>
																' . $detail[$i]['qty'] . '
								<input type="hidden" name="detail['.$i.'][qty]" value="' . $detail[$i]['qty'] . '" />
							</td>
							<td>
								'.$detail[$i]['jatuh_tempo'].'
								<input type="hidden" name="detail['.$i.'][jatuh_tempo]" value="'.$detail[$i]['jatuh_tempo'].'" />
							</td>														
							<td align="center">
								<a href="Javascript:remove_detail('.$i.')">Batal</a>
							</td>
						</tr>';
			}
			
		}
		
		$xx=0;
		for($xx=0; $xx < $jum; $xx++){ 
			$sum = $sum + ($data['detail_harga'] * $data['detail_qty']);
			echo '
						<tr>
							<td>'.($i + 1).'</td>
							<td>
								'.$data['detail_namabarang'].'
								<input type="hidden" name="detail['.$i.'][nama_barang]" value="'.$data['detail_namabarang'].'" />
								<input type="hidden" name="detail['.$i.'][id_barang]" id="detail_idbarang'.$i.'" value="'.$data['detail_idbarang'].'" />								<input type="hidden" name="detail['.$i.'][id_jenis]" id="detail_idjenis'.$i.'" value="'.$data['detail_idjenis'].'" />
							</td>
							<td>
								'.convert_rupiah($data['detail_harga']).'
								<input type="hidden" name="detail['.$i.'][harga]" value="'.$data['detail_harga'].'" />
								<input type="hidden" name="detail['.$i.'][total]" value="'.$data['detail_total'].'" />
							</td>
							<td>
								'.convert_rupiah($data['detail_harga_toko']).'
								<input type="hidden" name="detail['.$i.'][harga_toko]" value="'.$data['detail_harga_toko'].'" />
							</td>
							<td>
								'.convert_rupiah($data['detail_harga_partai']).'
								<input type="hidden" name="detail['.$i.'][harga_partai]" value="'.$data['detail_harga_partai'].'" />
							</td>
							<td>
								'.convert_rupiah($data['detail_harga_cabang']).'
								<input type="hidden" name="detail['.$i.'][harga_cabang]" value="'.$data['detail_harga_cabang'].'" />
							</td>
							<td>
								<input style = "width:100%;" required type="text"  name="detail['.$i.'][sn]" id="detail_sn'.$i.'" value=""  />
								<input type="hidden"  name="detail['.$i.'][issn]" id="detail_issn'.$i.'" value="1"  />
							</td>
							<td>
								'.$data['detail_qty'].'
								<input type="hidden" name="detail['.$i.'][qty]" value="1" />
							</td>
							<td>
								'.$data['detail_jatuh_tempo'].'
								<input type="hidden" name="detail['.$i.'][jatuh_tempo]" value="'.$data['detail_jatuh_tempo'].'" />
							</td>														
							<td align="center">
								<a href="Javascript:remove_detail('.$i.')">Batal</a>
							</td>
						</tr>';
			$i++;
		} 
		print "
					<tr>
						<td style = 'border-color:white;'> </td>
						<td style = 'border-color:white;'> </td>
						<td style = 'border-color:white;'> </td>
						<td style = 'border-color:white;'> </td>
						<td style = 'border-color:white;'> </td>
						<td style = 'border-color:white;'> </td>
						<td style = 'border-color:white;'> </td>
						<td>Total</td>
						<td>".convert_rupiah($sum)."						
						</td>
						
					</tr>

					<tr>
						<td style = 'border-color:white;'> </td>
						<td style = 'border-color:white;'> </td>
						<td style = 'border-color:white;'> </td>
						<td style = 'border-color:white;'> </td>
						<td style = 'border-color:white;'> </td>
						<td style = 'border-color:white;'> </td>
						<td style = 'border-color:white;'> </td>
						<td>Diskon</td>
						<td id = 'harga_diskon'>".convert_rupiah($sum*$diskon/100)."
						</td>
						
					</tr>
					<tr>
						<td style = 'border-color:white;'> </td>
						<td style = 'border-color:white;'> </td>
						<td style = 'border-color:white;'> </td>
						<td style = 'border-color:white;'> </td>
						<td style = 'border-color:white;'> </td>
						<td style = 'border-color:white;'> </td>
						<td style = 'border-color:white;'> </td>
						<td>Harga Akhir</td>
						<td id = 'finall'>".convert_rupiah(($sum*(100-$diskon)/100))."
						
						</td>
						<input type='hidden' id = 'sum' name='sum' value='".$sum."' />
					</tr>";
	}


	function add_detail_1($diskon) // pas add
	{

		$data['detail_idbarang'] 		= $_POST['detail_idbarang'];
		$data['detail_namabarang'] 		= $_POST['detail_namabarang'];
		$data['detail_harga']	 		= $_POST['detail_harga'];				
		$data['detail_idjenis']	 		= $_POST['detail_idjenis'];

		$data['detail_harga_toko'] 		= $_POST['detail_harga_toko'];
		$data['detail_harga_partai'] 	= $_POST['detail_harga_partai'];
		$data['detail_harga_cabang'] 	= $_POST['detail_harga_cabang'];
		$data['detail_qty'] 			= $_POST['detail_qty'];
		$data['detail_jatuh_tempo'] 	= $_POST['detail_jatuh_tempo'];
		$data['detail_total'] 			= $data['detail_harga']; //* $data['detail_qty'];
		
		$i=0;
		
		//print_r($detail);
		$sum = 0;
		if (isset($_POST['detail']))
		{
			$detail = $_POST['detail'];
			$count_detail = count($detail);
			
			for($i=0; $i<$count_detail; $i++)
			{	
				
				$sum = $sum + ($detail[$i]['harga'] * $detail[$i]['qty']);
				echo '

						<tr>
							<td>'.($i + 1).'</td>
							<td>
								'.$detail[$i]['nama_barang'].'
								<input type="hidden" name="detail['.$i.'][nama_barang]" value="'.$detail[$i]['nama_barang'].'" />
								<input type="hidden" name="detail['.$i.'][id_barang]" id="detail_idbarang'.$i.'" value="'.$detail[$i]['id_barang'].'" />								
								<input type="hidden" name="detail['.$i.'][id_jenis]" id="detail_idjenis'.$i.'" value="'.$detail[$i]['id_jenis'].'" />
							</td>
							<td>
								'.convert_rupiah($detail[$i]['harga']).'
								<input type="hidden" name="detail['.$i.'][harga]" value="'.$detail[$i]['harga'].'" />
								<input type="hidden" name="detail['.$i.'][total]" value="'.$detail[$i]['total'].'" />
							</td>
							<td>
								'.convert_rupiah($detail[$i]['harga_toko']).'
								<input type="hidden" name="detail['.$i.'][harga_toko]" value="'.$detail[$i]['harga_toko'].'" />
							</td>
							<td>
								'.convert_rupiah($detail[$i]['harga_partai']).'
								<input type="hidden" name="detail['.$i.'][harga_partai]" value="'.$detail[$i]['harga_partai'].'" />
							</td>
							<td>
								'.convert_rupiah($detail[$i]['harga_cabang']).'
								<input type="hidden" name="detail['.$i.'][harga_cabang]" value="'.$detail[$i]['harga_cabang'].'" />
							</td>
							<td>
								'
									; if ($detail[$i]['issn'] == 0){ echo'
									<input hidden class="tblInput" id="detail_sn'.$i.'" type="text" name="detail['.$i.'][sn]" value="'.$detail[$i]['sn'].'" />
									'; } if ($detail[$i]['issn'] == 1) {echo '
									<input style = "width:100%;" required class="tblInput" id="detail_sn'.$i.'" type="text" name="detail['.$i.'][sn]" value="'.$detail[$i]['sn'].'" />
									';} print
								'
								<input hidden class="tblInput" id="detail_issn'.$i.'" type="text" name="detail['.$i.'][issn]" value="'.$detail[$i]['issn'].'" />
							</td>
							<td>
																' . $detail[$i]['qty'] . '
								<input type="hidden" name="detail['.$i.'][qty]" value="' . $detail[$i]['qty'] . '" />
							</td>
							<td>
								'.$detail[$i]['jatuh_tempo'].'
								<input type="hidden" name="detail['.$i.'][jatuh_tempo]" value="'.$detail[$i]['jatuh_tempo'].'" />
							</td>														
							<td align="center">
								<a href="Javascript:remove_detail('.$i.')">Batal</a>
							</td>
						</tr>';
			}
			//echo '<input type="text" name = "jumlah" id="jumlah">';

		}
		
		$xx=0;
		/*for($xx=0; $xx < $data['detail_qty']; $xx++){ */
			$sum = $sum + ($data['detail_harga'] * $data['detail_qty']);
			echo '
						<tr>
							<td>'.($i + 1).'</td>
							<td>
								'.$data['detail_namabarang'].'
								<input type="hidden" name="detail['.$i.'][nama_barang]" value="'.$data['detail_namabarang'].'" />
								<input type="hidden" name="detail['.$i.'][id_barang]" id="detail_idbarang'.$i.'" value="'.$data['detail_idbarang'].'" />								<input type="hidden" name="detail['.$i.'][id_jenis]" id="detail_idjenis'.$i.'" value="'.$data['detail_idjenis'].'" />
							</td>
							<td>
								'.convert_rupiah($data['detail_harga']).'
								<input type="hidden" name="detail['.$i.'][harga]" value="'.$data['detail_harga'].'" />
								<input type="hidden" name="detail['.$i.'][total]" value="'.$data['detail_total'].'" />
							</td>
							<td>
								'.convert_rupiah($data['detail_harga_toko']).'
								<input type="hidden" name="detail['.$i.'][harga_toko]" value="'.$data['detail_harga_toko'].'" />
							</td>
							<td>
								'.convert_rupiah($data['detail_harga_partai']).'
								<input type="hidden" name="detail['.$i.'][harga_partai]" value="'.$data['detail_harga_partai'].'" />
							</td>
							<td>
								'.convert_rupiah($data['detail_harga_cabang']).'
								<input type="hidden" name="detail['.$i.'][harga_cabang]" value="'.$data['detail_harga_cabang'].'" />
							</td>
							<td>
								<input hidden type="text"  name="detail['.$i.'][sn]" id="detail_sn'.$i.'" value=""  />
								<input type="hidden"  name="detail['.$i.'][issn]" id="detail_sn'.$i.'" value="0"  />
							</td>
							<td>
								'.$data['detail_qty'].'
								<input type="hidden" name="detail['.$i.'][qty]" value="'.$data['detail_qty'].'" />
							</td>
							<td>
								'.$data['detail_jatuh_tempo'].'
								<input type="hidden" name="detail['.$i.'][jatuh_tempo]" value="'.$data['detail_jatuh_tempo'].'" />
							</td>														
							<td align="center">
								<a href="Javascript:remove_detail('.$i.')">Batal</a>
							</td>
						</tr>';
			$i++;
			print "
					<tr>
						<td style = 'border-color:white;'> </td>
						<td style = 'border-color:white;'> </td>
						<td style = 'border-color:white;'> </td>
						<td style = 'border-color:white;'> </td>
						<td style = 'border-color:white;'> </td>
						<td style = 'border-color:white;'> </td>
						<td style = 'border-color:white;'> </td>
						<td>Jumlah</td>
						<td>".convert_rupiah($sum)."						
						</td>
						
					</tr>

					<tr>
						<td style = 'border-color:white;'> </td>
						<td style = 'border-color:white;'> </td>
						<td style = 'border-color:white;'> </td>
						<td style = 'border-color:white;'> </td>
						<td style = 'border-color:white;'> </td>
						<td style = 'border-color:white;'> </td>
						<td style = 'border-color:white;'> </td>
						<td>Diskon</td>
						<td id = 'harga_diskon'>".convert_rupiah($sum*$diskon/100)."
						</td>
						
					</tr>
					<tr>
						<td style = 'border-color:white;'> </td>
						<td style = 'border-color:white;'> </td>
						<td style = 'border-color:white;'> </td>
						<td style = 'border-color:white;'> </td>
						<td style = 'border-color:white;'> </td>
						<td style = 'border-color:white;'> </td>
						<td style = 'border-color:white;'> </td>
						<td>Harga Akhir</td>
						<td id = 'finall'>".convert_rupiah(($sum*(100-$diskon)/100))."
						
						</td>
						<input type='hidden' id = 'sum' name='sum' value='".$sum."' />
					</tr>
					";
		/*} */
	}

	function add_detail_2() // pas edit
	{
		$data['detail_idbarang'] 	= $_POST['detail_idbarang'];
		$data['detail_namabarang'] 	= $_POST['detail_namabarang'];
		$data['detail_harga'] 		= $_POST['detail_harga'];		$data['detail_idjenis'] 	= $_POST['detail_idjenis'];
		$data['detail_qty'] 		= $_POST['detail_qty'];
		$data['detail_jatuh_tempo'] = $_POST['detail_jatuh_tempo'];
		$data['detail_total'] 		= $data['detail_harga']; //* $data['detail_qty'];
		
		$i=0;
		
		
		if (isset($_POST['detail']))
		{
			$detail = $_POST['detail'];
			$count_detail = count($detail);
		
			for($i=0; $i<$count_detail; $i++)
			{
				echo '
						<tr>
							<td>'.($i + 1).'</td>
							<td>
								'.$detail[$i]['nama_barang'].'
								<input type="hidden" name="detail['.$i.'][nama_barang]" value="'.$detail[$i]['nama_barang'].'" />
								<input type="hidden" name="detail['.$i.'][id_barang]" id="detail_idbarang'.$i.'" value="'.$detail[$i]['id_barang'].'" />								<input type="hidden" name="detail['.$i.'][id_jenis]" id="detail_idjenis'.$i.'" value="'.$detail[$i]['id_jenis'].'" />
							</td>
							<td>
								'.convert_rupiah($detail[$i]['harga']).'
								<input type="hidden" name="detail['.$i.'][harga]" value="'.$detail[$i]['harga'].'" />
							</td>
							<td>
								<input style = "width:100%;"  type="text" name="detail['.$i.'][sn]" id="detail_sn'.$i.'" value="'.$detail[$i]['sn'].'" />
							</td>
							<td>
								'.$detail[$i]['sn'].'
								<input type="hidden" name="detail['.$i.'][qty]" value="'.$detail[$i]['sn'].'" />
							</td>
							<td>
								'.$detail[$i]['jatuh_tempo'].'
								<input type="hidden" name="detail['.$i.'][jatuh_tempo]" value="'.$detail[$i]['jatuh_tempo'].'" />
							</td>
							<td>
								'.convert_rupiah($detail[$i]['total']).'
								<input type="hidden" name="detail['.$i.'][total]" value="'.$detail[$i]['total'].'" />
							</td>
							<td align="center">
								<a href="Javascript:remove_detail('.$i.')">Batal</a>
							</td>
						</tr>';
			}
		}
		
		
		$xx=0;
		/*for($xx=0; $xx < $data['detail_qty']; $xx++){ */
			echo '
						<tr>
							<td>'.($i + 1).'</td>
							<td>
								'.$data['detail_namabarang'].'
								<input type="hidden" name="detail['.$i.'][nama_barang]" value="'.$data['detail_namabarang'].'" />
								<input type="hidden" name="detail['.$i.'][id_barang]" id="detail_idbarang'.$i.'" value="'.$data['detail_idbarang'].'" />								<input type="hidden" name="detail['.$i.'][id_jenis]" id="detail_idjenis'.$i.'" value="'.$data['detail_idjenis'].'" />
							</td>
							<td>
								'.convert_rupiah($data['detail_harga']).'
								<input type="hidden" name="detail['.$i.'][harga]" value="'.$data['detail_harga'].'" />
							</td>
							<td>
								<input type="text" name="detail['.$i.'][sn]" id="detail_sn'.$i.'" value="" />
							</td>
							<td>
								'.$data['detail_qty'].'
								<input type="hidden" name="detail['.$i.'][qty]" value="'.$data['detail_qty'].'" />
							</td>
							<td>
								'.$data['detail_jatuh_tempo'].'
								<input type="hidden" name="detail['.$i.'][jatuh_tempo]" value="'.$data['detail_jatuh_tempo'].'" />
							</td>
							<td>
								'.convert_rupiah($data['detail_total']).'
								<input type="hidden" name="detail['.$i.'][total]" value="'.$data['detail_total'].'" />
							</td>
							<td align="center">
								<a href="Javascript:remove_detail('.$i.')">Batal</a>
							</td>
						</tr>';
			$i++;
	 /*	} */
	}
	
	function remove_detail($id)
	{
		if (isset($_POST['detail']))
		{
			$detail = $_POST['detail'];
			$count_detail = count($detail);
			
			$i=0;
			for($x=0; $x<$count_detail; $x++)
			{
				if($id != $x){
					echo '
							<tr>
								<td>'.($i + 1).'</td>
								<td>
									'.$detail[$i]['nama_barang'].'
									<input type="hidden" name="detail['.$i.'][nama_barang]" value="'.$detail[$i]['nama_barang'].'" />
									<input type="hidden" name="detail['.$i.'][id_barang]" id="detail_idbarang'.$i.'" value="'.$detail[$i]['id_barang'].'" />									<input type="hidden" name="detail['.$i.'][id_jenis]" id="detail_idjenis'.$i.'" value="'.$detail[$i]['id_jenis'].'" />
								</td>
								<td>
									'.convert_rupiah($detail[$i]['harga']).'
									<input type="hidden" name="detail['.$i.'][harga]" value="'.$detail[$i]['harga'].'" />
									<input type="hidden" name="detail['.$i.'][total]" value="'.$detail[$i]['total'].'" />
								</td>
								<td>
									'.convert_rupiah($detail[$i]['harga_toko']).'
									<input type="hidden" name="detail['.$i.'][harga_toko]" value="'.$detail[$i]['harga_toko'].'" />
								</td>
								<td>
									'.convert_rupiah($detail[$i]['harga_partai']).'
									<input type="hidden" name="detail['.$i.'][harga_partai]" value="'.$detail[$i]['harga_partai'].'" />
								</td>
								<td>
									'.convert_rupiah($detail[$i]['harga_cabang']).'
									<input type="hidden" name="detail['.$i.'][harga_cabang]" value="'.$detail[$i]['harga_cabang'].'" />
								</td>
								<td>
									<input type="text" name="detail['.$i.'][sn]" id="detail_sn'.$i.'" value="'.$detail[$i]['sn'].'" />
								</td>
								<td>
									1
									<input type="hidden" name="detail['.$i.'][qty]" value="1" />
								</td>
								<td>
									'.$detail[$i]['jatuh_tempo'].'
									<input type="hidden" name="detail['.$i.'][jatuh_tempo]" value="'.$detail[$i]['jatuh_tempo'].'" />
								</td>
								<td align="center">
									<a href="Javascript:remove_detail('.$i.')">Batal</a>
								</td>
							</tr>';
					$i++;
				}
			}
		}
	}
	function add_detail_sn() // pas add hp sn	
	{		
		$data['detail_idbarang'] 		= $_POST['detail_idbarang'];
		$data['detail_namabarang'] 		= $_POST['detail_namabarang'];		
		$data['detail_harga']	 		= $_POST['detail_harga'];				
		$data['detail_idjenis']	 		= $_POST['detail_idjenis'];		
		$data['detail_harga_toko'] 		= $_POST['detail_harga_toko'];		
		$data['detail_harga_partai'] 	= $_POST['detail_harga_partai'];		
		$data['detail_harga_cabang'] 	= $_POST['detail_harga_cabang'];		
		$data['detail_qty'] 			= $_POST['detail_qty'];		
		$data['detail_jatuh_tempo'] 	= $_POST['detail_jatuh_tempo'];		
		$data['detail_total'] 			= $data['detail_harga']; 
		//* $data['detail_qty'];				
		$i=0;				
		//print_r($detail);				
		if (isset($_POST['detail']))		
		{			
		$detail = $_POST['detail'];			
		$count_detail = count($detail);					
		for($i=0; $i<$count_detail; $i++)			
		{				
		echo '						
		<tr>							
		<td>'.($i + 1).'</td>							
		<td>								
		'.$detail[$i]['nama_barang'].'								
		<input type="hidden" name="detail['.$i.'][nama_barang]" value="'.$detail[$i]['nama_barang'].'" />								
		<input type="hidden" name="detail['.$i.'][id_barang]" id="detail_idbarang'.$i.'" value="'.$detail[$i]['id_barang'].'" />								
		<input type="hidden" name="detail['.$i.'][id_jenis]" id="detail_idjenis'.$i.'" value="'.$detail[$i]['id_jenis'].'" />							
		</td>							
		<td>								
		'.convert_rupiah($detail[$i]['harga']).'								
		<input type="hidden" name="detail['.$i.'][harga]" value="'.$detail[$i]['harga'].'" />								
		<input type="hidden" name="detail['.$i.'][total]" value="'.$detail[$i]['total'].'" />							
		</td>							
		<td>								
		'.convert_rupiah($detail[$i]['harga_toko']).'								
		<input type="hidden" name="detail['.$i.'][harga_toko]" value="'.$detail[$i]['harga_toko'].'" />							
		</td>							
		<td>								
		'.convert_rupiah($detail[$i]['harga_partai']).'								
		<input type="hidden" name="detail['.$i.'][harga_partai]" value="'.$detail[$i]['harga_partai'].'" />							
		</td>							
		<td>								
		'.convert_rupiah($detail[$i]['harga_cabang']).'								
		<input type="hidden" name="detail['.$i.'][harga_cabang]" value="'.$detail[$i]['harga_cabang'].'" />							
		</td>							
		<td>								
		<input class="tblInput" id="detail2_sn'.$i.'" type="text" name="detail['.$i.'][sn]" value="'.$detail[$i]['sn'].'" />							
		</td>							
		<td>																
		1								
		<input type="hidden" name="detail['.$i.'][qty]" value="1" />							
		</td>							
		<td>								
		'.$detail[$i]['jatuh_tempo'].'								
		<input type="hidden" name="detail['.$i.'][jatuh_tempo]" value="'.$detail[$i]['jatuh_tempo'].'" />							
		</td>																					
		<td align="center">								
		<a href="Javascript:remove_detail('.$i.')">Batal</a>							
		</td>						
		</tr>';			
		}		
		}				
		$xx=0;		
		for($xx=0; $xx < $data['detail_qty']; $xx++){ 			
		echo '						
		<tr>							
		<td>'.($i + 1).'</td>							
		<td>								
		'.$data['detail_namabarang'].'								
		<input type="hidden" name="detail['.$i.'][nama_barang]" value="'.$data['detail_namabarang'].'" />								
		<input type="hidden" name="detail['.$i.'][id_barang]" id="detail_idbarang'.$i.'" value="'.$data['detail_idbarang'].'" />								
		<input type="hidden" name="detail['.$i.'][id_jenis]" id="detail_idjenis'.$i.'" value="'.$data['detail_idjenis'].'" />							
		</td>							
		<td>								
		'.convert_rupiah($data['detail_harga']).'								
		<input type="hidden" name="detail['.$i.'][harga]" value="'.$data['detail_harga'].'" />								
		<input type="hidden" name="detail['.$i.'][total]" value="'.$data['detail_total'].'" />							
		</td>							
		<td>								
		'.convert_rupiah($data['detail_harga_toko']).'								
		<input type="hidden" name="detail['.$i.'][harga_toko]" value="'.$data['detail_harga_toko'].'" />							
		</td>							
		<td>								
		'.convert_rupiah($data['detail_harga_partai']).'								
		<input type="hidden" name="detail['.$i.'][harga_partai]" value="'.$data['detail_harga_partai'].'" />							
		</td>							
		<td>								
		'.convert_rupiah($data['detail_harga_cabang']).'								
		<input type="hidden" name="detail['.$i.'][harga_cabang]" value="'.$data['detail_harga_cabang'].'" />							
		</td>							
		<td>								
		<input type="text"  name="detail['.$i.'][sn]" id="detail_sn2'.$i.'" value=""  />							
		</td>							
		<td>								
		1								
		<input type="hidden" name="detail['.$i.'][qty]" value="1" />							
		</td>							
		<td>								
		'.$data['detail_jatuh_tempo'].'								
		<input type="hidden" name="detail['.$i.'][jatuh_tempo]" value="'.$data['detail_jatuh_tempo'].'" />							
		</td>																					
		<td align="center">								
		<a href="Javascript:remove_detail('.$i.')">Batal</a>							
		</td>						
		</tr>';			
		$i++;		
		} 			
		}
	$command = $_GET['command'];	
	if($command == 'add_1')
	{
		add_detail_1($_POST['diskon']);
	
	}else if($command == 'add_2')
	{
		add_detail_2();
	
	}else if($command == 'remove')
	{
		$id = $_GET['id'];
		remove_detail($id);
		
	}else if($command == 'change_total')
	{
		echo convert_rupiah($_GET['total']);
	}		else if($command == 'add_sn')	{		add_detail_sn();	}
	else if($command == 'add_3')
	{
		add_detail_3($_POST['detail_qty'],$_POST['diskon']);
	}
	else if ($command = 'convert')
	{
		//print convert_rupiah($_GET['sum']);
		print convert_rupiah($_POST['sum']);
	}
?>