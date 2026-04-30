<?php
include_once APPPATH . "views/partials/header.php";

$branch_name = !empty($blanch->blanch_name) ? $blanch->blanch_name : 'Branch';
$back_url = !empty($blanch->blanch_id)
  ? base_url("admin/view_blanchPanel/{$blanch->blanch_id}")
  : base_url('admin/blanch');
$customer_blanch = !empty($customer_blanch) ? $customer_blanch : array();
?>

<div class="w-full lg:ps-64">
  <div class="p-4 sm:p-6 space-y-6">
    <?php if ($das = $this->session->flashdata('massage')): ?>
      <div class="rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-800">
        <?php echo $das; ?>
      </div>
    <?php endif; ?>

    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 rounded-lg">
      <div class="w-full">
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
          <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
            <div class="w-full md:w-1/2">
              <h2 class="text-lg font-semibold text-gray-900 dark:text-white">All Customer List (<?php echo htmlspecialchars($branch_name, ENT_QUOTES, 'UTF-8'); ?>)</h2>
              <p class="text-sm text-gray-500 dark:text-gray-400">Total Customers: <?php echo count($customer_blanch); ?></p>
            </div>
            <div class="w-full md:w-auto flex items-center gap-2">
              <input
                type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full md:w-64 p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                placeholder="Search customer"
                data-hs-datatable-search="#blanch_customer_table"
                aria-label="Search customer"
              >
              <a href="<?php echo $back_url; ?>" class="inline-flex items-center gap-x-2 rounded-lg bg-cyan-700 px-3 py-2 text-sm font-semibold text-white hover:bg-cyan-800">
                Back
              </a>
            </div>
          </div>

          <div class="overflow-x-auto">
            <table id="blanch_customer_table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
              <thead class="border-y border-cyan-200 bg-cyan-50 text-xs uppercase text-cyan-900 dark:border-cyan-500 dark:bg-cyan-600 dark:text-white">
                <tr>
                  <th class="px-4 py-3">S/No.</th>
                  <th class="px-4 py-3">Customer ID no</th>
                  <th class="px-4 py-3">Customer Name</th>
                  <th class="px-4 py-3">Date of Birth</th>
                  <th class="px-4 py-3">Sex</th>
                  <th class="px-4 py-3">Phone Number</th>
                  <th class="px-4 py-3">Branch</th>
                  <th class="px-4 py-3">Region</th>
                  <th class="px-4 py-3">Date</th>
                  <th class="px-4 py-3">Status</th>
                  <th class="px-4 py-3 text-right">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                <?php foreach ($customer_blanch as $customers): ?>
                  <tr class="border-b dark:border-gray-700">
                    <td class="px-4 py-3 dark:text-white"><?php echo $no++; ?>.</td>
                    <td class="px-4 py-3 dark:text-white"><?php echo htmlspecialchars($customers->customer_code, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td class="px-4 py-3 uppercase dark:text-white"><?php echo htmlspecialchars($customers->f_name . ' ' . $customers->m_name . ' ' . $customers->l_name, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td class="px-4 py-3 dark:text-white"><?php echo htmlspecialchars($customers->date_birth, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td class="px-4 py-3 dark:text-white"><?php echo htmlspecialchars($customers->gender, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td class="px-4 py-3 dark:text-white"><?php echo htmlspecialchars($customers->phone_no, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td class="px-4 py-3 dark:text-white"><?php echo htmlspecialchars($customers->blanch_name, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td class="px-4 py-3 dark:text-white"><?php echo htmlspecialchars($customers->region_name, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td class="px-4 py-3 dark:text-white"><?php echo htmlspecialchars(substr($customers->customer_day, 0, 10), ENT_QUOTES, 'UTF-8'); ?></td>
                    <td class="px-4 py-3">
                      <?php if ($customers->customer_status == 'open'): ?>
                        <span class="inline-flex items-center rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-800 ring-1 ring-emerald-200/80">Active</span>
                      <?php elseif ($customers->customer_status == 'close'): ?>
                        <span class="inline-flex items-center rounded-full bg-rose-100 px-2.5 py-1 text-xs font-semibold text-rose-800 ring-1 ring-rose-200/80">Closed</span>
                      <?php elseif ($customers->customer_status == 'pending'): ?>
                        <span class="inline-flex items-center rounded-full bg-amber-100 px-2.5 py-1 text-xs font-semibold text-amber-800 ring-1 ring-amber-200/80">Pending</span>
                      <?php else: ?>
                        <span class="inline-flex items-center rounded-full bg-gray-100 px-2.5 py-1 text-xs font-semibold text-gray-700 ring-1 ring-gray-200/80"><?php echo htmlspecialchars(ucfirst($customers->customer_status), ENT_QUOTES, 'UTF-8'); ?></span>
                      <?php endif; ?>
                    </td>
                    <td class="px-4 py-3 text-right">
                      <div class="inline-flex items-center gap-2">
                        <a href="<?php echo base_url("admin/view_more_customer/{$customers->customer_id}"); ?>" class="inline-flex items-center rounded-lg border border-cyan-200 bg-cyan-50 px-2.5 py-1.5 text-xs font-semibold text-cyan-800 hover:bg-cyan-100">View more</a>
                        <a href="<?php echo base_url("admin/delete_customerData/{$customers->customer_id}"); ?>" class="inline-flex items-center rounded-lg border border-rose-200 bg-rose-50 px-2.5 py-1.5 text-xs font-semibold text-rose-800 hover:bg-rose-100" onclick="return confirm('Are you sure?')">Delete</a>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>

                <?php if (empty($customer_blanch)): ?>
                  <tr>
                    <td colspan="11" class="px-4 py-6 text-center text-gray-500 dark:text-gray-300">No customer found for this branch.</td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

<?php include_once APPPATH . "views/partials/footer.php"; ?>
