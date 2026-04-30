
<?php
include_once APPPATH . "views/partials/header.php";
?>


<?php
$expected_total = !empty($today_expected->total_expected) ? (float) $today_expected->total_expected : 0;
$withdraw_total = !empty($total_today_with->total_loan_withcomp) ? (float) $total_today_with->total_loan_withcomp : 0;
$received_total = !empty($total_received->total_depost_comp) ? (float) $total_received->total_depost_comp : 0;
$past_due_paid = !empty($payment_breakdown->past_due_paid) ? (float) $payment_breakdown->past_due_paid : 0;
$actual_paid = !empty($payment_breakdown->actual_paid) ? (float) $payment_breakdown->actual_paid : 0;
$advance_paid = !empty($payment_breakdown->advance_paid) ? (float) $payment_breakdown->advance_paid : 0;
$not_paid_today = !empty($payment_breakdown->not_paid_today) ? (float) $payment_breakdown->not_paid_today : 0;
$penalty_total = !empty($penalty_today->total_receved) ? (float) $penalty_today->total_receved : 0;
$processing_fee_total = !empty($processing_fee->total_deducted) ? (float) $processing_fee->total_deducted : 0;
$outside_contract_total = !empty($outside_contract_received->total_outside_contract) ? (float) $outside_contract_received->total_outside_contract : 0;
$total_customers_count = !empty($total_customers->total_customers) ? (float) $total_customers->total_customers : 0;
$customers_paid_count = !empty($customers_paid->total_paid_customers) ? (float) $customers_paid->total_paid_customers : 0;
$new_customers_count = !empty($new_customers->total_new_customers) ? (float) $new_customers->total_new_customers : 0;
$received_by_account = !empty($received_by_account) ? $received_by_account : array();
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

$received_total = $total_received_by_account;
$computed_closing_balance = $total_opening_balance + $total_received_by_account - $total_withdraw_by_account;
$branch_count = !empty($blanch) ? count($blanch) : 0;
$selected_blanch_id = !empty($selected_blanch_id) ? (int) $selected_blanch_id : 0;
$selected_branch_name = !empty($selected_branch_name) ? $selected_branch_name : 'All Branches';
$report_date = !empty($report_date) ? $report_date : date('Y-m-d');

$lang_line = function ($key, $fallback) {
	$value = $this->lang->line($key);
	return !empty($value) ? $value : $fallback;
};

