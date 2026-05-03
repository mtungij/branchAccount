<?php
$expected_total = !empty($today_expected->total_expected) ? (float) $today_expected->total_expected : 0;
$withdraw_total_raw = !empty($total_today_with->total_loan_with) ? (float) $total_today_with->total_loan_with : 0;
$past_due_paid = !empty($payment_breakdown->past_due_paid) ? (float) $payment_breakdown->past_due_paid : 0;
$actual_paid = !empty($payment_breakdown->actual_paid) ? (float) $payment_breakdown->actual_paid : 0;
$advance_paid = !empty($payment_breakdown->advance_paid) ? (float) $payment_breakdown->advance_paid : 0;
$not_paid_today = !empty($payment_breakdown->not_paid_today) ? (float) $payment_breakdown->not_paid_today : 0;
$penalty_total = !empty($penalty_today->total_receved) ? (float) $penalty_today->total_receved : 0;
$penalty_income_type_total = !empty($today_penalty_income_type->total_penalty_income) ? (float) $today_penalty_income_type->total_penalty_income : 0;
$penalty_income_ledger_total = !empty($today_penalty_income_ledger->total_penalty_income) ? (float) $today_penalty_income_ledger->total_penalty_income : 0;
$penalty_income_display_total = $penalty_income_type_total > 0 ? $penalty_income_type_total : $penalty_income_ledger_total;
$processing_fee_total = !empty($processing_fee->total_deducted) ? (float) $processing_fee->total_deducted : 0;
$account_payment_summary = !empty($account_payment_summary) ? $account_payment_summary : array();
$today_loan_withdraw_by_account = !empty($today_loan_withdraw_by_account) ? $today_loan_withdraw_by_account : array();
$today_accepted_expenses = !empty($today_accepted_expenses) ? $today_accepted_expenses : array();
$today_hq_transfer_in = !empty($today_hq_transfer_in) ? $today_hq_transfer_in : array();

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

$withdraw_total = $withdraw_total_raw;
$received_total = $total_received_by_account;
$computed_closing_balance = $total_opening_balance + $total_received_by_account - $total_withdraw_by_account;
$total_withdraw_by_account = $withdraw_total_raw;

$lang_line = function ($key, $fallback) {
    $value = $this->lang->line($key);
    return !empty($value) ? $value : $fallback;
};

