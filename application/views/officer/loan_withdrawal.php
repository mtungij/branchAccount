
<?php
include_once APPPATH . "views/partials/officerheader.php";

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
    <div class="p-4 sm:p-6 space-y-6">

      
        <!-- End Page Title / Subheader -->

    
        <section class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5">
  <div class="w-full ">
      <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
      <?php
        $logo_url = '';
        if (!empty($company_data->comp_logo)) {
          $logo_path = FCPATH . 'assets/images/company_logo/' . $company_data->comp_logo;
          if (file_exists($logo_path)) {
            $logo_url = base_url('assets/images/company_logo/' . $company_data->comp_logo);
          }
        }
      ?>
      <?php if (!empty($logo_url)): ?>
      <div class="px-4 pt-4 pb-1">
        <img src="<?php echo $logo_url; ?>" alt="Company Logo" class="h-14 w-auto object-contain" />
      </div>
      <?php endif; ?>
      <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-start lg:space-y-0 lg:space-x-4">
  <div class="flex items-center flex-1 space-x-4">
      <!-- <h5>
          <span class="text-gray-500">All Products:</span>
          <span class="dark:text-white">123456</span>
      </h5> -->
      <!-- <h5>
          <span class="text-gray-500">Total sales:</span>
          <span class="dark:text-white">$88.4k</span>
      </h5> -->
  </div>
  
</div>


          
  <!-- Search Input (Left) -->
  <div class="overflow-x-auto">
  <div class="flex flex-wrap items-center gap-2 mb-4">
    <!-- Search Input -->
    <div class="relative w-full sm:w-auto">
      <label for="shareholder-table-search" class="sr-only">Search</label>
      <input
        type="search"
        name="shareholder-table-search"
        id="shareholder-table-search"
        class="py-2 px-3 ps-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
        placeholder="Search share holders..."
        data-hs-datatable-search="#shareholder_table"
        aria-label="Search share holders"
      />
      <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
        <svg class="w-4 h-4 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
          viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <circle cx="11" cy="11" r="8"></circle>
          <path d="M21 21l-4.3-4.3"></path>
        </svg>
      </div>
    </div>

    <!-- Date Range Filter Form -->
    <form method="get" action="<?php echo base_url('oficer/loan_withdrawal'); ?>" class="flex flex-wrap items-center gap-2">
      <div class="flex items-center gap-1">
        <label for="filter_month" class="text-xs text-gray-600 dark:text-gray-300 whitespace-nowrap">Month:</label>
        <input type="month" id="filter_month" name="filter_month"
          value="<?php echo htmlspecialchars($filter_month ?? ''); ?>"
          class="py-1.5 px-2 block border border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
      </div>
      <div class="flex items-center gap-1">
        <label for="from_date" class="text-xs text-gray-600 dark:text-gray-300 whitespace-nowrap">From:</label>
        <input type="date" id="from_date" name="from_date"
          value="<?php echo htmlspecialchars($from_date ?? ''); ?>"
          class="py-1.5 px-2 block border border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
      </div>
      <div class="flex items-center gap-1">
        <label for="to_date" class="text-xs text-gray-600 dark:text-gray-300 whitespace-nowrap">To:</label>
        <input type="date" id="to_date" name="to_date"
          value="<?php echo htmlspecialchars($to_date ?? ''); ?>"
          class="py-1.5 px-2 block border border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
      </div>
      <button type="submit" class="py-1.5 px-3 inline-flex items-center gap-x-1 text-sm font-medium rounded-lg border border-transparent bg-cyan-600 text-white hover:bg-cyan-700 focus:outline-none focus:bg-cyan-700">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L15 13.414V19a1 1 0 01-1.447.894l-4-2A1 1 0 019 17v-3.586L3.293 6.707A1 1 0 013 6V4z"/></svg>
        Filter
      </button>
      <a href="<?php echo base_url('oficer/loan_withdrawal?filter_month=' . date('Y-m')); ?>" class="py-1.5 px-3 inline-flex items-center gap-x-1 text-sm font-medium rounded-lg border border-transparent bg-indigo-600 text-white hover:bg-indigo-700 focus:outline-none focus:bg-indigo-700">
        This Month
      </a>
      <?php if (!empty($from_date) || !empty($to_date)): ?>
      <a href="<?php echo base_url('oficer/loan_withdrawal'); ?>" class="py-1.5 px-3 inline-flex items-center gap-x-1 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-700 hover:bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-600">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        Clear
      </a>
      <?php endif; ?>

      <?php
        $download_params = [];
        if (!empty($from_date)) $download_params['from_date'] = $from_date;
        if (!empty($to_date)) $download_params['to_date'] = $to_date;
        if (!empty($filter_month)) $download_params['filter_month'] = $filter_month;
        $download_pdf_url = base_url('oficer/print_manager_withdrawal_pdf') . (!empty($download_params) ? '?' . http_build_query($download_params) : '');
      ?>
      <a href="<?php echo $download_pdf_url; ?>" class="py-1.5 px-3 inline-flex items-center gap-x-1 text-sm font-medium rounded-lg border border-transparent bg-emerald-600 text-white hover:bg-emerald-700 focus:outline-none focus:bg-emerald-700" target="_blank" rel="noopener">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v12m0 0l4-4m-4 4l-4-4M4 17v1a3 3 0 003 3h10a3 3 0 003-3v-1"/></svg>
        Download PDF
      </a>
    </form>

    <!-- Optional Spacer for Layout (hidden on small screens) -->
    <div class="hidden md:block flex-grow"></div>

    <!-- Buttons -->
    <div
      class="flex flex-col w-full sm:w-auto space-y-2 md:flex-row md:items-center md:space-y-0 md:space-x-3">
      
      <!-- Export Button -->
      <!-- <button type="button" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-basic-modal" data-hs-overlay="#hs-basic-modal"> -->
  <!-- Filter Icon SVG -->
  <!-- <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
    <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L15 13.414V19a1 1 0 01-1.447.894l-4-2A1 1 0 019 17v-3.586L3.293 6.707A1 1 0 013 6V4z"></path>
  </svg>
  Filter Data
