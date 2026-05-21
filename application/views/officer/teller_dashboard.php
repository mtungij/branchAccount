<?php
include_once APPPATH . "views/partials/officerheader.php";

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
        <!-- <div class="mb-6">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-200">
               Tafuta mteja kwa ajili kumlipisha/Kugawa
            </h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                kumbuka kama atakuwa hajamaliza mkopo system itakataa kumuombea mkopo.
            </p>
        </div> -->
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

        <!-- Card: Register Share Holder Form -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 md:p-6">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-6">
                   Search Customer
                </h3>
                <?php echo form_open("oficer/search_customerData", ['novalidate' => true, 'id' => 'tellerCustomerSearchForm']); ?>
                   
                    
                        <!-- Branch Select2 Dropdown -->
						<div class="col-span-12">
    <label for="branchSelect" class="block text-sm font-medium mb-2 dark:text-gray-300">* Search Customer:</label>
    <select id="branchSelect" required name="customer_id"
        class="py-3 px-4 pe-9 block w-full bg-cyan-600 border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:placeholder-gray-500 dark:focus:ring-gray-600 select2">
        <option value="">Select customer</option>
		<?php foreach ($customer as $customers): ?>
        <option value="<?= $customers->customer_id ?>" data-work-status="<?= htmlspecialchars((string) ($customers->work_status ?? ''), ENT_QUOTES, 'UTF-8'); ?>">
        <?= strtoupper($customers->f_name . " " . $customers->m_name . " " . $customers->l_name); ?> /
        <?= strtoupper($customers->customer_code); ?> /
        <?= strtoupper($customers->blanch_name); ?>
    </option>
<?php endforeach; ?>


    </select>
</div>


<input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">


                    
                    <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex justify-center gap-x-2">

                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<!-- ========== END MAIN CONTENT BODY ========== -->

<div id="workStatusPromptModal" class="hidden fixed inset-0 z-50 bg-black/50 p-4 sm:p-6">
    <div class="max-w-md mx-auto mt-16 bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-5">
        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">Weka Hali ya Ajira</h3>
        <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
            Mteja huyu hana taarifa ya hali ya ajira. Tafadhali chagua moja kabla ya kuendelea.
        </p>
        <p class="text-sm text-gray-700 dark:text-gray-200 mb-4">
            <span class="font-semibold">Mteja:</span>
            <span id="modal_customer_name" class="uppercase"></span>
        </p>

        <form id="workStatusPromptForm" method="post" action="<?php echo base_url('oficer/search_customerData'); ?>">
            <input type="hidden" name="customer_id" id="modal_customer_id" value="">
            <input type="hidden" name="comp_id" value="<?php echo htmlspecialchars($_SESSION['comp_id'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">

            <label for="modal_work_status" class="block text-sm font-medium mb-2 dark:text-gray-300">Hali ya Ajira</label>
            <select id="modal_work_status" name="work_status" required class="py-2.5 px-3 block w-full border-gray-200 rounded-lg text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                <option value="">Chagua</option>
                <option value="Mjasiriamali">Mjasiriamali</option>
                <option value="Mwajiriwa">Mtumishi</option>
            </select>

            <div class="mt-5 flex gap-2 justify-end">
                <button type="button" id="cancelWorkStatusPrompt" class="py-2 px-4 rounded-lg border border-gray-300 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-700">Cancel</button>
                <button type="submit" class="py-2 px-4 rounded-lg bg-cyan-700 text-white text-sm hover:bg-cyan-800">Continue</button>
            </div>
        </form>
    </div>
</div>

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

    $('#branchSelect').select2({...selectConfig, placeholder: "Select Customer"});
    

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
function getAge(dob) {
    const age = new Date().getFullYear() - new Date(dob).getFullYear();
    document.getElementById('age').value = isNaN(age) ? '' : age;
}
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

    const $branchSelect = $('#branchSelect').select2({...selectConfig, placeholder: "Select Customer"});
    const $searchForm = $('#tellerCustomerSearchForm');
    const modal = document.getElementById('workStatusPromptModal');
    const modalCustomerInput = document.getElementById('modal_customer_id');
    const modalWorkStatus = document.getElementById('modal_work_status');
    const modalCustomerName = document.getElementById('modal_customer_name');
    const cancelBtn = document.getElementById('cancelWorkStatusPrompt');

    function openWorkStatusModal(customerId, customerName) {
        if (!modal || !modalCustomerInput || !modalWorkStatus) {
            return;
        }
        modalCustomerInput.value = customerId;
        modalWorkStatus.value = '';
        if (modalCustomerName) {
            modalCustomerName.textContent = customerName || '-';
        }
        modal.classList.remove('hidden');
    }

    function closeWorkStatusModal() {
        if (!modal) {
            return;
        }
        modal.classList.add('hidden');
        if (modalCustomerName) {
            modalCustomerName.textContent = '';
        }
    }

    if (cancelBtn) {
        cancelBtn.addEventListener('click', function () {
            closeWorkStatusModal();
            $branchSelect.val('').trigger('change.select2');
        });
    }

    // Auto-submit on change, but require work_status for customers that still have null/empty status.
    $branchSelect.on('change', function () {
        const selectedOption = this.options[this.selectedIndex];
        const customerId = this.value;
        const customerName = selectedOption ? selectedOption.text.split('/')[0].trim() : '';
        const workStatus = (selectedOption && selectedOption.getAttribute('data-work-status'))
            ? selectedOption.getAttribute('data-work-status').trim()
            : '';

        if (!customerId) {
            return;
        }

        if (!workStatus) {
            openWorkStatusModal(customerId, customerName);
            return;
        }

        $searchForm.submit();
    });

    // Your existing code for AJAX loading employees, etc.
});

</script>






