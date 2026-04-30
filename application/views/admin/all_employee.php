
<?php
include_once APPPATH . "views/partials/header.php";

$is_super_admin = ($this->session->userdata('role') === 'admin');
$loan_officer_id = isset($loan_officer_id) ? (int) $loan_officer_id : 0;
$branch_manager_total = isset($branch_manager_total) ? (int) $branch_manager_total : 0;
$loan_officer_total = isset($loan_officer_total) ? (int) $loan_officer_total : 0;
$management_total = isset($management_total) ? (int) $management_total : 0;
$staff_filter = isset($staff_filter) ? (string) $staff_filter : '';
$officer_permissions_by_employee = $officer_permissions_by_employee ?? [];

$officer_action_labels = [
  'officer payment dashboard' => ['can_view' => 'View Payment Dashboard', 'can_edit' => 'Make Payment', 'can_delete' => 'Delete'],
  'officer customer' => ['can_view' => 'View Customers', 'can_edit' => 'Register Customer', 'can_delete' => 'Delete'],
  'officer loan application' => ['can_view' => 'View Loan Applications', 'can_edit' => 'Apply Loan', 'can_delete' => 'Delete'],
  'officer approve loan' => ['can_view' => 'View Loans', 'can_edit' => 'Approve Loan', 'can_delete' => 'Reject Loan'],
];

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


<div class="w-full lg:ps-64">
  <div class="= overflow-x-auto">