</button> -->


<?php 
$position = strtoupper($this->session->userdata('position_name'));

if ($position === 'LOAN OFFICER'): ?>
  <!-- <a
    href="</?php echo base_url('oficer/print_officer_cash_transaction'); ?>"
    class="w-full md:w-auto flex items-center justify-center px-3 py-2 text-sm font-medium text-white bg-green-600 hover:bg-green-700 rounded-lg focus:outline-none focus:ring-4 focus:ring-green-300 dark:focus:ring-green-800"
    target="_blank"
  >
    <span class="bg-green-200 p-1 rounded mr-2">
      <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path
          d="M14 2H6a2 2 0 00-2 2v16c0 1.104.896 2 2 2h12a2 2 0 002-2V8l-6-6zM13 3.5L18.5 9H13V3.5zM10 14h1v4h-1v-4zm-2.5 0H9v1.5H8v.5h1v1H7.5V14zm7 0H15a1 1 0 110 2h-.5v2H13v-4z" />
      </svg>
    </span>
    Print Officer PDF
  </a> -->


<?php elseif ($position === 'BRANCH MANAGER'): ?>


  <?php
    $pdf_params = [];
    if (!empty($filter_month)) $pdf_params['filter_month'] = $filter_month;
    if (!empty($from_date)) $pdf_params['from_date'] = $from_date;
    if (!empty($to_date))   $pdf_params['to_date']   = $to_date;
    $pdf_url = base_url('oficer/print_manager_withdrawal_pdf') . (!empty($pdf_params) ? '?' . http_build_query($pdf_params) : '');
  ?>
  <a 
    href="<?php echo $pdf_url; ?>"
    class="w-full md:w-auto flex items-center justify-center px-3 py-2 text-sm font-medium text-white bg-cyan-600 hover:bg-cyan-700 rounded-lg focus:outline-none focus:ring-4 focus:ring-cyan-300 dark:focus:ring-cyan-800"
    target="_blank"
  >
    <span class="bg-cyan-200 p-1 rounded mr-2">
      <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path
          d="M14 2H6a2 2 0 00-2 2v16c0 1.104.896 2 2 2h12a2 2 0 002-2V8l-6-6zM13 3.5L18.5 9H13V3.5zM10 14h1v4h-1v-4zm-2.5 0H9v1.5H8v.5h1v1H7.5V14zm7 0H15a1 1 0 110 2h-.5v2H13v-4z" />
      </svg>
    </span>
    Print  PDF
  </a>



