<?php
include_once APPPATH . "views/partials/header.php";
?>

<div class="w-full lg:ps-64">
  <div class="overflow-x-auto">

    <?php if(@$customer->f_name == TRUE): ?>
      
      <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="w-full">
          
          <!-- Flash Message -->
          <?php if ($das = $this->session->flashdata('massage')): ?>
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative dark:bg-green-900 dark:border-green-700 dark:text-green-300" role="alert">
              <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span><?php echo $das; ?></span>
              </div>
              <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.remove()">
                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
              </button>
            </div>
          <?php endif; ?>

          <!-- Customer Profile Card -->
          <div class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg overflow-hidden mb-4">
            <div class="p-4 sm:p-6">
              <div class="flex flex-col lg:flex-row gap-4 sm:gap-6">
                
                <!-- Customer Photo -->
                <div class="flex-shrink-0 mx-auto lg:mx-0">
                  <?php if ($customer->passport == TRUE): ?>


                         <img class="w-32 h-32 mx-auto rounded-full object-cover border-4 border-green-400" src="<?= base_url($customer->passport) ?>" alt="Customer Passport">
                  <?php else: ?>
                    <img src="<?php echo base_url();?>assets/img/user.png" 
                         alt="Default Photo" 
                         class="w-full sm:w-56 h-48 object-cover rounded-lg border-2 border-gray-200 dark:border-gray-700">
                  <?php endif; ?>
                </div>

                <!-- Customer Info -->
                <div class="flex-grow">
                  <h2 class="text-xl sm:text-2xl font-bold uppercase text-gray-900 dark:text-white mb-4 text-center lg:text-left">
                    <?php echo $customer->f_name; ?> <?php echo $customer->m_name; ?> <?php echo $customer->l_name; ?>
                  </h2>
                  
                  <!-- Customer Loans List -->
                  <?php if(isset($customer_loan) && !empty($customer_loan)): ?>
                  <div class="mt-4">
                    <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 flex items-center justify-center lg:justify-start">
                      <svg class="w-4 h-4 mr-2 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/>
                        <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"/>
                      </svg>
                      Customer Loans
                    </h3>
                    <div class="space-y-2 max-h-60 sm:max-h-80 overflow-y-auto">
                      <?php foreach($customer_loan as $loan): ?>
                        <div class="flex items-start p-2 sm:p-3 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
                          <div class="flex-shrink-0">
                            <div class="w-2 h-2 mt-2 rounded-full bg-blue-500"></div>
                          </div>
                          <div class="ml-3 flex-grow min-w-0">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1 sm:gap-2">
                              <p class="text-xs sm:text-sm font-medium text-gray-900 dark:text-white truncate">
                                <?php echo $loan->loan_code; ?> - <?php echo $loan->loan_name; ?>
                              </p>
                              <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium w-fit
                                <?php if($loan->loan_status == 'out'): ?>
                                  bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                                <?php elseif($loan->loan_status == 'withdrawal'): ?>
                                  bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200
                                <?php elseif($loan->loan_status == 'done'): ?>
                                  bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200
                                <?php else: ?>
                                  bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200
                                <?php endif; ?>">
                                <?php echo ucfirst($loan->loan_status); ?>
                              </span>
                            </div>
                            <div class="mt-1 text-xs text-gray-600 dark:text-gray-400 flex flex-wrap gap-x-1">
                              <span class="font-semibold">Amount:</span> <span><?php echo number_format($loan->loan_aprove); ?></span>
                               <span class="font-semibold">Mkopo Na Riba:</span> <span><?php echo number_format($loan->loan_int); ?></span>
                              <span class="hidden sm:inline">/</span>
                              <span class="font-semibold">Duration:</span> 
                              <span>
                              <?php 
                                if($loan->day == 1) echo 'Siku';
                                elseif($loan->day == 7) echo 'Wiki';
                                elseif($loan->day >= 28) echo 'Mwezi';
                                else echo $loan->day . ' siku';
                              ?>
                                (<?php echo number_format($loan->session); ?>)
                              </span>
                              <span class="hidden sm:inline">/</span>
                              <?php
                                $loan_interest_text = '-';
                                if (isset($loan->interest_formular) && $loan->interest_formular !== '') {
                                  $loan_interest_text = $loan->interest_formular . '%';
                                }
                              ?>
                              <span class="font-semibold">Interest:</span> <span><?php echo $loan_interest_text; ?></span>
                            </div>
                            <div class="mt-1 text-xs text-gray-500 dark:text-gray-500">
                              <?php
                                $loan_start_date_text = '-';
                                if (isset($loan->loan_stat_date) && $loan->loan_stat_date !== '' && $loan->loan_stat_date !== '0000-00-00') {
                                  $loan_start_date_text = date('M d, Y', strtotime($loan->loan_stat_date));
                                }

                                $loan_end_date_text = '-';
                                if (isset($loan->loan_end_date) && $loan->loan_end_date !== '' && $loan->loan_end_date !== '0000-00-00') {
                                  $loan_end_date_text = date('M d, Y', strtotime($loan->loan_end_date));
                                }
                              ?>
                              <span class="font-semibold">Tarehe Ya Kuchukua:</span> <?php echo $loan_start_date_text; ?>
                              <span class="font-semibold">Tarehe Ya Kumaliza:</span> <?php echo $loan_end_date_text; ?>
                            </div>
                          </div>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  </div>
                  <?php else: ?>
                  <div class="mt-4 p-3 bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg">
                    <p class="text-xs sm:text-sm text-yellow-800 dark:text-yellow-200 text-center lg:text-left">
                      <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                      </svg>
                      No active loans for this customer
                    </p>
                  </div>
                  <?php endif; ?>
                </div>

                <!-- Customer Signature -->
                <div class="flex-shrink-0 mx-auto lg:mx-0">
                  <?php if ($customer->signature == TRUE): ?>
                    <div class="text-center lg:text-right">
                      <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Signature:</p>
                      <img src="<?php echo base_url().'assets/img/'.$customer->signature; ?>" 
                           alt="Customer Signature" 
                           class="w-full sm:w-72 h-32 sm:h-48 object-contain border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700">
                    </div>
                  <?php endif; ?>
                </div>
                
              </div>
            </div>
          </div>

          <!-- Account Statement Card -->
          <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            
            <!-- Header with Search and Filters -->
            <div class="flex flex-col space-y-3 p-3 sm:p-4 border-b border-gray-200 dark:border-gray-700">
              <div class="w-full">
                <h3 class="text-base sm:text-lg font-semibold text-gray-900 dark:text-white flex items-center justify-center sm:justify-start">
                  <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 text-cyan-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                  </svg>
                  Customer Account Statement
                </h3>
              </div>
              
              <!-- Search Customer Form -->
              <div class="w-full">
                <?php echo form_open("admin/search_acount_statement", ['class' => 'flex flex-col sm:flex-row items-stretch sm:items-center gap-2']); ?>
                  <div class="relative flex-grow">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                      <svg class="w-4 h-4 sm:w-5 sm:h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"/>
                      </svg>
                    </div>
                    <select name="customer_id" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full pl-9 sm:pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500"
                            id="customerSearchSelect">
                      <option value="">Tafuta mteja hapa...</option>
                      <?php foreach ($customerData as $customers): ?>
                        <option value="<?php echo $customers->customer_id; ?>" <?php echo (isset($customer->customer_id) && $customer->customer_id == $customers->customer_id) ? 'selected' : ''; ?>>
                          <?php echo $customers->f_name; ?> <?php echo $customers->m_name; ?> <?php echo $customers->l_name; ?> / <?php echo $customers->blanch_name; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                    <input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">
                  </div>
                  <button type="submit"
                          class="flex items-center justify-center px-4 py-2.5 bg-cyan-600 hover:bg-cyan-700 text-white text-xs sm:text-sm font-medium rounded-lg focus:ring-4 focus:ring-cyan-300 dark:bg-cyan-500 dark:hover:bg-cyan-600 whitespace-nowrap">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"/>
                    </svg>
                    <span class="hidden sm:inline">Search</span>
                    <span class="sm:hidden">Search Customer</span>
                  </button>
                <?php echo form_close(); ?>
              </div>
            </div>

            <!-- Loan Search Section -->
            <div class="flex flex-col space-y-3 p-3 sm:p-4 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900" id="loanFilterSection" style="display: none;">
              <div class="w-full">
                <h4 class="text-xs sm:text-sm font-semibold text-gray-700 dark:text-gray-300 text-center sm:text-left">
                  Filter by Loan:
                </h4>
              </div>
              
              <!-- Loan Search Form -->
              <div class="w-full">
                <?php echo form_open("admin/search_acount_statement", ['class' => 'flex flex-col sm:flex-row items-stretch sm:items-center gap-2', 'id' => 'loanFilterForm']); ?>
                  <div class="relative flex-grow">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                      <svg class="w-4 h-4 sm:w-5 sm:h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/>
                        <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"/>
                      </svg>
                    </div>
                    <select name="loan_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-9 sm:pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            id="loanSearchSelect">
                      <option value="">All Loans</option>
                      <?php if(isset($customer_loan) && !empty($customer_loan)): ?>
                        <?php $selected_loan_id = $this->input->post('loan_id'); ?>
                        <?php foreach ($customer_loan as $loans): ?>
                          <?php
                            $loan_start_text = '-';
                            if (isset($loans->loan_stat_date) && $loans->loan_stat_date !== '' && $loans->loan_stat_date !== '0000-00-00') {
                              $loan_start_text = date('d/m/Y', strtotime($loans->loan_stat_date));
                            }

                            $loan_end_text = '-';
                            if (isset($loans->loan_end_date) && $loans->loan_end_date !== '' && $loans->loan_end_date !== '0000-00-00') {
                              $loan_end_text = date('d/m/Y', strtotime($loans->loan_end_date));
                            }
                          ?>
                          <option value="<?php echo $loans->loan_id; ?>" <?php echo ((string)$selected_loan_id === (string)$loans->loan_id) ? 'selected' : ''; ?>>
                            <?php echo $loans->loan_code; ?> - <?php echo $loans->loan_name; ?> (<?php echo number_format($loans->loan_aprove); ?>) / <?php echo $loan_start_text; ?> - <?php echo $loan_end_text; ?>
                          </option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                    <input type="hidden" name="customer_id" id="loanFilterCustomerId" value="<?php echo isset($customer->customer_id) ? $customer->customer_id : ''; ?>">
                    <input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">
                  </div>
                  <button type="submit"
                          class="flex items-center justify-center px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-xs sm:text-sm font-medium rounded-lg focus:ring-4 focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 whitespace-nowrap">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd"/>
                    </svg>
                    <span class="hidden sm:inline">Filter</span>
                    <span class="sm:hidden">Filter by Loan</span>
                  </button>
                <?php echo form_close(); ?>

                <div class="mt-2">
                  <a id="loanAgreementBtn"
                     href="#"
                     target="_blank"
                     class="hidden inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-xs sm:text-sm font-medium rounded-lg focus:ring-4 focus:ring-green-300 dark:bg-green-500 dark:hover:bg-green-600">
                    Angalia Mkataba wa Mkopo
                  </a>
                </div>
              </div>
            </div>
            </div>

            <!-- Date Filters and Print -->
            <div class="flex flex-col space-y-3 p-3 sm:p-4 border-b border-gray-200 dark:border-gray-700">
              <div class="flex flex-col sm:flex-row sm:flex-wrap items-stretch sm:items-center gap-2">
                <div class="flex items-center gap-2">
                  <label class="text-xs sm:text-sm font-medium text-gray-700 dark:text-gray-300 whitespace-nowrap">From:</label>
                  <input type="date" 
                         class="bg-gray-50 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white flex-grow sm:flex-grow-0">
                </div>
                
                <div class="flex items-center gap-2">
                  <label class="text-xs sm:text-sm font-medium text-gray-700 dark:text-gray-300 whitespace-nowrap">To:</label>
                  <input type="date" 
                         class="bg-gray-50 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white flex-grow sm:flex-grow-0">
                </div>
                
                <button type="submit" 
                        class="w-full sm:w-auto px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-xs sm:text-sm font-medium rounded-lg focus:ring-4 focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600">
                  Get Data
                </button>
              </div>
              
              <div class="w-full sm:w-auto">
                <!-- Print Button -->
                <?php if(isset($customer->customer_id)): ?>
                  <a href="<?php echo base_url("admin/print_customer_statement/{$customer->customer_id}"); ?>" 
                     target="_blank"
                     class="flex items-center justify-center w-full sm:w-auto px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-xs sm:text-sm font-medium rounded-lg focus:ring-4 focus:ring-green-300 dark:bg-green-500 dark:hover:bg-green-600">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M5 2.75C5 1.784 5.784 1 6.75 1h6.5c.966 0 1.75.784 1.75 1.75v3.552c.377.046.752.097 1.126.153A2.212 2.212 0 0118 8.653v4.097A2.25 2.25 0 0115.75 15h-.241l.305 1.984A1.75 1.75 0 0114.084 19H5.915a1.75 1.75 0 01-1.73-2.016L4.492 15H4.25A2.25 2.25 0 012 12.75V8.653c0-1.082.775-2.034 1.874-2.198.374-.056.75-.107 1.127-.153L5 6.25v-3.5zm8.5 3.397a41.533 41.533 0 00-7 0V2.75a.25.25 0 01.25-.25h6.5a.25.25 0 01.25.25v3.397zM6.608 12.5a.25.25 0 00-.247.212l-.693 4.5a.25.25 0 00.247.288h8.17a.25.25 0 00.246-.288l-.692-4.5a.25.25 0 00-.247-.212H6.608z" clip-rule="evenodd"/>
                    </svg>
                    Print Statement
                  </a>
                <?php endif; ?>
              </div>
            </div>

            <!-- Statement Table -->
            <div class="overflow-x-auto">
              <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-white uppercase bg-cyan-600 dark:bg-cyan-500">
                  <tr>
                    <th scope="col" class="px-4 py-3">Date</th>
                    <th scope="col" class="px-4 py-3">Description</th>
                    <th scope="col" class="px-4 py-3">Deposit</th>
                    <th scope="col" class="px-4 py-3">Withdrawal</th>
                    <th scope="col" class="px-4 py-3">Balance</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($payisnull as $payisnulls): ?>
                    <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                      <td class="px-4 py-3 uppercase font-medium text-gray-900 dark:text-white">
                        <?php echo $payisnulls->date_data; ?>
                      </td>
                      <td class="px-4 py-3 uppercase">
                        <?php echo $payisnulls->emply; ?>
                        <?php if ($payisnulls->emply == TRUE): ?>/<?php endif; ?>
                        <?php echo $payisnulls->description; ?>
                        <?php if($payisnulls->p_method == TRUE): ?>
                          /<?php echo $payisnulls->account_name; ?>
                        <?php endif; ?>
                        <?php if ($payisnulls->fee_id == TRUE): ?>
                          / <?php echo $payisnulls->fee_desc; ?> <?php echo $payisnulls->fee_percentage; ?> <?php echo $payisnulls->symbol; ?>
                        <?php endif; ?>
                        <?php if($payisnulls->p_method == TRUE): ?>/<?php endif; ?>
                        <?php echo @$payisnulls->loan_name; ?>
                        <?php 
                          if(@$payisnulls->day == 1) echo "Daily";
                          elseif(@$payisnulls->day == 7) echo "Weekly";
                          elseif (in_array(@$payisnulls->day, [28, 29, 30, 31])) echo "Monthly";
                        ?>
                        <?php echo $payisnulls->session; ?> / AC/No. <?php echo @$payisnulls->loan_code; ?>
                      </td>
                      <td class="px-4 py-3 text-green-600 dark:text-green-400 font-semibold">
                        <?php echo $payisnulls->depost ? number_format($payisnulls->depost, 2) : '0.00'; ?>
                      </td>
                      <td class="px-4 py-3 text-red-600 dark:text-red-400 font-semibold">
                        <?php echo $payisnulls->withdrow ? number_format($payisnulls->withdrow, 2) : '0.00'; ?>
                      </td>
                      <td class="px-4 py-3 font-bold text-gray-900 dark:text-white">
                        <?php echo $payisnulls->balance ? number_format($payisnulls->balance, 2) : '0.00'; ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            
          </div>
        </div>
      </section>

    <?php else: ?>
      <!-- No Customer Found -->
      <div class="flex items-center justify-center min-h-screen bg-gray-50 dark:bg-gray-900">
        <div class="text-center p-8">
          <svg class="mx-auto h-24 w-24 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
          <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">OOPS!</h1>
          <p class="text-lg text-gray-600 dark:text-gray-400 mb-6">There is no customer with that name</p>
          <a href="<?php echo base_url("admin/teller_dashboard"); ?>" 
             class="inline-flex items-center px-6 py-3 bg-cyan-600 hover:bg-cyan-700 text-white font-medium rounded-lg focus:ring-4 focus:ring-cyan-300">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"/>
            </svg>
            Back to Dashboard
          </a>
        </div>
      </div>
    <?php endif; ?>

  </div>
