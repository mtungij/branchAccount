<?php
include_once APPPATH . "views/partials/header.php";

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
    $candidates[] = 'assets/dhamana/' . $raw;
    $candidates[] = 'assets/sponser_passport/' . $raw;
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
<div class="w-full lg:ps-64 min-h-screen bg-gray-100 dark:bg-gray-900">
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

        <div class="bg-gray-100 dark:bg-gray-900">
    <div class="w-full bg-cyan-600 text-white">
        <div class="flex flex-col max-w-screen-xl px-4 mx-auto md:flex-row md:justify-between md:px-6 lg:px-8">
            <div class="p-4 flex flex-row items-center justify-between">
                <a href="#" class="text-lg font-semibold tracking-widest uppercase rounded-lg focus:outline-none focus:shadow-outline">
                Payment dashboard
                </a>
            </div>
        </div>
    </div>
</div>
     <!-- </?php @$loan_desc = $this->queries->get_total_pay_description($customer_loan->loan_id);
                                    @$remain_balance = $this->queries->get_total_remain_with($customer_loan->loan_id);
                                    @$total_recovery = $this->queries->get_total_loan_pend($customer_loan->loan_id);
                                    @$total_penart = $this->queries->get_total_penart_loan($customer_loan->loan_id);
                                    @$total_deposit_penart = $this->queries->get_total_paypenart($customer_loan->loan_id);
                                    @$end_deposit = $this->queries->get_end_deposit_time($customer_loan->loan_id);
                                    ?> -->

                                                             </?php //print_r($end_deposit); ?>

<?php
  $customer_loan = !empty($customer->customer_id) ? $this->queries->get_loan_active_customer($customer->customer_id) : null;
  $total_deposit = $this->queries->get_total_amount_paid_loan($customer_loan->loan_id ?? 0);
  $out_stand = $this->queries->get_outstand_loan_customer($customer_loan->loan_id ?? 0);
  $loan_int = $customer_loan->loan_int ?? 0;
  $deposit = $total_deposit->total_Deposit ?? 0;
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

