
<?php
include_once APPPATH . "views/partials/officerheader.php";
?>


<?php
$expected_total = !empty($today_expected->total_expected) ? (float) $today_expected->total_expected : 0;
$withdraw_total_raw = !empty($total_today_with->total_loan_with) ? (float) $total_today_with->total_loan_with : 0;
$withdraw_total = $withdraw_total_raw;
$received_total = !empty($total_received->total_depost_comp) ? (float) $total_received->total_depost_comp : 0;
$past_due_paid = !empty($payment_breakdown->past_due_paid) ? (float) $payment_breakdown->past_due_paid : 0;
$actual_paid = !empty($payment_breakdown->actual_paid) ? (float) $payment_breakdown->actual_paid : 0;
$advance_paid = !empty($payment_breakdown->advance_paid) ? (float) $payment_breakdown->advance_paid : 0;
$not_paid_today = !empty($payment_breakdown->not_paid_today) ? (float) $payment_breakdown->not_paid_today : 0;
$penalty_total = !empty($penalty_today->total_receved) ? (float) $penalty_today->total_receved : 0;
$penalty_income_type_total = !empty($today_penalty_income_type->total_penalty_income) ? (float) $today_penalty_income_type->total_penalty_income : 0;
$penalty_income_ledger_total = !empty($today_penalty_income_ledger->total_penalty_income) ? (float) $today_penalty_income_ledger->total_penalty_income : 0;
$penalty_income_display_total = $penalty_income_type_total > 0 ? $penalty_income_type_total : $penalty_income_ledger_total;
$processing_fee_total = !empty($processing_fee->total_deducted) ? (float) $processing_fee->total_deducted : 0;
$received_by_account = !empty($received_by_account) ? $received_by_account : array();
$account_payment_summary = !empty($account_payment_summary) ? $account_payment_summary : array();
$today_loan_withdraw_by_account = !empty($today_loan_withdraw_by_account) ? $today_loan_withdraw_by_account : array();
$today_accepted_expenses = !empty($today_accepted_expenses) ? $today_accepted_expenses : array();
$today_hq_transfer_in = !empty($today_hq_transfer_in) ? $today_hq_transfer_in : array();
$report_date = !empty($report_date) ? $report_date : date('Y-m-d');
$selected_branch_name = !empty($selected_branch_name) ? $selected_branch_name : '-';
$yesterday_date = date('Y-m-d', strtotime($report_date . ' -1 day'));
$today_loan_withdraw_url = base_url('oficer/loan_withdrawal?from_date=' . urlencode($report_date) . '&to_date=' . urlencode($report_date));

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

// Use the same amount as the top "Today Loan Withdraw" card for GAWA summary.
$total_withdraw_by_account = $withdraw_total_raw;

$received_total = $total_received_by_account;
$withdraw_total = $total_withdraw_by_account;
$computed_closing_balance = $total_opening_balance + $total_received_by_account - $total_withdraw_by_account;





$lang_line = function ($key, $fallback) {
	$value = $this->lang->line($key);
	return !empty($value) ? $value : $fallback;
};

