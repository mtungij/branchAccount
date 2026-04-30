 
<?php
include_once APPPATH . "views/partials/header.php";

$filter_from = !empty($from) ? $from : date('Y-m-d');
$filter_to = !empty($to) ? $to : $filter_from;
$selected_blanch_id = isset($selected_blanch_id) ? (string) $selected_blanch_id : 'all';
$selected_branch_name = !empty($selected_branch_name) ? $selected_branch_name : 'All Branches';
$total_filtered_income = !empty($total_receved->total_receved) ? (float) $total_receved->total_receved : 0;

// --- DUMMY DATA - REMOVE AND LOAD FROM YOUR CONTROLLER ---
// Controller should pass $share, an array of shareholder objects.
// Each object should have 'share_id', 'share_name', 'share_mobile', 'share_email', 'share_sex', 'share_dob'.
// if (!isset($share)) {
//     $share = [
//         (object)['share_id' => 1, 'share_name' => 'Alice Wonderland', 'share_mobile' => '0712345001', 'share_email' => 'alice@example.com', 'share_sex' => 'female', 'share_dob' => '1985-06-15'],
//         (object)['share_id' => 2, 'share_name' => 'Bob The Builder', 'share_mobile' => '0712345002', 'share_email' => 'bob@example.com', 'share_sex' => 'male', 'share_dob' => '1978-11-02'],
//     ];
// }
// --- END DUMMY DATA ---header.php
?>

