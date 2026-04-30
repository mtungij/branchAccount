<?php

include_once APPPATH . "views/partials/header.php";

$is_super_admin = ($this->session->userdata('role') === 'admin');
$can_loan_fee_edit = true;
$can_loan_fee_delete = true;

// --- DUMMY DATA - REMOVE AND LOAD FROM CONTROLLER ---
// if (!isset($fee_category)) { // For the list of fee categories (usually one)
//     // Simulating that 'GENERAL' is the currently selected category for display logic
//     $fee_category = [(object)['id' => 1, 'fee_category' => 'GENERAL', 'comp_id' => ($_SESSION['comp_id'] ?? null)]];
// }
// // This variable determines which main section is shown
// $fee_category_data = null;
// if (!empty($fee_category)) {
//     // Assuming $fee_category array contains the active setting.
//     // In a real scenario, you'd fetch the single active setting.
//     $fee_category_data = $fee_category[0];
// }


// Dummy data for "LOAN PRODUCT" section
// if (!isset($loan_category)) { // List of loan products/categories
//     $loan_category = [
//         (object)['category_id' => 1, 'loan_name' => 'Personal Loan', 'loan_price' => 50000, 'loan_perday' => 500000, 'interest_formular' => 10, 'fee_category_type' => 'MONEY', 'fee_value' => 5000],
//         (object)['category_id' => 2, 'loan_name' => 'Business Loan', 'loan_price' => 500001, 'loan_perday' => 2000000, 'interest_formular' => 8, 'fee_category_type' => 'PERCENTAGE', 'fee_value' => 1.5],
//     ];
// }

// Dummy data for "GENERAL" section
// if (!isset($fee_type)) { // The selected general fee type (usually one)
//     // Simulating that 'PERCENTAGE VALUE' is the active type
//     $fee_type = (object)['id' => 1, 'type' => 'PERCENTAGE VALUE', 'comp_id' => ($_SESSION['comp_id'] ?? null)];
// }
// if(!isset($fee_data)){ // This seems to be the same as $fee_type in your original code for the list
//     $fee_data = isset($fee_type) ? [$fee_type] : [];
// }

// if (!isset($loan_fee)) { // List of general loan fees
//     $loan_fee = [
//         (object)['fee_id' => 101, 'description' => 'Application Fee', 'fee_interest' => 50],
//         (object)['fee_id' => 102, 'description' => 'Processing Fee', 'fee_interest' => 0.5],
//     ];
// }
// --- END DUMMY DATA ---
?>

