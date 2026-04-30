
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $compdata->comp_name; ?> | BRANCHWISE LOAN REPORT</title>
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
<?php $day = date("d-m-Y"); ?>
</p>
<p style="font-size:12px;text-align:center;" class="c"><?php //echo $blanch->blanch_name ?>BRANCHWISE LOAN REPORT / <?php echo $day; ?></p>

</div>
</td>
</tr>
</table>

 <hr>    
 
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



<table>
  <tr>
    <th style="font-size:12px;border: none;">Branch Name</th>
    <th style="font-size:12px;border: none;">Receivable</th>
    <th style="font-size:12px;border: none;">Received</th>
    <th style="font-size:12px;border: none;">Pending</th>
  </tr>

  <?php foreach ($data_blanch as $data_blanchs): ?>
    
 
 <tr>
  
    <td style="font-size:12px;border: none;" class="c"><?php echo $data_blanchs->blanch_name; ?></td>
    <td style="font-size:12px;border: none;" class="c">
      <?php echo number_format($data_blanchs->total_principal_int); ?>
      </td>
    <td style="font-size:12px;border: none;" class="c">
      <?php echo number_format($data_blanchs->total_dpost); ?>
      </td>
    <td style="font-size:12px;border: none;" class="c"><?php echo number_format($data_blanchs->total_principal_int - $data_blanchs->total_dpost ); ?></td>
  </tr>
 <?php endforeach; ?>
 <tr>
   <td style="font-size:12px;border: none;" class="c"><b>total</b></td>
   <td style="font-size:12px;border: none;" class="c"><b><?php echo number_format($total_allblanch->total_loanData); ?></b></td>
   <td style="font-size:12px;border: none;" class="c"><b><?php echo number_format($total_loan->loan_depost); ?></b></td>
   <td style="font-size:12px;border: none;" class="c"><b><?php echo number_format($total_allblanch->total_loanData - $total_loan->loan_depost); ?></b></td>
   
 </tr>

</table>
  </div>

</div>

</body>
</html>