<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-6">

        <!-- Page Title / Subheader -->
        <div class="mb-6">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-200">
               Record New Income
            </h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                Register only New Income.
            </p>
        </div>
        <!-- End Page Title / Subheader -->

        <?php // Flash Messages ?>
        <?php if ($success = $this->session->flashdata('massage')): ?>
    <!-- Success Alert -->
    <div class="bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert">
        <div class="flex">
            <div class="flex-shrink-0">
                <span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-teal-100 bg-teal-200 text-teal-800 dark:border-teal-900 dark:bg-teal-800 dark:text-teal-500">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="m9 12 2 2 4-4"/></svg>
                </span>
            </div>
            <div class="ms-3">
                <h3 class="text-gray-800 font-semibold dark:text-white">Success</h3>
                <p class="mt-2 text-sm text-gray-700 dark:text-gray-400"><?php echo $success; ?></p>
            </div>
            <div class="ps-3 ms-auto">
                <div class="-mx-1.5 -my-1.5">
                    <button type="button" class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none" data-hs-remove-element="[role=alert]">
                        <span class="sr-only">Dismiss</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if ($error = $this->session->flashdata('error')): ?>
    <!-- Error Alert -->
    <div class="bg-red-100 border border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500" role="alert">
        <div class="flex">
            <div class="flex-shrink-0">
                <span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-red-100 bg-red-200 text-red-800 dark:border-red-900 dark:bg-red-800 dark:text-red-500">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12" y2="16"/></svg>
                </span>
            </div>
            <div class="ms-3">
                <h3 class="text-gray-800 font-semibold dark:text-white">Error</h3>
                <p class="mt-2 text-sm text-gray-700 dark:text-gray-400"><?php echo $error; ?></p>
            </div>
            <div class="ps-3 ms-auto">
                <div class="-mx-1.5 -my-1.5">
                    <button type="button" class="inline-flex bg-red-50 rounded-lg p-1.5 text-red-500 hover:bg-red-100 focus:outline-none" data-hs-remove-element="[role=alert]">
                        <span class="sr-only">Dismiss</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>


        <!-- Card: Register Share Holder Form -->
     <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-sm rounded-2xl p-6 md:p-8">
  <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6">
    Record New Income
  </h3>

  <?php echo form_open("admin/create_income_detail", ['novalidate' => true]); ?>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    
    <!-- Branch -->
    <div>
      <label for="branchSelect" class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">
        * Branch:
      </label>
      <select id="branchSelect" name="blanch_id"
        class="select2 block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-300 text-sm focus:ring-cyan-500 focus:border-cyan-500">
        <option value="">Select Branch</option>
        <?php foreach ($blanch as $blanchs): ?>
          <option value="<?php echo $blanchs->blanch_id; ?>"><?php echo $blanchs->blanch_name; ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <!-- Customer -->
    <div>
      <label for="customer" class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">
        * Customer Name:
      </label>
      <select name="customer_id" id="customer"
        class="select2 block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-300 text-sm focus:ring-cyan-500 focus:border-cyan-500">
        <option value="">Select Customer</option>
      </select>
    </div>

    <!-- Active Loan -->
    <div>
      <label for="loan" class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">
        * Active Loan:
      </label>
      <select name="loan_id" id="loan"
        class="select2 block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-300 text-sm focus:ring-cyan-500 focus:border-cyan-500">
        <option value="">Select Loan</option>
      </select>
    </div>

    <!-- Income Type -->
    <div>
      <label for="inc_id" class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">
        * Income Type:
      </label>
      <select name="inc_id"
        class="select2 block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-300 text-sm focus:ring-cyan-500 focus:border-cyan-500">
        <?php foreach ($income as $incomes): ?>
          <option value="<?php echo $incomes->inc_id; ?>"><?php echo $incomes->inc_name; ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <!-- Amount -->
    <div>
      <label for="receve_amount" class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">
        * Income Amount:
      </label>
      <input type="text" name="receve_amount" id="receve_amount" autocomplete="off" placeholder="Income Amount"
        class="block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-200 text-sm focus:ring-cyan-500 focus:border-cyan-500"
        value="<?php echo set_value('receve_amount'); ?>">
      <?php echo form_error("receve_amount", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
    </div>

  </div>

  <?php $day = date("Y-m-d"); ?>
  <input type="hidden" name="receve_day" value="<?php echo $day; ?>">
  <input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">

  <!-- Submit -->
<div class="mt-8 border-t border-gray-200 dark:border-gray-700 pt-6 flex justify-center">
  <button type="submit"
    class="inline-flex items-center justify-center gap-2 
           px-8 py-3 text-sm font-semibold rounded-xl 
           bg-gradient-to-r from-cyan-600 to-cyan-700 
           hover:from-cyan-700 hover:to-cyan-800 
           text-white shadow-md hover:shadow-lg 
           focus:outline-none focus:ring-4 focus:ring-cyan-400/50 
           dark:focus:ring-cyan-500/40 transition-all duration-200">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
      <path stroke-linecap="round" stroke-linejoin="round"
            d="M5 13l4 4L19 7" />
    </svg>
    Submit
  </button>
</div>


  </div>


  <section class="bg-gray-50 w-full dark:bg-gray-900 p-3 sm:p-5">
    <div class="w-full">
        <!-- Start coding here -->
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                              
                            </div>
                            <input type="text" id="simple-search" class="bg-gray-800 border border-gray-600 text-white text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500 placeholder-gray-400" 
							placeholder="tafuta mteja hapa"
        data-hs-datatable-search="#shareholder_table"
        aria-label="Search share holders"
							>
                        </div>
                    </form>
                </div>
				   <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
        <a href="<?php echo base_url('admin/print_todayIncome?' . http_build_query(['from' => $filter_from, 'to' => $filter_to, 'blanch_id' => $selected_blanch_id])); ?>" class="flex items-center justify-center text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" target="_blank">
    <svg class="h-4 w-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V4z" clip-rule="evenodd" />
    </svg>
    Print Report
		</a>

                  
                </div>
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
				<button type="button" class="flex items-center justify-center text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-basic-modal" data-hs-overlay="#hs-basic-modal">
    <svg class="h-4 w-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V4z" clip-rule="evenodd" />
    </svg>
    Filter Data
</button>

                  
                </div>
        <div class="w-full text-xs text-gray-600 dark:text-gray-300">
          <span class="font-semibold">Branch:</span> <?php echo htmlspecialchars($selected_branch_name, ENT_QUOTES, 'UTF-8'); ?>
          &nbsp;|&nbsp;
          <span class="font-semibold">From:</span> <?php echo htmlspecialchars($filter_from, ENT_QUOTES, 'UTF-8'); ?>
          &nbsp;|&nbsp;
          <span class="font-semibold">To:</span> <?php echo htmlspecialchars($filter_to, ENT_QUOTES, 'UTF-8'); ?>
          &nbsp;|&nbsp;
          <span class="font-semibold">Total Income:</span> <?php echo number_format($total_filtered_income); ?>
        </div>
            </div>
            <div class="overflow-x-auto">
                <table id="shareholder_table"  class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-cyan-500 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3 dark:text-white">S/No</th>
							<th scope="col" class="px-4 py-3 dark:text-white">Customer Name</th>
                            <th scope="col" class="px-4 py-3 dark:text-white">Branch Name</th>
                            <th scope="col" class="px-4 py-3 dark:text-white">Loan Amount</th>
                            <th scope="col" class="px-4 py-3 dark:text-white">Income Type</th>
                            <th scope="col" class="px-4 py-3 dark:text-white">Income Amount</th>
                            <th scope="col" class="px-4 py-3 dark:text-white">Receiver</th>
							<th scope="col" class="px-4 py-3 dark:text-white">Date</th>
							<th scope="col" class="px-4 py-3 dark:text-white">Action</th>
                           
                         
						
							  
                        </tr>
                    </thead>
					<tbody>
  
              <?php $no = 1; ?>
                                    <?php foreach ($detail_income as $detail_incomes): ?>
        <tr class="border-b dark:border-gray-700">
            <td scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $no++ ?></td>
            <td class="px-4 py-3 dark:text-white"><?= $detail_incomes->f_name . ' ' . $detail_incomes->m_name . ' ' . $detail_incomes->l_name; ?></td>
            <td class="px-4 py-3 dark:text-white"><?= $detail_incomes->blanch_name; ?></td>
          <td><?php echo number_format($detail_incomes->loan_aprove); ?></td>
			  <td class="px-4 py-3 dark:text-white"><?php echo $detail_incomes->inc_name; ?></td>
          
			 <td><?php echo number_format($detail_incomes->receve_amount); ?></td>
			 <td class="px-4 py-3 dark:text-white"><?php if ($detail_incomes->empl_name == FALSE) {
                                     ?>
                                     -
                                 <?php }else{ ?>
                                        <?php echo $detail_incomes->empl_name; ?>
                                        <?php } ?>
                                    </td>
                                   
                                
 <td><?php echo $detail_incomes->receve_day; ?></td>
								 <td class="px-4 py-3 dark:text-white">
								   <a href="<?php echo base_url("admin/delete_receved/{$detail_incomes->receved_id}") ?>" class="py-2  btn-primary-sm bg-red-600 hover:bg-red-700 text-white">Delete</button>
                                </td>  
        
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
				<div id="hs-basic-modal" class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-80 opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-basic-modal-label">
  <div class="sm:max-w-lg sm:w-full m-3 sm:mx-auto">
    <div class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
      <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200 dark:border-neutral-700">
        <h3 id="hs-basic-modal-label" class="font-bold text-gray-800 dark:text-white">
          Filter Employee
        </h3>
        <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-basic-modal">
          <span class="sr-only">Close</span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 6 6 18"></path>
            <path d="m6 6 12 12"></path>
          </svg>
        </button>
      </div>
     <?php echo form_open("admin/income_dashboard", ['method' => 'get']); ?>
  <div class="p-4 overflow-y-auto space-y-4">

    <!-- Gender Dropdown -->
    <div>
      <label for="blanch" class="block text-sm font-medium text-gray-700 dark:text-white">Chagua Tawi</label>
      <select id="filterBranchSelect" name="blanch_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white" data-live-search="true">
    <option value="all" <?php echo $selected_blanch_id === 'all' ? 'selected' : ''; ?>>All Branches</option>
      <?php foreach ($blanch as $blanchs): ?>
    <option value="<?php echo $blanchs->blanch_id; ?>" <?php echo $selected_blanch_id === (string) $blanchs->blanch_id ? 'selected' : ''; ?>><?php echo $blanchs->blanch_name; ?></option>
      <?php endforeach; ?>
      </select>
    </div>

    <!-- 2-Column Grid: Phone, Email, Company Name, Address -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <!-- Phone -->
      <!-- <div>
        <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-white">Chagua Afisa</label>
		<select  id="employeeSelect" name="empl_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
	  <option value="">Chagua Afisa</option>
	  <option value="all">ALL</option>
      </select>
      </div> -->

      <!-- Email -->
      <!-- <div>
        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-white">Loan status:</label>
        
		<select  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white" name="dep_status" id="empl" required>
                                 <option value="">Select loan status</option>
                                 <option value="withdrawal">Active</option>
                                 <option value="out">Deni Sugu</option>
                                </select>
      </div> -->

      <!-- Company Name -->
    <?php $date = $filter_from; ?>  

      <div>
        <label for="company" class="block text-sm font-medium text-gray-700 dark:text-white">Kwanzia Tarehe</label>
    <input type="date" value="<?php echo htmlspecialchars($filter_from, ENT_QUOTES, 'UTF-8'); ?>" name="from"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
      </div>

      <!-- Address -->
      <div>
        <label for="address" class="block text-sm font-medium text-gray-700 dark:text-white">Mpaka Tarehe</label>
    <input type="date" name="to" value="<?php echo htmlspecialchars($filter_to, ENT_QUOTES, 'UTF-8'); ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
      </div>
    </div>

  </div>

  <!-- Modal Footer Buttons -->
  <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200 dark:border-neutral-700">
    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 hover:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700" data-hs-overlay="#hs-basic-modal">
      Close
    </button>
    <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-blue-600 text-white hover:bg-blue-700">
      Apply Filters
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

  <?php echo form_close(); ?>
</div>

</div>
<!-- ========== END MAIN CONTENT BODY ========== -->

<?php
include_once APPPATH . "views/partials/footer.php";
?>

<?php // Script for cmd+a fix for DataTables search input (if used) ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Include Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
  var table = $('#shareholder_table').DataTable();
  $('#simple-search').on('keyup', function() {
    table.search(this.value).draw();
  });
});
</script>

