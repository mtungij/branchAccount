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

          <?php //if(@$customer->f_name == TRUE){ ?>
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
                	
                

                	 <img src="<?php echo base_url();?>assets/img/users.png" alt="passport" style="width: 220px; height: 180px;">
                </div>

                <style>
                	    .c {
               text-transform: uppercase;
                 }
                
                </style>
                
                <div class="kt-widget__content">
                    <div class="kt-widget__head">
                        <a href="javascript:;" class="kt-widget__username">
                           <b class="c"><?php //echo $group_main->group_name; ?> / <?php //echo $group_main->blanch_name; ?></b>   
                            <i class=""></i>                       
                        </a>

                        <div class="kt-widget__action">
                         <div class="">
                	 <img src="<?php echo base_url();?>assets/img/sig.jpg" alt="passport" style="width: 300px; height: 180px;">
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
		<!--begin: Datatable -->
        </div>

		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
									     <thead>
			  						          <tr>
		  							    
		  							    
                                       
										<th><b>Loan Amount</b></th>
                                        <th><b>Restoration</b></th>
										<th><b>Amount Paid</b></th>
										<th><b>Remaining debt</b></th>	
				  						</tr>
						                  </thead>
			
								    <tbody>
									          <tr>
				  					
				  				

                            <?php //if ($all_total->loan_status == 'disbarsed') {
                                     ?>
                                   <td>
                                        <?php //if (@$total_loan == FALSE) {
                                        //echo "DONE";
                                        ?>
                                    <?php  //}else{ ?>
                                        <?php //echo number_format(@$total_loan->loan_int); ?>
                                        <?php //} ?>
                                            
                                        </td>

                                    <td><?php //echo number_format($total_loan->restration); ?></td> 
                                    <td><?php //echo number_format(@$total_depost_customer->total_depost_customer); ?></td> 
                                    <td><?php //echo number_format(@$total_loan->loan_int - $total_depost_customer->total_depost_customer); ?></td>  
                                 <?php //}elseif($all_total->loan_status == 'withdrawal'){ ?>

                                  <td>
                                     <?php //if (@$dat_loan_withd == FALSE) {
                                        //echo "DONE";
                                        ?>
                                    <?php  //}else{ ?>
                                        <?php //echo number_format(@$dat_loan_withd->loan_int); ?>
                                        <?php //} ?>
                                            
                                        </td>

                                    <td><?php //echo number_format($dat_loan_withd->restration); ?></td> 
                                <td><?php //echo number_format(@$total_depost_customerwith->total_depost_customer); ?></td> 
                                    <td>
                                        <?php //echo number_format(@$dat_loan_withd->loan_int - $total_depost_customerwith->total_depost_customer); ?>
                                        
                                    </td>
                                    <?php //}elseif($all_total->loan_status == 'done'){ ?>

                                         <td>
                                     <?php //if (@$data_done == FALSE) {
                                        //echo "DONE";
                                        ?>
                                    <?php  //}else{ ?>
                                        <?php //echo number_format(@$data_done->loan_int); ?>
                                        <?php //} ?>
                                            
                                        </td>

                                    <td><?php //echo number_format($data_done->restration); ?></td> 
                                <td><?php //echo number_format(@$total_depost_customerdone->total_depost_customer); ?></td> 
                                    <td><?php //echo number_format(@$data_done->loan_int - $total_depost_customerdone->total_depost_customer); ?>
                                        
                                    </td>

				  					   <?php //} ?>
                                   
                                            <!--begin::Modal-->
