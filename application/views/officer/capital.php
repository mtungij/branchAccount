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
						Add Capital
					</h3>
				</div>
			</div>
			<!--begin::Form-->
			<!-- <form method="post" action="ss" class="kt-form kt-form--label-right" id="kt_form_2"> -->
				<?php echo form_open("admin/create_capital",['class'=>'kt-form kt-form--label-right','novalidate']); ?>

				<div class="kt-portlet__body">
					<div class="kt-section">
						<div class="kt-section__content">
							<div class="form-group form-group-last row">
								<div class="col-lg-4 form-group-sub">
									<label class="form-control-label">* Share Holder Name:</label>
								<select type="text" name="share_id" class="form-control input-sm" required>
								<option value="">Select Share Holder</option>
								<?php foreach ($share as $shares): ?>
								<option value="<?php echo $shares->share_id; ?>"><?php echo $shares->share_name; ?></option>
								<?php endforeach; ?>
							</select>
								</div>
								<div class="col-lg-4 form-group-sub">
									<label class="form-control-label">*Amount:</label>
									<input type="number" name="amount" placeholder="Amount" autocomplete="off" class="form-control input-sm" required>
								</div>
								<input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">
								<div class="col-lg-4 form-group-sub">
									<label  class="form-control-label">*Pay Method:</label>
							<select type="text" name="pay_method" class="form-control input-sm" required>
								<option value="">Select</option>
							    <option value="CASH">CASH</option>
								<option value="NMB">NMB</option>
								<option value="CRDB">CRDB</option>
								<option value="TPB">TPB</option>
								<option value="EQUITY">EQUITY</option>
								<option value="NBC">NBC</option>
								<option value="STANBIC">STANBIC</option>
								<option value="STANBIC">EXIM</option>
								<option value="ACCESS">ACCESS</option>
								<option value="Absa">Absa</option>
							</select>
								</div>

								<div class="col-lg-6 form-group-sub">
									<label  class="form-control-label">*Receipt no:</label>
							<input type="number" name="recept" placeholder="Receipt" autocomplete="off" class="form-control input-sm" >
								</div>
								<div class="col-lg-6 form-group-sub">
									<label  class="form-control-label">*Cheque Number:</label>
								<input type="number" name="chaque_no" placeholder="Cheque number" autocomplete="off" class="form-control input-sm" >
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
				Capital List
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		&nbsp;
		<a href="<?php echo base_url("admin/print_general_report"); ?>" class="btn btn-brand btn-elevate btn-icon-sm" target="_blank">
			<i class="flaticon-technology"></i>
			Print
		</a>
	</div>	
