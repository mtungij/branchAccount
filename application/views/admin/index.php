<?php
include_once APPPATH . "views/partials/header.php";

$lang_line = function ($key, $fallback) {
  $value = $this->lang->line($key);
  return !empty($value) ? $value : $fallback;
};

$txt_top_5_employees_by_deposit = $lang_line('top_5_employees_by_deposit', 'Top 5 Employees by Deposit');
$txt_top_10_branches_by_deposit = $lang_line('top_10_branches_by_deposit', 'Top 10 Branches by Deposit');
$txt_total_deposit_tzs = $lang_line('total_deposit_tzs', 'Total Deposit (TZS)');
$txt_quick_overview = $lang_line('quick_overview', 'Quick Overview');
$txt_branches_list = $lang_line('branches_list', 'Branches List');
$txt_employees = $lang_line('employees', 'Employees');
$txt_customers = $lang_line('customers', 'Customers');
$txt_total_registered_employees = $lang_line('total_registered_employees', 'Total registered employees');
$txt_total = $lang_line('ocr_total', 'Total');
$txt_active = $lang_line('active', 'Active');
$txt_pending = $lang_line('pending', 'Pending');
$txt_closed = $lang_line('closed', 'Closed');
$txt_loan_requests = $lang_line('loan_requests', 'Loan Requests');
$txt_new_loan_applications = $lang_line('new_loan_applications', 'New loan applications');
$txt_today_loan_pending = $lang_line('today_loan_pending', 'Today Loan Pending');
$txt_loan_payments_due_yesterday = $lang_line('loan_payments_due_yesterday', 'Loan payments due yesterday');
$txt_today_receivable = $lang_line('today_receivable', 'Today Receivable');
$txt_expected_amount_today = $lang_line('expected_amount_today', 'Expected amount today');
$txt_today_collected = $lang_line('today_collected', 'Today Collected');
$txt_amount_collected_today = $lang_line('amount_collected_today', 'Amount collected today');
$txt_loan_management_system = $lang_line('loan_management_system', 'Loan Management System');
$txt_tt_today_expected_collection = $lang_line('tt_today_expected_collection', 'Expected collection today from customers with active loans within agreement period (not overdue).');
$txt_tt_overdue_loans = $lang_line('tt_overdue_loans', 'Overdue payments from customers outside the agreed loan period.');
$txt_tt_upcoming_loan_deadlines = $lang_line('tt_upcoming_loan_deadlines', 'Expected collections from customers whose loan agreements end within the next 7 days.');
$txt_tt_paid_today = $lang_line('tt_paid_today', 'Total payments made today by customers on their loans.');
$txt_tt_today_loan_approved = $lang_line('tt_today_loan_approved', 'Total loans approved today. This should be zero if all approved loans were already disbursed.');
$txt_tt_today_loan_withdraw = $lang_line('tt_today_loan_withdraw', 'Total loans disbursed today to customers taking new loans.');
$txt_tt_today_penalty_paid = $lang_line('tt_today_penalty_paid', 'Total penalties paid today from customers with overdue loans.');
$txt_expected_vs_paid_today = $lang_line('expected_vs_paid_today', 'Expected vs Paid Today');
$txt_expected_collection = $lang_line('expected_collection', 'Expected Collection');
$txt_total_paid_today = $lang_line('total_paid_today', 'Total Paid Today');
$txt_overdue_vs_paid_today = $lang_line('overdue_vs_paid_today', 'Overdue vs Paid Overdue Today');
$txt_all_overdue_loans = $lang_line('all_overdue_loans', 'All Overdue Loans');
$txt_paid_overdue_today = $lang_line('paid_overdue_today', 'Paid Overdue Today');
$txt_monthly_withdraw_vs_paid = $lang_line('monthly_withdraw_vs_paid', 'Monthly Loan Withdraw vs Paid');
$txt_monthly_loan_withdraw = $lang_line('monthly_loan_withdraw', 'Loan Withdraw');
$txt_monthly_loan_paid = $lang_line('monthly_loan_paid', 'Loan Paid');
$txt_all_branches = $lang_line('all_branches', 'All Branches');
$txt_switch_branch = $lang_line('switch_branch', 'Badili Tawi');

$selected_blanch_id = isset($selected_blanch_id) ? (int) $selected_blanch_id : 0;
$selected_blanch_name = !empty($selected_blanch_name) ? $selected_blanch_name : $txt_all_branches;
$admin_link = function ($path) use ($selected_blanch_id) {
  $url = base_url($path);
  if ($selected_blanch_id > 0) {
    $url .= (strpos($url, '?') === false ? '?' : '&') . 'blanch_id=' . (int) $selected_blanch_id;
  }
  return $url;
};
?>

