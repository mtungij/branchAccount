<?php
$companyName = isset($compdata->comp_name) ? $compdata->comp_name : '';
$companyAddress = isset($compdata->adress) ? $compdata->adress : '';
$companyPhone = isset($compdata->phone_no) ? $compdata->phone_no : '';
$companyLogo = isset($compdata->comp_logo) ? $compdata->comp_logo : '';

$loanAmount = isset($loan->loan_aprove) ? (float) $loan->loan_aprove : 0;
$loanStartDate = isset($loan->loan_stat_date) ? $loan->loan_stat_date : '-';
$loanEndDate = !empty($loan->loan_end_date) ? substr($loan->loan_end_date, 0, 10) : '-';
$customerNameParts = array_filter(array(
  isset($loan->f_name) ? trim($loan->f_name) : '',
  isset($loan->m_name) ? trim($loan->m_name) : '',
  isset($loan->l_name) ? trim($loan->l_name) : '',
), static function ($value) {
  return $value !== '';
});
$customerName = !empty($customerNameParts) ? implode(' ', $customerNameParts) : '-';
$logoUrl = '';
$logoCandidates = array();
if (!empty($companyLogo)) {
  $logoCandidates[] = 'assets/images/company_logo/' . $companyLogo;
  $logoCandidates[] = 'assets/img/' . $companyLogo;
  $logoCandidates[] = ltrim($companyLogo, '/');
  $logoCandidates[] = 'assets/images/company_logo/' . basename($companyLogo);
  $logoCandidates[] = 'assets/img/' . basename($companyLogo);
}

foreach ($logoCandidates as $logoCandidate) {
  if (file_exists(FCPATH . $logoCandidate)) {
    $logoUrl = 'file://' . FCPATH . $logoCandidate;
    break;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo htmlspecialchars($companyName); ?> | Ripoti ya Ratiba ya Mkopo</title>
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
    .summary-table,
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
    .report-date {
      font-size: 11px;
      color: #334155;
      margin: 0;
    }

    .divider {
      border-top: 2px solid #06b6d4;
      margin: 14px 0 16px;
    }

    .summary-table {
      margin-bottom: 14px;
    }

    .summary-table td {
      border: 1px solid #a5f3fc;
      padding: 7px 6px;
      width: 33.33%;
      vertical-align: top;
    }

    .summary-label {
      display: block;
      font-size: 10px;
      font-weight: bold;
      color: #155e75;
      text-transform: uppercase;
      margin-bottom: 3px;
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
      padding: 7px 6px;
      vertical-align: top;
    }

    .report-table tbody tr:nth-child(even) {
      background: #ecfeff;
    }

    .text-center {
      text-align: center;
    }

    .text-right {
      text-align: right;
    }

    .badge-paid {
      color: #166534;
      font-weight: bold;
    }

    .badge-not-paid {
      color: #be123c;
      font-weight: bold;
    }

    .badge-upcoming {
      color: #b45309;
      font-weight: bold;
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
      <?php if (!empty($logoUrl)): ?>
        <td class="logo-box">
          <img src="<?php echo $logoUrl; ?>" class="logo" alt="Company Logo">
        </td>
      <?php endif; ?>
      <td>
        <p class="report-title">Ripoti ya Ratiba ya Mkopo</p>
        <p class="company-name"><?php echo htmlspecialchars($companyName); ?></p>
        <?php if (!empty($companyAddress)): ?>
          <p class="company-address"><?php echo htmlspecialchars($companyAddress); ?></p>
        <?php endif; ?>
        <?php if (!empty($companyPhone)): ?>
          <p class="company-address"><?php echo htmlspecialchars($companyPhone); ?></p>
        <?php endif; ?>
        <p class="report-date">Imetolewa: <?php echo date('d M Y'); ?></p>
      </td>
    </tr>
  </table>

  <hr class="divider">

  <table class="summary-table">
    <tr>
      <td>
        <span class="summary-label">Jina la Mteja</span>
        <strong><?php echo htmlspecialchars($customerName); ?></strong>
      </td>
      <td>
        <span class="summary-label">Kiasi</span>
        <strong><?php echo number_format($loanAmount); ?></strong>
      </td>
      <td>
        <span class="summary-label">Tarehe ya Kuanza</span>
        <strong><?php echo htmlspecialchars($loanStartDate); ?></strong>
      </td>
      <td>
        <span class="summary-label">Tarehe ya Mwisho</span>
        <strong><?php echo htmlspecialchars($loanEndDate); ?></strong>
      </td>
    </tr>
  </table>

  <?php if (!empty($data_loan)): ?>
    <table class="report-table">
      <thead>
        <tr>
          <th style="width: 10%;">S/No.</th>
                    <th style="width: 28%;">Tarehe</th>
                    <th style="width: 30%;">Makusanyo</th>
                    <th style="width: 32%;">Hali</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        <?php foreach ($data_loan as $scheduleRow): ?>
          <?php
          $rawStatus = isset($scheduleRow->date_status) ? (string) $scheduleRow->date_status : '';
          $statusText = 'Inakuja';
          $statusClass = 'badge-upcoming';
          if ($rawStatus === 'paid') {
            $statusText = 'Imelipwa';
            $statusClass = 'badge-paid';
          } elseif ($rawStatus === 'not paid') {
            $statusText = 'Haijalipwa';
            $statusClass = 'badge-not-paid';
          }
          ?>
          <tr>
            <td class="text-center"><?php echo $no++; ?></td>
            <td><?php echo htmlspecialchars($scheduleRow->date); ?></td>
            <td class="text-right"><?php echo number_format((float) $scheduleRow->restration); ?></td>
            <td><span class="<?php echo $statusClass; ?>"><?php echo $statusText; ?></span></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else: ?>
    <div class="empty-state">Hakuna ratiba iliyopatikana kwa mkopo huu.</div>
  <?php endif; ?>
</div>
</body>
</html>




