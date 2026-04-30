<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo !empty($compdata->comp_name) ? $compdata->comp_name : 'Company'; ?> | BRANCH CUSTOMER REPORT</title>
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

    .meta,
    .report-date {
      font-size: 11px;
      color: #334155;
      margin: 0;
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
      <td>
        <p class="report-title">Branch Customer Report</p>
        <p class="company-name"><?php echo !empty($compdata->comp_name) ? $compdata->comp_name : '-'; ?></p>
        <p class="meta">Branch: <?php echo !empty($blanch->blanch_name) ? $blanch->blanch_name : '-'; ?></p>
        <p class="report-date">Generated: <?php echo date('d M Y H:i'); ?></p>
      </td>
    </tr>
  </table>

  <div class="divider"></div>

  <?php if (!empty($customer_blanch)): ?>
    <table class="report-table">
      <thead>
        <tr>
          <th>S/No.</th>
          <th>Customer ID</th>
          <th>Customer Name</th>
          <th>Date of Birth</th>
          <th>Sex</th>
          <th>Phone Number</th>
          <th>Date</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        <?php foreach ($customer_blanch as $customers): ?>
          <tr>
            <td><?php echo $no++; ?>.</td>
            <td><?php echo !empty($customers->customer_code) ? $customers->customer_code : '-'; ?></td>
            <td><?php echo trim(($customers->f_name ?? '') . ' ' . ($customers->m_name ?? '') . ' ' . ($customers->l_name ?? '')); ?></td>
            <td><?php echo !empty($customers->date_birth) ? $customers->date_birth : '-'; ?></td>
            <td><?php echo !empty($customers->gender) ? $customers->gender : '-'; ?></td>
            <td><?php echo !empty($customers->phone_no) ? $customers->phone_no : '-'; ?></td>
            <td><?php echo !empty($customers->customer_day) ? substr($customers->customer_day, 0, 10) : '-'; ?></td>
            <td>
              <?php
                if (!empty($customers->customer_status) && $customers->customer_status == 'open') {
                  echo 'Active';
                } elseif (!empty($customers->customer_status) && $customers->customer_status == 'close') {
                  echo 'Blocked';
                } else {
                  echo !empty($customers->customer_status) ? ucfirst($customers->customer_status) : '-';
                }
              ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else: ?>
    <div class="empty-state">No customers found for this branch.</div>
  <?php endif; ?>
</div>
</body>
</html>
