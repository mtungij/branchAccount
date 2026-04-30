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
				Daily Report At (<?php echo  date('Y-m-d') ?>)
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		&nbsp;
		<a href="" class="btn btn-info" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_4"><i class="kt-menu__link-icon flaticon2-search-1"></i>Filter</a>
		<a href="<?php echo base_url("admin/print_daily_report/{$from}/{$to}"); ?>" class="btn btn-brand btn-elevate btn-icon-sm" target="_blank">
			<i class="flaticon-technology"></i>
			Print
		</a>
	</div>	
</div>		</div>
	</div>

	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_">
									     <thead>
			  						          <tr>
		  							    <th><b>Branch Name</b></th>
		  							    <!-- <th><b>Today Receivable</b></th> -->
										<th><b>Received</b></th>
										<!-- <th><b>Accural</b></th> -->
										<th><b>Withdrawal</b></th>
										<th><b>Deducted Income</b></th>
										<th><b>Non Deducted Income</b></th>
										<th><b>Expenses</b></th>
										
				  						  </tr>
						                  </thead>
			
								    <tbody>
                                        
									<?php foreach($blanch as $blanchs): ?>
									  <tr>
				  					<td><b><?php echo $blanchs->blanch_name; ?><b></td>
				  					
				  					<td><?php //echo $today_recevables->phone_no; ?></td>
				  					
				  					<td><?php //if ($today_recevables->day == 1) {
				  								 //echo "Daily";
				  							 ?>
				  							<?php //}elseif($today_recevables->day == 7){
                                                  //echo "Weekly";
				  							 ?>
				  							
				  						<?php //}elseif($today_recevables->day == 30 || $today_recevables->day == 31 || $today_recevables->day == 28 || $today_recevables->day == 29){
				  						        //echo "Monthly"; 
				  							?>
				  							<?php //} ?></td>
				  					<td><?php //echo number_format($today_recevables->loan_int); ?></td>
				  					<td><?php //echo number_format($today_recevables->restration); ?></td>
				  					<td><?php //echo $today_recevables->empl_name; ?></td>					  							
                                     </tr>
                                  <?php $daily_report = $this->queries->get_today_loan_withdrawal_prev($blanchs->blanch_id,$from,$to);
                                  $deposit = $this->queries->get_total_depost_blanch_prev($blanchs->blanch_id,$from,$to);
                                  $deducted_income = $this->queries->get_total_deducted_fee_today_prev($blanchs->blanch_id,$from,$to);
                                  $non_deducted = $this->queries->get_total_receive_nonDeducted_prev($blanchs->blanch_id,$from,$to);
                                  $expenses = $this->queries->get_expenses_total_comp_prev($blanchs->blanch_id,$from,$to);
                                  $restration = $this->queries->get_today_receivable_blanch_prev($blanchs->blanch_id,$from,$to);
                                 
                                  
                                  //print_r($customer)
                                   ?>
                                   <?php //foreach ($daily_report as $daily_reports): ?>
                                     <tr>
				  					<td><b><?php //echo $blanchs->blanch_name; ?><b></td>
				  					
				  					<td>
				  						
				  					<?php if (@$deposit->total_depost == FALSE) {
				  						 ?>
				  						 0.00
				  						<?php }else{
				  						 ?>
				  						<?php echo number_format(@$deposit->total_depost); ?>
                                        <?php } ?>		
				  				    </td>

				  				    <!-- <td>ds</td> -->
				  					
				  					<td>
                                     <?php if ( @$daily_report->total_loan_with == FALSE) {
				  						 ?>
				  						 0.00
				  						<?php }else{ ?>
				  						<?php echo number_format(@$daily_report->total_loan_with); ?>
				  						<?php } ?>

				  						
				  							
				  						</td>
				  					<td>
				  						<?php if (@$deducted_income->total_deducted_balance == FALSE) {
				  						 ?>
				  						 0.00
				  						<?php }else{ ?>
				  						<?php echo number_format(@$deducted_income->total_deducted_balance); ?>
				  						 <?php } ?>	
				  						</td>
				  					<td>
				  						<?php if (@$non_deducted->total_receive_nondeducted == FALSE) {
				  						 ?>
				  						 0.00
				  						<?php }else{ ?>
				  						<?php echo number_format(@$non_deducted->total_receive_nondeducted); ?>
				  						<?php } ?>
				  							
				  						</td>
				  					<td>
				  				    <?php if ($expenses->total_expenses == FALSE) {
				  						 ?>
				  					 0.00	
				  					 <?php }else{ ?>
				  					 <?php echo number_format($expenses->total_expenses); ?>
				  					<?php } ?>
				  							
				  					</td>
				  										  							
                                      </tr>
                                 <?php //endforeach; ?>

                       <?php endforeach; ?>
									
	                </tbody>
	                <tfoot>
                    <tr>
                                       <th><b>TOTAL</b></th>
										
										<th><b><?php echo number_format($total_depost_comp->total_depost_comp); ?></b></th>
										<!-- <td><b></b></td> -->
										<th><b><?php echo number_format($total_today_with->total_loan_withcomp); ?></b></th>

										<th><b><?php echo number_format($total_deducted_comp->total_deducted_balancecomp); ?></b></th>
										<th><b><?php echo number_format($total_non_deducted->total_receive_nondeducted_comp) ?></b></th>
										<th><b><?php echo number_format($total_comp_expenses->total_expenses_comp); ?></b></th>	
									
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
                <h5 class="modal-title" id="exampleModalLabel">Filter By</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("admin/filter_daily_report"); ?>

                    <div class="form-group">
                        <div class="row">
                          
                           <?php $date = date("Y-m-d"); ?>
                         <div class="col-lg-6">
                            <label class="form-control-label">*From:</label>
                              
                              <input type="date" name="from" class="form-control" required value="<?php echo $date; ?>">
                               
                        </div>

                        <div class="col-lg-6">
                            <label class="form-control-label">*TO:</label>
                              
                              <input type="date" name="to" class="form-control" required value="<?php echo $date; ?>">
                               
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


		