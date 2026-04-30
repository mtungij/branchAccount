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
<div class="row">
	<div class="col-lg-12">
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Penalt Setting
					</h3>
				</div>
			</div>
			<!--begin::Form-->
			<!-- <form method="post" action="ss" class="kt-form kt-form--label-right" id="kt_form_2"> -->
				<?php if(@$penart == TRUE){ ?>
				<?php echo form_open("admin/modify_penart/{$penart->penalt_id}",['class'=>'kt-form kt-form--label-right','novalidate']); ?>
				<div class="kt-portlet__body">
					<div class="kt-section">
						<div class="kt-section__content">
							<div class="form-group form-group-last row">
								<div class="col-lg-6 form-group-sub">
									<label class="form-control-label">*Calculation Type:</label>
									<select type="text" name="action_penart" class="form-control">
										<option value="<?php echo $penart->action_penart; ?>"><?php echo $penart->action_penart; ?></option>
										<option value="PERCENTAGE VALUE">Percentage Value</option>
										<option value="MONEY VALUE">Money Value</option>
									</select>
								</div>
								
								
								<div class="col-lg-6 form-group-sub">
									<label  class="form-control-label">*Penalt Amount</label>
									<input type="text" required value="<?php echo $penart->penart; ?>" class="form-control" placeholder="penart Amount % $" name="penart" autocomplete="off" >
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
								<button type="reset" class="btn btn-danger btn-elevate btn-pill btn-sm">Cancel</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php echo form_close(); ?>
		<?php }elseif (@$penart == FALSE) {
		?>
			<?php echo form_open("admin/create_penarty",['class'=>'kt-form kt-form--label-right','novalidate']); ?>
				<div class="kt-portlet__body">
					<div class="kt-section">
						<div class="kt-section__content">
							<div class="form-group form-group-last row">
								<div class="col-lg-6 form-group-sub">
									<label class="form-control-label">*Calculation Type:</label>
									<select type="text" name="action_penart" class="form-control">
										<option value="">Select Calculation Type</option>
										<option value="PERCENTAGE VALUE">Percentage Value</option>
										<option value="MONEY VALUE">Money Value</option>
									</select>
								</div>
								
								<input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">
								<div class="col-lg-6 form-group-sub">
									<label  class="form-control-label">*Penalt Amount</label>
									<input type="text" required class="form-control" placeholder="penart Amount % $" name="penart" autocomplete="off" >
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
								<button type="submit" class="btn btn-brand  btn-elevate btn-pill btn-sm">Save</button>
								<button type="reset" class="btn btn-danger btn-elevate btn-pill btn-sm">Cancel</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php echo form_close(); ?>
		<?php }  ?>
			<!--end::Form-->
		</div>
		<!--end::Portlet-->
	</div>
</div>



<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon-list-2"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Penart Setting list
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		<!-- &nbsp;
		<a href="#" class="btn btn-brand btn-elevate btn-icon-sm">
			<i class="la la-plus"></i>
			New Record
		</a> -->
	</div>	
</div>		</div>
	</div>

	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
									     <thead>
			  						          <tr>
				  							    
												<th>Calculation Type</th>
												<th>Penalt Amount</th>
												<th>Action</th>	
				  						         </tr>
						                  </thead>
			
								    <tbody>
									          <tr>
				  					<td><?php echo @$penart->action_penart; ?></td>
				  					<td>
				  						<?php if (@$penart->action_penart == 'MONEY VALUE') {
				  						 ?>
				  						<?php echo number_format(@$penart->penart); ?>
				  						<?php }elseif(@$penart->action_penart == 'PERCENTAGE VALUE') {
				  						 ?>
				  						 <?php echo @$penart->penart; ?>%
				  						 <?php } ?>
				  							
				  						</td>
				  					
				  				<td>	
				  			<div class="dropdown dropdown-inline">
			<button type="button" class="btn btn-info  btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class=""></i> Action  	
			</button>
			<div class="dropdown-menu dropdown-menu-right">
				<ul class="kt-nav">
					<li class="kt-nav__section kt-nav__section--first">
						<span class="kt-nav__section-text">Choose an option</span>
					</li>
					
					<?php if ($penart == TRUE) {
					 ?>
					<li class="kt-nav__item">
						<a href="<?php echo base_url("admin/delete_penart/{$penart->penalt_id}") ?>" class="kt-nav__link" onclick="return confirm('Are you sure?')">
							<i class="kt-nav__link-icon flaticon-delete"></i>
							<span class="kt-nav__link-text">Delete</span>
						</a>
					</li>
				<?php }elseif($penart == FALSE){
				 ?>
				 
				 <?php } ?>
					
					
				</ul>
			</div>
	</div>
</td>			  											  							
</tr>
									
	                </tbody>
	                <tfoot>
                    <tr>
                   <th>Calculation Type</th>
					<th>Penalt Amount</th>
					<th>Action</th>
                    </tr>
                   </tfoot>
                   </table>
		<!--end: Datatable -->
	</div>
</div>
</div>
<!-- end:: Content -->
<!-- end:: Content -->
				</div>				
				
<?php include('incs/footer_1.php') ?>