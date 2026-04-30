
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $compdata->comp_name; ?> | LOAN PENDING</title>
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
         <p style="font-size:12px;text-align:center;" class="c"><?php echo $blanch->blanch_name ?> - LOAN PENDING / From: <?php echo $from; ?> To: <?php echo $to; ?></p>

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
    <th style="font-size:12px;border: none;">Branch Name</th>
    <th style="font-size:12px;border: none;">Customer Name</th>
    <th style="font-size:12px;border: none;">Phone number</th>
    <th style="font-size:12px;border: none;">Loan Amount </th>
    <th style="font-size:12px;border: none;">Duration Type</th>
    <th style="font-size:12px;border: none;">Pending Amount</th>
    <th style="font-size:12px;border: none;">Date</th>
  </tr>
       <?php echo $no = 1; ?>
  <?php foreach ($loan_pend as $loan_pends): ?>
    
 
 <tr>
  
    <td style="font-size:12px;border: none;" class="c"> <?php echo $no++; ?></td>
    <td style="font-size:12px;border: none;" class="c"><?php echo $loan_pends->blanch_name; ?>
    
      </td>
    <td style="font-size:12px;border: none;" class="c">
       <?php echo $loan_pends->f_name; ?> <?php echo $loan_pends->m_name; ?> <?php echo $loan_pends->l_name; ?>
        
      </td>
    <td style="font-size:12px;border: none;" class="c"><?php echo $loan_pends->phone_no; ?></td>
    <td style="font-size:12px;border: none;"><?php echo number_format($loan_pends->total_loan); ?></td>
    
    <td style="font-size:12px;border: none;">
      <?php if($loan_pends->return_day == '1'){ ?>
                        <?php echo "Daily"; ?>
                      <?php //echo $loan_pends->return_day; ?>
                      <?php }elseif ($loan_pends->return_day == '7'){
                        echo "Weekly";
                       ?>
                       <?php }elseif ($loan_pends->return_day == '30' || $loan_pends->return_day == '31' || $loan_pends->return_day == '29' || $loan_pends->return_day == '28') {
                        echo "Monthly";
                        ?>
                        <?php } ?>
    </td>
    <td style="font-size:12px;border: none;"><?php echo round($loan_pends->return_total,2); ?></td>
    <td style="font-size:12px;border: none;"><?php echo $loan_pends->pend_date; ?></td>
    
  </tr>
 <?php endforeach; ?>
 <tr>
   <td style="font-size:12px;border: none;" class="c"><b>total</b></td>
   <td style="font-size:12px;border: none;" class="c"><b><?php //echo number_format($total_loan->loan_interest); ?></b></td>
   <td style="font-size:12px;border: none;" class="c"><b><?php //echo number_format($total_allblanch->total_depost); ?></b></td>
   <td style="font-size:12px;border: none;" class="c"><b><?php //echo number_format($total_loanAprove->aprovedLoan); ?></b></td>
   <td style="font-size:12px;border: none;"><b><?php //echo number_format($total_loan_int->loan_interestData - $total_loanAprove->aprovedLoan) ?></b></td>
   <td style="font-size:12px;border: none;"><b><?php //echo number_format($total_loan_int->loan_interestData); ?></b></td>
   <td style="font-size:12px;border: none;"><b><?php echo number_format($pend->total_pending); ?></b></td>
   <td style="font-size:12px;border: none;"></td>
 </tr>

</table>
  </div>

</div>

</body>
</html>




