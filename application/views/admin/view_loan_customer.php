<?php
include_once APPPATH . "views/partials/header.php";
?>

<?php
$principal = isset($loan_form->how_loan) ? (float)$loan_form->how_loan : 0;
$interest_rate = isset($loan_form->interest_rate) ? (float)$loan_form->interest_rate : 0; // kwa %
$sessions = isset($loan_form->session) ? (int)$loan_form->session : 0;
$day_interval = isset($loan_form->day) ? (int)$loan_form->day : 30; // siku za kila kipindi

// jumla ya riba
$total_interest = ($principal * $interest_rate / 100) * $sessions;

// jumla inayolipwa
$total_payable = $principal + $total_interest;

// tarehe ya mwisho (leo + idadi ya vipindi * siku za kila kipindi)
$start_date = date('Y-m-d');
$end_date = date('Y-m-d', strtotime("+".($sessions * $day_interval)." days"));
?>


<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-8">

        <?php if ($das = $this->session->flashdata('massage')): ?>
        <div class="bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert">
            <div class="flex">
                <div class="flex-shrink-0"><span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-teal-100 bg-teal-200 text-teal-800 dark:border-teal-900 dark:bg-teal-800 dark:text-teal-500"><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="m9 12 2 2 4-4"></path></svg></span></div>
                <div class="ms-3"><h3 class="text-gray-800 font-semibold dark:text-white"><?php echo $this->lang->line('success'); ?></h3><p class="mt-2 text-sm text-gray-700 dark:text-gray-400"><?php echo $das;?></p></div>
                    <div class="ps-3 ms-auto"><button type="button" class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-teal-50 focus:ring-teal-600 dark:bg-transparent dark:hover:bg-teal-800/50 dark:text-teal-600" data-hs-remove-element="[role=alert]"><span class="sr-only"><?php echo $this->lang->line('dismiss'); ?></span><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg></button></div>
            </div>
        </div>
        <?php endif; ?>

       <div class="bg-cyan-600 text-white p-4 rounded-lg shadow flex justify-between items-center">
        <h2 class="text-lg font-semibold uppercase tracking-widest"><?php echo $this->lang->line('loan_application_form'); ?></h2>
      <a href="<?= base_url('admin/download_loan_application/' . $loan_form->loan_id); ?>" 
         class="inline-flex items-center gap-2 px-4 py-2 bg-white text-cyan-700 rounded-lg hover:bg-gray-100 transition-colors font-medium text-sm">
         <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
         </svg>
            <?php echo $this->lang->line('download_application_pdf'); ?>
      </a>
    </div>

