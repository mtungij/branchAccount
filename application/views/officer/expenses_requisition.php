<?php
include_once APPPATH . "views/partials/officerheader.php";
?>

<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
<div class="p-4 sm:p-6 space-y-6">

<!-- Page Title -->
<div class="mb-6">
  <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-200">
    <?php echo $this->lang->line('requisition_form') ?? 'Requisition Form'; ?>
  </h2>
  <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
    <?php echo $this->lang->line('submit_expense_requisition') ?? 'Submit expense requisition for your branch.'; ?>
  </p>
</div>

<?php // Flash Messages ?>
<?php if ($das = $this->session->flashdata('massage')): ?>
<div class="bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert">
  <div class="flex">
    <div class="flex-shrink-0">
      <span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-teal-100 bg-teal-200 text-teal-800 dark:border-teal-900 dark:bg-teal-800 dark:text-teal-500">
        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="m9 12 2 2 4-4"/></svg>
      </span>
    </div>
    <div class="ms-3">
      <h3 class="text-gray-800 font-semibold dark:text-white"><?php echo $this->lang->line('success') ?? 'Success'; ?></h3>
      <p class="mt-2 text-sm text-gray-700 dark:text-gray-400"><?php echo $das; ?></p>
    </div>
    <div class="ps-3 ms-auto">
      <button type="button" class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none" data-hs-remove-element="[role=alert]">
        <span class="sr-only">Dismiss</span>
        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
      </button>
    </div>
  </div>
</div>
<?php endif; ?>

<?php if ($das = $this->session->flashdata('error')): ?>
<div class="bg-red-100 border border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500" role="alert">
  <div class="flex">
    <div class="flex-shrink-0">
      <span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-red-100 bg-red-200 text-red-800 dark:border-red-900 dark:bg-red-800 dark:text-red-500">
        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12" y2="16"/></svg>
      </span>
    </div>
    <div class="ms-3">
      <h3 class="text-gray-800 font-semibold dark:text-white"><?php echo $this->lang->line('error') ?? 'Error'; ?></h3>
      <p class="mt-2 text-sm text-gray-700 dark:text-gray-400"><?php echo $das; ?></p>
    </div>
    <div class="ps-3 ms-auto">
      <button type="button" class="inline-flex bg-red-50 rounded-lg p-1.5 text-red-500 hover:bg-red-100 focus:outline-none" data-hs-remove-element="[role=alert]">
        <span class="sr-only">Dismiss</span>
        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
      </button>
    </div>
  </div>
</div>
<?php endif; ?>