<style>
  .dashboard-loading-overlay {
    width: 100%;
    z-index: 1;
    background: transparent;
  }

  .dark .dashboard-loading-overlay {
    background: transparent;
  }

  .dashboard-skeleton {
    border-radius: 0.75rem;
    background: linear-gradient(90deg, #e5e7eb 25%, #f3f4f6 37%, #e5e7eb 63%);
    background-size: 400% 100%;
    animation: dashboardShimmer 1.2s ease-in-out infinite;
  }

  .dark .dashboard-skeleton {
    background: linear-gradient(90deg, #1f2937 25%, #374151 37%, #1f2937 63%);
    background-size: 400% 100%;
  }

  @keyframes dashboardShimmer {
    0% { background-position: 100% 0; }
    100% { background-position: 0 0; }
  }
</style>

<div id="dashboard-loading-placeholder" class="dashboard-loading-overlay">
  <div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-6">
      <div class="dashboard-skeleton h-10 w-72"></div>
      <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
        <div class="dashboard-skeleton h-36"></div>
        <div class="dashboard-skeleton h-36"></div>
        <div class="dashboard-skeleton h-36"></div>
      </div>
      <div class="dashboard-skeleton h-64"></div>
      <div class="dashboard-skeleton h-80"></div>
    </div>
  </div>
</div>

<!-- ========== MAIN CONTENT BODY ========== -->
<div id="dashboard-main-content" class="w-full lg:ps-64 hidden">
    <div class="p-4 sm:p-6 space-y-6">

        <!-- Section 1: Page Title / Subheader -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
            <div>
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-200">
                  <?php echo $this->lang->line('admin_dashboard'); ?>
                </h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
           

               <?php echo !empty($this->session->userdata('comp_name')) ? htmlspecialchars($this->session->userdata('comp_name')) : $txt_loan_management_system; ?>

                </p>
            </div>
            <div>
              <form action="<?php echo base_url('admin/index'); ?>" method="get" class="flex items-center gap-2">
                <label for="dashboard-branch-switch" class="text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                  <?php echo $txt_switch_branch; ?>
                </label>
                <select id="dashboard-branch-switch" name="blanch_id" onchange="this.form.submit()"
                    class="py-2 px-3 pe-9 block w-full min-w-56 border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-300">
                  <option value="all" <?php echo $selected_blanch_id === 0 ? 'selected' : ''; ?>><?php echo htmlspecialchars($txt_all_branches, ENT_QUOTES, 'UTF-8'); ?></option>
                  <?php if (!empty($blanch) && is_array($blanch)): ?>
                    <?php foreach ($blanch as $blanchs): ?>
                      <option value="<?php echo (int) ($blanchs->blanch_id ?? 0); ?>" <?php echo ($selected_blanch_id === (int) ($blanchs->blanch_id ?? 0)) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($blanchs->blanch_name ?? '', ENT_QUOTES, 'UTF-8'); ?>
                      </option>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </select>
              </form>
            </div>
        </div>
   

<!-- ====================== -->
<!-- Dashboard Main Cards -->
<!-- ====================== -->
<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">

  <!-- 1️⃣ Due Today (Within Agreement) -->
<a href="<?= base_url('admin/today_recevable_loan'); ?>" class="block">
  <div class="flex flex-col bg-gradient-to-br from-cyan-400 via-cyan-500 to-cyan-600 text-white border border-transparent rounded-2xl shadow-xl p-5 transition-transform transform hover:scale-[1.02] hover:shadow-2xl mb-4">
      <div class="flex items-center justify-between">
        <p class="text-sm font-semibold uppercase tracking-wide flex items-center gap-2">
          👥 <?php echo $this->lang->line('today_expected_collection'); ?>
        </p>
        <div class="relative group cursor-pointer">
          <svg class="size-4 text-white opacity-80" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="10" />
            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
            <path d="M12 17h.01" />
          </svg>
          <div class="absolute z-10 mt-2 right-0 w-56 text-xs text-white bg-black/80 rounded-lg shadow-lg px-3 py-2 opacity-0 group-hover:opacity-100 transition-opacity">
            <?php echo $txt_tt_today_expected_collection; ?>
          </div>
        </div>
      </div>
      <div class="mt-6 flex items-center justify-between">
        <h3 class="text-3xl font-bold"><?= number_format($receivable_total->total_rejesho); ?></h3>
        <span class="flex items-center gap-1 text-green-100 font-medium text-sm">⬆ 1.7%</span>
      </div>
  </div>
</a>


  <!-- 2️⃣ Overdue (Out of Agreement) -->
 <a href="<?= $admin_link('admin/get_outstand_loan'); ?>" class="block">
  <div class="flex flex-col bg-gradient-to-br from-cyan-400 via-cyan-500 to-cyan-600 text-white border border-transparent rounded-2xl shadow-xl p-5 transition-transform transform hover:scale-[1.02] hover:shadow-2xl mb-4">
      <div class="flex items-center justify-between">
        <p class="text-sm font-semibold uppercase tracking-wide flex items-center gap-2">
          ⏰ <?php echo $this->lang->line('overdue_loans'); ?>
        </p>
        <div class="relative group cursor-pointer">
          <svg class="size-4 text-white opacity-80" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="10" />
            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
            <path d="M12 17h.01" />
          </svg>
          <div class="absolute z-10 mt-2 right-0 w-56 text-xs text-white bg-black/80 rounded-lg shadow-lg px-3 py-2 opacity-0 group-hover:opacity-100 transition-opacity">
            <?php echo $txt_tt_overdue_loans; ?>
          </div>
        </div>
      </div>
      <div class="mt-6 flex items-center justify-between">
        <h3 class="text-3xl font-bold"><?= number_format($total_overdue->total_out); ?></h3>
        <span class="flex items-center gap-1 text-red-100 font-medium text-sm">⬇ -2.3%</span>
      </div>
  </div>
</a>


  <!-- 3️⃣ Expiring Today -->
  <a href="<?= $admin_link('admin/today_expiring_loans') ?>" class="block">
  <div class="flex flex-col bg-gradient-to-br from-cyan-400 via-cyan-500 to-cyan-600 text-white border border-transparent rounded-2xl shadow-xl p-5 transition-transform transform hover:scale-[1.02] hover:shadow-2xl mb-4">
    <div class="flex items-center justify-between">
      <p class="text-sm font-semibold uppercase tracking-wide flex items-center gap-2">📅 <?php echo $this->lang->line('upcoming_loan_deadlines'); ?></p>
      <div class="relative group cursor-pointer">
        <svg class="size-4 text-white opacity-80" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <circle cx="12" cy="12" r="10" />
          <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
          <path d="M12 17h.01" />
        </svg>
        <div class="absolute z-10 mt-2 right-0 w-56 text-xs text-white bg-black/80 rounded-lg shadow-lg px-3 py-2 opacity-0 group-hover:opacity-100 transition-opacity">
          <?php echo $txt_tt_upcoming_loan_deadlines; ?>
        </div>
      </div>
    </div>
    <div class="mt-6 flex items-center justify-between">
      <h3 class="text-3xl font-bold"><?= number_format($today_enddate_collection) ?></h3>
      <span class="flex items-center gap-1 text-yellow-100 font-medium text-sm">⬆ 0.9%</span>
    </div>
  </div>
</a>


  <!-- 4️⃣ Expired Agreements -->


</div>

<!-- ====================== -->
<!-- Paid Cards Section -->
<!-- ====================== -->
<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mt-6">

  <!-- 1️⃣ Paid Today (Within Agreement) -->
  <a href="<?= $admin_link('admin/today_receved_loan') ?>" class="block">
  <div class="flex flex-col bg-gradient-to-br from-cyan-400 via-cyan-500 to-cyan-600 text-white border border-transparent rounded-2xl shadow-xl p-5 transition-transform transform hover:scale-[1.02] hover:shadow-2xl mb-4">
    
    <div class="flex items-center justify-between">
      <p class="text-sm font-semibold uppercase tracking-wide flex items-center gap-2">💰 <?php echo $this->lang->line('paid_today'); ?></p>
      
      <div class="relative group cursor-pointer">
        <svg class="size-4 text-white opacity-80" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <circle cx="12" cy="12" r="10" />
          <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
          <path d="M12 17h.01" />
        </svg>
        <div class="absolute z-10 mt-2 right-0 w-56 text-xs text-white bg-black/80 rounded-lg shadow-lg px-3 py-2 opacity-0 group-hover:opacity-100 transition-opacity">
          <?php echo $txt_tt_paid_today; ?>
        </div>
      </div>
    </div>

    <div class="mt-6 flex items-center justify-between">
      <h3 class="text-3xl font-bold"><?php echo number_format($total_receved->total_depost); ?></h3>
      <span class="flex items-center gap-1 text-green-700 font-medium text-sm">✅</span>
    </div>
  </div>
</a>


  <!-- 2️⃣ Paid Overdue -->
 <a href="<?= $admin_link('admin/disburse_loan') ?>" class="block">
  <div class="flex flex-col bg-gradient-to-br from-cyan-400 via-cyan-500 to-cyan-600 
              text-white border border-transparent rounded-2xl shadow-xl p-5 
              transition-transform transform hover:scale-[1.02] hover:shadow-2xl mb-4">

    <div class="flex items-center justify-between">
      <p class="text-sm font-semibold uppercase tracking-wide flex items-center gap-2">
        💸 <?php echo $this->lang->line('today_loan_approved'); ?>
      </p>

      <!-- Tooltip Info Icon -->
      <div class="relative group cursor-pointer">
        <svg class="size-4 text-white opacity-80" xmlns="http://www.w3.org/2000/svg" 
             fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <circle cx="12" cy="12" r="10" />
          <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
          <path d="M12 17h.01" />
        </svg>
        <div class="absolute z-10 mt-2 right-0 w-56 text-xs text-white bg-black/80 
                    rounded-lg shadow-lg px-3 py-2 opacity-0 group-hover:opacity-100 
                    transition-opacity">
          <?php echo $txt_tt_today_loan_approved; ?>
        </div>
      </div>
    </div>

    <div class="mt-6 flex items-center justify-between">
      <h3 class="text-3xl font-bold"><?= number_format($total_loanDis) ?></h3>
      <span class="flex items-center gap-1 text-red-700 font-medium text-sm">✅</span>
    </div>
  </div>
</a>



  <!-- 3️⃣ Paid Expiring Today -->
<a href="<?= $admin_link('admin/loan_withdrawal') ?>" class="block">
  <div class="flex flex-col bg-gradient-to-br from-cyan-400 via-cyan-500 to-cyan-600 text-white border border-transparent rounded-2xl shadow-xl p-5 transition-transform transform hover:scale-[1.02] hover:shadow-2xl mb-4">
    
    <div class="flex items-center justify-between">
      <p class="text-sm font-semibold uppercase tracking-wide flex items-center gap-2">📅 <?php echo $this->lang->line('today_loan_withdraw'); ?></p>
      
      <!-- Tooltip -->
      <div class="relative group cursor-pointer">
        <svg class="size-4 text-white opacity-80" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <circle cx="12" cy="12" r="10" />
          <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
          <path d="M12 17h.01" />
        </svg>
        <div class="absolute z-10 mt-2 right-0 w-56 text-xs text-white bg-black/80 rounded-lg shadow-lg px-3 py-2 opacity-0 group-hover:opacity-100 transition-opacity">
          <?php echo $txt_tt_today_loan_withdraw; ?>
        </div>
      </div>
    </div>

    <div class="mt-6 flex items-center justify-between">
      <h3 class="text-3xl font-bold"><?= number_format($total_loanWithdrawal->total_todayloan) ?></h3>
      <span class="flex items-center gap-1 text-yellow-700 font-medium text-sm">✅</span>
    </div>
  </div>
</a>

</div>

<!-- Additional Cards Section -->
<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mt-6">
  <!-- Today Penalty Paid -->
<a href="<?= $admin_link('admin/income_dashboard') ?>" class="block">
  <div class="flex flex-col bg-gradient-to-br from-blue-400 via-blue-500 to-cyan-600 text-white border border-transparent rounded-2xl shadow-xl p-5 transition-transform transform hover:scale-[1.02] hover:shadow-2xl mb-4">
    
    <div class="flex items-center justify-between">
      <p class="text-sm font-semibold uppercase tracking-wide flex items-center gap-2">📅 <?php echo $this->lang->line('today_penalty_paid'); ?></p>
      
      <!-- Tooltip -->
      <div class="relative group cursor-pointer">
        <svg class="size-4 text-white opacity-80" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <circle cx="12" cy="12" r="10" />
          <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
          <path d="M12 17h.01" />
        </svg>
        <div class="absolute z-10 mt-2 right-0 w-56 text-xs text-white bg-black/80 rounded-lg shadow-lg px-3 py-2 opacity-0 group-hover:opacity-100 transition-opacity">
          <?php echo $txt_tt_today_penalty_paid; ?>
        </div>
      </div>
    </div>

    <div class="mt-6 flex items-center justify-between">
      <h3 class="text-3xl font-bold"><?= number_format(	$total_penalt->total_receved) ?></h3>
      <span class="flex items-center gap-1 text-yellow-700 font-medium text-sm">✅</span>
    </div>
  </div>
</a>

<!-- Expenses Requests Card -->
<?php
  $pe_count = isset($pending_expenses->total_count) ? (int)$pending_expenses->total_count : 0;
  $pe_amount = isset($pending_expenses->total_amount) ? $pending_expenses->total_amount : 0;
?>
<a href="<?= $admin_link('admin/get_expences_notAcceptable'); ?>" class="block">
  <div class="flex flex-col bg-gradient-to-br from-cyan-400 via-cyan-500 to-cyan-600 text-white border border-transparent rounded-2xl shadow-xl p-5 transition-transform transform hover:scale-[1.02] hover:shadow-2xl mb-4 relative">
    <?php if($pe_count > 0): ?>
      <span class="absolute -top-2 -right-2 bg-red-600 text-white text-xs font-bold rounded-full size-7 flex items-center justify-center shadow-lg animate-pulse"><?= $pe_count; ?></span>
    <?php endif; ?>
    <div class="flex items-center justify-between">
      <p class="text-sm font-semibold uppercase tracking-wide flex items-center gap-2">
        📋 <?php echo $lang_line('expenses_requests', 'Expenses Requests'); ?>
      </p>
      <div class="relative group cursor-pointer">
        <svg class="size-4 text-white opacity-80" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <circle cx="12" cy="12" r="10" />
          <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
          <path d="M12 17h.01" />
        </svg>
        <div class="absolute z-10 mt-2 right-0 w-56 text-xs text-white bg-black/80 rounded-lg shadow-lg px-3 py-2 opacity-0 group-hover:opacity-100 transition-opacity">
          <?php echo $lang_line('tt_expenses_requests', 'Pending expense requests awaiting approval. Click to review and approve or reject.'); ?>
        </div>
      </div>
    </div>
    <div class="mt-6 flex items-center justify-between">
      <h3 class="text-3xl font-bold"><?= number_format($pe_amount); ?></h3>
      <span class="flex items-center gap-1 text-cyan-100 font-medium text-sm"><?= $pe_count; ?> <?php echo $lang_line('pending', 'Pending'); ?></span>
    </div>
  </div>
</a>

<!-- Accepted Expenses Card -->
<?php
  $ae_count = isset($accepted_expenses->total_count) ? (int)$accepted_expenses->total_count : 0;
  $ae_amount = isset($accepted_expenses->total_amount) ? $accepted_expenses->total_amount : 0;
?>
<a href="<?= $admin_link('admin/get_accepted_expenses'); ?>" class="block">
  <div class="flex flex-col bg-gradient-to-br from-cyan-400 via-cyan-500 to-cyan-600 text-white border border-transparent rounded-2xl shadow-xl p-5 transition-transform transform hover:scale-[1.02] hover:shadow-2xl mb-4">
    <div class="flex items-center justify-between">
      <p class="text-sm font-semibold uppercase tracking-wide flex items-center gap-2">
        ✅ <?php echo $lang_line('accepted_expenses', 'Accepted Expenses'); ?>
      </p>
      <div class="relative group cursor-pointer">
        <svg class="size-4 text-white opacity-80" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <circle cx="12" cy="12" r="10" />
          <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
          <path d="M12 17h.01" />
        </svg>
        <div class="absolute z-10 mt-2 right-0 w-56 text-xs text-white bg-black/80 rounded-lg shadow-lg px-3 py-2 opacity-0 group-hover:opacity-100 transition-opacity">
          <?php echo $lang_line('tt_accepted_expenses', 'Total approved expense requests. Click to view all accepted expenses.'); ?>
        </div>
      </div>
    </div>
    <div class="mt-6 flex items-center justify-between">
      <h3 class="text-3xl font-bold"><?= number_format($ae_amount); ?></h3>
      <span class="flex items-center gap-1 text-cyan-100 font-medium text-sm"><?= $ae_count; ?> <?php echo $lang_line('approved', 'Approved'); ?></span>
    </div>
  </div>
</a>
</div>

  <!-- 3️⃣ Paid Expiring Today -->
<a href="<?= $admin_link('admin/loan_withdrawal') ?>" class="block">
  <!-- <div class="flex flex-col bg-gradient-to-br from-blue-400 via-blue-500 to-green-600 text-white border border-transparent rounded-2xl shadow-xl p-5 transition-transform transform hover:scale-[1.02] hover:shadow-2xl mb-4">
    
    <div class="flex items-center justify-between">
      <p class="text-sm font-semibold uppercase tracking-wide flex items-center gap-2">📅 Today Processing fee Paid</p>
      
      
      <div class="relative group cursor-pointer">
        <svg class="size-4 text-white opacity-80" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <circle cx="12" cy="12" r="10" />
          <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
          <path d="M12 17h.01" />
        </svg>
        <div class="absolute z-10 mt-2 right-0 w-56 text-xs text-white bg-black/80 rounded-lg shadow-lg px-3 py-2 opacity-0 group-hover:opacity-100 transition-opacity">
          Jumla ya gharama za fomu zilizolipwa leo kutoka kwa wateja waliopewa mikopo .
        </div>
      </div>
    </div>

    <div class="mt-6 flex items-center justify-between">
      <h3 class="text-3xl font-bold"><?= number_format($total_loanWithdrawal->total_todayloan) ?></h3>
      <span class="flex items-center gap-1 text-yellow-700 font-medium text-sm">✅</span>
    </div>
  </div>
</a> -->
<!-- </div> -->



<!-- ====================== -->
<!-- Graphs Section -->
<!-- ====================== -->
<div class="mt-10 grid grid-cols-1 xl:grid-cols-2 gap-6">
  <div class="bg-white rounded-2xl shadow-xl p-6">
    <h2 class="text-xl font-bold text-gray-700 mb-4">📊 <?php echo $txt_expected_vs_paid_today; ?></h2>
    <div class="max-w-md mx-auto">
      <canvas id="expectedVsPaidPieChart" height="140"></canvas>
    </div>
  </div>

  <div class="bg-white rounded-2xl shadow-xl p-6">
    <h2 class="text-xl font-bold text-gray-700 mb-4">📉 <?php echo $txt_overdue_vs_paid_today; ?></h2>
    <div class="max-w-md mx-auto">
      <canvas id="overdueVsPaidPieChart" height="140"></canvas>
    </div>
  </div>
</div>

<!-- 🚀 Top 5 Depositors Bar Chart -->
<div class="mt-10 bg-white rounded-2xl shadow-xl p-6">
  <h2 class="text-xl font-bold text-gray-700 mb-4">🏆 <?php echo $txt_top_5_employees_by_deposit; ?></h2>
  <canvas id="topDepositorsChart" height="120"></canvas>
</div>

<!-- 📈 Top 10 Branch Deposits Line Chart -->
<div class="mt-6 bg-white rounded-2xl shadow-xl p-6">
  <h2 class="text-xl font-bold text-gray-700 mb-4">📈 <?php echo $txt_top_10_branches_by_deposit; ?></h2>
  <canvas id="topBranchDepositsChart" height="120"></canvas>
</div>

<!-- 📊 Monthly Loan Withdraw vs Paid -->
<div class="mt-6 bg-white rounded-2xl shadow-xl p-6">
  <div class="flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between mb-4">
    <h2 class="text-xl font-bold text-gray-700"><?php echo $txt_monthly_withdraw_vs_paid; ?></h2>
    <span class="text-sm text-gray-500"><?php echo htmlspecialchars($selected_blanch_name, ENT_QUOTES, 'UTF-8'); ?></span>
  </div>
  <canvas id="monthlyLoanWithdrawVsPaidChart" height="120"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
<script>
  const topBranchLabels = <?php echo json_encode(array_map(function($row){ return $row->blanch_name; }, $top_branch_deposits ?? [])); ?>;
  const topBranchValues = <?php echo json_encode(array_map(function($row){ return (float) $row->total_deposit; }, $top_branch_deposits ?? [])); ?>;
  const monthlyLoanChart = <?php echo json_encode($monthly_loan_chart ?? []); ?>;

  if (window.Chart && window.ChartDataLabels) {
    Chart.register(ChartDataLabels);
  }

  const ctx = document.getElementById('topDepositorsChart').getContext('2d');
  const topDepositorsChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [
        <?php foreach($top_depositors as $row){ echo "'".$row->empl_name."',"; } ?>
      ],
      datasets: [{
        label: '<?php echo addslashes($txt_total_deposit_tzs); ?>',
        data: [
          <?php foreach($top_depositors as $row){ echo $row->total_deposit.","; } ?>
        ],
        backgroundColor: [
          '#0ea5e9','#06b6d4','#3b82f6','#10b981','#f59e0b'
        ],
        borderRadius: 8
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { display: false },
        tooltip: {
          callbacks: {
            label: function(context) {
              return context.parsed.y.toLocaleString() + " TZS";
            }
          }
        }
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            callback: function(value) {
              return value.toLocaleString();
            }
          }
        }
      }
    }
  });

  const branchCtx = document.getElementById('topBranchDepositsChart').getContext('2d');
  const topBranchDepositsChart = new Chart(branchCtx, {
    type: 'line',
    data: {
      labels: topBranchLabels,
      datasets: [{
        label: '<?php echo addslashes($txt_total_deposit_tzs); ?>',
        data: topBranchValues,
        borderColor: '#06b6d4',
        backgroundColor: 'rgba(6, 182, 212, 0.18)',
        fill: true,
        tension: 0.35,
        pointRadius: 4,
        pointHoverRadius: 6,
        pointBackgroundColor: '#0891b2'
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { display: false },
        tooltip: {
          callbacks: {
            label: function(context) {
              return context.parsed.y.toLocaleString() + ' TZS';
            }
          }
        }
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            callback: function(value) {
              return value.toLocaleString();
            }
          }
        }
      }
    }
  });

  const monthlyLoanCanvas = document.getElementById('monthlyLoanWithdrawVsPaidChart');
  if (monthlyLoanCanvas) {
    const monthlyLabels = monthlyLoanChart.map(function(item) {
      return item.label;
    });
    const monthlyWithdrawValues = monthlyLoanChart.map(function(item) {
      return Number(item.withdraw || 0);
    });
    const monthlyPaidValues = monthlyLoanChart.map(function(item) {
      return Number(item.paid || 0);
    });

    new Chart(monthlyLoanCanvas.getContext('2d'), {
      type: 'line',
      data: {
        labels: monthlyLabels,
        datasets: [{
          label: '<?php echo addslashes($txt_monthly_loan_withdraw); ?>',
          data: monthlyWithdrawValues,
          borderColor: '#0f766e',
          backgroundColor: 'rgba(15, 118, 110, 0.16)',
          fill: true,
          tension: 0.35,
          pointRadius: 4,
          pointHoverRadius: 6
        }, {
          label: '<?php echo addslashes($txt_monthly_loan_paid); ?>',
          data: monthlyPaidValues,
          borderColor: '#2563eb',
          backgroundColor: 'rgba(37, 99, 235, 0.12)',
          fill: true,
          tension: 0.35,
          pointRadius: 4,
          pointHoverRadius: 6
        }]
      },
      options: {
        responsive: true,
        interaction: {
          mode: 'index',
          intersect: false
        },
        plugins: {
          datalabels: {
            display: false
          },
          tooltip: {
            callbacks: {
              label: function(context) {
                return context.dataset.label + ': ' + Number(context.raw).toLocaleString() + ' TZS';
              }
            }
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              callback: function(value) {
                return Number(value).toLocaleString();
              }
            }
          }
        }
      }
    });
  }

  const expectedVsPaidCanvas = document.getElementById('expectedVsPaidPieChart');
  if (expectedVsPaidCanvas) {
    const expectedToday = <?php echo (float)($receivable_total->total_rejesho ?? 0); ?>;
    const paidTodayGross = <?php echo (float)($total_receved->total_depost ?? 0); ?>;
    const overduePaidToday = <?php echo (float)($total_default_paid->total_default ?? 0); ?>;
    const paidToday = Math.max(paidTodayGross - overduePaidToday, 0);

    new Chart(expectedVsPaidCanvas.getContext('2d'), {
      type: 'pie',
      data: {
        labels: ['<?php echo addslashes($txt_expected_collection); ?>', '<?php echo addslashes($txt_total_paid_today); ?>'],
        datasets: [{
          data: [expectedToday, paidToday],
          backgroundColor: ['#0891b2', '#10b981'],
          borderColor: ['#ffffff', '#ffffff'],
          borderWidth: 2
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom'
          },
          datalabels: {
            color: '#ffffff',
            font: {
              weight: 'bold',
              size: 12
            },
            formatter: function(value) {
              return Number(value).toLocaleString();
            }
          },
          tooltip: {
            callbacks: {
              label: function(context) {
                return context.label + ': ' + Number(context.raw).toLocaleString() + ' TZS';
              }
            }
          }
        }
      }
    });
  }

  const overdueVsPaidCanvas = document.getElementById('overdueVsPaidPieChart');
  if (overdueVsPaidCanvas) {
    const overdueTotal = <?php echo (float)($total_overdue->total_out ?? 0); ?>;
    const overduePaidToday = <?php echo (float)($total_default_paid->total_default ?? 0); ?>;

    new Chart(overdueVsPaidCanvas.getContext('2d'), {
      type: 'pie',
      data: {
        labels: ['<?php echo addslashes($txt_all_overdue_loans); ?>', '<?php echo addslashes($txt_paid_overdue_today); ?>'],
        datasets: [{
          data: [overdueTotal, overduePaidToday],
          backgroundColor: ['#ef4444', '#22c55e'],
          borderColor: ['#ffffff', '#ffffff'],
          borderWidth: 2
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom'
          },
          datalabels: {
            color: '#ffffff',
            font: {
              weight: 'bold',
              size: 12
            },
            formatter: function(value) {
              return Number(value).toLocaleString();
            }
          },
          tooltip: {
            callbacks: {
              label: function(context) {
                return context.label + ': ' + Number(context.raw).toLocaleString() + ' TZS';
              }
            }
          }
        }
      }
    });
  }
