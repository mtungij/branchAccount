
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $compdata->comp_name; ?> | ALL CUSTOMER REPORT</title>
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

    .uppercase {
      text-transform: uppercase;
    }

    .status {
      font-weight: bold;
      color: #155e75;
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
<?php
  $logo_path = '';
  if (!empty($compdata->comp_logo) && file_exists(FCPATH . 'assets/img/' . $compdata->comp_logo)) {
      $logo_path = base_url('assets/img/' . $compdata->comp_logo);
  }
?>

<div class="page">
  <table class="header-table">
    <tr>
      <td class="logo-box">
        <?php if (!empty($logo_path)): ?>
          <img src="<?php echo $logo_path; ?>" class="logo" alt="Company Logo">
        <?php endif; ?>
      </td>
      <td>
        <p class="report-title">All Customer Report</p>
        <p class="company-name"><?php echo $compdata->comp_name; ?></p>
        <p class="company-address"><?php echo $compdata->adress; ?></p>
        <?php if (!empty($filter_label)): ?>
          <p class="filter-label"><?php echo $filter_label; ?></p>
        <?php endif; ?>
        <p class="report-date">Generated: <?php echo date('d M Y'); ?></p>
      </td>
    </tr>
  </table>

  <div class="divider"></div>

  <?php if (!empty($customer)): ?>
    <table class="report-table">
      <thead>
        <tr>
          <th>S/No.</th>
          <th>Customer ID</th>
          <th>Customer Name</th>
          <th>Phone Number</th>
          <th>Date Of Birth</th>
          <th>Sex</th>
          <th>Branch</th>
          <th>Region</th>
          <th>District</th>
          <th>Ward</th>
          <th>Street</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        <?php foreach ($customer as $customers): ?>
          <tr>
            <td class="uppercase"><?php echo $no++; ?>.</td>
            <td class="uppercase"><?php echo $customers->customer_code; ?></td>
            <td class="uppercase"><?php echo trim($customers->f_name . ' ' . $customers->m_name . ' ' . $customers->l_name); ?></td>
            <td class="uppercase"><?php echo $customers->phone_no; ?></td>
            <td><?php echo $customers->date_birth; ?></td>
            <td><?php echo $customers->gender; ?></td>
            <td><?php echo $customers->blanch_name; ?></td>
            <td><?php echo !empty($customers->region_name) ? $customers->region_name : '-'; ?></td>
            <td><?php echo !empty($customers->district) ? $customers->district : '-'; ?></td>
            <td><?php echo !empty($customers->ward) ? $customers->ward : '-'; ?></td>
            <td><?php echo !empty($customers->street) ? $customers->street : '-'; ?></td>
            <td class="status">
              <?php
                if ($customers->customer_status == 'open') {
                    echo 'Active';
                } elseif ($customers->customer_status == 'close') {
                    echo 'Closed';
                } elseif ($customers->customer_status == 'pending') {
                    echo 'Pending';
                } elseif ($customers->customer_status == 'out') {
                    echo 'Default';
                } else {
                    echo ucfirst($customers->customer_status);
                }
              ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else: ?>
    <div class="empty-state">No customers found for the selected filter.</div>
  <?php endif; ?>
</div>

</body>
</html>




