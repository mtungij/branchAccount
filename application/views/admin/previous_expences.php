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
				Previous Expenses /
				<?php if ($data_blanch == TRUE) {
				 ?>
				   <?php echo @$data_blanch->blanch_name; ?>
				<?php }else{ ?>
				  ALL BRANCH 
				<?php } ?>
			</h3>
			
			&nbsp;&nbsp;&nbsp;
			<h3 class="kt-portlet__head-title">
				<span>From:<?php echo @$from; ?></span>
				
			</h3>
			&nbsp;&nbsp;&nbsp;
			<h3 class="kt-portlet__head-title">
				<span>To: <?php echo @$to; ?></span>
				
			</h3>
			
		</div>
		
		<div class="kt-portlet__head-toolbar">
           <div class="kt-portlet__head-wrapper">
	 <div class="kt-portlet__head-actions">
		<a href="" class="btn btn-info" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_4"><i class="kt-menu__link-icon flaticon2-search-1"></i>Filter</a>
         <?php if (count($blanch_exp) == 0) {
         ?>
     <?php  }else{ ?>
      <a href="<?php echo base_url("admin/print_prev_expences/{$from}/{$to}/{$blanch_id}"); ?>" class="btn btn-brand btn-elevate btn-icon-sm" target="_blank">
			<i class="flaticon-technology"></i>
			Print
	  </a>
     	<?php } ?>
	
		&nbsp;
		<a href="<?php echo base_url("admin/get_recomended_request") ?>" class="btn btn-brand btn-elevate btn-icon-sm">
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
			  						          	<th>Branch</th>
				  							    <th>Expenses</th>
				  							    <th>Amount</th>
												<th>Descrption </th>
												<!-- <th>Comment</th> -->
												<th>From Branch Account</th>
												<th>Date</th>
												<!-- <th>status</th> -->
				  									
				  									
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                          <?php $no = 1; ?>
									<?php foreach ($blanch_exp as $blanch_exps): ?>
									          <tr>
				  					 <td><?php echo $blanch_exps->blanch_name; ?></td> 
				  					<td><?php //echo $datas->ex_name; ?></td>
				  					<td><?php //echo number_format($datas->req_amount); ?></td>
				  					<td><?php //echo $datas->req_description; ?></td>
				  					<!--  <td><?php //echo $datas->req_comment; ?></td> -->
				  					 <td><?php //echo $datas->account_name; ?></td>
				  					 <td><?php //echo $datas->req_date; ?></td>
			  											  							
                                       </tr>
                                   <?php $data_recod = $this->queries->get_prev_expences($from,$to,$blanch_exps->blanch_id); ?>
                                   <?php foreach ($data_recod as $data_recods): ?>
                                          <tr>
				  					 <td><?php //echo $blanch_exps->blanch_name; ?></td> 
				  					 <td><?php echo $data_recods->ex_name; ?></td>
				  					 <td><?php echo number_format($data_recods->req_amount); ?></td>
				  					 <td><?php echo $data_recods->req_description; ?></td>
				  					<!--  <td><?php //echo $datas->req_comment; ?></td> -->
				  					 <td><?php echo $data_recods->account_name; ?></td>
				  					 <td><?php echo $data_recods->req_date; ?></td>				  							
                                       </tr>
                            <?php endforeach; ?>
                            <?php @$total_blanch = $this->queries->get_total_prevExpences($from,$to,$data_recods->blanch_id); ?>
                            <?php foreach (@$total_blanch as $total_blanchs): ?>
                                   <tr>
				  					 <td><?php //echo $blanch_exps->blanch_name; ?><b>BRANCH TOTAL</b></td> 
				  					 <td><?php //echo $data_recods->ex_name; ?></td>
				  					 <td><b><?php echo number_format($total_blanchs->total_exp); ?></b></td>
				  					 <td><?php //echo $data_recods->req_description; ?></td>
				  					<!--  <td><?php //echo $datas->req_comment; ?></td> -->
				  					 <td><?php //echo $data_recods->account_name; ?></td>
				  					 <td><?php //echo $data_recods->req_date; ?></td>				  							
                                       </tr>
                           <?php endforeach; ?>
                          <?php endforeach; ?>
									
	                </tbody>
	                <tfoot>
                    <tr>
                   	<th>TOTAL</th> 
				    <th></th>
				    <th><?php echo number_format(@$total_exp->total_request_comapany); ?></th>
				    <th></th>
				    <th></th>
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


<div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter cash transaction By</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("admin/previous_expences"); ?>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                            <label class="form-control-label">*Select Branch:</label>
                            <select class="form-control kt-selectpicker" name="blanch_id" required data-live-search="true">
                                   <option value="">Select Branch</option>
                                    <?php foreach ($blanch as $blanchs): ?>
                                <option value="<?php echo $blanchs->blanch_id; ?>"><?php echo $blanchs->blanch_name; ?> </option>
                                    <?php endforeach; ?>
                                    <option value="all">All</option>
                                </select>
                               
                        </div>
                         
                          <input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">  
                        <?php $date = date("Y-m-d"); ?>
                      <div class="col-lg-6">
                          <label class="form-control-label">*From:</label>
                            <input type="date" name="from" value="<?php echo $date; ?>" class="form-control">
                        </div>
                         <div class="col-lg-6">
                          <label class="form-control-label">*To:</label>
                            <input type="date" name="to" value="<?php echo $date; ?>" class="form-control">
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