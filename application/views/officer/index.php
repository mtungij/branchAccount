					<?php
include_once APPPATH . "views/partials/officerheader.php";
?>

          <style>
            .dashboard-loading-overlay {
              width: 100%;
              z-index: 1;
              background: transparent;
              opacity: 1;
              transition: opacity 0.25s ease;
            }

            .dark .dashboard-loading-overlay {
              background: transparent;
            }

            .dashboard-loading-overlay.is-hidden {
              opacity: 0;
              pointer-events: none;
            }

            .dashboard-skeleton {
              border-radius: 0.75rem;
              background: linear-gradient(90deg, #e5e7eb 25%, #f3f4f6 37%, #e5e7eb 63%);
              background-size: 400% 100%;
              animation: dashboardShimmer 1.2s ease-in-out infinite;
            }

            .dark .dashboard-skeleton {
              background: linear-gradient(90deg, #1f2937 25%, #374151 37%, #1f2937 63%);
              background-size: 400% 100%;
            }

            @keyframes dashboardShimmer {
              0% { background-position: 100% 0; }
              100% { background-position: 0 0; }
            }
          </style>

          <div id="dashboard-loading-placeholder" class="dashboard-loading-overlay">
            <div class="w-full lg:ps-64">
              <div class="p-4 sm:p-6 space-y-6">
                <div class="dashboard-skeleton h-10 w-64"></div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                  <div class="dashboard-skeleton h-24"></div>
                  <div class="dashboard-skeleton h-24"></div>
                  <div class="dashboard-skeleton h-24"></div>
                  <div class="dashboard-skeleton h-24"></div>
                </div>
                <div class="dashboard-skeleton h-48"></div>
                <div class="dashboard-skeleton h-64"></div>
              </div>
            </div>
          </div>

<!-- ========== MAIN CONTENT BODY ========== -->
          <div id="dashboard-main-content" class="w-full lg:ps-64 hidden">
    <div class="p-4 sm:p-6 space-y-6">


<!-- Debug: Check session data -->
<?php 
echo "<!-- Session company_logo: " . ($this->session->userdata('company_logo') ?? 'NULL') . " -->";
echo "<!-- Session comp_id: " . ($this->session->userdata('comp_id') ?? 'NULL') . " -->";
echo "<!-- Session comp_name: " . ($this->session->userdata('comp_name') ?? 'NULL') . " -->";
?>



        <!-- Section 1: Page Title / Subheader -->
     
        <!-- End Page Title / Subheader -->


        <!-- Section 2: Top KPIs (Using your new card template) -->
        
        <!-- Section 2: Top KPIs (Revised with Full-Width Account Balance Banner) -->
      

 <!-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="bg-cyan-800  px-4 py-2 border-b">
      <h2 class="text-lg font-semibold text-white">WATEJA & WAFANYAKAZI</h2>
    </div>
    <div class="p-4">
      <table class="w-full text-sm">
        <tbody class="text-gray-700"> -->
          <!-- <tr class="border-b">
            <td class="py-2">JUMLA YA WATEJA</td>
            <td class="text-right">
              <span class="inline-block bg-green-600 text-white text-xs px-2 py-1 rounded">
             <?= $total_customers ?>
              </span>
            </td>
          </tr> -->
          <!-- <tr class="border-b">
            <td class="py-2">WATEJA WAPYA LEO</td>
            <td class="text-right">
            <span class="inline-block bg-green-600 text-white text-xs px-2 py-1 rounded">
            <?=$new_customer?>
              </span>
            </td>
          </tr> -->
          <!-- <tr class="border-b">
            <td class="py-2">WANAOMALIZA LEO</td>
            <td class="text-right">
            <span class="inline-block bg-green-600 text-white text-xs px-2 py-1 rounded">
             </?=$done_customer?>
              </span>
            </td>
          </tr> -->
          <!-- <tr class="border-b">
            <td class="py-2">MADENI SUGU</td>
            <td class="text-right">
            <span class="inline-block bg-green-600 text-white text-xs px-2 py-1 rounded">
             
              </span>
            </td>
          </tr>
          <tr>
            <td class="py-2">WAFANYAKAZI</td>
            <td class="text-right">
            <span class="inline-block bg-green-600 text-white text-xs px-2 py-1 rounded">
             
              </span>
            </td> -->
          <!-- </tr>
        </tbody>
      </table>
    </div>
  </div> -->

  <!-- Card 2: MALIPO YA LEO -->
  <?php
  $no = 1;
  $total_rejesho = 0;
  $total_lipwa = 0;
  $total_laza = 0;
  $total_zidi = 0;

  foreach ($lipwa as $cashs): 
	  if (empty($cashs->depost) || empty($cashs->customer_id)) {
		  continue;
	  }

	  $rejesho = $cashs->restrations;
	  $lipwa = $cashs->depost;
	  $laza = ($lipwa < $rejesho) ? ($rejesho - $lipwa) : 0;
	  $zidi = ($lipwa > $rejesho) ? ($lipwa - $rejesho) : 0;

	  $total_rejesho += $rejesho;
	  $total_lipwa += $lipwa;
	  $total_laza += $laza;
	  $total_zidi += $zidi;
  ?>
   <?php endforeach; ?>

<!-- <div class="bg-white rounded-lg shadow-md overflow-hidden">
  <div class="bg-cyan-800 px-4 py-2 border-b">
    <h2 class="text-lg font-semibold text-white">MALIPO YA LEO</h2>
  </div>
  <div class="p-4">
    <table class="w-full text-sm">
      <tbody class="text-gray-700">
	  <tr class="border-b">
          <td class="py-2">KUSANYWA</td>
          <td class="text-right">
            <span class="inline-block bg-green-600 text-white text-xs px-2 py-1 rounded">
			<?php echo number_format($total_rejesho); ?>
            </span>
          </td>
        </tr>
        <tr class="border-b">
          <td class="py-2">LIPWA</td>
          <td class="text-right">
            <span class="inline-block bg-green-600 text-white text-xs px-2 py-1 rounded">
			<?php echo number_format($total_lipwa); ?>
            </span>
          </td>
        </tr>
        <tr class="border-b">
          <td class="py-2">LAZA</td>
          <td class="text-right">
            <span class="inline-block bg-green-600 text-white text-xs px-2 py-1 rounded">
			<?php echo number_format($total_laza); ?>
            </span>
          </td>
        </tr>
        <tr class="border-b">
          <td class="py-2">ZIDI</td>
          <td class="text-right">
            <span class="inline-block bg-green-600 text-white text-xs px-2 py-1 rounded">
			<?php echo number_format($total_zidi); ?>
            </span>
          </td>
        </tr>
       
      </tbody>
    </table>
  </div>
</div> -->


<!-- </div> -->


<div class="space-y-6">



    <!-- First Row: 4 Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <div class="bg-white shadow rounded p-4 flex items-center">
            <img src="https://www.wrraptheme.com/templates/lucid/html/assets/images/coin/XRP.svg" class="w-8 h-8 mr-3" />
            <div>
                <div class="text-xs text-gray-500 font-semibold"><?php echo $this->lang->line('total_customers'); ?></div>
                <div class="text-xl font-bold text-gray-800">
                   <?= $total_customers ?>
                </div>
            </div>
        </div>

        <div class="bg-white shadow rounded p-4 flex items-center">
            <img src="https://www.wrraptheme.com/templates/lucid/html/assets/images/coin/ETH.svg" class="w-8 h-8 mr-3" />
            <div>
                <div class="text-xs text-gray-500 font-semibold"><?php echo $this->lang->line('total_active_customers'); ?></div>
                <div class="text-xl font-bold text-gray-800">
                   <?= $active_customer ?>
                </div>
            </div>
        </div>

        <div class="bg-white shadow rounded p-4 flex items-center">
            <img src="https://www.wrraptheme.com/templates/lucid/html/assets/images/coin/XRP.svg" class="w-8 h-8 mr-3" />
            <div>
                <div class="text-xs text-gray-500 font-semibold"><?php echo $this->lang->line('total_default_customers'); ?></div>
                <div class="text-xl font-bold text-gray-800">
                   <?= $default_customer ?>
                </div>
            </div>
        </div>

        <div class="bg-white shadow rounded p-4 flex items-center">
            <img src="https://www.wrraptheme.com/templates/lucid/html/assets/images/coin/neo.svg" class="w-8 h-8 mr-3" />
            <div>
                <div class="text-xs text-gray-500 font-semibold"><?php echo $this->lang->line('customers_completed_today'); ?></div>
                <div class="text-xl font-bold text-gray-800">
                   <?= $done_customer ?>
                </div>
            </div>
        </div>

        <div class="bg-white shadow rounded p-4 flex items-center">
                 <img src="https://www.wrraptheme.com/templates/lucid/html/assets/images/coin/neo.svg" class="w-8 h-8 mr-3" />
            <div>
                <div class="text-xs text-gray-500 font-semibold"><?php echo $this->lang->line('customers_due_tomorrow'); ?></div>
                <div class="text-xl font-bold text-gray-800">
                   <?= $customers_due_tomorrow ?? 0 ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Second Row: 3 Colored Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
     <a href="<?= base_url('oficer/today_recevable_loan') ?>" class="bg-gradient-to-r from-green-400 to-emerald-500 dark:from-green-600 dark:to-emerald-700 text-white rounded-xl shadow p-6">
    <h4 class="text-2xl font-bold flex items-center gap-2">
        <i class="icon-wallet"></i> <?= number_format($collect->total_rejesho) ?? 0 ?>


    </h4>
    <span class="text-white text-sm"><?php echo $this->lang->line('today_receivable'); ?></span>
  </a>

      <a href="<?= base_url('Oficer/cash_transaction')?>" class="bg-gradient-to-r from-blue-400 to-blue-600 dark:from-blue-700 dark:to-indigo-800 text-white rounded-xl shadow p-6">
    <h4 class="text-2xl font-bold flex items-center gap-2">
        <i class="icon-wallet"></i> 	<?php echo number_format($total_lipwa); ?>
    </h4>
    <span class="text-white text-sm"><?php echo $this->lang->line('today_deposited'); ?></span>
  </a>


<div class="bg-gradient-to-r from-orange-400 to-orange-600 dark:from-cyan-700 dark:to-teal-800 text-white rounded-xl shadow p-6">
    <h4 class="text-2xl font-bold flex items-center gap-2">
        <i class="icon-wallet"></i> <?php echo number_format($total_default->total_default); ?>
    </h4>
    <span class="text-white text-sm"><?php echo $this->lang->line('total_default_payments'); ?></span>
</div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">


    <div class="bg-gradient-to-r from-orange-400 to-orange-600 dark:from-green-700 dark:to-teal-800 text-white rounded-xl shadow p-6">
    <h4 class="text-2xl font-bold flex items-center gap-2">
        <i class="icon-wallet"></i> <?php echo number_format($non_deducted->total_nonDeducted_fee); ?>
    </h4>
    <span class="text-white text-sm"><?php echo $this->lang->line('fine_today'); ?></span>
</div>

<div class="bg-gradient-to-r from-orange-400 to-orange-600 dark:from-teal-700 dark:to-green-800 text-white rounded-xl shadow p-6">
    <h4 class="text-2xl font-bold flex items-center gap-2">
        <i class="icon-wallet"></i> <?php echo number_format($total_deducted->total_deducted_fee); ?>
    </h4>
    <span class="text-white text-sm"><?php echo $this->lang->line('forms_today'); ?></span>
</div>

<a href="<?php echo base_url('oficer/expnses_requisition_form'); ?>" class="bg-gradient-to-r from-orange-400 to-orange-600 dark:from-emerald-700 dark:to-green-800 text-white rounded-xl shadow p-6 block hover:opacity-90 transition">
    <h4 class="text-2xl font-bold flex items-center gap-2">
        <i class="icon-wallet"></i> <?php echo number_format(isset($accepted_expences->total_accepted) ? $accepted_expences->total_accepted : 0); ?>
    </h4>
    <span class="text-white text-sm"><?php echo $this->lang->line('accepted_expenses') ?? 'Accepted Expenses'; ?></span>
</a>


</div>


</div>



  <!-- Card 2: MALIPO YA LEO -->
  <!-- </?php
  $total_deposit_daily = $total_deposit_daily ?? 0;
  $total_deposit_weekly = $total_deposit_weekly ?? 0;
  $total_deposit_monthly = $total_deposit_monthly ?? 0;
  $total_all = $total_deposit_daily + $total_deposit_weekly + $total_deposit_monthly;
?> -->

<!-- <div class="bg-white rounded-lg shadow-md overflow-hidden">
  <div class="bg-cyan-800 px-4 py-2 border-b">
    <h2 class="text-lg font-semibold text-white">MALIPO YA LEO</h2>
  </div>
  <div class="p-4">
    <table class="w-full text-sm">
      <tbody class="text-gray-700">
        <tr class="border-b">
          <td class="py-2">KILA SIKU</td>
          <td class="text-right">
            <span class="inline-block bg-green-600 text-white text-xs px-2 py-1 rounded">
              </?php echo number_format($total_deposit_daily); ?>
            </span>
          </td>
        </tr>
        <tr class="border-b">
          <td class="py-2">WIKI</td>
          <td class="text-right">
            <span class="inline-block bg-green-600 text-white text-xs px-2 py-1 rounded">
              <?php echo number_format($total_deposit_weekly); ?>
            </span>
          </td>
        </tr>
        <tr class="border-b">
          <td class="py-2">MWEZI</td>
          <td class="text-right">
            <span class="inline-block bg-green-600 text-white text-xs px-2 py-1 rounded">
              <?php echo number_format($total_deposit_monthly); ?>
            </span>
          </td>
        </tr>
        <tr>
          <td class="py-2 font-bold">JUMLA</td>
          <td class="text-right font-bold">
            <span class="inline-block bg-green-600 text-white text-xs px-2 py-1 rounded">
              <?php echo number_format($total_all); ?>
            </span>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div> -->

<!-- <div class="bg-white rounded-lg shadow-md overflow-hidden">
  <div class="bg-cyan-800 px-4 py-2 border-b">
    <h2 class="text-lg font-semibold text-white">MIKOPO YA LEO</h2>
  </div>
  <div class="p-4">
    <table class="w-full text-sm">
      <tbody class="text-gray-700">
        <tr class="border-b">
          <td class="py-2">KILA SIKU</td>
          <td class="text-right">
            <span class="inline-block bg-green-600 text-white text-xs px-2 py-1 rounded">
              <?php echo number_format($total_withdrawal_daily->loan_aproved ?? 0); ?>
            </span>
          </td>
        </tr>
        <tr class="border-b">
          <td class="py-2">WIKI</td>
          <td class="text-right">
            <span class="inline-block bg-green-600 text-white text-xs px-2 py-1 rounded">
              </?php echo number_format($total_withdrawal_weekly->loan_aproved ?? 0); ?>
            </span>
          </td>
        </tr>
        <tr class="border-b">
          <td class="py-2">MWEZI</td>
          <td class="text-right">
            <span class="inline-block bg-green-600 text-white text-xs px-2 py-1 rounded">
              </?php echo number_format($total_withdrawal_monthly->loan_aproved ?? 0); ?>
            </span>
          </td>
        </tr>
        <tr>
          <td class="py-2 font-bold">JUMLA</td>
          <td class="text-right font-bold">
            <span class="inline-block bg-green-600 text-white text-xs px-2 py-1 rounded">
              </?php
                $daily = $total_withdrawal_daily->loan_aproved ?? 0;
                $weekly = $total_withdrawal_weekly->loan_aproved ?? 0;
                $monthly = $total_withdrawal_monthly->loan_aproved ?? 0;
                $total = $daily + $weekly + $monthly;
                echo number_format($total);
              ?>
            </span>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div> -->
</div>


        <!-- Account Balance Banner (Full Width) -->
        <!-- <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-sm rounded-xl overflow-hidden">
            <div class="bg-cover bg-center p-6 sm:p-10 text-center" style="background-image: url('</?php echo base_url('assets/img/pi.png'); // Keep your background image path ?>');">
                <h3 class="text-sm font-medium text-gray-100 dark:text-gray-300 uppercase mb-2">Main Account Balance</h3>
                <p class="text-4xl sm:text-5xl font-bold text-white dark:text-gray-100">
                    </?php echo number_format($sum_comp_capital->total_comp_balance); ?>
                </p>
                </?php // Optional: Add a small sub-text or trend indicator if desired for the main balance ?>
                <!-- <p class="mt-1 text-xs text-gray-200 dark:text-gray-400">+2.5% since last month</p> -->
            <!-- </div>
        </div>  -->
        <!-- End Account Balance Banner -->

        

        <!-- Grid for other KPIs -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6"> <?php // Added mt-6 for spacing after the banner ?>
            
            <!-- Disbursed Loans Card -->
            <!-- <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-sm hover:shadow-lg transition-shadow duration-300">
              <div class="flex items-center justify-between mb-2">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Disbursed Loans</h3>
                 </?php if(isset($principal_loan->change_percentage) && $principal_loan->change_percentage >= 0): ?>
                <span class="inline-flex items-center text-green-600 dark:text-green-400 text-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                  +</?php echo $principal_loan->change_percentage; ?>%
                </span>
                 </?php elseif(isset($principal_loan->change_percentage)): ?>
                 <span class="inline-flex items-center text-<div class="grid grid-cols-1 md:grid-cols-3 gap-4 px-4 py-6">
   -->
  <!-- Card 1: WATEJA & WAFANYAKAZI -->


  <!-- You can add a 3rd card here if needed -->

<!-- </div>

                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1 rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                  </?php echo $principal_loan->change_percentage; ?>%
                </span>
                </?php endif; ?>
              </div>
              <div class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-1"></?php echo number_format($principal_loan->loan_aproved); ?></div>
              <p class="text-xs text-gray-500 dark:text-gray-400">
                </?php echo isset($principal_loan->change_period) ? 'vs ' . htmlspecialchars($principal_loan->change_period, ENT_QUOTES, 'UTF-8') : 'Total amount disbursed'; ?>
              </p>
            </div> -->

            <!-- Loan Expectation Receivable Card -->
            <!-- <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-sm hover:shadow-lg transition-shadow duration-300">
              <div class="flex items-center justify-between mb-2">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Loan Expectation Receivable</h3>
                 </?php if(isset($total_expect->change_percentage) && $total_expect->change_percentage >= 0): ?>
                <span class="inline-flex items-center text-green-600 dark:text-green-400 text-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                  +</?php echo $total_expect->change_percentage; ?>%
                </span>
                 </?php elseif(isset($total_expect->change_percentage)): ?>
                 <span class="inline-flex items-center text-red-600 dark:text-red-400 text-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1 rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                  </?php echo $total_expect->change_percentage; ?>%
                </span>
                </?php endif; ?> 
              </div> -->
              <!-- <div class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-1"></?php echo number_format($total_expect->loan_interest); ?></div>
              <p class="text-xs text-gray-500 dark:text-gray-400">
                  </?php echo isset($total_expect->change_period) ? 'vs ' . htmlspecialchars($total_expect->change_period, ENT_QUOTES, 'UTF-8') : 'Total interest expected'; ?>
              </p>
            </div> -->

            <!-- Total Branch Accounts Card -->
            <!-- <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-sm hover:shadow-lg transition-shadow duration-300">
              <div class="flex items-center justify-between mb-2">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Branch Accounts</h3>
                </?php if(isset($blanch_capital_circle->change_percentage) && $blanch_capital_circle->change_percentage >= 0): ?>
                <span class="inline-flex items-center text-green-600 dark:text-green-400 text-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                  +</?php echo $blanch_capital_circle->change_percentage; ?>%
                </span>
                </?php elseif(isset($blanch_capital_circle->change_percentage)): ?>
                 <span class="inline-flex items-center text-red-600 dark:text-red-400 text-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1 rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                  </?php echo $blanch_capital_circle->change_percentage; ?>%
                </span>
                </?php endif; ?>
              </div> -->
              <!-- <div class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-1"></?php echo number_format($blanch_capital_circle->total_balanch_amount); ?></div>
              <p class="text-xs text-gray-500 dark:text-gray-400">
                  </?php echo isset($blanch_capital_circle->change_period) ? 'vs ' . htmlspecialchars($blanch_capital_circle->change_period, ENT_QUOTES, 'UTF-8') : 'Combined branch capital'; ?>
              </p>
            </div> -->
            
            <!-- Total Income Card -->
            <!-- <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-sm hover:shadow-lg transition-shadow duration-300">
              <div class="flex items-center justify-between mb-2">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Income</h3>
              </div>
              <div class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-1"></?php echo number_format($total_income_val); ?></div>
              <p class="text-xs text-gray-500 dark:text-gray-400">Overall income generated</p>
            </div> -->

             <!-- Total Expenses Card
            <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-sm hover:shadow-lg transition-shadow duration-300">
              <div class="flex items-center justify-between mb-2">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Expenses</h3>
              </div>
              <div class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-1"></div>
              <p class="text-xs text-gray-500 dark:text-gray-400">Overall expenses incurred</p>
            </div>
             -->
            <!-- Total Loan Outstanding Card -->
            <!-- <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-sm hover:shadow-lg transition-shadow duration-300">
              <div class="flex items-center justify-between mb-2">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Loan Outstanding</h3>
              </div>
              <div class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-1"><?php echo number_format($total_outstanding_val); ?></div>
              <p class="text-xs text-gray-500 dark:text-gray-400">Remaining loan amounts</p>
            </div> -->

        </div>
        
        <!-- End Grid for other KPIs -->
        <!-- End Top KPIs -->

        <!-- Section 3: Chart Area -->
        <!-- <div class="bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700 p-4 md:p-6">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Loan Overview Chart</h3>
            <div id="dashboard-main-chart" class="min-h-[300px] sm:min-h-[350px]"></div>
            <p class="text-xs text-gray-500 mt-2 dark:text-gray-400">Chart data needs to be implemented from controller.</p>
        </div> -->
        <!-- End Chart Area -->


        <!-- Section 4: Quick Stats & Actions (Using your new card template) -->
        <div class="bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                    <?php echo $this->lang->line('quick_overview'); ?>
                </h3>
                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                    <button id="branches-dropdown-btn" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-600">
                        <!-- Branches -->
                        <svg class="hs-dropdown-open:rotate-180 size-2.5" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </button>
                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-40 z-20 bg-white shadow-md rounded-lg p-2 mt-2 dark:bg-gray-800 dark:border dark:border-gray-700" aria-labelledby="branches-dropdown-btn">
                        <div class="py-2 first:pt-0 last:pb-0">
                            <span class="block py-2 px-3 text-xs font-medium uppercase text-gray-400 dark:text-gray-500"><?php echo $this->lang->line('branches_list'); ?></span>
                            <?php if (isset($blanch) && is_array($blanch)): ?>
                                <?php foreach ($blanch as $blanchs): ?>
                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-cyan-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                  

                                   href="<?php echo base_url(
    'admin/view_blanchPanel/' . ($blanchs->blanch_id ?? '')
); ?>"

                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M3.5 2A1.5 1.5 0 0 0 2 3.5v13A1.5 1.5 0 0 0 3.5 18h13a1.5 1.5 0 0 0 1.5-1.5v-13A1.5 1.5 0 0 0 16.5 2h-13ZM12.25 8.25a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5h-1.5ZM12.25 12a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5h-1.5ZM6.25 6.75a.75.75 0 0 0-.75.75v5.5a.75.75 0 0 0 1.5 0v-5.5a.75.75 0 0 0-.75-.75ZM8.25 5a.75.75 0 0 0-.75.75v8.5a.75.75 0 0 0 1.5 0v-8.5A.75.75 0 0 0 8.25 5Z" /></svg>
                                    <?php
echo htmlspecialchars($blanchs->blanch_name ?? '', ENT_QUOTES, 'UTF-8');
?>

                                </a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-4 md:p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php
                    // --- DUMMY DATA for quick stats - REMOVE and use controller data ---
                    // TODO: !! IMPORTANT, COMMENTED THESE BECAUSE OF TABLE MISSING ERROR, SHOULD BE UNCOMMENTED
                    $comp_id = $_SESSION['comp_id'] ?? null;
                    // Simulating data fetching - this should be in your controller
                   $employee_count = $comp_id ? ($this->db->query("SELECT COUNT(*) as count FROM tbl_employee WHERE comp_id = ?", [$comp_id])->row()->count ?? 0) : 0;
                    // $customer_total = $comp_id ? ($this->db->query("SELECT COUNT(*) as count FROM tbl_customer WHERE comp_id = ?", [$comp_id])->row()->count ?? 0) : 0;
                    // $customer_active = $comp_id ? ($this->db->query("SELECT COUNT(*) as count FROM tbl_customer WHERE comp_id = ? AND customer_status = 'open'", [$comp_id])->row()->count ?? 0) : 0;
                    // $customer_pending = $comp_id ? ($this->db->query("SELECT COUNT(*) as count FROM tbl_customer WHERE comp_id = ? AND customer_status = 'pending'", [$comp_id])->row()->count ?? 0) : 0;
                    // $customer_closed = $comp_id ? ($this->db->query("SELECT COUNT(*) as count FROM tbl_customer WHERE comp_id = ? AND customer_status = 'close'", [$comp_id])->row()->count ?? 0) : 0;
                    // $new_loan_count = $comp_id ? ($this->db->query("SELECT COUNT(*) as count FROM tbl_loans WHERE comp_id = ? AND loan_status = 'open'", [$comp_id])->row()->count ?? 0) : 0;
                    // $approved_loans_count = $comp_id ? ($this->db->query("SELECT COUNT(*) as count FROM tbl_loans WHERE comp_id = ? AND loan_status = 'aproved'", [$comp_id])->row()->count ?? 0) : 0;
                    // $today_loan_pending_count = $comp_id ? ($this->db->query("SELECT COUNT(*) as count FROM tbl_pending_total WHERE comp_id = ? AND total_pend IS NOT FALSE", [$comp_id])->row()->count ?? 0) : 0;
                    // $receivable_total_amount = $comp_id ? ($this->db->query("SELECT SUM(total_rejesho) as total_rejesho FROM tbl_loan_pay WHERE comp_id = ? AND pay_status = 'pending' AND deadline_date = CURDATE()", [$comp_id])->row()->total_rejesho ?? 0) : 0;
                    // $total_received_amount = $comp_id ? ($this->db->query("SELECT SUM(depost_amount) as total_depost FROM tbl_loan_pay WHERE comp_id = ? AND pay_status = 'payall' AND collection_date = CURDATE()", [$comp_id])->row()->total_depost ?? 0) : 0;
                    // $exp_req_count = $comp_id ? ($this->db->query("SELECT COUNT(*) as count FROM tbl_request_exp WHERE comp_id = ? AND req_date = CURDATE() AND req_status = 'recomended'", [$comp_id])->row()->count ?? 0) : 0;
                    // --- END DUMMY DATA ---
                    ?>
                    <!-- Stat Card: Employees -->
                   

                    <!-- Stat Card: Customers -->
                   
                    
                    <!-- Stat Card: Loan Requests -->
                    <a href="<?php echo base_url("oficer/loan_pending"); ?>" class="bg-white dark:bg-gray-700 rounded-xl p-5 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="flex items-center gap-x-3 mb-3">
                             <!-- <img src="<//?php echo base_url('assets/img/hukumu.png'); ?>" class="size-10" alt="Loan Requests"> -->
                            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200"><?php echo $this->lang->line('loan_requests'); ?></h2>
                        </div>
                        
                        <p class="text-2xl font-bold text-red-600 dark:text-red-400"><?php echo  $new_loans ?></p>
                        <p class="text-xs text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('new_loan_applications'); ?></p>
                    </a>

                    <!-- Stat Card: Approved Loans -->
                    <!-- <a href="<?php echo base_url("oficer/get_loan_aproved"); ?>" class="bg-white dark:bg-gray-700 rounded-xl p-5 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="flex items-center gap-x-3 mb-3">
                        <?php
							$ap = $this->db->query("SELECT * FROM tbl_loans WHERE comp_id = '$comp_id' AND loan_status = 'aproved'");
							 ?>
                         
                            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200"><?php echo $this->lang->line('approved_loans'); ?></h2>
                        </div>
                        <p class="text-2xl font-bold text-green-600 dark:text-green-400"> <?= count($approved_customer) ?></p>
                        <p class="text-xs text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('loans_awaiting_disbursement'); ?></p>
                    </a> -->

					<a href="<?php echo base_url("oficer/disburse_loan"); ?>" class="bg-white dark:bg-gray-700 rounded-xl p-5 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="flex items-center gap-x-3 mb-3">
                       
                            <!-- <img src="</?php echo base_url('assets/img/aproved.png'); ?>" class="size-10" alt="Approved Loans"> -->
              <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200"><?php echo $this->lang->line('approved_loans'); ?></h2>
                        </div>
                        <p class="text-2xl font-bold text-green-600 dark:text-green-400"> <?= $disbursed_customer ?></p>
            <p class="text-xs text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('loans_awaiting_disbursement'); ?></p>
                    </a>

                    <!-- Stat Card: Today Loan Pending -->
                     <a href="<?php echo base_url("oficer/loan_pending_time"); ?>" class="bg-white dark:bg-gray-700 rounded-xl p-5 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="flex items-center gap-x-3 mb-3">
                            <!-- <img src="</?php echo base_url('assets/img/penart.png'); ?>" class="size-10" alt="Today Pending"> -->
                            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200"><?php echo $this->lang->line('today_loan_pending'); ?></h2>
                        </div>
                      
                        <p class="text-2xl font-bold text-gray-800 dark:text-gray-200"></p>
                        <p class="text-xs text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('loan_payments_due_yesterday'); ?></p>
                    </a>

                    <!-- Stat Card: Today Receivable -->
                    <!-- <a href="</?php echo base_url("admin/today_recevable_loan"); ?>" class="bg-white dark:bg-gray-700 rounded-xl p-5 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="flex items-center gap-x-3 mb-3">
                            <img src="</?php echo base_url('assets/img/money.png'); ?>" class="size-10" alt="Today Receivable"> -->
                             <!-- <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Today Receivable</h2>
                        </div>
                        <p class="text-2xl font-bold text-gray-800 dark:text-gray-200"></?php echo number_format($receivable_total->total_rejesho) ; ?></p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Expected amount today</p>
                    </a> -->

                
                    
                    <!-- Stat Card: Recommended Expenses -->
                    <!-- <a href="</?php echo base_url("admin/get_recomended_request"); ?>" class="bg-white dark:bg-gray-700 rounded-xl p-5 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="flex items-center gap-x-3 mb-3">
                             <img src="</?php echo base_url('assets/img/expences.png'); ?>" class="size-10" alt="Recommended Expenses">
                            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Recommended Expenses</h2>
                        </div>
                       <p class="text-2xl font-bold text-red-600 dark:text-red-400"></?php echo $exp_req_count ?? 0; ?></p>
                       <p class="text-xs text-gray-500 dark:text-gray-400">Pending expense requests</p>
                    </a> -->

                </div>
            </div>
        </div>
        <!-- End Quick Stats/Link Boxes -->

    </div>
</div>
<!-- ========== END MAIN CONTENT BODY ========== -->

<?php
include_once APPPATH . "views/partials/footer.php";
?>

<?php // JavaScript for the dashboard chart (ApexCharts) - Same as previous version ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const options = {
      series: [{
          name: 'Loan Amount', // Replace with your series name
          data: [31000, 40000, 28000, 51000, 42000, 109000, 100000] // Replace with your actual data
      }, {
          name: 'Interest Expected', // Replace with your series name
          data: [1100, 3200, 4500, 3200, 3400, 5200, 4100] // Replace with your actual data
      }],
      chart: {
        height: 350, // Adjust as needed
        type: 'area', // or 'line', 'bar'
        toolbar: { show: false },
        parentHeightOffset: 0, // Important for fitting in card
        background: 'transparent'
      },
      dataLabels: { enabled: false },
      stroke: { curve: 'smooth', width: 2 },
      xaxis: {
        type: 'datetime',
        categories: ["2018-09-19T00:00:00.000Z", "2018-09-20T00:00:00.000Z", "2018-09-21T00:00:00.000Z", "2018-09-22T00:00:00.000Z", "2018-09-23T00:00:00.000Z", "2018-09-24T00:00:00.000Z", "2018-09-25T00:00:00.000Z"], // Replace
        labels: { style: { colors: document.documentElement.classList.contains('dark') ? '#9ca3af' : '#6b7280', fontSize: '12px' } },
        axisBorder: { show: false },
        axisTicks: { show: false }
      },
      yaxis: {
         labels: {
            formatter: function (value) { return value >= 1000 ? `${value / 1000}k` : value; },
            style: { colors: document.documentElement.classList.contains('dark') ? '#9ca3af' : '#6b7280', fontSize: '12px' },
            offsetX: -10
        }
      },
      tooltip: {
        x: { format: 'dd MMM yyyy' },
        theme: document.documentElement.classList.contains('dark') ? 'dark' : 'light'
      },
      colors: ['#06b6d4', '#818cf8'], // Tailwind: cyan-500, indigo-400
      legend: {
          show: true,
          position: 'top',
          horizontalAlign: 'right',
          labels: { colors: document.documentElement.classList.contains('dark') ? '#e5e7eb' : '#374151' }
      },
      grid: {
        show: true,
        borderColor: document.documentElement.classList.contains('dark') ? '#4b5563' : '#e5e7eb', // gray-600 or gray-200
        strokeDashArray: 4,
        padding: { top: -10, right: 0, bottom: 0, left: 10 }
      },
      fill: {
        type: 'gradient',
        gradient: {
          shadeIntensity: 1,
          opacityFrom: 0.4,
          opacityTo: 0.1,
          stops: [0, 90, 100]
        }
      }
    };

    const chartElement = document.querySelector("#dashboard-main-chart");
    if (chartElement) {
        const chart = new ApexCharts(chartElement, options);
        chart.render();
        // Listener for theme changes to update chart theme
        const observer = new MutationObserver((mutationsList) => {
            for (let mutation of mutationsList) {
                if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                    chart.updateOptions({
                        tooltip: { theme: document.documentElement.classList.contains('dark') ? 'dark' : 'light' },
                        legend: { labels: { colors: document.documentElement.classList.contains('dark') ? '#e5e7eb' : '#374151' } },
                        grid: { borderColor: document.documentElement.classList.contains('dark') ? '#4b5563' : '#e5e7eb' },
                        xaxis: { labels: { style: { colors: document.documentElement.classList.contains('dark') ? '#9ca3af' : '#6b7280' } } },
                        yaxis: { labels: { style: { colors: document.documentElement.classList.contains('dark') ? '#9ca3af' : '#6b7280' } } }
                    });
                }
            }
        });
        observer.observe(document.documentElement, { attributes: true });
    }
});
</script>

<script>
window.addEventListener('load', function () {
  var loadingPlaceholder = document.getElementById('dashboard-loading-placeholder');
  var mainContent = document.getElementById('dashboard-main-content');

  if (mainContent) {
    mainContent.classList.remove('hidden');
  }

  if (loadingPlaceholder) {
    setTimeout(function () {
      loadingPlaceholder.classList.add('is-hidden');
      setTimeout(function () {
        loadingPlaceholder.style.display = 'none';
      }, 260);
    }, 180);
  }
});
</script>