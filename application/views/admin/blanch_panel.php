<?php include('incs/header_1.php'); ?>
<?php include('incs/side_1.php'); ?>
<?php include('incs/subheader.php'); ?>
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

						<!-- begin:: Subheader -->
						<div class="kt-subheader   kt-grid__item" id="kt_subheader">
						<div class="kt-subheader__main">

						<h3 class="kt-subheader__title">
						<b>Admin Panel</b> - <b><?php echo $_SESSION['comp_name'] ?></b>  <b><?php //echo $manager_data->blanch_name; ?></b> <?php //echo $_SESSION['empl_name']; ?>                </h3>
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
						<!-- 		<h1><?php //echo number_format(($loan_depost->Total_depost + $receive_Amount->total_receve_amaount + $loan_fee->sum_withdraw) - ($request_expences->total_exp)); ?> - Opening Balance (<?php echo $blanch_datas->blanchNic_name; ?>)</h1> -->
							 		<h1><?php echo number_format($sum_charger->total_capital); ?> - Opening Balance (<?php echo $blanch_datas->blanchNic_name; ?>)</h1> 
							</a>
						</div>

						<div class="kt-invoice__items">
							<div class="kt-invoice__item">
								<span class="kt-invoice__subtitle"><b>Disbursed loans.</b></span>
								<span class="kt-invoice__text"><b><?php echo number_format($principal->loan_aproveds); ?></b></span>
							</div>
							<div class="kt-invoice__item">
								<span class="kt-invoice__subtitle"><b>Expectation Receivable.</b></span>
								<span class="kt-invoice__text"><b><?php echo number_format($interst_principal->loan_interestBlanch); ?></b></span>
							</div>
							<div class="kt-invoice__item">
								<span class="kt-invoice__subtitle"><b>Total Loan Return.</b></span>
								<span class="kt-invoice__text"><b><?php echo number_format($loan_return->loan_depost_blanch); ?></b></span>
							</div>

						</div>



						<div class="kt-invoice__items">
								<div class="kt-invoice__item">
								<span class="kt-invoice__subtitle"><b>Total Income.</b></span>
								<span class="kt-invoice__text"><b><?php echo number_format($blanch_deducted->total_deducted_blanch + $non_deducted->total_nonBlance); ?></b></span>
							</div>

									<div class="kt-invoice__item">
								<span class="kt-invoice__subtitle"><b>Total Expenses.</b></span>
								<span class="kt-invoice__text"><b><?php echo number_format($expences->total_expncesBlanch); ?></b></span>
							</div>

									<div class="kt-invoice__item">
								<span class="kt-invoice__subtitle"><b>Total Outstand Loan.</b></span>
								<span class="kt-invoice__text"><b><?php echo number_format($outstand_sum->total_remainblanch); ?></b></span>
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
						<a href="#" class="btn btn-label-light btn-sm btn-bold dropdown-toggle" data-toggle="dropdown">
						Branches
						</a>
						<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
						<ul class="kt-nav">
						<li class="kt-nav__section kt-nav__section--first">
						<span class="kt-nav__section-text">Branches List</span>
						</li>
					
					<?php foreach ($branch as $branches): ?>
						<li class="kt-nav__item">
						<a href="<?php echo base_url("admin/view_blanchPanel/{$branches->blanch_id}") ?>" class="kt-nav__link">
						<i class="kt-nav__link-icon flaticon2-layers-1"></i>
						<span class="kt-nav__link-text"><?php echo $branches->blanch_name; ?></span>
						</a>
						</li>
				<?php endforeach; ?>
				
					
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
						<?php $blanch_id = $this->session->userdata('blanch_id'); ?>

						<div class="kt-widget17__stats">
                             <!-- begin first dashboard -->
						<div class="kt-widget17__items">
						<div class="kt-widget17__item">
						<span class="kt-widget17__icon">
						</span> 
						<a href="<?php echo base_url("admin/get_blanch_customer/{$blanch_datas->blanch_id}") ?>">
							<span class="kt-widget17__subtitle">
                
                           <img src="<?php echo base_url() ?>assets/img/users.png" style="width: 50px;height: 50px;">
						 	Customer(<?php echo $toal_customer->total_custBlanch; ?>) <b style="color:green;">Active(<?php echo $active_customerBlanch->total_ActiveBla; ?>)</b> <b style="color:orange;">Pending(<?php echo $pending_customerBlanch->total_pendingblanch; ?>)</b>  <b style="color:red;">Closed(<?php echo $customer_closed->total_closed; ?>)</b>
						</span> 
						  
						</div>

						<div class="kt-widget17__item">
						<span class="kt-widget17__icon">

						</span>  
					
						<a href="<?php echo base_url("admin/get_loan_aplicaionBlanch/{$blanch_datas->blanch_id}"); ?>"><span class="kt-widget17__subtitle">
					
						<img src="<?php echo base_url() ?>assets/img/hukumu.png" style="width: 50px;height: 50px;">
							<b style="color: red;">Loan Application(<?php echo $loan_request->loan_requests;  ?>)</b>
						</span>  
					</a>
						</div>
						</div>
						<!-- end first dashboard -->

                         <!--begin second dashboard -->
                  <div class="kt-widget17__items">

						<div class="kt-widget17__item">
						<span class="kt-widget17__icon">

						</span>  
						
								
						<a href="<?php echo base_url("admin/view_aproved_loanBlanch/{$blanch_datas->blanch_id}"); ?>"><span class="kt-widget17__subtitle">
							
						<img src="<?php echo base_url() ?>assets/img/aproved.png" style="width: 50px;height: 50px;">
							<b style="color: green;">Approved Loans(<?php echo $loan_aproved->loan_aprovedBlanch; ?>)</b>
						</span></a>  
						</div>

						<div class="kt-widget17__item">
						<span class="kt-widget17__icon">

						</span>  
							
						<a href="<?php echo base_url("admin/loan_disburesed_blanch/{$blanch_datas->blanch_id}"); ?>"><span class="kt-widget17__subtitle">
					
						<img src="<?php echo base_url() ?>assets/img/aproved.png" style="width: 50px;height: 50px;">
							<b style="color: orange;">Disbursed Loans(<?php echo $loan_disbursed->loandisburse; ?>)</b>
						</span></a>  
						</div>


						</div>
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
                <!-- endsecond dashboard -->
                <!--begin third dashboard -->
             <div class="kt-widget17__items">
						<div class="kt-widget17__item">
						<span class="kt-widget17__icon">

						</span>  
						
						<a href="<?php echo base_url("admin/view_loan_pending_blanch/{$blanch_datas->blanch_id}"); ?>"><span class="kt-widget17__subtitle">	
						
						<img src="<?php echo base_url() ?>assets/img/penart.png" style="width: 50px;height: 50px;">
							<b>Today Loan pending(<?php echo $loan_pend->loan_pends; ?>) </b> /<b style="color:green;">(<?php echo number_format($pend_total->total_pendsy); ?>)</b>
						</span> </a> 
						</div>

						<div class="kt-widget17__item">
						<span class="kt-widget17__icon">

						</span>  
						
						<a href="<?php echo base_url("admin/view_receivable_blanch/{$blanch_datas->blanch_id}"); ?>"><span class="kt-widget17__subtitle">
							
						<img src="<?php echo base_url() ?>assets/img/money.png" style="width: 50px;height: 50px;">
							Today Receivable(<?php echo number_format($receivable_blanch->total_receiva) ; ?>)
						</span></a>  
						</div>


						</div>
                          <!-- endthird dashboard -->

                            <!--begin forth dashboard -->
             <div class="kt-widget17__items">
						<div class="kt-widget17__item">
						<span class="kt-widget17__icon">

						</span>  
						
						<a href="<?php echo base_url("admin/view_received_blanch/{$blanch_datas->blanch_id}") ?>"><span class="kt-widget17__subtitle">
							
						<img src="<?php echo base_url() ?>assets/img/money.png" style="width: 50px;height: 50px;">
							Today Received(<?php echo number_format($dep_bla->today_blanchDepost); ?>)
						</span> </a> 
						</div>

						<div class="kt-widget17__item">
						<span class="kt-widget17__icon">

						</span>  
						
						<a href=""><span class="kt-widget17__subtitle">
							
						<img src="<?php echo base_url() ?>assets/img/expences.png" style="width: 50px;height: 50px;">
							Recomended Expenses<b style="color: red;">(<?php echo number_format($requet_number->total_request_number); ?>)</b>
						</span></a>  
						</div>


						</div>
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
<?php include 'incs/footer_1.php'; ?>