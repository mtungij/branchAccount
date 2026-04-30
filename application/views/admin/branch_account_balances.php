<?php
include_once APPPATH . "views/partials/header.php";
?>

<div class="w-full lg:ps-64">
  <div class="p-4 sm:p-6 space-y-6">
    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-4 sm:p-6 shadow-sm">
      <div class="flex items-center justify-between mb-4">
        <h2 class="text-lg sm:text-xl font-semibold text-gray-800 dark:text-white"><?php echo $this->lang->line('branch_account_balances'); ?></h2>
        <?php
          $download_params = [
            'from' => $from ?? '',
            'to' => $to ?? '',
            'blanch_id' => $blanch_id ?? '',
            'trans_id' => $trans_id ?? '',
          ];
        ?>
        <div class="flex items-center gap-3">
          <a href="<?php echo base_url('admin/download_branch_account_balances_pdf?' . http_build_query($download_params)); ?>"
             class="inline-flex items-center px-3 py-2 text-sm font-medium rounded-md bg-cyan-600 text-white hover:bg-cyan-700">
            <?php echo $this->lang->line('download_pdf'); ?>
          </a>
          <span class="text-sm font-medium text-cyan-700 dark:text-cyan-400">
            <?php echo $this->lang->line('total'); ?>: <?php echo number_format((float)($total_balance_amount ?? 0)); ?>
          </span>
        </div>
      </div>

      <form method="get" action="<?php echo base_url('admin/branch_account_balances'); ?>" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3 mb-4">
        <?php
          $today = date('Y-m-d');
          $week_from = date('Y-m-d', strtotime('monday this week'));
          $week_to = date('Y-m-d', strtotime('sunday this week'));
          $month_from = date('Y-m-01');
          $month_to = date('Y-m-t');

          $preset_base = [
            'blanch_id' => $blanch_id ?? '',
            'trans_id' => $trans_id ?? '',
          ];

          $today_params = array_merge($preset_base, ['from' => $today, 'to' => $today]);
          $week_params = array_merge($preset_base, ['from' => $week_from, 'to' => $week_to]);
          $month_params = array_merge($preset_base, ['from' => $month_from, 'to' => $month_to]);
        ?>
        <div class="sm:col-span-2 lg:col-span-5 flex flex-wrap items-center gap-2 mb-1">
          <span class="text-xs font-semibold text-gray-600 dark:text-gray-300"><?php echo $this->lang->line('quick_filter'); ?>:</span>
          <a href="<?php echo base_url('admin/branch_account_balances?' . http_build_query($today_params)); ?>" class="inline-flex items-center px-3 py-1.5 text-xs font-medium rounded-md bg-cyan-100 text-cyan-700 hover:bg-cyan-200"><?php echo $this->lang->line('today'); ?></a>
          <a href="<?php echo base_url('admin/branch_account_balances?' . http_build_query($week_params)); ?>" class="inline-flex items-center px-3 py-1.5 text-xs font-medium rounded-md bg-cyan-100 text-cyan-700 hover:bg-cyan-200"><?php echo $this->lang->line('this_week'); ?></a>
          <a href="<?php echo base_url('admin/branch_account_balances?' . http_build_query($month_params)); ?>" class="inline-flex items-center px-3 py-1.5 text-xs font-medium rounded-md bg-cyan-100 text-cyan-700 hover:bg-cyan-200"><?php echo $this->lang->line('this_month'); ?></a>
        </div>
        <div>
          <label class="block text-xs font-semibold text-gray-600 dark:text-gray-300 mb-1"><?php echo rtrim($this->lang->line('from'), ':'); ?></label>
          <input type="date" name="from" value="<?php echo htmlspecialchars($from ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="w-full rounded-md border border-gray-300 dark:border-gray-600 px-3 py-2 text-sm bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-100">
        </div>
        <div>
          <label class="block text-xs font-semibold text-gray-600 dark:text-gray-300 mb-1"><?php echo rtrim($this->lang->line('to'), ':'); ?></label>
          <input type="date" name="to" value="<?php echo htmlspecialchars($to ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="w-full rounded-md border border-gray-300 dark:border-gray-600 px-3 py-2 text-sm bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-100">
        </div>
        <div>
          <label class="block text-xs font-semibold text-gray-600 dark:text-gray-300 mb-1"><?php echo rtrim($this->lang->line('branch'), ':'); ?></label>
          <select id="branchFilterSelect" name="blanch_id" class="w-full rounded-md border border-gray-300 dark:border-gray-600 px-3 py-2 text-sm bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-100 select2">
            <option value=""><?php echo $this->lang->line('all_branches'); ?></option>
            <?php if (!empty($branches)): ?>
              <?php foreach ($branches as $branch): ?>
                <option value="<?php echo $branch->blanch_id; ?>" <?php echo ((string)($blanch_id ?? '') === (string)$branch->blanch_id) ? 'selected' : ''; ?>>
                  <?php echo htmlspecialchars($branch->blanch_name ?? '-', ENT_QUOTES, 'UTF-8'); ?>
                </option>
              <?php endforeach; ?>
            <?php endif; ?>
          </select>
        </div>
        <div>
          <label class="block text-xs font-semibold text-gray-600 dark:text-gray-300 mb-1"><?php echo $this->lang->line('account'); ?></label>
          <select id="accountFilterSelect" name="trans_id[]" multiple class="w-full rounded-md border border-gray-300 dark:border-gray-600 px-3 py-2 text-sm bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-100 select2">
            <?php if (!empty($accounts)): ?>
              <?php foreach ($accounts as $account): ?>
                <option value="<?php echo $account->trans_id; ?>" <?php echo (!empty($trans_id) && in_array((string)$account->trans_id, array_map('strval', $trans_id), true)) ? 'selected' : ''; ?>>
                  <?php echo htmlspecialchars($account->account_name ?? '-', ENT_QUOTES, 'UTF-8'); ?>
                </option>
              <?php endforeach; ?>
            <?php endif; ?>
          </select>
        </div>
        <div class="flex items-end gap-2">
          <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium rounded-md bg-cyan-600 text-white hover:bg-cyan-700"><?php echo $this->lang->line('filter'); ?></button>
          <a href="<?php echo base_url('admin/branch_account_balances'); ?>" class="inline-flex items-center px-3 py-2 text-sm font-medium rounded-md bg-gray-200 text-gray-700 hover:bg-gray-300"><?php echo $this->lang->line('reset'); ?></a>
        </div>
      </form>

      <div class="overflow-x-auto">
        <?php if (!empty($balances)): ?>
          <?php
            $grouped_balances = [];
            foreach ($balances as $row) {
              $branch_name = $row->blanch_name ?? '-';
              if (!isset($grouped_balances[$branch_name])) {
                $grouped_balances[$branch_name] = [
                  'rows' => [],
                  'subtotal' => 0,
                ];
              }

              $amount = (float)($row->blanch_capital ?? 0);
              $grouped_balances[$branch_name]['rows'][] = $row;
              $grouped_balances[$branch_name]['subtotal'] += $amount;
            }
          ?>

          <?php foreach ($grouped_balances as $branch_name => $branch_data): ?>
            <div class="mb-5 border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
              <div class="px-4 py-3 bg-gray-100 dark:bg-gray-700 flex items-center justify-between">
                <h3 class="text-sm font-semibold text-gray-800 dark:text-white">
                  <?php echo htmlspecialchars($branch_name, ENT_QUOTES, 'UTF-8'); ?>
                </h3>
                <span class="text-sm font-semibold text-cyan-700 dark:text-cyan-300">
                  <?php echo $this->lang->line('branch_total'); ?>: <?php echo number_format($branch_data['subtotal']); ?>
                </span>
              </div>

              <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-cyan-600 dark:bg-cyan-600">
                  <tr>
                    <th class="px-4 py-3 text-start text-xs font-semibold uppercase text-white"><?php echo $this->lang->line('account_name'); ?></th>
                    <th class="px-4 py-3 text-end text-xs font-semibold uppercase text-white"><?php echo $this->lang->line('balance'); ?></th>
                    <th class="px-4 py-3 text-center text-xs font-semibold uppercase text-white w-24"></th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-gray-800">
                  <?php foreach ($branch_data['rows'] as $row): ?>
                    <tr id="row-<?php echo $row->ac_id; ?>">
                      <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200"><?php echo htmlspecialchars($row->account_name ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
                      <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200 text-end"><?php echo number_format((float)($row->blanch_capital ?? 0)); ?></td>
                      <td class="px-4 py-3 text-center">
                        <button type="button" onclick="openEditModal(<?php echo $row->ac_id; ?>, '<?php echo htmlspecialchars($row->account_name ?? '', ENT_QUOTES, 'UTF-8'); ?>', <?php echo (int)($row->blanch_capital ?? 0); ?>, '<?php echo htmlspecialchars($branch_name, ENT_QUOTES, 'UTF-8'); ?>')" class="text-xs px-2 py-1 rounded bg-yellow-500 text-white hover:bg-yellow-600"><i class="fa fa-pencil"></i></button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="px-4 py-4 text-sm text-center text-gray-500 dark:text-gray-400 border border-gray-200 dark:border-gray-700 rounded-lg">
            <?php echo $this->lang->line('no_account_balances_found'); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<!-- Edit Balance Modal -->
