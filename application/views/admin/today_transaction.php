








<?php
include_once APPPATH . "views/partials/header.php";

$selected_blanch_id = isset($selected_blanch_id) ? (string) $selected_blanch_id : '';
$selected_loan_type = isset($selected_loan_type) ? (string) $selected_loan_type : '';
$selected_loan_status = isset($selected_loan_status) ? (string) $selected_loan_status : '';
$show_action_column = !in_array($selected_loan_status, ['done', 'out'], true);
$report_date = isset($report_date) ? (string) $report_date : date('Y-m-d');

// --- DUMMY DATA - REMOVE AND LOAD FROM YOUR CONTROLLER ---
// Controller should pass $share, an array of shareholder objects.
// Each object should have 'share_id', 'share_name', 'share_mobile', 'share_email', 'share_sex', 'share_dob'.
// if (!isset($share)) {
//     $share = [
//         (object)['share_id' => 1, 'share_name' => 'Alice Wonderland', 'share_mobile' => '0712345001', 'share_email' => 'alice@example.com', 'share_sex' => 'female', 'share_dob' => '1985-06-15'],
//         (object)['share_id' => 2, 'share_name' => 'Bob The Builder', 'share_mobile' => '0712345002', 'share_email' => 'bob@example.com', 'share_sex' => 'male', 'share_dob' => '1978-11-02'],
//     ];
// }
// --- END DUMMY DATA ---
?>

<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
  <div class="= overflow-x-auto">
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
      <div class="w-full">
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
          <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
            <div class="w-full md:w-1/2">
              <form class="flex items-center">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                  <input
                    type="text"
                    id="simple-search"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"
                    placeholder="tafuta mteja hapa"
                    data-hs-datatable-search="#shareholder_table"
                    aria-label="Search share holders"
                  >
                </div>
              </form>
            </div>
            <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
              <?php if ($selected_loan_status !== 'done'): ?>
              <button type="button" class="flex items-center justify-center text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-basic-modal" data-hs-overlay="#hs-basic-modal">
                <svg class="h-4 w-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                  <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V4z" clip-rule="evenodd" />
                </svg>
                Filter Data
              </button>
              <?php endif; ?>
              <a href="<?php echo base_url('admin/download_today_transactions_pdf') . '?' . http_build_query([
                'blanch_id' => $selected_blanch_id === '' ? 'all' : $selected_blanch_id,
                'loan_type' => $selected_loan_type,
                'loan_status' => $selected_loan_status,
                'report_date' => $report_date
              ]); ?>" class="flex items-center justify-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none">
                PDF Download
              </a>
            </div>
          </div>
          <?php if ($selected_loan_status === 'out'): ?>
          <div class="px-4 pb-2 text-sm font-semibold text-red-600 dark:text-red-400"><?php echo $this->lang->line('today_defaulters_payments'); ?></div>
          <?php endif; ?>
            <div class="overflow-x-auto">

              <table id="shareholder_table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-cyan-500 dark:text-gray-400">
                      <tr>
                      
                        
                          <th scope="col" class="px-4 py-3 dark:text-white">S/No</th>
                          <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('customer_name'); ?></th>
                          <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('working_status'); ?></th>
                          <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('loan_type'); ?></th>
                          <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('branch_name'); ?></th>
                          <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('loan_amount'); ?></th>
                          <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('received_amount'); ?></th>
                          <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('pay_method'); ?></th>
                          <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('employee'); ?></th>
                          <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('date'); ?></th>
                            <?php if ($show_action_column): ?>
                          <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('action'); ?></th>
                            <?php endif; ?>
                      </tr>
                  </thead>
                  <tbody>


                       <?php 
        $no = 1;
        $total_loan = 0;
        $total_received = 0;

        foreach ($cash as $cashs): 
            if (empty($cashs->depost) || empty($cashs->customer_id)) {
                continue;
            }

            $loan_amount = (float) ($cashs->loan_int ?? 0);
            $received_amount = (float) ($cashs->depost ?? 0);
            $work_status = trim((string) ($cashs->work_status ?? ''));
            if ($work_status === 'Mwajiriwa') {
              $work_status = 'Mtumishi';
            }

            $loan_type_label = (string) ($cashs->loan_type ?? 'main');
            if ($work_status === 'Mjasiriamali') {
              $loan_type_label = 'Mkopo wa Mjasiriamali';
            } elseif ($loan_type_label === 'salary_advance') {
              $loan_type_label = 'Mkopo Mdogo';
            } elseif ($loan_type_label === 'main') {
              $loan_type_label = 'Mkopo Mkubwa';
            }

            $branch_name = $cashs->blanch_name ?? '';
            $pay_method = $cashs->account_name ?? '';
            $employee_name = $cashs->empl_username ?? '';
            $display_date = $cashs->depost_day ?? '';
            $delete_record_id = $cashs->pay_id ?? ($cashs->dep_id ?? 0);

            $total_loan += $loan_amount;
            $total_received += $received_amount;
        ?>

                      <tr class="border-b dark:border-gray-700">
                          <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $no++; ?></th>
                          <td class="px-4 py-3 dark:text-white"><?php echo $cashs->f_name . ' ' . $cashs->m_name . ' ' . $cashs->l_name; ?></td>
                          <td class="px-4 py-3 dark:text-white"><?php echo $work_status; ?></td>
                          <td class="px-4 py-3 dark:text-white"><?php echo $loan_type_label; ?></td>
                          <td class="px-4 py-3 dark:text-white"><?php echo $branch_name; ?></td>
                          <td class="px-4 py-3 dark:text-white"><?php echo number_format($loan_amount); ?></td>
                          <td class="px-4 py-3 dark:text-white"><?php echo number_format($received_amount); ?></td>
                          <td class="px-4 py-3 dark:text-white"><?php echo $pay_method; ?></td>
                          <td class="px-4 py-3 dark:text-white"><?php echo $employee_name; ?></td>
                          <td class="px-4 py-3 dark:text-white"><?php echo $display_date; ?></td>
                          <?php if ($show_action_column): ?>
                          <td class="px-4 py-3 dark:text-white">

