
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $compdata->comp_name; ?> | TELLER OFFICER CASH TRANSACTION</title>
</head>
<body>

<div id="container">
 <!--  <div style='width: 100%;align-items: center; display: flex;justify-content:space-between;flex-direction: row;'>
 </div> -->
  <style>
    .pull{
    text-align: center;
    margin-top: 100px;
    margin-bottom: 0px;
    margin-right: 150px;
    margin-left: 80px;

    }
  </style>
  <style>
    .display{
      display: flex;
      
    }
  </style>

     <style>
             .c {
               text-transform: uppercase;
               }
                
                </style>

      

             <table  style="border: none">
      <tr style="border: none">
        <td style="border: none">
          

 <div style="width: 20%;">
  <img src="<?php echo base_url().'assets/img/'.$compdata->comp_logo ?>" style="width: 100px;height: 80px;">
  </div> 

        </td>
        <td style="border: none">
      <div class="pull">
  <p style="font-size:20px;" class="c"> <b><?php echo $compdata->comp_name; ?></b><br>
        <?php echo $compdata->adress; ?> <br>
        <?php $day = date("d-m-Y"); ?>
        </p>
         <p style="font-size:15px;text-align:center;"><b class="c"><?php echo $blanch->blanch_name; ?> - TELLER OFFICER CASH TRANSACTION REPORT / <?php echo $day; ?></p>

  </div>
        </td>
      </tr>
    </table>

     
 
  <div id="body">
  <style> 
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 2px;
}

tr:nth-child(even) {
  background-color: ;
}

</style>
</head>
<body>


