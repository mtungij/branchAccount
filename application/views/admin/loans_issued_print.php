<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loans Issued – <?= htmlspecialchars($officer_name ?? '', ENT_QUOTES, 'UTF-8'); ?></title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: 'Poppins', Arial, Helvetica, sans-serif; font-size: 12px; color: #1f2937; background: #fff; }

    /* ── top toolbar (hidden when printing) ── */
    .toolbar {
      display: flex; align-items: center; gap: 10px;
      padding: 10px 20px;
      background: #ecfeff; border-bottom: 3px solid #06b6d4;
    }
    .toolbar h1 { flex: 1; font-size: 15px; color: #0e7490; }
    .btn {
      display: inline-flex; align-items: center; gap: 6px;
      padding: 7px 16px; font-size: 12px; font-weight: 600;
      border: none; border-radius: 6px; cursor: pointer; text-decoration: none;
    }
    .btn-cyan  { background: #06b6d4; color: #fff; }
    .btn-cyan:hover { background: #0891b2; }
    .btn-gray  { background: #e5e7eb; color: #374151; }
    .btn-gray:hover { background: #d1d5db; }

    /* ── report header ── */
    .report-header {
      background: #06b6d4; color: #fff;
      padding: 18px 24px;
      display: flex; justify-content: space-between; align-items: flex-end;
    }
    .report-header h2 { font-size: 18px; font-weight: 700; }
    .report-header p  { font-size: 11px; margin-top: 4px; opacity: .85; }
    .report-header .meta { text-align: right; font-size: 11px; opacity: .85; }

    /* ── table ── */
    .wrap { padding: 16px 20px; }
    table { width: 100%; border-collapse: collapse; margin-top: 8px; }
    thead th {
      background: #0891b2; color: #fff;
      padding: 7px 8px; text-align: left; font-size: 12px;
      white-space: nowrap;
    }
    thead th.r { text-align: right; }
    tbody td { padding: 6px 8px; border-bottom: 1px solid #e5e7eb; vertical-align: top; font-size: 12px; }
    tbody td.r { text-align: right; }
    tbody tr:nth-child(even) td { background: #f0fdfe; }
    tbody tr:hover td { background: #cffafe; }

    /* ── status badges ── */
    .badge {
      display: inline-block; padding: 2px 7px;
      border-radius: 99px; font-size: 10px; font-weight: 700;
      white-space: nowrap;
    }
    .badge-ongoing   { background: #dbeafe; color: #1d4ed8; }
    .badge-completed { background: #dcfce7; color: #15803d; }
    .badge-overdue   { background: #fee2e2; color: #b91c1c; }
    .badge-expired-loan { background: #ffe4e6; color: #9f1239; }
    .badge-disbursed { background: #fef9c3; color: #a16207; }
    .badge-approved  { background: #ede9fe; color: #7c3aed; }
    .badge-pending   { background: #f3f4f6; color: #374151; }

    .customer-name { text-transform: capitalize; }

    /* ── footer ── */
    .report-footer {
      margin-top: 24px; padding: 10px 20px;
      border-top: 2px solid #06b6d4;
      font-size: 12px; color: #6b7280;
      display: flex; justify-content: space-between;
    }

    @media print {
      .toolbar { display: none !important; }
      body { font-size: 10px; }
      thead th { font-size: 9px; }
      tbody td { font-size: 9px; padding: 4px 6px; }
      .report-header h2 { font-size: 14px; }
    }
  </style>
</head>
<body>

<?php $download_mode = !empty($download_mode); ?>

<!-- ── Toolbar (screen only) ── -->
<?php if (!$download_mode): ?>
<div class="toolbar no-print">
  <h1>Loans Issued – <?= htmlspecialchars($officer_name ?? '', ENT_QUOTES, 'UTF-8'); ?></h1>
  <button class="btn btn-cyan" onclick="window.print()">
    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
    </svg>
    Download
  </button>
  <button class="btn btn-gray" onclick="window.close()">Close</button>
</div>
<?php endif; ?>

<!-- ── Report Header ── -->
<div class="report-header">
  <div>
    <h2>Loans Issued</h2>
    <p>Officer: <?= htmlspecialchars($officer_name ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
  </div>
  <div class="meta">
    <div>Generated: <?= date('d M Y, H:i'); ?></div>
    <div>Total Records: <?= count($loans ?? []); ?></div>
  </div>
</div>

<!-- ── Table ── -->
<div class="wrap">
<?php if (empty($loans)): ?>
  <p style="color:#6b7280; margin-top:16px;">No loans issued found for this officer.</p>
<?php else: ?>
<?php
  $status_map = [
    'withdrawal' => ['label' => 'Ongoing',   'class' => 'badge-ongoing'],
    'done'       => ['label' => 'Completed', 'class' => 'badge-completed'],
    'out'        => ['label' => 'Overdue',   'class' => 'badge-overdue'],
    'expired_loan' => ['label' => 'Expired Loan', 'class' => 'badge-expired-loan'],
    'disbarsed'  => ['label' => 'Disbursed', 'class' => 'badge-disbursed'],
    'aproved'    => ['label' => 'Approved',  'class' => 'badge-approved'],
    'open'       => ['label' => 'Pending',   'class' => 'badge-pending'],
  ];
?>
<table>
  <thead>
    <tr>
      <th>#</th>
      <th>Customer Name</th>
      <th>Phone</th>
      <th class="r">Principal</th>
      <th class="r">Loan Amount</th>
      <th>Duration</th>
      <th class="r">Principal Paid</th>
      <th class="r">Interest Paid</th>
      <th class="r">Total Paid</th>
      <th>Approved By</th>
      <th>Disburse Date</th>
      <th>End Date</th>
      <th>Last Payment</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
  <?php $sn = 1; foreach ($loans as $loan): ?>
  <?php
    $day_value      = (int) ($loan->day ?? 0);
    $session_value  = trim((string) ($loan->session ?? ''));
    $duration_base  = strtolower((string) ($loan->duration_type ?? 'custom'));
    $duration_suffix = $session_value !== '' ? $session_value : (string) $day_value;
    $duration_label  = $duration_base . '(' . $duration_suffix . ')';

    $status_raw  = strtolower(trim((string) ($loan->loan_status ?? '')));
    $loan_end_ts = !empty($loan->loan_end_date) ? strtotime((string) $loan->loan_end_date) : false;
    $is_expired_by_date = $loan_end_ts !== false && $loan_end_ts < strtotime(date('Y-m-d'));
    $loan_amount = (float) ($loan->loan_int ?? 0);
    $total_paid = (float) ($loan->total_paid_amount ?? 0);
    $is_unpaid_balance = abs($loan_amount - $total_paid) > 0.009;
    if ($is_expired_by_date && $is_unpaid_balance) {
      $status_raw = 'expired_loan';
    }
    $status_info = $status_map[$status_raw] ?? ['label' => ucfirst($status_raw), 'class' => 'badge-pending'];
  ?>
  <tr>
    <td><?= $sn++; ?></td>
    <td class="customer-name"><?= htmlspecialchars(ucwords(strtolower((string) ($loan->customer_name ?? ''))), ENT_QUOTES, 'UTF-8'); ?></td>
    <td><?= htmlspecialchars($loan->customer_phone ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
    <td class="r">TZS <?= number_format((float)($loan->loan_aprove ?? 0), 2); ?></td>
    <td class="r">TZS <?= number_format((float)($loan->loan_int ?? 0), 2); ?></td>
    <td><?= htmlspecialchars($duration_label, ENT_QUOTES, 'UTF-8'); ?></td>
    <td class="r">TZS <?= number_format((float)($loan->total_principal_paid ?? 0), 2); ?></td>
    <td class="r">TZS <?= number_format((float)($loan->total_interest_paid ?? 0), 2); ?></td>
    <td class="r">TZS <?= number_format((float)($loan->total_paid_amount ?? 0), 2); ?></td>
    <td><?= htmlspecialchars($loan->approved_by ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
    <td><?= $loan->loan_stat_date ? date('d M Y', strtotime($loan->loan_stat_date)) : '-'; ?></td>
    <td><?= $loan->loan_end_date ? date('d M Y', strtotime($loan->loan_end_date)) : '-'; ?></td>
    <td><?= $loan->last_payment_date ? date('d M Y', strtotime($loan->last_payment_date)) : '-'; ?></td>
    <td><span class="badge <?= $status_info['class']; ?>"><?= $status_info['label']; ?></span></td>
  </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?php endif; ?>
</div>

<!-- ── Footer ── -->
<div class="report-footer">
  <span>Loan Pocket Management System</span>
  <span>Generated: <?= date('d M Y H:i:s'); ?></span>
</div>

</body>
</html>
