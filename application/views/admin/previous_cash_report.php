
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $compdata->comp_name; ?> | CASH TRANSACTION REPORT</title>
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
<p style="font-size:12px;text-align:center;" class="c"><?php echo $blanch_data->blanch_name ?> CASH TRANSACTION REPORT </p>
<p style="font-size:12px;text-align:center;" class="c">From: <?php echo $from; ?> To:<?php echo $to; ?> <?php if ($empl_id == 'all') {
 ?>
   <?php }else{ ?>
   / <?php echo $empl_data->empl_name; ?>
    <?php } ?>
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
    <th style="font-size:12px;border: none;">Deposit</th>
    <th style="font-size:12px;border: none;">Withdrawal</th>
    <th style="font-size:12px;border: none;">Date</th>
    <th style="font-size:12px;border: none;">Time</th>
  </tr>
  </thead>
   <?php $no = 1; ?>
  <?php foreach ($data as $cashs): ?>
    
 
 <tr>
    <td style="font-size:12px;border: none;" class="c"><?php echo $no++; ?>.</td>
    <td style="font-size:12px;border: none;" class="c"><?php echo $cashs->f_name; ?> <?php echo $cashs->m_name; ?> <?php echo $cashs->l_name; ?></td>
    <td style="font-size:12px;border: none;" class="c">
      <?php if ($cashs->depost == TRUE) {
       ?>
      <?php echo number_format($cashs->depost); ?>
    <?php }elseif ($cashs->depost == FALSE) {
     ?>
     -
     <?php } ?>
      </td>
    <td style="font-size:12px;border: none;" class="c">
      <?php if ($cashs->withdraw == TRUE) {
       ?>
      <?php echo number_format($cashs->withdraw); ?>
    <?php }elseif ($cashs->withdraw == FALSE) {
     ?>
     -
     <?php } ?>
        
      </td>
    <td style="font-size:12px;border: none;" class="c"><?php echo  substr($cashs->lecod_day, 0,16) ; ?></td>
    <td style="font-size:12px;border: none;" class="c"><?php echo  $cashs->time_rec ; ?></td>
  </tr>
 <?php endforeach; ?>
 <tr>
   <td style="font-size:12px;border: none;" class="c"></td>
   <td style="font-size:12px;border: none;" class="c"><b>total</b></td>
   <td style="font-size:12px;border: none;" class="c"><b><?php echo number_format($total_cashDepost->cash_depost); ?></b></td>
   <td style="font-size:12px;border: none;" class="c"><b><?php echo number_format($total_withdrawal->cash_withdrowal); ?></b></td>
   <td style="font-size:12px;border: none;" class="c"></td>
   <td style="font-size:12px;border: none;" class="c"></td>
 </tr>

</table>
  </div>

</div>

</body>
</html>




