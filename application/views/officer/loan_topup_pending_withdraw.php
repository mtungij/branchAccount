<?php
include_once APPPATH . "views/partials/officerheader.php";
?>

<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-6">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
            <div>
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-200">
                    <?php echo $this->lang->line('topup_pending_withdraw_title'); ?>
                </h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    <?php echo $this->lang->line('topup_pending_withdraw_subtitle'); ?>
                </p>
            </div>
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

        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 md:p-6">
                <div class="overflow-x-auto">
                    <div class="min-w-full inline-block align-middle">
                        <div class="border rounded-lg overflow-hidden dark:border-gray-700">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="py-3 px-6 text-start font-normal"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('customer'); ?></span></th>
                                        <th scope="col" class="py-3 px-6 text-start font-normal"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('loan_number'); ?></span></th>
                                        <th scope="col" class="py-3 px-6 text-start font-normal"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('requested_topup_amount'); ?></span></th>
                                        <th scope="col" class="py-3 px-6 text-start font-normal"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('net_amount_to_customer'); ?></span></th>
                                        <th scope="col" class="py-3 px-6 text-start font-normal"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('approved_by'); ?></span></th>
                                        <th scope="col" class="py-3 px-6 text-start font-normal"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('approval_date'); ?></span></th>
                                        <th scope="col" class="py-3 px-6 text-end font-normal"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('action'); ?></span></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    <?php if (!empty($pending_withdrawals)): ?>
                                        <?php foreach ($pending_withdrawals as $t): ?>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                <?php echo htmlspecialchars(trim($t->f_name . ' ' . $t->m_name . ' ' . $t->l_name), ENT_QUOTES, 'UTF-8'); ?>
                                                <div class="text-xs text-gray-400"><?php echo htmlspecialchars($t->phone_no ?? '', ENT_QUOTES, 'UTF-8'); ?></div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo htmlspecialchars($t->loan_code ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-cyan-700 dark:text-cyan-400"><?php echo number_format((float) $t->topup_amount); ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-green-700 dark:text-green-400"><?php echo number_format($t->fee_breakdown['net']); ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo htmlspecialchars($t->approved_by ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo !empty($t->approved_at) ? date('d-m-Y H:i', strtotime($t->approved_at)) : '-'; ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                <button type="button" class="py-1.5 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-cyan-700 text-white hover:bg-cyan-600" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-topup-withdraw-modal-<?php echo $t->topup_id; ?>" data-hs-overlay="#hs-topup-withdraw-modal-<?php echo $t->topup_id; ?>">
                                                    <?php echo $this->lang->line('withdraw_topup'); ?>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="7" class="px-6 py-10 text-center text-sm text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('no_topups_awaiting_withdrawal'); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- ========== END MAIN CONTENT BODY ========== -->

<?php if (!empty($pending_withdrawals)): ?>
    <?php foreach ($pending_withdrawals as $t): ?>
    <div id="hs-topup-withdraw-modal-<?php echo $t->topup_id; ?>" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
            <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700">

                <!-- Modal Header -->
                <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                    <h3 class="font-bold text-gray-800 dark:text-white"><?php echo htmlspecialchars(trim($t->f_name . ' ' . $t->m_name . ' ' . $t->l_name), ENT_QUOTES, 'UTF-8'); ?></h3>
                    <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" data-hs-overlay="#hs-topup-withdraw-modal-<?php echo $t->topup_id; ?>">
                        <span class="sr-only"><?php echo $this->lang->line('close'); ?></span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                    </button>
                </div>

                <div class="p-4 sm:p-6 pb-0">
                    <div class="border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                        <div class="bg-gray-50 dark:bg-gray-700 px-4 py-2">
                            <h5 class="text-xs font-semibold uppercase text-gray-600 dark:text-gray-300"><?php echo $this->lang->line('fee_breakdown_title'); ?></h5>
                        </div>
                        <div class="p-4 text-sm space-y-2">
                            <div class="flex justify-between text-gray-700 dark:text-gray-300">
                                <span><?php echo $this->lang->line('gross_amount'); ?></span>
                                <span class="font-medium"><?php echo number_format($t->fee_breakdown['gross'], 2); ?></span>
                            </div>
                            <?php if (!empty($t->fee_breakdown['fees'])): ?>
                                <?php foreach ($t->fee_breakdown['fees'] as $fee): ?>
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
                                <span><?php echo number_format($t->fee_breakdown['net'], 2); ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <?php echo form_open("oficer/withdraw_loan_topup/{$t->topup_id}"); ?>

                <!-- Modal Body -->
                <div class="p-4 sm:p-6">
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="sm:col-span-2">
                            <label class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('payment_method'); ?>:</label>
                            <select name="method" required class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                                <option value="" selected disabled><?php echo $this->lang->line('select_payment_method'); ?></option>
                                <?php if (!empty($acount)): ?>
                                    <?php foreach ($acount as $acc): ?>
                                        <option value="<?php echo $acc->trans_id; ?>"><?php echo htmlspecialchars($acc->account_name, ENT_QUOTES, 'UTF-8'); ?> - Salio: <?php echo number_format(isset($acc->blanch_capital) ? $acc->blanch_capital : 0); ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="sm:col-span-2">
                            <label class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('withdrawal_date'); ?>:</label>
                            <input type="date" name="with_date" required value="<?php echo date('Y-m-d'); ?>" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-6 flex justify-end items-center gap-x-2">
                        <button type="button" class="py-2 px-3 btn-secondary-sm" data-hs-overlay="#hs-topup-withdraw-modal-<?php echo $t->topup_id; ?>"><?php echo $this->lang->line('close'); ?></button>
                        <button type="submit" onclick="return confirm('<?php echo htmlspecialchars($this->lang->line('withdraw_topup_confirm'), ENT_QUOTES, 'UTF-8'); ?>');" class="py-2 px-4 btn-primary-sm bg-cyan-800 border border-cyan-500 hover:bg-cyan-700 text-white"><?php echo $this->lang->line('withdraw_topup'); ?></button>
                    </div>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
<?php endif; ?>

<?php
include_once APPPATH . "views/partials/footer.php";
?>
