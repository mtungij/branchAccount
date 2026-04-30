<?php
$expected_total = !empty($today_expected->total_expected) ? (float) $today_expected->total_expected : 0;
$past_due_paid = !empty($payment_breakdown->past_due_paid) ? (float) $payment_breakdown->past_due_paid : 0;
$actual_paid = !empty($payment_breakdown->actual_paid) ? (float) $payment_breakdown->actual_paid : 0;
$advance_paid = !empty($payment_breakdown->advance_paid) ? (float) $payment_breakdown->advance_paid : 0;
$not_paid_today = !empty($payment_breakdown->not_paid_today) ? (float) $payment_breakdown->not_paid_today : 0;
$penalty_total = !empty($penalty_today->total_receved) ? (float) $penalty_today->total_receved : 0;
$processing_fee_total = !empty($processing_fee->total_deducted) ? (float) $processing_fee->total_deducted : 0;
$account_payment_summary = !empty($account_payment_summary) ? $account_payment_summary : array();

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

$withdraw_total = $total_withdraw_by_account;
$received_total = $total_received_by_account;
$computed_closing_balance = $total_opening_balance + $total_received_by_account - $total_withdraw_by_account;

$lang_line = function ($key, $fallback) {
    $value = $this->lang->line($key);
    return !empty($value) ? $value : $fallback;
};

$txt_daily_report = $lang_line('officer_daily_report_title', 'Daily Report');
$txt_date = $lang_line('date', 'Date');
$txt_branch = $lang_line('branch', 'Branch');
$txt_expected_collections = $lang_line('officer_daily_expected_collection', 'Expected Collection');
$txt_received_amount = $lang_line('officer_daily_received_amount', 'Received Amount');
$txt_today_loan_withdraw = $lang_line('officer_daily_today_loan_withdraw', 'Today Loan Withdraw');
$txt_today_penalty_paid = $lang_line('officer_daily_penalty_paid_today', 'Penalty Paid Today');
$txt_processing_fees = $lang_line('officer_daily_processing_fee', 'Processing Fee');
$txt_item = $lang_line('officer_daily_item', 'Item');
$txt_amount = $lang_line('officer_daily_amount', 'Amount');
$txt_past_due_payments = $lang_line('officer_daily_past_due_payments', 'Past Due Payments');
$txt_actual_payments = $lang_line('officer_daily_actual_payments', 'Actual Payments');
$txt_advance_payments = $lang_line('officer_daily_advance_payments', 'Advance Payments');
$txt_not_paid_today = $lang_line('officer_daily_not_paid_today', 'Not Paid Today');
$txt_opening_balance_all = $lang_line('officer_daily_opening_all_accounts', 'Opening Balance (All Accounts)');
$txt_received_all_accounts = $lang_line('officer_daily_plus_received_all', '+ Received Amount (All Accounts)');
$txt_withdraw_all_accounts = $lang_line('officer_daily_minus_withdraw_all', '- Loan Withdraw (All Accounts)');
$txt_closing_balance_computed = $lang_line('officer_daily_closing_computed', '= Closing Balance (Computed)');
$txt_closing_balance_current = $lang_line('officer_daily_closing_current', 'Closing Balance (Current Accounts)');
$txt_branch_code = $lang_line('branch_code', 'Branch Code');

$companyName    = isset($company_data->comp_name) ? $company_data->comp_name : '';
$companyAddress = isset($company_data->adress) ? $company_data->adress : '';
$companyEmail   = isset($company_data->email) ? $company_data->email : '';
$companyPhone   = isset($company_data->phone_no) ? $company_data->phone_no : '';
$companyLogo    = isset($company_data->comp_logo) ? $company_data->comp_logo : '';
$branchCode     = isset($blanch_data->branch_code) ? $blanch_data->branch_code : '';

$logo_url = '';
if (!empty($companyLogo) && file_exists(FCPATH . 'assets/images/company_logo/' . $companyLogo)) {
    $logo_url = 'file://' . FCPATH . 'assets/images/company_logo/' . $companyLogo;
} elseif (!empty($companyLogo) && file_exists(FCPATH . 'assets/img/' . $companyLogo)) {
    $logo_url = 'file://' . FCPATH . 'assets/img/' . $companyLogo;
}
?>

<style>
    body {
        font-family: sans-serif;
        color: #1f2937;
        font-size: 12px;
    }

    .letterhead {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 0;
    }

    .letterhead td.logo-cell {
        border: none;
        width: 85px;
        text-align: center;
        vertical-align: middle;
        padding: 0 10px 0 0;
    }

    .letterhead td.logo-cell img {
        max-height: 70px;
        max-width: 78px;
    }

    .letterhead td.info-cell {
        border: none;
        vertical-align: middle;
        padding: 0;
    }

    .comp-name {
        font-size: 20px;
        font-weight: bold;
        color: #0891b2;
        letter-spacing: 0.4px;
        margin: 0 0 3px 0;
    }

    .comp-phone {
        font-size: 12px;
        color: #374151;
        margin: 0 0 3px 0;
    }

    .branch-line {
        font-size: 11px;
        color: #0e7490;
        margin: 0;
    }

    .divider {
        border: none;
        border-top: 2px solid #06b6d4;
        margin: 8px 0 6px 0;
    }

    .report-title-block {
        text-align: center;
        margin-bottom: 14px;
    }

    .title {
        font-size: 15px;
        font-weight: bold;
        text-transform: capitalize;
        letter-spacing: 1px;
        color: #0891b2;
        margin: 0 0 3px 0;
    }

    .subtitle {
        font-size: 11px;
        color: #6b7280;
        margin: 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 6px;
    }

    th,
    td {
        border: 1px solid #a5f3fc;
        padding: 7px 8px;
        text-align: left;
    }

    th {
        background: #ecfeff;
        color: #0e7490;
        font-weight: bold;
    }

    .strong {
        font-weight: bold;
    }
</style>

<table class="letterhead">
    <tr>
        <?php if ($logo_url): ?>
        <td class="logo-cell"><img src="<?php echo $logo_url; ?>" alt="Logo" /></td>
        <?php endif; ?>
        <td class="info-cell">
            <?php if ($companyName): ?><p class="comp-name"><?php echo htmlspecialchars($companyName); ?></p><?php endif; ?>
            <?php if ($companyPhone): ?><p class="comp-phone"><?php echo htmlspecialchars($companyPhone); ?></p><?php endif; ?>
            <p class="branch-line">
                <?php echo $txt_branch; ?>: <strong><?php echo htmlspecialchars($selected_branch_name); ?></strong>
                <?php if ($branchCode): ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo $txt_branch_code; ?>: <strong><?php echo htmlspecialchars($branchCode); ?></strong><?php endif; ?>
            </p>
        </td>
    </tr>
</table>
<hr class="divider" />

<div class="report-title-block">
    <p class="title"><?php echo $txt_daily_report; ?></p>
    <p class="subtitle"><?php echo $txt_date; ?>: <?php echo $report_date; ?></p>
</div>

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
