
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $compdata->comp_name; ?> |RECEIVED REPORT
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
<?php

$logo_path = FCPATH . 'assets/img/cdclogo.png';
$logo_url = 'file://' . $logo_path;


?>
    <!-- Company Header -->
  

<img src="<?= $logo_url ?>" style="width: 100px;height: 80px;">
</div> 

</td>
<td style="border: none">
<div class="pull">
<p style="font-size:14px;" class="c"><b> <?php echo $compdata->comp_name; ?></b><br>
<b><?php echo $compdata->adress; ?></b> <br>
<?php //$day = date("d-m-Y"); ?>
</p>
<p style="font-size:12px;text-align:center;" class="c"><?php echo $blanch_data->blanch_name ?> RECEIVED REPORT <?php //echo $day; ?></p>
<p style="font-size:12px;text-align:center;" class="c">From: <?php echo $from; ?> - To:<?php echo $to; ?> <?php if ($empl_id == 'all') {
}else{
 ?>
   / <?php echo $empl_data->empl_name; ?>
   <?php } ?>  / <?php if ($dep_status == 'out') {
            echo "Outstand";
          }elseif ($dep_status== 'withdrawal') {
            echo "Active";
          } ?>
 </p>
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
    <th style="font-size:12px;border: none;">S/No.</th>
     <th style="font-size:12px;border: none;">Customer Name</th>
     <th style="font-size:12px;border: none;">Branch</th>
    <th style="font-size:12px;border: none;">Phone Number</th>
    <th style="font-size:12px;border: none;">Duration Type</th>
    <th style="font-size:12px;border: none;">Loan Amount</th>
    <th style="font-size:12px;border: none;">Received Amount</th>
    <th style="font-size:12px;border: none;">Deposit Method</th>
    <th style="font-size:12px;border: none;">Employee</th>
    <th style="font-size:12px;border: none;">Date</th>
  </tr>
  </thead>
   <?php $no = 1; ?>
  <?php foreach ($data_blanch as $today_recevables): ?>
 <tr>
    <td style="font-size:12px;border: none;" class="c"><?php echo $no++; ?>.</td>
    <td style="font-size:12px;border: none;" class="c"><?php echo $today_recevables->f_name; ?> <?php echo $today_recevables->m_name; ?> <?php echo $today_recevables->l_name; ?></td>
    <td style="font-size:12px;border: none;" class="c"><?php echo $today_recevables->blanch_name; ?></td>
    <td style="font-size:12px;border: none;" class="c">
      <?php echo $today_recevables->phone_no; ?> 
      </td>
      <td style="font-size:12px;border: none;" class="c">
      <?php if ($today_recevables->day == 1) {
                           echo "Daily";
                         ?>
                        <?php }elseif($today_recevables->day == 7){
                                                  echo "Weekly";
                         ?>
                        
                      <?php }elseif($today_recevables->day == 30 || $today_recevables->day == 31 || $today_recevables->day == 28 || $today_recevables->day == 29){
                              echo "Monthly"; 
                        ?>
                        <?php } ?>
      </td>
    <td style="font-size:12px;border: none;" class="c"><?php echo number_format($today_recevables->loan_int); ?></td>
    <td style="font-size:12px;border: none;"><?php echo number_format($today_recevables->depost); ?></td>
    <td style="font-size:12px;border: none;"><?php echo $today_recevables->account_name; ?>
    </td>
    <td style="font-size:12px;border: none;"><?php echo $today_recevables->empl_username; ?></td>
    <td style="font-size:12px;border: none;"><?php echo $today_recevables->depost_day; ?></td>
    
  </tr>
 <?php endforeach; ?>
 <tr>
    
    <td style="font-size:12px;border: none;" class="c"><?php //echo $customers->customer_code; ?></td>
    <td style="font-size:13px;border: none;" class="c"><b>TOTAL</b></td>
    <td style="font-size:12px;border: none;" class="c">
       
      </td>
      <td style="font-size:12px;border: none;" class="c">
       
      </td>
    <td style="font-size:12px;border: none;" class="c"></td>
    <td style="font-size:12px;border: none;"><b><?php //echo number_format($sum_loan_withdrawal->total_with); ?></b></td>
    <td style="font-size:12px;border: none;"><?php echo number_format($total_receve_blanch->toal_deposit); ?></td>
    <td style="font-size:12px;border: none;"><?php //echo $customers->blanch_name; ?></td>
    <td style="font-size:12px;border: none;"><?php //echo $customers->region_name; ?></td>
    <td style="font-size:12px;border: none;"><?php //echo $customers->district; ?></td>
  </tr>

</table>

  </div>

</div>

</body>
</html>




