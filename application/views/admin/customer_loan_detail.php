<?php
include_once APPPATH . "views/partials/header.php";
?>

<div class="w-full lg:ps-64">
  <div class="p-4 sm:p-6 space-y-6">

    <!-- Back Button -->
    <div>
      <a href="<?= base_url('admin/loan_withdrawal') ?>" class="inline-flex items-center gap-2 text-sm text-cyan-600 hover:underline dark:text-cyan-400">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        <?php echo $this->lang->line('back') ?? 'Back'; ?>
      </a>
    </div>

    <!-- Customer Profile Card -->
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

    <!-- Loans List -->
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
                $svg = '';
                if ($s == 'open') {
                    $b = 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400';
                    $svg = '<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>';
                }
                elseif ($s == 'aproved') {
                    $b = 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400';
                    $lb = 'Approved';
                    $svg = '<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>';
                }
                elseif ($s == 'disbarsed') {
                    $b = 'bg-indigo-100 text-indigo-800 dark:bg-indigo-900/30 dark:text-indigo-400';
                    $lb = 'Disbursed';
                    $svg = '<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>';
                }
                elseif ($s == 'withdrawal') {
                    $b = 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400';
                    $lb = 'Active';
                    $svg = '<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>';
                }
                elseif ($s == 'out') {
                    $b = 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400';
                    $lb = 'Expired';
                    $svg = '<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>';
                }
                elseif ($s == 'done') {
                    $b = 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-400';
                    $lb = 'Full Paid';
                    $svg = '<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>';
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
                  <?= $svg ?><?= $lb ?>
                </span>
              </td>
              <td class="px-4 py-3">
                <a href="<?= base_url("admin/payment_statement_detail/{$cl->loan_id}") ?>" 
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
