<?php include('incs/header_1.php'); ?>
<?php include('incs/side_1.php'); ?>
<?php include('incs/subheader.php'); ?>
	
	          <style>
             .c {
               text-transform: uppercase;
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
				Loan Officer Expectation
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		&nbsp;
		<!-- <a href="<?php //echo base_url("admin/previous_blanchwise_data"); ?>" class="btn btn-brand btn-elevate btn-icon-sm">
			<i class="flaticon-event-calendar-symbol"></i>
			Previous
		</a> -->
		<a href="<?php echo base_url("oficer/manager_print_blanchWisereport"); ?>" class="btn btn-brand btn-elevate btn-icon-sm" target="_blank">
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
												<th>Branch Name</th>
												<th>Employee Name</th>
												
												<th>Receivable</th>
												<th>Received</th>
												<th>Not Received</th>
				  						         </tr>
						                  </thead>
			
								    <tbody>
									<?php foreach ($blanch as $blanchs): ?>
									  <tr>
				  					<td class="c"><?php echo $blanchs->blanch_name ?></td>
				  					<td>
				  						<?php //echo number_format($data_blanchs->total_principal_int); ?></td>
				  				
				  					<td><?php //echo number_format($data_blanchs->total_principal_int - $data_blanchs->total_dpost ); ?></td>
				  					<td><?php //echo number_format($data_blanchs->total_principal_int - $data_blanchs->total_dpost ); ?></td>
				  					<td><?php //echo number_format($data_blanchs->total_principal_int - $data_blanchs->total_dpost ); ?></td>	  											  							
                                   </tr>
                                   <?php $employee_loan = $this->queries->get_loanEmployee_blanch_loan($blanchs->blanch_id) ?>
                                   <?php foreach ($employee_loan as $employee_loans): ?>
                                    <tr>
				  					<td class="c"><?php //echo $blanchs->blanch_name ?></td>
				  					<td>
				  						<?php if ($employee_loans->empl_name == FALSE) {
				  						 ?>
				  						 ADMIN
				  						<?php }else{ ?>
				  						<?php echo $employee_loans->empl_name; ?></td>
				  						<?php } ?>
				  					<td>
				  						<?php echo number_format($employee_loans->total_loan); ?>
				  					</td>
				  					<td><?php echo number_format($employee_loans->total_depost_loan); ?></td>
				  					<td><?php echo number_format($employee_loans->total_loan - $employee_loans->total_depost_loan); ?></td>	  											  							
                                   </tr>
                             
                             <?php endforeach; ?>
                             <?php $total_blanch = $this->queries->get_total_blanch_loan($blanchs->blanch_id); ?>
                             <?php foreach ($total_blanch as $total_blanchs): ?>
                               <tr>
				  					<td class="c"><b>TOTAL</b></td>
				  					<td>
				  						<?php //echo $employee_loans->empl_name; ?></td>
				  					<td>
				  						<b><?php echo number_format($total_blanchs->total_blanch_loan); ?></b>
				  					</td>
				  					<td><b><?php echo number_format($total_blanchs->total_received); ?></b></td>
				  					<td><b><?php echo number_format($total_blanchs->total_blanch_loan - $total_blanchs->total_received); ?></b></td>	  											  							
                                   </tr>
                       <?php endforeach; ?>
                      <?php endforeach; ?>
									
	                </tbody>
	                <tfoot>
                    <tr>
                    <th>TOTAL</th>
					<th><?php //echo number_format($total_allblanch->total_loanData); ?></th>
					<th><?php //echo number_format($total_loan->loan_depost); ?></th>
					<th><?php //echo number_format($total_allblanch->total_loanData - $total_loan->loan_depost); ?></th>
					<th><?php //echo number_format($total_allblanch->total_loanData - $total_loan->loan_depost); ?></th>
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