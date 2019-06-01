

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Orderan</h3>



<div class="col-md-12" >
	
</div>

<?php 
	if ($cart =$this->cart->contents()) {
?>
<br>
	
	<form action="<?php echo base_url(); ?>Menu/update_orderan" method="post" name="" id="" enctype="multipart/form-data">
	
<table class="table table-hover" style="margin-top: 10px;">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-2">Gambar</th>
		<th class="col-md-2">Nama Makanan</th>
		<th class="col-md-1">Qty</th>
		<th class="col-md-2">Harga</th>
		<th class="col-md-2">Total</th>
		<th class="col-md-">Opsi</th>
	</tr>
	<?php 
		$grand_total=0;
		$jumlahqty=0;
		$i=1; 
			
			foreach ($cart as $item) {
			$grand_total = $grand_total + $item['subtotal'];
			$jumlahqty = $jumlahqty+$item['qty'];
									
	?>
	
	
	<input type="hidden" name="cart[<?php echo $item['id']; ?>][id]" value="<?php echo $item['id']; ?>">
	<input type="hidden" name="cart[<?php echo $item['id']; ?>][rowid]" value="<?php echo $item['rowid']; ?>">
	<input type="hidden" name="cart[<?php echo $item['id']; ?>][name]" value="<?php echo $item['name']; ?>">
	<input type="hidden" name="cart[<?php echo $item['id']; ?>][price]" value="<?php echo $item['price']; ?>">
	<input type="hidden" name="cart[<?php echo $item['id']; ?>][gambar]" value="<?php echo $item['gambar']; ?>">
	<input type="hidden" name="cart[<?php echo $item['id']; ?>]['qty']" value="<?php echo $item['qty']; ?>">
							
	<tr >
		<td class="align-center"><?php echo $i++; ?></td>
		<td>
			<div>
				<img src="<?php echo base_url() . 'assets/img/' . $item['gambar']; ?>" style="width: 50px; height: 50px; ">
			</div>
		</td>
		<td><?php echo $item["name"]; ?></td>
		<td>
			<input type="number" min="1" max="10" class="form-control input-sm botol" name="cart[<?php echo $item['id']; ?>][qty]" value="<?php echo $item['qty']; ?>">
		</td>	
		<td>Rp. <?php echo number_format($item["price"],0,",","."); ?></td>
		<td>Rp. <?php echo number_format($item["subtotal"],0) ?></td>
		<td>
			<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='<?php echo base_url(); ?>Menu/hapusdatapesanan/<?php echo $item["rowid"]; ?>' }" class="btn btn-danger">x</a>
		</td>
		
	</tr>

	
	
	<?php } ?>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td colspan="2"><b> Yang harus dibayar :</b></td>
		<td>			
			 Rp. <?php echo number_format($grand_total,0,",","."); ?>
		</td>
		<td></td>

	</tr>
	<tr>
		
		<td></td>
		<td colspan="3">
			<a href="<?php echo base_url(); ?>Menu" class="btn btn-sm btn-warning" type="submit" style="height: 50px; width: 140px; padding-top: 12px; ">Tambah Pesanan</a>
			<button class="btn btn-sm btn-success" type="submit" style="height: 50px; width: 120px;">Update Pesanan</button>
			<a href="<?php echo base_url(); ?>Menu/chekoutfunction" class="btn btn-sm btn-primary" type="submit" style="height: 50px; width: 145px; padding-top: 12px;">Buat Pesanan</a>
		</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	</form>
</table>
</form>	
	<?php
		} else {
			echo"<div class='alert alert-info atas'><strong>Data Pesanan Anda Kosong</strong> Silahkan kembali ke Menu Makanan 
			</div>";
		}
	?>


<!-- modal input -->
