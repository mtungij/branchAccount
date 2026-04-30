<?php
include_once APPPATH . "views/partials/header.php";

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

  <div id="tab-profile" class="tab-content w-full dark:bg-gray-800 rounded shadow-xl overflow-hidden">
      <div class="h-[140px] bg-gradient-to-r from-cyan-500 to-blue-500"></div>
      <div class="px-5 py-2 flex flex-col gap-3 pb-6">
        <div class="h-[90px] shadow-md w-[90px] rounded-full border-4 overflow-hidden -mt-14 border-white">
          <img class="w-full h-full rounded-full object-center object-cover" src="<?= base_url('assets/img/customer21.png') ?>" alt="Customer Image">
        </div>
        <div>
        <h3 class="uppercase text-xl text-slate-900 font-bold leading-6 dark:text-white">
  <?= htmlspecialchars($employee->empl_name ?? '', ENT_QUOTES, 'UTF-8') ?>
</h3>

          <p class="text-sm text-gray-600  dark:text-white">@daddasoft</p>
        </div>

   


      
        
      </div>
    </div>


<!-- <h3>Manage Permissions for Employee ID: </?= $employee_id ?></h3> -->

<!-- <form method="post" action="</?= base_url('admin/update') ?>" > -->
<form class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto" method="post" action="<?php echo base_url('admin/save_permissions/' . $employee_id); ?>">
  <!-- Card -->
  <div class="flex flex-col">
    <div class="-m-1.5 overflow-x-auto">
      <div class="p-1.5 min-w-full inline-block align-middle">
        <div class="bg-white border border-gray-200  w-full rounded-xl shadow-2xs overflow-hidden dark:bg-gray-800 dark:border-gray-700">

          <!-- Header -->
          <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
            <div>
              <p class="text-sm text-gray-600 uppercase font-bold dark:text-white">
                <?= htmlspecialchars($access_title ?? 'Management System Access', ENT_QUOTES, 'UTF-8') ?>
              </p>
              <?php if (!empty($is_loan_officer)): ?>
                <p class="text-xs text-gray-500 mt-1 dark:text-gray-400">Select and update Loan Officer actions below.</p>
              <?php endif; ?>
            </div>

            <div>
              <div class="inline-flex gap-x-2">
                <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                        onclick="toggleCheckboxes(this)">
                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                       stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"/>
                    <path d="M12 5v14"/>
                  </svg>
                  Chagua Zote
                </button>
              </div>
            </div>
          </div>
          <!-- End Header -->

          <!-- Hidden employee id -->
          <input type="hidden" name="employee_id" value="<?= htmlspecialchars($employee_id) ?>">

          <!-- Table / Permissions Grid -->


<?php
$employee_actions = $employee_actions ?? [];

$action_labels_by_link = [
  'loans' => [
    'can_view' => 'View Loan Pending',
    'can_edit' => 'Approve Loan',
    'can_delete' => 'Delete Loan',
  ],
  'mikopo' => [
    'can_view' => 'View Loan Pending',
    'can_edit' => 'Approve Loan',
    'can_delete' => 'Delete Loan',
  ],
  'all customers' => [
    'can_view' => 'View Customer',
    'can_delete' => 'Delete Customer',
  ],
  'wateja' => [
    'can_view' => 'View Customer',
    'can_delete' => 'Delete Customer',
  ],
  'customer list' => [
    'can_view' => 'View Customer',
    'can_delete' => 'Delete Customer',
  ],
  'staff' => [
    'can_view' => 'View Staff',
    'can_edit' => 'Manage Staff',
    'can_delete' => 'Delete Staff',
  ],
  'register staff' => [
    'can_view' => 'View Staff',
    'can_edit' => 'Manage Staff',
    'can_delete' => 'Delete Staff',
  ],
  'all employee' => [
    'can_view' => 'View Staff',
    'can_edit' => 'Manage Staff',
    'can_delete' => 'Delete Staff',
  ],
  'branches' => [
    'can_view' => 'View Customers',
    'can_edit' => 'Edit Branch',
    'can_delete' => 'Delete Branch',
  ],
  'register new branch' => [
    'can_view' => 'View Customers',
    'can_edit' => 'Edit Branch',
    'can_delete' => 'Delete Branch',
  ],
  'officer payment dashboard' => [
    'can_view' => 'View Payment Dashboard',
    'can_edit' => 'Make Payment',
    'can_delete' => 'Delete',
  ],
  'officer customer' => [
    'can_view' => 'View Customers',
    'can_edit' => 'Register Customer',
  ],
  'officer loan application' => [
    'can_view' => 'View Loan Applications',
    'can_edit' => 'Apply Loan',
  ],
  'officer approve loan' => [
    'can_view' => 'View Loans',
    'can_edit' => 'Approve Loan',
    'can_delete' => 'Reject Loan',
  ],
];

$resolve_action_label = function ($link_name, $action, $default) use ($action_labels_by_link) {
  $key = strtolower(trim((string) $link_name));
  if (isset($action_labels_by_link[$key][$action])) {
    return $action_labels_by_link[$key][$action];
  }
  return $default;
};

