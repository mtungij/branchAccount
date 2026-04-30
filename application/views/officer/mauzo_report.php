<?php
include_once APPPATH . "views/partials/officerheader.php";
?>

<?php
$report_date  = !empty($report_date)  ? $report_date  : date('Y-m-d');
$branch_name  = !empty($branch_name)  ? $branch_name  : '-';
$is_today_report = isset($is_today_report) ? (bool) $is_today_report : true;
$jana_val     = isset($jana_val)    ? (float) $jana_val    : 0;
$leo_val      = isset($leo_val)     ? (float) $leo_val     : 0;
$jumla_val    = isset($jumla_val)   ? (float) $jumla_val   : 0;
$gawa_val     = isset($gawa_val)    ? (float) $gawa_val    : 0;
$double_val   = isset($double_val)  ? (float) $double_val  : 0;
$accounts     = !empty($accounts)   ? $accounts            : array();
$today_accounts = !empty($today_accounts) ? $today_accounts : array();
$lala_jumla    = isset($lala_jumla)    ? (float) $lala_jumla    : 0;
$fee_jana_val  = isset($fee_jana_val)  ? (float) $fee_jana_val  : 0;
$fee_leo_val   = isset($fee_leo_val)   ? (float) $fee_leo_val   : 0;
$fee_jumla_val = isset($fee_jumla_val) ? (float) $fee_jumla_val : 0;
$fine_jana_val  = isset($fine_jana_val)  ? (float) $fine_jana_val  : 0;
$fine_leo_val   = isset($fine_leo_val)   ? (float) $fine_leo_val   : 0;
$fine_jumla_val = isset($fine_jumla_val) ? (float) $fine_jumla_val : 0;
$sugu_jana_val  = isset($sugu_jana_val)  ? (float) $sugu_jana_val  : 0;
$sugu_leo_val   = isset($sugu_leo_val)   ? (float) $sugu_leo_val   : 0;
$sugu_jumla_val = isset($sugu_jumla_val) ? (float) $sugu_jumla_val : 0;
$sugu_lala_val  = isset($sugu_lala_val)  ? (float) $sugu_lala_val  : 0;
$total_customers_count = isset($total_customers_count) ? (int) $total_customers_count : 0;
$customers_paid_count  = isset($customers_paid_count) ? (int) $customers_paid_count : 0;
$new_customers_count   = isset($new_customers_count) ? (int) $new_customers_count : 0;
$expenses_jana_val  = isset($expenses_jana_val)  ? (float) $expenses_jana_val  : 0;
$expenses_leo_val   = isset($expenses_leo_val)   ? (float) $expenses_leo_val   : 0;
$expenses_jumla_val = isset($expenses_jumla_val) ? (float) $expenses_jumla_val : 0;
$expenses_accounts  = !empty($expenses_accounts) ? $expenses_accounts : array();
$yesterday     = date('Y-m-d', strtotime($report_date . ' -1 day'));
?>

