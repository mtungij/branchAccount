<?php
include_once APPPATH . "views/partials/header.php";

$employee = $employee ?? null;
$resolved_officer_id = '';
if (isset($officer_id) && !empty($officer_id)) {
  $resolved_officer_id = (string) $officer_id;
} elseif (isset($employee->empl_id) && !empty($employee->empl_id)) {
  $resolved_officer_id = (string) $employee->empl_id;
}

$metrics = $metrics ?? (object) [
    'loans_issued' => 0,
    'active_clients' => 0,
    'par_30_amount' => 0,
    'par_30_loans' => 0,
  'defaulters_count' => 0,
  'new_clients_one_loan' => 0,
  'arrears_collected' => 0,
  'total_transactions_processed' => 0,
  'deposit_transactions_processed' => 0,
  'withdraw_transactions_processed' => 0,
  'deposit_transactions_amount' => 0,
  'withdraw_transactions_amount' => 0,
  'total_transactions_amount' => 0,
];
?>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

  .loan-metrics-poppins {
    font-family: 'Poppins', sans-serif;
  }
</style>

<div class="w-full lg:ps-64 loan-metrics-poppins">
  <section class="bg-gray-50 dark:bg-gray-900 min-h-screen p-3 sm:p-5">
    <div class="w-full max-w-7xl mx-auto space-y-6">
      <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
          <a href="<?= base_url('admin/all_employee'); ?>" class="inline-flex items-center gap-x-2 text-sm text-cyan-700 hover:text-cyan-800 dark:text-cyan-300 dark:hover:text-cyan-200">
            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="m15 18-6-6 6-6"/>
            </svg>
            <?php echo $this->lang->line('back_to_all_employees'); ?>
          </a>
          <h1 class="mt-3 text-2xl font-bold uppercase tracking-wide text-gray-900 dark:text-white">
            <?= htmlspecialchars((isset($employee->empl_name) ? $employee->empl_name : ''), ENT_QUOTES, 'UTF-8'); ?>
          </h1>
          <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
            <?php echo $this->lang->line('loan_officer_core_metrics'); ?><?= (isset($employee) && isset($employee->blanch_name) && !empty($employee->blanch_name)) ? ' - ' . htmlspecialchars($employee->blanch_name, ENT_QUOTES, 'UTF-8') : ''; ?>
          </p>
        </div>

        <div class="rounded-2xl border border-cyan-100 bg-white px-4 py-3 shadow-sm dark:border-gray-700 dark:bg-gray-800">
          <p class="text-xs font-semibold uppercase tracking-[0.2em] text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('position'); ?></p>
          <p class="mt-1 text-sm font-semibold text-gray-900 dark:text-white"><?= htmlspecialchars($employee->position ?? $this->lang->line('loan_officer'), ENT_QUOTES, 'UTF-8'); ?></p>
        </div>
      </div>

      <div class="grid gap-4 md:grid-cols-3">
        <div class="metric-card cursor-pointer transition-all hover:shadow-lg hover:scale-105 rounded-2xl border border-blue-100 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-800" data-metric="loans_issued" data-officer-id="<?= htmlspecialchars($resolved_officer_id, ENT_QUOTES, 'UTF-8'); ?>">
          <p class="text-xs font-semibold uppercase tracking-[0.2em] text-blue-600 dark:text-blue-300"><?php echo $this->lang->line('metric_loans_issued'); ?></p>
          <p class="mt-4 text-3xl font-bold text-gray-900 dark:text-white"><?= number_format((int) $metrics->loans_issued); ?></p>
          <p class="mt-2 text-sm text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('metric_loans_issued_desc'); ?></p>
        </div>

        <div class="metric-card cursor-pointer transition-all hover:shadow-lg hover:scale-105 rounded-2xl border border-emerald-100 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-800" data-metric="active_clients" data-officer-id="<?= htmlspecialchars($resolved_officer_id, ENT_QUOTES, 'UTF-8'); ?>">
          <p class="text-xs font-semibold uppercase tracking-[0.2em] text-emerald-600 dark:text-emerald-300"><?php echo $this->lang->line('metric_active_clients'); ?></p>
          <p class="mt-4 text-3xl font-bold text-gray-900 dark:text-white"><?= number_format((int) $metrics->active_clients); ?></p>
          <p class="mt-2 text-sm text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('metric_active_clients_desc'); ?></p>
        </div>

        <div class="metric-card cursor-pointer transition-all hover:shadow-lg hover:scale-105 rounded-2xl border border-amber-100 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-800" data-metric="par_30" data-officer-id="<?= htmlspecialchars($resolved_officer_id, ENT_QUOTES, 'UTF-8'); ?>">
          <p class="text-xs font-semibold uppercase tracking-[0.2em] text-amber-600 dark:text-amber-300"><?php echo $this->lang->line('metric_par_30_days'); ?></p>
          <p class="mt-4 text-3xl font-bold text-gray-900 dark:text-white">TZS <?= number_format((float) $metrics->par_30_amount, 2); ?></p>
          <p class="mt-2 text-sm text-gray-500 dark:text-gray-400"><?= number_format((int) $metrics->par_30_loans); ?> <?php echo $this->lang->line('metric_par_30_days_desc'); ?></p>
        </div>

        <div class="metric-card cursor-pointer transition-all hover:shadow-lg hover:scale-105 rounded-2xl border border-rose-100 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-800" data-metric="defaulters" data-officer-id="<?= htmlspecialchars($resolved_officer_id, ENT_QUOTES, 'UTF-8'); ?>">
          <p class="text-xs font-semibold uppercase tracking-[0.2em] text-rose-600 dark:text-rose-300"><?php echo $this->lang->line('metric_number_of_defaulters'); ?></p>
          <p class="mt-4 text-3xl font-bold text-gray-900 dark:text-white"><?= number_format((int) $metrics->defaulters_count); ?></p>
          <p class="mt-2 text-sm text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('metric_number_of_defaulters_desc'); ?></p>
        </div>

        <div class="metric-card cursor-pointer transition-all hover:shadow-lg hover:scale-105 rounded-2xl border border-indigo-100 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-800" data-metric="new_clients" data-officer-id="<?= htmlspecialchars($resolved_officer_id, ENT_QUOTES, 'UTF-8'); ?>">
          <p class="text-xs font-semibold uppercase tracking-[0.2em] text-indigo-600 dark:text-indigo-300"><?php echo $this->lang->line('metric_new_clients_acquired'); ?></p>
          <p class="mt-4 text-3xl font-bold text-gray-900 dark:text-white"><?= number_format((int) $metrics->new_clients_one_loan); ?></p>
          <p class="mt-2 text-sm text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('metric_new_clients_acquired_desc'); ?></p>
        </div>

        <div class="metric-card cursor-pointer transition-all hover:shadow-lg hover:scale-105 rounded-2xl border border-teal-100 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-800" data-metric="arrears" data-officer-id="<?= htmlspecialchars($resolved_officer_id, ENT_QUOTES, 'UTF-8'); ?>">
          <p class="text-xs font-semibold uppercase tracking-[0.2em] text-teal-600 dark:text-teal-300"><?php echo $this->lang->line('metric_arrears_collected'); ?></p>
          <p class="mt-4 text-3xl font-bold text-gray-900 dark:text-white">TZS <?= number_format((float) $metrics->arrears_collected, 2); ?></p>
          <p class="mt-2 text-sm text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('metric_arrears_collected_desc'); ?></p>
        </div>

        <div class="metric-card cursor-pointer transition-all hover:shadow-lg hover:scale-105 rounded-2xl border border-sky-100 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-800" data-metric="total_transactions" data-officer-id="<?= htmlspecialchars($resolved_officer_id, ENT_QUOTES, 'UTF-8'); ?>">
          <p class="text-xs font-semibold uppercase tracking-[0.2em] text-sky-600 dark:text-sky-300"><?php echo $this->lang->line('metric_total_transactions_processed'); ?></p>
          <p class="mt-4 text-3xl font-bold text-gray-900 dark:text-white"><?= number_format((int) $metrics->total_transactions_processed); ?></p>
          <p class="mt-1 text-lg font-semibold text-gray-800 dark:text-gray-200">TZS <?= number_format((float) $metrics->total_transactions_amount, 2); ?></p>
          <p class="mt-2 text-sm text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('metric_total_transactions_processed_desc'); ?></p>
        </div>

        <div class="metric-card cursor-pointer transition-all hover:shadow-lg hover:scale-105 rounded-2xl border border-lime-100 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-800" data-metric="deposit_transactions" data-officer-id="<?= htmlspecialchars($resolved_officer_id, ENT_QUOTES, 'UTF-8'); ?>">
          <p class="text-xs font-semibold uppercase tracking-[0.2em] text-lime-600 dark:text-lime-300"><?php echo $this->lang->line('metric_deposit_transactions'); ?></p>
          <p class="mt-4 text-3xl font-bold text-gray-900 dark:text-white"><?= number_format((int) $metrics->deposit_transactions_processed); ?></p>
          <p class="mt-1 text-lg font-semibold text-gray-800 dark:text-gray-200">TZS <?= number_format((float) $metrics->deposit_transactions_amount, 2); ?></p>
          <p class="mt-2 text-sm text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('metric_deposit_transactions_desc'); ?></p>
        </div>

        <div class="metric-card cursor-pointer transition-all hover:shadow-lg hover:scale-105 rounded-2xl border border-orange-100 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-800" data-metric="withdraw_transactions" data-officer-id="<?= htmlspecialchars($resolved_officer_id, ENT_QUOTES, 'UTF-8'); ?>">
          <p class="text-xs font-semibold uppercase tracking-[0.2em] text-orange-600 dark:text-orange-300"><?php echo $this->lang->line('metric_withdraw_transactions'); ?></p>
          <p class="mt-4 text-3xl font-bold text-gray-900 dark:text-white"><?= number_format((int) $metrics->withdraw_transactions_processed); ?></p>
          <p class="mt-1 text-lg font-semibold text-gray-800 dark:text-gray-200">TZS <?= number_format((float) $metrics->withdraw_transactions_amount, 2); ?></p>
          <p class="mt-2 text-sm text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('metric_withdraw_transactions_desc'); ?></p>
        </div>
      </div>

      <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-800">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-white"><?php echo $this->lang->line('metrics_notes'); ?></h2>
        <div class="mt-4 grid gap-3 md:grid-cols-3 text-sm text-gray-600 dark:text-gray-300">
          <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-900/60">
            <?php echo $this->lang->line('metrics_note_loans_issued'); ?>
          </div>
          <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-900/60">
            <?php echo $this->lang->line('metrics_note_active_clients'); ?>
          </div>
          <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-900/60">
            <?php echo $this->lang->line('metrics_note_par_30'); ?>
          </div>
          <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-900/60">
            <?php echo $this->lang->line('metrics_note_defaulters'); ?>
          </div>
          <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-900/60">
            <?php echo $this->lang->line('metrics_note_new_clients'); ?>
          </div>
          <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-900/60">
            <?php echo $this->lang->line('metrics_note_arrears'); ?>
          </div>
          <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-900/60">
            <?php echo $this->lang->line('metrics_note_total_transactions'); ?>
          </div>
          <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-900/60">
            <?php echo $this->lang->line('metrics_note_deposit_withdraw_breakdown'); ?>
          </div>
          <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-900/60">
            <?php echo $this->lang->line('metrics_note_transaction_cards'); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Detailed Data Modal -->
