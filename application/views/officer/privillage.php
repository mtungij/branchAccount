<?php include('incs/header_1.php'); ?>
<?php include('incs/side_1.php'); ?>
<?php include('incs/subheader.php'); ?>
	


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





<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon-list-2"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				User Access - (<?php echo $emply->empl_name; ?>)
			</h3>
		</div>

	</div>

	     <div class="col-lg-12 col-xl-6">
		<!--begin::Portlet-->
		<div class="kt-portlet">
			<!--begin::Form-->
			
				<?php echo form_open("oficer/create_Employee_privillage/{$emply->empl_id}",['class'=>'kt-form']) ?>
				<div class="kt-portlet__body">
					<div class="form-group form-group-marginless">
						<div class="row">
                            <?php foreach ($position as $positions): ?>
							<div class="col-lg-4">
								<label class="kt-option">
								<span class="kt-option__control">
								<span class="kt-radio kt-radio--check-bold">
								<input type="checkbox" name="position_id[]" value="<?php echo $positions->position_id; ?>">
								<span></span>
								<input type="hidden" name="empl_id" value=" <?php echo $emply->empl_id; ?>">
								<input type="hidden" name="comp_id" value=" <?php echo $emply->comp_id; ?>">
								</span>
								</span>
								<span class="kt-option__label">
								<span class="kt-option__head">
								<span class="kt-option__title">
								<?php echo $positions->position; ?>			
								</span>
								<!-- <span class="kt-option__focus">
								Remove					
								</span>	 -->									
								</span>
								</span>		
								</label> 
							</div>
                           <?php endforeach; ?>
						</div>
					</div>
					
					<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>

					<div class="form-group form-group-marginless">
						<div class="row">
                    <?php foreach ($my_priv as $datas): ?>
							<div class="col-lg-4">
								<label class="kt-option">
								<span class="kt-option__control">
								<span class="kt-radio kt-radio--check-bold">
								<input type="checkbox"  value="<?php echo $datas->position_id; ?>" checked>
								<span></span>
								
								</span>
								</span>
								<span class="kt-option__label">
								<span class="kt-option__head">
								<span class="kt-option__title">
								<?php echo $datas->position; ?>			
								</span>
								<span class="kt-option__focus" style="color:red;">
								<a href="<?php echo base_url("oficer/delete_priv/{$datas->priv_id}") ?>" style="color:red;" onclick="return confirm('Are you sure?')">Remove</a>				
								</span>										
								</span>
								</span>		
								</label> 
							</div>
                           <?php endforeach; ?>
						</div>
					</div>
				</div>
			
			<!--end::Form-->
		</div>
		<!--end::Portlet-->		 
	</div>

	<div class="modal-footer">
		  <div class="text-center">
                <button type="submit" class="btn btn-primary">Save</button>
                <?php if (@$manager->position_id == '21') {
                ?>
                <a href="<?php echo base_url("oficer/manager_all_employee"); ?>" class="btn btn-info">Back</a>
             <?php  }else{ ?>
              <a href="<?php echo base_url("oficer/all_employee"); ?>" class="btn btn-info">Back</a>
            	<?php } ?> 
                 </div>
            </div>
    <?php echo form_close(); ?>
</div>
</div>
</div>				
				
<?php include('incs/footer_1.php') ?>