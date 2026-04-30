<?php
include_once APPPATH . "views/partials/header.php";

// --- DUMMY DATA ---
// Your controller should pass $data, which is an array of objects representing currently saved formulars.
// Each object should at least have 'id' and 'formular_name'.
// if (!isset($data)) {
//     $data = [
//         // (object)['id' => 1, 'formular_name' => 'SIMPLE'],
//         (object)['id' => 2, 'formular_name' => 'FLAT RATE'],
//     ];
// }

// // Helper to check if a formula is already selected/saved
function is_formular_selected($formular_name, $saved_formulars) {
    if (empty($saved_formulars) || !is_array($saved_formulars)) {
        return false;
    }
    foreach ($saved_formulars as $item) {
        if (isset($item->formular_name) && $item->formular_name == $formular_name) {
            return true;
        }
    }
    return false;
}
// --- END DUMMY DATA ---
?>

<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-6">

        <!-- Page Title / Subheader -->
        <div class="mb-6">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-200">
                Interest Formular Setting
            </h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                Select the interest calculation formulas to be used in the system.
            </p>
        </div>
        <!-- End Page Title / Subheader -->

        <?php // Flash Messages ?>
        <?php if ($das = $this->session->flashdata('massage')): ?>
        <div class="bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert">
            <div class="flex">
                <div class="flex-shrink-0"><span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-teal-100 bg-teal-200 text-teal-800 dark:border-teal-900 dark:bg-teal-800 dark:text-teal-500"><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="m9 12 2 2 4-4"></path></svg></span></div>
                <div class="ms-3"><h3 class="text-gray-800 font-semibold dark:text-white">Success</h3><p class="mt-2 text-sm text-gray-700 dark:text-gray-400"><?php echo $das;?></p></div>
                <div class="ps-3 ms-auto"><div class="-mx-1.5 -my-1.5"><button type="button" class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-teal-50 focus:ring-teal-600 dark:bg-transparent dark:hover:bg-teal-800/50 dark:text-teal-600" data-hs-remove-element="[role=alert]"><span class="sr-only">Dismiss</span><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg></button></div></div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Card: Interest Formular Settings -->
        <div class="bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <?php echo form_open("admin/create_interest_formular", ['novalidate' => true]); ?>
                <div class="p-4 md:p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-1">
                        Available Formulas
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">Select the formulas you want to enable. Unchecking and saving will remove them.</p>

                    <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php
                        $available_formulas = [
                            'SIMPLE' => 'SIMPLE FORMULAR',
                            'FLAT RATE' => 'FLAT RATE FORMULAR',
                            'REDUCING' => 'REDUCING FORMULAR'
                        ];
                        ?>
                        <?php foreach ($available_formulas as $value => $label): ?>
                        <div class="flex items-center p-4 border border-gray-200 rounded-lg dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                            <input id="formular_<?php echo str_replace(' ', '_', strtolower($value)); ?>" name="formular_name[]" type="checkbox" value="<?php echo $value; ?>"
                                   class="shrink-0 mt-0.5 border-gray-200 rounded text-cyan-600 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-cyan-500 dark:checked:border-cyan-500 dark:focus:ring-offset-gray-800"
                                   <?php echo is_formular_selected($value, $data) ? 'checked' : ''; ?>>
                            <label for="formular_<?php echo str_replace(' ', '_', strtolower($value)); ?>" class="text-sm text-gray-700 ms-3 dark:text-gray-300"><?php echo $label; ?></label>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <input type="hidden" name="comp_id" value="<?php echo htmlspecialchars($_SESSION['comp_id'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                </div>

                <div class="px-4 md:px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                    <div class="flex justify-end"> <?php // Changed to justify-end for a more standard form layout ?>
                        <button type="submit" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-cyan-600 text-white hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                            Save Settings
                        </button>
                    </div>
                </div>
            <?php echo form_close(); ?>


            <?php // Display Currently Active/Selected Formulas (Optional - The checkboxes now show this) ?>
            <?php if (isset($data) && !empty($data)): ?>
            <div class="p-4 md:p-6 border-t border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">
                    Currently Active Formulas
                </h3>
                <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <?php foreach ($data as $item): ?>
                    <div class="flex items-center justify-between p-3 bg-gray-50 border border-gray-200 rounded-lg dark:bg-gray-700/50 dark:border-gray-600">
                        <span class="text-sm text-gray-800 dark:text-gray-200">
                            <?php
                            if ($item->formular_name == 'SIMPLE') echo 'SIMPLE FORMULAR';
                            elseif ($item->formular_name == 'FLAT RATE') echo 'FLAT RATE FORMULAR';
                            elseif ($item->formular_name == 'REDUCING') echo 'REDUCING FORMULAR';
                            else echo htmlspecialchars($item->formular_name, ENT_QUOTES, 'UTF-8');
                            ?>
                        </span>
                        <a href="<?php echo base_url("admin/delete_formular/{$item->id}"); ?>"
                           class="text-xs text-red-600 hover:text-red-800 dark:text-red-500 dark:hover:text-red-400"
                           onclick="return confirm('Are you sure you want to remove this formular?');">
                           Remove
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

        </div>
        <!-- End Card: Interest Formular Settings -->

    </div>
</div>
<!-- ========== END MAIN CONTENT BODY ========== -->

<?php
include_once APPPATH . "views/partials/footer.php";
?>