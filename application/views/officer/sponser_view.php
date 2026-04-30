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

          <?php foreach ($customers as $customer): ?>
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


<?php //if(@$customer->customer_id || @$customer->comp_id == TRUE){ ?>
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
                           <b class="a"><?php echo $customer->f_name ?> <?php echo $customer->m_name ?> <?php echo $customer->l_name ?> / <?php echo $customer->account_name; ?> </b>   
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
 


<div class="kt-portlet__body">
		<!--begin: Datatable -->
        </div>
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_">
									     <thead>
			  						          <tr>
		  							    
		  							    <th><b>Full name</b></th>
                                        <th><b>Phone Number</b></th>
										<th><b>Date of Birth</b></th>
										<th><b>Monthly Income</b></th>
										<th><b>Branch</b></th>
										<th><b>Bussines name</b></th>	
				  						</tr>
						                  </thead>
			
								    <tbody>
									          <tr>
				  					
				  					<td><?php echo $customer->f_name ?> <?php echo $customer->m_name ?> <?php echo $customer->l_name ?></td>
				  					<td><?php echo $customer->phone_no; ?></td>
				  					<td><?php echo $customer->date_birth; ?></td>
				  					<td>
                                        <?php if ($customer->month_income == TRUE) {
                                         ?>
                                        <?php echo $customer->month_income; ?>
                                    <?php }elseif ($customer->month_income == FALSE) {
                                         ?>
                                         -
                                         <?php } ?>
                                            
                                        </td>
				  					<td><?php echo $customer->blanch_name; ?></td>
				  						<td><?php echo $customer->bussiness_type; ?></td>									  							
                                        </tr>
	                                </tbody>
                          </table>
	</div>
         
        </div>

    </div>