<div class="modal fade" id="kt_modal_2<?php //echo $blanchs->blanch_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">WITHDRAWAL DASHBOARD</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php //echo form_open("admin/create_withdrow_balance/{$customer->customer_id}"); ?>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4">
                        <label for="recipient-name" class="form-control-label"><b>Amount</b></label>
                        <input type="" name=""id="amount_1s" readonly value="10000" class="form-control" style="width: 130px; height:30px;border: none; color: #2ccff4;">
                        </div>
                             <div class="col-lg-4">
                        <label for="recipient-name" class="form-control-label">*Quantity</label>
                        <input type="number" name="" id="qnty_1s"  class="form-control"style="width: 130px; height:30px;border-radius: 5px;">
                        </div>
                             <div class="col-lg-4">
                        <label for="recipient-name" class="form-control-label">Total Amount</label>
                        <input type="" name="" autocomplete="off" value="" id="jumla_1s" class="form-control"style="width: 130px; height:30px;border: none; color: blue;">
                        </div>



                             <div class="col-lg-4">
                        <input type="" name="" value="5000" id="amount_2s" readonly class="form-control" style="width: 130px; height:30px;border: none; color: #2ccff4;">
                        </div>
                             <div class="col-lg-4">
                        <input type="number" name="" id="qnty_2s" class="form-control"style="width: 130px; height:30px;border-radius: 5px;">
                        </div>
                             <div class="col-lg-4">
                        <input type="" name=""  id="jumla_2s" autocomplete="off" class="form-control"style="width: 130px; height:30px;border: none; color: blue;">
                        </div>
                                   
                            <input type="hidden" value="<?php //echo $customer->customer_id; ?>" name="customer_id">
                            <input type="hidden" value="<?php //echo $customer->comp_id; ?>" name="comp_id">
                            <input type="hidden" value="<?php //echo $customer->blanch_id; ?>" name="blanch_id">
                            <?php //if ($all_total->loan_status == 'disbarsed') {
                             ?>
                            <input type="hidden" value="<?php //echo $total_loan->loan_id; ?>" name="loan_id">
                        <?php //}elseif ($all_total->loan_status == 'withdrawal') {
                        ?>
                        <input type="hidden" value="<?php //echo $dat_loan_withd->loan_id; ?>" name="loan_id">
                        <?php  //}elseif($all_total->loan_status == 'done'){ ?>
                        <input type="hidden" value="<?php //echo $data_done->loan_id; ?>" name="loan_id">
                            <?php //} ?>

                            <input type="hidden" value="CASH WITHDRAWALS" name="description">
                            <input type="hidden" value="withdrawal" name="loan_status">
                           
                               
                            
                            

                             <div class="col-lg-4">
                        <input type="" name="" value="2000" id="amount_3s" readonly class="form-control" style="width: 130px; height:30px;border: none; color: #2ccff4;">
                        </div>
                             <div class="col-lg-4">
                        <input type="number" name="" id="qnty_3s" class="form-control"style="width: 130px; height:30px;border-radius: 5px;">
                        </div>
                             <div class="col-lg-4">
                        <input type="" name=""  id="jumla_3s" autocomplete="off" class="form-control"style="width: 130px; height:30px;border: none; color: blue;">
                        </div>


                             <div class="col-lg-4">
                        <input type="" name="" value="1000" id="amount_4s" readonly class="form-control" style="width: 130px; height:30px;border: none; color: #2ccff4;">
                        </div>
                             <div class="col-lg-4">
                        <input type="number" name="" id="qnty_4s" class="form-control"style="width: 130px; height:30px;border-radius: 5px;">
                        </div>
                             <div class="col-lg-4">
                        <input type="" name="" value="" autocomplete="off" id="jumla_4s" class="form-control"style="width: 130px; height:30px;border: none; color: blue;">
                        </div>



                             <div class="col-lg-4">
                        <input type="" name="" value="500" id="amount_5s" readonly class="form-control" style="width: 130px; height:30px;border: none; color: #2ccff4;">
                        </div>
                             <div class="col-lg-4">
                        <input type="number" name="" id="qnty_5s" class="form-control"style="width: 130px; height:30px;border-radius: 5px;">
                        </div>
                             <div class="col-lg-4">
                        <input type="" name="" value="" autocomplete="off" id="jumla_5s" class="form-control"style="width: 130px; height:30px;border: none; color: blue;">
                        </div>



                             <div class="col-lg-4">
                        <input type="" name="" value="200" id="amount_6s" readonly class="form-control" style="width: 130px; height:30px;border: none; color: #2ccff4;">
                        </div>
                             <div class="col-lg-4">
                        <input type="number" name="" id="qnty_6s" class="form-control"style="width: 130px; height:30px;border-radius: 5px;">
                        </div>
                             <div class="col-lg-4">
                        <input type="" name="" value="" autocomplete="off" id="jumla_6s" class="form-control"style="width: 130px; height:30px;border: none; color: blue;">
                        </div>

                          

                             <div class="col-lg-4">
                        <input type="" name="" value="100" id="amount_7s" readonly class="form-control" style="width: 130px; height:30px;border: none; color: #2ccff4;">
                        </div>
                             <div class="col-lg-4">
                        
                        <input type="number" name="" id="qnty_7s" class="form-control"style="width: 130px; height:30px;border-radius: 5px;">
                        </div>
                             <div class="col-lg-4">
                       
                        <input type="" name="" value="" autocomplete="off" id="jumla_7s" class="form-control"style="width: 130px; height:30px;border: none; color: blue;">
                        </div>


                             <div class="col-lg-4">
                        <input type="" name="" value="50" id="amount_8s" readonly class="form-control" style="width: 130px; height:30px;border: none; color: #2ccff4;">
                        </div>
                             <div class="col-lg-4">
                        <input type="number" name="" id="qnty_8s" class="form-control"style="width: 130px; height:30px;border-radius: 5px;">
                        </div>
                             <div class="col-lg-4">
                        <input type="" name="" id="jumla_8s" autocomplete="off" class="form-control"style="width: 130px; height:30px;border: none; color: blue;">
                        </div>


                             <div class="col-lg-4">
                        <label for="recipient-name" class="form-control-label"><b></b></label>
                       
                        </div>
                             <div class="col-lg-4">
                                <div class="text-center">
                        <label for="recipient-name" class="form-control-label"><b>Total Amount</b></label>
                        </div>
                        <input type="number" name="withdrow" id="jumlas" autocomplete="off" required class="form-control"style="width: 130px; height:30px;border-radius: 8px;">
                        </div>
                             <div class="col-lg-4">
                           </div>

                         <div class="col-lg-4">
                        <label for="recipient-name" class="form-control-label"><b></b></label>
                        <br>
                           <b>Withdrawal method</b>
                        </div>
                             <div class="col-lg-6">
                                <div class="text-center">
                        <label for="recipient-name" class="form-control-label"><b></b></label>
                        </div>
                       <!--  <input type="number" name="withdrow" id="jumlas" autocomplete="off" required class="form-control"style="width: 130px; height:30px;border-radius: 8px;"> -->
                        <select type="text" name="method" class="form-control" required style="border-radius: 8px;">
                            <option value="">Select Withdrawal Method</option>
                            <option value="CASH">CASH</option>
                            <option value="BANK">BANK</option>
                            <option value="MOBILE TRANSACTION">MOBILE TRANSACTION</option>
                        </select>
                        </div>
                             <div class="col-lg-2">
                       
                        </div>
                    </div>  
                 </div>
            <div class="modal-footer">
               
                <button type="submit" class="btn btn-primary">Withdraw</button>
                <button type="reset" class="btn btn-danger">Reset</button>

            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!--end::Modal-->									  							
                                        </tr>
	                                </tbody>
                          </table>

                      


	                     </div>
                       <div class="text-right">
                         <a href="" class="btn btn-info" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_4"><i class="kt-menu__link-icon flaticon2-search-1"></i>Search</a>
                       </div>
                        </div>

                </div>
               </div>

   </div>
