<?php
include_once APPPATH . "views/partials/header.php";

$can_edit_notifications = isset($can_edit_notifications) ? (bool)$can_edit_notifications : true;
$can_delete_notifications = isset($can_delete_notifications) ? (bool)$can_delete_notifications : true;
?>

<style>
  .dashboard-loading-overlay {
    width: 100%;
    z-index: 1;
    background: transparent;
    opacity: 1;
    transition: opacity 0.25s ease;
  }

  .dark .dashboard-loading-overlay {
    background: transparent;
  }

  .dashboard-loading-overlay.is-hidden {
    opacity: 0;
    pointer-events: none;
  }

  .dashboard-skeleton {
    border-radius: 0.75rem;
    background: linear-gradient(90deg, #e5e7eb 25%, #f3f4f6 37%, #e5e7eb 63%);
    background-size: 400% 100%;
    animation: dashboardShimmer 1.2s ease-in-out infinite;
  }

  .dark .dashboard-skeleton {
    background: linear-gradient(90deg, #1f2937 25%, #374151 37%, #1f2937 63%);
    background-size: 400% 100%;
  }

  @keyframes dashboardShimmer {
    0% { background-position: 100% 0; }
    100% { background-position: 0 0; }
  }
</style>

<div id="dashboard-loading-placeholder" class="dashboard-loading-overlay">
  <div class="w-full lg:ps-64 p-4 sm:p-6">
    <div class="space-y-6">
      <div class="dashboard-skeleton h-10 w-72"></div>
      <div class="dashboard-skeleton h-56"></div>
      <div class="dashboard-skeleton h-80"></div>
    </div>
  </div>
</div>

<!-- Parent div with Alpine.js data -->
<div id="dashboard-main-content" class="w-full lg:ps-64 p-4 sm:p-6 hidden" x-data="{ openEditId: null, openDeleteId: null, showDeleteModal: false, selectedId: null }">

  <!-- Page Title -->
  <div class="mb-6">
    <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-200">
      <?php echo $this->lang->line('manage_notifications'); ?>
    </h2>
    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
      <?php echo $this->lang->line('manage_notification_recipients_desc'); ?>
    </p>
  </div>

  <!-- Flash Messages -->
  <?php if ($msg = $this->session->flashdata('massage')): ?>
    <div class="bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert">
      <div class="flex">
        <div class="flex-shrink-0">
          <span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-teal-100 bg-teal-200 text-teal-800 dark:border-teal-900 dark:bg-teal-800 dark:text-teal-500">✅</span>
        </div>
        <div class="ms-3">
          <h3 class="text-gray-800 font-semibold dark:text-white"><?php echo $this->lang->line('success'); ?></h3>
          <p class="mt-2 text-sm text-gray-700 dark:text-gray-400"><?php echo $msg;?></p>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <!-- Register Notification Form -->
  <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
    <div class="p-4 md:p-6">
      <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-6"><?php echo $this->lang->line('register_notification_recipient'); ?></h3>
      <?php if ($can_edit_notifications): ?>
      <?php echo form_open("admin/create_notifications", ['novalidate' => true]); ?>
        <div class="grid sm:grid-cols-12 gap-4 sm:gap-6">

          <!-- Name -->
          <div class="sm:col-span-4">
            <label for="name" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('full_name'); ?>:</label>
            <input type="text" id="name" name="name" placeholder="<?php echo $this->lang->line('full_name'); ?>" required
                   class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
                   value="<?php echo set_value('name'); ?>">
            <?php echo form_error("name", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
          </div>

          <!-- Phone -->
          <div class="sm:col-span-4">
            <label for="phone_number" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('phone_number'); ?>:</label>
            <input type="number" id="phone_number" name="phone_number" placeholder="<?php echo $this->lang->line('phone_number_format'); ?>" required
                   class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
                   value="<?php echo set_value('phone_number'); ?>">
            <?php echo form_error("phone_number", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
          </div>

          <!-- Position -->
          <div class="sm:col-span-4">
            <label for="position" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('position'); ?>:</label>
            <select id="position" name="position" required
                    class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
              <option value=""><?php echo $this->lang->line('select_position'); ?></option>
              <option value="admin" <?php echo set_select('position','admin'); ?>><?php echo $this->lang->line('admin_role'); ?></option>
              <option value="loan_officer" <?php echo set_select('position','loan_officer'); ?>><?php echo $this->lang->line('loan_officer'); ?></option>
              <option value="branch_manager" <?php echo set_select('position','branch_manager'); ?>><?php echo $this->lang->line('branch_manager'); ?></option>
            </select>
            <?php echo form_error("position", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
          </div>

        </div>

        <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
          <div class="flex justify-center gap-x-2">
            <button type="submit" class="py-2 px-4 bg-cyan-600 hover:bg-cyan-700 text-white rounded-lg"><?php echo $this->lang->line('save'); ?></button>
          </div>
        </div>
      <?php echo form_close(); ?>
      <?php endif; ?>
    </div>
  </div>

  <!-- Notification Recipients Table -->
  <div class="flex flex-col bg-white dark:bg-gray-800 shadow-md rounded-lg p-4 overflow-x-auto mt-8">
    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4"><?php echo $this->lang->line('notification_recipients'); ?></h2>

    <div class="bg-white dark:bg-gray-800 border shadow-sm rounded-xl overflow-x-auto">
      <table id="notificationsTable" class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
        <thead class="bg-gray-100 dark:bg-gray-700">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('s_no'); ?></th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('name'); ?></th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('phone'); ?></th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('position'); ?></th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('status'); ?></th>
            <th class="px-6 py-3 text-right text-xs font-semibold uppercase text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('action'); ?></th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
          <?php $no=1; foreach($numbers as $n): ?>
          <tr class="bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700">
            <td class="px-6 py-4 text-sm text-gray-900 dark:text-white"><?= $no++; ?></td>
            <td class="px-6 py-4 text-sm text-gray-900 dark:text-white"><?= htmlspecialchars($n->name); ?></td>
            <td class="px-6 py-4 text-sm text-gray-900 dark:text-white"><?= htmlspecialchars($n->phone_number); ?></td>
            <td class="px-6 py-4 text-sm text-gray-900 dark:text-white"><?php
              $position_key_map = [
                'admin' => 'admin_role',
                'loan_officer' => 'loan_officer',
                'branch_manager' => 'branch_manager'
              ];
              $position_key = isset($position_key_map[$n->position]) ? $position_key_map[$n->position] : '';
              echo $position_key ? $this->lang->line($position_key) : ucfirst(str_replace('_', ' ', $n->position));
            ?></td>
            <td class="px-6 py-4 text-sm text-gray-900 dark:text-white"><?= $n->status ? $this->lang->line('active') : $this->lang->line('inactive'); ?></td>
            <td class="px-6 py-4 ">

     <?php if ($can_delete_notifications): ?>
     <a href="<?= site_url('admin/delete/'.$n->id) ?>" 
   class="flex items-center px-3 py-1 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 0a1 1 0 00-1 1v1h6V4a1 1 0 00-1-1m-4 0h4" />
    </svg>
    <?php echo $this->lang->line('delete'); ?>
</a>
  <?php endif; ?>




            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

</div>

<?php include_once APPPATH . "views/partials/footer.php"; ?>

<!-- Alpine.js CDN -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<!-- DataTables initialization -->
<script>
$(document).ready(function() {
    $('#notificationsTable').DataTable({
        pageLength: 10,
        lengthChange: false,
        searching: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "<?php echo $this->lang->line('search'); ?>..."
        }
    });
});
</script>

<script>
  window.addEventListener('load', function () {
    var loadingPlaceholder = document.getElementById('dashboard-loading-placeholder');
    var mainContent = document.getElementById('dashboard-main-content');
    if (mainContent) {
      mainContent.classList.remove('hidden');
    }
    if (loadingPlaceholder) {
      setTimeout(function () {
        loadingPlaceholder.classList.add('is-hidden');
        setTimeout(function () {
          loadingPlaceholder.style.display = 'none';
        }, 260);
      }, 180);
    }
  });
</script>
