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
         <?php if ($das = $this->session->flashdata('error')): ?>
	  <div class="alert alert-danger fade show alert-danger" role="alert">
                            <div class="alert-icon"><i class="flaticon2-delete"></i></div>
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
				Branch Accounting Summary
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		<!-- &nbsp;
		<a href="javascript:;" class="btn btn-brand btn-elevate btn-icon-sm">
			<i class="la la-calender"></i>
			previous
		</a> -->
	</div>	
</div>		</div>
	</div>

	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
									     <thead>
			  						          <tr>
				  						
												<th>Branch Account Balance</th>
												<th>Principal Repayment</th>
												<th>Interest Repayment</th>
												<th>Deducted Fee</th>
												<th>Non Deducted Fee</th>
												
				  									
				  									
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                        <?php //$no = 1; ?>
							<?php //foreach ($transfor_data as $transfor_datas): ?>
									          <tr>
				  			 <td>
				  			 	<b><?php echo number_format($blanch_amount->total_amount); ?></b>
				  			 	
				  			 		
				  			 	</td> 
				  			 <td>
				  			 	<b style="color: green;">(<?php echo number_format($principal_withdrawal->total_principal_with); ?>)</b> 
				  			 	 - <b style="color:red;">(<?php echo number_format($principal_out->total_principal_out); ?>)</b>
				  			 </td> 
				  			 <td><b style="color:green;">(<?php echo number_format($interest_withdrawal->total_interest_withdrawal); ?>)</b> - <b style="color:red;">(<?php echo number_format($interest_out->total_interest_out); ?>)</b></td> 
				  			 <td><?php echo number_format($deducted_fee->total_deducted_fee); ?></td> 	
				  			 <td><?php echo number_format($non_deducted->total_nonBalance); ?></td> 	
				  											  							
                     </tr>

                            <?php //endforeach; ?>
									
	                </tbody>
	              <!--   <tfoot>
                    <tr>
					<th>TOTAL</th>
					<th></th>
					<th></th>
					<th><?php //echo number_format($total_transfor->total_tranfor); ?></th>
					<th></th>
                    </tr>
                   </tfoot> -->
                   </table>
		<!--end: Datatable -->
	</div>
</div>

       <div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon-list-2"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Branch capital Summary
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		<!-- &nbsp;
		<a href="javascript:;" class="btn btn-brand btn-elevate btn-icon-sm">
			<i class="la la-calender"></i>
			previous
		</a> -->
	</div>	
</div>		</div>
	</div>

	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
									     <thead>
			  						          <tr>
				  						
												<th>Branch Account Name</th>
												<th>Balance</th>
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                        <?php //$no = 1; ?>
							<?php foreach ($blanch_account as $blanch_accounts): ?>
									          <tr>
				  			 <td>
				  			 	<b><?php echo $blanch_accounts->account_name; ?></b>
				  			 	
				  			 		
				  			 	</td> 
				  			 <td>
				  			 	<b><?php echo number_format($blanch_accounts->blanch_capital); ?></b> 
				  			 	 
				  			 </td> 							  							
                         </tr>

                            <?php endforeach; ?>
									
	                </tbody>
	              <!--   <tfoot>
                    <tr>
					<th>TOTAL</th>
					<th></th>
					<th></th>
					<th><?php //echo number_format($total_transfor->total_tranfor); ?></th>
					<th></th>
                    </tr>
                   </tfoot> -->
                   </table>
		<!--end: Datatable -->
	</div>
</div>

    <div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon-list-2"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Principal Repayment Summary
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		<!-- &nbsp;
		<a href="javascript:;" class="btn btn-brand btn-elevate btn-icon-sm">
			<i class="la la-calender"></i>
			previous
		</a> -->
	</div>	
