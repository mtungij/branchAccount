
<?php
include_once APPPATH . "views/partials/officerheader.php";
?>


<?php
$comp_id = $comp_id ?? null;
?>


<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-6">

     

    <?php if ($das = $this->session->flashdata('massage')): ?>
    <div class="bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert">
        <div class="flex">
            <div class="flex-shrink-0">
                <span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-teal-100 bg-teal-200 text-teal-800 dark:border-teal-900 dark:bg-teal-800 dark:text-teal-500">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                        <path d="m9 12 2 2 4-4"></path>
                    </svg>
                </span>
            </div>
            <div class="ms-3">
                <h3 class="text-gray-800 font-semibold dark:text-white"><?php echo $this->lang->line('success'); ?></h3>
                <p class="mt-2 text-sm text-gray-700 dark:text-gray-400"><?php echo $das;?></p>
            </div>
            <div class="ps-3 ms-auto">
                <button type="button" class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-teal-50 focus:ring-teal-600 dark:bg-transparent dark:hover:bg-teal-800/50 dark:text-teal-600" data-hs-remove-element="[role=alert]">
                    <span class="sr-only"><?php echo $this->lang->line('dismiss'); ?></span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (validation_errors()): ?>
    <div class="bg-red-100 border border-red-400 text-sm text-red-700 rounded-lg p-4 mt-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500" role="alert">
        <div class="flex">
            <div class="flex-shrink-0">
                <span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-red-200 bg-red-300 text-red-800 dark:border-red-900 dark:bg-red-800 dark:text-red-500">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                        <path d="M15 9l-6 6M9 9l6 6"></path>
                    </svg>
                </span>
            </div>
            <div class="ms-3">
                <h3 class="text-red-800 font-semibold dark:text-red-400"><?php echo $this->lang->line('validation_errors'); ?></h3>
                <div class="mt-2 text-sm text-red-700 dark:text-red-400">
                    <?php echo validation_errors('<p>', '</p>'); ?>
                </div>
            </div>
            <div class="ps-3 ms-auto">
                <button type="button" class="inline-flex bg-red-50 rounded-lg p-1.5 text-red-500 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-red-50 focus:ring-red-600 dark:bg-transparent dark:hover:bg-red-800/50 dark:text-red-600" data-hs-remove-element="[role=alert]">
                    <span class="sr-only"><?php echo $this->lang->line('dismiss'); ?></span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
<?php endif; ?>


        <div class="bg-gray-100">
    <div class="w-full bg-cyan-600 text-white">
        <div class="flex flex-col max-w-screen-xl px-4 mx-auto md:flex-row md:justify-between md:px-6 lg:px-8">
            <div class="p-4 flex flex-row items-center justify-between">
                <a href="#" class="text-lg font-semibold tracking-widest uppercase rounded-lg focus:outline-none focus:shadow-outline">
                    <?php echo $this->lang->line('customer_profile'); ?>
                </a>
            </div>
        </div>
    </div>
