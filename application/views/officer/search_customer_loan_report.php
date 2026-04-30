<?php include_once APPPATH . "views/partials/officerheader.php"; ?>

<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-6">

        <!-- Page Title -->
        <div class="mb-6">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-200">
                <?php echo $this->lang->line('customer_loan_report'); ?>
            </h2>
        </div>

        <?php if ($das = $this->session->flashdata('massage')): ?>
        <div class="bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert">
            <div class="flex">
                <div class="flex-shrink-0"><span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-teal-100 bg-teal-200 text-teal-800 dark:border-teal-900 dark:bg-teal-800 dark:text-teal-500"><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="m9 12 2 2 4-4"></path></svg></span></div>
                <div class="ms-3"><h3 class="text-gray-800 font-semibold dark:text-white">Success</h3><p class="mt-2 text-sm text-gray-700 dark:text-gray-400"><?php echo $das; ?></p></div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Search Card -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 md:p-6">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-6">
                    Tafuta Mteja
                </h3>

                <?php echo form_open("oficer/customer_loan_report"); ?>

                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label for="customer_id" class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-200">
                            Mteja *:
                        </label>
                        <select id="customer_id" name="customer_id" required
                            class="w-full h-14 text-base font-semibold py-2 px-3 rounded-lg bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 text-gray-900 dark:text-white select2">
                            <option value="">-- Chagua Mteja --</option>
                            <?php foreach ($customer as $c): ?>
                                <option value="<?php echo $c->customer_id; ?>">
                                    <?php echo strtoupper($c->f_name . ' ' . $c->m_name . ' ' . $c->l_name); ?> /
                                    <?php echo strtoupper($c->customer_code); ?> /
                                    <?php echo strtoupper($c->blanch_name); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">

                <div class="mt-8 pt-6 dark:border-gray-700">
                    <div class="flex justify-center gap-x-2">
                        <button type="submit" class="py-2 px-6 rounded-lg bg-cyan-700 hover:bg-cyan-600 text-white font-semibold text-sm">
                            Tafuta
                        </button>
                    </div>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>

    </div>
</div>
<!-- ========== END MAIN CONTENT BODY ========== -->

<?php include_once APPPATH . "views/partials/footer.php"; ?>