<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
    <div class="w-full">
        <!-- Start coding here -->
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                              
                            </div>
                            <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" 
								placeholder="<?php echo $this->lang->line('search_staff'); ?>"
        data-hs-datatable-search="#shareholder_table"
        aria-label="Search share holders"
							>
                        </div>
                    </form>
                </div>
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
      	                  <a href="<?php echo base_url('admin/all_employee'); ?>"
                    class="inline-flex items-center justify-center gap-x-2 rounded-full border px-3 py-2 text-sm font-medium <?php echo $staff_filter === '' ? 'border-cyan-200 bg-cyan-100 text-cyan-700 dark:border-cyan-700 dark:bg-cyan-900/40 dark:text-cyan-300' : 'border-gray-200 bg-white text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300'; ?>">
                      <span>All Employees</span>
                  </a>

                  <a href="<?php echo base_url('admin/all_employee?staff_filter=branch_manager'); ?>"
                    class="inline-flex items-center justify-center gap-x-2 rounded-full border px-3 py-2 text-sm font-medium <?php echo $staff_filter === 'branch_manager' ? 'border-emerald-200 bg-emerald-100 text-emerald-700 dark:border-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-300' : 'border-gray-200 bg-white text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300'; ?>">
                      <span>Branch Managers</span>
                      <span class="inline-flex min-w-6 justify-center rounded-full bg-white/80 px-2 py-0.5 text-xs dark:bg-gray-900/70"><?php echo $branch_manager_total; ?></span>
                  </a>

                  <a href="<?php echo base_url('admin/all_employee?staff_filter=loan_officer'); ?>"
                    class="inline-flex items-center justify-center gap-x-2 rounded-full border px-3 py-2 text-sm font-medium <?php echo $staff_filter === 'loan_officer' ? 'border-blue-200 bg-blue-100 text-blue-700 dark:border-blue-700 dark:bg-blue-900/40 dark:text-blue-300' : 'border-gray-200 bg-white text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300'; ?>">
                      <span>Loan Officers</span>
                      <span class="inline-flex min-w-6 justify-center rounded-full bg-white/80 px-2 py-0.5 text-xs dark:bg-gray-900/70"><?php echo $loan_officer_total; ?></span>
                  </a>

                  <a href="<?php echo base_url('admin/all_employee?staff_filter=management'); ?>"
                    class="inline-flex items-center justify-center gap-x-2 rounded-full border px-3 py-2 text-sm font-medium <?php echo $staff_filter === 'management' ? 'border-violet-200 bg-violet-100 text-violet-700 dark:border-violet-700 dark:bg-violet-900/40 dark:text-violet-300' : 'border-gray-200 bg-white text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300'; ?>">
                      <span>Management</span>
                      <span class="inline-flex min-w-6 justify-center rounded-full bg-white/80 px-2 py-0.5 text-xs dark:bg-gray-900/70"><?php echo $management_total; ?></span>
                  </a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table id="shareholder_table"  class="w-full text-sm text-left text-gray-900 dark:text-gray-300">
                  <thead class="text-xs text-black uppercase bg-gray-50 dark:bg-cyan-500 dark:text-white">
                        <tr>
                 <th scope="col" class="px-4 py-3 "><?php echo $this->lang->line('sno'); ?></th>
								<th scope="col" class="px-4 py-3 "><?php echo $this->lang->line('staff_name'); ?></th>
               <th scope="col" class="px-4 py-3 "><?php echo $this->lang->line('branch_name'); ?></th>
               <th scope="col" class="px-4 py-3 "><?php echo $this->lang->line('email'); ?></th>
						 <th scope="col" class="px-4 py-3 "><?php echo $this->lang->line('phone_number'); ?></th>
            <th scope="col" class="px-4 py-3 "><?php echo $this->lang->line('position'); ?></th>
             <th scope="col" class="px-4 py-3 "><?php echo $this->lang->line('account_status'); ?></th>
							<th scope="col" class="px-4 py-3 "><?php echo $this->lang->line('created_at'); ?></th>
			
							<th scope="col" class="px-4 py-3 "><?php echo $this->lang->line('action'); ?></th>
                        </tr>
                    </thead>
					<tbody>
  <?php $no = 1; ?>
            <?php foreach ($all_employee as $employees): ?>
        <?php
          $isLoanOfficer = ((int) $employees->position_id === $loan_officer_id);
          $isManagement = (strtolower(trim((string) ($employees->position ?? ''))) === 'management');
          $officerPermissionRows = $officer_permissions_by_employee[$employees->empl_id] ?? [];
        ?>
        <tr class="border-b dark:border-gray-700">
            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $no++ ?></th>
            <td class="uppercase px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
               <?= $employees->empl_name ?>
            </td>
              <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $employees->blanch_name ?></td>
            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $employees->empl_email; ?></td>
            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $employees->empl_no ?></td>
            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $employees->position; ?></td>

            <!-- Principal -->
            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              <?php
                $status = strtolower($employees->empl_status);   // e.g. "open" or "close"
              
                if ($status === 'open') { ?>

                    <div>
                      <span
                        class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                        <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                          viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round">
                          <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                          <path d="m9 12 2 2 4-4"></path>
                        </svg>
                        <?php echo $this->lang->line('active'); ?>
                      </span>
                    </div>

                  <?php } elseif ($status === 'close') { ?>
                    <div>
                      <span
                        class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-red-100 text-red-800 rounded-full dark:bg-red-500/10 dark:text-red-500">
                        <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                          viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round">
                          <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"></path>
                          <path d="M12 9v4"></path>
                          <path d="M12 17h.01"></path>
                        </svg>
                        <?php echo $this->lang->line('blocked'); ?>
                      </span>
                    </div>

                  <?php } ?>
            </td>

            <!-- Session -->
            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo !empty($employees->empl_day) ? date('Y-m-d H:i', strtotime($employees->empl_day)) : '-'; ?></td>
           

            <!-- Collection -->
            <?php
/* -------------------------------------------------
 | Work out action, colours, icon and textblock_employee
 | ------------------------------------------------ */
$isOpen   = $employees->empl_status === 'open';   // user active, can be blocked
$isClosed = $employees->empl_status === 'close';  // user blocked, can be un‑blocked

$actionUrl   = $isOpen
    ? base_url("admin/block_employee/{$employees->empl_id}") 
    : base_url("admin/Unblock_employee/{$employees->empl_id}");

$actionLabel = $isOpen ? $this->lang->line('block_user') : $this->lang->line('unblock_user');
$confirmText = $isOpen
    ? "Block "   . addslashes($employees->empl_name)   . "?"
    : "Un‑block " . addslashes($employees->empl_name) . "?";