<!-- Requisition Form Card -->
<div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
  <div class="p-4 md:p-6">
    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-6">
      <?php echo $this->lang->line('new_requisition') ?? 'New Requisition'; ?>
    </h3>

    <?php echo form_open_multipart("oficer/create_requstion_form"); ?>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

      <!-- Select Expenses -->
      <div>
        <label for="ex_id" class="block text-sm font-medium mb-2 text-gray-900 dark:text-gray-300">
          <?php echo $this->lang->line('select_expenses') ?? 'Select Expenses'; ?> *
        </label>
        <select name="ex_id" id="ex_id" required
          class="block w-full rounded-lg border-gray-300 px-3 py-2 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500">
          <option value=""><?php echo $this->lang->line('select_expenses') ?? 'Select Expenses'; ?></option>
          <option value="daily_allowance" data-name="daily allowance"><?php echo $this->lang->line('daily_allowance') ?? 'Daily Allowance'; ?></option>
          <?php foreach ($expns as $expnss): ?>
            <option value="<?php echo $expnss->ex_id; ?>" data-name="<?php echo strtolower(trim($expnss->ex_name)); ?>"><?php echo $expnss->ex_name; ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <!-- Select Employee (only for Daily Allowance) -->
      <div id="employee_select_wrap" class="md:col-span-3" style="display:none;">
        <label class="block text-sm font-medium mb-2 text-gray-900 dark:text-gray-300">
          <?php echo $this->lang->line('select_employees') ?? 'Select Employees'; ?> *
        </label>
        <div class="border border-gray-200 rounded-lg dark:border-gray-600 p-3 max-h-60 overflow-y-auto space-y-2 bg-white dark:bg-gray-700">
          <?php foreach ($branch_employees as $emp): ?>
          <label class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 cursor-pointer">
            <input type="checkbox" name="allowance_empl_ids[]" value="<?php echo $emp->empl_id; ?>"
              data-allowance="<?php echo isset($emp->daily_allowance) ? $emp->daily_allowance : 0; ?>"
              data-name="<?php echo htmlspecialchars($emp->empl_name, ENT_QUOTES, 'UTF-8'); ?>"
              class="emp-checkbox shrink-0 size-4 rounded border-gray-300 text-cyan-600 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600">
            <span class="text-sm text-gray-800 dark:text-gray-200 flex-1"><?php echo $emp->empl_name; ?></span>
            <span class="text-xs font-semibold text-teal-600 dark:text-teal-400"><?php echo number_format(isset($emp->daily_allowance) ? $emp->daily_allowance : 0); ?>/=</span>
          </label>
          <?php endforeach; ?>
        </div>
        <div id="emp_summary" class="mt-2 text-sm font-medium text-gray-700 dark:text-gray-300" style="display:none;">
          <?php echo $this->lang->line('selected') ?? 'Selected'; ?>: <span id="emp_count">0</span> <?php echo $this->lang->line('employees_count') ?? 'employee(s)'; ?> &mdash; <?php echo $this->lang->line('total') ?? 'Total'; ?>: <span id="emp_total" class="text-teal-600 dark:text-teal-400">0</span>/=
        </div>
      </div>

      <!-- Amount -->
      <div>
        <label for="req_amount_display" class="block text-sm font-medium mb-2 text-gray-900 dark:text-gray-300">
          <?php echo $this->lang->line('amount') ?? 'Amount'; ?> *
        </label>
        <input type="text" id="req_amount_display" required autocomplete="off" placeholder="<?php echo $this->lang->line('enter_amount') ?? 'Enter amount'; ?>" inputmode="numeric"
          class="block w-full rounded-lg border-gray-300 px-3 py-2 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500">
        <input type="hidden" name="req_amount" id="req_amount">
        <p id="balance_warning" class="mt-1 text-xs text-red-600 dark:text-red-400" style="display:none;"></p>
      </div>

      <!-- Branch Account -->
      <div>
        <label for="trans_id" class="block text-sm font-medium mb-2 text-gray-900 dark:text-gray-300">
          <?php echo $this->lang->line('branch_account') ?? 'Branch Account'; ?> *
        </label>
        <select name="trans_id" id="trans_id" required
          class="block w-full rounded-lg border-gray-300 px-3 py-2 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500">
          <option value=""><?php echo $this->lang->line('select_branch_account') ?? 'Select Branch Account'; ?></option>
          <?php foreach ($blanch_account as $blanch_accounts): ?>
            <option value="<?php echo $blanch_accounts->trans_id; ?>" data-balance="<?php echo isset($blanch_accounts->blanch_capital) ? $blanch_accounts->blanch_capital : 0; ?>"><?php echo $blanch_accounts->account_name; ?> - <?php echo $this->lang->line('balance') ?? 'Salio'; ?>: <?php echo number_format(isset($blanch_accounts->blanch_capital) ? $blanch_accounts->blanch_capital : 0); ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <!-- Description -->
      <div class="md:col-span-3">
        <label for="req_description" class="block text-sm font-medium mb-2 text-gray-900 dark:text-gray-300">
          <?php echo $this->lang->line('description') ?? 'Description'; ?> *
        </label>
        <textarea name="req_description" id="req_description" rows="3" required autocomplete="off" placeholder="<?php echo $this->lang->line('enter_description') ?? 'Enter description'; ?>"
          class="block w-full rounded-lg border-gray-300 px-3 py-2 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500"></textarea>
      </div>
    </div>

    <input type="hidden" name="comp_id" value="<?php echo $empl_data->comp_id; ?>">
    <input type="hidden" name="blanch_id" value="<?php echo $empl_data->blanch_id; ?>">
    <?php $date = date("Y-m-d"); ?>
    <input type="hidden" name="req_date" value="<?php echo $date; ?>">

    <div class="mt-6 flex justify-end">
      <button type="submit"
        class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-medium text-white bg-cyan-600 hover:bg-cyan-700 rounded-lg focus:ring-4 focus:ring-cyan-300 dark:focus:ring-cyan-800">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
        <?php echo $this->lang->line('submit') ?? 'Submit'; ?>
      </button>
    </div>

    <?php echo form_close(); ?>
  </div>