<div id="detailModal" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4" style="background: rgba(8, 145, 178, 0.18); backdrop-filter: blur(6px); -webkit-backdrop-filter: blur(6px);">
  <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">
    <div class="sticky top-0 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 p-6 flex items-center justify-between">
      <h2 id="modalTitle" class="text-2xl font-bold text-gray-900 dark:text-white"><?php echo $this->lang->line('metric_details'); ?></h2>
      <button type="button" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300" onclick="closeModal()">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
      </button>
    </div>

    <div class="p-6">
      <div id="modalContent" class="text-gray-700 dark:text-gray-300">
        <!-- Content will be loaded here -->
      </div>
    </div>
  </div>
</div>

<script>
const LOAN_METRICS_I18N = {
  metricDetails: <?= json_encode($this->lang->line('metric_details')); ?>,
  errorLoadingData: <?= json_encode($this->lang->line('error_loading_data')); ?>,
  missingOfficerId: <?= json_encode($this->lang->line('missing_officer_id')); ?>,
  nonJsonResponse: <?= json_encode($this->lang->line('non_json_response')); ?>,
  requestFailedWithStatus: <?= json_encode($this->lang->line('request_failed_with_status')); ?>,
  unknownError: <?= json_encode($this->lang->line('unknown_error')); ?>,
};

