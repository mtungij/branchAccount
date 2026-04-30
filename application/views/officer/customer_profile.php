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

          <?php foreach ($customer_profile as $customer_profiles): ?>
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

                	 <img src="<?php echo base_url();?>assets/img/user.png" alt="passport" style="width: 150px; height: 160px;">
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
                           <b class="a"><?php echo $customer_profiles->f_name ?> <?php echo $customer_profiles->m_name ?> <?php echo $customer_profiles->l_name ?> <?php //echo $customer_profiles->account_name; ?> </b>   
                            <i class=""></i>                       
                        </a>

                       
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
		 <div class="pull-right">
		 	<div class="row">
		 	<div class="col-lg-6">
    	  </div>
    	  <div class="col-lg-4">
    	  <input type="text"  value="<?php echo $customer_profiles->code; ?>" class="form-control" id="myInput">
    	 </div>
    	 <div class="col-lg-2">
    	 	
<button onclick="myFunction()" onmouseout="outFunc()" class="btn btn-primary"id="myTooltip">
  <span class="tooltiptext">Copy ID</span>
  

</div>
    	 </div>
    	  </div>
        </div>
  
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_">
									     <thead>
			  						          <tr>
		  							    <th><b>Jina Kamili</b></th>
										<th><b>Tarehe Ya Kuzaliwa</b></th>
										<th><b>Tawi</b></th>
										<th><b>Jinsia</b></th>
										<th><b>Namba Ya Simu</b></th>
										
										
				  									
				  						         </tr>
						                  </thead>
			
								    <tbody>
									          <tr>
				  					
				  					<td><?php echo $customer_profiles->f_name ?> <?php echo $customer_profiles->m_name ?> <?php echo $customer_profiles->l_name ?></td>
				  					<td><?php echo $customer_profiles->date_birth; ?></td>
				  					<td><?php echo $customer_profiles->blanch_name; ?></td>
				  					<td><?php echo $customer_profiles->gender; ?></td>
				  						<td><?php echo $customer_profiles->phone_no; ?></td>
				  						
				  						
				  															  							
                                        </tr>
	                                </tbody>
                          </table>
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