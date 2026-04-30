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

          <?php foreach ($customer_data as $customer_profiles): ?>
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
    <div class="col-xl-12">
        <!--begin:: Widgets/Applications/User/Profile3-->
<div class="kt-portlet kt-portlet--height-fluid">
    <div class="kt-portlet__body">
        <div class="kt-widget kt-widget--user-profile-3">
            <div class="kt-widget__top">
                <div class="kt-widget__media kt-hidden-">
                	<?php if ($customer_profiles->passport == TRUE) {
                	 ?>
                    <img src="<?php echo base_url().'assets/img/'.$customer_profiles->passport; ?>" alt="passport" style="width: 220px; height: 180px;">
                <?php }else{ ?>

                	 <img src="<?php echo base_url();?>assets/img/user.png" alt="passport" style="width: 220px; height: 180px;">
                	<?php } ?>
                </div>
                <style>
                	.a {
         text-transform: uppercase;
                 }
                </style>
                
                <div class="kt-widget__content">
                    <div class="kt-widget__head">
                        <a href="#" class="kt-widget__username">
                            <b class="a"> <?php echo $customer_profiles->f_name ?> <?php echo $customer_profiles->m_name ?> <?php echo $customer_profiles->l_name ?> </b>
                            <br>
                            (<b><?php echo $group->group_name; ?></b>)   
                            <i class=""></i>                       
                        </a>

                        <div class="kt-widget__action">
                         <div class="">
                         	<?php if ($customer_profiles->signature == TRUE) {
                         	 ?>
                    <img src="<?php echo base_url().'assets/img/'.$customer_profiles->signature; ?>" alt="Signature"style="width: 300px; height: 180px;">
                <?php }else{ ?>
                	 <img src="<?php echo base_url();?>assets/img/sig.jpg" alt="passport" style="width: 300px; height: 180px;">
                	<?php } ?>
                        </div>
                        </div>
                    </div>

                   <!--  <div class="kt-widget__subhead">
                        <a href="#"><i class="flaticon2-new-email"></i>jason@siastudio.com</a>
                        <a href="#"><i class="flaticon2-calendar-3"></i>PR Manager </a>
                        <a href="#"><i class="flaticon2-placeholder"></i>Melbourne</a>
                    </div> -->

      
                </div>
            </div>


