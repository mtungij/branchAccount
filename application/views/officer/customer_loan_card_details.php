<?php
include_once APPPATH . "views/partials/officerheader.php";

$is_due_tomorrow = isset($card_type) && $card_type === 'due_tomorrow';
$is_completed_today = isset($card_type) && $card_type === 'completed_today';
$is_active_or_default = isset($card_type) && in_array($card_type, ['active_customers', 'default_customers'], true);
$title = isset($card_title) ? $card_title : 'Customer Loan Details';
?>

<div class="w-full lg:ps-64">
  <div class="p-4 sm:p-6 space-y-6">
    <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4 sm:p-5">
      <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <div>
          <h2 class="text-lg sm:text-xl font-bold text-gray-800 dark:text-gray-100"><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></h2>
          <p class="text-sm text-gray-500 dark:text-gray-300">
            Jumla: <?php echo is_array($customers ?? null) ? count($customers) : 0; ?>
          </p>
        </div>
        <a href="<?php echo base_url('oficer/index'); ?>" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium rounded-lg bg-cyan-700 text-white hover:bg-cyan-800">
          Back to Dashboard
        </a>
      </div>
    </div>

    <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
      <div class="p-4 border-b border-gray-200 dark:border-gray-700">
        <input
          type="search"
          id="card-details-search"
          class="py-2 px-3 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
          placeholder="Search customer or loan..."
          data-hs-datatable-search="#card_details_table"
        />
      </div>

      <div class="overflow-x-auto">
        <table id="card_details_table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-cyan-500 uppercase bg-gray-50 dark:bg-cyan-600 dark:text-gray-50">
            <tr>
              <th class="px-4 py-3">S/No</th>
              <th class="px-4 py-3">Customer</th>
              <th class="px-4 py-3">Customer Code</th>
              <th class="px-4 py-3">Phone</th>
              <th class="px-4 py-3">Work Status</th>
              <th class="px-4 py-3">Loan Code</th>
              <th class="px-4 py-3">Loan Amount</th>
              <th class="px-4 py-3">Receivable</th>
              <?php if ($is_due_tomorrow): ?>
                <th class="px-4 py-3">Due Date</th>
              <?php elseif ($is_completed_today): ?>
                <th class="px-4 py-3">Completed Date</th>
                <th class="px-4 py-3">Paid Today</th>
              <?php else: ?>
                <th class="px-4 py-3">Loan Status</th>
                <th class="px-4 py-3">Loan Date</th>
              <?php endif; ?>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($customers)): ?>
              <?php $sno = 1; ?>
              <?php foreach ($customers as $item): ?>
                <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                  <td class="px-4 py-3"><?php echo $sno++; ?></td>
                  <td class="px-4 py-3 uppercase text-gray-900 dark:text-gray-100">
                    <?php echo htmlspecialchars(trim(($item->f_name ?? '') . ' ' . ($item->m_name ?? '') . ' ' . ($item->l_name ?? '')), ENT_QUOTES, 'UTF-8'); ?>
                  </td>
                  <td class="px-4 py-3 text-gray-900 dark:text-gray-100"><?php echo htmlspecialchars((string)($item->customer_code ?? '-'), ENT_QUOTES, 'UTF-8'); ?></td>
                  <td class="px-4 py-3 text-gray-900 dark:text-gray-100"><?php echo htmlspecialchars((string)($item->phone_no ?? '-'), ENT_QUOTES, 'UTF-8'); ?></td>
                  <td class="px-4 py-3 text-gray-900 dark:text-gray-100">
                    <?php
                      $work_status = trim((string)($item->work_status ?? ''));
                      echo $work_status === 'Mwajiriwa' ? 'Mtumishi' : ($work_status !== '' ? htmlspecialchars($work_status, ENT_QUOTES, 'UTF-8') : '-');
                    ?>
                  </td>
                  <td class="px-4 py-3 text-gray-900 dark:text-gray-100"><?php echo htmlspecialchars((string)($item->loan_code ?? '-'), ENT_QUOTES, 'UTF-8'); ?></td>
                  <td class="px-4 py-3 text-gray-900 dark:text-gray-100"><?php echo number_format((float)($item->how_loan ?? 0)); ?></td>
                  <td class="px-4 py-3 text-gray-900 dark:text-gray-100"><?php echo number_format((float)($item->loan_int ?? 0)); ?></td>

                  <?php if ($is_due_tomorrow): ?>
                    <td class="px-4 py-3 text-gray-900 dark:text-gray-100"><?php echo !empty($item->loan_end_date) ? date('Y-m-d', strtotime((string)$item->loan_end_date)) : '-'; ?></td>
                  <?php elseif ($is_completed_today): ?>
                    <td class="px-4 py-3 text-gray-900 dark:text-gray-100"><?php echo !empty($item->depost_day) ? date('Y-m-d', strtotime((string)$item->depost_day)) : '-'; ?></td>
                    <td class="px-4 py-3 text-gray-900 dark:text-gray-100"><?php echo number_format((float)($item->total_depost_today ?? 0)); ?></td>
                  <?php else: ?>
                    <td class="px-4 py-3 text-gray-900 dark:text-gray-100"><?php echo htmlspecialchars((string)($item->loan_status ?? '-'), ENT_QUOTES, 'UTF-8'); ?></td>
                    <td class="px-4 py-3 text-gray-900 dark:text-gray-100"><?php echo !empty($item->loan_day) ? date('Y-m-d', strtotime((string)$item->loan_day)) : '-'; ?></td>
                  <?php endif; ?>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="11" class="px-4 py-8 text-center text-gray-500 dark:text-gray-300">No customer records found.</td>
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