<style>
.select2-container--default .select2-selection--single {
  background-color: #ffffff !important;
  border: 1px solid #d1d5db !important;
  border-radius: 0.5rem !important;
  padding: 0.75rem 2.5rem 0.75rem 1rem !important;
  height: auto !important;
  color: #111827 !important;
  font-size: 0.875rem !important;
  position: relative !important;
}

.select2-selection__rendered {
  color: #111827 !important;
}

.select2-selection__clear,
.select2-selection__arrow {
  color: #374151 !important;
}

.select2-selection__arrow {
  right: 1rem !important;
  top: 0 !important;
  width: 1.5rem !important;
  position: absolute !important;
}

.select2-selection__clear {
  right: 2.5rem !important;
  top: 50% !important;
  transform: translateY(-50%) !important;
  position: absolute !important;
}

.select2-dropdown {
  background-color: #ffffff !important;
  border: 1px solid #d1d5db !important;
}

.select2-dropdown .select2-search__field {
  color: #111827 !important;
  background-color: #ffffff !important;
  border: 1px solid #d1d5db !important;
}

.select2-results__option--highlighted[aria-selected] {
  background-color: #06b6d4 !important;
  color: #ffffff !important;
}

/* Dark mode overrides */
.dark .select2-container--default .select2-selection--single {
  background-color: #1f2937 !important;
  border: 1px solid #374151 !important;
  color: #d1d5db !important;
}

