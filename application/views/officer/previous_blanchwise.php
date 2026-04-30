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
<div class="kt-subheader kt-grid__item" id="kt_subheader">
   
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
	<?php echo form_open("oficer/previous_blanchwise_data"); ?>
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon-list-2"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Previous Branchwise Loan Summary
			</h3>
			&nbsp;
			<h3 class="kt-portlet__head-title">
				From:<b><?php echo @$from; ?></b>
				<input type="date" name="from" class="form-control">
			</h3>
			&nbsp;&nbsp;
			<h3 class="kt-portlet__head-title">
				To:<b><?php echo @$to; ?></b>
				<input type="date" name="to" class="form-control">
				<input type="hidden" name="blanch_id" value="<?php echo $empl_data->blanch_id; ?>">
			</h3>
			<h3 class="kt-portlet__head-title">
				<br>
				<button type="submit" class="btn btn-primary">Get Data</button>
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		&nbsp;
		<?php if(count($data_blanchwise) == TRUE){ ?>
		<a href="<?php echo base_url("oficer/print_previous_blanchwise/{$from}/{$to}/{$blanch_id}"); ?>" class="btn btn-brand btn-elevate btn-icon-sm" target="_blank">
			<i class="flaticon-technology"></i>
			Print
		</a>
	<?php }else{ ?>
		<?php } ?>
		<a href="<?php echo base_url("oficer/blanchiwise_report"); ?>" class="btn btn-brand btn-elevate btn-icon-sm">
			<i class="flaticon2-back-1"></i>
			Back
		</a>
	</div>	
</div>		</div>
	</div>
	<?php echo form_close(); ?>


	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
									     <thead>
			  						          <tr>
												<th>Branch Name</th>
												<th>Receivable</th>
												<th>Received</th>
												<th>Pending</th>
				  						         </tr>
						                  </thead>
			
								    <tbody>
									<?php foreach ($data_blanchwise as $data_blanchwises): ?>
									          <tr>
				  					<td class="c"><?php echo $data_blanchwises->blanch_name ?></td>
				  					<td>
				  						<?php echo number_format($data_blanchwises->total_loans); ?></td>
				  					<td>
				  						<?php echo number_format($data_blanchwises->sum_depost); ?>
				  					</td>
				  					<td><?php  echo number_format($data_blanchwises->total_loans - $data_blanchwises->sum_depost); ?></td>
				  					
				  								  											  							
                                   </tr>
                           
                      <?php endforeach; ?>
									
	                </tbody>
	                <tfoot>
                    <tr>
                    <th>TOTAL</th>
					<th><?php echo number_format($total_receivable->total_receivable); ?></th>
					<th><?php echo number_format($total_receved->total_receved); ?></th>
					<th><?php echo number_format($total_receivable->total_receivable - $total_receved->total_receved); ?></th>
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