<div class="kt-portlet__body">
		<div class="row">
	<div class="col-lg-12">
		<div class="kt-portlet">
			<!-- <div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
					Register Customer
					</h3>
				</div>
			</div> -->
			<!--begin::Form-->
			<!-- <form method="post" action="ss" class="kt-form kt-form--label-right" id="kt_form_2"> -->
				<?php //echo form_open("admin/create_customer",['class'=>'kt-form kt-form--label-right','novalidate']); ?>
				<div class="kt-portlet__body">
					<div class="kt-section">
						<div class="kt-section__content">
							<div class="form-group form-group-last row">
								<div class="col-lg-3 form-group-sub">
									<label class="form-control-label"><b>First Name:</b></label>
							<input type="text" name="f_name" value="<?php echo $customer_profiles->f_name; ?>" readonly placeholder="First name" autocomplete="off" class="form-control input-sm" required>
								</div>
								<div class="col-lg-3 form-group-sub">
									<label class="form-control-label"><b>Middle name:</b></label>
									<input type="text" name="m_name" readonly placeholder="Middle name" autocomplete="off" value="<?php echo $customer_profiles->m_name; ?>" class="form-control input-sm" required>
								</div>
								
								<div class="col-lg-3 form-group-sub">
									<label  class="form-control-label"><b>Last name:</b></label>
									<input type="text" name="l_name" placeholder="Last name" autocomplete="off" readonly value="<?php echo $customer_profiles->l_name; ?>" class="form-control input-sm" required>
								</div>

								<div class="col-lg-3 form-group-sub">
									<label  class="form-control-label"><b>Blanch:</b></label>
									<input type="text" name="l_name" placeholder="Last name" autocomplete="off" readonly value="<?php echo $customer_profiles->blanch_name; ?>" class="form-control input-sm" required>
								</div>
						
								<div class="col-lg-3 form-group-sub">
									<label  class="form-control-label"><b>Gender:</b></label>
									<input type="text" name="l_name" placeholder="Last name" autocomplete="off" readonly value="<?php echo $customer_profiles->gender; ?>" class="form-control input-sm" required>
								</div>
								<div class="col-lg-3 form-group-sub">
									<label class="form-control-label"><b>Date of Birth:</b></label>
							<input type="text" name="l_name" placeholder="Last name" autocomplete="off" readonly value="<?php echo $customer_profiles->date_birth; ?>" class="form-control input-sm" required>
								</div>
								<div class="col-lg-3 form-group-sub">
									<label  class="form-control-label"><b>phone number:</b></label>
							<input type="text" name="l_name" placeholder="Last name" autocomplete="off" readonly value="<?php echo $customer_profiles->phone_no; ?>" class="form-control input-sm" required>
								</div>
									<div class="col-lg-3 form-group-sub">
							<label class="form-control-label"><b>Region:</b></label>
						<input type="text" name="l_name"  autocomplete="off" readonly value="<?php echo $customer_profiles->region_name; ?>" class="form-control input-sm" >
								</div>
									<div class="col-lg-3 form-group-sub">
									<label class="form-control-label"><b>District:</b></label>
							      <input type="text" name="l_name" placeholder="Last name" autocomplete="off" readonly value="<?php echo $customer_profiles->district; ?>" class="form-control input-sm" required>
								</div>
									<div class="col-lg-3 form-group-sub">
									<label class="form-control-label"><b>Ward:</b></label>
							<input type="text" name="l_name" placeholder="Last name" autocomplete="off" readonly value="<?php echo $customer_profiles->ward; ?>" class="form-control input-sm" required>
								</div>
									<div class="col-lg-3 form-group-sub">
									<label class="form-control-label"><b>Street:</b></label>
							<input type="text" name="l_name" placeholder="Last name" autocomplete="off" readonly value="<?php echo $customer_profiles->street; ?>" class="form-control input-sm" required>
								</div>
										<div class="col-lg-3 form-group-sub">
									<label class="form-control-label"><b>Famous Area</b></label>
							<input type="text" name="street" placeholder="street" autocomplete="off" value="<?php echo $customer_profiles->famous_area; ?>" readonly class="form-control input-sm" required>
								</div>
										<div class="col-lg-3 form-group-sub">
									<label class="form-control-label"><b>Martial Status</b></label>
							<input type="text" name="street" placeholder="" autocomplete="off" value="<?php echo $customer_profiles->martial_status; ?>" class="form-control input-sm" readonly required>
								</div>
										<div class="col-lg-3 form-group-sub">
									<label class="form-control-label"><b>National ID number</b></label>
							<input type="text" name="street" placeholder="" autocomplete="off" value="<?php echo $customer_profiles->natinal_identity; ?>" class="form-control input-sm" readonly required>
								</div>
									
									<div class="col-lg-3 form-group-sub">
									<label class="form-control-label"><b>Account Type</b></label>
							<input type="text" name="street" placeholder="" autocomplete="off" value="<?php echo $customer_profiles->account_name; ?>" class="form-control input-sm" readonly required>
								</div>
								<?php //if ($customer_profiles->account_id == 1) {
								 ?>

							<?php //}else{ ?>
                                <div class="col-lg-3 form-group-sub">
									<label class="form-control-label"><b>Business Type</b></label>
							<input type="text" name="street" placeholder="" autocomplete="off" value="<?php echo $customer_profiles->bussiness_type; ?>" class="form-control input-sm" readonly required>
								</div>
								
										<div class="col-lg-3 form-group-sub">
									<label class="form-control-label"><b>Number of Dependents</b></label>
							<input type="text" name="street" placeholder="" autocomplete="off" value="<?php echo $customer_profiles->number_dependents; ?>" class="form-control input-sm" readonly required>
								</div>
										<div class="col-lg-3 form-group-sub">
									<label class="form-control-label"><b>Place of Employment/Business</b></label>
							<input type="text" name="street" placeholder="" autocomplete="off" value="<?php echo $customer_profiles->place_imployment; ?>" class="form-control input-sm" readonly required>
								</div>
								<?php if ($customer_profiles->group_id == TRUE) {
								 ?>
								 	<div class="col-lg-3 form-group-sub">
									<label class="form-control-label"><b>Monthly Income</b></label>
							<input type="text" name="street" placeholder="" autocomplete="off" value="<?php echo $customer_profiles->month_income; ?>" class="form-control input-sm" readonly required>
								</div>
							
										<div class="col-lg-3 form-group-sub">
									<label class="form-control-label"><b>Group Name</b></label>
							<input type="text" name="street" placeholder="" autocomplete="off" value="<?php echo $customer_profiles->group_name; ?>" class="form-control input-sm" readonly required>
								</div>
							<?php }elseif($customer_profiles->group_id == FALSE){
							 ?>
                          
                          			<div class="col-lg-6 form-group-sub">
									<label class="form-control-label"><b>Monthly Income</b></label>
							<input type="text" name="street" placeholder="" autocomplete="off" value="<?php echo $customer_profiles->month_income; ?>" class="form-control input-sm" readonly required>
								</div>

							 <?php } ?>
								
							</div>
						</div>
					</div>
				</div>
				
		
			<!--end::Form-->
		</div>
		          <div class="text-center">
		          	<h4>GUARANTORS DETAILS (<b><?php echo $group->group_name; ?></b>)</h4>
		          </div>
		          <div class="kt-portlet kt-portlet--mobile">

	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
									     <thead>
			  						          <tr>
		  							 <th>S/No.</th>
									<th>Full Name </th>
									<th>Phone number</th>
									<th>Nature of Settlement</th>
									<th>Relationship</th>
									<th>District</th>
									<th>Ward</th>
									<th>Street</th>
				  									
				  									
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                          <?php $no = 1; ?>
									<?php foreach($sponser_detail  as $sponser_details): ?>
									          <tr>
				  					<td><?php echo $no++; ?>.</td>
				  					<td><?php echo $sponser_details->sp_name; ?> <?php echo substr($sponser_details->sp_mname, 0,1); ?> <?php echo $sponser_details->sp_lname; ?></td>
				  					<td><?php echo $sponser_details->sp_phone_no; ?> </td>
				  					<td><?php echo $sponser_details->nature; ?></td>
				  					<td><?php echo $sponser_details->sp_relation; ?></td>
				  					<td><?php echo $sponser_details->sp_district; ?></td>
				  						<td><?php echo $sponser_details->sp_ward; ?></td>
				  						<td><?php echo $sponser_details->sp_street; ?></td>
				  	
				  							  											  							
                                      </tr>

                         <?php endforeach; ?>
									
	                </tbody>
	                <tfoot>
                    <tr>
           <th>S/No.</th>
			<th>Full Name </th>
			<th>Phone number</th>
			<th>Nature of Settlement</th>
			<th>Relationship</th>
			<th>District</th>
			<th>Ward</th>
			<th>Street</th>
                    </tr>
                   </tfoot>
                   </table>
		<!--end: Datatable -->
	</div>
