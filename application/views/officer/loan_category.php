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
<div class="row">
	<div class="col-lg-12">
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
					Loan Category
					</h3>
				</div>
			</div>
			<!--begin::Form-->
			<!-- <form method="post" action="ss" class="kt-form kt-form--label-right" id="kt_form_2"> -->
				<?php echo form_open("admin/create_loanCategory",['class'=>'kt-form kt-form--label-right','novalidate']); ?>
				<div class="kt-portlet__body">
					<div class="kt-section">
						<div class="kt-section__content">
							<div class="form-group form-group-last row">
								<div class="col-lg-3 form-group-sub">
									<label class="form-control-label">*Loan Category name:</label>
								<input type="text" name="loan_name" placeholder="Loan Category name" autocomplete="off" class="form-control input-sm" required>
								</div>
								<div class="col-lg-3 form-group-sub">
									<label class="form-control-label">*From:</label>
									<input type="number" name=" loan_price" placeholder="eg.1000" autocomplete="off" class="form-control input-sm" required>
								</div>
								<input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">
								<div class="col-lg-3 form-group-sub">
									<label  class="form-control-label">*To:</label>
									<input type="number" name="loan_perday" placeholder="eg.10000" autocomplete="off" class="form-control input-sm" required>
								</div>

								<div class="col-lg-3 form-group-sub">
									<label  class="form-control-label">*Loan Interest(%)</label>
								<input type="" name="interest_formular" placeholder="Loan Interest(%)" autocomplete="off" class="form-control input-sm" required>

								</div>

							</div>
						</div>
					</div>
				</div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<div class="row">
							<div class="col-lg-12">
								<div class="text-center">
								<button type="submit" class="btn btn-brand  btn-elevate btn-pill btn-sm">Save</button>
								<button type="reset" class="btn btn-danger btn-elevate btn-pill btn-sm">Cancel</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php echo form_close(); ?>
			<!--end::Form-->
		</div>
		<!--end::Portlet-->
	</div>
</div>



<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon-list-2"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Loan Category List
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
	  							   <th>S/No.</th>
									<th>Loan Category name</th>
									<th>Loan level</th>
									<!-- <th>Loan Return</th> -->
									<th>Loan Interest</th>
									<th>Action</th>
				  									
				  									
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                         <?php $no = 1; ?>
									<?php foreach ($loan_category as $loan_categorys): ?>
									          <tr>
				  					<td><?php echo $no++; ?>.</td>
				  					<td><?php echo $loan_categorys->loan_name; ?></td>
				  					<td><?php echo number_format($loan_categorys->loan_price); ?> - <?php echo  number_format($loan_categorys->loan_perday);  ?> </td>
				  					
				  					<td><?php echo $loan_categorys->interest_formular; ?>%</td>
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
						<a href="#" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_<?php echo $loan_categorys->category_id; ?>">
							<i class="kt-nav__link-icon flaticon-edit" ></i>
							<span class="kt-nav__link-text">Edit</span>
						</a>
					</li>

				</ul>
			</div>
	</div>
</td>			  											  							
</tr>

<!--begin::Modal-->
<div class="modal fade" id="kt_modal_<?php echo $loan_categorys->category_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Loan Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("admin/update_loanCategory/{$loan_categorys->category_id}"); ?>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">*Loan Category Name:</label>
                        <input type="text" class="form-control" autocomplete="off" name="loan_name" value="<?php echo $loan_categorys->loan_name; ?>">
                        
                         <label for="recipient-name" class="form-control-label">*From:</label>
                        <input type="number" class="form-control" autocomplete="off" name="loan_price" value="<?php echo $loan_categorys->loan_price; ?>">

                        <label for="recipient-name" class="form-control-label">*To:</label>
                        <input type="text" class="form-control" autocomplete="off" name="loan_perday" value="<?php echo $loan_categorys->loan_perday; ?>">


                        <label for="recipient-name" class="form-control-label">*Loan Interest(%):</label>
                        <input type="number" class="form-control" autocomplete="off" name="interest_formular" value="<?php echo $loan_categorys->interest_formular; ?>">
                    </div>
                   
            </div>
            <div class="modal-footer">
               
                <button type="submit" class="btn btn-primary">Update</button>

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
               <th>S/No.</th>
			<th>Loan Category name</th>
			<th>Loan level</th>
			<!-- <th>Loan Return</th> -->
			<th>Loan Interest</th>
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