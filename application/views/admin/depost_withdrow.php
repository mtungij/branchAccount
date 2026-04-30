<?php
include_once APPPATH . "views/partials/header.php";
?>
<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-6">

  <?php
// Get flash messages
$success_msg = $this->session->flashdata('success');
$error_msg   = $this->session->flashdata('error');
?>

<?php if ($success_msg): ?>
    <!-- Success Message -->
    <div class="bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert">
        <div class="flex">
            <div class="flex-shrink-0">
                <span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-teal-100 bg-teal-200 text-teal-800 dark:border-teal-900 dark:bg-teal-800 dark:text-teal-500">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                        <path d="m9 12 2 2 4-4"></path>
                    </svg>
                </span>
            </div>
            <div class="ms-3">
                <h3 class="text-gray-800 font-semibold dark:text-white">Success</h3>
                <p class="mt-2 text-sm text-gray-700 dark:text-gray-400"><?= $success_msg; ?></p>
            </div>
            <div class="ps-3 ms-auto">
                <button type="button" class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-teal-50 focus:ring-teal-600 dark:bg-transparent dark:hover:bg-teal-800/50 dark:text-teal-600" data-hs-remove-element="[role=alert]">
                    <span class="sr-only">Dismiss</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
<?php elseif ($error_msg): ?>
    <!-- Error Message -->
    <div class="bg-red-100 border border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500" role="alert">
        <div class="flex">
            <div class="flex-shrink-0">
                <span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-red-100 bg-red-200 text-red-800 dark:border-red-900 dark:bg-red-800 dark:text-red-500">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M12 2a10 10 0 1 1 0 20 10 10 0 0 1 0-20z"/>
                    </svg>
                </span>
            </div>
            <div class="ms-3">
                <h3 class="text-gray-800 font-semibold dark:text-white">Error</h3>
                <p class="mt-2 text-sm text-gray-700 dark:text-gray-400"><?= $error_msg; ?></p>
            </div>
            <div class="ps-3 ms-auto">
                <button type="button" class="inline-flex bg-red-50 rounded-lg p-1.5 text-red-500 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-red-50 focus:ring-red-600 dark:bg-transparent dark:hover:bg-red-800/50 dark:text-red-600" data-hs-remove-element="[role=alert]">
                    <span class="sr-only">Dismiss</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
<?php endif; ?>


        <div class="bg-gray-100">
    <div class="w-full bg-cyan-600 text-white">
        <div class="flex flex-col max-w-screen-xl px-4 mx-auto md:flex-row md:justify-between md:px-6 lg:px-8">
            <div class="p-4 flex flex-row items-center justify-between">
                <a href="#" class="text-lg font-semibold tracking-widest uppercase rounded-lg focus:outline-none focus:shadow-outline">
                    Teller Dashboard
                </a>
            </div>
        </div>
    </div>
</div>


  <div class=" w-full">
  <div class="md:flex md:justify-between md:items-start md:space-x-2">

    <!-- Customer Card -->
   <div class="w-full md:w-1/6 mb-4 md:mb-0">

      <div class="bg-white p-4 border-t-4 border-green-500 rounded-lg shadow-md">
        <div class="image overflow-hidden mb-4 text-center">
          <?php if (!empty($customer->passport)): ?>
            <img class="w-32 h-32 mx-auto rounded-full object-cover border-4 border-green-400" src="<?= base_url($customer->passport) ?>" alt="Customer Passport">
          <?php else: ?>
            <img class="w-32 h-32 mx-auto rounded-full object-cover border-4 border-green-400" src="<?= base_url('assets/img/customer21.png') ?>" alt="Customer Image">
          <?php endif; ?>
        </div>
        <h1 class="text-cyan-600 font-bold text-xl text-center uppercase whitespace-nowrap overflow-hidden truncate">
          <?= strtoupper($customer->f_name) . " " . strtoupper($customer->m_name) . " " . strtoupper($customer->l_name) ?>
        </h1>
        <h2 class="text-sm text-green-500 text-center font-semibold">(<?= $customer->famous_area; ?>)</h2>
        <p class="text-center mt-2 text-gray-800 font-medium"><?= $customer->phone_no; ?></p>

               <div class="mt-4 text-center">
  <a href="<?= base_url('Admin/send_payment/' . $customer->customer_id); ?>" 
     class="inline-flex items-center px-4 py-2 bg-cyan-600 hover:bg-green-700 text-white text-sm font-semibold rounded-lg shadow-md transition-all">
     📩 Tuma SMS ya Malipo
  </a>
