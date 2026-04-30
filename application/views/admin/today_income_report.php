


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
$company_name = "NACK CREDIT LIMITED";
$company_phone = "+255 753 979 112";
$today = date('d-m-Y'); // Format: day-month-year
?>

<!-- Company Header -->
<div class="company-header">
    <h2><?= htmlspecialchars($company_name) ?></h2>
    <p>Phone: <?= htmlspecialchars($company_phone) ?></p>
</div>

<!-- Report Title -->
<h3 style="text-align: center; margin-top: 30px;">FAINI REPORT</h3>

<!-- Report Date -->
<p style="text-align: center; font-weight: bold;">Tarehe: <?= $today ?></p>

<!-- Table -->

  <table>
    <thead>
        <tr>
            <th>Customer Name</th>
            <th>Income Type</th>
            <th>Income Amount</th>
            <th>Staff</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
<?php
    // Group incomes by branch_code
    $branches = [];
    foreach ($detail_income as $income) {
        $branch_code = $income->branch_code ?? 'Unknown'; // Use branch_code here
        if (!isset($branches[$branch_code])) {
            $branches[$branch_code] = [];
        }
        $branches[$branch_code][] = $income;
    }
?>

<?php foreach ($branches as $branch_code => $incomes): ?>
    <!-- Branch Header -->
    <tr style="background-color:#ddd; font-weight:bold;">
    <td colspan="5"><b>Branch Code: <?= htmlspecialchars(strtoupper($branch_code)) ?></b></td>
</tr>


    <?php $branch_total = 0; ?>
    <?php foreach ($incomes as $income): ?>
        <tr>
            <td><?= htmlspecialchars($income->f_name . ' ' . $income->m_name . ' ' . $income->l_name) ?></td>
            <td><?= htmlspecialchars($income->inc_name) ?></td>
            <td><?= number_format($income->receve_amount) ?></td>
            <td><?= htmlspecialchars($income->empl) ?></td>
            <td><?= htmlspecialchars($income->receve_day) ?></td>
        </tr>
        <?php $branch_total += $income->receve_amount; ?>
    <?php endforeach; ?>

    <!-- Branch Total -->
    <tr style="background-color:#ccc; font-weight:bold;">
        <td colspan="2">TOTAL <?= htmlspecialchars(strtoupper($branch_code)) ?></td>
        <td><?= number_format($branch_total) ?></td>
        <td colspan="2"></td>
    </tr>
<?php endforeach; ?>
</tbody>

</table>


<br><br>

<!-- ✅ Depositor Summary Section -->
<?php if (!empty($lazo['details'])): ?>
    <h3>MHUTASARI WA MALIPO</h3>
    <table border="1" cellpadding="6" cellspacing="0">
        <thead>
            <tr>
                <th>S/No</th>
                <th>DEPOSITOR</th>
                <th>Jumla ya Deposit (TSh)</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $depositor_summary = [];

                foreach ($lazo['details'] as $item) {
                    $username = $item->depositor_username ?? '';

                    if (!empty($username)) {
                        if (!isset($depositor_summary[$username])) {
                            $depositor_summary[$username] = 0;
                        }
                        $depositor_summary[$username] += $item->depost;
                    }
                }

                if (!empty($depositor_summary)):
                    $sn = 1;
                    foreach ($depositor_summary as $username => $sum_depost):
            ?>
                <tr>
                    <td><b><?= $sn++ ?>.</b></td>
                    <td><b><?= htmlspecialchars(strtoupper($username)) ?></b></td>
                    <td><b><?= number_format($sum_depost) ?></b></td>
                </tr>
            <?php endforeach; else: ?>
                <tr>
                    <td colspan="3" style="text-align: center;">Hakuna walio deposit leo.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
<?php endif; ?>

    


</body>
</html>