$access_title = $access_title ?? 'Management System Access';
$is_loan_officer = $is_loan_officer ?? false;
?>

<form method="post" action="<?= base_url('admin/save_permissions/' . $employee_id); ?>">
  <input type="hidden" name="employee_id" value="<?= $employee_id ?>">

  <?php foreach ($grouped_links as $group => $links): ?>
    <h3 class="text-lg font-semibold mt-6 mb-2 px-4 text-gray-800 dark:text-gray-200">
      <?= htmlspecialchars($group) ?>
    </h3>

    <div class="grid sm:grid-cols-1 gap-2 px-4">
      <?php foreach ($links as $link): ?>
        <?php
          $isChecked = in_array($link->id, $employee_links) ? 'checked' : '';
          $hasView   = !empty($employee_actions[$link->id]['can_view']);
          $hasEdit   = !empty($employee_actions[$link->id]['can_edit']);
          $hasDelete = !empty($employee_actions[$link->id]['can_delete']);
          $viewLabel = $resolve_action_label($link->link_name, 'can_view', 'View');
          $editLabel = $resolve_action_label($link->link_name, 'can_edit', 'Edit');
          $deleteLabel = $resolve_action_label($link->link_name, 'can_delete', 'Delete');
        ?>
        <div class="flex items-center justify-between p-3 w-full bg-white border border-gray-200 rounded-lg text-sm dark:bg-gray-900 dark:border-gray-700">
          <div class="flex items-center">
            <input
              type="checkbox"
              id="link_<?= $link->id ?>"
              name="permissions[]"
              value="<?= $link->id ?>"
              class="permission-checkbox shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 checked:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:checked:bg-blue-500"
              <?= $isChecked ?>
              onchange="toggleActions(<?= $link->id ?>)"
            >
            <span class="ms-3 text-gray-700 dark:text-gray-300"><?= htmlspecialchars($link->link_name) ?></span>
          </div>
          <?php if (!empty($link->has_edit) || !empty($link->has_delete)): ?>
          <div class="flex items-center gap-3 actions-group" id="actions_<?= $link->id ?>" style="<?= $isChecked ? 'display:flex' : 'display:none' ?>">
            <label class="inline-flex items-center gap-1 text-xs text-gray-600 dark:text-gray-400 cursor-pointer">
              <input type="checkbox" name="actions[<?= $link->id ?>][can_view]" value="1" class="rounded-sm border-gray-300 text-green-600 focus:ring-green-500 dark:bg-gray-800 dark:border-gray-600" <?= $hasView ? 'checked' : '' ?>>
              <svg class="w-3.5 h-3.5 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
              <?= htmlspecialchars($viewLabel, ENT_QUOTES, 'UTF-8') ?>
            </label>
            <?php if (!empty($link->has_edit)): ?>
            <label class="inline-flex items-center gap-1 text-xs text-gray-600 dark:text-gray-400 cursor-pointer">
              <input type="checkbox" name="actions[<?= $link->id ?>][can_edit]" value="1" class="rounded-sm border-gray-300 text-amber-600 focus:ring-amber-500 dark:bg-gray-800 dark:border-gray-600" <?= $hasEdit ? 'checked' : '' ?>>
              <svg class="w-3.5 h-3.5 text-amber-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
              <?= htmlspecialchars($editLabel, ENT_QUOTES, 'UTF-8') ?>
            </label>
            <?php endif; ?>
            <?php if (!empty($link->has_delete)): ?>
            <label class="inline-flex items-center gap-1 text-xs text-gray-600 dark:text-gray-400 cursor-pointer">
              <input type="checkbox" name="actions[<?= $link->id ?>][can_delete]" value="1" class="rounded-sm border-gray-300 text-red-600 focus:ring-red-500 dark:bg-gray-800 dark:border-gray-600" <?= $hasDelete ? 'checked' : '' ?>>
              <svg class="w-3.5 h-3.5 text-red-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
              <?= htmlspecialchars($deleteLabel, ENT_QUOTES, 'UTF-8') ?>
            </label>
            <?php endif; ?>
          </div>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endforeach; ?>

  <div class="mt-6 px-4 pb-4">
    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
      Update Permissions
    </button>
  </div>
</form>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- End Card -->
</form>

<script>
  // Toggle all checkboxes on or off
  function toggleCheckboxes(button) {
    const checkboxes = document.querySelectorAll('.permission-checkbox');
    const allChecked = Array.from(checkboxes).every(cb => cb.checked);
    checkboxes.forEach(cb => {
      cb.checked = !allChecked;
      toggleActions(cb.value);
    });
    button.textContent = allChecked ? 'Chagua Zote' : 'Ondoa Zote';
  }

  function toggleActions(linkId) {
    const cb = document.getElementById('link_' + linkId);
    const actionsDiv = document.getElementById('actions_' + linkId);
    if (cb && actionsDiv) {
      actionsDiv.style.display = cb.checked ? 'flex' : 'none';
    }
  }
</script>



  <?php
  include_once APPPATH . "views/partials/footer.php";
  ?>

<script>
// toggleCheckboxes and toggleActions already defined above
</script>