</div>

        <?php
          $customer_loan = !empty($customer->customer_id) ? $this->queries->get_loan_active_customer($customer->customer_id) : null;
          $total_deposit = $this->queries->get_total_amount_paid_loan($customer_loan->loan_id ?? 0);
          $loan_int = $customer_loan->loan_int ?? 0;
          $deposit = $total_deposit->total_Deposit ?? 0;
          $gawa_tarehe = '';
          $mwisho_tarehe = '';
          $show_contract_dates = !empty($customer_loan) && in_array(($customer_loan->loan_status ?? ''), ['withdrawal', 'out', 'done'], true);

          if ($show_contract_dates) {
            if (!empty($customer_loan->loan_stat_date)) {
              $gawa_tarehe = substr($customer_loan->loan_stat_date, 0, 10);
            }

            if (!empty($customer_loan->loan_end_date)) {
              $mwisho_tarehe = substr($customer_loan->loan_end_date, 0, 10);
            }
          }

          $status_label = 'Not Active';
          $status_class = 'bg-blue-600 text-white';
          if (!empty($customer_loan)) {
            switch ($customer_loan->loan_status) {
              case 'withdrawal': $status_label = 'Active'; $status_class = 'bg-teal-500 text-white'; break;
              case 'done': $status_label = 'Done'; $status_class = 'bg-yellow-500 text-white'; break;
              case 'out': $status_label = 'Nje Mkataba'; $status_class = 'bg-red-500 text-white'; break;
            }
          }
        ?>

        <?php if (!empty($customer->customer_id) && !empty($customer_loan->loan_id) && !empty($customer_loan->loan_status) && in_array($customer_loan->loan_status, ['withdrawal', 'out', 'done'], true)): ?>
        <div class="mt-3 text-center">
          <a href="<?= base_url('adminr/view_aggrement/' . $customer->customer_id . '/' . $customer_loan->loan_id); ?>" target="_blank"
             class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full bg-cyan-100 text-cyan-800 hover:bg-cyan-200 transition-all">
            Tazama Mkataba wa Mkopo
          </a>
        </div>
        <?php endif; ?>

        <ul class="mt-5 bg-gray-100 text-gray-700 divide-y divide-gray-300 rounded-lg shadow-sm text-sm">
          <li class="flex items-center justify-between py-2 px-3">
            <span class="font-bold text-base">Status</span>
            <span class="px-3 py-1 rounded-full text-xs font-medium <?= $status_class; ?>"><?= $status_label; ?></span>
          </li>
          <li class="flex items-center justify-between py-2 px-3 font-bold text-base"><span>Customer Code</span><span><?= $customer->code; ?></span></li>
          <li class="flex items-center justify-between py-2 px-3 font-bold text-base"><span>Gawa Tarehe</span><span><?= $gawa_tarehe !== '' ? $gawa_tarehe : '-'; ?></span></li>
          <li class="flex items-center justify-between py-2 px-3 font-bold text-base"><span>Mwisho Tarehe</span><span><?= $mwisho_tarehe !== '' ? $mwisho_tarehe : '-'; ?></span></li>
          <li class="flex items-center justify-between py-2 px-3 font-bold text-base"><span>Rejesho</span><span><?= safe_number_format($customer_loan->restration ?? 0); ?></span></li>

        </ul>

         <div class="mt-6">
                <h3 class="text-sm font-semibold text-gray-800 mb-2">📎 Customer Documents:</h3>
                <div class="flex flex-col gap-2 text-sm">
                    <?php if (!empty($customer->barua_path)): ?>
                        <a href="<?= base_url('assets/sponser_documents/' . basename($customer->barua_path)); ?>" 
                           target="_blank"
                           class="text-cyan-600 hover:underline hover:text-cyan-800 transition-all">
                            📄 Barua ya Utambulisho
                        </a>
                    <?php endif; ?>

                    <?php if (!empty($customer->kitambulisho_path)): ?>
                        <a href="<?= base_url('assets/sponser_documents/' . basename($customer->kitambulisho_path)); ?>" 
                           target="_blank"
                           class="text-cyan-600 hover:underline hover:text-cyan-800 transition-all">
                            📄 Kitambulisho
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        
      </div>
    </div>

    <!-- Table in Middle -->
  <div class="w-full md:w-4/6 mb-4 md:mb-0">
      <div class="bg-white p-4 rounded-lg shadow-md overflow-auto">
        <h2 class="text-lg font-bold text-cyan-600 mb-3">Loan Information</h2>
        <table class="min-w-full text-sm text-left text-gray-700 border border-gray-200">
          <thead class="bg-green-100 text-cyan-800 font-semibold">
            <tr>
              <th class="px-4 py-2 border-b">Loan Amount</th>
              <th class="px-4 py-2 border-b">Paid Amount</th>
              <th class="px-4 py-2 border-b">Remain Debt</th>
            </tr>
          </thead>
          <tbody>
           
              <tr class="hover:bg-gray-50">
                <td class="px-4 py-2 border-b"><?= safe_number_format($loan_int); ?></td>
                <td class="px-4 py-2 border-b"><?= $deposit > $loan_int ? safe_number_format($deposit - $loan_int) : safe_number_format($deposit); ?></td>
                <td class="px-4 py-2 border-b"><?= safe_number_format(max(0, $loan_int - $deposit)); ?></td>
              </tr>
            
          </tbody>
        </table>

        
        
      </div>
    </div>

    <!-- Sponsor Card -->
    <!-- Sponsor Card -->
