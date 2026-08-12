<?php
include_once APPPATH . "views/partials/header.php";
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
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo htmlspecialchars($t->approved_by ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo !empty($t->approved_at) ? date('d-m-Y H:i', strtotime($t->approved_at)) : '-'; ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                <a href="<?php echo base_url("admin/view_loan_topup/{$t->topup_id}") ?>" class="py-1.5 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-cyan-700 text-white hover:bg-cyan-600"><?php echo $this->lang->line('withdraw_topup'); ?></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6" class="px-6 py-10 text-center text-sm text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('no_topups_awaiting_withdrawal'); ?></td>
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

<?php
include_once APPPATH . "views/partials/footer.php";
?>
