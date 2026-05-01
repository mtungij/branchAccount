
<?php
include_once APPPATH . "views/partials/header.php";

$is_super_admin = ($this->session->userdata('role') === 'admin');
$can_loan_view = $is_super_admin || has_permission('Loans', 'can_view') || has_permission('Mikopo', 'can_view');
$can_loan_delete = $is_super_admin || has_permission('Loans', 'can_delete') || has_permission('Mikopo', 'can_delete');
?>


<div class="w-full lg:ps-64">
  <div class="= overflow-x-auto">


<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
    <div class="w-full">
        <!-- Start coding here -->
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only"><?php echo $this->lang->line('search'); ?></label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                              
                            </div>
                            <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" 
                            placeholder="<?php echo $this->lang->line('search_customer_here'); ?>"
        data-hs-datatable-search="#shareholder_table"
                            aria-label="<?php echo $this->lang->line('search'); ?>"
							>
                        </div>
                    </form>
                </div>
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
				<button type="button" class="flex items-center justify-center text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-basic-modal" data-hs-overlay="#hs-basic-modal">
    <svg class="h-4 w-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V4z" clip-rule="evenodd" />
    </svg>
    <?php echo $this->lang->line('filter_data'); ?>
</button>

<!-- Hidden form that carries the current filter values straight to the PDF endpoint -->
<form id="pdf-download-form" method="POST" action="<?php echo base_url('admin/download_loan_withdrawal_pdf'); ?>" style="display:none;">
    <?php $csrf = $this->security->get_csrf_token_name(); ?>
    <input type="hidden" name="<?php echo $csrf; ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
    <input type="hidden" id="pdf-blanch-id"   name="blanch_id"  value="<?php echo isset($filters['blanch_id']) ? htmlspecialchars($filters['blanch_id']) : ''; ?>">
    <input type="hidden" id="pdf-from"         name="from"       value="<?php echo isset($filters['from']) ? htmlspecialchars($filters['from']) : ''; ?>">
    <input type="hidden" id="pdf-to"           name="to"         value="<?php echo isset($filters['to'])   ? htmlspecialchars($filters['to'])   : ''; ?>">
    <input type="hidden" id="pdf-paid-today"   name="paid_today" value="<?php echo !empty($filters['paid_today']) ? '1' : ''; ?>">
    <input type="hidden" id="pdf-loan-status"  name="loan_status" value="<?php echo isset($filters['loan_status']) ? htmlspecialchars($filters['loan_status']) : ''; ?>">
</form>

<button type="button" onclick="document.getElementById('pdf-download-form').submit()" class="flex items-center justify-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none">
    <svg class="h-4 w-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" clip-rule="evenodd"/>
    </svg>
    <?php echo $this->lang->line('download_pdf'); ?>
