
<?php
include_once APPPATH . "views/partials/officerheader.php";

// --- DUMMY DATA - REMOVE AND LOAD FROM YOUR CONTROLLER ---
// Controller should pass $loan_pending, an array of shareholder objects.
// Each object should have 'loan_id', 'share_name', 'share_mobile', 'share_email', 'share_sex', 'share_dob'.
// if (!isset($loan_pending)) {
//     $loan_pending = [
//         (object)['loan_id' => 1, 'share_name' => 'Alice Wonderland', 'share_mobile' => '0712345001', 'share_email' => 'alice@example.com', 'share_sex' => 'female', 'share_dob' => '1985-06-15'],
//         (object)['loan_id' => 2, 'share_name' => 'Bob The Builder', 'share_mobile' => '0712345002', 'share_email' => 'bob@example.com', 'share_sex' => 'male', 'share_dob' => '1978-11-02'],
//     ];
// }
// --- END DUMMY DATA ---header.php
?>

<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-6">

        <!-- Page Title / Subheader -->
        <div class="mb-6">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-200">
               <?php echo $this->lang->line('loan_pending_approve') ?? 'Loan Pending Approve'; ?>
            </h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                <?php echo $this->lang->line('loan_pending_approve_desc') ?? 'Request approval so you can serve customers.'; ?>
            </p>
        </div>


		<div class="flex flex-wrap items-center justify-between gap-2 mb-4">
                    <div class="relative max-w-xs w-full">
                        <label for="shareholder-table-search" class="sr-only"><?php echo $this->lang->line('search') ?? 'Search'; ?></label>
                        <input type="text" name="shareholder-table-search" id="shareholder-table-search" class="py-2 px-3 ps-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600" placeholder="<?php echo $this->lang->line('search_loan_pending') ?? 'Search pending loans...'; ?>" data-hs-datatable-search="#shareholder_table">
                        <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3"><svg class="size-4 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></svg></div>
                    </div>
                </div>

