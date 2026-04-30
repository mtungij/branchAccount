<?php
$today_recevable = !empty($today_recevable) ? $today_recevable : array();
$report_date = date('Y-m-d');
$total_rejesho = isset($rejesho->total_rejesho) ? (float) $rejesho->total_rejesho : 0;

$companyName = isset($compdata->comp_name) ? $compdata->comp_name : '';
$companyAddress = isset($compdata->adress) ? $compdata->adress : '';
$companyPhone = isset($compdata->phone_no) ? $compdata->phone_no : '';
$companyLogo = isset($compdata->comp_logo) ? $compdata->comp_logo : '';

$logo_url = '';
if (!empty($companyLogo) && file_exists(FCPATH . 'assets/images/company_logo/' . $companyLogo)) {
    $logo_url = 'file://' . FCPATH . 'assets/images/company_logo/' . $companyLogo;
} elseif (!empty($companyLogo) && file_exists(FCPATH . 'assets/img/' . $companyLogo)) {
    $logo_url = 'file://' . FCPATH . 'assets/img/' . $companyLogo;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo htmlspecialchars($companyName); ?> | RIPOTI YA MAKUSANYO YA LEO</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            color: #1f2937;
            font-size: 11px;
        }

        .page {
            border: 1.5px solid #06b6d4;
            border-radius: 10px;
            padding: 16px;
        }

        .header-table,
        .report-table {
            width: 100%;
            border-collapse: collapse;
        }

        .header-table td {
            border: none;
            vertical-align: middle;
        }

        .logo-cell {
            width: 86px;
            text-align: center;
            padding-right: 10px;
        }

        .logo-cell img {
            max-height: 72px;
            max-width: 78px;
            border: 1px solid #a5f3fc;
            border-radius: 8px;
            padding: 4px;
            background: #ecfeff;
        }

        .report-title {
            font-size: 17px;
            font-weight: bold;
            color: #0891b2;
            margin: 0 0 4px 0;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .company-name {
            font-size: 15px;
            font-weight: bold;
            color: #0f172a;
            text-transform: uppercase;
            margin: 0 0 2px 0;
        }

        .company-meta {
            font-size: 11px;
            color: #475569;
            margin: 0;
        }

        .divider {
            border: none;
            border-top: 2px solid #06b6d4;
            margin: 10px 0 12px;
        }

        .report-table th {
            background: #0891b2;
            color: #ffffff;
            border: 1px solid #06b6d4;
            padding: 7px 6px;
            text-align: left;
            font-size: 10px;
            text-transform: uppercase;
        }

        .report-table td {
            border: 1px solid #a5f3fc;
            padding: 6px;
            vertical-align: top;
            font-size: 10.5px;
        }

        .report-table tbody tr:nth-child(even) {
            background: #ecfeff;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .total-row td {
            font-weight: bold;
            background: #cffafe;
            color: #0e7490;
        }

        .empty-state {
            margin-top: 12px;
            border: 1px solid #a5f3fc;
            background: #ecfeff;
            padding: 10px;
            color: #0e7490;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="page">
    <table class="header-table">
        <tr>
            <?php if (!empty($logo_url)): ?>
                <td class="logo-cell">
                    <img src="<?php echo $logo_url; ?>" alt="Company Logo">
                </td>
            <?php endif; ?>
            <td>
                <p class="report-title">Ripoti ya Makusanyo ya Leo</p>
                <p class="company-name"><?php echo htmlspecialchars($companyName); ?></p>
                <?php if (!empty($companyAddress)): ?>
                    <p class="company-meta"><?php echo htmlspecialchars($companyAddress); ?></p>
                <?php endif; ?>
                <?php if (!empty($companyPhone)): ?>
                    <p class="company-meta"><?php echo htmlspecialchars($companyPhone); ?></p>
                <?php endif; ?>
                <p class="company-meta">Imetolewa: <?php echo date('d M Y'); ?></p>
            </td>
        </tr>
    </table>

    <hr class="divider">

    <?php if (!empty($today_recevable)): ?>
        <table class="report-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Jina la Mteja</th>
                    <th>Tawi</th>
                    <th>Namba ya Simu</th>
                    <th>Aina ya Muda</th>
                    <th>Kiasi cha Mkopo</th>
                    <th>Kiasi cha Makusanyo</th>
                    <th>Mfanyakazi</th>
                    <th>Tarehe</th>
                </tr>
            </thead>
            <tbody>
                <?php $index = 1; ?>
                <?php foreach ($today_recevable as $row): ?>
                    <?php
                    $duration = 'Hakuna';
                    if ((int) $row->day === 1) {
                        $duration = 'Kila siku';
                    } elseif ((int) $row->day === 7) {
                        $duration = 'Kila wiki';
                    } elseif (in_array((int) $row->day, array(28, 29, 30, 31), true)) {
                        $duration = 'Kila mwezi';
                    }
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $index++; ?></td>
                        <td><?php echo htmlspecialchars(trim($row->f_name . ' ' . $row->m_name . ' ' . $row->l_name)); ?></td>
                        <td><?php echo htmlspecialchars($row->blanch_name); ?></td>
                        <td><?php echo htmlspecialchars($row->phone_no); ?></td>
                        <td><?php echo $duration; ?></td>
                        <td class="text-right"><?php echo number_format((float) $row->loan_int); ?></td>
                        <td class="text-right"><?php echo number_format((float) $row->restration); ?></td>
                        <td><?php echo htmlspecialchars($row->empl_name); ?></td>
                        <td><?php echo htmlspecialchars($row->date_show); ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr class="total-row">
                    <td colspan="6">JUMLA YA MAKUSANYO</td>
                    <td class="text-right"><?php echo number_format($total_rejesho); ?></td>
                    <td colspan="2"></td>
                </tr>
            </tbody>
        </table>
    <?php else: ?>
        <div class="empty-state">Hakuna rekodi za makusanyo zilizopatikana kwa leo.</div>
    <?php endif; ?>
</div>
</body>
</html>