</div>


    <div class="container mx-auto my-3 p-4">
        <div class="md:flex no-wrap md:-mx-2">
            <!-- Left Side -->
            <div class="w-full md:w-3/12 md:mx-2">
                <div class="bg-white p-3 border-t-4 border-green-400">
                    <div class="image overflow-hidden mb-4 text-center">
                    <?php
                    $customer_passport = isset($existing_passport) && !empty($existing_passport)
                        ? trim((string) $existing_passport)
                        : (isset($customer->passport) ? trim((string) $customer->passport) : '');
                    if ($customer_passport !== '') {
                        if (preg_match('#^(https?://|data:image/)#i', $customer_passport)) {
                            $customer_passport_src = $customer_passport;
                        } else {
                            $candidates = [
                                ltrim($customer_passport, '/'),
                                'uploads/' . ltrim($customer_passport, '/'),
                                'assets/uploads/' . ltrim($customer_passport, '/'),
                                'assets/img/' . ltrim($customer_passport, '/'),
                                'assets/passport/' . ltrim($customer_passport, '/'),
                            ];

                            $customer_passport_src = base_url('assets/img/customer21.png');
                            foreach ($candidates as $candidate) {
                                $relative = ltrim($candidate, '/');
                                if (file_exists(FCPATH . $relative)) {
                                    $customer_passport_src = base_url($candidate);
                                    break;
                                }
                            }
                        }
                    } else {
                        $customer_passport_src = base_url('assets/img/customer21.png');
                    }
                    ?>
                    <img id="customerPassportPreview" class="w-32 h-32 mx-auto rounded-full object-cover border-4 border-green-400" src="<?= $customer_passport_src ?>" alt="Customer Passport">
                    <?php if (!empty($customer) && !empty($customer->customer_id)): ?>
                    <div class="mt-3 text-center">
                        <input type="file" id="customerPassportInput"  capture="environment" class="hidden">
                        <button type="button" id="customerPassportTrigger"
                           class="inline-flex items-center justify-center py-2 px-3 text-xs font-semibold rounded-md bg-cyan-600 hover:bg-cyan-700 text-white transition">
                            Update/Upload Passport
                        </button>
                        <p id="customerPassportMessage" class="mt-2 text-xs text-cyan-700"></p>
                    </div>
                    <?php endif; ?>


                    </div>
                    <h1 class="text-green-500 font-bold text-xl leading-8 my-1 dark:text-neutral-900 text-center">
                        <?= strtoupper($customer->f_name) . " " . strtoupper(substr($customer->m_name, 0, 1)) . " " . strtoupper($customer->l_name) ?>
                    </h1>
                    <h1 class="text-center font-semibold\"><?= $customer->phone_no ;?></h1>
                    <?php
                    $agreement_loan = !empty($customer->customer_id) ? $this->queries->get_loan_active_customer($customer->customer_id) : null;
                    ?>
                    <?php if (!empty($customer->customer_id) && !empty($agreement_loan->loan_id) && !empty($agreement_loan->loan_status) && in_array($agreement_loan->loan_status, ['withdrawal', 'out', 'done'], true)): ?>
                    <div class="mt-3 text-center">
                        <a href="<?= base_url('oficer/view_aggrement/' . $customer->customer_id . '/' . $agreement_loan->loan_id); ?>" target="_blank"
                           class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full bg-cyan-100 text-cyan-800 hover:bg-cyan-200 transition">
                            View Loan Agreement
                        </a>
                    </div>
                    <?php endif; ?>
                    <ul class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                        <li class="flex items-center py-3">
                            <span><?php echo $this->lang->line('status'); ?></span>
                            <span class="ml-auto"><span class="bg-green-500 py-1 px-2 rounded text-white text-sm"><?php echo $this->lang->line('active'); ?></span></span>
                        </li>
                        <li class="flex items-center py-3">
                            <span><?php echo $this->lang->line('member_since'); ?></span>
                            <span class="ml-auto"><?= date('Y-m-d', strtotime($customer->customer_day)); ?></span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Right Side -->
            <div class="w-full md:w-9/12 md:mx-2 mt-4 md:mt-0">
                <h2 class="text-xl font-semibold text-gray-700 dark:text-gray-300 mb-4"><?php echo $this->lang->line('guarantors'); ?></h2>

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                            <tr>
                                <th class="py-3 px-6 text-left"><?php echo $this->lang->line('s_no'); ?></th>
                                <th class="py-3 px-6 text-left"><?php echo $this->lang->line('full_name'); ?></th>
                                <th class="py-3 px-6 text-left"><?php echo $this->lang->line('mobile'); ?></th>
                                <th class="py-3 px-6 text-left"><?php echo $this->lang->line('email'); ?></th>
                                <th class="py-3 px-6 text-left"><?php echo $this->lang->line('sex'); ?></th>
                                <th class="py-3 px-6 text-left"><?php echo $this->lang->line('dob'); ?></th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 text-sm">
                            <?php if (isset($share) && count($share) > 0): ?>
                                <?php foreach ($share as $i => $sh): ?>
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-3 px-6"><?= $i + 1 ?></td>
                                        <td class="py-3 px-6">jju</td>
                                        <td class="py-3 px-6">jju</td>
                                        <td class="py-3 px-6">jjuuuik</td>
                                        <td class="py-3 px-6">llkk</td>
                                        <td class="py-3 px-6">890000</td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-gray-500"><?php echo $this->lang->line('no_shareholder_data'); ?></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>