</div>

   </div>

    <?php if(@$sponser->customer_id == TRUE){ ?>

   <div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="kt-font-brand flaticon-list-2"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                Guarantors  List
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
</div>      </div>
    </div>

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
                                    <th>Identites</th>
                                    <th>Region</th>
                                    <th>District</th>
                                    <th>Ward</th>
                                    <th>Street</th>                               
                                    <th>Action</th>                               
                                    </tr>
                                 </thead>
            
                                    <tbody>
                                          <?php $no = 1; ?>
                                    <?php foreach($sponsers_data as $sponsers_datas): ?>
                                              <tr>
                                    <td><?php echo $no++; ?>.</td>
                                    <td><?php echo $sponsers_datas->sp_name; ?> <?php echo $sponsers_datas->sp_mname; ?> <?php echo $sponsers_datas->sp_lname; ?></td>
                                    <td><?php echo $sponsers_datas->sp_phone_no; ?></td>
                                    <td><?php echo $sponsers_datas->nature; ?></td>
                                    
                                    <td><?php echo $sponsers_datas->sp_relation; ?></td>
                                    <td><?php echo $sponsers_datas->sp_nation; ?></td>
                                    <td><?php echo $sponsers_datas->region_name; ?></td>
                                    <td><?php echo $sponsers_datas->sp_district; ?></td>
                                    <td><?php echo $sponsers_datas->sp_ward; ?></td>
                                    <td><?php echo $sponsers_datas->sp_street; ?></td>
                                <td>    
                            <div class="dropdown dropdown-inline">
            <button type="button" class="btn btn-info  btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class=""></i> Action     
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <ul class="kt-nav">
                    <li class="kt-nav__section kt-nav__section--first">
                        <span class="kt-nav__section-text">Choose an option</span>
                    </li>
                    <li class="kt-nav__item">
                        <a href="#" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_<?php echo $sponsers_datas->sp_id; ?>">
                            <i class="kt-nav__link-icon flaticon-edit" ></i>
                            <span class="kt-nav__link-text">Edit</span>
                        </a>
                    </li>
                </ul>
            </div>
    </div>
</td>                                                                                   
</tr>

<div class="modal fade" id="kt_modal_<?php echo $sponsers_datas->sp_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Guarantors</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("oficer/modify_sponser/{$sponsers_datas->sp_id}/{$sponsers_datas->customer_id}"); ?>

                    <div class="kt-portlet__bod">
                    <div class="kt-section">
                        <div class="kt-section__content">
                            <div class="form-group form-group-last row">
                                <div class="col-lg-4 form-group-sub">
                                    <label class="form-control-label">*First Name:</label>
                                    <input type="text" name="sp_name" placeholder="" autocomplete="off" value="<?php echo $sponsers_datas->sp_name; ?>" class="form-control input-sm" required>
                                </div>
                                <div class="col-lg-4 form-group-sub">
                                    <label class="form-control-label">*Middle Name:</label>
                                    <input type="text" name="sp_mname" placeholder="Amount" autocomplete="off" value="<?php echo $sponsers_datas->sp_mname; ?>" class="form-control input-sm" required>
                                </div>
                                
                             <div class="col-lg-4 form-group-sub">
                                    <label class="form-control-label">*Last Name:</label>
                                    <input type="text" name="sp_lname" placeholder="Amount" autocomplete="off" value="<?php echo $sponsers_datas->sp_lname; ?>" class="form-control input-sm" required>
                                </div>

                              <div class="col-lg-4 form-group-sub">
                                    <label class="form-control-label">*Phone Number:</label>
                                    <input type="number" name="sp_phone_no" placeholder="Amount" autocomplete="off" value="<?php echo $sponsers_datas->sp_phone_no; ?>" class="form-control input-sm" required>
                                </div>
                                 <div class="col-lg-4 form-group-sub">
                                    <label class="form-control-label">*Natinal ID/Vote ID/Driver Lisence:</label>
                                    <input type="number" name="sp_nation" placeholder="Natinal ID/Vote ID/Driver Lisence" autocomplete="off" value="<?php echo $sponsers_datas->sp_nation; ?>" class="form-control input-sm" required>
                                </div>
                                <div class="col-lg-4 form-group-sub">
                                    <label  class="form-control-label">*Relationship With Customer:</label>
                                <input type="text" name="sp_relation" placeholder="Cheque number" autocomplete="off" value="<?php echo $sponsers_datas->sp_relation; ?>" class="form-control input-sm" >
                                </div>

                                <div class="col-lg-4 form-group-sub">
                                    <label  class="form-control-label">*Nature Of Settlement:</label>
                                <select type="text" name="nature" class="form-control">
                                    <option value="<?php echo $sponsers_datas->nature; ?>"><?php echo $sponsers_datas->nature; ?></option>
                                    <option value="Permanenty Settlement">Permanenty Settlement</option>
                                    <option value="Temporary Settlement">Temporary Settlement</option>
                                </select>   
                                </div>

                                <div class="col-lg-4 form-group-sub">
                                    <label  class="form-control-label">*Region:</label>
                                <select type="text" name="sp_region" class="form-control">
                                    <option value="<?php echo $sponsers_datas->region_id; ?>"><?php echo $sponsers_datas->region_name; ?></option>
                                    <?php foreach ($region as $regions): ?>
                                    <option value="<?php echo $regions->region_id; ?>"><?php echo $regions->region_name; ?></option>
                                     <?php endforeach; ?>
                                 
                                </select>   
                                </div>

                                <div class="col-lg-4 form-group-sub">
                                    <label  class="form-control-label">*District:</label>
                                <input type="text" name="sp_district" placeholder="District" autocomplete="off" value="<?php echo $sponsers_datas->sp_district; ?>" class="form-control input-sm" >
                                </div>
                               <div class="col-lg-6 form-group-sub">
                                    <label  class="form-control-label">*Ward:</label>
                                <input type="text" name="sp_ward" placeholder="Ward" autocomplete="off" value="<?php echo $sponsers_datas->sp_ward; ?>" class="form-control input-sm" >
                                </div>
                               <div class="col-lg-6 form-group-sub">
                                    <label  class="form-control-label">*Street:</label>
                                <input type="text" name="sp_street" placeholder="Street" autocomplete="off" value="<?php echo $sponsers_datas->sp_street; ?>" class="form-control input-sm" >
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!--end::Modal-->
<?php endforeach; ?>
                                    
                    </tbody>
                   </table>
        <!--end: Datatable -->
    </div>
</div>
<?php }else{ ?>

    <?php } ?>


  
 <div class="col-lg-12">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon kt-hidden">
                    <i class="la la-gear"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        GUARANTORS INFORMATIONS
                    </h3>
                </div>
            </div>
            <!--begin::Form-->
            
               <div class="container">
  <!-- <form class="form-horizontal" action="<?php //site_url()?>create_sponser/{$customer->customer_code}" method="post"> -->
    <?php echo form_open("oficer/create_sponser/{$customer->customer_code}/{$customer->comp_id}",['class'=>'form-horizontal']) ?>
    <div id="dynamic_field">
        <div class="row">
            <div class="col-lg-4">
    <div class="form-group">
      <label class="control-label">First Name:</label>
        <input type="text" class="form-control" id="sp_name" placeholder="First name" name="sp_name[]" autocomplete="off" required>
    </div>
    </div>

    <div class="col-lg-4">
    <div class="form-group">
      <label>Middle name:</label>
        <input type="text" class="form-control" id="sp_mname" placeholder="Enter Middle name" name="sp_mname[]" autocomplete="off" required>
    </div>
    </div>

    <input type="hidden" name="customer_id[]"  id="customer_id" value="<?php echo $customer->customer_id; ?>">
    <input type="hidden" name="comp_id[]" id="comp_id" value="<?php echo $customer->comp_id; ?>">

    <div class="col-lg-4">
    <div class="form-group">
      <label>Last name:</label>
        <input type="text" class="form-control" id="sp_lname" placeholder="Enter Last name" name="sp_lname[]" autocomplete="off" required>
    </div>
    </div>
    <div class="col-lg-3">
    <div class="form-group">
      <label>Phone number:</label>  
        <input type="number" class="form-control" id="sp_phone_no" placeholder="Enter Phone number" name="sp_phone_no[]" autocomplete="off" required>
    </div>
    </div>
    <div class="col-lg-3">
    <div class="form-group">
      <label>Natinal ID/Vote ID/Driver Lisence:</label>  
        <input type="number" class="form-control" id="sp_phone_no" placeholder="Enter Natinal ID/Vote ID/Driver Lisence" name="sp_nation[]" autocomplete="off" required>
    </div>
    </div> 
     <div class="col-lg-3">
    <div class="form-group">
      <label>Reationship With Customer:</label>  
        <input type="text" class="form-control" id="sp_relation" placeholder="Enter Reationship With Customer" name="sp_relation[]" autocomplete="off" required>
    </div>
    </div>
     <div class="col-lg-3">
    <div class="form-group">
      <label>Nature of Settlement:</label>  
        <select type="text" name="nature[]" id="nature" class="form-control" required>
            <option value="">Select Nature of Settlement</option>
            <option value="Permanenty Settlement">Permanenty Settlement</option>
            <option value="Temporary Settlement">Temporary Settlement</option>
        </select>
    </div>
    </div>

     <div class="col-lg-3">
    <div class="form-group">
      <label>Region:</label>  
        <select type="text" name="sp_region[]" id="nature" class="form-control" required>
            <option value="">Select region</option>
            <?php foreach ($region as $regions): ?>
            <option value="<?php echo $regions->region_id; ?>"><?php echo $regions->region_name; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    </div>
     <div class="col-lg-3">
    <div class="form-group">
      <label>District:</label>  
        <input type="text" class="form-control" id="sp_district" placeholder="Enter District" name="sp_district[]" autocomplete="off" required>
    </div>
    </div>
     <div class="col-lg-3">
    <div class="form-group">
      <label>Ward:</label>  
        <input type="text" class="form-control" id="sp_ward" placeholder="Enter Ward" name="sp_ward[]" autocomplete="off" required>
    </div>
    </div>
     <div class="col-lg-3">
    <div class="form-group">
      <label>Street:</label>  
        <input type="text" class="form-control" id="sp_street" placeholder="Enter Street" name="sp_street[]" autocomplete="off" required>
    </div>
    </div>

    </div> 
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="button" name="add" id="add" class="btn btn-success"><i class="
kt-menu__link-icon flaticon-add"></i>Add More</button>
      </div>
    </div>
    <div class="text-center">
     <input type="submit" name="submit" id="submit" class="btn btn-info btn-sm" value="Submit" />
     <?php if(@$sponser->customer_id == TRUE){ ?> 
     <a href="<?php echo base_url("oficer/loan_applicationForm/{$sponser->customer_id}"); ?>" class="btn btn-primary btn-sm">Skip</a>
 <?php }else{ ?>

    <?php } ?>
   
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

				 <?php endforeach; ?>			
				
