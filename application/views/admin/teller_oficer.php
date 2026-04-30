<?php
include_once APPPATH . "views/partials/header.php";

$t = function ($key, $fallback) {
  $line = $this->lang->line($key);
  return ($line !== false && $line !== '') ? $line : $fallback;
};

$selected_from = isset($filters['from']) ? $filters['from'] : date('Y-m-d');
$selected_to = isset($filters['to']) ? $filters['to'] : date('Y-m-d');
$selected_blanch_id = isset($filters['blanch_id']) ? $filters['blanch_id'] : null;
$selected_empl_id = isset($filters['empl_id']) ? $filters['empl_id'] : null;
?>

<style>
  .teller-theme {
    color-scheme: light;
  }

  .teller-page-bg {
    background:
      radial-gradient(900px 380px at 0% -12%, rgba(14, 165, 233, 0.18), transparent 60%),
      radial-gradient(820px 340px at 100% -10%, rgba(16, 185, 129, 0.16), transparent 58%),
      linear-gradient(180deg, #f8fafc 0%, #eef2ff 100%);
  }

  .officer-table-wrap {
    scrollbar-width: thin;
    scrollbar-color: #94a3b8 #e2e8f0;
  }

  .officer-table-wrap::-webkit-scrollbar {
    height: 8px;
  }

  .officer-table-wrap::-webkit-scrollbar-thumb {
    background: #94a3b8;
    border-radius: 9999px;
  }

  .officer-table-wrap::-webkit-scrollbar-track {
    background: #e2e8f0;
  }

  .teller-card {
    border-color: #e2e8f0;
    background: rgba(255, 255, 255, 0.92);
  }

  .teller-plain-card {
    border-color: #e2e8f0;
    background: #ffffff;
  }

  .teller-subtle-head {
    background: rgba(248, 250, 252, 0.85);
    border-color: #e2e8f0;
  }

  .teller-input {
    background: #ffffff;
    border: 1px solid #cbd5e1;
    color: #0f172a;
  }

  .teller-input:focus {
    border-color: #334155;
    box-shadow: 0 0 0 1px #334155;
    outline: none;
  }

  .teller-btn-secondary {
    border-color: #cbd5e1;
    color: #334155;
    background: #ffffff;
  }

  .teller-btn-pdf {
    border-color: #0ea5e9;
    color: #0c4a6e;
    background: #e0f2fe;
  }

  .teller-btn-pdf:hover {
    background: #bae6fd;
  }

  .teller-btn-primary {
    background: #0f172a !important;
    color: #ffffff !important;
    border: 1px solid #0f172a !important;
  }

  .teller-btn-primary:hover {
    background: #1e293b !important;
    border-color: #1e293b !important;
  }

  .teller-btn-primary:focus-visible {
    outline: 2px solid #334155;
    outline-offset: 2px;
  }

  .teller-table-shell {
    border-color: #e2e8f0;
  }

  .teller-table-body {
    background: #ffffff;
  }

  .teller-row-hover:hover {
    background: #f8fafc;
  }

  .teller-total-row {
    background: rgba(241, 245, 249, 0.9);
  }

  @media (prefers-color-scheme: dark) {
    .teller-theme {
      color-scheme: dark;
    }

    .teller-page-bg {
      background:
        radial-gradient(900px 420px at 0% -12%, rgba(14, 165, 233, 0.25), transparent 60%),
        radial-gradient(820px 360px at 100% -10%, rgba(16, 185, 129, 0.22), transparent 58%),
        linear-gradient(180deg, #0b1220 0%, #111827 100%);
    }

    .teller-card,
    .teller-plain-card {
      border-color: #334155;
      background: rgba(15, 23, 42, 0.9);
      color: #e2e8f0;
    }

    .teller-subtle-head {
      background: rgba(30, 41, 59, 0.75);
      border-color: #334155;
    }

    .teller-muted,
    .teller-label {
      color: #94a3b8 !important;
    }

    .teller-title,
    .teller-strong {
      color: #f8fafc !important;
    }

    .teller-chip {
      background: rgba(16, 185, 129, 0.2);
      color: #6ee7b7;
    }

    .teller-input {
      background: #0f172a;
      border-color: #334155;
      color: #e2e8f0;
    }

    .teller-input:focus {
      border-color: #60a5fa;
      box-shadow: 0 0 0 1px #60a5fa;
    }

    .teller-btn-primary {
      background: #1d4ed8;
    }

    .teller-btn-primary:hover {
      background: #1e40af;
    }

    .teller-btn-secondary {
      border-color: #475569;
      color: #cbd5e1;
      background: #0f172a;
    }

    .teller-btn-secondary:hover {
      background: #1e293b;
    }

    .teller-btn-pdf {
      border-color: #0284c7;
      color: #e0f2fe;
      background: rgba(2, 132, 199, 0.2);
    }

    .teller-btn-pdf:hover {
      background: rgba(2, 132, 199, 0.35);
    }

    .teller-table-shell,
    .teller-table-shell th,
    .teller-table-shell td {
      border-color: #334155;
    }

    .teller-table-body {
      background: transparent;
    }

    .teller-row-hover:hover {
      background: rgba(30, 41, 59, 0.6);
    }

    .teller-total-row {
      background: rgba(30, 41, 59, 0.8);
    }

    .officer-table-wrap {
      scrollbar-color: #475569 #1e293b;
    }

    .officer-table-wrap::-webkit-scrollbar-thumb {
      background: #475569;
    }

    .officer-table-wrap::-webkit-scrollbar-track {
      background: #1e293b;
    }
  }

  .dark .teller-theme {
    color-scheme: dark;
  }
</style>

<div class="w-full lg:ps-64 teller-page-bg teller-theme min-h-screen">
  <div class="p-4 sm:p-6 lg:p-8">
    <div class="max-w-7xl mx-auto space-y-6">
      <section class="rounded-2xl border backdrop-blur-sm shadow-sm teller-card">
        <div class="px-5 py-5 sm:px-7 sm:py-6 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
          <div>
            <p class="text-xs tracking-[0.18em] uppercase font-semibold teller-label"><?php echo htmlspecialchars($t('collections_desk', 'Collections Desk')); ?></p>
            <h1 class="text-2xl sm:text-3xl font-bold teller-title"><?php echo htmlspecialchars($t('teller_officer_performance', 'Teller Officer Performance')); ?></h1>
            <p class="text-sm mt-1 teller-muted"><?php echo htmlspecialchars($t('teller_officer_desc', 'Daily view of customer collection, deposits and withdrawals per officer.')); ?></p>
          </div>
          <div class="inline-flex items-center rounded-xl bg-slate-900 px-4 py-2.5 text-white shadow-sm">
            <span class="text-sm font-medium"><?php echo htmlspecialchars($t('officer_count', 'Officer Count')); ?>:</span>
            <span class="ml-2 text-base font-bold"><?php echo isset($empl_oficer) && is_array($empl_oficer) ? count($empl_oficer) : 0; ?></span>
          </div>
        </div>
      </section>

      <section class="rounded-2xl border shadow-sm teller-plain-card">
        <form method="get" action="<?php echo base_url('admin/teller_oficer'); ?>" class="px-5 py-5 sm:px-7 sm:py-6">
          <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-5 gap-4 items-end">
            <div>
              <label for="from" class="block text-xs font-semibold uppercase tracking-wide mb-1.5 teller-label"><?php echo htmlspecialchars($t('from_date', 'From Date')); ?></label>
              <input type="date" id="from" name="from" value="<?php echo htmlspecialchars($selected_from); ?>" class="w-full rounded-lg text-sm teller-input">
            </div>

            <div>
              <label for="to" class="block text-xs font-semibold uppercase tracking-wide mb-1.5 teller-label"><?php echo htmlspecialchars($t('to_date', 'To Date')); ?></label>
              <input type="date" id="to" name="to" value="<?php echo htmlspecialchars($selected_to); ?>" class="w-full rounded-lg text-sm teller-input">
            </div>

            <div>
              <label for="blanch_id" class="block text-xs font-semibold uppercase tracking-wide mb-1.5 teller-label"><?php echo htmlspecialchars($t('branch', 'Branch')); ?></label>
              <select id="blanch_id" name="blanch_id" class="w-full rounded-lg text-sm teller-input">
                <option value="all"><?php echo htmlspecialchars($t('all_branches', 'All Branches')); ?></option>
                <?php if (!empty($blanch)): ?>
                  <?php foreach ($blanch as $blanch_item): ?>
                    <option value="<?php echo htmlspecialchars($blanch_item->blanch_id); ?>" <?php echo ((string) $selected_blanch_id === (string) $blanch_item->blanch_id) ? 'selected' : ''; ?>>
                      <?php echo htmlspecialchars($blanch_item->blanch_name); ?>
                    </option>
                  <?php endforeach; ?>
                <?php endif; ?>
              </select>
            </div>

            <div>
              <label for="empl_id" class="block text-xs font-semibold uppercase tracking-wide mb-1.5 teller-label"><?php echo htmlspecialchars($t('officer', 'Officer')); ?></label>
              <select id="empl_id" name="empl_id" class="w-full rounded-lg text-sm teller-input">
                <option value="all"><?php echo htmlspecialchars($t('all', 'All')); ?></option>
                <?php if (!empty($officer_options)): ?>
                  <?php foreach ($officer_options as $officer_item): ?>
                    <option value="<?php echo htmlspecialchars($officer_item->empl_id); ?>" <?php echo ((string) $selected_empl_id === (string) $officer_item->empl_id) ? 'selected' : ''; ?>>
                      <?php echo htmlspecialchars($officer_item->empl_name); ?>
                    </option>
                  <?php endforeach; ?>
                <?php endif; ?>
              </select>
            </div>

            <div class="flex gap-2">
              <button type="submit" class="inline-flex items-center justify-center w-full rounded-lg bg-slate-900 px-4 py-2.5 text-sm font-semibold text-white hover:bg-slate-800 transition-colors teller-btn-primary">
                <?php echo htmlspecialchars($t('apply_filters', 'Apply Filters')); ?>
              </button>
              <button type="submit" formaction="<?php echo base_url('admin/teller_oficer_pdf'); ?>" formmethod="get" formtarget="_blank" class="inline-flex items-center justify-center w-full rounded-lg border px-4 py-2.5 text-sm font-semibold transition-colors teller-btn-pdf">
                <?php echo htmlspecialchars($t('download_pdf', 'Download PDF')); ?>
              </button>
              <a href="<?php echo base_url('admin/teller_oficer'); ?>" class="inline-flex items-center justify-center w-full rounded-lg border px-4 py-2.5 text-sm font-semibold transition-colors teller-btn-secondary">
                <?php echo htmlspecialchars($t('reset', 'Reset')); ?>
              </a>
            </div>
          </div>
        </form>
      </section>

      <?php if (!empty($empl_oficer)): ?>
        <?php foreach ($empl_oficer as $oficer_datas): ?>
          <?php
          $empl_loan = $this->queries->get_loan_empl_data($oficer_datas->empl_id, $selected_from, $selected_to, $selected_blanch_id);
          $total_restration = 0;
          $total_received = 0;
          $total_withdrawal = 0;
          ?>

          <section class="rounded-2xl border shadow-sm overflow-hidden teller-plain-card">
            <div class="px-5 sm:px-6 py-4 border-b flex flex-col gap-3 sm:flex-row sm:justify-between sm:items-center teller-subtle-head">
              <div>
                <h2 class="text-lg sm:text-xl font-bold teller-title"><?php echo htmlspecialchars($oficer_datas->empl_name); ?></h2>
                <p class="text-sm teller-muted"><?php echo htmlspecialchars($t('assigned_customers_summary', 'Assigned customers and transaction summary')); ?></p>
              </div>
              <span class="inline-flex items-center rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-800 teller-chip">
                <?php echo htmlspecialchars($t('active_ledger', 'Active Ledger')); ?>
              </span>
            </div>

            <div class="officer-table-wrap overflow-x-auto">
              <table class="min-w-full divide-y divide-slate-200 teller-table-shell">
                <thead class="bg-slate-900">
                  <tr>
                    <th scope="col" class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-200"><?php echo htmlspecialchars($t('s_no', 'S/No')); ?></th>
                    <th scope="col" class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-200"><?php echo htmlspecialchars($t('customer_name', 'Customer Name')); ?></th>
                    <th scope="col" class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-200"><?php echo htmlspecialchars($t('phone_number', 'Phone Number')); ?></th>
                    <th scope="col" class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-200"><?php echo htmlspecialchars($t('duration_type', 'Duration')); ?></th>
                    <th scope="col" class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-200"><?php echo htmlspecialchars($t('receivable_label', 'Receivable')); ?></th>
                    <th scope="col" class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-200"><?php echo htmlspecialchars($t('received_label', 'Received')); ?></th>
                    <th scope="col" class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-200"><?php echo htmlspecialchars($t('deposit_account_label', 'Deposit Account')); ?></th>
                    <th scope="col" class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-200"><?php echo htmlspecialchars($t('withdrawal_label', 'Withdrawal')); ?></th>
                    <th scope="col" class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-200"><?php echo htmlspecialchars($t('withdraw_account_label', 'Withdraw Account')); ?></th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 teller-table-shell teller-table-body">
                  <?php if (!empty($empl_loan)): ?>
                    <?php $no = 1; ?>
                    <?php foreach ($empl_loan as $empl_loans): ?>
                      <?php
                      $total_restration += (float) $empl_loans->restration;
                      $total_received += (float) $empl_loans->total_received;
                      $total_withdrawal += (float) $empl_loans->total_withdrawal;
                      ?>
                      <tr class="transition-colors teller-row-hover">
                        <td class="px-4 py-3 text-sm text-slate-700 teller-muted"><?php echo $no++; ?>.</td>
                        <td class="px-4 py-3 text-sm font-medium text-slate-800 teller-strong"><?php echo htmlspecialchars($empl_loans->f_name . ' ' . $empl_loans->m_name . ' ' . $empl_loans->l_name); ?></td>
                        <td class="px-4 py-3 text-sm text-slate-700 teller-muted"><?php echo htmlspecialchars($empl_loans->phone_no); ?></td>
                        <td class="px-4 py-3 text-sm text-slate-700 teller-muted">
                          <?php
                          if ($empl_loans->day == '1') {
                            echo htmlspecialchars($t('daily', 'Daily'));
                          } elseif ($empl_loans->day == '7') {
                            echo htmlspecialchars($t('weekly', 'Weekly'));
                          } elseif (in_array($empl_loans->day, array('28', '29', '30', '31'), true)) {
                            echo htmlspecialchars($t('monthly', 'Monthly'));
                          } else {
                            echo htmlspecialchars($t('not_available_short', 'N/A'));
                          }
                          ?>
                        </td>
                        <td class="px-4 py-3 text-sm text-slate-700 teller-muted"><?php echo number_format((float) $empl_loans->restration); ?></td>
                        <td class="px-4 py-3 text-sm text-slate-700 teller-muted"><?php echo number_format((float) $empl_loans->total_received); ?></td>
                        <td class="px-4 py-3 text-sm text-slate-700 teller-muted"><?php echo htmlspecialchars($empl_loans->depost_account); ?></td>
                        <td class="px-4 py-3 text-sm text-slate-700 teller-muted"><?php echo number_format((float) $empl_loans->total_withdrawal); ?></td>
                        <td class="px-4 py-3 text-sm text-slate-700 teller-muted"><?php echo htmlspecialchars($empl_loans->with_account); ?></td>
                      </tr>
                    <?php endforeach; ?>

                    <tr class="teller-total-row">
                      <td class="px-4 py-3"></td>
                      <td class="px-4 py-3 text-sm font-semibold text-slate-900 teller-strong"><?php echo htmlspecialchars($t('total', 'TOTAL')); ?></td>
                      <td class="px-4 py-3"></td>
                      <td class="px-4 py-3"></td>
                      <td class="px-4 py-3 text-sm font-bold text-slate-900 teller-strong"><?php echo number_format($total_restration); ?></td>
                      <td class="px-4 py-3 text-sm font-bold text-slate-900 teller-strong"><?php echo number_format($total_received); ?></td>
                      <td class="px-4 py-3"></td>
                      <td class="px-4 py-3 text-sm font-bold text-slate-900 teller-strong"><?php echo number_format($total_withdrawal); ?></td>
                      <td class="px-4 py-3"></td>
                    </tr>
                  <?php else: ?>
                    <tr>
                      <td colspan="9" class="px-4 py-8 text-center text-sm text-slate-500 teller-muted"><?php echo htmlspecialchars($t('no_customer_records_officer', 'No customer records found for this officer.')); ?></td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </section>
        <?php endforeach; ?>
      <?php else: ?>
        <section class="rounded-2xl border border-dashed px-6 py-12 text-center shadow-sm teller-plain-card">
          <h3 class="text-lg font-semibold text-slate-800 teller-title"><?php echo htmlspecialchars($t('no_officer_data_available', 'No officer data available')); ?></h3>
          <p class="mt-2 text-sm text-slate-500 teller-muted"><?php echo htmlspecialchars($t('add_or_assign_officers_hint', 'Add or assign officers to see teller summaries here.')); ?></p>
        </section>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php
include_once APPPATH . "views/partials/footer.php";
?>