$txt_daily_report = $lang_line('daily_report', 'Daily Report');
$txt_daily_report_desc = $lang_line('daily_report_desc', 'Expected collection and loan withdrawal summary.');
$txt_date = $lang_line('date', 'Date');
$txt_branch = $lang_line('branch', 'Branch');
$txt_all_branches = $lang_line('all_branches', 'All Branches');
$txt_filter = $lang_line('filter', 'Filter');
$txt_reset = $lang_line('reset', 'Reset');
$txt_download_pdf = $lang_line('download_pdf', 'Download PDF');
$txt_expected_collections_link = $lang_line('expected_receivable', 'Expected Collections');
$txt_expected_collections = $lang_line('expected_collections', 'Expected Collection');
$txt_received_amount = $lang_line('received_amount', 'Received Amount');
$txt_today_loan_withdraw = $lang_line('today_loan_withdraw', 'Today Loan Withdraw');
$txt_today_penalty_paid = $lang_line('today_penalty_paid', 'Penalty Paid Today');
$txt_processing_fees = $lang_line('processing_fees', 'Processing Fee');
$txt_today_summary = $lang_line('daily_report_today_summary', 'Today Summary');
$txt_item = $lang_line('daily_report_item', 'Item');
$txt_amount = $lang_line('daily_report_amount', 'Amount');
$txt_expected_note = $lang_line('daily_report_expected_note', 'Total expected collection for the selected date.');
$txt_received_note = $lang_line('daily_report_received_note', 'Total received amount for the selected date.');
$txt_outside_contract = $lang_line('daily_report_outside_contract', 'Received Outside Contract');
$txt_outside_contract_note = $lang_line('daily_report_outside_contract_note', 'Payments received on loans whose contract end date is after the report date.');
$txt_withdraw_note = $lang_line('daily_report_withdraw_note', 'Total disbursed loans for the selected date.');
$txt_past_due_payments = $lang_line('daily_report_past_due_payments', 'Past Due Payments');
$txt_past_due_note = $lang_line('daily_report_past_due_note', 'Paid for missed previous due dates.');
$txt_actual_payments = $lang_line('daily_report_actual_payments', 'Actual Payments');
$txt_actual_note = $lang_line('daily_report_actual_note', 'Paid for the scheduled installment date.');
$txt_advance_payments = $lang_line('daily_report_advance_payments', 'Advance Payments');
$txt_advance_note = $lang_line('daily_report_advance_note', 'Paid above due amount and carried forward.');
$txt_not_paid_today = $lang_line('daily_report_not_paid_today', 'Not Paid Today');
$txt_not_paid_note = $lang_line('daily_report_not_paid_note', 'Expected but not yet received.');
$txt_penalty_note = $lang_line('daily_report_penalty_note', 'Total penalty income received for the selected date.');
$txt_processing_note = $lang_line('daily_report_processing_note', 'Total deducted processing fee for the selected date.');
$txt_branches = $lang_line('daily_report_branches', 'Branches');
$txt_branches_note = $lang_line('daily_report_branches_note', 'Active branches available in this company.');
$txt_unknown_account = $lang_line('daily_report_unknown_account', 'Unknown Account');
$txt_received_by_account = $lang_line('daily_report_received_by_account', 'Received Amount -');
$txt_withdraw_by_account = $lang_line('daily_report_withdraw_by_account', 'Today Loan Withdraw -');
$txt_actual_by_account = $lang_line('daily_report_actual_by_account', 'Actual Payments -');
$txt_advance_by_account = $lang_line('daily_report_advance_by_account', 'Advance Payments -');
$txt_opening_balance_all = $lang_line('daily_report_opening_balance_all', 'Opening Balance (All Accounts)');
$txt_opening_balance_by_account = $lang_line('daily_report_opening_balance_by_account', 'Opening Balance -');
$txt_received_all_accounts = $lang_line('daily_report_received_all_accounts', '+ Received Amount (All Accounts)');
$txt_added_received_by_account = $lang_line('daily_report_added_received_by_account', '+ Added (Received) -');
$txt_withdraw_all_accounts = $lang_line('daily_report_withdraw_all_accounts', '- Loan Withdraw (All Accounts)');
$txt_subtracted_withdraw_by_account = $lang_line('daily_report_subtracted_withdraw_by_account', '- Subtracted (Withdraw) -');
$txt_closing_balance_computed = $lang_line('daily_report_closing_balance_computed', '= Closing Balance (Computed)');
$txt_closing_balance_current = $lang_line('daily_report_closing_balance_current', 'Closing Balance (Current Accounts)');
$txt_closing_balance_by_account = $lang_line('daily_report_closing_balance_by_account', 'Closing Balance -');
$txt_total_branches = $lang_line('daily_report_total_branches', 'Total Branches');
$txt_no_branch_data = $lang_line('daily_report_no_branch_data', 'No branch data available.');
$txt_total_customers = $lang_line('daily_report_total_customers_with_loans', 'IDADI YA WATEJA');
$txt_total_customers_note = $lang_line('daily_report_total_customers_with_loans_note', 'All customers in the selected branch/company with active or overdue loans.');
$txt_customers_paid = $lang_line('daily_report_customers_paid_today', 'WALIOLETA');
$txt_customers_paid_note = $lang_line('daily_report_customers_paid_today_note', 'Total customers who made payment on the selected date.');
$txt_new_customers = $lang_line('daily_report_new_customers_today', 'WATEJA WAPYA');
$txt_new_customers_note = $lang_line('daily_report_new_customers_today_note', 'Customers registered on the selected date with exactly one loan on that date.');
?>

