
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $compdata->comp_name; ?> |LOAN WITHDRAWAL REPORT
 </title>
</head>
<body>

<div id="container">
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
<p style="font-size:14px;" class="c"><b> <?php echo $compdata->comp_name; ?></b><br>
<b><?php echo $compdata->adress; ?></b> <br>
<?php //$day = date("d-m-Y"); ?>
</p>
<p style="font-size:12px;text-align:center;" class="c">LOAN WITHDRAWAL REPORT <?php //echo $day; ?></p>

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


<table>
<thead>  
    <tr>
    <th style="font-size:12px;" class="c">Branch Name</th>
     <th style="font-size:12px;">Loan Product</th>
     <th style="font-size:12px;">Customer Name</th>
    <th style="font-size:12px;">Loan Ac</th>
    <th style="font-size:12px;">Loan Withdrawal</th>
    <th style="font-size:12px;">Principal + Interest</th>
    <th style="font-size:12px;">Method</th>
    <th style="font-size:12px;">Duration Type </th>
    <th style="font-size:12px;">Number Of Repayment</th>
    <th style="font-size:12px;">Restoration</th>
    <th style="font-size:12px;">Withdrawal Date</th>
    <th style="font-size:12px;">End Date</th>
  </tr>
</thead>
   <?php $no = 1; ?>
  <?php foreach ($loan_withdrawal as $loan_withdrawals): ?>
 <tr>
    <td style="font-size:12px;" class="c"><b><?php echo $loan_withdrawals->blanch_name  ?></b></td>
    <td style="font-size:12px;" class="c"><?php //echo $loan_withdrawals->f_name; ?> <?php //echo $loan_withdrawals->m_name; ?> <?php //echo $loan_withdrawals->l_name; ?></td>
    <td style="font-size:12px;" class="c"><?php //echo $loan_withdrawals->blanch_name; ?></td>
    <td style="font-size:12px;" class="c">
      <?php //echo $loan_withdrawals->loan_code; ?> 
      </td>
      <td style="font-size:12px;" class="c">
      <?php //echo $loan_withdrawals->loan_name; ?> 
      </td>
    <td style="font-size:12px;" class="c"><?php //echo number_format($loan_withdrawals->loan_aprove); ?></td>
    <td style="font-size:12px;"><?php //echo $loan_withdrawals->account_name; ?></td>
    <td style="font-size:12px;">
      <?php //if ($loan_withdrawals->day == 1) {
                           //echo "Daily";
                         ?>
                        <?php //}elseif($loan_withdrawals->day == 7){
                                                  //echo "Weekly";
                         ?>
                        
                      <?php //}elseif($loan_withdrawals->day == 30 || $loan_withdrawals->day == 31 || $loan_withdrawals->day == 29 || $loan_withdrawals->day == 28 ){
                              //echo "Monthly"; 
                        ?>
                        <?php //} ?>
    </td>
    <td style="font-size:12px;"><?php //echo $loan_withdrawals->session; ?></td>
    <td style="font-size:12px;"><?php //echo number_format($loan_withdrawals->restration); ?></td>
    <td style="font-size:12px;"><?php //echo substr($loan_withdrawals->loan_stat_date, 0,10); ?></td>
    <td style="font-size:12px;"><?php //echo substr($loan_withdrawals->loan_stat_date, 0,10); ?></td>
  </tr>


   <?php $loanCategory = $this->queries->get_loan_product_coompany($loan_withdrawals->blanch_id); ?>
 <?php foreach ($loanCategory as $loanCategorys): ?>
  <tr>
    <td style="font-size:12px;" class="c"><?php //echo $loan_withdrawals->blanch_name  ?></td>
    <td style="font-size:12px;" class="c"><?php echo $loanCategorys->loan_name; ?> / <?php echo $loanCategorys->interest_formular; ?>% </td>
    <td style="font-size:12px;" class="c"></td>
    <td style="font-size:12px;" class="c"><?php //echo $loan_withdrawals->blanch_name; ?></td>
    <td style="font-size:12px;" class="c">
      <?php //echo $loan_withdrawals->loan_code; ?> 
      </td>
      <td style="font-size:12px;" class="c">
      <?php //echo $loan_withdrawals->loan_name; ?> 
      </td>
    <td style="font-size:12px;" class="c"><?php //echo number_format($loan_withdrawals->loan_aprove); ?></td>
    <td style="font-size:12px;"><?php //echo $loan_withdrawals->account_name; ?></td>
    <td style="font-size:12px;">
      <?php //if ($loan_withdrawals->day == 1) {
                           //echo "Daily";
                         ?>
                        <?php //}elseif($loan_withdrawals->day == 7){
                                                  //echo "Weekly";
                         ?>
                        
                      <?php //}elseif($loan_withdrawals->day == 30 || $loan_withdrawals->day == 31 || $loan_withdrawals->day == 29 || $loan_withdrawals->day == 28 ){
                              //echo "Monthly"; 
                        ?>
                        <?php //} ?>
    </td>
    <td style="font-size:12px;"><?php //echo $loan_withdrawals->session; ?></td>
    <td style="font-size:12px;"><?php //echo number_format($loan_withdrawals->restration); ?></td>
    <td style="font-size:12px;"><?php //echo substr($loan_withdrawals->loan_stat_date, 0,10); ?></td>
  </tr>