<div class="w-full">
  <div class="md:flex md:justify-between md:items-start md:space-x-2">

    <div class="w-full md:w-1/6 mb-4 md:mb-0">
      <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 p-4 border-t-4 border-t-green-500 rounded-lg shadow-md">
        <div class="image overflow-hidden mb-4 text-center">
          <img class="w-32 h-32 mx-auto rounded-full object-cover border-4 border-green-400" src="<?= $customer_passport_src ?>" alt="Customer Passport">
        </div>
        <h1 class="text-green-600 font-bold text-xl text-center uppercase whitespace-nowrap overflow-hidden truncate">
          <?= strtoupper($customer->f_name) . " " . strtoupper($customer->m_name) . " " . strtoupper($customer->l_name) ?>
        </h1>
        <h2 class="text-sm text-green-500 text-center font-semibold">(<?= $customer->famous_area; ?>)</h2>
        <p class="text-center mt-2 text-gray-800 dark:text-gray-200 font-medium"><?= $customer->phone_no; ?></p>

        <div class="mt-4 flex flex-col gap-2">
          <button type="button"
                  data-hs-overlay="#view-customer-modal-<?= $customer->customer_id; ?>"
                  class="inline-flex items-center justify-center px-4 py-2 bg-cyan-600 hover:bg-cyan-700 text-white text-sm font-semibold rounded-lg shadow-md transition-all">
            👤 Badilisha Namba Ya Simu
          </button>
          <a href="<?= base_url('Admin/send_payment/' . $customer->customer_id); ?>"
             class="inline-flex items-center justify-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold rounded-lg shadow-md transition-all">
            📩 Tuma SMS ya Malipo
          </a>
        </div>

        <?php if (!empty($customer->customer_id) && !empty($customer_loan->loan_id) && !empty($customer_loan->loan_status) && in_array($customer_loan->loan_status, ['withdrawal', 'out', 'done'], true)): ?>
        <div class="mt-3 text-center">
          <a href="<?= base_url('adminr/view_aggrement/' . $customer->customer_id . '/' . $customer_loan->loan_id); ?>" target="_blank"
             class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full bg-cyan-100 text-cyan-800 hover:bg-cyan-200 transition-all">
            Tazama Mkataba wa Mkopo
          </a>
        </div>
        <?php endif; ?>

        <?php if (!empty($customer_loan->loan_id)): ?>
        <div class="mt-2 text-center">
          <a href="<?= base_url('admin/loan_schedule_detail/' . $customer_loan->loan_id); ?>"
             class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800 hover:bg-blue-200 transition-all dark:bg-blue-900/30 dark:text-blue-300 dark:hover:bg-blue-900/50">
            Ratiba ya Mkopo
          </a>
        </div>
        <?php endif; ?>

        <ul class="mt-5 bg-gray-100 text-gray-700 divide-y divide-gray-300 rounded-lg shadow-sm text-sm dark:bg-gray-900 dark:text-gray-200 dark:divide-gray-700 dark:border dark:border-gray-700">
          <li class="flex items-center justify-between py-2 px-3">
            <span class="font-bold text-base">Status</span>
            <span class="px-3 py-1 rounded-full text-xs font-medium <?= $status_class; ?>"><?= $status_label; ?></span>
          </li>
          <li class="flex items-center justify-between py-2 px-3 font-bold text-base"><span>Code</span><span><?= $customer->code; ?></span></li>
          <li class="flex items-center justify-between py-2 px-3 font-bold text-base"><span>Gawa</span><span><?= $customer_loan->loan_stat_date ?? 'YY-MM-DD'; ?></span></li>
          <li class="flex items-center justify-between py-2 px-3 font-bold text-base"><span>Mwisho</span><span><?= !empty($customer_loan->loan_end_date) ? substr($customer_loan->loan_end_date, 0, 10) : 'YY-MM-DD'; ?></span></li>
          <li class="flex items-center justify-between py-2 px-3 font-bold text-base"><span>Rejesho</span><span><?= safe_number_format($customer_loan->restration ?? 0); ?></span></li>
        </ul>

        <div class="mt-6">
          <h3 class="text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2">📎 Customer Documents:</h3>
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

    <div class="w-full md:w-4/6 mb-4 md:mb-0">
      <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 p-4 rounded-lg shadow-md overflow-auto">
        <h2 class="text-lg font-bold text-green-600 mb-3">Loan Information</h2>
        <table class="min-w-full text-sm text-left text-gray-700 dark:text-gray-200 border border-gray-200 dark:border-gray-700">
          <thead class="bg-green-100 text-green-800 font-semibold dark:bg-gray-700 dark:text-gray-200">
            <tr>
              <th class="px-4 py-2 border-b">Loan Amount</th>
              <th class="px-4 py-2 border-b">Paid Amount</th>
              <th class="px-4 py-2 border-b">Remain Debt</th>
            </tr>
          </thead>
          <tbody>
            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/40">
              <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700"><?= safe_number_format($loan_int); ?></td>
              <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700"><?= $deposit > $loan_int ? safe_number_format($deposit - $loan_int) : safe_number_format($deposit); ?></td>
              <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700"><?= safe_number_format(max(0, $loan_int - $deposit)); ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="w-full md:w-1/6">
      <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 p-4 border-t-4 border-t-green-500 rounded-lg shadow-md">
        <div class="image overflow-hidden mb-4 text-center">
          <img class="w-32 h-32 mx-auto rounded-full object-cover border-4 border-green-400" src="<?= $sponsor_passport_src ?>" alt="Sponsor Passport">
        </div>
        <h1 class="text-green-600 font-bold text-xl text-center uppercase whitespace-nowrap overflow-hidden truncate">
          <?= strtoupper($customer->sp_name) . " " . strtoupper($customer->sp_mname) . " " . strtoupper($customer->sp_lname) ?>
        </h1>
        <h2 class="text-sm text-green-500 text-center font-semibold">(<?= $customer->famous_area; ?>)</h2>
        <p class="text-center mt-2 text-gray-800 dark:text-gray-200 font-medium"><?= $customer->sp_phone_no; ?></p>

        <ul class="mt-5 bg-gray-100 text-gray-700 divide-y divide-gray-300 rounded-lg shadow-sm text-sm dark:bg-gray-900 dark:text-gray-200 dark:divide-gray-700 dark:border dark:border-gray-700">
          <li class="flex items-center justify-between py-2 px-3"><span>Namba ya Simu</span><span><?= $customer->sp_phone_no; ?></span></li>
          <li class="flex items-center justify-between py-2 px-3"><span>Uhusiano</span><span><?= ucfirst($customer->sp_relation) ?></span></li>
          <li class="flex items-center justify-between py-2 px-3"><span>Biashara/Kazi</span><span><?= $customer->nature; ?></span></li>
        </ul>

        <div class="mt-6">
          <h3 class="text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2">📎 Sponsor Documents:</h3>
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