<div class="flex flex-col md:flex-row gap-8 items-stretch">
    <!-- Left: Customer Info -->
    <div class="w-full md:w-3/12">
        <div class="bg-gradient-to-b from-green-50 to-white dark:from-gray-800 dark:to-gray-900 shadow-lg rounded-2xl p-5 border-t-4 border-green-500 dark:border-green-400 h-full transition-all hover:shadow-xl">
            <?php foreach ($customer_data as $customer_profiles): ?>
                <div class="text-center">
                    <?php if (!empty($customer_profiles->passport)): ?>
                        <img class="w-32 h-32 mx-auto rounded-full object-cover mb-4 border-4 border-green-400 dark:border-green-300 shadow-sm"
                             src="<?= base_url($customer_profiles->passport) ?>" alt="Customer Passport">
                    <?php else: ?>
                        <img class="w-32 h-32 mx-auto rounded-full object-cover mb-4 border-4 border-green-400 dark:border-green-300 shadow-sm"
                             src="<?= base_url('assets/img/customer21.png') ?>" alt="Default Image">
                    <?php endif; ?>

                    <h1 class="text-2xl font-extrabold text-green-700 dark:text-green-300 uppercase tracking-wide">
                        <?= strtoupper($customer_profiles->f_name) . " " . strtoupper(substr($customer_profiles->m_name, 0, 1)) . " " . strtoupper($customer_profiles->l_name) ?>
                    </h1>

                    <p class="text-sm text-gray-600 dark:text-gray-300 mt-1"><?= $customer_profiles->phone_no; ?></p>
                </div>

                <ul class="mt-5 text-sm text-gray-700 dark:text-gray-300 divide-y divide-gray-200 dark:divide-gray-700">
                    <li class="py-2 flex justify-between items-center">
                            <span><?php echo $this->lang->line('status'); ?></span>
                        <span class="bg-green-500 dark:bg-green-600 text-white text-xs px-2.5 py-1 rounded-full shadow-sm">
                               <?= (count($customer_data) === 1) ? $this->lang->line('new_customer') : $this->lang->line('existing_customer'); ?>
                        </span>
                    </li>
                    <li class="py-2 flex justify-between">
                            <span><?php echo $this->lang->line('member_since'); ?></span>
                        <span class="font-medium text-gray-800 dark:text-gray-200"><?= date('Y-m-d', strtotime($customer_profiles->customer_day)); ?></span>
                    </li>
                </ul>

                <!-- Documents -->
                <div class="mt-5">
                    <h3 class="text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2">📎 <?php echo $this->lang->line('customer_documents'); ?>:</h3>
                    <div class="flex flex-col gap-2 text-sm">
                        <a href="<?= base_url('assets/documents/barua_' . $customer_profiles->customer_id . '.pdf') ?>"
                           target="_blank"
                           class="text-cyan-700 dark:text-cyan-400 hover:text-cyan-900 dark:hover:text-cyan-200 font-medium transition-all">
                            📄 Barua ya Utambulisho
                        </a>
                        <a href="<?= base_url('assets/documents/kitambulisho_' . $customer_profiles->customer_id . '.pdf') ?>"
                           target="_blank"
                           class="text-cyan-700 dark:text-cyan-400 hover:text-cyan-900 dark:hover:text-cyan-200 font-medium transition-all">
                            📄 Kitambulisho
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Middle: Placeholder -->
    <div class="w-full md:w-6/12">
        <div class="bg-gradient-to-br from-gray-50 to-white dark:from-gray-800 dark:to-gray-900 rounded-2xl shadow-inner h-full p-6 flex items-center justify-center text-gray-400 dark:text-gray-300">
            <!-- <span class="italic">Loan approval or additional content here...</span> -->
        </div>
    </div>

    <!-- Right: Sponsor Info -->
    <div class="w-full md:w-3/12">
        <div class="bg-gradient-to-b from-orange-50 to-white dark:from-gray-800 dark:to-gray-900 shadow-lg rounded-2xl p-5 border-t-4 border-orange-500 dark:border-orange-400 h-full transition-all hover:shadow-xl">
            <?php foreach ($sponser_detail as $sponser): ?>
                <div class="text-center">
                    <?php if (!empty($sponser->passport_path)): ?>
                        <img class="w-32 h-32 mx-auto rounded-full object-cover mb-4 border-4 border-orange-400 dark:border-orange-300 shadow-sm"
                             src="<?= base_url($sponser->passport_path) ?>" alt="Sponsor Passport">
                    <?php else: ?>
                        <img class="w-32 h-32 mx-auto rounded-full object-cover mb-4 border-4 border-orange-400 dark:border-orange-300 shadow-sm"
                             src="<?= base_url('assets/img/customer21.png') ?>" alt="Default Image">
                    <?php endif; ?>

                    <h1 class="text-2xl font-extrabold text-orange-700 dark:text-orange-300 uppercase tracking-wide">
                        <?= strtoupper($sponser->sp_name . ' ' . $sponser->sp_mname . ' ' . $sponser->sp_lname); ?>
                    </h1>

                    <p class="text-sm text-gray-600 dark:text-gray-300 mt-1"><?= $sponser->sp_phone_no; ?></p>
                </div>

                <ul class="mt-5 text-sm text-gray-700 dark:text-gray-300 divide-y divide-gray-200 dark:divide-gray-700">
                    <li class="py-2 flex justify-between">
                            <span><?php echo $this->lang->line('relationship'); ?></span>
                        <span class="font-medium text-gray-800 dark:text-gray-200"><?= ucfirst($sponser->sp_relation); ?></span>
                    </li>
                    <li class="py-2 flex justify-between">
                            <span><?php echo $this->lang->line('occupation_business'); ?></span>
                        <span class="font-medium text-gray-800 dark:text-gray-200"><?= ucfirst($sponser->nature); ?></span>
                    </li>
                </ul>

                <!-- Sponsor Documents -->
                <div class="mt-5">
                    <h3 class="text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2">📎 <?php echo $this->lang->line('sponsor_documents'); ?>:</h3>
                    <div class="flex flex-col gap-2 text-sm">
                        <?php if (!empty($sponser->barua_path)): ?>
                            <a href="<?= base_url('assets/sponser_documents/' . basename($sponser->barua_path)); ?>" 
                               target="_blank"
                               class="text-indigo-700 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-200 font-medium transition-all">
                                📄 Barua ya Utambulisho
                            </a>
                        <?php endif; ?>

                        <?php if (!empty($sponser->kitambulisho_path)): ?>
                            <a href="<?= base_url('assets/sponser_documents/' . basename($sponser->kitambulisho_path)); ?>" 
                               target="_blank"
                               class="text-indigo-700 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-200 font-medium transition-all">
                                📄 Kitambulisho
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>



