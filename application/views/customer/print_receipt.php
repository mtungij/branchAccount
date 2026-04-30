<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Risiti ya Malipo - <?= $customer->f_name . ' ' . $customer->l_name; ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Arial', sans-serif;
            padding: 15px;
            background: white;
        }
        .receipt-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
        }
        .header {
            text-align: center;
            border-bottom: 4px solid #0891b2;
            padding-bottom: 20px;
            margin-bottom: 25px;
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            padding: 25px;
            border-radius: 10px 10px 0 0;
        }
        .company-logo {
            max-width: 100px;
            max-height: 100px;
            margin: 0 auto 15px;
            display: block;
            border: 3px solid #0891b2;
            border-radius: 50%;
            padding: 5px;
            background: white;
        }
        .company-name {
            font-size: 26px;
            font-weight: bold;
            color: #0891b2;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .receipt-title {
            font-size: 18px;
            color: #334155;
            margin-top: 12px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            border-top: 2px solid #cbd5e1;
            padding-top: 12px;
            display: inline-block;
        }
        .customer-info {
            background: #f8fafc;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #0891b2;
        }
        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }
        .info-item {
            margin-bottom: 10px;
        }
        .info-label {
            font-size: 11px;
            color: #64748b;
            text-transform: uppercase;
            margin-bottom: 4px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        .info-value {
            font-size: 14px;
            font-weight: bold;
            color: #1e293b;
        }
        .loan-dates {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 2px solid #f59e0b;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
        .date-item {
            text-align: center;
        }
        .date-label {
            font-size: 11px;
            color: #92400e;
            text-transform: uppercase;
            font-weight: 700;
            margin-bottom: 5px;
            letter-spacing: 0.5px;
        }
        .date-value {
            font-size: 15px;
            font-weight: bold;
            color: #78350f;
            background: white;
            padding: 8px;
            border-radius: 6px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .summary-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-bottom: 25px;
        }
        .summary-card {
            padding: 18px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        .summary-card.total {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            border: 2px solid #3b82f6;
        }
        .summary-card.paid {
            background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%);
            border: 2px solid #22c55e;
        }
        .summary-card.remaining {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            border: 2px solid #ef4444;
        }
        .summary-label {
            font-size: 10px;
            color: #475569;
            text-transform: uppercase;
            margin-bottom: 8px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        .summary-amount {
            font-size: 18px;
            font-weight: bold;
        }
        .table-title {
            background: linear-gradient(135deg, #0891b2 0%, #0e7490 100%);
            color: white;
            padding: 12px 15px;
            margin: 25px 0 0 0;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 6px 6px 0 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 0;
            border: 2px solid #cbd5e1;
            border-radius: 0 0 6px 6px;
            overflow: hidden;
        }
        thead {
            background: linear-gradient(135deg, #0891b2 0%, #0e7490 100%);
            color: white;
        }
        th {
            padding: 12px 10px;
            text-align: left;
            font-size: 11px;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 12px;
        }
        tbody tr:nth-child(even) {
            background: #f9fafb;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 3px double #cbd5e1;
            text-align: center;
            color: #64748b;
            font-size: 11px;
            background: #f8fafc;
            padding: 20px;
            border-radius: 8px;
        }
        .footer strong {
            color: #0891b2;
            font-size: 13px;
        }
        .paid-row {
            background: #f0fdf4 !important;
        }
        .paid-row td:first-child {
            border-left: 4px solid #22c55e;
        }
        .missed-row {
            background: #fef2f2 !important;
        }
        .missed-row td:first-child {
            border-left: 4px solid #ef4444;
        }
        .outside-contract-row {
            background: #faf5ff !important;
        }
        .outside-contract-row td:first-child {
            border-left: 4px solid #9333ea;
        }
        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 10px;
            font-weight: bold;
            letter-spacing: 0.5px;
        }
        .badge-success {
            background: #22c55e;
            color: white;
        }
        .badge-danger {
            background: #ef4444;
            color: white;
        }
    </style>
</head>
<body>
    <div class="receipt-container">
        <!-- Header -->
        <div class="header">
            <?php if (!empty($company->comp_logo)): ?>
                <?php 
                    // Use absolute file path for mPDF
                    $logo_path = FCPATH . 'assets/images/company_logo/' . $company->comp_logo;
                ?>
                <img src="<?= $logo_path; ?>" 
                     alt="Company Logo" 
                     class="company-logo">
            <?php endif; ?>
            <div class="company-name"><?= $company->comp_name ?? 'MFUMO WA MIKOPO'; ?></div>
            <div style="color: #475569; font-size: 12px; margin-top: 5px;">
                <?= $company->comp_address ?? ''; ?>
                <?php if (!empty($company->comp_phone)): ?>
                    <br>Simu: <?= $company->comp_phone; ?>
                <?php endif; ?>
            </div>
            <div class="receipt-title">RISITI YA MALIPO</div>
        </div>

        <!-- Customer Info -->
        <div class="customer-info">
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">Jina la Mteja</div>
                    <div class="info-value"><?= strtoupper($customer->f_name . ' ' . $customer->m_name . ' ' . $customer->l_name); ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Namba ya Simu</div>
                    <div class="info-value"><?= $customer->phone_no; ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Namba ya Mteja</div>
                    <div class="info-value"><?= $customer->customer_code ?? $customer->code ?? 'N/A'; ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Tarehe ya Kuchapisha</div>
                    <div class="info-value"><?= date('d/m/Y H:i'); ?></div>
                </div>
            </div>
        </div>

        <!-- Loan Dates -->
        <div class="loan-dates">
            <div class="date-item">
                <div class="date-label">📅 Tarehe ya Kuchukua</div>
                <div class="date-value"><?= !empty($loan->loan_stat_date) ? date('d/m/Y', strtotime($loan->loan_stat_date)) : 'Bado Haijatolewa'; ?></div>
            </div>
            <div class="date-item">
                <div class="date-label">📅 Tarehe ya Mwisho</div>
                <div class="date-value"><?= !empty($loan->loan_end_date) ? date('d/m/Y', strtotime($loan->loan_end_date)) : 'Bado Haijatolewa'; ?></div>
            </div>
        </div>

        <!-- Summary Cards -->
        <?php 
            $loan_amount = $loan->loan_int ?? 0;
            $total_deposit = $total_paid->total_Deposit ?? 0;
            $amount_paid = ($total_deposit > $loan_amount) ? $loan_amount : $total_deposit;
            $remaining = max(0, $loan_amount - $total_deposit);
        ?>
        <div class="summary-cards">
            <div class="summary-card total">
                <div class="summary-label">Jumla ya Mkopo</div>
                <div class="summary-amount" style="color: #3b82f6;">TZS <?= number_format($loan_amount, 2); ?></div>
            </div>
            <div class="summary-card paid">
                <div class="summary-label">Kilicholipwa</div>
                <div class="summary-amount" style="color: #22c55e;">TZS <?= number_format($amount_paid, 2); ?></div>
            </div>
            <div class="summary-card remaining">
                <div class="summary-label">Kilichobaki</div>
                <div class="summary-amount" style="color: #ef4444;">TZS <?= number_format($remaining, 2); ?></div>
            </div>
        </div>

        <!-- Payment History Table -->
        <div class="table-title">📋 HISTORIA YA MALIPO</div>
        <table>
            <thead>
                <tr>
                    <th style="width: 8%;">#</th>
                    <th style="width: 18%;">Tarehe</th>
                    <th style="width: 42%;">Maelezo</th>
                    <th style="width: 18%;" class="text-right">Kiasi (TZS)</th>
                    <th style="width: 14%;" class="text-center">Hali</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($payments)): ?>
                    <?php 
                        $counter = 1;
                        foreach ($payments as $payment): 
                            $is_missed = isset($payment->is_missed) && $payment->is_missed;
                            $is_outside_contract = isset($payment->is_outside_contract) && $payment->is_outside_contract;
                            $row_class = $is_outside_contract ? 'outside-contract-row' : ($is_missed ? 'missed-row' : ($payment->depost > 0 ? 'paid-row' : ''));
                    ?>
                        <tr class="<?= $row_class; ?>">
                            <td><?= $counter++; ?></td>
                            <td>
                                <?= date('d/m/Y', strtotime($payment->depost_day)); ?>
                                <?php if ($is_outside_contract): ?>
                                    <br><small style="color: #9333ea; font-weight: bold;">⏰ Nje ya Mkataba</small>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($is_outside_contract): ?>
                                    <span style="color: #9333ea; font-weight: bold;">Malipo Nje ya Mkataba</span>
                                    <br><small style="color: #64748b;">(Baada ya Tarehe ya Mwisho)</small>
                                <?php elseif ($is_missed): ?>
                                    Malipo Hayajalipwa
                                <?php else: ?>
                                    <span style="color: #22c55e; font-weight: bold;">Ndani ya Mkataba</span>
                                    <br>
                                    <small style="color: #64748b;">
                                        <?php if (!empty($payment->account_name)): ?>
                                            <?= $payment->account_name; ?>
                                        <?php else: ?>
                                            <?php 
                                                $desc = $payment->description ?? 'MALIPO';
                                                echo ($desc == 'Malipo' || $desc == 'MALIPO') ? 'CASH' : strtoupper($desc);
                                            ?>
                                        <?php endif; ?>
                                    </small>
                                <?php endif; ?>
                            </td>
                            <td class="text-right">
                                <strong style="color: <?= $is_outside_contract ? '#9333ea' : ($payment->depost > 0 ? '#22c55e' : '#ef4444'); ?>; font-size: 13px;">
                                    <?= number_format($payment->depost, 2); ?>
                                </strong>
                            </td>
                            <td class="text-center">
                                <?php if ($is_outside_contract): ?>
                                    <span class="badge" style="background: linear-gradient(135deg, #9333ea 0%, #7e22ce 100%); color: white;">⏰ KUCHELEWA</span>
                                <?php elseif ($is_missed): ?>
                                    Malipo Hayajalipwa
                                <?php else: ?>
                                    <?php if (!empty($payment->account_name)): ?>
                                        <?= $payment->account_name; ?>
                                    <?php else: ?>
                                        <?php 
                                            $desc = $payment->description ?? 'MALIPO';
                                            echo ($desc == 'Malipo' || $desc == 'MALIPO') ? 'CASH' : strtoupper($desc);
                                        ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </td>
                            <td class="text-right">
                                <strong style="color: <?= $payment->depost > 0 ? '#22c55e' : '#ef4444'; ?>; font-size: 13px;">
                                    <?= number_format($payment->depost, 2); ?>
                                </strong>
                            </td>
                            <td class="text-center">
                                <?php if ($is_missed): ?>
                                    <span class="badge badge-danger">✗ HAIJALIPWA</span>
                                <?php elseif ($payment->depost > 0): ?>
                                    <span class="badge badge-success">✓ IMELIPWA</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center" style="padding: 30px; color: #94a3b8; font-style: italic;">
                            Hakuna rekodi za malipo
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Footer -->
        <div class="footer">
            <p><strong>✓ Asante kwa kutumia huduma zetu!</strong></p>
            <p style="margin-top: 10px; color: #64748b;">Risiti hii imechapishwa tarehe <strong><?= date('d/m/Y H:i:s'); ?></strong></p>
            <p style="margin-top: 8px; font-size: 10px; color: #94a3b8;">
                Kwa maswali au usaidizi, wasiliana nasi: <strong style="color: #0891b2;"><?= $company->comp_phone ?? 'N/A'; ?></strong>
            </p>
            <p style="margin-top: 12px; font-size: 10px; color: #cbd5e1; border-top: 1px solid #e2e8f0; padding-top: 12px;">
                Imetengenezwa na Mfumo wa Usimamizi wa Mikopo &copy; <?= date('Y'); ?>
            </p>
        </div>
    </div>
</body>
</html>
