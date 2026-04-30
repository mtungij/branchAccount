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
				Group Collection Sheet
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		&nbsp;
		<a href="<?php echo base_url("oficer/print_group_collection") ?>" class="btn btn-brand btn-elevate btn-icon-sm" target="_blank">
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
		  						<th>Groups Name</th>
									<th>Customer Name</th>
									<th>Loan Aproved</th>
									<th>Loan + Interest</th>
									<th>Collection</th>
									<th>Duration</th>
									<th>Paid Amount</th>
									<th>Remain Amount</th>
									<th>Penart</th>
									<th>Loan Status</th>

									
									
				  									
				  									
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                         
									<?php foreach($group_loan as $group_loans): ?>
									          <tr>
				  					<td><b><?php echo $group_loans->group_name; ?></b></td>
				  					<td><?php //echo $loan_pendings->loan_code; ?></td>
				  					<td><?php //echo $loan_pendings->f_name; ?> <?php //echo substr($loan_pendings->m_name, 0,1); ?> <?php //echo $loan_pendings->l_name; ?></td>
				  					<td><?php //echo $loan_pendings->phone_no; ?></td>
				  					<td><?php //echo $loan_pendings->bussiness_type; ?></td>
				  					<td><?php //echo $loan_pendings->blanch_name; ?></td>
				  					<td><?php //echo number_format($loan_pendings->loan_aprove); ?></td>
				  					<td><?php //echo number_format($loan_pendings->loan_int); ?></td>

				  						<td>
				  							</td>
				  				
				  			</tr>
                               <?php 
                               $customers_loan = $this->queries->get_loan_group_customer($group_loans->group_id);
                              // echo "<pre>";
                              // print_r($customers_loan);
                              //      exit();
                                ?>

                                 <?php foreach ($customers_loan as $customers_loans): ?>
				  				  <tr>
				  					<td class="c"></td>
				  					<td class="c"><?php echo $customers_loans->f_name; ?> <?php echo $customers_loans->m_name; ?> <?php echo $customers_loans->l_name; ?></td>
				  					<td><?php echo number_format($customers_loans->loan_aprove); ?> </td>
				  					<td><?php echo number_format($customers_loans->loan_int); ?></td>
				  					<td><?php echo number_format($customers_loans->restration); ?></td>
				  					<td class="c">	<?php if ($customers_loans->day == 1) {
				  								 echo "Daily";
				  							 ?>
				  							<?php }elseif($customers_loans->day == 7){
                           echo "Weekly";
				  							 ?>
				  							
				  						<?php }elseif($customers_loans->day == 30 || $customers_loans->day == 31 || $customers_loans->day == 28 || $customers_loans->day == 29){
				  						        echo "Monthly"; 
				  							?>
				  							<?php } ?></td>
				  					<td><?php echo number_format($customers_loans->total_depost); ?></td>
				  					<td><?php echo number_format($customers_loans->loan_int - $customers_loans->total_depost); ?></td>
				  					<td><?php echo number_format($customers_loans->total_penart - $customers_loans->total_paid_penart); ?></td>
				  					<td>
				  						<?php if ($customers_loans->loan_status == 'withdrawal') {
				  						 ?>
				  						<a href="javascript" class="badge badge-success">Active</a>
				  					<?php }elseif ($customers_loans->loan_status == 'pending') {
				  					 ?>
				  						<a href="javascript" class="badge badge-warning">Pending</a>
				  					<?php }elseif ($customers_loans->loan_status == 'aproved') {
				  					 ?>
				  						<a href="javascript" class="badge badge-primary">Aproved</a>
				  					<?php }elseif ($customers_loans->loan_status == 'disbarsed') {
				  					 ?>
				  						<a href="javascript" class="badge badge-info">Disbursed</a>
				  					<?php }elseif ($customers_loans->loan_status == 'done') {
				  					 ?>
				  						<a href="javascript" class="badge badge-secondary">Done</a>
				  					<?php }elseif ($customers_loans->loan_status == 'out') {
				  					 ?>
				  						<a href="javascript" class="badge badge-danger">Default</a>
				  						<?php } ?>
				  					</td>
				  				
				  			</tr>
                              <?php endforeach; ?> 
                              <?php
                              $total = $this->queries->get_total_group_loan($group_loans->group_id);
                              // echo "<pre>";
                              // print_r($total);
                              //       exit(); 
                               ?>
                                 <?php foreach ($total as $totals): ?>
     
                              	  <tr>
				  					<td><b></b></td>
				  					<td><b>TOTAL:</b></td>
				  					<td><b><?php echo number_format($totals->total_loangroup); ?></b></td>
				  					<td><b><?php echo number_format($totals->total_int); ?></b></td>
				  					<td><b><?php echo number_format($totals->total_restoration); ?></b></td>
				  					<td><b></b></td>
				  					<td><b><?php echo number_format($totals->total_depost_groups); ?></b></td>
				  					<td><b><?php echo number_format($totals->total_int - $totals->total_depost_groups); ?></td>
				  					<td><b><?php echo number_format($totals->total_penart_group - $totals->total_paid); ?></b></td>
				  					<td><b><?php //echo number_format($total_groups->total_loan_aprove_empl); ?></b></td>
				  			    </tr> 

				  			    <?php endforeach; ?>      
          <?php endforeach; ?>
									
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