<?php include_once APPPATH . "views/partials/header.php"; ?>

<div class="w-full lg:ps-64 bg-gray-50 dark:bg-gray-900 min-h-screen transition-colors duration-300">
  <div class="p-4 sm:p-6 space-y-6">

    <!-- Header Section -->
    <div class="flex justify-between items-center">
      <div>
        <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-100">
          Compose and Send SMS
        </h2>
        <p class="text-sm text-gray-500 dark:text-gray-400">
          Select recipients and send messages quickly.
        </p>
      </div>

      <!-- Dark/Light Mode Toggle -->
      <button onclick="toggleTheme()" class="p-2 bg-gray-200 dark:bg-gray-700 rounded-full transition">
        <svg class="w-6 h-6 text-gray-700 dark:text-gray-200" xmlns="http://www.w3.org/2000/svg" fill="none"
          viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M12 3v1m0 16v1m8.485-8.485h1M3.515 12.515h1M16.95 7.05l.707-.707M6.343 17.657l.707-.707M16.95 16.95l.707.707M6.343 6.343l.707.707M12 8a4 4 0 100 8 4 4 0 000-8z" />
        </svg>
      </button>
    </div>

    <!-- Flash Message -->
    <?php if ($das = $this->session->flashdata('massage')): ?>
      <div class="bg-green-100 dark:bg-green-800/30 text-green-700 dark:text-green-400 border border-green-200 dark:border-green-700 rounded-lg p-4 flex items-start space-x-3">
        <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"
          viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
        <div>
          <h3 class="font-semibold">Success</h3>
          <p class="text-sm"><?php echo $das; ?></p>
        </div>
      </div>
    <?php endif; ?>

    <!-- Main Form Card -->
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-2xl p-6">
      <form method="post" action="<?= base_url('admin/send_bulk_sms') ?>" class="space-y-8">

        <!-- Employees Section -->
        <section>
          <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-3">Employees</h3>
          <?php if (!empty($branches)): ?>
            <?php foreach ($branches as $branch): ?>
              <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4 mb-4">
                <label class="flex items-center space-x-2 font-medium text-gray-700 dark:text-gray-300">
                  <input type="checkbox" class="select-branch rounded text-blue-600 focus:ring-blue-500"
                    data-branch-id="<?= $branch->blanch_id ?>">
                  <span><?= $branch->blanch_name ?></span>
                </label>
                <div class="mt-3 ml-5 grid sm:grid-cols-2 gap-2 text-sm text-gray-600 dark:text-gray-400">
                  <?php
                  $employees = $this->queries->getEmployeesBranch($this->session->userdata('comp_id'), $branch->blanch_id);
                  foreach ($employees as $emp): ?>
                    <label class="flex items-center space-x-2">
                      <input type="checkbox" name="employee_ids[]" value="<?= $emp->empl_id ?>"
                        class="emp-checkbox emp-branch-<?= $branch->blanch_id ?> rounded text-blue-600 focus:ring-blue-500">
                      <span><?= $emp->empl_name ?> - <?= $emp->empl_no ?></span>
                    </label>
                  <?php endforeach; ?>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </section>

        <!-- Customers Section -->
        <!-- <section>
          <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-3">Customers</h3>
          <?php if (!empty($customers)): ?>
            <div class="mb-3">
              <label class="flex items-center space-x-2 text-sm text-gray-600 dark:text-gray-400">
                <input type="checkbox" id="select_all_customers" class="rounded text-blue-600 focus:ring-blue-500">
                <span>Select All Customers</span>
              </label>
            </div>
            <div class="grid sm:grid-cols-2 gap-2 text-sm text-gray-700 dark:text-gray-400">
              <?php foreach ($customers as $c): ?>
                <label class="flex items-center space-x-2">
                  <input type="checkbox" name="customer_ids[]" value="<?= $c->customer_id ?>"
                    class="customer-checkbox rounded text-blue-600 focus:ring-blue-500">
                  <span><?= $c->f_name ?> <?= $c->l_name ?> - <?= $c->phone_no ?></span>
                </label>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </section> -->

        <!-- Guarantors Section -->
        <!-- <section>
          <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-3">Sponsors / Guarantors</h3>
          <?php if (!empty($out_guarantors) || !empty($withdrawal_guarantors)): ?>
            <div class="mb-3">
              <label class="flex items-center space-x-2 text-sm text-gray-600 dark:text-gray-400">
                <input type="checkbox" id="select_all_guarantors" class="rounded text-blue-600 focus:ring-blue-500">
                <span>Select All Guarantors</span>
              </label>
            </div>
            <div class="grid sm:grid-cols-2 gap-2 text-sm text-gray-700 dark:text-gray-400">
              <?php foreach ($out_guarantors as $g): ?>
                <label class="flex items-center space-x-2">
                  <input type="checkbox" name="guarantor_ids[]" value="<?= $g->sp_id ?>"
                    class="guarantor-checkbox rounded text-blue-600 focus:ring-blue-500">
                  <span><?= $g->sp_fname ?> <?= $g->sp_lname ?> - <?= $g->sp_phone_no ?> (<?= $g->cust_fname ?> <?= $g->cust_lname ?>) [Out]</span>
                </label>
              <?php endforeach; ?>
              <?php foreach ($withdrawal_guarantors as $g): ?>
                <label class="flex items-center space-x-2">
                  <input type="checkbox" name="guarantor_ids[]" value="<?= $g->sp_id ?>"
                    class="guarantor-checkbox rounded text-blue-600 focus:ring-blue-500">
                  <span><?= $g->sp_fname ?> <?= $g->sp_lname ?> - <?= $g->sp_phone_no ?> (<?= $g->cust_fname ?> <?= $g->cust_lname ?>) [Withdrawal]</span>
                </label>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </section> -->

        <!-- Message Section -->
        <section>
          <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
            Message
          </label>
          <textarea name="message" id="message" rows="5" required
            class="w-full p-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-100 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 transition"
            placeholder="Type your message here..."></textarea>
        </section>

        <!-- Submit -->
        <div class="text-right">
          <button type="submit"
            class="px-6 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-400 dark:focus:ring-blue-700 transition font-semibold">
            Send SMS
          </button>
        </div>

      </form>
    </div>
  </div>