<div class="kt-portlet kt-portlet--mobile">
   
     

    <div class="kt-portlet__body">
        <!--begin: Datatable -->
        <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                                         <thead>
                                              <tr style="background-color: #2c77f4;color:white;">
                                                <th>Date</th>
                                                <th>Description</th>
                                                <th>Deposit</th>
                                                <th>Withdrawal</th>
                                                <th>Balance</th>    
                                                 </tr>
                                          </thead>
                                          <tbody>
                                               
                                            <?php foreach ($group_detail as $group_details): ?>
                                            <tr>
                                              <td class="c"><?php echo $group_details->date_data; ?></td>
                                              <td class="c"> </td>
                                              <td><?php echo $group_details->total_depost; ?></td>
                                              <td><?php echo $group_details->total_withdrawal; ?></td>
                                              <td><?php echo $group_details->total_balance; ?> </td>
                                            
                                              </tr>
                                        <?php endforeach; ?>
                                          </tbody>
    
                                       </table>
        <!--end: Datatable -->
    </div>
</div>
</div>
<div class="modal fade" id="kt_modal_<?php //echo $blanchs->blanch_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">DEPOSIT DASHBOARD (<?php echo $group_main->group_name; ?>)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php //echo form_open("admin/deposit_loan/{$customer->customer_id}"); ?>

                    <div class="form-group">
                        <div class="row">
                         <?php foreach ($member_data as $member_datas): ?>
                            <div class="col-lg-6">
                      
                        <p class="c"><b><?php echo $member_datas->member_name; ?></b></p>
                        <input type="hidden" name="" readonly value="<?php echo $member_datas->member_id; ?>" class="form-control">
                        </div>
                             <div class="col-lg-6">
                        
                        <input type="number" name="name" onkeyup="keyUpEvent(this.value)" class="form-control"style="width: 130px; height:30px;border-radius: 5px;">
                        </div>
                         
                    <?php endforeach; ?> 

                        <div class="col-lg-4">
                        <label for="recipient-name" class="form-control-label"><b></b></label>
                        </div>

                        <input type="hidden" value="<?php echo $customer_data->customer_id; ?>" name="customer_id">
                            <input type="hidden" value="<?php echo $customer_data->comp_id; ?>" name="comp_id">
                            <input type="hidden" value="<?php echo $customer_data->blanch_id; ?>" name="blanch_id">

                              <?php if ($all_total->loan_status == 'disbarsed') {
                             ?>
                            <input type="hidden" value="<?php echo $total_loan->loan_id; ?>" name="loan_id">
                        <?php }elseif ($all_total->loan_status == 'withdrawal') {
                        ?>
                        <input type="hidden" value="<?php echo $dat_loan_withd->loan_id; ?>" name="loan_id">
                        <?php  }elseif($all_total->loan_status == 'done'){ ?>
                        <input type="hidden" value="<?php echo $data_done->loan_id; ?>" name="loan_id">
                            <?php } ?>
                            <input type="hidden" value="LOAN RETURN" name="description">
                             <div class="col-lg-4">
                                <div class="text-center">
                        <label for="recipient-name" class="form-control-label"><b>Total Amount</b></label>
                        </div>
                        <input type="number" name="depost" id="jum_m" autocomplete="off" required class="form-control"style="width: 200px; height:30px;border-radius: 5px;">
                        </div>
                             <div class="col-lg-4">
                       
                        </div>
                    </div>  
                 </div>
            <div class="modal-footer">
               
                <button type="submit" class="btn btn-primary">Deposit</button>
                <button type="reset" class="btn btn-danger">Reset</button>

            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!--end::Modal-->




