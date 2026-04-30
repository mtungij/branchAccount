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

         <?php if ($das = $this->session->flashdata('error')): ?>
	  <div class="alert alert-danger fade show alert-danger" role="alert">
                            <div class="alert-icon"><i class="flaticon2-delete"></i></div>
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
		<?php echo form_open("admin/get_expnces_blanch"); ?>
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon-list-2"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Recomended Expences list
			</h3>
			
			&nbsp;&nbsp;&nbsp;
			<h3 class="kt-portlet__head-title">
				<span>Select Branch</span>
				<select type="blanch_id" name="blanch_id" class="form-control">
					<option value="">Select Branch</option>
					<?php foreach ($blanch as $blanchs): ?>
					<option value="<?php echo $blanchs->blanch_id; ?>"><?php echo $blanchs->blanch_name; ?></option>
					<?php endforeach; ?>
				</select>

			</h3>
			    <h3 class="kt-portlet__head-title">
				<br>
				<button type="submit" class="btn btn-primary">Get Data</button>
			</h3>
		</div>
		<?php echo form_close(); ?>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		&nbsp;
		
		<a href="" class="btn btn-info" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_4"><i class="kt-menu__link-icon flaticon2-search-1"></i>Filter</a>

		&nbsp;
		<a href="<?php echo base_url("admin/print_all_request"); ?>" class="btn btn-brand btn-elevate btn-icon-sm" target="_blank">
			<i class="flaticon-technology"></i>
			print All  Expences
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
				  							    <th>Expenses</th>
				  							    <th>Amount</th>
												<th>Descrption </th>
												<th>Comment</th>
												<th>Date</th>
												<th>status</th>
												<th>Action</th>
				  									
				  									
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                          <?php $no = 1; ?>
									<?php foreach ($data as $datas): ?>
									          <tr>
				  					<td><?php echo $datas->blanch_name; ?></td>
				  					<td><?php echo $datas->ex_name; ?></td>
				  					<td><?php echo number_format($datas->req_amount); ?></td>
				  					<td><?php echo $datas->req_description; ?></td>
				  					 <td><?php echo $datas->req_comment; ?></td>
				  					 <td><?php echo $datas->req_date; ?></td>
				  					<td>
				  						<?php if($datas->req_status == 'open'){ ?>
				  				<a href="#" class="badge badge-danger ">Not Accepted</a>
				  			<?php }elseif ($datas->req_status == 'accept') {
				  			 ?>
				  			 <a href="#" class="badge badge-success ">Accepted</a>
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
					<li class="kt-nav__item">
						<a href="#" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_1<?php echo $datas->req_id; ?>">
							<i class="kt-nav__link-icon flaticon2-check-mark" ></i>
							<span class="kt-nav__link-text">Accept</span>
						</a>
					</li>
					<li class="kt-nav__item">
						<a href="<?php echo base_url("admin/delete_expences/{$datas->req_id}") ?>" class="kt-nav__link">
							<i class="kt-nav__link-icon flaticon-close" ></i>
							<span class="kt-nav__link-text" onclick="return confirm('Are you sure?')">Reject</span>
						</a>
					</li>
				</ul>
			</div>
	</div>
</td>			  											  							
</tr>

<div class="modal fade" id="kt_modal_1<?php echo $datas->req_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Expences Accept Comment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("admin/expenses_request_accept/{$datas->req_id}"); ?>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">*Comment:</label>
                        <textarea type="text" class="form-control" rows="4" autocomplete="off" name="req_comment" value="<?php //echo $blanchs->blanch_name; ?>"></textarea>
                         <label for="recipient-name" class="form-control-label">*Amount:</label>
                        <input type="number" class="form-control" required autocomplete="off" name="req_amount" value="<?php echo $datas->req_amount; ?>">
                        <label>Branch Account</label>
                        <select type="number" class="form-control" name="trans_id" required>
                        	<option value="">Select Branch Account</option>
                        	<?php foreach ($account as $accounts): ?>
                        	<option value="<?php echo $accounts->trans_id; ?>"><?php echo $accounts->account_name; ?></option>
                        	<?php endforeach; ?>
                        </select>
                    </div>  
            </div>
            <div class="modal-footer">
               
                <button type="submit" class="btn btn-primary">Accept</button>

            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!--end::Modal-->

<?php endforeach; ?>
									
	                </tbody>
	                <tfoot>
                    <tr>
                   	<th>TOTAL</th>
				    <th></th>
				    <th><?php echo number_format($tota_exp->total_expences); ?></th>
				    <th></th>
				    <th></th>
				    <th></th>
				     <th></th>
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
                <?php echo form_open("admin/previous_expences"); ?>

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