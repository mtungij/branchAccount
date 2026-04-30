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
<div class="row">
	<div class="col-lg-12">
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Saving Deposit
					</h3>
				</div>
			</div>
			<!--begin::Form-->
			<!-- <form method="post" action="ss" class="kt-form kt-form--label-right" id="kt_form_2"> -->
				<?php echo form_open("oficer/create_saving_deposit",['class'=>'kt-form kt-form--label-right','novalidate']); ?>
				<div class="kt-portlet__body">
					<div class="kt-section">
						<div class="kt-section__content">
							<div class="form-group form-group-last row">
								<div class="col-lg-4 form-group-sub">
									<label class="form-control-label">*Provider:</label>
                                    <select type="text" name="provider" id="" required class="form-control select2">
                                        <option value="">Select Provider</option>
                                        <option value="M-PESA">M-PESA</option>
                                        <option value="TIGO-PESA">TIGO-PESA</option>
                                        <option value="HALO-PESA">HALO-PESA</option>
                                        <option value="AIRTEL MONEY">AIRTEL MONEY</option>
                                        <option value="NMB">NMB</option>
                                        <option value="CRDB">CRDB</option>
                                    </select>
								</div>
								<div class="col-lg-4 form-group-sub">
									<label class="form-control-label">* Agent Name:</label>
									<input type="text" name="agent" placeholder="Agent Name" autocomplete="off" class="form-control" required>
								</div>
								<?php $date = date("Y-m-d"); ?>
								<input type="hidden" name="comp_id" value="<?php echo $empl_data->comp_id; ?>">
								<input type="hidden" name="blanch_id" value="<?php echo $empl_data->blanch_id; ?>">
								<input type="hidden" name="date" value="<?php echo $date; ?>">
								<div class="col-lg-4 form-group-sub">
									<label  class="form-control-label">* Reference Number:</label>
									<input type="text" name="ref_no" placeholder="Reference Number " autocomplete="off" class="form-control" required>
								</div>

								<div class="col-lg-6 form-group-sub">
									<label  class="form-control-label">*Amount:</label>
									<input type="number" name="amount" placeholder="Amount" autocomplete="off" class="form-control" required>
								</div>
								<div class="col-lg-6 form-group-sub">
									<label  class="form-control-label">*Time:</label>
									<input type="text" name="time" placeholder="Time" autocomplete="off" class="form-control" required>
								</div>

								<div class="col-lg-12 form-group-sub">
									<label  class="form-control-label">*Description:</label>
                                    <textarea type="text" name="description"  rows="4" placeholder="Enter Description" class="form-control"></textarea>
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
				Saving Deposit List
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
				  							    <th>Provider</th>
												<th>Agent Name</th>
												<th>Reference Number</th>
												<th>Amount</th>
												<th>Time</th>
												<th>Description</th>
												<th>Date</th>
												<th>Action</th>
				  									
				  									
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                          <?php $no = 1; ?>
									<?php foreach($miamala  as $miamalas): ?>
									          <tr>
				  					<td><?php echo $miamalas->provider; ?></td>
				  					<td><?php echo $miamalas->agent; ?></td>
				  					<td><?php echo $miamalas->ref_no ?></td>
				  					<td><?php echo number_format($miamalas->amount); ?></td>
				  					<td><?php echo $miamalas->time; ?></td>
				  					<td><?php echo $miamalas->description ?></td>
				  					<td><?php echo $miamalas->date; ?></td>
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
						<a href="#" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_<?php echo $miamalas->id; ?>">
							<i class="kt-nav__link-icon flaticon-edit" ></i>
							<span class="kt-nav__link-text">Edit</span>
						</a>
					</li>
					<li class="kt-nav__item">
						<a href="<?php echo base_url("oficer/delete_miamala/{$miamalas->id}") ?>" class="kt-nav__link" onclick="return confirm('Are you sure?')">
							<i class="kt-nav__link-icon flaticon-delete"></i>
							<span class="kt-nav__link-text">Delete</span>
						</a>
					</li>
					
					
				</ul>
			</div>
	</div>
</td>			  											  							
</tr>

<div class="modal fade" id="kt_modal_<?php echo $miamalas->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("oficer/modify_saving_deposit/{$miamalas->id}"); ?>
                  <div class="kt-portlet__bod">
					<div class="kt-section">
						<div class="kt-section__content">
							<div class="form-group form-group-last row">
								<div class="col-lg-4 form-group-sub">
									<label class="form-control-label">* provider:</label>
									<select type="" name="provider" class="form-control">
										<option value="<?php echo $miamalas->provider; ?>"><?php echo $miamalas->provider; ?></option>
                                        <option value="M-PESA">M-PESA</option>
                                        <option value="TIGO-PESA">TIGO-PESA</option>
                                        <option value="HALO-PESA">HALO-PESA</option>
                                        <option value="AIRTEL MONEY">AIRTEL MONEY</option>
                                        <option value="NMB">NMB</option>
                                        <option value="CRDB">CRDB</option>
									</select>
								</div>
								<div class="col-lg-4 form-group-sub">
									<label class="form-control-label">* Agent Name:</label>
									<input type="text" name="agent" placeholder="Agent Name" value="<?php echo $miamalas->agent; ?>" autocomplete="off" class="form-control" required>
								</div>
								
								<div class="col-lg-4 form-group-sub">
									<label  class="form-control-label">* Amount:</label>
									<input type="number" name="amount" placeholder="Amount" autocomplete="off" value="<?php echo $miamalas->amount; ?>" class="form-control" required>
								</div>

								<div class="col-lg-6 form-group-sub">
									<label  class="form-control-label">*Reference Number:</label>
							     <input type="text" name="ref_no" placeholder="Reference Number" autocomplete="off" value="<?php echo $miamalas->ref_no; ?>" class="form-control" required>
								</div>
								<div class="col-lg-6 form-group-sub">
									<label  class="form-control-label">*Time:</label>
									<input type="text" name="time" placeholder="Date of Birth" autocomplete="off" value="<?php echo $miamalas->time; ?>" class="form-control" required>
								</div>

                                <div class="col-lg-12 form-group-sub">
									<label  class="form-control-label">*Time:</label>
                                    <textarea type="text" name="description" class="form-control" rows="4"><?php echo $miamalas->description; ?></textarea>
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
                   </table>
		<!--end: Datatable -->
	</div>
</div>
</div>
<!-- end:: Content -->
<!-- end:: Content -->
				</div>				
				
<?php include('incs/footer_1.php') ?>

<script>
    $('.select2').select2();
</script>