$txt_daily_report = $lang_line('officer_daily_report_title', 'Daily Report');
$txt_date = $lang_line('date', 'Date');
$txt_branch = $lang_line('branch', 'Branch');
$txt_today_summary = $lang_line('officer_daily_today_summary', 'Today Summary');
$txt_expected_collections = $lang_line('officer_daily_expected_collection', 'Expected Collection');
$txt_received_amount = $lang_line('officer_daily_received_amount', 'Received Amount');
$txt_today_loan_withdraw = $lang_line('officer_daily_today_loan_withdraw', 'Today Loan Withdraw');
$txt_today_penalty_paid = $lang_line('officer_daily_penalty_paid_today', 'Penalty Paid Today');
$txt_processing_fees = $lang_line('officer_daily_processing_fee', 'Processing Fee');
$txt_item = $lang_line('officer_daily_item', 'Item');
$txt_amount = $lang_line('officer_daily_amount', 'Amount');
$txt_unknown_account = $lang_line('officer_daily_unknown_account', 'Unknown Account');
$txt_past_due_payments = $lang_line('officer_daily_past_due_payments', 'Past Due Payments');
$txt_actual_payments = $lang_line('officer_daily_actual_payments', 'Actual Payments');
$txt_advance_payments = $lang_line('officer_daily_advance_payments', 'Advance Payments');
$txt_not_paid_today = $lang_line('officer_daily_not_paid_today', 'Not Paid Today');
$txt_opening_all_accounts = $lang_line('officer_daily_opening_all_accounts', 'JANA (Yesterday Balance - All Accounts)');
$txt_opening_account = $lang_line('officer_daily_opening_account', 'JANA - %s');
$txt_plus_added_received_account = $lang_line('officer_daily_plus_added_received_account', 'LEO Loan Payment - %s');
$txt_plus_penalty_added_account = $lang_line('officer_daily_plus_penalty_added_account', 'LEO Penalty Income - %s');
$txt_penalty_payment = $lang_line('officer_daily_penalty_payment', 'Malipo ya Faini');
$txt_form_payment = $lang_line('officer_daily_form_payment', 'Malipo ya Fomu');
$txt_minus_withdraw_all = $lang_line('officer_daily_minus_withdraw_all', 'GAWA (Loan Withdrawal - All Accounts)');
$txt_hq_transfer_in = $lang_line('officer_daily_hq_transfer_in', 'Imetoka HQ');
$txt_hq_transfer_in_account = $lang_line('officer_daily_hq_transfer_in_account', 'Imetoka HQ - %s');
$txt_closing_current = $lang_line('officer_daily_closing_current', 'Closing Balance (Current Accounts)');
$txt_closing_account = $lang_line('officer_daily_closing_account', 'Closing Balance - %s');
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
        <tr>
            <td class="strong" colspan="2"><?php echo $txt_today_summary; ?></td>
        </tr>
        <?php if (!empty($today_hq_transfer_in)): ?>
            <?php $total_hq_transfer_in = 0.0; foreach ($today_hq_transfer_in as $hq_row) { $total_hq_transfer_in += (float) $hq_row->amount_in; } ?>
            <tr><td class="strong"><?php echo $txt_hq_transfer_in; ?></td><td class="strong"><?php echo number_format($total_hq_transfer_in); ?></td></tr>
            <?php foreach ($today_hq_transfer_in as $hq_row): ?>
                <tr><td><?php echo sprintf($txt_hq_transfer_in_account, htmlspecialchars(!empty($hq_row->account_name) ? $hq_row->account_name : $txt_unknown_account)); ?></td><td><?php echo number_format((float) $hq_row->amount_in); ?></td></tr>
            <?php endforeach; ?>
        <?php endif; ?>
        <tr><td class="strong"><?php echo $txt_opening_all_accounts; ?></td><td class="strong"><?php echo number_format($total_opening_balance); ?></td></tr>
        <?php if (!empty($account_payment_summary)): ?>
            <?php foreach ($account_payment_summary as $account_row): ?>
                <tr>
                    <td><?php echo sprintf($txt_opening_account, !empty($account_row->account_name) ? $account_row->account_name : $txt_unknown_account); ?></td>
                    <td><?php echo number_format((float) $account_row->opening_balance); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        <tr><td class="strong">Leo Summary</td><td></td></tr>
        <?php if (!empty($account_payment_summary)): ?>
            <?php foreach ($account_payment_summary as $account_row): ?>
                <tr>
                    <td><?php echo sprintf($txt_plus_added_received_account, !empty($account_row->account_name) ? $account_row->account_name : $txt_unknown_account); ?></td>
                    <td><?php echo number_format((float) $account_row->today_received); ?></td>
                </tr>
                <?php if (!empty($account_row->penalty_added_to_cash) && (float) $account_row->penalty_added_to_cash > 0): ?>
                    <tr>
                        <td><?php echo sprintf($txt_plus_penalty_added_account, !empty($account_row->account_name) ? $account_row->account_name : $txt_unknown_account); ?></td>
                        <td><?php echo number_format((float) $account_row->penalty_added_to_cash); ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
        <tr><td><?php echo $txt_penalty_payment; ?></td><td><?php echo number_format($penalty_income_display_total); ?></td></tr>
        <tr><td><?php echo $txt_form_payment; ?></td><td><?php echo number_format((float) $processing_fee_total); ?></td></tr>
        <?php
        $gawa_accounts = array();
        if (!empty($today_loan_withdraw_by_account)) {
            foreach ($today_loan_withdraw_by_account as $account_row) {
                if ((float) $account_row->total_loan_with > 0) {
                    $gawa_accounts[] = $account_row;
                }
            }
        }
        ?>
        <?php if (!empty($gawa_accounts)): ?>
            <tr><td class="strong" colspan="2">- Gawa Summary = Mikopo iliyotolewa leo</td></tr>
            <?php foreach ($gawa_accounts as $account_row): ?>
                <tr><td class="strong" colspan="2"><?php echo htmlspecialchars(!empty($account_row->account_name) ? $account_row->account_name : $txt_unknown_account); ?></td></tr>
                <tr><td>- Mkopo Uliotolewa</td><td><?php echo number_format((float) $account_row->total_loan_with); ?></td></tr>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if (!empty($today_accepted_expenses)): ?>
            <tr><td class="strong" colspan="2">Matumizi</td></tr>
            <?php
            $exp_grouped = array();
            foreach ($today_accepted_expenses as $exp_row) {
                $acct = !empty($exp_row->account_name) ? $exp_row->account_name : 'Bila Akaunti';
                $exp_grouped[$acct][] = $exp_row;
            }
            foreach ($exp_grouped as $acct_name => $exp_items):
            ?>
                <tr><td class="strong" colspan="2"><?php echo htmlspecialchars($acct_name); ?></td></tr>
                <?php foreach ($exp_items as $exp_row): ?>
                    <tr>
                        <td>- <?php echo htmlspecialchars(!empty($exp_row->ex_name) ? $exp_row->ex_name : (!empty($exp_row->req_description) ? $exp_row->req_description : '-')); ?></td>
                        <td><?php echo number_format((float) $exp_row->req_amount); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
        <?php endif; ?>
        <tr><td class="strong"><?php echo $txt_closing_current; ?></td><td class="strong"><?php echo number_format($total_closing_balance); ?></td></tr>
        <?php if (!empty($account_payment_summary)): ?>
            <?php foreach ($account_payment_summary as $account_row): ?>
                <tr>
                    <td><?php echo sprintf($txt_closing_account, !empty($account_row->account_name) ? $account_row->account_name : $txt_unknown_account); ?></td>
                    <td><?php echo number_format((float) $account_row->closing_balance); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
