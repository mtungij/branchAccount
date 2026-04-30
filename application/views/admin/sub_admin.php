<?php include_once APPPATH . "views/partials/header.php"; ?>
	


<?php

// Dummy data for employee list - replace with your actual $employee data from controller
$employee = isset($employee) && is_array($employee) ? $employee : [
    (object)[
        'empl_id' => 1, 'empl_name' => 'John Doe', 'empl_no' => '0712345678', 'empl_email' => 'john@example.com',
        'blanch_name' => 'Main Branch', 'salary' => 5000000, 'bank_account' => 'NMB', 'account_no' => '1234567890123', 'empl_status' => 'open',
        'position_id' => 1, 'position' => 'Manager', 'username' => 'johnd', 'empl_sex' => 'male', 'pays' => 'yes', 'pay_nssf' => 'yes'
    ],
    (object)[
        'empl_id' => 2, 'empl_name' => 'Jane Smith', 'empl_no' => '0787654321', 'empl_email' => 'jane@example.com',
        'blanch_name' => 'West Branch', 'salary' => 4500000, 'bank_account' => 'CRDB', 'account_no' => '0987654321098', 'empl_status' => 'close',
        'position_id' => 2, 'position' => 'Accountant', 'username' => 'janes', 'empl_sex' => 'female', 'pays' => 'yes', 'pay_nssf' => 'no'
    ],
];
// Dummy data for branches and positions for the modal form
$blanch = [(object)['blanch_id' => 1, 'blanch_name' => 'Main Branch'], (object)['blanch_id' => 2, 'blanch_name' => 'West Branch']];
$position = [(object)['position_id' => 1, 'position' => 'Manager'], (object)['position_id' => 2, 'position' => 'Accountant']];

?>

