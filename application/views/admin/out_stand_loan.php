
<?php
include_once APPPATH . "views/partials/header.php";

$lang_line = function ($key, $fallback = '') {
    $line = $this->lang->line($key);
    return ($line !== false && $line !== '') ? $line : $fallback;
};

$selected_blanch_id = isset($selected_blanch_id) ? (string) $selected_blanch_id : '';
$selected_empl_id = isset($selected_empl_id) && $selected_empl_id !== '' ? (string) $selected_empl_id : 'all';
$selected_from_date = isset($selected_from_date) ? $selected_from_date : '';
$selected_to_date = isset($selected_to_date) ? $selected_to_date : '';
$selected_overdue_days = isset($selected_overdue_days) ? $selected_overdue_days : '';
$default_end_date_mode = !empty($default_end_date_mode);

$selected_overdue_label = $default_end_date_mode ? $lang_line('npt_yesterday', 'Yesterday') : $lang_line('today', 'Today');
if ($selected_overdue_days === '3-30') {
    $selected_overdue_label = $lang_line('outstand_past_due_3_30', '3-30 Days Past Due');
} elseif ($selected_overdue_days === '31-60') {
    $selected_overdue_label = $lang_line('outstand_past_due_31_60', '31-60 Days Past Due');
} elseif ($selected_overdue_days === '61-90') {
    $selected_overdue_label = $lang_line('outstand_past_due_61_90', '61-90 Days Past Due');
} elseif ($selected_overdue_days === '91-plus') {
    $selected_overdue_label = $lang_line('outstand_past_due_91_plus', '91+ Days Past Due');
} elseif (!empty($selected_overdue_days)) {
    $selected_overdue_label = sprintf($lang_line('outstand_overdue_gte_days', 'Overdue >= %s Days'), $selected_overdue_days);
}

$defaulter_filter_query = http_build_query([
    'blanch_id' => $selected_blanch_id,
    'empl_id' => $selected_empl_id,
    'from_date' => $selected_from_date,
    'to_date' => $selected_to_date,
    'overdue_days' => $selected_overdue_days,
]);

$branch_only_query = http_build_query([
    'blanch_id' => $selected_blanch_id,
]);
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
                        <label for="simple-search" class="sr-only"><?= $lang_line('search', 'Search'); ?></label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                              
                            </div>
                            <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" 
							placeholder="<?= htmlspecialchars($lang_line('search_customer_here', 'Search customer here'), ENT_QUOTES, 'UTF-8'); ?>"
        data-hs-datatable-search="#shareholder_table"
        aria-label="<?= htmlspecialchars($lang_line('search_customer_here', 'Search customer here'), ENT_QUOTES, 'UTF-8'); ?>"
							>
                        </div>
                    </form>
	
              
                </div>
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
				
				<!-- Download PDF Button -->
                <a href="<?php echo base_url('admin/yesterday_defaulters_pdf' . ($defaulter_filter_query ? '?' . $defaulter_filter_query : '')); ?>" target="_blank" rel="noopener noreferrer" class="flex items-center justify-center text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">
    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path fill-rule="evenodd" d="M5 2.75C5 1.784 5.784 1 6.75 1h6.5c.966 0 1.75.784 1.75 1.75v3.552c.377.046.752.097 1.126.153A2.212 2.212 0 0118 8.653v4.097A2.25 2.25 0 0115.75 15h-.241l.305 1.984A1.75 1.75 0 0114.084 19H5.915a1.75 1.75 0 01-1.73-2.016L4.492 15H4.25A2.25 2.25 0 012 12.75V8.653c0-1.082.775-2.034 1.874-2.198.374-.056.75-.107 1.127-.153L5 6.25v-3.5zm8.5 3.397a41.533 41.533 0 00-7 0V2.75a.25.25 0 01.25-.25h6.5a.25.25 0 01.25.25v3.397zM6.608 12.5a.25.25 0 00-.247.212l-.693 4.5a.25.25 0 00.247.288h8.17a.25.25 0 00.246-.288l-.692-4.5a.25.25 0 00-.247-.212H6.608z" clip-rule="evenodd" />
    </svg>
    <?= $lang_line('download_pdf', 'Download PDF'); ?>
</a>


    <a href="<?php echo base_url('admin/defaulters_3_30_days_pdf' . ($branch_only_query ? '?' . $branch_only_query : '')); ?>"
   target="_blank"
   class="flex items-center justify-center text-white bg-yellow-600 hover:bg-yellow-700 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 focus:outline-none dark:focus:ring-yellow-800">

   <svg class="h-4 w-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd"
              d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V4z"
              clip-rule="evenodd"/>
    </svg>

    <?= $lang_line('outstand_past_due_3_30', '3-30 Days Past Due'); ?>