<div class="w-full md:w-1/6">

      <div class="bg-white p-4 border-t-4 border-green-500 rounded-lg shadow-md">
        <div class="image overflow-hidden mb-4 text-center">
          <?php if (!empty($customer->passport_path)): ?>
            <img class="w-32 h-32 mx-auto rounded-full object-cover border-4 border-green-400" src="<?= base_url($customer->passport_path) ?>" alt="Sponsor Passport">
          <?php else: ?>
            <img class="w-32 h-32 mx-auto rounded-full object-cover border-4 border-green-400" src="<?= base_url('assets/img/customer21.png') ?>" alt="Default Image">
          <?php endif; ?>
        </div>
        <h1 class="text-cyan-600 font-bold text-xl text-center uppercase whitespace-nowrap overflow-hidden truncate">
          <?= strtoupper($customer->sp_name) . " " . strtoupper($customer->sp_mname) . " " . strtoupper($customer->sp_lname) ?>
        </h1>
        <h2 class="text-sm text-green-500 text-center font-semibold">(<?= $customer->famous_area; ?>)</h2>
        <p class="text-center mt-2 text-gray-800 font-medium"><?= $customer->sp_phone_no; ?></p>

        <ul class="mt-5 bg-gray-100 text-gray-700 divide-y divide-gray-300 rounded-lg shadow-sm text-sm">
          <li class="flex items-center justify-between py-2 px-3"><span>Namba ya Simu</span><span><?= $customer->sp_phone_no; ?></span></li>
          <li class="flex items-center justify-between py-2 px-3"><span>Uhusiano</span><span><?= ucfirst($customer->sp_relation) ?></span></li>
          <li class="flex items-center justify-between py-2 px-3"><span>Biashara/Kazi</span><span><?= $customer->nature; ?></span></li>
        </ul>

         <div class="mt-6">
                <h3 class="text-sm font-semibold text-gray-800 mb-2">📎 Sponsor Documents:</h3>
                <div class="flex flex-col gap-2 text-sm">
                    <?php if (!empty($customer->barua_path)): ?>
                        <a href="<?= base_url('assets/sponser_documents/' . basename($customer->barua_path)); ?>" 
                           target="_blank"
                           class="text-cyan-600 hover:underline hover:text-cyan-800 transition-all">
                            📄 Barua ya Utambulisho
                        </a>
                    <?php endif; ?>

                    <?php if (!empty($customer->kitambulisho_path)): ?>
                        <a href="<?= base_url('assets/sponser_documents/' . basename($customer->kitambulisho_path)); ?>" 
                           target="_blank"
                           class="text-cyan-600 hover:underline hover:text-cyan-800 transition-all">
                            📄 Kitambulisho
                        </a>
                    <?php endif; ?>
                </div>
            </div>
      </div>
    </div>

  </div>
