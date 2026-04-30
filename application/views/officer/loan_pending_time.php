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
     <?php //echo form_open("oficer/prev_pending_loan"); ?>
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon-list-2"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Loan Pending Report
			</h3>
			&nbsp;&nbsp;&nbsp;
			<h3 class="kt-portlet__head-title">
				From:
				<input type="date" name="from" class="form-control" required>
			</h3>
			&nbsp;&nbsp;&nbsp;
			<h3 class="kt-portlet__head-title">
				To:
				<input type="date" name="to" class="form-control" required>
				<input type="hidden" name="blanch_id" value="<?php echo $_SESSION['blanch_id']; ?>">
			</h3>
			<h3 class="kt-portlet__head-title">
				<br>
				<button type="submit" class="btn btn-primary">Get Data</button>
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
		<a href="<?php //echo base_url("oficer/print_pending_report"); ?>" class="btn btn-brand btn-elevate btn-icon-sm" target="_blank">
			<i class="flaticon-technology"></i>
			Print
		</a>
	</div>	
</div>		</div>
	</div>
	<?php //echo form_close(); ?>

	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
									     <thead>
			  						          <tr>
				  							    <th>S/No.</th>
				  							   <!--  <th>Branch Name</th> -->
												<th>Customer Name</th>
												<th>Phone Number</th>
												<th>Loan Amount</th>
												<th>Duration Type</th>
												<th>Pending Amount</th>
											    <th>Date</th> 
				  						         </tr>
						                  </thead>
										  <tbody>
  <?php $no = 1; ?>

  <?php if (!empty($loan_pending_new) && is_array($loan_pending_new)): ?>
    <?php foreach ($loan_pending_new as $loan_pends): ?>
      <tr>
        <td><?php echo $no++; ?>.</td>
        <td class="c">
          <?php echo $loan_pends->f_name; ?> <?php echo $loan_pends->m_name; ?> <?php echo $loan_pends->l_name; ?>
        </td>
        <td><?php echo $loan_pends->phone_no; ?></td>
        <td><?php echo number_format($loan_pends->loan_int); ?></td> 
        <td>
          <?php
            if ($loan_pends->day == '1') {
              echo "Daily";
            } elseif ($loan_pends->day == '7') {
              echo "Weekly";
            } elseif ($loan_pends->day == '30') {
              echo "Monthly";
            }
          ?>
        </td> 
        <td><?php echo number_format($loan_pends->total_pend); ?></td> 
        <td><?php echo $loan_pends->date; ?></td>  
      </tr>
    <?php endforeach; ?>
  <?php else: ?>
    <tr>
      <td colspan="7" class="text-center text-danger">No pending loans found.</td>
    </tr>
  <?php endif; ?>
</tbody>

	                <tfoot>
                    <tr>
                    <th>TOTAL</th>
					<!-- <th></th> -->
					<th><?php //echo number_format($sum_depost->cash_depost); ?></th>
					<th><?php //echo number_format($sum_withdrawls->cash_withdrowal); ?></th>
					<th></th>
					<th></th>
					<th><?php echo number_format($new_total_pending->total_pending); ?></th>
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