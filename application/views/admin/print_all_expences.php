
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $compdata->comp_name; ?> | EXPENCES REPORT</title>
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
<p style="font-size:12px;text-align:center;" class="c"><?php //echo $blanch->blanch_name ?>EXPENCES REPORT</p>

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
<th style="font-size:15px;">Branch Name</th>
<th style="font-size:15px;">Expenses</th>
<th style="font-size:15px;;">Amount</th>
<th style="font-size:15px;">Description</th>
<th style="font-size:15px;">From Branch Account</th>
<th style="font-size:15px;">Date</th>
</tr>
</thead>

                     <?php foreach ($blanch_comp_exp as $blanch_comp_exps): ?>
                          <tr>
                        <td style="font-size:13px;" class="c">
                            <?php if ($blanch_comp_exps->blanch_name == TRUE) {
                            ?>
                            <?php  echo $blanch_comp_exps->blanch_name; ?>
                        <?php  }else{ ?>
                            Admin Expenses
                        <?php }  ?>
                                
                            </td>
                         <td style="font-size:13px;" class="c"><?php  //echo $data_recods->ex_name; ?></td>
                         <td style="font-size:13px;"> <?php  //echo number_format($data_recods->req_amount); ?></td>
                         <td style="font-size:13px;">
                             <?php  //echo $data_recods->req_description; ?>
                         </td>
                          <td style="font-size:13px;">
                        <?php  //echo $data_recods->account_name; ?>
                         </td>
                         <td style="font-size:13px;"> <?php  //echo $data_recods->req_date; ?></td>
                        
                        </tr>


                        <?php 
                        $blanch_expenses = $this->queries->get_blanch_expenses_data_request($blanch_comp_exps->blanch_id);
                         ?>
                         <?php foreach ($blanch_expenses as $blanch_expensesy): ?>
                        <tr>
                        <td style="font-size:13px;" class="c">
                         
                                
                            </td>
                         <td style="font-size:13px;" class="c"><?php  echo $blanch_expensesy->ex_name; ?></td>
                         <td style="font-size:13px;"> <?php  echo number_format($blanch_expensesy->req_amount); ?></td>
                         <td style="font-size:13px;">
                             <?php  echo $blanch_expensesy->req_description; ?>
                         </td>
                          <td style="font-size:13px;">
                        <?php  echo $blanch_expensesy->account_name; ?>
                         </td>
                         <td style="font-size:13px;"> <?php  echo $blanch_expensesy->req_date; ?></td>
                        
                        </tr>

                      

                        <?php endforeach; ?>
                        <?php $total_exp = $this->queries->get_sumBlanch_data($blanch_comp_exps->blanch_id); ?>
                        <?php foreach ($total_exp as $total_exps): ?>
                          <tr>
                        <td style="font-size:13px;" class="c"><b>BRANCH TOTAL</b></td>
                         <td style="font-size:13px;" class="c"><?php  //echo $blanch_expensesy->ex_name; ?></td>
                         <td style="font-size:13px;"><b> <?php  echo number_format($total_exps->total_blanch_exp); ?></b></td>
                         <td style="font-size:13px;">
                             <?php  //echo $blanch_expensesy->req_description; ?>
                         </td>
                          <td style="font-size:13px;">
                        <?php  //echo $blanch_expensesy->account_name; ?>
                         </td>
                         <td style="font-size:13px;"> <?php  //echo $blanch_expensesy->req_date; ?></td>
                        
                        </tr>
                        <?php endforeach; ?>

                  <?php endforeach; ?>
                            </tbody>
          <?php $comp_expdata = $this->queries->get_total_comp_exp($blanch_comp_exps->comp_id); ?>
            <tr>
        <td style="font-size:13px;"><?php //echo substr(@$pay_customers->pay_day, 0,10); ?><b>TOTAL</b></td>
        <td style="font-size:13px;">  </td>
        <td style="font-size:13px;"><b><?php echo number_format($comp_expdata->total_comp_exp); ?></b></td>
        <td style="font-size:13px;"><b><?php //echo number_format($sum_income->total_receved); ?></b></td>
        <td style="font-size:13px;"><b><?php //echo number_format(@$sum_penart->total_penart); ?></b></td>
        <td style="font-size:13px;"><b><?php //echo number_format(@$sum_penart->total_penart); ?></b></td>
        
        </tr>
        

</table>
<p style="text-align: center;">Expenses Summary</p>
<table>
    <thead>
<tr>
<th style="font-size:15px;">S/No.</th>
<th style="font-size:15px;">Expenses Name</th>
<th style="font-size:15px;;">Amount</th>
</tr>
</thead>
                           <?php $no = 1; ?>
                     <?php foreach ($data_exp_category as $data_exp_categorys): ?>
                          <tr>
                         <td style="font-size:13px;" class="c"><?php echo $no++; ?>.</td>
                         <td style="font-size:13px;" class="c"><?php  echo $data_exp_categorys->ex_name; ?></td>
                         <td style="font-size:13px;"> <?php  echo number_format($data_exp_categorys->total_exp_category); ?></td>
                        
                        </tr>

                  <?php endforeach; ?>
                            </tbody>
</table>
</div>

</div>

</body>
</html>




