<?php
include_once APPPATH . "views/partials/header.php";

$customers           = !empty($customers) ? $customers : array();
$blanch              = !empty($blanch) ? $blanch : array();
$selected_blanch_id  = !empty($selected_blanch_id) ? (int) $selected_blanch_id : 0;
$selected_branch_name = !empty($selected_branch_name) ? $selected_branch_name : 'All Branches';
$report_date         = !empty($report_date) ? $report_date : date('Y-m-d');

$lang_line = function ($key, $fallback) {
    $value = $this->lang->line($key);
    return !empty($value) ? $value : $fallback;
};

$txt_title         = $lang_line('daily_report_outside_contract', 'Received Outside Contract');
$txt_date          = $lang_line('date', 'Date');
$txt_branch        = $lang_line('branch', 'Branch');
$txt_all_branches  = $lang_line('all_branches', 'All Branches');
$txt_filter        = $lang_line('filter', 'Filter');
$txt_reset         = $lang_line('reset', 'Reset');
$txt_download_pdf  = $lang_line('download_pdf', 'Download PDF');
$txt_customer_name = $lang_line('ocr_customer_name', 'Customer Name');
$txt_phone         = $lang_line('ocr_phone', 'Phone Number');
$txt_loan_aprov    = $lang_line('ocr_loan_aprov', 'Loan Amount');
$txt_loan_int      = $lang_line('ocr_loan_int', 'Loan + Interest');
$txt_paid_total    = $lang_line('ocr_paid_total', 'Paid Total');
$txt_remain        = $lang_line('ocr_remain', 'Remain');
$txt_restration    = $lang_line('ocr_restration', 'Registration');
$txt_loan_duration = $lang_line('ocr_loan_duration', 'Loan Duration');
$txt_start_date    = $lang_line('ocr_start_date', 'Start Date');
$txt_end_date      = $lang_line('ocr_end_date', 'End Date');
$txt_received      = $lang_line('ocr_received', 'Received');
$txt_branch_name   = $lang_line('ocr_branch_name', 'Branch');
$txt_no_data       = $lang_line('ocr_no_data', 'No outside-contract payments found for the selected date and branch.');
$txt_sno           = $lang_line('ocr_sno', '#');
$txt_total         = $lang_line('ocr_total', 'Total');

$grand_total = 0;
foreach ($customers as $row) {
    $grand_total += (float) $row->received_outside;
}
?>

