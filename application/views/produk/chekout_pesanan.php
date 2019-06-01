<?php 
	if (!$this->session->has_userdata('uname')) {
		redirect(base_url() . "admin/index");
	}
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Pemesanan Sederhana</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui/jquery-ui.js"></script>	
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/sweetalert2.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dataflas.js"></script>

	<!-- main css -->

	
</head>
<body>
	<div class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="http://www.malasngoding.com" class="navbar-brand">Restaurant</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse">				
				<ul class="nav navbar-nav navbar-right">
					<li><a id="pesan_sedia" href="#" data-toggle="modal" data-target="#modalpesan"><span class='glyphicon glyphicon-comment'></span>  Pesan</a></li>
					<li><a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#"><span class="glyphicon glyphicon-user"><?php if($this->session->has_userdata("uname")) { ?> <?php echo $this->session->userdata("uname") ?><?php } ?></span> </a></li>
				</ul>
			</div>
		</div>
	</div>

	<!-- modal input -->
	<div id="modalpesan" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Pesan Notification</h4>
				</div>
				<div class="modal-body">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>						
				</div>
				
			</div>
		</div>
	</div>

	<div class="col-md-2">
		<div class="row">
			
		</div>

		<div class="row"></div>
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="<?php echo base_url(); ?>Home"><span class="glyphicon glyphicon-home"></span>  Dashboard</a></li>			
			<li><a href="<?php echo base_url(); ?>Menu"><span class="glyphicon glyphicon-briefcase"></span>  Daftar Menu</a></li>

			<li ><a href="<?php echo base_url(); ?>Menu/data_order">
				<?php
					$cart = $this->cart->contents();
					$jumlahqty =0;
					foreach ($cart as $item) {
					$jumlahqty = $jumlahqty + $item['qty'];
				?>
				<?php } ?>
				<span style="color: white; margin-left: 100px; margin-top: 14px; background-color: red;
					font-size: 12px;width: 18px; height: 17px; text-align: center;position: absolute;top: -2px;border-radius: 60%; " ><?php echo $jumlahqty; ?>
				</span>
				<span class="glyphicon glyphicon-briefcase" style="font-size: 16px;">Pesanan</span></a></li>        												
			
			
			<li><a href="<?php echo base_url(); ?>admin/logout"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>			
		</ul>
	</div>
	<div class="col-md-10">
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
	<?php if ($this->session->flashdata('flash')) : ?>

	<?php endif; ?>
<section class="checkout_area section_gap=">
		<div class="container">
		
			<div class="billing_details">
				<div class="row" >
					
					<div class="col-lg-6">
						<div class="order_box" style="margin-top: 20px; ">
							
							<h2>Daftar Belanja</h2>
						<form action="<?php echo base_url(); ?>Menu/simpan_pesanan" method="get" >
							<input type="hidden" name="no_order" id="no_order" class="form-control ">
							<td>No Bangku :</td>
							<td><input type="number" name="no_bangku" id="no_bangku" class="form-control " style="width: 50px;" required=""></td>
							
							<table class="table table-hover">
							<tr>
								<th class="col-md-1">No</th>
								<th class="col-md-2">Nama</th>
								<th class="col-md-2">Qty</th>
								<th class="col-md-2">Harga</th>
								
							</tr>
							<?php if ($cart = $this->cart->contents()) { ?>
							<?php 
								// var_dump($cart); exit;
								$grandtotal=0;
								$jumlahqty=0;
								$i=1;

								foreach ($cart as $item) {
									$grandtotal = $grandtotal + $item['subtotal'];
									$jumlahqty = $jumlahqty+$item['qty'];
								
							?>
							<input type="hidden" name="total_harga"  id="total_harga" value="<?php echo number_format($grandtotal,0,",","."); ?>" class="form-control">
								<tr>
									<td><?php echo $i++; ?></td>
									<td><?php echo $item['name']; ?></td>
									<td><?php echo $item['qty']; ?></td>
									<td>Rp. <?php echo number_format($item['subtotal'],0,",","."); ?></td>
									
								</tr>

								
													
							<?php
								}
							?>
								<tr style="margin-top: 30px;">
									<td></td>
									
									<td>Total Harga</td>
									<td>:</td>
									<td type="hidden" name="total" id="total">Rp. <?php echo number_format($grandtotal,0,",","."); ?></td>
								</tr>
							
							<?php } else {
							echo "<div class='alert alert-info atas'><strong>Data Keranjang </strong>Masih kosong.</div>";
							} ?>
							
						</div>
						</table>
						
						<div class="form-group" style="margin-top: 10px; float: right;">
							<button type="submit" class='main_btn btn btn-primary'>Simpan Pesanan</button>
						</div>

					</div>
				</div>
			</div>
		</div>
		</form>
	</section>