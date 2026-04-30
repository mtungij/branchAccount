<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <?php
  $lang_line = function ($key, $fallback) {
    $value = $this->lang->line($key);
    return !empty($value) ? $value : $fallback;
  };

  $txt_all_customer_report = $lang_line('pdf_all_customer_report', 'All Customer Report');
  $txt_s_no = $lang_line('s_no', 'S/No.');
  $txt_customer_id = $lang_line('customer_id', 'Customer ID');
  $txt_customer_name = $lang_line('customer_name', 'Customer Name');
  $txt_phone_number = $lang_line('phone_number', 'Phone Number');
  $txt_date_of_birth = $lang_line('date_of_birth', 'Date Of Birth');
  $txt_sex = $lang_line('sex', 'Sex');
  $txt_branch_name = $lang_line('branch', 'Branch');
  $txt_region = $lang_line('region', 'Region');
  $txt_district = $lang_line('district', 'District');
  $txt_ward = $lang_line('ward', 'Ward');
  $txt_street = $lang_line('street', 'Street');
  $txt_joining_date = $lang_line('joining_date', 'Joining Date');
  $txt_total = $lang_line('total_customers', 'Total Customers');

  $company_name = isset($compdata->comp_name) ? $compdata->comp_name : '';
  $company_address = isset($compdata->adress) ? $compdata->adress : '';
  $branch_name = isset($blanch->blanch_name) ? $blanch->blanch_name : '';
  $company_logo = isset($compdata->comp_logo) ? $compdata->comp_logo : '';

  $logo_url = '';
  if (!empty($company_logo) && file_exists(FCPATH . 'assets/images/company_logo/' . $company_logo)) {
    $logo_url = 'file://' . FCPATH . 'assets/images/company_logo/' . $company_logo;
  } elseif (!empty($company_logo) && file_exists(FCPATH . 'assets/img/' . $company_logo)) {
    $logo_url = 'file://' . FCPATH . 'assets/img/' . $company_logo;
  }
  ?>
  <title><?php echo $company_name; ?> | <?php echo $txt_all_customer_report; ?></title>
  <style>
    body {
      font-family: sans-serif;
      color: #1f2937;
      font-size: 11px;
    }

    .letterhead {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 0;
    }

    .letterhead td {
      border: none;
      vertical-align: middle;
      padding: 0;
    }

    .logo-cell {
      width: 90px;
      padding-right: 10px;
      text-align: center;
    }

    .logo-cell img {
      max-height: 72px;
      max-width: 80px;
    }

    .comp-name {
      font-size: 20px;
      font-weight: bold;
      color: #0891b2;
      margin: 0 0 3px 0;
      letter-spacing: 0.4px;
      text-transform: uppercase;
    }

    .comp-address {
      font-size: 12px;
      color: #374151;
      margin: 0 0 3px 0;
      text-transform: uppercase;
    }

    .report-meta {
      font-size: 11px;
      color: #0e7490;
      margin: 0;
      text-transform: uppercase;
    }

    .divider {
      border: none;
      border-top: 2px solid #06b6d4;
      margin: 8px 0 8px 0;
    }

    .summary {
      margin: 0 0 8px 0;
      font-size: 11px;
      color: #0f172a;
    }

    table.report {
      width: 100%;
      border-collapse: collapse;
      margin-top: 4px;
    }

    table.report th,
    table.report td {
      border: 1px solid #a5f3fc;
      padding: 6px 7px;
      text-align: left;
    }

    table.report th {
      background: #ecfeff;
      color: #0e7490;
      font-weight: bold;
      text-transform: uppercase;
      font-size: 10.5px;
    }

    table.report tbody tr:nth-child(even) {
      background: #f8fafc;
    }

    .uppercase {
      text-transform: uppercase;
    }
  </style>
</head>
<body>

<table class="letterhead">
  <tr>
    <?php if ($logo_url): ?>
      <td class="logo-cell"><img src="<?php echo $logo_url; ?>" alt="Logo"></td>
    <?php endif; ?>
    <td>
      <p class="comp-name"><?php echo htmlspecialchars($company_name); ?></p>
      <p class="comp-address"><?php echo htmlspecialchars($company_address); ?></p>
      <p class="report-meta"><?php echo htmlspecialchars($branch_name); ?> - <?php echo $txt_all_customer_report; ?></p>
    </td>
  </tr>
</table>

<hr class="divider">

<p class="summary"><strong><?php echo $txt_total; ?>:</strong> <?php echo is_array($customer) ? count($customer) : 0; ?></p>

<table class="report">
  <thead>
    <tr>
      <th><?php echo $txt_s_no; ?></th>
      <th><?php echo $txt_customer_id; ?></th>
      <th><?php echo $txt_customer_name; ?></th>
      <th><?php echo $txt_phone_number; ?></th>
      <th><?php echo $txt_date_of_birth; ?></th>
      <th><?php echo $txt_sex; ?></th>
      <th><?php echo $txt_branch_name; ?></th>
   
      <th><?php echo $txt_joining_date; ?></th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; ?>
    <?php foreach ($customer as $customers): ?>
      <tr>
        <td><?php echo $no++; ?>.</td>
        <td class="uppercase"><?php echo $customers->customer_code; ?></td>
        <td class="uppercase"><?php echo $customers->f_name . ' ' . $customers->m_name . ' ' . $customers->l_name; ?></td>
        <td><?php echo $customers->phone_no; ?></td>
        <td><?php echo $customers->date_birth; ?></td>
        <td><?php echo $customers->gender; ?></td>
        <td><?php echo $customers->blanch_name; ?></td>
        <td><?php echo substr($customers->customer_day, 0, 10); ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

</body>
</html>