<div class="p-4 md:p-6">
                  <?php echo form_open("admin/search_customerData", [
    'novalidate' => true,
    'id' => 'customerSearchForm'
]); ?>

    <div class="w-full  md:flex-row items-center ">
        <!-- Search Dropdown -->
        <div class="w-full">
            <label for="branchSelect" class="block text-sm font-medium mb-1 text-gray-700 dark:text-gray-200">* Search Customer:</label>
            <select id="branchSelect" required name="customer_id"
              class="py-2 px-3 block w-full bg-white text-gray-900 border border-gray-300 rounded-md text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 select2">
                <option value="">Search Customer</option>
                <?php foreach ($customery as $customers): ?>
                    <option value="<?= $customers->customer_id ?>">
                        <?= strtoupper($customers->f_name . " " . $customers->m_name . " " . $customers->l_name); ?> /
                        <?= strtoupper($customers->customer_code); ?> /
                        <?= strtoupper($customers->blanch_name); ?> /
                        <?= strtoupper($customers->empl_name); ?>

                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Search Button -->

    </div>

    <input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">

    <?php echo form_close(); ?>
</div>

<div class="px-4 md:px-6 pb-2">
  <div class="flex justify-end items-center gap-2">
    <?php if (!empty($customer_loan->loan_status)) {
      $status = $customer_loan->loan_status;

      if ($status === 'withdrawal' || $status === 'out') { ?>
        <button type="button" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-scale-animation-modal" data-hs-overlay="#hs-edit-deposit-modal">
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4Z"/>
          </svg>
          Deposit
        </button>
      <?php } elseif ($status === 'disbarsed') { ?>
        <button type="button" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-green-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-basic-modal" data-hs-overlay="#hs-edit-shareholder-modal-<?= $customer->customer_id; ?>">
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4Z"/>
          </svg>
          Withdraw
        </button>
      <?php } elseif ($status === 'done') { ?>
        <button id="defaultModalButton"
          data-modal-target="defaultModal"
          data-modal-toggle="defaultModal"
          type="button"
          class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 transition-colors duration-200">
          Samehe Penalt
        </button>
      <?php }
    } ?>
  </div>