</button>

                  
                </div>
            </div>
            <div class="overflow-x-auto">
                <table id="shareholder_table"  class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-cyan-500 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3 dark:text-white">S/No</th>
                            <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('customer_name'); ?></th>
                            <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('phone_number'); ?></th>
                            <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('branch_name'); ?></th>
                            <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('phone_number'); ?></th>
                             <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('principal'); ?></th>
                            <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('loan_amount'); ?></th>
                            <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('duration_type'); ?></th>
                            <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('collection'); ?></th>
                            <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('product_name'); ?></th>
                            <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('method'); ?></th>
                            <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('withdraw_date'); ?></th>
                            <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('loan_end_date'); ?></th>
                            <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('amount_paid'); ?></th>
                            <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('remain_debt'); ?></th>
                            <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('status') ?? 'Status'; ?></th>
                            <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('action'); ?></th> 
                        </tr>
                    </thead>
					<tbody>
    <?php
    $no = 1;
    $total_loan_aprove = 0;
    $total_loan_int = 0;
    $total_restoration = 0;
    $total_paid_all = 0;
    $total_remain_all = 0;
    ?>
    <?php foreach($disburse as $loan_aproveds): 
        $total_loan_aprove += $loan_aproveds->loan_aprove;
        $total_loan_int += $loan_aproveds->loan_int;
        $total_restoration += $loan_aproveds->restration;
        $row_paid   = $loan_aproveds->total_paid ?? 0;
        $row_remain = max(0, $loan_aproveds->loan_int - $row_paid);
        $total_paid_all   += $row_paid;
        $total_remain_all += $row_remain;
    ?>
        <tr class="border-b dark:border-gray-700">
            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $no++ ?></th>
            <td class="uppercase px-4 py-3 dark:text-white">
                <?= $loan_aproveds->f_name; ?> <?= substr($loan_aproveds->m_name, 0,1); ?> <?= $loan_aproveds->l_name; ?>
            </td>
            <td class="px-4 py-3 dark:text-white"><?= $loan_aproveds->phone_no; ?></td>
            <td class="px-4 py-3 dark:text-white"><?= $loan_aproveds->blanch_name; ?></td>
            <td class="px-4 py-3 dark:text-white"><?= $loan_aproveds->phone_no; ?></td>

            <!-- Principal -->
            <td class="px-4 py-3 dark:text-white"><?= number_format($loan_aproveds->loan_aprove); ?></td>
            
            <!-- Loan Amount -->
            <td class="px-4 py-3 dark:text-white"><?= number_format($loan_aproveds->loan_int); ?></td>

            <!-- Session -->
            <td class="px-4 py-3 dark:text-white">
                <?php 
                    if ($loan_aproveds->day == 1) {
                        echo $this->lang->line('daily');
                    } elseif ($loan_aproveds->day == 7) {
                        echo $this->lang->line('weekly');
                    } elseif (in_array($loan_aproveds->day, [28,29,30,31])) {
                        echo $this->lang->line('monthly');
                    }
                    echo " (" . $loan_aproveds->session . ")";
                ?>
            </td>

            <!-- Collection -->
            <td class="px-4 py-3 dark:text-white"><?= number_format($loan_aproveds->restration); ?></td>

            <td class="px-4 py-3 dark:text-white"><?= $loan_aproveds->loan_name; ?></td>
            <td class="px-4 py-3 dark:text-white"><?= $loan_aproveds->account_name; ?></td>
            <td class="px-4 py-3 dark:text-white"><?= substr($loan_aproveds->loan_stat_date, 0,10); ?></td>
            <td class="px-4 py-3 dark:text-white"><?= substr($loan_aproveds->loan_end_date, 0,10); ?></td>
            <!-- Amount Paid -->
            <td class="px-4 py-3 text-green-600 dark:text-green-400"><?= number_format($row_paid); ?></td>
            <!-- Remaining Debt -->
            <td class="px-4 py-3 <?= $row_remain > 0 ? 'text-red-600 dark:text-red-400' : 'text-gray-500 dark:text-gray-400'; ?>"><?= number_format($row_remain); ?></td>
            <!-- Status -->
            <td class="px-4 py-3">
                <?php
                    $status = $loan_aproveds->loan_status;
                    $badge = 'bg-gray-100 text-gray-800';
                    $label = ucfirst($status);
                    if ($status == 'open') { $badge = 'bg-blue-100 text-blue-800'; }
                    elseif ($status == 'aproved') { $badge = 'bg-yellow-100 text-yellow-800'; }
                    elseif ($status == 'disbarsed') { $badge = 'bg-indigo-100 text-indigo-800'; }
                    elseif ($status == 'withdrawal') { $badge = 'bg-green-100 text-green-800'; $label = 'Active'; }
                    elseif ($status == 'out') { $badge = 'bg-red-100 text-red-800'; $label = 'Expired'; }
                    elseif ($status == 'done') { $badge = 'bg-emerald-100 text-emerald-800'; $label = 'Full Paid'; }
                ?>
                <span class="px-2 py-1 rounded-full text-xs font-medium <?= $badge ?>"><?= $label ?></span>
            </td>
<td class="px-4 py-3 dark:text-white flex items-center gap-2">
  <?php if ($can_loan_view): ?>
    <a href="<?= base_url("admin/customer_loan_detail/{$loan_aproveds->customer_id}") ?>" 
       class="text-blue-600 hover:text-blue-900 flex items-center gap-1" title="<?php echo $this->lang->line('view_statement') ?? 'View Statement'; ?>">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                  d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
        </svg>
    </a>
  <?php endif; ?>
  <?php if ($can_loan_delete): ?>
    <a href="<?= base_url("admin/delete_loanwith/{$loan_aproveds->loan_id}") ?>" 
       class="text-red-600 hover:text-red-900 flex items-center gap-1" 
    onclick="return confirm('<?php echo $this->lang->line('are_you_sure'); ?>')">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 0a1 1 0 00-1 1v1h6V4a1 1 0 00-1-1m-4 0h4"/>
        </svg>
    </a>
  <?php endif; ?>
</td>

        </tr>
    <?php endforeach; ?>

    <!-- Totals Row -->
