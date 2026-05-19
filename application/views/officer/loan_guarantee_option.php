<?php
include_once APPPATH . "views/partials/officerheader.php";
?>

<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-6">
        <div class="mb-6">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-200"><?php echo $this->lang->line('guarantor_choice'); ?></h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('guarantor_choice_desc'); ?></p>
        </div>

        <div class="bg-white border shadow-sm rounded-xl p-4 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between text-xs sm:text-sm font-medium mb-2">
                <span class="text-cyan-700 dark:text-cyan-400"><?php echo $this->lang->line('guarantor_step_decision'); ?></span>
                <span class="text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('required_label'); ?></span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2 dark:bg-gray-700">
                <div class="bg-cyan-600 h-2 rounded-full" style="width: 20%"></div>
            </div>
        </div>

        <?php if ($err = $this->session->flashdata('error')): ?>
        <div class="bg-red-100 border border-red-200 text-sm text-red-800 rounded-lg p-4" role="alert">
            <?php echo $err; ?>
        </div>
        <?php endif; ?>

        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 md:p-6">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-2">Customer</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300 mb-6">
                    <?php echo strtoupper(($customer->f_name ?? '') . ' ' . ($customer->m_name ?? '') . ' ' . ($customer->l_name ?? '')); ?> /
                    <?php echo strtoupper($customer->customer_code ?? ''); ?>
                </p>

                <?php echo form_open('oficer/handle_loan_guarantee_option', ['novalidate' => true]); ?>
                    <input type="hidden" name="customer_id" value="<?php echo (int) ($customer->customer_id ?? 0); ?>">

                    <div class="space-y-4">
                        <label class="flex items-start gap-3 p-4 border rounded-lg cursor-pointer hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-700/40">
                            <input type="radio" name="guarantee_type" value="self_guarantee" class="mt-1" required>
                            <span>
                                <span class="font-semibold text-gray-800 dark:text-gray-200"><?php echo $this->lang->line('self_guarantee_option'); ?></span>
                                <span class="block text-sm text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('self_guarantee_option_desc'); ?></span>
                            </span>
                        </label>

                        <label class="flex items-start gap-3 p-4 border rounded-lg cursor-pointer hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-700/40">
                            <input type="radio" name="guarantee_type" value="collateral_office" class="mt-1" required>
                            <span>
                                <span class="font-semibold text-gray-800 dark:text-gray-200"><?php echo $this->lang->line('collateral_office_option'); ?></span>
                                <span class="block text-sm text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('collateral_office_option_desc'); ?></span>
                            </span>
                        </label>

                        <label class="flex items-start gap-3 p-4 border rounded-lg cursor-pointer hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-700/40">
                            <input type="radio" name="guarantee_type" value="has_guarantor" class="mt-1" required>
                            <span>
                                <span class="font-semibold text-gray-800 dark:text-gray-200"><?php echo $this->lang->line('has_guarantor_option'); ?></span>
                                <span class="block text-sm text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('has_guarantor_option_desc'); ?></span>
                            </span>
                        </label>
                    </div>

                    <div class="mt-8 border-t pt-6 border-gray-200 dark:border-gray-700">
                        <div class="flex justify-center gap-x-2">
                            <a href="<?php echo base_url('oficer/loan_application'); ?>" class="py-2.5 px-6 text-sm font-semibold rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-gray-700"><?php echo $this->lang->line('back'); ?></a>
                            <button type="submit" class="py-2.5 px-6 text-sm font-semibold rounded-lg bg-cyan-600 text-white hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500"><?php echo $this->lang->line('submit'); ?></button>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<?php include_once APPPATH . "views/partials/footer.php"; ?>
