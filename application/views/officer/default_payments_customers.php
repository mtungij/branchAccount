<?php
include_once APPPATH . "views/partials/officerheader.php";
?>

<div class="w-full lg:ps-64">
  <div class="p-4 sm:p-6 space-y-6">
    <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4 sm:p-5">
      <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <div>
          <h2 class="text-lg sm:text-xl font-bold text-gray-800 dark:text-gray-100">MADENI SUGU - CUSTOMER LIST</h2>
          <p class="text-sm text-gray-500 dark:text-gray-300">List hii inatoka kwenye source ile ile ya report ya `print_officer_todaycash_transaction`.</p>
        </div>
        <a href="<?php echo base_url('oficer/index'); ?>" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium rounded-lg bg-cyan-700 text-white hover:bg-cyan-800">
          Back to Dashboard
        </a>
      </div>
    </div>

    <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
      <div class="p-4 border-b border-gray-200 dark:border-gray-700 flex flex-wrap items-center gap-3 justify-between">
        <input
          type="search"
          id="default-payments-search"
          class="py-2 px-3 block w-full sm:w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
          placeholder="Search customer..."
          data-hs-datatable-search="#default_payments_table"
        />
        <div class="text-sm font-semibold text-gray-700 dark:text-gray-200">
          JUMLA MADENI SUGU: <?php echo number_format((float)($toyal_default->total_default ?? 0)); ?>
        </div>
      </div>

      <div class="overflow-x-auto">
        <table id="default_payments_table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-cyan-500 uppercase bg-gray-50 dark:bg-cyan-600 dark:text-gray-50">
            <tr>
              <th class="px-4 py-3">S/No</th>
              <th class="px-4 py-3">Mteja</th>
              <th class="px-4 py-3">Namba Ya Simu</th>
              <th class="px-4 py-3">Kiasi</th>
              <th class="px-4 py-3">Account</th>
              <th class="px-4 py-3">Tarehe</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($default_list)): ?>
              <?php $sno = 1; ?>
              <?php foreach ($default_list as $item): ?>
                <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                  <td class="px-4 py-3"><?php echo $sno++; ?></td>
                  <td class="px-4 py-3 text-gray-900 dark:text-gray-100 uppercase">
                    <?php echo htmlspecialchars(trim(($item->f_name ?? '') . ' ' . ($item->m_name ?? '') . ' ' . ($item->l_name ?? '')), ENT_QUOTES, 'UTF-8'); ?>
                  </td>
                  <td class="px-4 py-3 text-gray-900 dark:text-gray-100"><?php echo htmlspecialchars((string)($item->phone_no ?? '-'), ENT_QUOTES, 'UTF-8'); ?></td>
                  <td class="px-4 py-3 text-gray-900 dark:text-gray-100"><?php echo number_format((float)($item->depost ?? 0)); ?></td>
                  <td class="px-4 py-3 text-gray-900 dark:text-gray-100"><?php echo htmlspecialchars((string)($item->account_name ?? '-'), ENT_QUOTES, 'UTF-8'); ?></td>
                  <td class="px-4 py-3 text-gray-900 dark:text-gray-100"><?php echo htmlspecialchars((string)($item->depost_day ?? '-'), ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="6" class="px-4 py-8 text-center text-gray-500 dark:text-gray-300">Hakuna data ya madeni sugu kwa leo.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php
include_once APPPATH . "views/partials/footer.php";
?>
