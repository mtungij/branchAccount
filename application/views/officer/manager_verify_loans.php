
<?php
include_once APPPATH . "views/partials/officerheader.php";
?>

<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-6">

        <!-- Page Title -->
        <div class="mb-6">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-200">
               <?php echo $this->lang->line('loan_verification') ?? 'Loan Verification'; ?>
            </h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                <?php echo $this->lang->line('loan_verification_subtitle') ?? 'Verify branch loan requests before admin approval.'; ?>
            </p>
        </div>

        <?php if($this->session->flashdata('massage')): ?>
        <div class="bg-green-100 border border-green-200 text-sm text-green-800 rounded-lg p-4 dark:bg-green-800/10 dark:border-green-900 dark:text-green-500" role="alert">
            <?php echo $this->session->flashdata('massage'); ?>
        </div>
        <?php endif; ?>

        <?php if($this->session->flashdata('error')): ?>
        <div class="bg-red-100 border border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500" role="alert">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
        <?php endif; ?>

        <div class="flex flex-wrap items-center justify-between gap-2 mb-4">
            <div class="relative max-w-xs w-full">
                <label for="verify-table-search" class="sr-only">Search</label>
                <input type="text" name="verify-table-search" id="verify-table-search" class="py-2 px-3 ps-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600" placeholder="Search..." data-hs-datatable-search="#verify_table">
                <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3"><svg class="size-4 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></svg></div>
            </div>
        </div>

<!-- Table Section -->
<div class="overflow-x-auto">
    <div class="min-w-full inline-block align-middle">
        <div class="border rounded-lg overflow-hidden dark:border-gray-700">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" id="verify_table" data-hs-datatable>
    <thead class="bg-gray-50 dark:bg-gray-700">
        <tr>
            <th class="py-3 px-6 text-start">S/No.</th>
            <th class="py-3 px-6 text-start"><?php echo $this->lang->line('customer_name') ?? 'Customer Name'; ?></th>
            <th class="py-3 px-6 text-start"><?php echo $this->lang->line('phone_number') ?? 'Phone Number'; ?></th>
            <th class="py-3 px-6 text-start"><?php echo $this->lang->line('requested_amount') ?? 'Loan Amount'; ?></th>
            <th class="py-3 px-6 text-start"><?php echo $this->lang->line('loan_type') ?? 'Loan Type'; ?></th>
            <th class="py-3 px-6 text-start"><?php echo $this->lang->line('loan_application_date') ?? 'Application Date'; ?></th>
            <th class="py-3 px-6 text-start"><?php echo $this->lang->line('loan_requesting_officer') ?? 'Officer'; ?></th>
            <th class="py-3 px-6 text-end"><?php echo $this->lang->line('action') ?? 'Action'; ?></th>
        </tr>
    </thead>

    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

    <?php if (!empty($loan_pending) && is_array($loan_pending)): ?>

        <?php 
            $no = 1; 
            $total_loan = 0;
        ?>

        <?php foreach ($loan_pending as $loan): 
            $total_loan += (float)$loan->how_loan;
        ?>

        <tr>
            <td class="px-6 py-4 text-sm dark:text-gray-300"><?php echo $no++; ?>.</td>

            <td class="px-6 py-4 text-sm uppercase dark:text-gray-300">
                <?php echo htmlspecialchars($loan->f_name . ' ' . $loan->m_name . ' ' . $loan->l_name, ENT_QUOTES, 'UTF-8'); ?>
            </td>

            <td class="px-6 py-4 text-sm dark:text-gray-300">
                <?php echo htmlspecialchars($loan->phone_no, ENT_QUOTES, 'UTF-8'); ?>
            </td>

            <td class="px-6 py-4 text-sm dark:text-gray-300">
                <?php echo number_format((float)$loan->how_loan, 0, '.', ','); ?>
            </td>

            <td class="px-6 py-4 text-sm dark:text-gray-300">
                <?php echo htmlspecialchars($loan->loan_name, ENT_QUOTES, 'UTF-8'); ?>
            </td>

            <td class="px-6 py-4 text-sm dark:text-gray-300">
                <?php echo htmlspecialchars(date('d M, Y', strtotime($loan->loan_day)), ENT_QUOTES, 'UTF-8'); ?>
            </td>

            <td class="px-6 py-4 text-sm dark:text-gray-300">
                <?php echo htmlspecialchars($loan->created_by_name ?? '', ENT_QUOTES, 'UTF-8'); ?>
            </td>

            <td class="px-6 py-4 text-end text-sm">
                <div class="hs-dropdown relative inline-flex">
                    <button id="hs-verify-action-<?php echo $loan->loan_id; ?>" type="button"
                        class="hs-dropdown-toggle py-1.5 px-2.5 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700">
                        <?php echo $this->lang->line('action') ?? 'Action'; ?>
                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                    </button>

                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-40 bg-white shadow-md rounded-lg p-2 mt-2 dark:bg-gray-800 dark:border dark:border-gray-700" aria-labelledby="hs-verify-action-<?php echo $loan->loan_id; ?>">

                        <a href="<?= base_url("oficer/view_Dataloan/{$loan->customer_id}/{$loan->comp_id}") ?>"
                           class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                            <?php echo $this->lang->line('view') ?? 'View'; ?>
                        </a>

                        <a href="<?= base_url("oficer/verify_loan/{$loan->loan_id}") ?>"
                           onclick="return confirm('<?php echo $this->lang->line('verify_loan') ?? 'Verify Loan'; ?>?')"
                           class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-green-600 hover:bg-green-50 dark:text-green-400 dark:hover:bg-green-900/20">
                            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <?php echo $this->lang->line('verify') ?? 'Verify'; ?>
                        </a>

                    </div>
                </div>
            </td>

        </tr>

        <?php endforeach; ?>

        <!-- TOTAL ROW -->
        <tr class="bg-gray-100 dark:bg-gray-700 font-semibold">
            <td colspan="3" class="px-6 py-4 text-end dark:text-gray-300">TOTAL:</td>
            <td class="px-6 py-4 dark:text-gray-300">
                <?php echo number_format($total_loan, 0, '.', ','); ?>
            </td>
            <td colspan="4"></td>
        </tr>

    <?php else: ?>
        <tr>
            <td colspan="8" class="px-6 py-8 text-center text-sm text-gray-500 dark:text-gray-400">
                <?php echo $this->lang->line('no_data_found') ?? 'No loans pending verification.'; ?>
            </td>
        </tr>
    <?php endif; ?>

    </tbody>
</table>
        </div>
    </div>
</div>
<!-- End Table Section -->

    </div>
</div>

<?php
include_once APPPATH . "views/partials/footer.php";
?>
