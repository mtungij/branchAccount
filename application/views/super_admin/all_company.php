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
				<!-- 	<li class="kt-nav__item">
						<a href="#" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_1<?php //echo $accounts->account_id; ?>">
							<i class="kt-nav__link-icon flaticon-edit" ></i>
							<span class="kt-nav__link-text">Edit</span>
						</a>
					</li> -->
				<!-- 	<li class="kt-nav__item">
						<a href="<?php //echo base_url("admin/delete_accountType/{$accounts->account_id}"); ?>" class="kt-nav__link" onclick="return confirm('Are you sure?')">
							<i class="kt-nav__link-icon flaticon-delete"></i>
							<span class="kt-nav__link-text">Delete</span>
						</a>
					</li> -->
					<!-- <li class="kt-nav__item">
						<a href="<?php echo base_url("super_admin/view_blanch/{$myCompanys->comp_id}"); ?>" class="kt-nav__link">
							<i class="kt-nav__link-icon flaticon-eye"></i>
							<span class="kt-nav__link-text">Branchs</span>
						</a>
					</li> -->
					<li class="kt-nav__item">
						<a href="<?php echo base_url("super_admin/vie_all_customer/{$myCompanys->comp_id}"); ?>" class="kt-nav__link">
							<i class="kt-nav__link-icon flaticon-eye"></i>
							<span class="kt-nav__link-text">Customers</span>
						</a>
					</li>

				<!-- 	<li class="kt-nav__item">
						<a href="<?php //echo base_url("admin/delete_accountType/{$accounts->account_id}"); ?>" class="kt-nav__link" onclick="return confirm('Are you sure?')">
							<i class="kt-nav__link-icon flaticon-eye"></i>
							<span class="kt-nav__link-text">View Employees</span>
						</a>
					</li> -->

					
					
					
				</ul>
			</div>
	</div>
</td>			  											  							
</tr>

<!--begin::Modal-->
<div class="modal fade" id="kt_modal_<?php //echo $accounts->account_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Account Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php //echo form_open("admin/modify_account/{$accounts->account_id}"); ?>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Account name:</label>
                        <input type="text" class="form-control" autocomplete="off" name="account_name" value="<?php echo $accounts->account_name; ?>">
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