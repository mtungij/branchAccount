<?php include('incs/header.php'); ?>
<?php include('incs/side.php'); ?>
<?php include('incs/subheader.php'); ?>


						<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

						<!-- begin:: Subheader -->
						<div class="kt-subheader   kt-grid__item" id="kt_subheader">
						<div class="kt-subheader__main">

						<h3 class="kt-subheader__title">
						<b>Super Admin Dashboard</b> - <?php echo $_SESSION['email']; ?>                </h3>
						<span class="kt-subheader__separator kt-hidden"></span>
						</div>
						</div>


		<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
	<div class="kt-portlet">
	<div class="kt-portlet__body kt-portlet__body--fit">
		<div class="kt-invoice-1">
			<div class="kt-invoice__wrapper">
				<div class="kt-invoice__head" style="background-image: url('<?php echo base_url() ?>assets/img/pi.png');">
					<div class="kt-invoice__container kt-invoice__container--centered">
						<div class="kt-invoice__logo">
							<a href="#">
								<?php $company = $this->db->query("SELECT * FROM tbl_company"); ?>
								<h1> <?php echo $company->num_rows(); ?>- Total Company</h1>
							</a>
						</div>
						<div class="kt-invoice__items">
							<div class="kt-invoice__item">
								<span class="kt-invoice__subtitle"><b>Branch</b></span>
								<?php $blanch = $this->db->query("SELECT * FROM tbl_blanch"); ?>
								<span class="kt-invoice__text"><b><?php echo $blanch->num_rows(); ?></b></span>
							</div>
							<div class="kt-invoice__item">
								<span class="kt-invoice__subtitle"><b>Employee</b></span>
								<?php $empl = $this->db->query("SELECT * FROM tbl_employee"); ?>
								<span class="kt-invoice__text"><b><?php echo $empl->num_rows(); ?></b></span>
							</div>
							<div class="kt-invoice__item">
								<span class="kt-invoice__subtitle"><b>Customer</b></span>
								<?php $customer = $this->db->query("SELECT * FROM tbl_customer"); ?>
								<span class="kt-invoice__text"><b><?php echo $customer->num_rows(); ?></b></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
          


						<!-- end:: Subheader -->										<!-- begin:: Content -->
						<!-- begin:: Content -->
						<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
						<!--Begin::Dashboard 1-->

						<!--Begin::Section-->
						<div class="row">
						<div class="col-xl-12">
						<!--begin:: Widgets/Activity-->
						<div class="kt-portlet kt-portlet--fit kt-portlet--head-lg kt-portlet--head-overlay kt-portlet--skin-solid kt-portlet--height-fluid">
						<div class="kt-portlet__head kt-portlet__head--noborder kt-portlet__space-x">
						<div class="kt-portlet__head-label">
						<h3 class="kt-portlet__head-title">
						<!-- Report -->
						</h3>
						</div>
						<div class="kt-portlet__head-toolbar">
					<!-- 	<a href="#" class="btn btn-label-light btn-sm btn-bold dropdown-toggle" data-toggle="dropdown">
						Report
						</a> -->
						<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
						<ul class="kt-nav">
						<li class="kt-nav__section kt-nav__section--first">
						<span class="kt-nav__section-text">Reports List</span>
						</li>
						<li class="kt-nav__item">
						<a href="#" class="kt-nav__link">
						<i class="kt-nav__link-icon flaticon2-graph-1"></i>
						<span class="kt-nav__link-text">Statistics</span>
						</a>
						</li>
						<li class="kt-nav__item">
						<a href="#" class="kt-nav__link">
						<i class="kt-nav__link-icon flaticon2-calendar-4"></i>
						<span class="kt-nav__link-text">Events</span>
						</a>
						</li>
						<li class="kt-nav__item">
						<a href="#" class="kt-nav__link">
						<i class="kt-nav__link-icon flaticon2-layers-1"></i>
						<span class="kt-nav__link-text">Reports</span>
						</a>
						</li>
						<li class="kt-nav__section kt-nav__section--first">
						<span class="kt-nav__section-text">HR</span>
						</li>
						<li class="kt-nav__item">
						<a href="#" class="kt-nav__link">
						<i class="kt-nav__link-icon flaticon2-calendar-4"></i>
						<span class="kt-nav__link-text">Notifications</span>
						</a>
						</li>
						<li class="kt-nav__item">
						<a href="#" class="kt-nav__link">
						<i class="kt-nav__link-icon flaticon2-file-1"></i>
						<span class="kt-nav__link-text">Files</span>
						</a>
						</li>
						</ul>			</div>
						</div>
						</div>
						<div class="kt-portlet__body kt-portlet__body--fit">
						<div class="kt-widget17">
						<div class="kt-widget17__visual kt-widget17__visual--chart kt-portlet-fit--top kt-portlet-fit--sides" style="background-color: #112e8a;">
						<div class="kt-widget17__chart" style="height:30px;">
						<canvas id="kt_chart_activitie"></canvas>
						</div>
						</div>

						<div class="kt-widget17__stats">
                             <!-- begin first dashboard -->
						<div class="kt-widget17__items">
						<div class="kt-widget17__item">
						<span class="kt-widget17__icon">
											</span> 
						<a href="<?php echo base_url("admin/all_employee"); ?>"><span class="kt-widget17__subtitle">
                          <?php 
                          //$comp_id = $this->session->userdata('comp_id');
                          //$employee = $this->db->query("SELECT * FROM tbl_employee WHERE comp_id = '$comp_id'");
                           ?>
                           <img src="<?php echo base_url() ?>assets/img/users.png" style="width: 50px;height: 50px;">
						 Employee (<?php //echo $employee->num_rows(); ?>)</a>
						</span> 
						  
						</div>

						<div class="kt-widget17__item">
						<span class="kt-widget17__icon">

						</span>  
						
						<a href="<?php echo base_url("admin/all_customer"); ?>"><span class="kt-widget17__subtitle">
							<?php //$customer = $this->db->query("SELECT * FROM tbl_customer WHERE comp_id = '$comp_id'");
							//$male = $this->db->query("SELECT * FROM tbl_customer WHERE comp_id = '$comp_id' AND gender = 'male'");
							//$female = $this->db->query("SELECT * FROM tbl_customer WHERE comp_id = '$comp_id' AND gender = 'female'");
							//$active = $this->db->query("SELECT * FROM tbl_customer WHERE comp_id = '$comp_id' AND customer_status = 'open'");
							 ?>
						<img src="<?php echo base_url() ?>assets/img/users.png" style="width: 50px;height: 50px;">
							Customer(<?php //echo $customer->num_rows(); ?>) <!-- / Male(<?php //echo $male->num_rows(); ?>) --> <!-- / Female(<?php //echo $female->num_rows(); ?>) --> <b style="color:green;">Active(<?php //echo $active->num_rows(); ?>)</b>
						</span>  
					</a>
						</div>
						</div>
						<!-- end first dashboard -->

          
                <!-- endsecond dashboard -->

                            <!--begin second dashboard -->
           <!--                <div class="kt-widget17__items">

						<div class="kt-widget17__item">
						<span class="kt-widget17__icon">

						</span>  
						
						<span class="kt-widget17__subtitle">
							<?php //$customer = $this->db->query("SELECT * FROM tbl_customer WHERE comp_id = '$comp_id'");
							//$male = $this->db->query("SELECT * FROM tbl_customer WHERE comp_id = '$comp_id' AND gender = 'male'");
							//$female = $this->db->query("SELECT * FROM tbl_customer WHERE comp_id = '$comp_id' AND gender = 'female'");
							 ?>
						<img src="<?php //echo base_url() ?>assets/img/money.png" style="width: 50px;height: 50px;">
							Today Received(<?php //echo number_format($total_received->total_withdrawal); ?>)
						</span>  
						</div>

						<div class="kt-widget17__item">
						<span class="kt-widget17__icon">

						</span>  
						
						<span class="kt-widget17__subtitle">
							<?php
							//$blanch = $this->db->query("SELECT * FROM tbl_blanch WHERE comp_id = '$comp_id'");
							 ?>
						<img src="<?php //echo base_url() ?>assets/img/money.png" style="width: 50px;height: 50px;">
							Today Pending(<?php //echo number_format($total_loan_pending->total_pending); ?>)
						</span>  
						</div>
						</div> -->
                
            
                          <!-- endthird dashboard -->

                            <!--begin forth dashboard -->
            <!--  <div class="kt-widget17__items">
						<div class="kt-widget17__item">
						<span class="kt-widget17__icon">

						</span>  
						
						<span class="kt-widget17__subtitle">
							
						<img src="<?php //echo base_url() ?>assets/img/money.png" style="width: 50px;height: 50px;">
							Today Expenses(<?php //echo number_format($toay_expences->total_req); ?>)
						</span>  
						</div>

						<div class="kt-widget17__item">
						<span class="kt-widget17__icon">

						</span>  
						
						<span class="kt-widget17__subtitle">
							
						<img src="<?php //echo base_url() ?>assets/img/money.png" style="width: 50px;height: 50px;">
							Today Other Income(<?php //echo number_format($total_received->total_withdrawal + $prepaid_today->prepaid_balance + $total_loan_fee->sum_withdraw + $today_income->total_receve_income ); ?>)
						</span>  
						</div>


						</div> -->
             <!-- endforth dashboard -->

						</div>
						</div>
						</div>
						</div>
						<!--end:: Widgets/Activity-->	</div>
						</div>
					  </div>
						<!-- end:: Content -->					
						<!-- end:: Content -->
					</div>				

						<?php include('incs/footer.php'); ?>