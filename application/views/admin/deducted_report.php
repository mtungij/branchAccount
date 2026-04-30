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
		<?php echo form_open("admin/get_expnces_blanch"); ?>
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon-list-2"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				From Deduction Branch Account To Branch Account
			</h3>
			&nbsp;&nbsp;&nbsp;
		</div>
		<?php echo form_close(); ?>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">
		&nbsp;
		<a href="<?php //echo base_url("admin/print_all_request"); ?>" class="btn btn-brand btn-elevate btn-icon-sm" data-toggle="modal" data-target="#kt_modal_1">
			<i class="flaticon2-pen"></i>
			 Branch To Branch
		</a>
	</div>	
</div>		</div>
	</div>

	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
									     <thead>
			  						          <tr>
			  						          	<th>From Deduction Type</th>
				  							    <th>From Branch</th>
				  							    <th>To Branch </th>
				  							    <th>Amount</th>
												
												<th>Branch Account</th>
												<th>Chargers Fee</th>
												<th>User</th>
												<th>Date</th>
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                          <?php $no = 1; ?>
									<?php foreach ($transaction_list as $transaction_lists): ?>
									          <tr>
				  					<td>
				  						<?php if ($transaction_lists->deduct_type == 'deducted') {
				  						 ?>
				  						 DEDUCTED
				  						<?php }elseif($transaction_lists->deduct_type == 'non deducted'){ ?>
                                         NON DEDUCTED
				  							<?php } ?>
				  					
				  							
				  						</td>
				  					<td><?php echo $transaction_lists->from_blanch; ?></td>
				  					<td><?php echo $transaction_lists->to_blanch; ?></td>
				  					<td><?php echo number_format($transaction_lists->from_mount); ?></td>
				  					
				  					 <td><?php echo $transaction_lists->account_name; ?></td>
				  					 <td><?php echo number_format($transaction_lists->trans_fee); ?></td>
				  					<td>
				  						<?php if ($transaction_lists->user_trans == TRUE) {
				  						 ?>
				  						<?php echo $transaction_lists->user_trans; ?>
				  					<?php }elseif($transaction_lists->user_trans == FALSE){ ?>
				  							Admin
				  							<?php } ?>
				  						</td>
				  					
				  				     <td><?php echo $transaction_lists->date_transfor; ?></td>

                                    </tr>

                                 <?php endforeach; ?>
									
	                </tbody>
	             <!--    <tfoot>
                    <tr>
                   	<th>TOTAL</th>
				    <th></th>
				    <th><?php //echo number_format($tota_exp->total_expences); ?></th>
				    <th></th>
				    <th></th>
				    <th></th>
				     <th></th>
				     <th></th>
                    </tr>
                   </tfoot> -->
                   </table>
		<!--end: Datatable -->
	</div>
</div> 




</div>	


				
<?php include('incs/footer_1.php') ?>

