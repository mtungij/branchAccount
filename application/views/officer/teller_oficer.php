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
     <?php //echo form_open("admin/prev_pendingLoan"); ?>
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon-list-2"></i>
			</span>
			<h3 class="kt-portlet__head-title">
			Teller Officer Cash Transaction
			</h3>
			
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		&nbsp;
		<!-- <a href="<?php //echo base_url("admin/prev_cashtransaction"); ?>" class="btn btn-brand btn-elevate btn-icon-sm">
			<i class="flaticon-event-calendar-symbol"></i>
			Previous
		</a> -->
		<a href="<?php echo base_url("oficer/print_report_telleroficer"); ?>" class="btn btn-brand btn-elevate btn-icon-sm" target="_blank">
			<i class="flaticon-technology"></i>
			Print
		</a>
	</div>	
</div>		</div>
	</div>
	<?php echo form_close(); ?>

	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_">
									     <thead>
			  						           <tr>
				  							    <th>JINA LA AFISA</th>
				  							    <th>S/No.</th>
												<th>JINA LA MTEJA</th>
												<th>NAMBA YA SIMU</th>
												<th>MUDA</th>
												<th>KUSANYO</th>
												<th>LIPWA</th>
												<th>Account</th>
												<th>TOLEWA</th>
												<th>Account</th>
				  						       </tr>
						                  </thead>
			
								    <tbody>
                                          <?php $no = 1; ?>
								<?php foreach ($empl_oficer as $oficer_datas): ?>
									 <tr>
				  					<td>
				  						<b><?php echo $oficer_datas->empl_name; ?></b>	
				  						</td>
				  					<td style="border: none;"> </td>
				  					<td style="border: none;"></td>
				  					<td style="border: none;"></td>
				  					<td style="border: none;"></td>
				  					<td style="border: none;"></td> 
				  					<td style="border: none;"></td>
				  					<td style="border: none;"></td> 
				  					<td style="border: none;"></td> 
				  					<td style="border: none;"></td> 		
                                   </tr>
                                 
                               <?php
                               $empl_loan = $this->queries->get_loan_empl_data($oficer_datas->empl_id);
                            //    echo "<pre>";
                            //    print_r($empl_loan);
                            //          exit();
                                ?>
                                <?php $no = 1; ?>
                                <?php foreach ($empl_loan as $empl_loans): ?>
									 <tr>
				  					
				  					<td></td>
				  					<td class="c"><?php echo $no++; ?>. </td>
				  					<td class="c">
				  					   <?php echo $empl_loans->f_name; ?> <?php echo $empl_loans->m_name; ?> <?php echo $empl_loans->l_name; ?>
				  					</td>
				  					<td>
				  						<?php echo $empl_loans->phone_no; ?>
				  					</td>
				  					<td>
				  						<?php if($empl_loans->day == '1'){ ?>
				  							<?php echo "Siku"; ?>
				  						<?php }elseif ($empl_loans->day == '7'){
				  							echo "Week";
				  						 ?>
				  						 <?php }elseif ($empl_loans->day == '30' || $empl_loans->day == '31' || $empl_loans->day == '28' || $empl_loans->day == '29') {
				  						 	echo "Mwezi";
				  						  ?>
				  						  <?php } ?>
				  					</td>
				  					<td><?php echo number_format($empl_loans->restration); ?></td> 
				  					<td><?php echo number_format($empl_loans->total_received); ?></td>
				  					<td><?php echo $empl_loans->depost_account; ?></td> 
				  					<td><?php echo number_format($empl_loans->total_withdrawal); ?></td> 
				  					<td><?php echo $empl_loans->with_account; ?></td> 						
                                   </tr>
                                    <?php endforeach; ?>
                                    <?php $total_work_individual = $this->queries->get_total_depost_individual($oficer_datas->empl_id); ?>
                                    <?php foreach ($total_work_individual as $total_work_individuals): ?>
                                    	
                                   
                                    <tr>
                                    <td></td>
				  					<td></td>
				  					<td class="c"><b>TOTAL</b> </td>
				  					<td class="c"></td>
				  					<td></td>
				  						
				  					<td>
				  						<?php //if($empl_loans->day == '1'){ ?>
				  							<?php //echo "Daily"; ?>
				  						<?php //}elseif ($empl_loans->day == '7'){
				  							//echo "Weekly";
				  						 ?>
				  						 <?php //}elseif ($empl_loans->day == '30' || $empl_loans->day == '31' || $empl_loans->day == '28' || $empl_loans->day == '29') {
				  						 	//echo "Monthly";
				  						  ?>
				  						  <?php //} ?>
				  					</td>
				  					<td></td> 
				  					<td><b><?php echo number_format($total_work_individuals->total_depost_individual); ?></b></td>
				  					<td></td> 
				  					<td><b><?php echo number_format($total_work_individuals->total_withdrawal_individual); ?></b></td> 
				  					<td></td>	
                                    </tr>
                                  <?php endforeach; ?>
                                 
                                    <?php $group_empl = $this->queries->get_empl_group_depost($oficer_datas->empl_id);?>
                                 <?php foreach ($group_empl as $group_empls): ?>
                                     <tr>
                                    <td></td>
				  					<td><?php echo $group_empls->group_name; ?></td>
				  					<td class="c"></td>
				  					<td class="c"></td>
                                  	
				  					<td>
				  						<?php //if($empl_loans->day == '1'){ ?>
				  							<?php //echo "Daily"; ?>
				  						<?php //}elseif ($empl_loans->day == '7'){
				  							//echo "Weekly";
				  						 ?>
				  						 <?php //}elseif ($empl_loans->day == '30' || $empl_loans->day == '31' || $empl_loans->day == '28' || $empl_loans->day == '29') {
				  						 	//echo "Monthly";
				  						  ?>
				  						  <?php //} ?>
				  					</td>
				  					<td></td> 
				  					<td><b><?php //echo number_format($total_work_individuals->total_depost_individual); ?></b></td>
				  					<td></td> 
				  					<td><b><?php //echo number_format($total_work_individuals->total_withdrawal_individual); ?></b></td> 
				  					<td></td>	
				  					<td></td>	
                                    </tr>

                            
                                
                                <?php $total_work_group = $this->queries->get_total_group_depost($group_empls->group_id); ?>
                                <?php foreach ($total_work_group as $total_work_groups): ?>
                                <tr>
                                    <td></td>
				  					<td><b>JUMLA</b></td>
				  					<td class="c"></td>
				  					<td class="c"></td>
                                  	
				  					<td></td>
				  					<td><?php //if($member_groups->day == '1'){ ?>
				  							<?php //echo "Daily"; ?>
				  						<?php //}elseif ($member_groups->day == '7'){
				  							//echo "Weekly";
				  						 ?>
				  						 <?php //}elseif ($member_groups->day == '30' || $member_groups->day == '31' || $member_groups->day == '28' || $member_groups->day == '29') {
				  						 	//echo "Monthly";
				  						  ?>
				  						  <?php //} ?></td> 
				  					<td><?php //echo $member_groups->restration; ?>
				  						  </td>
				  					<td><b><?php echo number_format($total_work_groups->total_depost_group); ?></b></td> 
				  					<td><?php //echo $member_groups->depost_account; ?></td> 
				  					<td><b><?php echo number_format($total_work_groups->total_withdrawal_group); ?></b></td>	
				  					<td><?php //echo $member_groups->with_account; ?></td>	
                                    </tr>
                                 <?php endforeach; ?>
                                  <?php endforeach; ?>
                                  <?php $ofice_repayment = $this->queries->get_total_empl_depost_data($oficer_datas->empl_id);
                                //   echo "<pre>";
                                // print_r($ofice_repayment);
                                //          exit();
                                   ?>

                                  <?php foreach ($ofice_repayment as $ofice_repayments): ?>
                                  <tr>
                                  	<td style="color:green;"><b>JUMLA YA MALIPO YA AFISA:</b></td>
				  					<td><b></b></td>
				  					<td class="c"></td>
				  					<td class="c"></td>
                                  	
				  					<td></td>
				  					<td><?php //if($member_groups->day == '1'){ ?>
				  							<?php //echo "Daily"; ?>
				  						<?php //}elseif ($member_groups->day == '7'){
				  							//echo "Weekly";
				  						 ?>
				  						 <?php //}elseif ($member_groups->day == '30' || $member_groups->day == '31' || $member_groups->day == '28' || $member_groups->day == '29') {
				  						 	//echo "Monthly";
				  						  ?>
				  						  <?php //} ?></td> 
				  					<td><?php //echo $member_groups->restration; ?>
				  						  </td>
				  					<td style="color:green;"><b><?php echo number_format($ofice_repayments->total_depost_oficer); ?></b></td> 
				  					<td><?php //echo $member_groups->depost_account; ?></td> 
				  					<td style="color:green;"><b><?php echo number_format($ofice_repayments->total_withdrawal_oficer); ?></b></td>	
				  					<td><?php //echo $member_groups->with_account; ?></td>
                                  </tr>
                               <?php endforeach; ?>
                            <?php endforeach; ?>
                       </tbody>
                   </table>
		<!--end: Datatable -->
	</div>