<?php $customer_loan = $this->queries->get_loanfee_category_blanch($loanCategorys->category_id,$loanCategorys->blanch_id);
      // print_r($customer_loan);
      //       exit();
 ?>
 <?php foreach ($customer_loan as $customer_loans): ?>
  <tr>
    <td style="font-size:12px;" class="c"><?php //echo $loan_withdrawals->blanch_name  ?></td>
    <td style="font-size:12px;" class="c"><?php //echo $loanCategorys->loan_name; ?> </td>
    <td style="font-size:12px;" class="c"><?php echo $customer_loans->f_name; ?> <?php echo $customer_loans->m_name; ?> <?php echo $customer_loans->l_name; ?></td>
    <td style="font-size:12px;" class="c"><?php echo $customer_loans->loan_code; ?></td>
    <td style="font-size:12px;" class="c"><?php echo number_format($customer_loans->loan_aprove); ?></td>
      <td style="font-size:12px;" class="c">
      <?php echo number_format($customer_loans->loan_int); ?> 
      </td>
    <td style="font-size:12px;" class="c"><?php echo $customer_loans->account_name; ?></td>
    <td style="font-size:12px;"> 
      <?php if ($customer_loans->day == 1) {
                           echo "Daily";
                         ?>
                        <?php }elseif($customer_loans->day == 7){
                                                  //echo "Weekly";
                         ?>
                        
                      <?php }elseif($customer_loans->day == 30 || $customer_loans->day == 31 || $customer_loans->day == 29 || $customer_loans->day == 28 ){
                              echo "Monthly"; 
                        ?>
                        <?php } ?></td>
    <td style="font-size:12px;"><?php echo $customer_loans->session; ?></td>
    <td style="font-size:12px;"><?php echo number_format($customer_loans->restration); ?></td>
    <td style="font-size:12px;"><?php echo $customer_loans->loan_stat_date; ?></td>
    <td style="font-size:12px;"><?php echo substr($customer_loans->loan_end_date, 0,10); ?></td>
  </tr>

  <?php endforeach; ?>
    <?php $total_category = $this->queries->get_total_category_loan_with($loanCategorys->category_id,$loanCategorys->blanch_id) ?>
    <?php foreach ($total_category as $total_categorys): ?>
        <tr>
    <td style="font-size:12px;" class="c"><b>TOTAL LOAN PRODUCT</b></td>
    <td style="font-size:12px;" class="c"><?php //echo $loanCategorys->loan_name; ?> </td>
    <td style="font-size:12px;" class="c"><?php //echo $customer_loans->f_name; ?> <?php //echo $customer_loans->m_name; ?> <?php //echo $customer_loans->l_name; ?></td>
    <td style="font-size:12px;" class="c"><?php //echo $customer_loans->loan_code; ?></td>
    <td style="font-size:12px;" class="c"><b><?php echo number_format($total_categorys->total_loanAprove); ?></b></td>
      <td style="font-size:12px;" class="c"><b>
     <?php echo number_format($total_categorys->total_interest); ?></b>
      </td>
    <td style="font-size:12px;" class="c"><?php //echo $customer_loans->account_name; ?></td>
    <td style="font-size:12px;"> 
      <?php //if ($customer_loans->day == 1) {
                           //echo "Daily";
                         ?>
                        <?php //}elseif($customer_loans->day == 7){
                                                  //echo "Weekly";
                         ?>
                        
                      <?php //}elseif($customer_loans->day == 30 || $customer_loans->day == 31 || $customer_loans->day == 29 || $customer_loans->day == 28 ){
                              //echo "Monthly"; 
                        ?>
                        <?php //} ?></td>
    <td style="font-size:12px;"><?php //echo $customer_loans->session; ?></td>
    <td style="font-size:12px;"><?php //echo number_format($customer_loans->restration); ?></td>
    <td style="font-size:12px;"><?php //echo $customer_loans->loan_stat_date; ?></td>
    <td style="font-size:12px;"><?php //echo substr($customer_loans->loan_end_date, 0,10); ?></td>
  </tr>
  <?php endforeach; ?>
  <?php endforeach; ?>

     <?php $data_loan_with = $this->queries->get_total_blanch_loanWith($loan_withdrawals->blanch_id); ?>
     <?php foreach ($data_loan_with as $data_loan_withs): ?>
       <tr>
    <td style="font-size:12px;" class="c"><b>TOTAL BRANCH</b></td>
    <td style="font-size:12px;" class="c"><?php //echo $loanCategorys->loan_name; ?> </td>
    <td style="font-size:12px;" class="c"><?php //echo $customer_loans->f_name; ?> <?php //echo $customer_loans->m_name; ?> <?php //echo $customer_loans->l_name; ?></td>
    <td style="font-size:12px;" class="c"><?php //echo $customer_loans->loan_code; ?></td>
    <td style="font-size:12px;" class="c"><b><?php echo number_format($data_loan_withs->total_blanch_Aprove); ?></b></td>
      <td style="font-size:12px;" class="c"><b>
     <?php echo number_format($data_loan_withs->total_blanch_int); ?></b>
      </td>
    <td style="font-size:12px;" class="c"><?php //echo $customer_loans->account_name; ?></td>
    <td style="font-size:12px;"> </td>
    <td style="font-size:12px;"><?php //echo $customer_loans->session; ?></td>
    <td style="font-size:12px;"><?php //echo number_format($customer_loans->restration); ?></td>
    <td style="font-size:12px;"><?php //echo $customer_loans->loan_stat_date; ?></td>
    <td style="font-size:12px;"><?php //echo substr($customer_loans->loan_end_date, 0,10); ?></td>
  </tr>
  <?php endforeach; ?>

 <?php endforeach; ?>
 <tr>
    
    <td style="font-size:12px;" class="c"><b>TOTAL COMPANY</b></td>
    <td style="font-size:13px;" class="c"><b></b></td>
    <td style="font-size:12px;" class="c">
       
      </td>
      <td style="font-size:12px;" class="c">
       
      </td>
       <td style="font-size:12px;" class="c">
       <b><?php echo number_format($total_company->total_loan_aprove_comp); ?></b>
      </td>
    <td style="font-size:12px;" class="c"><b><?php echo number_format($total_company->total_int_comp); ?></b></td>
    <td style="font-size:12px;"><?php //echo $customers->date_birth; ?></td>
    <td style="font-size:12px;"><?php //echo $customers->gender; ?></td>
    <td style="font-size:12px;"><?php //echo $customers->blanch_name; ?></td>
    <td style="font-size:12px;"><?php //echo $customers->region_name; ?></td>
    <td style="font-size:12px;"><?php //echo $customers->district; ?></td>
    <td style="font-size:12px;"><?php //echo $customers->ward; ?></td>
  </tr>

</table>

  </div>

</div>

</body>
</html>