$txt_title = $lang_line('officer_daily_report_title', 'Daily Report');
$txt_subtitle = $lang_line('officer_daily_report_subtitle', 'Expected collection and today loan withdrawal summary.');
$txt_date = $lang_line('date', 'Date');
$txt_branch = $lang_line('branch', 'Branch');
$txt_filter = $lang_line('filter', 'Filter');
$txt_reset = $lang_line('reset', 'Reset');
$txt_download_pdf = $lang_line('download_pdf', 'Download PDF');
$txt_yesterday = $lang_line('npt_yesterday', 'Yesterday');
$txt_expected_collection = $lang_line('officer_daily_expected_collection', 'Expected Collection');
$txt_expected_note = $lang_line('officer_daily_expected_note', 'Total expected collection for today.');
$txt_received_amount = $lang_line('officer_daily_received_amount', 'Received Amount');
$txt_received_note = $lang_line('officer_daily_received_note', 'Total received amount for today.');
$txt_today_loan_withdraw = $lang_line('officer_daily_today_loan_withdraw', 'Today Loan Withdraw');
$txt_withdraw_note = $lang_line('officer_daily_withdraw_note', 'Total disbursed loans for today.');
$txt_past_due_payments = $lang_line('officer_daily_past_due_payments', 'Past Due Payments');
$txt_past_due_note = $lang_line('officer_daily_past_due_note', 'Paid today for missed previous due dates.');
$txt_actual_payments = $lang_line('officer_daily_actual_payments', 'Actual Payments');
$txt_actual_note = $lang_line('officer_daily_actual_note', 'Paid today for today\'s scheduled installment.');
$txt_advance_payments = $lang_line('officer_daily_advance_payments', 'Advance Payments');
$txt_advance_note = $lang_line('officer_daily_advance_note', 'Paid above due amount and carried forward.');
$txt_not_paid_today = $lang_line('officer_daily_not_paid_today', 'Not Paid Today');
$txt_not_paid_note = $lang_line('officer_daily_not_paid_note', 'Expected today but not yet received.');
$txt_penalty_paid_today = $lang_line('officer_daily_penalty_paid_today', 'Penalty Paid Today');
$txt_penalty_note = $lang_line('officer_daily_penalty_note', 'Total penalty income received today.');
$txt_processing_fee = $lang_line('officer_daily_processing_fee', 'Processing Fee');
$txt_processing_note = $lang_line('officer_daily_processing_note', 'Total deducted processing fee today.');
$txt_today_summary = $lang_line('officer_daily_today_summary', 'Today Summary');
$txt_item = $lang_line('officer_daily_item', 'Item');
$txt_amount = $lang_line('officer_daily_amount', 'Amount');
$txt_unknown_account = $lang_line('officer_daily_unknown_account', 'Unknown Account');
$txt_received_amount_account = $lang_line('officer_daily_received_amount_account', 'Received Amount - %s');
$txt_withdraw_account = $lang_line('officer_daily_withdraw_account', 'Today Loan Withdraw - %s');
$txt_actual_account = $lang_line('officer_daily_actual_account', 'Actual Payments - %s');
$txt_advance_account = $lang_line('officer_daily_advance_account', 'Advance Payments - %s');
$txt_opening_all_accounts = $lang_line('officer_daily_opening_all_accounts', 'JANA (Yesterday Balance - All Accounts)');
$txt_opening_account = $lang_line('officer_daily_opening_account', 'JANA - %s');
$txt_plus_added_received_account = $lang_line('officer_daily_plus_added_received_account', 'LEO Loan Payment - %s');
$txt_plus_penalty_added_account = $lang_line('officer_daily_plus_penalty_added_account', 'LEO Penalty Income - %s');
$txt_penalty_payment = $lang_line('officer_daily_penalty_payment', 'Malipo ya Faini');
$txt_form_payment = $lang_line('officer_daily_form_payment', 'Malipo ya Fomu');
$txt_minus_withdraw_all = $lang_line('officer_daily_minus_withdraw_all', 'GAWA (Loan Withdrawal - All Accounts)');
$txt_minus_subtracted_withdraw_account = $lang_line('officer_daily_minus_subtracted_withdraw_account', 'GAWA - %s');
$txt_hq_transfer_in = $lang_line('officer_daily_hq_transfer_in', 'Imetoka HQ');
$txt_hq_transfer_in_account = $lang_line('officer_daily_hq_transfer_in_account', 'Imetoka HQ - %s');
$txt_closing_current = 'Salio la Akaunti ya Tawi';
$txt_closing_account = 'Salio la Akaunti ya Tawi - %s';
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

	.daily-report-card-link {
		display: block;
		text-decoration: none;
		color: inherit;
	}

	.daily-report-card-link:hover .daily-report-card,
	.daily-report-card-link:focus .daily-report-card {
		transform: translateY(-2px);
		box-shadow: 0 12px 28px rgba(15, 61, 86, 0.14);
		border-color: #b7d7e5;
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
	/* ---- Summary table: flex-row per row on all devices < 768px ---- */

	@media (max-width: 767px) {
		.daily-report-wrap {
			padding: 12px;
		}
		.daily-report-header {
			padding: 14px;
			border-radius: 10px;
			margin-bottom: 14px;
		}
		.daily-report-title {
			font-size: 18px;
		}
		.daily-report-subtitle {
			font-size: 12px;
			line-height: 1.5;
		}
		.daily-report-header form {
			gap: 6px;
		}
		.daily-report-header form input[type=date],
		.daily-report-header form a,
		.daily-report-header form button[type=submit] {
			font-size: 11px;
			padding: 5px 9px;
		}
		.daily-report-grid {
			grid-template-columns: repeat(2, minmax(0, 1fr));
			gap: 10px;
			margin-bottom: 14px;
		}
		.daily-report-card {
			padding: 12px;
			border-radius: 10px;
		}
		.daily-report-label {
			font-size: 10px;
			margin-bottom: 6px;
		}
		.daily-report-value {
			font-size: 18px;
			word-break: break-all;
		}
		.daily-report-note {
			font-size: 10px;
			margin-top: 4px;
		}
		.daily-report-table-card {
			border-radius: 10px;
		}
		.daily-report-table-title {
			padding: 12px 14px;
			font-size: 15px;
		}
		/* Each summary row is a flex row: item left, amount right */
		.daily-report-table tr {
			display: flex;
			align-items: baseline;
			flex-wrap: nowrap;
			gap: 6px;
			padding: 8px 12px;
			border-bottom: 1px solid #edf2f7;
		}
		.daily-report-table td {
			display: block;
			font-size: 12px;
			padding: 0;
			border-bottom: none;
			word-break: break-word;
			line-height: 1.5;
		}
		/* Item column grows; reset any inline padding-left indents */
		.daily-report-table td:first-child {
			flex: 1;
			min-width: 0;
			padding-left: 0 !important;
		}
		/* Amount column stays on right, no wrap */
		.daily-report-table td:last-child {
			flex-shrink: 0;
			text-align: right;
			white-space: nowrap;
			max-width: 45%;
		}
		/* Full-width colspan rows */
		.daily-report-table td[colspan] {
			flex: 1 1 100%;
			max-width: 100%;
		}
		/* Smaller transfer button on mobile */
		.transfer-open-btn {
			font-size: 10px !important;
			padding: 3px 8px !important;
			margin-top: 4px;
			display: inline-block !important;
			white-space: normal !important;
		}
		.daily-report-empty {
			padding: 12px 14px;
		}
	}

	@media (max-width: 479px) {
		.daily-report-grid {
			grid-template-columns: repeat(2, minmax(0, 1fr));
			gap: 8px;
		}
		.daily-report-value {
			font-size: 15px;
			word-break: break-all;
		}
		.daily-report-label {
			font-size: 9px;
		}
		.daily-report-note {
			font-size: 10px;
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
				<h1 class="daily-report-title"><?php echo $txt_title; ?></h1>
				<p class="daily-report-subtitle"><?php echo $txt_subtitle; ?></p>
				<p class="daily-report-subtitle"><?php echo $txt_date; ?>: <strong><?php echo htmlspecialchars($report_date); ?></strong> | <?php echo $txt_branch; ?>: <strong><?php echo htmlspecialchars($selected_branch_name); ?></strong></p>
				<form method="get" action="<?php echo base_url('oficer/daily_report'); ?>" class="mt-3 flex flex-wrap items-end gap-2">
					<div>
						<label class="block text-xs text-white mb-1"><?php echo $txt_date; ?></label>
						<input type="date" name="report_date" value="<?php echo htmlspecialchars($report_date); ?>" class="border border-gray-300 rounded-lg text-sm px-3 py-2 text-gray-900" />
					</div>
					<button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-cyan-700 hover:bg-cyan-800 rounded-lg"><?php echo $txt_filter; ?></button>
					<a href="<?php echo base_url('oficer/daily_report?report_date=' . urlencode($yesterday_date)); ?>" class="px-4 py-2 text-sm font-medium text-amber-800 bg-amber-100 hover:bg-amber-200 rounded-lg"><?php echo $txt_yesterday; ?></a>
					<a href="<?php echo base_url('oficer/daily_report_pdf?report_date=' . urlencode($report_date)); ?>" class="px-4 py-2 text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 rounded-lg"><?php echo $txt_download_pdf; ?></a>
					<a href="<?php echo base_url('oficer/daily_report'); ?>" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg"><?php echo $txt_reset; ?></a>
				</form>
			</div>

			<div class="daily-report-grid">
				<!-- <div class="daily-report-card">
					<div class="daily-report-label"><?php echo $txt_expected_collection; ?></div>
					<div class="daily-report-value"><?php echo number_format($expected_total); ?></div>
					<div class="daily-report-note"><?php echo $txt_expected_note; ?></div>
				</div> -->

			

				<a href="<?php echo $today_loan_withdraw_url; ?>" class="daily-report-card-link">
					<div class="daily-report-card">
						<div class="daily-report-label"><?php echo $txt_today_loan_withdraw; ?></div>
						<div class="daily-report-value"><?php echo number_format($withdraw_total_raw); ?></div>
						<div class="daily-report-note"><?php echo $txt_withdraw_note; ?></div>
					</div>
				</a>

			

			


			

				<div class="daily-report-card" style="border-left: 4px solid #e67e22;">
					<div class="daily-report-label" style="color:#d35400;"><?php echo $txt_penalty_paid_today; ?></div>
					<div class="daily-report-value" style="color:#d35400;"><?php echo number_format($penalty_total); ?></div>
					<div class="daily-report-note"><?php echo $txt_penalty_note; ?></div>
				</div>

				<div class="daily-report-card" style="border-left: 4px solid #8e44ad;">
					<div class="daily-report-label" style="color:#7d3c98;"><?php echo $txt_processing_fee; ?></div>
					<div class="daily-report-value" style="color:#7d3c98;"><?php echo number_format($processing_fee_total); ?></div>
					<div class="daily-report-note"><?php echo $txt_processing_note; ?></div>
				</div>
			</div>

			<div class="daily-report-table-card">
				<h2 class="daily-report-table-title"><?php echo $txt_today_summary; ?></h2>
				<div class="daily-report-table-wrap">
				<table class="daily-report-table">
					<tbody>
					
					

						<tr>
							<td data-label="<?php echo $txt_item; ?>" style="font-weight:600; background:#f9fbfd;"><?php echo $txt_opening_all_accounts; ?></td>
							<td data-label="<?php echo $txt_amount; ?>" style="font-weight:600; background:#f9fbfd;"><?php echo number_format($total_opening_balance); ?></td>
						</tr>
						<?php if (!empty($account_payment_summary)): ?>
							<?php foreach ($account_payment_summary as $account_row): ?>
								<tr>
									<td data-label="<?php echo $txt_item; ?>" style="padding-left:28px;"><?php echo sprintf($txt_opening_account, !empty($account_row->account_name) ? $account_row->account_name : $txt_unknown_account); ?></td>
									<td data-label="<?php echo $txt_amount; ?>"><?php echo number_format((float) $account_row->opening_balance); ?></td>
								</tr>
							<?php endforeach; ?>
						<?php endif; ?>
						<tr>
							<td data-label="<?php echo $txt_item; ?>" colspan="2" style="padding-left:28px; font-weight:700; color:#1e8449; background:#f0faf4;">Leo Summary</td>
						</tr>
						<?php if (!empty($account_payment_summary)): ?>
							<?php foreach ($account_payment_summary as $account_row): ?>
								<tr>
									<td data-label="<?php echo $txt_item; ?>" style="padding-left:48px; color:#1e8449;"><?php echo sprintf($txt_plus_added_received_account, !empty($account_row->account_name) ? $account_row->account_name : $txt_unknown_account); ?></td>
									<td data-label="<?php echo $txt_amount; ?>" style="color:#1e8449;">
										<div style="display:inline-flex; align-items:center; gap:10px; flex-wrap:wrap;">
											<span>+<?php echo number_format((float) $account_row->today_received); ?></span>
											<?php if ((float) $account_row->today_received > 0): ?>
												<button type="button" class="px-3 py-1 text-xs font-semibold text-white bg-green-600 hover:bg-green-700 rounded-md transfer-open-btn" style="white-space:nowrap;" data-trans-id="<?php echo (int) $account_row->trans_id; ?>" data-account-name="<?php echo htmlspecialchars(!empty($account_row->account_name) ? $account_row->account_name : $txt_unknown_account, ENT_QUOTES, 'UTF-8'); ?>" data-account-balance="<?php echo htmlspecialchars(number_format((float) $account_row->today_received, 2, '.', ''), ENT_QUOTES, 'UTF-8'); ?>" data-report-date="<?php echo htmlspecialchars($report_date, ENT_QUOTES, 'UTF-8'); ?>">Tuma Makao Makuu</button>
											<?php endif; ?>
										</div>
									</td>
								</tr>
								<?php if (!empty($account_row->penalty_added_to_cash) && (float) $account_row->penalty_added_to_cash > 0): ?>
									<tr>
										<td data-label="<?php echo $txt_item; ?>" style="padding-left:64px; color:#d35400;"><?php echo sprintf($txt_plus_penalty_added_account, !empty($account_row->account_name) ? $account_row->account_name : $txt_unknown_account); ?></td>
										<td data-label="<?php echo $txt_amount; ?>" style="color:#d35400;">+<?php echo number_format((float) $account_row->penalty_added_to_cash); ?></td>
									</tr>
								<?php endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>
						<!-- <tr>
							<td data-label="<?php echo $txt_item; ?>" style="padding-left:48px; color:#d35400;"><?php echo $txt_penalty_payment; ?></td>
							<td data-label="<?php echo $txt_amount; ?>" style="color:#d35400;">+<?php echo number_format($penalty_income_display_total); ?></td>
						</tr> -->
						<!-- <tr>
							<td data-label="<?php echo $txt_item; ?>" style="padding-left:48px; color:#7d3c98;"><?php echo $txt_form_payment; ?></td>
							<td data-label="<?php echo $txt_amount; ?>" style="color:#7d3c98;">+<?php echo number_format((float) $processing_fee_total); ?></td>
						</tr> -->
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
							<tr>
								<td data-label="<?php echo $txt_item; ?>" style="padding-left:28px; font-weight:700; color:#b03a2e; background:#fdf3f2;">- Gawa Summary = Mikopo iliyotolewa leo</td>
								
							</tr>
							<?php foreach ($gawa_accounts as $account_row): ?>
								<tr>
									<td data-label="<?php echo $txt_item; ?>" colspan="2" style="padding-left:36px; font-weight:600; color:#b03a2e; background:#fff7f6; font-size:13px;"><?php echo htmlspecialchars(!empty($account_row->account_name) ? $account_row->account_name : $txt_unknown_account); ?></td>
								</tr>
								<tr>
								<td data-label="<?php echo $txt_item; ?>" style="padding-left:52px; color:#b03a2e;">- Mkopo Uliotolewa</td>
								<td data-label="<?php echo $txt_amount; ?>" style="color:#b03a2e;"><?php echo number_format((float) $account_row->total_loan_with); ?></td>
								</tr>
							<?php endforeach; ?>
						<?php endif; ?>
						<?php if (!empty($today_accepted_expenses)): ?>
							<tr>
								<td data-label="<?php echo $txt_item; ?>" colspan="2" style="padding-left:28px; font-weight:700; color:#7d3c98; background:#f9f4ff;">Matumizi</td>
							</tr>
							<?php
							$exp_grouped = array();
							foreach ($today_accepted_expenses as $exp_row) {
								$acct = !empty($exp_row->account_name) ? $exp_row->account_name : 'Bila Akaunti';
								$exp_grouped[$acct][] = $exp_row;
							}
							foreach ($exp_grouped as $acct_name => $exp_items):
							?>
								<tr>
									<td data-label="<?php echo $txt_item; ?>" colspan="2" style="padding-left:36px; font-weight:600; color:#7d3c98; background:#fdf8ff; font-size:13px;"><?php echo htmlspecialchars($acct_name); ?></td>
								</tr>
								<?php foreach ($exp_items as $exp_row): ?>
									<tr>
										<td data-label="<?php echo $txt_item; ?>" style="padding-left:52px; color:#7d3c98;">- <?php echo htmlspecialchars(!empty($exp_row->ex_name) ? $exp_row->ex_name : (!empty($exp_row->req_description) ? $exp_row->req_description : '-')); ?></td>
										<td data-label="<?php echo $txt_amount; ?>" style="color:#7d3c98;"><?php echo number_format((float) $exp_row->req_amount); ?></td>
									</tr>
								<?php endforeach; ?>
							<?php endforeach; ?>
						<?php endif; ?>
						<tr>
							<td data-label="<?php echo $txt_item; ?>" style="font-weight:700;"><?php echo $txt_closing_current; ?></td>
							<td data-label="<?php echo $txt_amount; ?>" style="font-weight:700;"><?php echo number_format($total_closing_balance); ?></td>
						</tr>
						<?php if (!empty($account_payment_summary)): ?>
							<?php foreach ($account_payment_summary as $account_row): ?>
								<tr>
									<td data-label="<?php echo $txt_item; ?>" style="padding-left:28px;"><?php echo sprintf($txt_closing_account, !empty($account_row->account_name) ? $account_row->account_name : $txt_unknown_account); ?></td>
									<td data-label="<?php echo $txt_amount; ?>"><?php echo number_format((float) $account_row->closing_balance); ?></td>
								</tr>
							<?php endforeach; ?>
						<?php endif; ?>
					</tbody>
				</table>
				</div>
			</div>

			
		</div>
	</div>
</div>

<div id="transferModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/60 px-4">
	<div class="w-full max-w-md rounded-2xl bg-white shadow-2xl overflow-hidden">
		<div class="flex items-center justify-between border-b border-slate-200 px-5 py-4">
			<h3 class="text-lg font-bold text-slate-900">Tuma Makao Makuu</h3>
			<button type="button" id="transferModalClose" class="text-slate-500 hover:text-slate-900 text-2xl leading-none">&times;</button>
		</div>
		<form action="<?php echo site_url('oficer/transfer_branch_repayment_to_company'); ?>" method="post" class="px-5 py-5 space-y-4">
			<input type="hidden" name="report_date" value="<?php echo htmlspecialchars($report_date); ?>" />
			<input type="hidden" name="selected_trans_id" id="transferSelectedTransId" value="" />
			<div>
				<div class="text-sm font-semibold text-slate-700">Account</div>
				<div id="transferAccountName" class="mt-1 rounded-lg bg-slate-100 px-3 py-2 text-sm text-slate-900"></div>
			</div>
			<div>
				<div class="text-sm font-semibold text-slate-700">Kiasi Cha Marejesho Yaliyokusanywa</div>
				<div id="transferAccountBalance" class="mt-1 rounded-lg bg-emerald-50 px-3 py-2 text-sm font-semibold text-emerald-800"></div>
			</div>
			<div>
				<label for="transferAmount" class="block text-sm font-semibold text-slate-700">Kiasi Cha Kutuma</label>
				<input type="text" inputmode="numeric" id="transferAmount" name="transfer_amount" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 text-slate-900 focus:border-emerald-500 focus:ring-emerald-500" />
				<p class="mt-1 text-xs text-slate-500">Hakikisha Kiasi utakachotuma hapa ndicho utakachotuma kwenye akaunti ya kampuni.</p>
			</div>
			<div class="flex items-center justify-end gap-3 pt-2">
				<button type="button" id="transferModalCancel" class="rounded-lg bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-200">Cancel</button>
				<button type="submit" class="rounded-lg bg-green-600 px-4 py-2 text-sm font-semibold text-white hover:bg-green-700">Tuma Makao Makuu</button>
			</div>
		</form>
	</div>
</div>

<script>
(function () {
	var modal = document.getElementById('transferModal');
	var closeBtn = document.getElementById('transferModalClose');
	var cancelBtn = document.getElementById('transferModalCancel');
	var selectedTransInput = document.getElementById('transferSelectedTransId');
	var accountNameEl = document.getElementById('transferAccountName');
	var accountBalanceEl = document.getElementById('transferAccountBalance');
	var amountInput = document.getElementById('transferAmount');
	var openButtons = document.querySelectorAll('.transfer-open-btn');

	function openModal(button) {
		selectedTransInput.value = button.getAttribute('data-trans-id') || '';
		accountNameEl.textContent = button.getAttribute('data-account-name') || '';
		var balance = button.getAttribute('data-account-balance') || '0';
		accountBalanceEl.textContent = balance;
		amountInput.value = formatAmount(balance);
		amountInput.dataset.rawValue = balance;
		modal.classList.remove('hidden');
		modal.classList.add('flex');
		setTimeout(function () { amountInput.focus(); }, 0);
	}

	function closeModal() {
		modal.classList.add('hidden');
		modal.classList.remove('flex');
	}

	function parseAmount(value) {
		return parseFloat(String(value || '').replace(/,/g, '').replace(/[^0-9.]/g, '')) || 0;
	}

	function formatAmount(value) {
		var parsed = parseAmount(value);
		return parsed ? parsed.toLocaleString('en-US', { maximumFractionDigits: 0 }) : '';
	}

	amountInput.addEventListener('input', function () {
		var raw = parseAmount(amountInput.value);
		amountInput.value = raw ? raw.toLocaleString('en-US', { maximumFractionDigits: 2 }) : '';
		amountInput.dataset.rawValue = String(raw || '');
	});

	amountInput.addEventListener('blur', function () {
		amountInput.value = formatAmount(amountInput.value);
	});

	modal.querySelector('form').addEventListener('submit', function () {
		amountInput.value = String(parseAmount(amountInput.value));
	});

	openButtons.forEach(function (button) {
		button.addEventListener('click', function () {
			openModal(button);
		});
	});

	closeBtn.addEventListener('click', closeModal);
	cancelBtn.addEventListener('click', closeModal);
	modal.addEventListener('click', function (event) {
		if (event.target === modal) {
			closeModal();
		}
	});
	document.addEventListener('keydown', function (event) {
		if (event.key === 'Escape' && !modal.classList.contains('hidden')) {
			closeModal();
		}
	});
})();
</script>


<?php
include_once APPPATH . "views/partials/footer.php";
?>
		