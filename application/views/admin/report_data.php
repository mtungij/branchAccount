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
				Account Statement
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
				  							    <th>Date</th>
												<th>Account Name</th>
												<th>Deposit</th>
												<th>Withdrawal</th>
												<th>Balance</th>	
				  						         </tr>
				  						         <?php if ($without->fee_id == TRUE){ ?>
				  						   
				  						         <th>
				  						        <?php echo $null->pay_day; ?>
				  						         		
				  						         	</th>
				  						         <th></th>
				  						         <th>0.00</th>
				  						         <th>0.00</th>
				  						         <th>
				  						<?php echo number_format($null->balance); ?>.00 
				  						            </th>
				  						        <?php }elseif($without->fee_id == FALSE){ ?>
				  						        	<?php } ?>
						                  </thead>
			
								    <tbody>
                                          <?php
                                           $no = 1; 

                                           ?>
                                         <?php if ($data): ?>
                                           <?php 
                                           $pay_day = "";
                                           $description = "";
                                           $day = "";
                                           $session = "";
                                           $loan_code = "";
                                           $loan_aprove = "";
                                            ?>
									<?php foreach ($data as $datas): ?>
									          <tr>
									   <?php if($datas->fee_status == 'YES'){ ?>
				  					<td><?php echo substr($datas->pay_day, 0,10); ?></td>
				  					<td>
				  						<?php echo $datas->description; ?> <?php echo @$datas->fee_interest; ?>%/<?php echo $datas->loan_name ; ?>/ <?php echo $datas->session; ?> <?php if($datas->day == 1){
                                           echo "Daily";
				  					}elseif($datas->day == 7){
                                         echo "Weekly";
				  					}elseif ($datas->day == 30) {
				  						echo "Monthly";
				  					 ?> 
				  					<?php } ?> / <?php echo $datas->loan_code; ?>

				  				
				  					</td>
				  					<td><?php echo number_format($datas->depost); ?>.00</td>
				  					<td><?php echo number_format($datas->withdrow); ?>.00</td>

				  					<td>

				  						<?php echo number_format($datas->balance); ?>.00
				  						
				  					</td>
				  				<?php }elseif($datas->fee_status == 'NO'){ ?>
                                       	<td><?php echo substr($datas->pay_day, 0,10); ?></td>
				  					<td>
				  						
				  					
                                <?php echo $datas->loan_name ; ?>/ <?php echo $datas->session; ?> <?php if($datas->day == 1){
                                           echo "Daily";
				  					}elseif($datas->day == 7){
                                         echo "Weekly";
				  					}elseif ($datas->day == 30) {
				  						echo "Monthly";
				  					 ?> 
				  					<?php } ?> / <?php echo $datas->loan_code; ?>

				  						
				  					</td>
				  					<td><?php echo number_format($datas->depost); ?>.00</td>
				  					<td><?php echo number_format($datas->withdrow); ?>.00</td>
				  					<td><?php echo number_format($datas->balance); ?>.00</td>
				  					  <?php } ?>
				  							  											  							
                                       </tr>

<!--begin::Modal-->
<div class="modal fade" id="kt_modal_<?php //echo $blanchs->blanch_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Blanch</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("admin/modify_blanch/{$blanchs->blanch_id}"); ?>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">*Blanch name:</label>
                        <input type="text" class="form-control" autocomplete="off" name="blanch_name" value="<?php echo $blanchs->blanch_name; ?>">
                         <label for="recipient-name" class="form-control-label">*Blanch Region:</label>
                            <select type="number" class="form-control" name="region_id">
                            	<option value="<?php echo $blanchs->region_id; ?>"><?php echo $blanchs->region_name; ?></option>
                            	<?php foreach ($region as $regions): ?>
                            	<option value="<?php echo $regions->region_id; ?>"><?php echo $regions->region_name; ?></option>
                            	<?php endforeach; ?>
                            </select>
                         <label for="recipient-name" class="form-control-label">*Blanch phone number:</label>
                        <input type="number" class="form-control" autocomplete="off" name="blanch_no" value="<?php echo $blanchs->blanch_no; ?>">
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
  <?php endif; ?>
									
	                </tbody>
	                 
                    <tr>
                    <td><?php echo substr($datas->pay_day, 0,10); ?></td>
					<td> <?php echo $datas->loan_name; ?> / <?php echo $datas->session; ?> <?php if($datas->day == 1){
                                           echo "Daily";
				  					}elseif($datas->day == 7){
                                         echo "Weekly";
				  					}elseif ($datas->day == 30) {
				  						echo "Monthly";
				  					 ?>
				  					 <?php } ?> / <?php echo $datas->loan_code; ?>  </td>
					<td><?php echo number_format($datas->loan_aprove); ?></td>
					<td>0.00</td>
					<td><?php echo number_format($datas->loan_aprove); ?></td>
                    </tr>
                   </table>
		<!--end: Datatable -->
	</div>
</div>
</div>
<!-- end:: Content -->
<!-- end:: Content -->
				</div>				
				
<?php include('incs/footer_1.php') ?>