<!-- Card: Employee List Table -->
<div class="flex flex-col lg:ps-64 bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
  <!-- Header -->
  <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
    <div>
      <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
        <svg class="inline-block size-5 -mt-1 me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"> <!-- List Bullet Icon -->
          <path fill-rule="evenodd" d="M2 4.75A.75.75 0 0 1 2.75 4h14.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 4.75ZM2 10a.75.75 0 0 1 .75-.75h14.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 10Zm0 5.25a.75.75 0 0 1 .75-.75h14.5a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
        </svg>
        Employee List
      </h2>
      <p class="text-sm text-gray-600 dark:text-gray-400">
        Manage registered employees.
      </p>
    </div>

    <div>
      <div class="inline-flex gap-x-2">
        <?php /* Optional: Add New Record Button
        <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-cyan-600 text-white hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 disabled:pointer-events-none" href="#">
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M5 12h14" />
            <path d="M12 5v14" />
          </svg>
          New Record
        </a>
        */ ?>
      </div>
    </div>
  </div>
  <!-- End Header -->

  <!-- Table -->
  <div class="overflow-x-auto">
    <div class="p-1.5 min-w-full inline-block align-middle">
      <div class="border rounded-lg overflow-hidden dark:border-gray-700">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" id="employee_table"> <?php // Added id for potential JS datatable initialization ?>
          <thead class="bg-gray-50 dark:bg-gray-700">
            <tr>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400">S/No.</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400">Name</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400">Phone</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400">Email</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400">Branch</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400">Salary</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400">Bank</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400">Acc. No</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400">Status</th>
              <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-gray-400">Action</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
            <?php $no = 1; ?>
            <?php foreach($employee as $emp): ?>
            <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200"><?php echo $no++; ?>.</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo htmlspecialchars($emp->empl_name, ENT_QUOTES, 'UTF-8'); ?></td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo htmlspecialchars($emp->empl_no, ENT_QUOTES, 'UTF-8'); ?></td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo htmlspecialchars($emp->empl_email, ENT_QUOTES, 'UTF-8'); ?></td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo htmlspecialchars($emp->blanch_name, ENT_QUOTES, 'UTF-8'); ?></td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo number_format($emp->salary); ?>/=</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo htmlspecialchars($emp->bank_account, ENT_QUOTES, 'UTF-8'); ?></td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo htmlspecialchars($emp->account_no, ENT_QUOTES, 'UTF-8'); ?></td>
              <td class="px-6 py-4 whitespace-nowrap text-sm">
                <?php if ($emp->empl_status == 'open'): ?>
                  <span class="py-1 px-2.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                    <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>
                    Active
                  </span>
                <?php elseif ($emp->empl_status == 'close'): ?>
                  <span class="py-1 px-2.5 inline-flex items-center gap-x-1 text-xs font-medium bg-red-100 text-red-800 rounded-full dark:bg-red-500/10 dark:text-red-500">
                    <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/></svg>
                    Blocked
                  </span>
                <?php endif; ?>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                  <button id="hs-table-dropdown-<?php echo $emp->empl_id; ?>" type="button" class="hs-dropdown-toggle py-1.5 px-2.5 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700">
                    Action
                    <svg class="hs-dropdown-open:rotate-180 size-2.5" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                  </button>
                  <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-40 z-10 bg-white shadow-2xl rounded-lg p-2 mt-2 dark:divide-gray-700 dark:bg-gray-800 dark:border dark:border-gray-700" aria-labelledby="hs-table-dropdown-<?php echo $emp->empl_id; ?>">
                    <div class="py-2 first:pt-0 last:pb-0">
                      <span class="block py-2 px-3 text-xs font-medium uppercase text-gray-400 dark:text-gray-500">
                        Choose an option
                      </span>
                      <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-cyan-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                         href="#" data-hs-overlay="#hs-view-employee-modal-<?php echo $emp->empl_id; ?>">
                        <!-- View Icon (e.g., Eye) -->
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M10 12.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" /><path fill-rule="evenodd" d="M.664 10.59a1.651 1.651 0 0 1 0-1.18l.879-.879a1.651 1.651 0 0 1 2.335 0l.879.879a1.651 1.651 0 0 1 0 2.334l-.879.879a1.651 1.651 0 0 1-2.335 0l-.879-.879ZM12.5 9.335l.879-.879a1.651 1.651 0 0 1 2.335 0l.879.879a1.651 1.651 0 0 1 0 2.334l-.879.879a1.651 1.651 0 0 1-2.335 0l-.879-.879a1.651 1.651 0 0 1 0-2.334Z" clip-rule="evenodd" /></svg>
                        View
                      </a>
                      <?php if ($emp->empl_status == 'open'): ?>
                        <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-red-600 hover:bg-red-50 focus:ring-2 focus:ring-red-500 dark:text-red-500 dark:hover:bg-gray-700"
                           href="<?php echo base_url("admin/block_employee_url/{$emp->empl_id}"); // Replace with actual block URL ?>" onclick="return confirm('Are you sure you want to block this employee?')">
                          <!-- Block Icon (e.g., NoSymbolIcon) -->
                          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16ZM8.28 7.22a.75.75 0 0 0-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 1 0 1.06 1.06L10 11.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L11.06 10l1.72-1.72a.75.75 0 0 0-1.06-1.06L10 8.94 8.28 7.22Z" clip-rule="evenodd" /></svg>
                          Block
                        </a>
                      <?php elseif($emp->empl_status == 'close'): ?>
                        <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-teal-600 hover:bg-teal-50 focus:ring-2 focus:ring-teal-500 dark:text-teal-500 dark:hover:bg-gray-700"
                           href="<?php echo base_url("admin/unblock_employee_url/{$emp->empl_id}"); // Replace with actual unblock URL ?>" onclick="return confirm('Are you sure you want to unblock this employee?')">
                          <!-- Unblock Icon (e.g., CheckCircleIcon) -->
                          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" /></svg>
                          Unblock
                        </a>
                      <?php endif;  ?>
                    </div>
                    <div class="py-2 first:pt-0 last:pb-0">
                       <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-red-600 hover:bg-red-50 focus:ring-2 focus:ring-red-500 dark:text-red-500 dark:hover:bg-gray-700"
                         href="<?php echo base_url("admin/delete_employee/{$emp->empl_id}"); ?>" onclick="return confirm('Are you sure you want to delete this employee?')">
                        <!-- Delete Icon (e.g., TrashIcon) -->
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 0 0 6 3.75H4.5a.75.75 0 0 0 0 1.5h11a.75.75 0 0 0 0-1.5H14A2.75 2.75 0 0 0 11.25 1h-2.5ZM10 4c.84 0 1.532.647 1.708 1.5H8.292C8.468 4.647 9.16 4 10 4ZM7.5 7.25c0 .414.336.75.75.75h3.5a.75.75 0 0 0 .75-.75V7a.75.75 0 0 0-.75-.75h-3.5A.75.75 0 0 0 7.5 7v.25ZM12.5 7a.75.75 0 0 1-.75.75H7.5A.75.75 0 0 1 6 7.25V7a.75.75 0 0 1 .75-.75h5.5a.75.75 0 0 1 .75.75v.25Z" clip-rule="evenodd" /><path d="M4.75 9.25a.75.75 0 0 0-.75.75V15a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-5a.75.75 0 0 0-.75-.75H4.75Z" /></svg>
                        Delete
                      </a>
                    </div>
                  </div>
                </div>
              </td>
            </tr>

            <!-- Modal for View/Edit Employee -->
            <div id="hs-view-employee-modal-<?php echo $emp->empl_id; ?>" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
              <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all lg:max-w-4xl lg:w-full m-3 lg:mx-auto">
                <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-gray-700/70">
                  <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                    <h3 class="font-bold text-gray-800 dark:text-white">
                      View/Edit Employee: <?php echo htmlspecialchars($emp->empl_name, ENT_QUOTES, 'UTF-8'); ?>
                    </h3>
                    <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700" data-hs-overlay="#hs-view-employee-modal-<?php echo $emp->empl_id; ?>">
                      <span class="sr-only">Close</span>
                      <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                    </button>
                  </div>
                  <div class="p-4 sm:p-6 overflow-y-auto">
                    <?php echo form_open("admin/modify_employee/{$emp->empl_id}"); ?>
                      <div class="grid sm:grid-cols-12 gap-4 sm:gap-6">
                        <?php // Full Name ?>
                        <div class="sm:col-span-4">
                          <label for="modal_empl_name_<?php echo $emp->empl_id; ?>" class="block text-sm font-medium mb-2 dark:text-gray-300">*Full name:</label>
                          <input type="text" id="modal_empl_name_<?php echo $emp->empl_id; ?>" name="empl_name" value="<?php echo htmlspecialchars($emp->empl_name, ENT_QUOTES, 'UTF-8'); ?>" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required>
                        </div>
                        <?php // Mobile No ?>
                        <div class="sm:col-span-4">
                          <label for="modal_empl_no_<?php echo $emp->empl_id; ?>" class="block text-sm font-medium mb-2 dark:text-gray-300">*Mobile No:</label>
                          <input type="number" id="modal_empl_no_<?php echo $emp->empl_id; ?>" name="empl_no" value="<?php echo htmlspecialchars($emp->empl_no, ENT_QUOTES, 'UTF-8'); ?>" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required>
                        </div>
                        <?php // Email ?>
                        <div class="sm:col-span-4">
                          <label for="modal_empl_email_<?php echo $emp->empl_id; ?>" class="block text-sm font-medium mb-2 dark:text-gray-300">*Email:</label>
                          <input type="email" id="modal_empl_email_<?php echo $emp->empl_id; ?>" name="empl_email" value="<?php echo htmlspecialchars($emp->empl_email, ENT_QUOTES, 'UTF-8'); ?>" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required>
                        </div>

                        <?php // Branch ?>
                        <div class="sm:col-span-3">
                          <label for="modal_blanch_id_<?php echo $emp->empl_id; ?>" class="block text-sm font-medium mb-2 dark:text-gray-300">*Branch:</label>
                          <select id="modal_blanch_id_<?php echo $emp->empl_id; ?>" name="blanch_id" class="py-2.5 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required>
                            <?php foreach ($blanch as $bl): ?>
                              <option value="<?php echo htmlspecialchars($bl->blanch_id, ENT_QUOTES, 'UTF-8'); ?>" <?php echo ($emp->blanch_name == $bl->blanch_name) ? 'selected' : ''; // Adjust comparison if IDs are available and preferred ?>>
                                <?php echo htmlspecialchars($bl->blanch_name, ENT_QUOTES, 'UTF-8'); ?>
                              </option>
                            <?php endforeach; ?>
                          </select>
                        </div>

                        <?php // Position ?>
                         <div class="sm:col-span-3">
                          <label for="modal_position_id_<?php echo $emp->empl_id; ?>" class="block text-sm font-medium mb-2 dark:text-gray-300">*Position:</label>
                          <select id="modal_position_id_<?php echo $emp->empl_id; ?>" name="position_id" class="py-2.5 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required>
                            <?php foreach ($position as $pos): ?>
                              <option value="<?php echo htmlspecialchars($pos->position_id, ENT_QUOTES, 'UTF-8'); ?>" <?php echo ($emp->position_id == $pos->position_id) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($pos->position, ENT_QUOTES, 'UTF-8'); ?>
                              </option>
                            <?php endforeach; ?>
                          </select>
                        </div>

                        <?php // Username ?>
                        <div class="sm:col-span-3">
                          <label for="modal_username_<?php echo $emp->empl_id; ?>" class="block text-sm font-medium mb-2 dark:text-gray-300">*Username:</label>
                          <input type="text" id="modal_username_<?php echo $emp->empl_id; ?>" name="username" value="<?php echo htmlspecialchars($emp->username, ENT_QUOTES, 'UTF-8'); ?>" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                        </div>
                        
                        <?php // Sex ?>
                        <div class="sm:col-span-3">
                          <label for="modal_empl_sex_<?php echo $emp->empl_id; ?>" class="block text-sm font-medium mb-2 dark:text-gray-300">*Sex:</label>
                          <select id="modal_empl_sex_<?php echo $emp->empl_id; ?>" name="empl_sex" class="py-2.5 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                            <option value="male" <?php echo ($emp->empl_sex == 'male') ? 'selected' : ''; ?>>Male</option>
                            <option value="female" <?php echo ($emp->empl_sex == 'female') ? 'selected' : ''; ?>>Female</option>
                          </select>
                        </div>

                        <?php // Salary Amount ?>
                        <div class="sm:col-span-4">
                          <label for="modal_salary_<?php echo $emp->empl_id; ?>" class="block text-sm font-medium mb-2 dark:text-gray-300">*Salary Amount:</label>
                          <input type="number" id="modal_salary_<?php echo $emp->empl_id; ?>" name="salary" value="<?php echo htmlspecialchars($emp->salary, ENT_QUOTES, 'UTF-8'); ?>" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                        </div>
                        <?php // Payee ?>
                        <div class="sm:col-span-4">
                          <label for="modal_pays_<?php echo $emp->empl_id; ?>" class="block text-sm font-medium mb-2 dark:text-gray-300">*Payee:</label>
                          <select id="modal_pays_<?php echo $emp->empl_id; ?>" name="pays" class="py-2.5 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                            <option value="yes" <?php echo ($emp->pays == 'yes') ? 'selected' : ''; ?>>Yes</option>
                            <option value="no" <?php echo ($emp->pays == 'no') ? 'selected' : ''; ?>>No</option>
                          </select>
                        </div>
                        <?php // Pay NSSF ?>
                        <div class="sm:col-span-4">
                          <label for="modal_pay_nssf_<?php echo $emp->empl_id; ?>" class="block text-sm font-medium mb-2 dark:text-gray-300">*Pay NSSF:</label>
                          <select id="modal_pay_nssf_<?php echo $emp->empl_id; ?>" name="pay_nssf" class="py-2.5 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                            <option value="yes" <?php echo ($emp->pay_nssf == 'yes') ? 'selected' : ''; ?>>Yes</option>
                            <option value="no" <?php echo ($emp->pay_nssf == 'no') ? 'selected' : ''; ?>>No</option>
                          </select>
                        </div>

                        <?php // Bank Account ?>
                        <div class="sm:col-span-6">
                          <label for="modal_bank_account_<?php echo $emp->empl_id; ?>" class="block text-sm font-medium mb-2 dark:text-gray-300">*Bank Account:</label>
                          <select id="modal_bank_account_<?php echo $emp->empl_id; ?>" name="bank_account" class="py-2.5 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required>
                            <option value="<?php echo htmlspecialchars($emp->bank_account, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($emp->bank_account, ENT_QUOTES, 'UTF-8'); ?></option>
                            <option value="NMB">NMB</option>
                            <option value="CRDB">CRDB</option>
                            <option value="TPB">TPB</option>
                            <option value="NBC">NBC</option>
                            <option value="EQTY">EQTY</option>
                          </select>
                        </div>
                        <?php // Account Number ?>
                        <div class="sm:col-span-6">
                          <label for="modal_account_no_<?php echo $emp->empl_id; ?>" class="block text-sm font-medium mb-2 dark:text-gray-300">*Account Number:</label>
                          <input type="text" id="modal_account_no_<?php echo $emp->empl_id; ?>" name="account_no" value="<?php echo htmlspecialchars($emp->account_no, ENT_QUOTES, 'UTF-8'); ?>" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required>
                        </div>
                      </div>
                      <div class="mt-6 flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-gray-700">
                        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700" data-hs-overlay="#hs-view-employee-modal-<?php echo $emp->empl_id; ?>">
                          Close
                        </button>
                        <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-cyan-600 text-white hover:bg-cyan-700">
                          Update Changes
                        </button>
                      </div>
                    <?php echo form_close(); ?>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Modal -->

            <?php endforeach; ?>
          </tbody>
          <?php if(empty($employee)): ?>
            <tfoot>
                <tr>
                    <td colspan="10" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                        No employees found.
                    </td>
                </tr>
            </tfoot>
          <?php endif; ?>
        </table>
      </div>
    </div>
  </div>
  <!-- End Table -->

  <?php // Optional: Table Footer for Pagination (if not using JS Datatables)
  /*
  <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:border-gray-700">
    <div>
      <p class="text-sm text-gray-600 dark:text-gray-400">
        <span class="font-semibold text-gray-800 dark:text-gray-200"><?php echo count($employee); ?></span> results
      </p>
    </div>
    <div>
      <div class="inline-flex gap-x-2">
        <button type="button" class="py-1.5 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700">
          Prev
        </button>
        <button type="button" class="py-1.5 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700">
          Next
        </button>
      </div>
    </div>
  </div>
  */
  ?>
</div>
<!-- End Card: Employee List Table -->
				
<?php include_once APPPATH . "views/partials/footer.php"; ?>