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
	<?php echo form_open("admin/cash_transaction_blanch"); ?>
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon-list-2"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Today Cash Transaction (<?php echo $blanch_dataName->blanch_name; ?>)
			</h3>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<h3 class="kt-portlet__head-title">
				<select type="number" class="form-control" name="blanch_id" required>
					<option value="">Select Branch</option>
					<?php foreach ($blanch as $blanchs): ?>
					<option value="<?php echo $blanchs->blanch_id; ?>"><?php echo $blanchs->blanch_name; ?></option>
					<?php endforeach; ?>
				</select>
			</h3>
			<h3 class="kt-portlet__head-title">
				<button type="submit" class="btn btn-primary">Get Data</button>
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		&nbsp;
		<a href="" class="btn btn-info" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_4"><i class="kt-menu__link-icon flaticon2-search-1"></i>Filter</a>
		<?php if (count($data_blanch) == 0) {
		?>
	<?php }else{  ?>
		<a href="<?php echo base_url("admin/print_cashBlanch/{$blanch_id}"); ?>" class="btn btn-brand btn-elevate btn-icon-sm" target="_blank">
			<i class="flaticon-technology"></i>
			Print
		</a>
		<?php } ?>
		<a href="<?php echo base_url("admin/cash_transaction"); ?>" class="btn btn-brand btn-elevate btn-icon-sm">
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
				  							    <th>S/No.</th>
												<th>Customer Name</th>
												<th>Deposit</th>
												<th>Withdrawal</th>
												<th>Date</th>
												<th>Time</th>
				  									
				  									
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                          <?php $no = 1; ?>
									<?php foreach ($data_blanch as $cashs): ?>
									          <tr>
				  					<td><?php echo $no++; ?>.</td>
				  					<td class="c"><?php echo $cashs->f_name; ?> <?php echo $cashs->m_name; ?> <?php echo $cashs->l_name; ?></td>
				  					<td>
				  						<?php if ($cashs->depost == TRUE) {
				  						 ?>
				  						<?php echo number_format($cashs->depost); ?>
				  					<?php }elseif ($cashs->depost == FALSE) {
				  					 ?>
				  					 -
				  					 <?php } ?>
				  					</td>
				  					<td>
				  						<?php if ($cashs->withdraw == TRUE) {
				  						 ?>
				  						<?php echo number_format($cashs->withdraw); ?>
				  					<?php }elseif ($cashs->withdraw == FALSE) {
				  					 ?>
				  					 -
				  					 <?php } ?>
				  					</td>
				  					<td><?php echo $cashs->lecod_day; ?></td> 
				  					<td><?php echo $cashs->time_rec; ?></td> 
				  								  											  							
                                   </tr>
                      <?php endforeach; ?>
									
	                </tbody>
	                <tfoot>
                    <tr>
                    <th>TOTAL</th>
					<th></th>
					<th><?php echo number_format($sumDepostBlanch->total_depost); ?></th>
					<th><?php echo number_format($sum_withdrawal->total_with); ?></th>
					<th></th>
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
                <h5 class="modal-title" id="exampleModalLabel">Filter cash transaction By</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("admin/prev_cashtransaction"); ?>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                            <label class="form-control-label">*Select Branch:</label>
                            <select class="form-control kt-selectpicker" name="blanch_id" required data-live-search="true">
                                   <option value="">Select Branch</option>
                                    <?php foreach ($blanch as $blanchs): ?>
                                <option value="<?php echo $blanchs->blanch_id; ?>"><?php echo $blanchs->blanch_name; ?> </option>
                                    <?php endforeach; ?>
                                </select>
                               
                        </div>
                         
                          <input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">  
                        <?php $date = date("Y-m-d"); ?>
                      <div class="col-lg-6">
                          <label class="form-control-label">*From:</label>
                            <input type="date" name="from" value="<?php echo $date; ?>" class="form-control">
                        </div>
                         <div class="col-lg-6">
                          <label class="form-control-label">*To:</label>
                            <input type="date" name="to" value="<?php echo $date; ?>" class="form-control">
                        </div>
                    </div>  
                 </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Filter Data</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!--end::Modal-->
</div>


<!--end::Modal-->