
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $compdata->comp_name; ?> | BRANCHWISE LOAN REPORT</title>
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

       <div class="pull">
         <p style="font-size:14px;" class="c"> <?php echo $compdata->comp_name; ?><br>
        <?php echo $compdata->adress; ?> <br>
        <?php $day = date("d-m-Y"); ?>
        </p>
         <p style="font-size:12px;">BRANCHWISE LOAN REPORT / From : <?php echo $from; ?> To: <?php echo $to; ?></p>
       </div>

     
 
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

  <?php foreach ($data_blanchwise as $data_blanchwises): ?>
    
 
 <tr>
  
    <td style="font-size:12px;border: none;" class="c"><?php echo $data_blanchwises->blanch_name; ?></td>
    <td style="font-size:12px;border: none;" class="c">
      <?php echo number_format($data_blanchwises->total_loans); ?>
      </td>
    <td style="font-size:12px;border: none;" class="c">
      <?php echo number_format($data_blanchwises->sum_depost); ?>
        
      </td>
    <td style="font-size:12px;border: none;" class="c"><?php  echo number_format($data_blanchwises->total_loans - $data_blanchwises->sum_depost); ?></td>
  </tr>
 <?php endforeach; ?>
 <tr>
   <td style="font-size:12px;border: none;" class="c"><b>total</b></td>
   <td style="font-size:12px;border: none;" class="c"><b><?php echo number_format($total_receivable->total_receivable); ?></b></td>
   <td style="font-size:12px;border: none;" class="c"><b><?php echo number_format($total_receved->total_receved); ?></b></td>
   <td style="font-size:12px;border: none;" class="c"><b><?php echo number_format($total_receivable->total_receivable - $total_receved->total_receved); ?></b></td>
   
 </tr>

</table>
  </div>

</div>

</body>
</html>