</div>


	          <div class="text-center">
		          	<h4>Customer Loan Fee History</h4>
		          </div>
		          <div class="kt-portlet kt-portlet--mobile">


	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_">
									     <thead>
			  						          <tr>
									<th>Income Category</th>
									<th>Amount</th>
									<th>Employee</th>
									<th>Date</th>				
				  						  </tr>
						                  </thead>
			
								    <tbody>
                                          <?php $no = 1; ?>
							<?php foreach($inc_history  as $inc_historys): ?>
									          <tr>
				  				
				  					<td><?php echo $inc_historys->inc_name; ?></td>
				  					<td><?php echo number_format($inc_historys->receve_amount); ?></td>
				  					<td><?php echo $inc_historys->empl_name; ?></td>
				  					<td><?php echo $inc_historys->receve_day; ?></td>							
                                      </tr>

                           <?php endforeach; ?>
									
	                </tbody>
                   </table>

                   <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_">
									     <thead>
			  					<!-- 	          <tr>
									<th><b>Loan Fee</b></th>
									<td>100</td>			
				  						  </tr> -->
						                  </thead>
								    <tbody>
                   
									 <!--    <tr>
				  					<th>Penart</th>
				  					<td>1000</td>						
                                      </tr> -->
		
	                          </tbody>
                            </table>
		<!--end: Datatable -->
	</div>
