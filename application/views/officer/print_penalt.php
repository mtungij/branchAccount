


 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title><?= htmlspecialchars($company_data->comp_name) ?> - PENALT REPAYMENT REPORT</title>
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
$company_name =  $company_data->comp_name;
$company_address = $company_data->adress;
$company_email = $company_data->comp_email;
$company_phone = $company_data->comp_phone;
$logo_path = FCPATH . 'assets/img/cdclogo.png';
$logo_url = 'file://' . $logo_path;
?>

<!-- Company Header -->
<div class="company-header">
    
     <!-- <img src="<?= $logo_url ?>" alt="Company Logo" style="max-height: 100px; width: auto;" /> -->

    <h2><?= strtoupper(htmlspecialchars($company_name)) ?></h2>
    <p><?= htmlspecialchars($company_address) ?></p>
    <p>Email: <?= htmlspecialchars($company_email) ?> | Phone: <?= htmlspecialchars($company_phone) ?></p>
</div>

<!-- Report Title -->
<h3 style="text-align: center; margin-top: 30px;">PENALT REPAYMENT REPORT</h3>

<!-- Table -->
<table>
    <thead>
        <tr>
            <th>S/No</th>
            <th>Customer Name</th>
            <th>Phone Number</th>
            <th>Branch</th>
            <th>Income Type</th>
            <th>Income Amount</th>
            <th>Received By</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
<?php
$no = 1;
$total_amount = 0;
foreach ($detail_income as $item): 
    $total_amount += $item->receve_amount; ?>
    <tr>
        <td><?= $no++ ?>.</td>
        <td><?= strtoupper(htmlspecialchars($item->f_name . ' ' . $item->m_name . ' ' . $item->l_name)) ?></td>
        <td><?= strtoupper(htmlspecialchars($item->phone_no)) ?></td>
        <td><?= strtoupper(htmlspecialchars($item->blanch_name)) ?></td>
        <td><?= strtoupper(htmlspecialchars($item->inc_name)) ?></td>
        <td><?= number_format($item->receve_amount) ?></td>
        <td><?= strtoupper(htmlspecialchars($item->empl)) ?></td>
        <td><?= htmlspecialchars($item->receve_date) ?></td>
    </tr>
<?php endforeach; ?>

    <!-- Totals Row -->
    <tr class="total-row">
        <td colspan="5"><b>JUMLA</b></td>
        <td><b><?= number_format($total_amount) ?></b></td>
        <td colspan="2"></td>
    </tr>
    </tbody>
</table>

</body>
</html>
