

<h3><span class="glyphicon glyphicon-briefcase"></span>  Daftar Menu</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Menu</button>
<br/>
<br/>


<div class="col-md-12">
	
</div>

<form action="<?php echo base_url(); ?>Menu/caridata" method="get" enctype="multipart/form-data">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari menu di sini .." aria-describedby="basic-addon1" id="keyword" name="keyword">	
	</div>
</form>	
<br/>


<table class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-2">Gambar</th>
		<th class="col-md-2">Nama</th>
		
		<th class="col-md-2">Harga Jual</th>
		<th class="col-md-1">Status</th>
		<!-- <th class="col-md-1">Sisa</th>		 -->
		<th class="col-md-3">Opsi</th>
	</tr>
	<?php if (count($menu)>0) { ?>
	
	<?php 

		$i = 1;
		foreach ($menu as $item) { ?>
	<form action="<?php echo base_url(); ?>Menu/order" method="post" enctype="multipart/form-data" role="form">
		<fieldset>
			<input type="hidden" name="id" value="<?php echo $item['id']; ?>">
			<input type="hidden" name="nama_makanan" value="<?php echo $item['nama_makanan']; ?>">
			<input type="hidden" name="kategori" value="<?php echo $item['kategori']; ?>">
			<input type="hidden" name="satuan" value="<?php echo $item['satuan']; ?>">
			<input type="hidden" name="harga" value="<?php echo $item['harga']; ?>">
			<input type="hidden" name="qty" value="1">
			<input type="hidden" name="status" value="<?php echo $item['status']; ?>">
			<input type="hidden" name="gambar" value="<?php echo $item['gambar']; ?>">
			<input type="hidden" name="submit" value="Add To Cart" class="button">
		</fieldset>	
	<tr >
		<td class="align-center"><?php echo $i++; ?></td>
		<td>
			<div>
				<img src="<?php echo base_url() . 'assets/img/' . $item['gambar']; ?>" style="width: 50px; height: 50px; ">
			</div>
		</td>
		<td><?php echo $item["nama_makanan"]; ?></td>

		<td><?php echo $item["harga"]; ?></td>
		
		
		<td><?php echo $item["status"]; ?></td>
		
		
		
		<td>
			<a href="<?php echo base_url(); ?>Menu/detail_makanan/<?php echo $item["id"]; ?>" class="btn btn-info">Detail</a>
			<a href="<?php echo base_url(); ?>Menu/edit_produk/<?php echo $item["id"]; ?>" class="btn btn-warning">Edit</a>
			<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='<?php echo base_url(); ?>Menu/hapus/<?php echo $item["id"]; ?>' }" class="btn btn-danger">Hapus</a>

			<button type="submit" class="btn btn-success" <?php if ($item['status']=='kosong') { ?> disabled <?php } ?> ><span class="glyphicon glyphicon-plus" ></span>  Order</button>
		</td>
	</tr>
	</form>
	
	<?php } } else {
		echo "<div class='alert alert-info' role='alert'>Produk yang anda cari tidak tersedia</div>";
	}
	?>
	<tr>
		<td colspan="4"></td>
		<td>			
		
		</td>
	</tr>
	
</table>


<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Menu Baru</h4>
			</div>
			<div class="modal-body">
				<form action="<?php echo base_url(); ?>Menu/simpan_data_makanan" method="post" enctype="multipart/form-data" id="myform">
					<div class="form-group">
						<label>Nama Makanan</label>
						<input name="nama_makanan" type="text" class="form-control" placeholder="Nama Makanan .." required="">
					</div>
					<div class="form-group">
						<label>Kategori</label>
						<select class="form-control" name="kategori" required="">
							<option Value=''>-- Pilih --</option>
							<option Value="makanan">makanan</option>
							<option Value="minuman">minuman</option>
						</select>
					
					</div>
					<div class="form-group">
						<label>Satuan</label>
						<select class="form-control" name="satuan" required="">
							<option value="">-- Pilih --</option>
							<option value="porsi">porsi</option>
							<option value="gelas">gelas</option>
						</select>
						
					</div>
					<div class="form-group">
						<label>Harga</label>
						<input name="harga" type="text" class="form-control" placeholder="Harga .." required="">
					</div>
					<div class="form-group">
						<label>Status</label>
						<select class="form-control" name="status" required="">
							<option value="">-- Pilih --</option>
							<option value="ready">ready</option>
							<option value="kosong">kosong</option>
						</select>
						
					</div>
					<div class="form-group">
						<label>Gambar</label>
						<input name="gambar" type="file" class="form-control" placeholder="Upload gambar disini .." id="exampleInputFile">
					</div>	
																						

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary" value="simpan">
				</div>
			</form>
		</div>
	</div>
</div>