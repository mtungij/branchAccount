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
	<?php //echo form_open("oficer/previoous_cashInhand"); ?>
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon-list-2"></i>
			</span>
			<h3 class="kt-portlet__head-title">
			CASH BOOK 
			</h3>
           
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		&nbsp;
	<!-- 	<a href="#" class="btn btn-brand btn-elevate btn-icon-sm">
			<i class="la la-technology"></i>
			Print
		</a> -->
		<!-- <a href="<?php //echo base_url("admin/previous_cashinhand"); ?>" class="btn btn-brand btn-elevate btn-icon-sm">
			<i class="flaticon2-calendar-3"></i>
			Previous
		</a> -->
	</div>	
</div>		</div>
	</div>
	<?php //echo form_close(); ?>

	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
									     <thead>
			  						          <tr>
												<th style="border: none;">DEBIT(RECEIVED)</th>
												<th style="border: none;"></th>
												<th></th>
												<th style="border: none;"></th>
												<th>CREDIT(GIVE)</th>	
				  						         </tr>

				  						         <tr>
				  						        <th>PARTICULAR</th>
				  						        <th></th>
												<th>AMOUNT</th>
												<th>PARTICULAR</th>
												<th>AMOUNT</th>	
				  						         </tr>
				  						          <tr>
				  						        <th style="border: none;">BRANCH OPENING BALANCE</th>
				  						        <th></th>
												<th>100</th>
												<th>LOAN DISBURSMENT</th>
												<th></th>	
				  						         </tr>
				  						          <tr>
				  						        <th><b>EXPECTED RECEIVABLE</b></th>
												<th>2000</th>
												<th></th>
												<th style="border: none;"></th>
												<th style="border: none;"></th>	
				  						         </tr>
				  						         <tr>
				  						         <th>RECEIVED DEPOSIT</th>
												<th></th>
												<th></th>
												<th style="border: none;"></th>	
												<th style="border: none;"></th>	
				  						         </tr>
				  						          <tr>
				  						        <th>ACTIVE REPAYMENT</th>
												<th>-</th>
												<th >1000</th>
												<th style="border: none;"></th>	
												<th style="border: none;"></th>	
				  						         </tr>
				  						          <tr>
				  						        <th>DEFAULT REPAYMENT</th>
												<th>-</th>
												<th>1000</th>
												<th style="border: none;"></th>	
												<th style="border: none;"></th>	
				  						         </tr>
				  						          <tr>
				  						        <th>EXPECTED PENDING</th>
												<th>4000</th>
												<th></th>
												<th style="border: none;"></th>	
												<th style="border: none;"></th>	
				  						         </tr>
				  						          <tr>
				  						        <th>SAVING DEPOSIT</th>
												<th></th>
												<th>10000</th>
												<th style="border: none;"></th>	
												<th style="border: none;"></th>	
				  						         </tr>
				  						          <tr>
				  						        <th style="border: none;"></th>
												<th style="border: none;">INCOME</th>
												<th></th>
												<th style="border: none;"></th>	
												<th style="border: none;"></th>	
				  						         </tr>
				  						           <tr>
				  						        <th>DEDUCTED INCOME(SYSTEM)</th>
												<th>-</th>
												<th>10000</th>
												<th style="border: none;"></th>	
												<th style="border: none;"></th>	
				  						         </tr>
				  						           <tr>
				  						        <th>NON - DEDUCTED INCOME</th>
												<th>-</th>
												<th>10000</th>
												<th>EXPENSES</th>	
												<th></th>	
				  						         </tr>
				  						           <tr>
				  						        <th>BALANCE b/d</th>
												<th>-</th>
												<th>10000</th>
												<th>Balance c/d</th>	
												<th></th>	
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                    

                               <tr>
                               	<td><b>BALANCE b/d</b></td>
                               	<td><b><?php //echo number_format($sum_data->total_cashInHand); ?></b></td>
                               	<td><b><?php //echo number_format($total_cash->total_cashInhand); ?></b></td>
                               	<td></td>
                               	<td></td>
                               </tr>
									
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