</div>

<?php
include_once APPPATH . "views/partials/footer.php";
?>

<!-- Include Select2 for better dropdown search -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<style>
.select2-container--default .select2-selection--single {
    height: 42px;
    padding: 6px 12px;
    border: 1px solid #d1d5db;
    border-radius: 0.5rem;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    line-height: 30px;
}
.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 40px;
}
.dark .select2-container--default .select2-selection--single {
    background-color: #374151;
    border-color: #4b5563;
    color: white;
}
.dark .select2-container--default .select2-selection--single .select2-selection__rendered {
    color: white;
}
</style>

<script>
$(document).ready(function() {
    var customerSelect = $('#customerSearchSelect').select2({
        placeholder: "Tafuta mteja hapa...",
        allowClear: true,
        width: '100%'
    });
    
    var loanSelect = $('#loanSearchSelect').select2({
        placeholder: "Select loan...",
        allowClear: true,
        width: '100%'
    });

    function updateLoanAgreementLink() {
      var customerId = $('#loanFilterCustomerId').val() || customerSelect.val();
      var loanId = $('#loanSearchSelect').val();
      var $btn = $('#loanAgreementBtn');

      if (customerId && loanId) {
        var agreementUrl = '<?php echo base_url("adminr/view_aggrement/"); ?>' + customerId + '/' + loanId;
        $btn.attr('href', agreementUrl).removeClass('hidden');
      } else {
        $btn.attr('href', '#').addClass('hidden');
      }
    }
    
    // Show loan filter section if customer is already selected
    <?php if(isset($customer_loan) && !empty($customer_loan)): ?>
    $('#loanFilterSection').show();
    <?php endif; ?>
    
    // Load customer loans when customer is selected
    customerSelect.on('change', function() {
        var customerId = $(this).val();
        
        if (customerId) {
            // Show loading state
            $('#loanSearchSelect').html('<option value="">Loading loans...</option>');
            $('#loanFilterSection').show();
            $('#loanFilterCustomerId').val(customerId);
            
            // Fetch customer loans via AJAX
            $.ajax({
                url: '<?php echo base_url("admin/get_customer_loans_ajax"); ?>',
                type: 'POST',
                data: {
                    customer_id: customerId,
                    comp_id: '<?php echo $_SESSION['comp_id']; ?>'
                },
                dataType: 'json',
                success: function(response) {
                  function formatLoanDate(dateStr) {
                    if (!dateStr || dateStr === '0000-00-00') return '-';
                    var parts = String(dateStr).split('-');
                    if (parts.length !== 3) return dateStr;
                    return parts[2] + '/' + parts[1] + '/' + parts[0];
                  }

                    var options = '<option value="">All Loans</option>';
                    
                    if (response.success && response.loans.length > 0) {
                        $.each(response.loans, function(index, loan) {
                      var startDate = formatLoanDate(loan.loan_stat_date);
                      var endDate = formatLoanDate(loan.loan_end_date);
                            options += '<option value="' + loan.loan_id + '">' + 
                                      loan.loan_code + ' - ' + loan.loan_name + 
                            ' (' + parseFloat(loan.loan_aprove).toLocaleString() + ')' +
                            ' / ' + startDate + ' - ' + endDate +
                            '</option>';
                        });
                    } else {
                        options = '<option value="">No loans found</option>';
                    }
                    
                    $('#loanSearchSelect').html(options);
                    loanSelect.trigger('change'); // Refresh Select2
                    updateLoanAgreementLink();
                },
                error: function() {
                    $('#loanSearchSelect').html('<option value="">Error loading loans</option>');
                    updateLoanAgreementLink();
                }
            });
        } else {
            $('#loanFilterSection').hide();
            $('#loanSearchSelect').html('<option value="">All Loans</option>');
                updateLoanAgreementLink();
        }
    });

            loanSelect.on('change', function() {
              updateLoanAgreementLink();
            });

            updateLoanAgreementLink();
});
</script>










              