<div class="modal fade" id="kt_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">From Deduction Branch Account To Branch Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("admin/create_transfor_deducted"); ?>

                 	<div class="kt-portlet__bod">
					<div class="kt-section">
						<div class="kt-section__content">
							<div class="form-group form-group-last row">
								<div class="col-lg-3 form-group-sub">
									<label class="form-control-label">*From Deduction Type:</label>
								<select type="text" name="deduct_type" class="form-control input-sm" required>
								<option value="">Select Deduction Type</option>
								<option value="deducted">Deducted</option>
								<option value="non deducted">Non Deducted</option>
							</select>
								</div>
								<div class="col-lg-3 form-group-sub">
									<label  class="form-control-label">*Branch:</label>
							       <select type="number" class="form-control" name="from_blanch_id" required>
							       	<option value="">Select Branch</option>
							       	<?php foreach ($blanch as $blanchs): ?>
							       	<option value="<?php echo $blanchs->blanch_id; ?>"><?php echo $blanchs->blanch_name; ?></option>
							      <?php endforeach; ?>
							       </select>
								</div>
								<div class="col-lg-3 form-group-sub">
									<label class="form-control-label">*Amount:</label>
									<input type="number" name="from_mount"  placeholder="Amount" autocomplete="off"  class="form-control input-sm" required>
								</div>
								
								<input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">

								<div class="col-lg-3 form-group-sub">
									<label  class="form-control-label">*To Branch:</label>
							       <select type="number" class="form-control" name="to_blanch_id" id="blanch" required>
							       	<option value="">Select Branch</option>
							       	<?php foreach ($blanch as $blanchs): ?>
							       	<option value="<?php echo $blanchs->blanch_id ?>"><?php echo $blanchs->blanch_name ?></option>
							       	<?php endforeach; ?>
							       </select>
								</div>

								<div class="col-lg-6 form-group-sub">
									<label  class="form-control-label">*Branch Account:</label>
							       <select type="number" class="form-control" name="to_blach_account_id" id="account" required>
							       	<option value="">Select Branch Account</option>
					
							       </select>
								</div>
								<div class="col-lg-6 form-group-sub">
									<label  class="form-control-label">*Wihdrawal Charger:</label>
								<input type="number" name="trans_fee" placeholder="Wihdrawal Charger" autocomplete="off" class="form-control input-sm" >
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
            <table>
            	<tr>
            		<th>Branch Name</th>
            		<th>Deducted Balance</th>
            		<th>Non Deducted Balance</th>
            	</tr>
            	<?php foreach ($blanch_deducted as $blanch_deducteds): ?>
            	<tr>
            		<th><?php echo $blanch_deducteds->blanch_name; ?></th>
            		<th><?php echo number_format($blanch_deducteds->deducted); ?></th>
            		<th><?php echo number_format($blanch_deducteds->non_balance); ?></th>
            	</tr>
            	<?php endforeach; ?>
            </table>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Transfer</button>
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <?php echo form_close(); ?>
        </div>
       
    </div>
</div>
<!--end::Modal-->

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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">From Deduction Branch Account To Company  Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("admin/blanch_company_transaction"); ?>
                 	<div class="kt-portlet__bod">
					<div class="kt-section">
						<div class="kt-section__content">
							<div class="form-group form-group-last row">
								<div class="col-lg-4 form-group-sub">
									<label class="form-control-label">*From Deduction Type:</label>
								<select type="text" name="deduct_type" class="form-control input-sm" required>
								<option value="">Select Deduction Type</option>
								<option value="deducted">Deducted</option>
								<option value="non deducted">Non Deducted</option>
							</select>
								</div>
								<div class="col-lg-4 form-group-sub">
									<label  class="form-control-label">*Branch:</label>
							       <select type="number" class="form-control" name="from_blanch" required>
							       	<option value="">Select Branch</option>
							       	<?php foreach ($blanch as $blanchs): ?>
							       	<option value="<?php echo $blanchs->blanch_id; ?>"><?php echo $blanchs->blanch_name; ?></option>
							      <?php endforeach; ?>
							       </select>
								</div>
								<div class="col-lg-4 form-group-sub">
									<label class="form-control-label">*Amount:</label>
									<input type="number" name="balance"  placeholder="Amount" autocomplete="off"  class="form-control input-sm" required>
								</div>
								
								<input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">

								<div class="col-lg-6 form-group-sub">
									<label  class="form-control-label">*To company Account:</label>
							       <select type="number" class="form-control" name="to_comp_account" required>
							       	<option value="">Select Company Account</option>
							       	<?php foreach ($comp_transaction as $comp_transactions): ?>
							       	<option value="<?php echo $comp_transactions->trans_id; ?>"><?php echo $comp_transactions->account_name; ?></option>
							       	<?php endforeach; ?>
							       </select>
								</div>

								
								<div class="col-lg-6 form-group-sub">
									<label  class="form-control-label">*Wihdrawal Charger:</label>
								<input type="number" name="trans_fee" placeholder="Wihdrawal Charger" autocomplete="off" class="form-control input-sm" >
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Transfor</button>
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!--end::Modal-->



<script>
    $('.select2').select2();
</script>