</script>

<script>
  window.addEventListener('load', function () {
    var loadingPlaceholder = document.getElementById('dashboard-loading-placeholder');
    var mainContent = document.getElementById('dashboard-main-content');
    if (loadingPlaceholder) {
      loadingPlaceholder.style.display = 'none';
    }
    if (mainContent) {
      mainContent.classList.remove('hidden');
    }
  });
</script>




 



  <!-- Card 2: MALIPO YA LEO -->
  <!-- </?php
  $total_deposit_daily = $total_deposit_daily ?? 0;
  $total_deposit_weekly = $total_deposit_weekly ?? 0;
  $total_deposit_monthly = $total_deposit_monthly ?? 0;
  $total_all = $total_deposit_daily + $total_deposit_weekly + $total_deposit_monthly;
?> -->

<!-- <div class="bg-white rounded-lg shadow-md overflow-hidden">
  <div class="bg-cyan-800 px-4 py-2 border-b">
    <h2 class="text-lg font-semibold text-white">MALIPO YA LEO</h2>
  </div>
  <div class="p-4">
    <table class="w-full text-sm">
      <tbody class="text-gray-700">
        <tr class="border-b">
          <td class="py-2">KILA SIKU</td>
          <td class="text-right">
            <span class="inline-block bg-green-600 text-white text-xs px-2 py-1 rounded">
              </?php echo number_format($total_deposit_daily); ?>
            </span>
          </td>
        </tr>
        <tr class="border-b">
          <td class="py-2">WIKI</td>
          <td class="text-right">
            <span class="inline-block bg-green-600 text-white text-xs px-2 py-1 rounded">
              <?php echo number_format($total_deposit_weekly); ?>
            </span>
          </td>
        </tr>
        <tr class="border-b">
          <td class="py-2">MWEZI</td>
          <td class="text-right">
            <span class="inline-block bg-green-600 text-white text-xs px-2 py-1 rounded">
              <?php echo number_format($total_deposit_monthly); ?>
            </span>
          </td>
        </tr>
        <tr>
          <td class="py-2 font-bold">JUMLA</td>
          <td class="text-right font-bold">
            <span class="inline-block bg-green-600 text-white text-xs px-2 py-1 rounded">
              <?php echo number_format($total_all); ?>
            </span>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div> -->