</div>
</div>
<!-- Table Section -->
<!-- Table Section -->


        <!-- Page Title / Subheader -->
       

        <div>

        
<div >
    <div class="flex justify-end  items-center gap-2">
    <?php if (!empty($customer_loan->loan_status)) {
$status = $customer_loan->loan_status;

if ($status === 'withdrawal' || $status === 'out') { ?>
      <button type="button" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-scale-animation-modal" data-hs-overlay="#hs-edit-deposit-modal">
        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
           fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4Z"/>
      </svg>
  Deposit
</button>
<?php } elseif ($status === 'disbarsed') { ?>
    <button type="button" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-green-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-basic-modal" data-hs-overlay="#hs-edit-shareholder-modal-<?= $customer->customer_id; ?>">
    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
           fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4Z"/>
      </svg>
    Withdraw
  </button>
<?php } elseif ($status === 'done') { ?>
    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#addcontact3">
        <i class="icon-pencil"></i> Faini
    </a>
<?php }
} ?>
    </div>
</div>

</div>



               
                  <div class="p-4 md:p-6">
                  <?php echo form_open("admin/search_customerData", [
    'novalidate' => true,
    'id' => 'customerSearchForm'
]); ?>

    <div class="w-full  md:flex-row items-center ">
        <!-- Search Dropdown -->
        <div class="w-full">
            <label for="branchSelect" class="block text-sm font-medium mb-1 dark:text-gray-300">* Search Customer:</label>
            <select id="branchSelect" required name="customer_id"
                class="py-2 px-3 block w-full bg-cyan-600 border border-gray-300 rounded-md text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-300 dark:placeholder-gray-500 select2">
                <option value="">Search Customer</option>
                <?php foreach ($customery as $customers): ?>
                    <option value="<?= $customers->customer_id ?>">
                        <?= strtoupper($customers->f_name . " " . $customers->m_name . " " . $customers->l_name); ?> /
                        <?= strtoupper($customers->customer_code); ?> /
                        <?= strtoupper($customers->blanch_name); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Search Button -->
        <div class="w-full md:w-auto">
            <label class="block text-sm font-medium mb-1 invisible">Button</label> <!-- for spacing -->
            <!-- <button type="submit" class="w-full md:w-auto py-2 px-4 bg-cyan-800 hover:bg-cyan-700 text-white rounded-md">
                Search
            </button> -->
        </div>
    </div>

    <input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">

    <?php echo form_close(); ?>
