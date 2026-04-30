
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $compdata->comp_name; ?> | SALARY SHEET REPORT</title>
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
<p style="font-size:12px;text-align:center;" class="c">SALARY SHEET REPORT / Date : <?php echo $day; ?></p>

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
    <th style="font-size:12px;border: none;">S/No.</th>
    <th style="font-size:12px;border: none;">Name</th>
    <th style="font-size:12px;border: none;">Branch</th>
    <th style="font-size:12px;border: none;">Position</th>
    <th style="font-size:12px;border: none;">Phone number</th>
    <th style="font-size:12px;border: none;">Account Name</th>
    <th style="font-size:12px;border: none;">Account Number</th>
    <th style="font-size:12px;border: none;">Amount</th>
  </tr>
   <?php $no = 1; ?>
  <?php foreach ($sheet as $cashs): ?>
    
 
 <tr>
    <td style="font-size:13px;border: none;" class="c"><?php echo $no++; ?>.</td>
    <td style="font-size:13px;border: none;" class="c"><?php echo $cashs->empl_name; ?> </td>
    <td style="font-size:13px;border: none;" class="c">
       <?php echo $cashs->blanch_name; ?> 
      </td>
    <td style="font-size:13px;border: none;" class="c"><?php echo $cashs->position; ?></td>
    <td style="font-size:13px;border: none;"><?php echo $cashs->empl_no; ?></td>
    <td style="font-size:13px;border: none;"><?php echo $cashs->bank_account; ?></td>
    <td style="font-size:13px;border: none;"><?php echo $cashs->account_no; ?></td>
    <td style="font-size:13px;border: none;"><?php echo number_format($cashs->salary); ?></td>
  </tr>
 <?php endforeach; ?>
 <tr>
   <td style="font-size:12px;border: none;" class="c">TOTAL</td>
   <td style="font-size:12px;border: none;" class="c"><b></b></td>
   <td style="font-size:12px;border: none;" class="c"><b><?php //echo number_format($total_cashDepost->cash_depost); ?></b></td>
   <td style="font-size:12px;border: none;" class="c"><b><?php //echo number_format($total_withdrawal->cash_withdrowal); ?></b></td>
   <td style="font-size:12px;border: none;" class="c"></td>
   <td style="font-size:12px;border: none;" class="c"></td>
   <td style="font-size:12px;border: none;" class="c"></td>
   <td style="font-size:12px;border: none;" class="c"><b><?php echo number_format($total_salary->total_pay); ?></b></td>
 </tr>

</table>
<p><b>Authorised Name : .......................................</b> &nbsp;&nbsp;&nbsp;&nbsp; <b>Position : .......................................</b> &nbsp;&nbsp;&nbsp;&nbsp; <b>Signature : .......................................</b></p>
<p><b>Authorised Name : .......................................</b> &nbsp;&nbsp;&nbsp;&nbsp; <b>Position : .......................................</b> &nbsp;&nbsp;&nbsp;&nbsp; <b>Signature : .......................................</b></p>
  </div>

</div>

</body>
</html>