<!-- <div class="bg-white rounded-lg shadow-md overflow-hidden">
  <div class="bg-cyan-800 px-4 py-2 border-b">
    <h2 class="text-lg font-semibold text-white">MIKOPO YA LEO</h2>
  </div>
  <div class="p-4">
    <table class="w-full text-sm">
      <tbody class="text-gray-700">
        <tr class="border-b">
          <td class="py-2">KILA SIKU</td>
          <td class="text-right">
            <span class="inline-block bg-green-600 text-white text-xs px-2 py-1 rounded">
              <?php echo number_format($total_withdrawal_daily->loan_aproved ?? 0); ?>
            </span>
          </td>
        </tr>
        <tr class="border-b">
          <td class="py-2">WIKI</td>
          <td class="text-right">
            <span class="inline-block bg-green-600 text-white text-xs px-2 py-1 rounded">
              </?php echo number_format($total_withdrawal_weekly->loan_aproved ?? 0); ?>
            </span>
          </td>
        </tr>
        <tr class="border-b">
          <td class="py-2">MWEZI</td>
          <td class="text-right">
            <span class="inline-block bg-green-600 text-white text-xs px-2 py-1 rounded">
              </?php echo number_format($total_withdrawal_monthly->loan_aproved ?? 0); ?>
            </span>
          </td>
        </tr>
        <tr>
          <td class="py-2 font-bold">JUMLA</td>
          <td class="text-right font-bold">
            <span class="inline-block bg-green-600 text-white text-xs px-2 py-1 rounded">
              </?php
                $daily = $total_withdrawal_daily->loan_aproved ?? 0;
                $weekly = $total_withdrawal_weekly->loan_aproved ?? 0;
                $monthly = $total_withdrawal_monthly->loan_aproved ?? 0;
                $total = $daily + $weekly + $monthly;
                echo number_format($total);
              ?>
            </span>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div> -->
