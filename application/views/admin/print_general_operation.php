
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $compdata->comp_name; ?> | General Operation Report </title>
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
<p style="font-size:12px;text-align:center;" class="c"><?php //echo $blanch_customer->blanch_name ?> General Operation Report <?php //echo $day; ?></p>

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
                    <th>Eployee Name & Groups</th>
                  <th>Disbursement</th>
                  <th>EMI Collection</th>
                  <th>Prepayment</th>
                  <th>Application Fee</th>
                  <th>Penalty</th>
                  <th>Expenses</th>
                  <th>Deposit</th>
                  <th>Next Collection</th>
                  <th>Loan Approved</th>

                  
                  
                            
                            
                               </tr>
                              </thead>
      
                    <tbody>
                                         
                  <?php foreach($empl as $empls): ?>
                            <tr>
                    <td><b><?php echo $empls->empl_name; ?></b></td>
                    <td><?php //echo $loan_pendings->loan_code; ?></td>
                    <td><?php //echo $loan_pendings->f_name; ?> <?php //echo substr($loan_pendings->m_name, 0,1); ?> <?php //echo $loan_pendings->l_name; ?></td>
                    <td><?php //echo $loan_pendings->phone_no; ?></td>
                    <td><?php //echo $loan_pendings->bussiness_type; ?></td>
                    <td><?php //echo $loan_pendings->blanch_name; ?></td>
                    <td><?php //echo number_format($loan_pendings->loan_aprove); ?></td>
                    <td><?php //echo number_format($loan_pendings->loan_int); ?></td>

                      <td>
                        <?php //if ($loan_pendings->day == 1) {
                          // echo "Daily";
                         ?>
                        <?php //}elseif($loan_pendings->day == 7){
                                                  //echo "Weekly";
                         ?>
                        
                      <?php //}elseif($loan_pendings->day == 30 || $loan_pendings->day == 31 || $loan_pendings->day == 28 || $loan_pendings->day == 29){
                              //echo "Monthly"; 
                        ?>
                        <?php //} ?>
                          
                        </td>
                      <td><?php //echo $loan_pendings->session; ?></td>
                  
                </tr>
                               <?php 
                              $loan_group = $this->queries->get_empl_group($empls->empl_id);
                              // echo "<pre>";
                              // print_r($loan_group);
                              //      exit();
                                ?>

                                 <?php foreach ($loan_group as $loan_groups): ?>
                    <tr>
                    <td><?php echo $loan_groups->group_name; ?></td>
                    <td><?php echo number_format($loan_groups->total_loan_disbursed); ?></td>
                    <td><?php echo number_format($loan_groups->total_restoration); ?> </td>
                    <td>0.00</td>
                    <td><?php echo number_format($loan_groups->total_deducted_fee); ?></td>
                    <td><?php echo number_format($loan_groups->total_penart - $loan_groups->total_penart_paid); ?></td>
                    <td>0.00</td>
                    <td><?php echo number_format($loan_groups->total_depost); ?></td>
                    <td><?php echo number_format($loan_groups->total_tommorow); ?></td>
                    <td><?php echo number_format($loan_groups->total_loan_aprove); ?></td>
                  
                </tr>
                              <?php endforeach; ?> 
                              <?php
                              $total_group = $this->queries->get_total_aproved_group_empl($empls->empl_id);
                              // echo "<pre>";
                              // print_r($total_group);
                              //       exit(); 
                               ?>
                                 <?php foreach ($total_group as $total_groups): ?>
     
                                  <tr>
                    <td><b>TOTAL:</b></td>
                    <td><b><?php echo number_format($total_groups->total_loan_disbursed_empl); ?></b></td>
                    <td><b><?php echo number_format($total_groups->total_restoration_empl); ?></b></td>
                    <td><b>0.00</b></td>
                    <td><b><?php echo number_format($total_groups->total_deducted_fee_empl); ?></b></td>
                    <td><b><?php echo number_format($total_groups->total_penart_empl - $total_groups->total_penart_paid_empl); ?></b></td>
                    <td><b>0.00</b></td>
                    <td><b><?php echo number_format($total_groups->total_depost_empl); ?></td>
                      <td><b><?php echo number_format($total_groups->total_tommor_collection); ?></b></td>    
                    <td><b><?php echo number_format($total_groups->total_loan_aprove_empl); ?></b></td>
                    </tr> 

                    <?php endforeach; ?>      
          <?php endforeach; ?>
                  
                  </tbody>
    <!--      <tfoot>
                    <tr>
        <th><b>TOTAL</b></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th><?php //echo number_format($total_loan_group->total_loan); ?></th>
    <th><?php //echo number_format($total_loan_group->total_loanint); ?></th>
    <th><b>Paid Amount : <?php //echo number_format($total_depost_group->total_depost); ?></b></th>
    <th><b>Remain Amount : <?php //echo number_format($total_loan_group->total_loanint - $total_depost_group->total_depost ); ?></b></th>
    <th></th>
    <th></th>
    
                    </tr>
                   </tfoot>  -->
               
                   </table>

  </div>

</div>

</body>
</html>