</div>
<div class="text-center">
       	<h4>APPLIED LOAN APPLICATION FORM </h4>
       </div>
       <div class="row">
	<div class="col-lg-12">
		<div class="kt-portlet">
			
				
				 <?php echo form_open("admin/aprove_loan/{$loan_form->loan_id}",['class'=>'kt-form kt-form--label-right','novalidate']); ?>
				<div class="kt-portlet__body">
					<div class="kt-section">
						<div class="kt-section__content">
							<div class="form-group form-group-last row">
									<div class="col-lg-3 form-group-sub">
										<label class="form-control-label"><b>Loan category</b></label>
								    <input type="text" name="" placeholder="Loan Amount Applied" autocomplete="off" value="<?php echo $loan_form->loan_name; ?> <?php echo $loan_form->loan_price; ?> - <?php echo $loan_form->loan_perday; ?>" readonly class="form-control input-sm">
									</div>

									<div class="col-lg-3 form-group-sub">
										<label class="form-control-label"><b>Branch</b></label>
										 <input type="text" name="" placeholder="Loan Amount Applied" autocomplete="off" value="<?php echo $loan_form->blanch_name; ?>" readonly class="form-control input-sm">
									</div>
									<?php if($loan_form->group_id == TRUE){
									 ?>
									 <div class="col-lg-3 form-group-sub">
										<label class="form-control-label"><b>Group</b></label>
										 <input type="text" name="" placeholder="Loan Amount Applied" autocomplete="off" value="<?php echo $loan_form->group_name; ?>" readonly class="form-control input-sm">
									</div>
									<div class="col-lg-3 form-group-sub">
										<label  class="form-control-label"><b>Loan Amount Applied</b></label>
										 <input type="text" name="" placeholder="Loan Amount Applied" autocomplete="off" value="<?php echo number_format($loan_form->how_loan); ?>" readonly class="form-control input-sm">
									</div>
									 <?php }elseif ($loan_form->group_id == FALSE) {
									  ?>
                                       <div class="col-lg-6 form-group-sub">
										<label  class="form-control-label"><b>Loan Amount Applied</b></label>
										 <input type="text" name="" placeholder="Loan Amount Applied" autocomplete="off" value="<?php echo number_format($loan_form->how_loan); ?>" readonly class="form-control input-sm">
									</div>
									  <?php } ?>
									

									

									
									<div class="col-lg-4 form-group-sub">
										<label  class="form-control-label"><b style="color:green;">Approved Loan</b></label>
										 <input type="number" name="loan_aprove" placeholder="Approved Loan" autocomplete="off" value="<?php echo $loan_form->how_loan; ?>"  class="form-control input-sm" style="color: green;">
									</div>

									<div class="col-lg-4 form-group-sub">
										<label  class="form-control-label"><b style="color:red;">Charge Loan Penalty?</b></label>
										 <select type="text" name="penat_status" class="form-control input-sm" required style="color: red; border-color: red;">
										 	<option value="">Select Charge Loan Penalty</option>
										 	<option value="YES">YES</option>
										 	<option value="NO">NO</option>
										 </select>
									</div>



									<div class="col-lg-4 form-group-sub">
										<label  class="form-control-label"><b>Restoration Type</b></label>
									   <textarea type="text" readonly class="form-control" style="height: 40px;"><?php if($loan_form->day == 1){
										 echo "Daily";
									 ?>
								<?php }elseif($loan_form->day == 7){
                                        echo "Weekly";
								?>
							<?php } elseif($loan_form->day == 30 || $loan_form->day == 31 || $loan_form->day == 28 || $loan_form->day == 39){
							       echo "Monthly";
							 ?>
						<?php } ?></textarea>
									</div>

									<div class="col-lg-6 form-group-sub">
										<label  class="form-control-label"><b>Restoration Time</b></label>
								<input type="number" name="" placeholder="Restoration sessions" autocomplete="off" value="<?php echo $loan_form->session ?>" readonly class="form-control input-sm" >
									</div>

									<div class="col-lg-6 form-group-sub">
										<label  class="form-control-label"><b>Purpose of Loan</b></label>
								<input type="text" name="" readonly autocomplete="off"  class="form-control input-sm" value="<?php echo $loan_form->reason; ?>">
									</div> 
							

								<div class="col-lg-12">
									<div class="text-center">
									<br><br>
									<p>LOCAL GOVERNMENT INFORMATION</p>
									</div>
								</div>
									<div class="col-lg-4 form-group-sub">
									<label class="form-control-label"><b>Name of Officer</b></label>
							<input type="text" name="" placeholder="Name of Officer" autocomplete="off" class="form-control input-sm" value="<?php echo @$local_oficer->oficer; ?>" readonly >
								</div>
								
									<div class="col-lg-4 form-group-sub">
									<label class="form-control-label"><b>Officer Phone Number</b></label>
							<input type="number" name="" placeholder="Officer Phone Number" autocomplete="off" value="<?php echo @$local_oficer->phone_oficer; ?>" class="form-control input-sm" readonly>
								</div>
									<div class="col-lg-4 form-group-sub">
									<label class="form-control-label"><b>Region</b></label>
							<input type="text" name="" placeholder="Officer Phone Number" autocomplete="off" value="<?php echo @$local_oficer->region_name; ?>" class="form-control input-sm" readonly>
								</div>
										<div class="col-lg-3 form-group-sub">
									<label class="form-control-label"><b>District</b></label>
							<input type="text" value="<?php echo @$local_oficer->district_oficer; ?>" name="gov_district" placeholder="District" autocomplete="off" class="form-control input-sm" readonly>
								</div>
										<div class="col-lg-3 form-group-sub">
									<label class="form-control-label"><b>Street</b></label>
							<input type="text" name="" placeholder="Street" autocomplete="off" class="form-control input-sm" value="<?php echo @$local_oficer->street_oficer; ?>" readonly>
								</div>
								<div class="col-lg-3 form-group-sub">
									<label class="form-control-label"><b>Ward</b></label>
							<input type="text" name="" placeholder="Ward" autocomplete="off" class="form-control input-sm" value="<?php echo @$local_oficer->ward_oficer; ?>" readonly>
								</div>
								<div class="col-lg-3 form-group-sub">
									<br>
							      <?php if (@$local_oficer->cont_attachment == true) {
								   ?>
								<a href="<?php echo base_url().'admin/download_attach/'.@$local_oficer->attach_id; ?>" class="btn btn-brand"><i class="flaticon-download"></i>Download Loan Agreement</a>
								<?php }elseif (@$local_oficer->cont_attachment == false) {
								    ?>
									
							   <a href="javascript:;" class="btn btn-danger"><i class="flaticon-attachment"></i>No Loan Agreement</a>
								<?php } ?>
								</div>

								<div class="col-lg-12">
									<div class="text-center">
									<br><br>
									<p>COLLATERAL</p>
									</div>
								</div> 
								    
                                        	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
									     <thead>
			  						          <tr>
									<th>S/No.</th>
									<th>Collteral Name</th>
									<th>Collateral Condition</th>
									<th>Collateral Current Value</th>
									<th>Collateral Photo</th>				
				  						  </tr>
						                  </thead>
			
								    <tbody>
                                          <?php $no = 1; ?>
							<?php foreach(@$collateral as $collaterals): ?>
									          <tr>
				  				
				  					<td><?php echo $no++; ?>.</td>
				  					<td><?php echo $collaterals->description; ?></td>
				  					<td><?php echo $collaterals->co_condition; ?></td>
				  					<td><?php echo number_format($collaterals->value); ?></td>
				  					<td><img src="<?php echo base_url().'assets/img/'.@$collaterals->file_name; ?>" class="img-thumbnail" style="width: 100px; height: 100px;"></td>							
                                      </tr>

                           <?php endforeach; ?>
									
	                </tbody>
                   </table>

                   <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_">
									     <thead>
			  					<!-- 	          <tr>
									<th><b>Loan Fee</b></th>
									<td>100</td>			
				  						  </tr> -->
						                  </thead>
								    <tbody>
                   
									 <!--    <tr>
				  					<th>Penart</th>
				  					<td>1000</td>						
                                      </tr> -->
		
	                          </tbody>
                            </table>
		<!--end: Datatable -->
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
								<button type="submit" class="btn btn-brand  btn-elevate btn-pill btn-sm">Approve</button>
								<a href="<?php echo base_url("admin/reject_loan/{$loan_form->loan_id}") ?>" class="btn btn-danger  btn-elevate btn-pill btn-sm">Reject</a>
								<a href="<?php echo base_url("admin/loan_pending") ?>" class="btn btn-info  btn-elevate btn-pill btn-sm">Back</a>
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
	</div>  
</div>

	</div>
 
        </div>
    </div>
</div>
   </div>
</div>
<!--End::Section--> 


<!-- end:: Content -->
<!-- end:: Content -->
				</div>	

				 <?php endforeach; ?>			
				
<?php include('incs/footer_1.php') ?>


<!-- <script>
	function getDate(data){
  let now = new Date();
  let bod = (new Date(data));

  let age = now.getFullYear() - bod.getFullYear();
   let _age = document.querySelector("#age");
   _age.value = age;
 //alert(age)
}
</script> -->