</div>


        <!-- Account Balance Banner (Full Width) -->
        <!-- <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-sm rounded-xl overflow-hidden">
            <div class="bg-cover bg-center p-6 sm:p-10 text-center" style="background-image: url('</?php echo base_url('assets/img/pi.png'); // Keep your background image path ?>');">
                <h3 class="text-sm font-medium text-gray-100 dark:text-gray-300 uppercase mb-2">Main Account Balance</h3>
                <p class="text-4xl sm:text-5xl font-bold text-white dark:text-gray-100">
                    </?php echo number_format($sum_comp_capital->total_comp_balance); ?>
                </p>
                </?php // Optional: Add a small sub-text or trend indicator if desired for the main balance ?>
                <!-- <p class="mt-1 text-xs text-gray-200 dark:text-gray-400">+2.5% since last month</p> -->
            <!-- </div>
        </div>  -->
        <!-- End Account Balance Banner -->

        

        <!-- Grid for other KPIs -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6"> <?php // Added mt-6 for spacing after the banner ?>
            
            <!-- Disbursed Loans Card -->
            <!-- <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-sm hover:shadow-lg transition-shadow duration-300">
              <div class="flex items-center justify-between mb-2">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Disbursed Loans</h3>
                 </?php if(isset($principal_loan->change_percentage) && $principal_loan->change_percentage >= 0): ?>
                <span class="inline-flex items-center text-green-600 dark:text-green-400 text-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                  +</?php echo $principal_loan->change_percentage; ?>%
                </span>
                 </?php elseif(isset($principal_loan->change_percentage)): ?>
                 <span class="inline-flex items-center text-<div class="grid grid-cols-1 md:grid-cols-3 gap-4 px-4 py-6">
   -->
  <!-- Card 1: WATEJA & WAFANYAKAZI -->


  <!-- You can add a 3rd card here if needed -->