</a>

	<button type="button" 
    onclick="window.open('<?= base_url('admin/defaulters_31_60_days_pdf' . ($branch_only_query ? '?' . $branch_only_query : '')); ?>', '_blank')" 
        class="flex items-center justify-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">

    <!-- PDF / Document Icon -->
    <svg class="h-4 w-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V4z" clip-rule="evenodd" />
    </svg>

    <?= $lang_line('outstand_past_due_31_60', '31-60 Days Past Due'); ?>
</button>

<button type="button" 
    onclick="window.open('<?= base_url('admin/defaulters_61_90_days_pdf' . ($branch_only_query ? '?' . $branch_only_query : '')); ?>', '_blank')" 
        class="flex items-center justify-center text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-4 py-2">
    <svg class="h-4 w-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V4z" clip-rule="evenodd" />
    </svg>
    <?= $lang_line('outstand_past_due_61_90', '61-90 Days Past Due'); ?>
</button>


<button type="button" 
    onclick="window.open('<?= base_url('admin/defaulters_91_plus_days_pdf' . ($branch_only_query ? '?' . $branch_only_query : '')); ?>', '_blank')" 
        class="flex items-center justify-center text-white bg-red-900 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-red-900 dark:hover:bg-red-800 focus:outline-none dark:focus:ring-red-800">

    <!-- PDF / Document Icon -->
    <svg class="h-4 w-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V4z" clip-rule="evenodd" />
    </svg>

    <?= $lang_line('outstand_past_due_91_plus', '91+ Days Past Due'); ?>
</button>


				
				<!-- Filter Button -->
				<button type="button" class="flex items-center justify-center text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-basic-modal" data-hs-overlay="#hs-basic-modal">
    <svg class="h-4 w-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V4z" clip-rule="evenodd" />
    </svg>
    <?= $lang_line('filter_data', 'Filter Data'); ?>
</button>

                  
                </div>
            </div>
            <div class="overflow-x-auto">
                <table id="shareholder_table"  class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-cyan-500 dark:text-gray-400">
                        <tr>
                         
                           
                         
                               <th scope="col" class="px-4 py-3 dark:text-white"><?= $lang_line('s_no', 'S/No'); ?></th>
                  						    <th scope="col" class="px-4 py-3 dark:text-white"><?= $lang_line('branch_name', 'Branch Name'); ?></th>
                                            <th scope="col" class="px-4 py-3 dark:text-white"><?= $lang_line('customer_name', 'Customer Name'); ?></th>
                                            <th scope="col" class="px-4 py-3 dark:text-white"><?= $lang_line('phone_number', 'Phone Number'); ?></th>
                                            <th scope="col" class="px-4 py-3 dark:text-white"><?= $lang_line('loan_amount', 'Loan Amount'); ?></th>
                                            <th scope="col" class="px-4 py-3 dark:text-white"><?= $lang_line('outstand_restoration', 'Restoration'); ?></th>
                                            <th scope="col" class="px-4 py-3 dark:text-white"><?= $lang_line('duration_type', 'Duration Type'); ?></th>
                                            <th scope="col" class="px-4 py-3 dark:text-white"><?= $lang_line('amount_paid', 'Amount Paid'); ?></th>
                                            <th scope="col" class="px-4 py-3 dark:text-white"><?= $lang_line('remain_amount', 'Remain Amount'); ?></th>
                                            <th scope="col" class="px-4 py-3 dark:text-white"><?= $lang_line('overdue_days', 'Overdue Days'); ?></th>
                                            <th scope="col" class="px-4 py-3 dark:text-white"><?= $lang_line('start_date', 'Start Date'); ?></th>
                                            <th scope="col" class="px-4 py-3 dark:text-white"><?= $lang_line('end_date', 'End Date'); ?></th>
						
							  
                        </tr>
                    </thead>
					<tbody>
    <?php 
    $no = 1; 

    ?>
         
									<?php foreach ($outstand as $outstands): ?>
        <tr class="border-b dark:border-gray-700">
            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $no++ ?></th>
			<td class="px-4 py-3 dark:text-white"><?= $outstands->blanch_name; ?></td>
            <td class="px-4 py-3 dark:text-white"><?= $outstands->f_name . ' ' . $outstands->m_name . ' ' . $outstands->l_name; ?></td>
       
            <td class="px-4 py-3 dark:text-white"><?= $outstands->phone_no; ?></td>
			            <td class="px-4 py-3 dark:text-white"><?= number_format($outstands->loan_int); ?></td>
						  <td class="px-4 py-3 dark:text-white"><?= number_format($outstands->restration); ?></td>
         <td class="px-4 py-3 dark:text-white">
    <?php 
        if ($outstands->day == 1) $duration = $lang_line('daily', 'Daily');
        elseif ($outstands->day == 7) $duration = $lang_line('weekly', 'Weekly');
        elseif (in_array($outstands->day, [28, 29, 30, 31])) $duration = $lang_line('monthly', 'Monthly');
        else $duration = "-"; // fallback

        echo $duration . ' (' . number_format($outstands->session) . ')';
    ?>
