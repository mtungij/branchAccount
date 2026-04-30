
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $compdata->comp_name; ?> | COMPANY REPORT</title>
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
         <p style="font-size:15px;text-align:center;"><b>COMPANY REPORT</p>

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
  <tr>
    <td style="font-size:12px;border: none;">ACTIVE CAPITAL</td>
    <td style="font-size:12px;border: none;"></td>
    <td style="font-size:12px;border: none;"><?php //echo number_format($total_capital->totalCapital  + $cash_depost->today_depost + $cash_income->today_income - $out_float->principal - $cash_expences->total_expnces); ?> <?php echo number_format(($loan_depost->Total_depost + $receive_Amount->total_receve_amaount + $total_loanFee->sum_withdraw) - ($request_expences->total_exp)); ?> </td>
  </tr>

   <tr>
    <td style="font-size:12px;border: none;">DISBURSED LOANS</td>
    <td style="font-size:12px;border: none;"></td>
    <td style="font-size:12px;border: none;"><?php echo number_format($active_loan->withdrawal_data); ?> </td>
  </tr>
  <tr>
    <td style="font-size:12px;border: none;">EXPECTATION RECEIVABLE</td>
    <td style="font-size:12px;border: none;"></td>
    <td style="font-size:12px;border: none;"><?php echo number_format($total_expect->loan_interest); ?></td>
  </tr>
    <tr>
    <td style="font-size:12px;border: none;"> LOAN RETURNED</td>
    <td style="font-size:12px;border: none;"></td>
    <td style="font-size:12px;border: none;"><?php echo number_format($sum_depost_loan->sum_depost); ?></td>
  </tr>

  </tr>
    <tr>
    <td style="font-size:12px;border: none;">BAD DEBTS</td>
    <td style="font-size:12px;border: none;"></td>
    <td style="font-size:12px;border: none;"><?php echo number_format($bad_debts->total_out); ?></td>
  </tr>
 
<tr>
  <td style="font-size:12px;border: none;">TOTAL INTEREST</td>
  <td style="font-size:12px;border: none;"><?php echo number_format($sum_total_loanInt->total_interest); ?></td>
  <td style="font-size:12px;border: none;"></td>
</tr>
<tr>
  <td style="font-size:12px;border: none;">TOTAL INCOME(Fixed Amount)</td>
  <td style="font-size:12px;border: none;"><?php echo number_format($sum_total_comp_income->total_receved); ?></td>
  <td style="font-size:12px;border: none;"></td>
</tr>

<tr>
  <td style="font-size:12px;border: none;">TOTAL LOAN FEE(%)</td>
  <td style="font-size:12px;border: none;"><?php echo number_format($total_loanFee->sum_withdraw); ?></td>
  <td style="font-size:12px;border: none;"></td>
</tr>
<tr>
  <td style="font-size:12px;border: none;"></td>
  <th style="font-size:12px;border: none;"><?php echo number_format($sum_total_loanInt->total_interest + $sum_total_comp_income->total_receved + $total_loanFee->sum_withdraw); ?></th>
  <td style="font-size:12px;border: none;"></td>
</tr>

<tr>
  <td style="font-size:12px;border: none;">LESS (-) TOTAL EXPENSES</td>
  <td style="font-size:12px;border: none;"><?php echo number_format($total_expences->total_request) ?></td>
  <td style="font-size:12px;border: none;"></td>
</tr>

<tr>
  <td style="font-size:12px;border: none;">COMPANY PROFIT</td>
  <td style="font-size:12px;border: none;"></td>
  <td style="font-size:12px;border: none;"><?php echo number_format($sum_total_loanInt->total_interest + $sum_total_comp_income->total_receved + $total_loanFee->sum_withdraw -($total_expences->total_request)); ?></td>
</tr>

    
</table>
<h5 style="text-align: center;">SUMMARY - INCOME</h5>
<table>
  <?php foreach ($sum_income as $sum_incomes): ?>
  <tr>
    <td style="font-size:12px;border: none;" class="c"><?php echo $sum_incomes->inc_name; ?></td>
    <td style="font-size:12px;border: none;"><?php echo number_format($sum_incomes->total_income); ?></th>
  </tr>
   <?php endforeach ?>
   <tr>
     <th style="font-size:12px;border: none;">TOTAL</th>
     <th style="font-size:12px;border: none;"><?php echo number_format($sum_total_comp_income->total_receved); ?></th>
   </tr>
</table>
   

   <h5 style="text-align: center;">SUMMARY - LOAN FEE</h5>
<table>
  <?php foreach ($fee as $fees): ?>
  <tr>
    <td style="font-size:12px;border: none;" class="c"><?php echo $fees->description; ?> </td>
    <td style="font-size:12px;border: none;"><?php echo number_format($fees->total_loanFee); ?></th>
  </tr>
   <?php endforeach ?>
   <tr>
     <th style="font-size:12px;border: none;">TOTAL</th>
     <th style="font-size:12px;border: none;"><?php echo number_format($total_loanFee->sum_withdraw); ?></th>
   </tr>
</table>

   <h5 style="text-align: center;">SUMMARY - EXPENSES</h5>
<table>
  <?php foreach ($exp as $exps): ?>
  <tr>
    <td style="font-size:12px;border: none;" class="c"><?php echo $exps->ex_name; ?> </td>
    <td style="font-size:12px;border: none;"><?php echo number_format($exps->total_exp); ?></th>
  </tr>
   <?php endforeach ?>
   <tr>
     <th style="font-size:12px;border: none;">TOTAL</th>
     <th style="font-size:12px;border: none;"><?php echo number_format($total_expences->total_request) ?></th>
   </tr>
</table>

  </div>

</div>

</body>
</html>




