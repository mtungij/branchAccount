<?php include('incs/header_1.php'); ?>
<?php include('incs/side_1.php'); ?>
<?php include('incs/subheader.php'); ?>
	
<style>
    .select2-container .select2-selection--single{
    height:37px !important;
}
.select2-container--default .select2-selection--single{
         border: 1px solid #ccc !important; 
     border-radius: 0px !important; 
}
</style>

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
  
 <div class="col-lg-12">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon kt-hidden">
                    <i class="la la-gear"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        MEMBER STATUS (<b><?php echo $groudata->group_name; ?></b>)

                    </h3>
                </div>
            </div>
            <!--begin::Form-->
            
               <div class="container">
  <!-- <form class="form-horizontal" action="<?php //site_url()?>create_sponser/{$customer->customer_code}" method="post"> -->
    <?php echo form_open("admin/create_member_status/{$customer_id}",['class'=>'form-horizontal']) ?>
    <div id="dynamic_field">
        <div class="row">
            <div class="col-lg-2">
    
    </div>

    <div class="col-lg-8">
    <div class="form-group">
    <div class="form-group">
      <label>Member Status:</label>  
        <select type="text" name="member_status" class="form-control select2" required>
            <option value="">Select</option>
            <option value="Chair person">Chair person</option>
            <option value="Member">Member</option>
        </select>
    </div>
    </div>
   
    
     <div class="col-lg-2">
   
    </div>

    
    </div> 
    </div>
    <!-- <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="button" name="add" id="add" class="btn btn-success"><i class="
kt-menu__link-icon flaticon-add"></i>Add More</button>
      </div>
    </div> -->
    <div class="text-center">
     <button type="submit"  class="btn btn-info">Save</button>

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
<script type="text/javascript">
    $(document).ready(function(){      
      var i=1;  
   
      $('#add').click(function(){  
           i++;             
           $('#dynamic_field').append('<div id="row'+i+'">                                            <hr>                                                                                     <div class="row">                                                                    <div class="col-lg-4"><div class="form-group">                                                                 <label>Full Name:</label>                                                                                                                                                         <input type="text" class="form-control" placeholder="Enter First name" name="member_name[]" id="sp_name" autocomplete="off" required>                                                                               </div></div><div class="col-lg-4"><div class="form-group"><label>Gender:</label><select type="text" class="form-control" id="gender" name="gender[]" required><option value="">Select Gender</option><option value="MALE">MALE</option><option value="FEMALE">FEMALE</option></select></div></div> <div class="col-lg-4"><div class="form-group"><label>Date of Birth:</label><input type="date" class="form-control" id="date_birth" placeholder="Enter Last name" name="date_birth[]" autocomplete="off" required></div></div> <div class="col-lg-4"><div class="form-group"><label>Phone number:</label>  <input type="number" class="form-control" id="member_phone" placeholder="Enter Phone number" name="member_phone[]" autocomplete="off" required></div></div>    <div class="col-lg-4"><div class="form-group"><label>Martial Status:</label>   <select type="text" name="martial_status[]" id="martial_status" class="form-control" required> <option value="">Select Martial Status</option><option value="Married">Married</option><option value="Single">Single</option><option value="Widow">Widow</option><option value="Separated">Separated</option><option value="Devorced">Devorced</option> </select></div></div> <div class="col-lg-4"><div class="form-group"><label>Nature of Settlement:</label>   <select type="text" name="nature_setlement[]" id="nature_setlement" class="form-control" required><option value="">Select Nature of Settlement</option><option value="OWNER">OWNER</option> <option value="RENTAL">RENTAL</option><option value="INHERITANCE">INHERITANCE</option></select> </div></div>    <div class="col-lg-4"><div class="form-group"><label>Business Name:</label>  <input type="text" class="form-control" id="busines_name" placeholder="Enter Business name" name="busines_name[]" autocomplete="off" required> </div></div> <div class="col-lg-4"> <div class="form-group"><label>Business Place:</label>  <input type="text" class="form-control" id="busines_place" placeholder="Enter Business Place" name="busines_place[]" autocomplete="off" required></div></div><div class="col-lg-4"> <div class="form-group"><label>Member Status:</label>  <select type="text" name="member_position[]" id="member_position" class="form-control" required><option value="">Select</option><option value="Chair person">Chair person</option><option value="Member">Member</option></select></div></div>      <input type="hidden" name="customer_id[]" id="customer_id" value="<?php echo $member->customer_id; ?>">                                                   <input type="hidden" name="comp_id[]" id="comp_id" value="<?php echo $member->comp_id; ?>">    <input type="hidden" name="blanch_id[]" id="comp_id" value="<?php echo $member->blanch_id; ?>">  <input type="hidden" name="group_id[]" id="group_id" value="<?php echo $member->group_id; ?>">   <?php $date = date("Y-m-d"); ?>
    <input type="hidden" name="date_reg[]" id="date_reg" value="<?php echo $date; ?>">                                                       <div class="col-lg-3"><div class="form-group">                                                                 <label>Region:</label>                                                                                                                                                      <select type="text" class="form-control" name="region_id[]" id="region_id" required><option value="">Select Region</option> <?php foreach ($region as $regions): ?>
                <option value="<?php echo $regions->region_id; ?>"><?php echo $regions->region_name; ?></option> <?php endforeach; ?>     </select>                                                                                                                                                                    </div></div>         <div class="col-lg-3">                                                                                                                                    <div                                                   class="form-group">                                                                <label>District:</label>                                                                     <input type="text" class="form-control" id="sp_district" placeholder="Enter District" name="district[]" autocomplete="off" required>                                                                 </div></div>                                                                                   <div class="col-lg-2"><div class="form-group">                                                                 <label>Ward:</label>                                                                       <input type="text" class="form-control" id="ward" placeholder="Enter Ward" name="ward[]" autocomplete="off" required>                                                                  </div></div> <div class="col-lg-3">                                                                                                                                                                                                                                                                     <div class="form-group">                                                                <label>Street:</label>                                                                                                                                               <input type="text" class="form-control" id="street" placeholder="Enter Street" name="street[]" autocomplete="off" required> </div></div>                                                               <div class="col-lg-1"> <br>                                                                 <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">Remove</button></div></div></div></div>');
     });
     
     $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id"); 
           var res = confirm('Are You Sure You Want To Remove This?');
           if(res==true){
           $('#row'+button_id+'').remove();  
           $('#'+button_id+'').remove();  
           }
      });  
  
    });  
</script>

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
    $('.select2').select2();
</script>