</div>

       

                <div class="overflow-x-auto">
                    <div class="min-w-full inline-block align-middle">
                        <div class="border rounded-lg overflow-hidden dark:border-gray-700">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" id="shareholder_table">
                                <thead class="bg-cyan-600 dark:bg-cyan-600">
                                    <tr>
                                        <th scope="col" class="py-3 px-6 text-start"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-white">Date</span></div></th>
                                        <th scope="col" class="py-3 px-6 text-start"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-white">Description</span><svg class="size-3.5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path class="hs-datatable-ordering-desc:text-cyan-600 dark:hs-datatable-ordering-desc:text-cyan-500" d="m7 15 5 5 5-5"></path><path class="hs-datatable-ordering-asc:text-cyan-600 dark:hs-datatable-ordering-asc:text-cyan-500" d="m7 9 5-5 5 5"></path></svg></div></th>
                                        <th scope="col" class="py-3 px-6 text-start"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-white">Deposit</span><svg class="size-3.5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path class="hs-datatable-ordering-desc:text-cyan-600 dark:hs-datatable-ordering-desc:text-cyan-500" d="m7 15 5 5 5-5"></path><path class="hs-datatable-ordering-asc:text-cyan-600 dark:hs-datatable-ordering-asc:text-cyan-500" d="m7 9 5-5 5 5"></path></svg></div></th>
                                         <th scope="col" class="py-3 px-6 text-start"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-white">withdraw</span><svg class="size-3.5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path class="hs-datatable-ordering-desc:text-cyan-600 dark:hs-datatable-ordering-desc:text-cyan-500" d="m7 15 5 5 5-5"></path><path class="hs-datatable-ordering-asc:text-cyan-600 dark:hs-datatable-ordering-asc:text-cyan-500" d="m7 9 5-5 5 5"></path></svg></div></th>
                                        <th scope="col" class="py-3 px-6 text-start"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-white">Balance</span><svg class="size-3.5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path class="hs-datatable-ordering-desc:text-cyan-600 dark:hs-datatable-ordering-desc:text-cyan-500" d="m7 15 5 5 5-5"></path><path class="hs-datatable-ordering-asc:text-cyan-600 dark:hs-datatable-ordering-asc:text-cyan-500" d="m7 9 5-5 5 5"></path></svg></div></th>
                                        <th scope="col" class="py-3 px-6 text-start"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-white">Deni</span><svg class="size-3.5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path class="hs-datatable-ordering-desc:text-cyan-600 dark:hs-datatable-ordering-desc:text-cyan-500" d="m7 15 5 5 5-5"></path><path class="hs-datatable-ordering-asc:text-cyan-600 dark:hs-datatable-ordering-asc:text-cyan-500" d="m7 9 5-5 5 5"></path></svg></div></th>

                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                                <?php @$loan_desc = $this->queries->get_total_pay_description($customer_loan->loan_id);

// echo "<pre>";
// print_r( $loan_desc);
// echo "</pre>";
// exit();
                                      @$remain_balance = $this->queries->get_total_remain_with($customer_loan->loan_id);
                                      @$total_recovery = $this->queries->get_total_loan_pend($customer_loan->loan_id);
                                      @$total_penart =   $this->queries->get_total_penart_loan($customer_loan->loan_id);
                                      @$total_deposit_penart =  $this->queries->get_total_paypenart($customer_loan->loan_id);
                                      @$end_deposit = $this->queries->get_end_deposit_time($customer_loan->loan_id);
                                       ?>
                                    <?php if (isset($loan_desc ) && is_array($loan_desc ) && !empty($loan_desc )): ?>
                                        <?php foreach ($loan_desc  as $payisnulls): ?>
                                            <tr>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo $payisnulls->date_data; ?></td>
    <td class=" uppercase px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
    <?= $payisnulls->emply ? $payisnulls->emply . ' / ' : ''; ?>
<?= $payisnulls->description; ?>
<?= $payisnulls->p_method ? ' / ' . $payisnulls->account_name : ''; ?>
<?= !empty($payisnulls->wakala_name) ? ' / ' . $payisnulls->wakala_name : ''; ?>
<?= ($payisnulls->fee_id !== null && $payisnulls->fee_id !== '') ? 
    ' / ' . $payisnulls->fee_desc . ' ' . $payisnulls->fee_percentage . ' ' . $payisnulls->symbol : ''; ?>
<?= $payisnulls->p_method ? ' / ' : ''; ?>
<?= $payisnulls->loan_name ?? ''; ?>

<?php
    if ($payisnulls->day == 1) {
        echo " Daily";
    } elseif ($payisnulls->day == 7) {
        echo " Weekly";
    } elseif (in_array($payisnulls->day, [28, 29, 30, 31])) {
        echo " Monthly";
    }
