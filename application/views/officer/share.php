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
						Register Share Holder
					</h3>
				</div>
			</div>
			<!--begin::Form-->
			<!-- <form method="post" action="ss" class="kt-form kt-form--label-right" id="kt_form_2"> -->
				<?php echo form_open("admin/create_shareHolder",['class'=>'kt-form kt-form--label-right','novalidate']); ?>
				<div class="kt-portlet__body">
					<div class="kt-section">
						<div class="kt-section__content">
							<div class="form-group form-group-last row">
								<div class="col-lg-4 form-group-sub">
									<label class="form-control-label">* Full name:</label>
									<input type="text" name="share_name" placeholder="Full name" autocomplete="off" class="form-control" required>
								</div>
								<div class="col-lg-4 form-group-sub">
									<label class="form-control-label">* Mobile no:</label>
									<input type="number" name="share_mobile" placeholder="Mobile no" autocomplete="off" class="form-control" required>
								</div>
								<input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">
								<div class="col-lg-4 form-group-sub">
									<label  class="form-control-label">* Email:</label>
									<input type="email" name="share_email" placeholder="Email" autocomplete="off" class="form-control" required>
								</div>

								<div class="col-lg-6 form-group-sub">
									<label  class="form-control-label">*Gender:</label>
							<select type="text" name="share_sex" class="form-control input-sm" data-required="true">
								<option value="">Select gender</option>
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
								</div>
								<div class="col-lg-6 form-group-sub">
									<label  class="form-control-label">*Date of Birth:</label>
									<input type="date" name="share_dob" placeholder="Date of Birth" autocomplete="off" class="form-control" required>
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
				Share Holder List
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
				  							    <th>S/No.</th>
												<th>Shareholder name</th>
												<th>Phone number</th>
												<th>Email</th>
												<th>Sex</th>
												<th>Date of Birth</th>
												<th>Action</th>
				  									
				  									
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                          <?php $no = 1; ?>
									<?php foreach($share  as $shares): ?>
									          <tr>
				  					<td><?php echo $no++; ?>.</td>
				  					<td><?php echo $shares->share_name ?></td>
				  					<td><?php echo $shares->share_mobile ?></td>
				  					<td><?php echo $shares->share_email ?></td>
				  					<td><?php echo $shares->share_sex; ?></td>
				  					<td><?php echo $shares->share_dob ?></td>
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
					<li class="kt-nav__item">
						<a href="#" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_<?php echo $shares->share_id; ?>">
							<i class="kt-nav__link-icon flaticon-edit" ></i>
							<span class="kt-nav__link-text">Edit</span>
						</a>
					</li>
					<li class="kt-nav__item">
						<a href="<?php echo base_url("admin/delete_share/{$shares->share_id}") ?>" class="kt-nav__link" onclick="return confirm('Are you sure?')">
							<i class="kt-nav__link-icon flaticon-delete"></i>
							<span class="kt-nav__link-text">Delete</span>
						</a>
					</li>
					
					
				</ul>
			</div>
	</div>
</td>			  											  							
</tr>

<div class="modal fade" id="kt_modal_<?php echo $shares->share_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit share Holder (<?php echo $shares->share_name; ?>)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("admin/modify_shareholder/{$shares->share_id}"); ?>
                  <div class="kt-portlet__bod">
					<div class="kt-section">
						<div class="kt-section__content">
							<div class="form-group form-group-last row">
								<div class="col-lg-4 form-group-sub">
									<label class="form-control-label">* Full name:</label>
									<input type="text" name="share_name" placeholder="Full name" autocomplete="off" value="<?php echo $shares->share_name ?>" class="form-control" required>
								</div>
								<div class="col-lg-4 form-group-sub">
									<label class="form-control-label">* Mobile no:</label>
									<input type="number" name="share_mobile" placeholder="Mobile no" value="<?php echo $shares->share_mobile ?>" autocomplete="off" class="form-control" required>
								</div>
								
								<div class="col-lg-4 form-group-sub">
									<label  class="form-control-label">* Email:</label>
									<input type="email" name="share_email" placeholder="Email" autocomplete="off" value="<?php echo $shares->share_email ?>" class="form-control" required>
								</div>

								<div class="col-lg-6 form-group-sub">
									<label  class="form-control-label">*Gender:</label>
							<select type="text" name="share_sex" class="form-control input-sm" data-required="true">
								<option value="<?php echo $shares->share_sex; ?>"><?php echo $shares->share_sex; ?></option>
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
								</div>
								<div class="col-lg-6 form-group-sub">
									<label  class="form-control-label">*Date of Birth:</label>
									<input type="date" name="share_dob" placeholder="Date of Birth" autocomplete="off" value="<?php echo $shares->share_dob ?>" class="form-control" required>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                <th>S/No.</th>
				<th>Shareholder name</th>
				<th>Phone number</th>
				<th>Email</th>
				<th>Sex</th>
				<th>Date of Birth</th>
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