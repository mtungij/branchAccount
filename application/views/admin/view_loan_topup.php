<?php
include_once APPPATH . "views/partials/header.php";

$loan_status_label = 'N/A';
$loan_status_class = 'bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-200';
if (($topup->loan_status ?? '') === 'withdrawal') {
    $loan_status_label = $this->lang->line('in_contract_status');
    $loan_status_class = 'bg-teal-100 text-teal-800 dark:bg-teal-900/40 dark:text-teal-200';
}

$duration_label = '-';
if (isset($topup->day)) {
    if ($topup->day == 1) {
        $duration_label = $this->lang->line('day_option');
    } elseif ($topup->day == 7) {
        $duration_label = $this->lang->line('week_option');
    } elseif (in_array($topup->day, [28, 29, 30, 31])) {
        $duration_label = $this->lang->line('month_option');
    }
}

// The loan duration/repayments/interest formula the officer proposed for the top-up; these
// replace the loan's current terms once the top-up is withdrawn (see Admin::withdraw_loan_topup()).
$requested_duration_label = '-';
if (isset($topup->requested_day)) {
    if ($topup->requested_day == 1) {
        $requested_duration_label = $this->lang->line('day_option');
    } elseif ($topup->requested_day == 7) {
        $requested_duration_label = $this->lang->line('week_option');
    } elseif (in_array($topup->requested_day, [28, 29, 30, 31])) {
        $requested_duration_label = $this->lang->line('month_option');
    }
}
?>

