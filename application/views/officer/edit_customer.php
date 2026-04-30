<?php
include_once APPPATH . "views/partials/officerheader.php";
?>

<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-6">

        <div class="mb-6">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-200">
                Update Customer
            </h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                Edit customer profile details before moving to the next registration step.
            </p>
        </div>

        <?php if ($das = $this->session->flashdata('massage')): ?>
        <div class="bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert">
            <div class="flex">
                <div class="flex-shrink-0">
                    <span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-teal-100 bg-teal-200 text-teal-800 dark:border-teal-900 dark:bg-teal-800 dark:text-teal-500">
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="m9 12 2 2 4-4"/></svg>
                    </span>
                </div>
                <div class="ms-3">
                    <h3 class="text-gray-800 font-semibold dark:text-white">Success</h3>
                    <p class="mt-2 text-sm text-gray-700 dark:text-gray-400"><?php echo $das; ?></p>
                </div>
                <div class="ps-3 ms-auto">
                    <button type="button" class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none" data-hs-remove-element="[role=alert]">
                        <span class="sr-only">Dismiss</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                    </button>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if ($das = $this->session->flashdata('error')): ?>
        <div class="bg-red-100 border border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500" role="alert">
            <div class="flex">
                <div class="flex-shrink-0">
                    <span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-red-100 bg-red-200 text-red-800 dark:border-red-900 dark:bg-red-800 dark:text-red-500">
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    </span>
                </div>
                <div class="ms-3">
                    <h3 class="text-gray-800 font-semibold dark:text-white">Error</h3>
                    <p class="mt-2 text-sm text-gray-700 dark:text-gray-400"><?php echo $das; ?></p>
                </div>
                <div class="ps-3 ms-auto">
                    <button type="button" class="inline-flex bg-red-50 rounded-lg p-1.5 text-red-500 hover:bg-red-100 focus:outline-none" data-hs-remove-element="[role=alert]">
                        <span class="sr-only">Dismiss</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                    </button>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 md:p-6">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-6">
                    Update Customer Information
                </h3>

                <?php echo form_open_multipart("oficer/modify_customer/{$data->customer_id}", ['novalidate' => true]); ?>
                    <div class="grid sm:grid-cols-12 gap-4 sm:gap-6">
                        <div class="sm:col-span-4">
                            <label for="f_name" class="block text-sm font-medium mb-2 dark:text-gray-300">* First Name:</label>
                            <input type="text" id="f_name" name="f_name" value="<?php echo $data->f_name; ?>" placeholder="First name" autocomplete="off" required
                                   class="uppercase py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500">
                        </div>

                        <div class="sm:col-span-4">
                            <label for="m_name" class="block text-sm font-medium mb-2 dark:text-gray-300">* Middle Name:</label>
                            <input type="text" id="m_name" name="m_name" value="<?php echo $data->m_name; ?>" placeholder="Middle name" autocomplete="off" required
                                   class="uppercase py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500">
                        </div>

                        <div class="sm:col-span-4">
                            <label for="l_name" class="block text-sm font-medium mb-2 dark:text-gray-300">* Last Name:</label>
                            <input type="text" id="l_name" name="l_name" value="<?php echo $data->l_name; ?>" placeholder="Last name" autocomplete="off" required
                                   class="uppercase py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500">
                        </div>

                        <div class="sm:col-span-4">
                            <label for="gender" class="block text-sm font-medium mb-2 dark:text-gray-300">* Gender:</label>
                            <?php $selected_gender = strtolower(trim((string) $data->gender)); ?>
                            <select id="gender" name="gender" required
                                    class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                                <?php if ($selected_gender !== 'male' && $selected_gender !== 'female' && $selected_gender !== ''): ?>
                                    <option value="<?php echo html_escape($data->gender); ?>" selected><?php echo html_escape($data->gender); ?></option>
                                <?php else: ?>
                                    <option value="" disabled>Select gender</option>
                                <?php endif; ?>
                                <option value="male" <?php echo $selected_gender === 'male' ? 'selected' : ''; ?>>Male</option>
                                <option value="female" <?php echo $selected_gender === 'female' ? 'selected' : ''; ?>>Female</option>
                            </select>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="date_birth" class="block text-sm font-medium mb-2 dark:text-gray-300">* Date of Birth:</label>
                            <input type="date" id="date_birth" name="date_birth" value="<?php echo $data->date_birth; ?>" placeholder="Date of birth" autocomplete="off" required
                                   class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500">
                        </div>

                        <div class="sm:col-span-4">
                            <label for="phone_no" class="block text-sm font-medium mb-2 dark:text-gray-300">* Phone Number:</label>
                            <input type="text" id="phone_no" name="phone_no" value="<?php echo $data->phone_no; ?>" placeholder="Eg, 07XXXXXXXX or 255XXXXXXXXX" autocomplete="off" required
                                   class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500">
                        </div>

                        <!-- <div class="sm:col-span-6">
                            <label for="region_id" class="block text-sm font-medium mb-2 dark:text-gray-300">* Region:</label>
                            <select id="region_id" name="region_id" required
                                    class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                                <option value="<?php echo $data->region_id; ?>"><?php echo $data->region_name; ?></option>
                                <?php foreach ($region as $regions): ?>
                                    <option value="<?php echo $regions->region_id; ?>"><?php echo $regions->region_name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div> -->

                        <!-- <div class="sm:col-span-6">
                            <label for="district" class="block text-sm font-medium mb-2 dark:text-gray-300">* District:</label>
                            <input type="text" id="district" name="district" value="<?php echo $data->district; ?>" placeholder="District" autocomplete="off" required
                                   class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500">
                        </div> -->

                        <!-- <div class="sm:col-span-6">
                            <label for="ward" class="block text-sm font-medium mb-2 dark:text-gray-300">* Ward:</label>
                            <input type="text" id="ward" name="ward" value="<?php echo $data->ward; ?>" placeholder="Ward" autocomplete="off" required
                                   class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500">
                        </div> -->