<style>
	.daily-report-wrap {
		padding: 24px;
		max-width: 1200px;
		margin: 0 auto;
	}

	.daily-report-header {
		background: linear-gradient(135deg, #0f3d56, #1f6f8b);
		color: #fff;
		border-radius: 14px;
		padding: 24px;
		margin-bottom: 24px;
	}

	.daily-report-title {
		margin: 0 0 8px;
		font-size: 28px;
		font-weight: 700;
	}

	.daily-report-subtitle {
		margin: 0;
		opacity: 0.9;
	}

	.daily-report-filter {
		display: flex;
		gap: 10px;
		align-items: center;
		margin-top: 14px;
		flex-wrap: wrap;
	}

	.daily-report-filter select,
	.daily-report-filter input,
	.daily-report-filter button,
	.daily-report-filter a {
		height: 38px;
		border-radius: 8px;
		font-size: 13px;
	}

	.daily-report-filter select,
	.daily-report-filter input {
		min-width: 220px;
		padding: 0 10px;
		border: 1px solid rgba(255, 255, 255, 0.35);
		background: rgba(255, 255, 255, 0.12);
		color: #fff;
	}

	.daily-report-filter select option {
		color: #12344d;
	}

	.daily-report-filter button {
		padding: 0 14px;
		border: 0;
		font-weight: 600;
		background: #ffffff;
		color: #12344d;
		cursor: pointer;
	}

	.daily-report-filter a {
		display: inline-flex;
		align-items: center;
		padding: 0 14px;
		font-weight: 600;
		text-decoration: none;
		background: rgba(255, 255, 255, 0.16);
		color: #fff;
	}

	.daily-report-grid {
		display: grid;
		grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
		gap: 18px;
		margin-bottom: 24px;
	}

	.daily-report-card {
		background: #ffffff;
		border: 1px solid #e6edf2;
		border-radius: 14px;
		padding: 20px;
		box-shadow: 0 8px 24px rgba(15, 61, 86, 0.08);
	}

	.daily-report-label {
		font-size: 12px;
		font-weight: 700;
		letter-spacing: 0.08em;
		text-transform: uppercase;
		color: #5b7280;
		margin-bottom: 10px;
	}

	.daily-report-value {
		font-size: 30px;
		font-weight: 700;
		line-height: 1.1;
		color: #12344d;
	}

	.daily-report-note {
		margin-top: 8px;
		font-size: 13px;
		color: #6b7c87;
	}

	.daily-report-table-card {
		background: #ffffff;
		border: 1px solid #e6edf2;
		border-radius: 14px;
		overflow: hidden;
		box-shadow: 0 8px 24px rgba(15, 61, 86, 0.08);
	}

	.daily-report-table-wrap {
		overflow-x: auto;
		-webkit-overflow-scrolling: touch;
	}

	.daily-report-table-title {
		padding: 18px 20px;
		margin: 0;
		background: #f7fafc;
		border-bottom: 1px solid #e6edf2;
		font-size: 18px;
		font-weight: 700;
		color: #12344d;
	}

	.daily-report-table {
		width: 100%;
		border-collapse: collapse;
	}

	.daily-report-table th,
	.daily-report-table td {
		padding: 14px 20px;
		border-bottom: 1px solid #edf2f7;
	}

	.daily-report-table th {
		background: #fbfdff;
		font-size: 12px;
		text-transform: uppercase;
		letter-spacing: 0.06em;
		color: #5b7280;
	}

	.daily-report-table td {
		color: #12344d;
		font-size: 14px;
	}

	.daily-report-empty {
		padding: 18px 20px;
		color: #6b7c87;
	}

	@media (max-width: 767px) {
		.daily-report-wrap {
			padding: 16px;
		}

		.daily-report-header {
			padding: 18px;
			border-radius: 12px;
			margin-bottom: 18px;
		}

		.daily-report-title {
			font-size: 22px;
		}

		.daily-report-subtitle {
			font-size: 14px;
			line-height: 1.5;
		}

		.daily-report-grid {
			grid-template-columns: 1fr;
			gap: 14px;
		}

		.daily-report-card {
			padding: 16px;
			border-radius: 12px;
		}

		.daily-report-value {
			font-size: 24px;
			word-break: break-word;
		}

		.daily-report-note {
			font-size: 12px;
		}

		.daily-report-table-title {
			padding: 16px;
			font-size: 16px;
		}

		.daily-report-table thead {
			display: none;
		}

		.daily-report-table,
		.daily-report-table tbody,
		.daily-report-table tr,
		.daily-report-table td {
			display: block;
			width: 100%;
		}

		.daily-report-table tr {
			padding: 12px 16px;
			border-bottom: 1px solid #edf2f7;
		}

		.daily-report-table td {
			padding: 6px 0;
			border-bottom: 0;
			text-align: left;
		}

		.daily-report-table td::before {
			content: attr(data-label);
			display: block;
			margin-bottom: 4px;
			font-size: 11px;
			font-weight: 700;
			letter-spacing: 0.06em;
			text-transform: uppercase;
			color: #5b7280;
		}

		.daily-report-empty {
			padding: 14px 0 0;
		}
	}

	@media (min-width: 768px) and (max-width: 991px) {
		.daily-report-wrap {
			padding: 20px;
		}

		.daily-report-grid {
			grid-template-columns: repeat(2, minmax(0, 1fr));
		}

		.daily-report-value {
			font-size: 26px;
		}
	}
</style>

<div class="w-full lg:ps-64 min-h-screen">
	<div class="p-4 sm:p-6 lg:p-8">
		<div class="daily-report-wrap">
			<div class="daily-report-header">
				<h1 class="daily-report-title"><?php echo $txt_daily_report; ?></h1>
				<p class="daily-report-subtitle"><?php echo $txt_daily_report_desc; ?> <?php echo $txt_date; ?>: <?php echo $report_date; ?> | <?php echo $txt_branch; ?>: <?php echo $selected_branch_name; ?></p>
				<form method="get" action="<?php echo base_url('admin/daily_report'); ?>" class="daily-report-filter">
					<input type="date" name="report_date" value="<?php echo $report_date; ?>">
					<select name="blanch_id">
						<option value="0" <?php echo $selected_blanch_id === 0 ? 'selected' : ''; ?>><?php echo $txt_all_branches; ?></option>
						<?php if (!empty($blanch)): ?>
							<?php foreach ($blanch as $branch_row): ?>
								<option value="<?php echo (int) $branch_row->blanch_id; ?>" <?php echo $selected_blanch_id === (int) $branch_row->blanch_id ? 'selected' : ''; ?>>
									<?php echo $branch_row->blanch_name; ?>
								</option>
							<?php endforeach; ?>
						<?php endif; ?>
					</select>
					<button type="submit"><?php echo $txt_filter; ?></button>
					<a href="<?php echo base_url('admin/daily_report_pdf?report_date=' . urlencode($report_date) . '&blanch_id=' . (int) $selected_blanch_id); ?>" target="_blank"><?php echo $txt_download_pdf; ?></a>
					<a href="<?php echo base_url('admin/next_expectation'); ?>"><?php echo $txt_expected_collections_link; ?></a>
					<a href="<?php echo base_url('admin/daily_report'); ?>"><?php echo $txt_reset; ?></a>
				</form>
			</div>

			<div class="daily-report-grid">
				<div class="daily-report-card">
					<div class="daily-report-label"><?php echo $txt_expected_collections; ?></div>
					<div class="daily-report-value"><?php echo number_format($expected_total); ?></div>
					<div class="daily-report-note"><?php echo $txt_expected_note; ?></div>
				</div>

				<div class="daily-report-card">
					<div class="daily-report-label"><?php echo $txt_received_amount; ?></div>
					<div class="daily-report-value"><?php echo number_format($received_total); ?></div>
					<div class="daily-report-note"><?php echo $txt_received_note; ?></div>
				</div>

				<div class="daily-report-card">
					<div class="daily-report-label"><?php echo $txt_outside_contract; ?></div>
					<div class="daily-report-value"><?php echo number_format($outside_contract_total); ?></div>
					<div class="daily-report-note"><?php echo $txt_outside_contract_note; ?></div>
				</div>

				<div class="daily-report-card">
					<div class="daily-report-label"><?php echo $txt_today_loan_withdraw; ?></div>
					<div class="daily-report-value"><?php echo number_format($withdraw_total); ?></div>
					<div class="daily-report-note"><?php echo $txt_withdraw_note; ?></div>
				</div>

				<div class="daily-report-card">
					<div class="daily-report-label"><?php echo $txt_past_due_payments; ?></div>
					<div class="daily-report-value"><?php echo number_format($past_due_paid); ?></div>
					<div class="daily-report-note"><?php echo $txt_past_due_note; ?></div>
				</div>

				<div class="daily-report-card">
					<div class="daily-report-label"><?php echo $txt_actual_payments; ?></div>
					<div class="daily-report-value"><?php echo number_format($actual_paid); ?></div>
					<div class="daily-report-note"><?php echo $txt_actual_note; ?></div>
				</div>

				<div class="daily-report-card">
					<div class="daily-report-label"><?php echo $txt_advance_payments; ?></div>
					<div class="daily-report-value"><?php echo number_format($advance_paid); ?></div>
					<div class="daily-report-note"><?php echo $txt_advance_note; ?></div>
				</div>

				<div class="daily-report-card" style="border-left: 4px solid #e74c3c;">
					<div class="daily-report-label" style="color:#c0392b;"><?php echo $txt_not_paid_today; ?></div>
					<div class="daily-report-value" style="color:#c0392b;"><?php echo number_format($not_paid_today); ?></div>
					<div class="daily-report-note"><?php echo $txt_not_paid_note; ?></div>
				</div>

				<div class="daily-report-card" style="border-left: 4px solid #e67e22;">
					<div class="daily-report-label" style="color:#d35400;"><?php echo $txt_today_penalty_paid; ?></div>
					<div class="daily-report-value" style="color:#d35400;"><?php echo number_format($penalty_total); ?></div>
					<div class="daily-report-note"><?php echo $txt_penalty_note; ?></div>
				</div>

				<div class="daily-report-card" style="border-left: 4px solid #8e44ad;">
					<div class="daily-report-label" style="color:#7d3c98;"><?php echo $txt_processing_fees; ?></div>
					<div class="daily-report-value" style="color:#7d3c98;"><?php echo number_format($processing_fee_total); ?></div>
					<div class="daily-report-note"><?php echo $txt_processing_note; ?></div>
				</div>

				<div class="daily-report-card">
					<div class="daily-report-label"><?php echo $txt_total_customers; ?></div>
					<div class="daily-report-value"><?php echo number_format($total_customers_count); ?></div>
					<div class="daily-report-note"><?php echo $txt_total_customers_note; ?></div>
				</div>

				<div class="daily-report-card">
					<div class="daily-report-label"><?php echo $txt_customers_paid; ?></div>
					<div class="daily-report-value"><?php echo number_format($customers_paid_count); ?></div>
					<div class="daily-report-note"><?php echo $txt_customers_paid_note; ?></div>
				</div>

				<div class="daily-report-card">
					<div class="daily-report-label"><?php echo $txt_new_customers; ?></div>
					<div class="daily-report-value"><?php echo number_format($new_customers_count); ?></div>
					<div class="daily-report-note"><?php echo $txt_new_customers_note; ?></div>
				</div>

				<div class="daily-report-card">
					<div class="daily-report-label"><?php echo $txt_branches; ?></div>
					<div class="daily-report-value"><?php echo number_format($branch_count); ?></div>
					<div class="daily-report-note"><?php echo $txt_branches_note; ?></div>
				</div>
			</div>

			<div class="daily-report-table-card">
				<h2 class="daily-report-table-title"><?php echo $txt_today_summary; ?></h2>
				<div class="daily-report-table-wrap">
				<table class="daily-report-table">
					<thead>
						<tr>
							<th><?php echo $txt_item; ?></th>
							<th><?php echo $txt_amount; ?></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td data-label="<?php echo $txt_item; ?>"><?php echo $txt_expected_collections; ?></td>
							<td data-label="<?php echo $txt_amount; ?>"><?php echo number_format($expected_total); ?></td>
						</tr>
						<tr>
							<td data-label="<?php echo $txt_item; ?>"><?php echo $txt_received_amount; ?></td>
							<td data-label="<?php echo $txt_amount; ?>"><?php echo number_format($received_total); ?></td>
						</tr>
						<tr>
							<td data-label="<?php echo $txt_item; ?>"><?php echo $txt_outside_contract; ?></td>
							<td data-label="<?php echo $txt_amount; ?>"><?php echo number_format($outside_contract_total); ?></td>
						</tr>
						<?php if (!empty($account_payment_summary)): ?>
							<?php foreach ($account_payment_summary as $account_row): ?>
								<tr>
									<td data-label="<?php echo $txt_item; ?>"><?php echo $txt_received_by_account; ?> <?php echo !empty($account_row->account_name) ? $account_row->account_name : $txt_unknown_account; ?></td>
									<td data-label="<?php echo $txt_amount; ?>"><?php echo number_format((float) $account_row->today_received); ?></td>
								</tr>
							<?php endforeach; ?>
						<?php endif; ?>
						<tr>
							<td data-label="<?php echo $txt_item; ?>"><?php echo $txt_today_loan_withdraw; ?></td>
							<td data-label="<?php echo $txt_amount; ?>"><?php echo number_format($withdraw_total); ?></td>
						</tr>
						<?php if (!empty($account_payment_summary)): ?>
							<?php foreach ($account_payment_summary as $account_row): ?>
								<?php
									$account_name = !empty($account_row->account_name) ? trim((string) $account_row->account_name) : '';
									$is_cash_account = strcasecmp($account_name, 'CASH') === 0;
									$account_withdraw = $is_cash_account ? (float) $withdraw_total : (float) $account_row->today_loan_withdraw;
								?>
								<?php if ($account_withdraw > 0): ?>
									<tr>
										<td data-label="<?php echo $txt_item; ?>"><?php echo $txt_withdraw_by_account; ?> <?php echo !empty($account_row->account_name) ? $account_row->account_name : $txt_unknown_account; ?></td>
										<td data-label="<?php echo $txt_amount; ?>"><?php echo number_format($account_withdraw); ?></td>
									</tr>
								<?php endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>
						<tr>
							<td data-label="<?php echo $txt_item; ?>"><?php echo $txt_past_due_payments; ?></td>
							<td data-label="<?php echo $txt_amount; ?>"><?php echo number_format($past_due_paid); ?></td>
						</tr>
						<tr>
							<td data-label="<?php echo $txt_item; ?>"><?php echo $txt_actual_payments; ?></td>
							<td data-label="<?php echo $txt_amount; ?>"><?php echo number_format($actual_paid); ?></td>
						</tr>
						<?php if (!empty($account_payment_summary)): ?>
							<?php foreach ($account_payment_summary as $account_row): ?>
								<?php if ((float) $account_row->actual_payments > 0): ?>
									<tr>
										<td data-label="<?php echo $txt_item; ?>"><?php echo $txt_actual_by_account; ?> <?php echo !empty($account_row->account_name) ? $account_row->account_name : $txt_unknown_account; ?></td>
										<td data-label="<?php echo $txt_amount; ?>"><?php echo number_format((float) $account_row->actual_payments); ?></td>
									</tr>
								<?php endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>
						<tr>
							<td data-label="<?php echo $txt_item; ?>"><?php echo $txt_advance_payments; ?></td>
							<td data-label="<?php echo $txt_amount; ?>"><?php echo number_format($advance_paid); ?></td>
						</tr>
						<?php if (!empty($account_payment_summary)): ?>
							<?php foreach ($account_payment_summary as $account_row): ?>
								<?php if ((float) $account_row->advance_payments > 0): ?>
									<tr>
										<td data-label="<?php echo $txt_item; ?>"><?php echo $txt_advance_by_account; ?> <?php echo !empty($account_row->account_name) ? $account_row->account_name : $txt_unknown_account; ?></td>
										<td data-label="<?php echo $txt_amount; ?>"><?php echo number_format((float) $account_row->advance_payments); ?></td>
									</tr>
								<?php endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>
						<tr>
							<td data-label="<?php echo $txt_item; ?>" style="color:#c0392b; font-weight:600;"><?php echo $txt_not_paid_today; ?></td>
							<td data-label="<?php echo $txt_amount; ?>" style="color:#c0392b; font-weight:600;"><?php echo number_format($not_paid_today); ?></td>
						</tr>
						<tr>
							<td data-label="<?php echo $txt_item; ?>" style="color:#d35400; font-weight:600;"><?php echo $txt_today_penalty_paid; ?></td>
							<td data-label="<?php echo $txt_amount; ?>" style="color:#d35400; font-weight:600;"><?php echo number_format($penalty_total); ?></td>
						</tr>
						<tr>
							<td data-label="<?php echo $txt_item; ?>" style="color:#7d3c98; font-weight:600;"><?php echo $txt_processing_fees; ?></td>
							<td data-label="<?php echo $txt_amount; ?>" style="color:#7d3c98; font-weight:600;"><?php echo number_format($processing_fee_total); ?></td>
						</tr>
						<tr>
							<td data-label="<?php echo $txt_item; ?>" style="font-weight:600;"><?php echo $txt_total_customers; ?></td>
							<td data-label="<?php echo $txt_amount; ?>"><?php echo number_format($total_customers_count); ?></td>
						</tr>
						<tr>
							<td data-label="<?php echo $txt_item; ?>" style="font-weight:600;"><?php echo $txt_customers_paid; ?></td>
							<td data-label="<?php echo $txt_amount; ?>"><?php echo number_format($customers_paid_count); ?></td>
						</tr>
						<tr>
							<td data-label="<?php echo $txt_item; ?>" style="font-weight:600;"><?php echo $txt_new_customers; ?></td>
							<td data-label="<?php echo $txt_amount; ?>"><?php echo number_format($new_customers_count); ?></td>
						</tr>
						<tr>
							<td data-label="<?php echo $txt_item; ?>" style="font-weight:600; background:#f9fbfd;"><?php echo $txt_opening_balance_all; ?></td>
							<td data-label="<?php echo $txt_amount; ?>" style="font-weight:600; background:#f9fbfd;"><?php echo number_format($total_opening_balance); ?></td>
						</tr>
						<?php if (!empty($account_payment_summary)): ?>
							<?php foreach ($account_payment_summary as $account_row): ?>
								<tr>
									<td data-label="<?php echo $txt_item; ?>" style="padding-left:28px;"><?php echo $txt_opening_balance_by_account; ?> <?php echo !empty($account_row->account_name) ? $account_row->account_name : $txt_unknown_account; ?></td>
									<td data-label="<?php echo $txt_amount; ?>"><?php echo number_format((float) $account_row->opening_balance); ?></td>
								</tr>
							<?php endforeach; ?>
						<?php endif; ?>
						<tr>
							<td data-label="<?php echo $txt_item; ?>" style="padding-left:28px;"><?php echo $txt_received_all_accounts; ?></td>
							<td data-label="<?php echo $txt_amount; ?>"><?php echo number_format($total_received_by_account); ?></td>
						</tr>
						<?php if (!empty($account_payment_summary)): ?>
							<?php foreach ($account_payment_summary as $account_row): ?>
								<tr>
									<td data-label="<?php echo $txt_item; ?>" style="padding-left:48px; color:#1e8449;"><?php echo $txt_added_received_by_account; ?> <?php echo !empty($account_row->account_name) ? $account_row->account_name : $txt_unknown_account; ?></td>
									<td data-label="<?php echo $txt_amount; ?>" style="color:#1e8449;"><?php echo number_format((float) $account_row->today_received); ?></td>
								</tr>
							<?php endforeach; ?>
						<?php endif; ?>
						<tr>
							<td data-label="<?php echo $txt_item; ?>" style="padding-left:28px;"><?php echo $txt_withdraw_all_accounts; ?></td>
							<td data-label="<?php echo $txt_amount; ?>"><?php echo number_format($total_withdraw_by_account); ?></td>
						</tr>
						<?php if (!empty($account_payment_summary)): ?>
							<?php foreach ($account_payment_summary as $account_row): ?>
								<tr>
									<td data-label="<?php echo $txt_item; ?>" style="padding-left:48px; color:#b03a2e;"><?php echo $txt_subtracted_withdraw_by_account; ?> <?php echo !empty($account_row->account_name) ? $account_row->account_name : $txt_unknown_account; ?></td>
									<td data-label="<?php echo $txt_amount; ?>" style="color:#b03a2e;"><?php echo number_format((float) $account_row->today_loan_withdraw); ?></td>
								</tr>
							<?php endforeach; ?>
						<?php endif; ?>
						<tr>
							<td data-label="<?php echo $txt_item; ?>" style="font-weight:700; background:#f3f8fc;"><?php echo $txt_closing_balance_computed; ?></td>
							<td data-label="<?php echo $txt_amount; ?>" style="font-weight:700; background:#f3f8fc;"><?php echo number_format($computed_closing_balance); ?></td>
						</tr>
						<tr>
							<td data-label="<?php echo $txt_item; ?>" style="font-weight:700;"><?php echo $txt_closing_balance_current; ?></td>
							<td data-label="<?php echo $txt_amount; ?>" style="font-weight:700;"><?php echo number_format($total_closing_balance); ?></td>
						</tr>
						<?php if (!empty($account_payment_summary)): ?>
							<?php foreach ($account_payment_summary as $account_row): ?>
								<tr>
									<td data-label="<?php echo $txt_item; ?>" style="padding-left:28px;"><?php echo $txt_closing_balance_by_account; ?> <?php echo !empty($account_row->account_name) ? $account_row->account_name : $txt_unknown_account; ?></td>
									<td data-label="<?php echo $txt_amount; ?>"><?php echo number_format((float) $account_row->closing_balance); ?></td>
								</tr>
							<?php endforeach; ?>
						<?php endif; ?>
						<?php if (!empty($blanch)): ?>
							<tr>
								<td data-label="<?php echo $txt_item; ?>"><?php echo $txt_total_branches; ?></td>
								<td data-label="<?php echo $txt_amount; ?>"><?php echo number_format($branch_count); ?></td>
							</tr>
						<?php else: ?>
							<tr>
								<td colspan="2" class="daily-report-empty"><?php echo $txt_no_branch_data; ?></td>
							</tr>
						<?php endif; ?>
					</tbody>
				</table>
				</div>
			</div>

			
		</div>
	</div>
</div>


<?php
include_once APPPATH . "views/partials/footer.php";
?>
		