</td>


            <td class="px-4 py-3 dark:text-white"><?= number_format($outstands->total_deposit); ?></td>
            <td class="px-4 py-3 dark:text-white"><?= number_format($outstands->loan_int - $outstands->total_deposit) ; ?></td>
           <td class="px-4 py-3 dark:text-white">
    <?php
        if ($outstands->loan_int == $outstands->total_deposit) {
            echo 0; // Not default
        } else {
            echo $outstands->overdue_days;
        }
    ?>
</td>
			<td class="px-4 py-3 dark:text-white"><?= $outstands->loan_stat_date; ?></td>
            <td class="px-4 py-3 dark:text-white"><?= $outstands->loan_end_date; ?></td>
			
        </tr>
    <?php endforeach; ?>

    <!-- Totals Row -->
    <!-- <tr class="bg-gray-100 dark:bg-gray-700 font-bold">
        <td colspan="5" class="px-4 py-3 dark:text-white text-right">Total</td>
        <td class="px-4 py-3 dark:text-white"><?= number_format($total_loan); ?></td>
        <td class="px-4 py-3 dark:text-white"><?= number_format($total_received); ?></td>
        <td colspan="3"></td>
    </tr> -->
</tbody>

                </table>
				<div id="hs-basic-modal" class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 inset-s-0 z-80 opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-basic-modal-label">
                <div class="w-full max-w-3xl mx-auto px-2 sm:px-4 min-h-screen flex items-center justify-center py-3 sm:py-6">
                                <div class="w-full flex flex-col bg-white border sm:border border-gray-200 shadow-2xs rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70 max-h-[92vh] overflow-hidden">
      <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200 dark:border-neutral-700">
                                <h3 id="hs-basic-modal-label" class="font-bold text-gray-800 dark:text-white text-sm sm:text-base leading-snug pr-3">
                    <?= $lang_line('outstand_filter_defaulters_title', 'Filter Defaulters (Branch, Employee, Dates & Overdue Days)'); ?>
        </h3>
                <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="<?= htmlspecialchars($lang_line('close', 'Close'), ENT_QUOTES, 'UTF-8'); ?>" data-hs-overlay="#hs-basic-modal">
                    <span class="sr-only"><?= $lang_line('close', 'Close'); ?></span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 6 6 18"></path>
            <path d="m6 6 12 12"></path>
          </svg>
        </button>
      </div>
	 
	   <?php echo form_open("admin/get_outstand_loan"); ?>
  <div class="p-4 sm:p-5 overflow-y-auto flex-1 min-h-0 sm:max-h-[70vh]">

   <div class="grid grid-cols-1 gap-4">
    <div>
        <label for="branchSelect" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-200"><?= $lang_line('choose_branch', 'Choose Branch'); ?></label>
        <select id="branchSelect" name="blanch_id" class="form-control w-full bg-white text-gray-900 border-gray-300 dark:bg-neutral-700 dark:text-white dark:border-neutral-600">
            <option value=""><?= $lang_line('select_branch', 'Select Branch'); ?></option>
            <option value="all" <?php echo $selected_blanch_id === 'all' ? 'selected' : ''; ?>><?= $lang_line('all_branches', 'All Branches'); ?></option>
            <?php foreach ($blanch as $b): ?>
                <option value="<?= $b->blanch_id ?>" <?php echo $selected_blanch_id === (string) $b->blanch_id ? 'selected' : ''; ?>><?= $b->blanch_name ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="hidden">
        <label for="employeeSelect" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-200"><?= $lang_line('select_employee', 'Select Employee'); ?></label>
        <select id="employeeSelect" name="empl_id" class="form-control w-full bg-white text-gray-900 border-gray-300 dark:bg-neutral-700 dark:text-white dark:border-neutral-600">
                <option value="all" <?php echo $selected_empl_id === 'all' ? 'selected' : ''; ?>><?= $lang_line('outstand_all_employees', 'All Employees'); ?></option>
            <?php if (isset($employee) && is_array($employee)): ?>
              <?php foreach ($employee as $emp): ?>
                <option value="<?php echo $emp->empl_id; ?>" <?php echo $selected_empl_id === (string) $emp->empl_id ? 'selected' : ''; ?>><?php echo $emp->empl_name; ?></option>
              <?php endforeach; ?>
            <?php endif; ?>
        </select>
    </div>

    <div>
        <label for="from_date" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-200"><?= $lang_line('from_date', 'From Date'); ?></label>
        <input type="date" id="from_date" name="from_date" class="form-control w-full bg-white text-gray-900 border-gray-300 dark:bg-neutral-700 dark:text-white dark:border-neutral-600" value="<?php echo htmlspecialchars($selected_from_date, ENT_QUOTES, 'UTF-8'); ?>">
    </div>

    <div>
        <label for="to_date" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-200"><?= $lang_line('to_date', 'To Date'); ?></label>
        <input type="date" id="to_date" name="to_date" class="form-control w-full bg-white text-gray-900 border-gray-300 dark:bg-neutral-700 dark:text-white dark:border-neutral-600" value="<?php echo htmlspecialchars($selected_to_date, ENT_QUOTES, 'UTF-8'); ?>">
    </div>

    <div>
        <label for="overdue_days" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-200"><?= $lang_line('outstand_past_due_range', 'Past Due Range'); ?></label>
        <select id="overdue_days" name="overdue_days" class="form-control w-full bg-white text-gray-900 border-gray-300 dark:bg-neutral-700 dark:text-white dark:border-neutral-600">
            <option value="" <?php echo $selected_overdue_days === '' ? 'selected' : ''; ?>><?= $lang_line('outstand_all_past_due', 'All Past Due'); ?></option>
            <option value="3-30" <?php echo $selected_overdue_days === '3-30' ? 'selected' : ''; ?>><?= $lang_line('outstand_past_due_3_30', '3-30 Days Past Due'); ?></option>
            <option value="31-60" <?php echo $selected_overdue_days === '31-60' ? 'selected' : ''; ?>><?= $lang_line('outstand_past_due_31_60', '31-60 Days Past Due'); ?></option>
            <option value="61-90" <?php echo $selected_overdue_days === '61-90' ? 'selected' : ''; ?>><?= $lang_line('outstand_past_due_61_90', '61-90 Days Past Due'); ?></option>
            <option value="91-plus" <?php echo $selected_overdue_days === '91-plus' ? 'selected' : ''; ?>><?= $lang_line('outstand_past_due_91_plus', '91+ Days Past Due'); ?></option>
        </select>
     
    </div>
