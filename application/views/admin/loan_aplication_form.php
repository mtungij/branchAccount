 
<?php
include_once APPPATH . "views/partials/header.php";

// --- DUMMY DATA - REMOVE AND LOAD FROM YOUR CONTROLLER ---
// Controller should pass $share, an array of shareholder objects.
// Each object should have 'share_id', 'share_name', 'share_mobile', 'share_email', 'share_sex', 'share_dob'.
// if (!isset($share)) {
//     $share = [
//         (object)['share_id' => 1, 'share_name' => 'Alice Wonderland', 'share_mobile' => '0712345001', 'share_email' => 'alice@example.com', 'share_sex' => 'female', 'share_dob' => '1985-06-15'],
//         (object)['share_id' => 2, 'share_name' => 'Bob The Builder', 'share_mobile' => '0712345002', 'share_email' => 'bob@example.com', 'share_sex' => 'male', 'share_dob' => '1978-11-02'],
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
               <?php echo $this->lang->line('loan_application_form'); ?>
            </h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                <?php echo $this->lang->line('loan_application_form_desc'); ?>
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
            <!-- FALSE -->
      
        <!-- Card: Register Share Holder Form -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 md:p-6">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-6">
                    <?php echo $this->lang->line('loan_application_form'); ?>
                </h3>
                <?php if (isset($customer)): ?>
    <?php echo form_open("admin/create_loanapplication/{$customer->customer_id}", ['novalidate' => true]); ?>
<?php endif; ?>

               