<!-- 
                        <div class="sm:col-span-6">
                            <label for="street" class="block text-sm font-medium mb-2 dark:text-gray-300">* Street:</label>
                            <input type="text" id="street" name="street" value="<?php echo $data->street; ?>" placeholder="Street" autocomplete="off" required
                                   class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500">
                        </div> -->

                        <div class="sm:col-span-6">
                            <label for="barua_utambulisho" class="block text-sm font-medium mb-2 dark:text-gray-300">Barua ya utambulisho (PDF):</label>
                            <input type="file" id="barua_utambulisho" name="barua_utambulisho" accept="application/pdf"
                                   class="block w-full text-sm text-gray-700 file:mr-4 file:py-2.5 file:px-4 file:rounded-md file:border-0 file:font-semibold file:bg-cyan-50 file:text-cyan-700 hover:file:bg-cyan-100 dark:file:bg-gray-700 dark:file:text-gray-300">
                            <?php
                                $barua_file = 'assets/documents/barua_' . $data->customer_id . '.pdf';
                                if (file_exists(FCPATH . $barua_file)):
                            ?>
                                <a href="<?php echo base_url($barua_file); ?>" target="_blank" class="inline-block mt-2 text-xs text-cyan-700 hover:text-cyan-800 dark:text-cyan-400 dark:hover:text-cyan-300">
                                    View current Barua ya utambulisho
                                </a>
                            <?php endif; ?>
                            <?php echo form_error("barua_utambulisho", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>

                        <div class="sm:col-span-6">
                            <label for="kitambulisho" class="block text-sm font-medium mb-2 dark:text-gray-300">Kitambulisho (PDF):</label>
                            <input type="file" id="kitambulisho" name="kitambulisho" accept="application/pdf"
                                   class="block w-full text-sm text-gray-700 file:mr-4 file:py-2.5 file:px-4 file:rounded-md file:border-0 file:font-semibold file:bg-cyan-50 file:text-cyan-700 hover:file:bg-cyan-100 dark:file:bg-gray-700 dark:file:text-gray-300">
                            <?php
                                $kitambulisho_file = 'assets/documents/kitambulisho_' . $data->customer_id . '.pdf';
                                if (file_exists(FCPATH . $kitambulisho_file)):
                            ?>
                                <a href="<?php echo base_url($kitambulisho_file); ?>" target="_blank" class="inline-block mt-2 text-xs text-cyan-700 hover:text-cyan-800 dark:text-cyan-400 dark:hover:text-cyan-300">
                                    View current Kitambulisho
                                </a>
                            <?php endif; ?>
                            <?php echo form_error("kitambulisho", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>

                        <input type="hidden" name="comp_id" value="<?php echo $empl_data->comp_id; ?>">
                        <input type="hidden" name="blanch_id" value="<?php echo $empl_data->blanch_id; ?>">
                        <input type="hidden" name="empl_id" value="<?php echo $empl_data->empl_id; ?>">
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex justify-center gap-x-2">
                            <button type="submit" class="py-2 px-4 btn-primary-sm bg-cyan-800 hover:bg-cyan-700 text-white">
                                Update
                            </button>
                            <a href="<?php echo base_url("oficer/update_lsatDetailCustomer/{$data->customer_id}"); ?>" class="py-2 px-4 btn-primary-sm bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-md">
                                Skip
                            </a>
                            <a href="<?php echo base_url("oficer/update_customer_passport/{$data->customer_id}"); ?>" class="py-2 px-4 btn-primary-sm bg-indigo-100 hover:bg-indigo-200 text-indigo-800 rounded-md">
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