</div>



  </div>

  <!-- Modal Footer Buttons -->
        <div class="sticky bottom-0 bg-white dark:bg-neutral-800 flex flex-col-reverse sm:flex-row justify-end items-stretch sm:items-center gap-2 py-3 px-4 border-t border-gray-200 dark:border-neutral-700">
        <button type="button" class="w-full sm:w-auto py-2 px-3 inline-flex items-center justify-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 hover:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700" data-hs-overlay="#hs-basic-modal">
            <?= $lang_line('close', 'Close'); ?>
    </button>
        <button type="submit" class="w-full sm:w-auto py-2 px-3 inline-flex items-center justify-center gap-x-2 text-sm font-medium rounded-lg bg-blue-600 text-white hover:bg-blue-700">
            <?= $lang_line('apply_filters', 'Apply Filters'); ?>
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
    background-color: #ffffff;
    border: 1px solid #d1d5db;
    border-radius: 0.5rem;
    padding: 0.75rem 2.5rem 0.75rem 1rem;
    height: auto;
    color: #111827;
    font-size: 0.875rem;
    position: relative;
}
.select2-selection__rendered,
.select2-selection__clear,
.select2-selection__arrow {
    color: #4b5563;
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
    color: #111827;
    border: 1px solid #d1d5db;
    border-radius: 0.5rem;
    padding: 0.5rem;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #111827 !important;
}
.custom-select2-dropdown .select2-results__option--highlighted {
    background-color: #06b6d4 !important; /* Tailwind cyan-400 */
    color: #ffffff !important;
}

.dark .select2-container--default .select2-selection--single {
    background-color: #1f2937;
    border: 1px solid #374151;
    color: #ffffff;
}
.dark .select2-selection__rendered,
.dark .select2-selection__clear,
.dark .select2-selection__arrow {
    color: #d1d5db;
}
.dark .custom-select2-dropdown {
    background-color: #1f2937;
    color: #d1d5db;
    border: 1px solid #374151;
}
.dark .select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #ffffff !important;
}