.dark .select2-selection__rendered {
  color: #ffffff !important;
}

.dark .select2-selection__clear,
.dark .select2-selection__arrow {
  color: #d1d5db !important;
}

.dark .select2-dropdown {
  background-color: #1f2937 !important;
  border: 1px solid #374151 !important;
}

.dark .select2-dropdown .select2-search__field {
  color: #ffffff !important;
  background-color: #1f2937 !important;
  border: 1px solid #374151 !important;
}

.dark .select2-results__option--highlighted[aria-selected] {
  background-color: #06b6d4 !important;
  color: #ffffff !important;
}
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
$(document).ready(function(){
$('#branchSelect').change(function(){
  var blanch_id = $('#branchSelect').val();

//alert(blanch_id)
if(blanch_id != ''){

$.ajax({
url:"<?php echo base_url(); ?>admin/fetch_ward_data",
method:"POST",
data:{blanch_id:blanch_id},
success:function(data)
{
$('#customer').html(data);
//$('#district').html('<option value="">All</option>');
}
});
}
else
{
$('#customer').html('<option value="">Select customer</option>');
//$('#district').html('<option value="">All</option>');
}
});



$('#customer').change(function(){
var customer_id = $('#customer').val();
 //alert(customer_id)
if(customer_id != '')
{
$.ajax({
url:"<?php echo base_url(); ?>admin/fetch_data_vipimioData",
method:"POST",
data:{customer_id:customer_id},
success:function(data)
{
$('#loan').html(data);
//$('#malipo_name').html('<option value="">select center</option>');
}
});
}
else
{
$('#loan').html('<option value="">Select Active loan</option>');
//$('#malipo_name').html('<option value="">chagua vipimio</option>');
}
});

// $('#social').change(function(){
//  var district_id = $('#social').val();
//  if(district_id != '')
//  {
//   $.ajax({
//    url:"<?php echo base_url(); ?>user/fetch_data_malipo",
//    method:"POST",
//    data:{district_id:district_id},
//    success:function(data)
//    {
//     $('#malipo_name').html(data);
//     //$('#malipo').html('<option value="">chagua malipo</option>');
//    }
//   });
//  }
//  else
//  {
//   //$('#vipimio').html('<option value="">chagua vipimio</option>');
//   $('#malipo_name').html('<option value="">chagua vipimio</option>');
//  }
// });


});
</script>

</script>

<script>
    $('.select2').select2();
</script>






