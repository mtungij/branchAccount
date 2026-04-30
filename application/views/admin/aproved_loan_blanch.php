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
				Loan Approved But not Disbursed (<?php echo $blanch->blanch_name; ?>)
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		&nbsp;
		<a href="<?php echo base_url("admin/view_blanchPanel/{$blanch->blanch_id}") ?>" class="btn btn-brand btn-elevate btn-icon-sm">
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
										<th><b>Loan Request</b></th>
										<th><b>Loan Approved</b></th>
										<th><b>Loan status</b></th>
										<th><b>Approved date</b></th>
										<th><b>Action</b></th>
				  									
				  									
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                        
									<?php foreach($aproved as $loan_aproveds): ?>
									          <tr>
				  					<td><?php echo $loan_aproveds->f_name; ?> <?php echo substr($loan_aproveds->m_name, 0,1); ?> <?php echo $loan_aproveds->l_name; ?></td>
				  					<td><?php echo $loan_aproveds->blanch_name; ?></td>
				  					<td><?php echo $loan_aproveds->loan_code; ?></td>
				  					<td><?php echo number_format($loan_aproveds->how_loan); ?></td>
				  					<td><?php echo number_format($loan_aproveds->loan_aprove); ?></td>
				  					<td>	

				  	<?php if ($loan_aproveds->loan_status == 'open') {
				       ?>
				 <a href="#" class="badge badge-danger">Pending</a>
				<?php }elseif ($loan_aproveds->loan_status == 'aproved') {
				 ?>
				 <a href="#" class="badge badge-success">Approved</a>
				 <?php }elseif($loan_aproveds->loan_status == 'disbursed'){
				  ?>
			<a href="#" class="badge badge-info">Disbursed</a>

				  <?php } ?></td>
				  					
				  						
				  					
				  						<td>
				 <?php echo substr($loan_aproveds->loan_day, 0,10); ?>
				                        </td>
				                        <td>
				                        	<?php if ($loan_aproveds->fee_status == 'YES') {
				                        	 ?>
				                        	<a href="<?php echo base_url("admin/disburse/{$loan_aproveds->loan_id}") ?>" class="btn btn-info"><i class="kt-menu__link-icon flaticon2-shield"></i>Disburse</a>
				                        <?php }elseif($loan_aproveds->fee_status == 'NO'){ ?>
				                        	<a href="<?php echo base_url("admin/disburse_lonnottfee/{$loan_aproveds->loan_id}") ?>" class="btn btn-info"><i class="kt-menu__link-icon flaticon2-shield"></i>Disburse</a>
				                        	
				                        	<?php } ?>
				                        </td>
				  											  							
                                   </tr>

<?php endforeach; ?>
									
	                </tbody>
	                <tfoot>
                    <tr>
                                        <th>Customer Name</th>
										<th>Branch Name</th>
										<th>Loan Ac</th>
										<th>Loan Request</th>
										<th>Loan Approved</th>
										<th>Loan Status</th>
										<th>Approved date</th>
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