</div>

       

                <div class="overflow-x-auto">
                    <div class="min-w-full inline-block align-middle">
                        <div class="border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg overflow-hidden">
                           <div class="bg-cyan-600 px-4 py-2">
        <h2 class="text-white font-semibold text-lg uppercase">Min Statement</h2>
    </div>
                              <table class="w-full divide-y divide-gray-200 dark:divide-gray-700 table-auto" id="shareholder_table">
                                <thead class="bg-gray-100 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="py-3 px-6 text-start"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-300">Date</span></div></th>
                            <th scope="col" class="py-3 px-6 text-start w-[36%]"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-300">description</span><svg class="size-3.5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path class="hs-datatable-ordering-desc:text-cyan-600 dark:hs-datatable-ordering-desc:text-cyan-500" d="m7 15 5 5 5-5"></path><path class="hs-datatable-ordering-asc:text-cyan-600 dark:hs-datatable-ordering-asc:text-cyan-500" d="m7 9 5-5 5 5"></path></svg></div></th>
                                        <th scope="col" class="py-3 px-6 text-start"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-300">Deposit</span><svg class="size-3.5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path class="hs-datatable-ordering-desc:text-cyan-600 dark:hs-datatable-ordering-desc:text-cyan-500" d="m7 15 5 5 5-5"></path><path class="hs-datatable-ordering-asc:text-cyan-600 dark:hs-datatable-ordering-asc:text-cyan-500" d="m7 9 5-5 5 5"></path></svg></div></th>
                                         <th scope="col" class="py-3 px-6 text-start"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-300">Withdraw</span><svg class="size-3.5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path class="hs-datatable-ordering-desc:text-cyan-600 dark:hs-datatable-ordering-desc:text-cyan-500" d="m7 15 5 5 5-5"></path><path class="hs-datatable-ordering-asc:text-cyan-600 dark:hs-datatable-ordering-asc:text-cyan-500" d="m7 9 5-5 5 5"></path></svg></div></th>
                                        <th scope="col" class="py-3 px-6 text-start"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-300">Balance</span><svg class="size-3.5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path class="hs-datatable-ordering-desc:text-cyan-600 dark:hs-datatable-ordering-desc:text-cyan-500" d="m7 15 5 5 5-5"></path><path class="hs-datatable-ordering-asc:text-cyan-600 dark:hs-datatable-ordering-asc:text-cyan-500" d="m7 9 5-5 5 5"></path></svg></div></th>
                                           <th scope="col" class="py-3 px-6 text-start"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-300">Deni</span><svg class="size-3.5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path class="hs-datatable-ordering-desc:text-cyan-600 dark:hs-datatable-ordering-desc:text-cyan-500" d="m7 15 5 5 5-5"></path><path class="hs-datatable-ordering-asc:text-cyan-600 dark:hs-datatable-ordering-asc:text-cyan-500" d="m7 9 5-5 5 5"></path></svg></div></th>

                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                                <?php @$loan_desc = $this->queries->get_total_pay_description($customer_loan->loan_id);

    //    echo "<pre>";
    //   print_r( $loan_desc);
    //  echo "</pre>";
    //   exit();
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
    <td class="uppercase px-6 py-4 text-sm text-gray-800 dark:text-gray-200 whitespace-normal wrap-break-word max-w-md leading-6">
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
        <h3 class="font-bold text-gray-800 dark:text-white">Jina La Mteja: <?= htmlspecialchars($customer->f_name, ENT_QUOTES, 'UTF-8'); ?></h3>
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
      <label for="withdrow_<?php echo $customer->customer_id; ?>" class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-200">
        * Amount to withdraw:
      </label>
      <input type="text" id="withdrow_<?php echo $customer->customer_id; ?>" name="withdrow"
  value="<?= htmlspecialchars(!empty($remain_balance->balance) ? $remain_balance->balance : 0, ENT_QUOTES, 'UTF-8'); ?>"
  class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
  required>

    </div>

    <!-- Payment Method -->
    <div class="sm:col-span-6">
      <label for="method_<?php echo $customer->customer_id; ?>" class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-200">
        * Njia Za Malipo:
      </label>
      <select id="method_<?php echo $customer->customer_id; ?>" name="method"
        class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:ring-gray-600" required>
        <option value="" selected disabled>Chagua Malipo</option>
        <?php foreach ($acount as $acounts): ?>
          <option value="<?= $acounts->trans_id; ?>"><?= $acounts->account_name; ?> - Salio: <?= number_format(isset($acounts->blanch_capital) ? $acounts->blanch_capital : 0); ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <!-- Date -->
    <div class="sm:col-span-6">
      <label for="with_date_<?php echo $customer->customer_id; ?>" class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-200">
        * Tarehe:
      </label>
      <input type="date" id="with_date_<?php echo $customer->customer_id; ?>" name="with_date"
        value="<?= date('Y-m-d'); ?>"
        class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
        required>
    </div>

    <!-- Code -->
    <!-- <div class="sm:col-span-6">
      <label for="code_</?php echo $customer->customer_id; ?>" class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-200">
        * Code Number:
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
      data-hs-overlay="#hs-edit-shareholder-modal-<?= $customer->customer_id; ?>">Funga</button>

    <!-- <a href="</?php echo base_url("admin/get_loan_code_resend/{$customer->customer_id}"); ?>"
      class="py-2 px-3 btn-gray-sm bg-green-600 hover:bg-cyan-700 text-white">
      Resend Code
    </a> -->

    <button type="submit" class="py-2 px-3 btn-gray-sm bg-cyan-600 hover:bg-cyan-700 text-white">Gawa</button>
  </div>
