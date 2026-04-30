<?php
include_once APPPATH . "views/partials/officerheader.php";

$page_title = $this->lang->line('all_customer_list_title') ?: 'All Customer List';
$page_subtitle = $this->lang->line('all_customer_list_subtitle') ?: 'List of all registered customers.';
$print_label = $this->lang->line('print_label') ?: 'Print';
?>

<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
  <div class="p-4 sm:p-6 space-y-6">

    <?php if ($das = $this->session->flashdata('massage')): ?>
      <div class="bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg p-4" role="alert">
        <div class="flex items-start justify-between gap-3">
          <p><?php echo $das; ?></p>
          <button type="button" class="text-teal-700 hover:text-teal-900" data-hs-remove-element="[role=alert]" aria-label="<?php echo $this->lang->line('dismiss') ?: 'Dismiss'; ?>">x</button>
        </div>
      </div>
    <?php endif; ?>

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm">
      <div class="p-4 sm:p-6 border-b border-gray-200">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
          <div>
            <h2 class="text-lg sm:text-xl font-bold text-cyan-700"><?php echo $page_title; ?></h2>
            <p class="text-sm text-gray-500"><?php echo $page_subtitle; ?></p>
          </div>
          <a href="<?php echo base_url('oficer/print_allCustomer'); ?>" target="_blank"
             class="inline-flex items-center justify-center px-4 py-2 rounded-lg bg-cyan-600 hover:bg-cyan-700 text-white text-sm font-semibold transition-colors">
            <?php echo $print_label; ?>
          </a>
        </div>
      </div>

      <div class="p-4 sm:p-6">
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200" id="all_customer_table">
            <thead class="bg-cyan-600">
              <tr>
                <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-white"><?php echo $this->lang->line('s_no') ?: 'S/No.'; ?></th>
                <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-white"><?php echo $this->lang->line('customer_id') ?: 'Customer ID'; ?></th>
                <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-white"><?php echo $this->lang->line('customer_name') ?: 'Customer Name'; ?></th>
                <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-white"><?php echo $this->lang->line('date_of_birth') ?: 'Date of Birth'; ?></th>
                <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-white"><?php echo $this->lang->line('sex') ?: 'Sex'; ?></th>
                <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-white"><?php echo $this->lang->line('phone_number') ?: 'Phone Number'; ?></th>
                <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-white"><?php echo $this->lang->line('date') ?: 'Date'; ?></th>
                <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-white"><?php echo $this->lang->line('status') ?: 'Status'; ?></th>
                <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-white"><?php echo $this->lang->line('action') ?: 'Action'; ?></th>
              </tr>
            </thead>

            <tbody class="divide-y divide-gray-200 bg-white">
              <?php $no = 1; ?>
              <?php foreach ($customer as $customers): ?>
                <?php
                $status_label = $this->lang->line('pending') ?: 'Pending';
                $status_class = 'bg-amber-100 text-amber-700';

                if ($customers->customer_status === 'open') {
                  $status_label = $this->lang->line('active') ?: 'Active';
                  $status_class = 'bg-emerald-100 text-emerald-700';
                } elseif ($customers->customer_status === 'close') {
                  $status_label = $this->lang->line('closed') ?: 'Closed';
                  $status_class = 'bg-red-100 text-red-700';
                }
                ?>
                <tr class="hover:bg-gray-50">
                  <td class="px-4 py-3 text-sm text-gray-700"><?php echo $no++; ?>.</td>
                  <td class="px-4 py-3 text-sm text-gray-700"><?php echo $customers->customer_code; ?></td>
                  <td class="px-4 py-3 text-sm text-gray-700"><?php echo $customers->f_name . ' ' . $customers->m_name . ' ' . $customers->l_name; ?></td>
                  <td class="px-4 py-3 text-sm text-gray-700"><?php echo $customers->date_birth; ?></td>
                  <td class="px-4 py-3 text-sm text-gray-700"><?php echo $customers->gender; ?></td>
                  <td class="px-4 py-3 text-sm text-gray-700"><?php echo $customers->phone_no; ?></td>
                  <td class="px-4 py-3 text-sm text-gray-700"><?php echo substr($customers->customer_day, 0, 10); ?></td>
                  <td class="px-4 py-3 text-sm text-gray-700">
                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold <?php echo $status_class; ?>">
                      <?php echo $status_label; ?>
                    </span>
                  </td>
                  <td class="px-4 py-3 text-sm text-gray-700">
                    <a href="<?php echo base_url("oficer/view_more_customer/{$customers->customer_id}"); ?>"
                       class="inline-flex items-center px-3 py-1.5 rounded-lg bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold transition-colors">
                      <?php echo $this->lang->line('view_more') ?: 'View More'; ?>
                    </a>
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
<!-- ========== END MAIN CONTENT BODY ========== -->

<?php
include_once APPPATH . "views/partials/footer.php";
?>