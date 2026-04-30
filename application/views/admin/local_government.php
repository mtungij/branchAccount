<?php include('incs/header_1.php'); ?>
<?php include('incs/side_1.php'); ?>
<?php include('incs/subheader.php'); ?>

<style>
    .select2-container .select2-selection--single{
    height:37px !important;
}
.select2-container--default .select2-selection--single{
         border: 1px solid #ccc !important; 
     border-radius: 0px !important; 
}
</style>


<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">					
<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
   
</div>
<!-- end:: Subheader -->										
<!-- begin:: Content -->
<!-- begin:: Content -->


<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
	<!--begin::Portlet-->
	<?php if ($das = $this->session->flashdata('massage')): ?>
	  <div class="alert alert-success fade show alert-success" role="alert">
                            <div class="alert-icon"><i class="flaticon2-check-mark"></i></div>
                            <div class="alert-text"><?php echo $das;?></div>
                            <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="la la-close"></i></span>
                                </button>
                            </div>
                  </div>
         <?php endif; ?>

         <?php if ($das = $this->session->flashdata('mass')): ?>
	  <div class="alert alert-danger fade show alert-danger" role="alert">
                            <div class="alert-icon"><i class="flaticon2-delete"></i></div>
                            <div class="alert-text"><?php echo $das;?></div>
                            <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="la la-close"></i></span>
                                </button>
                            </div>
                  </div>
         <?php endif; ?>
    <?php if ($local_gov == TRUE) {
     ?>   
        
<div class="row">
	<div class="col-lg-12">
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
					LOCAL GOVERNMENT INFORMATION
					</h3>
				</div>
			</div>
			<!--begin::Form-->
			<!-- <form method="post" action="ss" class="kt-form kt-form--label-right" id="kt_form_2"> -->
				<?php echo form_open("admin/Update_local_govDetails/{$loan_attach->loan_id}/{$local_gov->attach_id}",['class'=>'kt-form kt-form--label-right','novalidate']); ?>
				<div class="kt-portlet__body">
					<div class="kt-section">
						<div class="kt-section__content">
							<div class="form-group form-group-last row">

								
									<div class="col-lg-3 form-group-sub">
									<label class="form-control-label">*Name of Officer:</label>
							<input type="text" name="oficer" placeholder="Name of Officer" autocomplete="off" class="form-control input-sm" value="<?php echo $local_gov->oficer; ?>" required >
								</div>
								
									<div class="col-lg-3 form-group-sub">
									<label class="form-control-label">*Officer Phone Number:</label>
							<input type="number" name="phone_oficer" placeholder="Officer Phone Number" autocomplete="off" class="form-control input-sm" value="<?php echo $local_gov->phone_oficer; ?>" required>
								</div>
										<div class="col-lg-3 form-group-sub">
									<label class="form-control-label">*Select Officer Position:</label>
							      <select type="text" name="oficer_position" class="form-control select2" required>
							      	<option value="<?php echo $local_gov->oficer_position; ?>"><?php echo $local_gov->oficer_position; ?></option>
							      	<option value="CHAIRMAN">CHAIRMAN</option>
							      	<option value="AMBASSADOR">AMBASSADOR</option>
							      	<option value="EMPLOYER">EMPLOYER</option>
							      	<option value="LOCAL EXECUTIVE OFFICER">LOCAL EXECUTIVE OFFICER</option>
							      </select>
								</div>
									<div class="col-lg-3 form-group-sub">
									<label class="form-control-label">*Region:</label>
							<select type="number" name="region_oficer" class="form-control select2" required>
								<option value="<?php echo $local_gov->region_oficer ?>"><?php echo $local_gov->region_name; ?></option>
								<?php foreach ($region as $regions): ?>
								<option value="<?php echo $regions->region_id; ?>"><?php echo $regions->region_name; ?></option>
								<?php endforeach; ?>
							</select>
								</div>
								<input type="hidden" name="loan_id" value="<?php echo $loan_attach->loan_id; ?>">
										<div class="col-lg-3 form-group-sub">
									<label class="form-control-label">*District:</label>
							<input type="text" name="district_oficer" value="<?php echo $local_gov->district_oficer; ?>" placeholder="District" autocomplete="off" class="form-control input-sm" required>
								</div>
					<div class="col-lg-3 form-group-sub">
					<label class="form-control-label">*Street:</label>
						<input type="text" name="street_oficer" value="<?php echo $local_gov->street_oficer; ?>" placeholder="Street" autocomplete="off" class="form-control input-sm" required>
						</div>
					   <div class="col-lg-3 form-group-sub">
									<label class="form-control-label">*Ward:</label>
							<input type="text" name="ward_oficer" value="<?php echo $local_gov->ward_oficer; ?>" placeholder="Ward" autocomplete="off" class="form-control input-sm" required>
						</div> 

						 <div class="col-lg-3 form-group-sub">
									<label class="form-control-label">*Loan Agreement:</label>
							<input type="file" name="cont_attachment" placeholder="Ward" autocomplete="off" class="form-control input-sm" required>
						</div> 
							</div>
						</div>
					</div>
				</div>

				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<div class="row">
							<div class="col-lg-12">
								<div class="text-center">
								<button type="submit" class="btn btn-brand  btn-elevate btn-pill btn-sm">Update</button>
								<a href="<?php echo base_url("admin/loan_pending"); ?>" class="btn btn-info btn-elevate btn-pill btn-sm">Finish</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php echo form_close(); ?>
			<!--end::Form-->
		</div>
		<!--end::Portlet-->
	</div>
</div>
<?php }elseif ($local_gov == FALSE) {
 ?>
<div class="row">
	<div class="col-lg-12">
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
					LOCAL GOVERNMENT INFORMATION
					</h3>
				</div>
			</div>
			<!--begin::Form-->
			<!-- <form method="post" action="ss" class="kt-form kt-form--label-right" id="kt_form_2"> -->
				<?php echo form_open_multipart("admin/create_local_govDetails/{$loan_attach->loan_id}",['class'=>'kt-form kt-form--label-right','novalidate']); ?>
				<div class="kt-portlet__body">
					<div class="kt-section">
						<div class="kt-section__content">
							<div class="form-group form-group-last row">

								
									<div class="col-lg-3 form-group-sub">
									<label class="form-control-label">*Name of Officer:</label>
							<input type="text" name="oficer" placeholder="Name of Officer" autocomplete="off" class="form-control input-sm" >
								</div>
								
									<div class="col-lg-3 form-group-sub">
									<label class="form-control-label">*Officer Phone Number:</label>
							<input type="number" name="phone_oficer" placeholder="Officer Phone Number" autocomplete="off" class="form-control input-sm">
								</div>
										<div class="col-lg-3 form-group-sub">
									<label class="form-control-label">*Select Officer Position:</label>
							      <select type="text" name="oficer_position" class="form-control select2">
							      	<option value="">Officer Position</option>
							      	<option value="CHAIRMAN">CHAIRMAN</option>
							      	<option value="AMBASSADOR">AMBASSADOR</option>
							      	<option value="EMPLOYER">EMPLOYER</option>
							      	<option value="LOCAL EXECUTIVE OFFICER">LOCAL EXECUTIVE OFFICER</option>
							      </select>
								</div>
									<div class="col-lg-3 form-group-sub">
									<label class="form-control-label">*Region:</label>
							<select type="number" name="region_oficer" class="form-control select2">
								<option value="">Select Region</option>
								<?php foreach ($region as $regions): ?>
								<option value="<?php echo $regions->region_id; ?>"><?php echo $regions->region_name; ?></option>
								<?php endforeach; ?>
							</select>
								</div>
								<input type="hidden" name="loan_id" value="<?php echo $loan_attach->loan_id; ?>">
										<div class="col-lg-3 form-group-sub">
									<label class="form-control-label">*District:</label>
							<input type="text" name="district_oficer" placeholder="District" autocomplete="off" class="form-control input-sm">
								</div>
					<div class="col-lg-3 form-group-sub">
					<label class="form-control-label">*Street:</label>
						<input type="text" name="street_oficer" placeholder="Street" autocomplete="off" class="form-control input-sm">
						</div>
					   <div class="col-lg-3 form-group-sub">
									<label class="form-control-label">*Ward:</label>
							<input type="text" name="ward_oficer" placeholder="Ward" autocomplete="off" class="form-control input-sm">
						</div> 

						 <div class="col-lg-3 form-group-sub">
									<label class="form-control-label">*Loan Agreement:</label>
							<input type="file" name="cont_attachment" placeholder="Ward" autocomplete="off" class="form-control input-sm">
						</div> 
							</div>
						</div>
					</div>
				</div>

				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<div class="row">
							<div class="col-lg-12">
								<div class="text-center">
								<button type="submit" class="btn btn-brand  btn-elevate btn-pill btn-sm">Submit</button>
								<button type="reset" class="btn btn-danger  btn-elevate btn-pill btn-sm">Reset</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php echo form_close(); ?>
			<!--end::Form-->
		</div>
		<!--end::Portlet-->
	</div>
</div>
 <?php } ?>


<!-- end:: Content -->
<!-- end:: Content -->
				</div>				
				
<?php include('incs/footer_1.php') ?>

<script>
    $('.select2').select2();
</script>

