


 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title><?= htmlspecialchars($company_data->comp_name) ?> - PROCESSING FEE REPAYMENT REPORT</title>
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
<h3 style="text-align: center; margin-top: 30px;">FEE REPAYMENT REPORT</h3>

<!-- Table -->
<table>
    <thead>
    <tr>
        <th>S/No</th>
        <th>Customer Name</th>
        <th>Phone Number</th>
        <th>Loan Amount</th>
        <th>Rejesho</th>
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

// Jumla kwa kila kipengele
$total_loan     = 0;
$total_rejesho  = 0;
$total_income   = 0;

foreach ($deducted_data as $item): 
    $total_loan    += $item->how_loan;
    $total_rejesho += $item->restration;
    $total_income  += $item->deducted_balance;
?>
    <tr>
        <td><?= $no++ ?>.</td>
        <td><?= strtoupper(htmlspecialchars($item->f_name . ' ' . $item->m_name . ' ' . $item->l_name)) ?></td>
        <td><?= strtoupper(htmlspecialchars($item->phone_no)) ?></td>
        <td><?= number_format($item->how_loan) ?></td>
        <td><?= number_format($item->restration) ?></td>
        <td><?= strtoupper(htmlspecialchars($item->blanch_name)) ?></td>
        <td><?= strtoupper(htmlspecialchars('FORM')) ?></td>
        <td><?= number_format($item->deducted_balance) ?></td>
        <td><?= strtoupper(htmlspecialchars('System Deducted')) ?></td>
        <td><?= htmlspecialchars($item->deducted_date) ?></td>
    </tr>
<?php endforeach; ?>

<!-- Totals Row -->
<tr class="total-row" style="font-weight:bold; background:#f3f4f6;">
    <td colspan="3" align="right"><b>JUMLA:</b></td>
    <td><b><?= number_format($total_loan) ?></b></td>
    <td><b><?= number_format($total_rejesho) ?></b></td>
    <td></td>
    <td></td>
    <td><b><?= number_format($total_income) ?></b></td>
    <td colspan="2"></td>
</tr>
</tbody>

</table>

</body>
</html>
