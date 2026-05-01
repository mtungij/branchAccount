<?php
include_once APPPATH . "views/partials/officerheader.php";
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

        <?php if ($this->session->flashdata('error')): ?>
            <div id="flash-error-toast" class="max-w-xs bg-red-500 text-sm text-red-500 rounded-xl shadow-lg" role="alert" tabindex="-1" aria-labelledby="hs-toast-solid-color-red-label">
                <div id="hs-toast-solid-color-red-label" class="flex p-4">
                    <?= htmlspecialchars($this->session->flashdata('error'), ENT_QUOTES, 'UTF-8'); ?>
                    <div class="ms-auto">
                        <button type="button" onclick="document.getElementById('flash-error-toast').style.display='none'" class="inline-flex shrink-0 justify-center items-center size-5 rounded-lg text-white hover:text-white opacity-50 hover:opacity-100 focus:outline-hidden focus:opacity-100" aria-label="<?php echo $this->lang->line('close'); ?>">
                            <span class="sr-only">Close</span>
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6 6 18"></path>
                                <path d="m6 6 12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('massage')): ?>
            <div class="max-w-xs bg-white border border-gray-200 rounded-xl shadow-lg dark:bg-neutral-800 dark:border-neutral-700" role="alert" tabindex="-1" aria-labelledby="hs-toast-success-example-label">
                <div class="flex p-4">
                    <div class="shrink-0">
                        <svg class="shrink-0 size-4 text-teal-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                        </svg>
                    </div>
                    <div class="ms-3">
                        <p id="hs-toast-success-example-label" class="text-sm text-gray-700 dark:text-neutral-400">
                            <?= $this->session->flashdata('massage'); ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 md:p-6">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-6">
                    <?php echo $this->lang->line('loan_application_form'); ?>
                </h3>

               <?php 
$form_action = isset($existing_loan) 
    ? "oficer/modify_loanapplication/{$customer->customer_id}/{$existing_loan->loan_id}" 
    : "oficer/create_loanapplication/{$customer->customer_id}";

