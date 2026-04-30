<?php include('incs/header.php'); ?>
<?php include('incs/side.php'); ?>
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
	  <div class="alert alert-success fade show" role="alert">
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
						Register Company
					</h3>
				</div>
			</div>
			<!--begin::Form-->
			<!-- <form method="post" action="ss" class="kt-form kt-form--label-right" id="kt_form_2"> -->
				<?php echo form_open("super_admin/register_company",['class'=>'kt-form kt-form--label-right','novalidate']); ?>
				<div class="kt-portlet__body">
					<div class="kt-section">
						<div class="kt-section__content">
							<div class="form-group form-group-last row">
								<div class="col-lg-6 form-group-sub">
									<label class="form-control-label">*Comapany Name:</label>
									<input type="text" class="form-control" autocomplete="off" name="comp_name" placeholder="Comapany Name" value="">
								</div>
								<div class="col-lg-6 form-group-sub">
									<label class="form-control-label">Registration Number:</label>
									<input type="number" class="form-control" autocomplete="off" name="comp_number" placeholder="Enter Registration Number" value="">
								</div>

								<div class="col-lg-6 form-group-sub">
									<label class="form-control-label">Phone Number:</label>
									<input type="number" class="form-control" autocomplete="off" name="comp_phone" placeholder="Enter Phone Number Eg.753, 628, 783" required>
								</div>

								<div class="col-lg-6 form-group-sub">
									<label class="form-control-label">Adress:</label>
									<input type="text" class="form-control" autocomplete="off" name="adress" placeholder="Enter Adress" value="">
								</div>
								<div class="col-lg-6 form-group-sub">
									<label class="form-control-label">Region:</label>
									   <select type="number" name="region_id" class="form-control" required>
									   	<option value="">Select Region</option>
									   	<?php foreach ($region as $regions): ?>
									   	<option value="<?php echo $regions->region_id; ?>"><?php echo $regions->region_name; ?></option>
									   <?php endforeach; ?>
									   </select>
								</div>
								<div class="col-lg-6 form-group-sub">
									<label class="form-control-label">Sms Status:</label>
									   <select type="text" name="sms_status" class="form-control" required>
									   	<option value="">Select Sms Status</option>
									   	<option value="YES">YES</option>
									   	<option value="NO">NO</option>
									   </select>
								</div>

								<div class="col-lg-6 form-group-sub">
									<label class="form-control-label">Email:</label>
									<input type="email" class="form-control" autocomplete="off" name="comp_email" placeholder="Enter Email">
								</div>
								<div class="col-lg-6 form-group-sub">
									<label class="form-control-label">*Password:</label>
									<input type="password" name="password" autocomplete="off" class="form-control" required placeholder="******">
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
								<button type="submit" class="btn btn-brand">Save</button>
								<button type="reset" class="btn btn-danger">Cancel</button>
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




