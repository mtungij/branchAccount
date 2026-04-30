<?php
include_once APPPATH . "views/partials/header.php";

// --- DUMMY DATA---
// Simulate if a penalty setting exists or not.
// Your controller should set $penart to the penalty object if it exists, or FALSE/null if not.
// if (!isset($penart)) {
//     // Scenario 1: No penalty setting exists
//     // $penart = null;

//     // Scenario 2: A penalty setting exists
//      $penart = (object)[
//          'penalt_id' => 1,
//          'action_penart' => 'PERCENTAGE VALUE', // 'PERCENTAGE VALUE' or 'MONEY VALUE'
//          'penart' => 1.5, // The actual penalty value
//          'comp_id' => $_SESSION['comp_id'] ?? 1
//      ];
// }
// --- END DUMMY DATA ---
?>

<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-6">

        <!-- Page Title / Subheader -->
        <div class="mb-6">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-200">
                <?php echo $this->lang->line('penalty_setting'); ?>
            </h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                <?php echo $this->lang->line('penalty_setting_desc'); ?>
            </p>
        </div>
        <!-- End Page Title / Subheader -->

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

        <!-- Card: Penalty Setting Form -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 md:p-6">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-6">
                    <?php echo ($penart && isset($penart->penalt_id)) ? $this->lang->line('update_penalty_setting') : $this->lang->line('set_penalty'); ?>
                </h3>

                <?php
                $form_action = ($penart && isset($penart->penalt_id)) ? "admin/modify_penart/{$penart->penalt_id}" : "admin/create_penarty";
                echo form_open($form_action, ['novalidate' => true]);
                ?>
                    <div class="grid sm:grid-cols-12 gap-4 sm:gap-6">
                        <div class="sm:col-span-6">
                            <label for="action_penart" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('calculation_type'); ?>:</label>
                            <select id="action_penart" name="action_penart" required
                                    data-hs-select='{
                                        "placeholder": "<?php echo $this->lang->line('select_calculation_type'); ?>",
                                        "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-gray-200\" data-title></span></button>",
                                        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2.5 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:ring-gray-600",
                                        "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-50 w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto dark:bg-gray-800 dark:border-gray-700",
                                        "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:hover:bg-gray-700 dark:text-gray-200 dark:focus:bg-gray-700",
                                        "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-gray-200\" data-title></div></div></div>",
                                        "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-gray-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                      }'>
                                <option value=""><?php echo $this->lang->line('select_calculation_type'); ?></option>
                                <option value="PERCENTAGE VALUE" <?php echo set_select('action_penart', 'PERCENTAGE VALUE', ($penart && $penart->action_penart == 'PERCENTAGE VALUE')); ?>><?php echo $this->lang->line('percentage_value'); ?></option>
                                <option value="MONEY VALUE" <?php echo set_select('action_penart', 'MONEY VALUE', ($penart && $penart->action_penart == 'MONEY VALUE')); ?>><?php echo $this->lang->line('money_value'); ?></option>
                            </select>
                            <?php echo form_error("action_penart", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>

                        <div class="sm:col-span-6">
                            <label for="penart_amount" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('penalty_amount_rate'); ?>:</label>
                            <input type="number" step="0.01" id="penart_amount" name="penart" placeholder="<?php echo $this->lang->line('enter_amount_or_percentage'); ?>" required autocomplete="off"
                                   class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
                                   value="<?php echo set_value('penart', ($penart ? htmlspecialchars($penart->penart, ENT_QUOTES, 'UTF-8') : '')); ?>">
                            <p class="text-xs text-gray-500 mt-1 dark:text-gray-400"><?php echo $this->lang->line('penalty_input_help'); ?></p>
                            <?php echo form_error("penart", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>
                    </div>

                    <input type="hidden" name="comp_id" value="<?php echo htmlspecialchars($_SESSION['comp_id'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">

                    <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex justify-center gap-x-2">
                            <button type="submit" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-cyan-600 text-white hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                                <?php echo ($penart && isset($penart->penalt_id)) ? $this->lang->line('update_setting') : $this->lang->line('save_setting'); ?>
                            </button>
                            <button type="reset" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-600"><?php echo $this->lang->line('cancel'); ?></button>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
        <!-- End Card: Penalty Setting Form -->

        <!-- Card: Current Penalty Setting Display -->
        <div class="mt-6 flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                    <?php echo $this->lang->line('current_penalty_configuration'); ?>
                </h2>
            </div>
            <div class="p-4">
                <?php if ($penart && isset($penart->penalt_id)): ?>
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase dark:text-gray-400"><?php echo $this->lang->line('calculation_type'); ?></th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase dark:text-gray-400"><?php echo $this->lang->line('penalty_value'); ?></th>
                                    <th class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-gray-400"><?php echo $this->lang->line('action'); ?></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo ($penart->action_penart == 'PERCENTAGE VALUE') ? $this->lang->line('percentage_value') : (($penart->action_penart == 'MONEY VALUE') ? $this->lang->line('money_value') : htmlspecialchars($penart->action_penart, ENT_QUOTES, 'UTF-8')); ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        <?php
                                        if ($penart->action_penart == 'MONEY VALUE') {
                                            echo number_format($penart->penart) . ' / ' . $this->lang->line('currency_tsh');
                                        } elseif ($penart->action_penart == 'PERCENTAGE VALUE') {
                                            echo htmlspecialchars($penart->penart, ENT_QUOTES, 'UTF-8') . '%';
                                        } else {
                                            echo htmlspecialchars($penart->penart, ENT_QUOTES, 'UTF-8');
                                        }
                                        ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                        <a href="<?php echo base_url("admin/delete_penart/{$penart->penalt_id}"); ?>" onclick="return confirm('<?php echo $this->lang->line('confirm_delete_penalty_setting'); ?>')" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 dark:text-red-500 dark:hover:text-red-400">
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                                            <?php echo $this->lang->line('delete'); ?>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p class="text-sm text-gray-500 dark:text-gray-400 px-4 py-6 text-center"><?php echo $this->lang->line('no_penalty_setting_configured'); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <!-- End Card: Current Penalty Setting Display -->

    </div>
</div>
<!-- ========== END MAIN CONTENT BODY ========== -->

<?php
include_once APPPATH . "views/partials/footer.php";
?>

<script>
window.addEventListener('load', () => {
  // Preline components are usually auto-initialized.
  // If HSSelect needs manual init for dynamically added content or specific cases:
  // HSStaticMethods.autoInit(['select']);
});
</script>