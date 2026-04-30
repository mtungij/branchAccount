<!-- begin:: Aside Menu -->

<?php if (@$manager->position_id == '21') {
 ?>

 <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
       <div 
              id="kt_aside_menu" 
              class="kt-aside-menu " 
              data-ktmenu-vertical="1"
               data-ktmenu-scroll="1"  
              >             
              
              <ul class="kt-menu__nav ">
                     <li class="kt-menu__item " aria-haspopup="true" >
                            <a  href="<?php echo base_url("oficer/index"); ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-architecture-and-city"></i><span class="kt-menu__link-text">Dashboard</span></a>
                     </li>

                     <!-- <li class="kt-menu__item " aria-haspopup="true" >
                            <a  href="<?php //echo base_url("manager_m/position"); ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-layer"></i><span class="kt-menu__link-text">Position</span></a>
                     </li>
                     <li class="kt-menu__item " aria-haspopup="true" >
                            <a  href="<?php //echo base_url("manager_m/accountType"); ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-layer"></i><span class="kt-menu__link-text">Account Type</span></a>
                     </li> -->
                    <!--         <li class="kt-menu__item " aria-haspopup="true" >
                            <a  href="<?php //echo base_url("manager_m/blanch"); ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-layer"></i><span class="kt-menu__link-text">Branch</span></a>
                     </li> -->

                      <!--       <li class="kt-menu__item " aria-haspopup="true" >
                            <a  href="<?php //echo base_url("manager_m/group"); ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-layer"></i><span class="kt-menu__link-text">Register Groups Name</span></a>
                     </li> -->

     

        
          <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
              <a  href="javascript:;" class="kt-menu__link kt-menu__toggle">
                     <i class="kt-menu__link-icon flaticon-layer"></i>
                     <span class="kt-menu__link-text">Matumizi & Ada</span>
                     <i class="kt-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div class="kt-menu__submenu ">
                     <span class="kt-menu__arrow"></span>
                     <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true" >
                                   <span class="kt-menu__link">
                                          <span class="kt-menu__link-text">Expenses & Income</span>
                                   </span>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/expenses"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Register Expenses</span>
                                   </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/expnses_requisition_form"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Expenses</span>
                                   </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/get_recomended_request"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Recomended Expenses</span>
                                   </a>
                            </li>
                             <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/get_accepted_expencess"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Accepted Expenses</span>
                                   </a>
                            </li>
                            
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/income_detail"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Register Income</span>
                                   </a>
                            </li>

                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/manager_income_dashboard"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Income Dashboard</span>
                                   </a>
                            </li>
                            
                     </ul>
              </div>
        </li>





        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
              <a  href="javascript:;" class="kt-menu__link kt-menu__toggle">
                     <i class="kt-menu__link-icon flaticon-layer"></i>
                     <span class="kt-menu__link-text">Employee</span>
                     <i class="kt-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div class="kt-menu__submenu ">
                     <span class="kt-menu__arrow"></span>
                     <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true" >
                                   <span class="kt-menu__link">
                                          <span class="kt-menu__link-text">Employee</span>
                                   </span>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/employee"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Register Employee</span>
                                   </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/manager_all_employee"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">All Employee</span>
                                   </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/view_blanchEmployee") ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">All Blanch & Employee</span>
                                   </a>
                            </li>

                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/leave") ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Employee Leave</span>
                                   </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php //echo base_url("oficer/salary_sheet") ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Salary Sheet</span>
                                   </a>
                            </li>

                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/employee_allowance") ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Employee Allowance</span>
                                   </a>
                            </li>

                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/employee_deduction") ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Employee Deduction</span>
                                   </a>
                            </li>
                            
                     </ul>
              </div>
        </li>
         <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
              <a  href="javascript:;" class="kt-menu__link kt-menu__toggle">
                     <i class="kt-menu__link-icon flaticon-layer"></i>
                     <span class="kt-menu__link-text">Customer</span>
                     <i class="kt-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div class="kt-menu__submenu ">
                     <span class="kt-menu__arrow"></span>
                     <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true" >
                                   <span class="kt-menu__link">
                                          <span class="kt-menu__link-text">Customer</span>
                                   </span>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/customer"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Register Customer</span>
                                   </a>
                            </li>
                           <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/manager_customer_update"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Update Customer Information</span>
                                   </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/manager_allcustomer"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">All Customer</span>
                                   </a>
                            </li>
                            
                     </ul>
              </div>
        </li>


        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
              <a  href="javascript:;" class="kt-menu__link kt-menu__toggle">
                     <i class="kt-menu__link-icon flaticon-layer"></i>
                     <span class="kt-menu__link-text">Loan</span>
                     <i class="kt-menu__ver-arrow la la-angle-right"></i>
              </a>

              <div class="kt-menu__submenu ">
                     <span class="kt-menu__arrow"></span>
                     <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true" >
                                   <span class="kt-menu__link">
                                          <span class="kt-menu__link-text">Loan</span>
                                   </span>
                            </li>
                            
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/manager_loanApplication"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Loan Application</span>
                                   </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/manager_loanPending"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Loan Pending Approve</span>
                                   </a>
                            </li>
                            
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/manager_loanAproved") ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Loan Approved But not Disbursed</span>
                                   </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/manager_loandisbursed"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Loan Disbursed</span>
                                   </a>
                            </li>

                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/manager_loanWithdrawal"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Loan Withdrawal</span>
                                   </a>
                            </li>

                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/manager_loanRejected"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Loan Rejected</span>
                                   </a>
                            </li>

                     <!--   <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php //echo base_url("manager_m/leave") ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Loan penalty</span>
                                   </a>
                            </li> -->
                          <!--   <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php //echo base_url("manager_m/loanpending_groups") ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Loan Group</span>
                                   </a>
                            </li> -->
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/manager_personal_loan"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Personal loan</span>
                                   </a>
                            </li>
                            
                     </ul>
              </div>
        </li>
<!-- 

        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
              <a  href="javascript:;" class="kt-menu__link kt-menu__toggle">
                     <i class="kt-menu__link-icon flaticon-layer"></i>
                     <span class="kt-menu__link-text">Teller Dashboard</span>
                     <i class="kt-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div class="kt-menu__submenu ">
                     <span class="kt-menu__arrow"></span>
                     <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true" >
                                   <span class="kt-menu__link">
                                          <span class="kt-menu__link-text">Teller Dashboard</span>
                                   </span>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php //echo base_url("manager_m/teller_dashboard"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Personal Loan</span>
                                   </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("manager_m/teller_group"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Group Loan</span>
                                   </a>
                            </li>
                            
                     </ul>
              </div>
        </li> -->


        <li class="kt-menu__item " aria-haspopup="true" >
                            <a  href="<?php echo base_url("oficer/manager_tellerdashboard"); ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-layer"></i><span class="kt-menu__link-text">Teller Dashboard</span></a>
                     </li>
       
         <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
              <a  href="javascript:;" class="kt-menu__link kt-menu__toggle">
                     <i class="kt-menu__link-icon flaticon-layer"></i>
                     <span class="kt-menu__link-text">Report</span>
                     <i class="kt-menu__ver-arrow la la-angle-right"></i>
              </a>

              <div class="kt-menu__submenu ">
                     <span class="kt-menu__arrow"></span>
                     <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true" >
                                   <span class="kt-menu__link">
                                          <span class="kt-menu__link-text">Report</span>
                                   </span>
                            </li>
                            
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/manager_cashTransaction"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Cash Transaction</span>
                                   </a>
                            </li>

                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/Manager_blanchiwise_report"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Branch Wise Loan Summary</span>
                                   </a>
                            </li>

                            <li class="kt-menu__item " aria-haspopup="true">
                                   <a  href="<?php echo base_url("oficer/manager_loan_pending_time"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Loan pending</span>
                                   </a>
                            </li>

                            <li class="kt-menu__item " aria-haspopup="true">
                                   <a  href="<?php echo base_url("oficer/manager_repaymant_data"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Loan Repayments</span>
                                   </a>
                            </li>

                            <li class="kt-menu__item " aria-haspopup="true">
                                   <a  href="<?php echo base_url("oficer/manager_get_outstand_loan"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Outstanding Loan</span>
                                   </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                   <a  href="<?php echo base_url("oficer/manager_search_customer_loan_report"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Customer Loan Report</span>
                                   </a>
                            </li>

                            <li class="kt-menu__item " aria-haspopup="true">
                                   <a  href="<?php echo base_url("oficer/manager_customer_account_statement"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Customer Account Statement</span>
                                   </a>
                            </li>

                                <li class="kt-menu__item " aria-haspopup="true">
                                   <a  href="<?php echo base_url("oficer/Manager_loan_collection"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Loan Collection Statement</span>
                                   </a>
                            </li>

                                   <li class="kt-menu__item " aria-haspopup="true">
                                   <a  href="<?php echo base_url("oficer/manager_today_recevable_loan"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Today Receivable</span>
                                   </a>
                            </li>

                                          <li class="kt-menu__item " aria-haspopup="true">
                                   <a  href="<?php echo base_url("oficer/manager_today_receved_loan"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Today Received</span>
                                   </a>
                            </li>

                              <li class="kt-menu__item " aria-haspopup="true">
                                   <a  href="<?php echo base_url("oficer/teller_oficer"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Teller Officer Cash Transaction</span>
                                   </a>
                            </li>


                                   <li class="kt-menu__item " aria-haspopup="true">
                                   <a  href="<?php //echo base_url("manager_m/bank_reconselation_report"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Bank Reconciliations Report</span>
                                   </a>
                            </li>
                            
                            
                            
                     </ul>
              </div>
        </li>


         <li class="kt-menu__item " aria-haspopup="true" >
                            <a  href="<?php //echo base_url("manager_m/get_cashInHand_Data"); ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-layer"></i><span class="kt-menu__link-text">Cash In Hand</span></a>
          </li>


        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
              <a  href="javascript:;" class="kt-menu__link kt-menu__toggle">
                     <i class="kt-menu__link-icon flaticon-layer"></i>
                     <span class="kt-menu__link-text">Commnication</span>
                     <i class="kt-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div class="kt-menu__submenu ">
                     <span class="kt-menu__arrow"></span>
                     <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true" >
                                   <span class="kt-menu__link">
                                          <span class="kt-menu__link-text">Commnication</span>
                                   </span>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php //echo base_url("manager_m/teller_dashboard"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Via SMS</span>
                                   </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php //echo base_url("manager_m/send_email"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Via Email</span>
                                   </a>
                            </li>
                            
                     </ul>
              </div>
        </li>

      </ul>
       </div>
</div>

<?php }else{ ?>
<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
	<div 
		id="kt_aside_menu" 
		class="kt-aside-menu " 
		data-ktmenu-vertical="1"
		 data-ktmenu-scroll="1"  
		>		
		 
		  
                     <ul class="kt-menu__nav ">
                   <li class="kt-menu__item " aria-haspopup="true" >
                            <a  href="<?php echo base_url("oficer/index"); ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-architecture-and-city"></i><span class="kt-menu__link-text">Dashboard</span></a>
                  </li>

                      <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
              <a  href="javascript:;" class="kt-menu__link kt-menu__toggle">
                     <i class="kt-menu__link-icon flaticon-layer"></i>
                     <span class="kt-menu__link-text">Matumizi & Ada</span>
                     <i class="kt-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div class="kt-menu__submenu ">
                     <span class="kt-menu__arrow"></span>
                     <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true" >
                                   <span class="kt-menu__link">
                                          <span class="kt-menu__link-text">Matumizi & Ada</span>
                                   </span>
                            </li>
                            
                           
                         
                    
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/expnses_requisition_form"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Matumizi</span>
                                   </a>
                            </li>
                            

                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/deducted_income"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Deducted Income</span>
                                   </a>
                            </li>

                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/income_dashboard"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Non Deducted Income</span>
                                   </a>
                            </li>
                            
                     </ul>
              </div>
        </li>
              <?php foreach ($privillage as $privillages): ?>
                     <?php if ($privillages->position_id == '1'): ?>
                     
               
                    <!-- <li class="kt-menu__item " aria-haspopup="true" >
                            <a  href="</?php echo base_url("oficer/group"); ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-layer"></i><span class="kt-menu__link-text">Register Groups Name</span></a>
                     </li> -->

        
       <!--   <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
              <a  href="javascript:;" class="kt-menu__link kt-menu__toggle">
                     <i class="kt-menu__link-icon flaticon-layer"></i>
                     <span class="kt-menu__link-text">Capital</span>
                     <i class="kt-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div class="kt-menu__submenu ">
                     <span class="kt-menu__arrow"></span>
                     <ul class="kt-menu__subnav">
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php //echo base_url("oficer/transfar_amount") ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Float</span>
                                   </a>
                            </li>
                            
                     </ul>
              </div>
        </li> -->


        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
              <a  href="javascript:;" class="kt-menu__link kt-menu__toggle">
                     <i class="kt-menu__link-icon flaticon-layer"></i>
                     <span class="kt-menu__link-text">Employee</span>
                     <i class="kt-menu__ver-arrow la la-angle-right"></i>
              </a>
              
              <div class="kt-menu__submenu ">
                     <span class="kt-menu__arrow"></span>
                     <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true" >
                                   <span class="kt-menu__link">
                                          <span class="kt-menu__link-text">Employee</span>
                                   </span>
                            </li>
                            
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/all_employee"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Blanch Employee</span>
                                   </a>
                            </li>
                     </ul>
              </div>
        </li>
        
         <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
              <a  href="javascript:;" class="kt-menu__link kt-menu__toggle">
                     <i class="kt-menu__link-icon flaticon-layer"></i>
                     <span class="kt-menu__link-text">Customer</span>
                     <i class="kt-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div class="kt-menu__submenu ">
                     <span class="kt-menu__arrow"></span>
                     <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true" >
                                   <span class="kt-menu__link">
                                          <span class="kt-menu__link-text">Customer</span>
                                   </span>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/customer"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Register Customer</span>
                                   </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/customer_update"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Update Customer Information</span>
                                   </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/all_customer"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">All Customer</span>
                                   </a>
                            </li>
                            
                     </ul>
              </div>
        </li>
    

        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
              <a  href="javascript:;" class="kt-menu__link kt-menu__toggle">
                     <i class="kt-menu__link-icon flaticon-layer"></i>
                     <span class="kt-menu__link-text">Loan</span>
                     <i class="kt-menu__ver-arrow la la-angle-right"></i>
              </a>

              <div class="kt-menu__submenu ">
                     <span class="kt-menu__arrow"></span>
                     <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true" >
                                   <span class="kt-menu__link">
                                          <span class="kt-menu__link-text">Loan</span>
                                   </span>
                            </li>
                            
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/loan_application"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Loan Application</span>
                                   </a>
                            </li>
                           
                           
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/loan_pending"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Loan Pending Approve</span>
                                   </a>
                            </li>
                     
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/get_loan_aproved") ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Loan Approved But not Disbursed</span>
                                   </a>
                            </li>

                          

                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/disburse_loan"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Loan Disbursed</span>
                                   </a>
                            </li>

                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/loan_withdrawal"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Loan Withdrawal</span>
                                   </a>
                            </li>

                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/all_loan_lejected"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Loan Rejected</span>
                                   </a>
                            </li>

                    
                            
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/parsonal_pending_loan"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Personal loan</span>
                                   </a>
                            </li>
                            
                     </ul>
              </div>
        </li>
        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
              <a  href="javascript:;" class="kt-menu__link kt-menu__toggle">
                     <i class="kt-menu__link-icon flaticon-layer"></i>
                     <span class="kt-menu__link-text">Group Loan</span>
                     <i class="kt-menu__ver-arrow la la-angle-right"></i>
              </a>

              <div class="kt-menu__submenu ">
                     <span class="kt-menu__arrow"></span>
                     <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true" >
                                   <span class="kt-menu__link">
                                          <span class="kt-menu__link-text">Group Loan</span>
                                   </span>
                            </li>
                            

                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/loanpending_groups") ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Loan Group</span>
                                   </a>
                            </li>

                             <li class="kt-menu__item " aria-haspopup="true">
                                   <a  href="<?php echo base_url("oficer/general_operation"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">General Operation Report</span>
                                   </a>
                            </li>
                             <li class="kt-menu__item " aria-haspopup="true">
                                   <a  href="<?php echo base_url("oficer/group_list"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Group Collection Sheet</span>
                                   </a>
                            </li>
                           
                            
                     </ul>
              </div>

              
        </li>

         <li class="kt-menu__item " aria-haspopup="true" >
                            <a  href="<?php echo base_url("oficer/teller_dashboard"); ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-layer"></i><span class="kt-menu__link-text">Malipo</span></a>
          </li>

            <li class="kt-menu__item " aria-haspopup="true" >
                            <a  href="<?php echo base_url("oficer/interest_principal_transfor"); ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-layer"></i><span class="kt-menu__link-text">Cash flow</span></a>
          </li>
          <li class="kt-menu__item " aria-haspopup="true" >
                            <a  href="<?php echo base_url("oficer/saving_deposit"); ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-layer"></i><span class="kt-menu__link-text">Saving Deposit</span></a>
          </li>

          

               <?php endif; ?>
               <?php if ($privillages->position_id == '6') {
               ?>
               <!-- <li class="kt-menu__item " aria-haspopup="true" >
                            <a  href="<?php echo base_url("oficer/group"); ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-layer"></i><span class="kt-menu__link-text">Register Groups Name</span></a>
                     </li> -->

         <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
              <a  href="javascript:;" class="kt-menu__link kt-menu__toggle">
                     <i class="kt-menu__link-icon flaticon-layer"></i>
                     <span class="kt-menu__link-text">Mteja</span>
                     <i class="kt-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div class="kt-menu__submenu ">
                     <span class="kt-menu__arrow"></span>
                     <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true" >
                                   <span class="kt-menu__link">
                                          <span class="kt-menu__link-text">Customer</span>
                                   </span>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/customer"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Sajili Mteja</span>
                                   </a>
                            </li>

                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/customer_update"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Sasisha Taarifa za Mteja</span>
                                   </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/all_customer"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Wateja wote</span>
                                   </a>
                            </li>
                            
                     </ul>
              </div>
        </li>


        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
              <a  href="javascript:;" class="kt-menu__link kt-menu__toggle">
                     <i class="kt-menu__link-icon flaticon-layer"></i>
                     <span class="kt-menu__link-text">Mikopo</span>
                     <i class="kt-menu__ver-arrow la la-angle-right"></i>
              </a>

              <div class="kt-menu__submenu ">
                     <span class="kt-menu__arrow"></span>
                     <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true" >
                                   <span class="kt-menu__link">
                                          <span class="kt-menu__link-text">Loan</span>
                                   </span>
                            </li>
                            
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/loan_application"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Omba Mkopo</span>
                                   </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/get_loan_aproved") ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Mikopo iliyoidhinishwa</span>
                                   </a>
                            </li>
                           
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/disburse_loan"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Mikopo iliyopitishwa</span>
                                   </a>
                            </li>

                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/loan_withdrawal"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text"> Mikopo iliyopitolewa</span>
                                   </a>
                            </li>

                            <!-- <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="</?php echo base_url("oficer/all_loan_lejected"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Loan Rejected</span>
                                   </a>
                            </li> -->

                     
                            <!-- <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="</?php echo base_url("oficer/loanpending_groups") ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Loan Group</span>
                                   </a>
                            </li> -->
                            <!-- <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="</?php echo base_url("oficer/parsonal_pending_loan"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Personal loan</span>
                                   </a>
                            </li> -->
                            
                     </ul>
              </div>


        </li>


<!-- 
         <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
              <a  href="javascript:;" class="kt-menu__link kt-menu__toggle">
                     <i class="kt-menu__link-icon flaticon-layer"></i>
                     <span class="kt-menu__link-text">Group Loan</span>
                     <i class="kt-menu__ver-arrow la la-angle-right"></i>
              </a>

              <div class="kt-menu__submenu ">
                     <span class="kt-menu__arrow"></span>
                     <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true" >
                                   <span class="kt-menu__link">
                                          <span class="kt-menu__link-text">Group Loan</span>
                                   </span>
                            </li>
                            

                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="</?php echo base_url("oficer/loanpending_groups") ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Loan Group</span>
                                   </a>
                            </li>

                             <li class="kt-menu__item " aria-haspopup="true">
                                   <a  href="</?php echo base_url("oficer/general_operation"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">General Operation Report</span>
                                   </a>
                            </li>
                             <li class="kt-menu__item " aria-haspopup="true">
                                   <a  href="</?php echo base_url("oficer/group_list"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Group Collection Sheet</span>
                                   </a>
                            </li>
                           
                            
                     </ul>
              </div>

              
        </li> -->
    
                  <?php  }elseif ($privillages->position_id == '2') {
                  ?>
                   <li class="kt-menu__item " aria-haspopup="true" >
                            <a  href="<?php echo base_url("oficer/teller_dashboard"); ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-layer"></i><span class="kt-menu__link-text">Dashboard Malipo</span></a>
                 </li>
                  <!-- <li class="kt-menu__item " aria-haspopup="true" >
                            <a  href="</?php echo base_url("oficer/interest_principal_transfor"); ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-layer"></i><span class="kt-menu__link-text">Cash flow</span></a>
                  </li> -->
                  <li class="kt-menu__item " aria-haspopup="true" >
                            <a  href="<?php echo base_url("oficer/saving_deposit"); ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-layer"></i><span class="kt-menu__link-text">Saving Deposit</span></a>
          <!-- </li>
                  <li class="kt-menu__item " aria-haspopup="true" >
                            <a  href="</?php echo base_url("oficer/today_cashinhand"); ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-layer"></i><span class="kt-menu__link-text">Today Cash In Hand Depost</span></a>
          </li> -->
                  <?php  }elseif ($privillages->position_id == '20') {
                   ?>

                      <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
              <a  href="javascript:;" class="kt-menu__link kt-menu__toggle">
                     <i class="kt-menu__link-icon flaticon-layer"></i>
                     <span class="kt-menu__link-text">Employee</span>
                     <i class="kt-menu__ver-arrow la la-angle-right"></i>
              </a>
              
              <div class="kt-menu__submenu ">
                     <span class="kt-menu__arrow"></span>
                     <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true" >
                                   <span class="kt-menu__link">
                                          <span class="kt-menu__link-text">Employee</span>
                                   </span>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/employee"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Register Employee</span>
                                   </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/manager_all_employee"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">All Employee</span>
                                   </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/view_blanchEmployee") ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">All Blanch & Employee</span>
                                   </a>
                            </li>

                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/leave") ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Employee Leave</span>
                                   </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php //echo base_url("oficer/salary_sheet") ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Salary Sheet</span>
                                   </a>
                            </li>

                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/employee_allowance") ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Employee Allowance</span>
                                   </a>
                            </li>

                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/employee_deduction") ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Employee Deduction</span>
                                   </a>
                            </li>
                            
                     </ul>
              </div>
        </li>
        <?php } ?>
  
  <?php endforeach ?>

       <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
              <a  href="javascript:;" class="kt-menu__link kt-menu__toggle">
                     <i class="kt-menu__link-icon flaticon-layer"></i>
                     <span class="kt-menu__link-text">Reports</span>
                     <i class="kt-menu__ver-arrow la la-angle-right"></i>
              </a>

              <div class="kt-menu__submenu ">
                     <span class="kt-menu__arrow"></span>
                     <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true" >
                                   <span class="kt-menu__link">
                                          <span class="kt-menu__link-text">Report</span>
                                   </span>
                            </li>
                            
                            <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="<?php echo base_url("oficer/cash_transaction"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Malipo</span>
                                   </a>
                            </li>

                            <!-- <li class="kt-menu__item " aria-haspopup="true" >
                                   <a  href="</?php echo base_url("oficer/blanchiwise_report"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Branch Wise Loan Summary</span>
                                   </a>
                            </li> -->

                            <li class="kt-menu__item " aria-haspopup="true">
                                   <a  href="<?php echo base_url("oficer/loan_pending_time"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Malazo</span>
                                   </a>
                            </li>

                            <li class="kt-menu__item " aria-haspopup="true">
                                   <a  href="<?php echo base_url("oficer/repaymant_data"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Malipo yaliyokamilika</span>
                                   </a>
                            </li>

                            <!-- <li class="kt-menu__item " aria-haspopup="true">
                                   <a  href="</?php echo base_url("oficer/search_customer_loan_report"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Customer Loan Report</span>
                                   </a>
                            </li> -->

                            <li class="kt-menu__item " aria-haspopup="true">
                                   <a  href="<?php echo base_url("oficer/customer_account_statement"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Statement Ya Mteja</span>
                                   </a>
                            </li>

                             <li class="kt-menu__item " aria-haspopup="true">
                                   <a  href="<?php echo base_url("oficer/loan_collection"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Loan Collections Statement</span>
                                   </a>
                            </li>

                                   <li class="kt-menu__item " aria-haspopup="true">
                                   <a  href="<?php echo base_url("oficer/today_recevable_loan"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Makusanyo ya Leo</span>
                                   </a>
                            </li>

                                          <li class="kt-menu__item " aria-haspopup="true">
                                   <a  href="<?php echo base_url("oficer/today_receved_loan"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Malipo Ya Leo</span>
                                   </a>
                            </li>


                             <li class="kt-menu__item " aria-haspopup="true">
                                   <a  href="<?php echo base_url("oficer/get_outstand_loan"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Madeni Sugu</span>
                                   </a>
                            </li>

                            <li class="kt-menu__item " aria-haspopup="true">
                                   <a  href=" <?php echo base_url("oficer/teller_oficer"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Report ya Maafisa      </span>
                                   </a>
                            </li>

                           

                            <!-- <li class="kt-menu__item " aria-haspopup="true">
                                   <a  href="</?php echo base_url("oficer/next_expectation"); ?>" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                 <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">Makusanyo Ya Mbele</span>
                                   </a>
                            </li>    -->
                            
                     </ul>
              </div>
        </li>

        

      </ul> 
                     
	</div>
</div>

<?php } ?>
</div>


<!-- end:: Aside Menu -->
<!-- end:: Aside -->