<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon-list-2"></i>
			</span>
			<h3 class="kt-portlet__head-title">
			Company List
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
				  									<th>No.</th>
				  									<th>Company name</th>
				  									<th>Email</th>
				  									<th>Phone number</th>
				  									<th>Region</th>
				  									<th>Sms Status</th>
				  									<th>Joining Date</th>
				  									<th>Action</th>
				  									
				  									
				  						</tr>
						</thead>
			
								<tbody>
									<?php $no = 1; ?>
									<?php foreach ($myCompany as $myCompanys): ?>
										
									
									<tr>
										            <td><?php echo $no++; ?></td>
				  									<td><?php echo $myCompanys->comp_name; ?></td>
				  									<td><?php echo $myCompanys->comp_email; ?></td>
				  									<td><?php echo $myCompanys->comp_phone; ?></td>
				  									<td><?php echo $myCompanys->region_name; ?></td>
				  									<td><?php echo $myCompanys->sms_status; ?></td>
				  									<td><?php echo $myCompanys->created; ?></td>
				  									<td>	<div class="dropdown dropdown-inline">
			<button type="button" class="btn btn-info  btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class=""></i> Action  	
			</button>
			<div class="dropdown-menu dropdown-menu-right">
				<ul class="kt-nav">
					<li class="kt-nav__section kt-nav__section--first">
						<span class="kt-nav__section-text">Choose an option</span>
					</li>
					<li class="kt-nav__item">
						<a href="#" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_1<?php echo $myCompanys->comp_id; ?>">
							<i class="kt-nav__link-icon flaticon-edit" ></i>
							<span class="kt-nav__link-text">Sms Status</span>
						</a>
					</li>
					<li class="kt-nav__item">
						<a href="<?php echo base_url("super_admin/delete_company/{$myCompanys->comp_id}"); ?>" class="kt-nav__link" onclick="return confirm('Are you sure?')">
							<i class="kt-nav__link-icon flaticon-delete"></i>
							<span class="kt-nav__link-text">Delete</span>
						</a>
					</li>
					<li class="kt-nav__item">
						<a href="<?php echo base_url("super_admin/view_blanch/{$myCompanys->comp_id}"); ?>" class="kt-nav__link">
							<i class="kt-nav__link-icon flaticon-eye"></i>
							<span class="kt-nav__link-text">Branchs</span>
						</a>
					</li>
					<li class="kt-nav__item">
						<a href="<?php echo base_url("super_admin/vie_all_customer/{$myCompanys->comp_id}"); ?>" class="kt-nav__link">
							<i class="kt-nav__link-icon flaticon-eye"></i>
							<span class="kt-nav__link-text">Customers</span>
						</a>
					</li>

					<li class="kt-nav__item">
						<a href="<?php //echo base_url("super_admin/"); ?>" class="kt-nav__link" onclick="return confirm('Are you sure?')">
							<i class="kt-nav__link-icon flaticon-eye"></i>
							<span class="kt-nav__link-text">View Employees</span>
						</a>
					</li>

                <?php if ($myCompanys->comp_status == 'open') {
                 ?>
					<li class="kt-nav__item">
						<a href="<?php echo base_url("super_admin/block_company_account/{$myCompanys->comp_id}"); ?>" class="kt-nav__link" onclick="return confirm('Are you sure?')">
							<i class="kt-nav__link-icon flaticon-close"></i>
							<span class="kt-nav__link-text">Block</span>
						</a>
					</li>
                   <?php }elseif ($myCompanys->comp_status == 'close') {
                    ?>
                   
					<li class="kt-nav__item">
						<a href="<?php echo base_url("super_admin/unblock_company_account/{$myCompanys->comp_id}"); ?>" class="kt-nav__link" onclick="return confirm('Are you sure?')">
							<i class="kt-nav__link-icon flaticon2-check-mark"></i>
							<span class="kt-nav__link-text">Unblock</span>
						</a>
					</li>
                   <?php } ?>
					
					
					
				</ul>
			</div>
	</div>
</td>			  											  							
</tr>

<!--begin::Modal-->
<div class="modal fade" id="kt_modal_1<?php echo $myCompanys->comp_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">SMS STATUS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("super_admin/modify_smsstatus/{$myCompanys->comp_id}"); ?>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Sms Status:</label>
                       <select tpe="text" name="sms_status" class="form-control">
                       	<option value="<?php echo $myCompanys->sms_status ?>"><?php echo $myCompanys->sms_status ?></option>
                       	<option value="YES">YES</option>
                       	<option value="NO">NO</option>
                       </select>
                    </div>
            </div>
            <div class="modal-footer">
               
                <button type="submit" class="btn btn-primary">Update</button>

            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>



<!--end::Modal-->
<?php endforeach; ?>
									
	</tbody>
	<tfoot>
<tr>
		<th>No.</th>
		<th>Company Name</th>
		<th>Email</th>
		<th>Phone nuber</th>
		<th>Region</th>
		<th>Sms Status</th>
		<th>Joining Date</th>
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
				
<?php include('incs/footer.php') ?>