</div>

<script>
document.querySelectorAll('.select-branch').forEach(cb => {
  cb.addEventListener('change', function () {
    const id = this.dataset.branchId;
    document.querySelectorAll('.emp-branch-' + id).forEach(emp => {
      emp.checked = this.checked;
    });
  });
});

document.querySelectorAll('[class^="emp-branch-"]').forEach(emp => {
  emp.addEventListener('change', function () {
    const branchId = this.className.match(/emp-branch-(\d+)/)[1];
    const branchCheckbox = document.querySelector('.select-branch[data-branch-id="' + branchId + '"]');
    const allEmployees = document.querySelectorAll('.emp-branch-' + branchId);
    const allChecked = Array.from(allEmployees).every(e => e.checked);
    const noneChecked = Array.from(allEmployees).every(e => !e.checked);
    
    // If all employees are checked, mark branch as checked.
    // If none are checked, uncheck branch.
    // Otherwise, branch stays partially checked (indeterminate).
    branchCheckbox.indeterminate = !allChecked && !noneChecked;
    branchCheckbox.checked = allChecked;
  });
});

document.getElementById('select_all_customers')?.addEventListener('change', e => {
  document.querySelectorAll('.customer-checkbox').forEach(cb => cb.checked = e.target.checked);
});

document.getElementById('select_all_guarantors')?.addEventListener('change', e => {
  document.querySelectorAll('.guarantor-checkbox').forEach(cb => cb.checked = e.target.checked);
});
</script>


<?php include_once APPPATH . "views/partials/footer.php"; ?>
