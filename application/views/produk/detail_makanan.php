
<?php if (isset($menu)) { ?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Makanan</h3>
<a class="btn" href="<?php echo base_url(); ?>Menu"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

				
	<table class="table">
		<tr>
			<td>Nama</td>
			<td>: <?php echo $menu->nama_makanan; ?></td>
		</tr>
		<tr>
			<td>Kategori</td>
			<td>: <?php echo $menu->kategori; ?></td>
		</tr>
		<tr>
			<td>Satuan</td>
			<td>: <?php echo $menu->satuan; ?></td>
		</tr>
		<tr>
			<td>Harga</td>
			<td>: Rp.<?php echo number_format($menu->harga); ?>,-</td>
		</tr>
	
		<tr>
			<td>Gambar</td>
			<td>: 
			<img style="width: 150px; height: 150px;" src="<?php echo base_url(); ?>assets/img/<?php echo $menu->gambar; ?>">
			</td>
		</tr>
	</table>
	<?php } ?>