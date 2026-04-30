<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8" />
    <title><?php echo htmlspecialchars($compdata->comp_name ?? 'Kampuni'); ?> - Taarifa ya Malipo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .header-wrap {
            border: 1px solid #d6e5ea;
            border-radius: 6px;
            padding: 10px 12px;
            margin-top: 14px;
            margin-bottom: 12px;
            background: #f8fdff;
        }
        .header-table {
            width: 100%;
            border-collapse: collapse;
        }
        .header-table td {
            border: none;
            vertical-align: middle;
            padding: 0;
        }
        .logo-box {
            width: 95px;
            text-align: left;
        }
        .logo-box img {
            max-width: 86px;
            max-height: 72px;
            display: block;
        }
        .company-meta {
            text-align: center;
            line-height: 1.45;
        }
        .company-meta h2 {
            margin: 0;
            font-size: 20px;
            color: #00a7bf;
            letter-spacing: 0.3px;
        }
        .company-meta .address {
            margin-top: 2px;
            font-size: 12px;
            color: #444;
        }
        .company-meta .contact {
            margin-top: 2px;
            font-size: 11px;
            color: #666;
        }
        .report-badge {
            margin-top: 8px;
            text-align: center;
            background: #00bcd4;
            color: #fff;
            font-weight: bold;
            font-size: 13px;
            padding: 6px 8px;
            border-radius: 4px;
            letter-spacing: 0.4px;
        }
        .profile-box {
            border: 1px solid #d8d8d8;
            border-radius: 6px;
            padding: 10px;
            margin-bottom: 10px;
            background: #fff;
            overflow: auto;
        }
        .profile-head {
            font-size: 12px;
            font-weight: bold;
            color: #00a7bf;
            margin-bottom: 8px;
            text-transform: uppercase;
        }
        .profile-grid {
            width: 100%;
            border-collapse: collapse;
        }
        .profile-grid td {
            border: none;
            padding: 2px 6px 2px 0;
            vertical-align: top;
            font-size: 12px;
        }
        .label {
            color: #666;
            font-weight: bold;
            display: inline-block;
            min-width: 110px;
        }
        .passport {
            width: 74px;
            height: 74px;
            border-radius: 6px;
            object-fit: cover;
            border: 2px solid #00bcd4;
            float: right;
            margin-left: 12px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 14px;
        }
        th, td {
            border: 1px solid #cfcfcf;
            padding: 6px 8px;
            text-align: left;
        }
        th {
            background-color: #00bcd4;
            color: #fff;
        }
        td.right, th.right {
            text-align: right;
        }
        td.center, th.center {
            text-align: center;
        }
        tr:nth-child(even) {
            background: #f5f5f5;
        }
        .status-paid { color: #1f7a1f; font-weight: bold; }
        .status-partial { color: #c27b00; font-weight: bold; }
        .status-not { color: #b32424; font-weight: bold; }
        .total-row {
            background-color: #e5e5e5;
            font-weight: bold;
        }
    </style>
</head>
<body>
<?php
$schedule = !empty($schedule) ? $schedule : [];
$loan = !empty($loan) ? $loan : null;
$customer = !empty($customer) ? $customer : null;
$compdata = !empty($compdata) ? $compdata : null;
$generated_by = !empty($generated_by) ? $generated_by : 'System';
$generated_date = !empty($generated_date) ? $generated_date : date('d-m-Y H:i');

$total_expected = 0;
$total_paid = 0;
$total_penalty = 0;
foreach ($schedule as $row) {
    $total_expected += (float)($row['expected'] ?? 0);
    $total_paid += (float)($row['paid'] ?? 0);
    $total_penalty += (float)($row['penalty'] ?? 0);
}
$total_deficit = max(0, $total_expected - $total_paid);

$default_passport_rel = 'assets/img/user.png';

$to_data_uri = function ($path_or_url) {
    if (empty($path_or_url)) {
        return '';
    }

    $candidate = trim((string)$path_or_url);
    $try_paths = [];

    // If DB stores full URL, extract path part first.
    if (preg_match('#^https?://#i', $candidate)) {
        $url_path = parse_url($candidate, PHP_URL_PATH);
        $candidate = $url_path ? $url_path : '';
    }

    if ($candidate !== '') {
        $candidate = ltrim($candidate, '/');

        // Remove app base path if present (e.g. evamo/assets/...).
        $base_path = trim((string)parse_url(base_url(), PHP_URL_PATH), '/');
        if ($base_path !== '' && strpos($candidate, $base_path . '/') === 0) {
            $candidate = substr($candidate, strlen($base_path) + 1);
        }

        $try_paths[] = FCPATH . $candidate;
    }

    // Also allow absolute filesystem path if passed.
    if (strpos((string)$path_or_url, '/') === 0) {
        $try_paths[] = (string)$path_or_url;
    }

    foreach ($try_paths as $path) {
        $real = realpath($path);
        if ($real && is_file($real)) {
            $bin = @file_get_contents($real);
            if ($bin !== false) {
                $mime = function_exists('mime_content_type')
                    ? mime_content_type($real)
                    : 'image/jpeg';
                return 'data:' . $mime . ';base64,' . base64_encode($bin);
            }
        }
    }

    return '';
};

$passport_candidates = [];
if (!empty($customer->passport)) {
    $passport_value = trim((string)$customer->passport);
    if ($passport_value !== '') {
        $passport_candidates[] = $passport_value;
        if (strpos($passport_value, 'assets/') !== 0) {
            $passport_candidates[] = 'assets/img/' . $passport_value;
            $passport_candidates[] = 'assets/passport/' . $passport_value;
        }
    }
}
$passport_candidates[] = $default_passport_rel;

$passport_src = '';
foreach ($passport_candidates as $candidate) {
    $passport_src = $to_data_uri($candidate);
    if ($passport_src !== '') {
        break;
    }
}

$logo_candidate = '';
if (!empty($compdata->comp_logo)) {
    $logo_candidate = (string)$compdata->comp_logo;
}

$logo_src = $to_data_uri($logo_candidate);
if ($logo_src === '') {
    $logo_src = $to_data_uri('assets/images/company_logo/' . $logo_candidate);
}
if ($logo_src === '') {
    $logo_src = $to_data_uri('assets/img/' . $logo_candidate);
}
if ($logo_src === '') {
    $logo_src = $to_data_uri('assets/img/cdclogo.png');
}

$loan_status_value = strtolower((string)($loan->loan_status ?? ''));
$loan_status_label_map = [
    'out'        => 'nje ya mkataba',
    'active'     => 'ndani ya mkataba',
    'withdrawal' => 'ndani ya mkataba',
    'done'       => 'umelipwa wote',
];
$loan_status_label = $loan_status_label_map[$loan_status_value] ?? ($loan->loan_status ?? '');

$loan_start_raw = !empty($loan->loan_stat_date) ? $loan->loan_stat_date : ($loan->disburse_day ?? '');
$loan_end_raw = !empty($loan->loan_end_date) ? $loan->loan_end_date : ($loan->return_date ?? '');
$loan_start_date = !empty($loan_start_raw) ? date('d-m-Y', strtotime($loan_start_raw)) : '-';
$loan_end_date = !empty($loan_end_raw) ? date('d-m-Y', strtotime($loan_end_raw)) : '-';
?>

<div class="header-wrap">
    <table class="header-table">
        <tr>
            
            <td class="company-meta">
                <h2><?php echo htmlspecialchars($compdata->comp_name ?? ''); ?></h2>
                <div class="address"><?php echo htmlspecialchars($compdata->adress ?? ''); ?></div>
                <?php if (!empty($compdata->comp_email) || !empty($compdata->comp_phone)): ?>
                <div class="contact">
                    <?php if (!empty($compdata->comp_email)): ?>Email: <?php echo htmlspecialchars($compdata->comp_email); ?><?php endif; ?>
                    <?php if (!empty($compdata->comp_email) && !empty($compdata->comp_phone)): ?> | <?php endif; ?>
                    <?php if (!empty($compdata->comp_phone)): ?>Phone: <?php echo htmlspecialchars($compdata->comp_phone); ?><?php endif; ?>
                </div>
                <?php endif; ?>
            </td>
            <td style="width:95px;"></td>
        </tr>
    </table>
    <div class="report-badge">TAARIFA YA MALIPO NA FAINI</div>
</div>

<div class="profile-box">
    <div class="profile-head">Taarifa za Mteja na Mkopo</div>
    <img class="passport" src="<?php echo $passport_src; ?>" alt="Passport" />
    <table class="profile-grid">
        <tr>
            <td><span class="label">Mteja:</span> <?php echo htmlspecialchars(trim(($customer->f_name ?? '') . ' ' . ($customer->m_name ?? '') . ' ' . ($customer->l_name ?? ''))); ?></td>
            <td><span class="label">Namba ya Mkopo:</span> <?php echo htmlspecialchars($loan->loan_code ?? ''); ?></td>
        </tr>
        <tr>
            <td><span class="label">Simu:</span> <?php echo htmlspecialchars($customer->phone_no ?? ''); ?></td>
            <td><span class="label">Kiasi cha Mkopo:</span> Tsh <?php echo number_format((float)($loan->loan_aprove ?? 0)); ?></td>
        </tr>
        <tr>
            <td><span class="label">Tawi:</span> <?php echo htmlspecialchars($customer->blanch_name ?? ($loan->blanch_name ?? '')); ?></td>
            <td><span class="label">Jumla + Riba:</span> Tsh <?php echo number_format((float)($loan->loan_int ?? 0)); ?></td>
        </tr>
        <tr>
            <td><span class="label">Hali ya Mkopo:</span> <?php echo htmlspecialchars($loan_status_label); ?></td>
            <td><span class="label">Rejesho:</span> Tsh <?php echo number_format((float)($loan->restration ?? 0)); ?></td>
        </tr>
        <tr>
            <td><span class="label">Aliyetuma:</span> <?php echo htmlspecialchars($generated_by); ?></td>
            <td><span class="label">Tarehe:</span> <?php echo htmlspecialchars($generated_date); ?></td>
        </tr>
        <tr>
            <td><span class="label">Tarehe ya kuchukua mkopo:</span> <?php echo htmlspecialchars($loan_start_date); ?></td>
            <td><span class="label">Tarehe ya kumaliza mkopo:</span> <?php echo htmlspecialchars($loan_end_date); ?></td>
        </tr>
    </table>
</div>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Tarehe</th>
            <th class="right">Rejesho</th>
            <th class="right">Lipwa</th>
            <th class="right">Faini</th>
            <th class="center">Hali</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($schedule)): ?>
            <?php $i = 1; foreach ($schedule as $row): ?>
                <?php
                $status = $row['status'] ?? '';
                $status_label_map = [
                    'paid' => 'imelipwa',
                    'not_paid' => 'haijalipwa',
                ];
                $status_class = 'status-not';
                if ($status === 'paid') {
                    $status_class = 'status-paid';
                } elseif ($status === 'partial') {
                    $status_class = 'status-partial';
                }
                $status_label = $status_label_map[$status] ?? ($row['status_label'] ?? '');
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo htmlspecialchars($row['date'] ?? ''); ?></td>
                    <td class="right"><?php echo number_format((float)($row['expected'] ?? 0)); ?></td>
                    <td class="right"><?php echo number_format((float)($row['paid'] ?? 0)); ?></td>
                    <td class="right"><?php echo number_format((float)($row['penalty'] ?? 0)); ?></td>
                    <td class="center <?php echo $status_class; ?>"><?php echo htmlspecialchars($status_label); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="center">Hakuna data ya statement.</td>
            </tr>
        <?php endif; ?>

        <tr class="total-row">
            <td colspan="2">JUMLA</td>
            <td class="right"><?php echo number_format($total_expected); ?></td>
            <td class="right"><?php echo number_format($total_paid); ?></td>
            <td class="right"><?php echo number_format($total_penalty); ?></td>
            <td class="center">Deni: <?php echo number_format($total_deficit); ?></td>
        </tr>
    </tbody>
</table>

</body>
</html>
