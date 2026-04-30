<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php
    $lang_line = function ($key, $fallback) {
        $value = $this->lang->line($key);
        return !empty($value) ? $value : $fallback;
    };

    $txt_report = $lang_line('report', 'Report');
    $txt_date = $lang_line('date', 'Date');
    $txt_branch = $lang_line('branch', 'Branch');
    $txt_yesterday_defaulters = $lang_line('pdf_yesterday_defaulters', "Yesterday's Defaulters");
    $txt_customer_name = $lang_line('customer_name', 'Customer Name');
    $txt_phone_number = $lang_line('phone_number', 'Phone Number');
    $txt_loan_amount = $lang_line('loan_amount', 'Loan Amount');
    $txt_restoration = $lang_line('collection', 'Collection');
    $txt_duration = $lang_line('duration_type', 'Duration Type');
    $txt_paid = $lang_line('amount_paid', 'Amount Paid');
    $txt_remain = $lang_line('remain_debt', 'Remain Debt');
    $txt_overdue_days = $lang_line('overdue_days', 'Overdue Days');
    $txt_start_date = $lang_line('start_date', 'Start Date');
    $txt_end_date = $lang_line('end_date', 'End Date');
    $txt_daily = $lang_line('daily', 'Daily');
    $txt_weekly = $lang_line('weekly', 'Weekly');
    $txt_monthly = $lang_line('monthly', 'Monthly');
    $txt_totals = $lang_line('totals', 'Totals');
    $txt_no_data = $lang_line('pdf_no_yesterday_defaulters', 'No defaulters found yesterday.');
    ?>
    <title><?= $compdata->comp_name ?> | <?= $txt_yesterday_defaulters ?></title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; color: #333; }
        .header { text-align: center; margin-bottom: 15px; }
        .header h2 { margin: 2px 0; }
        .header p { margin: 2px 0; font-size: 12px; }

        table { border-collapse: collapse; width: 100%; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 6px 8px; text-align: left; }
        th { background-color: #00bcd4; color: #fff; font-size: 12px; }
        td { font-size: 11px; }
        .total-row { font-weight: bold; background-color: #f2f2f2; }
    </style>
</head>
<body>

<div class="header">
    <h2><?= $compdata->comp_name ?></h2>
    <h4><?= $txt_branch ?>: <?= $blanch_data->blanch_name ?></h4>
    <p><strong><?= $txt_report ?>:</strong> <?= $txt_yesterday_defaulters ?></p>
    <p><strong><?= $txt_date ?>:</strong> <?= date("d-m-Y", strtotime('-1 day')) ?></p>
</div>

<table>
    <thead>
        <tr>
            <th><?= $lang_line('s_no', 'S/No.') ?></th>
            <th><?= $txt_customer_name ?></th>
            <th><?= $txt_phone_number ?></th>
            <th><?= $txt_loan_amount ?></th>
            <th><?= $txt_restoration ?></th>
            <th><?= $txt_duration ?></th>
            <th><?= $txt_paid ?></th>
            <th><?= $txt_remain ?></th>
            <th><?= $txt_overdue_days ?></th>
            <th><?= $txt_start_date ?></th>
            <th><?= $txt_end_date ?></th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $total_loan = 0;
        $total_restoration = 0;
        $total_paid = 0;
        $total_remain = 0;
        ?>

        <?php if (!empty($outstand)): ?>
            <?php $no = 1; foreach ($outstand as $loan): ?>
                <?php
                    $remain = $loan->loan_int - $loan->total_deposit;
                    $total_loan += $loan->loan_int;
                    $total_restoration += $loan->restration;
                    $total_paid += $loan->total_deposit;
                    $total_remain += $remain;
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= strtoupper($loan->f_name . ' ' . $loan->m_name . ' ' . $loan->l_name) ?></td>
                    <td><?= $loan->phone_no ?></td>
                    <td><?= number_format($loan->loan_int) ?></td>
                    <td><?= number_format($loan->restration) ?></td>
                    <td>
                        <?php
                            if ($loan->day == 1) $dur = $txt_daily;
                            elseif ($loan->day == 7) $dur = $txt_weekly;
                            elseif (in_array($loan->day, [28,29,30,31])) $dur = $txt_monthly;
                            else $dur = "-";
                            echo $dur . " (" . $loan->session . ")";
                        ?>
                    </td>
                    <td><?= number_format($loan->total_deposit) ?></td>
                    <td><?= number_format($remain) ?></td>
                    <td><?= $loan->loan_int == $loan->total_deposit ? 0 : $loan->overdue_days ?></td>
                    <td><?= substr($loan->loan_stat_date, 0, 10) ?></td>
                    <td><?= substr($loan->loan_end_date, 0, 10) ?></td>
                </tr>
            <?php endforeach; ?>

            <!-- Totals Row -->
            <tr class="total-row">
                <td colspan="3" style="text-align:right;"><?= $txt_totals ?>:</td>
                <td><?= number_format($total_loan) ?></td>
                <td><?= number_format($total_restoration) ?></td>
                <td></td>
                <td><?= number_format($total_paid) ?></td>
                <td><?= number_format($total_remain) ?></td>
                <td colspan="3"></td>
            </tr>

        <?php else: ?>
            <tr>
                <td colspan="11" style="text-align:center;"><?= $txt_no_data ?></td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>