/* White text in the dropdown input if searchable */
.select2-search__field {
    color: #111827 !important;
    background-color: #ffffff !important;
    border: 1px solid #d1d5db;
}
.custom-select2-dropdown .select2-results__option--highlighted {
    background-color: #06b6d4;
    color: #ffffff;
}
.dark .select2-search__field {
    color: #ffffff !important;
    background-color: #1f2937 !important;
    border: 1px solid #374151;
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
    const selectedEmployeeId = '<?= addslashes($selected_empl_id); ?>';
    const selectConfig = {
        placeholder: "<?= addslashes($lang_line('outstand_all_employees', 'All Employees')); ?>",
        allowClear: true,
        width: '100%',
        dropdownCssClass: 'custom-select2-dropdown',
        containerCssClass: 'custom-select2-container'
    };

    $('#branchSelect').select2({...selectConfig, placeholder: "<?= addslashes($lang_line('select_branch', 'Select Branch')); ?>"});
    $('#employeeSelect').select2({...selectConfig, placeholder: "<?= addslashes($lang_line('select_employee', 'Select Employee')); ?>"});

    $('#branchSelect').on('change', function () {
        const branchId = $(this).val();

        $.post('<?= base_url("admin/fetch_employee_blanch_deposit") ?>', { blanch_id: branchId }, function (data) {
            const employeeSelect = $('#employeeSelect');
            employeeSelect.html(data);

            if (employeeSelect.find('option[value="all"]').length === 0) {
                employeeSelect.prepend('<option value="all"><?= addslashes($lang_line('outstand_all_employees', 'All Employees')); ?></option>');
            }

            const nextValue = selectedEmployeeId && selectedEmployeeId !== '' ? selectedEmployeeId : 'all';
            employeeSelect.val(nextValue);
            employeeSelect.select2({...selectConfig, placeholder: "<?= addslashes($lang_line('outstand_all_employees', 'All Employees')); ?>"});

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

// Download PDF with current filters
function downloadDefaultersPDF() {
    const blanch_id = $('#branchSelect').val() || '';
    const empl_id = $('#employeeSelect').val() || '';
    const from_date = $('#from_date').val() || '';
    const to_date = $('#to_date').val() || '';
    const overdue_days = $('#overdue_days').val() || '';
    
    // Build URL with parameters
    let url = '<?= base_url("admin/download_defaulters_pdf") ?>';
    const params = [];
    if (blanch_id) params.push('blanch_id=' + blanch_id);
    if (empl_id) params.push('empl_id=' + empl_id);
    if (from_date) params.push('from_date=' + from_date);
    if (to_date) params.push('to_date=' + to_date);
    if (overdue_days) params.push('overdue_days=' + overdue_days);
    
    if (params.length > 0) {
        url += '?' + params.join('&');
    }
    
    // Open in new window
    window.open(url, '_blank');
}
</script>








<!-- 
<div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= $lang_line('filter_employee', 'Filter Employee'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("admin/filter_default_employe"); ?>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                            <label class="form-control-label">*<?= $lang_line('select_employee', 'Select Employee'); ?>:</label>
                            <select class="form-control kt-selectpicker" name="empl_id" required data-live-search="true">
                                   <option value=""><?= $lang_line('select_branch', 'Select Branch'); ?></option>
                                    <?php foreach ($employee as $employees): ?>
                                <option value="<?php echo $employees->empl_id; ?>"><?php echo $employees->empl_name; ?> </option>
                                    <?php endforeach; ?>
                                    <option value="all"><?= $lang_line('all', 'All'); ?></option>
                                </select>
                               
                        </div>
                       <input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">
                    </div>  
                 </div>
            <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><?= $lang_line('filter_data', 'Filter Data'); ?></button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

</div>


<div class="modal fade" id="kt_modal_5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= $lang_line('outstand_filter_by_branch', 'Filter By Branch'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("admin/filter_default_blanch"); ?>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                            <label class="form-control-label">*<?= $lang_line('select_branch', 'Select Branch'); ?>:</label>
                            <select class="form-control kt-selectpicker" name="blanch_id" required data-live-search="true">
                                   <option value=""><?= $lang_line('select_branch', 'Select Branch'); ?></option>
                                    <?php foreach ($blanch as $blanchs): ?>
                                <option value="<?php echo $blanchs->blanch_id; ?>"><?php echo $blanchs->blanch_name; ?> </option>
                                    <?php endforeach; ?>
                                </select>
                               
                        </div>
                      
                      
                    </div>  
                 </div>
            <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><?= $lang_line('filter_data', 'Filter Data'); ?></button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

</div> -->




