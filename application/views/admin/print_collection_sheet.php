
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $compdata->comp_name; ?> | Group Collection Sheet </title>
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
<p style="font-size:12px;text-align:center;" class="c"><b>Group Collection Sheet <?php //echo $day; ?></b></p>

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
                  <th>Groups Name</th>
                  <th>Customer Name</th>
                  <th>Loan Aproved</th>
                  <th>Loan + Interest</th>
                  <th>Collection</th>
                  <th>Duration</th>
                  <th>Paid Amount</th>
                  <th>Remain Amount</th>
                  <th>Penart</th>
                  <th>Loan Status</th>
                               </tr>
                              </thead>
      
                    <tbody>
                                         
                  <?php foreach($group_loan as $group_loans): ?>
                            <tr>
                    <td><b><?php echo $group_loans->group_name; ?></b></td>
                    <td><?php //echo $loan_pendings->loan_code; ?></td>
                    <td><?php //echo $loan_pendings->f_name; ?> <?php //echo substr($loan_pendings->m_name, 0,1); ?> <?php //echo $loan_pendings->l_name; ?></td>
                    <td><?php //echo $loan_pendings->phone_no; ?></td>
                    <td><?php //echo $loan_pendings->bussiness_type; ?></td>
                    <td><?php //echo $loan_pendings->blanch_name; ?></td>
                    <td><?php //echo number_format($loan_pendings->loan_aprove); ?></td>
                    <td><?php //echo number_format($loan_pendings->loan_int); ?></td>

                      <td>
                        </td>
                  
                </tr>
                               <?php 
                               $customers_loan = $this->queries->get_loan_group_customer($group_loans->group_id);
                              // echo "<pre>";
                              // print_r($customers_loan);
                              //      exit();
                                ?>

                                 <?php foreach ($customers_loan as $customers_loans): ?>
                    <tr>
                    <td class="c"></td>
                    <td class="c"><?php echo $customers_loans->f_name; ?> <?php echo $customers_loans->m_name; ?> <?php echo $customers_loans->l_name; ?></td>
                    <td><?php echo number_format($customers_loans->loan_aprove); ?> </td>
                    <td><?php echo number_format($customers_loans->loan_int); ?></td>
                    <td><?php echo number_format($customers_loans->restration); ?></td>
                    <td class="c">  <?php if ($customers_loans->day == 1) {
                           echo "Daily";
                         ?>
                        <?php }elseif($customers_loans->day == 7){
                                    echo "Weekly";
                         ?>
                        
                      <?php }elseif($customers_loans->day == 30 || $customers_loans->day == 31 || $customers_loans->day == 28 || $customers_loans->day == 29){
                              echo "Monthly"; 
                        ?>
                        <?php } ?></td>
                    <td><?php echo number_format($customers_loans->total_depost); ?></td>
                    <td><?php echo number_format($customers_loans->loan_int - $customers_loans->total_depost); ?></td>
                    <td><?php echo number_format($customers_loans->total_penart - $customers_loans->total_paid_penart); ?></td>
                    <td>
                      <?php if ($customers_loans->loan_status == 'withdrawal') {
                       ?>
                      Active
                    <?php }elseif ($customers_loans->loan_status == 'pending') {
                     ?>
                      Pending
                    <?php }elseif ($customers_loans->loan_status == 'aproved') {
                     ?>
                      Aproved
                    <?php }elseif ($customers_loans->loan_status == 'disbarsed') {
                     ?>
                      Disbursed
                    <?php }elseif ($customers_loans->loan_status == 'done') {
                     ?>
                     Done
                    <?php }elseif ($customers_loans->loan_status == 'out') {
                     ?>
                      Default
                      <?php } ?>
                    </td>
                  
                </tr>
                              <?php endforeach; ?> 
                              <?php
                              $total = $this->queries->get_total_group_loan($group_loans->group_id);
                              // echo "<pre>";
                              // print_r($total);
                              //       exit(); 
                               ?>
                                 <?php foreach ($total as $totals): ?>
     
                                  <tr>
                    <td><b></b></td>
                    <td><b>TOTAL:</b></td>
                    <td><b><?php echo number_format($totals->total_loangroup); ?></b></td>
                    <td><b><?php echo number_format($totals->total_int); ?></b></td>
                    <td><b><?php echo number_format($totals->total_restoration); ?></b></td>
                    <td><b></b></td>
                    <td><b><?php echo number_format($totals->total_depost_groups); ?></b></td>
                    <td><b><?php echo number_format($totals->total_int - $totals->total_depost_groups); ?></td>
                    <td><b><?php echo number_format($totals->total_penart_group - $totals->total_paid); ?></b></td>
                    <td><b><?php //echo number_format($total_groups->total_loan_aprove_empl); ?></b></td>
                    </tr> 

                    <?php endforeach; ?>      
          <?php endforeach; ?>
                  
                  </tbody>
  
               
                   </table>

  </div>

</div>

</body>
</html>