<!-- </div>

                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1 rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                  </?php echo $principal_loan->change_percentage; ?>%
                </span>
                </?php endif; ?>
              </div>
              <div class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-1"></?php echo number_format($principal_loan->loan_aproved); ?></div>
              <p class="text-xs text-gray-500 dark:text-gray-400">
                </?php echo isset($principal_loan->change_period) ? 'vs ' . htmlspecialchars($principal_loan->change_period, ENT_QUOTES, 'UTF-8') : 'Total amount disbursed'; ?>
              </p>
            </div> -->

            <!-- Loan Expectation Receivable Card -->
            <!-- <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-sm hover:shadow-lg transition-shadow duration-300">
              <div class="flex items-center justify-between mb-2">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Loan Expectation Receivable</h3>
                 </?php if(isset($total_expect->change_percentage) && $total_expect->change_percentage >= 0): ?>
                <span class="inline-flex items-center text-green-600 dark:text-green-400 text-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                  +</?php echo $total_expect->change_percentage; ?>%
                </span>
                 </?php elseif(isset($total_expect->change_percentage)): ?>
                 <span class="inline-flex items-center text-red-600 dark:text-red-400 text-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1 rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                  </?php echo $total_expect->change_percentage; ?>%
                </span>
                </?php endif; ?>
              </div> -->
              <!-- <div class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-1"></?php echo number_format($total_expect->loan_interest); ?></div>
              <p class="text-xs text-gray-500 dark:text-gray-400">
                  </?php echo isset($total_expect->change_period) ? 'vs ' . htmlspecialchars($total_expect->change_period, ENT_QUOTES, 'UTF-8') : 'Total interest expected'; ?>
              </p>
            </div> -->

            <!-- Total Branch Accounts Card -->
            <!-- <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-sm hover:shadow-lg transition-shadow duration-300">
              <div class="flex items-center justify-between mb-2">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Branch Accounts</h3>
                </?php if(isset($blanch_capital_circle->change_percentage) && $blanch_capital_circle->change_percentage >= 0): ?>
                <span class="inline-flex items-center text-green-600 dark:text-green-400 text-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                  +</?php echo $blanch_capital_circle->change_percentage; ?>%
                </span>
                </?php elseif(isset($blanch_capital_circle->change_percentage)): ?>
                 <span class="inline-flex items-center text-red-600 dark:text-red-400 text-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1 rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                  </?php echo $blanch_capital_circle->change_percentage; ?>%
                </span>
                </?php endif; ?>
              </div> -->
              <!-- <div class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-1"></?php echo number_format($blanch_capital_circle->total_balanch_amount); ?></div>
              <p class="text-xs text-gray-500 dark:text-gray-400">
                  </?php echo isset($blanch_capital_circle->change_period) ? 'vs ' . htmlspecialchars($blanch_capital_circle->change_period, ENT_QUOTES, 'UTF-8') : 'Combined branch capital'; ?>
              </p>
            </div> -->
            
            <!-- Total Income Card -->
            <!-- <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-sm hover:shadow-lg transition-shadow duration-300">
              <div class="flex items-center justify-between mb-2">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Income</h3>
              </div>
              <div class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-1"></?php echo number_format($total_income_val); ?></div>
              <p class="text-xs text-gray-500 dark:text-gray-400">Overall income generated</p>
            </div> -->

            <!-- Total Expenses Card -->
            <!-- <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-sm hover:shadow-lg transition-shadow duration-300">
              <div class="flex items-center justify-between mb-2">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Expenses</h3>
              </div>
              <div class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-1"><?php echo number_format($total_expenses_val); ?></div>
              <p class="text-xs text-gray-500 dark:text-gray-400">Overall expenses incurred</p>
            </div> -->
            
            <!-- Total Loan Outstanding Card -->
            <!-- <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-sm hover:shadow-lg transition-shadow duration-300">
              <div class="flex items-center justify-between mb-2">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Loan Outstanding</h3>
              </div>
              <div class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-1"><?php echo number_format($total_outstanding_val); ?></div>
              <p class="text-xs text-gray-500 dark:text-gray-400">Remaining loan amounts</p>
            </div> -->

        </div>
        
        <!-- End Grid for other KPIs -->
        <!-- End Top KPIs -->

        <!-- Section 3: Chart Area -->
        <!-- <div class="bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700 p-4 md:p-6">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Loan Overview Chart</h3>
            <div id="dashboard-main-chart" class="min-h-[300px] sm:min-h-[350px]"></div>
            <p class="text-xs text-gray-500 mt-2 dark:text-gray-400">Chart data needs to be implemented from controller.</p>
        </div> -->
        <!-- End Chart Area -->
<br> <br><br>

        <!-- Section 4: Quick Stats & Actions (Using your new card template) -->
        <div class="bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                  <?php echo $txt_quick_overview; ?>
                </h3>
                <span class="text-xs text-gray-500 dark:text-gray-400"><?php echo htmlspecialchars($selected_blanch_name, ENT_QUOTES, 'UTF-8'); ?></span>
                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                    <button id="branches-dropdown-btn" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-600">
                        <?php echo htmlspecialchars($selected_blanch_name, ENT_QUOTES, 'UTF-8'); ?>
                        <svg class="hs-dropdown-open:rotate-180 size-2.5" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </button>
                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-40 z-20 bg-white shadow-md rounded-lg p-2 mt-2 dark:bg-gray-800 dark:border dark:border-gray-700" aria-labelledby="branches-dropdown-btn">
                        <div class="py-2 first:pt-0 last:pb-0">
                            <span class="block py-2 px-3 text-xs font-medium uppercase text-gray-400 dark:text-gray-500"><?php echo $txt_branches_list; ?></span>
                          <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-cyan-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="<?php echo base_url('admin/index?blanch_id=all'); ?>">
                            <?php echo htmlspecialchars($txt_all_branches, ENT_QUOTES, 'UTF-8'); ?>
                          </a>
                            <?php if (isset($blanch) && is_array($blanch)): ?>
                                <?php foreach ($blanch as $blanchs): ?>
                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-cyan-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                               href="<?php echo base_url('admin/index?blanch_id=' . (int) ($blanchs->blanch_id ?? 0)); ?>">

                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M3.5 2A1.5 1.5 0 0 0 2 3.5v13A1.5 1.5 0 0 0 3.5 18h13a1.5 1.5 0 0 0 1.5-1.5v-13A1.5 1.5 0 0 0 16.5 2h-13ZM12.25 8.25a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5h-1.5ZM12.25 12a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5h-1.5ZM6.25 6.75a.75.75 0 0 0-.75.75v5.5a.75.75 0 0 0 1.5 0v-5.5a.75.75 0 0 0-.75-.75ZM8.25 5a.75.75 0 0 0-.75.75v8.5a.75.75 0 0 0 1.5 0v-8.5A.75.75 0 0 0 8.25 5Z" /></svg>
                                    <?php
