
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $compdata->comp_name; ?> | TODAY RECEIVABLE REPORT</title>
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



<table  style="border: none">
<tr style="border: none">
<td style="border: none">


<div style="width: 20%;">
<img src="<?php echo base_url().'assets/img/'.$compdata->comp_logo ?>" style="width: 100px;height: 80px;">
</div> 

</td>
<td style="border: none">
<div class="pull">
<p style="font-size:14px;" class="c"> <b><?php echo $compdata->comp_name; ?></b><br>
<b><?php echo $compdata->adress; ?></b> <br>
<?php $day = date("d-m-Y"); ?>
</p>
<p style="font-size:12px;text-align:center;" class="c"><b><?php //echo $blanch->blanch_name; ?>TODAY RECEIVABLE REPORT / <?php echo $day; ?></b></p>
<p style="font-size:12px;text-align:center;" class="c"><b>OFFICER : <?php echo $empl_data->empl_name; ?></b></p>

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
<th style="font-size:12px;border: none;">Customer Name</th>
<th style="font-size:12px;border: none;">Branch Name</th>
<th style="font-size:12px;border: none;">Phone Number</th>
<th style="font-size:12px;border: none;">Duration Type </th>
<th style="font-size:12px;border: none;">Loan Amount</th>
<th style="font-size:12px;border: none;">Receivable Amount</th>
<th style="font-size:12px;border: none;">Date</th>
</tr>

                    <?php foreach($data_employee as $today_recevables): ?>
                          <tr>
                        <td style="font-size:12px;border: none;"><?php echo $today_recevables->f_name; ?> <?php echo $today_recevables->m_name; ?> <?php echo $today_recevables->l_name; ?></td>
                         <td style="font-size:12px;border: none;" class="c"><?php echo $today_recevables->blanch_name; ?></td>
                         <td style="font-size:12px;border: none;"> <?php echo $today_recevables->phone_no; ?></td>
                         <td style="font-size:12px;border: none;">
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
                         <td style="font-size:12px;border: none;">
                        <?php echo number_format($today_recevables->loan_int); ?>
                         </td>
                         <td style="font-size:12px;border: none;"> <?php echo number_format($today_recevables->restration); ?></td>
                         <td style="font-size:12px;border: none;"> <?php echo $today_recevables->date_show; ?></td>
                        </tr>
                  <?php endforeach; ?>
                            </tbody>
          
            <tr>
        <td style="font-size:12px;border: none;"><?php //echo substr(@$pay_customers->pay_day, 0,10); ?><b>TOTAL</b></td>
        <td style="font-size:12px;border: none;">  </td>
        <td style="font-size:12px;border: none;"><b><?php //echo number_format(@$sum_recevable->total_recevable); ?></b></td>
        <td style="font-size:12px;border: none;"><b><?php //echo number_format($sum_income->total_receved); ?></b></td>
        <td style="font-size:12px;border: none;"><b></b></td>
        <td style="font-size:12px;border: none;"><b><?php echo number_format(@$tota_rejesho->total_restration); ?></b></td>
        </tr>
        

</table>
</div>

</div>

</body>
</html>


