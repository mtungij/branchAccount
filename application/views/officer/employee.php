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
						Register Employee
					</h3>
				</div>
			</div>
			<!--begin::Form-->
			<!-- <form method="post" action="ss" class="kt-form kt-form--label-right" id="kt_form_2"> -->
				<?php echo form_open("oficer/create_employee",['class'=>'kt-form kt-form--label-right','novalidate']); ?>

				<div class="kt-portlet__body">
					<div class="kt-section">
						<div class="kt-section__content">
							<div class="form-group form-group-last row">
								<div class="col-lg-3 form-group-sub">
									<label class="form-control-label">*Full name:</label>
								<input type="text" name="empl_name" placeholder="Full name" autocomplete="off" class="form-control input-sm" required>
								</div>
								<div class="col-lg-3 form-group-sub">
									<label class="form-control-label">*Mobile no:</label>
									<input type="number" name="empl_no" placeholder="Phone Number" autocomplete="off" class="form-control input-sm" required>
								</div>
								<div class="col-lg-3 form-group-sub">
									<label class="form-control-label">*Email:</label>
									<input type="email" name="empl_email" placeholder="Email" autocomplete="off" class="form-control input-sm" required>
								</div>
								<input type="hidden" name="comp_id" value="<?php echo $empl_data->comp_id; ?>">
								<div class="col-lg-3 form-group-sub">
									<label  class="form-control-label">*Branch:</label>
							<select type="number" name="blanch_id" class="form-control input-sm" required class="form-control input-sm">
								<option value="">Select Blanch</option>
								<?php foreach ($blanch as $blanchs): ?>
								<option value="<?php echo $blanchs->blanch_id; ?>"><?php echo $blanchs->blanch_name; ?></option>
								<?php endforeach; ?>
							</select>
								</div>

								<!-- <div class="col-lg-3 form-group-sub">
									<label  class="form-control-label">*Position:</label>
								<select type="text" name="position_id" class="form-control input-sm" required>
								<option value="">Select Position</option>
								<?php //foreach ($position as $positions): ?>
								<option value="<?php //echo $positions->position_id; ?>"><?php //echo $positions->position; ?></option>
								<?php //endforeach; ?>
							</select>
								</div> -->
								<input type="hidden" name="position_id" value="6">
								<div class="col-lg-4 form-group-sub">
									<label  class="form-control-label">*Username:</label>
								<input type="text" name="username" placeholder="Username" autocomplete="off" class="form-control input-sm" required>
								</div>

								<div class="col-lg-4 form-group-sub">
									<label  class="form-control-label">*Sex:</label>
								<select type="text" name="empl_sex" class="form-control input-sm" data-required="true">
								<option value="">Select Sex</option>
								<option value="male">Male</option>
								<option value="female">Female</option>
							 </select>
								</div>
								<div class="col-lg-4 form-group-sub">
									<label  class="form-control-label">*Salary Amount:</label>
								<input type="number" name="salary" placeholder="Salary Amount" autocomplete="off" class="form-control input-sm" required>
								</div>

								<div class="col-lg-3 form-group-sub">
									<label  class="form-control-label">*Payee:</label>
								<select type="text" name="pays" class="form-control input-sm" required>
								<option value="">Select</option>
								<option value="yes">Yes</option>
								<option value="no">No</option>
							</select>
								</div>
							<div class="col-lg-3 form-group-sub">
									<label  class="form-control-label">*Pay NSSF:</label>
							<select type="text" name="pay_nssf" class="form-control input-sm" required>
								<option value="">Select</option>
								<option value="yes">Yes</option>
								<option value="no">No</option>
							</select>
								</div>
									<div class="col-lg-3 form-group-sub">
									<label  class="form-control-label">*Bank Account:</label>
								<select type="text" name="bank_account" class="form-control input-sm" required>
								<option value="">Select</option>
								<option value="NMB">NMB</option>
								<option value="CRDB">CRDB</option>
								<option value="TPB">TPB</option>
								<option value="NBC">NBC</option>
								<option value="EQTY">EQTY</option>
							</select>
								</div>
									<div class="col-lg-3 form-group-sub">
									<label  class="form-control-label">*Account Number:</label>
							<input type="text" name="account_no" placeholder="Account Number" autocomplete="off" class="form-control input-sm" required>
								</div>
						<input type="hidden" name="password" value="1234">

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
				Employee List
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
										<th>Name</th>
										<th>Phone number</th>
										<th>Email</th>
										<th>Branch</th>
										<!-- <th>Position</th> -->
										<!-- <th>Sex</th> -->
										<th>Salary Amount</th>
										<th>Bank Account</th>
										<th>Account NO</th>
										<th>Status</th>
										<th>Action</th>
				  									
				  									
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                          <?php $no = 1; ?>
									<?php foreach($employee  as $employees): ?>
									          <tr>
				  					<td><?php echo $no++; ?>.</td>
				  					<td><?php echo $employees->empl_name ?></td>
				  					<td><?php echo $employees->empl_no; ?></td>
				  					<td><?php echo $employees->empl_email; ?></td>
				  					<td><?php echo $employees->blanch_name; ?></td>
				  					<!-- <td><?php //echo $employees->position; ?></td> -->
				  					<!-- <td><?php //echo $employees->empl_sex; ?></td> -->
				  						<td><?php echo number_format($employees->salary); ?>/=</td>
				  						<td><?php echo $employees->bank_account; ?></td>
				  						<td><?php echo $employees->account_no; ?></td>
				  						<td>
				  							<?php if ($employees->empl_status == 'open') {
				 ?>
				 <a href="" class="badge badge-success">Active</a>
				<?php }elseif ($employees->empl_status == 'close') {
				 ?>
				 <a href="" class="badge badge-danger">Blocked</a>
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
					<li class="kt-nav__item">
						<a href="#" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_<?php echo $employees->empl_id; ?>">
							<i class="kt-nav__link-icon flaticon-edit" ></i>
							<span class="kt-nav__link-text">View</span>
						</a>
					</li>

					<li class="kt-nav__item">
						<a href="<?php echo base_url("oficer/privillage/{$employees->empl_id}"); ?>" class="kt-nav__link">
							<i class="kt-nav__link-icon flaticon-eye" ></i>
							<span class="kt-nav__link-text">User Access</span>
						</a>
					</li>
					
					 <?php if ($employees->empl_status == 'open') {
					 ?>
					<li class="kt-nav__item">
						<a href="<?php //echo base_url("admin/delete_capital/{$capitals->capital_id}") ?>" class="kt-nav__link" onclick="return confirm('Are you sure?')">
							<i class="kt-nav__link-icon flaticon2-delete"style="color:red"></i>
							<span class="kt-nav__link-text" style="color:red" >Block</span>
						</a>
					</li>
				<?php }elseif($employees->empl_status == 'close'){ ?>
					<li class="kt-nav__item">
						<a href="<?php //echo base_url("admin/delete_capital/{$capitals->capital_id}") ?>" class="kt-nav__link" onclick="return confirm('Are you sure?')">
							<i class="kt-nav__link-icon flaticon2-check-mark" style="color:green"></i>
							<span class="kt-nav__link-text" style="color:green">Unblock</span>
						</a>
					</li>
					<?php }  ?>
					<li class="kt-nav__item">
						<a href="<?php echo base_url("oficer/delete_employee/{$employees->empl_id}"); ?>" class="kt-nav__link" onclick="return confirm('Are you sure?')">
							<i class="kt-nav__link-icon flaticon-delete"></i>
							<span class="kt-nav__link-text">Delete</span>
						</a>
					</li>
					
					
				</ul>
			</div>
	</div>
</td>			  											  							
</tr>

<div class="modal fade" id="kt_modal_<?php echo $employees->empl_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("oficer/modify_employee/{$employees->empl_id}"); ?>

                 	<div class="kt-portlet__bod">
					<div class="kt-section">
						<div class="kt-section__content">
							<div class="form-group form-group-last row">
								<div class="col-lg-3 form-group-sub">
									<label class="form-control-label">*Full name:</label>
									<input type="text" name="empl_name" placeholder="" autocomplete="off" value="<?php echo $employees->empl_name; ?>" class="form-control input-sm" required>
								</div>
								<div class="col-lg-3 form-group-sub">
									<label class="form-control-label">*Mobile No:</label>
									<input type="number" name="empl_no" placeholder="Amount" autocomplete="off" value="<?php echo $employees->empl_no; ?>" class="form-control input-sm" required>
								</div>
								<div class="col-lg-3 form-group-sub">
									<label class="form-control-label">*Email:</label>
									<input type="email" name="empl_email" placeholder="Email" autocomplete="off" value="<?php echo $employees->empl_email; ?>" class="form-control input-sm" required>
								</div>
								
								<div class="col-lg-3 form-group-sub">
									<label  class="form-control-label">*Branch:</label>
							<select type="number" name="blanch_id" class="form-control input-sm" required>
								<option value="<?php echo $employees->blanch_id; ?>"><?php echo $employees->blanch_name; ?></option>
								<?php foreach ($blanch as $blanchs): ?>
								<option value="<?php echo $blanchs->blanch_id?>"><?php echo $blanchs->blanch_name; ?></option>
								<?php endforeach; ?>
							</select>
								</div>

								<div class="col-lg-4 form-group-sub">
									<label  class="form-control-label">*Position:</label>
							<select type="number" name="position_id" class="form-control input-sm" required>
								<option value="<?php echo $employees->position_id; ?>"><?php echo $employees->position; ?></option>
								<?php foreach ($position as $positions): ?>
								<option value="<?php echo $positions->position_id; ?>"><?php echo $positions->position; ?></option>
								<?php endforeach; ?>
							</select>
								</div>
								<div class="col-lg-4 form-group-sub">
									<label  class="form-control-label">*Username:</label>
								<input type="text" name="username" placeholder="Cheque number" autocomplete="off" value="<?php echo $employees->username; ?>" class="form-control input-sm" >
								</div>

								<div class="col-lg-4 form-group-sub">
									<label  class="form-control-label">*Sex:</label>
								<select type="text" name="empl_sex" class="form-control">
									<option value="<?php echo $employees->empl_sex; ?>"><?php echo $employees->empl_sex; ?></option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>	
								</div>

								<div class="col-lg-4 form-group-sub">
									<label  class="form-control-label">*Salary Amount:</label>
								<input type="number" name="salary" placeholder="Cheque number" autocomplete="off" value="<?php echo $employees->salary; ?>" class="form-control input-sm" >
								</div>
								<div class="col-lg-4 form-group-sub">
									<label  class="form-control-label">*Payee:</label>
								<select type="text" name="pays" class="form-control">
									<option value="<?php echo $employees->pays; ?>"><?php echo $employees->pays; ?></option>
									<option value="yes">Yes</option>
									<option value="no">No</option>
								</select>
								</div>
								<div class="col-lg-4 form-group-sub">
									<label  class="form-control-label">*Pay NSSF:</label>
								<select type="text" name="pay_nssf" class="form-control">
									<option value="<?php echo $employees->pay_nssf; ?>"><?php echo $employees->pay_nssf; ?></option>
									<option value="yes">Yes</option>
									<option value="no">No</option>
								</select>
								</div>

								<div class="col-lg-6 form-group-sub">
									<label  class="form-control-label">*Bank Account:</label>
								<select type="text" name="bank_account" class="form-control input-sm" required>
								<option value="<?php echo $employees->bank_account; ?>"><?php echo $employees->bank_account; ?></option>
								<option value="NMB">NMB</option>
								<option value="CRDB">CRDB</option>
								<option value="TPB">TPB</option>
								<option value="NBC">NBC</option>
								<option value="EQTY">EQTY</option>
							</select>
								</div>

								<div class="col-lg-6 form-group-sub">
							<label  class="form-control-label">*Account Number:</label>
							<input type="text" name="account_no" value="<?php echo $employees->account_no;  ?>" placeholder="Account Number" autocomplete="off" class="form-control input-sm" required>
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
			<th>Name</th>
			<th>Phone number</th>
			<th>Email</th>
			<th>Branch</th>
			<!-- <th>Position</th> -->
			<!-- <th>Sex</th> -->
			<th>Salary Amount</th>
			
			<th>Bank Account</th>
			<th>Account NO</th>
			<th>Status</th>
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