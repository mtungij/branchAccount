
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $compdata->comp_name; ?> | CASH TRANSACTION REPORT</title>
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
        <?php //$day = date("d-m-Y"); ?>
        </p>
         <p style="font-size:12px;text-align:center;">BRANCH LIST</p>

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
    <th style="font-size:12px;border: none;">Branch Region</th>
    <th style="font-size:12px;border: none;">Branch Phone Number</th>
  </tr>
   <?php $no = 1; ?>
  <?php foreach ($blanch as $blanchs): ?>
  
 <tr>
    <td style="font-size:12px;border: none;" class="c"><?php echo $no++; ?>.</td>
    <td style="font-size:12px;border: none;" class="c"><?php echo $blanchs->blanch_name; ?></td>
    <td style="font-size:12px;border: none;" class="c">
      <?php echo $blanchs->region_name; ?>
      </td>
       <td style="font-size:12px;border: none;" class="c">
      <?php echo $blanchs->blanch_no; ?>
      </td>
  </tr>
 <?php endforeach; ?>
 

</table>
  </div>

</div>

</body>
</html>




