<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <title><?= $compdata->comp_name; ?> | CASH TRANSACTION REPORT</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        h3, p {
            text-align: center;
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        table, th, td {
            border: 1px solid #333;
        }
        th, td {
            padding: 6px;
            text-align: center;
        }
        thead {
            background-color: #f2f2f2;
        }
        tfoot {
            font-weight: bold;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <?php $day = date('d-m-Y'); ?>

    <h3>Ripoti ya Miamala ya Fedha</h3>
    <p style="font-size:15px;text-align:center;">
        <b><?= $empl->empl_name; ?> - KUSANYO LA LEO TAREHE / <?= $day; ?></b>
    </p>

    <table>
        <thead>
            <tr>
                <th>S/No.</th>
                <th>JINA LA MTEJA</th>
                <th>REJESHO</th>
                <th>LIPWA</th>
                <th>LAZA</th>
                <th>ZIDI</th>
                <th>TAREHE</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            $total_rejesho = 0;
            $total_lipwa = 0;
            $total_laza = 0;
            $total_zidi = 0;

            foreach ($cash as $cashs): 
                if (empty($cashs->depost) || empty($cashs->customer_id)) continue;

                $rejesho = $cashs->restrations;
                $lipwa = $cashs->depost;

                $laza = $lipwa < $rejesho ? ($rejesho - $lipwa) : 0;
                $zidi = $lipwa > $rejesho ? ($lipwa - $rejesho) : 0;

                $total_rejesho += $rejesho;
                $total_lipwa += $lipwa;
                $total_laza += $laza;
                $total_zidi += $zidi;
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $cashs->f_name . ' ' . $cashs->m_name . ' ' . $cashs->l_name; ?></td>
                <td><?= number_format($rejesho); ?></td>
                <td><?= number_format($lipwa); ?></td>
                <td><?= $laza > 0 ? number_format($laza) : '-'; ?></td>
                <td><?= $zidi > 0 ? number_format($zidi) : '-'; ?></td>
                <td><?= date('d-m-Y', strtotime($cashs->lecod_day)); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th>JUMLA</th>
                <th></th>
                <th><?= number_format($total_rejesho); ?></th>
                <th><?= number_format($total_lipwa); ?></th>
                <th><?= number_format($total_laza); ?></th>
                <th><?= number_format($total_zidi); ?></th>
                <th></th>
            </tr>
        </tfoot>
    </table>

</body>
</html>
