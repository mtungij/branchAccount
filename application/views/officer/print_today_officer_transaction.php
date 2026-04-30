<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title><?= htmlspecialchars($company_data->comp_name ?? 'Today Officer Transaction') ?> | Today Officer Transaction</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			font-size: 12px;
			color: #333;
		}
		.header {
			text-align: center;
			margin-bottom: 10px;
		}
		.header img {
			max-height: 80px;
			margin-bottom: 8px;
		}
		table {
			border-collapse: collapse;
			width: 100%;
			margin-top: 10px;
		}
		th, td {
			border: 1px solid #ddd;
			padding: 6px 8px;
			text-align: left;
		}
		th {
			background: #00bcd4;
			color: #fff;
		}
		.total-row {
			background: #f2f2f2;
			font-weight: bold;
		}
		.section-title {
			margin-top: 16px;
			font-weight: bold;
			text-align: left;
		}
	</style>
</head>
<body>
<?php
	$companyName = isset($company_data->comp_name) ? $company_data->comp_name : '';
	$companyAddress = isset($company_data->adress) ? $company_data->adress : '';
	$companyEmail = isset($company_data->email) ? $company_data->email : '';
	$companyPhone = isset($company_data->phone_no) ? $company_data->phone_no : '';
	$branchCode = isset($blanch_data->branch_code) ? $blanch_data->branch_code : '';

	$logo_url = '';
	$companyLogo = isset($company_data->comp_logo) ? $company_data->comp_logo : '';
	if (!empty($companyLogo) && file_exists(FCPATH . 'assets/images/company_logo/' . $companyLogo)) {
		$logo_url = 'file://' . FCPATH . 'assets/images/company_logo/' . $companyLogo;
	} elseif (!empty($companyLogo) && file_exists(FCPATH . 'assets/img/' . $companyLogo)) {
		$logo_url = 'file://' . FCPATH . 'assets/img/' . $companyLogo;
	}

	$today = date('d-m-Y');
	$totalDeposit = isset($sum_cashTransaction->total_deposit) ? $sum_cashTransaction->total_deposit : 0;
	$totalApprove = isset($sum_cashTransaction->total_aprove) ? $sum_cashTransaction->total_aprove : 0;
?>

<div class="header">
	<?php if ($logo_url): ?>
		<img src="<?= $logo_url; ?>" alt="Company Logo" />
	<?php endif; ?>
	<div><strong><?= htmlspecialchars($companyName); ?></strong></div>
	<div><?= htmlspecialchars($companyAddress); ?></div>
	<div><?= htmlspecialchars($companyEmail); ?> <?= !empty($companyPhone) ? ' | ' . htmlspecialchars($companyPhone) : ''; ?></div>
	<div><strong>Today Officer Transaction Report</strong> - <?= $today; ?></div>
	<?php if (!empty($branchCode)): ?>
		<div>Branch Code: <?= htmlspecialchars($branchCode); ?></div>
	<?php endif; ?>
</div>

<table>
	<thead>
		<tr>
			<th>S/No</th>
			<th>Afisa</th>
			<th>Jina La Mteja</th>
			<th>Namba Ya Simu</th>
			<th>Lipwa</th>
			<th>Account ya kulipisha</th>
			<th>Gawa</th>
			<th>Account Gawa</th>
			<th>Tarehe</th>
		</tr>
	</thead>
	<tbody>
		<?php $sno = 1; ?>
		<?php if (!empty($cash_transaction)): ?>
			<?php foreach ($cash_transaction as $cashs): ?>
				<tr>
					<td><?= $sno++; ?></td>
					<td><?= htmlspecialchars($cashs->empl_name ?? ''); ?></td>
					<td><?= htmlspecialchars(($cashs->f_name ?? '') . ' ' . ($cashs->m_name ?? '') . ' ' . ($cashs->l_name ?? '')); ?></td>
					<td><?= htmlspecialchars($cashs->phone_no ?? ''); ?></td>
					<td><?= $cashs->depost ? number_format($cashs->depost) : '-'; ?></td>
					<td><?= !empty($cashs->deposit_account) ? htmlspecialchars($cashs->deposit_account) : '-'; ?></td>
					<td><?= $cashs->withdraw ? number_format($cashs->loan_aprov) : '-'; ?></td>
					<td><?= !empty($cashs->withdrawal_account) ? htmlspecialchars($cashs->withdrawal_account) : '-'; ?></td>
					<td><?= htmlspecialchars($cashs->time_rec ?? ''); ?></td>
				</tr>
			<?php endforeach; ?>
		<?php endif; ?>
		<tr class="total-row">
			<td></td>
			<td></td>
			<td></td>
			<td><strong>JUMLA</strong></td>
			<td><strong><?= number_format($totalDeposit); ?></strong></td>
			<td></td>
			<td><strong><?= number_format($totalApprove); ?></strong></td>
			<td></td>
			<td></td>
		</tr>
	</tbody>
</table>

<div class="section-title">MUHTASARI WA KULIPISHA</div>
<table>
	<thead>
		<tr>
			<th>Account</th>
			<th>Jumla</th>
		</tr>
	</thead>
	<tbody>
		<?php if (!empty($account_deposit)): ?>
			<?php foreach ($account_deposit as $account_deposits): ?>
				<tr>
					<td><?= htmlspecialchars($account_deposits->account_name ?? ''); ?></td>
					<td><?= number_format($account_deposits->total_deposit_acc ?? 0); ?></td>
				</tr>
			<?php endforeach; ?>
		<?php endif; ?>
	</tbody>
</table>

<div class="section-title">MADENI SUGU</div>
<table>
	<thead>
		<tr>
			<th>Mteja</th>
			<th>Kiasi</th>
			<th>Account</th>
		</tr>
	</thead>
	<tbody>
		<?php if (!empty($default_list)): ?>
			<?php foreach ($default_list as $default_lists): ?>
				<tr>
					<td><?= htmlspecialchars(($default_lists->f_name ?? '') . ' ' . ($default_lists->m_name ?? '') . ' ' . ($default_lists->l_name ?? '')); ?></td>
					<td><?= number_format($default_lists->depost ?? 0); ?></td>
					<td><?= htmlspecialchars($default_lists->account_name ?? ''); ?></td>
				</tr>
			<?php endforeach; ?>
		<?php endif; ?>
		<tr class="total-row">
			<td><strong>JUMLA MADENI SUGU</strong></td>
			<td><strong><?= number_format($toyal_default->total_default ?? 0); ?></strong></td>
			<td></td>
		</tr>
	</tbody>
</table>

</body>
</html>