<tr class="bg-gray-100 dark:bg-gray-700 font-bold text-sm border-t-2 border-gray-400 dark:border-gray-500">
    <td colspan="5" class="px-4 py-3 dark:text-white text-right font-extrabold uppercase tracking-wide text-gray-700 dark:text-gray-200">
        <?php echo $this->lang->line('total'); ?>
    </td>
    <td class="px-4 py-3 text-green-700 dark:text-green-300 font-extrabold"><?= number_format($total_loan_aprove); ?></td>
    <td class="px-4 py-3 text-blue-700 dark:text-blue-300 font-extrabold"><?= number_format($total_loan_int); ?></td>
    <td></td>
    <td class="px-4 py-3 text-purple-700 dark:text-purple-300 font-extrabold"><?= number_format($total_restoration); ?></td>
    <td colspan="4"></td>
    <td class="px-4 py-3 text-green-700 dark:text-green-300 font-extrabold"><?= number_format($total_paid_all); ?></td>
    <td class="px-4 py-3 text-red-700 dark:text-red-300 font-extrabold"><?= number_format($total_remain_all); ?></td>
    <td></td>
    <td></td>
</tr>



</tbody>

                </table>

				<div id="hs-basic-modal" class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-80 opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-basic-modal-label">
  <div class="sm:max-w-lg sm:w-full m-3 sm:mx-auto">
    <div class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
      <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200 dark:border-neutral-700">
        <h3 id="hs-basic-modal-label" class="font-bold text-gray-800 dark:text-white">
                    <?php echo $this->lang->line('filter_data'); ?>
        </h3>
        <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-basic-modal">
          <span class="sr-only"><?php echo $this->lang->line('close'); ?></span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 6 6 18"></path>
            <path d="m6 6 12 12"></path>
          </svg>
        </button>
      </div>
	  <?php echo form_open("admin/loan_withdrawal"); ?>
  <div class="p-4 overflow-y-auto space-y-4">

    <!-- Branch -->
    <div>
      <label class="block text-sm font-medium text-gray-700 dark:text-white"><?php echo $this->lang->line('choose_branch'); ?></label>
      <select name="blanch_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        <option value=""><?php echo $this->lang->line('all_branches') ?? 'All Branches'; ?></option>
        <?php foreach ($blanch as $blanchs): ?>
          <option value="<?php echo $blanchs->blanch_id; ?>" <?php echo (isset($filters['blanch_id']) && $filters['blanch_id'] == $blanchs->blanch_id) ? 'selected' : ''; ?>><?php echo $blanchs->blanch_name; ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <!-- Loan Status -->
    <div>
      <label class="block text-sm font-medium text-gray-700 dark:text-white"><?php echo $this->lang->line('status') ?? 'Status'; ?></label>
      <select name="loan_status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        <option value=""><?php echo $this->lang->line('all') ?? 'All'; ?></option>
        <?php
          $statuses = [
            'open' => 'Open',
            'aproved' => 'Approved',
            'disbarsed' => 'Disbursed',
            'withdrawal' => 'Active',
            'out' => 'Expired',
            'done' => 'Full Paid',
          ];
          foreach ($statuses as $val => $lbl): ?>
          <option value="<?= $val ?>" <?php echo (isset($filters['loan_status']) && $filters['loan_status'] == $val) ? 'selected' : ''; ?>><?= $lbl ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <!-- Date Range -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-white"><?php echo $this->lang->line('from_date'); ?></label>
        <input type="date" name="from" value="<?php echo isset($filters['from']) && $filters['from'] ? htmlspecialchars($filters['from']) : ''; ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-white"><?php echo $this->lang->line('to_date'); ?></label>
        <input type="date" name="to" value="<?php echo isset($filters['to']) && $filters['to'] ? htmlspecialchars($filters['to']) : ''; ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
      </div>
    </div>

    <!-- Paid Today -->
    <div class="flex items-center gap-3">
      <input type="checkbox" id="paid_today" name="paid_today" value="1"
        <?php echo (!empty($filters['paid_today'])) ? 'checked' : ''; ?>
        class="w-4 h-4 text-blue-600 rounded border-gray-300 dark:border-gray-600">
      <label for="paid_today" class="text-sm font-medium text-gray-700 dark:text-white">
        <?php echo $this->lang->line('paid_today_label') ?? 'Paid Today'; ?>
      </label>
    </div>

  </div>

  <!-- Modal Footer Buttons -->
  <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200 dark:border-neutral-700">
    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 hover:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700" data-hs-overlay="#hs-basic-modal">
            <?php echo $this->lang->line('close'); ?>
    </button>
    <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-blue-600 text-white hover:bg-blue-700">
            <?php echo $this->lang->line('apply_filters'); ?>
    </button>
  </div>
  <?php echo form_close(); ?>


    </div>
  </div>
