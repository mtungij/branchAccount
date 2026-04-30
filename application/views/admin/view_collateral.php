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
				Collateral List
			</h3>
			
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">
		  <!-- <a href="" class="btn btn-info" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_4"><i class="kt-menu__link-icon flaticon2-search-1"></i>Filter</a> -->
		  
		<a href="<?php echo base_url("admin/view_more_customer/{$customer_id}"); ?>" class="btn btn-brand btn-elevate btn-icon-sm">
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
				  							    <th>S/No.</th>
				  							    <th>collateral Name</th>
												<th>Collateral Condition</th>
												<th>Collateral Current Value</th>
												<th>Collateral Photo</th>
												<!-- <th>Action</th> -->
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                          <?php $no = 1; ?>
									<?php foreach ($data_collateral as $data_collaterals): ?>
									          <tr>
				  					<td><?php echo $no++; ?>.</td>
				  					<td class="c"><?php echo $data_collaterals->description; ?> </td>
				  					<td class="c">
				  					  <?php echo $data_collaterals->co_condition; ?>
				  					</td>
				  					<td class="c">
				  						<?php echo number_format($data_collaterals->value); ?>
				  					</td>
				  					<td>
				  						<img src="<?php echo base_url().'assets/img/'.@$data_collaterals->file_name; ?>" class="img-thumbnail" style="width: 100px; height: 100px;">
				  					</td>
				  					  											  							
                                   </tr>
  
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


<!--end::Modal-->