echo htmlspecialchars($blanchs->blanch_name ?? '', ENT_QUOTES, 'UTF-8');
?>

                                </a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-4 md:p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php
                    // --- DUMMY DATA for quick stats - REMOVE and use controller data ---
                    // TODO: !! IMPORTANT, COMMENTED THESE BECAUSE OF TABLE MISSING ERROR, SHOULD BE UNCOMMENTED
                    $comp_id = $_SESSION['comp_id'] ?? null;
                    $selected_blanch_filter_id = isset($selected_blanch_id) ? (int) $selected_blanch_id : 0;
                    $customer_branch_where = $selected_blanch_filter_id > 0 ? " AND blanch_id = '{$selected_blanch_filter_id}'" : '';
                    $loan_branch_where = $selected_blanch_filter_id > 0 ? " AND blanch_id = '{$selected_blanch_filter_id}'" : '';
                    $pending_branch_where = $selected_blanch_filter_id > 0 ? " AND blanch_id = '{$selected_blanch_filter_id}'" : '';
                    // Simulating data fetching - this should be in your controller
                    if ($comp_id) {
                      $employee_sql = "SELECT COUNT(*) as count FROM tbl_employee WHERE comp_id = ?";
                      $employee_params = [$comp_id];
                      if ($selected_blanch_filter_id > 0) {
                        $employee_sql .= " AND blanch_id = ?";
                        $employee_params[] = $selected_blanch_filter_id;
                      }
                      $employee_count = $this->db->query($employee_sql, $employee_params)->row()->count ?? 0;
                    } else {
                      $employee_count = 0;
                    }
                    // $customer_total = $comp_id ? ($this->db->query("SELECT COUNT(*) as count FROM tbl_customer WHERE comp_id = ?", [$comp_id])->row()->count ?? 0) : 0;
                    // $customer_active = $comp_id ? ($this->db->query("SELECT COUNT(*) as count FROM tbl_customer WHERE comp_id = ? AND customer_status = 'open'", [$comp_id])->row()->count ?? 0) : 0;
                    // $customer_pending = $comp_id ? ($this->db->query("SELECT COUNT(*) as count FROM tbl_customer WHERE comp_id = ? AND customer_status = 'pending'", [$comp_id])->row()->count ?? 0) : 0;
                    // $customer_closed = $comp_id ? ($this->db->query("SELECT COUNT(*) as count FROM tbl_customer WHERE comp_id = ? AND customer_status = 'close'", [$comp_id])->row()->count ?? 0) : 0;
                    // $new_loan_count = $comp_id ? ($this->db->query("SELECT COUNT(*) as count FROM tbl_loans WHERE comp_id = ? AND loan_status = 'open'", [$comp_id])->row()->count ?? 0) : 0;
                    // $approved_loans_count = $comp_id ? ($this->db->query("SELECT COUNT(*) as count FROM tbl_loans WHERE comp_id = ? AND loan_status = 'aproved'", [$comp_id])->row()->count ?? 0) : 0;
                    // $today_loan_pending_count = $comp_id ? ($this->db->query("SELECT COUNT(*) as count FROM tbl_pending_total WHERE comp_id = ? AND total_pend IS NOT FALSE", [$comp_id])->row()->count ?? 0) : 0;
                    // $receivable_total_amount = $comp_id ? ($this->db->query("SELECT SUM(total_rejesho) as total_rejesho FROM tbl_loan_pay WHERE comp_id = ? AND pay_status = 'pending' AND deadline_date = CURDATE()", [$comp_id])->row()->total_rejesho ?? 0) : 0;
                    // $total_received_amount = $comp_id ? ($this->db->query("SELECT SUM(depost_amount) as total_depost FROM tbl_loan_pay WHERE comp_id = ? AND pay_status = 'payall' AND collection_date = CURDATE()", [$comp_id])->row()->total_depost ?? 0) : 0;
                    // $exp_req_count = $comp_id ? ($this->db->query("SELECT COUNT(*) as count FROM tbl_request_exp WHERE comp_id = ? AND req_date = CURDATE() AND req_status = 'recomended'", [$comp_id])->row()->count ?? 0) : 0;
                    // --- END DUMMY DATA ---
                    ?>
                    <!-- Stat Card: Employees -->
                    <a href="<?php echo $admin_link('admin/all_employee'); ?>" class="bg-white dark:bg-gray-700 rounded-xl p-5 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="flex items-center gap-x-3 mb-3">
                            <!-- <img src="</?php echo base_url('assets/img/users.png'); ?>" class="size-10" alt="Employees"> -->
                            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200"><?php echo $txt_employees; ?></h2>
                        </div>
                        <p class="text-2xl font-bold text-gray-800 dark:text-gray-200"><?php echo $employee_count; ?></p>
                          <p class="text-xs text-gray-500 dark:text-gray-400"><?php echo $txt_total_registered_employees; ?></p>
                    </a>

                    <!-- Stat Card: Customers -->
                    <a href="<?php echo $admin_link('admin/all_customer'); ?>" class="bg-white dark:bg-gray-700 rounded-xl p-5 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="flex items-center gap-x-3 mb-3">
                        <?php $customer = $this->db->query("SELECT * FROM tbl_customer WHERE comp_id = '$comp_id' {$customer_branch_where}");
              $male = $this->db->query("SELECT * FROM tbl_customer WHERE comp_id = '$comp_id' AND gender = 'male' {$customer_branch_where}");
              $female = $this->db->query("SELECT * FROM tbl_customer WHERE comp_id = '$comp_id' AND gender = 'female' {$customer_branch_where}");
              $active = $this->db->query("SELECT * FROM tbl_customer WHERE comp_id = '$comp_id' AND customer_status = 'open' {$customer_branch_where}");
              $pendin = $this->db->query("SELECT * FROM tbl_customer WHERE comp_id = '$comp_id' AND customer_status = 'pending' {$customer_branch_where}");
              $closed = $this->db->query("SELECT * FROM tbl_customer WHERE comp_id = '$comp_id' AND customer_status = 'close' {$customer_branch_where}");
							 ?>
                             <!-- <img src="</?php echo base_url('assets/img/users.png'); ?>" class="size-10" alt="Customers"> -->
                            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200"><?php echo $txt_customers; ?></h2>
                        </div>
                          <p class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-1"><?php echo $all_customer_count ?? 0; ?> <span class="text-sm font-normal"><?php echo $txt_total; ?></span></p>
                        <div class="text-xs space-x-2"> 
                            <span class="text-green-600 dark:text-green-400"><?php echo $txt_active; ?>: <?php echo $active->num_rows(); ?></span>
                            <span class="text-orange-500 dark:text-orange-400"><?php echo $txt_pending; ?>: <?php echo $pendin->num_rows(); ?></span>
                            <span class="text-red-600 dark:text-red-400"><?php echo $txt_closed; ?>: <?php echo $closed->num_rows(); ?></span>
                        </div>
                    </a>
                    
                    <!-- Stat Card: Loan Requests -->
                    <a href="<?php echo $admin_link('admin/loan_pending'); ?>" class="bg-white dark:bg-gray-700 rounded-xl p-5 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="flex items-center gap-x-3 mb-3">
                             <!-- <img src="<//?php echo base_url('assets/img/hukumu.png'); ?>" class="size-10" alt="Loan Requests"> -->
                            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200"><?php echo $txt_loan_requests; ?></h2>
                        </div>
                        <?php $new_loan = $this->db->query("SELECT * FROM tbl_loans WHERE comp_id = '$comp_id' AND loan_status = 'open' {$loan_branch_where}"); ?>
                        <p class="text-2xl font-bold text-red-600 dark:text-red-400"><?php echo ($new_loan->num_rows());  ?></p>
                          <p class="text-xs text-gray-500 dark:text-gray-400"><?php echo $txt_new_loan_applications; ?></p>
                    </a>

         


                    <!-- Stat Card: Today Loan Pending -->
                     <a href="<?php echo $admin_link('admin/loan_pending_time'); ?>" class="bg-white dark:bg-gray-700 rounded-xl p-5 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="flex items-center gap-x-3 mb-3">
                            <!-- <img src="</?php echo base_url('assets/img/penart.png'); ?>" class="size-10" alt="Today Pending"> -->
                            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200"><?php echo $txt_today_loan_pending; ?></h2>
                        </div>
                        <?php $laza = $this->db->query("SELECT * FROM tbl_pending_total WHERE comp_id = '$comp_id' AND total_pend IS NOT FALSE {$pending_branch_where}");
               
							 ?>
                        <p class="text-2xl font-bold text-gray-800 dark:text-gray-200"><?php echo $laza->num_rows(); ?></p>
                        <p class="text-xs text-gray-500 dark:text-gray-400"><?php echo $txt_loan_payments_due_yesterday; ?></p>
                    </a>

                    <!-- Stat Card: Today Receivable -->
                    <a href="<?php echo $admin_link('admin/today_recevable_loan'); ?>" class="bg-white dark:bg-gray-700 rounded-xl p-5 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="flex items-center gap-x-3 mb-3">
                            <!-- <img src="</?php echo base_url('assets/img/money.png'); ?>" class="size-10" alt="Today Receivable"> -->
                                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200"><?php echo $txt_today_receivable; ?></h2>
                        </div>
                        <p class="text-2xl font-bold text-gray-800 dark:text-gray-200"><?php echo number_format($receivable_total->total_rejesho) ; ?></p>
                              <p class="text-xs text-gray-500 dark:text-gray-400"><?php echo $txt_expected_amount_today; ?></p>
                    </a>

                    <!-- Stat Card: Today Received -->
                    <a href="<?php echo $admin_link('admin/today_receved_loan'); ?>" class="bg-white dark:bg-gray-700 rounded-xl p-5 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="flex items-center gap-x-3 mb-3">
                            <!-- <img src="</?php echo base_url('assets/img/money.png'); ?>" class="size-10" alt="Today Received"> -->
                            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200"><?php echo $txt_today_collected; ?></h2>
                        </div>
                        <p class="text-2xl font-bold text-gray-800 dark:text-gray-200"><?php echo number_format($total_receved->total_depost); ?></p>
                          <p class="text-xs text-gray-500 dark:text-gray-400"><?php echo $txt_amount_collected_today; ?></p>
                    </a>
                    
                    <!-- Stat Card: Recommended Expenses -->
                    <!-- <a href="</?php echo base_url("admin/get_recomended_request"); ?>" class="bg-white dark:bg-gray-700 rounded-xl p-5 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="flex items-center gap-x-3 mb-3">
                             <img src="</?php echo base_url('assets/img/expences.png'); ?>" class="size-10" alt="Recommended Expenses">
                            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Recommended Expenses</h2>
                        </div>
                       <p class="text-2xl font-bold text-red-600 dark:text-red-400"></?php echo $exp_req_count ?? 0; ?></p>
                       <p class="text-xs text-gray-500 dark:text-gray-400">Pending expense requests</p>
                    </a> -->

                </div>
            </div>
        </div>
        <!-- End Quick Stats/Link Boxes -->

    </div>
