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

            <?php if ($das = $this->session->flashdata('errors')): ?>
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
				CASH FLOW ACCUMULATION - (<?php echo $blanch_capital_name->blanch_name; ?>)
			</h3>
			&nbsp;&nbsp;&nbsp;
		</div>
		
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">
		&nbsp;
	
		<a href="" class="btn btn-info" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_2"><i class="kt-menu__link-icon flaticon2-search-1"></i>Filter</a>
	</div>	
</div>		</div>
	</div>

	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">

						             <thead>
			  						       <tr>
			  						       	
			  						        <th>Account Name</th>
				  						    <th>Amount</th>
				  						    <!-- <th></th> -->
				  						   </tr>
				                     </thead>
						           <?php foreach ($data_accumlation as $blanch_accounts): ?>
						             	<tr>
						             		
						             		<td><?php echo $blanch_accounts->account_name; ?></td>
						             		<td><?php echo number_format($blanch_accounts->blanch_capital); ?></td>
						             		<!-- <td></td> -->

						             	</tr>
						        <?php endforeach; ?>
						        <tr>
						        	<td style="color:orange;"></b>OPENING BALANCE</b></td>
						        	<td style="color: orange;"></b><?php echo number_format($total_blanch_accumlation->total_blanch_capital); ?></b></td>
						        	<!-- <td></td> -->
						        </tr>
                              </table>
	                      </div>
                       </div>


    <div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon-list-2"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				TODAY DEPOST
			</h3>
			&nbsp;&nbsp;&nbsp;
		</div>
		
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">
		&nbsp;
	
		<!-- <a href="<?php //echo base_url("admin/print_all_request"); ?>" class="btn btn-brand btn-elevate btn-icon-sm" data-toggle="modal" data-target="#kt_modal_2">
			<i class="flaticon2-pen"></i>
			 Branch To Company
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
				  						    <th>Amount</th>
				  						    <!-- <th></th> -->
				  						   </tr>
				                     </thead>
						           <?php foreach ($blanch_loan_depost as $today_deposts): ?>
						             	<tr>
						             		
						             		<td><?php echo $today_deposts->account_name; ?></td>
						             		<td><?php echo number_format($today_deposts->total_depost); ?></td>
						             		<!-- <td></td> -->

						             	</tr>
						        <?php endforeach; ?>
						        <tr>
						        	<td style="color:blue;">TOTAL</td>
						        	<td style="color:blue;"><?php echo number_format($total_today_depost_blanch->total_depostinloan); ?></td>
						        	<!-- <td></td> -->
						        </tr>
						        <tr>
						        	<th>Account Name</th>
						        	<th>Amount</th>
						        </tr>
						        <tr>
						        	<?php foreach ($data_out_depost as $loan_depost_outs): ?>
						        	<td><?php echo $loan_depost_outs->account_name ?></td>
						        	<td><?php echo number_format($loan_depost_outs->total_deposOut); ?></td>
						        	<?php endforeach; ?>
						        </tr>
						        <tr>
						        	<td style="color: red;">TOTAL DEBTS PAID TODAY </td>
						        	<td style="color:red;"><?php echo number_format($out_stand_depost->total_deposOutData); ?></td>
						        </tr>
						        <tr>
						        	<td style="color:green;">TOTAL TODAY DEPOST</td>
						        	<td style="color:green;"><?php echo number_format($total_today_depost_blanch->total_depostinloan + $out_stand_depost->total_deposOutData); ?></td>
						        </tr>
                              </table>
	                      </div>
                       </div>


                       <div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon-list-2"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				TODAY WITHDRAWAL
			</h3>
			&nbsp;&nbsp;&nbsp;
		</div>
		
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">
		&nbsp;
	
		<!-- <a href="<?php //echo base_url("admin/print_all_request"); ?>" class="btn btn-brand btn-elevate btn-icon-sm" data-toggle="modal" data-target="#kt_modal_2">
			<i class="flaticon2-pen"></i>
			 Branch To Company
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
				  						    <th>Amount</th>
				  						    <!-- <th></th> -->
				  						   </tr>
				                     </thead>
						           <?php foreach ($today_withdraw as $loan_withdrawals): ?>
						             	<tr>
						             		
						             		<td><?php echo $loan_withdrawals->account_name; ?></td>
						             		<td><?php echo number_format($loan_withdrawals->total_withloan); ?></td>
						             		<!-- <td></td> -->

						             	</tr>
						        <?php endforeach; ?>
						        <tr>
						        	<td>TOTAL WITHDRAWAL</td>
						        	<td><?php echo number_format($sum_loanwithdrawal->total_loanWithdrawal); ?></td>
						        	<!-- <td></td> -->
						        </tr>
                              </table>
	                      </div>
                       </div>



                       <div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon-list-2"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				TODAY EXPENSES
			</h3>
			&nbsp;&nbsp;&nbsp;
		</div>
		
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">
		&nbsp;
	
		<!-- <a href="<?php //echo base_url("admin/print_all_request"); ?>" class="btn btn-brand btn-elevate btn-icon-sm" data-toggle="modal" data-target="#kt_modal_2">
			<i class="flaticon2-pen"></i>
			 Branch To Company
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
				  						    <th>Amount</th>
				  						    <!-- <th></th> -->
				  						   </tr>
				                     </thead>
						           <?php foreach ($expenses_today as $expenses_todays): ?>
						             	<tr>
						             		
						             		<td><?php echo $expenses_todays->account_name; ?></td>
						             		<td><?php echo number_format($expenses_todays->total_expenses); ?></td>
						             		<!-- <td></td> -->

						             	</tr>
						        <?php endforeach; ?>
						        <tr>
						        	<td>TOTAL EXPENSES</td>
						        	<td><?php echo number_format($sum_expenses_data->sum_expenses); ?></td>
						        	<!-- <td></td> -->
						        </tr>
                              </table>
	                      </div>
                       </div>


       <div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon-list-2"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				CLOSING BALANCE
			</h3>
			&nbsp;&nbsp;&nbsp;
		</div>
		
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">
		&nbsp;
	
		<!-- <a href="<?php //echo base_url("admin/print_all_request"); ?>" class="btn btn-brand btn-elevate btn-icon-sm" data-toggle="modal" data-target="#kt_modal_2">
			<i class="flaticon2-pen"></i>
			 Branch To Company
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
				  						    <th>Amount</th>
				  						    <!-- <th></th> -->
				  						   </tr>
				                     </thead>
						           <?php foreach ($data_accumlation as $blanch_accounts): ?>
						             	<tr>
						             		
						             		<td><?php echo $blanch_accounts->account_name; ?></td>
						             		<td><?php echo number_format($blanch_accounts->blanch_capital); ?></td>
						             		<!-- <td></td> -->

						             	</tr>
						        <?php endforeach; ?>
						        <tr>
						        	<td style="color:orange;"><b>CLOSING BALANCE</b></td>
						        	<td style="color:orange;"><b><?php echo number_format($total_blanch_accumlation->total_blanch_capital); ?></b></td>
						        	<!-- <td></td> -->
						        </tr>
                              </table>
	                      </div>
                       </div>

						        	


                         <div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon-list-2"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				DEDUCTED FEE
			</h3>
			&nbsp;&nbsp;&nbsp;
		</div>
		
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">
		&nbsp;
	
		<!-- <a href="<?php //echo base_url("admin/print_all_request"); ?>" class="btn btn-brand btn-elevate btn-icon-sm" data-toggle="modal" data-target="#kt_modal_2">
			<i class="flaticon2-pen"></i>
			 Branch To Company
		</a> -->
	</div>	
