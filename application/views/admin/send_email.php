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
<?php //echo form_open("admin/create_oficer_info"); ?>
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon-list-2"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Employee List<?php //echo $blanch->blanch_name; ?>
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		&nbsp;
		<a href="" class="btn btn-brand btn-elevate btn-icon-sm" data-toggle="modal" data-target="#kt_modal_1<?php //echo $capitals->capital_id; ?>">
			<i class="kt-nav__link-icon flaticon-edit"></i>
			Send Email
		</a>

	</div>	
</div>		</div>
	</div>

	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
									     <thead>
			  						          <tr>
		  							<th><input type="checkbox" name="" value=""></th>
									<th>Employee name</th>
									<th>Employee Email</th>		
									<th>Branch</th>		
				  						 </tr>
						                  </thead>
			
								    <tbody>
                                          <?php $no = 1; ?>
									<?php foreach($empl_data as $empl_datas): ?>
									          <tr>
				  					<td><input type="checkbox" name="empl_id[]" value="<?php echo $empl_datas->empl_id; ?>"></td>
				  					<td><?php echo $empl_datas->empl_name; ?></td>
				  					<td><?php echo $empl_datas->empl_email; ?></td>
				  					<td><?php echo $empl_datas->blanch_name; ?></td>
		  											  							
                               </tr>
                              
                        <?php endforeach; ?>
									
	                </tbody>
	                <tfoot>
                    <tr>
           <th><input type="checkbox" name="" value=""></th>
			<th>Employee Name</th>
			<th>Employee Email</th>
			<th>Branch</th>
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


<div class="modal fade" id="kt_modal_1<?php //echo $capitals->capital_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Send Email</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                 	<div class="kt-portlet__bod">
					<div class="kt-section">
						<div class="kt-section__content">
							<div class="form-group form-group-last row">
								<div class="col-lg-12 form-group-sub">
									<label class="form-control-label">*Description</label>
									<textarea type="text" name="massage" rows="6" placeholder="Amount" autocomplete="off" class="form-control input-sm" required></textarea>
								</div>
							
								<input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">
								<input type="hidden" name="send_email" value="<?php echo $comp_data->comp_email; ?>">
								
							</div>
						</div>
					</div>
				</div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Send Email</button>
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>