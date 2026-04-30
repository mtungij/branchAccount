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

<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon-list-2"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Loan Withdrawal
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		&nbsp;
		 <a href="" class="btn btn-info" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_4"><i class="kt-menu__link-icon flaticon2-search-1"></i>Filter</a>
		<a href="<?php echo base_url("admin/print_loan_withdrawal") ?>" class="btn btn-brand btn-elevate btn-icon-sm" target="_blank">
			<i class="flaticon-technology"></i>
			Print
		</a>
	</div>	
</div>		</div>
	</div>

	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
									     <thead>
			  						          <tr>
		  							   <th><b>Customer Name</b></th>
										<th><b>Branch Name</b></th>
										<th><b>Loan Ac</b></th>
										<th><b>Loan Product</b></th>
										<th><b>Loan Interest</b></th>
										<th><b>Loan Withdrawal</b></th>
										<th><b>Principal + interest</b></th>
										<th><b>Method</b></th>
										<th><b>Duration Type</b></th>
										<th><b>Number of Repayment</b></th>
										<th><b>Restoration</b></th>
										<th><b>Withdrawal Date</b></th>
										<th><b>End Date</b></th>
										<th><b>Action</b></th>
				  									
				  									
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                        
									<?php foreach($disburse as $loan_aproveds): ?>
									          <tr>
				  					<td><?php echo $loan_aproveds->f_name; ?> <?php echo substr($loan_aproveds->m_name, 0,1); ?> <?php echo $loan_aproveds->l_name; ?></td>
				  					<td><?php echo $loan_aproveds->blanch_name; ?></td>
				  					<td><?php echo $loan_aproveds->loan_code; ?></td>
				  					<td><?php echo $loan_aproveds->loan_name; ?></td>
				  					<!-- <td><?php //echo number_format($loan_aproveds->loan_aprove); ?></td> -->
				  			       <td><?php echo $loan_aproveds->interest_formular; ?>%</td> 
				  					<td><?php echo number_format($loan_aproveds->loan_aprove); ?></td>
				  					<td><?php echo number_format($loan_aproveds->loan_int); ?></td>
				  					<td><?php echo $loan_aproveds->account_name; ?></td>
				  					<td><?php if ($loan_aproveds->day == 1) {
				  								 echo "Daily";
				  							 ?>
				  							<?php }elseif($loan_aproveds->day == 7){
                                                  echo "Weekly";
				  							 ?>
				  							
				  						<?php }elseif($loan_aproveds->day == 30 || $loan_aproveds->day == 31 || $loan_aproveds->day == 28 || $loan_aproveds->day == 29){
				  						        echo "Monthly"; 
				  							?>
				  							<?php } ?></td>
				  					<td><?php echo $loan_aproveds->session ?></td>
				  					<td>
				  			<?php echo number_format($loan_aproveds->restration); ?>
				  					</td>
				  	
				  						<td>
				 <?php echo substr($loan_aproveds->loan_stat_date, 0,10); ?>
				                        </td>
				                        <td><?php echo substr($loan_aproveds->loan_end_date, 0,10); ?></td>
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
                     <?php if ($loan_aproveds->penat_status == 'NO') {
				                        	 ?>
					<li class="kt-nav__item">
						<a href="<?php echo base_url("admin/start_penart/$loan_aproveds->loan_id"); ?>" onclick="return confirm('Are you sure?')" class="kt-nav__link">
							<i class="kt-nav__link-icon flaticon-eye" ></i>
							<span class="kt-nav__link-text">Start penart</span>
						</a>
					</li>
					<?php }elseif ($loan_aproveds->penat_status == 'YES') {
				                        	 ?>
					<li class="kt-nav__item">
						<a href="" class="kt-nav__link"data-toggle="modal" data-target="#kt_modal_2<?php echo $loan_aproveds->loan_id; ?>">
							<i class="kt-nav__link-icon flaticon-eye" ></i>
							<span class="kt-nav__link-text">Stop Penart</span>
						</a>
					</li>
					<?php } ?>
					<li class="kt-nav__item">
						<a href="" class="kt-nav__link"data-toggle="modal" data-target="#kt_modal_3<?php echo $loan_aproveds->loan_id; ?>">
							<i class="kt-nav__link-icon flaticon-edit" ></i>
							<span class="kt-nav__link-text">Top Up</span>
						</a>
					</li>
					
					<li class="kt-nav__item">
						<a href="<?php echo base_url("admin/delete_loanwith/{$loan_aproveds->loan_id}") ?>" class="kt-nav__link" onclick="return confirm('Are you sure?')">
							<i class="kt-nav__link-icon flaticon-delete"></i>
							<span class="kt-nav__link-text">Delete</span>
						</a>
					</li>
				</ul>
			</div>
	</div>
 </td>
				                       
				  											  							
                                   </tr>
    <div class="modal fade" id="kt_modal_2<?php echo $loan_aproveds->loan_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reason To Stop Penalt</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("admin/stop_penart/{$loan_aproveds->loan_id}"); ?>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                        <label for="recipient-name"  class="form-control-label">Reason</label>
                        <textarea type="text" name="description" required rows="4" class="form-control" style="border:radius"></textarea> 
                        </div>
                                   
                            <input type="hidden" value="<?php echo $_SESSION['comp_id']; ?>" name="comp_id">
                            <input type="hidden" value="<?php echo $loan_aproveds->blanch_id; ?>" name="blanch_id">
                            <input type="hidden" value="<?php echo $loan_aproveds->loan_id; ?>" name="loan_id">
                    </div>
                      
                 </div>
                 <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit Reason</button>
                <button type="reset" class="btn btn-danger">Reset</button>

            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
