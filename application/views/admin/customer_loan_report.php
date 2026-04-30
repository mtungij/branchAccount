
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $compdata->comp_name; ?> | CUSTOMER LOAN REPORT</title>
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

<!-- <div class="pull">
<img src="<?php //echo base_url().'assets/img/'.$compdata->comp_logo ?>" style="width: 50px;height: 50px;">
<p style="font-size:14px;" class="c"> <?php //echo $compdata->comp_name; ?><br>
<?php //echo $compdata->adress; ?> <br>
<?php //$day = date("d-m-Y"); ?>
</p>
<p style="font-size:12px;">BRANCH LIST</p>
</div>  -->


<table  style="border: none">
<tr style="border: none">
<td style="border: none">


<div style="width: 20%;">
<img src="<?php echo base_url().'assets/img/'.$compdata->comp_logo ?>" style="width: 100px;height: 80px;">
</div> 

</td>
<td style="border: none">
<div class="pull">
<p style="font-size:14px;" class="c"> <?php echo $compdata->comp_name; ?><br>
<?php echo $compdata->adress; ?> <br>
<?php //$day = date("d-m-Y"); ?>
</p>
<p style="font-size:12px;text-align:center;">CUSTOMER LOAN REPORT <?php //echo $day; ?></p>

</div>
</td>
</tr>
</table>

<table>
          <tr>
            <td>
            <b style="font-size:12px;border: none;">Name</b> : <?php echo $statement->f_name; ?> <?php echo $statement->m_name; ?> <?php echo $statement->l_name; ?>
            <br>
            <b style="font-size:12px;border: none;">Customer ID</b> <?php echo $statement->customer_code; ?>
            <br>
            <b style="font-size:12px;border: none;">Address </b>: <?php echo $statement->region_name; ?>,<?php echo $statement->district; ?>,<?php echo $statement->ward; ?>,<?php echo $statement->street; ?>
             </td>
            <td>
              <b style="font-size:12px;border: none;">Branch</b> : <?php echo $statement->blanch_name; ?>
              <br>
              <b style="font-size:12px;border: none;">Phone number </b>: <?php echo $statement->phone_no; ?>
              <br>
              <br>
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
<th style="font-size:12px;border: none;">Date</th>
<th style="font-size:12px;border: none;">Loan ID</th>
<th style="font-size:12px;border: none;">Receivable Amount</th>
<th style="font-size:12px;border: none;">Received Amount </th>
<th style="font-size:12px;border: none;">Penalt Amount</th>
</tr>

                     <?php foreach ($customer_report as $customer_reports): ?>
                          <tr>
                        <td style="font-size:12px;border: none;"><?php  echo substr($customer_reports->rep_date, 0,10); ?></td>
                         <td style="font-size:12px;border: none;"><?php echo $customer_reports->loan_code; ?></td>
                         <td style="font-size:12px;border: none;"><?php echo number_format($customer_reports->recevable_amount); ?></td>
                         <td style="font-size:12px;border: none;">
                             <?php if ($customer_reports->pending_amount == 0) {
                                                         ?>
                                                         -
                                                         <?php }else{
                                                          ?>
                                                <?php echo number_format($customer_reports->pending_amount); ?>
                                                    <?php } ?>
                         </td>
                         <td style="font-size:12px;border: none;">
                             <?php if ($customer_reports->penart_amount == NULL) {
                                                  ?>
                                                  -
                                              <?php }else{ ?>
                                                <?php echo number_format($customer_reports->penart_amount); ?>
                                                    <?php } ?>
                         </td>
                        </tr>
                  <?php endforeach; ?>
                            </tbody>
          
            <tr>
        <td style="font-size:12px;border: none;"><?php //echo substr(@$pay_customers->pay_day, 0,10); ?><b>TOTAL</b></td>
        <td style="font-size:12px;border: none;">  </td>
        <td style="font-size:12px;border: none;"><b><?php echo number_format(@$sum_recevable->total_recevable); ?></b></td>
        <td style="font-size:12px;border: none;"><b><?php echo number_format($sum_pend->TotalPending); ?></b></td>
        <td style="font-size:12px;border: none;"><b><?php echo number_format(@$sum_penart->total_penart); ?></b></td>
        </tr>
        

</table>
</div>

</div>

</body>
</html>




