<style>
    body { font-family: Arial, sans-serif; font-size: 12px; color: #333; }
    .header { text-align: center; margin-bottom: 15px; }
    .header h1 { font-size: 18px; color: #0891b2; margin: 0; }
    .header p { margin: 2px 0; font-size: 11px; color: #555; }
    table { width: 100%; border-collapse: collapse; margin-top: 10px; }
    th { background-color: #0891b2; color: #fff; padding: 6px 8px; text-align: left; font-size: 10px; }
    td { padding: 5px 8px; border-bottom: 1px solid #ddd; font-size: 10px; }
    tr:nth-child(even) { background-color: #f9f9f9; }
    .total-row td { font-weight: bold; border-top: 2px solid #0891b2; background-color: #e0f7fa; }
    .amount { text-align: right; }
</style>

<div class="header">
    <?php if (!empty($company_data->comp_logo)):
        $logo_path = FCPATH . 'assets/images/company_logo/' . basename($company_data->comp_logo);
        if (file_exists($logo_path)): ?>
            <img src="<?php echo $logo_path; ?>" style="height: 50px; margin-bottom: 5px;">
        <?php endif;
    endif; ?>
    <h1><?php echo isset($company_data->comp_name) ? $company_data->comp_name : ''; ?></h1>
    <p><strong>Branch:</strong> <?php echo $branch_name; ?></p>
    <p><strong>Accepted Expenses Report</strong><?php if (!empty($filter_from) && !empty($filter_to)): ?> &mdash; <?php echo $filter_from; ?> to <?php echo $filter_to; ?><?php endif; ?></p>
</div>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Branch</th>
            <th>Expenses</th>
            <th class="amount">Amount</th>
            <th>Account</th>
            <th>Description</th>
            <th>Date</th>
            <th>Approved By</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($data as $row):
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row->blanch_name; ?></td>
            <td><?php echo (isset($row->deduct_type) && $row->deduct_type == 'daily_allowance') ? 'Daily Allowance' : $row->ex_name; ?></td>
            <td class="amount"><?php echo number_format($row->req_amount); ?></td>
            <td><?php echo $row->account_name; ?></td>
            <td><?php echo $row->req_description; ?></td>
            <td><?php echo $row->req_date; ?></td>
            <td><?php echo isset($row->approved_by_name) ? $row->approved_by_name : '-'; ?></td>
        </tr>
        <?php endforeach; ?>

        <?php if (isset($tota_exp->total_amount) && $tota_exp->total_amount > 0): ?>
        <tr class="total-row">
            <td colspan="3" style="text-align: right;">Total</td>
            <td class="amount"><?php echo number_format($tota_exp->total_amount); ?></td>
            <td colspan="4"></td>
        </tr>
        <?php endif; ?>

        <?php if (empty($data)): ?>
        <tr>
            <td colspan="8" style="text-align: center; padding: 20px; color: #999;">No expenses found.</td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>