</div>		</div>
	</div>

	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
									     <thead>
			  						          <tr>
				  						
												<th>Branch Account Name</th>
												<th>Balance</th>
												<th>Loan Status</th>
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                        <?php //$no = 1; ?>
							<?php foreach ($principal_account as $principal_accounts): ?>
									          <tr>
				  			 <td>
				  			 	<b><?php echo $principal_accounts->account_name; ?></b>
				  			 	
				  			 		
				  			 	</td> 
				  			 <td>
				  			 	<b><?php echo number_format($principal_accounts->principal_balance); ?></b> 
				  			 	 
				  			 </td> 
				  			 <td>
				  			 	<?php if ($principal_accounts->princ_status == 'withdrawal') {
				  			 	 ?>
				  			 	 ACTIVE
				  			 	<?php }elseif($principal_accounts->princ_status == 'out'){ ?>
				  			 	    DEFAULT
				  			 		<?php } ?>
				  			 	</td>							  							
                         </tr>

                            <?php endforeach; ?>
									
	                </tbody>
	              <!--   <tfoot>
                    <tr>
					<th>TOTAL</th>
					<th></th>
					<th></th>
					<th><?php //echo number_format($total_transfor->total_tranfor); ?></th>
					<th></th>
                    </tr>
                   </tfoot> -->
                   </table>
		<!--end: Datatable -->
	</div>
</div>

<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon-list-2"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Interest Repayment Summary
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		<!-- &nbsp;
		<a href="javascript:;" class="btn btn-brand btn-elevate btn-icon-sm">
			<i class="la la-calender"></i>
			previous
		</a> -->
	</div>	
</div>		</div>
	</div>

	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
									     <thead>
			  						          <tr>
				  						
												<th>Branch Account Name</th>
												<th>Balance</th>
												<th>Loan Status</th>
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                        <?php //$no = 1; ?>
							<?php foreach ($interest_account as $interest_accounts): ?>
									          <tr>
				  			 <td>
				  			 	<b><?php echo $interest_accounts->account_name; ?></b>
				  			 	
				  			 		
				  			 	</td> 
				  			 <td>
				  			 	<b><?php echo number_format($interest_accounts->capital_interest); ?></b> 
				  			 	 
				  			 </td> 
				  			 <td>
				  			 	<?php if ($interest_accounts->int_status == 'withdrawal') {
				  			 	 ?>
				  			 	 ACTIVE
				  			 	<?php }elseif($interest_accounts->int_status == 'out'){ ?>
				  			 	    DEFAULT
				  			 		<?php } ?>
				  			 	</td>							  							
                         </tr>

                            <?php endforeach; ?>
									
	                </tbody>
	              <!--   <tfoot>
                    <tr>
					<th>TOTAL</th>
					<th></th>
					<th></th>
					<th><?php //echo number_format($total_transfor->total_tranfor); ?></th>
					<th></th>
                    </tr>
                   </tfoot> -->
                   </table>
		<!--end: Datatable -->
	</div>
</div>


       <div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon-list-2"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Today Loan withdrawal & Principal Repayment & interest Repayment & Expenses & Deducted Fee & Non Deducted Fee Summary
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		<!-- &nbsp;
		<a href="javascript:;" class="btn btn-brand btn-elevate btn-icon-sm">
			<i class="la la-calender"></i>
			previous
		</a> -->
	</div>	
