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
				Today Expenses
			</h3>
			
			&nbsp;&nbsp;&nbsp;
			<h3 class="kt-portlet__head-title">
				<span>Select Blanch</span>
				<select type="blanch_id" name="blanch_id" class="form-control">
					<option value="">Select Blanch</option>
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
		<a href="<?php echo base_url("admin/get_recomended_request") ?>" class="btn btn-brand btn-elevate btn-icon-sm">
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
			  						          	<th>Branch</th>
				  							    <th>Expenses</th>
				  							    <th>Amount</th>
												<th>Descrption </th>
												<!-- <th>Comment</th> -->
												<th>From Branch Account</th>
												<th>Date</th>
												<!-- <th>status</th> -->
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
				  					<!-- <td><?php //echo $datas->req_description; ?></td> -->
				  					 <td><?php echo $datas->req_comment; ?></td>
				  					 <td><?php echo $datas->account_name; ?></td>
				  					 <td><?php echo $datas->req_date; ?></td>
				  		
				  					
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
						<a href="#" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_1<?php echo $datas->req_id; ?>">
							<i class="kt-nav__link-icon flaticon2-check-mark" ></i>
							<span class="kt-nav__link-text">Accept</span>
						</a>
					</li> -->
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



<?php endforeach; ?>
									
	                </tbody>
	                <tfoot>
                    <tr>
                   	<th>TOTAL</th>
				    <th></th>
				    <th><?php echo number_format($total_exp->total_expences); ?></th>
				    <th></th>
				    <th></th>
				    <th></th>
				  <!--    <th></th> -->
				    <!--  <th></th> -->
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