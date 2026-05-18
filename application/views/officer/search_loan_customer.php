
<?php
include_once APPPATH . "views/partials/officerheader.php";

$resolve_image_src = function ($value, $default_rel = 'assets/img/customer21.png') {
  $default_src = base_url($default_rel);

  if (empty($value)) {
    return $default_src;
  }

  $raw = trim((string) $value);
  if ($raw === '') {
    return $default_src;
  }

  if (preg_match('#^(https?://|data:image/)#i', $raw)) {
    return $raw;
  }

  $candidates = [$raw];
  if (strpos($raw, 'assets/') !== 0) {
    $candidates[] = 'assets/uploads/' . $raw;
    $candidates[] = 'assets/img/' . $raw;
    $candidates[] = 'assets/passport/' . $raw;
  }

  foreach ($candidates as $candidate) {
    $relative = ltrim($candidate, '/');
    if (file_exists(FCPATH . $relative)) {
      return base_url($relative);
    }
  }

  return $default_src;
};

$customer_passport_src = $resolve_image_src($customer->passport ?? '', 'assets/img/customer21.png');
$sponsor_passport_src = $resolve_image_src($customer->passport_path ?? '', 'assets/img/customer21.png');
?>
<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-6">

        <?php if ($das = $this->session->flashdata('massage')): ?>
        <div class="bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert">
            <div class="flex">
                <div class="flex-shrink-0"><span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-teal-100 bg-teal-200 text-teal-800 dark:border-teal-900 dark:bg-teal-800 dark:text-teal-500"><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="m9 12 2 2 4-4"></path></svg></span></div>
                <div class="ms-3"><h3 class="text-gray-800 font-semibold dark:text-white">Success</h3><p class="mt-2 text-sm text-gray-700 dark:text-gray-400"><?php echo $das;?></p></div>
                <div class="ps-3 ms-auto"><button type="button" class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-teal-50 focus:ring-teal-600 dark:bg-transparent dark:hover:bg-teal-800/50 dark:text-teal-600" data-hs-remove-element="[role=alert]"><span class="sr-only">Dismiss</span><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg></button></div>
            </div>
        </div>
        <?php endif; ?>

        <div class="bg-gray-100">
    <div class="w-full bg-cyan-600 text-white">
        <div class="flex flex-col max-w-screen-xl px-4 mx-auto md:flex-row md:justify-between md:px-6 lg:px-8">
            <div class="p-4 flex flex-row items-center justify-between">
                <a href="#" class="text-lg font-semibold tracking-widest uppercase rounded-lg focus:outline-none focus:shadow-outline">
                Dashibodi Ya Malipo
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
          <img class="w-32 h-32 mx-auto rounded-full object-cover border-4 border-green-400" src="<?= $customer_passport_src ?>" alt="Customer Passport">
        </div>
        <h1 class="text-green-600 font-bold text-xl text-center uppercase whitespace-nowrap overflow-hidden truncate">
          <?= strtoupper($customer->f_name) . " " . strtoupper($customer->m_name) . " " . strtoupper($customer->l_name) ?>
        </h1>
        <h2 class="text-sm text-green-500 text-center font-semibold">(<?= $customer->famous_area; ?>)</h2>
        <p class="text-center mt-2 text-gray-800 font-medium"><?= $customer->phone_no; ?></p>

        <?php
          $customer_loan = !empty($customer->customer_id) ? $this->queries->get_loan_active_customer($customer->customer_id) : null;
          $total_deposit = $this->queries->get_total_amount_paid_loan($customer_loan->loan_id ?? 0);
          $loan_int = $customer_loan->loan_int ?? 0;
          $deposit = $total_deposit->total_Deposit ?? 0;
          $status_label = 'Not Active';
          $status_class = 'bg-blue-600 text-white';
          if (!empty($customer_loan)) {
            switch ($customer_loan->loan_status) {
              case 'withdrawal': $status_label = 'Ndani ya Mkataba'; $status_class = 'bg-teal-500 text-white'; break;
              case 'done': $status_label = 'Done'; $status_class = 'bg-yellow-500 text-white'; break;
              case 'out': $status_label = 'Nje Mkataba'; $status_class = 'bg-red-500 text-white'; break;
            }
          }

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
        ?>

        <?php if (!empty($customer->customer_id) && !empty($customer_loan->loan_id) && !empty($customer_loan->loan_status) && in_array($customer_loan->loan_status, ['withdrawal', 'out', 'done'], true)): ?>
        <div class="mt-3 text-center">
          <a href="<?= base_url('oficer/view_aggrement/' . $customer->customer_id . '/' . $customer_loan->loan_id); ?>" target="_blank"
             class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full bg-cyan-100 text-cyan-800 hover:bg-cyan-200 transition-all">
            Tazama Mkataba wa Mkopo
          </a>
        </div>
        <?php endif; ?>

        <?php if (!empty($customer_loan->loan_id)): ?>
        <div class="mt-2 text-center">
          <a href="<?= base_url('oficer/loan_schedule_detail/' . $customer_loan->loan_id); ?>"
             class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800 hover:bg-blue-200 transition-all">
            Ratiba ya Mkopo
          </a>
        </div>
        <?php endif; ?>

        <div class="mt-4 text-center">
  <a href="<?= base_url('oficer/send_payment/' . $customer->customer_id); ?>" 
     class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold rounded-lg shadow-md transition-all">
     📩 Tuma SMS ya Malipo
  </a>