<style>
.mauzo-wrap {
    padding: 28px;
    width: 100%;
    max-width: 100%;
    margin: 0;
}
.mauzo-header {
    background: linear-gradient(135deg, #0f3d56, #1a6b82);
    color: #fff;
    border-radius: 14px;
    padding: 22px 26px;
    margin-bottom: 26px;
}
.mauzo-header h2 { margin: 0 0 4px; font-size: 26px; font-weight: 700; }
.mauzo-header p  { margin: 0; opacity: .85; font-size: 13px; }
.mauzo-filter {
    display: flex;
    gap: 10px;
    align-items: center;
    margin-top: 14px;
    flex-wrap: wrap;
}
.mauzo-filter input {
    height: 36px;
    border-radius: 8px;
    border: 1px solid rgba(255,255,255,.35);
    background: rgba(255,255,255,.14);
    color: #fff;
    padding: 0 10px;
    font-size: 13px;
}
.mauzo-filter input::-webkit-calendar-picker-indicator { filter: invert(1); }
.mauzo-filter button {
    height: 36px;
    padding: 0 16px;
    border: 0;
    border-radius: 8px;
    font-weight: 600;
    background: #fff;
    color: #0f3d56;
    cursor: pointer;
    font-size: 13px;
}
.mauzo-filter a.btn-reset {
    height: 36px;
    padding: 0 14px;
    border-radius: 8px;
    background: rgba(255,255,255,.18);
    color: #fff;
    font-size: 13px;
    text-decoration: none;
    display: flex;
    align-items: center;
}
.mauzo-filter a.btn-pdf {
    height: 36px;
    padding: 0 14px;
    border-radius: 8px;
    background: #0b1324;
    color: #fff;
    font-size: 13px;
    text-decoration: none;
    display: flex;
    align-items: center;
}
.mauzo-filter a.btn-pdf-preview {
    height: 36px;
    padding: 0 14px;
    border-radius: 8px;
    background: #14532d;
    color: #fff;
    font-size: 13px;
    text-decoration: none;
    display: flex;
    align-items: center;
}
.mauzo-card {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 2px 12px rgba(0,0,0,.07);
    padding: 22px 26px;
    margin-bottom: 22px;
}
.mauzo-card h5 {
    font-size: 14px;
    font-weight: 700;
    color: #0f3d56;
    margin: 0 0 16px;
    text-transform: uppercase;
    letter-spacing: .04em;
    border-bottom: 2px solid #e5eaf0;
    padding-bottom: 8px;
}
.mauzo-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 0;
    border-bottom: 1px solid #f0f4f8;
    font-size: 15px;
}
.mauzo-row:last-child { border-bottom: none; }
.mauzo-label { color: #374151; font-weight: 600; }
.mauzo-value { font-size: 16px; font-weight: 700; color: #1a6b82; font-variant-numeric: tabular-nums; }
.mauzo-value.jumla  { color: #0f5132; font-size: 17px; }
.mauzo-value.gawa   { color: #842029; }
.mauzo-value.double { color: #664d03; }
.mauzo-value.jana   { color: #495057; }
.mauzo-value.leo    { color: #0f6988; }
.mauzo-divider {
    border: none;
    border-top: 2px dashed #d1e0eb;
    margin: 8px 0;
}
.lala-tag {
    display: inline-block;
    background: #e8f4fb;
    color: #0f3d56;
    font-size: 12px;
    padding: 2px 8px;
    border-radius: 20px;
    font-weight: 600;
    margin-right: 6px;
}
</style>

<div class="w-full lg:ps-64">
<div class="mauzo-wrap">
    <!-- Header -->
    <div class="mauzo-header">
        <h2>Report ya Mauzo</h2>
        <p><?php echo htmlspecialchars($branch_name); ?> &mdash; Tarehe: <?php echo htmlspecialchars($report_date); ?></p>
        <div class="mauzo-filter">
            <form method="get" action="<?php echo base_url('oficer/mauzo_report'); ?>" style="display:flex;gap:8px;flex-wrap:wrap;">
                <input type="date" name="report_date" value="<?php echo htmlspecialchars($report_date); ?>">
                <button type="submit">Chuja</button>
                <a href="<?php echo base_url('oficer/mauzo_report?report_date=' . urlencode($yesterday)); ?>" class="btn-reset">Yesterday Report</a>
                <a href="<?php echo base_url('oficer/mauzo_report'); ?>" class="btn-reset">Today Report</a>
                <a href="<?php echo base_url('oficer/mauzo_report_pdf?report_date=' . urlencode($report_date) . '&mode=I'); ?>" class="btn-pdf-preview" target="_blank" rel="noopener">Preview PDF</a>
                <a href="<?php echo base_url('oficer/mauzo_report_pdf?report_date=' . urlencode($report_date)); ?>" class="btn-pdf" target="_blank" rel="noopener">Download PDF</a>
            </form>
        </div>
    </div>

    <!-- Main summary card -->
    <div class="mauzo-card">
        <h5>Muhtasari wa Mauzo</h5>

        <div class="mauzo-row">
            <span class="mauzo-label">JANA</span>
            <span class="mauzo-value jana"><?php echo number_format($jana_val); ?>/=</span>
        </div>

        <?php if (!empty($accounts)): ?>
            <?php foreach ($accounts as $acc): ?>
                <?php
                    $acc_name = !empty($acc->account_name) ? $acc->account_name : 'Akaunti';
                    $closing  = (float) $acc->closing_balance;
                ?>
                <div class="mauzo-row" style="padding-left:12px;">
                    <span class="mauzo-label" style="font-size:13px;color:#6b7280;">
                        &rsaquo; <?php echo htmlspecialchars($acc_name); ?>
                    </span>
                    <span class="mauzo-value" style="font-size:13px;color:#374151;"><?php echo number_format($closing); ?>/=</span>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <?php if ($is_today_report): ?>
            <div class="mauzo-row">
                <span class="mauzo-label">LEO</span>
                <span class="mauzo-value leo"><?php echo number_format($leo_val); ?>/=</span>
            </div>

            <hr class="mauzo-divider">

            <div class="mauzo-row">
                <span class="mauzo-label">JUMLA <small style="font-weight:400;font-size:12px;">(JANA + LEO)</small></span>
                <span class="mauzo-value jumla"><?php echo number_format($jumla_val); ?>/=</span>
            </div>
        <?php else: ?>
            <hr class="mauzo-divider">

            <div class="mauzo-row">
                <span class="mauzo-label">JUMLA <small style="font-weight:400;font-size:12px;">(Total ya Sehemu hii)</small></span>
                <span class="mauzo-value jumla"><?php echo number_format($jana_val); ?>/=</span>
            </div>
        <?php endif; ?>

        <?php if (!empty($expenses_accounts)): ?>
            <?php foreach ($expenses_accounts as $exp_acc): ?>
                <?php
                    $exp_acc_name  = !empty($exp_acc->expense_name) ? $exp_acc->expense_name : 'Other';
                    $exp_acc_total = (float) ($exp_acc->total_expense ?? 0);
                ?>
                <div class="mauzo-row">
                    <span class="mauzo-label"><?php echo htmlspecialchars($exp_acc_name); ?></span>
                    <span class="mauzo-value" style="color:#b91c1c;"><?php echo number_format($exp_acc_total); ?>/=</span>
                </div>
            <?php endforeach; ?>
            <hr class="mauzo-divider">
        <?php endif; ?>

        <div class="mauzo-row">
            <span class="mauzo-label">GAWA</span>
            <span class="mauzo-value gawa"><?php echo number_format($gawa_val); ?>/=</span>
        </div>

        <div class="mauzo-row">
            <span class="mauzo-label">DABO</span>
            <span class="mauzo-value double"><?php echo number_format($double_val); ?>/=</span>
        </div>

        <hr class="mauzo-divider">
        <h5>LALA</h5>

        <?php if (!empty($accounts)): ?>
            <?php foreach ($accounts as $acc): ?>
                <?php
                    $acc_name = !empty($acc->account_name) ? $acc->account_name : 'Akaunti';
                    $closing  = (float) $acc->closing_balance;
                ?>
                <div class="mauzo-row">
                    <span class="mauzo-label">
                        <span>LALA</span>
                        <?php echo htmlspecialchars($acc_name); ?>
                    </span>
                    <span class="mauzo-value"><?php echo number_format($closing); ?>/=</span>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <?php if (!empty($today_accounts)): ?>
                <?php foreach ($today_accounts as $acc): ?>
                    <?php
                        $acc_name = !empty($acc->account_name) ? $acc->account_name : 'Akaunti';
                        $closing  = (float) $acc->closing_balance;
                    ?>
                    <div class="mauzo-row">
                        <span class="mauzo-label">
                            <span>LEO</span>
                            <?php echo htmlspecialchars($acc_name); ?>
                        </span>
                        <span class="mauzo-value"><?php echo number_format($closing); ?>/=</span>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p style="color:#6b7280;font-size:13px;">Hakuna akaunti za tawi hili.</p>
            <?php endif; ?>
        <?php endif; ?>

        <hr class="mauzo-divider">

        <?php
            $lala_accounts_for_total = !empty($accounts) ? $accounts : $today_accounts;
            $lala_total_from_accounts = 0;
            foreach ($lala_accounts_for_total as $acc_total) {
                $lala_total_from_accounts += (float) $acc_total->closing_balance;
            }
        ?>

        <div class="mauzo-row">
            <span class="mauzo-label" style="font-size:16px;">

                <strong>JUMLA</strong>
            </span>
            <span class="mauzo-value jumla"><?php echo number_format($lala_total_from_accounts); ?>/=</span>
        </div>
        <hr class="mauzo-divider">
        <h5>FOMU</h5>

        <div class="mauzo-row">
            <span class="mauzo-label">JANA</span>
            <span class="mauzo-value jana"><?php echo number_format($fee_jana_val); ?>/=</span>
        </div>

        <?php if ($is_today_report): ?>
            <div class="mauzo-row">
                <span class="mauzo-label">LEO</span>
                <span class="mauzo-value leo"><?php echo number_format($fee_leo_val); ?>/=</span>
            </div>

            <hr class="mauzo-divider">

            <div class="mauzo-row">
                <span class="mauzo-label">JUMLA <small style="font-weight:400;font-size:12px;">(JANA + LEO)</small></span>
                <span class="mauzo-value jumla"><?php echo number_format($fee_jumla_val); ?>/=</span>
            </div>

            <div class="mauzo-row">
                <span class="mauzo-label" style="font-size:16px;">
                    <span class="lala-tag">LALA</span>
                    <strong>JUMLA</strong>
                </span>
                <span class="mauzo-value jumla"><?php echo number_format($fee_jumla_val); ?>/=</span>
            </div>
        <?php else: ?>
            <hr class="mauzo-divider">

            <div class="mauzo-row">
                <span class="mauzo-label">JUMLA <small style="font-weight:400;font-size:12px;">(Total ya Sehemu hii)</small></span>
                <span class="mauzo-value jumla"><?php echo number_format($fee_jana_val); ?>/=</span>
            </div>

            <div class="mauzo-row">
                <span class="mauzo-label" style="font-size:16px;">
                    <span class="lala-tag">LALA</span>
                    <strong>JUMLA</strong>
                </span>
                <span class="mauzo-value jumla"><?php echo number_format($fee_jana_val); ?>/=</span>
            </div>
        <?php endif; ?>
        <hr class="mauzo-divider">
        <h5>Faini Iliyolipwa</h5>

        <div class="mauzo-row">
            <span class="mauzo-label">JANA</span>
            <span class="mauzo-value jana"><?php echo number_format($fine_jana_val); ?>/=</span>
        </div>

        <?php if ($is_today_report): ?>
            <div class="mauzo-row">
                <span class="mauzo-label">LEO <small style="font-weight:400;font-size:12px;">(Faini ya leo)</small></span>
                <span class="mauzo-value leo"><?php echo number_format($fine_leo_val); ?>/=</span>
            </div>

            <hr class="mauzo-divider">

            <div class="mauzo-row">
                <span class="mauzo-label">JUMLA <small style="font-weight:400;font-size:12px;">(JANA + LEO)</small></span>
                <span class="mauzo-value jumla"><?php echo number_format($fine_jumla_val); ?>/=</span>
            </div>

            <div class="mauzo-row">
                <span class="mauzo-label" style="font-size:16px;">
                    <span class="lala-tag">LALA</span>
                    <strong>JUMLA</strong>
                    <small style="font-weight:400;font-size:12px;">(Jumla ya Faini zote)</small>
                </span>
                <span class="mauzo-value jumla"><?php echo number_format($fine_jumla_val); ?>/=</span>
            </div>
        <?php else: ?>
            <hr class="mauzo-divider">

            <div class="mauzo-row">
                <span class="mauzo-label">JUMLA <small style="font-weight:400;font-size:12px;">(Total ya Sehemu hii)</small></span>
                <span class="mauzo-value jumla"><?php echo number_format($fine_jana_val); ?>/=</span>
            </div>

            <div class="mauzo-row">
                <span class="mauzo-label" style="font-size:16px;">
                    <span class="lala-tag">LALA</span>
                    <strong>JUMLA</strong>
                    <small style="font-weight:400;font-size:12px;">(Jumla ya Faini zote)</small>
                </span>
                <span class="mauzo-value jumla"><?php echo number_format($fine_jana_val); ?>/=</span>
            </div>
        <?php endif; ?>
        <hr class="mauzo-divider">
        <h5>MADENI SUGU</h5>

        <div class="mauzo-row">
            <span class="mauzo-label">JANA</span>
            <span class="mauzo-value jana"><?php echo number_format($sugu_jana_val); ?>/=</span>
        </div>

        <?php if ($is_today_report): ?>
            <div class="mauzo-row">
                <span class="mauzo-label">LEO</span>
                <span class="mauzo-value leo"><?php echo number_format($sugu_leo_val); ?>/=</span>
            </div>

            <hr class="mauzo-divider">

            <div class="mauzo-row">
                <span class="mauzo-label">JUMLA <small style="font-weight:400;font-size:12px;">(JANA + LEO)</small></span>
                <span class="mauzo-value jumla"><?php echo number_format($sugu_jumla_val); ?>/=</span>
            </div>

            <div class="mauzo-row">
                <span class="mauzo-label" style="font-size:16px;">
                   
                    <strong>MADENI SUGU JUMLA</strong>

                </span>
                <span class="mauzo-value jumla"><?php echo number_format($sugu_lala_val); ?>/=</span>
            </div>
        <?php else: ?>
            <hr class="mauzo-divider">

            <div class="mauzo-row">
                <span class="mauzo-label">JUMLA <small style="font-weight:400;font-size:12px;">(Total ya Sehemu hii)</small></span>
                <span class="mauzo-value jumla"><?php echo number_format($sugu_jana_val); ?>/=</span>
            </div>

            <div class="mauzo-row">
                <span class="mauzo-label" style="font-size:16px;">
                   
                    <strong>MADENI SUGU JUMLA</strong>

                </span>
                <span class="mauzo-value jumla"><?php echo number_format($sugu_lala_val); ?>/=</span>
            </div>
        <?php endif; ?>
        <hr class="mauzo-divider">
        <h5>TAARIFA ZA WATEJA</h5>

        <div class="mauzo-row">
            <span class="mauzo-label">IDADI YA WATEJA</span>
            <span class="mauzo-value"><?php echo number_format($total_customers_count); ?></span>
        </div>

        <div class="mauzo-row">
            <span class="mauzo-label">WALIOLETA</span>
            <span class="mauzo-value"><?php echo number_format($customers_paid_count); ?></span>
        </div>

        <div class="mauzo-row">
            <span class="mauzo-label">WATEJA WAPYA</span>
            <span class="mauzo-value"><?php echo number_format($new_customers_count); ?></span>
        </div>
    </div>

</div>
</div>

<?php
include_once APPPATH . "views/partials/footer.php";
?>

