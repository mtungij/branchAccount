<?php include 'incs/header.php'; ?>
<?php include 'incs/side.php'; ?>

<div id="main-container">

<div class="padding-md">
<div class="row">
<?php if ($das = $this->session->flashdata('massage')): ?>
<div class="row">
<div class="col-md-12">
<div class="alert alert-dismisible alert-success">
<a href="" class="close">&times;</a>
<?php echo $das;?>
</div>
</div>
</div>
<?php endif; ?>
<div class="col-md-2"></div>
<div class="col-md-8">
	<div class="panel panel-default">
		
			<?php echo form_open("admin/create_region",['class'=>'no-margin','id'=>'ormValidate2','data-validate'=>'parsley','novalidate']) ?>
			<div class="panel-heading">
			Region Form
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label">Region name</label>
							<input type="text" name="region_name" placeholder="Region name" autocomplete="off" class="form-control input-sm" data-required="true">
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			
			</div>
			<div class="panel-footer text-right">
				<button class="btn btn-primary" type="submit">Save</button>
				<button class="btn btn-danger" type="reset">Clear</button>
			</div>
	<?php echo form_close(); ?>
	</div><!-- /panel -->
</div><!-- /.col-->
<div class="col-md-2"></div>
</div><!-- /.row -->

<div class="panel panel-default table-responsive">
<div class="panel-heading">
Region List
</div>
<div class="padding-md clearfix">
<table class="table table-striped" id="dataTable">
	<thead>
		<tr>
			<th>No</th>
			<th>Region Name</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		  <?php foreach ($region as $regions): ?>
		<tr>
			<td><?php echo $no++; ?>.</td>
			<td><?php echo $regions->region_name; ?></td>
			<td>
				<a href="" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
				<a href="" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash-o" onclick="return confirm('Are you sure?')"></i></a>
			</td>
		</tr>
		 <?php endforeach; ?>
	</tbody>
</table>
</div><!-- /.padding-md -->
</div><!-- /panel -->

</div><!-- /.padding-md -->
</div><!-- /main-container -->
</div><!-- /wrapper -->


<?php include 'incs/footer_2.php'; ?>