</div>	

<div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Search Group</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("admin/search_group"); ?>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                            <label class="form-control-label">*Search Group Name:</label>
                            <select class="form-control kt-selectpicker" name="customer_id" required data-live-search="true">
                                    <option value="">Search Group</option>
                                    <?php foreach ($grou_data as $customers): ?>
                                <option value="<?php echo $customers->group_id; ?>"><?php echo $customers->group_name; ?> / <?php echo $customers->blanch_name; ?> </option>
                                    <?php endforeach; ?>
                                </select>
                                <input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">
                        </div>
                             <div class="col-lg-4">
                       
                        </div>
                    </div>  
                 </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!--end::Modal-->
</div>


		





<?php include('incs/footer_1.php') ?>



<!--end::Modal-->


<!-- 
<script>
         $(document).ready(function () { 
        $("#urf_m,#urf_m").change(function() {
    $("#jum_m").val(parseFloat($("#urf_m").val()).toFixed(2));
            });
        });
</script> -->

<script>
    function keyUpEvent(value) {
        alert(value);
    }
</script>



<script>
    $(document).ready(function (){ 
        $("#amount_1s,#qnty_1s,#amount_2s,#qnty_2s,#jumla_1s,#jumla_2s,#amount_3s,#qnty_3s,#jumla_3s,#amount_4s,#qnty_4s,#jumla_4s,#amount_5s,#qnty_5s,#jumla_5s,#amount_6s,#qnty_6s,#amount_7s,#qnty_7s,#amount_8s,#qnty_8s,#jumla_8s").change(function() {
            $("#jumla_1s").val($("#amount_1s").val() * $("#qnty_1s").val());
            $("#jumla_2s").val($("#amount_2s").val() * $("#qnty_2s").val());
            $("#jumla_3s").val($("#amount_3s").val() * $("#qnty_3s").val());
            $("#jumla_4s").val($("#amount_4s").val() * $("#qnty_4s").val());
            $("#jumla_5s").val($("#amount_5s").val() * $("#qnty_5s").val());
            $("#jumla_6s").val($("#amount_6s").val() * $("#qnty_6s").val());
            $("#jumla_7s").val($("#amount_7s").val() * $("#qnty_7s").val());
            $("#jumla_8s").val($("#amount_8s").val() * $("#qnty_8s").val());

            $("#jumlas").val(+$("#jumla_1s").val()+ +$("#jumla_2s").val()+ +$("#jumla_3s").val()+ +$("#jumla_4s").val()+ +$("#jumla_5s").val()+ +$("#jumla_6s").val() + +$("#jumla_7s").val()+ +$("#jumla_8s").val());

        });
    });
