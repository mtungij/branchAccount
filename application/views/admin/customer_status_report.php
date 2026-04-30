
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $compdata->comp_name; ?> | BRANCH CUSTOMER REPORT </title>
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
<p style="font-size:12px;text-align:center;" class="c"><?php echo $blanch_customer->blanch_name ?> - customer Report <?php //echo $day; ?></p>

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
    <th style="font-size:12px;border: none;">Customer ID</th>
    <th style="font-size:12px;border: none;">Customer Name</th>
    <th style="font-size:12px;border: none;">Phone Number</th>
    <th style="font-size:12px;border: none;">Date Of Birth</th>
    <th style="font-size:12px;border: none;">Sex</th>
    <!-- <th style="font-size:12px;border: none;">Branch</th> -->
    <th style="font-size:12px;border: none;">Region</th>
    <th style="font-size:12px;border: none;">District</th>
    <th style="font-size:12px;border: none;">Ward</th>
    <th style="font-size:12px;border: none;">Street</th>
    <th style="font-size:12px;border: none;">Customer Status</th>
  </tr>
   <?php $no = 1; ?>
  <?php foreach ($customer_statusData as $customers): ?>
    
 
 <tr>
    <td style="font-size:13px;border: none;" class="c"><?php echo $no++; ?>.</td>
    <td style="font-size:13px;border: none;" class="c"><?php echo $customers->customer_code; ?></td>
    <td style="font-size:13px;border: none;" class="c">
      <?php echo $customers->f_name; ?> <?php echo $customers->m_name; ?> <?php echo $customers->l_name; ?> 
      </td>
    <td style="font-size:13px;border: none;" class="c"><?php echo $customers->phone_no; ?></td>
    <td style="font-size:13px;border: none;"><?php echo $customers->date_birth; ?></td>
    <td style="font-size:13px;border: none;"><?php echo $customers->gender; ?></td>
    <!-- <td style="font-size:13px;border: none;"><?php //echo $customers->blanch_name; ?></td> -->
    <td style="font-size:13px;border: none;"><?php echo $customers->region_name; ?></td>
    <td style="font-size:13px;border: none;"><?php echo $customers->district; ?></td>
    <td style="font-size:13px;border: none;"><?php echo $customers->ward; ?></td>
    <td style="font-size:13px;border: none;"><?php echo $customers->street; ?></td>
    <td style="font-size:13px;border: none;">
      <?php if ($customers->customer_status == 'open') {
         ?>
         Active
        <?php }elseif ($customers->customer_status == 'close') {
         ?>
         Closed
         <?php }elseif($customers->customer_status == 'pending'){
          ?>
          Pending
          <?php } ?>
        
      </td>
  </tr>
 <?php endforeach; ?>
 

</table>

  </div>

</div>

</body>
</html>




