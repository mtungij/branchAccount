<?php
include_once APPPATH . "views/partials/officerheader.php";
?>

<div class="w-full lg:ps-64">
  <div class="p-4 sm:p-6 space-y-6">

    <div>
      <a href="<?= base_url('oficer/loan_withdrawal') ?>" class="inline-flex items-center gap-2 text-sm text-cyan-600 hover:underline dark:text-cyan-400">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        <?php echo $this->lang->line('back') ?? 'Back'; ?>
      </a>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-5">
      <?php
        $passport_src = '';
        if (!empty($customer->passport)) {
          $pv = trim((string) $customer->passport);
          if (preg_match('#^(https?://|data:image/)#i', $pv)) {
            $passport_src = $pv;
          } else {
            $candidates = [$pv];
            if (strpos($pv, 'assets/') !== 0) {
              $candidates[] = 'assets/uploads/' . $pv;
              $candidates[] = 'assets/images/passport/' . $pv;
              $candidates[] = 'assets/img/' . $pv;
            }
            foreach ($candidates as $c) {
              $rel = ltrim($c, '/');
              if (file_exists(FCPATH . $rel)) { $passport_src = base_url($rel); break; }
            }
          }
        }
      ?>
      <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
        <?php if (!empty($passport_src)): ?>
          <img class="w-20 h-20 rounded-full object-cover border-4 border-green-400" src="<?= $passport_src ?>" alt="Photo">
        <?php else: ?>
          <div class="w-20 h-20 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
            <svg class="w-10 h-10 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/></svg>
          </div>
        <?php endif; ?>
        <div>
          <h2 class="text-xl font-bold uppercase text-gray-900 dark:text-white">
            <?= htmlspecialchars($customer->f_name . ' ' . $customer->m_name . ' ' . $customer->l_name) ?>
          </h2>
          <p class="text-sm text-gray-500 dark:text-gray-400"><?= $customer->phone_no ?? '' ?> &middot; <?= $customer->customer_code ?? '' ?></p>
          <p class="text-sm text-gray-500 dark:text-gray-400"><?= $customer->blanch_name ?? '' ?></p>
        </div>
      </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
      <div class="p-4 border-b border-gray-200 dark:border-gray-700">
        <h2 class="text-base font-semibold text-gray-800 dark:text-white">
          <?php echo $this->lang->line('all_loans') ?? 'All Loans'; ?>
        </h2>
      </div>
      <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
          <thead class="text-xs font-semibold uppercase bg-gray-50 dark:bg-gray-700 text-gray-500 dark:text-gray-300 border-b border-gray-200 dark:border-gray-600">
            <tr>
              <th class="px-4 py-3">S/No</th>
              <th class="px-4 py-3"><?php echo $this->lang->line('loan_code') ?? 'Loan Code'; ?></th>
              <th class="px-4 py-3"><?php echo $this->lang->line('product_name'); ?></th>
              <th class="px-4 py-3"><?php echo $this->lang->line('principal'); ?></th>
              <th class="px-4 py-3"><?php echo $this->lang->line('loan_amount'); ?></th>
              <th class="px-4 py-3"><?php echo $this->lang->line('collection'); ?></th>
              <th class="px-4 py-3"><?php echo $this->lang->line('withdraw_date'); ?></th>
              <th class="px-4 py-3"><?php echo $this->lang->line('loan_end_date'); ?></th>
              <th class="px-4 py-3"><?php echo $this->lang->line('status') ?? 'Status'; ?></th>
              <th class="px-4 py-3"><?php echo $this->lang->line('action'); ?></th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
            <?php if (!empty($customer_loans)):
              $no = 1;
              foreach ($customer_loans as $cl):
                $s = $cl->loan_status ?? '';
                $b = 'bg-gray-100 text-gray-800';
                $lb = ucfirst($s);
                if ($s == 'open') {
                    $b = 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400';
                } elseif ($s == 'aproved') {
                    $b = 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400';
                    $lb = 'Approved';
                } elseif ($s == 'disbarsed') {
                    $b = 'bg-indigo-100 text-indigo-800 dark:bg-indigo-900/30 dark:text-indigo-400';
                    $lb = 'Disbursed';
                } elseif ($s == 'withdrawal') {
                    $b = 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400';
                    $lb = 'Active';
                } elseif ($s == 'out') {
                    $b = 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400';
                    $lb = 'Expired';
                } elseif ($s == 'done') {
                    $b = 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-400';
                    $lb = 'Full Paid';
                }
            ?>
            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
              <td class="px-4 py-3"><?= $no++ ?></td>
              <td class="px-4 py-3 font-medium text-gray-900 dark:text-white"><?= $cl->loan_code ?? '-' ?></td>
              <td class="px-4 py-3"><?= $cl->loan_name ?? '-' ?></td>
              <td class="px-4 py-3"><?= number_format($cl->loan_aprove ?? 0) ?></td>
              <td class="px-4 py-3"><?= number_format($cl->loan_int ?? 0) ?></td>
              <td class="px-4 py-3"><?= number_format($cl->restration ?? 0) ?></td>
              <td class="px-4 py-3"><?= substr($cl->loan_stat_date ?? '', 0, 10) ?></td>
              <td class="px-4 py-3"><?= substr($cl->loan_end_date ?? '', 0, 10) ?></td>
              <td class="px-4 py-3">
                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-semibold <?= $b ?>">
                  <?= $lb ?>
                </span>
              </td>
              <td class="px-4 py-3">
                <a href="<?= base_url("oficer/payment_statement_detail/{$cl->loan_id}") ?>"
                   class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-medium text-white bg-cyan-600 hover:bg-cyan-700 rounded-lg">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                  <?php echo $this->lang->line('view') ?? 'View'; ?>
                </a>
              </td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
              <td colspan="10" class="px-4 py-6 text-center text-gray-400"><?php echo $this->lang->line('no_data_found') ?? 'No loans found'; ?></td>
            </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>

<?php include_once APPPATH . "views/partials/footer.php"; ?>
