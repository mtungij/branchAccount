<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <?php
    $lang_line = function ($key, $fallback = '') {
      $line = $this->lang->line($key);
      return ($line !== false && $line !== '') ? $line : $fallback;
    };
  ?>
  <title><?= htmlspecialchars($compdata->comp_name) ?> | DEFAULTERS REPORT</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 12px;
      color: #333;
    }
    .header {
      text-align: center;
      margin-bottom: 10px;
    }
    .header img {
      max-height: 80px;
      margin-bottom: 8px;
    }
    table {
      border-collapse: collapse;
      width: 100%;
      margin-top: 10px;
      font-size: 12px;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 6px 8px;
      text-align: left;
    }
    th {
      background: #00bcd4;
      color: #fff;
    }
    .total-row {
      background: #f2f2f2;
      font-weight: bold;
    }
    .section-title {
      margin-top: 16px;
      font-weight: bold;
      text-align: left;
    }
    .branch-header {
      background: #e0f7fa;
      color: #006064;
      padding: 6px 10px;
      font-weight: bold;
    }
    .grand-total {
      background: #00bcd4;
      color: #fff;
      padding: 10px;
      text-align: center;
      font-weight: bold;
      margin-top: 20px;
      border-radius: 6px;
    }
    .grand-total-body {
      background: #e0f7fa;
      color: #006064;
      padding: 12px 16px;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      font-size: 12px;
      border-radius: 4px;
    }
    .grand-total-item {
      flex: 1 1 45%;
      margin-bottom: 6px;
      min-width: 200px;
    }
    .no-data {
      text-align: center;
      padding: 20px;
      font-style: italic;
    }
  </style>
</head>
<body>

  <!-- Header -->
  <div class="header">
    <?php if (!empty($compdata->comp_logo) && file_exists(FCPATH . 'assets/images/company_logo/' . $compdata->comp_logo)): ?>
      <img src="<?= base_url('assets/images/company_logo/' . $compdata->comp_logo) ?>" alt="Company Logo">
    <?php endif; ?>
    <h2><?= htmlspecialchars($compdata->comp_name) ?></h2>
    <p><?= htmlspecialchars($compdata->adress) ?></p>
    <p><strong><?= $lang_line('pdf_defaulters_3_30_report', 'Defaulters Report (3-30 Days Past Due)') ?></strong></p>
    <p><?= $lang_line('date', 'Date') ?>: <?= date("d-m-Y") ?></p>
  

  </div>

  <hr>

  <?php
    // Group by branch
    $branches = [];
    if (!empty($outstand)) {
      foreach ($outstand as $row) {
        $branches[$row->blanch_name][] = $row;
      }
    }
  ?>

  <?php if (!empty($branches)): ?>
    <?php 
      $grand_loan = $grand_restoration = $grand_paid = $grand_remain = 0; 
      $branch_no = 1; 
    ?>
    <?php foreach ($branches as $branch_name => $branch_rows): ?>
      <div class="branch-header">
        <?= $branch_no++ ?>. <?= $lang_line('branch', 'Branch') ?>: <b><?= htmlspecialchars($branch_name) ?></b>
      </div>
      <table>
        <thead>
          <tr>
            <th><?= $lang_line('s_no', 'S/No') ?></th>
            <th><?= $lang_line('customer_name', 'Customer Name') ?></th>
            <th><?= $lang_line('phone_number', 'Phone Number') ?></th>
            <th><?= $lang_line('loan_amount', 'Loan Amount') ?></th>
            <th><?= $lang_line('outstand_restoration', 'Restoration') ?></th>
            <th><?= $lang_line('duration_type', 'Duration Type') ?></th>
            <th><?= $lang_line('amount_paid', 'Amount Paid') ?></th>
            <th><?= $lang_line('remain_amount', 'Remain Amount') ?></th>
            <th><?= $lang_line('overdue_days', 'Overdue Days') ?></th>
            <th><?= $lang_line('start_date', 'Start Date') ?></th>
            <th><?= $lang_line('end_date', 'End Date') ?></th>
          </tr>
        </thead>
        <tbody>
          <?php
            $b_loan = $b_restoration = $b_paid = $b_remain = 0;
            $no = 1;
            foreach ($branch_rows as $outstands):
              $b_loan += $outstands->loan_int;
              $b_restoration += $outstands->restration;
              $b_paid += $outstands->total_deposit;
              $b_remain += ($outstands->loan_int - $outstands->total_deposit);
          ?>
          <tr>
            <td><?= $no++; ?>.</td>
            <td><?= mb_strtoupper($outstands->f_name . ' ' . $outstands->m_name . ' ' . $outstands->l_name, 'UTF-8') ?></td>
            <td><?= $outstands->phone_no ?></td>
            <td><?= number_format($outstands->loan_int) ?></td>
            <td><?= number_format($outstands->restration) ?></td>
            <td>
              <?php 
                if ($outstands->day == 1) $duration = $lang_line('daily', 'Daily');
                elseif ($outstands->day == 7) $duration = $lang_line('weekly', 'Weekly');
                elseif (in_array($outstands->day, [28,29,30,31])) $duration = $lang_line('monthly', 'Monthly');
                else $duration = "-";
                echo $duration . ' (' . number_format($outstands->session) . ')';
              ?>
            </td>
            <td><?= number_format($outstands->total_deposit) ?></td>
            <td><?= number_format($outstands->loan_int - $outstands->total_deposit) ?></td>
            <td><b>
              <?= ($outstands->total_deposit >= $outstands->loan_int) ? 0 : $outstands->overdue_days ?>
            </b></td>
            <td><?= substr($outstands->loan_stat_date, 0, 10) ?></td>
            <td><?= substr($outstands->loan_end_date, 0, 10) ?></td>
          </tr>
          <?php endforeach; ?>
          <!-- Branch Subtotals -->
          <tr class="total-row">
            <td colspan="3" style="text-align:right;"><?= $lang_line('branch_total', 'Branch Total') ?>:</td>
            <td><?= number_format($b_loan) ?></td>
            <td><?= number_format($b_restoration) ?></td>
            <td></td>
            <td><?= number_format($b_paid) ?></td>
            <td><?= number_format($b_remain) ?></td>
            <td colspan="3"></td>
          </tr>
        </tbody>
      </table>
      <?php
        $grand_loan += $b_loan;
        $grand_restoration += $b_restoration;
        $grand_paid += $b_paid;
        $grand_remain += $b_remain;
      ?>
    <?php endforeach; ?>

    <!-- Grand Totals -->
    <div class="grand-total"><?= $lang_line('grand_totals', 'Grand Totals') ?></div>
    <div class="grand-total-body">
      <div class="grand-total-item"><b><?= $lang_line('pdf_total_loan_amount', 'Total Loan Amount') ?>:</b> <?= number_format($grand_loan) ?></div>
      <div class="grand-total-item"><b><?= $lang_line('pdf_total_restoration', 'Total Restoration') ?>:</b> <?= number_format($grand_restoration) ?></div>
      <div class="grand-total-item"><b><?= $lang_line('pdf_total_paid', 'Total Paid') ?>:</b> <?= number_format($grand_paid) ?></div>
      <div class="grand-total-item"><b><?= $lang_line('pdf_total_remain', 'Total Remain') ?>:</b> <?= number_format($grand_remain) ?></div>
    </div>

  <?php else: ?>
    <div class="no-data"><?= $lang_line('pdf_no_defaulters_selected', 'No defaulters found for the selected criteria.') ?></div>
  <?php endif; ?>

</body>
</html>