$colour = $isOpen ? 'amber' : 'green';  // Tailwind colour family
?>

            <td class="px-4 py-3 dark:text-white">
               <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
    <!-- dropdown trigger -->
    <button id="hs-table-action-sh-<?= $employees->account_no; ?>" type="button"
      class="hs-dropdown-toggle py-1.5 px-2.5 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700">
      <?php echo $this->lang->line('action'); ?>
        <path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5"
              stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
      </svg>
    </button>

    <!-- dropdown menu -->
    <div
      class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-40 z-20 bg-white shadow-2xl rounded-lg p-2 mt-2 dark:divide-gray-700 dark:bg-gray-800 dark:border dark:border-gray-700"
      aria-labelledby="hs-table-action-sh-<?= $employees->account_no; ?>">

      <!-- view option -->
      <div class="py-2 first:pt-0 last:pb-0">
        <span class="block py-2 px-3 text-xs font-medium uppercase text-gray-400 dark:text-gray-500">
          <?php echo $this->lang->line('choose_an_option'); ?>
        </span>
        <?php if ($isLoanOfficer): ?>
        <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-cyan-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
           href="<?= base_url("admin/loan_officer_metrics/{$employees->empl_id}"); ?>">
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
               fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M3 3v18h18"/>
            <path d="M7 14l3-3 3 2 4-5"/>
          </svg>
          <?php echo $this->lang->line('view_metrics'); ?>
        </a>
        <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-cyan-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
           href="#"
           data-hs-overlay="#hs-edit-shareholder-modal-<?= $employees->empl_id; ?>">
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
               fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4Z"/>
          </svg>
          <?php echo $this->lang->line('update_loan_officer_info'); ?>
        </a>
        <?php else: ?>
        <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-cyan-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
           href="#"
           data-hs-overlay="#hs-edit-shareholder-modal-<?= $employees->empl_id; ?>">
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
               fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4Z"/>
          </svg>
          <?php echo $this->lang->line('view'); ?>
        </a>
        <?php endif; ?>
      </div>

      <!-- block OR unblock option (shown according to status) -->
      <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm
                text-<?= $colour ?>-600 hover:bg-<?= $colour ?>-50 focus:ring-2 focus:ring-<?= $colour ?>-500
                dark:text-<?= $colour ?>-400 dark:hover:bg-gray-700"
         href="<?= $actionUrl ?>"
         onclick="return confirm('<?= $confirmText ?>');">

        <?php if ($isOpen): ?>
          <!-- BLOCK icon -->
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
               fill="none" stroke="currentColor" stroke-width="1.5"
               stroke-linecap="round" stroke-linejoin="round">
            <circle cx="7.5" cy="6.5" r="3"/>
            <path d="M2 19c0-3 2.5-5 5.5-5s5.5 2 5.5 5"/>
            <circle cx="17" cy="15" r="5"/>
            <path d="M14.5 12.5 19.5 17.5"/>
          </svg>
        <?php else: ?>
          <!-- UNBLOCK icon -->
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
               fill="none" stroke="currentColor" stroke-width="1.5"
               stroke-linecap="round" stroke-linejoin="round">
            <circle cx="7.5" cy="6.5" r="3"/>
            <path d="M2 19c0-3 2.5-5 5.5-5s5.5 2 5.5 5"/>
            <polyline points="14 15 16 17 20 13"/> <!-- check -->
          </svg>
        <?php endif; ?>

        <?= $actionLabel ?>
      </a>

      <?php if ($isLoanOfficer): ?>
  <!-- grant access option (always shown) -->
  <div class="py-2 first:pt-0 last:pb-0">
    <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-blue-600 hover:bg-blue-50 focus:ring-2 focus:ring-blue-500 dark:text-blue-400 dark:hover:bg-gray-700"
       href="<?= base_url("admin/manage/{$employees->empl_id}"); ?>">
      <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
           fill="none" stroke="currentColor" stroke-width="1.5"
           stroke-linecap="round" stroke-linejoin="round">
        <circle cx="7.5" cy="6.5" r="3"/>
        <path d="M2 19c0-3 2.5-5 5.5-5s5.5 2 5.5 5"/>
        <rect x="14" y="11" width="8" height="8" rx="1.5"/>
        <path d="M16 11v-2a3 3 0 0 1 6 0v2"/>
        <circle cx="18" cy="15" r="1"/>
      </svg>
      Rekebisha taarifa za afisa
    </a>
  </div>