</div>		</div>
	</div>

	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
									     <thead>
			  						          <tr>
				  						
												<th>Account Name</th>
												<th>Loan Withdrawal</th>
												<th>Principal Repayment</th>
												<th>Interest Repayment</th>
												<th>Expenses</th>
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                        <?php //$no = 1; ?>
							<?php foreach ($money_transaction as $money_transactions): ?>
									          <tr>
				  			 <td>
				  			 	<b><?php echo $money_transactions->account_name; ?></b>
				  			 	
				  			 		
				  			 	</td> 
				  			 <td>
				  			 	<b><?php echo number_format($money_transactions->total_with); ?></b> 
				  			 	 
				  			 </td> 
				  			  <td>
				  			 	<b style="color:green;">(<?php echo number_format($money_transactions->total_principal_repayment); ?>)</b> - <b style="color:red;">(<?php echo number_format($money_transactions->total_principal_out); ?>)</b>
				  			 	 
				  			 </td>
				  			  <td>
				  			 	<b style="color:green;">(<?php echo number_format($money_transactions->total_interest_with); ?>)</b> - <b style="color:red;">(<?php echo number_format($money_transactions->total_interest_out); ?>)</b> 
				  			 	 
				  			 </td>
				  			  <td>
				  			 	<b><?php echo number_format($money_transactions->total_expenses); ?></b> 
				  			 	 
				  			 </td>
				  										  							
                         </tr>

                            <?php endforeach; ?>
									
	                </tbody>
	               <tfoot>
                    <tr>
					<th>TOTAL</th>
					<th><?php echo number_format($total_with_loan->total_loan_withdrawal_today) ?></th>
					<th><?php echo number_format($total_principal->total_principal_rep); ?></th>
					<th><?php echo number_format($total_interest->total_interest_rep); ?></th>
					<th><?php echo number_format($sum_exp_request->total_request_amount); ?></th>
                    </tr>
                      
                    <tr>
					<th>TOTAL DEDUCTED FEE</th>
					<th><?php echo number_format($today_deducted->total_deducted_today) ?></th>
					<th><?php //echo number_format($total_principal->total_principal_rep); ?></th>
					<th><?php //echo number_format($total_interest->total_interest_rep); ?></th>
					<th><?php //echo number_format($sum_exp_request->total_request_amount); ?></th>
                    </tr>
                    <tr>
					<th>TOTAL NON DEDUCTED FEE</th>
					<th><?php echo number_format($today_non_deducted->total_receive_today) ?></th>
					<th><?php //echo number_format($total_principal->total_principal_rep); ?></th>
					<th><?php //echo number_format($total_interest->total_interest_rep); ?></th>
					<th><?php //echo number_format($sum_exp_request->total_request_amount); ?></th>
                    </tr>
                   </tfoot>
               </table>
		<!--end: Datatable -->
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Principal & Interest Transfar
					</h3>
				</div>
			</div>
			<!--begin::Form-->
			<!-- <form method="post" action="ss" class="kt-form kt-form--label-right" id="kt_form_2"> -->
				<?php echo form_open("oficer/create_transfor_principal",['class'=>'kt-form kt-form--label-right','novalidate']); ?>
				<div class="kt-portlet__body">
					<div class="kt-section">
						<div class="kt-section__content">
							<div class="form-group form-group-last row">
				
				<div class="col-lg-3 form-group-sub">
					<label class="form-control-label">Selecting Type*:</label>
				<select class="form-control kt-selectpicker" name="from_payment" required data-live-search="true">
						<option value="">Selecting Type</option>
						<option value="principal">Principal</option>
						<option value="interest">Interest</option>
					</select>
				</div>

				<div class="col-lg-3 form-group-sub">
					<label class="form-control-label">*Loan Type:</label>
				<select class="form-control select2" name="loan_type" required>
						<option value="">Select  Loan Type</option>
						<option value="withdrawal">Active Loan</option>
						<option value="out">Default Loan</option>
					</select>
				</div>

					<div class="col-lg-3 form-group-sub">
					<label class="form-control-label">*Account:</label>
				<select class="form-control kt-selectpicker" name="from_account" required data-live-search="true">
				<option value="">Select Account type</option>
					<?php foreach ($acount as $acounts): ?>
				   <option value="<?php echo $acounts->trans_id; ?>"><?php echo $acounts->account_name; ?></option>
					<?php endforeach; ?>
					</select>
				   </div>

				  

					<div class="col-lg-3 form-group-sub">
					<label class="form-control-label">Amount*</label>
					<input type="number" name="balance" autocomplete="off" class="form-control" placeholder="Amount">
					</div>
				    <input type="hidden" name="comp_id" value="<?php echo $empl_data->comp_id; ?>">
					<input type="hidden" name="blanch_id" value="<?php echo $empl_data->blanch_id; ?>">
			
							</div>
						</div>
					</div>
				</div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<div class="row">
							<div class="col-lg-12">
								<div class="text-center">
								<button type="submit" class="btn btn-brand  btn-elevate btn-pill btn-sm">Transfar</button>
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
				Today Transaction
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		&nbsp;
		<!-- <a href="javascript:;" class="btn btn-brand btn-elevate btn-icon-sm">
			<i class="la la-calender"></i>
			previous
		</a> -->
	</div>	
