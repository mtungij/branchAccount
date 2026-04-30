<?php
include_once APPPATH . "views/partials/officerheader.php";
?>
	


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
         <?php if ($das = $this->session->flashdata('error')): ?>
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
         
<div class="row">
	<div class="col-lg-12">
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
					Update Customer
					</h3>
				</div>
			</div>
			<!--begin::Form-->
			<!-- <form method="post" action="ss" class="kt-form kt-form--label-right" id="kt_form_2"> -->
				<?php echo form_open("oficer/modify_customer/{$data->customer_id}",['class'=>'kt-form kt-form--label-right','novalidate']); ?>
				<div class="kt-portlet__body">
					<div class="kt-section">
						<div class="kt-section__content">
							<div class="form-group form-group-last row">
								<div class="col-lg-4 form-group-sub">
									<label class="form-control-label">*First Name:</label>
							<input type="text" name="f_name" placeholder="First name" value="<?php echo $data->f_name; ?>" autocomplete="off" class="form-control input-sm" required>
								</div>
								<div class="col-lg-4 form-group-sub">
									<label class="form-control-label">*Middle name:</label>
									<input type="text" name="m_name" value="<?php echo $data->m_name; ?>" placeholder="Middle name" autocomplete="off" class="form-control input-sm" required>
								</div>
								<input type="hidden" name="comp_id" value="<?php echo $empl_data->comp_id; ?>">
								<input type="hidden" name="blanch_id" value="<?php echo $empl_data->blanch_id; ?>">
								<input type="hidden" name="empl_id" value="<?php echo $empl_data->empl_id; ?>">
								<div class="col-lg-4 form-group-sub">
									<label  class="form-control-label">*Last name:</label>
									<input type="text" name="l_name" placeholder="Last name" value="<?php echo $data->l_name; ?>" autocomplete="off" class="form-control input-sm" required>
								</div>

								
						
								<div class="col-lg-4 form-group-sub">
									<label  class="form-control-label">*Gender:</label>
								<select type="text" name="gender" class="form-control input-sm" required class="form-control input-sm">
								<option value="<?php echo $data->gender; ?>"><?php echo $data->gender; ?></option>
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
								</div>
								<div class="col-lg-4 form-group-sub">
									<label  class="form-control-label">*Date of Birth:</label>
							<input type="text" name="date_birth" value="<?php echo $data->date_birth; ?>" onchange="getDate(this.value)" placeholder="Date of Birth" autocomplete="off" class="form-control input-sm" required>
								</div>
							<!-- 	<div class="col-lg-4 form-group-sub">
									<label  class="form-control-label">*Year:</label>
							<input type="" id="age" name="" readonly class="form-control input-sm" value="">
								</div> -->
									<div class="col-lg-4 form-group-sub">
									<label class="form-control-label">*Phone Number:</label>
							<input type="text" name="phone_no" value="<?php echo $data->phone_no; ?>" placeholder="Eg, 07XXXXXXXX or 255XXXXXXXXX" autocomplete="off" class="form-control input-sm" required >
								</div>
									<div class="col-lg-6 form-group-sub">
									<label class="form-control-label">*Region:</label>
							<select type="number" name="region_id" class="form-control input-sm" required>
								<option value="<?php echo $data->region_id; ?>"><?php echo $data->region_name; ?></option>
                                <?php foreach ($region as $regions): ?>
								<option value="<?php echo $regions->region_id; ?>"><?php echo $regions->region_name; ?></option>
								<?php endforeach;?>
							</select>
								</div>
									<div class="col-lg-6 form-group-sub">
									<label class="form-control-label">*District:</label>
							<input type="text" name="district" value="<?php echo $data->district; ?>" placeholder="district" autocomplete="off" class="form-control input-sm" required>
								</div>
									<div class="col-lg-6 form-group-sub">
									<label class="form-control-label">*Ward:</label>
							<input type="text" name="ward" value="<?php echo $data->ward; ?>" placeholder="Ward" autocomplete="off" class="form-control input-sm" required>
								</div>
										<div class="col-lg-6 form-group-sub">
									<label class="form-control-label">*Street:</label>
							<input type="text" name="street" value="<?php echo $data->street; ?>" placeholder="street" autocomplete="off" class="form-control input-sm" required>
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
								<a href="<?php echo base_url("oficer/update_lsatDetailCustomer/{$data->customer_id}") ?>" class="btn btn-info btn-elevate btn-pill btn-sm">Skip</a>
								<a href="<?php echo base_url("oficer/update_customer_passport/{$data->customer_id}") ?>" class="btn btn-primary btn-elevate btn-pill btn-sm">Update Passport</a>
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


<!-- end:: Content -->
<!-- end:: Content -->
				</div>				
				
<?php
include_once APPPATH . "views/partials/footer.php";
?>


<script>
	function getDate(data){
  let now = new Date();
  let bod = (new Date(data));

  let age = now.getFullYear() - bod.getFullYear();
   let _age = document.querySelector("#age");
   _age.value = age;
 //alert(age)
}
</script>