<?php else: ?>
  <div class="py-2 first:pt-0 last:pb-0">
    <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-blue-600 hover:bg-blue-50 focus:ring-2 focus:ring-blue-500 dark:text-blue-400 dark:hover:bg-gray-700"
       href="<?= $isManagement ? base_url("admin/manage/{$employees->empl_id}") : base_url("admin/privillage/{$employees->empl_id}"); ?>">
      <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
           fill="none" stroke="currentColor" stroke-width="1.5"
           stroke-linecap="round" stroke-linejoin="round">
        <circle cx="7.5" cy="6.5" r="3"/>
        <path d="M2 19c0-3 2.5-5 5.5-5s5.5 2 5.5 5"/>
        <rect x="14" y="11" width="8" height="8" rx="1.5"/>
        <path d="M16 11v-2a3 3 0 0 1 6 0v2"/>
        <circle cx="18" cy="15" r="1"/>
      </svg>
      <?php echo $this->lang->line('user_access'); ?>
    </a>
  </div>
<?php endif; ?>


      <div class="py-2 first:pt-0 last:pb-0">
        <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-blue-600 hover:bg-blue-50 focus:ring-2 focus:ring-blue-500 dark:text-blue-400 dark:hover:bg-gray-700"
        href="<?php echo base_url("admin/delete_employee/{$employees->empl_id}") ?>">
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
               fill="none" stroke="currentColor" stroke-width="1.5"
               stroke-linecap="round" stroke-linejoin="round">
            <circle cx="7.5" cy="6.5" r="3"/>
            <path d="M2 19c0-3 2.5-5 5.5-5s5.5 2 5.5 5"/>
            <rect x="14" y="11" width="8" height="8" rx="1.5"/>
            <path d="M16 11v-2a3 3 0 0 1 6 0v2"/>
            <circle cx="18" cy="15" r="1"/>f
          </svg>
          <?php echo $this->lang->line('delete'); ?>
        </a>
      </div>

    </div><!-- /.dropdown menu -->
  </div>
            </td>
            <!-- <td class="px-4 py-3 dark:text-white"><?= $loan_aproveds->account_name; ?></td>
            <td class="px-4 py-3 dark:text-white"><?= substr($loan_aproveds->loan_stat_date, 0,10); ?></td>
            <td class="px-4 py-3 dark:text-white"><?= substr($loan_aproveds->loan_end_date, 0,10); ?></td>
<td class="px-4 py-3 dark:text-white">
    <a href="<?= base_url("admin/delete_loanwith/{$loan_aproveds->loan_id}") ?>" 
       class="text-red-600 hover:text-red-900 flex items-center gap-1" 
       onclick="return confirm('Are you sure?')">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 0a1 1 0 00-1 1v1h6V4a1 1 0 00-1-1m-4 0h4"/>
        </svg>
        Delete
    </a>
</td> -->

        </tr>
    <?php endforeach; ?>





