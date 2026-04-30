<?php
include_once APPPATH . "views/partials/header.php";

$can_edit_notifications = isset($can_edit_notifications) ? (bool)$can_edit_notifications : true;
$can_delete_notifications = isset($can_delete_notifications) ? (bool)$can_delete_notifications : true;
?>
<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-6">

        <!-- Success Message -->
        <?php if ($das = $this->session->flashdata('massage')): ?>
        <div class="bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert">
            <div class="flex">
                <div class="flex-shrink-0">
                    <span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-teal-100 bg-teal-200 text-teal-800 dark:border-teal-900 dark:bg-teal-800 dark:text-teal-500">
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="m9 12 2 2 4-4"></path></svg>
                    </span>
                </div>
                <div class="ms-3">
                    <h3 class="text-gray-800 font-semibold dark:text-white"><?php echo $this->lang->line('success'); ?></h3>
                    <p class="mt-2 text-sm text-gray-700 dark:text-gray-400"><?php echo $das; ?></p>
                </div>
                <div class="ps-3 ms-auto">
                    <button type="button" class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-teal-50 focus:ring-teal-600 dark:bg-transparent dark:hover:bg-teal-800/50 dark:text-teal-600" data-hs-remove-element="[role=alert]">
                        <span class="sr-only"><?php echo $this->lang->line('dismiss'); ?></span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>
                    </button>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Page Header -->
        <div class="bg-gray-100">
            <div class="w-full bg-cyan-600 text-white">
                <div class="flex flex-col max-w-screen-xl px-4 mx-auto md:flex-row md:justify-between md:px-6 lg:px-8">
                    <div class="p-4 flex flex-row items-center justify-between">
                        <a href="#" class="text-lg font-semibold tracking-widest uppercase rounded-lg focus:outline-none focus:shadow-outline">
                            <?php echo $this->lang->line('customer_notifications_advertisements'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Card -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-4 sm:p-6">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                    <h2 class="text-xl font-bold text-gray-800 dark:text-white"><?php echo $this->lang->line('manage_notifications'); ?></h2>
                        <?php if ($can_edit_notifications): ?>
                        <button type="button" 
                            class="inline-flex items-center gap-x-2 px-4 py-2 text-sm font-medium rounded-lg bg-cyan-600 text-white hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            aria-haspopup="dialog" 
                            aria-expanded="false" 
                            aria-controls="hs-create-notification-modal" 
                            data-hs-overlay="#hs-create-notification-modal">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <?php echo $this->lang->line('create_new_notification'); ?>
                    </button>
                    <?php endif; ?>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" id="notification_table">
                        <thead class="bg-cyan-600 dark:bg-cyan-600">
                            <tr>
                                <th scope="col" class="py-3 px-4 text-start text-xs font-semibold uppercase text-white">#</th>
                                <th scope="col" class="py-3 px-4 text-start text-xs font-semibold uppercase text-white"><?php echo $this->lang->line('title'); ?></th>
                                <th scope="col" class="py-3 px-4 text-start text-xs font-semibold uppercase text-white"><?php echo $this->lang->line('type'); ?></th>
                                <th scope="col" class="py-3 px-4 text-start text-xs font-semibold uppercase text-white"><?php echo $this->lang->line('target_audience'); ?></th>
                                <th scope="col" class="py-3 px-4 text-start text-xs font-semibold uppercase text-white"><?php echo $this->lang->line('start_date'); ?></th>
                                <th scope="col" class="py-3 px-4 text-start text-xs font-semibold uppercase text-white"><?php echo $this->lang->line('end_date'); ?></th>
                                <th scope="col" class="py-3 px-4 text-start text-xs font-semibold uppercase text-white"><?php echo $this->lang->line('status'); ?></th>
                                <th scope="col" class="py-3 px-4 text-start text-xs font-semibold uppercase text-white"><?php echo $this->lang->line('created'); ?></th>
                                <th scope="col" class="py-3 px-4 text-start text-xs font-semibold uppercase text-white"><?php echo $this->lang->line('action'); ?></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <?php $no = 1; foreach ($notifications as $notification): ?>
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?= $no++; ?></td>
                                <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200"><strong><?= htmlspecialchars($notification->title); ?></strong></td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm">
                                    <?php if ($notification->notification_type == 'info'): ?>
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800"><?php echo $this->lang->line('info'); ?></span>
                                    <?php elseif ($notification->notification_type == 'warning'): ?>
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800"><?php echo $this->lang->line('warning'); ?></span>
                                    <?php elseif ($notification->notification_type == 'success'): ?>
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800"><?php echo $this->lang->line('success'); ?></span>
                                    <?php else: ?>
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800"><?php echo $this->lang->line('promotion'); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?= ucwords(str_replace('_', ' ', $notification->target_audience)); ?></td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?= date('M d, Y', strtotime($notification->start_date)); ?></td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?= date('M d, Y', strtotime($notification->end_date)); ?></td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm">
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium <?= $notification->is_active == 1 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'; ?>">
                                        <?= $notification->is_active == 1 ? $this->lang->line('active') : $this->lang->line('inactive'); ?>
                                    </span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?= date('M d, Y', strtotime($notification->created_at)); ?></td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm">
                                    <div class="flex gap-2">
                                        <button type="button" 
                                            <?php if (!$can_edit_notifications): ?>disabled<?php endif; ?>
                                                onclick="editNotification(<?= $notification->notification_id; ?>)" 
                                                class="inline-flex items-center px-2 py-1 text-xs font-medium rounded bg-blue-600 text-white hover:bg-blue-700"
                                                title="<?php echo $this->lang->line('edit'); ?>">
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                                     <?php if ($can_delete_notifications): ?>
                                                     <a href="<?= base_url('admin/delete_customer_notification/' . $notification->notification_id); ?>" 
                                           onclick="return confirm('<?php echo $this->lang->line('confirm_delete_notification'); ?>')" 
                                           class="inline-flex items-center px-2 py-1 text-xs font-medium rounded bg-red-600 text-white hover:bg-red-700"
                                           title="<?php echo $this->lang->line('delete'); ?>">
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </a>
                                        <?php endif; ?>
                                        <button type="button" 
                                                <?php if (!$can_edit_notifications): ?>disabled<?php endif; ?>
                                                onclick="toggleStatus(<?= $notification->notification_id; ?>)" 
                                                class="inline-flex items-center px-2 py-1 text-xs font-medium rounded <?= $notification->is_active == 1 ? 'bg-yellow-600 text-white hover:bg-yellow-700' : 'bg-green-600 text-white hover:bg-green-700'; ?>"
                                                title="<?= $notification->is_active == 1 ? $this->lang->line('deactivate') : $this->lang->line('activate'); ?>">
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create Notification Modal -->
<div id="hs-create-notification-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all lg:max-w-4xl lg:w-full m-3 lg:mx-auto">
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            
            <!-- Modal Header -->
            <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                <h3 class="font-bold text-gray-800 dark:text-white"><?php echo $this->lang->line('create_new_notification'); ?></h3>
                <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" data-hs-overlay="#hs-create-notification-modal">
                    <span class="sr-only"><?php echo $this->lang->line('close'); ?></span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
            </div>

            <?php echo form_open("admin/create_customer_notification"); ?>
            <!-- Modal Body -->
            <div class="p-4 sm:p-6">
                <div class="grid sm:grid-cols-12 gap-4 sm:gap-6">
                    
                    <div class="sm:col-span-12">
                           <label for="title" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('title'); ?>:</label>
                        <input type="text" id="title" name="title" 
                               placeholder="<?php echo $this->lang->line('enter_notification_title'); ?>"
                               class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" 
                               required>
                    </div>

                    <div class="sm:col-span-12">
                        <label for="message" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('message'); ?>:</label>
                        <textarea id="message" name="message" rows="4" 
                                  placeholder="<?php echo $this->lang->line('enter_notification_message'); ?>"
                                  class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" 
                                  required></textarea>
                    </div>

                    <div class="sm:col-span-6">
                        <label for="notification_type" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('notification_type'); ?>:</label>
                        <select id="notification_type" name="notification_type" 
                                class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" 
                                required>
                            <option value=""><?php echo $this->lang->line('select_type'); ?></option>
                            <option value="info"><?php echo $this->lang->line('info_blue'); ?></option>
                            <option value="warning"><?php echo $this->lang->line('warning_yellow'); ?></option>
                            <option value="success"><?php echo $this->lang->line('success_green'); ?></option>
                            <option value="promotion"><?php echo $this->lang->line('promotion_purple'); ?></option>
                        </select>
                    </div>

                    <div class="sm:col-span-6">
                        <label for="target_audience" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('target_audience'); ?>:</label>
                        <select id="target_audience" name="target_audience" 
                                class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" 
                                required>
                            <option value=""><?php echo $this->lang->line('select_audience'); ?></option>
                            <option value="all"><?php echo $this->lang->line('all_customers'); ?></option>
                            <option value="active_loans"><?php echo $this->lang->line('customers_with_active_loans'); ?></option>
                            <option value="completed_loans"><?php echo $this->lang->line('customers_with_completed_loans'); ?></option>
                        </select>
                    </div>

                    <div class="sm:col-span-6">
                        <label for="start_date" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('start_date'); ?>:</label>
                        <input type="date" id="start_date" name="start_date" 
                               value="<?= date('Y-m-d'); ?>"
                               class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" 
                               required>
                    </div>

                    <div class="sm:col-span-6">
                        <label for="end_date" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('end_date'); ?>:</label>
                        <input type="date" id="end_date" name="end_date" 
                               class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" 
                               required>
                    </div>

                </div>

                <!-- Action Buttons -->
                <div class="mt-6 flex justify-end items-center gap-x-2">
                    <button type="button" 
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700" 
                            data-hs-overlay="#hs-create-notification-modal">
                        <?php echo $this->lang->line('close'); ?>
                    </button>
                    <button type="submit" 
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-cyan-600 text-white hover:bg-cyan-700">
                        <?php echo $this->lang->line('create_notification'); ?>
                    </button>
                </div>
            </div>
            <?php echo form_close(); ?>

        </div>
    </div>
</div>

<!-- Edit Notification Modal -->
<div id="hs-edit-notification-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all lg:max-w-4xl lg:w-full m-3 lg:mx-auto">
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            
            <!-- Modal Header -->
            <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                <h3 class="font-bold text-gray-800 dark:text-white"><?php echo $this->lang->line('edit_notification'); ?></h3>
                <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" data-hs-overlay="#hs-edit-notification-modal">
                    <span class="sr-only"><?php echo $this->lang->line('close'); ?></span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
            </div>

            <?php echo form_open("admin/edit_customer_notification", ['id' => 'editForm']); ?>
            <input type="hidden" name="notification_id" id="edit_notification_id">
            
            <!-- Modal Body -->
            <div class="p-4 sm:p-6">
                <div class="grid sm:grid-cols-12 gap-4 sm:gap-6">
                    
                    <div class="sm:col-span-12">
                        <label for="edit_title" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('title'); ?>:</label>
                        <input type="text" id="edit_title" name="title" 
                               class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" 
                               required>
                    </div>

                    <div class="sm:col-span-12">
                        <label for="edit_message" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('message'); ?>:</label>
                        <textarea id="edit_message" name="message" rows="4" 
                                  class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" 
                                  required></textarea>
                    </div>

                    <div class="sm:col-span-6">
                        <label for="edit_notification_type" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('notification_type'); ?>:</label>
                        <select id="edit_notification_type" name="notification_type" 
                                class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" 
                                required>
                            <option value="info"><?php echo $this->lang->line('info_blue'); ?></option>
                            <option value="warning"><?php echo $this->lang->line('warning_yellow'); ?></option>
                            <option value="success"><?php echo $this->lang->line('success_green'); ?></option>
                            <option value="promotion"><?php echo $this->lang->line('promotion_purple'); ?></option>
                        </select>
                    </div>

                    <div class="sm:col-span-6">
                        <label for="edit_target_audience" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('target_audience'); ?>:</label>
                        <select id="edit_target_audience" name="target_audience" 
                                class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" 
                                required>
                            <option value="all"><?php echo $this->lang->line('all_customers'); ?></option>
                            <option value="active_loans"><?php echo $this->lang->line('customers_with_active_loans'); ?></option>
                            <option value="completed_loans"><?php echo $this->lang->line('customers_with_completed_loans'); ?></option>
                        </select>
                    </div>

                    <div class="sm:col-span-6">
                        <label for="edit_start_date" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('start_date'); ?>:</label>
                        <input type="date" id="edit_start_date" name="start_date" 
                               class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" 
                               required>
                    </div>

                    <div class="sm:col-span-6">
                        <label for="edit_end_date" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('end_date'); ?>:</label>
                        <input type="date" id="edit_end_date" name="end_date" 
                               class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" 
                               required>
                    </div>

                    <div class="sm:col-span-6">
                        <label for="edit_is_active" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('status'); ?>:</label>
                        <select id="edit_is_active" name="is_active" 
                                class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" 
                                required>
                            <option value="1"><?php echo $this->lang->line('active'); ?></option>
                            <option value="0"><?php echo $this->lang->line('inactive'); ?></option>
                        </select>
                    </div>

                </div>

                <!-- Action Buttons -->
                <div class="mt-6 flex justify-end items-center gap-x-2">
                    <button type="button" 
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700" 
                            data-hs-overlay="#hs-edit-notification-modal">
                        <?php echo $this->lang->line('close'); ?>
                    </button>
                    <button type="submit" 
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-cyan-600 text-white hover:bg-cyan-700">
                        <?php echo $this->lang->line('update_notification'); ?>
                    </button>
                </div>
            </div>
            <?php echo form_close(); ?>

        </div>
    </div>
</div>

<script>
// Store notifications data for editing
var notificationsData = <?= json_encode($notifications); ?>;

function editNotification(id) {
    var notification = notificationsData.find(n => n.notification_id == id);
    
    if (notification) {
        document.getElementById('edit_notification_id').value = notification.notification_id;
        document.getElementById('edit_title').value = notification.title;
        document.getElementById('edit_message').value = notification.message;
        document.getElementById('edit_notification_type').value = notification.notification_type;
        document.getElementById('edit_target_audience').value = notification.target_audience;
        document.getElementById('edit_start_date').value = notification.start_date;
        document.getElementById('edit_end_date').value = notification.end_date;
        document.getElementById('edit_is_active').value = notification.is_active;
        
        // Open modal using Preline
        HSOverlay.open(document.getElementById('hs-edit-notification-modal'));
    }
}

function toggleStatus(id) {
    if (confirm('<?php echo $this->lang->line('confirm_toggle_notification_status'); ?>')) {
        fetch('<?= base_url("admin/toggle_notification_status/"); ?>' + id, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('<?php echo $this->lang->line('failed_toggle_notification_status'); ?>');
        });
    }
}
</script>

<?php
include_once APPPATH . "views/partials/footer.php";
?>