</div>

<?php echo form_close(); ?>

    </div>
  </div>
</div>


<div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                   Taarifa Ya Faini
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <?php 
   $jumla_faini    = (float)($total_penart->total_penart ?? 0);
   $faini_alilipa  = (float)($total_deposit_penart->total_penart_paid ?? 0);
   $faini_baki     = $jumla_faini - $faini_alilipa;
?>

<?php echo form_open("admin/samehe_faini/{$customer->customer_id}"); ?>
<div class="grid gap-4 mb-4 sm:grid-cols-2">
    <div>
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">

            Jumla Ya Faini
        </label>
        <input type="text" name="name" id="name" 
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-600 focus:border-gray-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"
            value="<?php echo number_format($jumla_faini, 0, '', ','); ?>" required>
    </div>
    <div>
        <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Faini Aliyolipa
        </label>
        <input type="text" name="brand" id="brand" 
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-600 focus:border-gray-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"     
            value="<?php echo number_format($faini_alilipa, 0, '', ','); ?>" required>
    </div>
    <div>
        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Faini Iliyo Baki Kulipwa
        </label>
        <input type="text" name="price" id="price" 
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-600 focus:border-gray-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" 
            value="<?php echo number_format($faini_baki, 0, '', ','); ?>" required>
    </div>

    <input type="hidden" value="<?php echo $customer_loan->loan_id; ?>" name="loan_id">
    <input type="hidden" value="<?php echo $customer->customer_id; ?>" name="customer_id">
    <input type="hidden" value="<?php echo $customer->comp_id; ?>" name="comp_id">
    <input type="hidden" value="<?php echo $customer->blanch_id; ?>" name="blanch_id">
    <input type="hidden" name="status" value="checked">

</div>

<button type="submit" 
    class="inline-flex items-center 
           text-black dark:text-white 
           bg-red-500 hover:bg-red-600 
           focus:ring-4 focus:outline-none focus:ring-red-300 
           dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800
           font-medium rounded-lg text-sm px-5 py-2.5 text-center">
    <svg class="mr-1 -ml-1 w-6 h-6" 
         fill="currentColor" 
         viewBox="0 0 20 20" 
         xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" 
              d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" 
              clip-rule="evenodd"></path>
    </svg>
    Samehe Faini
</button>

<?php echo form_close(); ?>

        </div>
    </div>
</div>
  

<!-- here put data -->

