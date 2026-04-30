
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $compdata->comp_name; ?> | LOAN REPAYMENTS REPORT</title>
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
         <p style="font-size:15px;text-align:center;"><b>PREVIOUS LOAN REPAYMENTS REPORT / From :<?php echo $from; ?> To: <?php echo $to; ?></p>

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
    <th style="font-size:12px;border: none;">Customer Name</th>
    <th style="font-size:12px;border: none;">Branch Name</th>
    <th style="font-size:12px;border: none;">Loan Account</th>
    <th style="font-size:12px;border: none;">Principal</th>
    <th style="font-size:12px;border: none;">Interest Amount</th>
    <th style="font-size:12px;border: none;">Principal + Interest</th>
    <th style="font-size:12px;border: none;">Loan Duration</th>
    <th style="font-size:12px;border: none;">No/ Repayments</th>
    <th style="font-size:12px;border: none;">Joining Date</th>
    <th style="font-size:12px;border: none;">Disbured Date</th>
  </tr>

  <?php foreach ($repayment as $repayments): ?>
 <tr>
    <td style="font-size:12px;border: none;" class="c"><?php echo $repayments->f_name; ?> <?php echo $repayments->m_name; ?> <?php echo $repayments->l_name; ?></td>
    <td style="font-size:12px;border: none;" class="c">
      <?php echo $repayments->blanch_name; ?>
      </td>
    <td style="font-size:12px;border: none;" class="c">
      <?php echo $repayments->loan_code; ?>
        
      </td>
    <td style="font-size:12px;border: none;" class="c"><?php  echo number_format($repayments->loan_aprove); ?></td>
    <td style="font-size:12px;border: none;"><?php echo number_format($repayments->loan_int - $repayments->loan_aprove); ?></td>
    <td style="font-size:12px;border: none;"><?php echo number_format($repayments->loan_int); ?></td>
    <td style="font-size:12px;border: none;">
      <?php if ($repayments->day == 1) {
                           echo "Daily";
                         ?>
                        <?php }elseif($repayments->day == 7){
                                echo "Weekly";
                         ?>
                        
                      <?php }elseif($repayments->day == 30){
                              echo "Monthly"; 
                        ?>
                        <?php } ?>
    </td>
    <td style="font-size:12px;border: none;"><?php echo $repayments->session ?></td>
    <td style="font-size:12px;border: none;"><?php echo substr($repayments->customer_day, 0,10); ?></td>
    <td style="font-size:12px;border: none;"><?php echo substr($repayments->loan_day, 0,10); ?></td>
  </tr>
 <?php endforeach; ?>
 <tr>
   <td style="font-size:12px;border: none;" class="c"><b>total</b></td>
   <td style="font-size:12px;border: none;" class="c"><b><?php //echo number_format($total_loan->loan_interest); ?></b></td>
   <td style="font-size:12px;border: none;" class="c"><b><?php //echo number_format($total_allblanch->total_depost); ?></b></td>
   <td style="font-size:12px;border: none;" class="c"><b><?php echo number_format($total_loanAprove->aprovedLoan); ?></b></td>
   <td style="font-size:12px;border: none;"><b><?php echo number_format($total_loan_int->loan_interestData - $total_loanAprove->aprovedLoan) ?></b></td>
   <td style="font-size:12px;border: none;"><b><?php echo number_format($total_loan_int->loan_interestData); ?></b></td>
   <td style="font-size:12px;border: none;"></td>
   <td style="font-size:12px;border: none;"></td>
   <td style="font-size:12px;border: none;"></td>
   <td style="font-size:12px;border: none;"></td>
 </tr>

</table>
  </div>

</div>

</body>
</html>




