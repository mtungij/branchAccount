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
				Loan Rejected
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		<!-- &nbsp;
		<a href="#" class="btn btn-brand btn-elevate btn-icon-sm">
			<i class="la la-plus"></i>
			New Record
		</a> -->
	</div>	
</div>		</div>
	</div>

	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
									     <thead>
			  						          <tr>
		  							<th>S/No.</th>
									<th>Loan AC/No</th>
									<th>customer name</th>
									<th>Phone Number</th>
									<th>Busines/Job Name</th>
									<th>Branch</th>
									<th>Loan Amount</th>
									<th>Restoration Type</th>
									<th>Restoration Time</th>
									<th>Loan Status</th>
									<th>Action</th>
				  									
				  									
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                          <?php $no = 1; ?>
									<?php foreach($loan_reject as $loan_pendings): ?>
									          <tr>
				  					<td><?php echo $no++; ?>.</td>
				  					<td><?php echo $loan_pendings->loan_code; ?></td>
				  					<td><?php echo $loan_pendings->f_name; ?> <?php echo substr($loan_pendings->m_name, 0,1); ?> <?php echo $loan_pendings->l_name; ?></td>
				  					<td><?php echo $loan_pendings->phone_no; ?></td>
				  					<td><?php echo $loan_pendings->bussiness_type; ?></td>
				  					<td><?php echo $loan_pendings->blanch_name; ?></td>
				  						<td><?php echo number_format($loan_pendings->how_loan); ?></td>
				  						<td>
				  							<?php if ($loan_pendings->day == 1) {
				  								 echo "Daily";
				  							 ?>
				  							<?php }elseif($loan_pendings->day == 7){
                                                  echo "Weekly";
				  							 ?>
				  							
				  						<?php }elseif($loan_pendings->day == 30){
				  						        echo "Monthly"; 
				  							?>
				  							<?php } ?>
				  								
				  							</td>
				  						<td><?php echo $loan_pendings->session; ?></td>
				  						<td>
				 	<?php if ($loan_pendings->loan_status == 'open') {
				 ?>
				 <a href="#" class="badge badge-danger">Pending</a>
				<?php }elseif ($loan_pendings->loan_status == 'aproved') {
				 ?>
				 <a href="#" class="badge badge-success">Approved</a>
				 <?php }elseif($loan_pendings->loan_status == 'reject'){
				  ?>
			<a href="#" class="badge badge-warning">Rejected</a>

				  <?php } ?>
				                        </td>
				  				
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
					
					<!-- <li class="kt-nav__item">
                          <?php //if ($loan_pendings->group_id == TRUE) {
                           ?>
						<a href="<?php //echo base_url("admin/view_LoanCustomerData/{$loan_pendings->customer_id}/{$loan_pendings->comp_id}") ?>" class="kt-nav__link">
							<i class="kt-nav__link-icon flaticon-eye" ></i>
							<span class="kt-nav__link-text">View Customer Details</span>
						</a>
					<?php //}elseif($loan_pendings->group_id == FALSE){ ?>
					<a href="<?php //echo base_url("admin/view_Dataloan/{$loan_pendings->customer_id}/{$loan_pendings->comp_id}") ?>" class="kt-nav__link">
					<i class="kt-nav__link-icon flaticon-eye" ></i>
							<span class="kt-nav__link-text">View Customer Details</span>
						</a>
						<?php //} ?>

					</li> -->
					
					<li class="kt-nav__item">
						<a href="<?php echo base_url("oficer/delete_loanReject/{$loan_pendings->loan_id}") ?>" class="kt-nav__link" onclick="return confirm('Are you sure?')">
							<i class="kt-nav__link-icon flaticon2-trash"></i>
							<span class="kt-nav__link-text" >Delete Loan</span>
						</a>
					</li>
					
				</ul>
			</div>
	</div>
</td>			  											  							
</tr>

<?php endforeach; ?>
									
	                </tbody>
	                <tfoot>
                    <tr>
          <th>S/No.</th>
		<th>Loan AC/No</th>
		<th>customer name</th>
		<th>Phone Number</th>
		<th>Busines/Job Name</th>
		<th>Branch</th>
		<th>Loan Amount</th>
		<th>Restoration Type</th>
		<th>Restoration Time</th>
		<th>Loan Status</th>
		<th>Action</th>
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