<script type="text/javascript">

	

	function batal(){

		document.location.href = '<?=base_url().'index.php/setting_kode_trans'?>';

	}

	

</script>



	<?php 

		if(validation_errors())

		{

	?>

			<ul class="message error grid_12">

				<li><?=validation_errors()?></li>

				<li class="close-bt"></li>

			</ul>	

	<?php

		} 

	?>



<section class="grid_12">

	<div class="block-border">

		<?php
		
			$attributes = array('name' => 'form1', 'id' => 'form1', 'class'=>'block-content form');

			echo form_open('setting_kode_trans/process_update', $attributes);
			
		

		?>
			<h1>Master > Edit Kode Transaksi</h1>
			<?php /* if($error!=null) echo $error; else echo ''; */?>
			

			<fieldset>

				

				<input type="hidden" name="id" value="<?=$id;?>">
				
				<div class="columns">
					<p class="colx2-left">

						<label for="complex-en-url">Nama Transaksi :</label>

						<span class="relative">

							<?php 
								
								if (form_error('transaksi') != null)

								{

									echo '<input type="text" name="transaksi" id="transaksi"  value="'.set_value('transaksi').'" readonly="true" class="duapertiga-width">';

								}else

								{ 

									echo '<input type="text" name="transaksi" id="transaksi" readonly="true" value="'.$transaksi.'" class="duapertiga-width">';

								}

							?>

						</span>

					</p>
				</div>
				
				
				<div class="columns">
					<p class="colx2-left">

						<label for="complex-en-url">Kode Transaksi (*) :</label>

						<span class="relative">

							<?php 
								
								if (form_error('kd_trans') != null)

								{

									echo '<input type="text" name="kd_trans" id="kd_trans"  value="'.set_value('kd_trans').'" class="duapertiga-width">';

								}else

								{ 

									echo '<input type="text" name="kd_trans" id="kd_trans" value="'.$kd_trans.'" class="duapertiga-width">';

								}

							?>

						</span>

					</p>
				</div>
				
				
				
			

				

				<p><i> Field yang diberi tanda (*) harus di isi ! </i></p>

				

			</fieldset>

				

			<div id="tab-settings" class="tabs-content">

					<button type="submit"><img src="<?=base_url()?>asset/admin/images/icons/fugue/tick-circle.png" width="16" height="16"> Simpan</button>

					<button type="button" onclick="javascript:batal();" class="red">Batal</button> 	

			</div>

			

		</form>

	</div>

</section>