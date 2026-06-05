<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title><?php echo htmlspecialchars((string) ($report_title ?? 'Ripoti ya Miamala ya Leo'), ENT_QUOTES, 'UTF-8'); ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }
        h2, h3, p {
            margin: 0;
            padding: 0;
        }
        .header {
            text-align: center;
            margin-bottom: 12px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 12px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 6px 8px;
            text-align: left;
        }
        th {
            background: #00bcd4;
            color: #fff;
        }
        .total-row {
            font-weight: bold;
            background: #f1f5f9;
        }
    </style>
</head>
<body>
<?php
$total_loan = 0;
$total_received = 0;
?>

<div class="header">
    <h2><?php echo htmlspecialchars($compdata->comp_name ?? 'Kampuni', ENT_QUOTES, 'UTF-8'); ?></h2>
    <h3><?php echo htmlspecialchars((string) ($report_title ?? 'Ripoti ya Miamala ya Leo'), ENT_QUOTES, 'UTF-8'); ?></h3>
    <p>
        Kipindi: <?php echo htmlspecialchars((string) ($from_date ?? ''), ENT_QUOTES, 'UTF-8'); ?>
        hadi <?php echo htmlspecialchars((string) ($to_date ?? ''), ENT_QUOTES, 'UTF-8'); ?>
    </p>
</div>

<table>
    <thead>
        <tr>
            <th>S/No</th>
            <th>Jina la Mteja</th>
            <th>Hali ya Ajira</th>
            <th>Aina ya Mkopo</th>
            <th>Jina la Tawi</th>
            <th>Kiasi cha Mkopo</th>
            <th>Kiasi Kilichopokelewa</th>
            <th>Njia ya Malipo</th>
            <th>Afisa</th>
            <th>Tarehe</th>
        </tr>
    </thead>
    <tbody>
    <?php if (!empty($cash)): ?>
        <?php $no = 1; ?>
        <?php foreach ($cash as $row): ?>
            <?php
            if (empty($row->depost) || empty($row->customer_id)) {
                continue;
            }

            $loan_amount = (float) ($row->loan_int ?? 0);
            $received_amount = (float) ($row->depost ?? 0);
            $total_loan += $loan_amount;
            $total_received += $received_amount;

            $work_status = trim((string) ($row->work_status ?? ''));
            if ($work_status === 'Mwajiriwa') {
                $work_status = 'Mtumishi';
            }

            $loan_type_label = trim((string) ($row->loan_type ?? ''));
            if (trim((string) ($row->work_status ?? '')) === 'Mjasiriamali') {
                $loan_type_label = 'Mkopo wa Mjasiriamali';
            } elseif ($loan_type_label === 'salary_advance') {
                $loan_type_label = 'Mkopo Mdogo';
            } elseif ($loan_type_label === 'main' || $loan_type_label === '') {
                $loan_type_label = 'Mkopo Mkubwa';
            }
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars(trim(($row->f_name ?? '') . ' ' . ($row->m_name ?? '') . ' ' . ($row->l_name ?? '')), ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($work_status, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($loan_type_label, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars((string) ($row->blanch_name ?? ''), ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo number_format($loan_amount); ?></td>
                <td><?php echo number_format($received_amount); ?></td>
                <td><?php echo htmlspecialchars((string) ($row->account_name ?? ''), ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars((string) ($row->empl_username ?? ''), ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars((string) ($row->depost_day ?? ''), ENT_QUOTES, 'UTF-8'); ?></td>
            </tr>
        <?php endforeach; ?>
        <tr class="total-row">
            <td colspan="5">Jumla</td>
            <td><?php echo number_format($total_loan); ?></td>
            <td><?php echo number_format($total_received); ?></td>
            <td colspan="3"></td>
        </tr>
    <?php else: ?>
        <tr>
            <td colspan="10" style="text-align:center;">Hakuna taarifa.</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>

</body>
</html>
