
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $compdata->comp_name; ?> | CASH TRANSACTION REPORT</title>
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
         <p style="font-size:15px;text-align:center;"><b>CASH TRANSACTION REPORT / From: <?php echo $from; ?> To: <?php echo $to; ?></p>
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
    <th style="font-size:12px;border: none;">Customer Name</th>
    <th style="font-size:12px;border: none;">Branch Name</th>
    <th style="font-size:12px;border: none;">Deposit</th>
    <th style="font-size:12px;border: none;">Withdrawal</th>
    <th style="font-size:12px;border: none;">Date</th>
  </tr>
   <?php $no = 1; ?>
  <?php foreach ($data as $cashs): ?>
    
 
 <tr>
    <td style="font-size:12px;border: none;" class="c"><?php echo $no++; ?>.</td>
    <td style="font-size:12px;border: none;" class="c"><?php echo $cashs->f_name; ?> <?php echo $cashs->m_name; ?> <?php echo $cashs->l_name; ?></td>
    <td style="font-size:12px;border: none;" class="c"><?php echo $cashs->blanch_name; ?></td>
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
  </tr>
 <?php endforeach; ?>
 <tr>
   <td style="font-size:12px;border: none;" class="c"></td>
   <td style="font-size:12px;border: none;" class="c"><b>total</b></td>
   <td style="font-size:12px;border: none;" class="c"><b></b></td>
   <td style="font-size:12px;border: none;" class="c"><b><?php echo number_format($total_cashDepost->cash_depost); ?></b></td>
   <td style="font-size:12px;border: none;" class="c"><b><?php echo number_format($total_withdrawal->cash_withdrowal); ?></b></td>
   <td style="font-size:12px;border: none;" class="c"></td>
 </tr>

</table>
  </div>

</div>

</body>
</html>




