<?php
$company_name = !empty($compdata->comp_name) ? $compdata->comp_name : 'Kampuni';
$branch_name = !empty($blanch_data->blanch_name) ? $blanch_data->blanch_name : 'Matawi yote';
$report_date = !empty($loan_application_date) ? $loan_application_date : 'Tarehe zote';
$work_status_label = !empty($selected_work_status) ? $selected_work_status : 'Zote';

$logo_path = '';
if (!empty($compdata->comp_logo) && file_exists(FCPATH . 'assets/img/' . $compdata->comp_logo)) {
    $logo_path = base_url('assets/img/' . $compdata->comp_logo);
}
?>
<!DOCTYPE html>
<html lang="sw">
<head>
  <meta charset="UTF-8">
  <title><?php echo htmlspecialchars($company_name, ENT_QUOTES, 'UTF-8'); ?> | RIPOTI YA MAOMBI YA MIKOPO</title>
  <style>
    body {
      font-family: DejaVu Sans, sans-serif;
      font-size: 11px;
      color: #0f172a;
    }

    .page {
      border: 1.5px solid #06b6d4;
      border-radius: 10px;
      padding: 18px;
    }

    .header-table,
    .report-table {
      width: 100%;
      border-collapse: collapse;
    }

    .header-table td {
      vertical-align: middle;
      border: none;
    }

    .logo-box {
      width: 110px;
    }

    .logo {
      width: 96px;
      height: 96px;
      object-fit: contain;
      border: 1px solid #a5f3fc;
      border-radius: 8px;
      padding: 6px;
      background: #ecfeff;
    }

    .report-title {
      color: #0891b2;
      font-size: 20px;
      font-weight: bold;
      text-transform: uppercase;
      margin: 0 0 6px;
    }

    .company-name {
      font-size: 16px;
      font-weight: bold;
      text-transform: uppercase;
      margin: 0 0 4px;
    }

    .company-address,
    .filter-label,
    .report-date,
    .summary {
      font-size: 11px;
      color: #334155;
      margin: 0;
    }

    .summary {
      margin-top: 4px;
      font-weight: bold;
      color: #0f172a;
    }

    .divider {
      border-top: 2px solid #06b6d4;
      margin: 14px 0 16px;
    }

    .report-table th {
      background: #0891b2;
      color: #ffffff;
      border: 1px solid #06b6d4;
      padding: 8px 6px;
      text-align: left;
      font-size: 11px;
      text-transform: uppercase;
    }

    .report-table td {
      border: 1px solid #a5f3fc;
      padding: 7px 6px;
      vertical-align: top;
    }

    .report-table tbody tr:nth-child(even) {
      background: #ecfeff;
    }

    .right {
      text-align: right;
    }

    .center {
      text-align: center;
    }

    .empty-state {
      margin-top: 18px;
      padding: 12px;
      border: 1px solid #a5f3fc;
      background: #ecfeff;
      color: #155e75;
      text-align: center;
      font-weight: bold;
    }
  </style>
</head>
<body>
<div class="page">
  <table class="header-table">
    <tr>
      <td class="logo-box">
        <?php if (!empty($logo_path)): ?>
          <img src="<?php echo $logo_path; ?>" class="logo" alt="Nembo ya Kampuni">
        <?php endif; ?>
      </td>
      <td>
        <p class="report-title">Ripoti ya Maombi ya Mikopo</p>
        <p class="company-name"><?php echo htmlspecialchars($company_name, ENT_QUOTES, 'UTF-8'); ?></p>
        <p class="company-address"><?php echo !empty($compdata->adress) ? htmlspecialchars($compdata->adress, ENT_QUOTES, 'UTF-8') : '-'; ?></p>
        <p class="filter-label"><strong>Tawi:</strong> <?php echo htmlspecialchars($branch_name, ENT_QUOTES, 'UTF-8'); ?> | <strong>Tarehe ya Maombi:</strong> <?php echo htmlspecialchars($report_date, ENT_QUOTES, 'UTF-8'); ?> | <strong>Hali ya Ajira:</strong> <?php echo htmlspecialchars($work_status_label, ENT_QUOTES, 'UTF-8'); ?></p>
        <p class="report-date">Imezalishwa: <?php echo date('d M Y H:i'); ?></p>
        <p class="summary">Jumla ya Maombi ya Mkopo: TZS <?php echo number_format((float) ($total_loan_amount ?? 0)); ?></p>
      </td>
    </tr>
  </table>

  <div class="divider"></div>

  <?php if (!empty($loan_pending) && is_array($loan_pending)): ?>
    <table class="report-table">
      <thead>
        <tr>
          <th style="width: 5%;">S/N</th>
          <th style="width: 22%;">Jina la Mteja</th>
          <th style="width: 13%;">Namba ya Simu</th>
          <th style="width: 12%;">Tawi</th>
          <th style="width: 13%;" class="right">Kiasi cha Mkopo</th>
          <th style="width: 13%;">Tarehe ya Maombi</th>
          <th style="width: 13%;">Hali ya Ajira</th>
          <th style="width: 17%;">Muda wa Mkopo (Idadi ya Malipo)</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        <?php foreach ($loan_pending as $row): ?>
          <?php
            $full_name = trim(($row->f_name ?? '') . ' ' . ($row->m_name ?? '') . ' ' . ($row->l_name ?? ''));
            $duration = '-';
            if ((int) ($row->day ?? 0) === 1) {
              $duration = 'Kila siku';
            } elseif ((int) ($row->day ?? 0) === 7) {
              $duration = 'Kila wiki';
            } elseif (in_array((int) ($row->day ?? 0), [28, 29, 30, 31], true)) {
              $duration = 'Kila mwezi';
            }

            $duration = $duration . ' (' . ucfirst((string) ($row->session ?? '-')) . ')';
            $request_date = !empty($row->loan_day) ? date('d M Y', strtotime($row->loan_day)) : '-';
          ?>
          <tr>
            <td class="center"><?php echo $no++; ?></td>
            <td><?php echo htmlspecialchars(strtoupper($full_name), ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars((string) ($row->phone_no ?? '-'), ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars((string) ($row->blanch_name ?? '-'), ENT_QUOTES, 'UTF-8'); ?></td>
            <td class="right"><?php echo number_format((float) ($row->how_loan ?? 0)); ?></td>
            <td><?php echo htmlspecialchars($request_date, ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo !empty($row->work_status) ? htmlspecialchars($row->work_status, ENT_QUOTES, 'UTF-8') : '-'; ?></td>
            <td><?php echo htmlspecialchars($duration, ENT_QUOTES, 'UTF-8'); ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else: ?>
    <div class="empty-state">Hakuna kumbukumbu zilizopatikana kwa vichujio vilivyochaguliwa.</div>
  <?php endif; ?>
</div>
</body>
</html>
