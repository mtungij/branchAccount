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
				Outstand  Loan Report / <?php if ($empl_data == FALSE) {
					echo "ALL LAONS";
				}else{
				 echo $empl_data->empl_name; 	
				} ?>
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		&nbsp;
		 
		 <a href="" class="btn btn-info" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_4"><i class="kt-menu__link-icon flaticon2-search-1"></i>Filter</a>
         <?php if (count($out_empl) < 0) {
         }else{
          ?>
		 <a href="<?php echo base_url("admin/print_defaul_loan/{$comp_id}/{$empl_id}"); ?>" class="btn btn-brand btn-elevate btn-icon-sm" target="_blank">
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
				  							    <th>Branch Name</th>
												<th>Customer Name</th>
												<th>Phone Number</th>
												<th>Loan Amount</th>
												<th>Restoration</th>
												<th>Duration Type</th>
												<th>Number of Repayment</th>
												<th>Remain Amount</th>
												<th>pending Day</th>
												<th>Satart date</th>
												<th>End date</th>
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                          <?php $no = 1; ?>
									<?php foreach ($out_empl as $outstands): ?>
									          <tr>
				  					<td class="c"><?php echo $no++; ?> </td>
				  					<td class="c">
				  					   <?php echo $outstands->blanch_name; ?>
				  					</td>
				  					<td class="c">
				  						<?php echo $outstands->f_name; ?> <?php echo $outstands->m_name; ?> <?php echo $outstands->l_name; ?>
				  					</td>
				  					<td><?php echo $outstands->phone_no; ?></td>
				  					<td><?php echo number_format($outstands->loan_int); ?></td> 
				  					<td><?php echo number_format($outstands->restration); ?></td> 
				  					<td>
				  						
				  						<?php if($outstands->day == '1'){ ?>
				  							<?php echo "Daily"; ?>
				  						
				  						<?php }elseif ($outstands->day == '7'){
				  							echo "Weekly";
				  						 ?>
				  						 <?php }elseif ($outstands->day == '30' || $outstands->day == '31' || $outstands->day == '29' || $outstands->day == '28') {
				  						 	echo "Monthly";
				  						  ?>
				  						  <?php } ?>	
				  						</td> 
				  					 
				  			
				  			<td><?php echo $outstands->session; ?></td> 
				  			<td><?php echo number_format($outstands->remain_amount); ?></td> 
				  			<td style="color:red;"><?php echo $outstands->pending_day; ?></td> 
				  			<td><?php echo $outstands->loan_stat_date; ?></td> 
				  			<td><?php echo substr($outstands->loan_end_date, 0,10); ?></td> 
				  			
				  								  											  							
                                   </tr>
                      <?php endforeach; ?>
									
	                </tbody>
	                <tfoot>
                     <tr>
                    <th>TOTAL</th>
					<th></th>
					<th><?php //echo number_format($sum_depost->cash_depost); ?></th>
					<th><?php //echo number_format($sum_withdrawls->cash_withdrowal); ?></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th><?php echo number_format($total_out->total_out); ?></th>
					<th><?php //echo number_format($pend->total_pending); ?></th>
					<th><?php //echo number_format($pend->total_pending); ?></th>
					<th><?php //echo number_format($pend->total_pending); ?></th>
					
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
                <?php echo form_open("admin/filter_default_employe"); ?>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                            <label class="form-control-label">*Select Employee:</label>
                            <select class="form-control kt-selectpicker" name="empl_id" required data-live-search="true">
                                   <option value="">Select Branch</option>
                                    <?php foreach ($employee as $employees): ?>
                                <option value="<?php echo $employees->empl_id; ?>"><?php echo $employees->empl_name; ?> </option>
                                    <?php endforeach; ?>
                                    <option value="all">ALL</option>
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