<?php
include_once APPPATH . "views/partials/header.php";

$lang_line = function ($key, $fallback) {
  $value = $this->lang->line($key);
  return !empty($value) ? $value : $fallback;
};

$schedule_total = 0;
$paid_count = 0;
$pending_count = 0;
$upcoming_count = 0;

foreach ($data_loan as $schedule_item) {
    $schedule_total += (float) ($schedule_item->restration ?? 0);
    if (($schedule_item->date_status ?? '') === 'paid') {
        $paid_count++;
    } elseif (($schedule_item->date_status ?? '') === 'not paid') {
        $pending_count++;
    } else {
        $upcoming_count++;
    }
}

$loan_start_date = $loan->loan_stat_date ?? '-';
$loan_end_date = !empty($loan->loan_end_date) ? substr($loan->loan_end_date, 0, 10) : '-';
$loan_interval = (int) ($loan->day ?? 0);
$loan_sessions = (int) ($loan->session ?? 0);
$controller_name = strtolower($this->router->fetch_class());
$is_officer_view = ($controller_name === 'oficer');
$back_customer_id = (int) ($loan->customer_id ?? 0);
$print_url = base_url(($is_officer_view ? 'oficer' : 'admin') . '/print_loan_shedure/' . $loan_id);
$cycle_label = $lang_line('ls_custom_cycle', 'Custom');
if ($loan_interval === 1) {
  $cycle_label = $lang_line('ls_daily_cycle', 'Daily');
} elseif ($loan_interval === 7) {
  $cycle_label = $lang_line('ls_weekly_cycle', 'Weekly');
} elseif (in_array($loan_interval, [28, 29, 30, 31], true)) {
  $cycle_label = $lang_line('ls_monthly_cycle', 'Monthly');
}

$txt_success = $lang_line('success', 'Success');
$txt_loan_schedule = $lang_line('ls_loan_schedule', 'Loan Schedule');
$txt_amount = $lang_line('ls_amount', 'Amount');
$txt_back = $lang_line('back', 'Back');
$txt_print = $lang_line('print_label', 'Print');
$txt_start_date = $lang_line('start_date', 'Start Date');
$txt_end_date = $lang_line('end_date', 'End Date');
$txt_cycle = $lang_line('ls_cycle', 'Cycle');
$txt_sessions = $lang_line('ls_sessions', 'Sessions');
$txt_total_collection = $lang_line('ls_total_collection', 'Total Collection');
$txt_paid_dates = $lang_line('ls_paid_dates', 'Paid Dates');
$txt_pending_upcoming = $lang_line('ls_pending_upcoming', 'Pending / Upcoming');
$txt_s_no = $lang_line('s_no', 'S/No.');
$txt_date = $lang_line('ps_date', 'Date');
$txt_collection = $lang_line('collection', 'Collection');
$txt_status = $lang_line('status', 'Status');
$txt_upcoming = $lang_line('ls_upcoming_status', 'Upcoming');
$txt_paid = $lang_line('ps_paid_status', 'Paid');
$txt_not_paid = $lang_line('ps_not_paid_status', 'Not Paid');
$txt_no_schedule = $lang_line('ps_no_schedule', 'No schedule data available for this loan.');
?>