</div>
<!-- ========== END MAIN CONTENT BODY ========== -->

<?php
include_once APPPATH . "views/partials/footer.php";
?>

<?php // JavaScript for the dashboard chart (ApexCharts) - Same as previous version ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const options = {
      series: [{
          name: 'Loan Amount', // Replace with your series name
          data: [31000, 40000, 28000, 51000, 42000, 109000, 100000] // Replace with your actual data
      }, {
          name: 'Interest Expected', // Replace with your series name
          data: [1100, 3200, 4500, 3200, 3400, 5200, 4100] // Replace with your actual data
      }],
      chart: {
        height: 350, // Adjust as needed
        type: 'area', // or 'line', 'bar'
        toolbar: { show: false },
        parentHeightOffset: 0, // Important for fitting in card
        background: 'transparent'
      },
      dataLabels: { enabled: false },
      stroke: { curve: 'smooth', width: 2 },
      xaxis: {
        type: 'datetime',
        categories: ["2018-09-19T00:00:00.000Z", "2018-09-20T00:00:00.000Z", "2018-09-21T00:00:00.000Z", "2018-09-22T00:00:00.000Z", "2018-09-23T00:00:00.000Z", "2018-09-24T00:00:00.000Z", "2018-09-25T00:00:00.000Z"], // Replace
        labels: { style: { colors: document.documentElement.classList.contains('dark') ? '#9ca3af' : '#6b7280', fontSize: '12px' } },
        axisBorder: { show: false },
        axisTicks: { show: false }
      },
      yaxis: {
         labels: {
            formatter: function (value) { return value >= 1000 ? `${value / 1000}k` : value; },
            style: { colors: document.documentElement.classList.contains('dark') ? '#9ca3af' : '#6b7280', fontSize: '12px' },
            offsetX: -10
        }
      },
      tooltip: {
        x: { format: 'dd MMM yyyy' },
        theme: document.documentElement.classList.contains('dark') ? 'dark' : 'light'
      },
      colors: ['#06b6d4', '#818cf8'], // Tailwind: cyan-500, indigo-400
      legend: {
          show: true,
          position: 'top',
          horizontalAlign: 'right',
          labels: { colors: document.documentElement.classList.contains('dark') ? '#e5e7eb' : '#374151' }
      },
      grid: {
        show: true,
        borderColor: document.documentElement.classList.contains('dark') ? '#4b5563' : '#e5e7eb', // gray-600 or gray-200
        strokeDashArray: 4,
        padding: { top: -10, right: 0, bottom: 0, left: 10 }
      },
      fill: {
        type: 'gradient',
        gradient: {
          shadeIntensity: 1,
          opacityFrom: 0.4,
          opacityTo: 0.1,
          stops: [0, 90, 100]
        }
      }
    };

    const chartElement = document.querySelector("#dashboard-main-chart");
    if (chartElement) {
        const chart = new ApexCharts(chartElement, options);
        chart.render();
        // Listener for theme changes to update chart theme
        const observer = new MutationObserver((mutationsList) => {
            for (let mutation of mutationsList) {
                if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                    chart.updateOptions({
                        tooltip: { theme: document.documentElement.classList.contains('dark') ? 'dark' : 'light' },
                        legend: { labels: { colors: document.documentElement.classList.contains('dark') ? '#e5e7eb' : '#374151' } },
                        grid: { borderColor: document.documentElement.classList.contains('dark') ? '#4b5563' : '#e5e7eb' },
                        xaxis: { labels: { style: { colors: document.documentElement.classList.contains('dark') ? '#9ca3af' : '#6b7280' } } },
                        yaxis: { labels: { style: { colors: document.documentElement.classList.contains('dark') ? '#9ca3af' : '#6b7280' } } }
                    });
                }
            }
        });
        observer.observe(document.documentElement, { attributes: true });
    }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const pieCtx = document.getElementById('depositorsPieChart').getContext('2d');

  const depositorsPieChart = new Chart(pieCtx, {
    type: 'pie',
    data: {
      labels: <?= json_encode(array_map(fn($e) => $e->empl_name, $top_depositors)) ?>,
      datasets: [{
        data: <?= json_encode(array_map(fn($e) => $e->total_deposit, $top_depositors)) ?>,
        backgroundColor: [
          '#14b8a6', '#0ea5e9', '#8b5cf6', '#f59e0b', '#ef4444',
          '#10b981', '#3b82f6', '#eab308', '#6366f1', '#ec4899'
        ],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'bottom',
          labels: {
            color: '#374151',
            font: {
              size: 12
            }
          }
        }
      }
    }
  });
</script>