<div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 md:p-6">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-6">
                  <?php echo $this->lang->line('register_guarantor_info'); ?>

                </h3>
               


               
               <!-- </?php echo form_open_multipart("oficer/create_sponser/{$customer->customer_id}/{$customer->comp_id}"); ?> -->
               <?php echo form_open_multipart("oficer/create_sponser/{$customer->customer_id}/{$comp_id}"); ?>


<div class="grid sm:grid-cols-12 gap-4 sm:gap-6">
    <!-- First Name -->
    <div class="sm:col-span-4">
        <label for="sp_name" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('first_name'); ?>:</label>
        <input type="text" id="sp_name" name="sp_name"
               value="<?= isset($sponser->sp_name) ? htmlspecialchars($sponser->sp_name) : '' ?>"
               placeholder="<?php echo $this->lang->line('guarantor_first_name_placeholder'); ?>" autocomplete="off"
               class="uppercase py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm 
                      focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
        <?php echo form_error("sp_name", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
    </div>

    <!-- Middle Name -->
    <div class="sm:col-span-4">
        <label for="sp_mname" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('middle_name'); ?>:</label>
        <input type="text" id="sp_mname" name="sp_mname"
               value="<?= isset($sponser->sp_mname) ? htmlspecialchars($sponser->sp_mname) : '' ?>"
               placeholder="<?php echo $this->lang->line('guarantor_middle_name_placeholder'); ?>" autocomplete="off"
               class="uppercase py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm 
                      focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
        <?php echo form_error("sp_mname", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
    </div>

    <!-- Last Name -->
    <div class="sm:col-span-4">
        <label for="sp_lname" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('last_name'); ?>:</label>
        <input type="text" id="sp_lname" name="sp_lname"
               value="<?= isset($sponser->sp_lname) ? htmlspecialchars($sponser->sp_lname) : '' ?>"
               placeholder="<?php echo $this->lang->line('guarantor_last_name_placeholder'); ?>" autocomplete="off"
               class="uppercase py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm 
                      focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
        <?php echo form_error("sp_lname", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
    </div>

    <!-- Phone Number -->
    <div class="sm:col-span-4">
        <label for="sp_phone_no" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('phone_number'); ?>:</label>
        <input type="text" id="sp_phone_no" name="sp_phone_no"
               value="<?= isset($sponser->sp_phone_no) ? htmlspecialchars($sponser->sp_phone_no) : '' ?>"
               placeholder="<?php echo $this->lang->line('guarantor_phone_placeholder'); ?>" autocomplete="off"
               class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm 
                      focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
        <?php echo form_error("sp_phone_no", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
    </div>

    <!-- Relationship -->
    <div class="sm:col-span-4">
        <label for="sp_relation" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('relationship_with_customer'); ?>:</label>
        <input type="text" id="sp_relation" name="sp_relation"
               value="<?= isset($sponser->sp_relation) ? htmlspecialchars($sponser->sp_relation) : '' ?>"
               placeholder="<?php echo $this->lang->line('relationship_hint'); ?>" autocomplete="off"
               class="uppercase py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm 
                      focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
        <?php echo form_error("sp_relation", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
    </div>

    <!-- Business -->
    <div class="sm:col-span-4">
        <label for="nature" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('guarantor_business'); ?>:</label>
        <input type="text" id="nature" name="nature"
               value="<?= isset($sponser->nature) ? htmlspecialchars($sponser->nature) : '' ?>"
               placeholder="<?php echo $this->lang->line('guarantor_business_hint'); ?>" autocomplete="off"
               class="uppercase py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm 
                      focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
        <?php echo form_error("nature", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
    </div>

    <!-- Barua ya Utambulisho -->
    <div class="sm:col-span-4">
        <label for="barua_utambulisho" class="block text-sm font-medium mb-2 dark:text-gray-300">
            <?php echo $this->lang->line('identification_letter_pdf'); ?> <span class="text-gray-400">(<?php echo $this->lang->line('optional'); ?>)</span>:
        </label>
        <input type="file" id="barua_utambulisho" name="barua_utambulisho" accept="application/pdf"
               class="block w-full text-sm text-gray-700 file:mr-4 file:py-2.5 file:px-4 file:rounded-md 
                      file:border-0 file:font-semibold file:bg-cyan-50 file:text-cyan-700 hover:file:bg-cyan-100 
                      dark:file:bg-gray-700 dark:file:text-gray-300">
        <?php echo form_error("barua_utambulisho", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
    </div>

    <!-- Kitambulisho -->
    <div class="sm:col-span-4">
        <label for="kitambulisho" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('id_card_pdf'); ?>:</label>
        <input type="file" id="kitambulisho" name="kitambulisho" accept="application/pdf"
               class="block w-full text-sm text-gray-700 file:mr-4 file:py-2.5 file:px-4 file:rounded-md 
                      file:border-0 file:font-semibold file:bg-cyan-50 file:text-cyan-700 hover:file:bg-cyan-100 
                      dark:file:bg-gray-700 dark:file:text-gray-300">
        <?php echo form_error("kitambulisho", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
    </div>

    <!-- Passport Size Photo -->
    <div class="sm:col-span-4">
        <label class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('passport_size_photo'); ?>:</label>
        <?php $has_passport = isset($sponser->passport_path) && !empty($sponser->passport_path); ?>
        <div id="existingPassportSection" class="<?php echo $has_passport ? '' : 'hidden'; ?>">
            <div class="flex items-center gap-3 mb-2">
                <img id="sponsorPreviewImage" class="rounded border shadow w-32 h-32 object-cover"
                     src="<?php echo $has_passport ? base_url($sponser->passport_path) : base_url('assets/img/customer21.png'); ?>"
                     alt="Preview">
                <button type="button" onclick="showPassportUpload()" class="inline-flex items-center px-3 py-2 text-xs font-medium rounded-md bg-yellow-500 text-white hover:bg-yellow-600">
                    <i class="fa fa-pencil mr-1"></i> <?php echo $this->lang->line('change') ?? 'Change'; ?>
                </button>
            </div>
        </div>
        <div id="passportUploadSection" class="<?php echo $has_passport ? 'hidden' : ''; ?>">
            <input type="file" id="sponsorPassportInput" accept="image/*"
                   class="block w-full text-sm text-gray-700 file:mr-4 file:py-2.5 file:px-4 file:rounded-md 
                          file:border-0 file:font-semibold file:bg-cyan-50 file:text-cyan-700 hover:file:bg-cyan-100 
                          dark:file:bg-gray-700 dark:file:text-gray-300">
            <?php if ($has_passport): ?>
            <button type="button" onclick="cancelPassportChange()" class="mt-2 text-xs text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                <i class="fa fa-times mr-1"></i> <?php echo $this->lang->line('cancel') ?? 'Cancel'; ?>
            </button>
            <?php endif; ?>
            <div class="mt-3 <?php echo $has_passport ? 'hidden' : ''; ?>" id="newPreviewWrapper">
                <img id="sponsorPreviewImageNew" class="rounded border shadow w-32 h-32 object-cover"
                     src="<?php echo base_url('assets/img/customer21.png'); ?>"
                     alt="Preview">
            </div>
        </div>
        <input type="hidden" name="passport_cropped" id="passportCropped">
    </div>
</div>

<!-- Hidden Inputs -->
<input type="hidden" name="comp_id" value="<?= htmlspecialchars($comp_id, ENT_QUOTES, 'UTF-8'); ?>">

<input type="hidden" name="customer_id" value="<?= htmlspecialchars($customer->customer_id ?? '', ENT_QUOTES, 'UTF-8'); ?>">

<!-- Action Buttons -->
<div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
    <div class="flex justify-center gap-x-2">
        <button type="submit" class="py-2 px-4 bg-cyan-600 hover:bg-cyan-700 text-white rounded text-sm"><?php echo $this->lang->line('save'); ?></button>
        <button type="reset" class="py-2 px-4 bg-gray-300 hover:bg-gray-400 text-black rounded text-sm"><?php echo $this->lang->line('cancel'); ?></button>
    </div>
</div>

<?php echo form_close(); ?>


            </div>
        </div>

        
   <!-- Cropper Modal -->
<div id="cropperModal" class="hidden fixed z-50 inset-0 bg-black bg-opacity-50 flex items-center justify-center px-2 sm:px-4">
  <div class="bg-white dark:bg-gray-900 flex flex-col p-4 rounded-lg shadow-lg w-full max-w-md sm:max-w-lg md:max-w-xl max-h-[90vh]">

    <!-- Title -->
    <h2 class="text-lg font-bold mb-4 text-gray-800 dark:text-white"><?php echo $this->lang->line('crop_passport'); ?></h2>

    <!-- Scrollable Image Area -->
    <div class="flex-1 overflow-y-auto">
      <img id="cropperImage" class="max-w-full object-contain max-h-[70vh] rounded border mx-auto" alt="To crop">
    </div>

    <!-- Sticky Action Buttons -->
    <div class="mt-4 flex justify-end gap-3 sticky bottom-0 bg-white dark:bg-gray-900 pt-2">
      <button id="cancelCrop" type="button"
        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium px-4 py-2 rounded transition">
        <?php echo $this->lang->line('cancel'); ?>
      </button>
      <button id="cropImage" type="button"
        class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded transition">
        <?php echo $this->lang->line('crop_and_use'); ?>
      </button>
    </div>

  </div>
</div>
<?php if (isset($askReplace) && $askReplace): ?>
<!-- Overlay with blur and semi-transparent -->
<div class="fixed inset-0 z-50 flex items-center justify-center bg-white/20 dark:bg-gray-900/40 backdrop-blur-lg animate-fadeIn p-4">

    <!-- Modal -->
    <div class="bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 p-6 rounded-lg shadow-lg w-full max-w-md animate-scaleIn relative">

        <!-- Close Button -->
       

        <!-- Title -->
     <h3 class="text-lg sm:text-xl font-bold mb-4 text-center uppercase">
    <?php echo $this->lang->line('guarantor_customer'); ?>
</h3>


        <!-- Body -->
        <p class="mb-3 text-sm sm:text-base leading-relaxed">
            <span class="font-medium"><?php echo $this->lang->line('customer_label'); ?>:</span> 
            <strong class="text-gray-800 dark:text-gray-100 uppercase"><?= $customer->f_name . ' ' . $customer->l_name ?></strong>
        </p>

        <p class="mb-3 text-sm sm:text-base leading-relaxed">
            <span class="font-medium"><?php echo $this->lang->line('current_guarantor'); ?>:</span> 
            <strong class="text-gray-800 dark:text-gray-100 uppercase"><?= $sponser->sp_name . ' ' . $sponser->sp_lname ?></strong>
        </p>

       <b>

       <p class="mb-6 text-sm sm:text-base leading-relaxed">
            <?php echo $this->lang->line('guarantee_confirmation_question'); ?>
        </p>
       </b> 

        <!-- Buttons -->
        <form method="post" action="<?= base_url('oficer/handle_sponser_confirmation') ?>">
            <input type="hidden" name="customer_id" value="<?= $customer->customer_id ?>">
            <div class="flex flex-col sm:flex-row justify-between mt-4 gap-3">
                <button type="submit" name="keep" value="1" class="px-4 py-2 bg-green-600 text-white rounded w-full sm:w-auto hover:bg-green-700 dark:hover:bg-green-500 transition">
                    <?php echo $this->lang->line('keep_same_guarantor'); ?>
                </button>
                <button type="submit" name="replace" value="1" class="px-4 py-2 bg-red-600 text-white rounded w-full sm:w-auto hover:bg-red-700 dark:hover:bg-red-500 transition">
                    <?php echo $this->lang->line('change_guarantor'); ?>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Animations -->
<style>
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}
.animate-fadeIn {
    animation: fadeIn .3s ease-out;
}
@keyframes scaleIn {
    from { opacity: 0; transform: scale(.95); }
    to { opacity: 1; transform: scale(1); }
}
.animate-scaleIn {
    animation: scaleIn .25s ease-out;
}
</style>
<?php endif; ?>




</div>







</div>
</div>
<!-- ========== END MAIN CONTENT BODY ========== -->

<?php
include_once APPPATH . "views/partials/footer.php";
?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('sponserForm');
    if(!form) return;

    const modal = document.getElementById('replaceSponserModal');
    const toast = document.getElementById('toast');
    const toastMessage = document.getElementById('toastMessage');

    form.addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent default submit

        var hasExisting = <?php echo $has_passport ? 'true' : 'false'; ?>;
        var cropped = document.getElementById('passportCropped').value;
        if (!hasExisting && !cropped) {
            alert('<?php echo $this->lang->line('please_select_passport') ?? 'Please select a passport photo'; ?>');
            return;
        }

        const formData = new FormData(this);

        fetch(this.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if(data.message){
                // Show toast
                toastMessage.textContent = data.message;
                toast.classList.remove('hidden');
                toast.classList.add('opacity-100');
                setTimeout(() => {
                    toast.classList.add('hidden');
                }, 3000); // hide after 3 sec
            }

            // Fade out and remove modal
            if(modal){
                modal.classList.add('opacity-0', 'transition', 'duration-500');
                setTimeout(() => modal.remove(), 500);
            }
        })
        .catch(err => console.error(err));
    });
});
</script>

<style>
/* Simple fade-in animation */
.animate-fadeIn {
    animation: fadeIn 0.3s ease-out forwards;
}

@keyframes fadeIn {
    from {opacity: 0; transform: scale(0.95);}
    to {opacity: 1; transform: scale(1);}
}
</style>
 
<script>
document.addEventListener('DOMContentLoaded', function () {
    const phoneInput = document.getElementById('sp_phone_no');

    phoneInput.addEventListener('input', function (e) {
        let value = phoneInput.value.replace(/\D/g, ''); // Remove non-digits

        // Format like: 0712 345 678
        if (value.length > 3 && value.length <= 6) {
            value = value.replace(/(\d{3})(\d+)/, '$1 $2');
        } else if (value.length > 6) {
            value = value.replace(/(\d{3})(\d{3})(\d+)/, '$1 $2 $3');
        }

        phoneInput.value = value;
    });

    // On submit, strip formatting so only digits are sent
    phoneInput.form.addEventListener('submit', function () {
        phoneInput.value = phoneInput.value.replace(/\D/g, '');
    });
});
</script>


<script>
let cropper;
let activePassportTarget = null;
let activePassportInput = null;
const cropperModal = document.getElementById('cropperModal');
const cropperImage = document.getElementById('cropperImage');
const sponsorPassportInput = document.getElementById('sponsorPassportInput');
const customerPassportInput = document.getElementById('customerPassportInput');
const sponsorPreviewImage = document.getElementById('sponsorPreviewImage');
const customerPassportPreview = document.getElementById('customerPassportPreview');
const customerPassportTrigger = document.getElementById('customerPassportTrigger');
const customerPassportMessage = document.getElementById('customerPassportMessage');
const passportCropped = document.getElementById('passportCropped');
const customerId = "<?= htmlspecialchars($customer->customer_id ?? '', ENT_QUOTES, 'UTF-8'); ?>";

function openCropperForInput(input, target) {
    if (!input) return;

    input.addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (!file) return;

        activePassportTarget = target;
        activePassportInput = input;

        const reader = new FileReader();
        reader.onload = function (event) {
            cropperImage.src = event.target.result;
            cropperModal.classList.remove('hidden');
            if (cropper) cropper.destroy();
            cropper = new Cropper(cropperImage, {
                aspectRatio: 3 / 4,
                viewMode: 1,
            });
        };
        reader.readAsDataURL(file);
    });
}

