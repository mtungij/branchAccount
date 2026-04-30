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
				GENERAL OPERATION REPORT 
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		&nbsp;
		<a href="<?php echo base_url("oficer/print_general_operation") ?>" class="btn btn-brand btn-elevate btn-icon-sm" target="_blank">
			<i class="flaticon-technology"></i>
			Print
		</a>
	</div>	
</div>		</div>
	</div>

	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="">
									     <thead>
			  						          <tr>
		  							<th>Eployee Name & Groups</th>
									<th>Disbursement</th>
									<th>EMI Collection</th>
									<th>Prepayment</th>
									<th>Application Fee</th>
									<th>Penalty</th>
									<th>Expenses</th>
									<th>Deposit</th>
									<th>Next Collection</th>
									<th>Loan Approved</th>

									
									
				  									
				  									
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                         
									<?php foreach($empl as $empls): ?>
									          <tr>
				  					<td><b><?php echo $empls->empl_name; ?></b></td>
				  					<td><?php //echo $loan_pendings->loan_code; ?></td>
				  					<td><?php //echo $loan_pendings->f_name; ?> <?php //echo substr($loan_pendings->m_name, 0,1); ?> <?php //echo $loan_pendings->l_name; ?></td>
				  					<td><?php //echo $loan_pendings->phone_no; ?></td>
				  					<td><?php //echo $loan_pendings->bussiness_type; ?></td>
				  					<td><?php //echo $loan_pendings->blanch_name; ?></td>
				  					<td><?php //echo number_format($loan_pendings->loan_aprove); ?></td>
				  					<td><?php //echo number_format($loan_pendings->loan_int); ?></td>

				  						<td>
				  							<?php //if ($loan_pendings->day == 1) {
				  								// echo "Daily";
				  							 ?>
				  							<?php //}elseif($loan_pendings->day == 7){
                                                  //echo "Weekly";
				  							 ?>
				  							
				  						<?php //}elseif($loan_pendings->day == 30 || $loan_pendings->day == 31 || $loan_pendings->day == 28 || $loan_pendings->day == 29){
				  						        //echo "Monthly"; 
				  							?>
				  							<?php //} ?>
				  								
				  							</td>
				  						<td><?php //echo $loan_pendings->session; ?></td>
				  				
				  			</tr>
                               <?php 
                              $loan_group = $this->queries->get_empl_group($empls->empl_id);
                              // echo "<pre>";
                              // print_r($loan_group);
                              //      exit();
                                ?>

                                 <?php foreach ($loan_group as $loan_groups): ?>
				  				  <tr>
				  					<td><?php echo $loan_groups->group_name; ?></td>
				  					<td><?php echo number_format($loan_groups->total_loan_disbursed); ?></td>
				  					<td><?php echo number_format($loan_groups->total_restoration); ?> </td>
				  					<td>0.00</td>
				  					<td><?php echo number_format($loan_groups->total_deducted_fee); ?></td>
				  					<td><?php echo number_format($loan_groups->total_penart - $loan_groups->total_penart_paid); ?></td>
				  					<td>0.00</td>
				  					<td><?php echo number_format($loan_groups->total_depost); ?></td>
				  					<td><?php echo number_format($loan_groups->total_tommorow); ?></td>
				  					<td><?php echo number_format($loan_groups->total_loan_aprove); ?></td>
				  				
				  			</tr>
                              <?php endforeach; ?> 
                              <?php
                              $total_group = $this->queries->get_total_aproved_group_empl($empls->empl_id);
                              // echo "<pre>";
                              // print_r($total_group);
                              //       exit(); 
                               ?>
                                 <?php foreach ($total_group as $total_groups): ?>
     
                              	  <tr>
				  					<td><b>TOTAL:</b></td>
				  					<td><b><?php echo number_format($total_groups->total_loan_disbursed_empl); ?></b></td>
				  					<td><b><?php echo number_format($total_groups->total_restoration_empl); ?></b></td>
				  					<td><b>0.00</b></td>
				  					<td><b><?php echo number_format($total_groups->total_deducted_fee_empl); ?></b></td>
				  					<td><b><?php echo number_format($total_groups->total_penart_empl - $total_groups->total_penart_paid_empl); ?></b></td>
				  					<td><b>0.00</b></td>
				  					<td><b><?php echo number_format($total_groups->total_depost_empl); ?></td>
				  				    <td><b><?php echo number_format($total_groups->total_tommor_collection); ?></b></td>		
				  					<td><b><?php echo number_format($total_groups->total_loan_aprove_empl); ?></b></td>
				  			    </tr> 

				  			    <?php endforeach; ?>      
          <?php endforeach; ?>
									
	                </tbody>
		<!-- 			<tfoot>
                    <tr>
        <th><b>TOTAL</b></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th><?php //echo number_format($total_loan_group->total_loan); ?></th>
		<th><?php //echo number_format($total_loan_group->total_loanint); ?></th>
		<th><b>Paid Amount : <?php //echo number_format($total_depost_group->total_depost); ?></b></th>
		<th><b>Remain Amount : <?php //echo number_format($total_loan_group->total_loanint - $total_depost_group->total_depost ); ?></b></th>
		<th></th>
		<th></th>
		
                    </tr>
                   </tfoot>	 -->
						   
                   </table>
		<!--end: Datatable -->
	</div>
</div>
</div>
<!-- end:: Content -->
<!-- end:: Content -->
				</div>				
				
<?php include('incs/footer_1.php') ?>