</div>		</div>
	</div>

	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
									     <thead>
			  						          <tr>
				  						
												<th>Type</th>
												<th>Loan Type</th>
												<th>Account</th>
												<th>Amount</th>
												<th>Date</th>
												
				  									
				  									
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                        <?php //$no = 1; ?>
							<?php foreach ($transfor_data as $transfor_datas): ?>
									          <tr>
				  			 <td>
				  			 	<?php if ($transfor_datas->from_payment == 'interest') {
				  		            echo "INTEREST";
				  			 	 ?>
				  			 	<?php }elseif($transfor_datas->from_payment == 'principal'){
				  			 	 ?>
				  			 	 PRINCIPAL
				  			 	 <?php } ?>
				  			 	
				  			 		
				  			 	</td> 
				  			 <td>
				  			 	<?php if ($transfor_datas->loan_type == 'withdrawal') {
				  			 	 ?>
				  			 	 ACTIVE
				  			 	<?php }elseif ($transfor_datas->loan_type == 'out') {
				  			 	 ?>
				  			 	 DEFAULT
				  			 	 <?php } ?>
				  			 	</td> 
				  			 <td><?php echo $transfor_datas->account_name; ?></td> 
				  			 <td><?php echo number_format($transfor_datas->balance); ?></td> 	
				  			 <td><?php echo $transfor_datas->date_trans; ?></td> 	
				  											  							
                     </tr>

                            <?php endforeach; ?>
									
	                </tbody>
	                <tfoot>
                    <tr>
					<th>TOTAL</th>
					<th></th>
					<th></th>
					<th><?php echo number_format($total_transfor->total_tranfor); ?></th>
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


<script>
$(document).ready(function(){
$('#blanch').change(function(){
var blanch_id = $('#blanch').val();
//alert(blanch_id)
if(blanch_id != ''){

$.ajax({
url:"<?php echo base_url(); ?>admin/fetch_ward_data",
method:"POST",
data:{blanch_id:blanch_id},
success:function(data)
{
$('#customer').html(data);
//$('#district').html('<option value="">All</option>');
}
});
}
else
{
$('#customer').html('<option value="">Select customer</option>');
//$('#district').html('<option value="">All</option>');
}
});



$('#customer').change(function(){
var customer_id = $('#customer').val();
 //alert(customer_id)
if(customer_id != '')
{
$.ajax({
url:"<?php echo base_url(); ?>oficer/fetch_loanActive",
method:"POST",
data:{customer_id:customer_id},
success:function(data)
{
$('#loan').html(data);
//$('#malipo_name').html('<option value="">select center</option>');
}
});
}
else
{
$('#loan').html('<option value="">Select Active loan</option>');
//$('#malipo_name').html('<option value="">chagua vipimio</option>');
}
});

// $('#social').change(function(){
//  var district_id = $('#social').val();
//  if(district_id != '')
//  {
//   $.ajax({
//    url:"<?php echo base_url(); ?>user/fetch_data_malipo",
//    method:"POST",
//    data:{district_id:district_id},
//    success:function(data)
//    {
//     $('#malipo_name').html(data);
//     //$('#malipo').html('<option value="">chagua malipo</option>');
//    }
//   });
//  }
//  else
//  {
//   //$('#vipimio').html('<option value="">chagua vipimio</option>');
//   $('#malipo_name').html('<option value="">chagua vipimio</option>');
//  }
// });


});
</script>

<script>
    $('.select2').select2();
</script>