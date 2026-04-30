<?php
include_once APPPATH . "views/partials/header.php";

$not_paid_list = !empty($not_paid_list) ? $not_paid_list : array();
$blanch = !empty($blanch) ? $blanch : array();
$selected_blanch_id = !empty($selected_blanch_id) ? (int) $selected_blanch_id : 0;
$selected_branch_name = !empty($selected_branch_name) ? $selected_branch_name : 'All Branches';
$report_date = !empty($report_date) ? $report_date : date('Y-m-d');
$yesterday_date = date('Y-m-d', strtotime($report_date . ' -1 day'));

$lang_line = function ($key, $fallback) {
    $value = $this->lang->line($key);
    return !empty($value) ? $value : $fallback;
};

$txt_title = $lang_line('daily_report_not_paid_today', 'Not Paid Today');
$txt_date = $lang_line('date', 'Date');
$txt_branch = $lang_line('branch', 'Branch');
$txt_all_branches = $lang_line('all_branches', 'All Branches');
$txt_filter = $lang_line('filter', 'Filter');
$txt_reset = $lang_line('reset', 'Reset');
$txt_yesterday = $lang_line('npt_yesterday', 'Yesterday');
$txt_download_pdf = $lang_line('download_pdf', 'Download PDF');
$txt_customer_name = $lang_line('ocr_customer_name', 'Customer Name');
$txt_phone = $lang_line('ocr_phone', 'Phone Number');
$txt_loan_int = $lang_line('ocr_loan_int', 'Loan + Interest');
$txt_collection = $lang_line('ocr_restration', 'Collection');
$txt_expected_today = $lang_line('npt_expected_today', 'Expected Today');
$txt_paid_today = $lang_line('npt_paid_today', 'Paid Today');
$txt_not_paid_today = $lang_line('daily_report_not_paid_today', 'Not Paid Today');
$txt_branch_name = $lang_line('ocr_branch_name', 'Branch');
$txt_no_data = $lang_line('npt_no_data', 'No records found for Not Paid Today on selected filters.');
$txt_sno = $lang_line('ocr_sno', '#');
$txt_total = $lang_line('ocr_total', 'Total');

$total_not_paid = 0;
foreach ($not_paid_list as $row) {
    $total_not_paid += (float) $row->not_paid_today;
}
?>