<?php if (!empty($delete_record_id)) { ?>
<a href="<?php echo base_url("admin/delete_depost_data/{$delete_record_id}") ?>" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-hidden focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
  <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m-7 0h8m-8 0a1 1 0 01-1-1V5a1 1 0 011-1h6a1 1 0 011 1v1"/>
  </svg>
  <?php echo $this->lang->line('delete'); ?>
</a>
<?php } ?>



</td> 
              <?php endif; ?>
                       
                      </tr>
                      <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                    <tr class="bg-gray-100 dark:bg-gray-700 font-bold">
                        <td colspan="5" class="px-4 py-3 dark:text-white text-right"><?php echo $this->lang->line('total'); ?></td>
                        <td class="px-4 py-3 dark:text-white"><?php echo number_format($total_loan); ?></td>
                        <td class="px-4 py-3 dark:text-white"><?php echo number_format($total_received); ?></td>
                        <td colspan="<?php echo $show_action_column ? '4' : '3'; ?>"></td>
                    </tr>
                  </tfoot>
              </table>
            </div>
          </div>
          </div>
        </section>

 

        <div id="hs-basic-modal" class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-80 opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-basic-modal-label">
  <div class="sm:max-w-lg sm:w-full m-3 sm:mx-auto">
    <div class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">

      <!-- Modal Header -->
      <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200 dark:border-neutral-700">
        <h3 id="hs-basic-modal-label" class="font-bold text-gray-800 dark:text-white">
          Filter Transactions
        </h3>
        <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-basic-modal">
          <span class="sr-only">Close</span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 6 6 18"></path>
            <path d="m6 6 12 12"></path>
          </svg>
        </button>
      </div>

      <form id="today-transactions-filter-form" method="get" action="<?php echo base_url('admin/today_transactions'); ?>">
      <?php if ($selected_loan_status !== ''): ?>
      <input type="hidden" name="loan_status" value="<?php echo htmlspecialchars($selected_loan_status, ENT_QUOTES, 'UTF-8'); ?>">
      <?php endif; ?>
      <div class="p-4 overflow-y-auto space-y-4">

        <div>
          <label for="blanch" class="block text-sm font-medium text-gray-700 dark:text-white">Chagua Tawi</label>
          <select id="blanch" name="blanch_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white" data-live-search="true">
            <option value="all" <?php echo ($selected_blanch_id === '') ? 'selected' : ''; ?>>Tawi Zote</option>
            <?php foreach ($blanch as $blanchs): ?>
              <option value="<?php echo $blanchs->blanch_id; ?>" <?php echo ($selected_blanch_id === (string) $blanchs->blanch_id) ? 'selected' : ''; ?>><?php echo $blanchs->blanch_name; ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div>
          <div>
            <label for="loan_type" class="block text-sm font-medium text-gray-700 dark:text-white">Chagua Aina ya Mkopo</label>
            <select id="loan_type" name="loan_type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
              <option value="" <?php echo ($selected_loan_type === '') ? 'selected' : ''; ?>>Aina zote</option>
              <option value="main" <?php echo ($selected_loan_type === 'main') ? 'selected' : ''; ?>>Mkopo Mkubwa</option>
              <option value="salary_advance" <?php echo ($selected_loan_type === 'salary_advance') ? 'selected' : ''; ?>>Mkopo Mdogo</option>
              <option value="mjasiriamali" <?php echo ($selected_loan_type === 'mjasiriamali') ? 'selected' : ''; ?>>Mkopo wa Mjasiriamali</option>
            </select>
          </div>
        </div>

        <div>
          <label for="report_date" class="block text-sm font-medium text-gray-700 dark:text-white">Tarehe</label>
          <input type="date" id="report_date" name="report_date" value="<?php echo htmlspecialchars($report_date, ENT_QUOTES, 'UTF-8'); ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
        </div>
      </div>

      <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200 dark:border-neutral-700">
        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 hover:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700" data-hs-overlay="#hs-basic-modal">
          Close
        </button>
        <button id="apply-filter-btn" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-blue-600 text-white hover:bg-blue-700">
          Add
        </button>
      </div>
      </form>

    </div>
  </div>
