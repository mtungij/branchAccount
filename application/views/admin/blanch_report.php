

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
 <img src="<?= FCPATH.'assets/img/logo.jpeg' ?>" 
     style="width:100px;height:80px; transform: rotate(270deg); transform-origin: top left;">


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
    <th style="font-size:12px;border: none;">JINA LA TAWI</th>
    <th style="font-size:12px;border: none;">CODE YA TAWI</th>
      <th style="font-size:12px;border: none;">NAMBARI YA SIMU</th>
    <th style="font-size:12px;border: none;">MKOA</th>
  
  </tr>
<?php $no = 1; ?>
<?php foreach ($branches_by_region as $region => $branches): ?>
    <tr>
        <td colspan="5" style="font-weight:bold; background-color:#eee; text-align:center;">
            <?= strtoupper(htmlspecialchars($region)) ?>
        </td>
    </tr>
    <?php foreach ($branches as $blanchs): ?>
        <tr>
            <td><?= $no++ ?>.</td>
            <td><?= strtoupper(htmlspecialchars($blanchs->blanch_name)) ?></td>
            <td><?= strtoupper(htmlspecialchars($blanchs->branch_code)) ?></td>
            <td><?= strtoupper(htmlspecialchars($blanchs->blanch_no)) ?></td>
            <td><?= strtoupper(htmlspecialchars($blanchs->region_name)) ?></td>
        </tr>
    <?php endforeach; ?>
<?php endforeach; ?>

 

</table>
  </div>

</div>

</body>
</html>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title><?= htmlspecialchars($comp_data->comp_name) ?> - Cash Transaction</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 6px 8px;
            text-align: left;
        }
        th {
            background-color: #00bcd4;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .total-row {
            background-color: #ddd;
            font-weight: bold;
        }
        .company-header {
            text-align: center;
            margin-top: 20px;
        }
        .company-header img {
            max-height: 80px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<?php 
$company_name = "CDC MICROFINANCE LIMITED";
$company_address = "Anglicana Street, TARIME, Tanzania";
$company_email = "cdcmicrofinance@gmail.com";
$company_phone = "+255 763 727 272";
$logo_path = FCPATH . 'assets/img/cdclogo.png';
$logo_url = 'file://' . $logo_path;


?>
    <!-- Company Header -->
    <div class="company-header">
    <div style="text-align: center;">
    <img src="<?= $logo_url ?>" alt="Company Logo" style="max-height: 100px; width: auto;" />
</div>

        <h2><?= htmlspecialchars($company_name) ?></h2>
        <p><?= htmlspecialchars($company_address) ?></p>
        <p>Email: <?= htmlspecialchars($company_email) ?> | Phone: <?= htmlspecialchars($company_phone) ?></p>
    </div>

    <!-- Report Title -->
    <h3 style="text-align: center; margin-top: 30px;">CASH TRANSANCTION REPORT</h3>

    <!-- Table -->
    <table>
    <thead>
        <tr>
            <th>S/No</th>
            <th>Jina La Tawi</th>
            <th>Code Ya Tawi</th>
            <th>Namba Ya Simu</th>
            <th>Mkoa</th>
        </tr>
    </thead>
    <tbody>
   <?php $no = 1; ?>
  <?php foreach ($blanch as $blanchs): ?>          
            <tr>
                <td><?= $no++ ?>.</td>
                <td><?= strtoupper(htmlspecialchars($blanchs->blanch_name)) ?></td>
                <td><?= strtoupper(htmlspecialchars($blanchs->branch_code)) ?></td>
                <td><?= strtoupper(htmlspecialchars($blanchs->blanch_phone)) ?></td>
                <td><?= strtoupper(htmlspecialchars($blanchs->region)) ?></td>
            </tr>
        <?php endforeach; ?>
        
    </tbody>
</table>

<br><br>


    

</body>
</html>





