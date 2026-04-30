
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $compdata->comp_name; ?> |LOAN COLLECTIONS REPORT
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


<div style="width: 20%;">
<img src="<?php echo base_url().'assets/img/'.$compdata->comp_logo ?>" style="width: 100px;height: 80px;">
</div> 

</td>
<td style="border: none">
<div class="pull">
<p style="font-size:14px;" class="c"><b> <?php echo $compdata->comp_name; ?></b><br>
<b><?php echo $compdata->adress; ?></b> <br>
<?php //$day = date("d-m-Y"); ?>
</p>
<p style="font-size:12px;text-align:center;" class="c"><?php echo $data_blanch->blanch_name ?> - LOAN COLLECTIONS REPORT <?php //echo $day; ?></p>

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
    <th style="font-size:13px;border: none;">S/No.</th>
     <th style="font-size:13px;border: none;">Customer Name</th>
    <th style="font-size:13px;border: none;">Employee</th>
    <th style="font-size:13px;border: none;">Loan Amount</th>
    <th style="font-size:13px;border: none;">Collection</th>
    <th style="font-size:13px;border: none;">Paid Amount</th>
    <th style="font-size:13px;border: none;">Remain Amount</th>
    <th style="font-size:13px;border: none;">Penart Amount</th>
    <th style="font-size:13px;border: none;">End Date</th>
    <th style="font-size:13px;border: none;">Status</th>
  </tr>
   <?php $no = 1; ?>
  <?php foreach ($data_collection as $loan_collections): ?>
 <tr>
    <td style="font-size:12px;border: none;" class="c"><?php echo $no++; ?>.</td>
    <td style="font-size:12px;border: none;" class="c"><?php echo $loan_collections->f_name; ?> <?php echo $loan_collections->m_name; ?> <?php echo $loan_collections->l_name; ?></td>
    <td style="font-size:12px;border: none;" class="c">
     <?php if ($loan_collections->username == TRUE) {
                       ?>
                       <?php echo $loan_collections->username; ?> 
                    <?php }else{ ?>
                      Admin
                      <?php } ?>
      </td>
    <td style="font-size:12px;border: none;" class="c"><?php echo number_format($loan_collections->loan_int); ?></td>
    <td style="font-size:12px;border: none;"><?php echo number_format($loan_collections->restration); ?></td>
    <td style="font-size:12px;border: none;">
      <?php echo number_format($loan_collections->total_depost); ?>
    </td>
     
    <td style="font-size:12px;border: none;">
        <?php if ($loan_collections->total_depost > $loan_collections->loan_int) {
        ?>
        0
      <?php  }else{ ?>
      <?php echo number_format($loan_collections->loan_int - $loan_collections->total_depost); ?>
         <?php } ?>
       
    </td>
    <td style="font-size:12px;border: none;">
     <?php if ($loan_collections->penart_paid > $loan_collections->total_penart_amount) {
     ?>
     0 
   <?php  }else{ ?>
      <?php echo number_format($loan_collections->total_penart_amount - $loan_collections->penart_paid); ?>
     <?php } ?>
      </td>
    <td style="font-size:12px;border: none;"><?php echo substr($loan_collections->loan_end_date, 0,10); ?></td>
    <td style="font-size:12px;border: none;"><?php if ($loan_collections->loan_status == 'open') {
                       ?>
                      <a href="javascript:;" class="badge badge-warning">Pending</a>
                      <?php }elseif($loan_collections->loan_status == 'aproved'){ ?>
                                      Aproved
                        <?php }elseif($loan_collections->loan_status == 'withdrawal'){ ?>
                                      Active
                          <?php }elseif($loan_collections->loan_status == 'done'){ ?>
                          Done
                            <?php }elseif ($loan_collections->loan_status == 'out') { ?>
                       Default
                              
                            <?php }elseif($loan_collections->loan_status == 'disbarsed'){ ?> 
                         Disbursed                              <?php } ?>
                            </td>
  </tr>
 <?php endforeach; ?>
<tr>
    
    <td style="font-size:12px;border: none;" class="c">TOTAL</td>
    <td style="font-size:12px;border: none;" class="c">
       
      </td>
      <td style="font-size:12px;border: none;" class="c">
       
      </td>
    <td style="font-size:12px;border: none;" class="c"><b><?php echo number_format($total_loans->total_loan); ?></b></td>
    <td style="font-size:12px;border: none;"><?php //echo $customers->date_birth; ?></td>
    <td style="font-size:12px;border: none;"><b>
      <?php if ($loan_paid->total_loan_depost > $total_loans->total_loan) {
       ?>
       <?php echo number_format($total_loans->total_loan); ?> <b style="color:red;">(<?php echo number_format($loan_paid->total_loan_depost - $total_loans->total_loan); ?>)</b>
     <?php }else{ ?>
      <?php echo number_format($loan_paid->total_loan_depost); ?>
        <?php } ?>
      </b></td>
    <td style="font-size:12px;border: none;"><b>
      <?php if ($loan_paid->total_loan_depost > $total_loans->total_loan) {
       ?>
       0 <b style="color:red;">(<?php echo $loan_paid->total_loan_depost - $total_loans->total_loan ?>)</b>
     <?php }else{ ?>
      <?php echo number_format($total_loans->total_loan - $loan_paid->total_loan_depost); ?>
    <?php } ?>
      </b>
    </td>
    <td style="font-size:12px;border: none;"><b>
      <?php if ($paid_penart->total_penart_paid > $penart_amounts->penart_amount) {
       ?>
      0 <b style="color:red;">(<?php echo number_format($paid_penart->total_penart_paid -$penart_amounts->penart_amount); ?>)</b>
     <?php }else{ ?>
      <?php echo number_format($penart_amounts->penart_amount - $paid_penart->total_penart_paid); ?>
      <?php } ?>  
      </b>
    </td>
    <td style="font-size:12px;border: none;"><?php //echo $customers->district; ?></td>
    <td style="font-size:12px;border: none;"><?php //echo $customers->ward; ?></td>
  </tr>

</table>

  </div>

</div>

</body>
</html>




