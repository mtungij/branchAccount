<?php
$not_paid_list = !empty($not_paid_list) ? $not_paid_list : array();
$selected_branch_name = !empty($selected_branch_name) ? $selected_branch_name : 'All Branches';
$report_date = !empty($report_date) ? $report_date : date('Y-m-d');

$lang_line = function ($key, $fallback) {
    $value = $this->lang->line($key);
    return !empty($value) ? $value : $fallback;
};

$txt_title = $lang_line('daily_report_not_paid_today', 'Not Paid Today');
$txt_date = $lang_line('date', 'Date');
$txt_branch = $lang_line('branch', 'Branch');
$txt_branch_code = $lang_line('branch_code', 'Branch Code');
$txt_customer_name = $lang_line('ocr_customer_name', 'Customer Name');
$txt_phone = $lang_line('ocr_phone', 'Phone Number');
$txt_loan_int = $lang_line('ocr_loan_int', 'Loan + Interest');
$txt_collection = $lang_line('ocr_restration', 'Collection');
$txt_expected_today = $lang_line('npt_expected_today', 'Expected Today');
$txt_paid_today = $lang_line('npt_paid_today', 'Paid Today');
$txt_not_paid_today = $lang_line('daily_report_not_paid_today', 'Not Paid Today');
$txt_branch_name = $lang_line('ocr_branch_name', 'Branch');
$txt_no_data = $lang_line('npt_no_data', 'No records found for Not Paid Today on selected filters.');
$txt_sno = $lang_line('ocr_sno', '#');
$txt_total = $lang_line('ocr_total', 'Total');

$total_not_paid = 0;
foreach ($not_paid_list as $row) {
    $total_not_paid += (float) $row->not_paid_today;
}

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
    <p class="title"><?php echo $txt_title; ?></p>
    <p class="subtitle"><?php echo $txt_date; ?>: <?php echo $report_date; ?></p>
</div>

<table>
    <thead>
        <tr>
            <th><?php echo $txt_sno; ?></th>
            <th><?php echo $txt_customer_name; ?></th>
            <th><?php echo $txt_phone; ?></th>
            <th><?php echo $txt_loan_int; ?></th>
            <th><?php echo $txt_collection; ?></th>
            <th><?php echo $txt_expected_today; ?></th>
            <th><?php echo $txt_paid_today; ?></th>
            <th><?php echo $txt_not_paid_today; ?></th>
            <th><?php echo $txt_branch_name; ?></th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($not_paid_list)): ?>
            <?php $sno = 1; ?>
            <?php foreach ($not_paid_list as $row): ?>
                <tr>
                    <td><?php echo $sno++; ?></td>
                    <td><?php echo trim($row->f_name . ' ' . $row->m_name . ' ' . $row->l_name); ?></td>
                    <td><?php echo $row->phone_no; ?></td>
                    <td><?php echo number_format((float) $row->loan_int); ?></td>
                    <td><?php echo number_format((float) $row->restration); ?></td>
                    <td><?php echo number_format((float) $row->expected_today); ?></td>
                    <td><?php echo number_format((float) $row->actual_paid_today); ?></td>
                    <td><?php echo number_format((float) $row->not_paid_today); ?></td>
                    <td><?php echo $row->blanch_name; ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td class="strong" colspan="7"><?php echo $txt_total; ?></td>
                <td class="strong"><?php echo number_format($total_not_paid); ?></td>
                <td></td>
            </tr>
        <?php else: ?>
            <tr>
                <td colspan="9"><?php echo $txt_no_data; ?></td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