</div>


  </div>
</div>
<!-- ========== END MAIN CONTENT BODY ========== -->

<?php
include_once APPPATH . "views/partials/footer.php";
?>




<script>
document.addEventListener('DOMContentLoaded', function () {
  const filterForm = document.getElementById('today-transactions-filter-form');
  const applyBtn = document.getElementById('apply-filter-btn');

  if (!filterForm || !applyBtn) {
    return;
  }

  applyBtn.addEventListener('click', function () {
    const params = new URLSearchParams(new FormData(filterForm));
    const target = filterForm.getAttribute('action') + '?' + params.toString();
    window.location.href = target;
  });
});
</script>

<script>
document.getElementById('simple-search').addEventListener('keyup', function() {
    const filter = this.value.toLowerCase();
    const table = document.getElementById('shareholder_table');
    const trs = table.getElementsByTagName('tr');

    // Start from 1 to skip the header row
    for (let i = 1; i < trs.length; i++) {
        const tr = trs[i];
        // Convert all text in the row to lowercase for case-insensitive search
        const text = tr.textContent.toLowerCase();
        if (text.indexOf(filter) > -1) {
            tr.style.display = '';
        } else {
            tr.style.display = 'none';
        }
    }
});
</script>


<script>
$(document).ready(function(){
$('#blanch').change(function(){
var blanch_id = $('#blanch').val();
//alert(blanch_id)
if(blanch_id != ''){

$.ajax({
url:"<?php echo base_url(); ?>admin/fetch_employee_blanch",
method:"POST",
data:{blanch_id:blanch_id},
success:function(data)
{
$('#empl').html(data);
//$('#district').html('<option value="">All</option>');
}
});
}
else
{
$('#empl').html('<option value=""><?php echo $this->lang->line('select_employee'); ?></option>');
//$('#district').html('<option value="">All</option>');
}
});

});
</script>