</div>





<!-- <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
			<div class="bg-gray-100">
    <div class="w-full bg-cyan-600 text-white">
        <div class="flex flex-col max-w-screen-xl px-4 mx-auto md:flex-row md:justify-between md:px-6 lg:px-8">
            <div class="p-2 flex flex-row items-center justify-between">
                <a href="#" class="text-lg font-semibold tracking-widest uppercase rounded-lg focus:outline-none focus:shadow-outline">
				Taarifa Za Mdhamini Wa Mkopo
                </a>
            </div>
        </div>
    </div>
</div>

            <div class="p-4">
              
                <div class="overflow-x-auto">
                    <div class="min-w-full inline-block align-middle">
                        <div class="border rounded-lg overflow-hidden dark:border-gray-700">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" >
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="py-3 px-6 text-start"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">S/No.</span></div></th>
                                        <th scope="col" class="py-3 px-6 text-start"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Jina La Mdhamini</span><svg class="size-3.5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path class="hs-datatable-ordering-desc:text-cyan-600 dark:hs-datatable-ordering-desc:text-cyan-500" d="m7 15 5 5 5-5"></path><path class="hs-datatable-ordering-asc:text-cyan-600 dark:hs-datatable-ordering-asc:text-cyan-500" d="m7 9 5-5 5 5"></path></svg></div></th>
                                        <th scope="col" class="py-3 px-6 text-start"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Namba Ya Simu</span><svg class="size-3.5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path class="hs-datatable-ordering-desc:text-cyan-600 dark:hs-datatable-ordering-desc:text-cyan-500" d="m7 15 5 5 5-5"></path><path class="hs-datatable-ordering-asc:text-cyan-600 dark:hs-datatable-ordering-asc:text-cyan-500" d="m7 9 5-5 5 5"></path></svg></div></th>
                                        <th scope="col" class="py-3 px-6 text-start"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Uhusiano Na Mkopaji</span><svg class="size-3.5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path class="hs-datatable-ordering-desc:text-cyan-600 dark:hs-datatable-ordering-desc:text-cyan-500" d="m7 15 5 5 5-5"></path><path class="hs-datatable-ordering-asc:text-cyan-600 dark:hs-datatable-ordering-asc:text-cyan-500" d="m7 9 5-5 5 5"></path></svg></div></th>
                                        <th scope="col" class="py-3 px-6 text-start --exclude-from-ordering"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Biashara/Kazi Ya Mdhamini</span></div></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
								
								     <?php $no = 1; ?>
                                    <?php if (isset($sponser_detail) && is_array($sponser_detail) && !empty($sponser_detail)): ?>
                                        <?php foreach ($sponser_detail as $sponser_details): ?>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200"><?php echo $no++; ?>.</td>
											<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo htmlspecialchars($sponser_details->sp_name, ENT_QUOTES, 'UTF-8'); ?> <?php echo htmlspecialchars($sponser_details->sp_mname, ENT_QUOTES, 'UTF-8'); ?> <?php echo htmlspecialchars($sponser_details->sp_lname, ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo htmlspecialchars($sponser_details->sp_phone_no, ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo htmlspecialchars($sponser_details->sp_relation, ENT_QUOTES, 'UTF-8'); ?></td>
											<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo ucfirst(htmlspecialchars($sponser_details->nature, ENT_QUOTES, 'UTF-8')); ?></td>

                                        </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

				
            </div>
			
        </div> -->
     
		<div class=" bg-white border  p-4 rounded-lg shadow  border-blue-500 dark:bg-gray-800 dark:border-gray-700">
		<div class="w-full bg-cyan-600 text-white">
        <div class="flex flex-col max-w-screen-xl px-4 mx-auto md:flex-row md:justify-between md:px-6 lg:px-8">
            <div class="p-2 flex flex-row items-center justify-between">
                <a href="#" class="text-lg font-semibold tracking-widest uppercase rounded-lg focus:outline-none focus:shadow-outline">
    				<?php echo $this->lang->line('loan_collateral_info'); ?>
                </a>
            </div>
        </div>
    </div>
			

            <div class="p-4">
              
                <div class="overflow-x-auto">
                    <div class="min-w-full inline-block align-middle">
                        <div class="border rounded-lg overflow-hidden dark:border-gray-700">
     
<table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
    <thead class="bg-gray-50 dark:bg-gray-700">
        <tr>
            <th class="py-3 px-6 text-start text-gray-800 dark:text-gray-200 font-bold">S/No.</th>
                <th class="py-3 px-6 text-start text-gray-800 dark:text-gray-200 font-bold"><?php echo $this->lang->line('collateral_name'); ?></th>
                <th class="py-3 px-6 text-start text-gray-800 dark:text-gray-200 font-bold"><?php echo $this->lang->line('collateral_condition'); ?></th>
                <th class="py-3 px-6 text-start text-gray-800 dark:text-gray-200 font-bold"><?php echo $this->lang->line('collateral_value'); ?></th>
                <th class="py-3 px-6 text-start text-gray-800 dark:text-gray-200 font-bold"><?php echo $this->lang->line('view_collateral'); ?></th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
        <?php if (!empty($collateral) && is_array($collateral)): ?>
            <?php 
                $no = 1; 
                $total_value = 0;
            ?>
            <?php foreach ($collateral as $item): ?>
                <?php $total_value += $item->value; ?>
                <tr>
                    <td class="px-6 py-4 text-sm font-medium text-gray-800 dark:text-gray-200"><?= $no++; ?>.</td>
                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200"><?= htmlspecialchars($item->description); ?></td>
                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200"><?= htmlspecialchars($item->co_condition); ?></td>
                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200"><?= number_format($item->value, 2); ?></td>
                    <td class="px-6 py-4">
                        <?php if (!empty($item->file_name)): ?>
                            <button 
                                type="button"
                                data-modal-target="default-modal"
                                data-modal-toggle="default-modal"
                                data-file="<?= base_url('assets/dhamana/' . $item->file_name); ?>"
                                onclick="loadDhamana(this)"
                                class="text-blue-600 hover:text-blue-800 focus:outline-none"
                                   title="<?php echo $this->lang->line('view_collateral'); ?>"
                            >
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        <?php else: ?>
                               <span class="text-gray-400"><?php echo $this->lang->line('no_collateral'); ?></span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                    <?php echo $this->lang->line('no_collateral_records'); ?>
                </td>
            </tr>
        <?php endif; ?>
    </tbody>
    <?php if (!empty($collateral) && is_array($collateral)): ?>
    <tfoot class="bg-gray-50 dark:bg-gray-800">
        <tr>
                <td colspan="3" class="px-6 py-4 text-sm font-semibold text-right text-gray-700 dark:text-gray-200"><?php echo $this->lang->line('total'); ?>:</td>
            <td class="px-6 py-4 text-sm font-bold text-gray-800 dark:text-white"><?= number_format($total_value, 2); ?></td>
            <td></td>
        </tr>
    </tfoot>
    <?php endif; ?>
</table>

<!-- Modal -->
<div id="default-modal" tabindex="-1" aria-hidden="true"
     class="hidden fixed top-0 left-0 z-50 flex items-center justify-center w-full h-full bg-black bg-opacity-50">
    
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700" style="width: 1200px; height: 500px;">
        <!-- Header -->
        <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white"><?php echo $this->lang->line('view_collateral'); ?></h3>
            <button type="button" data-modal-hide="default-modal"
                class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 14 14">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>

        <!-- Body -->
        

        <div class="h-[700px] overflow-auto modal-body-content p-0 flex items-center justify-center bg-gray-100">
            <!-- Content will be injected here -->
        </div>

        <!-- Footer -->
        <div class="flex items-center justify-end p-4 border-t border-gray-200 rounded-b dark:border-gray-600">
            <button data-modal-hide="default-modal" type="button"
                    class="px-5 py-2.5 text-sm font-medium text-white bg-blue-700 hover:bg-blue-800 rounded-lg"><?php echo $this->lang->line('close'); ?></button>
        </div>
    </div>
</div>

                  </div>
                    </div>
                </div>

				
            </div>
			
        </div>



        	<div class="flex flex-col bg-white border shadow-sm rounded-xl pb-1.5 dark:bg-gray-800 dark:border-gray-700">
		<div class="w-full bg-cyan-600 text-white p-4">
        <div class="flex justify-between items-center">
            <h2 class="text-lg font-semibold tracking-widest uppercase">
    		<?php echo $this->lang->line('loan_history'); ?>
            </h2>
            <a href="<?= base_url('admin/download_loan_history/' . $loan_form->customer_id); ?>" 
               class="inline-flex items-center gap-2 px-4 py-2 bg-white text-cyan-700 rounded-lg hover:bg-gray-100 transition-colors font-medium text-sm">
               <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
               </svg>
                    <?php echo $this->lang->line('download_history_pdf'); ?>
            </a>
        </div>
    </div>
			

            <div class="p-4">
              
                <div class="overflow-x-auto">
                    <div class="min-w-full inline-block align-middle">
                        <div class="border rounded-lg overflow-hidden dark:border-gray-700">
     
<table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
    <thead class="bg-gray-50 dark:bg-gray-700">
        <tr>


                                    <th class="py-3 px-6 text-start text-gray-800 dark:text-gray-200 font-bold">S/No.</th>
                                        <th class="py-3 px-6 text-start text-gray-800 dark:text-gray-200 font-bold"><?php echo $this->lang->line('loan_product'); ?></th>
                                        <th class="py-3 px-6 text-start text-gray-800 dark:text-gray-200 font-bold"><?php echo $this->lang->line('principal'); ?></th>
                                        <th class="py-3 px-6 text-start text-gray-800 dark:text-gray-200 font-bold"><?php echo $this->lang->line('principal_interest'); ?></th>
                                        <th class="py-3 px-6 text-start text-gray-800 dark:text-gray-200 font-bold"><?php echo $this->lang->line('duration_type'); ?></th>
                                        <th class="py-3 px-6 text-start text-gray-800 dark:text-gray-200 font-bold"><?php echo $this->lang->line('disburse_date'); ?></th>
                                        <th class="py-3 px-6 text-start text-gray-800 dark:text-gray-200 font-bold"><?php echo $this->lang->line('end_date'); ?></th>
                                        <th class="py-3 px-6 text-start text-gray-800 dark:text-gray-200 font-bold"><?php echo $this->lang->line('last_payment'); ?></th>
                                        <th class="py-3 px-6 text-start text-gray-800 dark:text-gray-200 font-bold"><?php echo $this->lang->line('credit_score'); ?></th>
        </tr>
    </thead>
   <tbody class="divide-y divide-gray-200">
    <?php $no = 1; ?>
    <?php if (empty($loan_history)): ?>
        <tr>
            <td colspan="9" class="px-4 py-3 text-center text-gray-500 italic">
                 <?php echo $this->lang->line('no_loan_history'); ?>
            </td>
        </tr>
    <?php else: ?>
        <?php foreach ($loan_history as $history): ?>
            <tr class="transition">
                <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-200 font-bold"><?php echo $no++; ?>.</td>
                <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-200 font-bold">
                    <?php echo strtoupper($history->loan_name); ?>
                </td>
                <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-200 font-bold">
                    <?php echo number_format($history->loan_aprove); ?>
                </td>
                <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-200 font-bold">
                    <?php echo number_format($history->loan_int); ?>
                </td>

                <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-200 font-bold">
                    <?php 
                    if ($history->day == 1) {
                            echo $this->lang->line('day_option') . " ({$history->session})";
                    } elseif ($history->day == 7) {
                            echo $this->lang->line('week_option') . " ({$history->session})";
                    } elseif (in_array($history->day, [28, 29, 30, 31])) {
                            echo $this->lang->line('month_option') . " ({$history->session})"; 
                    }
                    ?>
                </td>

              

                <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-200 font-bold"><?php echo $history->loan_stat_date; ?></td>
                <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-200 font-bold"><?php echo substr($history->loan_end_date, 0, 10); ?></td>
                <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-200 font-bold"><?= $history->depost_day ?></td>

                <td class="px-4 py-2 text-sm">
                    <?php 
                    $loan_end_date = strtotime(substr($history->loan_end_date, 0, 10));
                    $depost_day = strtotime($history->depost_day);
                        $status = $this->lang->line('score_default');
                    $badge_color = "bg-gray-100 text-gray-800";
                    $btn_color = "bg-green-100 hover:bg-green-200 text-green-800";

                    $url = base_url("admin/view_customer_statemnt/{$history->loan_id}");

                    if ($depost_day == $loan_end_date) {
                            $status = $this->lang->line('score_excellent');
                        $badge_color = "bg-green-100 text-green-800";
                        $btn_color = "bg-green-100 hover:bg-green-200 text-green-800";
                    } elseif ($depost_day > $loan_end_date && ($depost_day - $loan_end_date) <= (15 * 86400)) {
                            $status = $this->lang->line('score_fair');
                        $badge_color = "bg-yellow-100 text-yellow-800";
                        $btn_color = "bg-yellow-100 hover:bg-yellow-200 text-yellow-800";
                    } elseif ($depost_day > $loan_end_date && ($depost_day - $loan_end_date) > (15 * 86400)) {
                            $status = $this->lang->line('score_overdue');
                        $badge_color = "bg-red-100 text-red-800";
                        $btn_color = "bg-red-100 hover:bg-red-200 text-red-800";
                    }

                    echo "
                    <a href='$url' class='inline-flex items-center gap-x-1 px-3 py-1.5 text-xs font-semibold rounded-full $btn_color transition'>
                        <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"h-4 w-4\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\">
                            <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M15 12a3 3 0 11-6 0 3 3 0 016 0z\" />
                            <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z\" />
                        </svg>
                            " . $this->lang->line('loan_score') . "
                        <span class='ml-1 px-2 py-0.5 rounded-full text-[10px] font-medium $badge_color'>$status</span>
                    </a>";
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</tbody>

</table>

<!-- Modal -->
<div id="default-modal" tabindex="-1" aria-hidden="true"
     class="hidden fixed top-0 left-0 z-50 flex items-center justify-center w-full h-full bg-black bg-opacity-50">
    
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700" style="width: 1200px; height: 500px;">
        <!-- Header -->
        <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
              <h3 class="text-xl font-semibold text-gray-900 dark:text-white"><?php echo $this->lang->line('view_collateral'); ?></h3>
            <button type="button" data-modal-hide="default-modal"
                class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 14 14">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>

        <!-- Body -->
        

        <div class="h-[700px] overflow-auto modal-body-content p-0 flex items-center justify-center bg-gray-100">
            <!-- Content will be injected here -->
        </div>

        <!-- Footer -->
        <div class="flex items-center justify-end p-4 border-t border-gray-200 rounded-b dark:border-gray-600">
            <button data-modal-hide="default-modal" type="button"
                    class="px-5 py-2.5 text-sm font-medium text-white bg-blue-700 hover:bg-blue-800 rounded-lg"><?php echo $this->lang->line('close'); ?></button>
        </div>
    </div>
</div>

                  </div>
                    </div>
                </div>

				
            </div>
			
        </div>

        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
		<div class="w-full bg-cyan-600 text-white">
        <div class="flex flex-col max-w-screen-xl px-4 mx-auto md:flex-row md:justify-between md:px-6 lg:px-8">
            <div class="p-2 flex flex-row items-center justify-between">
                <a href="#" class="text-lg font-semibold tracking-widest uppercase rounded-lg focus:outline-none focus:shadow-outline">
    				<?php echo $this->lang->line('loan_request_details'); ?>
                </a>
            </div>
        </div>
    </div>
			

    <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 md:p-6">
                <!-- <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-6">
                    Register New Customer
                </h4> -->
                <?php echo form_open("admin/aprove_loan/{$loan_form->loan_id}", ['novalidate' => true]); ?>
                    <div class="grid sm:grid-cols-12 gap-4 sm:gap-6">

                    
                        <div class="sm:col-span-4">
                               <label for="f_name" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('loan_type'); ?>:</label>
                            <input type="text" id="f_name" name="" readonly autocomplete="off" 
                                   class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"  
                                   value="<?php echo set_value('loan_name', isset($loan_form->loan_name) ? strtoupper(preg_replace('/[^a-zA-Z]/', '  ', $loan_form->loan_name)) : ''); ?>">

                        </div>

						<div class="sm:col-span-4">
                            <label for="how_loan" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('requested_amount'); ?>:</label>
                            <input type="text" id="how_loan" name="" readonly autocomplete="off" 
                                   class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600" 
                                   value="<?php echo set_value('sp_lname', isset($loan_form->how_loan) ? number_format((float)$loan_form->how_loan, 0) : ''); ?>">
                        </div>

                        <div class="sm:col-span-4">
                               <label for="how_loan" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('approved_amount'); ?>:</label>
                            <input type="text" id="how_loan" name="loan_aprove" placeholder="Full name" autocomplete="off" 
                                   class="py-2.5 px-4 block w-full border-green-600 rounded-lg text-sm focus:border-green-500 focus:ring-green-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-green-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600" 
                                   value="<?php echo set_value('sp_lname', isset($loan_form->how_loan) ? $loan_form->how_loan : ''); ?>"
                       readonly>
                        </div>

                        <input type="hidden" name="penat_status" value="YES">
                        

                        <div class="sm:col-span-4">
            <label for="l_name" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('repayment_of'); ?>:</label>
    <input type="text" id="l_name" name="" readonly autocomplete="off" 
        class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600" 
        value="<?php
            if (isset($loan_form->day)) {
                if ($loan_form->day == 1) {
                        echo $this->lang->line('day_option');
                } elseif ($loan_form->day == 7) {
                        echo $this->lang->line('week_option');
                } elseif (in_array($loan_form->day, [28, 29, 30, 31])) {
                        echo $this->lang->line('month_option');
                }
            }
        ?>">
</div>




                        <div class="sm:col-span-4">
                               <label for="phone_no" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('total_repayments'); ?>:</label>
                            <input type="number" id="phone_no" name="" readonly autocomplete="off" required
                                   class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600" 
                                   value="<?php echo set_value('session', isset($loan_form->session) ? $loan_form->session : ''); ?>">
                           
                        </div>

                        <div class="sm:col-span-4">
                               <label for="reason" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('borrower_business'); ?>:</label>
                            <input type="text" id="reason" name="" readonly autocomplete="off" required
                                   class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600" 
                                   value="<?php echo set_value('reason', isset($loan_form->reason) ? $loan_form->reason : ''); ?>">
                           
                        </div>
                        
						
<div class="sm:col-span-4">
    <label for="age" class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('loan_application_date'); ?>:</label>
    <input type="text" readonly id="age" name="" autocomplete="off"
           class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
            value="<?php echo set_value('customer_day', isset($loan_form->loan_day) ? $loan_form->loan_day : ''); ?>">
</div>

<div class="sm:col-span-4">
    <label class="block text-sm font-medium mb-2 dark:text-gray-300">* <?php echo $this->lang->line('loan_requesting_officer'); ?>:</label>
    <div class="flex items-center gap-3 py-2.5 px-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
        <?php if (!empty($loan_form->creator_passport)): ?>
            <img src="<?= base_url('assets/images/passport/' . basename($loan_form->creator_passport)); ?>" 
                 alt="Officer Photo" 
                 class="w-16 h-16 rounded-full object-cover border-2 border-cyan-500 shadow-md"
                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
            <div class="w-16 h-16 rounded-full bg-gradient-to-br from-cyan-500 to-blue-600 items-center justify-center text-white font-semibold text-xl border-2 border-cyan-500 shadow-md" style="display: none;">
                <?= isset($loan_form->creator_name) ? strtoupper(substr($loan_form->creator_name, 0, 1)) : 'A'; ?>
            </div>
        <?php else: ?>
            <div class="w-16 h-16 rounded-full bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center text-white font-semibold text-xl border-2 border-cyan-500 shadow-md">
                <?= isset($loan_form->creator_name) ? strtoupper(substr($loan_form->creator_name, 0, 1)) : 'A'; ?>
            </div>
        <?php endif; ?>
        <span class="text-sm text-gray-800 dark:text-gray-300 font-medium">
            <?= isset($loan_form->creator_name) ? $loan_form->creator_name : ''; ?>
        </span>
    </div>
</div>


                    </div>

                    <!-- Branch Manager Verification Status -->
                    <div class="mt-6 pt-4 border-t border-gray-200 dark:border-gray-700">
                        <?php if (!empty($loan_form->verified_by)): ?>
                        <div class="flex items-center gap-x-3 p-4 bg-green-50 border border-green-200 rounded-lg dark:bg-green-900/20 dark:border-green-800">
                            <svg class="shrink-0 size-5 text-green-600 dark:text-green-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <div>
                                <h3 class="text-sm font-semibold text-green-800 dark:text-green-300">
                                    <?php echo $this->lang->line('verified') ?? 'Verified'; ?>
                                </h3>
                                <p class="text-sm text-green-700 dark:text-green-400">
                                    <?php echo ($this->lang->line('verified_by') ?? 'Verified By') . ': ' . htmlspecialchars($loan_form->verifier_name ?? '', ENT_QUOTES, 'UTF-8'); ?>
                                    &bull;
                                    <?php echo ($this->lang->line('verified_at') ?? 'Verified At') . ': ' . date('d M, Y H:i', strtotime($loan_form->verified_at)); ?>
                                </p>
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="flex items-center gap-x-3 p-4 bg-yellow-50 border border-yellow-200 rounded-lg dark:bg-yellow-900/20 dark:border-yellow-800">
                            <svg class="shrink-0 size-5 text-yellow-600 dark:text-yellow-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><line x1="12" x2="12" y1="9" y2="13"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg>
                            <div>
                                <h3 class="text-sm font-semibold text-yellow-800 dark:text-yellow-300">
                                    <?php echo $this->lang->line('not_verified') ?? 'Not Verified'; ?>
                                </h3>
                                <p class="text-sm text-yellow-700 dark:text-yellow-400">
                                    <?php echo $this->lang->line('loan_verification_subtitle') ?? 'This loan has not been verified by a branch manager.'; ?>
                                </p>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex justify-center gap-x-2">
                               <button type="submit" class="py-2 px-4 btn-primary-sm bg-cyan-800 border border-cyan-500 hover:bg-cyan-700 text-white"><?php echo $this->lang->line('approve'); ?></button>
                               <a href="<?php echo base_url("admin/reject_loan/{$loan_form->loan_id}") ?>" class="py-2 px-4 bg-red-600 dark:bg-red-800 rounded border border-red-500 hover:bg-red-700 text-white"><?php echo $this->lang->line('reject'); ?></a>
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








<script>
    function loadDhamana(button) {
        const fileUrl = button.getAttribute('data-file');
        const modalBody = document.querySelector('#default-modal .modal-body-content');

        // Check file type and decide how to render it
        if (/\.(jpg|jpeg|png|gif|webp)$/i.test(fileUrl)) {
            modalBody.innerHTML = `
                <img src="${fileUrl}" alt="Dhamana" class="w-full h-full object-contain rounded" />
            `;
        } else {
            modalBody.innerHTML = `
                <iframe src="${fileUrl}" width="100%" height="100%" frameborder="0" class="rounded"></iframe>
            `;
        }
    }
</script>