</div>
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
        <h2 class="text-lg font-bold text-green-600 mb-3">Taarifa Za Mkopo</h2>
        <table class="min-w-full text-sm text-left text-gray-700 border border-gray-200">
          <thead class="bg-green-100 text-green-800 font-semibold">
            <tr>
              <th class="px-4 py-2 border-b">Mkopo</th>
              <th class="px-4 py-2 border-b">Kilicholipwa</th>
              <th class="px-4 py-2 border-b">Deni La Mkopo</th>
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
          <img class="w-32 h-32 mx-auto rounded-full object-cover border-4 border-green-400" src="<?= $sponsor_passport_src ?>" alt="Sponsor Passport">
        </div>
        <h1 class="text-green-600 font-bold text-xl text-center uppercase whitespace-nowrap overflow-hidden truncate">
          <?= strtoupper($customer->sp_name) . " " . strtoupper($customer->sp_mname) . " " . strtoupper($customer->sp_lname) ?>
        </h1>
        <h2 class="text-sm text-green-500 text-center font-semibold">(<?= $customer->famous_area; ?>)</h2>
        <p class="text-center mt-2 text-gray-800 font-medium"><?= $customer->sp_phone_no; ?></p>

        <ul class="mt-5 bg-gray-100 text-gray-700 divide-y divide-gray-300 rounded-lg shadow-sm text-sm">
          <li class="flex items-center justify-between py-2 px-3"><span><b>Namba ya Simu</b></span><span><?= $customer->sp_phone_no; ?></span></li>
          <li class="flex items-center justify-between py-2 px-3"><span><b>Uhusiano</b></span><span><?= ucfirst($customer->sp_relation) ?></span></li>
          <li class="flex items-center justify-between py-2 px-3"><span><b>Biashara/Kazi</b></span><span><?= $customer->nature; ?></span></li>
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

<!-- Table Section -->
<!-- Table Section -->
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
            <i class="icon-pencil"></i> Penalt
        </a>
<?php }
} ?>
        </div>
    </div>
  