<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-6">

        <div>
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-200"><?php echo $this->lang->line('topup_page_title'); ?></h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('topup_page_subtitle'); ?></p>
        </div>

        <?php if ($das = $this->session->flashdata('massage')): ?>
        <div class="bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert">
            <div class="ms-3"><h3 class="text-gray-800 font-semibold dark:text-white"><?php echo $this->lang->line('success'); ?></h3><p class="mt-2 text-sm text-gray-700 dark:text-gray-400"><?php echo $das; ?></p></div>
        </div>
        <?php endif; ?>

        <?php if ($err = $this->session->flashdata('error')): ?>
        <div class="bg-red-100 border border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500" role="alert">
            <div class="ms-3"><h3 class="text-gray-800 font-semibold dark:text-white"><?php echo $this->lang->line('error'); ?></h3><p class="mt-2 text-sm text-gray-700 dark:text-gray-400"><?php echo $err; ?></p></div>
        </div>
        <?php endif; ?>

        <!-- Customer Profile Card -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 sm:p-6">
                <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 items-center sm:items-start">
                    <div class="flex-shrink-0">
                        <?php if (!empty($topup->passport)): ?>
                            <img class="w-28 h-28 rounded-full object-cover border-4 border-cyan-400" src="<?php echo base_url($topup->passport); ?>" alt="<?php echo $this->lang->line('customer'); ?>">
                        <?php else: ?>
                            <img class="w-28 h-28 rounded-full object-cover border-2 border-gray-200 dark:border-gray-700" src="<?php echo base_url(); ?>assets/img/user.png" alt="<?php echo $this->lang->line('customer'); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="flex-grow w-full">
                        <h3 class="text-lg sm:text-xl font-bold uppercase text-gray-900 dark:text-white text-center sm:text-left">
                            <?php echo htmlspecialchars(trim($topup->f_name . ' ' . $topup->m_name . ' ' . $topup->l_name), ENT_QUOTES, 'UTF-8'); ?>
                        </h3>
                        <div class="mt-3 grid grid-cols-2 sm:grid-cols-4 gap-4">
                            <div>
                                <label class="block text-xs font-medium text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('phone_number'); ?></label>
                                <p class="text-sm font-semibold text-gray-800 dark:text-gray-200"><?php echo htmlspecialchars($topup->phone_no ?? '-', ENT_QUOTES, 'UTF-8'); ?></p>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('work_status'); ?></label>
                                <p class="text-sm font-semibold text-gray-800 dark:text-gray-200"><?php echo htmlspecialchars($topup->work_status ?? '-', ENT_QUOTES, 'UTF-8'); ?></p>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('loan_type'); ?></label>
                                <p class="text-sm font-semibold text-gray-800 dark:text-gray-200"><?php echo htmlspecialchars($topup->loan_type ?: '-', ENT_QUOTES, 'UTF-8'); ?></p>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('branch_name'); ?></label>
                                <p class="text-sm font-semibold text-gray-800 dark:text-gray-200"><?php echo htmlspecialchars($topup->blanch_name ?? '-', ENT_QUOTES, 'UTF-8'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Current Loan Repayment Statement -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="w-full bg-cyan-600 text-white p-4">
                <h2 class="text-lg font-semibold tracking-widest uppercase"><?php echo $this->lang->line('current_loan_repayment'); ?></h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-white uppercase bg-cyan-700 dark:bg-cyan-600">
                        <tr>
                            <th scope="col" class="px-4 py-3"><?php echo $this->lang->line('date'); ?></th>
                            <th scope="col" class="px-4 py-3"><?php echo $this->lang->line('description'); ?></th>
                            <th scope="col" class="px-4 py-3"><?php echo $this->lang->line('deposit'); ?></th>
                            <th scope="col" class="px-4 py-3"><?php echo $this->lang->line('withdrawal'); ?></th>
                            <th scope="col" class="px-4 py-3"><?php echo $this->lang->line('balance'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($repayment_statement)): ?>
                            <tr>
                                <td colspan="5" class="px-4 py-3 text-center text-gray-500 italic"><?php echo $this->lang->line('no_repayment_for_loan'); ?></td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($repayment_statement as $payisnulls): ?>
                                <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="px-4 py-3 uppercase font-medium text-gray-900 dark:text-white">
                                        <?php echo $payisnulls->date_data; ?>
                                    </td>
                                    <td class="px-4 py-3 uppercase">
                                        <?php echo $payisnulls->emply; ?>
                                        <?php if ($payisnulls->emply == TRUE): ?>/<?php endif; ?>
                                        <?php
                                          $method_name = trim((string)($payisnulls->account_name ?? ''));
                                          $description_text = strtolower(trim((string)($payisnulls->description ?? '')));
                                          $wakala_value = trim((string)($payisnulls->wakala_name ?? ($payisnulls->wakala ?? '')));
                                          $has_valid_wakala = ($wakala_value !== '' && !ctype_digit($wakala_value));
                                          $is_non_cash_deposit = ($description_text === 'cash deposit' && $method_name !== '' && strtolower($method_name) !== 'cash');
                                        ?>
                                        <?php if ($is_non_cash_deposit): ?>
                                            <?php echo htmlspecialchars(strtoupper($method_name), ENT_QUOTES, 'UTF-8'); ?>
                                            <?php if ($has_valid_wakala): ?>
                                                <?php echo '(' . htmlspecialchars(strtoupper($wakala_value), ENT_QUOTES, 'UTF-8') . ')'; ?>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?php echo $payisnulls->description; ?>
                                            <?php if ($payisnulls->p_method == TRUE): ?>
                                                /<?php echo $payisnulls->account_name; ?>
                                            <?php endif; ?>
                                            <?php if ($has_valid_wakala && strtolower($method_name) !== 'cash'): ?>
                                                / <?php echo $this->lang->line('wakala') ?: 'Wakala'; ?>: <?php echo htmlspecialchars($wakala_value, ENT_QUOTES, 'UTF-8'); ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if ($payisnulls->fee_id == TRUE): ?>
                                            / <?php echo $payisnulls->fee_desc; ?> <?php echo $payisnulls->fee_percentage; ?> <?php echo $payisnulls->symbol; ?>
                                        <?php endif; ?>
                                        <?php if ($payisnulls->p_method == TRUE): ?>/<?php endif; ?>
                                        <?php echo @$payisnulls->loan_name; ?>
                                        <?php
                                          if (@$payisnulls->day == 1) echo $this->lang->line('day_option');
                                          elseif (@$payisnulls->day == 7) echo $this->lang->line('week_option');
                                          elseif (in_array(@$payisnulls->day, [28, 29, 30, 31])) echo $this->lang->line('month_option');
                                        ?>
                                        <?php echo $payisnulls->session; ?> / AC/No. <?php echo @$payisnulls->loan_code; ?>
                                    </td>
                                    <td class="px-4 py-3 text-green-600 dark:text-green-400 font-semibold">
                                        <?php echo $payisnulls->depost ? number_format($payisnulls->depost, 2) : '0.00'; ?>
                                    </td>
                                    <td class="px-4 py-3 text-red-600 dark:text-red-400 font-semibold">
                                        <?php echo $payisnulls->withdrow ? number_format($payisnulls->withdrow, 2) : '0.00'; ?>
                                    </td>
                                    <td class="px-4 py-3 font-bold text-gray-900 dark:text-white">
                                        <?php echo $payisnulls->balance ? number_format($payisnulls->balance, 2) : '0.00'; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

             <div class="flex flex-col bg-white border shadow-sm rounded-xl pb-1.5 dark:bg-gray-800 dark:border-gray-700">
            <div class="w-full bg-cyan-600 text-white p-4">
                <h2 class="text-lg font-semibold tracking-widest uppercase"><?php echo $this->lang->line('loan_history'); ?></h2>
            </div>
            <div class="p-4">
                <div class="overflow-x-auto">
                    <div class="min-w-full inline-block align-middle">
                        <div class="border rounded-lg overflow-hidden dark:border-gray-700">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th class="py-3 px-6 text-start text-gray-800 dark:text-gray-200 font-bold"><?php echo $this->lang->line('s_no'); ?></th>
                                        <th class="py-3 px-6 text-start text-gray-800 dark:text-gray-200 font-bold"><?php echo $this->lang->line('loan_product'); ?></th>
                                        <th class="py-3 px-6 text-start text-gray-800 dark:text-gray-200 font-bold"><?php echo $this->lang->line('principal'); ?></th>
                                        <th class="py-3 px-6 text-start text-gray-800 dark:text-gray-200 font-bold"><?php echo $this->lang->line('principal_interest'); ?></th>
                                        <th class="py-3 px-6 text-start text-gray-800 dark:text-gray-200 font-bold"><?php echo $this->lang->line('duration_type'); ?></th>
                                        <th class="py-3 px-6 text-start text-gray-800 dark:text-gray-200 font-bold"><?php echo $this->lang->line('disburse_date'); ?></th>
                                        <th class="py-3 px-6 text-start text-gray-800 dark:text-gray-200 font-bold"><?php echo $this->lang->line('end_date'); ?></th>
                                        <th class="py-3 px-6 text-start text-gray-800 dark:text-gray-200 font-bold"><?php echo $this->lang->line('last_payment'); ?></th>
                                        <th class="py-3 px-6 text-start text-gray-800 dark:text-gray-200 font-bold"><?php echo $this->lang->line('credit_score'); ?></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <?php $hno = 1; ?>
                                    <?php if (empty($loan_history)): ?>
                                        <tr>
                                            <td colspan="9" class="px-4 py-3 text-center text-gray-500 italic"><?php echo $this->lang->line('no_completed_loan_history'); ?></td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach ($loan_history as $history): ?>
                                            <tr class="transition">
                                                <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-200 font-bold"><?php echo $hno++; ?>.</td>
                                                <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-200 font-bold"><?php echo strtoupper($history->loan_name); ?></td>
                                                <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-200 font-bold"><?php echo number_format($history->loan_aprove); ?></td>
                                                <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-200 font-bold"><?php echo number_format($history->loan_int); ?></td>
                                                <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-200 font-bold">
                                                    <?php
                                                    if ($history->day == 1) {
                                                        echo $this->lang->line('day_option') . " ({$history->session})";
                                                    } elseif ($history->day == 7) {
                                                        echo $this->lang->line('week_option') . " ({$history->session})";
                                                    } elseif (in_array($history->day, [28, 29, 30, 31])) {
                                                        echo $this->lang->line('month_option') . " ({$history->session})";
                                                    }
                                                    ?>
                                                </td>
                                                <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-200 font-bold"><?php echo $history->loan_stat_date; ?></td>
                                                <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-200 font-bold"><?php echo substr($history->loan_end_date, 0, 10); ?></td>
                                                <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-200 font-bold"><?= $history->depost_day ?></td>
                                                <td class="px-4 py-2 text-sm">
                                                    <?php
                                                    $loan_end_date_ts = strtotime(substr($history->loan_end_date, 0, 10));
                                                    $depost_day_ts = strtotime($history->depost_day);
                                                    $status = $this->lang->line('score_default');
                                                    $badge_color = 'bg-gray-100 text-gray-800';

                                                    if ($depost_day_ts == $loan_end_date_ts) {
                                                        $status = $this->lang->line('score_excellent');
                                                        $badge_color = 'bg-green-100 text-green-800';
                                                    } elseif ($depost_day_ts > $loan_end_date_ts && ($depost_day_ts - $loan_end_date_ts) <= (15 * 86400)) {
                                                        $status = $this->lang->line('score_fair');
                                                        $badge_color = 'bg-yellow-100 text-yellow-800';
                                                    } elseif ($depost_day_ts > $loan_end_date_ts && ($depost_day_ts - $loan_end_date_ts) > (15 * 86400)) {
                                                        $status = $this->lang->line('score_overdue');
                                                        $badge_color = 'bg-red-100 text-red-800';
                                                    }
                                                    ?>
                                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-medium <?php echo $badge_color; ?>"><?php echo $status; ?></span>
                                                </td>
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
        
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 md:p-6">

                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 uppercase">
                            <?php echo htmlspecialchars(trim($topup->f_name . ' ' . $topup->m_name . ' ' . $topup->l_name), ENT_QUOTES, 'UTF-8'); ?>
                        </h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400"><?php echo htmlspecialchars($topup->phone_no ?? '', ENT_QUOTES, 'UTF-8'); ?> &bull; <?php echo htmlspecialchars($topup->blanch_name ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-medium <?php echo $loan_status_class; ?>"><?php echo $loan_status_label; ?></span>
                </div>

                <div class="grid sm:grid-cols-12 gap-4 sm:gap-6">
                    <div class="sm:col-span-4">
                        <label class="block text-sm font-medium mb-2 dark:text-gray-300"><?php echo $this->lang->line('loan_number'); ?>:</label>
                        <input type="text" readonly value="<?php echo htmlspecialchars($topup->loan_code ?? '-', ENT_QUOTES, 'UTF-8'); ?>" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm disabled:opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                    </div>
                    <div class="sm:col-span-4">
                        <label class="block text-sm font-medium mb-2 dark:text-gray-300"><?php echo $this->lang->line('current_debt_loan_int'); ?>:</label>
                        <input type="text" readonly value="<?php echo number_format((float) ($topup->loan_int ?? 0)); ?>" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm disabled:opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                    </div>
                    <div class="sm:col-span-4">
                        <label class="block text-sm font-medium mb-2 dark:text-gray-300"><?php echo $this->lang->line('current_installment'); ?>:</label>
                        <input type="text" readonly value="<?php echo number_format((float) ($topup->restration ?? 0)); ?>" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm disabled:opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                    </div>

                    <div class="sm:col-span-4">
                        <label class="block text-sm font-medium mb-2 dark:text-gray-300"><?php echo $this->lang->line('payment_frequency'); ?>:</label>
                        <input type="text" readonly value="<?php echo $duration_label; ?>" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm disabled:opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                    </div>
                    <div class="sm:col-span-4">
                        <label class="block text-sm font-medium mb-2 dark:text-gray-300"><?php echo $this->lang->line('total_repayments'); ?>:</label>
                        <input type="text" readonly value="<?php echo htmlspecialchars((string) ($topup->session ?? '-'), ENT_QUOTES, 'UTF-8'); ?>" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm disabled:opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                    </div>
                    <div class="sm:col-span-4">
                        <label class="block text-sm font-medium mb-2 dark:text-gray-300"><?php echo $this->lang->line('interest_formula'); ?>:</label>
                        <input type="text" readonly value="<?php echo htmlspecialchars($topup->rate ?? '-', ENT_QUOTES, 'UTF-8'); ?>" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm disabled:opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                    </div>

                    <div class="sm:col-span-4">
                        <label class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('requested_topup_amount'); ?>:</label>
                        <input type="text" readonly value="<?php echo number_format((float) $topup->topup_amount); ?>" class="py-2.5 px-4 block w-full border-green-600 rounded-lg text-sm font-semibold text-green-700 disabled:opacity-50 dark:bg-gray-700 dark:border-green-600">
                    </div>
                    <div class="sm:col-span-4">
                        <label class="block text-sm font-medium mb-2 dark:text-gray-300"><?php echo $this->lang->line('requested_by'); ?>:</label>
                        <input type="text" readonly value="<?php echo htmlspecialchars($topup->requested_by ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm disabled:opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                    </div>
                    <div class="sm:col-span-4">
                        <label class="block text-sm font-medium mb-2 dark:text-gray-300"><?php echo $this->lang->line('request_date'); ?>:</label>
                        <input type="text" readonly value="<?php echo !empty($topup->requested_at) ? date('d-m-Y H:i', strtotime($topup->requested_at)) : '-'; ?>" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm disabled:opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                    </div>

                    <div class="sm:col-span-12">
                        <label class="block text-sm font-medium mb-2 dark:text-gray-300"><?php echo $this->lang->line('topup_reason_label'); ?>:</label>
                        <textarea readonly rows="3" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm disabled:opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"><?php echo htmlspecialchars($topup->reason ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
                    </div>
                </div>

                <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 uppercase mb-4"><?php echo $this->lang->line('requested_loan_terms'); ?></h4>
                    <div class="grid sm:grid-cols-3 gap-4 sm:gap-6">
                        <div>
                            <label class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('payment_frequency'); ?>:</label>
                            <input type="text" readonly value="<?php echo $requested_duration_label; ?>" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm disabled:opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('total_repayments'); ?>:</label>
                            <input type="text" readonly value="<?php echo htmlspecialchars((string) ($topup->requested_session ?? '-'), ENT_QUOTES, 'UTF-8'); ?>" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm disabled:opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('interest_formula'); ?>:</label>
                            <input type="text" readonly value="<?php echo htmlspecialchars($topup->requested_rate ?? '-', ENT_QUOTES, 'UTF-8'); ?>" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm disabled:opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                        </div>
                    </div>
                </div>

                <?php if (($topup->topup_status ?? '') === 'pending'): ?>
                <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700 space-y-6">
                    <div class="flex justify-center gap-x-2">
                        <?php echo form_open("admin/approve_loan_topup/{$topup->topup_id}"); ?>
                            <button type="submit" onclick="return confirm('<?php echo htmlspecialchars($this->lang->line('approve_topup_confirm'), ENT_QUOTES, 'UTF-8'); ?>');" class="py-2 px-4 btn-primary-sm bg-cyan-800 border border-cyan-500 hover:bg-cyan-700 text-white"><?php echo $this->lang->line('approve'); ?></button>
                        <?php echo form_close(); ?>
                    </div>

                    <?php echo form_open("admin/reject_loan_topup/{$topup->topup_id}"); ?>
                        <div class="max-w-lg mx-auto">
                            <label class="block text-sm font-medium mb-2 dark:text-gray-300"><?php echo $this->lang->line('reject_reason_prompt'); ?></label>
                            <textarea name="reject_reason" rows="2" required class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-red-500 focus:ring-red-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"></textarea>
                            <div class="mt-3 flex justify-center">
                                <button type="submit" class="py-2 px-4 bg-red-600 dark:bg-red-800 rounded border border-red-500 hover:bg-red-700 text-white"><?php echo $this->lang->line('reject_request'); ?></button>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
                <?php elseif (($topup->topup_status ?? '') === 'approved' && empty($topup->disbursed_at)): ?>
                <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700 space-y-6">
                    <div class="bg-cyan-50 border border-cyan-200 text-sm text-cyan-800 rounded-lg p-4 dark:bg-cyan-800/10 dark:border-cyan-900 dark:text-cyan-400 text-center">
                        <?php echo $this->lang->line('topup_awaiting_withdrawal'); ?>
                        <?php echo htmlspecialchars($topup->approved_by ?? '', ENT_QUOTES, 'UTF-8'); ?>
                        <?php echo !empty($topup->approved_at) ? ($this->lang->line('on_word') . ' ' . date('d-m-Y H:i', strtotime($topup->approved_at))) : ''; ?>.
                        <p class="mt-1"><?php echo $this->lang->line('topup_awaiting_withdrawal_desc'); ?></p>
                    </div>

                    <?php if (!empty($fee_breakdown)): ?>
                    <div class="max-w-lg mx-auto border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                        <div class="bg-gray-50 dark:bg-gray-700 px-4 py-2">
                            <h5 class="text-xs font-semibold uppercase text-gray-600 dark:text-gray-300"><?php echo $this->lang->line('fee_breakdown_title'); ?></h5>
                        </div>
                        <div class="p-4 text-sm space-y-2">
                            <div class="flex justify-between text-gray-700 dark:text-gray-300">
                                <span><?php echo $this->lang->line('gross_amount'); ?></span>
                                <span class="font-medium"><?php echo number_format($fee_breakdown['gross'], 2); ?></span>
                            </div>
                            <?php if (!empty($fee_breakdown['fees'])): ?>
                                <?php foreach ($fee_breakdown['fees'] as $fee): ?>
                                <div class="flex justify-between text-red-600 dark:text-red-400">
                                    <span><?php echo htmlspecialchars($fee['description'], ENT_QUOTES, 'UTF-8'); ?> (<?php echo $fee['percentage']; ?><?php echo $fee['symbol'] === '%' ? '%' : ' ' . $fee['symbol']; ?>)</span>
                                    <span>-<?php echo number_format($fee['amount'], 2); ?></span>
                                </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p class="text-xs text-gray-400 italic"><?php echo $this->lang->line('no_fees_apply'); ?></p>
                            <?php endif; ?>
                            <div class="flex justify-between font-bold text-gray-900 dark:text-white border-t border-gray-200 dark:border-gray-700 pt-2">
                                <span><?php echo $this->lang->line('net_amount_to_customer'); ?></span>
                                <span><?php echo number_format($fee_breakdown['net'], 2); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php echo form_open("admin/withdraw_loan_topup/{$topup->topup_id}"); ?>
                        <div class="max-w-lg mx-auto grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-2 dark:text-gray-300"><?php echo $this->lang->line('payment_method'); ?>:</label>
                                <select name="method" required class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                                    <option value=""><?php echo $this->lang->line('select_payment_method'); ?></option>
                                    <?php if (!empty($acount)): ?>
                                        <?php foreach ($acount as $acc): ?>
                                            <option value="<?php echo $acc->trans_id; ?>"><?php echo htmlspecialchars($acc->account_name, ENT_QUOTES, 'UTF-8'); ?> - Salio: <?php echo number_format(isset($acc->blanch_capital) ? $acc->blanch_capital : 0); ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2 dark:text-gray-300"><?php echo $this->lang->line('withdrawal_date'); ?>:</label>
                                <input type="date" name="with_date" required value="<?php echo date('Y-m-d'); ?>" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                            </div>
                            <div class="sm:col-span-2 flex justify-center">
                                <button type="submit" onclick="return confirm('<?php echo htmlspecialchars($this->lang->line('withdraw_topup_confirm'), ENT_QUOTES, 'UTF-8'); ?>');" class="py-2 px-4 btn-primary-sm bg-cyan-800 border border-cyan-500 hover:bg-cyan-700 text-white"><?php echo $this->lang->line('withdraw_topup'); ?></button>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
                <?php elseif (($topup->topup_status ?? '') === 'disbursed'): ?>
                <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700 text-center text-sm text-gray-500 dark:text-gray-400">
                    <?php echo $this->lang->line('topup_request_disbursed'); ?>
                    <?php echo htmlspecialchars($topup->disbursed_by ?? '', ENT_QUOTES, 'UTF-8'); ?>
                    <?php echo !empty($topup->disbursed_at) ? ($this->lang->line('on_word') . ' ' . date('d-m-Y H:i', strtotime($topup->disbursed_at))) : ''; ?>.
                </div>
                <?php else: ?>
                <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700 text-center text-sm text-gray-500 dark:text-gray-400">
                    <?php echo $this->lang->line('topup_request_processed_rejected'); ?>
                    <?php echo htmlspecialchars($topup->approved_by ?? '', ENT_QUOTES, 'UTF-8'); ?>
                    <?php echo !empty($topup->approved_at) ? ($this->lang->line('on_word') . ' ' . date('d-m-Y H:i', strtotime($topup->approved_at))) : ''; ?>.
                </div>
                <?php endif; ?>

            </div>
        </div>



        <div class="text-center">
            <a href="<?php echo base_url('admin/loan_pending?request_type=topup'); ?>" class="text-sm text-cyan-700 hover:underline">&larr; <?php echo $this->lang->line('back_to_topup_requests'); ?></a>
        </div>

    </div>
</div>
<!-- ========== END MAIN CONTENT BODY ========== -->

<?php
include_once APPPATH . "views/partials/footer.php";
?>
