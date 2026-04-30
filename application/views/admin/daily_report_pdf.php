<?php
$expected_total = !empty($today_expected->total_expected) ? (float) $today_expected->total_expected : 0;
$past_due_paid = !empty($payment_breakdown->past_due_paid) ? (float) $payment_breakdown->past_due_paid : 0;
$actual_paid = !empty($payment_breakdown->actual_paid) ? (float) $payment_breakdown->actual_paid : 0;
$advance_paid = !empty($payment_breakdown->advance_paid) ? (float) $payment_breakdown->advance_paid : 0;
$not_paid_today = !empty($payment_breakdown->not_paid_today) ? (float) $payment_breakdown->not_paid_today : 0;
$penalty_total = !empty($penalty_today->total_receved) ? (float) $penalty_today->total_receved : 0;
$processing_fee_total = !empty($processing_fee->total_deducted) ? (float) $processing_fee->total_deducted : 0;
$outside_contract_total = !empty($outside_contract_received->total_outside_contract) ? (float) $outside_contract_received->total_outside_contract : 0;
$account_payment_summary = !empty($account_payment_summary) ? $account_payment_summary : array();
$withdraw_total = !empty($total_today_with->total_loan_withcomp) ? (float) $total_today_with->total_loan_withcomp : 0;

$total_opening_balance = 0.0;
$total_closing_balance = 0.0;
$total_withdraw_by_account = 0.0;
$total_received_by_account = 0.0;
foreach ($account_payment_summary as $account_row) {
    $total_opening_balance += !empty($account_row->opening_balance) ? (float) $account_row->opening_balance : 0;
    $total_closing_balance += !empty($account_row->closing_balance) ? (float) $account_row->closing_balance : 0;
    $total_withdraw_by_account += !empty($account_row->today_loan_withdraw) ? (float) $account_row->today_loan_withdraw : 0;
    $total_received_by_account += !empty($account_row->today_received) ? (float) $account_row->today_received : 0;
}
$received_total = $total_received_by_account;
$computed_closing_balance = $total_opening_balance + $total_received_by_account - $total_withdraw_by_account;

$lang_line = function ($key, $fallback) {
    $value = $this->lang->line($key);
    return !empty($value) ? $value : $fallback;
};

$txt_daily_report = $lang_line('daily_report', 'Daily Report');
$txt_date = $lang_line('date', 'Date');
$txt_branch = $lang_line('branch', 'Branch');
$txt_expected_collections = $lang_line('expected_collections', 'Expected Collection');
$txt_received_amount = $lang_line('received_amount', 'Received Amount');
$txt_outside_contract = $lang_line('daily_report_outside_contract', 'Received Outside Contract');
$txt_today_loan_withdraw = $lang_line('today_loan_withdraw', 'Today Loan Withdraw');
$txt_today_penalty_paid = $lang_line('today_penalty_paid', 'Penalty Paid Today');
$txt_processing_fees = $lang_line('processing_fees', 'Processing Fee');
$txt_item = $lang_line('daily_report_item', 'Item');
$txt_amount = $lang_line('daily_report_amount', 'Amount');
$txt_past_due_payments = $lang_line('daily_report_past_due_payments', 'Past Due Payments');
$txt_actual_payments = $lang_line('daily_report_actual_payments', 'Actual Payments');
$txt_advance_payments = $lang_line('daily_report_advance_payments', 'Advance Payments');
$txt_not_paid_today = $lang_line('daily_report_not_paid_today', 'Not Paid Today');
$txt_opening_balance_all = $lang_line('daily_report_opening_balance_all', 'Opening Balance (All Accounts)');
$txt_received_all_accounts = $lang_line('daily_report_received_all_accounts', '+ Received Amount (All Accounts)');
$txt_withdraw_all_accounts = $lang_line('daily_report_withdraw_all_accounts', '- Loan Withdraw (All Accounts)');
$txt_closing_balance_computed = $lang_line('daily_report_closing_balance_computed', '= Closing Balance (Computed)');
$txt_closing_balance_current = $lang_line('daily_report_closing_balance_current', 'Closing Balance (Current Accounts)');
?>

<style>
    body {
        font-family: sans-serif;
        color: #1f2937;
        font-size: 12px;
    }

    .title {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 4px;
    }

    .subtitle {
        margin-bottom: 14px;
        color: #4b5563;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 6px;
    }

    th,
    td {
        border: 1px solid #d1d5db;
        padding: 7px 8px;
        text-align: left;
    }

    th {
        background: #f3f4f6;
    }

    .strong {
        font-weight: bold;
    }
</style>

<div class="title"><?php echo $txt_daily_report; ?></div>
<div class="subtitle"><?php echo $txt_date; ?>: <?php echo $report_date; ?> | <?php echo $txt_branch; ?>: <?php echo $selected_branch_name; ?></div>

<table>
    <thead>
        <tr>
            <th><?php echo $txt_item; ?></th>
            <th><?php echo $txt_amount; ?></th>
        </tr>
    </thead>
    <tbody>
        <tr><td><?php echo $txt_expected_collections; ?></td><td><?php echo number_format($expected_total); ?></td></tr>
        <tr><td><?php echo $txt_received_amount; ?></td><td><?php echo number_format($received_total); ?></td></tr>
        <tr><td><?php echo $txt_outside_contract; ?></td><td><?php echo number_format($outside_contract_total); ?></td></tr>
        <tr><td><?php echo $txt_today_loan_withdraw; ?></td><td><?php echo number_format($withdraw_total); ?></td></tr>
        <tr><td><?php echo $txt_past_due_payments; ?></td><td><?php echo number_format($past_due_paid); ?></td></tr>
        <tr><td><?php echo $txt_actual_payments; ?></td><td><?php echo number_format($actual_paid); ?></td></tr>
        <tr><td><?php echo $txt_advance_payments; ?></td><td><?php echo number_format($advance_paid); ?></td></tr>
        <tr><td><?php echo $txt_not_paid_today; ?></td><td><?php echo number_format($not_paid_today); ?></td></tr>
        <tr><td><?php echo $txt_today_penalty_paid; ?></td><td><?php echo number_format($penalty_total); ?></td></tr>
        <tr><td><?php echo $txt_processing_fees; ?></td><td><?php echo number_format($processing_fee_total); ?></td></tr>
        <tr><td class="strong"><?php echo $txt_opening_balance_all; ?></td><td class="strong"><?php echo number_format($total_opening_balance); ?></td></tr>
        <tr><td><?php echo $txt_received_all_accounts; ?></td><td><?php echo number_format($total_received_by_account); ?></td></tr>
        <tr><td><?php echo $txt_withdraw_all_accounts; ?></td><td><?php echo number_format($total_withdraw_by_account); ?></td></tr>
        <tr><td class="strong"><?php echo $txt_closing_balance_computed; ?></td><td class="strong"><?php echo number_format($computed_closing_balance); ?></td></tr>
        <tr><td class="strong"><?php echo $txt_closing_balance_current; ?></td><td class="strong"><?php echo number_format($total_closing_balance); ?></td></tr>
    </tbody>
</table>

