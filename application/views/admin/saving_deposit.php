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
				Saving Deposit List
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
				  							    <th>Branch</th>
				  							    <th>Provider</th>
												<th>Agent Name</th>
												<th>Reference Number</th>
												<th>Amount</th>
												<th>Time</th>
												<th>Description</th>
												<th>Status</th>
												<th>Date</th>
												<th>Action</th>
				  									
				  									
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                          <?php $no = 1; ?>
									<?php foreach($miamala  as $miamalas): ?>
									          <tr>
				  					<td><?php echo $miamalas->blanch_name; ?></td>
				  					<td><?php echo $miamalas->provider; ?></td>
				  					<td><?php echo $miamalas->agent; ?></td>
				  					<td><?php echo $miamalas->ref_no ?></td>
				  					<td><?php echo number_format($miamalas->amount); ?></td>
				  					<td><?php echo $miamalas->time; ?></td>
				  					<td><?php echo $miamalas->description ?></td>
				  					<td>
				  						<?php if ($miamalas->status == 'open') {
				  						 ?>
				  						 <a href="javascript:;" class="badge badge-danger">Not Checked</a>
				  						<?php }elseif ($miamalas->status == 'close') {
				  						 ?>
				  					 <a href="javascript:;" class="badge badge-success">Checked</a>
				  						 <?php } ?>
				  						<?php //echo $miamalas->status; ?>
				  							
				  						</td>
				  					<td><?php echo $miamalas->date; ?></td>
				  				    <td>
				  				    <?php if ($miamalas->status == 'open') {
				  				    	 ?>
				  				    <a href="<?php echo base_url("admin/check_miamala/{$miamalas->id}"); ?>" class="btn btn-primary btn-sm"><i class="flaticon2-delete"></i></a>
				  				    <?php }elseif ($miamalas->status == 'close') {
				  				     ?>
				  				    <a href="<?php echo base_url("admin/uncheck_miamala/{$miamalas->id}"); ?>" class="btn btn-success btn-sm"><i class="flaticon2-check-mark"></i></a>
				  				    <?php } ?>
				  				    </td>	
			  											  							
                                  </tr>
                            <?php endforeach; ?>	
	                   </tbody>
	                   <tr>
	                   	<td><b>TOTAL</b></td>
	                   	<td></td>
	                   	<td></td>
	                   	<td><b><?php echo number_format($total_miamala->total_amount); ?></b></td>
	                   	<td></td>
	                   	<td></td>
	                   	<td></td>
	                   	<td></td>
	                   	<td></td>
	                   	<td></td>
	                   </tr>
                     </table>
		<!--end: Datatable -->
	</div>
</div>
</div>
<!-- end:: Content -->
<!-- end:: Content -->
				</div>				
				
<?php include('incs/footer_1.php') ?>