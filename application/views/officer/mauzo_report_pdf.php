<?php
$report_date  = !empty($report_date)  ? $report_date  : date('Y-m-d');
$branch_name  = !empty($branch_name)  ? $branch_name  : '-';
$jana_val     = isset($jana_val) ? (float) $jana_val : 0;
$leo_val      = isset($leo_val) ? (float) $leo_val : 0;
$jumla_val    = isset($jumla_val) ? (float) $jumla_val : 0;
$gawa_val     = isset($gawa_val) ? (float) $gawa_val : 0;
$double_val   = isset($double_val) ? (float) $double_val : 0;
$accounts     = !empty($accounts) ? $accounts : array();
$today_accounts = !empty($today_accounts) ? $today_accounts : array();
$lala_jumla   = isset($lala_jumla) ? (float) $lala_jumla : 0;
$fee_jana_val  = isset($fee_jana_val) ? (float) $fee_jana_val : 0;
$fee_leo_val   = isset($fee_leo_val) ? (float) $fee_leo_val : 0;
$fee_jumla_val = isset($fee_jumla_val) ? (float) $fee_jumla_val : 0;
$fine_jana_val  = isset($fine_jana_val) ? (float) $fine_jana_val : 0;
$fine_leo_val   = isset($fine_leo_val) ? (float) $fine_leo_val : 0;
$fine_jumla_val = isset($fine_jumla_val) ? (float) $fine_jumla_val : 0;
$sugu_jana_val  = isset($sugu_jana_val) ? (float) $sugu_jana_val : 0;
$sugu_leo_val   = isset($sugu_leo_val) ? (float) $sugu_leo_val : 0;
$sugu_jumla_val = isset($sugu_jumla_val) ? (float) $sugu_jumla_val : 0;
$sugu_lala_val  = isset($sugu_lala_val) ? (float) $sugu_lala_val : 0;
$total_customers_count = isset($total_customers_count) ? (int) $total_customers_count : 0;
$customers_paid_count  = isset($customers_paid_count) ? (int) $customers_paid_count : 0;
$new_customers_count   = isset($new_customers_count) ? (int) $new_customers_count : 0;
$expenses_accounts = !empty($expenses_accounts) ? $expenses_accounts : array();

$lala_accounts_for_total = !empty($accounts) ? $accounts : $today_accounts;
$lala_total_from_accounts = 0;
foreach ($lala_accounts_for_total as $acc_total) {
    $lala_total_from_accounts += (float) $acc_total->closing_balance;
}