</div>

<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon-list-2"></i>
			</span>
			<h3 class="kt-portlet__head-title">
			MUHTASARI
			</h3>
		</div>		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">
	</div>	
</div>
</div>
	</div>

	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		            <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_">
									      <thead>
			  						          <tr>
												<th><b>TOLEWA JUMLA </b></th>
												<th><b><?php echo number_format($total_withdrawal->total_withdrawal_comp); ?></b></th>
				  						      </tr>
				  						      <tr>
												<th><b>LIPWA JUMLA</b></th>
												<th><b><?php echo number_format($total_deposit->total_depost_comp); ?><b></th>
				  						      </tr>
						                  </thead>
								      <tbody>
                                          <?php //$no = 1; ?>
									<?php //foreach ($float as $floats): ?>
									<!--   <tr>
				  					<td><b>GRAND TOTAL</b></td>
				  					<td><b><?php //echo number_format($total_withdrawal->total_withdrawal_comp + $total_deposit->total_depost_comp); ?></b></td>  					
                                </tr> -->
                             </tbody>
                    </table>
	                         </div>
                            </div>

    <div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon-list-2"></i>
			</span>
			<h3 class="kt-portlet__head-title">
			MUHTASARI WA ACCOUNT ZA MALIPO
			</h3>
		</div>		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">
	</div>	
</div>
</div>
	</div>

	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		            <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_">
									      <thead>
			  						          <tr>
												<th>JINA LA ACCOUNT</th>
												<th>KIASI</th>
												<th>IDADI YA RISITI</th>
						                  </thead>
								      <tbody>
                                          <?php //$no = 1; ?>
									<?php foreach ($cash_account as $cash_accounts): ?>
									 <tr>
				  					<td><?php echo $cash_accounts->account_name; ?></td>
				  					<td><?php echo $cash_accounts->total_depost_account ?></td>  					
				  					<td><?php echo $cash_accounts->recept; ?></td>  					
                                    </tr> 
                            <?php endforeach; ?>
                             </tbody>
                    </table>
	                         </div>
                            </div>
                          </div>


<!-- end:: Content -->
<!-- end:: Content -->
				</div>				
				
<?php include('incs/footer_1.php') ?>