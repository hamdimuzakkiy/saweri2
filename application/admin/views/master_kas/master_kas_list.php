<section class="grid_12">
	<div class="block-border">
		<form class="block-content form"  name="table_form" id="table_form" method="post" action="">
			<h1>Piutang > Master Piutang</h1>
			
			<div class="block-controls">								<ul class="controls-buttons">					<?php echo $this->pagination->create_links(); ?>					<li class="sep"></li>					<li><?							if ($can_insert == TRUE){								echo anchor('master_piutang/insert', 'Tambah Data');							}						?></li>				</ul>							</div>
		
			<div class="no-margin"><table class="table" cellspacing="0" width="100%">
			
				<thead>
					<tr>
						<th align="left" valign="top" scope="col">Kode</th>
						<th align="left" valign="top" scope="col">Nama</th>
						<th align="left" valign="top" scope="col">Saldo</th>
						<th align="left" valign="top" scope="col">Aksi</th>
						
						<!--<th align="left" valign="top" scope="col">Saldo</th>-->
					</tr>
				</thead>
				
				<tbody>
					
					<?php foreach($results->result() as $row) {?>
					<tr>
						<td align="left" valign="top"><?=$row->kode?> </td>
						<td align="left" valign="top"><?=$row->nama?> </td>
						<td align="left" valign="top"><?=$row->saldo?> </td>
						<td  align="left" valign="top" class="table-actions">
						<?php
								if ($can_update == TRUE){
									echo anchor('master_kas/update/'.$row->kode, '<img src="'.base_url().'asset/admin/images/icons/fugue/pencil.png" width="16" height="16">', array('class'=>'with-tip', 'title'=>'Edit'));
								}
								
								if ($can_delete == TRUE){
									echo anchor('master_kas/delete/'.$row->kode, '<img src="'.base_url().'asset/admin/images/icons/fugue/cross-circle.png" width="16" height="16">', array('class'=>'with-tip', 'title'=>'Edit', 'onclick'=>"return confirm('Anda yakin akan menghapus data ini?')"));
								}
							?>
						</td>
						<!--<td align="left" valign="top"><?=$row->tanggal?> </td>-->						
					</tr>
					<?php } ?>
					
				</tbody>
			
			</table></div>
			
			<ul class="message no-margin">
				<li>&nbsp;</li>
			</ul>
			
			<div class="block-footer">
				
				<img src="images/icons/fugue/arrow-curve-000-left.png" width="16" height="16" class="picto"> 
				<a href="javascript:void(0)" class="button" onClick="check_all(0)" >Select All</a> 
				<a href="javascript:void(0)" class="button" onClick="uncheck_all(0)" >Unselect All</a>
				<span class="sep"></span>
				<?=anchor('master_kas/insert', 'Tambah Data', array('class'=>'button'))?>
				<span class="sep"></span>
				<select name="table-action" id="table-action" class="small">
					<option value="">Aksi</option>
					<option value="validate">Validasi</option>
					<option value="delete">Hapus</option>
				</select>
				<button type="submit" class="small">Ok</button>
			</div>

		</form>
	</div>
</section>