<?php include('incs/footer_1.php') ?>
<script type="text/javascript">
    $(document).ready(function(){      
      var i=1;  
   
      $('#add').click(function(){  
           i++;             
           $('#dynamic_field').append('<div id="row'+i+'">                                            <hr>                                                                                     <div class="row">                                                                    <div class="col-lg-4"><div class="form-group">                                                                 <label>First Name:</label>                                                                                                                                                         <input type="text" class="form-control" placeholder="Enter First name" name="sp_name[]" id="sp_name" autocomplete="off" required>                                                                                                                                                                    </div></div> <div class="col-lg-4"><div class="form-group">                                                                 <label>Middle name:</label>                                                                                                                                                         <input type="text" class="form-control" placeholder="Enter Middle name" name="sp_mname[]" id="sp_mname" autocomplete="off" required>                                                                                                                                                                    </div></div><input type="hidden" name="customer_id[]" id="customer_id" value="<?php echo $customer->customer_id; ?>">                                                   <input type="hidden" name="comp_id[]" id="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">                                                                               <div class="col-lg-4"><div class="form-group">                                                                 <label>Last name</label>                                                                                                                                                         <input type="text" class="form-control" placeholder="Enter Last name" name="sp_lname[]" id="sp_lname" autocomplete="off" required>                                                                                                                                                                    </div></div>     <div class="col-lg-3"><div class="form-group">                                                                 <label>Phone number:</label>                                                                                                                                                         <input type="number" class="form-control" placeholder="Enter Phone number" name="sp_phone_no[]" id="sp_phone_no" autocomplete="off" required>                                                                                                                                                                    </div></div><div class="col-lg-3"><div class="form-group">                                                                 <label>Natinal ID/Vote ID/Driver Lisence:</label>                                                                                                                                                         <input type="number" class="form-control" placeholder="Enter Natinal ID/Vote ID/Driver Lisence:" name="sp_nation[]" id="sp_nation" autocomplete="off" required>                                                                                                                                                                    </div></div>   <div class="col-lg-3"><div class="form-group">                                                                 <label>Reationship With Customer:</label>                                                                                                                                                         <input type="text" class="form-control" placeholder="Enter Reationship With Customer" name="sp_relation[]" id="sp_relation" autocomplete="off" required>                                                                                                                                                                    </div></div>   <div class="col-lg-3"><div class="form-group">                                                                 <label>Nature of Settlement:</label>                                                                                                                                                      <select type="text" class="form-control" name="nature[]" id="nature" required><option value="">Select Nature of Settlement</option><option value="Permanenty Settlement">Permanenty Settlement</option><option value="Temporary Settlement">Temporary Settlement</option></select>                                                                                                                                                                    </div></div>  <div class="col-lg-3"><div class="form-group">                                                                 <label>Region:</label>                                                                                                                                                      <select type="text" class="form-control" name="sp_region[]" id="sp_region" required><option value="">Select Region</option> <?php foreach ($region as $regions): ?>
                <option value="<?php echo $regions->region_id; ?>"><?php echo $regions->region_name; ?></option> <?php endforeach; ?>     </select>                                                                                                                                                                    </div></div>         <div class="col-lg-3">                                                                                                                                    <div                                                   class="form-group">                                                                <label>District:</label>                                                                     <input type="text" class="form-control" id="sp_district" placeholder="Enter District" name="sp_district[]" autocomplete="off" required>                                                                 </div></div>                                                                                   <div class="col-lg-2"><div class="form-group">                                                                 <label>Ward:</label>                                                                       <input type="text" class="form-control" id="sp_ward" placeholder="Enter Ward" name="sp_ward[]" autocomplete="off" required>                                                                  </div></div> <div class="col-lg-3">                                                                                                                                                                                                                                                                     <div class="form-group">                                                                <label>Street:</label>                                                                                                                                               <input type="text" class="form-control" id="sp_street" placeholder="Enter Street" name="sp_street[]" autocomplete="off" required> </div></div>                                                               <div class="col-lg-1"> <br>                                                                 <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">Remove</button></div></div></div></div>');
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