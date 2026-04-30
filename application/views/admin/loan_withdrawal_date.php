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

<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon-list-2"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Loan Withdrawal (<?php echo $blanch_data->blanch_name ?>) / From: <?php echo $from; ?> - To: <?php echo $to; ?>  <?php if ($empl_id == 'all') {
				}else{ ?>
					 / <?php echo $empl_data->empl_name; ?>
					<?php } ?>
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		&nbsp;
		 <a href="" class="btn btn-info" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_4"><i class="kt-menu__link-icon flaticon2-search-1"></i>Filter</a>
		<?php if (count($data) > 0) {
		 ?>
		 <a href="<?php echo base_url("admin/print_loan_withdrawalFilter/{$blanch_id}/{$from}/{$to}/{$empl_id}") ?>" class="btn btn-brand btn-elevate btn-icon-sm" target="_blank">
			<i class="flaticon-technology"></i>
			Print
		</a>
		<?php }else{ ?>
		
		
		<?php } ?>
		<a href="<?php echo base_url("admin/loan_withdrawal") ?>" class="btn btn-brand btn-elevate btn-icon-sm">
			<i class="flaticon2-back-1"></i>
			Back
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
										<!-- <th><b>Loan Withdrawal</b></th> -->
										<!-- <th><b>Loan Interest</b></th> -->
										<th><b>Loan Withdrawal</b></th>
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
                                        
									<?php foreach($data as $loan_aproveds): ?>
									          <tr>
				  					<td><?php echo $loan_aproveds->f_name; ?> <?php echo substr($loan_aproveds->m_name, 0,1); ?> <?php echo $loan_aproveds->l_name; ?></td>
				  					<td><?php echo $loan_aproveds->blanch_name; ?></td>
				  					<td><?php echo $loan_aproveds->loan_code; ?></td>
				  					<!-- <td><?php //echo number_format($loan_aproveds->loan_aprove); ?></td> -->
				  				<!-- 	<td><?php //echo $loan_aproveds->interest_formular; ?>%</td> -->
				  					<td><?php echo number_format($loan_aproveds->with_amount); ?></td>
				  					<td><?php echo $loan_aproveds->method; ?></td>
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
<!--end::Modal-->

                       <?php endforeach; ?>
									
	                </tbody>
	                <tfoot>
                    <tr>
                                       <th><b>TOTAL</b></th>
										<th><b></b></th>
										<th><b></b></th>
										<!-- <th><b><?php //echo number_format($total_loanDis->total_loan); ?></b></th> -->
										<!-- <th><b></b></th> -->
										<th><b><?php echo number_format($sum_loan_withdrawal->total_with); ?></b></th>
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
				
<?php include('incs/footer_1.php') ?>



<div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter Loan Withdrawal By</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("admin/filter_loan_withdrawal"); ?>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                            <label class="form-control-label">*Select Branch:</label>
                            <select class="form-control kt-selectpicker" id="blanch" name="blanch_id" required data-live-search="true">
                                   <option value="">Select Branch</option>
                                    <?php foreach ($blanch as $blanchs): ?>
                                <option value="<?php echo $blanchs->blanch_id; ?>"><?php echo $blanchs->blanch_name; ?> </option>
                                    <?php endforeach; ?>
                                </select>
                              <?php $date = date("Y-m-d"); ?>  
                        </div>

                            <div class="col-lg-6">
                            <label class="form-control-label">*Select Employee:</label>
                            <select class="form-control" name="empl_id" required id="empl">
                                <option value="">Select employee</option>
                                <option value="all">ALL</option>
                              </select> 
                        </div>
                           
                      <div class="col-lg-6">
                          <label class="form-control-label">*From:</label>
                            <input type="date" value="<?php echo $date; ?>" name="from" class="form-control">
                        </div>
                         <div class="col-lg-6">
                          <label class="form-control-label">*To:</label>
                            <input type="date" name="to" value="<?php echo $date; ?>" class="form-control">
                        </div>
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
</div>

  <script>
$(document).ready(function(){
$('#blanch').change(function(){
var blanch_id = $('#blanch').val();
//alert(blanch_id)
if(blanch_id != ''){

$.ajax({
url:"<?php echo base_url(); ?>admin/fetch_employee_blanch",
method:"POST",
data:{blanch_id:blanch_id},
success:function(data)
{
$('#empl').html(data);
//$('#district').html('<option value="">All</option>');
}
});
}
else
{
$('#empl').html('<option value="">Select Employee</option>');
//$('#district').html('<option value="">All</option>');
}
});

});
</script>


		