<div id="editBalanceModal" class="hidden fixed inset-0 z-50 flex items-center justify-center">
  <div class="fixed inset-0 bg-gray-900/20 backdrop-blur-md" onclick="closeEditModal()"></div>
  <div class="relative bg-white dark:bg-gray-800 rounded-lg shadow-xl w-full max-w-md mx-4 p-6">
    <div class="flex items-center justify-between mb-4">
      <h3 class="text-lg font-semibold text-gray-800 dark:text-white"><?php echo $this->lang->line('update_balance') ?? 'Update Balance'; ?></h3>
      <button type="button" onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300"><i class="fa fa-times"></i></button>
    </div>
    <p id="editBranchName" class="text-sm font-medium text-cyan-700 dark:text-cyan-400 mb-1"></p>
    <p id="editAccountName" class="text-sm text-gray-600 dark:text-gray-400 mb-4"></p>
    <input type="hidden" id="editAcId">
    <input type="hidden" id="editBalanceRaw">
    <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1"><?php echo $this->lang->line('balance') ?? 'Balance'; ?></label>
      <input type="text" id="editBalanceInput" oninput="formatBalanceInput(this)" class="w-full rounded-md border border-gray-300 dark:border-gray-600 px-3 py-2 text-sm bg-white dark:bg-gray-700 text-gray-800 dark:text-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500">
    </div>
    <div class="flex justify-end gap-2">
      <button type="button" onclick="closeEditModal()" class="px-4 py-2 text-sm font-medium rounded-md bg-gray-200 text-gray-700 hover:bg-gray-300 dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500"><?php echo $this->lang->line('cancel') ?? 'Cancel'; ?></button>
      <button type="button" onclick="submitBalance()" class="px-4 py-2 text-sm font-medium rounded-md bg-cyan-600 text-white hover:bg-cyan-700"><?php echo $this->lang->line('save') ?? 'Save'; ?></button>
    </div>
  </div>
