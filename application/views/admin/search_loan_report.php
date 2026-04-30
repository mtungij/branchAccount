<?php
include_once APPPATH . "views/partials/header.php";
$customer = !empty($customer) ? $customer : array();
$comp_id = $this->session->userdata('comp_id');
?>

<div class="w-full lg:ps-64 bg-gray-50 dark:bg-gray-900 min-h-screen transition-colors duration-300">
  <div class="p-4 sm:p-6 space-y-6">

    <!-- Header -->
    <div>
      <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-100">Search Customer</h2>
      <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Select a customer to view their loan report.</p>
    </div>

    <!-- Flash Message -->
    <?php if ($das = $this->session->flashdata('massage')): ?>
      <div class="bg-green-100 dark:bg-green-800/30 text-green-700 dark:text-green-400 border border-green-200 dark:border-green-700 rounded-lg p-4 flex items-start space-x-3">
        <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
        </svg>
        <p class="text-sm"><?php echo $das; ?></p>
      </div>
    <?php endif; ?>

    <!-- Form Card -->
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-2xl p-6">
      <?php echo form_open('admin/customer_loan_report', ['novalidate' => true, 'class' => 'space-y-6']); ?>

        <div>
          <label for="customer_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
            * Search Customer:
          </label>
          <select id="customer_id" name="customer_id" required
            class="py-3 px-4 block w-full border border-gray-300 dark:border-gray-600 rounded-lg text-sm text-gray-900 dark:text-gray-300 bg-white dark:bg-gray-900 focus:border-cyan-500 focus:ring-cyan-500">
            <option value="">Select customer</option>
            <?php foreach ($customer as $customers): ?>
              <option value="<?php echo (int) $customers->customer_id; ?>">
                <?php echo strtoupper($customers->f_name . ' ' . $customers->m_name . ' ' . $customers->l_name); ?> /
                <?php echo strtoupper($customers->customer_code); ?> /
                <?php echo strtoupper($customers->blanch_name); ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <input type="hidden" name="comp_id" value="<?php echo htmlspecialchars((string) $comp_id, ENT_QUOTES, 'UTF-8'); ?>">

        <div class="pt-4 border-t border-gray-200 dark:border-gray-700 flex justify-end">
          <button type="submit"
            class="py-2 px-6 bg-cyan-700 hover:bg-cyan-800 text-white text-sm font-semibold rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 transition-colors">
            Search
          </button>
        </div>

      <?php echo form_close(); ?>
    </div>

  </div>
</div>

<?php include_once APPPATH . "views/partials/footer.php"; ?>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<style>
.select2-container--default .select2-selection--single {
    background-color: #1f2937;
    border: 1px solid #374151;
    border-radius: 0.5rem;
    padding: 0.75rem 2.5rem 0.75rem 1rem;
    height: auto;
    font-size: 0.875rem;
    position: relative;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #ffffff !important;
    line-height: normal;
    padding-left: 0;
}
.select2-selection__arrow { right: 1rem; top: 0; width: 1.5rem; position: absolute; }
.select2-selection__arrow b { border-color: #9ca3af transparent transparent; }
.custom-select2-dropdown {
    background-color: #1f2937;
    color: #d1d5db;
    border: 1px solid #374151;
    border-radius: 0.5rem;
}
.custom-select2-dropdown .select2-results__option { color: #d1d5db; }
.custom-select2-dropdown .select2-results__option--highlighted {
    background-color: #06b6d4 !important;
    color: #ffffff !important;
}
.select2-search__field {
    color: #ffffff !important;
    background-color: #1f2937 !important;
    border: 1px solid #374151 !important;
}
</style>

<script>
$(document).ready(function () {
    $('#customer_id').select2({
        placeholder: "Type to search customer...",
        allowClear: true,
        width: '100%',
        dropdownCssClass: 'custom-select2-dropdown'
    });
});
</script>