</div>		</div>
	</div>

	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">

						             <thead>
			  						       <tr>
			  						       	
			  						        <th>DEDUCTED FEE</th>
			  						        <th><?php echo number_format($today_deducted->total_deducted); ?></th>
				  						   </tr>
				                     </thead>
						           
						        <tr>
						        	<td>NON DEDUCTED FEE</td>
						        	<td><?php echo number_format($today_non_deducted->total_nondeducted); ?></td>
						        	<!-- <td></td> -->
						        </tr>
						         <tr>
						        	<td>TOTAL</td>
						        	<td><?php echo number_format($today_deducted->total_deducted + $today_non_deducted->total_nondeducted); ?></td>
						        	<!-- <td></td> -->
						        </tr>
                              </table>
	                      </div>
                       </div>


                    </div>	


				
<?php include('incs/footer_1.php') ?>






<script>
$(document).ready(function(){
$('#blanch').change(function(){
var blanch_id = $('#blanch').val();
//alert(blanch_id)
if(blanch_id != ''){

$.ajax({
url:"<?php echo base_url(); ?>admin/fetch_blanch_account",
method:"POST",
data:{blanch_id:blanch_id},
//alert(blanch_id)
success:function(data)
{
$('#account').html(data);
//$('#district').html('<option value="">All</option>');
}
});
}
else
{
$('#account').html('<option value="">Select Account</option>');
//$('#district').html('<option value="">All</option>');
}
});



// $('#customer').change(function(){
// var customer_id = $('#customer').val();
//  //alert(customer_id)
// if(customer_id != '')
// {
// $.ajax({
// url:"<?php echo base_url(); ?>admin/fetch_data_vipimioData",
// method:"POST",
// data:{customer_id:customer_id},
// success:function(data)
// {
// $('#loan').html(data);
// //$('#malipo_name').html('<option value="">select center</option>');
// }
// });
// }
// else
// {
// $('#loan').html('<option value="">Select Active loan</option>');
// //$('#malipo_name').html('<option value="">chagua vipimio</option>');
// }
// });

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


<div class="modal fade" id="kt_modal_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter By</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("admin/blanch_cash_flow"); ?>

                    <div class="form-group">
                        <div class="row">
                       
                             <div class="col-lg-12">
                          <label class="form-control-label">*Select Branch:</label>
                            <select class="form-control kt-selectpicker" name="blanch_id" required data-live-search="true">
                               <option value="">Select Branch</option>
                               <?php foreach ($blanch as $blanchs): ?>
                                <option value="<?php echo $blanchs->blanch_id; ?>"><?php echo $blanchs->blanch_name; ?></option>
                                 <?php endforeach; ?> 
                                </select> 
                        </div>
                 </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Filter Data</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!--end::Modal-->



<script>
    $('.select2').select2();
</script>