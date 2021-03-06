<script type="text/javascript" >
		function check_all()
		{
			var cIdx = 'id'; //manggil id chekbok	
			for (var i=0;i < document.table_form.elements.length;i++)
			{
				var e = document.table_form.elements[i];
				if ((e.id == 'id') && (e.type=='checkbox'))
				{
					e.checked = 'checked';
				}
			}
		}
		
		function uncheck_all()
		{
			var cIdx = 'id'; //manggil id chekbok	
			for (var i=0;i < document.table_form.elements.length;i++)
			{
				var e = document.table_form.elements[i];
				if ((e.id == 'id') && (e.type=='checkbox'))
				{
					e.checked = '';
				}
			}
		}
		
</script>

<section class="grid_12">
	<div class="block-border">
		<form class="block-content form" name="table_form" id="table_form" method="post" action="">
			<h1>Penjualan > Data Service</h1>
			
			<div class="block-controls">
				
				<ul class="controls-buttons">
					<?php echo $this->pagination->create_links(); ?>
					<li class="sep"></li>
					<li><?
							if ($can_insert == TRUE){
								echo anchor('service/insert', 'Tambah Data');
							}
						?></li>
				</ul>
				
			</div>
		
			<div class="no-margin"><table class="table" cellspacing="0" width="100%">
			
				<thead>
					<tr>
						<!--<th align="left" valign="top" scope="col">&nbsp;</th>-->
						<th align="left" valign="top" scope="col">Nama Pelanggan</th>
						<th align="left" valign="top" scope="col">Nama Barang</th>
						<th align="left" valign="top" scope="col">Tanggal</th>
						<th align="left" valign="top" scope="col">Kerusakan</th>
						<th align="left" valign="top" scope="col">Total Bayar</th>
						<th align="left" valign="top" scope="col">Status</th>		
						<th align="left" valign="top" scope="col">Aksi</th>
					</tr>
				</thead>
				
				<tbody>
					
					<?php foreach($results->result() as $row) {?>
					<tr>
						<!--<td align="left" valign="top"><input name="id[]" id="id" value="<?=$row->id_service?>" type="checkbox" /></td>-->
						<td align="left" valign="top"><?=$row->nama_pelanggan?> </td>
						<td align="left" valign="top"><?=$row->nama_barang?> </td>
						<td align="left" valign="top">
							<?php 
							 	$date =  $row->tanggal;
							 	$tgl = explode("-",$row->tanggal)[2];
							 	$bln = explode("-",$row->tanggal)[1];
							 	$thn = explode("-",$row->tanggal)[0];

							 	print $tgl.'-'.$bln.'-'.$thn;
							?> 
						</td>
						<td align="left" valign="top"><?=$row->kerusakan?> </td>
						<td align="left" valign="top"><?=convert_rupiah($row->total_bayar)?> </td>
						<td align="left" valign="top"><?=$row->deskripsi?> </td>		
						<td align="left" valign="top" class="table-actions">
							<?php																if ($can_update == TRUE){									echo anchor('service/bayar/'.$row->id_service, '<img src="'.base_url().'asset/admin/images/icons/fugue/payment-icon.png" width="16" height="16">', array('class'=>'with-tip', 'title'=>'Bayar'));								}																?>								&nbsp; 								<?php
								if ($can_update == TRUE){
									echo anchor('service/update/'.$row->id_service, '<img src="'.base_url().'asset/admin/images/icons/fugue/pencil.png" width="16" height="16">', array('class'=>'with-tip', 'title'=>'Edit'));
								}
								?>								&nbsp; 								<?php	
								if ($can_delete == TRUE){
									echo anchor('service/delete/'.$row->id_service, '<img src="'.base_url().'asset/admin/images/icons/fugue/cross-circle.png" width="16" height="16">', array('class'=>'with-tip', 'title'=>'Edit', 'onclick'=>"return confirm('Anda yakin akan menghapus data ini?')"));
								}
							?>
						</td>
					</tr>
					<?php } ?>
					
				</tbody>
			
			</table></div>
			
			<ul class="message no-margin">
				&nbsp;<!--<li>Results x - y out of z</li>-->
			</ul>
			
			<div class="block-footer">
				
				<img src="images/icons/fugue/arrow-curve-000-left.png" width="16" height="16" class="picto"> 
				<a href="javascript:void(0)" class="button" onClick="check_all(0)" >Select All</a> 
				<a href="javascript:void(0)" class="button" onClick="uncheck_all(0)" >Unselect All</a>
				<span class="sep"></span>
				<?=anchor('service/insert', 'Tambah Data', array('class'=>'button'))?>
				<span class="sep"></span>
				<select name="table-action" id="table-action" class="small">
					<option value="">Action for selected...</option>
					<option value="validate">Validate</option>
					<option value="delete">Delete</option>
				</select>
				<button type="submit" class="small">Ok</button>
			</div>
				
		</form>
	</div>
</section>