</div>

<?php
include_once APPPATH . "views/partials/footer.php";
?>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<style>
.select2-container--default .select2-selection--single {
  background-color: #ffffff;
  border: 1px solid #d1d5db;
  border-radius: 0.5rem;
  padding: 0.75rem 2.5rem 0.75rem 1rem;
  height: auto;
  color: #1f2937;
  font-size: 0.875rem;
  position: relative;
}

.select2-container--default .select2-selection--multiple {
  background-color: #ffffff;
  border: 1px solid #d1d5db;
  border-radius: 0.5rem;
  min-height: 44px;
  font-size: 0.875rem;
  padding: 0.35rem 0.5rem;
}

.select2-selection__rendered,
.select2-selection__clear,
.select2-selection__arrow {
  color: #374151;
}

.select2-selection__arrow {
  right: 1rem;
  top: 0;
  width: 1.5rem;
  position: absolute;
}

.select2-selection__clear {
  right: 2.5rem;
  top: 50%;
  transform: translateY(-50%);
  position: absolute;
}

.custom-select2-dropdown {
  background-color: #ffffff;
  color: #1f2937;
  border: 1px solid #d1d5db;
  border-radius: 0.5rem;
  padding: 0.5rem;
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
  color: #1f2937 !important;
}

.select2-container--default .select2-selection--multiple .select2-selection__rendered {
  color: #1f2937 !important;
}

