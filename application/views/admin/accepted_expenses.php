<?php
include_once APPPATH . "views/partials/header.php";
?>

<div class="w-full lg:ps-64">
  <div class="p-4 sm:p-6 space-y-4">

    <!-- Page Header -->
    <div>
      <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">
        <?php echo $this->lang->line('accepted_expenses') ?? 'Accepted Expenses'; ?>
      </h2>
      <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
        <?php echo $this->lang->line('accepted_expenses_subtitle') ?? 'All approved expense requests.'; ?>
      </p>
    </div>

    <!-- Flash Messages -->
    <?php if ($msg = $this->session->flashdata('massage')): ?>
      <div class="bg-teal-50 border-t-2 border-teal-500 rounded-lg p-4 dark:bg-teal-800/30">
        <div class="flex"><div class="ms-3"><h3 class="text-gray-800 font-semibold dark:text-white"><?php echo $this->lang->line('success') ?? 'Success'; ?></h3><p class="text-sm text-gray-700 dark:text-gray-400"><?php echo $msg; ?></p></div></div>
      </div>
    <?php endif; ?>

    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
      <div class="w-full">
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">

          <!-- Search + Header -->
          <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
            <div class="w-full md:w-auto">
              <div class="relative">
                <input type="text" id="simple-search"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                  placeholder="<?php echo $this->lang->line('search') ?? 'Search'; ?>..."
                  data-hs-datatable-search="#accepted_expenses_table">
              </div>
            </div>
          </div>

          <!-- Date & Branch Filter -->
          <div class="px-4 pb-4">
            <form method="get" action="<?php echo base_url('admin/get_accepted_expenses'); ?>" class="flex flex-wrap items-end gap-3">
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
                <label class="block text-xs font-medium text-gray-500 dark:text-gray-400 mb-1"><?php echo $this->lang->line('branch') ?? 'Branch'; ?></label>
                <select name="branch"
                  class="block w-full rounded-lg border-gray-300 px-3 py-1.5 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-2 focus:ring-cyan-500">
                  <option value=""><?php echo $this->lang->line('all_branches') ?? 'All Branches'; ?></option>
                  <?php if (!empty($blanch)): foreach ($blanch as $br): ?>
                    <option value="<?php echo $br->blanch_id; ?>" <?php echo (isset($filter_branch) && $filter_branch == $br->blanch_id) ? 'selected' : ''; ?>><?php echo $br->blanch_name; ?></option>
                  <?php endforeach; endif; ?>
                </select>
              </div>
              <div>
                <label class="block text-xs font-medium text-gray-500 dark:text-gray-400 mb-1"><?php echo $this->lang->line('expenses') ?? 'Expenses'; ?></label>
                <select name="expense"
                  class="block w-full rounded-lg border-gray-300 px-3 py-1.5 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-2 focus:ring-cyan-500">
                  <option value=""><?php echo $this->lang->line('all_expenses') ?? 'All Expenses'; ?></option>
                  <option value="daily_allowance" <?php echo (isset($filter_expense) && $filter_expense == 'daily_allowance') ? 'selected' : ''; ?>><?php echo $this->lang->line('daily_allowance') ?? 'Daily Allowance'; ?></option>
                  <?php if (!empty($expns)): foreach ($expns as $ex): ?>
                    <option value="<?php echo $ex->ex_id; ?>" <?php echo (isset($filter_expense) && $filter_expense == $ex->ex_id) ? 'selected' : ''; ?>><?php echo $ex->ex_name; ?></option>
                  <?php endforeach; endif; ?>
                </select>
              </div>
              <button type="submit"
                class="inline-flex items-center gap-1.5 px-4 py-1.5 text-sm font-medium text-white bg-cyan-600 hover:bg-cyan-700 rounded-lg focus:ring-2 focus:ring-cyan-300">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                <?php echo $this->lang->line('filter') ?? 'Filter'; ?>
              </button>
              <?php if (!empty($filter_from) || !empty($filter_to) || !empty($filter_branch) || !empty($filter_expense)): ?>
              <a href="<?php echo base_url('admin/get_accepted_expenses'); ?>"
                class="inline-flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-gray-600 bg-gray-100 hover:bg-gray-200 dark:text-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 rounded-lg">
                <?php echo $this->lang->line('clear') ?? 'Clear'; ?>
              </a>
              <?php endif; ?>
              <?php if (!empty($data)): ?>
              <a href="<?php echo base_url('admin/accepted_expenses_pdf'); ?>?from=<?php echo isset($filter_from) ? $filter_from : ''; ?>&to=<?php echo isset($filter_to) ? $filter_to : ''; ?>&branch=<?php echo isset($filter_branch) ? $filter_branch : ''; ?>&expense=<?php echo isset($filter_expense) ? $filter_expense : ''; ?>"
                class="inline-flex items-center gap-1.5 px-4 py-1.5 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg focus:ring-2 focus:ring-red-300">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                PDF
              </a>
              <?php endif; ?>
            </form>
          </div>

          <!-- Table -->
          <div class="overflow-x-auto">
            <table id="accepted_expenses_table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-cyan-500 dark:text-gray-400">
                <tr>
                  <th class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('s_no') ?? 'S/No'; ?></th>
                  <th class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('branch') ?? 'Branch'; ?></th>
                  <th class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('expenses') ?? 'Expenses'; ?></th>
                  <th class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('amount') ?? 'Amount'; ?></th>
                  <th class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('from_account') ?? 'From Account'; ?></th>
                  <th class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('description') ?? 'Description'; ?></th>
                  <th class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('date') ?? 'Date'; ?></th>
                  <th class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('approved_by') ?? 'Approved By'; ?></th>
                  <th class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('status') ?? 'Status'; ?></th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($data)): ?>
                  <?php $no = 1; foreach ($data as $datas): ?>
                    <tr class="border-b dark:border-gray-700">
                      <td class="px-4 py-3 font-medium text-gray-900 dark:text-white"><?= $no++; ?></td>
                      <td class="px-4 py-3 text-gray-900 dark:text-white"><?= $datas->blanch_name; ?></td>
                      <td class="px-4 py-3 text-gray-900 dark:text-white">
                        <?php echo (isset($datas->deduct_type) && $datas->deduct_type == 'daily_allowance')
                          ? ($this->lang->line('daily_allowance') ?? 'Daily Allowance')
                          : $datas->ex_name; ?>
                      </td>
                      <td class="px-4 py-3 text-gray-900 dark:text-white"><?= number_format($datas->req_amount); ?></td>
                      <td class="px-4 py-3 text-gray-900 dark:text-white"><?= $datas->account_name; ?></td>
                      <td class="px-4 py-3 text-gray-900 dark:text-white"><?= $datas->req_description; ?></td>
                      <td class="px-4 py-3 text-gray-900 dark:text-white"><?= $datas->req_date; ?></td>
                      <td class="px-4 py-3 text-gray-900 dark:text-white"><?= isset($datas->approved_by_name) ? $datas->approved_by_name : '-'; ?></td>
                      <td class="px-4 py-3">
                        <span class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                          <span class="size-1.5 inline-block rounded-full bg-teal-500"></span>
                          <?php echo $this->lang->line('approved') ?? 'Approved'; ?>
                        </span>
                      </td>
                    </tr>
                  <?php endforeach; ?>

                  <!-- Totals Row -->
                  <?php if (isset($tota_exp->total_amount) && $tota_exp->total_amount > 0): ?>
                  <tr class="bg-gray-100 dark:bg-gray-800 font-bold">
                    <td colspan="3" class="px-4 py-3 text-right text-gray-900 dark:text-white"><?php echo $this->lang->line('total') ?? 'Total'; ?></td>
                    <td class="px-4 py-3 text-teal-600 dark:text-teal-400"><?= number_format($tota_exp->total_amount); ?></td>
                    <td colspan="5"></td>
                  </tr>
                  <?php endif; ?>

                <?php else: ?>
                  <tr>
                    <td colspan="9" class="px-4 py-6 text-center text-gray-400">
                      <?php echo $this->lang->line('no_expenses_found') ?? 'No expenses found.'; ?>
                    </td>
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