</script>


<script>
    $(document).ready(function (){ 
        $("#amount_1a,#qnty_1a,#amount_2a,#qnty_2a,#jumla_1a,#jumla_2a,#amount_3a,#qnty_3a,#jumla_3a,#amount_4a,#qnty_4a,#jumla_4a,#amount_5a,#qnty_5a,#jumla_5a,#amount_6a,#qnty_6a,#amount_7a,#qnty_7a,#amount_8a,#qnty_8a,#jumla_8a").change(function() {
            $("#jumla_1a").val($("#amount_1a").val() * $("#qnty_1a").val());
            $("#jumla_2a").val($("#amount_2a").val() * $("#qnty_2a").val());
            $("#jumla_3a").val($("#amount_3a").val() * $("#qnty_3a").val());
            $("#jumla_4a").val($("#amount_4a").val() * $("#qnty_4a").val());
            $("#jumla_5a").val($("#amount_5a").val() * $("#qnty_5a").val());
            $("#jumla_6a").val($("#amount_6a").val() * $("#qnty_6a").val());
            $("#jumla_7a").val($("#amount_7a").val() * $("#qnty_7a").val());
            $("#jumla_8a").val($("#amount_8a").val() * $("#qnty_8a").val());

            $("#jumlaa").val(+$("#jumla_1a").val()+ +$("#jumla_2a").val()+ +$("#jumla_3a").val()+ +$("#jumla_4a").val()+ +$("#jumla_5a").val()+ +$("#jumla_6a").val() + +$("#jumla_7a").val()+ +$("#jumla_8a").val());

        });
    });
</script>





<!--end::Modal-->









              






