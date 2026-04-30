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
						Employee Deduction
					</h3>
				</div>
			</div>
			<!--begin::Form-->
			<!-- <form method="post" action="ss" class="kt-form kt-form--label-right" id="kt_form_2"> -->
				<?php echo form_open("oficer/create_deduction",['class'=>'kt-form kt-form--label-right','novalidate']); ?>
				<div class="kt-portlet__body">
					<div class="kt-section">
						<div class="kt-section__content">
							<div class="form-group form-group-last row">
								<div class="col-lg-6 form-group-sub">
									<label class="form-control-label">*Employee Name:</label>
									<select type="number" required name="empl_id" class="form-control">
									 <option value="">Select Employee</option>
									 <?php foreach ($employee as $employees): ?>	
									 <option value="<?php echo $employees->empl_id; ?>"><?php echo $employees->empl_name; ?></option>
									 <?php endforeach; ?>	
									</select>
								</div>
								<div class="col-lg-6 form-group-sub">
									<label class="form-control-label">*Amount:</label>
									<input type="number" placeholder="Enter Amount" name="amount" required class="form-control">
								</div>
								<input type="hidden" name="comp_id" value="<?php echo $empl_data->comp_id; ?>">
								<div class="col-lg-12 form-group-sub">
									<label  class="form-control-label">*Remaks:</label>
									<textarea type="text" placeholder="Enter Remaks" class="form-control" required name="description" rows="4"></textarea>
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
				Deduction List
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
												<th>Emloyee Name</th>
												<th>Blanch Name</th>
												<th>Deduction Amount</th>
												<th>Remaks</th>
												<th>Date</th>
												<th>Action</th>
				  									
				  									
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                          <?php $no = 1; ?>
									<?php foreach ($all_deduction as $all_deductions): ?>
									          <tr>
				  					<td><?php echo $no++; ?>.</td>
				  					<td><?php echo $all_deductions->empl_name; ?></td>
				  					<td><?php echo $all_deductions->blanch_name; ?></td>
				  					<td><?php echo number_format($all_deductions->amount); ?></td>
				  					<td><?php echo $all_deductions->description; ?></td>
				  					<td><?php echo substr($all_deductions->date, 0,10); ?></td>
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
						<a href="#" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_<?php echo $all_deductions->deduction_id; ?>">
							<i class="kt-nav__link-icon flaticon-edit" ></i>
							<span class="kt-nav__link-text">Edit</span>
						</a>
					</li>
				</ul>
			</div>
	</div>
</td>			  											  							
</tr>

<!--begin::Modal-->
<div class="modal fade" id="kt_modal_<?php echo $all_deductions->deduction_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Deduction</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                	<?php echo form_open("oficer/{$all_deductions->deduction_id}",['class'=>'kt-form kt-form--label-right','novalidate']); ?>
				<div class="kt-portlet__body">
					<div class="kt-section">
						<div class="kt-section__content">
							<div class="form-group form-group-last row">
								<div class="col-lg-6 form-group-sub">
									<label class="form-control-label">*Employee Name:</label>
									<select type="number" required name="empl_id" class="form-control">
									 <option value="<?php echo $all_deductions->empl_id; ?>"><?php echo $all_deductions->empl_name; ?></option>
									 <?php foreach ($employee as $employees): ?>	
									 <option value="<?php echo $employees->empl_id; ?>"><?php echo $employees->empl_name; ?></option>
									 <?php endforeach; ?>	
									</select>
								</div>
								<div class="col-lg-6 form-group-sub">
									<label class="form-control-label">*Amount:</label>
									<input type="number" placeholder="Enter Amount" name="new_amount" value="<?php echo $all_deductions->amount; ?>" required class="form-control">
								</div>
								
								<div class="col-lg-12 form-group-sub">
									<label  class="form-control-label">*Remaks:</label>
									<textarea type="text" placeholder="Enter Remaks" class="form-control" required name="remaks_allow" rows="4"><?php echo $all_deductions->description; ?></textarea>
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
        </div>
    </div>
</div>
<!--end::Modal-->
<?php endforeach; ?>
									
	                </tbody>
	                <tfoot>
                    <tr>
                   
				 <th>TOTAL</th>
				<th></th>
				<th></th>
				<th><?php echo $total_deduction->total_deduction; ?></th>
				<th></th>
				<th></th>
				<th></th>
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