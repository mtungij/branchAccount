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
				OPERATING PROFIT(O)
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
			  						        <th>Interest Repayment</th>
				  						    <th><?php echo number_format($interest->total_capital_interest); ?></th>
				  						    <th></th>
				  						     </tr>
						                  </thead>
			
								    
									<thead>
			  						       <tr>
			  						        <th style="color: blue;">Principal Repayment</th>
				  						    <th><?php //echo number_format($principal->total_principal); ?></th>
				  						        <th style="color:blue"><?php echo number_format($principal->total_principal); ?></th>

				  						    </tr>
						             </thead>

						             <thead>
			  						       <tr>
			  						        <th>Deducted Fee Repayment</th>
				  						    <th><?php echo number_format($deducted_fee->total_deducted_fee) ?></th>
				  						    <th></th>
				  						    </tr>
						             </thead>
						              <thead>
			  						       <tr>
			  						        <th>Non Deducted Fee Repayment</th>
				  						    <th><?php echo number_format($data_nonDeducted->total_nondeducted); ?></th>
				  						    <th></th>
				  						    </tr>
						             </thead>
						             <thead>
			  						       <tr>
			  						        <th>TOTAL</th>
				  						    <th><?php echo number_format($interest->total_capital_interest + $deducted_fee->total_deducted_fee + $data_nonDeducted->total_nondeducted); ?></th>
				  						    <th></th>
				  						    </tr>
						             </thead>
	                           
	               
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
				DEFAULT LOANS REPAYMENT (D)
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
			  						        <th>Interest Repayment</th>
				  						    <th><?php echo number_format($default_interest->default_interest); ?></th>
				  						    <th></th>
				  						     </tr>
						                  </thead>
			
								    
									<thead>
			  						       <tr>
			  						        <th style="color: blue;">Principal Repayment</th>
				  						    <th><?php //echo number_format($principal->total_principal); ?></th>
				  						        <th style="color:blue;"><?php echo number_format($default_principal->total_principal_default); ?></th>

				  						    </tr>
						             </thead>
						             <thead>
			  						       <tr>
			  						        <th>TOTAL</th>
				  						    <th><?php echo number_format($default_interest->default_interest); ?></th>
				  						    <th></th>
				  						    </tr>
						             </thead>
	                           
	               
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
				OPERATING EXPENSES (E)
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
			  						       	
			  						        <th>Branch Name</th>
				  						    <th>Amount</th>
				  						    <th></th>
				  						   </tr>
				                     </thead>
						           <?php foreach ($blanch_expenses as $blanch_expensess): ?>
						             	<tr>
						             		
						             		<td><?php echo $blanch_expensess->blanch_name; ?></td>
						             		<td><?php echo number_format($blanch_expensess->total_exp); ?></td>
						             		<td></td>

						             	</tr>
						        <?php endforeach; ?>
						        <tr>
						        	<td>TOTAL</td>
						        	<td><?php echo number_format($sum_total_expense->total_expense_data); ?></td>
						        	<td></td>
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
				NET PROFIT 
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
			  						        <th>NET PROFIT</th>
				  						    <th><?php echo number_format($interest->total_capital_interest + $deducted_fee->total_deducted_fee + $data_nonDeducted->total_nondeducted + $default_interest->default_interest); ?></th>
				  						    <th></th>
				  						   </tr>
						             </thead>
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



<script>
    $('.select2').select2();
</script>