<div id="hs-edit-deposit-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all lg:max-w-3xl lg:w-full m-3 lg:mx-auto">
        <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700">
      
      <!-- Modal Header -->
      <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
       

         <h7  class="font-bold text-gray-800 dark:text-white"><?php echo $customer->f_name; ?>
                    <?php echo $customer->m_name; ?> <?php echo $customer->l_name; ?><br>With Date:<?php if (@$customer_loan->loan_stat_date == TRUE) {
                               ?>
                        <?php echo @$customer_loan->loan_stat_date; ?>
                    <?php } elseif (@$customer_loan->loan_stat_date == FALSE) {
                               ?>
                        YY-MM-DD
                    <?php } ?> - End Date: <?php if (@$customer_loan->loan_end_date == TRUE) {
                           ?>
                        <?php echo substr(@$customer_loan->loan_end_date, 0, 10); ?>
                    <?php } elseif (@$customer_loan->loan_end_date == FALSE) {
                           ?>
                        YY-MM-DD
                    <?php } ?> <br> End Deposit Amount : <?php echo number_format(@$end_deposit->depost); ?> <br>Deposit
                    Time : <?php echo @$end_deposit->deposit_day; ?>
                </h7>

        <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" data-hs-overlay="#hs-edit-deposit-modal">
          <span class="sr-only">Close</span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
      </div>

      <?php echo form_open("admin/deposit_loan/{$customer_loan->customer_id}"); ?>
<!-- Modal Body -->
<div class="p-4 sm:p-6">
  <div class="grid sm:grid-cols-12 gap-4 sm:gap-6">


  <div class="sm:col-span-6">
      <label for="depost" class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-200">
        * Loan Applied:
      </label>
      <input type="text" id="depost" name="depost"
        class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
         value="<?php echo number_format(@$customer_loan->loan_int); ?>" readonly>
    </div>

     <div class="sm:col-span-6">
      <label for="depost" class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-200">
        *Amount Paid:
      </label>
      <input type="text" id="depost" name="depost"
        class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
         value="<?php if (@$total_deposit->total_Deposit > @$customer_loan->loan_int) {
                            ?>
                                        <?php echo number_format(@$customer_loan->loan_int); ?>
                                         (<?php echo number_format(@$total_deposit->total_Deposit - @$customer_loan->loan_int); ?>)
                                             <?php } else { ?><?php echo number_format(@$total_deposit->total_Deposit); ?>
                                                 <?php } ?>" readonly>
    </div>

    

        <div class="sm:col-span-6">
      <label for="depost" class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-200">
        * Due Amount:
      </label>
      <input type="text" id="depost" name="depost"
        class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
       value="<?php if (@$total_deposit->total_Deposit > @$customer_loan->loan_int) {
                            ?>
                                                 0.00
                                                 <?php } else { ?><?php echo number_format(@$customer_loan->loan_int - @$total_deposit->total_Deposit); ?>
                                                <?php } ?>" readonly>
    </div>


     <div class="sm:col-span-6">
      

          <?php if ($customer_loan->loan_status == 'withdrawal') {
                            ?>
                            <span class="block text-sm font-medium mb-2 dark:text-gray-300">Recovery Amount</span>
                            <input type="text" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
                                value="<?php echo number_format($total_recovery->total_pending); ?>.00" readonly
                                style="color:red">
                        <?php } elseif ($customer_loan->loan_status == 'out') {
                            ?>
                            <span style="color:red;">Default Amount</span>
                            <input type="text" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
                            value="<?php echo number_format($out_stand->total_out ?? 0); ?>.00" readonly style="color:red">
                        <?php } else { ?>
                            <span>Recovery Amount</span>
                            <input type="text" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
                                value="0.00" readonly style="color:red">
                        <?php } ?>

    </div>


      <div class="sm:col-span-6">
        <label for="penalty_display" class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-200">
        * Penalt:
      </label>
        <input type="text" id="penalty_display" name="penalty_display"
        class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
        value="<?php echo number_format($total_penart->total_penart - $total_deposit_penart->total_penart_paid); ?>.00"
                            readonly style="color:red">
    </div>


    <div class="sm:col-span-6">
      <label for="depost" class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-200">
        * Deposit:
      </label>
      <input type="text" id="depost" name="depost"
        class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
        required>
    </div>

    <!-- Payment Method -->
    <div class="sm:col-span-6">
      <label for="p_method" class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-200">
        * Njia Za Malipo:
      </label>
      <select id="p_method" name="p_method"
        class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:ring-gray-600"
        onchange="handlePaymentChange(this)" required>
        <option value="">Chagua Malipo</option>
        <?php foreach ($acount as $acounts): ?>
          <option value="<?= $acounts->trans_id; ?>" data-label="<?= strtolower(trim($acounts->account_name)); ?>">
            <?= $acounts->account_name; ?> - Salio: <?= number_format(isset($acounts->blanch_capital) ? $acounts->blanch_capital : 0); ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <!-- Wakala Field -->
    <div class="sm:col-span-6" id="wakala_field" style="display:none;">
      <label for="wakala_name" class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-200">
        * Jina la Wakala:
      </label>
      <input type="text" id="wakala_name" name="wakala_name" 
        class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600">
    </div>

    <!-- Date -->
    <div class="sm:col-span-6">
      <label for="deposit_date" class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-200">
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

    <button type="submit" class="py-2 px-3 btn-gray-sm bg-cyan-600 hover:bg-cyan-700 text-white">Deposit</button>
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
.dark .select2-container--default .select2-selection--single {
  background-color: #374151;
  border-color: #4b5563;
  color: #d1d5db;
}
.select2-selection__rendered,
.select2-selection__clear,
.select2-selection__arrow {
  color: #374151;
}
.dark .select2-selection__rendered,
.dark .select2-selection__clear,
.dark .select2-selection__arrow {
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
  background-color: #ffffff;
  color: #111827;
  border: 1px solid #d1d5db;
    border-radius: 0.5rem;
    padding: 0.5rem;
}
.dark .custom-select2-dropdown {
  background-color: #1f2937;
  color: #d1d5db;
  border-color: #374151;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
  color: #111827 !important;
}
.dark .select2-container--default .select2-selection--single .select2-selection__rendered {
  color: #ffffff !important;
}
.custom-select2-dropdown .select2-results__option--highlighted {
  background-color: #06b6d4 !important;
    color: #ffffff !important;
}