<div id="hs-basic-modal" class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-80 opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-basic-modal-label">
  <div class="sm:max-w-lg sm:w-full m-3 sm:mx-auto">
    <div class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
      <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200 dark:border-neutral-700">
        <h3 id="hs-basic-modal-label" class="font-bold text-gray-800 dark:text-white">
          Modal title
        </h3>
        <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-basic-modal">
          <span class="sr-only">Close</span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 6 6 18"></path>
            <path d="m6 6 12 12"></path>
          </svg>
        </button>
      </div>
      <div class="p-4 overflow-y-auto">
        <p class="mt-1 text-gray-800 dark:text-neutral-400">
          This is a wider card with supporting text below as a natural lead-in to additional content.
        </p>
      </div>
      <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200 dark:border-neutral-700">
        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-basic-modal">
          Close
        </button>
        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
          Save changes
        </button>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

    </div>
  </div>


  

  <!-- Spacer to push buttons right on large screens -->
  
  <table id="shareholder_table"  class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-cyan-500 dark:text-gray-400">
      <tr>
        <th scope="col" class="px-4 py-3 dark:text-white">S/No</th>
        <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('customer_name'); ?></th>
        <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('phone_number'); ?></th>
        <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('branch_name'); ?></th>
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
      <?php foreach(($disburse ?? []) as $loan_aproveds):
        $total_loan_aprove += (float)$loan_aproveds->loan_aprove;
        $total_loan_int += (float)$loan_aproveds->loan_int;
        $total_restoration += (float)$loan_aproveds->restration;
        $row_paid = (float)($loan_aproveds->total_paid ?? 0);
        $row_remain = max(0, (float)$loan_aproveds->loan_int - $row_paid);
        $total_paid_all += $row_paid;
        $total_remain_all += $row_remain;
      ?>
      <tr class="border-b dark:border-gray-700">
        <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $no++ ?></th>
        <td class="uppercase px-4 py-3 dark:text-white"><?= $loan_aproveds->f_name; ?> <?= substr($loan_aproveds->m_name, 0,1); ?> <?= $loan_aproveds->l_name; ?></td>
        <td class="px-4 py-3 dark:text-white"><?= $loan_aproveds->phone_no; ?></td>
        <td class="px-4 py-3 dark:text-white"><?= $loan_aproveds->blanch_name; ?></td>
        <td class="px-4 py-3 dark:text-white"><?= number_format($loan_aproveds->loan_aprove); ?></td>
        <td class="px-4 py-3 dark:text-white"><?= number_format($loan_aproveds->loan_int); ?></td>
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
        <td class="px-4 py-3 dark:text-white"><?= number_format($loan_aproveds->restration); ?></td>
        <td class="px-4 py-3 dark:text-white"><?= $loan_aproveds->loan_name; ?></td>
        <td class="px-4 py-3 dark:text-white"><?= $loan_aproveds->account_name; ?></td>
        <td class="px-4 py-3 dark:text-white"><?= substr($loan_aproveds->loan_stat_date, 0,10); ?></td>
        <td class="px-4 py-3 dark:text-white"><?= substr($loan_aproveds->loan_end_date, 0,10); ?></td>
        <td class="px-4 py-3 text-green-600 dark:text-green-400"><?= number_format($row_paid); ?></td>
        <td class="px-4 py-3 <?= $row_remain > 0 ? 'text-red-600 dark:text-red-400' : 'text-gray-500 dark:text-gray-400'; ?>"><?= number_format($row_remain); ?></td>
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
          <?php if (!empty($loan_aproveds->loan_id)): ?>
          <a href="<?= base_url("oficer/customer_loan_detail/{$loan_aproveds->customer_id}") ?>" class="text-blue-600 hover:text-blue-900 flex items-center gap-1" title="<?php echo $this->lang->line('view_statement') ?? 'View Statement'; ?>">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
          </a>
          <?php else: ?>
          <span class="text-gray-400" title="<?php echo $this->lang->line('view_statement') ?? 'View Statement'; ?>">-</span>
          <?php endif; ?>
        </td>
      </tr>
      <?php endforeach; ?>

      <tr class="bg-gray-200 dark:bg-gray-800 font-extrabold text-lg">
        <td colspan="4" class="px-4 py-3 dark:text-white text-right"><?php echo $this->lang->line('total'); ?></td>
        <td class="px-4 py-3 text-green-700 dark:text-green-400"><?= number_format($total_loan_aprove); ?></td>
        <td class="px-4 py-3 text-blue-700 dark:text-blue-400"><?= number_format($total_loan_int); ?></td>
        <td></td>
        <td class="px-4 py-3 text-purple-700 dark:text-purple-400"><?= number_format($total_restoration); ?></td>
        <td colspan="4"></td>
        <td class="px-4 py-3 text-green-700 dark:text-green-400"><?= number_format($total_paid_all); ?></td>
        <td class="px-4 py-3 text-red-700 dark:text-red-400"><?= number_format($total_remain_all); ?></td>
        <td></td>
        <td></td>
      </tr>
    </tbody>
  </table>


          </div>
       
      </div>
  </div>
