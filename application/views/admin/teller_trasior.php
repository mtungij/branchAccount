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
			Teller 
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		&nbsp;
		
		<a href="<?php //echo base_url("admin/print_pending_report"); ?>" class="btn btn-brand btn-elevate btn-icon-sm">
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
				  							    <th>Branch</th>
				  							    <th>Employee</th>
												<th>Deposit</th>
												<th>Withdrawal</th>
												<th>Date</th>
				  						        </tr>
						                  </thead>
			
								    <tbody>
                                          <?php $no = 1; ?>
									<?php foreach ($transaction as $transactions): ?>
									   <tr>
				  					<td><?php echo $transactions->blanch_name; ?></td>
				  					<td class="c"><?php //echo $loan_pends->blanch_name; ?> </td>
				  					<td class="c">
				  					   <?php //echo $loan_pends->f_name; ?> <?php //echo $loan_pends->m_name; ?> <?php //echo $loan_pends->l_name; ?>
				  					</td>
				  					<td>
				  						<?php //echo $loan_pends->phone_no; ?>
				  					</td>
				  					<td><?php //echo number_format($loan_pends->loan_int); ?></td>								  							
                                   </tr>
                              <?php $data_deposit = $this->queries->get_eploye_deposit($transactions->blanch_id);
                                   // print_r($data_deposit);
                                   //           exit();
                               ?>
                                <?php foreach ($data_deposit as  $data_deposits): ?>
                                	
                                      <tr>
				  					<td><?php //echo $transactions->blanch_name; ?></td>
				  					<td class="c"><?php echo $data_deposits->empl_name; ?> </td>
				  					<td class="c">
				  					   <?php echo number_format($data_deposits->total_depost_teller); ?>
				  					</td>
				  					<td>
				  						<?php echo number_format($data_deposits->total_withdrawal_teller); ?>
				  					</td>
				  					<td><?php echo $data_deposits->lecod_day; ?></td>								  							
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