<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-6">

        <!-- Page Title -->
        <div class="mb-6">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-200">
                <?php echo $this->lang->line('loan_fee_settings'); ?>
            </h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                <?php echo $this->lang->line('loan_fee_settings_desc'); ?>
            </p>
        </div>

        <?php // Flash Messages ?>
        <?php if ($das = $this->session->flashdata('massage')): ?>
        <div class="bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert">
            <div class="flex">
                <div class="flex-shrink-0"><span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-teal-100 bg-teal-200 text-teal-800 dark:border-teal-900 dark:bg-teal-800 dark:text-teal-500"><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="m9 12 2 2 4-4"></path></svg></span></div>
                <div class="ms-3"><h3 class="text-gray-800 font-semibold dark:text-white"><?php echo $this->lang->line('success'); ?></h3><p class="mt-2 text-sm text-gray-700 dark:text-gray-400"><?php echo $das;?></p></div>
                <div class="ps-3 ms-auto"><div class="-mx-1.5 -my-1.5"><button type="button" class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-teal-50 focus:ring-teal-600 dark:bg-transparent dark:hover:bg-teal-800/50 dark:text-teal-600" data-hs-remove-element="[role=alert]"><span class="sr-only"><?php echo $this->lang->line('dismiss'); ?></span><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg></button></div></div>
            </div>
        </div>
        <?php endif; ?>


        <!-- Section: Loan Fee Category Setup -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Card: ADD LOAN FEE CATEGORY Form -->
            <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
                <div class="p-4 md:p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">
                        <?php echo $this->lang->line('set_loan_fee_category'); ?>
                    </h3>
                    <?php if ($can_loan_fee_edit): ?>
                    <?php echo form_open("admin/create_loanfee_category", ['novalidate' => true]); ?>
                        <div class="space-y-4">
                            <div>
                                <label for="fee_category_select" class="block text-sm font-medium mb-2 dark:text-gray-300"><?php echo $this->lang->line('loan_fee_category_label'); ?>*:</label>
                                <select id="fee_category_select" name="fee_category" required
                                        data-hs-select='{
                                            "placeholder": "<?php echo $this->lang->line('select_loan_fee_category'); ?>",
                                            "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-gray-200\" data-title></span></button>",
                                            "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2.5 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:ring-gray-600",
                                            "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-50 w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto dark:bg-gray-800 dark:border-gray-700",
                                            "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:hover:bg-gray-700 dark:text-gray-200 dark:focus:bg-gray-700",
                                            "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-gray-200\" data-title></div></div></div>",
                                            "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-gray-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                          }'>
                                    <option value=""><?php echo $this->lang->line('select_loan_fee_category'); ?></option>
                                    <option value="LOAN PRODUCT" <?php echo set_select('fee_category', 'LOAN PRODUCT'); ?>><?php echo $this->lang->line('loan_fee_by_loan_product'); ?></option>
                                    <option value="GENERAL" <?php echo set_select('fee_category', 'GENERAL'); ?>><?php echo $this->lang->line('loan_fee_by_general'); ?></option>
                                </select>
                                <?php echo form_error("fee_category", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                            </div>
                            <input type="hidden" name="comp_id" value="<?php echo htmlspecialchars($_SESSION['comp_id'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                        </div>
                        <div class="mt-6 pt-4 border-t border-gray-200 dark:border-gray-700">
                            <?php // Your original code had a condition: if ($fee_category == TRUE) {} elseif($fee_category == FALSE){ // show buttons }
                                  // This usually means: if a category is ALREADY set, don't show "Save" for adding a NEW one.
                                  // Or, it might mean if the $fee_category *list* is populated.
                                  // For an "Add" form, buttons are usually always there unless there's a specific reason.
                                  // I'll assume for now that if NO category is set (i.e., $fee_category_data is null or empty), then show "Save".
                                  // If one is already set, this form effectively becomes a way to *change* it.
                            ?>
                            <?php if (empty($fee_category_data)): // If no fee category is currently set, allow saving a new one ?>
                                <div class="flex justify-center gap-x-2">
                                    <button type="submit" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-cyan-600 text-white hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500"><?php echo $this->lang->line('save'); ?></button>
                                    <button type="reset" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-600"><?php echo $this->lang->line('cancel'); ?></button>
                                </div>
                            <?php else: ?>
                                <p class="text-sm text-center text-gray-600 dark:text-gray-400"><?php echo $this->lang->line('fee_category_already_set'); ?></p>
                                 <div class="flex justify-center gap-x-2 mt-2">
                                    <button type="submit" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-cyan-600 text-white hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500"><?php echo $this->lang->line('change_category'); ?></button>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php echo form_close(); ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Card: LOAN FEE CATEGORY List/Display -->
            <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
                <div class="p-4 md:p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">
                        <?php echo $this->lang->line('current_loan_fee_category'); ?>
                    </h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400"><?php echo $this->lang->line('category_name'); ?></th>
                                    <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-gray-400"><?php echo $this->lang->line('action'); ?></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                <?php if (!empty($fee_category)): ?>
                                    <?php foreach ($fee_category as $fc_item): // Using fc_item to avoid conflict ?>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                            <?php echo ($fc_item->fee_category == 'LOAN PRODUCT') ? $this->lang->line('loan_fee_by_loan_product') : (($fc_item->fee_category == 'GENERAL') ? $this->lang->line('loan_fee_by_general') : htmlspecialchars($fc_item->fee_category, ENT_QUOTES, 'UTF-8')); ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <?php if ($can_loan_fee_edit): ?>
                                            <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-cyan-600 hover:text-cyan-800 dark:text-cyan-500 dark:hover:text-cyan-400" data-hs-overlay="#hs-edit-feecategory-modal-<?php echo $fc_item->id; ?>"><?php echo $this->lang->line('edit'); ?></button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr><td colspan="2" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('no_fee_category_set'); ?></td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- End Grid -->


        <?php // Conditional Section 1: If Fee Category is "LOAN PRODUCT" ?>
        <?php if (isset($fee_category_data) && $fee_category_data->fee_category == 'LOAN PRODUCT'): ?>
        <div class="mt-6 flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200"><?php echo $this->lang->line('loan_product_fees'); ?></h2>
            </div>
            <div class="p-4" data-hs-datatable='{ "pageLength": 5, "paging": true, "pagingOptions": { "pageBtnClasses": "min-w-10 h-10 inline-flex justify-center items-center text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 py-2.5 text-sm rounded-full disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:focus:bg-gray-700 dark:hover:bg-gray-700" }}'>
                 <div class="overflow-x-auto"><div class="min-w-full inline-block align-middle"><div class="border rounded-lg overflow-hidden dark:border-gray-700">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" id="loan_product_fees_table">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="py-3 px-6 text-start"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('s_no'); ?></span></th>
                                <th scope="col" class="py-3 px-6 text-start"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('loan_product'); ?></span></th>
                                <th scope="col" class="py-3 px-6 text-start"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('loan_level'); ?></span></th>
                                <th scope="col" class="py-3 px-6 text-start"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('interest_percent'); ?></span></th>
                                <th scope="col" class="py-3 px-6 text-start"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('fee_type'); ?></span></th>
                                <th scope="col" class="py-3 px-6 text-start"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('fee_value'); ?></span></th>
                                <th scope="col" class="py-3 px-6 text-end"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('action'); ?></span></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <?php $no_lp = 1; ?>
                            <?php if(isset($loan_category) && !empty($loan_category)): foreach ($loan_category as $lc_item): ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200"><?php echo $no_lp++; ?>.</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo htmlspecialchars($lc_item->loan_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo number_format($lc_item->loan_price) . ' - ' . number_format($lc_item->loan_perday); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo htmlspecialchars($lc_item->interest_formular, ENT_QUOTES, 'UTF-8'); ?>%</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                    <?php echo ($lc_item->fee_category_type == 'MONEY') ? $this->lang->line('money_value') : (($lc_item->fee_category_type == 'PERCENTAGE') ? $this->lang->line('percentage_value') : htmlspecialchars($lc_item->fee_category_type ?? 'N/A', ENT_QUOTES, 'UTF-8')); ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                    <?php echo ($lc_item->fee_category_type == 'MONEY') ? number_format($lc_item->fee_value ?? 0).' / '.$this->lang->line('currency_tsh') : (($lc_item->fee_category_type == 'PERCENTAGE') ? ($lc_item->fee_value ?? 0).'%' : 'N/A'); ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                    <?php if ($can_loan_fee_edit): ?>
                                    <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-cyan-600 hover:text-cyan-800 dark:text-cyan-500 dark:hover:text-cyan-400" data-hs-overlay="#hs-edit-loanproductfee-modal-<?php echo $lc_item->category_id; ?>"><?php echo $this->lang->line('edit_fee'); ?></button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; else: ?>
                                <tr><td colspan="7" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400 data-[dt-styles=dt-empty]:hidden"><?php echo $this->lang->line('no_loan_products_for_fees'); ?></td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div></div></div>
                 <div class="py-3 px-4 border-t border-gray-200 dark:border-gray-700 hidden" data-hs-datatable-paging="">
                    <nav class="flex items-center space-x-1"><button type="button" class="p-2.5 min-w-10 h-10 inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700" data-hs-datatable-paging-prev=""><span aria-hidden="true">«</span><span class="sr-only"><?php echo $this->lang->line('previous'); ?></span></button><div class="flex items-center space-x-1 [&>.active]:bg-gray-100 dark:[&>.active]:bg-gray-700" data-hs-datatable-paging-pages=""></div><button type="button" class="p-2.5 min-w-10 h-10 inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700" data-hs-datatable-paging-next=""><span class="sr-only"><?php echo $this->lang->line('next'); ?></span><span aria-hidden="true">»</span></button></nav>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <!-- End Conditional Section 1 -->


        <?php // Conditional Section 2: If Fee Category is "GENERAL" ?>
        <?php if (isset($fee_category_data) && $fee_category_data->fee_category == 'GENERAL'): ?>
            <div class="mt-6 grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Card: ADD LOAN FEE TYPE Form -->
                <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-4 md:p-6">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4"><?php echo $this->lang->line('set_general_loan_fee_type'); ?></h3>
                        <?php if ($can_loan_fee_edit): ?>
                        <?php echo form_open("admin/create_loanfee_type", ['novalidate' => true]); ?>
                            <div class="space-y-4">
                                <div>
                                    <label for="general_fee_type_select" class="block text-sm font-medium mb-2 dark:text-gray-300"><?php echo $this->lang->line('loan_fee_type'); ?>*:</label>
                                     <select id="general_fee_type_select" name="type" required
                                        data-hs-select='{ "placeholder": "---Select Loan fee Type---", /* ... other hs-select options ... */ }'
                                        class="py-2.5 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                                        <option value=""><?php echo $this->lang->line('select_loan_fee_type'); ?></option>
                                        <option value="MONEY VALUE" <?php echo set_select('type', 'MONEY VALUE'); ?>><?php echo $this->lang->line('money_value'); ?></option>
                                        <option value="PERCENTAGE VALUE" <?php echo set_select('type', 'PERCENTAGE VALUE'); ?>><?php echo $this->lang->line('percentage_value'); ?></option>
                                    </select>
                                    <?php echo form_error("type", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                                </div>
                                <input type="hidden" name="comp_id" value="<?php echo htmlspecialchars($_SESSION['comp_id'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                            </div>
                            <div class="mt-6 pt-4 border-t border-gray-200 dark:border-gray-700">
                                <?php // This logic might mean: if a general fee type is ALREADY set, don't show "Save" for adding a NEW one for this type.
                                      // Or it allows changing the single general fee type.
                                ?>
                                <?php if (empty($fee_type)): // If no general fee type is set ?>
                                    <div class="flex justify-center gap-x-2">
                                        <button type="submit" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-cyan-600 text-white hover:bg-cyan-700"><?php echo $this->lang->line('save_type'); ?></button>
                                        <button type="reset" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-600"><?php echo $this->lang->line('cancel'); ?></button>
                                    </div>
                                <?php else: ?>
                                     <p class="text-sm text-center text-gray-600 dark:text-gray-400"><?php echo $this->lang->line('general_fee_type_already_set'); ?></p>
                                     <div class="flex justify-center gap-x-2 mt-2">
                                        <button type="submit" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-cyan-600 text-white hover:bg-cyan-700"><?php echo $this->lang->line('change_type'); ?></button>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php echo form_close(); ?>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Card: LOAN FEE TYPE List/Display -->
                <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-4 md:p-6">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4"><?php echo $this->lang->line('current_general_loan_fee_type'); ?></h3>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400"><?php echo $this->lang->line('type'); ?></th>
                                        <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-gray-400"><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    <?php if (!empty($fee_data)): // $fee_data should contain the currently set general fee type ?>
                                        <?php foreach ($fee_data as $ft_item): ?>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200"><?php echo htmlspecialchars($ft_item->type, ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                <?php if ($can_loan_fee_edit): ?>
                                                <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-cyan-600 hover:text-cyan-800 dark:text-cyan-500 dark:hover:text-cyan-400" data-hs-overlay="#hs-edit-feetype-modal-<?php echo $ft_item->id; ?>"><?php echo $this->lang->line('edit'); ?></button>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr><td colspan="2" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('no_general_fee_type_set'); ?></td></tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- End grid for general fee type -->

            <!-- General Loan Fees - Form and Table -->
            <?php if (isset($fee_type) && !empty($fee_type)): // Show this only if a general fee type is set ?>
            <div class="mt-6 grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Card: ADD GENERAL LOAN FEE Form -->
                 <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-4 md:p-6">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4"><?php echo $this->lang->line('add_general_loan_fee'); ?></h3>
                        <?php if ($can_loan_fee_edit): ?>
                        <?php echo form_open("admin/create_loan_fee", ['novalidate' => true]); ?>
                            <div class="grid sm:grid-cols-12 gap-4">
                                <div class="sm:col-span-6">
                                    <label for="general_fee_desc" class="block text-sm font-medium mb-2 dark:text-gray-300">*<?php echo $this->lang->line('description'); ?>:</label>
                                    <input type="text" id="general_fee_desc" placeholder="<?php echo $this->lang->line('description'); ?>" name="description" required autocomplete="off" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" value="<?php echo set_value('description'); ?>">
                                     <?php echo form_error("description", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                                </div>
                                <div class="sm:col-span-6">
                                    <label for="general_fee_interest" class="block text-sm font-medium mb-2 dark:text-gray-300">
                                        *Loan Fee 
                                        <?php if ($fee_type->type == 'MONEY VALUE') echo $this->lang->line('in_currency_tsh'); elseif ($fee_type->type == 'PERCENTAGE VALUE') echo $this->lang->line('in_percentage'); ?>:
                                    </label>
                                    <input type="number" <?php if ($fee_type->type == 'PERCENTAGE VALUE') echo 'step="0.01"'; ?> id="general_fee_interest" required class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" placeholder="<?php echo $this->lang->line('fee_value'); ?>" name="fee_interest" autocomplete="off" value="<?php echo set_value('fee_interest'); ?>">
                                    <?php echo form_error("fee_interest", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                                </div>
                            </div>
                            <input type="hidden" name="comp_id" value="<?php echo htmlspecialchars($_SESSION['comp_id'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                            <div class="mt-6 pt-4 border-t border-gray-200 dark:border-gray-700">
                                <div class="flex justify-center gap-x-2">
                                    <button type="submit" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-cyan-600 text-white hover:bg-cyan-700"><?php echo $this->lang->line('save_fee'); ?></button>
                                    <button type="reset" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-600"><?php echo $this->lang->line('cancel'); ?></button>
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Card: GENERAL LOAN FEE List -->
                <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
                     <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700"><h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200"><?php echo $this->lang->line('general_loan_fees_list'); ?></h2></div>
                    <div class="p-4" data-hs-datatable='{ "pageLength": 5, "paging": true, "pagingOptions": { /* ... */ } }'>
                        <div class="overflow-x-auto"><div class="min-w-full inline-block align-middle"><div class="border rounded-lg overflow-hidden dark:border-gray-700">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" id="general_loan_fees_table">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col" class="py-3 px-6 text-start"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('description'); ?></span></th>
                                    <th scope="col" class="py-3 px-6 text-start"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('loan_fee_in'); ?> <?php if ($fee_type->type == 'MONEY VALUE') echo $this->lang->line('currency_tsh'); elseif ($fee_type->type == 'PERCENTAGE VALUE') echo '%'; ?></span></th>
                                    <th scope="col" class="py-3 px-6 text-end"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('action'); ?></span></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                <?php if(isset($loan_fee) && !empty($loan_fee)): foreach($loan_fee as $lf_item): ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo htmlspecialchars($lf_item->description, ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        <?php echo ($fee_type->type == 'MONEY VALUE') ? number_format($lf_item->fee_interest) . ' / ' . $this->lang->line('currency_tsh') : htmlspecialchars($lf_item->fee_interest, ENT_QUOTES, 'UTF-8') . ' %'; ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                        <?php if ($can_loan_fee_edit): ?>
                                        <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-cyan-600 hover:text-cyan-800 dark:text-cyan-500 dark:hover:text-cyan-400" data-hs-overlay="#hs-edit-generalfee-modal-<?php echo $lf_item->fee_id; ?>"><?php echo $this->lang->line('edit'); ?></button>
                                        <?php endif; ?>
                                        <?php if ($can_loan_fee_delete): ?>
                                        <a href="<?php echo base_url("admin/delete_loan_fee/{$lf_item->fee_id}"); ?>" onclick="return confirm('<?php echo $this->lang->line('are_you_sure'); ?>')" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 dark:text-red-500 dark:hover:text-red-400 ms-2"><?php echo $this->lang->line('delete'); ?></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; else: ?>
                                 <tr><td colspan="3" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400 data-[dt-styles=dt-empty]:hidden"><?php echo $this->lang->line('no_general_loan_fees_defined'); ?></td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        </div></div></div>
                         <div class="py-3 px-4 border-t border-gray-200 dark:border-gray-700 hidden" data-hs-datatable-paging="">
                            <nav class="flex items-center space-x-1"><button type="button" class="p-2.5 min-w-10 h-10 inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700" data-hs-datatable-paging-prev=""><span aria-hidden="true">«</span><span class="sr-only"><?php echo $this->lang->line('previous'); ?></span></button><div class="flex items-center space-x-1 [&>.active]:bg-gray-100 dark:[&>.active]:bg-gray-700" data-hs-datatable-paging-pages=""></div><button type="button" class="p-2.5 min-w-10 h-10 inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700" data-hs-datatable-paging-next=""><span class="sr-only"><?php echo $this->lang->line('next'); ?></span><span aria-hidden="true">»</span></button></nav>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        <?php endif; ?>
        <?php // End Conditional Section 2 ?>


        <?php // Modals (Place all modals at the end or outside the conditional blocks for clarity) ?>
        <!-- Modal for Edit Loan Fee Category -->
        <?php if (!empty($fee_category)): foreach ($fee_category as $fc_item): ?>
        <div id="hs-edit-feecategory-modal-<?php echo $fc_item->id; ?>" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
            <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700"><h3 class="font-bold text-gray-800 dark:text-white"><?php echo $this->lang->line('edit_loan_fee_category'); ?></h3><button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" data-hs-overlay="#hs-edit-feecategory-modal-<?php echo $fc_item->id; ?>"><span class="sr-only"><?php echo $this->lang->line('close'); ?></span><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg></button></div>
                    <div class="p-4 overflow-y-auto">
                        <?php echo form_open("admin/modify_loanfee_category/{$fc_item->id}"); ?>
                            <label for="modal_fee_category_<?php echo $fc_item->id; ?>" class="block text-sm font-medium mb-2 dark:text-gray-300"><?php echo $this->lang->line('loan_fee_category_label'); ?>*:</label>
                            <select id="modal_fee_category_<?php echo $fc_item->id; ?>" name="fee_category" required class="py-2.5 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
                                data-hs-select='{ "placeholder": "---Select Loan fee Category---", /* ... other hs-select options ... */ }'>
                                <option value="LOAN PRODUCT" <?php echo ($fc_item->fee_category == 'LOAN PRODUCT') ? 'selected' : ''; ?>><?php echo $this->lang->line('loan_fee_by_loan_product'); ?></option>
                                <option value="GENERAL" <?php echo ($fc_item->fee_category == 'GENERAL') ? 'selected' : ''; ?>><?php echo $this->lang->line('loan_fee_by_general'); ?></option>
                            </select>
                            <div class="mt-6 flex justify-end gap-x-2"><button type="button" class="py-2 px-3 btn-secondary-sm" data-hs-overlay="#hs-edit-feecategory-modal-<?php echo $fc_item->id; ?>"><?php echo $this->lang->line('close'); ?></button><button type="submit" class="py-2 px-3 btn-primary-sm bg-cyan-600 hover:bg-cyan-700 text-white"><?php echo $this->lang->line('update'); ?></button></div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; endif; ?>

        <!-- Modal for Edit Loan Product Fee -->
        <?php if (isset($loan_category) && !empty($loan_category)): foreach ($loan_category as $lc_item): ?>
        <div id="hs-edit-loanproductfee-modal-<?php echo $lc_item->category_id; ?>" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
            <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all lg:max-w-2xl lg:w-full m-3 lg:mx-auto"> <?php // Wider modal ?>
                <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700"><h3 class="font-bold text-gray-800 dark:text-white"><?php echo $this->lang->line('edit_fee_for'); ?>: <?php echo htmlspecialchars($lc_item->loan_name); ?></h3><button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" data-hs-overlay="#hs-edit-loanproductfee-modal-<?php echo $lc_item->category_id; ?>"><span class="sr-only"><?php echo $this->lang->line('close'); ?></span><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg></button></div>
                    <div class="p-4 overflow-y-auto">
                        <?php echo form_open("admin/update_loanCategory_loanfee/{$lc_item->category_id}"); ?>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div><label class="block text-sm dark:text-gray-300"><?php echo $this->lang->line('loan_category_name'); ?>:</label><input type="text" name="loan_name" value="<?php echo htmlspecialchars($lc_item->loan_name); ?>" class="py-2.5 px-4 input-text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"></div>
                                <div><label class="block text-sm dark:text-gray-300"><?php echo $this->lang->line('from_min_amount'); ?>:</label><input type="number" name="loan_price" value="<?php echo htmlspecialchars($lc_item->loan_price); ?>" class="py-2.5 px-4 input-text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"></div>
                                <div><label class="block text-sm dark:text-gray-300"><?php echo $this->lang->line('to_max_amount'); ?>:</label><input type="number" name="loan_perday" value="<?php echo htmlspecialchars($lc_item->loan_perday); ?>" class="py-2.5 px-4 input-text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"></div>
                                <div><label class="block text-sm dark:text-gray-300"><?php echo $this->lang->line('loan_interest_percent'); ?>:</label><input type="number" step="0.01" name="interest_formular" value="<?php echo htmlspecialchars($lc_item->interest_formular); ?>" class="py-2.5 px-4 input-text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"></div>
                                <div>
                                    <label class="block text-sm dark:text-gray-300">*<?php echo $this->lang->line('loan_fee_type'); ?>:</label>
                                    <select name="fee_category_type" class="py-2.5 px-4 pe-9 input-text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" data-hs-select='{/* Preline Select options */}'>
                                        <option value="MONEY" <?php echo ($lc_item->fee_category_type == 'MONEY') ? 'selected' : ''; ?>><?php echo $this->lang->line('money_value'); ?></option>
                                        <option value="PERCENTAGE" <?php echo ($lc_item->fee_category_type == 'PERCENTAGE') ? 'selected' : ''; ?>><?php echo $this->lang->line('percentage_value'); ?></option>
                                    </select>
                                </div>
                                <div><label class="block text-sm dark:text-gray-300">*<?php echo $this->lang->line('fee_value'); ?>:</label><input type="number" step="0.01" name="fee_value" value="<?php echo htmlspecialchars($lc_item->fee_value ?? ''); ?>" class="py-2.5 px-4 input-text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"></div>
                            </div>
                            <div class="mt-6 flex justify-end gap-x-2"><button type="button" class="py-2 px-3 btn-secondary-sm" data-hs-overlay="#hs-edit-loanproductfee-modal-<?php echo $lc_item->category_id; ?>"><?php echo $this->lang->line('close'); ?></button><button type="submit" class="py-2 px-3 btn-primary-sm bg-cyan-600 hover:bg-cyan-700 text-white"><?php echo $this->lang->line('update_fee'); ?></button></div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; endif; ?>

        <!-- Modal for Edit General Loan Fee Type -->
        <?php if(isset($fee_data) && !empty($fee_data)): foreach ($fee_data as $ft_item): ?>
        <div id="hs-edit-feetype-modal-<?php echo $ft_item->id; ?>" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
            <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                 <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700"><h3 class="font-bold text-gray-800 dark:text-white"><?php echo $this->lang->line('edit_general_loan_fee_type'); ?></h3><button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" data-hs-overlay="#hs-edit-feetype-modal-<?php echo $ft_item->id; ?>"><span class="sr-only"><?php echo $this->lang->line('close'); ?></span><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg></button></div>
                    <div class="p-4 overflow-y-auto">
                        <?php echo form_open("admin/modify_loanfee_type/{$ft_item->id}"); ?>
                            <label class="block text-sm font-medium mb-2 dark:text-gray-300">*<?php echo $this->lang->line('loan_fee_type'); ?>:</label>
                            <select name="type" required class="py-2.5 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
                                data-hs-select='{ "placeholder": "---Select Loan fee Type---", /* ... */ }'>
                                <option value="MONEY VALUE" <?php echo ($ft_item->type == 'MONEY VALUE') ? 'selected' : ''; ?>><?php echo $this->lang->line('money_value'); ?></option>
                                <option value="PERCENTAGE VALUE" <?php echo ($ft_item->type == 'PERCENTAGE VALUE') ? 'selected' : ''; ?>><?php echo $this->lang->line('percentage_value'); ?></option>
                            </select>
                            <div class="mt-6 flex justify-end gap-x-2"><button type="button" class="py-2 px-3 btn-secondary-sm" data-hs-overlay="#hs-edit-feetype-modal-<?php echo $ft_item->id; ?>"><?php echo $this->lang->line('close'); ?></button><button type="submit" class="py-2 px-3 btn-primary-sm bg-cyan-600 hover:bg-cyan-700 text-white"><?php echo $this->lang->line('update_type'); ?></button></div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; endif; ?>

        <!-- Modal for Edit General Loan Fee -->
        <?php if (isset($loan_fee) && !empty($loan_fee)): foreach ($loan_fee as $lf_item): ?>
         <div id="hs-edit-generalfee-modal-<?php echo $lf_item->fee_id; ?>" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
            <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700"><h3 class="font-bold text-gray-800 dark:text-white"><?php echo $this->lang->line('edit_loan_fee'); ?></h3><button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" data-hs-overlay="#hs-edit-generalfee-modal-<?php echo $lf_item->fee_id; ?>"><span class="sr-only"><?php echo $this->lang->line('close'); ?></span><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg></button></div>
                    <div class="p-4 overflow-y-auto">
                        <?php echo form_open("admin/modify_loan_fee/{$lf_item->fee_id}"); ?>
                            <div class="space-y-4">
                                <div><label class="block text-sm dark:text-gray-300">*<?php echo $this->lang->line('description'); ?>:</label><input type="text" name="description" value="<?php echo htmlspecialchars($lf_item->description); ?>" class="py-2.5 px-4 input-text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required></div>
                                <div>
                                    <label class="block text-sm dark:text-gray-300">*<?php echo $this->lang->line('loan_fee'); ?> <?php if (isset($fee_type) && $fee_type->type == 'MONEY VALUE') echo $this->lang->line('in_currency_tsh'); elseif (isset($fee_type) && $fee_type->type == 'PERCENTAGE VALUE') echo $this->lang->line('in_percentage'); ?>:</label>
                                    <input type="number" <?php if (isset($fee_type) && $fee_type->type == 'PERCENTAGE VALUE') echo 'step="0.01"'; ?> name="fee_interest" value="<?php echo htmlspecialchars($lf_item->fee_interest); ?>" class="py-2.5 px-4 input-text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required>
                                </div>
                            </div>
                            <div class="mt-6 flex justify-end gap-x-2"><button type="button" class="py-2 px-3 btn-secondary-sm" data-hs-overlay="#hs-edit-generalfee-modal-<?php echo $lf_item->fee_id; ?>"><?php echo $this->lang->line('close'); ?></button><button type="submit" class="py-2 px-3 btn-primary-sm bg-cyan-600 hover:bg-cyan-700 text-white"><?php echo $this->lang->line('update_fee'); ?></button></div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; endif; ?>
        <!-- End Modals -->


    </div>
</div>
<!-- ========== END MAIN CONTENT BODY ========== -->

<?php
include_once APPPATH . "views/partials/footer.php";
?>

<?php // Script for cmd+a fix and Preline Select initialization (if needed) ?>
<script>
window.addEventListener('load', () => {
  setTimeout(() => {
    // Cmd+A fix for DataTables search inputs
    const searchInputs = document.querySelectorAll('input[data-hs-datatable-search]');
    searchInputs.forEach((input) => {
      input.addEventListener('keydown', function (evt) {
        if ((evt.metaKey || evt.ctrlKey) && (evt.key === 'a' || evt.key === 'A')) {
          this.select();
        }
      });
    });

    // Preline components are usually auto-initialized by preline.js
    // If you find selects not working, you might need:
    // HSStaticMethods.autoInit(['select']); // Or specific IDs
  }, 500);
});
</script>