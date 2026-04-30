<?php
include_once APPPATH . "views/partials/header.php";
?>

<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-6">

        <?php if ($das = $this->session->flashdata('massage')): ?>
        <div class="bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert">
            <div class="flex">
                <div class="flex-shrink-0"><span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-teal-100 bg-teal-200 text-teal-800 dark:border-teal-900 dark:bg-teal-800 dark:text-teal-500"><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="m9 12 2 2 4-4"></path></svg></span></div>
                <div class="ms-3"><h3 class="text-gray-800 font-semibold dark:text-white"><?php echo $this->lang->line('success'); ?></h3><p class="mt-2 text-sm text-gray-700 dark:text-gray-400"><?php echo $das;?></p></div>
                <div class="ps-3 ms-auto"><button type="button" class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-teal-50 focus:ring-teal-600 dark:bg-transparent dark:hover:bg-teal-800/50 dark:text-teal-600" data-hs-remove-element="[role=alert]"><span class="sr-only"><?php echo $this->lang->line('dismiss'); ?></span><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg></button></div>
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
                    <div class="image overflow-hidden">
                    <?php if (!empty($customer->passport)): ?>
    <img class="h-auto w-full mx-auto rounded-full" src="<?= base_url($customer->passport) ?>" alt="Customer Passport">
<?php else: ?>
    <img class="h-auto w-full mx-auto rounded-full" src="<?= base_url('assets/img/customer21.png') ?>" alt="Customer Image">
<?php endif; ?>


                    </div>
                    <h1 class="text-green-500 font-bold text-xl leading-8 my-1 dark:text-neutral-900 text-center">
                        <?= strtoupper($customer->f_name) . " " . strtoupper(substr($customer->m_name, 0, 1)) . " " . strtoupper($customer->l_name) ?>
                    </h1>
                    <h1 class="text-center font-semibold"><?= $customer->phone_no ;?></h1>
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
                                <th class="py-3 px-6 text-left"><?php echo $this->lang->line('sno'); ?></th>
                                <th class="py-3 px-6 text-left"><?php echo $this->lang->line('full_name'); ?></th>
                                <th class="py-3 px-6 text-left"><?php echo $this->lang->line('mobile_no'); ?></th>
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
                                    <td colspan="6" class="text-center py-4 text-gray-500"><?php echo $this->lang->line('no_guarantors_found'); ?></td>
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
                  <?php echo $this->lang->line('register_guarantor'); ?>

                </h3>
  <?php
$action = site_url("admin/create_sponser/{$customer->customer_id}/{$customer->comp_id}");
echo form_open($action);
?>




<div class="grid sm:grid-cols-12 gap-4 sm:gap-6">
    <div class="sm:col-span-4">
        <label for="sp_name" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('first_name'); ?>:</label>
        <input type="text" id="sp_name" name="sp_name" placeholder="<?php echo $this->lang->line('guarantor_first_name_placeholder'); ?>" autocomplete="off" required
               class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
               value="<?php echo set_value('sp_name', isset($sponser->sp_name) ? $sponser->sp_name : ''); ?>">
        <?php echo form_error("sp_name", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
    </div>

    <div class="sm:col-span-4">
        <label for="sp_mname" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('middle_name'); ?>:</label>
        <input type="text" id="sp_mname" name="sp_mname" placeholder="<?php echo $this->lang->line('guarantor_middle_name_placeholder'); ?>" autocomplete="off" required
               class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
               value="<?php echo set_value('sp_mname', isset($sponser->sp_mname) ? $sponser->sp_mname : ''); ?>">
        <?php echo form_error("sp_mname", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
    </div>

    <div class="sm:col-span-4">
        <label for="sp_lname" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('last_name'); ?>:</label>
        <input type="text" id="sp_lname" name="sp_lname" placeholder="<?php echo $this->lang->line('guarantor_last_name_placeholder'); ?>" autocomplete="off" required
               class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
               value="<?php echo set_value('sp_lname', isset($sponser->sp_lname) ? $sponser->sp_lname : ''); ?>">
        <?php echo form_error("sp_lname", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
    </div>

    <div class="sm:col-span-4">
        <label for="sp_phone_no" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('phone_number'); ?>:</label>
        <input type="number" id="sp_phone_no" name="sp_phone_no" placeholder="<?php echo $this->lang->line('guarantor_phone_placeholder'); ?>" autocomplete="off" required
               class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
               value="<?php echo set_value('sp_phone_no', isset($sponser->sp_phone_no) ? $sponser->sp_phone_no : ''); ?>">
        <?php echo form_error("sp_phone_no", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
    </div>

    <div class="sm:col-span-4">
        <label for="sp_relation" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('relationship_with_customer'); ?>:</label>
        <input type="text" id="sp_relation" name="sp_relation" placeholder="<?php echo $this->lang->line('relationship_placeholder'); ?>" autocomplete="off" required
               class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
               value="<?php echo set_value('sp_relation', isset($sponser->sp_relation) ? $sponser->sp_relation : ''); ?>">
        <?php echo form_error("sp_relation", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
    </div>

    <div class="sm:col-span-4">
        <label for="nature" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('guarantor_business'); ?>:</label>
        <input type="text" id="nature" name="nature" placeholder="<?php echo $this->lang->line('guarantor_business_placeholder'); ?>" autocomplete="off" required
               class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
               value="<?php echo set_value('nature', isset($sponser->nature) ? $sponser->nature : ''); ?>">
        <?php echo form_error("nature", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
    </div>
</div>

<input type="hidden" name="comp_id" value="<?php echo htmlspecialchars($_SESSION['comp_id'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
<input type="hidden" name="customer_id" value="<?php echo htmlspecialchars($customer->customer_id ?? '', ENT_QUOTES, 'UTF-8'); ?>">

<div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
    <div class="flex justify-center gap-x-2">
        <button type="submit" class="py-2 px-4 btn-primary-sm bg-cyan-600 hover:bg-cyan-700 text-white"><?php echo $this->lang->line('save'); ?></button>
        <button type="reset" class="py-2 px-4 btn-secondary-sm"><?php echo $this->lang->line('cancel'); ?></button>
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