<!-- Table Section -->
<div class="overflow-x-auto">
                    <div class="min-w-full inline-block align-middle">
                        <div class="border rounded-lg overflow-hidden text-gray-800 dark:border-gray-700 dark:text-gray-200">
		<table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" id="shareholder_table" data-hs-datatable>
    <thead class="bg-cyan-600 text-white dark:bg-cyan-700 dark:text-white">
        <tr>
            <th class="py-3 px-6 text-start"><?php echo $this->lang->line('sno') ?? 'S/No.'; ?></th>
            <th class="py-3 px-6 text-start"><?php echo $this->lang->line('customer_name') ?? 'Customer Name'; ?></th>
            <th class="py-3 px-6 text-start"><?php echo $this->lang->line('phone_number') ?? 'Phone Number'; ?></th>
            <th class="py-3 px-6 text-start"><?php echo $this->lang->line('branch_sw') ?? 'Branch'; ?></th>
            <th class="py-3 px-6 text-start"><?php echo $this->lang->line('loan_amount_applied') ?? 'Loan Amount Applied'; ?></th>
            <th class="py-3 px-6 text-start"><?php echo $this->lang->line('duration_type') ?? 'Duration Type'; ?></th>
            <th class="py-3 px-6 text-start"><?php echo $this->lang->line('loan_type') ?? 'Loan Type'; ?></th>
            <th class="py-3 px-6 text-end"><?php echo $this->lang->line('loan_status') ?? 'Loan Status'; ?></th>
            <th class="py-3 px-6 text-end"><?php echo $this->lang->line('loan_application_date') ?? 'Loan Application Date'; ?></th>
            <th class="py-3 px-6 text-center"><?php echo $this->lang->line('verification_status') ?? 'Verification'; ?></th>
            <th class="py-3 px-6 text-end"><?php echo $this->lang->line('action') ?? 'Action'; ?></th>
        </tr>
    </thead>

    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

    <?php if (!empty($loan_pending) && is_array($loan_pending)): ?>

        <?php 
            $no = 1; 
            $total_loan = 0;
        ?>

        <?php foreach ($loan_pending as $loan_pendings): 
            $total_loan += (float)$loan_pendings->how_loan;
        ?>

        <tr>
            <td class="px-6 py-4 text-sm"><?php echo $no++; ?>.</td>

            <td class="px-6 py-4 text-sm uppercase">
                <?php echo htmlspecialchars($loan_pendings->f_name . ' ' . $loan_pendings->m_name . ' ' . $loan_pendings->l_name, ENT_QUOTES, 'UTF-8'); ?>
            </td>

            <td class="px-6 py-4 text-sm">
                <?php echo htmlspecialchars($loan_pendings->phone_no, ENT_QUOTES, 'UTF-8'); ?>
            </td>

            <td class="px-6 py-4 text-sm">
                <?php echo htmlspecialchars($loan_pendings->blanch_name, ENT_QUOTES, 'UTF-8'); ?>
            </td>

            <td class="px-6 py-4 text-sm">
                <?php echo number_format((float)$loan_pendings->how_loan, 0, '.', ','); ?>
            </td>

            <td class="px-6 py-4 text-sm">
                <?php
                    if ($loan_pendings->day == 1) {
                        echo $this->lang->line('day_label') ?? 'Day';
                    } elseif ($loan_pendings->day == 7) {
                        echo $this->lang->line('week_label') ?? 'Week';
                    } elseif (in_array($loan_pendings->day, [28, 29, 30, 31])) {
                        echo $this->lang->line('month_label') ?? 'Month';
                    } else {
                        echo $this->lang->line('not_applicable_label') ?? 'N/A';
                    }

                    echo " (" . htmlspecialchars($loan_pendings->session, ENT_QUOTES, 'UTF-8') . ")";
                ?>
            </td>

            <td class="px-6 py-4 text-sm">
                <?php echo htmlspecialchars($loan_pendings->loan_name, ENT_QUOTES, 'UTF-8'); ?>
            </td>

            <td class="px-6 py-4 text-sm">
                <?php echo ($loan_pendings->loan_count > 1) ? ($this->lang->line('not_new_customer') ?? 'Existing Customer') : ($this->lang->line('new_customer') ?? 'New Customer'); ?>
            </td>

            <td class="px-6 py-4 text-sm">
                <?php echo htmlspecialchars(date('d M, Y', strtotime($loan_pendings->loan_day)), ENT_QUOTES, 'UTF-8'); ?>
            </td>

            <!-- Verification Status -->
            <td class="px-6 py-4 text-center text-sm">
                <?php if (!empty($loan_pendings->verified_by)): ?>
                <span class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-green-100 text-green-800 rounded-full dark:bg-green-500/10 dark:text-green-500">
                    <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                    <?php echo ($this->lang->line('verified') ?? 'Verified') . ' - ' . htmlspecialchars($loan_pendings->verifier_name ?? '', ENT_QUOTES, 'UTF-8'); ?>
                </span>
                <?php else: ?>
                <span class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full dark:bg-yellow-500/10 dark:text-yellow-500">
                    <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                    <?php echo $this->lang->line('not_verified') ?? 'Not Verified'; ?>
                </span>
                <?php endif; ?>
            </td>

            <!-- Action -->
            <?php if ($empl_data->position_id == '21'): ?>
            <td class="px-6 py-4 text-end text-sm">
                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                    <button id="hs-table-action-sh-<?php echo $loan_pendings->loan_id; ?>" type="button"
                        class="hs-dropdown-toggle py-1.5 px-2.5 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-gray-100 text-gray-800 shadow-sm hover:bg-gray-200 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700">
                        <?php echo $this->lang->line('action') ?? 'Action'; ?>
                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                    </button>

                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-40 bg-gray-100 shadow-md rounded-lg p-2 mt-2 z-20 dark:bg-gray-800 dark:border dark:border-gray-700" aria-labelledby="hs-table-action-sh-<?php echo $loan_pendings->loan_id; ?>">

                        <a href="<?= base_url("oficer/view_Dataloan/{$loan_pendings->customer_id}/{$loan_pendings->comp_id}") ?>"
                           class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                            <?php echo $this->lang->line('view') ?? 'View'; ?>
                        </a>

                        <?php if (empty($loan_pendings->verified_by)): ?>
                        <a href="<?= base_url("oficer/verify_loan/{$loan_pendings->loan_id}") ?>"
                           onclick="return confirm('<?php echo $this->lang->line('verify_loan') ?? 'Verify this loan'; ?>?')"
                           class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-green-600 hover:bg-green-50 dark:text-green-400 dark:hover:bg-green-900/20">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <?php echo $this->lang->line('verify') ?? 'Verify'; ?>
                        </a>
                        <?php endif; ?>

                    </div>
                </div>
            </td>
            <?php else: ?>
            <td class="px-6 py-4 text-end text-sm text-gray-400 dark:text-gray-500">—</td>
            <?php endif; ?>

        </tr>

        <?php endforeach; ?>

        <!-- TOTAL ROW -->
        <tr class="bg-gray-100 font-semibold dark:bg-gray-700 dark:text-gray-200">
            <td colspan="4" class="px-6 py-4 text-end"><?php echo ($this->lang->line('total') ?? 'TOTAL') . ':'; ?></td>
            <td class="px-6 py-4">
                <?php echo number_format($total_loan, 0, '.', ','); ?>
            </td>
            <td colspan="6"></td>
        </tr>

    <?php endif; ?>

    </tbody>
</table>

                        </div>
                    </div>
                </div>
<!-- End Table Section -->
<?php
include_once APPPATH . "views/partials/footer.php";
?>
<?php // Script for cmd+a fix for DataTables search input (if used) ?>

<script>
  window.addEventListener('load', () => {
    window.HSStaticMethods.autoInit(); // Ensure Preline auto-inits all datatable components
  });
</script>

<script>
window.addEventListener('load', () => {
  setTimeout(() => {
    const inputs = document.querySelectorAll('input[data-hs-datatable-search]');
    inputs.forEach((input) => {
      input.addEventListener('keydown', function (evt) {
        if ((evt.metaKey || evt.ctrlKey) && (evt.key === 'a' || evt.key === 'A')) {
          this.select();
        }
      });
    });
    // HSStaticMethods.autoInit(['select']); // If Preline selects need explicit init
  }, 500);
});
</script>
