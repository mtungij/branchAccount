<?php
include_once APPPATH . "views/partials/officerheader.php";
?>

<div class="w-full lg:ps-64">
  <div class="p-4 sm:p-6 space-y-6">
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
      <div class="w-full">
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-4 sm:p-6 shadow-sm">
          <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg sm:text-xl font-semibold text-gray-800 dark:text-white">
              <?php echo $this->lang->line('branch_account_balances') ?: 'Blanch Account Balance'; ?>
            </h2>
            <span class="text-sm font-semibold text-cyan-700 dark:text-cyan-300">
              <?php echo $this->lang->line('total') ?: 'Total'; ?>: <?php echo number_format((float) ($total_balance_amount ?? 0)); ?>
            </span>
          </div>

          <div class="mb-3 text-sm text-gray-600 dark:text-gray-300">
            <strong><?php echo $this->lang->line('branch_name') ?: 'Branch'; ?>:</strong>
            <?php echo htmlspecialchars($branch->blanch_name ?? '-', ENT_QUOTES, 'UTF-8'); ?>
          </div>

          <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
              <thead class="bg-cyan-600 dark:bg-cyan-600">
                <tr>
                  <th class="px-4 py-3 text-start text-xs font-semibold uppercase text-white">
                    <?php echo $this->lang->line('account_name') ?: 'Account Name'; ?>
                  </th>
                  <th class="px-4 py-3 text-end text-xs font-semibold uppercase text-white">
                    <?php echo $this->lang->line('balance') ?: 'Balance'; ?>
                  </th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-gray-800">
                <?php if (!empty($balances)): ?>
                  <?php foreach ($balances as $row): ?>
                    <tr>
                      <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200">
                        <?php echo htmlspecialchars($row->account_name ?? '-', ENT_QUOTES, 'UTF-8'); ?>
                      </td>
                      <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200 text-end">
                        <?php echo number_format((float) ($row->blanch_capital ?? 0)); ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="2" class="px-4 py-4 text-sm text-center text-gray-500 dark:text-gray-400">
                      <?php echo $this->lang->line('no_account_balances_found') ?: 'No account balances found'; ?>
                    </td>
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

<?php
include_once APPPATH . "views/partials/footer.php";
?>