$companyName = !empty($company_data->comp_name) ? $company_data->comp_name : '';
$companyPhone = !empty($company_data->phone_no) ? $company_data->phone_no : '';
$companyLogo = !empty($company_data->comp_logo) ? $company_data->comp_logo : '';
$branchCode = !empty($blanch_data->branch_code) ? $blanch_data->branch_code : '';

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
    margin-bottom: 12px;
}
.title {
    font-size: 15px;
    font-weight: bold;
    color: #0891b2;
    margin: 0 0 3px 0;
}
.subtitle {
    font-size: 11px;
    color: #6b7280;
    margin: 0;
}
.section-title {
    margin: 14px 0 6px 0;
    font-size: 13px;
    color: #0f3d56;
    font-weight: bold;
}
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 4px;
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
.amount {
    text-align: right;
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
                Branch: <strong><?php echo htmlspecialchars($branch_name); ?></strong>
                <?php if ($branchCode): ?>&nbsp;&nbsp;|&nbsp;&nbsp;Branch Code: <strong><?php echo htmlspecialchars($branchCode); ?></strong><?php endif; ?>
            </p>
        </td>
    </tr>
</table>
<hr class="divider" />

<div class="report-title-block">
    <p class="title">Report ya Mauzo</p>
    <p class="subtitle">Tarehe: <?php echo htmlspecialchars($report_date); ?></p>
</div>

<p class="section-title">Muhtasari wa Mauzo</p>
<table>
    <tbody>
        <tr><td>JANA</td><td class="amount"><?php echo number_format($jana_val); ?>/=</td></tr>
        <tr><td>LEO</td><td class="amount"><?php echo number_format($leo_val); ?>/=</td></tr>
        <tr><td>JUMLA (JANA + LEO)</td><td class="amount"><?php echo number_format($jumla_val); ?>/=</td></tr>
        <?php foreach ($expenses_accounts as $exp_acc): ?>
            <?php
                $exp_acc_name = !empty($exp_acc->expense_name) ? $exp_acc->expense_name : 'Other';
                $exp_acc_total = (float) ($exp_acc->total_expense ?? 0);
            ?>
            <tr><td><?php echo htmlspecialchars($exp_acc_name); ?></td><td class="amount"><?php echo number_format($exp_acc_total); ?>/=</td></tr>
        <?php endforeach; ?>
        <tr><td>GAWA (Loan Amount)</td><td class="amount"><?php echo number_format($gawa_val); ?>/=</td></tr>
        <tr><td>DOUBLE</td><td class="amount"><?php echo number_format($double_val); ?>/=</td></tr>
        <tr><td>LALA JUMLA</td><td class="amount"><?php echo number_format($lala_total_from_accounts); ?>/=</td></tr>
    </tbody>
</table>

<p class="section-title">LALA</p>
<table>
    <tbody>
        <?php if (!empty($accounts)): ?>
            <?php foreach ($accounts as $acc): ?>
                <?php
                    $acc_name = !empty($acc->account_name) ? $acc->account_name : 'Akaunti';
                    $closing = (float) $acc->closing_balance;
                ?>
                <tr><td>LALA <?php echo htmlspecialchars($acc_name); ?></td><td class="amount"><?php echo number_format($closing); ?>/=</td></tr>
            <?php endforeach; ?>
        <?php elseif (!empty($today_accounts)): ?>
            <?php foreach ($today_accounts as $acc): ?>
                <?php
                    $acc_name = !empty($acc->account_name) ? $acc->account_name : 'Akaunti';
                    $closing = (float) $acc->closing_balance;
                ?>
                <tr><td>LEO <?php echo htmlspecialchars($acc_name); ?></td><td class="amount"><?php echo number_format($closing); ?>/=</td></tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td>Hakuna akaunti za tawi hili.</td><td class="amount">0</td></tr>
        <?php endif; ?>
        <tr><td><strong>JUMLA</strong></td><td class="amount"><?php echo number_format($lala_total_from_accounts); ?>/=</td></tr>
    </tbody>
</table>

<p class="section-title">FOMU</p>
<table>
    <tbody>
        <tr><td>JANA</td><td class="amount"><?php echo number_format($fee_jana_val); ?>/=</td></tr>
        <tr><td>LEO</td><td class="amount"><?php echo number_format($fee_leo_val); ?>/=</td></tr>
        <tr><td>JUMLA</td><td class="amount"><?php echo number_format($fee_jumla_val); ?>/=</td></tr>
        <tr><td>LALA JUMLA</td><td class="amount"><?php echo number_format($fee_jumla_val); ?>/=</td></tr>
    </tbody>
</table>

<p class="section-title">FAINI</p>
<table>
    <tbody>
        <tr><td>JANA</td><td class="amount"><?php echo number_format($fine_jana_val); ?>/=</td></tr>
        <tr><td>LEO</td><td class="amount"><?php echo number_format($fine_leo_val); ?>/=</td></tr>
        <tr><td>JUMLA</td><td class="amount"><?php echo number_format($fine_jumla_val); ?>/=</td></tr>
        <tr><td>LALA JUMLA</td><td class="amount"><?php echo number_format($fine_jumla_val); ?>/=</td></tr>
    </tbody>
</table>

<p class="section-title">MADENI SUGU</p>
<table>
    <tbody>
        <tr><td>JANA</td><td class="amount"><?php echo number_format($sugu_jana_val); ?>/=</td></tr>
        <tr><td>LEO</td><td class="amount"><?php echo number_format($sugu_leo_val); ?>/=</td></tr>
        <tr><td>JUMLA</td><td class="amount"><?php echo number_format($sugu_jumla_val); ?>/=</td></tr>
        <tr><td>LALA JUMLA</td><td class="amount"><?php echo number_format($sugu_lala_val); ?>/=</td></tr>
    </tbody>
</table>

<p class="section-title">TAARIFA ZA WATEJA</p>
<table>
    <tbody>
        <tr><td>IDADI YA WATEJA</td><td class="amount"><?php echo number_format($total_customers_count); ?></td></tr>
        <tr><td>WALIOLETA</td><td class="amount"><?php echo number_format($customers_paid_count); ?></td></tr>
        <tr><td>WATEJA WAPYA</td><td class="amount"><?php echo number_format($new_customers_count); ?></td></tr>
    </tbody>
</table>
