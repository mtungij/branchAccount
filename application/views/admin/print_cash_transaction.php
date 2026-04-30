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
            <th>Jina La Mteja</th>
            <th>Afisa</th>
            <th>Namba Ya Simu</th>
            <th>Mkopo</th>
            <th>Status</th>
            <th>Product</th>
            <th>Muda</th>
            <th>Rejesho</th>
            <th>Lipwa</th>
            <th>Laza</th>
            <th>Zidi</th>
            <th>Depositor</th>
            <th>Tarehe</th>
        </tr>
    </thead>
    <tbody>
    <?php if (!empty($lazo['details'])): ?>
        <?php
            $no = 1;
            $total_restration = 0;
            $total_depost = 0;
            $total_laza = 0;
            $total_zidi = 0;
        ?>
        <?php foreach ($lazo['details'] as $item): ?>
            <?php
                $laza = 0;
                $zidi = 0;

                if ($item->depost < $item->restration) {
                    $laza = $item->restration - $item->depost;
                } elseif ($item->depost > $item->restration) {
                    $zidi = $item->depost - $item->restration;
                }

                $total_restration += $item->restration;
                $total_depost += $item->depost;
                $total_laza += $laza;
                $total_zidi += $zidi;
            ?>           
            <tr>
                <td><?= $no++ ?>.</td>
                <td><?= strtoupper(htmlspecialchars($item->full_name)) ?></td>
                <td><?= strtoupper(htmlspecialchars($item->empl_name)) ?></td>
                <td>
                    <?php 
                        $phone = $item->phone_no;
                        if (strpos($phone, '255') === 0) {
                            $phone = '0' . substr($phone, 3);
                        }
                        echo htmlspecialchars($phone);
                    ?>
                </td>
                <td><?= number_format($item->loan_amount) ?></td>
                <td>
                    <?php 
                        if ($item->loan_status == 'withdrawal') {
                            echo '<span style="color: green;">Active</span>';
                        } elseif ($item->loan_status == 'out') {
                            echo '<span style="color: red;">Default</span>';
                        } else {
                            echo '<span style="color: orange;">disbursed</span>';
                        }
                    ?>
                </td>
                <td><?= htmlspecialchars($item->loan_name) ?></td>
                <td>
                    <?php 
                        if ($item->day == '1') {
                            $frequency = "Siku";
                        } elseif ($item->day == '7') {
                            $frequency = "Wiki";
                        } elseif (in_array($item->day, ['28','29','30','31'])) {
                            $frequency = "Mwezi";
                        } else {
                            $frequency = "Other";
                        }
                        echo $frequency . " (" . htmlspecialchars($item->session) . ")";
                    ?>
                </td>
                <td><?= number_format($item->restration) ?></td>
                <td><?= number_format($item->depost) ?></td>
                <td><?= $laza > 0 ? number_format($laza) : 0 ?></td>
                <td><?= $zidi > 0 ? number_format($zidi) : 0 ?></td>
                <td><?= !empty($item->depositor_username) ? htmlspecialchars($item->depositor_username) : '' ?></td>
                <td><?= htmlspecialchars($item->expected_date) ?></td>
            </tr>
        <?php endforeach; ?>
        <!-- Totals Row -->
        <tr class="total-row">
            <td colspan="2"><b>JUMLA</b></td>
            <td><b></b></td>
            <td><b></b></td>
            <td><b></b></td>
            <td><b></b></td>
            <td><b></b></td>
            <td><b><?= number_format($total_restration) ?></b></td>
            <td><b><?= number_format($total_depost) ?></b></td>
            <td><b><?= number_format($total_laza) ?></b></td>
            <td><b><?= number_format($total_zidi) ?></b></td>
            <td><b></b></td>
        </tr>
    <?php else: ?>
        <tr>
            <td colspan="13" style="text-align: center;">Hakuna taarifa za leo.</td>
        </tr>
    <?php endif; ?>
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

    
<!-- ✅ Summary by Loan Status -->
<h3>MUHTASARI WA MALIPO KWA STATUS</h3>
<table border="1" cellpadding="6" cellspacing="0">
    <thead>
        <tr>
            <th>S/No</th>
            <th>Loan Status</th>
            <th>Idadi ya Wateja</th>
            <th>Jumla ya Lipwa (TSh)</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $status_summary = [];

            foreach ($lazo['details'] as $item) {
                $status = $item->loan_status;

                if (!isset($status_summary[$status])) {
                    $status_summary[$status] = [
                        'count' => 0,
                        'total' => 0
                    ];
                }

                $status_summary[$status]['count'] += 1;
                $status_summary[$status]['total'] += $item->depost;
            }

            $sn = 1;
            if (!empty($status_summary)):
                foreach ($status_summary as $status => $data):
                    // Convert status to human-friendly label
                    if ($status == 'withdrawal') {
                        $status_label = 'Active';
                    } elseif ($status == 'out') {
                        $status_label = 'Default';
                    } else {
                        $status_label = 'Disbursed';
                    }
        ?>
            <tr>
                <td><?= $sn++ ?>.</td>
                <td><?= $status_label ?></td>
                <td><?= $data['count'] ?></td>
                <td><?= number_format($data['total']) ?></td>
            </tr>
        <?php endforeach; else: ?>
            <tr>
                <td colspan="4" style="text-align: center;">Hakuna malipo yaliyopatikana.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>