</div>		</div>
	</div>

	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-layout table-hover table-checkable" id="kt_table_1">
									     <thead>
			  						          <tr>
		  							    <th>S/No</th>
		  							    <th>Share Holder</th>
										<th>Amount</th>
										<th>Pay method</th>
										<th>Receipt no</th>
										<th>Chaque no</th>
										<th>Action</th>
				  									
				  									
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                          <?php $no = 1; ?>
									<?php foreach($capital  as $capitals): ?>
									          <tr>
				  					<td><?php echo $no++; ?>.</td>
				  					<td><?php echo $capitals->share_name; ?></td>
				  					<td><?php echo number_format($capitals->amount); ?>/=</td>
				  					<td><?php echo $capitals->pay_method; ?></td>
				  					<td>
				  						<?php if ($capitals->recept == TRUE) {
				  						 ?>
				  						<?php echo $capitals->recept; ?>
				  					<?php }else{ ?>
				  						-
				  						<?php } ?>
				  							
				  						</td>
				  					<td>
				  						<?php if ($capitals->chaque_no == TRUE) {
				  						 ?>
				  						<?php echo $capitals->chaque_no; ?>
				  						<?php }else{ ?>
				  						-
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
						<a href="#" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_<?php echo $capitals->capital_id; ?>">
							<i class="kt-nav__link-icon flaticon-edit" ></i>
							<span class="kt-nav__link-text">Edit</span>
						</a>
					</li>
					<li class="kt-nav__item">
						<a href="<?php echo base_url("admin/delete_capital/{$capitals->capital_id}") ?>" class="kt-nav__link" onclick="return confirm('Are you sure?')">
							<i class="kt-nav__link-icon flaticon-delete"></i>
							<span class="kt-nav__link-text">Delete</span>
						</a>
					</li>
					
					
				</ul>
			</div>
	</div>
</td>			  											  							
</tr>

<div class="modal fade" id="kt_modal_<?php echo $capitals->capital_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Capital</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("admin/edit_capital/{$capitals->capital_id}"); ?>

                 	<div class="kt-portlet__bod">
					<div class="kt-section">
						<div class="kt-section__content">
							<div class="form-group form-group-last row">
								<div class="col-lg-4 form-group-sub">
									<label class="form-control-label">* Share Holder Name:</label>
								<select type="text" name="share_id" class="form-control input-sm" required>
								<option value="<?php echo $capitals->share_id; ?>"><?php echo $capitals->share_name; ?></option>
								<?php foreach ($share as $shares): ?>
								<option value="<?php echo $shares->share_id; ?>"><?php echo $shares->share_name; ?></option>
								<?php endforeach; ?>
							</select>
								</div>
								<div class="col-lg-4 form-group-sub">
									<label class="form-control-label">*Amount:</label>
									<input type="number" name="amount" placeholder="Amount" autocomplete="off" value="<?php echo $capitals->amount; ?>" class="form-control input-sm" required>
								</div>
								
								<div class="col-lg-4 form-group-sub">
									<label  class="form-control-label">*Pay Method:</label>
							<select type="text" name="pay_method" class="form-control input-sm" required>
								<option value="<?php echo $capitals->pay_method; ?>"><?php echo $capitals->pay_method; ?></option>
								<option value="CASH">CASH</option>
								<option value="NMB">NMB</option>
								<option value="CRDB">CRDB</option>
								<option value="TPB">TPB</option>
								<option value="EQUITY">EQUITY</option>
								<option value="NBC">NBC</option>
								<option value="STANBIC">STANBIC</option>
								<option value="STANBIC">EXIM</option>
								<option value="ACCESS">ACCESS</option>
								<option value="Absa">Absa</option>
							</select>
								</div>

								<div class="col-lg-6 form-group-sub">
									<label  class="form-control-label">*Recept no:</label>
							<input type="number" name="recept" placeholder="Recept" autocomplete="off" value="<?php echo $capitals->recept; ?>" class="form-control input-sm" >
								</div>
								<div class="col-lg-6 form-group-sub">
									<label  class="form-control-label">*Cheque Number:</label>
								<input type="number" name="chaque_no" placeholder="Cheque number" autocomplete="off" value="<?php echo $capitals->chaque_no; ?>" class="form-control input-sm" >
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
	                		<th></th>
	                		<th></th>
	                		<th><b>GENERAL REPORT</b></th>
	                		<th></th>
	                		<th></th>
	                		<th></th>
	                		<th></th>
	                	</tr>
                    <tr>
               <th></th>
               <th style="color: green;">TOTAL CAPITAL</th>
				<th style="color: green;"><?php //echo number_format($total_capital->totalCapital + $cash_bank->totall_cash); ?> </th>
				<th>TOTAL INTEREST</th>
				<th><?php echo number_format($sum_total_loanInt->total_interest); ?></th>
				<th></th>
				<th></th>
                    </tr>

                <tr>
               <th></th>
               <th style="color: orange;">TOTAL LOAN EXPECTATION RECEIVABLE</th>
				<th style="color: orange;"><?php echo number_format($total_expect->loan_interest); ?></th>
				<th>TOTAL INCOME</th>
				<th><?php echo number_format($sum_total_comp_income->total_receved); ?></th>
				<th></th>
				<th></th>
                    </tr>

                     <tr>
               <th></th>
               <th style="color: blue;">TOTAL LOAN RETURNED</th>
				<th style="color: blue;"><?php echo number_format($sum_depost_loan->sum_depost); ?></th>
				<th>TOTAL LOAN FEE</th>
				<th><?php echo number_format($total_loanFee->sum_withdraw); ?></th>
				<th></th>
				<th></th>
                    </tr>
                    <tr>
                    	<th></th>
                    	<th></th>
                    	<th></th>
                    	<th>TOTAL EXPENSES</th>
                    	<th><?php echo number_format($total_expences->total_request); ?></th>
                    	<th></th>
                    	<th></th>
                    	<th></th>
                    </tr>

                     <tr>
                    	<th></th>
                    	<th></th>
                    	<th></th>
                    	<th style="color:cyan">COMPANY PROFIT</th>
                    	<th style="color:cyan"><?php echo number_format($sum_total_loanInt->total_interest + $sum_total_comp_income->total_receved + $total_loanFee->sum_withdraw -($total_expences->total_request)); ?></th>
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