<div class="w-full lg:ps-64 min-h-screen">
  <div class="p-4 sm:p-6 lg:p-8">
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 rounded-xl">
      <div class="w-full">
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">

          <div class="flex flex-col md:flex-row items-start justify-between space-y-3 md:space-y-0 p-4 gap-4">
            <div>
              <h2 class="text-lg font-semibold text-gray-800 dark:text-white"><?php echo $txt_title; ?></h2>
              <p class="text-sm text-gray-500 dark:text-gray-400">
                <?php echo $txt_date; ?>: <strong><?php echo htmlspecialchars($report_date); ?></strong>
                &nbsp;|&nbsp;
                <?php echo $txt_branch; ?>: <strong><?php echo htmlspecialchars($selected_branch_name); ?></strong>
              </p>
            </div>

            <form method="get" action="<?php echo base_url('admin/not_paid_today_report'); ?>" class="flex flex-wrap items-end gap-2">
              <div>
                <label class="block text-xs text-gray-600 dark:text-gray-300 mb-1"><?php echo $txt_date; ?></label>
                <input type="date" name="report_date" value="<?php echo htmlspecialchars($report_date); ?>" class="border border-gray-300 rounded-lg text-sm px-3 py-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
              </div>
              <div>
                <label class="block text-xs text-gray-600 dark:text-gray-300 mb-1"><?php echo $txt_branch; ?></label>
                <select name="blanch_id" class="border border-gray-300 rounded-lg text-sm px-3 py-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                  <option value="0"><?php echo $txt_all_branches; ?></option>
                  <?php foreach ($blanch as $b): ?>
                    <option value="<?php echo (int) $b->blanch_id; ?>" <?php echo $selected_blanch_id === (int) $b->blanch_id ? 'selected' : ''; ?>>
                      <?php echo htmlspecialchars($b->blanch_name); ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-cyan-600 hover:bg-cyan-700 rounded-lg"><?php echo $txt_filter; ?></button>
              <a href="<?php echo base_url('admin/not_paid_today_report?report_date=' . urlencode($yesterday_date) . '&blanch_id=' . (int) $selected_blanch_id); ?>" class="px-4 py-2 text-sm font-medium text-amber-800 bg-amber-100 hover:bg-amber-200 rounded-lg dark:bg-amber-900 dark:text-amber-200"><?php echo $txt_yesterday; ?></a>
              <a href="<?php echo base_url('admin/not_paid_today_report_pdf?report_date=' . urlencode($report_date) . '&blanch_id=' . (int) $selected_blanch_id); ?>" class="px-4 py-2 text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 rounded-lg"><?php echo $txt_download_pdf; ?></a>
              <a href="<?php echo base_url('admin/not_paid_today_report'); ?>" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg dark:bg-gray-700 dark:text-gray-200"><?php echo $txt_reset; ?></a>
            </form>
          </div>

          <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                  <th class="px-4 py-3"><?php echo $txt_sno; ?></th>
                  <th class="px-4 py-3"><?php echo $txt_customer_name; ?></th>
                  <th class="px-4 py-3"><?php echo $txt_phone; ?></th>
                  <th class="px-4 py-3"><?php echo $txt_loan_int; ?></th>
                  <th class="px-4 py-3"><?php echo $txt_collection; ?></th>
                  <th class="px-4 py-3"><?php echo $txt_expected_today; ?></th>
                  <th class="px-4 py-3"><?php echo $txt_paid_today; ?></th>
                  <th class="px-4 py-3"><?php echo $txt_not_paid_today; ?></th>
                  <th class="px-4 py-3"><?php echo $txt_branch_name; ?></th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($not_paid_list)): ?>
                  <?php $sno = 1; ?>
                  <?php foreach ($not_paid_list as $row): ?>
                    <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <td class="px-4 py-3"><?php echo $sno++; ?></td>
                      <td class="px-4 py-3 font-medium text-gray-900 dark:text-white"><?php echo htmlspecialchars(trim($row->f_name . ' ' . $row->m_name . ' ' . $row->l_name)); ?></td>
                      <td class="px-4 py-3"><?php echo htmlspecialchars($row->phone_no); ?></td>
                      <td class="px-4 py-3"><?php echo number_format((float) $row->loan_int); ?></td>
                      <td class="px-4 py-3"><?php echo number_format((float) $row->restration); ?></td>
                      <td class="px-4 py-3"><?php echo number_format((float) $row->expected_today); ?></td>
                      <td class="px-4 py-3"><?php echo number_format((float) $row->actual_paid_today); ?></td>
                      <td class="px-4 py-3 font-semibold text-red-700 dark:text-red-400"><?php echo number_format((float) $row->not_paid_today); ?></td>
                      <td class="px-4 py-3"><?php echo htmlspecialchars($row->blanch_name); ?></td>
                    </tr>
                  <?php endforeach; ?>
                  <tr class="bg-gray-100 dark:bg-gray-700 font-bold text-gray-800 dark:text-white border-t-2 border-gray-300 dark:border-gray-500">
                    <td class="px-4 py-3" colspan="7"><?php echo $txt_total; ?></td>
                    <td class="px-4 py-3 text-red-700 dark:text-red-300"><?php echo number_format($total_not_paid); ?></td>
                    <td class="px-4 py-3"></td>
                  </tr>
                <?php else: ?>
                  <tr>
                    <td colspan="9" class="px-4 py-6 text-center text-gray-400 dark:text-gray-500"><?php echo $txt_no_data; ?></td>
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

<?php include_once APPPATH . "views/partials/footer.php"; ?>
