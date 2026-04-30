<?php
include_once APPPATH . "views/partials/officerheader.php";
?>

<?php
$isUpdate = ($last == TRUE);
$customer_id = '';
if (!empty($customer) && isset($customer->customer_id)) {
    $customer_id = $customer->customer_id;
} elseif (!empty($last) && isset($last->customer_id)) {
    $customer_id = $last->customer_id;
} else {
    $customer_id = $this->uri->segment(3);
}
$customer_day = !empty($customer) && isset($customer->customer_day) ? $customer->customer_day : date('Y-m-d');
$formAction = $isUpdate
    ? "oficer/modify_update_lastData/{$customer_id}"
    : "oficer/create_update_lastData/{$customer_id}";

$existing_famous_area = '';
if (!empty($last) && isset($last->famous_area)) {
    $existing_famous_area = $last->famous_area;
} elseif (!empty($customer) && isset($customer->famous_area)) {
    $existing_famous_area = $customer->famous_area;
}

$existing_place_imployment = '';
if (!empty($last) && isset($last->place_imployment)) {
    $existing_place_imployment = $last->place_imployment;
} elseif (!empty($customer) && isset($customer->place_imployment)) {
    $existing_place_imployment = $customer->place_imployment;
}
?>

<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-6">

        <div class="mb-6">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-200">
                <?php echo $this->lang->line('update_customer_detail_title'); ?>
            </h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                <?php echo $this->lang->line('update_customer_detail_desc'); ?>
            </p>
        </div>

        <?php if ($das = $this->session->flashdata('massage')): ?>
        <div class="bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert">
            <div class="flex">
                <div class="flex-shrink-0"><span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-teal-100 bg-teal-200 text-teal-800 dark:border-teal-900 dark:bg-teal-800 dark:text-teal-500"><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="m9 12 2 2 4-4"></path></svg></span></div>
                <div class="ms-3"><h3 class="text-gray-800 font-semibold dark:text-white"><?php echo $this->lang->line('success'); ?></h3><p class="mt-2 text-sm text-gray-700 dark:text-gray-400"><?php echo $das; ?></p></div>
                <div class="ps-3 ms-auto"><button type="button" class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none dark:bg-transparent dark:hover:bg-teal-800/50 dark:text-teal-600" data-hs-remove-element="[role=alert]"><span class="sr-only"><?php echo $this->lang->line('dismiss'); ?></span><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg></button></div>
            </div>
        </div>
        <?php endif; ?>

        <?php if ($das = $this->session->flashdata('error')): ?>
        <div class="bg-red-100 border border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500" role="alert">
            <div class="flex">
                <div class="flex-shrink-0"><span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-red-100 bg-red-200 text-red-800 dark:border-red-900 dark:bg-red-800 dark:text-red-500"><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg></span></div>
                <div class="ms-3"><h3 class="text-gray-800 font-semibold dark:text-white"><?php echo $this->lang->line('error'); ?></h3><p class="mt-2 text-sm text-gray-700 dark:text-gray-400"><?php echo $das; ?></p></div>
                <div class="ps-3 ms-auto"><button type="button" class="inline-flex bg-red-50 rounded-lg p-1.5 text-red-500 hover:bg-red-100 focus:outline-none dark:bg-transparent dark:hover:bg-red-800/50 dark:text-red-600" data-hs-remove-element="[role=alert]"><span class="sr-only"><?php echo $this->lang->line('dismiss'); ?></span><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg></button></div>
            </div>
        </div>
        <?php endif; ?>

        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 md:p-6">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-6">
                    <?php echo $isUpdate ? $this->lang->line('update_customer_detail_form') : $this->lang->line('add_customer_detail_form'); ?>
                </h3>

                <?php echo form_open_multipart($formAction, ['novalidate' => true]); ?>
                <div class="grid sm:grid-cols-12 gap-4 sm:gap-6">

                    <div class="sm:col-span-6">
                        <label for="famous_area" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('nick_name'); ?>:</label>
                        <input type="text" id="famous_area" name="famous_area"
                               value="<?php echo set_value('famous_area', $existing_famous_area); ?>"
                               placeholder="<?php echo $this->lang->line('nick_name_hint'); ?>" autocomplete="off" required
                               class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500">
                    </div>




                     <div class="sm:col-span-6">
                        <label for="place_imployment" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('place_of_business'); ?>:</label>
                        <input type="text" id="place_imployment" name="place_imployment"
                                         value="<?php echo set_value('place_imployment', $existing_place_imployment); ?>"
                               placeholder="<?php echo $this->lang->line('place_of_business_hint'); ?>" autocomplete="off" required
                               class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500">
                    </div>

                    <!-- <div class="sm:col-span-4">
                        <label for="martial_status" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('martial_status'); ?>:</label>
                        <select id="martial_status" name="martial_status" required
                                class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                            <option value="<?php echo $isUpdate ? $last->martial_status : ''; ?>"><?php echo $isUpdate ? $last->martial_status : $this->lang->line('select'); ?></option>
                            <option value="Married"><?php echo $this->lang->line('married'); ?></option>
                            <option value="Single"><?php echo $this->lang->line('single'); ?></option>
                            <option value="Widow"><?php echo $this->lang->line('widow'); ?></option>
                            <option value="Separated"><?php echo $this->lang->line('separated'); ?></option>
                            <option value="Devorced"><?php echo $this->lang->line('divorced'); ?></option>
                        </select>
                    </div> -->

                    <!-- <div class="sm:col-span-4">
                        <label for="account_id" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('account_type'); ?>:</label>
                        <select id="account_id" name="account_id" required
                                class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                            <option value="<?php echo $isUpdate ? $last->account_id : ''; ?>"><?php echo $isUpdate ? $last->account_name : $this->lang->line('select'); ?></option>
                            <?php foreach ($account as $accounts): ?>
                                <option value="<?php echo $accounts->account_id; ?>"><?php echo $accounts->account_name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div> -->

                    <!-- <div class="sm:col-span-4">
                        <label for="natinal_identity" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('national_identity_number'); ?>:</label>
                        <input type="number" id="natinal_identity" name="natinal_identity"
                               value="<?php echo $isUpdate ? $last->natinal_identity : set_value('natinal_identity'); ?>"
                               placeholder="<?php echo $this->lang->line('national_identity_number'); ?>" autocomplete="off" required
                               class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500">
                    </div> -->

                    <!-- <div class="sm:col-span-4">
                        <label for="work_status" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('working_status'); ?>:</label>
                        <select id="work_status" name="work_status" required
                                class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                            <option value="<?php echo $isUpdate ? $last->work_status : ''; ?>"><?php echo $isUpdate ? $last->work_status : $this->lang->line('select_work_status'); ?></option>
                            <option value="Employee"><?php echo $this->lang->line('employee'); ?></option>
                            <option value="Government Employee"><?php echo $this->lang->line('government_employee'); ?></option>
                            <option value="Private Sector Employee"><?php echo $this->lang->line('private_sector_employee'); ?></option>
                            <option value="Bussines Owner"><?php echo $this->lang->line('business_owner'); ?></option>
                            <option value="Student"><?php echo $this->lang->line('student'); ?></option>
                            <option value="Overseas Worker"><?php echo $this->lang->line('overseas_worker'); ?></option>
                            <option value="Pensioner"><?php echo $this->lang->line('pensioner'); ?></option>
                            <option value="Unemployed"><?php echo $this->lang->line('unemployed'); ?></option>
                            <option value="Self Employed"><?php echo $this->lang->line('self_employed'); ?></option>
                        </select>
                    </div> -->

                    <!-- <div class="sm:col-span-4">
                        <label for="bussiness_type" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('business_type'); ?>:</label>
                        <input type="text" id="bussiness_type" name="bussiness_type"
                               value="<?php echo $isUpdate ? $last->bussiness_type : set_value('bussiness_type'); ?>"
                               placeholder="<?php echo $this->lang->line('business_type'); ?>" autocomplete="off" required
                               class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500">
                    </div> -->

                    <!-- <div class="sm:col-span-4">
                        <label for="place_imployment" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('place_employment_business'); ?>:</label>
                        <input type="text" id="place_imployment" name="place_imployment"
                               value="<?php echo $isUpdate ? $last->place_imployment : set_value('place_imployment'); ?>"
                               placeholder="<?php echo $this->lang->line('place_employment_business'); ?>" autocomplete="off" required
                               class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500">
                    </div> -->

                    <!-- <div class="sm:col-span-4">
                        <label for="number_dependents" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('number_of_dependents'); ?>:</label>
                        <input type="number" id="number_dependents" name="number_dependents"
                               value="<?php echo $isUpdate ? $last->number_dependents : set_value('number_dependents'); ?>"
                               placeholder="<?php echo $this->lang->line('number_of_dependents'); ?>" autocomplete="off" required
                               class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500">
                    </div> -->

                    <!-- <div class="sm:col-span-4">
                        <label for="month_income" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('monthly_income'); ?>:</label>
                        <input type="number" id="month_income" name="month_income"
                               value="<?php echo $isUpdate ? $last->month_income : set_value('month_income'); ?>"
                               placeholder="<?php echo $this->lang->line('monthly_income'); ?>" autocomplete="off" required
                               class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500">
                    </div> -->

                    <input type="hidden" name="code" value="C<?php echo substr($customer_day, 0, 4) ?><?php echo substr($customer_day, 5, 2) ?><?php echo $customer_id; ?>">
                    <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>">
                </div>

                <div class="mt-8 pt-6 border-t  border-gray-200 dark:border-gray-700">
                    <div class="flex justify-center gap-x-2">
                        <button type="submit" class="py-2 px-4 btn-primary-sm bg-cyan-800 hover:bg-cyan-700 text-white">
                            <?php echo $isUpdate ? $this->lang->line('update') : $this->lang->line('save'); ?>
                        </button>
                        <a class="py-2 px-4 btn-primary-sm bg-green-800 hover:bg-green-700 text-white rounded-md" href="<?php echo base_url("oficer/update_customer_passport/{$customer_id}"); ?>">
                            Update Passport
                        </a>
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