echo form_open($form_action, ['novalidate' => true]); 
?>


                <div class="grid sm:grid-cols-12 gap-4 sm:gap-6">

                    <!-- Loan Product -->
                    <div class="sm:col-span-4">
                        <label for="branchSelect" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('loan_product'); ?>:</label>
                        <select id="branchSelect" name="category_id" class="py-3 px-4 pe-9 block w-full  border-gray-200 rounded-lg text-sm select2">
                            <option value=""><?php echo $this->lang->line('select_loan_product'); ?></option>
                            <?php foreach ($loan_category as $loan_categorys): ?>
                                <option value="<?= $loan_categorys->category_id; ?>"
                                    <?= isset($existing_loan) && $existing_loan->category_id == $loan_categorys->category_id
                                        ? 'selected' 
                                        : set_select('category_id', $loan_categorys->category_id); ?>>
                                    <?= $loan_categorys->loan_name; ?> / <?= $loan_categorys->loan_price; ?> - <?= $loan_categorys->loan_perday; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error("category_id", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                    </div>

                    <!-- Employee -->
                    <div class="sm:col-span-4">
                        <label for="StaffSelect" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('select_officer'); ?>:</label>
                        <input type="text" readonly value="<?php echo htmlspecialchars($empl_data->empl_name ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm bg-gray-100 dark:bg-gray-700 dark:text-white cursor-not-allowed">
                        <input type="hidden" name="empl_id" value="<?php echo htmlspecialchars($empl_data->empl_id ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                    </div>

                    <!-- Hidden Inputs -->
                    <input type="hidden" name="comp_id" value="<?= $_SESSION['comp_id']; ?>">
                    <input type="hidden" name="customer_id" value="<?= isset($customer) && is_object($customer) ? $customer->customer_id : ''; ?>">
                    <input type="hidden" name="blanch_id" value="<?= isset($customer) && is_object($customer) ? $customer->blanch_id : ''; ?>">
                    <input type="hidden" name="fee_status" value="YES">
                    <input type="hidden" name="loan_form_token" value="<?= isset($loan_form_token) ? htmlspecialchars($loan_form_token, ENT_QUOTES, 'UTF-8') : ''; ?>">

                    <!-- Loan Amount -->
                    <div class="sm:col-span-4">
                        <label for="how_loan" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('loan_amount'); ?>:</label>
                      <!-- Visible input with formatting -->
<input
    type="text"
    id="how_loan_formatted"
    placeholder="<?php echo $this->lang->line('loan_amount_placeholder'); ?>"
    autocomplete="off"
    required
    class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
    value="<?= set_value('how_loan', isset($existing_loan) ? number_format($existing_loan->how_loan) : ''); ?>"
>

<!-- Hidden input to submit actual number -->
<input type="hidden" id="how_loan" name="how_loan" value="<?= set_value('how_loan', isset($existing_loan) ? $existing_loan->how_loan : ''); ?>">

                        <?= form_error("how_loan", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                    </div>

                    <!-- Loan Duration -->
                    <div class="sm:col-span-4">
                        <label for="durationselect" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('loan_duration'); ?>:</label>
                        <select id="durationselect" name="day" class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm select2">
                            <option value=""><?php echo $this->lang->line('loan_duration'); ?></option>
                            <option value="1" <?= (isset($existing_loan) && $existing_loan->day == 1) ? 'selected' : set_select('day', '1'); ?>><?php echo $this->lang->line('day'); ?></option>
                            <option value="7" <?= (isset($existing_loan) && $existing_loan->day == 7) ? 'selected' : set_select('day', '7'); ?>><?php echo $this->lang->line('week'); ?></option>
                            <option value="30" <?= (isset($existing_loan) && $existing_loan->day == 30) ? 'selected' : set_select('day', '30'); ?>><?php echo $this->lang->line('month'); ?></option>
                        </select>
                        <?= form_error("day", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                    </div>

                    <!-- Repayment Sessions -->
                    <div class="sm:col-span-4">
                        <label for="session" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('number_of_repayments'); ?>:</label>
                        <input type="number" id="session" name="session" placeholder="<?php echo $this->lang->line('number_of_repayments_placeholder'); ?>"
                            value="<?= set_value('session', isset($existing_loan) ? $existing_loan->session : ''); ?>"
                            autocomplete="off" required
                            class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                        <?= form_error("session", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                    </div>

                    <!-- Reason -->
                    <div class="sm:col-span-4">
                        <label for="reason" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('customer_business_work'); ?>:</label>
                        <input type="text" id="reason" name="reason" placeholder="<?php echo $this->lang->line('customer_business_work_placeholder'); ?>"
                            value="<?= set_value('reason', isset($existing_loan) ? $existing_loan->reason : ''); ?>"
                            autocomplete="off" required
                            class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                        <?= form_error("reason", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                    </div>

                    <!-- Interest Formula -->
                        <div class="sm:col-span-4">
										<label class="block text-sm font-medium mb-2 dark:text-gray-300"><b>*<?php echo $this->lang->line('interest_formula'); ?>:</b></label>
										<select type="number" name="rate" class="py-3 px-4 pe-9 block w-full  border-gray-200 rounded-lg text-sm select2" required>
											<option value=""><?php echo $this->lang->line('select_interest_formula'); ?></option>
											<?php foreach ($formular as $formulars): ?>	
											<option value="<?php echo $formulars->formular_name; ?>"><?php if ($formulars->formular_name == 'SIMPLE') {
												 ?>
												 SIMPLE FORMULAR
												<?php }elseif($formulars->formular_name == 'FLAT RATE'){ ?>
                                                 FLAT RATE FORMULAR
													<?php }elseif ($formulars->formular_name == 'REDUCING') {
													 ?>
													 REDUCING FORMULAR
													 <?php } ?>
													 	
													 </option>
											<?php endforeach; ?>
										</select>
									</div>

                </div>

                <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <div class="flex justify-center gap-x-2">
                        <button type="button" onclick="showConfirmationModal()" class="py-2 px-4 btn-primary-sm bg-cyan-800 hover:bg-cyan-700 text-white"><?php echo $this->lang->line('next'); ?></button>
                    </div>
                </div>

                <?= form_close(); ?>

            </div>
        </div>
    </div>
</div>
<!-- ========== END MAIN CONTENT BODY ========== -->

<!-- Confirmation Modal -->
<div id="confirmationModal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="confirmationModalLabel">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-2xl sm:w-full m-3 sm:mx-auto">
        <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <!-- Modal Header -->
            <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                <h3 id="confirmationModalLabel" class="font-bold text-gray-800 dark:text-white">
                    <?php echo $this->lang->line('confirm_loan_details'); ?>
                </h3>
                <button type="button" onclick="closeConfirmationModal()" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600">
                    <span class="sr-only"><?php echo $this->lang->line('close'); ?></span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Modal Body -->
            <div class="p-4 overflow-y-auto">
                <p class="text-sm text-gray-600 dark:text-neutral-400 mb-4">
                    <?php echo $this->lang->line('review_loan_details_before_submit'); ?>
                </p>
                
                <div class="space-y-3">
                    <!-- Customer Info -->
                    <div class="bg-gray-50 dark:bg-neutral-700 rounded-lg p-3">
                        <h4 class="font-semibold text-sm text-gray-800 dark:text-white mb-2"><?php echo $this->lang->line('customer_information'); ?></h4>
                        <div class="text-sm text-gray-600 dark:text-neutral-400">
                            <span class="font-medium"><?php echo $this->lang->line('name_label'); ?>:</span> <span id="confirm_customer_name"><?= isset($customer) ? $customer->f_name . ' ' . $customer->m_name . ' ' . $customer->l_name : ''; ?></span>
                        </div>
                    </div>
                    
                    <!-- Loan Details -->
                    <div class="bg-gray-50 dark:bg-neutral-700 rounded-lg p-3">
                        <h4 class="font-semibold text-sm text-gray-800 dark:text-white mb-2"><?php echo $this->lang->line('loan_details'); ?></h4>
                        <div class="grid grid-cols-1 gap-2 text-sm">
                            <div class="text-gray-600 dark:text-neutral-400">
                                <span class="font-medium"><?php echo $this->lang->line('loan_product'); ?>:</span> <span id="confirm_loan_product"></span>
                            </div>
                            <div class="text-gray-600 dark:text-neutral-400">
                                <span class="font-medium"><?php echo $this->lang->line('loan_amount'); ?>:</span> <span id="confirm_loan_amount"></span>
                            </div>
                            <div class="text-gray-600 dark:text-neutral-400">
                                <span class="font-medium"><?php echo $this->lang->line('loan_duration'); ?>:</span> <span id="confirm_loan_duration"></span>
                            </div>
                            <div class="text-gray-600 dark:text-neutral-400">
                                <span class="font-medium"><?php echo $this->lang->line('number_of_repayments'); ?>:</span> <span id="confirm_repayment_sessions"></span>
                            </div>
                            <div class="text-gray-600 dark:text-neutral-400">
                                <span class="font-medium"><?php echo $this->lang->line('interest_formula'); ?>:</span> <span id="confirm_interest_formula"></span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Business/Work Info -->
                    <div class="bg-gray-50 dark:bg-neutral-700 rounded-lg p-3">
                        <h4 class="font-semibold text-sm text-gray-800 dark:text-white mb-2"><?php echo $this->lang->line('business_work_information'); ?></h4>
                        <div class="text-sm text-gray-600 dark:text-neutral-400">
                            <span class="font-medium"><?php echo $this->lang->line('customer_business_work'); ?>:</span> <span id="confirm_business"></span>
                        </div>
                    </div>
                    
                    <!-- Officer Info -->
                    <div class="bg-gray-50 dark:bg-neutral-700 rounded-lg p-3">
                        <h4 class="font-semibold text-sm text-gray-800 dark:text-white mb-2"><?php echo $this->lang->line('overseeing_officer'); ?></h4>
                        <div class="text-sm text-gray-600 dark:text-neutral-400">
                            <span class="font-medium"><?php echo $this->lang->line('officer'); ?>:</span> <span id="confirm_officer"></span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Modal Footer -->
            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                <button type="button" onclick="closeConfirmationModal()" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                    <?php echo $this->lang->line('cancel'); ?>
                </button>
                <button type="button" onclick="submitForm()" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-cyan-800 text-white hover:bg-cyan-700 focus:outline-none focus:bg-cyan-700 disabled:opacity-50 disabled:pointer-events-none">
                    <?php echo $this->lang->line('confirm_and_submit'); ?>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End Confirmation Modal -->

<?php
include_once APPPATH . "views/partials/footer.php";
?>

<!-- Your scripts and styles below remain unchanged -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const formattedInput = document.getElementById('how_loan_formatted');
    const hiddenInput = document.getElementById('how_loan');

    function formatNumber(value) {
        return value.replace(/\D/g, '') // Remove non-digit chars
                    .replace(/\B(?=(\d{3})+(?!\d))/g, ','); // Add commas
    }

    function unformatNumber(value) {
        return value.replace(/,/g, ''); // Remove commas
    }

    // On input, format the visible field and update hidden field with raw number
    formattedInput.addEventListener('input', function () {
        let cursorPosition = this.selectionStart;
        let originalLength = this.value.length;

        let unformatted = unformatNumber(this.value);
        hiddenInput.value = unformatted;

        this.value = formatNumber(unformatted);

        // Try to maintain cursor position
        let newLength = this.value.length;
        cursorPosition = cursorPosition + (newLength - originalLength);
        this.setSelectionRange(cursorPosition, cursorPosition);
    });

    // Initialize hidden input with unformatted value on page load
    hiddenInput.value = unformatNumber(formattedInput.value);
});

// Confirmation Modal Functions
function showConfirmationModal() {
    // Validate required fields
    const loanProduct = document.getElementById('branchSelect');
    const loanAmount = document.getElementById('how_loan');
    const duration = document.getElementById('durationselect');
    const sessions = document.getElementById('session');
    const business = document.getElementById('reason');
    const interestFormula = document.querySelector('select[name="rate"]');
    
    // Check if required fields are filled
    if (!loanProduct.value || !loanAmount.value || !duration.value || !sessions.value || !business.value || !interestFormula.value) {
        alert('<?php echo $this->lang->line('fill_all_required_fields'); ?>');
        return;
    }
    
    // Populate confirmation modal with form data
    document.getElementById('confirm_loan_product').textContent = loanProduct.options[loanProduct.selectedIndex].text;
    document.getElementById('confirm_loan_amount').textContent = 'TZS ' + document.getElementById('how_loan_formatted').value;
    
    let durationText = '';
    if (duration.value == '1') durationText = '<?php echo $this->lang->line('day'); ?> (Daily)';
    else if (duration.value == '7') durationText = '<?php echo $this->lang->line('week'); ?> (Weekly)';
    else if (duration.value == '30') durationText = '<?php echo $this->lang->line('month'); ?> (Monthly)';
    document.getElementById('confirm_loan_duration').textContent = durationText;
    
    document.getElementById('confirm_repayment_sessions').textContent = sessions.value + ' <?php echo $this->lang->line('repayment_sessions'); ?>';
    
    let formulaText = interestFormula.options[interestFormula.selectedIndex].text;
    document.getElementById('confirm_interest_formula').textContent = formulaText;
    
    document.getElementById('confirm_business').textContent = business.value;
    document.getElementById('confirm_officer').textContent = '<?php echo htmlspecialchars($empl_data->empl_name ?? '', ENT_QUOTES, 'UTF-8'); ?>';
    
    // Show modal
    const modal = document.getElementById('confirmationModal');
    const modalContent = modal.querySelector('.hs-overlay-open\\:mt-7');
    
    modal.classList.remove('hidden');
    modal.style.pointerEvents = 'auto';
    
    // Trigger animation
    setTimeout(() => {
        modalContent.style.marginTop = '1.75rem';
        modalContent.style.opacity = '1';
    }, 10);
}

function closeConfirmationModal() {
    const modal = document.getElementById('confirmationModal');
    const modalContent = modal.querySelector('.hs-overlay-open\\:mt-7');
    
    modalContent.style.marginTop = '0';
    modalContent.style.opacity = '0';
    
    setTimeout(() => {
        modal.classList.add('hidden');
        modal.style.pointerEvents = 'none';
    }, 300);
}

function submitForm() {
    const submitBtn = document.querySelector('#confirmationModal button[onclick="submitForm()"]');
    if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.textContent = '<?php echo $this->lang->line('processing') ?: 'Processing...'; ?>';
    }

    document.querySelector('form').submit();
}
</script>
