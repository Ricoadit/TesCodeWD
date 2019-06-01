
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Menu Makanan</h3>
<a class="btn" href="<?php echo base_url(); ?>Menu"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
					
	<form action="<?php echo base_url(); ?>Menu/edit_data_makanan/<?php echo $menu["id"]; ?>" method="post" enctype="multipart/form-data">
		<table class="table">
			
				
			<input type="hidden" name="id" value="<?php echo $menu["id"]; ?>">
			
			<tr>
				<td>Nama Makanan</td>
				<td><input type="text" class="form-control" name="nama_makanan" value="<?php echo $menu["nama_makanan"]; ?>"></td>
			</tr>
			<tr>
				<td>Kategori</td>
				<td><select class="form-control" type="text" name="kategori" >
						<option><?php echo $menu["kategori"]; ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Satuan</td>
				<td><select class="form-control" type="text" name="satuan">
						<option><?php echo $menu["satuan"]; ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Harga</td>
				<td><input type="text" class="form-control" name="harga" value="<?php echo $menu["harga"]; ?>"></td>
			</tr>
			<tr>
				<td>Status</td>
				<td><select class="form-control" type="text" name="status" >
						<option><?php echo $menu["status"]; ?></option>
						<option value="ready">Ready</option>
						<option value="kosong">Kosong</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Gambar</td>
				<td>
					<img src="<?php echo base_url(); ?>assets/img/<?php echo $menu["gambar"]; ?>" width="50px;" height="50px;">
					<input type="hidden" name="gambar_old" value="<?php echo $menu["gambar"]; ?>">
					<input type="file" class="form-control" name="gambar" value="">
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="simpan"></td>
			</tr>
		</table>
		
	</form>
	