<hr>
<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_">
                       <thead>
                               <tr>
                            <th>Officer Name</th>
                            <th>Group Name</th>
                            <th>S/No.</th>
                        <th>Customer Name</th>
                        <th>Phone Number</th>
                        <th>Duration</th>
                        <th>Receivable</th>
                        <th>Received</th>
                        <th>Account</th>
                        <th>Withdrawal</th>
                        <th>Account</th>
                             </tr>
                              </thead>
      
                    <tbody>
                                          <?php $no = 1; ?>
                <?php foreach ($empl_oficer as $oficer_datas): ?>
                   <tr>
                    <td>
                      <b><?php echo $oficer_datas->empl_name; ?></b>  
                      </td>
                      <td></td>
                    <td style="border: none;">INDIVIDUAL LOAN </td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td> 
                    <td style="border: none;"></td>
                    <td style="border: none;"></td> 
                    <td style="border: none;"></td> 
                    <td style="border: none;"></td>     
                                   </tr>
                                 
                               <?php
                               $empl_loan = $this->queries->get_loan_empl_data($oficer_datas->empl_id);
                               // echo "<pre>";
                               // print_r($empl_loan);
                               //       exit();
                                ?>
                                <?php $no = 1; ?>
                                <?php foreach ($empl_loan as $empl_loans): ?>
                   <tr>
                    <td></td>
                    <td></td>
                    <td class="c"><?php echo $no++; ?>. </td>
                    <td class="c">
                       <?php echo $empl_loans->f_name; ?> <?php echo $empl_loans->m_name; ?> <?php echo $empl_loans->l_name; ?>
                    </td>
                    <td>
                      <?php echo $empl_loans->phone_no; ?>
                    </td>
                    <td>
                      <?php if($empl_loans->day == '1'){ ?>
                        <?php echo "Daily"; ?>
                      <?php }elseif ($empl_loans->day == '7'){
                        echo "Weekly";
                       ?>
                       <?php }elseif ($empl_loans->day == '30' || $empl_loans->day == '31' || $empl_loans->day == '28' || $empl_loans->day == '29') {
                        echo "Monthly";
                        ?>
                        <?php } ?>
                    </td>
                    <td><?php echo number_format($empl_loans->restration); ?></td> 
                    <td><?php echo number_format($empl_loans->total_received); ?></td>
                    <td><?php echo $empl_loans->depost_account; ?></td> 
                    <td><?php echo number_format($empl_loans->total_withdrawal); ?></td> 
                    <td><?php echo $empl_loans->with_account; ?></td>             
                                   </tr>
                                    <?php endforeach; ?>
                                    <?php $total_work_individual = $this->queries->get_total_depost_individual($oficer_datas->empl_id); ?>
                                    <?php foreach ($total_work_individual as $total_work_individuals): ?>
                                      
                                   
                                    <tr>
                                    <td></td>
                    <td></td>
                    <td class="c"><b>TOTAL</b> </td>
                    <td class="c"></td>
                    <td></td>
                      
                    <td>
                      <?php //if($empl_loans->day == '1'){ ?>
                        <?php //echo "Daily"; ?>
                      <?php //}elseif ($empl_loans->day == '7'){
                        //echo "Weekly";
                       ?>
                       <?php //}elseif ($empl_loans->day == '30' || $empl_loans->day == '31' || $empl_loans->day == '28' || $empl_loans->day == '29') {
                        //echo "Monthly";
                        ?>
                        <?php //} ?>
                    </td>
                    <td></td> 
                    <td><b><?php echo number_format($total_work_individuals->total_depost_individual); ?></b></td>
                    <td></td> 
                    <td><b><?php echo number_format($total_work_individuals->total_withdrawal_individual); ?></b></td> 
                    <td></td> 
                                    </tr>
                                  <?php endforeach; ?>
                                   <tr>
                                    <td></td>
                    <td></td>
                    <td class="c">GROUP LOANS</td>
                    <td class="c"></td>
                    <td></td>
                      
                    <td>
                      <?php //if($empl_loans->day == '1'){ ?>
                        <?php //echo "Daily"; ?>
                      <?php //}elseif ($empl_loans->day == '7'){
                        //echo "Weekly";
                       ?>
                       <?php //}elseif ($empl_loans->day == '30' || $empl_loans->day == '31' || $empl_loans->day == '28' || $empl_loans->day == '29') {
                        //echo "Monthly";
                        ?>
                        <?php //} ?>
                    </td>
                    <td></td> 
                    <td><b><?php //echo number_format($total_work_individuals->total_depost_individual); ?></b></td>
                    <td></td> 
                    <td><b><?php //echo number_format($total_work_individuals->total_withdrawal_individual); ?></b></td> 
                    <td></td> 
                                    </tr>
                                    <?php $group_empl = $this->queries->get_empl_group_depost($oficer_datas->empl_id);?>
                                 <?php foreach ($group_empl as $group_empls): ?>
                                     <tr>
                                    <td></td>
                    <td><?php echo $group_empls->group_name; ?></td>
                    <td class="c"></td>
                    <td class="c"></td>
                                    
                    <td>
                      <?php //if($empl_loans->day == '1'){ ?>
                        <?php //echo "Daily"; ?>
                      <?php //}elseif ($empl_loans->day == '7'){
                        //echo "Weekly";
                       ?>
                       <?php //}elseif ($empl_loans->day == '30' || $empl_loans->day == '31' || $empl_loans->day == '28' || $empl_loans->day == '29') {
                        //echo "Monthly";
                        ?>
                        <?php //} ?>
                    </td>
                    <td></td> 
                    <td><b><?php //echo number_format($total_work_individuals->total_depost_individual); ?></b></td>
                    <td></td> 
                    <td><b><?php //echo number_format($total_work_individuals->total_withdrawal_individual); ?></b></td> 
                    <td></td> 
                    <td></td> 
                                    </tr>

                               <?php $member_group = $this->queries->member_group($group_empls->group_id); ?>
                               <?php $nos = 1; ?>
                                     <?php foreach ($member_group as $member_groups): ?>
                                      <tr>
                                    <td></td>
                    <td><?php //echo $group_empls->group_name; ?></td>
                    <td class="c"><?php echo $nos++; ?>.</td>
                    <td class="c"><?php echo $member_groups->f_name; ?> <?php echo $member_groups->m_name; ?> <?php echo $member_groups->l_name; ?></td>
                                    
                    <td>
                      <?php echo $member_groups->phone_no; ?>
                    </td>
                    <td><?php if($member_groups->day == '1'){ ?>
                        <?php echo "Daily"; ?>
                      <?php }elseif ($member_groups->day == '7'){
                        echo "Weekly";
                       ?>
                       <?php }elseif ($member_groups->day == '30' || $member_groups->day == '31' || $member_groups->day == '28' || $member_groups->day == '29') {
                        echo "Monthly";
                        ?>
                        <?php } ?></td> 
                    <td><?php echo $member_groups->restration; ?>
                        </td>
                    <td><?php echo number_format($member_groups->total_received); ?></td> 
                    <td><?php echo $member_groups->depost_account; ?></td> 
                    <td><?php echo number_format($member_groups->total_withdrawal); ?></td> 
                    <td><?php echo $member_groups->with_account; ?></td>  
                                    </tr>
                                <?php endforeach; ?>
                                
                                <?php $total_work_group = $this->queries->get_total_group_depost($group_empls->group_id); ?>
                                <?php foreach ($total_work_group as $total_work_groups): ?>
                                <tr>
                                    <td></td>
                    <td><b>TOTAL</b></td>
                    <td class="c"></td>
                    <td class="c"></td>
                                    
                    <td></td>
                    <td><?php //if($member_groups->day == '1'){ ?>
                        <?php //echo "Daily"; ?>
                      <?php //}elseif ($member_groups->day == '7'){
                        //echo "Weekly";
                       ?>
                       <?php //}elseif ($member_groups->day == '30' || $member_groups->day == '31' || $member_groups->day == '28' || $member_groups->day == '29') {
                        //echo "Monthly";
                        ?>
                        <?php //} ?></td> 
                    <td><?php //echo $member_groups->restration; ?>
                        </td>
                    <td><b><?php echo number_format($total_work_groups->total_depost_group); ?></b></td> 
                    <td><?php //echo $member_groups->depost_account; ?></td> 
                    <td><b><?php echo number_format($total_work_groups->total_withdrawal_group); ?></b></td>  
                    <td><?php //echo $member_groups->with_account; ?></td>  
                                    </tr>
                                 <?php endforeach; ?>
                                  <?php endforeach; ?>
                                  <?php $ofice_repayment = $this->queries->get_total_empl_depost_data($oficer_datas->empl_id);
                                //   echo "<pre>";
                                // print_r($ofice_repayment);
                                //          exit();
                                   ?>

                                  <?php foreach ($ofice_repayment as $ofice_repayments): ?>
                                  <tr>
                                    <td style="color:green;"><b>OFFICER TOTAL REPAYMENT:</b></td>
                    <td><b></b></td>
                    <td class="c"></td>
                    <td class="c"></td>
                                    
                    <td></td>
                    <td><?php //if($member_groups->day == '1'){ ?>
                        <?php //echo "Daily"; ?>
                      <?php //}elseif ($member_groups->day == '7'){
                        //echo "Weekly";
                       ?>
                       <?php //}elseif ($member_groups->day == '30' || $member_groups->day == '31' || $member_groups->day == '28' || $member_groups->day == '29') {
                        //echo "Monthly";
                        ?>
                        <?php //} ?></td> 
                    <td><?php //echo $member_groups->restration; ?>
                        </td>
                    <td style="color:green;"><b><?php echo number_format($ofice_repayments->total_depost_oficer); ?></b></td> 
                    <td><?php //echo $member_groups->depost_account; ?></td> 
                    <td style="color:green;"><b><?php echo number_format($ofice_repayments->total_withdrawal_oficer); ?></b></td> 
                    <td><?php //echo $member_groups->with_account; ?></td>
                                  </tr>
                               <?php endforeach; ?>
                            <?php endforeach; ?>
                       </tbody>
                   </table>

                   <p style="text-align: center;">Summary</p>

                   <table>
                        <thead>
                              <tr>
                        <th><b>Withdrawal</b></th>
                        <th><b><?php echo number_format($total_withdrawal->total_withdrawal_comp); ?></b></th>
                            </tr>
                            <tr>
                        <th><b>Deposit</b></th>
                        <th><b><?php echo number_format($total_deposit->total_depost_comp); ?><b></th>
                            </tr>
                              </thead>
                      <tbody>
                                          <?php //$no = 1; ?>
                  <?php //foreach ($float as $floats): ?>
                  <!--   <tr>
                    <td><b>GRAND TOTAL</b></td>
                    <td><b><?php //echo number_format($total_withdrawal->total_withdrawal_comp + $total_deposit->total_depost_comp); ?></b></td>            
                                </tr> -->
                             </tbody>
                    </table>

                      <p style="text-align: center;">Deposit Account Transaction Summary</p>
                      <table>
                        <thead>
                              <tr>
                        <th>Account Name</th>
                        <th>Amount</th>
                        <th>Number of Receipt</th>
                              </thead>
                      <tbody>
                                          <?php //$no = 1; ?>
                  <?php foreach ($cash_account as $cash_accounts): ?>
                   <tr>
                    <td><?php echo $cash_accounts->account_name; ?></td>
                    <td><?php echo $cash_accounts->total_depost_account ?></td>           
                    <td><?php echo $cash_accounts->recept; ?></td>            
                                    </tr> 
                            <?php endforeach; ?>
                             </tbody>
                    </table>
  </div>

</div>

</body>
</html>




