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
	<?php echo form_open("oficer/previoous_cashInhand"); ?>
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon-list-2"></i>
			</span>
			<h3 class="kt-portlet__head-title">
			Previous cash InHand 
			</h3>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<h3 class="kt-portlet__head-title">
				<label>From</label>
			  <input type="date" name="from" class="form-control">
			</h3>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<h3 class="kt-portlet__head-title">
				<label>To:</label>
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
	<!-- 	<a href="#" class="btn btn-brand btn-elevate btn-icon-sm">
			<i class="la la-technology"></i>
			Print
		</a> -->
		<a href="<?php echo base_url("oficer/today_cashinhand"); ?>" class="btn btn-brand btn-elevate btn-icon-sm">
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
				  							    
												<th>Amount</th>
												<th>Date</th>	
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                          <?php //$no = 1; ?>
									<?php foreach ($data  as $today_cashs): ?>
									          <tr>
				  					<td><?php echo number_format($today_cashs->cash_amount); ?></td>
				  					<td><?php echo $today_cashs->cash_day; ?></td>
				  							  											  							
                                        </tr>

                            <?php endforeach; ?>

                               <tr>
                               	<td><b><?php echo number_format($sum_data->total_cashInHand); ?></b></td>
                               	<td><b>TOTAL</b></td>
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