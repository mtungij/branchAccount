<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $compdata->comp_name; ?> | LOAN WITHDRAWAL REPORT</title>
  <style>
    html, body {
      margin: 0; padding: 0; width: 100%;
      font-family: Arial, sans-serif;
      font-size: 11px;
      color: #333;
    }
    .c { text-transform: uppercase; }

    /* ── Header ── */
    .company-header {
      text-align: center;
      margin-bottom: 6px;
    }
    .company-header img {
      max-height: 80px;
      width: auto;
      margin-bottom: 4px;
    }
    .company-header h2 {
      margin: 0;
      font-size: 15px;
      text-transform: uppercase;
    }
    .company-header p {
      margin: 2px 0;
      font-size: 11px;
    }
    .report-title {
      text-align: center;
      font-size: 13px;
      font-weight: bold;
      margin: 6px 0 2px;
      text-transform: uppercase;
      letter-spacing: 1px;
    }
    .report-subtitle {
      text-align: center;
      font-size: 11px;
      color: #555;
      margin-bottom: 8px;
    }
    hr.divider {
      border: none;
      border-top: 2px solid #00bcd4;
      margin: 6px 0 10px;
    }

    /* ── Main table ── */
    table.main-table {
      border-collapse: collapse;
      width: 100%;
      margin-top: 4px;
    }
    table.main-table th,
    table.main-table td {
      border: 1px solid #ccc;
      padding: 4px 5px;
      text-align: left;
    }
    table.main-table thead tr {
      background-color: #00bcd4;
      color: #fff;
    }
    table.main-table tbody tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    table.main-table tr.total-row {
      background-color: #ddd;
      font-weight: bold;
    }
    .text-right { text-align: right !important; }
    .text-center { text-align: center !important; }
    .green  { color: #1a7a3a; }
    .red    { color: #c0392b; }
    .muted  { color: #777; }

    /* ── Summary box ── */
    table.summary {
      border-collapse: collapse;
      width: 42%;
      margin-top: 14px;
      float: right;
    }
    table.summary td {
      border: 1px solid #ccc;
      padding: 5px 8px;
      font-size: 11px;
    }
    table.summary tr.summary-header td {
      background-color: #00bcd4;
      color: #fff;
      font-weight: bold;
      text-align: center;
    }
    table.summary tr.grand-total td {
      background-color: #00838f;
      color: #fff;
      font-weight: bold;
    }
    table.summary tr:nth-child(even) td {
      background-color: #f2f2f2;
    }

    /* ── Footer ── */
    .print-footer {
      margin-top: 18px;
      font-size: 10px;
      color: #888;
      text-align: center;
      clear: both;
    }
  </style>
</head>
<body>

<!-- ═══════════════ COMPANY HEADER ═══════════════ -->
<div class="company-header">
  <?php
    $logo_path = FCPATH . 'assets/img/' . $compdata->comp_logo;
    if (!empty($compdata->comp_logo) && is_file($logo_path)):
  ?>
  <img src="<?php echo $logo_path; ?>" alt="Logo">
  <?php endif; ?>
  <h2><?php echo htmlspecialchars($compdata->comp_name); ?></h2>
  <p><?php echo htmlspecialchars($compdata->adress); ?></p>
</div>

<div class="report-title">
  <?php echo !empty($blanch_data) ? htmlspecialchars($blanch_data->blanch_name) . ' — ' : ''; ?>Loan Withdrawal Report
</div>
<div class="report-subtitle">
  From: <strong><?php echo !empty($filters['from']) ? $filters['from'] : '—'; ?></strong>
  &nbsp;&nbsp;To: <strong><?php echo !empty($filters['to']) ? $filters['to'] : '—'; ?></strong>
  &nbsp;&nbsp;Printed: <strong><?php echo date('d/m/Y H:i'); ?></strong>
  <?php if (!empty($filters['paid_today'])): ?>
    &nbsp;&nbsp;<span style="color:#00838f;">★ Waliolipa Leo</span>
  <?php endif; ?>
</div>

<hr class="divider">

<!-- ═══════════════ DATA TABLE ═══════════════ -->
<table class="main-table">
  <thead>
    <tr>
      <th>#</th>
      <th>Customer Name</th>
      <th>Phone</th>
      <th>Branch</th>
      <th>Product</th>
      <th>Method</th>
      <th>Duration</th>
      <th class="text-right">Principal</th>
      <th class="text-right">Loan Amt</th>
      <th class="text-right">Collection</th>
      <th>Withdraw Date</th>
      <th>End Date</th>
      <th class="text-right">Amt Paid</th>
      <th class="text-right">Remain Debt</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    $total_principal  = 0;
    $total_loan_int   = 0;
    $total_collection = 0;
    $total_paid_all   = 0;
    $total_remain_all = 0;
    foreach ($disburse as $row):
      $total_principal  += $row->loan_aprove;
      $total_loan_int   += $row->loan_int;
      $total_collection += $row->restration;
      $row_paid   = $row->total_paid ?? 0;
      $row_remain = max(0, $row->loan_int - $row_paid);
      $total_paid_all   += $row_paid;
      $total_remain_all += $row_remain;

      if ($row->day == 1)                                  { $duration = 'Daily'; }
      elseif ($row->day == 7)                              { $duration = 'Weekly'; }
      elseif (in_array($row->day, [28,29,30,31]))          { $duration = 'Monthly'; }
      else                                                 { $duration = $row->day . 'd'; }
    ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td class="c"><?php echo htmlspecialchars($row->f_name . ' ' . substr($row->m_name, 0, 1) . '. ' . $row->l_name); ?></td>
      <td><?php echo htmlspecialchars($row->phone_no); ?></td>
      <td class="c"><?php echo htmlspecialchars($row->blanch_name); ?></td>
      <td class="c"><?php echo htmlspecialchars($row->loan_name); ?></td>
      <td><?php echo htmlspecialchars($row->account_name); ?></td>
      <td><?php echo $duration . ' (' . $row->session . ')'; ?></td>
      <td class="text-right"><?php echo number_format($row->loan_aprove); ?></td>
      <td class="text-right"><?php echo number_format($row->loan_int); ?></td>
      <td class="text-right"><?php echo number_format($row->restration); ?></td>
      <td><?php echo substr($row->loan_stat_date, 0, 10); ?></td>
      <td><?php echo substr($row->loan_end_date, 0, 10); ?></td>
      <td class="text-right green"><?php echo number_format($row_paid); ?></td>
      <td class="text-right <?php echo $row_remain > 0 ? 'red' : 'muted'; ?>"><?php echo number_format($row_remain); ?></td>
    </tr>
    <?php endforeach; ?>

    <tr class="total-row">
      <td colspan="7" class="text-right">TOTAL</td>
      <td class="text-right"><?php echo number_format($total_principal); ?></td>
      <td class="text-right"><?php echo number_format($total_loan_int); ?></td>
      <td class="text-right"><?php echo number_format($total_collection); ?></td>
      <td colspan="2"></td>
      <td class="text-right green"><?php echo number_format($total_paid_all); ?></td>
      <td class="text-right red"><?php echo number_format($total_remain_all); ?></td>
    </tr>
  </tbody>
</table>

<!-- ═══════════════ SUMMARY BOX ═══════════════ -->
<table class="summary">
  <tr class="summary-header"><td colspan="2">SUMMARY</td></tr>
  <tr>
    <td>Total Principal</td>
    <td class="text-right"><?php echo number_format($total_loanDis); ?></td>
  </tr>
  <tr>
    <td>Total Interest (Loan Amt)</td>
    <td class="text-right"><?php echo number_format($total_interest_loan); ?></td>
  </tr>
  <tr>
    <td>Total Amount Paid</td>
    <td class="text-right green"><?php echo number_format($total_paid_all); ?></td>
  </tr>
  <tr>
    <td>Total Remaining Debt</td>
    <td class="text-right red"><?php echo number_format($total_remain_all); ?></td>
  </tr>
  <tr class="grand-total">
    <td>Grand Total (Principal + Interest)</td>
    <td class="text-right"><?php echo number_format($total_loanDis + $total_interest_loan); ?></td>
  </tr>
</table>

<div class="print-footer">
  Generated on <?php echo date('d/m/Y H:i:s'); ?> &mdash; <?php echo htmlspecialchars($compdata->comp_name); ?>
</div>

</body>
</html>

<!-- Data Table -->
<table>
  <thead>
    <tr>
      <th style="font-size:11px;">#</th>
      <th style="font-size:11px;">Customer Name</th>
      <th style="font-size:11px;">Phone</th>
      <th style="font-size:11px;">Branch</th>
      <th style="font-size:11px;">Product</th>
      <th style="font-size:11px;">Method</th>
      <th style="font-size:11px;">Duration</th>
      <th style="font-size:11px;">Sessions</th>
      <th style="font-size:11px;">Principal</th>
      <th style="font-size:11px;">Loan Amt</th>
      <th style="font-size:11px;">Collection</th>
      <th style="font-size:11px;">Withdraw Date</th>
      <th style="font-size:11px;">End Date</th>
      <th style="font-size:11px;">Amt Paid</th>
      <th style="font-size:11px;">Remain Debt</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    $total_principal  = 0;
    $total_loan_int   = 0;
    $total_collection = 0;
    $total_paid_all   = 0;
    $total_remain_all = 0;
    foreach ($disburse as $row):
      $total_principal  += $row->loan_aprove;
      $total_loan_int   += $row->loan_int;
      $total_collection += $row->restration;
      $row_paid   = $row->total_paid ?? 0;
      $row_remain = max(0, $row->loan_int - $row_paid);
      $total_paid_all   += $row_paid;
      $total_remain_all += $row_remain;

      if ($row->day == 1) {
        $duration = 'Daily';
      } elseif ($row->day == 7) {
        $duration = 'Weekly';
      } elseif (in_array($row->day, [28, 29, 30, 31])) {
        $duration = 'Monthly';
      } else {
        $duration = $row->day . ' days';
      }
    ?>
    <tr>
      <td style="font-size:11px;"><?php echo $no++; ?></td>
      <td style="font-size:11px;" class="c"><?php echo $row->f_name . ' ' . substr($row->m_name, 0, 1) . ' ' . $row->l_name; ?></td>
      <td style="font-size:11px;"><?php echo $row->phone_no; ?></td>
      <td style="font-size:11px;" class="c"><?php echo $row->blanch_name; ?></td>
      <td style="font-size:11px;" class="c"><?php echo $row->loan_name; ?></td>
      <td style="font-size:11px;"><?php echo $row->account_name; ?></td>
      <td style="font-size:11px;"><?php echo $duration; ?> (<?php echo $row->session; ?>)</td>
      <td style="font-size:11px;" class="text-right"><?php echo $row->session; ?></td>
      <td style="font-size:11px;" class="text-right"><?php echo number_format($row->loan_aprove); ?></td>
      <td style="font-size:11px;" class="text-right"><?php echo number_format($row->loan_int); ?></td>
      <td style="font-size:11px;" class="text-right"><?php echo number_format($row->restration); ?></td>
      <td style="font-size:11px;"><?php echo substr($row->loan_stat_date, 0, 10); ?></td>
      <td style="font-size:11px;"><?php echo substr($row->loan_end_date, 0, 10); ?></td>
      <td style="font-size:11px; color:#16a34a;" class="text-right"><?php echo number_format($row_paid); ?></td>
      <td style="font-size:11px; color:<?php echo $row_remain > 0 ? '#dc2626' : '#6b7280'; ?>;" class="text-right"><?php echo number_format($row_remain); ?></td>
    </tr>
    <?php endforeach; ?>

    <!-- Totals Row -->
    <tr class="total-row">
      <td colspan="8" class="text-right" style="font-size:12px;">TOTAL</td>
      <td class="text-right" style="font-size:12px;"><?php echo number_format($total_principal); ?></td>
      <td class="text-right" style="font-size:12px;"><?php echo number_format($total_loan_int); ?></td>
      <td class="text-right" style="font-size:12px;"><?php echo number_format($total_collection); ?></td>
      <td colspan="2"></td>
      <td class="text-right" style="font-size:12px; color:#16a34a;"><?php echo number_format($total_paid_all); ?></td>
      <td class="text-right" style="font-size:12px; color:#dc2626;"><?php echo number_format($total_remain_all); ?></td>
    </tr>
  </tbody>
</table>

<!-- Summary Box -->
<table style="margin-top: 16px; width: 40%; float: right; border: 1px solid #374151;">
  <tr>
    <td style="font-size:12px; padding:5px;"><strong>Total Principal</strong></td>
    <td style="font-size:12px; padding:5px; text-align:right;"><?php echo number_format($total_loanDis); ?></td>
  </tr>
  <tr>
    <td style="font-size:12px; padding:5px;"><strong>Total Interest</strong></td>
    <td style="font-size:12px; padding:5px; text-align:right;"><?php echo number_format($total_interest_loan); ?></td>
  </tr>
  <tr>
    <td style="font-size:12px; padding:5px;"><strong>Total Paid</strong></td>
    <td style="font-size:12px; padding:5px; text-align:right; color:#16a34a;"><?php echo number_format($total_paid_all); ?></td>
  </tr>
  <tr>
    <td style="font-size:12px; padding:5px;"><strong>Total Remaining Debt</strong></td>
    <td style="font-size:12px; padding:5px; text-align:right; color:#dc2626;"><?php echo number_format($total_remain_all); ?></td>
  </tr>
  <tr style="background-color:#1f2937; color:#fff;">
    <td style="font-size:12px; padding:5px;"><strong>Grand Total</strong></td>
    <td style="font-size:12px; padding:5px; text-align:right;"><strong><?php echo number_format($total_loanDis + $total_interest_loan); ?></strong></td>
  </tr>
</table>

</body>
</html>