function closeModal() {
  document.getElementById('detailModal').classList.add('hidden');
}

function updateLoansIssuedDownloadLink() {
  const link = document.getElementById('loansIssuedDownloadLink');
  const statusFilter = document.getElementById('loansIssuedStatusFilter');
  if (!link) {
    return;
  }

  const baseUrl = link.getAttribute('data-base-url') || link.getAttribute('href') || '';
  const selectedStatus = statusFilter ? statusFilter.value.trim() : '';
  let href = baseUrl;
  if (selectedStatus) {
    href += (baseUrl.indexOf('?') === -1 ? '?' : '&') + 'status=' + encodeURIComponent(selectedStatus);
  }
  link.setAttribute('href', href);
}

function applyLoansIssuedFilters() {
  const searchInput = document.getElementById('loansIssuedSearch');
  const statusFilter = document.getElementById('loansIssuedStatusFilter');
  const rows = document.querySelectorAll('#loansIssuedTable tbody tr');

  const q = searchInput ? searchInput.value.toLowerCase().trim() : '';
  const statusValue = statusFilter ? statusFilter.value.toLowerCase().trim() : '';

  rows.forEach(function(row) {
    const name = row.cells[1] ? row.cells[1].textContent.toLowerCase() : '';
    const phone = row.cells[2] ? row.cells[2].textContent.toLowerCase() : '';
    const statusText = row.cells[13] ? row.cells[13].textContent.toLowerCase().trim() : '';
    const statusKey = statusText.replace(/\s+/g, '_');

    const matchesSearch = !q || name.includes(q) || phone.includes(q);
    const matchesStatus = !statusValue || statusKey === statusValue;
    row.style.display = (matchesSearch && matchesStatus) ? '' : 'none';
  });

  updateLoansIssuedDownloadLink();
}

