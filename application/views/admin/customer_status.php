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
				All Customer List <b>(<?php echo $blanch_customer->blanch_name ?>)</b>
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		&nbsp;
		 <a href="" class="btn btn-info" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_4"><i class="kt-menu__link-icon flaticon2-search-1"></i>Filter</a>
        <?php if (count($customer_statusData) == 0) {
         ?>
     <?php }else{ ?>
		<a href="<?php echo base_url("admin/print_customer_status/{$blanch_id}/{$comp_id}/{$customer_status}"); ?>" class="btn btn-brand btn-elevate btn-icon-sm" target="_blank">
			<i class="flaticon-technology"></i>
			Print
		</a>
		<?php } ?>
	</div>	
</div>		</div>
	</div>

	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
									     <thead>
			  						          <tr>
		  							 <th>S/No.</th>
									<th>Customer ID no</th>
									<th>customer name</th>
									<th>Date of Birth</th>
									<th>Sex</th>
									<th>Phone number</th>
									<!-- <th>Branch</th> -->
									<th>Region</th>
									<th>Date</th>
									<th>Status</th>
									<th>Action</th>
				  									
				  									
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                          <?php $no = 1; ?>
									<?php foreach($customer_statusData  as $customers): ?>
									          <tr>
				  					<td><?php echo $no++; ?>.</td>
				  					<td><?php echo $customers->customer_code; ?></td>
				  					<td><?php echo $customers->f_name; ?> <?php echo $customers->m_name; ?> <?php echo $customers->l_name; ?></td>
				  					<td><?php echo $customers->date_birth; ?></td>
				  					<td><?php echo $customers->gender; ?></td>
				  					<td><?php echo $customers->phone_no; ?></td>
				  					<!-- <td><?php //echo $customers->blanch_name; ?></td> -->
				  						<td><?php echo $customers->region_name; ?></td>
				  						<td><?php echo substr($customers->customer_day, 0,10); ?></td>
				  						<td>
				 	<?php if ($customers->customer_status == 'open') {
				 ?>
				 <a href="#" class="badge badge-success">Active</a>
				<?php }elseif ($customers->customer_status == 'close') {
				 ?>
				 <a href="#" class="badge badge-danger">Closed</a>
				 <?php }elseif($customers->customer_status == 'pending'){
				  ?>
				  <a href="#" class="badge badge-warning">Pending</a>
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
					<!-- <li class="kt-nav__item">
						<a href="#" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_<?php //echo $capitals->capital_id; ?>">
							<i class="kt-nav__link-icon flaticon-edit" ></i>
							<span class="kt-nav__link-text">Edit</span>
						</a>
					</li> -->
					<li class="kt-nav__item">
						<a href="<?php echo base_url("admin/view_more_customer/{$customers->customer_id}") ?>" class="kt-nav__link">
							<i class="kt-nav__link-icon flaticon-eye" ></i>
							<span class="kt-nav__link-text">View more</span>
						</a>
					</li>
					
					
					<li class="kt-nav__item">
						<a href="<?php echo base_url("admin/delete_customerData/{$customers->customer_id}") ?>" class="kt-nav__link" onclick="return confirm('Are you sure?')">
							<i class="kt-nav__link-icon flaticon-delete"></i>
							<span class="kt-nav__link-text">Delete</span>
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
           <th>S/No.</th>
			<th>Customer ID no</th>
			<th>customer name</th>
			<th>Date of Birth</th>
			<th>Sex</th>
			<th>Phone number</th>
			<!-- <th>Branch</th> -->
			<th>Region</th>
			<th>Date</th>
			<th>Status</th>
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


<div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter Customer By</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("admin/filter_customer_status"); ?>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                            <label class="form-control-label">*Select Branch:</label>
                            <select class="form-control kt-selectpicker" name="blanch_id" required data-live-search="true">
                                   <option value="">Select Branch</option>
                                    <?php foreach ($blanch as $blanchs): ?>
                                <option value="<?php echo $blanchs->blanch_id; ?>"><?php echo $blanchs->blanch_name; ?> </option>
                                    <?php endforeach; ?>
                                </select>
                               
                        </div>
                             <div class="col-lg-6">
                          <label class="form-control-label">*Select Customer Status:</label>
                            <select class="form-control kt-selectpicker" name="customer_status" required data-live-search="true">
                               <option value="">Select customer Status</option>
                                <option value="open">ACTIVE</option> 
                                <option value="pending">PENDING</option>
                                <option value="close">CLOSED</option>
                                </select>

                          <input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">
                               
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