</section>
      
        <!-- End Card: Register Share Holder Form -->


       
        <!-- End Card: Share Holder List Table -->

 

        <div id="hs-basic-modal" class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-80 opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-basic-modal-label">
  <div class="sm:max-w-lg sm:w-full m-3 sm:mx-auto">
    <div class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">

      <!-- Modal Header -->
     

      <!-- Modal Body -->
    
      <?php echo form_open("oficer/print_manager_withdrawal_pdf", ['method' => 'get']); ?>

      <div class="p-4 overflow-y-auto">
        <div class="grid sm:grid-cols-12 gap-4 sm:gap-6">
          

          <!-- Date -->
          <?php $date = date("Y-m-d"); ?>
          <input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">  

          <div class="sm:col-span-6">
            <label for="from_date" class="block text-sm font-medium mb-2 dark:text-gray-300">
              *DATE FROM:
            </label>
            <input type="date" id="from_date" name="from_date" 
            value="<?php echo $date; ?>" 
              class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
              required>
          </div>

          <div class="sm:col-span-6">
            <label for="to_date" class="block text-sm font-medium mb-2 dark:text-gray-300">
              * DATE TO:
            </label>
            <input type="date" id="to_date" name="to_date"
            value="<?php echo $date; ?>" 
              class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
              required>
          </div>

          <!-- Code -->
   

        </div>
      </div>

      <!-- Modal Footer -->
      <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200 dark:border-neutral-700">
        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-basic-modal">
          Close
        </button>

        <!-- Submit Button -->
        <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
         Filter
        </button>
      </div>
      <?php echo form_close(); ?>

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
document.getElementById('shareholder-table-search').addEventListener('keyup', function() {
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
$('#empl').html('<option value="">Select Employee</option>');
//$('#district').html('<option value="">All</option>');
}
});

});
</script>



		