<div class="w-full lg:ps-64 min-h-screen bg-gray-100 dark:bg-gray-900">
  <div class="p-4 sm:p-6 space-y-6">

    <?php if ($das = $this->session->flashdata('massage')): ?>
      <div class="bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert">
        <div class="flex">
          <div class="shrink-0">
            <span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-teal-100 bg-teal-200 text-teal-800 dark:border-teal-900 dark:bg-teal-800 dark:text-teal-500">
              <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="m9 12 2 2 4-4"></path></svg>
            </span>
          </div>
          <div class="ms-3">
            <h3 class="text-gray-800 font-semibold dark:text-white"><?php echo $txt_success; ?></h3>
            <p class="mt-2 text-sm text-gray-700 dark:text-gray-400"><?php echo $das; ?></p>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-2xl shadow-sm dark:shadow-gray-900/40 overflow-hidden">
      <div class="px-5 py-5 sm:px-6 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
          <div>
            <p class="text-xs font-semibold uppercase tracking-[0.24em] text-cyan-700 dark:text-cyan-400"><?php echo $txt_loan_schedule; ?></p>
            <h1 class="mt-2 text-2xl font-bold text-gray-900 dark:text-white">
              <?php echo htmlspecialchars($loan->loan_code ?? 'Loan', ENT_QUOTES, 'UTF-8'); ?>
            </h1>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
              <?php echo $txt_amount; ?>: <?php echo number_format((float) ($loan->loan_aprove ?? 0)); ?>
            </p>
          </div>

          <div class="flex flex-wrap gap-2">
            <?php if ($is_officer_view): ?>
              <a href="<?php echo base_url('oficer/data_with_depost/' . $back_customer_id); ?>" class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-gray-600">
                <?php echo $txt_back; ?>
              </a>
            <?php else: ?>
              <form action="<?php echo base_url('admin/search_customerData'); ?>" method="post" class="inline-flex">
                <input type="hidden" name="customer_id" value="<?php echo $back_customer_id; ?>">
                <input type="hidden" name="comp_id" value="<?php echo (int) $this->session->userdata('comp_id'); ?>">
                <button type="submit" class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-gray-600">
                  <?php echo $txt_back; ?>
                </button>
              </form>
            <?php endif; ?>
            <a href="<?php echo $print_url; ?>" target="_blank" class="inline-flex items-center justify-center rounded-lg bg-cyan-600 px-4 py-2 text-sm font-medium text-white hover:bg-cyan-700">
              <?php echo $txt_print; ?>
            </a>
          </div>
        </div>
      </div>

      <div class="p-5 sm:p-6 space-y-6">
        <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
          <div class="rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 p-4">
            <p class="text-xs uppercase font-semibold tracking-[0.18em] text-gray-500 dark:text-gray-400"><?php echo $txt_start_date; ?></p>
            <p class="mt-2 text-lg font-bold text-gray-900 dark:text-white"><?php echo htmlspecialchars($loan_start_date, ENT_QUOTES, 'UTF-8'); ?></p>
          </div>
          <div class="rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 p-4">
            <p class="text-xs uppercase font-semibold tracking-[0.18em] text-gray-500 dark:text-gray-400"><?php echo $txt_end_date; ?></p>
            <p class="mt-2 text-lg font-bold text-gray-900 dark:text-white"><?php echo htmlspecialchars($loan_end_date, ENT_QUOTES, 'UTF-8'); ?></p>
          </div>
          <div class="rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 p-4">
            <p class="text-xs uppercase font-semibold tracking-[0.18em] text-gray-500 dark:text-gray-400"><?php echo $txt_cycle; ?></p>
            <p class="mt-2 text-lg font-bold text-gray-900 dark:text-white"><?php echo $cycle_label; ?> / <?php echo $loan_interval; ?> days</p>
          </div>
          <div class="rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 p-4">
            <p class="text-xs uppercase font-semibold tracking-[0.18em] text-gray-500 dark:text-gray-400"><?php echo $txt_sessions; ?></p>
            <p class="mt-2 text-lg font-bold text-gray-900 dark:text-white"><?php echo $loan_sessions; ?></p>
          </div>
        </div>

        <div class="grid gap-4 sm:grid-cols-3">
          <div class="rounded-xl bg-cyan-50 border border-cyan-100 p-4 dark:bg-gray-800 dark:border-cyan-900/40">
            <p class="text-xs uppercase font-semibold tracking-[0.18em] text-cyan-700 dark:text-cyan-300"><?php echo $txt_total_collection; ?></p>
            <p class="mt-2 text-2xl font-bold text-cyan-900 dark:text-cyan-100"><?php echo number_format($schedule_total); ?></p>
          </div>
          <div class="rounded-xl bg-white border border-emerald-100 p-4 dark:bg-gray-800 dark:border-emerald-900/40">
            <p class="text-xs uppercase font-semibold tracking-[0.18em] text-emerald-700 dark:text-white"><?php echo $txt_paid_dates; ?></p>
            <p class="mt-2 text-2xl font-bold text-emerald-900 dark:text-white"><?php echo $paid_count; ?></p>
          </div>
          <div class="rounded-xl bg-white border border-amber-100 p-4 dark:bg-gray-800 dark:border-amber-900/40">
            <p class="text-xs uppercase font-semibold tracking-[0.18em] text-amber-700 dark:text-white"><?php echo $txt_pending_upcoming; ?></p>
            <p class="mt-2 text-2xl font-bold text-amber-900 dark:text-white"><?php echo $pending_count + $upcoming_count; ?></p>
          </div>
        </div>

        <div class="overflow-hidden border border-gray-200 dark:border-gray-700 rounded-xl">
          <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
              <thead class="bg-cyan-600 dark:bg-cyan-600">
                <tr>
                  <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-[0.18em] text-white"><?php echo $txt_s_no; ?></th>
                  <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-[0.18em] text-white"><?php echo $txt_date; ?></th>
                  <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-[0.18em] text-white"><?php echo $txt_collection; ?></th>
                  <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-[0.18em] text-white"><?php echo $txt_status; ?></th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-gray-900">
                <?php $no = 1; ?>
                <?php foreach ($data_loan as $data_loans): ?>
                  <?php
                    $date_status = $data_loans->date_status ?? '';
                    $badge_class = 'bg-amber-100 text-amber-800 dark:bg-amber-900/40 dark:text-amber-300';
                    $status_text = $txt_upcoming;
                    if ($date_status === 'paid') {
                        $badge_class = 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/40 dark:text-emerald-300';
                      $status_text = $txt_paid;
                    } elseif ($date_status === 'not paid') {
                        $badge_class = 'bg-rose-100 text-rose-800 dark:bg-rose-700/80 dark:text-white';
                      $status_text = $txt_not_paid;
                    }
                  ?>
                  <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/40">
                    <td class="px-4 py-3 text-sm font-medium text-gray-900 dark:text-white"><?php echo $no++; ?>.</td>
                    <td class="px-4 py-3 text-sm font-medium text-gray-900 dark:text-white"><?php echo htmlspecialchars($data_loans->date ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
                    <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-300"><?php echo number_format((float) ($data_loans->restration ?? 0)); ?></td>
                    <td class="px-4 py-3 text-sm">
                      <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold <?php echo $badge_class; ?>">
                        <?php echo $status_text; ?>
                      </span>
                    </td>
                  </tr>
                <?php endforeach; ?>
                <?php if (empty($data_loan)): ?>
                  <tr>
                    <td colspan="4" class="px-4 py-8 text-center text-sm text-gray-500 dark:text-gray-400"><?php echo $txt_no_schedule; ?></td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include_once APPPATH . "views/partials/footer.php";
?>