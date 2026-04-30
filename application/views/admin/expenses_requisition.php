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

          <?php //foreach ($customer_profile as $customer_profiles): ?>
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
         <?php if ($das = $this->session->flashdata('error')): ?>
    <div class="alert alert-danger fade show alert-danger" role="alert">
                            <div class="alert-icon"><i class="flaticon2-delete"></i></div>
                            <div class="alert-text"><?php echo $das;?></div>
                            <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="la la-close"></i></span>
                                </button>
                            </div>
                  </div>
         <?php endif; ?>



 <div class="col-lg-12">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon kt-hidden">
                    <i class="la la-gear"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                    Requisition form
                    </h3>
                </div>
            </div>
            <!--begin::Form-->
            
               <div class="container">
  
    <?php echo form_open_multipart("admin/create_requstion_form",['class'=>'form-horizontal']) ?>
    <div id="dynamic_field">
        <div class="row">
         <div class="col-lg-3">
    <div class="form-group">
      <label class="control-label">Select Branch:</label>
        <select type="text" name="blanch_id" id="blanch" class="form-control">
         <option type="">Select Branch</option>
        <?php foreach ($blanch as $blanchs): ?>
          <option value="<?php echo $blanchs->blanch_id; ?>"><?php echo $blanchs->blanch_name; ?></option>
          <?php endforeach; ?>
        </select>
    </div>
    </div>
         <div class="col-lg-3">
    <div class="form-group">
      <label class="control-label">Select Expenses:</label>
        <select type="number" name="ex_id"  class="form-control">
         <option type="">Select Expenses</option>
        <?php foreach ($expns as $expnss): ?>
          <option value="<?php echo $expnss->ex_id; ?>"><?php echo $expnss->ex_name; ?></option>
          <?php endforeach; ?>
        </select>
    </div>
    </div>

    <div class="col-lg-3">
    <div class="form-group">
      <label>Amount:</label>
        <input type="number" class="form-control" placeholder="Amount" name="req_amount" autocomplete="off" required>
    </div>
    </div>
        <div class="col-lg-3">
    <div class="form-group">
      <label class="control-label">Select Account:</label>
        <select type="number" name="trans_id" id="account"  class="form-control" required>
         <option type="">Select Account</option>
        </select>
    </div>
    </div>

     <div class="col-lg-12">
    <div class="form-group">
      <label>Description:</label>
        <textarea type="text" class="form-control"  rows="4" placeholder="Description" name="req_description" autocomplete="off" required></textarea>
    </div>
    </div>

    <input type="hidden" name="comp_id"   value="<?php echo $_SESSION['comp_id']; ?>">
    <?php $date = date("Y-m-d"); ?>
    <input type="hidden" name="req_date" value="<?php echo $date; ?>">
    </div> 
    </div>
   
    <div class="form-group">        
   <!--    <div class="col-sm-offset-2 col-sm-10">
        <button type="button" name="add" id="add" class="btn btn-success"><i class="flaticon2-pen"></i>Add More</button>
      </div> -->
       <div class="text-center">
     <input type="submit" name="submit" id="submit" class="btn btn-info btn-sm" value="Submit" />
    </div>

     </div>
  <?php echo form_close(); ?>
</div>
            <!--end::Form-->
        </div>
    </div>

</div>
<!--End::Section--> 

<!-- end:: Content -->
<!-- end:: Content -->
				</div>	

				 <?php //endforeach; ?>			
				
<?php include('incs/footer_1.php') ?>


<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  document.execCommand("copy");
  
  var tooltip = document.getElementById("myTooltip");
  tooltip.innerHTML = "Copied: " + copyText.value;
}

function outFunc() {
  var tooltip = document.getElementById("myTooltip");
  tooltip.innerHTML = "Copy to clipboard";
}
</script>


<script>
$(document).ready(function(){
$('#blanch').change(function(){
var blanch_id = $('#blanch').val();
//alert(blanch_id)
if(blanch_id != ''){

$.ajax({
url:"<?php echo base_url(); ?>admin/fetch_account_blanch",
method:"POST",
data:{blanch_id:blanch_id},
success:function(data)
{
$('#account').html(data);
//$('#district').html('<option value="">All</option>');
}
});
}
else
{
$('#account').html('<option value="">Select Account</option>');
//$('#district').html('<option value="">All</option>');
}
});



// $('#customer').change(function(){
// var customer_id = $('#customer').val();
//  //alert(customer_id)
// if(customer_id != '')
// {
// $.ajax({
// url:"<?php echo base_url(); ?>admin/fetch_data_vipimioData",
// method:"POST",
// data:{customer_id:customer_id},
// success:function(data)
// {
// $('#loan').html(data);
// //$('#malipo_name').html('<option value="">select center</option>');
// }
// });
// }
// else
// {
// $('#loan').html('<option value="">Select Active loan</option>');
// //$('#malipo_name').html('<option value="">chagua vipimio</option>');
// }
// });

// $('#social').change(function(){
//  var district_id = $('#social').val();
//  if(district_id != '')
//  {
//   $.ajax({
//    url:"<?php echo base_url(); ?>user/fetch_data_malipo",
//    method:"POST",
//    data:{district_id:district_id},
//    success:function(data)
//    {
//     $('#malipo_name').html(data);
//     //$('#malipo').html('<option value="">chagua malipo</option>');
//    }
//   });
//  }
//  else
//  {
//   //$('#vipimio').html('<option value="">chagua vipimio</option>');
//   $('#malipo_name').html('<option value="">chagua vipimio</option>');
//  }
// });


});
</script>