.select2-search__field {
  color: #111827 !important;
  background-color: #ffffff !important;
  border: 1px solid #d1d5db;
}
.dark .select2-search__field {
  color: #ffffff !important;
  background-color: #1f2937 !important;
  border-color: #374151;
}
.custom-select2-dropdown .select2-results__option--highlighted {
    background-color: #06b6d4;
    color: #ffffff;
}
.custom-select2-container { margin: 0; }
</style> 

<script>
  const depostInput = document.getElementById('depost');

  // Format with commas while typing
  depostInput.addEventListener('input', function (e) {
    let value = e.target.value.replace(/,/g, '').replace(/[^\d.]/g, '');
    if (value) {
      const parts = value.split('.');
      parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      e.target.value = parts.join('.');
    }
  });

  // Remove commas before form submission
  depostInput.form.addEventListener('submit', function () {
    depostInput.value = depostInput.value.replace(/,/g, '');
  });
</script>

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

<!-- View/Edit Customer Modal -->
<div id="view-customer-modal-<?= $customer->customer_id; ?>" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
  <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all w-full max-w-full sm:max-w-lg md:max-w-2xl lg:max-w-4xl m-2 sm:m-3 sm:mx-auto">
    <div class="flex flex-col bg-white border shadow-sm rounded-lg sm:rounded-xl dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7] pointer-events-auto">
      
      <!-- Modal Header -->
      <div class="flex justify-between items-center py-2 px-3 sm:py-3 sm:px-4 border-b dark:border-gray-700 bg-cyan-600 text-white rounded-t-lg sm:rounded-t-xl">
        <h3 class="font-bold text-sm sm:text-base md:text-lg flex items-center">
          <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-1 sm:mr-2" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
          </svg>
          <span class="truncate">Customer Information</span>
        </h3>
        <button type="button" class="size-7 sm:size-8 inline-flex justify-center items-center rounded-full border border-transparent bg-gray-100/90 hover:bg-gray-200 text-cyan-700 dark:bg-gray-700/70 dark:hover:bg-gray-700 dark:text-gray-200 flex-shrink-0" data-hs-overlay="#view-customer-modal-<?= $customer->customer_id; ?>">
          <span class="sr-only">Close</span>
          <svg class="size-3 sm:size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
      </div>

      <!-- Modal Body -->
      <div class="p-3 sm:p-4 md:p-6 overflow-y-auto max-h-[60vh] sm:max-h-[70vh]">
        <?= form_open("admin/update_customer_info"); ?>
        <input type="hidden" name="customer_id" value="<?= $customer->customer_id; ?>">
        <input type="hidden" name="comp_id" value="<?= $customer->comp_id; ?>">
        
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4 md:gap-5">
          
          <!-- Personal Information Section -->
          <div class="col-span-1 sm:col-span-2">
            <h4 class="text-xs sm:text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 sm:mb-3 border-b pb-2">Personal Information</h4>
          </div>
          
          <div class="col-span-1 sm:col-span-2 md:col-span-1">
            <label class="block text-xs sm:text-sm font-medium mb-1 sm:mb-2 dark:text-white">First Name <span class="text-red-500">*</span></label>
            <input type="text" name="f_name" value="<?= $customer->f_name; ?>" required
                   class="py-2 sm:py-2.5 md:py-3 px-3 sm:px-4 block w-full border-gray-200 rounded-lg text-xs sm:text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
          </div>

          <div class="col-span-1 sm:col-span-2 md:col-span-1">
            <label class="block text-xs sm:text-sm font-medium mb-1 sm:mb-2 dark:text-white">Middle Name</label>
            <input type="text" name="m_name" value="<?= $customer->m_name; ?>"
                   class="py-2 sm:py-2.5 md:py-3 px-3 sm:px-4 block w-full border-gray-200 rounded-lg text-xs sm:text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
          </div>

          <div class="col-span-1 sm:col-span-2 md:col-span-1">
            <label class="block text-xs sm:text-sm font-medium mb-1 sm:mb-2 dark:text-white">Last Name <span class="text-red-500">*</span></label>
            <input type="text" name="l_name" value="<?= $customer->l_name; ?>" required
                   class="py-2 sm:py-2.5 md:py-3 px-3 sm:px-4 block w-full border-gray-200 rounded-lg text-xs sm:text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
          </div>

         

          <div class="col-span-1 sm:col-span-2 md:col-span-1">
            <label class="block text-xs sm:text-sm font-medium mb-1 sm:mb-2 dark:text-white">Phone Number <span class="text-red-500">*</span></label>
            <input type="text" name="phone_no" value="<?= $customer->phone_no; ?>" required
                   class="py-2 sm:py-2.5 md:py-3 px-3 sm:px-4 block w-full border-gray-200 rounded-lg text-xs sm:text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
          </div>

       

         

        </div>
        
      </div>

      <!-- Modal Footer -->
      <div class="flex flex-col sm:flex-row justify-end items-stretch sm:items-center gap-2 py-2 px-3 sm:py-3 sm:px-4 border-t dark:border-gray-700">
        <button type="button" class="w-full sm:w-auto py-2 px-3 inline-flex justify-center items-center gap-x-2 text-xs sm:text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800" data-hs-overlay="#view-customer-modal-<?= $customer->customer_id; ?>">
          Close
        </button>
        <button type="submit" class="w-full sm:w-auto py-2 px-3 inline-flex justify-center items-center gap-x-2 text-xs sm:text-sm font-semibold rounded-lg border border-transparent bg-cyan-600 text-white hover:bg-cyan-700">
          <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="currentColor" viewBox="0 0 20 20">
            <path d="M7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V6h5a2 2 0 012 2v7a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2h5v5.586l-1.293-1.293zM9 4a1 1 0 012 0v2H9V4z"/>
          </svg>
          Update Information
        </button>
      </div>
      
      <?= form_close(); ?>
    </div>
  </div>
</div>
