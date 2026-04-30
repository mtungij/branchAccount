<?php
include_once APPPATH . "views/partials/officerheader.php";
?>

<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-6">

        <div class="mb-6">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-200">
               Register New Group Name
            </h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                Register new group and select multiple customers.
            </p>
        </div>

        <!-- Flash Messages -->
        <?php if ($success = $this->session->flashdata('message')): ?>
            <div class="bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-teal-100 bg-teal-200 text-teal-800 dark:border-teal-900 dark:bg-teal-800 dark:text-teal-500">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/>
                                <path d="m9 12 2 2 4-4"/>
                            </svg>
                        </span>
                    </div>
                    <div class="ms-3">
                        <h3 class="text-gray-800 font-semibold dark:text-white">Success</h3>
                        <p class="mt-2 text-sm text-gray-700 dark:text-gray-400"><?= $success; ?></p>
                    </div>
                    <div class="ps-3 ms-auto">
                        <button type="button" class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none" data-hs-remove-element="[role=alert]">
                            <span class="sr-only">Dismiss</span>
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M18 6 6 18"/><path d="m6 6 12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($error = $this->session->flashdata('error')): ?>
            <div class="bg-red-100 border border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500" role="alert">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-red-100 bg-red-200 text-red-800 dark:border-red-900 dark:bg-red-800 dark:text-red-500">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"/>
                                <line x1="12" y1="8" x2="12" y2="12"/>
                                <line x1="12" y1="16" x2="12" y2="16"/>
                            </svg>
                        </span>
                    </div>
                    <div class="ms-3">
                        <h3 class="text-gray-800 font-semibold dark:text-white">Error</h3>
                        <p class="mt-2 text-sm text-gray-700 dark:text-gray-400"><?= $error; ?></p>
                    </div>
                    <div class="ps-3 ms-auto">
                        <button type="button" class="inline-flex bg-red-50 rounded-lg p-1.5 text-red-500 hover:bg-red-100 focus:outline-none" data-hs-remove-element="[role=alert]">
                            <span class="sr-only">Dismiss</span>
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M18 6 6 18"/>
                                <path d="m6 6 12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 md:p-6">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-6">
                    Register Group Name and Select Customers
                </h3>

                <?= form_open("oficer/create_group_with_loans", ['novalidate' => true]); ?>

                    <div class="grid sm:grid-cols-12 gap-4 sm:gap-6">
                        <div class="sm:col-span-4">
                            <label for="group_name" class="block text-sm font-medium mb-2 dark:text-gray-300">* Group Name:</label>
                            <input type="text" id="group_name" name="group_name" placeholder="Mfano: TUMAINI GROUP" autocomplete="off"
                                class="uppercase py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm
                                    focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none
                                    dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
                                value="<?= set_value('group_name'); ?>">
                            <?= form_error("group_name", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>

                        <div class="sm:col-span-8">
                            <label for="group_members" class="block text-sm font-medium mb-2 dark:text-gray-300">* Select Customers (wanakikundi):</label>
                            <select id="group_members" name="members[]" multiple required
                                class="py-3 px-4 pe-9 block w-full bg-cyan-600 border-gray-200 rounded-lg text-sm
                                focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none
                                dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:placeholder-gray-500 dark:focus:ring-gray-600 select2">
                                <?php foreach ($customer as $cust): ?>
                                    <option value="<?= $cust->customer_id ?>">
                                        <?= strtoupper($cust->f_name . ' ' . $cust->m_name . ' ' . $cust->l_name); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('members[]', '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>

                        <input type="hidden" name="comp_id" value="<?= $empl_data->comp_id; ?>">
                        <input type="hidden" name="blanch_id" value="<?= $empl_data->blanch_id; ?>">
                        <input type="hidden" name="empl_id" value="<?= $empl_data->empl_id; ?>">
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex justify-center gap-x-2">
                            <button type="submit" class="py-2 px-4 btn-primary-sm bg-cyan-800 hover:bg-cyan-700 text-white">Next</button>
                        </div>
                    </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>

<?php
include_once APPPATH . "views/partials/footer.php";
?>

<!-- Scripts for Select2 and styling -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function() {
    $('#group_members').select2({
        placeholder: "Chagua wanakikundi",
        allowClear: true,
        width: '100%'
    });
});
</script>