?>
<?= ' ' . $payisnulls->session; ?>

    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?= ($payisnulls->depost) ? round($payisnulls->depost, 2) : '0.00'; ?></td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?= ($payisnulls->withdrow) ? round($payisnulls->withdrow, 2) : '0.00'; ?></td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?= ($payisnulls->balance) ? round($payisnulls->balance, 2) : '0.00'; ?></td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?= ($payisnulls->rem_debt) ? round($payisnulls->rem_debt, 2) : '0.00'; ?></td>
    
</tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="py-3 px-4 border-t border-gray-200 dark:border-gray-700 hidden" data-hs-datatable-paging="">
                    <nav class="flex items-center space-x-1"><button type="button" class="p-2.5 min-w-10 h-10 inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700" data-hs-datatable-paging-prev=""><span aria-hidden="true">«</span><span class="sr-only">Previous</span></button><div class="flex items-center space-x-1 [&>.active]:bg-gray-100 dark:[&>.active]:bg-gray-700" data-hs-datatable-paging-pages=""></div><button type="button" class="p-2.5 min-w-10 h-10 inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700" data-hs-datatable-paging-next=""><span class="sr-only">Next</span><span aria-hidden="true">»</span></button></nav>
                </div>
            </div>
        </div>



        
        <div id="hs-edit-shareholder-modal-<?= $customer->customer_id; ?>" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
  <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all lg:max-w-3xl lg:w-full m-3 lg:mx-auto">
    <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700">
      
      <!-- Modal Header -->
      <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
        <h3 class="font-bold text-gray-800 dark:text-white">Customer Name: <?= htmlspecialchars($customer->f_name, ENT_QUOTES, 'UTF-8'); ?></h3>
        <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" data-hs-overlay="#hs-edit-shareholder-modal-<?= $customer->customer_id; ?>">
          <span class="sr-only">Close</span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
      </div>

      <?php echo form_open("admin/create_withdrow_balance/{$customer->customer_id}"); ?>

<!-- Modal Body -->
<div class="p-4 sm:p-6">
  <div class="grid sm:grid-cols-12 gap-4 sm:gap-6">

    <!-- Total Withdraw -->
    <div class="sm:col-span-6">
      <label for="withdrow_<?php echo $customer->customer_id; ?>" class="block text-sm font-medium mb-2 dark:text-gray-300">
        * Total Withdraw:
      </label>
      <input type="number" id="withdrow_<?php echo $customer->customer_id; ?>" name="withdrow"
      value="<?= htmlspecialchars(!empty($remain_balance->balance) ? $remain_balance->balance : 0, ENT_QUOTES, 'UTF-8'); ?>"
        class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
        required>
    </div>

    <!-- Payment Method -->
    <div class="sm:col-span-6">
      <label for="method_<?php echo $customer->customer_id; ?>" class="block text-sm font-medium mb-2 dark:text-gray-300">
        * Payment Method:
      </label>
      <select id="method_<?php echo $customer->customer_id; ?>" name="method"
        class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:ring-gray-600">
        <option value="">Select Account</option>
        <?php foreach ($acount as $acounts): ?>
          <option value="<?= $acounts->trans_id; ?>"><?= $acounts->account_name; ?> - Salio: <?= number_format(isset($acounts->blanch_capital) ? $acounts->blanch_capital : 0); ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <!-- Date -->
    <div class="sm:col-span-6">
      <label for="with_date_<?php echo $customer->customer_id; ?>" class="block text-sm font-medium mb-2 dark:text-gray-300">
        * Date:
      </label>
      <input type="date" id="with_date_<?php echo $customer->customer_id; ?>" name="with_date"
        value="<?= date('Y-m-d'); ?>"
        class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
        required>
    </div>

    <!-- Code -->
    <!-- <div class="sm:col-span-6">
      <label for="code_</?php echo $customer->customer_id; ?>" class="block text-sm font-medium mb-2 dark:text-gray-300">
        * Code:
      </label>
      <input type="number" placeholder="andika code ya Mteja" id="code_<?php echo $customer->customer_id; ?>" name="code"
        class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
        required>
    </div> -->

  </div>

  <!-- Hidden Inputs -->
  <input type="hidden" value="CASH WITHDRAWALS" name="description">
  <input type="hidden" value="withdrawal" name="loan_status">
  <input type="hidden" value="<?php echo $customer_loan->loan_id; ?>" name="loan_id">
  <input type="hidden" value="<?php echo $customer->customer_id; ?>" name="customer_id">
  <input type="hidden" value="<?php echo $customer->comp_id; ?>" name="comp_id">
  <input type="hidden" value="<?php echo $customer->blanch_id; ?>" name="blanch_id">

  <!-- Action Buttons -->
  <div class="mt-6 flex justify-end items-center gap-x-2">
    <button type="button" class="py-2 px-3 btn-secondary-sm"
      data-hs-overlay="#hs-edit-shareholder-modal-<?= $customer->customer_id; ?>">Close</button>

    <!-- <a href="</?php echo base_url("admin/get_loan_code_resend/{$customer->customer_id}"); ?>"
      class="py-2 px-3 btn-primary-sm bg-green-600 hover:bg-cyan-700 text-white">
      Resend Code
    </a> -->

    <button type="submit" class="py-2 px-3 btn-primary-sm bg-cyan-600 hover:bg-cyan-700 text-white">Withdraw</button>
  </div>
