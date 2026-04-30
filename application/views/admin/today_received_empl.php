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
				Today Receivable - <?php echo $empl_data->empl_name; ?>
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		&nbsp;
		<a href="" class="btn btn-info" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_4"><i class="kt-menu__link-icon flaticon2-search-1"></i>Filter By Employee</a>
		<?php if (count($data_employee) > 0) {
		 ?>
          <a href="<?php echo base_url("admin/print_today_receivable_empl/{$empl_id}/{$comp_id}"); ?>" class="btn btn-brand btn-elevate btn-icon-sm" target="_blank">
			<i class="flaticon-technology"></i>
			Print
		</a>
		<?php }else{ ?>

	    <?php } ?>
		
		<a href="<?php echo base_url("admin/today_recevable_loan"); ?>" class="btn btn-brand btn-elevate btn-icon-sm">
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
										<th><b>Phone Number</b></th>
										<th><b>Duration Type</b></th>
										<th><b>Loan Amount</b></th>
										<th><b>Receivable Amount</b></th>
										<th><b>Date</b></th>	
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                        
									<?php foreach($data_employee as $today_recevables): ?>
									          <tr>
				  					<td><?php echo $today_recevables->f_name; ?> <?php echo $today_recevables->m_name; ?> <?php echo $today_recevables->l_name; ?></td>
				  					<td><?php echo $today_recevables->blanch_name; ?></td>
				  					<td><?php echo $today_recevables->phone_no; ?></td>
				  					
				  					<td><?php if ($today_recevables->day == 1) {
				  								 echo "Daily";
				  							 ?>
				  							<?php }elseif($today_recevables->day == 7){
                                                  echo "Weekly";
				  							 ?>
				  							
				  						<?php }elseif($today_recevables->day == 30 || $today_recevables->day == 31 || $today_recevables->day == 28 || $today_recevables->day == 29){
				  						        echo "Monthly"; 
				  							?>
				  							<?php } ?></td>
				  					<td><?php echo number_format($today_recevables->loan_int); ?></td>
				  					<td><?php echo number_format($today_recevables->restration); ?></td>
				  					<td>
				  					 <?php echo $today_recevables->date_show; ?>			
				  					</td>
				  											  							
                                   </tr>
                       <?php endforeach; ?>
									
	                </tbody>
	                <tfoot>
                    <tr>
                                       <th><b>TOTAL</b></th>
										<th><b></b></th>
										<th><b></b></th>
										<th><b></b></th>
										<th><b></b></th>
										<th><b><?php echo number_format($tota_rejesho->total_restration); ?></b></th>
										<th><b></b></th>
										
									
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

<div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter By Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("admin/filter_filter_today_receivabe"); ?>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                            <label class="form-control-label">*Select Employee:</label>
                            <select class="form-control kt-selectpicker" name="empl_id" required data-live-search="true">
                                   <option value="">Select Employee</option>
                                    <?php foreach ($employee as $employees): ?>
                                <option value="<?php echo $employees->empl_id; ?>"><?php echo $employees->empl_name; ?> </option>
                                    <?php endforeach; ?>
                                </select>
                               
                        </div>
                    </div>  
                 </div>
                 <input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">
                 <input type="hidden" name="loan_status" value="withdrawal">
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Filter Data</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!--end::Modal-->
</div>


		