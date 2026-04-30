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
				Bank Reconciliations Report
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		&nbsp;
		<a href="#" class="btn btn-brand btn-elevate btn-icon-sm">
			<i class="flaticon-technology"></i>
			Print
		</a>
	</div>	
</div>		</div>
	</div>
	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_">
									     <thead>
			  						          <tr>
		  							   <th><b>Daily Receivable</b></th>	
		  							   <td><b><?php echo number_format($daily_recons->total_rejesho); ?></b></td>	
				  						  </tr>
				  						          <tr>
		  							   <th><b>Weekly Receivable</b></th>	
		  							   <td><b><?php echo number_format($weekly_receivable->total_rejesho_wekly); ?></b></td>	
				  						  </tr>

				  						            <tr>
		  							   <th><b>Monthly Receivable</b></th>	
		  							   <td><b><?php echo number_format($monthly_receivable->total_rejesho_Monthly); ?></b></td>	
				  						  </tr>
				  						              <tr>
		  							   <th><b style="color:green;">TOTAL</b></th>	
		  							   <td><b><?php echo number_format($receivable_total->total_rejesho); ?></b></td>	
				  						  </tr>


						                  </thead>
			
								
	            
                   </table>

                   <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_">
									     <thead>
			  						          <tr>
		  							   <th><b>Daily Received</b></th>	
		  							   <td><b><?php echo number_format($received_daily->total_withdrawalDaily) ; ?></b></td>	
				  						  </tr>
				  						          <tr>
		  							   <th><b>Weekly Received</b></th>	
		  							   <td><b><?php echo number_format($received_weekly->total_withdrawalWeekly); ?></b></td>	
				  						  </tr>

				  						            <tr>
		  							   <th><b>Monthly Received</b></th>	
		  							   <td><b><?php echo number_format($received_monthly->total_withdrawalMonthly); ?></b></td>	
				  						  </tr>
				  						  	            <tr>
		  							   <th><b style="color:green;">TOTAL</b></th>	
		  							   <td><b><?php echo number_format($total_received->total_withdrawal); ?></b></td>	
				  						  </tr>

						                  </thead>
			
								
	            
                   </table>
             
                   <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_">
									     <thead>
			  						          <tr>
		  							   <th><b>Prepaid  </b></th>	
		  							   <td><b><?php echo number_format($prepaid_today->prepaid_balance); ?></b></td>	
				  						  </tr>
				  						 <!--         <tr>
		  							  <th><b>Loan Fee </b></th>	
		  							   <td><b><?php //echo number_format($total_loan_fee->sum_withdraw); ?></b></td>	
				  						  </tr> -->
				  						         <tr>
		  							   <th><b>Income </b></th>	
		  							   <td><b><?php echo number_format($today_income->total_receve_income); ?></b></td>	
				  						  </tr>
				  						         <tr>
		  							   <th><b style="color:green;">TOTAL </b></th>	
		  							   <td><b><?php echo number_format($prepaid_today->prepaid_balance + $today_income->total_receve_income ); ?></b></td>	
				  						  </tr>

						                  </thead>
                                    </table>

                   </table>
                      <div class="text-center">
              <h4>(Total Received + Prepaid + Income)</h4>
               </div>
                       <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_">
									     <thead>
			  						     
				  						         <tr>
		  							   <th><b style="color:green;">GROSS PROFIT </b></th>	
		  							   <td><b><?php echo number_format($total_received->total_withdrawal + $prepaid_today->prepaid_balance + $today_income->total_receve_income ); ?></b></td>	
				  						  </tr>

						                  </thead>
	            
                     </table>
                 
             

                        <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_">
									     <thead>
			  						          <tr>
		  							   <th><b>Expenses </b></th>	
		  							   <td><b><?php echo number_format($toay_expences->total_req); ?></b></td>	
				  						  </tr>
				  						         <tr>
		  							   <th><b style="color:green;">TOTAL </b></th>	
		  							   <td><b><?php echo number_format($toay_expences->total_req); ?></b></td>	
				  						  </tr>

						                  </thead>
			
								
	            
                   </table>
                            <div class="text-center">
              <h5>(Gross Profit - Expensess)</h5>
               </div>
                       <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_">
									     <thead>
			  						     
				  						         <tr>
		  							   <th><b style="color:green;">TODAY CASH IN HAND </b></th>	
		  							   <td><b><?php echo number_format($total_received->total_withdrawal + $prepaid_today->prepaid_balance + $today_income->total_receve_income - $toay_expences->total_req); ?></b></td>	
				  						  </tr>

						                  </thead>
			
								
	            
                   </table>
		<!--end: Datatable -->
	</div>
</div>
</div>
<!-- end:: Content -->
<!-- end:: Content -->
				</div>				
				
<?php include('incs/footer_1.php') ?>


		