</div>

            </div>
          
        </div>
    </div>
    </section>

	</div>
  </div>


  <?php
  include_once APPPATH . "views/partials/footer.php";
  ?>

<script>
$(document).ready(function(){
$('#blanch').change(function(){
var blanch_id = $('#blanch').val();
//alert(blanch_id)
if(blanch_id != ''){

$.ajax({
url:"<?php echo base_url(); ?>admin/fetch_employee_blanch_deposit",
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
$('#empl').html('<option value="">Select Employee</option>');
//$('#district').html('<option value="">All</option>');
}
});

});
</script>


  <?php // Script for cmd+a fix for DataTables search input (if used) ?>
  <script>
$(document).ready(function() {
    $('#shareholder_table').DataTable({
        // optional: set to false if you don’t want it
        searching: true,
        paging: true,
        info: false
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
        const text = tr.textContent.toLowerCase();
        if (text.indexOf(filter) > -1) {
            tr.style.display = '';
        } else {
            tr.style.display = 'none';
        }
    }
});
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Include Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<style>
.select2-container--default .select2-selection--single {
    background-color: #1f2937;
    border: 1px solid #374151;
    border-radius: 0.5rem;
    padding: 0.75rem 2.5rem 0.75rem 1rem;
    height: auto;
    color: #06b6d4; 
    font-size: 0.875rem;
    position: relative;
}
.select2-selection__rendered,
.select2-selection__clear,
.select2-selection__arrow {
    color: #d1d5db;
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
    background-color: #1f2937;
    color: #d1d5db;
    border: 1px solid #374151;
    border-radius: 0.5rem;
    padding: 0.5rem;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #ffffff !important; /* Force white text */
}
.custom-select2-dropdown .select2-results__option--highlighted {
    background-color: #06b6d4 !important; /* Tailwind cyan-400 */
    color: #ffffff !important;
}

/* White text in the dropdown input if searchable */
.select2-search__field {
    color: #ffffff !important;
    background-color: #1f2937 !important; /* match dark bg */
    border: 1px solid #374151;
}
.custom-select2-dropdown .select2-results__option--highlighted {
    background-color: #06b6d4;
    color: #ffffff;
}
.custom-select2-container { margin: 0; }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        HSStaticMethods.autoInit(); // This is required to initialize all hs-select dropdowns
    });
</script>
<script>
window.addEventListener('load', () => {
  setTimeout(() => {
    const inputs = document.querySelectorAll('input[data-hs-datatable-search]');
    inputs.forEach((input) => {
      input.addEventListener('keydown', function (evt) {
        if ((evt.metaKey || evt.ctrlKey) && (evt.key === 'a' || evt.key === 'A')) {
          this.select();
        }
      });
    });
    // HSStaticMethods.autoInit(['select']); // If Preline selects need explicit init
  }, 500);
});
</script>

<script>
$(document).ready(function () {
    const selectConfig = {
        placeholder: "<?php echo $this->lang->line('select'); ?>",
        allowClear: true,
        width: '100%',
        dropdownCssClass: 'custom-select2-dropdown',
        containerCssClass: 'custom-select2-container'
    };

    $('#branchSelect').select2({...selectConfig, placeholder: "<?php echo $this->lang->line('select_branch'); ?>"});
    $('#employeeSelect').select2({...selectConfig, placeholder: "<?php echo $this->lang->line('select_employee'); ?>"});

    $('#branchSelect').on('change', function () {
        const branchId = $(this).val();

        $.post('fetch_employee_blanch', { blanch_id: branchId }, function (data) {
            const employeeSelect = $('#employeeSelect');
            employeeSelect.html(data).select2({...selectConfig, placeholder: "<?php echo $this->lang->line('select_employee'); ?>"});

            // If using Preline's hsSelect
            const customSelect = $('[data-hs-select]');
            if (customSelect.length) {
                customSelect.html(data);
                customSelect.hsSelect();
            }
        }).fail(function (xhr, status, error) {
            console.error('AJAX error:', status, error);
        });
    });
});

// Age Calculation
function getAge(dob) {
    const age = new Date().getFullYear() - new Date(dob).getFullYear();
    document.getElementById('age').value = isNaN(age) ? '' : age;
}
</script>







		