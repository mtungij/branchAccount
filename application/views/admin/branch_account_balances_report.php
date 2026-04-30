<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $compdata->comp_name; ?> | BRANCH ACCOUNT BALANCES REPORT</title>
</head>
<body>

<div id="container">
  <style>
    .c {
      text-transform: uppercase;
    }

    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 5px;
    }
  </style>

  <table style="border: none; width: 100%;">
    <tr style="border: none;">
      <td style="border: none; width: 120px;">
        <?php if (!empty($compdata->comp_logo)): ?>
          <img src="<?php echo base_url() . 'assets/img/' . $compdata->comp_logo; ?>" style="width: 100px; height: 80px;">
        <?php endif; ?>
      </td>
      <td style="border: none; text-align: center;">
        <p style="font-size:14px;" class="c"><b><?php echo $compdata->comp_name; ?></b><br>
          <b><?php echo $compdata->adress; ?></b>
        </p>
        <p style="font-size:12px; text-align:center;" class="c">BRANCH ACCOUNT BALANCES REPORT</p>
        <?php if (!empty($from) || !empty($to)): ?>
          <p style="font-size:11px; text-align:center;">
            <?php echo !empty($from) ? htmlspecialchars($from, ENT_QUOTES, 'UTF-8') : '-'; ?>
            to
            <?php echo !empty($to) ? htmlspecialchars($to, ENT_QUOTES, 'UTF-8') : '-'; ?>
          </p>
        <?php endif; ?>
      </td>
    </tr>
  </table>

  <hr>

  <?php
    $grouped_balances = [];
    if (!empty($balances)) {
      foreach ($balances as $row) {
        $branch_name = $row->blanch_name ?? '-';
        if (!isset($grouped_balances[$branch_name])) {
          $grouped_balances[$branch_name] = [
            'rows' => [],
            'subtotal' => 0,
          ];
        }

        $amount = (float)($row->blanch_capital ?? 0);
        $grouped_balances[$branch_name]['rows'][] = $row;
        $grouped_balances[$branch_name]['subtotal'] += $amount;
      }
    }
  ?>

  <table>
    <tr>
      <th style="font-size:12px; border: none; width: 60px;">S/No.</th>
      <th style="font-size:12px; border: none;">Branch</th>
      <th style="font-size:12px; border: none;">Account Name</th>
      <th style="font-size:12px; border: none; text-align: right;">Balance</th>
    </tr>

    <?php if (!empty($grouped_balances)): ?>
      <?php $no = 1; ?>
      <?php foreach ($grouped_balances as $branch_name => $branch_data): ?>
        <tr>
          <td colspan="4" style="font-size:12px; font-weight: bold; background: #eeeeee;" class="c">
            <?php echo htmlspecialchars($branch_name, ENT_QUOTES, 'UTF-8'); ?>
          </td>
        </tr>
        <?php foreach ($branch_data['rows'] as $row): ?>
          <tr>
            <td style="font-size:12px; border: none;"><?php echo $no++; ?>.</td>
            <td style="font-size:12px; border: none;" class="c"><?php echo htmlspecialchars($branch_name, ENT_QUOTES, 'UTF-8'); ?></td>
            <td style="font-size:12px; border: none;" class="c"><?php echo htmlspecialchars($row->account_name ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
            <td style="font-size:12px; border: none; text-align: right;"><?php echo number_format((float)($row->blanch_capital ?? 0)); ?></td>
          </tr>
        <?php endforeach; ?>
        <tr>
          <td style="border: none;"></td>
          <td colspan="2" style="font-size:12px; border: none;"><b>Branch Total</b></td>
          <td style="font-size:12px; border: none; text-align: right;"><b><?php echo number_format($branch_data['subtotal']); ?></b></td>
        </tr>
      <?php endforeach; ?>

      <tr>
        <td style="border: none;"></td>
        <td colspan="2" style="font-size:13px; border: none;"><b>GRAND TOTAL</b></td>
        <td style="font-size:13px; border: none; text-align: right;"><b><?php echo number_format((float)($total_balance_amount ?? 0)); ?></b></td>
      </tr>
    <?php else: ?>
      <tr>
        <td colspan="4" style="font-size:12px; border: none; text-align: center;">No account balances found.</td>
      </tr>
    <?php endif; ?>
  </table>
</div>

</body>
</html>
