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
				Group Collection Sheet
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	<a href="" class="btn btn-info" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_4"><i class="kt-menu__link-icon flaticon2-search-1"></i>Filter</a>
		&nbsp;
		<a href="<?php echo base_url("admin/print_collection_sheet") ?>" class="btn btn-brand btn-elevate btn-icon-sm" target="_blank">
			<i class="flaticon-technology"></i>
			Print
		</a>
	</div>	
</div>		</div>
	</div>

	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="">
									     <thead>
			  						          <tr>
		  						<th>Groups Name</th>
									<th>Customer Name</th>
									<th>Loan Aproved</th>
									<th>Loan + Interest</th>
									<th>Collection</th>
									<th>Duration</th>
									<th>Paid Amount</th>
									<th>Remain Amount</th>
									<th>Penart</th>
									<th>Loan Status</th>

									
									
				  									
				  									
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                         
									<?php foreach($group_loan as $group_loans): ?>
									          <tr>
				  					<td><b><?php echo $group_loans->group_name; ?></b></td>
				  					<td><?php //echo $loan_pendings->loan_code; ?></td>
				  					<td><?php //echo $loan_pendings->f_name; ?> <?php //echo substr($loan_pendings->m_name, 0,1); ?> <?php //echo $loan_pendings->l_name; ?></td>
				  					<td><?php //echo $loan_pendings->phone_no; ?></td>
				  					<td><?php //echo $loan_pendings->bussiness_type; ?></td>
				  					<td><?php //echo $loan_pendings->blanch_name; ?></td>
				  					<td><?php //echo number_format($loan_pendings->loan_aprove); ?></td>
				  					<td><?php //echo number_format($loan_pendings->loan_int); ?></td>

				  						<td>
				  							</td>
				  				
				  			</tr>
                               <?php 
                               $customers_loan = $this->queries->get_loan_group_customer($group_loans->group_id);
                              // echo "<pre>";
                              // print_r($customers_loan);
                              //      exit();
                                ?>

                                 <?php foreach ($customers_loan as $customers_loans): ?>
				  				  <tr>
				  					<td class="c"></td>
				  					<td class="c"><?php echo $customers_loans->f_name; ?> <?php echo $customers_loans->m_name; ?> <?php echo $customers_loans->l_name; ?></td>
				  					<td><?php echo number_format($customers_loans->loan_aprove); ?> </td>
				  					<td><?php echo number_format($customers_loans->loan_int); ?></td>
				  					<td><?php echo number_format($customers_loans->restration); ?></td>
				  					<td class="c">	<?php if ($customers_loans->day == 1) {
				  								 echo "Daily";
				  							 ?>
				  							<?php }elseif($customers_loans->day == 7){
                                    echo "Weekly";
				  							 ?>
				  							
				  						<?php }elseif($customers_loans->day == 30 || $customers_loans->day == 31 || $customers_loans->day == 28 || $customers_loans->day == 29){
				  						        echo "Monthly"; 
				  							?>
				  							<?php } ?></td>
				  					<td><?php echo number_format($customers_loans->total_depost); ?></td>
				  					<td><?php echo number_format($customers_loans->loan_int - $customers_loans->total_depost); ?></td>
				  					<td><?php echo number_format($customers_loans->total_penart - $customers_loans->total_paid_penart); ?></td>
				  					<td>
				  						<?php if ($customers_loans->loan_status == 'withdrawal') {
				  						 ?>
				  						<a href="javascript" class="badge badge-success">Active</a>
				  					<?php }elseif ($customers_loans->loan_status == 'pending') {
				  					 ?>
				  						<a href="javascript" class="badge badge-warning">Pending</a>
				  					<?php }elseif ($customers_loans->loan_status == 'aproved') {
				  					 ?>
				  						<a href="javascript" class="badge badge-primary">Aproved</a>
				  					<?php }elseif ($customers_loans->loan_status == 'disbarsed') {
				  					 ?>
				  						<a href="javascript" class="badge badge-info">Disbursed</a>
				  					<?php }elseif ($customers_loans->loan_status == 'done') {
				  					 ?>
				  						<a href="javascript" class="badge badge-secondary">Done</a>
				  					<?php }elseif ($customers_loans->loan_status == 'out') {
				  					 ?>
				  						<a href="javascript" class="badge badge-danger">Default</a>
				  						<?php } ?>
				  					</td>
				  				
				  			</tr>
                              <?php endforeach; ?> 
                              <?php
                              $total = $this->queries->get_total_group_loan($group_loans->group_id);
                              // echo "<pre>";
                              // print_r($total);
                              //       exit(); 
                               ?>
                                 <?php foreach ($total as $totals): ?>
     
                              	  <tr>
				  					<td><b></b></td>
				  					<td><b>TOTAL:</b></td>
				  					<td><b><?php echo number_format($totals->total_loangroup); ?></b></td>
				  					<td><b><?php echo number_format($totals->total_int); ?></b></td>
				  					<td><b><?php echo number_format($totals->total_restoration); ?></b></td>
				  					<td><b></b></td>
				  					<td><b><?php echo number_format($totals->total_depost_groups); ?></b></td>
				  					<td><b><?php echo number_format($totals->total_int - $totals->total_depost_groups); ?></td>
				  					<td><b><?php echo number_format($totals->total_penart_group - $totals->total_paid); ?></b></td>
				  					<td><b><?php //echo number_format($total_groups->total_loan_aprove_empl); ?></b></td>
				  			    </tr> 

				  			    <?php endforeach; ?>      
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

<div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter Group Collection By</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("admin/filter_group_collection"); ?>

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
                          <label class="form-control-label">*Select Loan Status:</label>
                            <select class="form-control kt-selectpicker" name="loan_status" required data-live-search="true">
                               <option value="">Select Loan Status</option> 
                                <option value="open">PENDING</option>
                                <option value="aproved">APROVED</option>
                                <option value="disbarsed">DISBURSED</option>
                                <option value="withdrawal">ACTIVE</option>
                                <option value="done">DONE</option>
                                <option value="out">DEFALT</option>
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