</div>

<?php echo form_close(); ?>

    </div>
  </div>
</div>


<div id="hs-edit-deposit-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all lg:max-w-3xl lg:w-full m-3 lg:mx-auto">
        <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700">
      
      <!-- Modal Header -->
      <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
        <h3 class="font-bold text-gray-800 dark:text-white">Jina La Mteja: <?= htmlspecialchars($customer->f_name, ENT_QUOTES, 'UTF-8'); ?></h3>
        <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" data-hs-overlay="#hs-edit-deposit-modal">
          <span class="sr-only">Close</span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
      </div>

      <?php echo form_open("admin/deposit_loan/{$customer_loan->customer_id}"); ?>
<!-- Modal Body -->
<div class="p-4 sm:p-6">
  <div class="grid sm:grid-cols-12 gap-4 sm:gap-6">

    <!-- Total Withdraw -->
    <div class="sm:col-span-6">
      <label for=depost" class="block text-sm font-medium mb-2 dark:text-gray-300">
        * Deposit:
      </label>
      <input type="text" id=depost" name="depost"
  class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
  required>

    </div>

    <!-- Payment Method -->
    <div class="sm:col-span-6">
  <label for="p_method" class="block text-sm font-medium mb-2 dark:text-gray-300">
    * Njia Za Malipo:
  </label>
  <select id="p_method" name="p_method"
    class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:ring-gray-600"
    onchange="handlePaymentChange(this)">
    <option value="">Chagua Malipo</option>
    <?php foreach ($acount as $acounts): ?>
      <option value="<?= $acounts->trans_id; ?>" data-label="<?= strtolower(trim($acounts->account_name)); ?>">
        <?= $acounts->account_name; ?> - Salio: <?= number_format(isset($acounts->blanch_capital) ? $acounts->blanch_capital : 0); ?>
      </option>
    <?php endforeach; ?>
  </select>
  <!-- Hidden field to pass label to PHP -->
 
</div>



    <div class="sm:col-span-6" id="wakala_field" style="display:none;">
  <label for="wakala_name" class="block text-sm font-medium mb-2 dark:text-gray-300">
    * Jina la Wakala:
  </label>
  <input type="text" id="wakala_name" name="wakala_name" 
    class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600">