</div>



               
                  <div class="p-4 md:p-6">
                  <?php echo form_open("oficer/search_customerData", [
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
                                        <th scope="col" class="py-3 px-6 text-start"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-white">Tarehe</span></div></th>
                                        <th scope="col" class="py-3 px-6 text-start"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-white">Maelezo</span><svg class="size-3.5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path class="hs-datatable-ordering-desc:text-cyan-600 dark:hs-datatable-ordering-desc:text-cyan-500" d="m7 15 5 5 5-5"></path><path class="hs-datatable-ordering-asc:text-cyan-600 dark:hs-datatable-ordering-asc:text-cyan-500" d="m7 9 5-5 5 5"></path></svg></div></th>
                                        <th scope="col" class="py-3 px-6 text-start"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-white">Lipwa</span><svg class="size-3.5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path class="hs-datatable-ordering-desc:text-cyan-600 dark:hs-datatable-ordering-desc:text-cyan-500" d="m7 15 5 5 5-5"></path><path class="hs-datatable-ordering-asc:text-cyan-600 dark:hs-datatable-ordering-asc:text-cyan-500" d="m7 9 5-5 5 5"></path></svg></div></th>
                                         <th scope="col" class="py-3 px-6 text-start"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-white">Toka</span><svg class="size-3.5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path class="hs-datatable-ordering-desc:text-cyan-600 dark:hs-datatable-ordering-desc:text-cyan-500" d="m7 15 5 5 5-5"></path><path class="hs-datatable-ordering-asc:text-cyan-600 dark:hs-datatable-ordering-asc:text-cyan-500" d="m7 9 5-5 5 5"></path></svg></div></th>
                                        <th scope="col" class="py-3 px-6 text-start"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-white">Salio</span><svg class="size-3.5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path class="hs-datatable-ordering-desc:text-cyan-600 dark:hs-datatable-ordering-desc:text-cyan-500" d="m7 15 5 5 5-5"></path><path class="hs-datatable-ordering-asc:text-cyan-600 dark:hs-datatable-ordering-asc:text-cyan-500" d="m7 9 5-5 5 5"></path></svg></div></th>
                                        <th scope="col" class="py-3 px-6 text-start"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-white">Baki Deni</span><svg class="size-3.5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path class="hs-datatable-ordering-desc:text-cyan-600 dark:hs-datatable-ordering-desc:text-cyan-500" d="m7 15 5 5 5-5"></path><path class="hs-datatable-ordering-asc:text-cyan-600 dark:hs-datatable-ordering-asc:text-cyan-500" d="m7 9 5-5 5 5"></path></svg></div></th>

                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                                <?php @$loan_desc = $this->queries->get_total_pay_description($customer_loan->loan_id);
                                      @$remain_balance = $this->queries->get_total_remain_with($customer_loan->loan_id);

                                      // print_r($remain_balance);
                                      // exit();
                                      @$total_recovery = $this->queries->get_total_loan_pend($customer_loan->loan_id);
                                      @$total_penart =   $this->queries->get_total_penart_loan($customer_loan->loan_id);
                                      @$total_deposit_penart =  $this->queries->get_total_paypenart($customer_loan->loan_id);
                                      $penalty_total = (float)($total_penart->total_penart ?? 0);
                                      $penalty_paid = (float)($total_deposit_penart->total_penart_paid ?? 0);
                                      $penalty_balance = max(0, $penalty_total - $penalty_paid);
                                      @$end_deposit = $this->queries->get_end_deposit_time($customer_loan->loan_id);
                                       ?>
                                    <?php if (isset($loan_desc ) && is_array($loan_desc ) && !empty($loan_desc )): ?>
                                        <?php foreach ($loan_desc  as $payisnulls): ?>
                                            <tr>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo $payisnulls->date_data; ?></td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
    <?= $payisnulls->emply ? $payisnulls->emply . ' / ' : ''; ?>
            <?= $payisnulls->description; ?>
            <?= $payisnulls->p_method ? ' / ' . $payisnulls->account_name : ''; ?>
            <?= ($payisnulls->fee_id !== null && $payisnulls->fee_id !== '') ? 
                ' / ' . $payisnulls->fee_desc . ' ' . $payisnulls->fee_percentage . ' ' . $payisnulls->symbol : ''; ?>
            <?= $payisnulls->p_method ? '/' : ''; ?>
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
            <?= ' ' . $payisnulls->session . ' / AC/No. ' . $payisnulls->loan_code; ?>
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
        <h3 class="font-bold text-gray-800 dark:text-white">Jina La Mteja: <?= htmlspecialchars($customer->f_name, ENT_QUOTES, 'UTF-8'); ?></h3>
        <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" data-hs-overlay="#hs-edit-shareholder-modal-<?= $customer->customer_id; ?>">
          <span class="sr-only">Close</span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
      </div>

      <?php echo form_open("oficer/create_withdrow_balance/{$customer->customer_id}"); ?>

<!-- Modal Body -->
<div class="p-4 sm:p-6">
  <div class="grid sm:grid-cols-12 gap-4 sm:gap-6">

    <!-- Total Withdraw -->
    <div class="sm:col-span-6">
      <label for="withdrow_<?php echo $customer->customer_id; ?>" class="block text-sm font-medium mb-2 dark:text-gray-300">
        * Kiasi cha Kugawa:
      </label>
      <input type="text" id="withdrow_<?php echo $customer->customer_id; ?>" name="withdrow"
 value="<?php echo $remain_balance->balance; ?>"
  class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
  required>

    </div>

    <!-- Payment Method -->
    <div class="sm:col-span-6">
      <label for="method_<?php echo $customer->customer_id; ?>" class="block text-sm font-medium mb-2 dark:text-gray-300">
        * Njia Za Malipo:
      </label>
      <select id="method_<?php echo $customer->customer_id; ?>" name="method"
        class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:ring-gray-600" required>
        <option value="" selected disabled>Chagua Malipo</option>
        <?php foreach ($acount as $acounts): ?>
          <option value="<?= $acounts->trans_id; ?>" style="color: #16a34a;"><?= $acounts->account_name; ?> - Salio: <?= number_format(isset($acounts->blanch_capital) ? $acounts->blanch_capital : 0); ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <!-- Date -->
    <div class="sm:col-span-6">
      <label for="with_date_<?php echo $customer->customer_id; ?>" class="block text-sm font-medium mb-2 dark:text-gray-300">
        * Tarehe:
      </label>
      <input type="date" id="with_date_<?php echo $customer->customer_id; ?>" name="with_date"
        value="<?= date('Y-m-d'); ?>"
        class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
        required>
    </div>

  
      <!-- <div class="sm:col-span-6">
      <label for="code_</?php echo $customer->customer_id; ?>" class="block text-sm font-medium mb-2 dark:text-gray-300">
        * Code Number:
      </label>
      <input type="number" placeholder="andika code ya Mteja" id="code_<?php echo $customer->customer_id; ?>" name="code" 
        class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
        >
    </div>     -->

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
      data-hs-overlay="#hs-edit-shareholder-modal-<?= $customer->customer_id; ?>">Funga</button>

     <!-- <a href="<?php echo base_url("oficer/get_loan_code_resend/{$customer->customer_id}"); ?>"
   class="py-2 px-3 btn-primary-sm bg-green-600 hover:bg-cyan-700 text-white flex items-center gap-2"
   onclick="showSvgLoaderAndRedirect(event, this)">
  <span>Resend Code</span>

  <span class="loader-svg hidden w-6 h-6">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"
         width="20" height="20" style="shape-rendering: auto; display: block; background: transparent;">
      <g>
        <circle r="20" fill="#e90c59" cy="50" cx="30">
          <animate begin="-0.5s" values="30;70;30" keyTimes="0;0.5;1" dur="1s"
                   repeatCount="indefinite" attributeName="cx" />
        </circle>
        <circle r="20" fill="#46dff0" cy="50" cx="70">
          <animate begin="0s" values="30;70;30" keyTimes="0;0.5;1" dur="1s"
                   repeatCount="indefinite" attributeName="cx" />
        </circle>
        <circle r="20" fill="#e90c59" cy="50" cx="30">
          <animate begin="-0.5s" values="30;70;30" keyTimes="0;0.5;1" dur="1s"
                   repeatCount="indefinite" attributeName="cx" />
          <animate repeatCount="indefinite" dur="1s"
                   keyTimes="0;0.499;0.5;1" calcMode="discrete"
                   values="0;0;1;1" attributeName="fill-opacity" />
        </circle>
      </g>
    </svg>
  </span>
</a>      -->


    <button type="submit" class="py-2 px-3 btn-primary-sm bg-cyan-600 hover:bg-cyan-700 text-white">Gawa</button>
  </div>
</div>

<?php echo form_close(); ?>

    </div>
  </div>
</div>

  

<!-- here put data -->

<div id="hs-edit-deposit-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all lg:max-w-3xl lg:w-full m-3 lg:mx-auto">
        <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700">
      
      <!-- Modal Header -->
      <div class="py-3 px-4 border-b dark:border-gray-700">
        <?php
          $loan_amount_modal = (float)($loan_int ?? 0);
          $paid_amount_modal = (float)($deposit ?? 0);
          $remain_amount_modal = max(0, $loan_amount_modal - $paid_amount_modal);
          $last_payment_raw = $end_deposit->depost_day ?? $end_deposit->deposit_day ?? null;
          $last_payment_modal = !empty($last_payment_raw) ? date('Y-m-d', strtotime($last_payment_raw)) : '-';
          $loan_status_modal = $customer_loan->loan_status ?? '';
          $loan_status_label_modal = 'N/A';
          $loan_status_class_modal = 'bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-200';
          if ($loan_status_modal === 'withdrawal') {
            $loan_status_label_modal = 'Ndani ya Mkataba';
            $loan_status_class_modal = 'bg-teal-100 text-teal-800 dark:bg-teal-900/40 dark:text-teal-200';
          } elseif ($loan_status_modal === 'out') {
            $loan_status_label_modal = 'Nje ya Mkataba';
            $loan_status_class_modal = 'bg-red-600 text-white';
          }
        ?>
        <div class="flex justify-between items-start gap-3">
          <div>
            <h3 class="font-bold text-gray-800 dark:text-white">Jina La Mteja: <?= htmlspecialchars($customer->f_name, ENT_QUOTES, 'UTF-8'); ?></h3>
            <div class="mt-1">
              <span class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold <?= $loan_status_class_modal; ?>">Hali ya Mteja: <?= $loan_status_label_modal; ?></span>
            </div>
            <div class="mt-2 grid grid-cols-2 sm:grid-cols-4 gap-2 text-xs">
              <div class="rounded-full border border-cyan-200 bg-cyan-50 px-3 py-1.5 text-cyan-800 shadow-sm dark:border-cyan-900 dark:bg-gray-700 dark:text-gray-200">
                <span class="block text-[10px] font-semibold uppercase tracking-wide opacity-80">Mkopo</span>
                <span class="block text-sm font-bold leading-tight"><?= number_format($loan_amount_modal, 2); ?></span>
              </div>
              <div class="rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1.5 text-emerald-800 shadow-sm dark:border-emerald-900 dark:bg-gray-700 dark:text-gray-200">
                <span class="block text-[10px] font-semibold uppercase tracking-wide opacity-80">Lipwa</span>
                <span class="block text-sm font-bold leading-tight"><?= number_format($paid_amount_modal, 2); ?></span>
              </div>
              <div class="rounded-full border border-rose-200 bg-rose-50 px-3 py-1.5 text-rose-800 shadow-sm dark:border-rose-900 dark:bg-gray-700 dark:text-gray-200">
                <span class="block text-[10px] font-semibold uppercase tracking-wide opacity-80">Baki</span>
                <span class="block text-sm font-bold leading-tight"><?= number_format($remain_amount_modal, 2); ?></span>
              </div>
              <div class="rounded-full border border-amber-200 bg-amber-50 px-3 py-1.5 text-amber-800 shadow-sm dark:border-amber-900 dark:bg-gray-700 dark:text-gray-200">
                <span class="block text-[10px] font-semibold uppercase tracking-wide opacity-80">Malipo ya Mwisho</span>
                <span class="block text-sm font-bold leading-tight"><?= $last_payment_modal; ?></span>
              </div>
            </div>
          </div>
          <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" data-hs-overlay="#hs-edit-deposit-modal">
            <span class="sr-only">Close</span>
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
          </button>
        </div>
      </div>




      <?php
        $out_stand_modal = $this->queries->get_outstand_loan_customer($customer_loan->loan_id ?? 0);
      ?>
      <?php echo form_open("oficer/deposit_loan/{$customer->customer_id}"); ?>
<!-- Modal Body -->
<div class="p-4 sm:p-6">
  <div class="grid sm:grid-cols-12 gap-4 sm:gap-6">

    <!-- Loan Applied -->
    <div class="sm:col-span-6">
      <label class="block text-sm font-medium mb-2 dark:text-gray-300">* Loan Applied:</label>
      <input type="text" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
        value="<?= number_format($loan_int, 0); ?>" readonly>
    </div>

    <!-- Amount Paid -->
    <div class="sm:col-span-6">
      <label class="block text-sm font-medium mb-2 dark:text-gray-300">* Amount Paid:</label>
      <input type="text" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
        value="<?php
          if ($deposit > $loan_int) {
            echo number_format($loan_int, 0) . ' (' . number_format($deposit - $loan_int, 0) . ')';
          } else {
            echo number_format($deposit, 0);
          }
        ?>" readonly>
    </div>

    <!-- Due Amount -->
    <div class="sm:col-span-6">
      <label class="block text-sm font-medium mb-2 dark:text-gray-300">* Due Amount:</label>
      <input type="text" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
        value="<?= $deposit > $loan_int ? '0' : number_format(max(0, $loan_int - $deposit), 0); ?>" readonly>
    </div>

    <!-- Recovery / Default Amount (conditional) -->
    <div class="sm:col-span-6">
      <?php if (($customer_loan->loan_status ?? '') === 'withdrawal'): ?>
        <label class="block text-sm font-medium mb-2 dark:text-gray-300">Recovery Amount</label>
        <input type="text" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
          value="<?= number_format($total_recovery->total_pending ?? 0, 0); ?>" readonly style="color:red">
      <?php elseif (($customer_loan->loan_status ?? '') === 'out'): ?>
        <label class="block text-sm font-medium mb-2" style="color:red">Default Amount</label>
        <input type="text" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
          value="<?= number_format($out_stand_modal->total_out ?? 0, 0); ?>" readonly style="color:red">
      <?php else: ?>
        <label class="block text-sm font-medium mb-2 dark:text-gray-300">Recovery Amount</label>
        <input type="text" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
          value="0" readonly style="color:red">
      <?php endif; ?>
    </div>

    <!-- Penalt (balance only) -->
    <div class="sm:col-span-6">
      <label class="block text-sm font-medium mb-2 dark:text-gray-300">* Penalt:</label>
      <input type="text" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
        value="<?= number_format($penalty_balance, 0); ?>" readonly style="color:#ef4444">
    </div>

    <!-- Deposit (editable) -->
    <div class="sm:col-span-6">
      <label for="depost_display" class="block text-sm font-medium mb-2 dark:text-gray-300">* Deposit:</label>
      <input type="text" id="depost_display"
        class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
        placeholder="0" required>
      <input type="hidden" name="depost" id="depost">
    </div>

    <!-- Payment Method -->
    <div class="sm:col-span-6">
      <label for="p_method" class="block text-sm font-medium mb-2 dark:text-gray-300">
        * Njia Za Malipo:
      </label>
      <select id="p_method" name="p_method"
        class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:ring-gray-600">
        <option value="">Chagua Malipo</option>
        <?php foreach ($acount as $acounts): ?>
          <option value="<?= $acounts->trans_id; ?>" style="color: #16a34a;"><?= $acounts->account_name; ?> - Salio: <?= number_format(isset($acounts->blanch_capital) ? $acounts->blanch_capital : 0); ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="sm:col-span-6" id="wakala-field" style="display:none;">
      <label for="wakala" class="block text-sm font-medium mb-2 dark:text-gray-300">
        * Jina la Wakala:
      </label>
      <input type="text" id="wakala" name="wakala"
        class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600">
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

    <button type="submit" class="py-2 px-3 btn-primary-sm bg-cyan-600 hover:bg-cyan-700 text-white">Weka</button>
  </div>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Include Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>
  
  // Disable submit button on submit
  document.querySelector('form').addEventListener('submit', function () {
    const btn = this.querySelector('button[type="submit"]');
    btn.disabled = true;
    btn.innerText = 'Processing...';
  });
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const methodSelect = document.getElementById("p_method");
    const wakalaField = document.getElementById("wakala-field");
    const wakalaInput = document.getElementById("wakala");

    methodSelect.addEventListener("change", function () {
    let selectedText = methodSelect.options[methodSelect.selectedIndex].text.toLowerCase();
    // Remove appended balance text like " - Salio: 1,000" before checking method name.
    let methodName = selectedText.split(" - salio:")[0].trim();
    let wakalaRequired = (methodName !== "cash");

    if (wakalaRequired) {
            wakalaField.style.display = "block";
            wakalaInput.setAttribute("required", "required");
        } else {
            wakalaField.style.display = "none";
            wakalaInput.removeAttribute("required");
            wakalaInput.value = ""; // clear old value
        }
    });
});
</script>


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
  const displayInput = document.getElementById('depost_display');
  const hiddenInput = document.getElementById('depost');

  displayInput.addEventListener('input', function () {
    // Remove non-digits and commas
    let rawValue = this.value.replace(/,/g, '').replace(/\D/g, '');

    if (rawValue === '') {
      hiddenInput.value = '';
      this.value = '';
      return;
    }

    // Format with commas for display
    this.value = parseInt(rawValue).toLocaleString('en-US');

    // Set hidden input without commas for submission
    hiddenInput.value = rawValue;
  });
</script>


<script>
function showSvgLoaderAndRedirect(event, el) {
  event.preventDefault();

  // Show the SVG loader
  const loader = el.querySelector('.loader-svg');
  loader.classList.remove('hidden');

  // Disable further clicks
  el.classList.add('pointer-events-none', 'opacity-70');

  // Redirect
  window.location.href = el.href;
}
</script>



