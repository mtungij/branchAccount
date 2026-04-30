<!DOCTYPE html>
<html lang="sw">
<head>
  <meta charset="utf-8">
  <title><?php echo $compdata->comp_name; ?> | CUSTOMER ACCOUNT STATEMENT</title>
  <style>
    /* ===== GENERAL STYLES ===== */
    body {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      background: #eef2f7;
      color: #333;
      margin: 0;
      padding: 30px;
    }

    #container {
      background: #fff;
      max-width: 900px;
      margin: auto;
      padding: 30px 40px;
      border-radius: 10px;
      box-shadow: 0px 4px 20px rgba(0,0,0,0.08);
    }

    /* ===== HEADER ===== */
    .header {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      border-bottom: 3px solid #007bff;
      padding-bottom: 15px;
      margin-bottom: 25px;
      gap: 15px;
      flex-wrap: wrap;
    }

    .header-left {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .header-left img {
      width: 90px;
      height: 80px;
      object-fit: contain;
    }

    .company-info {
      line-height: 1.4;
    }

    .company-info b {
      font-size: 22px;
      color: #007bff;
    }

    .company-info small {
      color: #555;
    }

    .header-right {
      text-align: right;
      font-size: 13px;
      color: #333;
      border: 1px solid #e2e6ea;
      padding: 10px 12px;
      border-radius: 8px;
      background: #f9fbff;
      min-width: 180px;
    }

    .header-right span {
      display: block;
      font-weight: 600;
      color: #007bff;
      font-size: 13px;
    }

    /* ===== SECTION TITLES ===== */
    .section-title {
      font-size: 18px;
      color: #007bff;
      font-weight: 600;
      margin-top: 25px;
      border-bottom: 2px solid #007bff;
      padding-bottom: 6px;
    }

    /* ===== CUSTOMER INFO ===== */
    .customer-info {
      background: #f9fbff;
      border: 1px solid #d6e4ff;
      border-radius: 10px;
      padding: 20px 25px;
      margin-top: 10px;
      box-shadow: inset 0 0 10px rgba(0, 123, 255, 0.05);
    }

    .info-row {
      display: flex;
      justify-content: space-between;
      gap: 20px;
      margin-bottom: 12px;
      flex-wrap: wrap;
    }

    .info-box {
      flex: 1;
      min-width: 260px;
      background: #fff;
      border: 1px solid #e2e6ea;
      border-radius: 8px;
      padding: 12px 15px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.05);
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .info-box:hover {
      transform: translateY(-2px);
      box-shadow: 0 3px 8px rgba(0,123,255,0.15);
    }

    .label {
      display: block;
      font-size: 13px;
      font-weight: 600;
      color: #007bff;
      margin-bottom: 2px;
      text-transform: uppercase;
      letter-spacing: 0.3px;
    }

    .value {
      font-size: 14px;
      color: #333;
      font-weight: 500;
    }

    .text-red {
      color: #dc3545;
      font-weight: 600;
    }

    /* ===== TABLE ===== */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      border-radius: 8px;
      overflow: hidden;
    }

    th, td {
      border: 1px solid #e1e5eb;
      padding: 10px;
      text-align: left;
      font-size: 13px;
    }

    th {
      background-color: #007bff;
      color: white;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    tr:nth-child(even) {
      background-color: #f8f9fb;
    }

    tr:hover {
      background-color: #e9f4ff;
    }

    /* ===== HIGHLIGHT ROW FOR SPECIFIC DATES ===== */
    .highlight-red {
      background-color: #f8d7da; /* light red */
    }

    .highlight-red td {
      color: #721c24; /* dark red text */
      font-weight: bold;
    }

    /* ===== TOTAL PENALTY ===== */
    .total-penalty {
      margin-top: 20px;
      background: #f1f3f9;
      border-top: 3px solid #007bff;
      padding: 10px 12px;
      font-weight: 600;
      text-align: right;
      border-radius: 0 0 8px 8px;
    }

    /* ===== FOOTER ===== */
    .footer {
      margin-top: 35px;
      font-size: 12px;
      color: #888;
      text-align: center;
      border-top: 1px solid #ccc;
      padding-top: 8px;
    }

    /* ===== PRINT ===== */
    @media print {
      body { background: white; margin: 0; padding: 0; }
      #container { box-shadow: none; border: none; }
      .info-box:hover { transform: none; box-shadow: none; }
      .header-right { border: none; background: none; }
    }
  </style>
</head>

<body>
  <div id="container">

    <!-- HEADER -->
    <div class="header">
      <div class="header-right">
        <span>Imetumwa Tarehe:</span> <?php echo date("d-m-Y H:i"); ?><br>
        <span>Imetumwa Na:</span> <?php echo $empl_data->empl_name; ?>
      </div>
    </div>

    <!-- CUSTOMER INFO -->
    <div class="section-title">Taarifa za Mteja</div>

    <table class="customer-table">
      <tr>
        <th>Jina</th>
        <td><?php echo "$statement->f_name $statement->m_name $statement->l_name"; ?></td>
      </tr>
      <tr>
        <th>Kiasi cha Mkopo</th>
        <td><?php echo number_format($customer_loan_data->loan_int); ?></td>
      </tr>
      <tr>
        <th>Namba ya Simu</th>
        <td><?php echo $statement->phone_no; ?></td>
      </tr>
      <tr>
        <th>Aina ya Marejesho</th>
        <td>
          <?php
            $day = $customer_loan_data->day;
            $session = $customer_loan_data->session;
            if ($day == 1) $repayment_type = "Marejesho ya siku";
            elseif ($day == 7) $repayment_type = "Marejesho ya wiki";
            elseif (in_array($day, [28,29,30,31])) $repayment_type = "Marejesho ya mwezi";
            else $repayment_type = "Marejesho maalum";
            echo "$repayment_type ($session)";
          ?>
        </td>
      </tr>
      <tr>
        <th>Tawi</th>
        <td><?php echo $statement->blanch_name; ?></td>
      </tr>
      <tr>
        <th>Code ya Tawi</th>
        <td><?php echo $statement->branch_code; ?></td>
      </tr>
      <tr>
        <th>Jumla ya Malipo</th>
        <td><?php echo number_format($total_depost->total_Deposit); ?></td>
      </tr>
      <tr>
        <th>Deni</th>
        <td class="text-red"><?php echo number_format(($customer_loan_data->loan_int) - ($total_depost->total_Deposit)); ?></td>
      </tr>
    </table>

    <!-- TRANSACTION TABLE -->
    <div class="section-title">Statement ya Malipo</div>

    <table>
      <thead>
        <tr>
          <th>Tarehe</th>
          <th>Maelezo</th>
          <th>Kiasi Lipwa</th>
          <th>Kiasi Tolewa</th>
          <th>Salio</th>
          <th>Deni</th>
          <th>Penalt</th>
        </tr>
      </thead>
     <tbody>

  <?php 
$total_penalty = 0;
$total_rows = count($payisnull);
$row_index = 0;

// --- Step 1: Prepare remaining debts from bottom to top ---
$payisnull_reversed = array_reverse($payisnull);
$debts = [];
$remaining_debt = $customer_loan_data->loan_int;

foreach ($payisnull_reversed as $payisnulls) {
    $deposit = floatval($payisnulls->depost ?? 0);
    $remaining_debt -= $deposit;
    $debts[$payisnulls->pay_id] = $remaining_debt >= 0 ? $remaining_debt : 0;
}

// --- Step 2: Loop original payments to display table ---
foreach ($payisnull as $payisnulls): 
    $row_index++;
    $penalty_amount = 0;

    $row_date = strtotime($payisnulls->date_data);
    $start_date = strtotime('2025-10-29');
    $end_date   = strtotime('2025-11-05');

    // --- HIGHLIGHT ROW IF DATE BETWEEN 29 OCT 2025 AND 05 NOV 2025 ---
    $row_class = ($row_date >= $start_date && $row_date <= $end_date) ? 'highlight-red' : '';

    // --- NEW CONDITION: No penalty for this date range ---
    if ($row_date >= $start_date && $row_date <= $end_date) {
        $penalty_amount = 0;
    } else {
        // --- Existing penalty logic ---
        if ($row_index <= ($total_rows - 3)) {
            $description_upper = strtoupper(trim($payisnulls->description));
            $withdraw = isset($payisnulls->withdrow) ? floatval($payisnulls->withdrow) : 0;
            $deposit_val = isset($payisnulls->depost) ? floatval($payisnulls->depost) : 0;

            // --- Multiple deposits on same day (>0) → penalty = 0 ---
            $same_day_deposits = array_filter($payisnull, function($p) use ($payisnulls) {
                return $p->date_data === $payisnulls->date_data && floatval($p->depost) > 0;
            });
            $count_same_day = count($same_day_deposits);
            if ($count_same_day > 1) {
                $penalty_amount = 0;
            } else {
                // --- SYSTEM WITHDRAWAL or other conditions ---
                if ($withdraw != 0) {
                    $penalty_amount = 0;
                } elseif (isset($payisnulls->fee_id) && $description_upper === 'SYSTEM WITHDRAWAL' && !empty($payisnulls->fee_id)) {
                    $penalty_amount = 0;
                } else {
                    if (!empty($payisnulls->penat_status) &&
                        strtoupper(trim($payisnulls->penat_status)) === 'YES' &&
                        isset($payisnulls->action_penart, $payisnulls->restration, $payisnulls->penart)) {

                        $restration = floatval($payisnulls->restration);
                        $penart = floatval($payisnulls->penart);
                        $action = strtoupper(trim($payisnulls->action_penart));

                        if ($withdraw !== null && $withdraw == $restration) {
                            $penalty_amount = 0;
                        } else {
                            if ($action === 'PERCENTAGE VALUE') {
                                $penalty_amount = ($deposit_val == 0)
                                    ? ($penart / 100) * $restration
                                    : (($deposit_val < $restration) ? $restration / 2 : 0);
                            } elseif ($action === 'MONEY VALUE') {
                                $penalty_amount = ($deposit_val == 0)
                                    ? $penart
                                    : (($deposit_val < $restration) ? $penart / 2 : 0);
                            }
                        }
                    }
                }
            }
        }
    }

    $total_penalty += $penalty_amount;

    // --- Get remaining debt for this row ---
    $debt_for_row = $debts[$payisnulls->pay_id] ?? 0;
?>
<tr class="<?php echo $row_class; ?>">
  <td><?php echo $payisnulls->date_data; ?></td>
  <td>
    <?php 
      echo $payisnulls->emply ?? "SYSTEM" . " / " . $payisnulls->restration;
      if (!empty($payisnulls->account_name)) {
        echo " / " . $payisnulls->account_name;
      }
    ?>
  </td>
  <td><?php echo number_format($payisnulls->depost ?? 0); ?></td>
  <td><?php echo number_format($payisnulls->withdrow ?? 0); ?></td>
  <td><?php echo number_format($payisnulls->balance ?? 0); ?></td>
  <td class="text-red"><?php echo number_format($debt_for_row); ?></td>
  <td><?php echo ($penalty_amount > 0) ? '<span class="text-red">'.number_format($penalty_amount).'</span>' : 0; ?></td>
</tr>
<?php endforeach; ?>

</tbody>

    </table>

    <!-- TOTAL PENALTY -->
    <div class="total-penalty">
      Jumla ya Deni la Penalt: <span class="text-red"><?php echo number_format($total_penalty, 2); ?></span>
    </div>

    <!-- FOOTER -->
    <div class="footer">
      Generated automatically by <?php echo $compdata->comp_name; ?> System | <?php echo date("Y"); ?>
    </div>

  </div>
</body>
</html>
