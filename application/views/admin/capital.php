<?php
// application/views/admin/capital_view.php

include_once APPPATH . "views/partials/header.php";

// --- DUMMY DATA - REMOVE AND LOAD FROM YOUR CONTROLLER ---

?>

<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-6">

        <!-- Page Title / Subheader -->
        <div class="mb-6">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-200">
                <?php echo $this->lang->line('manage_capital'); ?>
            </h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                <?php echo $this->lang->line('capital_desc'); ?>
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

        <!-- Card: Add Capital Form -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 md:p-6">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-6">
                    <?php echo $this->lang->line('add_capital'); ?>
                </h3>
                <?php echo form_open("admin/create_capital", ['novalidate' => true]); ?>
                    <div class="grid sm:grid-cols-12 gap-4 sm:gap-6">
                        <div class="sm:col-span-4">
                            <label for="add_share_id" class="label-sm-dt">* <?php echo $this->lang->line('share_holder_name'); ?>:</label>
                            <select id="add_share_id" name="share_id" required class="input-select-preline">
                                <option value=""><?php echo $this->lang->line('select_share_holder'); ?></option>
                                <?php if (isset($share) && is_array($share)): foreach ($share as $sh_item): ?>
                                <option value="<?php echo htmlspecialchars($sh_item->share_id, ENT_QUOTES, 'UTF-8'); ?>" <?php echo set_select('share_id', $sh_item->share_id); ?>>
                                    <?php echo htmlspecialchars($sh_item->share_name, ENT_QUOTES, 'UTF-8'); ?>
                                </option>
                                <?php endforeach; endif; ?>
                            </select>
                            <?php echo form_error("share_id", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="add_amount" class="label-sm-dt"><?php echo $this->lang->line('amount'); ?></label>
                            <input type="text" id="add_amount" name="amount" placeholder="<?php echo $this->lang->line('amount_placeholder'); ?>" autocomplete="off" required
                                   class="input-text-preline" value="<?php echo set_value('amount'); ?>">
                            <?php echo form_error("amount", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>
                        
                        <div class="sm:col-span-4">
                            <label for="add_pay_method" class="label-sm-dt">* <?php echo $this->lang->line('pay_method'); ?>:</label>
                            <select id="add_pay_method" name="pay_method" required class="uppercase input-select-preline">
                                <option value=""><?php echo $this->lang->line('select_pay_method'); ?></option>
                                <?php if (isset($account) && is_array($account)): foreach ($account as $acc_item): ?>
                                <option value="<?php echo htmlspecialchars($acc_item->trans_id, ENT_QUOTES, 'UTF-8'); ?>" <?php echo set_select('pay_method', $acc_item->trans_id); ?>>
                                    <?php echo htmlspecialchars($acc_item->account_name, ENT_QUOTES, 'UTF-8'); ?>
                                </option>
                                <?php endforeach; endif; ?>
                            </select>
                            <?php echo form_error("pay_method", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>

                        <div class="sm:col-span-6">
                            <label for="add_recept" class="label-sm-dt"><?php echo $this->lang->line('receipt_no'); ?> (<?php echo $this->lang->line('optional'); ?>):</label>
                            <input type="number" id="add_recept" name="recept" placeholder="<?php echo $this->lang->line('receipt_no_placeholder'); ?>" autocomplete="off"
                                   class="input-text-preline" value="<?php echo set_value('recept'); ?>">
                            <?php echo form_error("recept", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="add_chaque_no" class="label-sm-dt"><?php echo $this->lang->line('cheque_number'); ?> (<?php echo $this->lang->line('optional'); ?>):</label>
                            <input type="number" id="add_chaque_no" name="chaque_no" placeholder="<?php echo $this->lang->line('cheque_number_placeholder'); ?>" autocomplete="off"
                                   class="input-text-preline" value="<?php echo set_value('chaque_no'); ?>">
                            <?php echo form_error("chaque_no", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>
                    </div>
                    <input type="hidden" name="comp_id" value="<?php echo htmlspecialchars($_SESSION['comp_id'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                    <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex justify-center gap-x-2">
                            <button type="submit" class="btn-primary-sm bg-cyan-600 hover:bg-cyan-700 text-white"><?php echo $this->lang->line('save'); ?></button>
                            <button type="reset" class="btn-secondary-sm"><?php echo $this->lang->line('cancel'); ?></button>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
        <!-- End Card: Add Capital Form -->

        <!-- Capital List Table and other code remain unchanged (omitted here for brevity) -->
        <!-- ... (your existing table code) ... -->

<?php
include_once APPPATH . "views/partials/footer.php";
?>

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
  }, 500);
});

function formatNumberWithCommas(value) {
    const numeric = value.replace(/[^0-9]/g, '');
    return numeric.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

document.addEventListener('DOMContentLoaded', function () {
    const loanPrice = document.getElementById('add_amount');

    loanPrice.addEventListener('input', function (e) {
        const caretPos = this.selectionStart;
        const rawValue = this.value.replace(/,/g, '');
        this.value = formatNumberWithCommas(rawValue);
        this.setSelectionRange(caretPos, caretPos);
    });

    // Unformat before submitting
    document.querySelector('form').addEventListener('submit', function () {
        loanPrice.value = loanPrice.value.replace(/,/g, '');
    });
});
</script>
