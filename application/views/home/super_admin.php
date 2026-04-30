<?php include 'incs/header.php'; ?>
  <body>
  	  <style>
body {
  background-image: url('<?php //echo base_url(); ?>assets/img/shop.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
}
</style>
	<div class="login-wrapper">
		<div class="text-center">
			<h2 class="" style="font-weight:bold">
		<span class="text-success">Super User</span> <span style="color:#ccc; text-shadow:0 1px #fff"></span>
			</h2>
	    </div>

		<div class="container">
		<div class="col-md-4"></div>
		<div class="col-md-4">	
			<div class="panel panel-default">
				<div class="panel-heading">
					<?php if ($das = $this->session->flashdata('massage')): ?>
<div class="row">
<div class="col-md-12">
<div class="alert alert-dismisible alert-danger">
<a href="" class="close">&times;</a>
<?php echo $das;?>
</div>
</div>
</div>
<?php endif; ?>
	<?php if ($das = $this->session->flashdata('mass')): ?>
<div class="row">
<div class="col-md-12">
<div class="alert alert-dismisible alert-danger">
<a href="" class="close">&times;</a>
<?php echo $das;?>
</div>
</div>
</div>
<?php endif; ?>
				</div>
				<div class="panel-body">
						<?php echo form_open("welcome/super_signin",['class'=>'form-login']) ?>
						<div class="form-group">
							<label>Email</label>
							<input type="email" placeholder="Enter Email" name="email" class="form-control input-lg " required  autocomplete="off">
							<?php echo form_error("email") ?>
						</div>
						
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" placeholder="******" class="form-control input-lg" autocomplete="off" required >
							  <?php echo form_error("password"); ?>
						</div>
					
						<div class="text-center">
							<button type="submit" class="btn btn-success">Login</button> 
							<!-- <a href="<?php //echo base_url("welcome/forgot_password"); ?>" class="btn btn-primary btn-sm">Forgot password</a> -->
						</div>
					<?php echo form_close(); ?>

				</div>
			</div><!-- /panel -->
			</div>
			<div class="col-md-4"></div>
		</div><!-- /login-widget -->
	</div><!-- /login-wrapper -->
	
<?php include 'incs/footer.php'; ?>
