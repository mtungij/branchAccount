<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title><?= htmlspecialchars($comp_data->comp_name) ?> - Cash Transaction</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            box-sizing: border-box;
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8" />
            <title><?= htmlspecialchars($compdata->comp_name ?? 'Ripoti ya Mikopo Iliyotolewa') ?></title>
            <style>
                html, body { margin: 0; padding: 0; width: 100%; box-sizing: border-box; }
                body { font-family: Arial, sans-serif; font-size: 10px; color: #222; }

                /* Company Header */
                .company-header { text-align: center; padding: 10px 0 6px; border-bottom: 2px solid #00bcd4; margin-bottom: 8px; }
                .company-header img { max-height: 70px; width: auto; margin-bottom: 4px; }
                .company-header h2 { margin: 0; font-size: 15px; color: #00838f; text-transform: uppercase; }
                .company-header p  { margin: 2px 0; font-size: 9px; color: #555; }

                /* Report Title */
                .report-title { text-align: center; margin: 6px 0 10px; }
                .report-title h3 { margin: 0 0 2px; font-size: 13px; text-transform: uppercase; color: #006064; }
                .report-title .date-range { font-size: 9px; color: #555; }

                /* Table */
                table { border-collapse: collapse; width: 100%; margin-top: 4px; }
                th, td { border: 1px solid #b2ebf2; padding: 5px 6px; text-align: left; }
                thead tr th { background-color: #00bcd4; color: #fff; font-size: 9px; text-transform: uppercase; }
                tbody tr:nth-child(even) { background-color: #e0f7fa; }
                tbody tr:nth-child(odd)  { background-color: #fff; }
                .total-row td { background-color: #00bcd4; color: #fff; font-weight: bold; font-size: 10px; }

                .text-right  { text-align: right; }
                .text-center { text-align: center; }

                /* Status badges */
                .badge { padding: 1px 5px; border-radius: 3px; font-size: 8px; font-weight: bold; }
                .badge-active   { background: #c8e6c9; color: #1b5e20; }
                .badge-expired  { background: #ffcdd2; color: #b71c1c; }
                .badge-fullpaid { background: #dcedc8; color: #33691e; }
                .badge-disbarsed{ background: #e8eaf6; color: #1a237e; }
                .badge-aproved  { background: #fff9c4; color: #f57f17; }
                .badge-default  { background: #f5f5f5; color: #424242; }
            </style>
        </head>
        <body>

        <?php
        $logo_html = '';
        if (!empty($compdata->comp_logo)) {
            $logo_path = FCPATH . 'assets/images/company_logo/' . $compdata->comp_logo;
            if (file_exists($logo_path)) {
                $logo_html = '<img src="' . $logo_path . '" alt="Logo" />';
            }
        }
        ?>

        <!-- Company Header -->
        <div class="company-header">
            <?= $logo_html ?>
            <h2><?= htmlspecialchars($compdata->comp_name ?? '') ?></h2>
            <?php if (!empty($compdata->comp_address)): ?>
                <p><?= htmlspecialchars($compdata->comp_address) ?></p>
            <?php endif; ?>
            <?php if (!empty($compdata->comp_email) || !empty($compdata->comp_phone)): ?>
                <p>
                    <?php if (!empty($compdata->comp_email)): ?>Barua Pepe: <?= htmlspecialchars($compdata->comp_email) ?><?php endif; ?>
                    <?php if (!empty($compdata->comp_email) && !empty($compdata->comp_phone)): ?> &nbsp;|&nbsp; <?php endif; ?>
                    <?php if (!empty($compdata->comp_phone)): ?>Simu: <?= htmlspecialchars($compdata->comp_phone) ?><?php endif; ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Report Title -->
        <div class="report-title">
            <h3>Ripoti ya Mikopo Iliyotolewa &mdash; <?= htmlspecialchars($blanch->blanch_name ?? '') ?></h3>
            <div class="date-range">
                Kipindi: <strong><?= htmlspecialchars($from_date) ?></strong> hadi <strong><?= htmlspecialchars($to_date) ?></strong>
            </div>
        </div>

        <!-- Table -->
        <table>
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Jina la Mteja</th>
                    <th>Simu</th>
                    <th>Tawi</th>
                    <th class="text-right">Mkopo Halisi</th>
                    <th class="text-right">Jumla ya Mkopo</th>
                    <th>Aina ya Muda</th>
                    <th class="text-right">Makusanyo</th>
                    <th>Bidhaa</th>
                    <th>Njia</th>
                    <th>Tarehe ya Utoaji</th>
                    <th>Tarehe ya Mwisho</th>
                    <th class="text-right">Kiasi Kilicholipwa</th>
                    <th class="text-right">Deni Lililobaki</th>
                    <th class="text-center">Hali</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $no = 1;
            $total_principal  = 0;
            $total_loan_int   = 0;
            $total_collection = 0;
            $total_paid       = 0;
            $total_remain     = 0;

            foreach (($disburse ?? []) as $loan):
                $row_paid   = (float)($loan->total_paid ?? 0);
                $row_remain = max(0, (float)$loan->loan_int - $row_paid);

                $total_principal  += (float)$loan->loan_aprove;
                $total_loan_int   += (float)$loan->loan_int;
                $total_collection += (float)$loan->restration;
                $total_paid       += $row_paid;
                $total_remain     += $row_remain;

                if ($loan->day == 1)                          $duration = 'Kila Siku';
                elseif ($loan->day == 7)                      $duration = 'Kila Wiki';
                elseif (in_array($loan->day, [28,29,30,31]))  $duration = 'Kila Mwezi';
                else                                          $duration = 'Nyingine';
                $duration .= ' (' . $loan->session . ')';

                $status = $loan->loan_status ?? '';
                switch ($status) {
                    case 'withdrawal': $badge = 'badge-active';    $label = 'Inaendelea'; break;
                    case 'out':        $badge = 'badge-expired';   $label = 'Imechelewa'; break;
                    case 'done':       $badge = 'badge-fullpaid';  $label = 'Imelipwa'; break;
                    case 'disbarsed':  $badge = 'badge-disbarsed'; $label = 'Imetolewa'; break;
                    case 'aproved':    $badge = 'badge-aproved';   $label = 'Imeidhinishwa'; break;
                    default:           $badge = 'badge-default';   $label = ucfirst($status);
                }
            ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td><?= htmlspecialchars(strtoupper(trim($loan->f_name . ' ' . substr($loan->m_name ?? '', 0, 1) . ' ' . $loan->l_name))) ?></td>
                    <td><?= htmlspecialchars($loan->phone_no ?? '') ?></td>
                    <td><?= htmlspecialchars($loan->blanch_name ?? '') ?></td>
                    <td class="text-right"><?= number_format($loan->loan_aprove) ?></td>
                    <td class="text-right"><?= number_format($loan->loan_int) ?></td>
                    <td><?= htmlspecialchars($duration) ?></td>
                    <td class="text-right"><?= number_format($loan->restration) ?></td>
                    <td><?= htmlspecialchars($loan->loan_name ?? '') ?></td>
                    <td><?= htmlspecialchars($loan->account_name ?? '') ?></td>
                    <td><?= htmlspecialchars(substr($loan->loan_stat_date ?? '', 0, 10)) ?></td>
                    <td><?= htmlspecialchars(substr($loan->loan_end_date ?? '', 0, 10)) ?></td>
                    <td class="text-right"><?= number_format($row_paid) ?></td>
                    <td class="text-right"><?= number_format($row_remain) ?></td>
                    <td class="text-center"><span class="badge <?= $badge ?>"><?= htmlspecialchars($label) ?></span></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr class="total-row">
                    <td colspan="4" class="text-right">JUMLA</td>
                    <td class="text-right"><?= number_format($total_principal) ?></td>
                    <td class="text-right"><?= number_format($total_loan_int) ?></td>
                    <td></td>
                    <td class="text-right"><?= number_format($total_collection) ?></td>
                    <td colspan="4"></td>
                    <td class="text-right"><?= number_format($total_paid) ?></td>
                    <td class="text-right"><?= number_format($total_remain) ?></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>

        </body>
        </html>
            <th>Duration Type</th>
