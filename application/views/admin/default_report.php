
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $compdata->comp_name; ?> | DEFAULT LOANS</title>
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
<p style="font-size:14px;" class="c"><b> <?php echo $compdata->comp_name; ?></b><br>
<b><?php echo $compdata->adress; ?></b> <br>
<?php $day = date("d-m-Y"); ?>
</p>

<p style="font-size:12px;text-align:center;" class="c"> 
  <?php if ($empl_data == FALSE) {
    echo "ALL EMPLOYEE";
  }else{
   echo $empl_data->empl_name; 
  } ?>

   / OUTSTAND LOAN</p>

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

<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                       <thead>
                              <tr>
                            <th>S/No.</th>
                            <th>Branch Name</th>
                        <th>Customer Name</th>
                        <th>Phone Number</th>
                        <th>Loan Amount</th>
                        <th>Restoration</th>
                        <th>Duration Type</th>
                        <th>Number of Repayment</th>
                        <th>Remain Amount</th>
                        <th>pending Day</th>
                        <th>Satart date</th>
                        <th>End date</th>
                               </tr>
                              </thead>
      
                    <tbody>
                                          <?php $no = 1; ?>
                  <?php foreach ($out_empl as $outstands): ?>
                            <tr>
                    <td class="c"><?php echo $no++; ?> </td>
                    <td class="c">
                       <?php echo $outstands->blanch_name; ?>
                    </td>
                    <td class="c">
                      <?php echo $outstands->f_name; ?> <?php echo $outstands->m_name; ?> <?php echo $outstands->l_name; ?>
                    </td>
                    <td><?php echo $outstands->phone_no; ?></td>
                    <td><?php echo number_format($outstands->loan_int); ?></td> 
                    <td><?php echo number_format($outstands->restration); ?></td> 
                    <td>
                      
                      <?php if($outstands->day == '1'){ ?>
                        <?php echo "Daily"; ?>
                      
                      <?php }elseif ($outstands->day == '7'){
                        echo "Weekly";
                       ?>
                       <?php }elseif ($outstands->day == '30' || $outstands->day == '31' || $outstands->day == '29' || $outstands->day == '28') {
                        echo "Monthly";
                        ?>
                        <?php } ?>  
                      </td> 
                     
                
                <td><?php echo $outstands->session; ?></td> 
                <td><?php echo number_format($outstands->remain_amount); ?></td> 
                <td style="color:red;"><?php echo $outstands->pending_day; ?></td> 
                <td><?php echo $outstands->loan_stat_date; ?></td> 
                <td><?php echo substr($outstands->loan_end_date, 0,10); ?></td> 
                
                                                                  
                                   </tr>
                      <?php endforeach; ?>
                  
                  </tbody>
                  <tfoot>
                     <tr>
                    <th>TOTAL</th>
          <th></th>
          <th><?php //echo number_format($sum_depost->cash_depost); ?></th>
          <th><?php //echo number_format($sum_withdrawls->cash_withdrowal); ?></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th><?php echo number_format($total_out->total_out); ?></th>
          <th><?php //echo number_format($pend->total_pending); ?></th>
          <th><?php //echo number_format($pend->total_pending); ?></th>
          <th><?php //echo number_format($pend->total_pending); ?></th>
          
                    </tr> 
                   </tfoot>
                   </table>


</div>

</div>

</body>
</html>




