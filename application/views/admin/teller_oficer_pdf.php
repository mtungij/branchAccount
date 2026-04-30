<?php
$t = function ($key, $fallback) {
    $line = $this->lang->line($key);
    return ($line !== false && $line !== '') ? $line : $fallback;
};
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo htmlspecialchars($t('teller_officer_performance', 'Teller Officer Performance')); ?></title>
  <style>
    body {
      font-family: DejaVu Sans, sans-serif;
      font-size: 11px;
      color: #0f172a;
    }

    .head {
      margin-bottom: 10px;
      border-bottom: 1px solid #cbd5e1;
      padding-bottom: 8px;
    }

    .title {
      font-size: 18px;
      font-weight: 700;
      margin: 0;
    }

    .meta {
      margin-top: 4px;
      color: #334155;
      font-size: 10px;
    }

    .filter-box {
      margin: 10px 0 14px;
      border: 1px solid #cbd5e1;
      background: #f8fafc;
      padding: 8px;
      font-size: 10px;
    }

    .section-title {
      margin: 12px 0 6px;
      font-size: 13px;
      font-weight: 700;
      color: #0f172a;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 10px;
    }

    th,
    td {
      border: 1px solid #cbd5e1;
      padding: 5px;
      font-size: 10px;
      vertical-align: top;
    }

    th {
      background: #e2e8f0;
      text-align: left;
      font-weight: 700;
    }

    .total-row td {
      background: #f1f5f9;
      font-weight: 700;
    }

    .empty {
      border: 1px dashed #94a3b8;
      padding: 10px;
      text-align: center;
      color: #334155;
      font-size: 10px;
      margin-top: 8px;
    }
  </style>
</head>
<body>
  <div class="head">
    <p class="title"><?php echo htmlspecialchars($t('teller_officer_performance', 'Teller Officer Performance')); ?></p>
    <div class="meta">
      <?php if (!empty($compdata) && !empty($compdata->comp_name)): ?>
        <?php echo htmlspecialchars($compdata->comp_name); ?> |
      <?php endif; ?>
      <?php echo date('Y-m-d H:i'); ?>
    </div>
  </div>

  <div class="filter-box">
    <strong><?php echo htmlspecialchars($t('filter_data', 'Filter Data')); ?>:</strong>
    <?php echo htmlspecialchars($t('from_date', 'From Date')); ?>: <?php echo htmlspecialchars($from); ?> |
    <?php echo htmlspecialchars($t('to_date', 'To Date')); ?>: <?php echo htmlspecialchars($to); ?> |
    <?php echo htmlspecialchars($t('branch', 'Branch')); ?>: <?php echo htmlspecialchars($selected_branch_name); ?> |
    <?php echo htmlspecialchars($t('officer', 'Officer')); ?>: <?php echo htmlspecialchars($selected_officer_name); ?>
  </div>

  <?php if (!empty($empl_oficer)): ?>
    <?php foreach ($empl_oficer as $oficer_datas): ?>
      <?php
      $empl_loan = $this->queries->get_loan_empl_data($oficer_datas->empl_id, $from, $to, $blanch_id);
      $total_restration = 0;
      $total_received = 0;
      $total_withdrawal = 0;
      ?>

      <p class="section-title"><?php echo htmlspecialchars($oficer_datas->empl_name); ?></p>

      <?php if (!empty($empl_loan)): ?>
        <table>
          <thead>
            <tr>
              <th><?php echo htmlspecialchars($t('s_no', 'S/No')); ?></th>
              <th><?php echo htmlspecialchars($t('customer_name', 'Customer Name')); ?></th>
              <th><?php echo htmlspecialchars($t('phone_number', 'Phone Number')); ?></th>
              <th><?php echo htmlspecialchars($t('duration_type', 'Duration')); ?></th>
              <th><?php echo htmlspecialchars($t('receivable_label', 'Receivable')); ?></th>
              <th><?php echo htmlspecialchars($t('received_label', 'Received')); ?></th>
              <th><?php echo htmlspecialchars($t('deposit_account_label', 'Deposit Account')); ?></th>
              <th><?php echo htmlspecialchars($t('withdrawal_label', 'Withdrawal')); ?></th>
              <th><?php echo htmlspecialchars($t('withdraw_account_label', 'Withdraw Account')); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($empl_loan as $empl_loans): ?>
              <?php
              $total_restration += (float) $empl_loans->restration;
              $total_received += (float) $empl_loans->total_received;
              $total_withdrawal += (float) $empl_loans->total_withdrawal;
              ?>
              <tr>
                <td><?php echo $no++; ?>.</td>
                <td><?php echo htmlspecialchars($empl_loans->f_name . ' ' . $empl_loans->m_name . ' ' . $empl_loans->l_name); ?></td>
                <td><?php echo htmlspecialchars($empl_loans->phone_no); ?></td>
                <td>
                  <?php
                  if ($empl_loans->day == '1') {
                    echo htmlspecialchars($t('daily', 'Daily'));
                  } elseif ($empl_loans->day == '7') {
                    echo htmlspecialchars($t('weekly', 'Weekly'));
                  } elseif (in_array($empl_loans->day, array('28', '29', '30', '31'), true)) {
                    echo htmlspecialchars($t('monthly', 'Monthly'));
                  } else {
                    echo htmlspecialchars($t('not_available_short', 'N/A'));
                  }
                  ?>
                </td>
                <td><?php echo number_format((float) $empl_loans->restration); ?></td>
                <td><?php echo number_format((float) $empl_loans->total_received); ?></td>
                <td><?php echo htmlspecialchars($empl_loans->depost_account); ?></td>
                <td><?php echo number_format((float) $empl_loans->total_withdrawal); ?></td>
                <td><?php echo htmlspecialchars($empl_loans->with_account); ?></td>
              </tr>
            <?php endforeach; ?>

            <tr class="total-row">
              <td></td>
              <td><?php echo htmlspecialchars($t('total', 'TOTAL')); ?></td>
              <td></td>
              <td></td>
              <td><?php echo number_format($total_restration); ?></td>
              <td><?php echo number_format($total_received); ?></td>
              <td></td>
              <td><?php echo number_format($total_withdrawal); ?></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      <?php else: ?>
        <div class="empty"><?php echo htmlspecialchars($t('no_customer_records_officer', 'No customer records found for this officer.')); ?></div>
      <?php endif; ?>
    <?php endforeach; ?>
  <?php else: ?>
    <div class="empty"><?php echo htmlspecialchars($t('no_officer_data_available', 'No officer data available')); ?></div>
  <?php endif; ?>
</body>
</html>