.select2-container--default .select2-selection--multiple .select2-selection__choice {
  background-color: #e5e7eb;
  border: 1px solid #d1d5db;
  color: #1f2937;
}

.custom-select2-dropdown .select2-results__option--highlighted {
  background-color: #06b6d4 !important;
  color: #ffffff !important;
}

.select2-search__field {
  color: #1f2937 !important;
  background-color: #ffffff !important;
  border: 1px solid #d1d5db;
}

.dark .select2-container--default .select2-selection--single,
.dark .select2-container--default .select2-selection--multiple {
  background-color: #374151;
  border-color: #4b5563;
}

.dark .select2-container--default .select2-selection--single .select2-selection__rendered,
.dark .select2-container--default .select2-selection--multiple .select2-selection__rendered,
.dark .select2-selection__clear,
.dark .select2-selection__arrow {
  color: #f3f4f6 !important;
}

.dark .custom-select2-dropdown {
  background-color: #374151;
  color: #f3f4f6;
  border-color: #4b5563;
}

.dark .select2-search__field {
  color: #f3f4f6 !important;
  background-color: #374151 !important;
  border-color: #4b5563;
}

.dark .select2-container--default .select2-selection--multiple .select2-selection__choice {
  background-color: #4b5563;
  border-color: #6b7280;
  color: #f3f4f6;
}

.custom-select2-container { margin: 0; }
</style>

<script>
$(document).ready(function () {
  const selectConfig = {
    allowClear: true,
    width: '100%',
    dropdownCssClass: 'custom-select2-dropdown',
    containerCssClass: 'custom-select2-container'
  };

  $('#branchFilterSelect').select2({...selectConfig, placeholder: "<?php echo $this->lang->line('select_branch'); ?>"});
  $('#accountFilterSelect').select2({...selectConfig, placeholder: "<?php echo $this->lang->line('select_accounts'); ?>", closeOnSelect: false});
});

function formatBalanceInput(el) {
  var raw = el.value.replace(/[^0-9]/g, '');
  document.getElementById('editBalanceRaw').value = raw;
  if (raw === '') { el.value = ''; return; }
  el.value = Number(raw).toLocaleString();
}

function openEditModal(acId, accountName, currentBalance, branchName) {
  document.getElementById('editAcId').value = acId;
  document.getElementById('editBranchName').textContent = branchName;
  document.getElementById('editAccountName').textContent = accountName;
  document.getElementById('editBalanceRaw').value = currentBalance;
  document.getElementById('editBalanceInput').value = Number(currentBalance).toLocaleString();
  document.getElementById('editBalanceModal').classList.remove('hidden');
  document.getElementById('editBalanceInput').focus();
}

function closeEditModal() {
  document.getElementById('editBalanceModal').classList.add('hidden');
}

function submitBalance() {
  var acId = document.getElementById('editAcId').value;
  var newVal = document.getElementById('editBalanceRaw').value;
  if (newVal === '') return;

  $.ajax({
    url: '<?php echo base_url("admin/update_branch_account_balance"); ?>',
    type: 'POST',
    data: { ac_id: acId, blanch_capital: newVal, '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>' },
    dataType: 'json',
    success: function(res) {
      if (res.status === 'success') {
        location.reload();
      } else {
        alert(res.message || 'Update failed');
      }
    },
    error: function() { alert('Server error'); }
  });
}

$(document).keydown(function(e) {
  if (e.key === 'Escape') closeEditModal();
});
</script>