<div class="grid sm:grid-cols-12 gap-4 sm:gap-6">

    <!-- Loan Product -->
    <div class="sm:col-span-4">
        <label for="branchSelect" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('loan_product_name'); ?>:</label>
        <select id="branchSelect" name="category_id" class="py-3 px-4 pe-9 block w-full bg-cyan-600 border-gray-200 rounded-lg text-sm select2">
            <option value=""><?php echo $this->lang->line('select_loan_product'); ?></option>
            <?php foreach ($loan_category as $loan_categorys): ?>
                <option value="<?php echo $loan_categorys->category_id; ?>" <?php echo set_select('category_id', $loan_categorys->category_id); ?>>
                    <?php echo $loan_categorys->loan_name; ?> / <?php echo $loan_categorys->loan_price; ?> - <?php echo $loan_categorys->loan_perday; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?php echo form_error("category_id", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
    </div>

    <!-- Group Name -->
    <!-- <div class="sm:col-span-4">
        <label for="employeeSelect" class="block text-sm font-medium mb-2 dark:text-gray-300">* Select Group Name:</label>
        <select id="employeeSelect" name="group_id" class="py-3 px-4 pe-9 block w-full bg-cyan-600 border-gray-200 rounded-lg text-sm select2">
            <option value="">Select Group Name</option>
            </?php foreach ($group as $groups): ?>
                <option value="</?php echo $groups->group_id; ?>" </?php echo set_select('group_id', $groups->group_id); ?>>
                    </?php echo $groups->group_name; ?>
                </option>
            </?php endforeach; ?>
        </select>
        </?php echo form_error("group_id", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
    </div> -->

    <!-- Employee -->
    <div class="sm:col-span-4">
        <label for="StaffSelect" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('select_employee'); ?>:</label>
        <select id="StaffSelect" name="empl_id" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm">
            <option value=""><?php echo $this->lang->line('select_staff_name'); ?></option>
            <?php foreach ($mpl_data_blanch as $mpl_data_blanchs): ?>
                <option value="<?php echo $mpl_data_blanchs->empl_id; ?>" <?php echo set_select('empl_id', $mpl_data_blanchs->empl_id); ?>>
                    <?php echo $mpl_data_blanchs->empl_name; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?php echo form_error("empl_id", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
    </div>

    <!-- Hidden Inputs -->
    <input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">
    <input type="hidden" name="customer_id" value="<?php echo isset($customer) && is_object($customer) ? $customer->customer_id : ''; ?>">

    <input type="hidden" name="blanch_id" value="<?php echo isset($customer) && is_object($customer) ? $customer->blanch_id : ''; ?>">

    <input type="hidden" name="fee_status" value="YES">

    <!-- Loan Amount -->
    <div class="sm:col-span-4">
        <label for="how_loan" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('loan_amount'); ?>:</label>
        <input type="number" id="how_loan" name="how_loan" placeholder="<?php echo $this->lang->line('loan_amount_placeholder'); ?>" value="<?php echo set_value('how_loan'); ?>" autocomplete="off" required class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
        <?php echo form_error("how_loan", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
    </div>

    <!-- Loan Duration -->
    <div class="sm:col-span-4">
        <label for="durationselect" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('loan_duration'); ?>:</label>
        <select id="durationselect" name="day" class="py-3 px-4 pe-9 block w-full bg-cyan-600 border-gray-200 rounded-lg text-sm select2">
            <option value=""><?php echo $this->lang->line('loan_duration'); ?></option>
            <option value="1" <?php echo set_select('day', '1'); ?>><?php echo $this->lang->line('day_option'); ?></option>
            <option value="7" <?php echo set_select('day', '7'); ?>><?php echo $this->lang->line('week_option'); ?></option>
            <option value="30" <?php echo set_select('day', '30'); ?>><?php echo $this->lang->line('month_option'); ?></option>
        </select>
        <?php echo form_error("day", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
    </div>

    <div class="sm:col-span-4">
        <label for="session" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('number_of_repayments'); ?>:</label>
        <input type="number" id="session" name="session" placeholder="<?php echo $this->lang->line('repayment_placeholder'); ?>" value="<?php echo set_value('session'); ?>" autocomplete="off" required class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
        <?php echo form_error("session", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
    </div>

    <div class="sm:col-span-4">
        <label for="reason" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('borrower_business'); ?>:</label>
        <input type="text" id="reason" name="reason" placeholder="<?php echo $this->lang->line('borrower_business_placeholder'); ?>" value="<?php echo set_value('reason'); ?>" autocomplete="off" required class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
        <?php echo form_error("reason", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
    </div>

    <!-- Interest Formular -->
    <div class="sm:col-span-4">
        <label for="rateSelect" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('select_interest_formula'); ?>:</label>
        <select id="rateSelect" name="rate" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
            <option value=""><?php echo $this->lang->line('select_interest_formula'); ?></option>
            <?php foreach ($formular as $formulars): ?>
                <option value="<?php echo $formulars->formular_name; ?>" <?php echo set_select('rate', $formulars->formular_name); ?>>
                    <?php 
                        if ($formulars->formular_name == 'SIMPLE') echo $this->lang->line('simple_formula');
                        elseif ($formulars->formular_name == 'FLAT RATE') echo $this->lang->line('flat_rate_formula');
                        elseif ($formulars->formular_name == 'REDUCING') echo $this->lang->line('reducing_formula');
                    ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?php echo form_error("rate", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
    </div>

</div>

<div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
    <div class="flex justify-center gap-x-2">
        <button type="submit" class="py-2 px-4 btn-primary-sm bg-cyan-800 hover:bg-cyan-700 text-white"><?php echo $this->lang->line('next'); ?></button>
    </div>
</div>
<?php echo form_close(); ?>

            </div>
        </div>
    </div>
</div>
<!-- ========== END MAIN CONTENT BODY ========== -->

<?php
include_once APPPATH . "views/partials/footer.php";
?>

<?php // Script for cmd+a fix for DataTables search input (if used) ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Include Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<style>
.select2-container--default .select2-selection--single {
    background-color: #1f2937;
    border: 1px solid #374151;
    border-radius: 0.5rem;
    padding: 0.75rem 2.5rem 0.75rem 1rem;
    height: auto;
    color: #06b6d4; 
    font-size: 0.875rem;
    position: relative;
}
.select2-selection__rendered,
.select2-selection__clear,
.select2-selection__arrow {
    color: #d1d5db;
}
.select2-selection__arrow {
    right: 1rem;
    top: 0;
    width: 1.5rem;
    position: absolute;
}
.select2-selection__clear {
    right: 2.5rem;
    top: 50%;
    transform: translateY(-50%);
    position: absolute;
}
.custom-select2-dropdown {
    background-color: #1f2937;
    color: #d1d5db;
    border: 1px solid #374151;
    border-radius: 0.5rem;
    padding: 0.5rem;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #ffffff !important; /* Force white text */
}
.custom-select2-dropdown .select2-results__option--highlighted {
    background-color: #06b6d4 !important; /* Tailwind cyan-400 */
    color: #ffffff !important;
}

/* White text in the dropdown input if searchable */
.select2-search__field {
    color: #ffffff !important;
    background-color: #1f2937 !important; /* match dark bg */
    border: 1px solid #374151;
}
.custom-select2-dropdown .select2-results__option--highlighted {
    background-color: #06b6d4;
    color: #ffffff;
}
.custom-select2-container { margin: 0; }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        HSStaticMethods.autoInit(); // This is required to initialize all hs-select dropdowns
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

<script>
$(document).ready(function () {
    const selectConfig = {
        placeholder: "Select",
        allowClear: true,
        width: '100%',
        dropdownCssClass: 'custom-select2-dropdown',
        containerCssClass: 'custom-select2-container'
    };
	
    $('#branchSelect').select2({...selectConfig, placeholder: "Select Product Name"});
    $('#employeeSelect').select2({...selectConfig, placeholder: "Select Group Name"});
	$('#StaffSelect').select2({...selectConfig, placeholder: "Select Select Name"});
    rateSelect = $('#rateSelect').select2({...selectConfig, placeholder: "Select Interest Formular"});

	$('#durationselect').select2({...selectConfig, placeholder: "Chagua Aina Ya marejesho"});
    $('#branchSelect').on('change', function () {
        const branchId = $(this).val();

        $.post('fetch_employee_blanch', { blanch_id: branchId }, function (data) {
            const employeeSelect = $('#employeeSelect');
            employeeSelect.html(data).select2({...selectConfig, placeholder: "Select Employee"});

            // If using Preline's hsSelect
            const customSelect = $('[data-hs-select]');
            if (customSelect.length) {
                customSelect.html(data);
                customSelect.hsSelect();
            }
        }).fail(function (xhr, status, error) {
            console.error('AJAX error:', status, error);
        });
    });
});

// Age Calculation

</script>






