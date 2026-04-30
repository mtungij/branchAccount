<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <?php
    $lang_line = function ($key, $fallback) {
      $value = $this->lang->line($key);
      return !empty($value) ? $value : $fallback;
    };

    $txt_outstand_loan_report = $lang_line('pdf_outstand_loan_report', 'Outstand Loan Report');
    $txt_company_logo = $lang_line('company_logo', 'Company Logo');
    $txt_branch_code = $lang_line('branch_code', 'Branch Code');
    $txt_range = $lang_line('range', 'Range');
    $txt_s_no = $lang_line('s_no', 'S/No');
    $txt_branch_name = $lang_line('branch_name', 'Branch Name');
    $txt_customer_name = $lang_line('customer_name', 'Customer Name');
    $txt_phone_number = $lang_line('phone_number', 'Phone Number');
    $txt_loan_amount = $lang_line('loan_amount', 'Loan Amount');
    $txt_restoration = $lang_line('collection', 'Collection');
    $txt_duration_type = $lang_line('duration_type', 'Duration Type');
    $txt_number_of_repayment = $lang_line('number_of_repayment', 'Number of Repayment');
    $txt_remain_amount = $lang_line('remain_amount', 'Remain Amount');
    $txt_pending_day = $lang_line('pending_day', 'Pending Day');
    $txt_start_date = $lang_line('start_date', 'Start Date');
    $txt_end_date = $lang_line('end_date', 'End Date');
    $txt_daily = $lang_line('daily', 'Daily');
    $txt_weekly = $lang_line('weekly', 'Weekly');
    $txt_monthly = $lang_line('monthly', 'Monthly');
    $txt_total = $lang_line('total', 'TOTAL');
  ?>
  <title><?php echo $txt_outstand_loan_report; ?></title>
  <style>
    body { font-family: Arial, sans-serif; font-size: 11px; color: #333; }
    .header { text-align: center; margin-bottom: 10px; }
    .header img { max-height: 80px; margin-bottom: 6px; }
    table { border-collapse: collapse; width: 100%; margin-top: 8px; }
    th, td { border: 1px solid #ddd; padding: 5px 6px; text-align: left; }
    th { background: #00bcd4; color: #fff; }
    .total-row { background: #f2f2f2; font-weight: bold; }
    .muted { color: #666; font-size: 10px; }
  </style>
</head>
<body>
<?php
  $companyName = isset($company_data->comp_name) ? $company_data->comp_name : '';
  $companyAddress = isset($company_data->adress) ? $company_data->adress : '';
  $companyEmail = isset($company_data->email) ? $company_data->email : '';
  $companyPhone = isset($company_data->phone_no) ? $company_data->phone_no : '';
  $branchCode = isset($blanch_data->branch_code) ? $blanch_data->branch_code : '';

  $logo_url = '';
  $companyLogo = isset($company_data->comp_logo) ? $company_data->comp_logo : '';
  if (!empty($companyLogo) && file_exists(FCPATH . 'assets/images/company_logo/' . $companyLogo)) {
    $logo_url = 'file://' . FCPATH . 'assets/images/company_logo/' . $companyLogo;
  } elseif (!empty($companyLogo) && file_exists(FCPATH . 'assets/img/' . $companyLogo)) {
    $logo_url = 'file://' . FCPATH . 'assets/img/' . $companyLogo;
  }

  $today = date('d-m-Y');
  $range = '';
  if (!empty($start_date) || !empty($end_date)) {
    $range = trim(($start_date ?: '') . ' - ' . ($end_date ?: ''));
  }
?>

<div class="header">
  <?php if ($logo_url): ?>
    <img src="<?= $logo_url; ?>" alt="Company Logo" />
  <?php endif; ?>
  <div><strong><?= htmlspecialchars($companyName); ?></strong></div>
  <div><?= htmlspecialchars($companyAddress); ?></div>
  <div><?= htmlspecialchars($companyEmail); ?> <?= !empty($companyPhone) ? ' | ' . htmlspecialchars($companyPhone) : ''; ?></div>
  <div><strong><?= $txt_outstand_loan_report; ?></strong> - <?= $today; ?></div>
  <?php if (!empty($branchCode)): ?>
    <div class="muted"><?= $txt_branch_code; ?>: <?= htmlspecialchars($branchCode); ?></div>
  <?php endif; ?>
  <?php if (!empty($range)): ?>
    <div class="muted"><?= $txt_range; ?>: <?= htmlspecialchars($range); ?></div>
  <?php endif; ?>
</div>

<table>
  <thead>
    <tr>
      <th><?= $txt_s_no; ?></th>
      <th><?= $txt_branch_name; ?></th>
      <th><?= $txt_customer_name; ?></th>
      <th><?= $txt_phone_number; ?></th>
      <th><?= $txt_loan_amount; ?></th>
      <th><?= $txt_restoration; ?></th>
      <th><?= $txt_duration_type; ?></th>
      <th><?= $txt_number_of_repayment; ?></th>
      <th><?= $txt_remain_amount; ?></th>
      <th><?= $txt_pending_day; ?></th>
      <th><?= $txt_start_date; ?></th>
      <th><?= $txt_end_date; ?></th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; ?>
    <?php if (!empty($outstand)): ?>
      <?php foreach ($outstand as $item): ?>
        <?php
          $duration = '';
          if ($item->day == '1') {
            $duration = $txt_daily;
          } elseif ($item->day == '7') {
            $duration = $txt_weekly;
          } elseif ($item->day == '30') {
            $duration = $txt_monthly;
          }

          $endDateStr = substr($item->loan_end_date ?? '', 0, 10);
          $endDate = DateTime::createFromFormat('Y-m-d', $endDateStr);
          $todayDate = new DateTime();
          $pendingDays = 0;
          if ($endDate instanceof DateTime) {
            $diff = $endDate->diff($todayDate);
            $pendingDays = $diff->invert ? 0 : $diff->days;
          }
        ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= htmlspecialchars($item->blanch_name ?? ''); ?></td>
          <td><?= htmlspecialchars(trim(($item->f_name ?? '') . ' ' . ($item->m_name ?? '') . ' ' . ($item->l_name ?? ''))); ?></td>
          <td><?= htmlspecialchars($item->phone_no ?? ''); ?></td>
          <td><?= number_format($item->loan_int ?? 0); ?></td>
          <td><?= number_format($item->restration ?? 0); ?></td>
          <td><?= htmlspecialchars($duration); ?></td>
          <td><?= htmlspecialchars($item->session ?? ''); ?></td>
          <td><?= number_format($item->remain_amount ?? 0); ?></td>
          <td><?= $pendingDays; ?></td>
          <td><?= htmlspecialchars($item->loan_stat_date ?? ''); ?></td>
          <td><?= htmlspecialchars($endDateStr); ?></td>
        </tr>
      <?php endforeach; ?>
    <?php endif; ?>
    <tr class="total-row">
      <td><?= $txt_total; ?></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td><?= number_format($total_remain->total_out ?? 0); ?></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </tbody>
</table>

</body>
</html>