openCropperForInput(sponsorPassportInput, 'sponsor');
openCropperForInput(customerPassportInput, 'customer');

if (customerPassportTrigger && customerPassportInput) {
    customerPassportTrigger.addEventListener('click', function () {
        customerPassportInput.click();
    });
}

document.getElementById('cancelCrop').addEventListener('click', () => {
    cropperModal.classList.add('hidden');
    if (activePassportInput) {
        activePassportInput.value = '';
    }
    if (cropper) cropper.destroy();
    activePassportTarget = null;
    activePassportInput = null;
});

document.getElementById('cropImage').addEventListener('click', async () => {
    const canvas = cropper.getCroppedCanvas({
        width: 300,
        height: 400,
    });

    const croppedDataUrl = canvas.toDataURL('image/jpeg');

    if (activePassportTarget === 'sponsor') {
        sponsorPreviewImage.src = croppedDataUrl;
        var newPreview = document.getElementById('sponsorPreviewImageNew');
        if (newPreview) newPreview.src = croppedDataUrl;
        passportCropped.value = croppedDataUrl;
    }

    if (activePassportTarget === 'customer') {
        customerPassportPreview.src = croppedDataUrl;
        if (customerPassportMessage) {
            customerPassportMessage.textContent = 'Uploading passport...';
        }

        try {
            const response = await fetch("<?= base_url('oficer/upload_passport') ?>", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                },
                body: new URLSearchParams({
                    image: croppedDataUrl,
                    customer_id: customerId
                }).toString()
            });

            const text = await response.text();
            if (response.ok && /successfully/i.test(text)) {
                if (customerPassportMessage) {
                    customerPassportMessage.textContent = 'Passport uploaded successfully.';
                }
            } else {
                throw new Error(text || 'Upload failed');
            }
        } catch (error) {
            if (customerPassportMessage) {
                customerPassportMessage.textContent = 'Upload failed. Please try again.';
            }
            console.error(error);
        }
    }

    cropperModal.classList.add('hidden');
    if (cropper) cropper.destroy();
    if (activePassportInput) {
        activePassportInput.value = '';
    }
    activePassportTarget = null;
    activePassportInput = null;
});

function showPassportUpload() {
  document.getElementById('existingPassportSection').classList.add('hidden');
  document.getElementById('passportUploadSection').classList.remove('hidden');
  document.getElementById('newPreviewWrapper').classList.remove('hidden');
}

function cancelPassportChange() {
  document.getElementById('passportUploadSection').classList.add('hidden');
  document.getElementById('existingPassportSection').classList.remove('hidden');
  document.getElementById('sponsorPassportInput').value = '';
  document.getElementById('passportCropped').value = '';
}
</script>