</div>

<!-- Accepted Expenses List -->
<div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700 overflow-hidden">
  <div class="p-4 md:p-6 border-b border-gray-200 dark:border-gray-700">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
      <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
        <?php echo $this->lang->line('expenses_list') ?? 'Expenses List'; ?>
      </h3>
      <form method="get" action="<?php echo base_url('oficer/expnses_requisition_form'); ?>" class="flex flex-wrap items-end gap-3">
        <div>
          <label class="block text-xs font-medium text-gray-500 dark:text-gray-400 mb-1"><?php echo $this->lang->line('from') ?? 'From'; ?></label>
          <input type="date" name="from" value="<?php echo isset($filter_from) ? $filter_from : ''; ?>"
            class="block w-full rounded-lg border-gray-300 px-3 py-1.5 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-2 focus:ring-cyan-500">
        </div>
        <div>
          <label class="block text-xs font-medium text-gray-500 dark:text-gray-400 mb-1"><?php echo $this->lang->line('to') ?? 'To'; ?></label>
          <input type="date" name="to" value="<?php echo isset($filter_to) ? $filter_to : ''; ?>"
            class="block w-full rounded-lg border-gray-300 px-3 py-1.5 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-2 focus:ring-cyan-500">
        </div>
        <div>
          <label class="block text-xs font-medium text-gray-500 dark:text-gray-400 mb-1"><?php echo $this->lang->line('expenses') ?? 'Expenses'; ?></label>
          <select name="expense"
            class="block w-full rounded-lg border-gray-300 px-3 py-1.5 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-2 focus:ring-cyan-500">
            <option value=""><?php echo $this->lang->line('all_expenses') ?? 'All Expenses'; ?></option>
            <option value="daily_allowance" <?php echo (isset($filter_expense) && $filter_expense == 'daily_allowance') ? 'selected' : ''; ?>><?php echo $this->lang->line('daily_allowance') ?? 'Daily Allowance'; ?></option>
            <?php foreach ($expns as $ex): ?>
              <option value="<?php echo $ex->ex_id; ?>" <?php echo (isset($filter_expense) && $filter_expense == $ex->ex_id) ? 'selected' : ''; ?>><?php echo $ex->ex_name; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <button type="submit"
          class="inline-flex items-center gap-1.5 px-4 py-1.5 text-sm font-medium text-white bg-cyan-600 hover:bg-cyan-700 rounded-lg focus:ring-2 focus:ring-cyan-300">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
          <?php echo $this->lang->line('filter') ?? 'Filter'; ?>
        </button>
        <?php if (!empty($filter_from) || !empty($filter_to) || !empty($filter_expense)): ?>
        <a href="<?php echo base_url('oficer/expnses_requisition_form'); ?>"
          class="inline-flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-gray-600 bg-gray-100 hover:bg-gray-200 dark:text-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 rounded-lg">
          <?php echo $this->lang->line('clear') ?? 'Clear'; ?>
        </a>
        <?php endif; ?>
        <?php if (!empty($data)): ?>
        <a href="<?php echo base_url('oficer/expenses_pdf'); ?>?from=<?php echo isset($filter_from) ? $filter_from : ''; ?>&to=<?php echo isset($filter_to) ? $filter_to : ''; ?>&expense=<?php echo isset($filter_expense) ? $filter_expense : ''; ?>"
          class="inline-flex items-center gap-1.5 px-4 py-1.5 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg focus:ring-2 focus:ring-red-300">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
          PDF
        </a>
        <?php endif; ?>
      </form>
    </div>
  </div>
  <div class="overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
      <thead class="text-xs font-semibold uppercase bg-gray-50 dark:bg-gray-700 text-gray-500 dark:text-gray-300 border-b border-gray-200 dark:border-gray-600">
        <tr>
          <th class="px-4 py-3"><?php echo $this->lang->line('s_no') ?? 'S/No'; ?></th>
          <th class="px-4 py-3"><?php echo $this->lang->line('branch') ?? 'Branch'; ?></th>
          <th class="px-4 py-3"><?php echo $this->lang->line('expenses') ?? 'Expenses'; ?></th>
          <th class="px-4 py-3"><?php echo $this->lang->line('amount') ?? 'Amount'; ?></th>
          <th class="px-4 py-3"><?php echo $this->lang->line('from_account') ?? 'From Account'; ?></th>
          <th class="px-4 py-3"><?php echo $this->lang->line('description') ?? 'Description'; ?></th>
          <th class="px-4 py-3"><?php echo $this->lang->line('date') ?? 'Date'; ?></th>
          <th class="px-4 py-3"><?php echo $this->lang->line('status') ?? 'Status'; ?></th>
          <th class="px-4 py-3"><?php echo $this->lang->line('action') ?? 'Action'; ?></th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
        <?php $no = 1; foreach ($data as $datas): ?>
        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
          <td class="px-4 py-3"><?= $no++ ?></td>
          <td class="px-4 py-3"><?php echo $datas->blanch_name; ?></td>
          <td class="px-4 py-3"><?php echo (isset($datas->deduct_type) && $datas->deduct_type == 'daily_allowance') ? ($this->lang->line('daily_allowance') ?? 'Daily Allowance') : $datas->ex_name; ?></td>
          <td class="px-4 py-3 font-medium"><?php echo number_format($datas->req_amount); ?></td>
          <td class="px-4 py-3"><?php echo $datas->account_name; ?></td>
          <td class="px-4 py-3"><?php echo $datas->req_description; ?></td>
          <td class="px-4 py-3"><?php echo $datas->req_date; ?></td>
          <td class="px-4 py-3">
            <?php if($datas->req_status == 'open'): ?>
              <span class="inline-flex items-center gap-1.5 py-1 px-2.5 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-800/30 dark:text-yellow-500">
                <span class="size-1.5 inline-block rounded-full bg-yellow-500"></span><?php echo $this->lang->line('pending') ?? 'Pending'; ?>
              </span>
            <?php elseif($datas->req_status == 'accept'): ?>
              <span class="inline-flex items-center gap-1.5 py-1 px-2.5 text-xs font-medium rounded-full bg-teal-100 text-teal-800 dark:bg-teal-800/30 dark:text-teal-500">
                <span class="size-1.5 inline-block rounded-full bg-teal-500"></span><?php echo $this->lang->line('approved') ?? 'Approved'; ?>
              </span>
            <?php else: ?>
              <span class="inline-flex items-center gap-1.5 py-1 px-2.5 text-xs font-medium rounded-full bg-red-100 text-red-800 dark:bg-red-800/30 dark:text-red-500">
                <span class="size-1.5 inline-block rounded-full bg-red-500"></span><?php echo $this->lang->line('rejected') ?? 'Rejected'; ?>
              </span>
            <?php endif; ?>
          </td>
          <td class="px-4 py-3">
            <?php if($datas->req_status == 'open'): ?>
            <a href="<?php echo base_url("oficer/delete_expences/{$datas->req_id}"); ?>"
               class="inline-flex items-center gap-1 text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 text-xs font-medium"
               onclick="return confirm('<?php echo $this->lang->line('confirm_delete_expense') ?? 'Are you sure you want to delete this?'; ?>')">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 0a1 1 0 00-1 1v1h6V4a1 1 0 00-1-1m-4 0h4"/>
              </svg>
              <?php echo $this->lang->line('delete') ?? 'Delete'; ?>
            </a>
            <?php else: ?>
              <span class="text-xs text-gray-400">—</span>
            <?php endif; ?>
          </td>
        </tr>
        <?php endforeach; ?>
        <?php if (empty($data)): ?>
        <tr>
          <td colspan="9" class="px-4 py-6 text-center text-gray-400"><?php echo $this->lang->line('no_expenses_found') ?? 'No expenses found.'; ?></td>
        </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