<div class="w-full lg:ps-64">
  <div class="overflow-x-auto">
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
      <div class="w-full">
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">

          <!-- Header + Filter -->
          <div class="flex flex-col md:flex-row items-start justify-between space-y-3 md:space-y-0 p-4 gap-4">
            <div>
              <h2 class="text-lg font-semibold text-gray-800 dark:text-white"><?php echo $txt_title; ?></h2>
              <p class="text-sm text-gray-500 dark:text-gray-400">
                <?php echo $txt_date; ?>: <strong><?php echo htmlspecialchars($report_date); ?></strong>
                &nbsp;|&nbsp;
                <?php echo $txt_branch; ?>: <strong><?php echo htmlspecialchars($selected_branch_name); ?></strong>
              </p>
            </div>

            <form method="get" action="<?php echo base_url('admin/outside_contract_report'); ?>"
                  class="flex flex-wrap items-end gap-2">
              <div>
                <label class="block text-xs text-gray-600 dark:text-gray-300 mb-1"><?php echo $txt_date; ?></label>
                <input type="date" name="report_date"
                       value="<?php echo htmlspecialchars($report_date); ?>"
                       class="border border-gray-300 rounded-lg text-sm px-3 py-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-cyan-500 focus:border-cyan-500" />
              </div>
              <div>
                <label class="block text-xs text-gray-600 dark:text-gray-300 mb-1"><?php echo $txt_branch; ?></label>
                <select name="blanch_id"
                        class="border border-gray-300 rounded-lg text-sm px-3 py-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-cyan-500 focus:border-cyan-500">
                  <option value="0"><?php echo $txt_all_branches; ?></option>
                  <?php if (!empty($blanch)): ?>
                    <?php foreach ($blanch as $b): ?>
                      <option value="<?php echo (int) $b->blanch_id; ?>"
                        <?php echo ($selected_blanch_id == (int) $b->blanch_id) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($b->blanch_name); ?>
                      </option>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </select>
              </div>
              <button type="submit"
                      class="px-4 py-2 text-sm font-medium text-white bg-cyan-600 hover:bg-cyan-700 rounded-lg focus:outline-none focus:ring-4 focus:ring-cyan-300 dark:focus:ring-cyan-800">
                <?php echo $txt_filter; ?>
              </button>
              <a href="<?php echo base_url('admin/outside_contract_report'); ?>"
                 class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600">
                <?php echo $txt_reset; ?>
              </a>
              <a href="<?php echo base_url('admin/outside_contract_report_pdf?report_date=' . urlencode($report_date) . '&blanch_id=' . (int) $selected_blanch_id); ?>"
                 target="_blank"
                 class="px-4 py-2 text-sm font-medium text-white bg-cyan-600 hover:bg-cyan-700 rounded-lg focus:outline-none focus:ring-4 focus:ring-cyan-300 dark:focus:ring-cyan-800">
                <?php echo $txt_download_pdf; ?>
              </a>
            </form>
          </div>

          <!-- Table -->
          <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
                   id="outside_contract_table"
                   data-hs-datatable='{"pageLength":25}'>
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                  <th class="px-4 py-3"><?php echo $txt_sno; ?></th>
                  <th class="px-4 py-3"><?php echo $txt_customer_name; ?></th>
                  <th class="px-4 py-3"><?php echo $txt_phone; ?></th>
                  <th class="px-4 py-3"><?php echo $txt_loan_aprov; ?></th>
                  <th class="px-4 py-3"><?php echo $txt_loan_int; ?></th>
                  <th class="px-4 py-3"><?php echo $txt_paid_total; ?></th>
                  <th class="px-4 py-3"><?php echo $txt_remain; ?></th>
                  <th class="px-4 py-3"><?php echo $txt_restration; ?></th>
                   <th class="px-4 py-3"><?php echo $txt_loan_duration; ?></th>
                  <th class="px-4 py-3"><?php echo $txt_start_date; ?></th>
                  <th class="px-4 py-3"><?php echo $txt_end_date; ?></th>
                  <th class="px-4 py-3"><?php echo $txt_received; ?></th>
                  <th class="px-4 py-3"><?php echo $txt_branch_name; ?></th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($customers)): ?>
                  <?php $sno = 1; ?>
                  <?php foreach ($customers as $row): ?>
                    <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <td class="px-4 py-3"><?php echo $sno++; ?></td>
                      <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">
                        <?php echo htmlspecialchars(trim($row->f_name . ' ' . $row->m_name . ' ' . $row->l_name)); ?>
                      </td>
                      <td class="px-4 py-3"><?php echo htmlspecialchars($row->phone_no); ?></td>
                      <td class="px-4 py-3"><?php echo number_format((float) $row->loan_aprove); ?></td>
                      <td class="px-4 py-3"><?php echo number_format((float) $row->loan_int); ?></td>
                      <td class="px-4 py-3"><?php echo number_format((float) $row->paid_total); ?></td>
                      <td class="px-4 py-3"><?php echo number_format(((float) $row->loan_int) - ((float) $row->paid_total)); ?></td>
                      <td class="px-4 py-3"><?php echo number_format((float) $row->restration); ?></td>
                       <td class="px-4 py-3">
                         <?php
                           $day_value = isset($row->day) ? (int) $row->day : 0;
                           if ($day_value === 1) {
                               $duration_label = 'Daily';
                           } elseif ($day_value === 7) {
                               $duration_label = 'Weekly';
                           } elseif ($day_value === 28 || $day_value === 30 || $day_value === 31) {
                               $duration_label = 'Monthly';
                           } else {
                               $duration_label = 'Day ' . $day_value;
                           }
                           $session_value = isset($row->session) ? (int) $row->session : 0;
                           echo htmlspecialchars($duration_label . '(' . $session_value . ')');
                         ?>
                       </td>
                      <td class="px-4 py-3"><?php echo !empty($row->loan_stat_date) ? htmlspecialchars(date('d-m-Y', strtotime($row->loan_stat_date))) : '-'; ?></td>
                      <td class="px-4 py-3"><?php echo !empty($row->loan_end_date) ? htmlspecialchars(date('d-m-Y', strtotime($row->loan_end_date))) : '-'; ?></td>
                      <td class="px-4 py-3 font-semibold text-cyan-700 dark:text-cyan-400">
                        <?php echo number_format((float) $row->received_outside); ?>
                      </td>
                      <td class="px-4 py-3"><?php echo htmlspecialchars($row->blanch_name); ?></td>
                    </tr>
                  <?php endforeach; ?>
                  <!-- Total row -->
                  <tr class="bg-gray-100 dark:bg-gray-700 font-bold text-gray-800 dark:text-white border-t-2 border-gray-300 dark:border-gray-500">
                     <td class="px-4 py-3" colspan="11"><?php echo $txt_total; ?></td>
                    <td class="px-4 py-3 text-cyan-700 dark:text-cyan-300"><?php echo number_format($grand_total); ?></td>
                    <td class="px-4 py-3"></td>
                  </tr>
                <?php else: ?>
                  <tr>
                     <td colspan="13" class="px-4 py-6 text-center text-gray-400 dark:text-gray-500">
                      <?php echo $txt_no_data; ?>
                    </td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
          <!-- /Table -->

        </div>
      </div>
    </section>
  </div>
</div>

<?php include_once APPPATH . "views/partials/footer.php"; ?>
