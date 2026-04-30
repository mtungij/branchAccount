
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $compdata->comp_name; ?> | TODAY INCOME REPORT</title>
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
<?php $day = date("d-m-Y"); ?>
</p>
<p style="font-size:12px;text-align:center;">TODAY INCOME REPORT <?php echo $day; ?></p>

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
<th style="font-size:12px;border: none;">Income Type</th>
<th style="font-size:12px;border: none;">Income Amount </th>
<th style="font-size:12px;border: none;">User Employee</th>
<th style="font-size:12px;border: none;">Date</th>
</tr>

                     <?php foreach ($detail_income as $detail_incomes): ?>
                          <tr>
                        <td style="font-size:12px;border: none;"><?php  echo $detail_incomes->f_name; ?> <?php  echo $detail_incomes->m_name; ?> <?php  echo $detail_incomes->l_name; ?></td>
                         <td style="font-size:12px;border: none;" class="c"><?php  echo $detail_incomes->blanch_name; ?></td>
                         <td style="font-size:12px;border: none;"> <?php  echo $detail_incomes->inc_name; ?></td>
                         <td style="font-size:12px;border: none;">
                             <?php  echo number_format($detail_incomes->receve_amount); ?>
                         </td>
                         <td style="font-size:12px;border: none;">
                        <?php  echo $detail_incomes->empl; ?>
                         </td>
                         <td style="font-size:12px;border: none;"> <?php  echo $detail_incomes->receve_day; ?></td>
                        </tr>
                  <?php endforeach; ?>
                            </tbody>
          
            <tr>
        <td style="font-size:12px;border: none;"><?php //echo substr(@$pay_customers->pay_day, 0,10); ?><b>TOTAL</b></td>
        <td style="font-size:12px;border: none;">  </td>
        <td style="font-size:12px;border: none;"><b><?php //echo number_format(@$sum_recevable->total_recevable); ?></b></td>
        <td style="font-size:12px;border: none;"><b><?php echo number_format($total_receved->total_receved); ?></b></td>
        <td style="font-size:12px;border: none;"><b><?php //echo number_format(@$sum_penart->total_penart); ?></b></td>
        <td style="font-size:12px;border: none;"><b><?php //echo number_format(@$sum_penart->total_penart); ?></b></td>
        </tr>
        

</table>
</div>

</div>

</body>
</html>




