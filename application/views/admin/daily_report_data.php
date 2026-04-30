
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $compdata->comp_name; ?> | DAILY WORK REPORT</title>
</head>
<body>

<div id="container">
<div style='width: 100%;align-items: center; display: flex;justify-content:space-between;flex-direction: row;'>
</div>
<style>
.pull{
text-align: center;
/*  margin-top: 100px;
margin-bottom: 0px;
margin-right: 150px;
margin-left: 80px;*/

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
<p style="font-size:14px;" class="c"> <b><?php echo $compdata->comp_name; ?></b><br>
<b><?php echo $compdata->adress; ?></b> <br>
<?php $day = date("d-m-Y"); ?>
</p>
<p style="font-size:12px;text-align:center;" class="c"><b><?php //echo $blanch->blanch_name; ?>DAILY WORK REPORT / From: <?php echo $day; ?> - To: <?php echo $to; ?></b></p>
<p style="font-size:12px;text-align:center;" class="c"><b><!-- OFFICER : --> <?php //echo $empl_data->empl_name; ?></b></p>

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
padding: 5px;
}

tr:nth-child(even) {
background-color: ;
}

</style>
</head>
<body>

<hr>



<table>
                       <thead>
                              <tr>
                        <th><b>Branch Name</b></th>
                        <!-- <th><b>Today Receivable</b></th> -->
                    <th><b>Received</b></th>
                    <!-- <th><b>Accural</b></th> -->
                    <th><b>Withdrawal</b></th>
                    <th><b>Deducted Income</b></th>
                    <th><b>Non Deducted Income</b></th>
                    <th><b>Expenses</b></th>
                    
                        </tr>
                              </thead>
      
                    <tbody>
                                        
                  <?php foreach($blanch as $blanchs): ?>
                    <tr>
                    <td><b><?php echo $blanchs->blanch_name; ?><b></td>
                    
                    <td><?php //echo $today_recevables->phone_no; ?></td>
                    
                    <td><?php //if ($today_recevables->day == 1) {
                           //echo "Daily";
                         ?>
                        <?php //}elseif($today_recevables->day == 7){
                                                  //echo "Weekly";
                         ?>
                        
                      <?php //}elseif($today_recevables->day == 30 || $today_recevables->day == 31 || $today_recevables->day == 28 || $today_recevables->day == 29){
                              //echo "Monthly"; 
                        ?>
                        <?php //} ?></td>
                    <td><?php //echo number_format($today_recevables->loan_int); ?></td>
                    <td><?php //echo number_format($today_recevables->restration); ?></td>
                    <td><?php //echo $today_recevables->empl_name; ?></td>                          
                                     </tr>
                                  <?php $daily_report = $this->queries->get_today_loan_withdrawal_prev($blanchs->blanch_id,$from,$to);
                                  $deposit = $this->queries->get_total_depost_blanch_prev($blanchs->blanch_id,$from,$to);
                                  $deducted_income = $this->queries->get_total_deducted_fee_today_prev($blanchs->blanch_id,$from,$to);
                                  $non_deducted = $this->queries->get_total_receive_nonDeducted_prev($blanchs->blanch_id,$from,$to);
                                  $expenses = $this->queries->get_expenses_total_comp_prev($blanchs->blanch_id,$from,$to);
                                  $restration = $this->queries->get_today_receivable_blanch_prev($blanchs->blanch_id,$from,$to);
                                 
                                  
                                  //print_r($customer)
                                   ?>
                                   <?php //foreach ($daily_report as $daily_reports): ?>
                                     <tr>
                    <td><b><?php //echo $blanchs->blanch_name; ?><b></td>
                    
                    <td>
                      
                    <?php if (@$deposit->total_depost == FALSE) {
                       ?>
                       0.00
                      <?php }else{
                       ?>
                      <?php echo number_format(@$deposit->total_depost); ?>
                                        <?php } ?>    
                      </td>

                      <!-- <td>ds</td> -->
                    
                    <td>
                                     <?php if ( @$daily_report->total_loan_with == FALSE) {
                       ?>
                       0.00
                      <?php }else{ ?>
                      <?php echo number_format(@$daily_report->total_loan_with); ?>
                      <?php } ?>

                      
                        
                      </td>
                    <td>
                      <?php if (@$deducted_income->total_deducted_balance == FALSE) {
                       ?>
                       0.00
                      <?php }else{ ?>
                      <?php echo number_format(@$deducted_income->total_deducted_balance); ?>
                       <?php } ?> 
                      </td>
                    <td>
                      <?php if (@$non_deducted->total_receive_nondeducted == FALSE) {
                       ?>
                       0.00
                      <?php }else{ ?>
                      <?php echo number_format(@$non_deducted->total_receive_nondeducted); ?>
                      <?php } ?>
                        
                      </td>
                    <td>
                      <?php if ($expenses->total_expenses == FALSE) {
                       ?>
                     0.00 
                     <?php }else{ ?>
                     <?php echo number_format($expenses->total_expenses); ?>
                    <?php } ?>
                        
                    </td>
                                              
                                      </tr>
                                 <?php //endforeach; ?>

                       <?php endforeach; ?>
                  
                  </tbody>
                  <tfoot>
                    <tr>
                                       <th><b>TOTAL</b></th>
                    
                    <th><b><?php echo number_format($total_depost_comp->total_depost_comp); ?></b></th>
                    <!-- <td><b></b></td> -->
                    <th><b><?php echo number_format($total_today_with->total_loan_withcomp); ?></b></th>

                    <th><b><?php echo number_format($total_deducted_comp->total_deducted_balancecomp); ?></b></th>
                    <th><b><?php echo number_format($total_non_deducted->total_receive_nondeducted_comp) ?></b></th>
                    <th><b><?php echo number_format($total_comp_expenses->total_expenses_comp); ?></b></th> 
                  
                        </tr>
                   </tfoot>
                   </table>
</div>

</div>

</body>
</html>