</div>


    <div class="sm:col-span-6">
    <?php if ($customer_loan->loan_status == 'withdrawal') { ?>
        <label for="pending" class="block text-sm font-medium mb-2 dark:text-gray-300">Recovery Amount</label>
        <input type="text" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
               value="<?php echo number_format($total_recovery->total_pending, 2); ?>" 
               readonly style="color:red"> 

    <?php } elseif ($customer_loan->loan_status == 'out') { ?>
        <span style="color:red;">Default Amount</span>
        <input type="text" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
               value="<?php echo number_format($out_stand->total_out, 2); ?>" 
               readonly style="color:red"> 

    <?php } else { ?>
        <label for="pending" class="block text-sm font-medium mb-2 dark:text-gray-300">Recovery Amount</label>
        <input type="text" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
                value="<?php echo number_format($total_recovery->pending, 2); ?>"
               readonly style="color:red"> 
    <?php } ?>
</div>



 


    <!-- Date -->
    <div class="sm:col-span-6">
      <label for="deposit_date" class="block text-sm font-medium mb-2 dark:text-gray-300">
        * Tarehe:
      </label>
      <input type="date" id="deposit_date" name="deposit_date"
        value="<?= date('Y-m-d'); ?>"
        class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
        required>
    </div>

    <!-- Code -->
   

  </div>

  <!-- Hidden Inputs -->
  <input type="hidden" value="<?php echo $customer->customer_id; ?>" name="customer_id">
                    <input type="hidden" value="<?php echo $customer->comp_id; ?>" name="comp_id">
                    <input type="hidden" value="<?php echo $customer->blanch_id; ?>" name="blanch_id">
                    <input type="hidden" value="<?php echo $customer_loan->loan_id; ?>" name="loan_id">
                     <input type="hidden" value="LOAN RETURN" name="description">

  <!-- Action Buttons -->
  <div class="mt-6 flex justify-end items-center gap-x-2">
    <button type="button" class="py-2 px-3 btn-secondary-sm"
      data-hs-overlay="#hs-edit-deposit-modal">Funga</button>

    <button type="submit" class="py-2 px-3 btn-primary-sm bg-cyan-600 hover:bg-cyan-700 text-white">Deposit</button>
  </div>
</div>

<?php echo form_close(); ?>

    </div>
  </div>
</div>
         
<!-- End Table Section -->
<!-- End Table Section -->


</div>
</div>
<!-- ========== END MAIN CONTENT BODY ========== -->

<?php
include_once APPPATH . "views/partials/footer.php";
?>
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
$(document).ready(function () {
    const selectConfig = {
        placeholder: "Select",
        allowClear: true,
        width: '100%',
        dropdownCssClass: 'custom-select2-dropdown',
        containerCssClass: 'custom-select2-container'
    };

    // Customer Search Select
    $('#branchSelect').select2({...selectConfig, placeholder: "Tafuta Mteja"});

    // Auto-submit when customer is selected
    $('#branchSelect').on('select2:select', function () {
        const selected = $(this).val();
        if (selected) {
            $('#customerSearchForm').submit();
        }
    });

    // Employee Select (loaded dynamically based on branch)
    $('#employeeSelect').select2({...selectConfig, placeholder: "Select Employee"});

    $('#branchSelect').on('change', function () {
        const branchId = $(this).val();

        $.post('fetch_employee_blanch', { blanch_id: branchId }, function (data) {
            const employeeSelect = $('#employeeSelect');
            employeeSelect.html(data).select2({...selectConfig, placeholder: "Select Employee"});

            // Optional: If using Preline's hsSelect
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

<script>
function handlePaymentChange(select) {
  const selectedOption = select.options[select.selectedIndex];
  const label = selectedOption.getAttribute('data-label')?.trim().toLowerCase();

  const wakalaField = document.getElementById('wakala_field');
  const wakalaInput = document.getElementById('wakala_name');

  if (label === 'm-pesa' || label === 'lipa-mpesa') {
    wakalaField.style.display = 'block';         // show input
    wakalaInput.removeAttribute('disabled');      // enable input
    wakalaInput.setAttribute('required', 'required');  // make required
  } else {
    wakalaField.style.display = 'none';           // hide input
    wakalaInput.value = '';                        // clear input
    wakalaInput.setAttribute('disabled', 'disabled');  // disable input
    wakalaInput.removeAttribute('required');      // remove required
  }
}

</script>
