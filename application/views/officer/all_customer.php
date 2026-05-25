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
          <div class="flex items-center gap-2 flex-wrap">
            <a href="<?php echo base_url('oficer/print_allCustomer'); ?>" target="_blank"
               class="inline-flex items-center justify-center px-4 py-2 rounded-lg bg-cyan-600 hover:bg-cyan-700 text-white text-sm font-semibold transition-colors">
              <?php echo $print_label; ?>
            </a>
            <a href="<?php echo base_url('oficer/download_allCustomer_pdf'); ?>"
               class="inline-flex items-center justify-center gap-1.5 px-4 py-2 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5 5-5M12 15V3"/></svg>
              Download PDF
            </a>
          </div>
        </div>
      </div>

      <div class="p-4 sm:p-6">
        <!-- Filters row -->
        <div class="mb-4 flex flex-wrap items-center gap-3">
          <!-- Search input -->
          <div class="relative flex-1 min-w-[200px] max-w-xs">
            <input type="text" id="search_customer" placeholder="Tafuta mteja..." autocomplete="off"
              class="w-full py-2 pl-9 pr-3 border border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 focus:outline-none" />
            <svg class="absolute left-2.5 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35"/></svg>
          </div>
          <!-- Hali ya Ajira filter -->
          <label for="filter_work_status" class="text-sm font-medium text-gray-700">Hali ya Ajira:</label>
          <select id="filter_work_status" class="py-2 px-3 border border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 focus:outline-none">
            <option value="">-- Zote --</option>
            <option value="Mjasiriamali">Mjasiriamali</option>
            <option value="Mwajiriwa">Mtumishi</option>
          </select>
          <span id="filter_count" class="text-sm text-gray-500"></span>
        </div>

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
                <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-white">Hali ya Ajira</th>
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
                <?php
                $raw_ws = trim((string)($customers->work_status ?? ''));
                $display_ws = $raw_ws === 'Mwajiriwa' ? 'Mtumishi' : ($raw_ws !== '' ? $raw_ws : '-');
                ?>
                <tr class="hover:bg-gray-50" data-work-status="<?php echo htmlspecialchars($raw_ws, ENT_QUOTES, 'UTF-8'); ?>">
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
                  <td class="px-4 py-3 text-sm text-gray-700"><?php echo htmlspecialchars($display_ws, ENT_QUOTES, 'UTF-8'); ?></td>
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

<script>
document.addEventListener('DOMContentLoaded', function () {
  const filterSelect = document.getElementById('filter_work_status');
  const searchInput  = document.getElementById('search_customer');
  const countEl      = document.getElementById('filter_count');
  const table        = document.getElementById('all_customer_table');

  function applyFilters() {
    const wsVal  = filterSelect.value.trim();
    const search = searchInput.value.trim().toLowerCase();
    const rows   = table.querySelectorAll('tbody tr');
    let visible  = 0;

    rows.forEach(function (row) {
      const ws        = (row.getAttribute('data-work-status') || '').trim();
      const rowText   = row.textContent.toLowerCase();
      const wsMatch   = wsVal === '' || ws === wsVal;
      const textMatch = search === '' || rowText.includes(search);

      if (wsMatch && textMatch) {
        row.style.display = '';
        visible++;
      } else {
        row.style.display = 'none';
      }
    });

    countEl.textContent = (wsVal !== '' || search !== '') ? '(' + visible + ' wateja)' : '';
  }

  filterSelect.addEventListener('change', applyFilters);
  searchInput.addEventListener('input', applyFilters);
});
</script>

<?php
include_once APPPATH . "views/partials/footer.php";
?>