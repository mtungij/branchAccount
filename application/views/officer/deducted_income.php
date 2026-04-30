<?php
include_once APPPATH . "views/partials/officerheader.php";
?>

<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-6">

        <!-- Page Title / Subheader -->
        <div class="mb-6">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-200">
               Processing Deducted Income Report
            </h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                This report provides an overview of all deducted incomes.
            </p>
        </div>

        <section class="bg-gray-50 w-max-auto dark:bg-gray-900 p-3 sm:p-5">
            <div class="w-full">
                <!-- Start coding here -->
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">

                    <!-- Search & Actions -->
                    <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">

                        <!-- Search -->
                        <div class="w-full md:w-1/2">
                            <form class="flex items-center">
                                <label for="simple-search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M12.9 14.32a8 8 0 111.414-1.414l4.387 4.387a1 1 0 01-1.414 1.414l-4.387-4.387zM8 14a6 6 0 100-12 6 6 0 000 12z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" 
                                        placeholder="Tafuta mteja hapa" 
                                        data-hs-datatable-search="#shareholder_table" 
                                        aria-label="Search share holders">
                                </div>
                            </form>
                        </div>

                        <!-- Actions -->
                        <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                            <a href="<?php echo base_url("oficer/print_deducted"); ?>" target="_blank" class="w-full md:w-auto flex items-center justify-center px-3 py-2 text-sm font-medium text-white bg-cyan-600 hover:bg-cyan-700 rounded-lg focus:outline-none focus:ring-4 focus:ring-cyan-300 dark:focus:ring-cyan-800">
                                <span class="bg-cyan-200 p-1 rounded mr-2">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M14 2H6a2 2 0 00-2 2v16c0 1.104.896 2 2 2h12a2 2 0 002-2V8l-6-6zM13 3.5L18.5 9H13V3.5zM10 14h1v4h-1v-4zm-2.5 0H9v1.5H8v.5h1v1H7.5V14zm7 0H15a1 1 0 110 2h-.5v2H13v-4z" />
                                    </svg>
                                </span>
                                Print PDF
                            </a>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table id="shareholder_table" class="w-full text-sm text-left text-gray-500 dark:text-gray-200">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-cyan-600 dark:text-white">
                                <tr>
                                    <th scope="col" class="px-4 py-3">S/No</th>
                                    <th scope="col" class="px-4 py-3">Customer Name</th>
                                    <th scope="col" class="px-4 py-3">Phone No</th>
                                    <th scope="col" class="px-4 py-3">Loan Amount</th>
                                    <th scope="col" class="px-4 py-3">Rejesho</th>
                                    <th scope="col" class="px-4 py-3">Income Type</th>
                                    <th scope="col" class="px-4 py-3">Income Amount</th>
                                    <th scope="col" class="px-4 py-3">Deducted By</th>
                                    <th scope="col" class="px-4 py-3">Date</th>
                                </tr>
                            </thead>

<tbody>
<?php 
$sno = 1; 
$total_loan    = 0;
$total_rejesho = 0;
$total_income  = 0;
?>
<?php if (!empty($deducted_data)): ?>
    <?php foreach ($deducted_data as $deducted_incomes): ?>
        <?php 
            $total_loan    += $deducted_incomes->how_loan;
            $total_rejesho += $deducted_incomes->restration;
            $total_income  += $deducted_incomes->deducted_balance;
        ?>
        <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
            <td class="px-4 py-2"><?= $sno++; ?></td>
            <td class="px-4 py-2 font-medium text-gray-900 dark:text-white">
                <?= $deducted_incomes->f_name . ' ' . $deducted_incomes->m_name . ' ' . $deducted_incomes->l_name; ?>
            </td>
            <td class="px-4 py-2 font-medium text-gray-900 dark:text-white">
                <?= $deducted_incomes->phone_no; ?>
            </td>
            <td class="px-4 py-2 font-medium text-gray-900 dark:text-white">
                <?= number_format($deducted_incomes->how_loan); ?>
            </td>
            <td class="px-4 py-2 font-medium text-gray-900 dark:text-white">
                <?= number_format($deducted_incomes->restration); ?>
            </td>
            <td class="px-4 py-2 font-medium text-gray-900 dark:text-white">
                <?= $deducted_incomes->income_name ?? 'FOMU'; ?>
            </td>
            <td class="px-4 py-2 font-medium text-gray-900 dark:text-white">
                <?= number_format($deducted_incomes->deducted_balance); ?>
            </td>
            <td class="px-4 py-2 font-medium text-gray-900 dark:text-white">
                System Deducted
            </td>
            <td class="px-4 py-2 font-medium text-gray-900 dark:text-white">
                <?= $deducted_incomes->deducted_date; ?>
            </td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="9" class="px-4 py-3 text-center text-gray-500 dark:text-gray-200">
            Hakuna taarifa za leo.
        </td>
    </tr>
<?php endif; ?>
</tbody>

<tfoot class="font-bold text-gray-900 dark:text-white bg-gray-100 dark:bg-gray-700">
    <tr>
        <td colspan="3" class="px-4 py-3 text-right">JUMLA</td>
        <td class="px-4 py-3"><b><?= number_format($total_loan) ?></b></td>
        <td class="px-4 py-3"><b><?= number_format($total_rejesho) ?></b></td>
        <td class="px-4 py-3"></td>
        <td class="px-4 py-3"><b><?= number_format($total_income) ?></b></td>
        <td colspan="2" class="px-4 py-3"></td>
    </tr>
</tfoot>



                        </table>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>
<!-- ========== END MAIN CONTENT BODY ========== -->

<?php
include_once APPPATH . "views/partials/footer.php";
?>