</div>
</div>

<script>
(function(){
  var display = document.getElementById('req_amount_display');
  var hidden = document.getElementById('req_amount');
  var exSelect = document.getElementById('ex_id');
  var empWrap = document.getElementById('employee_select_wrap');
  var checkboxes = document.querySelectorAll('.emp-checkbox');
  var empSummary = document.getElementById('emp_summary');
  var empCount = document.getElementById('emp_count');
  var empTotal = document.getElementById('emp_total');
  var transSelect = document.getElementById('trans_id');
  var balanceWarning = document.getElementById('balance_warning');
  var submitBtn = document.querySelector('button[type="submit"]');
  var isDailyAllowance = false;

  function getSelectedBalance(){
    var opt = transSelect.options[transSelect.selectedIndex];
    if(!opt || !opt.value) return 0;
    return parseFloat(opt.getAttribute('data-balance')) || 0;
  }

  function validateBalance(){
    var amount = parseInt(hidden.value) || 0;
    var balance = getSelectedBalance();
    if(amount > 0 && balance > 0 && amount > balance){
      balanceWarning.textContent = '<?php echo $this->lang->line('amount_exceeds_balance') ?? 'Requested amount exceeds account balance'; ?>. <?php echo $this->lang->line('existed_balance') ?? 'Existed balance is'; ?> ' + balance.toLocaleString();
      balanceWarning.style.display = '';
      submitBtn.disabled = true;
      submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
      return false;
    } else {
      balanceWarning.style.display = 'none';
      submitBtn.disabled = false;
      submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
      return true;
    }
  }

  // Format amount on typing
  display.addEventListener('input', function(){
    if(isDailyAllowance) return; // read-only for daily allowance
    var raw = this.value.replace(/[^0-9]/g, '');
    hidden.value = raw;
    if(raw){
      this.value = Number(raw).toLocaleString();
    }
    validateBalance();
  });

  // Re-validate when account changes
  transSelect.addEventListener('change', function(){ validateBalance(); });

  // Toggle employee checkboxes when Daily Allowance is chosen
  exSelect.addEventListener('change', function(){
    var selected = this.options[this.selectedIndex];
    var name = selected.getAttribute('data-name') || '';
    if(name === 'daily allowance'){
      isDailyAllowance = true;
      empWrap.style.display = '';
      display.value = '';
      hidden.value = '';
      display.setAttribute('readonly', 'readonly');
      uncheckAll();
    } else {
      isDailyAllowance = false;
      empWrap.style.display = 'none';
      empSummary.style.display = 'none';
      display.removeAttribute('readonly');
      display.value = '';
      hidden.value = '';
      uncheckAll();
    }
  });

  // Recalculate total when checkboxes change
  checkboxes.forEach(function(cb){
    cb.addEventListener('change', recalcTotal);
  });

  function recalcTotal(){
    var total = 0;
    var count = 0;
    checkboxes.forEach(function(cb){
      if(cb.checked){
        total += parseInt(cb.getAttribute('data-allowance')) || 0;
        count++;
      }
    });
    empCount.textContent = count;
    empTotal.textContent = total.toLocaleString();
    empSummary.style.display = count > 0 ? '' : 'none';
    hidden.value = total;
    display.value = total > 0 ? total.toLocaleString() : '';
    validateBalance();
  }

  function uncheckAll(){
    checkboxes.forEach(function(cb){ cb.checked = false; });
    recalcTotal();
  }
})();
</script>

<?php
include_once APPPATH . "views/partials/footer.php";
?>