</tbody>

                </table>
                  <?php // Modals for Edit Share Holder ?>
        <?php if (isset($all_employee) && is_array($all_employee)): ?>
          <?php foreach ($all_employee as $employees): ?>
            <div id="hs-edit-shareholder-modal-<?php echo $employees->empl_id; ?>"
              class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
              <div
                class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all lg:max-w-3xl lg:w-full m-3 lg:mx-auto">
                <?php // Wider modal for more fields ?>
                <div
                  class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700">
                  <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                    <h3 class="font-bold text-gray-800 dark:text-white"><?php echo $this->lang->line('edit_staff'); ?>:
                      <?php echo htmlspecialchars($employees->empl_name, ENT_QUOTES, 'UTF-8'); ?>
                    </h3>
                    <button type="button"
                      class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                      data-hs-overlay="#hs-edit-shareholder-modal-<?php echo $employees->empl_id; ?>"><span
                        class="sr-only"><?php echo $this->lang->line('close'); ?></span><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                      </svg></button>
                  </div>
                  <div class="p-4 sm:p-6 overflow-y-auto">
                    <?php echo form_open("admin/modify_employee/{$employees->empl_id}"); ?>

                    <!-- Employee Profile Image Section -->
                    <div class="mb-6 flex justify-center">
                      <div class="flex flex-col items-center gap-3">
                        <div class="h-32 w-32 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center border-2 border-gray-300 dark:border-gray-600 overflow-hidden">
                          <?php if (!empty($employees->passport)): ?>
                            <img src="<?php echo base_url('assets/images/passport/' . $employees->passport); ?>" 
                                 alt="Employee Photo" 
                                 class="h-full w-full object-cover">
                          <?php else: ?>
                            <svg class="h-16 w-16 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                              <path d="M10 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM3.465 14.493a1.23 1.23 0 0 0 .41 1.412A9.957 9.957 0 0 0 10 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 0 0-13.074.003Z" />
                            </svg>
                          <?php endif; ?>
                        </div>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                          <?php echo htmlspecialchars($employees->empl_name, ENT_QUOTES, 'UTF-8'); ?>
                        </span>
                      </div>
                    </div>

                    <div class="grid sm:grid-cols-12 gap-4 sm:gap-6">
                      <div class="sm:col-span-4">
                        <label for="empl_name_<?php echo $employees->empl_id; ?>"
                          class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('staff_name'); ?>:</label>
                        <input
                          class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600 type="
                          text" id="empl_name_<?php echo $employees->empl_id; ?>" name="empl_name"
                          value="<?php echo htmlspecialchars($employees->empl_name, ENT_QUOTES, 'UTF-8'); ?>"
                          class="py-2.5 px-4 input-text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
                          required>
                      </div>



                      <div class="sm:col-span-4">
                        <label for="share_mobile_<?php echo $employees->empl_id; ?>"
                          class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('mobile_no'); ?>:</label>
                        <input type="number" id="share_mobile_<?php echo $employees->empl_id; ?>" name="empl_no"
                          placeholder="<?php echo $this->lang->line('mobile_no'); ?>" autocomplete="off" required
                          class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
                          value="<?php echo htmlspecialchars($employees->empl_no, ENT_QUOTES, 'UTF-8'); ?>">

                      </div>

                      <div class="sm:col-span-4">
                        <label for="empl_email_<?php echo $employees->empl_id; ?>"
                          class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('email'); ?>:</label>
                        <input type="email" id="empl_email_<?php echo $employees->empl_id; ?>" name="empl_email"
                          placeholder="<?php echo $this->lang->line('email'); ?>" autocomplete="off" required
                          class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
                          value="<?php echo htmlspecialchars($employees->empl_email, ENT_QUOTES, 'UTF-8'); ?>">

                      </div>




                      <div class="sm:col-span-4">
                        <label for="blanch_id_<?php echo $employees->empl_id; ?>"
                          class="block text-sm font-medium mb-2 dark:text-gray-300">*<?php echo $this->lang->line('branch_name'); ?>:</label>
                        <select id="blanch_id_<?php echo $employees->empl_id; ?>" name="blanch_id" data-hs-select='{
                  "hasSearch": true,
                                        "placeholder": "<?php echo $this->lang->line('select_branch'); ?>",
                                        "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-gray-200\" data-title></span></button>",
                                        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2.5 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:ring-gray-600",
                                        "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-50 w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto dark:bg-gray-800 dark:border-gray-700",
                                        "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:hover:bg-gray-700 dark:text-gray-200 dark:focus:bg-gray-700",
                                        "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-gray-200\" data-title></div></div></div>",
                                        "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-gray-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                      }'>




                          <option value=""><?php echo $this->lang->line('select_branch'); ?></option>
                          <?php foreach ($blanch as $blanchs): ?>
                            <option value="<?= $blanchs->blanch_id; ?>" <?= ($blanchs->blanch_id == $employees->blanch_id) ? 'selected' : ''; ?>>
                              <?= htmlspecialchars($blanchs->blanch_name, ENT_QUOTES, 'UTF-8'); ?>
                            </option>
                          <?php endforeach; ?>

                        </select>

                      </div>

                      <div class="sm:col-span-4">
                        <label for="position_id_<?php echo $employees->empl_id; ?>"
                          class="block text-sm font-medium mb-2 dark:text-gray-300">*<?php echo $this->lang->line('position'); ?>:</label>
                        <select id="position_id_<?php echo $employees->empl_id; ?>" name="position_id" data-hs-select='{
                  "hasSearch": true,
                                        "placeholder": "<?php echo $this->lang->line('select_position'); ?>",
                                        "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-gray-200\" data-title></span></button>",
                                        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2.5 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:ring-gray-600",
                                        "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-50 w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto dark:bg-gray-800 dark:border-gray-700",
                                        "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:hover:bg-gray-700 dark:text-gray-200 dark:focus:bg-gray-700",
                                        "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-gray-200\" data-title></div></div></div>",
                                        "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-gray-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                      }'>

                          <option value=""><?php echo $this->lang->line('select_position'); ?></option>
                          <?php foreach ($position as $positions): ?>
                            <option value="<?= $positions->position_id; ?>"
                              <?= ($positions->position_id == $employees->position_id) ? 'selected' : ''; ?>>
                              <?= htmlspecialchars($positions->position, ENT_QUOTES, 'UTF-8'); ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                        <?php echo form_error("position_id", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                      </div>

                      <div class="sm:col-span-4">
                        <label for="username_<?php echo $employees->empl_id; ?>"
                          class="block text-sm font-medium mb-2 dark:text-gray-300">*<?php echo $this->lang->line('system_username'); ?>:</label>
                        <input type="text" id="username_<?php echo $employees->empl_id; ?>" name="username"
                          placeholder="<?php echo $this->lang->line('system_username'); ?>" autocomplete="off"
                          class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
                          value="<?php echo htmlspecialchars($employees->username, ENT_QUOTES, 'UTF-8'); ?>">

                      </div>





                      <div class="sm:col-span-4">
                        <label for="account_no_<?php echo $employees->empl_id; ?>"
                          class="block text-sm font-medium mb-2 dark:text-gray-300">*<?php echo $this->lang->line('bank_account'); ?>:</label>
                        <select id="account_no_<?php echo $employees->empl_id; ?>" name="bank_account" data-hs-select='{
                  "hasSearch": true,
                                        "placeholder": "Select gender",
                                        "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-gray-200\" data-title></span></button>",
                                        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2.5 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:ring-gray-600",
                                        "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-50 w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto dark:bg-gray-800 dark:border-gray-700",
                                        "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:hover:bg-gray-700 dark:text-gray-200 dark:focus:bg-gray-700",
                                        "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-gray-200\" data-title></div></div></div>",
                                        "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-gray-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                      }'>





                          <option value="CASH" <?php echo ($employees->bank_account == 'CASH') ? 'selected' : ''; ?>>CASH
                          </option>
                          <option value="NMB" <?php echo ($employees->bank_account == 'NMB') ? 'selected' : ''; ?>>NMB
                          </option>
                          <option value="CRDB" <?php echo ($employees->bank_account == 'CRDB') ? 'selected' : ''; ?>>CRDB
                          </option>
                        </select>
                        <?php echo form_error("account_no", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                      </div>

                      <div class="sm:col-span-4">
                        <label for="salary_<?php echo $employees->empl_id; ?>"
                          class="block text-sm font-medium mb-2 dark:text-gray-300">*<?php echo $this->lang->line('salary'); ?>:</label>
                        <input type="number" id="salary_<?php echo $employees->empl_id; ?>" name="salary"
                          placeholder="<?php echo $this->lang->line('salary'); ?>" autocomplete="off"
                          class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
                          value="<?php echo htmlspecialchars($employees->salary, ENT_QUOTES, 'UTF-8'); ?>">

                      </div>

                      <div class="sm:col-span-4">
                        <label for="daily_allowance_<?php echo $employees->empl_id; ?>"
                          class="block text-sm font-medium mb-2 dark:text-gray-300">*<?php echo $this->lang->line('daily_allowance'); ?>:</label>
                        <input type="number" id="daily_allowance_<?php echo $employees->empl_id; ?>" name="daily_allowance"
                          placeholder="<?php echo $this->lang->line('daily_allowance'); ?>" autocomplete="off"
                          class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
                          value="<?php echo htmlspecialchars(isset($employees->daily_allowance) ? $employees->daily_allowance : '', ENT_QUOTES, 'UTF-8'); ?>">
                      </div>


                      <div class="sm:col-span-4">
                        <label for="account_no_<?php echo $employees->empl_id; ?>"
                          class="block text-sm font-medium mb-2 dark:text-gray-300">*<?php echo $this->lang->line('bank_account_number'); ?>:</label>
                        <input type="number" id="account_no_<?php echo $employees->empl_id; ?>" name="account_no"
                          placeholder="<?php echo $this->lang->line('bank_account_number'); ?>" autocomplete="off"
                          class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
                          value="<?php echo htmlspecialchars($employees->account_no, ENT_QUOTES, 'UTF-8'); ?>">
                        <?php echo form_error("account_no", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                      </div>

                    </div>






                    <div class="mt-6 flex justify-end items-center gap-x-2 py-3">
                      <button type="button" class="py-2 px-3 btn-secondary-sm"
                        data-hs-overlay="#hs-edit-shareholder-modal-<?php echo $employees->empl_id; ?>"><?php echo $this->lang->line('close'); ?></button>
                      <button type="submit"
                        class="py-2 px-3 btn-primary-sm bg-cyan-600 hover:bg-cyan-700 text-white"><?php echo $this->lang->line('update'); ?></button>
                    </div>
                    <?php echo form_close(); ?>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>




				<div id="hs-basic-modal" class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-80 opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-basic-modal-label">
  <div class="sm:max-w-lg sm:w-full m-3 sm:mx-auto">
    <div class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
      <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200 dark:border-neutral-700">
        <h3 id="hs-basic-modal-label" class="font-bold text-gray-800 dark:text-white">
          <?php echo $this->lang->line('filter_data'); ?>
        </h3>
        <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-basic-modal">
          <span class="sr-only"><?php echo $this->lang->line('close'); ?></span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 6 6 18"></path>
            <path d="m6 6 12 12"></path>
          </svg>
        </button>
      </div>
	  <?php echo form_open("admin/get_blanch_withdraw"); ?>
  <div class="p-4 overflow-y-auto space-y-4">

    <!-- Gender Dropdown -->
    <div>
      <label for="blanch" class="block text-sm font-medium text-gray-700 dark:text-white">Chagua Tawi</label>
  <select id="branchSelect" name="blanch_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white" data-live-search="true"> <option value="">Chagua Tawi</option> <?php foreach ($blanch as $blanchs): ?> <option value="<?php echo $blanchs->blanch_id; ?>"><?php echo $blanchs->blanch_name; ?> </option> <?php endforeach; ?> </select>

    </div>

    <!-- 2-Column Grid: Phone, Email, Company Name, Address -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <!-- Phone -->
      

      <!-- Email -->
    

      <!-- Company Name -->
	  <?php $date = date("Y-m-d"); ?>  

      <div>
        <label for="company" class="block text-sm font-medium text-gray-700 dark:text-white">Kwanzia Tarehe</label>
		<input type="date" value="<?php echo $date; ?>" name="from"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
      </div>

      <!-- Address -->
      <div>
        <label for="address" class="block text-sm font-medium text-gray-700 dark:text-white">Mpaka Tarehe</label>
		<input type="date" name="to" value="<?php echo $date; ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
      </div>
    </div>

  </div>

  <!-- Modal Footer Buttons -->
  <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200 dark:border-neutral-700">
    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 hover:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700" data-hs-overlay="#hs-basic-modal">
      <?php echo $this->lang->line('close'); ?>
    </button>
    <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-blue-600 text-white hover:bg-blue-700">
      <?php echo $this->lang->line('apply_filters'); ?>
    </button>
  </div>
  <?php echo form_close(); ?>


    </div>
  </div>
</div>

            </div>
          
        </div>
    </div>
    </section>

	</div>
  </div>


  <?php
  include_once APPPATH . "views/partials/footer.php";
  ?>

<script>
$(document).ready(function(){
$('#blanch').change(function(){
var blanch_id = $('#blanch').val();
//alert(blanch_id)
if(blanch_id != ''){

$.ajax({
url:"<?php echo base_url(); ?>admin/fetch_employee_blanch_deposit",
method:"POST",
data:{blanch_id:blanch_id},
success:function(data)
{
$('#empl').html(data);
//$('#district').html('<option value="">All</option>');
}
});
}
else
{
$('#empl').html('<option value="">Select Employee</option>');
//$('#district').html('<option value="">All</option>');
}
});

});
</script>


  <?php // Script for cmd+a fix for DataTables search input (if used) ?>
  <script>
$(document).ready(function() {
    $('#shareholder_table').DataTable({
        // optional: set to false if you don’t want it
        searching: true,
        paging: true,
        info: false
    });
});
</script>

  <script>
document.getElementById('simple-search').addEventListener('keyup', function() {
    const filter = this.value.toLowerCase();
    const table = document.getElementById('shareholder_table');
    const trs = table.getElementsByTagName('tr');

    // Start from 1 to skip the header row
    for (let i = 1; i < trs.length; i++) {
        const tr = trs[i];
        const text = tr.textContent.toLowerCase();
        if (text.indexOf(filter) > -1) {
            tr.style.display = '';
        } else {
            tr.style.display = 'none';
        }
    }
});
</script>


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

    $('#branchSelect').select2({...selectConfig, placeholder: "Select Branch"});
    $('#employeeSelect').select2({...selectConfig, placeholder: "Select Employee"});

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







		