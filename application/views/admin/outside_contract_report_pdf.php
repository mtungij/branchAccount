<?php
$customers = !empty($customers) ? $customers : array();
$selected_branch_name = !empty($selected_branch_name) ? $selected_branch_name : 'All Branches';
$report_date = !empty($report_date) ? $report_date : date('Y-m-d');

$lang_line = function ($key, $fallback) {
    $value = $this->lang->line($key);
    return !empty($value) ? $value : $fallback;
};

$txt_title         = $lang_line('daily_report_outside_contract', 'Received Outside Contract');
$txt_date          = $lang_line('date', 'Date');
$txt_branch        = $lang_line('branch', 'Branch');
$txt_customer_name = $lang_line('ocr_customer_name', 'Customer Name');
$txt_phone         = $lang_line('ocr_phone', 'Phone Number');
$txt_loan_aprov    = $lang_line('ocr_loan_aprov', 'Loan Amount');
$txt_loan_int      = $lang_line('ocr_loan_int', 'Loan + Interest');
$txt_paid_total    = $lang_line('ocr_paid_total', 'Paid Total');
$txt_remain        = $lang_line('ocr_remain', 'Remain');
$txt_restration    = $lang_line('ocr_restration', 'Registration');
$txt_loan_duration = $lang_line('ocr_loan_duration', 'Loan Duration');
$txt_start_date    = $lang_line('ocr_start_date', 'Start Date');
$txt_end_date      = $lang_line('ocr_end_date', 'End Date');
$txt_received      = $lang_line('ocr_received', 'Received');
$txt_branch_name   = $lang_line('ocr_branch_name', 'Branch');
$txt_no_data       = $lang_line('ocr_no_data', 'No outside-contract payments found for the selected date and branch.');
$txt_sno           = $lang_line('ocr_sno', '#');
$txt_total         = $lang_line('ocr_total', 'Total');

$grand_total = 0;
foreach ($customers as $row) {
    $grand_total += (float) $row->received_outside;
}
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

<div class="title"><?php echo $txt_title; ?></div>
<div class="subtitle"><?php echo $txt_date; ?>: <?php echo $report_date; ?> | <?php echo $txt_branch; ?>: <?php echo $selected_branch_name; ?></div>

<table>
    <thead>
        <tr>
            <th><?php echo $txt_sno; ?></th>
            <th><?php echo $txt_customer_name; ?></th>
            <th><?php echo $txt_phone; ?></th>
            <th><?php echo $txt_loan_aprov; ?></th>
            <th><?php echo $txt_loan_int; ?></th>
            <th><?php echo $txt_paid_total; ?></th>
            <th><?php echo $txt_remain; ?></th>
            <th><?php echo $txt_restration; ?></th>
            <th><?php echo $txt_loan_duration; ?></th>
            <th><?php echo $txt_start_date; ?></th>
            <th><?php echo $txt_end_date; ?></th>
            <th><?php echo $txt_received; ?></th>
            <th><?php echo $txt_branch_name; ?></th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($customers)): ?>
            <?php $sno = 1; ?>
            <?php foreach ($customers as $row): ?>
                <tr>
                    <td><?php echo $sno++; ?></td>
                    <td><?php echo trim($row->f_name . ' ' . $row->m_name . ' ' . $row->l_name); ?></td>
                    <td><?php echo $row->phone_no; ?></td>
                    <td><?php echo number_format((float) $row->loan_aprove); ?></td>
                    <td><?php echo number_format((float) $row->loan_int); ?></td>
                    <td><?php echo number_format((float) $row->paid_total); ?></td>
                    <td><?php echo number_format(((float) $row->loan_int) - ((float) $row->paid_total)); ?></td>
                    <td><?php echo number_format((float) $row->restration); ?></td>
                    <td>
                        <?php
                            $day_value = isset($row->day) ? (int) $row->day : 0;
                            if ($day_value === 1) {
                                $duration_label = 'Daily';
                            } elseif ($day_value === 7) {
                                $duration_label = 'Weekly';
                            } elseif ($day_value === 28 || $day_value === 30 || $day_value === 31) {
                                $duration_label = 'Monthly';
                            } else {
                                $duration_label = 'Day ' . $day_value;
                            }
                            $session_value = isset($row->session) ? (int) $row->session : 0;
                            echo $duration_label . '(' . $session_value . ')';
                        ?>
                    </td>
                    <td><?php echo !empty($row->loan_stat_date) ? date('d-m-Y', strtotime($row->loan_stat_date)) : '-'; ?></td>
                    <td><?php echo !empty($row->loan_end_date) ? date('d-m-Y', strtotime($row->loan_end_date)) : '-'; ?></td>
                    <td><?php echo number_format((float) $row->received_outside); ?></td>
                    <td><?php echo $row->blanch_name; ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td class="strong" colspan="11"><?php echo $txt_total; ?></td>
                <td class="strong"><?php echo number_format($grand_total); ?></td>
                <td></td>
            </tr>
        <?php else: ?>
            <tr>
                <td colspan="13"><?php echo $txt_no_data; ?></td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