document.querySelectorAll('.metric-card').forEach(card => {
  card.addEventListener('click', function() {
    const metric = this.dataset.metric;
    const officerId = this.dataset.officerId;
    loadMetricDetails(metric, officerId);
  });
});

function loadMetricDetails(metric, officerId) {
  const modal = document.getElementById('detailModal');
  const modalContent = document.getElementById('modalContent');
  const modalTitle = document.getElementById('modalTitle');

  if (!officerId) {
    modalTitle.textContent = LOAN_METRICS_I18N.metricDetails;
    modalContent.innerHTML = '<p class="text-red-600">' + LOAN_METRICS_I18N.errorLoadingData + ': ' + LOAN_METRICS_I18N.missingOfficerId + '</p>';
    modal.classList.remove('hidden');
    return;
  }
  
  // Show loading state
  modalContent.innerHTML = '<div class="flex items-center justify-center py-8"><div class="animate-spin rounded-full h-12 w-12 border-b-2 border-cyan-600"></div></div>';
  modal.classList.remove('hidden');

  // Fetch data from server
  fetch(`<?= base_url('admin/get_metric_details'); ?>`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'Accept': 'application/json',
      'X-Requested-With': 'XMLHttpRequest',
    },
    body: JSON.stringify({
      metric: metric,
      officer_id: officerId
    })
  })
  .then(response => response.text().then(text => ({ ok: response.ok, status: response.status, text })))
  .then(({ ok, status, text }) => {
    let data = null;

    try {
      data = JSON.parse(text);
    } catch (e) {
      const preview = (text || '').replace(/<[^>]*>/g, ' ').trim().substring(0, 220);
      throw new Error(`Unexpected server response (${status}): ${preview || LOAN_METRICS_I18N.nonJsonResponse}`);
    }

    if (!ok) {
      throw new Error(data.message || `${LOAN_METRICS_I18N.requestFailedWithStatus} ${status}`);
    }

    return data;
  })
  .then(data => {
    if (data.success) {
      modalTitle.textContent = data.title;
      modalContent.innerHTML = data.html;
      if (metric === 'loans_issued') {
        applyLoansIssuedFilters();
      }
    } else {
      const debug = data.debug ? '<br><span class="text-xs text-gray-500">' + data.debug + '</span>' : '';
      modalContent.innerHTML = '<p class="text-red-600">' + LOAN_METRICS_I18N.errorLoadingData + ': ' + (data.message || LOAN_METRICS_I18N.unknownError) + debug + '</p>';
    }
  })
  .catch(error => {
    modalContent.innerHTML = '<p class="text-red-600">' + LOAN_METRICS_I18N.errorLoadingData + ': ' + error + '</p>';
  });
}

// Close modal when clicking outside of it
document.getElementById('detailModal').addEventListener('click', function(e) {
  if (e.target === this) {
    closeModal();
  }
});

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
  if (e.key === 'Escape') {
    closeModal();
  }
});
</script>
</div>