</div>
<!--end::Modal-->

<div class="modal fade" id="kt_modal_3<?php echo $loan_aproveds->loan_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Top Up Loan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("admin/create_topup_loans/{$loan_aproveds->loan_id}"); ?>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                            <label class="form-control-label">*Select Loan Category:</label>
                            <select type="number" name="category_id" class="form-control" required>
								      	<option value="">Select Loan Category</option>
								      	<?php foreach ($loan_category as $loan_categorys): ?>
								      	<option value="<?php echo $loan_categorys->category_id; ?>"><?php echo $loan_categorys->loan_name; ?> / <?php echo $loan_categorys->loan_price; ?> - <?php echo $loan_categorys->loan_perday; ?></option>
								      	<?php endforeach; ?>
							</select>
                               
                        </div>
                           
                      <div class="col-lg-6">
                          <label class="form-control-label">Loan Amount:</label>
                            <input type="number" name="topup_amount" class="form-control">
                        </div>
                         <div class="col-lg-6 form-group-sub">
								<label  class="form-control-label">*Loan Duration:</label>
									<select type="number" name="day" class="form-control" required class="form-control input-sm">
									<option value="">Select Duration</option>
									<option value="1">Daily</option>
									<option value="7">Weekely</option>
									<?php 
									$month = date("m");
                                     $year = date("Y");
                                     $d = cal_days_in_month(CAL_GREGORIAN,$month,$year);
									 ?>
							        <option value="<?php echo $d; ?>">Monthly</option>
									
								</select>
								<input type="hidden" name="comp_id"  value="<?php echo $loan_aproveds->comp_id; ?>">
								<input type="hidden" name="blanch_id"  value="<?php echo $loan_aproveds->blanch_id; ?>">
								<input type="hidden" name="loan_id"  value="<?php echo $loan_aproveds->loan_id; ?>">
								<input type="hidden" name="customer_id"  value="<?php echo $loan_aproveds->customer_id; ?>">
								<input type="hidden" name="empl_id"  value="<?php echo $loan_aproveds->empl_id; ?>">
								<input type="hidden" name="group_id"  value="<?php echo $loan_aproveds->group_id; ?>">
								<?php $date = date("Y-m-d"); ?>
								<input type="hidden" name="top_date"  value="<?php echo $date ?>">
								</div>
									<div class="col-lg-6 form-group-sub">
										<label  class="form-control-label">*Number of Repayments:</label>
								<input type="number" name="session" placeholder="Enter Number of Repayments" autocomplete="off" class="form-control input-sm" required>
									</div>
									<div class="col-lg-6 form-group-sub">
										<label class="form-control-label"><b>*Interest Formular:</b></label>
									<select type="number" name="rate" class="form-control" required>
											<option value="">Select interest Formular</option>
											<?php foreach ($formular as $formulars): ?>	
											<option value="<?php echo $formulars->formular_name; ?>"><?php if ($formulars->formular_name == 'SIMPLE') {
												 ?>
												 SIMPLE FORMULAR
												<?php }elseif($formulars->formular_name == 'FLAT RATE'){ ?>
                                                 FLAT RATE FORMULAR
													<?php }elseif($formulars->formular_name == 'REDUCING') {
													 ?>
													 REDUCING FORMULAR
													 <?php } ?> 	
											  </option>
										<?php endforeach; ?>
								    </select>
							</div>
							<div class="col-lg-6 form-group-sub">
										<label class="form-control-label"><b>*Does Loan is Deducted From Loan Fee?:</b></label>
										<select type="number" name="fee_status" class="form-control" required>
											<option value="">Select</option>
											<?php if ($loan_fee_category->fee_category == 'GENERAL') {
											 ?>
											<option value="YES">YES</option>
											<option value="NO">NO</option>
										<?php }elseif ($loan_fee_category->fee_category == 'LOAN PRODUCT') {
										 ?>
										 <option value="NO">YES</option>
										 <?php }else{ ?>
											<?php } ?>
										</select>
							</div>
							<div class="col-lg-12 form-group-sub">
										<label  class="form-control-label">*Reason of Applying Loan:</label>
								   <textarea type="text" name="reason" rows="3" autocomplete="off"  class="form-control input-sm" placeholder="Reason of Applying Loan:" required></textarea>
						    </div>
                    </div>  
                 </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!--end::Modal-->
</div>

 

                       <?php endforeach; ?>
									
	                </tbody>
	                <tfoot>
                    <tr>
                                       <th><b>TOTAL</b></th>
										<th><b></b></th>
										<th><b></b></th>
										<th><b></b></th>
										<!-- <th><b><?php //echo number_format($total_loanDis->total_loan); ?></b></th> -->
										<th><b></b></th>
										<th><b><?php echo number_format($total_loanDis->total_loan); ?></b></th>
										<th><b><?php echo number_format($total_interest_loan->total_loan_int); ?></b></th>
										<th><b></b></th>
										<th><b></b></th>
										<th><b></b></th>
										<th><b></b></th>
										<th><b></b></th>
										<th><b></b></th>
										<th><b></b></th>
									
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
		


		