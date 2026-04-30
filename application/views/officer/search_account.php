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

    <?php if(@$customer->f_name == TRUE){ ?>
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
                    <?php if ($customer->passport == TRUE) {
                     ?>
                    <img src="<?php echo base_url().'assets/img/'.$customer->passport; ?>" alt="passport" style="width: 220px; height: 180px;">
                <?php }else{ ?>

                     <img src="<?php echo base_url();?>assets/img/user.png" alt="passport" style="width: 220px; height: 180px;">
                    <?php } ?>
                </div>

                <style>
                        .c {
               text-transform: uppercase;
                 }
                
                </style>
                
                <div class="kt-widget__content">
                    <div class="kt-widget__head">
                        <a href="javascript:;" class="kt-widget__username">
                           <b class="c"><?php echo $customer->f_name; ?> <?php echo $customer->m_name; ?> <?php echo $customer->l_name; ?>  <?php //echo $customer->account_name; ?> </b>   
                            <i class=""></i>                       
                        </a>

                        <div class="kt-widget__action">
                         <div class="">
                            <?php if ($customer->signature == TRUE) {
                             ?>
                    <img src="<?php echo base_url().'assets/img/'.$customer->signature; ?>" alt="Signature"style="width: 300px; height: 180px;">
                <?php }else{ ?>
                     <img src="<?php //echo base_url();?>assets/img/sig.jpg" alt="passport" style="width: 300px; height: 180px;">
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
               </div>
                      
                        </div>

                </div>
               </div>

   </div>
<div class="kt-portlet kt-portlet--mobile">
    <?php //echo form_open(""); ?>
   <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="kt-font-brand flaticon-list-2"></i>
            </span>
            <h3 class="kt-portlet__head-title">
               Customer Account Statement
            </h3>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <h3 class="kt-portlet__head-title">
                From:
               <input type="date" name="" class="form-control">
            </h3>
            &nbsp;&nbsp;
             <h3 class="kt-portlet__head-title">
                To:
               <input type="date" name="" class="form-control">
            </h3>   
            <h3 class="kt-portlet__head-title">
                <br>
               <button type="submit" class="btn btn-brand">Get Data</button>
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
    <div class="kt-portlet__head-actions">

    <br>
        &nbsp;
        <a href="<?php echo base_url("oficer/print_customer_statement/{$statement->customer_id}"); ?>" class="btn btn-brand btn-elevate btn-icon-sm" target="_blank">
            <i class="flaticon-technology"></i>
            Print
        </a>
    </div>  
</div>      </div>
    </div>
 <?php echo form_close(); ?>
    <div class="kt-portlet__body">
        <!--begin: Datatable -->
        <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_">
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
                                          <?php foreach ($payisnull as $payisnulls): ?>
                                            <tr>
                                              <td class="c"><?php echo $payisnulls->date_data; ?></td>
                                              <td class="c">  <?php echo $payisnulls->emply; ?> <?php echo $payisnulls->description; ?>
                                              <?php if ($payisnulls->p_method == TRUE) {
                                              ?>
                                              /<?php echo $payisnulls->p_method; ?>
                                          <?php }else{ ?>
                                          <?php } ?>
                                               <?php if ($payisnulls->fee_id == TRUE) {
                                              ?>
                                              / <?php echo $payisnulls->fee_desc; ?> <?php echo $payisnulls->fee_percentage; ?> <?php echo $payisnulls->symbol; ?>
                                          <?php }else{ ?>
                                            <?php } ?>
                                               / <?php //echo @$payisnulls->description; ?>  <?php echo @$payisnulls->loan_name ; ?>
                                         <?php if(@$payisnulls->day == 1){
                                           echo "Daily";
                                    }elseif(@$payisnulls->day == 7){
                                         echo "Weekly";
                                    }elseif (@$payisnulls->day == 30 || @$payisnulls->day == 31 || @$payisnulls->day == 29 || @$payisnulls->day == 28) {
                                        echo "Monthly";
                                     ?> 
                                    <?php } ?><?php echo $payisnulls->session; ?>  / AC/No. <?php echo @$payisnulls->loan_code; ?></td>
                                              <td>
                                                <?php if($payisnulls->depost == TRUE){ ?>
                                                <?php echo round(@$payisnulls->depost,2); ?>
                                            <?php }elseif($payisnulls->depost == FALSE){ ?>
                                            0.00
                                                <?php } ?>
                                            </td>
                                              <td>
                                                <?php if (@$payisnulls->withdrow == TRUE) {
                                                 ?>
                                                <?php echo round(@$payisnulls->withdrow,2); ?>
                                                <?php }elseif (@$payisnulls->withdrow == FALSE) {
                                                 ?>
                                                 0.00
                                            <?php } ?>
                                            </td>
                                              <td>
                                                <?php if (@$payisnulls->balance == TRUE) {
                                                 ?>
                                                <?php echo round(@$payisnulls->balance,2); ?>
                                                <?php }elseif (@$payisnulls->balance == FALSE) {
                                                 ?>
                                                 0.00
                                                 <?php } ?>
                                            </td>
                                              </tr>
                                        <?php endforeach; ?>
                                          </tbody>

                   
                                 </table>
        <!--end: Datatable -->
    </div>
</div>
</div>

<!--end::Modal-->

<?php }else{ ?>
    <div class="text-center">
    <h1>
        <br><br><br>
OOPS!  There no customer with that name</h1>
      <a href="<?php echo base_url("admin/teller_dashboard"); ?>" class="btn btn-info">Back</a>
    </div>
    <?php } ?>
<!--End::Section--> 


<!-- end:: Content -->
<!-- end:: Content -->
                </div>  

                 <?php //endforeach; ?> 

                 <!--begin::Modal-->
        





<?php include('incs/footer_1.php') ?>

<!--end::Modal-->










              






