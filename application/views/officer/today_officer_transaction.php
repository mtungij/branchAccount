
<?php
include_once APPPATH . "views/partials/officerheader.php";

$can_delete_paid_transactions = true;
if (function_exists('has_permission')) {
    $can_delete_paid_transactions = has_permission('Officer Payment Dashboard', 'can_delete');
}
?>


<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-6">

    

    
        <section class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5">
  <div class="w-full ">
      <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
      <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-start lg:space-y-0 lg:space-x-4">

  <a href="<?php echo base_url("oficer/print_officer_todaycash_transaction") ?>" target="_blank" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
    </svg>
    Tuma Report
  </a>
</div>


          

  <div class="overflow-x-auto">
  <div class="flex flex-wrap items-center gap-2 mb-4">
  
    <div class="relative w-full sm:w-auto">
      <label for="shareholder-table-search" class="sr-only">Search</label>
      <input
        type="search"
        name="shareholder-table-search"
        id="shareholder-table-search"
        class="py-2 px-3 ps-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
        placeholder=""
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


  


<div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700">

      
   

  
  <table id="shareholder_table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-cyan-500 uppercase bg-gray-50 dark:bg-cyan-500 dark:text-gray-50">
        <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
            <th class="px-4 py-3"><?php echo $this->lang->line('s_no'); ?></th>
            <th class="px-4 py-3"><?php echo $this->lang->line('employee_label'); ?></th>
            <th class="px-4 py-3"><?php echo $this->lang->line('customer_name'); ?></th>
            <th class="px-4 py-3"><?php echo $this->lang->line('phone_number'); ?></th>
            <th class="px-4 py-3"><?php echo ($this->lang->line('paid') ?: 'Paid') . ' (' . ($this->lang->line('rejesho') ?: 'Collection') . ')'; ?></th>
            <th class="px-4 py-3"><?php echo $this->lang->line('loan_return_amount') ?: 'Loan Return Amount'; ?></th>
            <th class="px-4 py-3"><?php echo $this->lang->line('principal_return') ?: 'Principal Return'; ?></th>
            <th class="px-4 py-3"><?php echo $this->lang->line('interest_return') ?: 'Interest Return'; ?></th>
            <th class="px-4 py-3"><?php echo $this->lang->line('payment_account_label') ?: 'Payment Account'; ?></th>
            <th class="px-4 py-3"><?php echo $this->lang->line('mkopo') ?: 'Mkopo'; ?></th>
            <th class="px-4 py-3"><?php echo $this->lang->line('withdrawal_account_label') ?: 'Withdrawal Account'; ?></th>
            <th class="px-4 py-3"><?php echo $this->lang->line('date'); ?></th>
            <th class="px-4 py-3"><?php echo $this->lang->line('action'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $sno = 1; 
           
        ?>

                 <?php $no = 1; ?>
                                <?php foreach ($cash_transaction as $cashs): ?>
         
          
               
            

           <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
             <td class="px-4 py-2 font-medium text-gray-900 dark:text-white">
                   <?= $sno++; ?>
                </td>
                    <td class="px-4 py-2 font-medium text-gray-900 dark:text-white"><?php echo $cashs->empl_name; ?></td>
                    <td class="px-4 py-2 font-medium text-gray-900 dark:text-white">
                       <?php echo $cashs->f_name; ?> <?php echo $cashs->m_name; ?> <?php echo $cashs->l_name; ?>
                    </td>

                    <td class="px-4 py-2 font-medium text-gray-900 dark:text-white"><?php echo $cashs->phone_no; ?></td>
                    <td class="px-4 py-2 font-medium text-gray-900 dark:text-white">
                        <?php if ($cashs->depost == TRUE) {
                                         ?>
                                        <?php echo number_format($cashs->depost); ?>
                                    <?php }elseif ($cashs->depost == FALSE) {
                                     ?>
                                     -
                                     <?php } ?>
                    </td>
                    <td class="px-4 py-2 font-medium text-gray-900 dark:text-white">
                      <?php
                      $loan_return_amount = ((float)($cashs->principal_return ?? 0) + (float)($cashs->interest_return ?? 0));
                      if ($loan_return_amount > 0) {
                        echo number_format($loan_return_amount);
                      } else {
                        echo '-';
                      }
                      ?>
                    </td>
                    <td class="px-4 py-2 font-medium text-gray-900 dark:text-white">
                      <?php echo !empty($cashs->principal_return) ? number_format($cashs->principal_return) : '-'; ?>
                    </td>
                    <td class="px-4 py-2 font-medium text-gray-900 dark:text-white">
                      <?php echo !empty($cashs->interest_return) ? number_format($cashs->interest_return) : '-'; ?>
                    </td>
                    <td class="px-4 py-2 font-medium text-gray-900 dark:text-white">
                       <?php if ($cashs->deposit_account == TRUE) {
                                         ?>
                                        <?php echo $cashs->deposit_account; ?>
                                    <?php }else{ ?>
                                        -
                                        <?php } ?>
                    </td>
                    <td class="px-4 py-2 font-medium text-gray-900 dark:text-white">
                         <?php if ($cashs->withdraw == TRUE) {
                                         ?>
                                        <?php echo number_format($cashs->loan_aprov); ?>
                                    <?php }elseif ($cashs->withdraw == FALSE) {
                                     ?>
                                     -
                                     <?php } ?>
                    </td>
                    <td class="px-4 py-2 font-medium text-gray-900 dark:text-white">
                       <?php if ($cashs->withdrawal_account == TRUE) {
                                         ?>
                                        <?php echo $cashs->withdrawal_account; ?>
                                    <?php }else{ ?>
                                        -
                                        <?php } ?>
                    </td>

                    <td class="px-4 py-2 font-medium text-gray-900 dark:text-white">
                      <?php echo $cashs->time_rec; ?>
                    </td>

                    <td class="px-4 py-2 font-medium text-gray-900 dark:text-white">
                      <?php if ($can_delete_paid_transactions && !empty($cashs->pay_id) && !empty($cashs->depost) && (float)$cashs->depost > 0): ?>
                        <a href="<?php echo base_url("oficer/delete_depost_data/{$cashs->pay_id}") ?>"
                           onclick="return confirm('Are you sure you want to delete this paid transaction?')"
                           class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-hidden focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
                          <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m-7 0h8m-8 0a1 1 0 01-1-1V5a1 1 0 011-1h6a1 1 0 011 1v1"/>
                          </svg>
                          <?php echo $this->lang->line('delete'); ?>
                        </a>
                      <?php else: ?>
                        -
                      <?php endif; ?>
                    </td>

                    
                </tr>
           


            
            </tr>
        <?php endforeach; ?>
    </tbody>
  
                                   
                                    </tbody>
                                     <tr>
                                    
                                        <td class="px-4 py-2 font-medium text-gray-900 dark:text-white"></td>
                                        <td></td>
                                        <td><b></b></td>
                                        <td></td>
                                        <td class="px-4 py-2 font-medium text-gray-900 dark:text-white"><b><?php echo number_format($sum_cashTransaction->total_deposit); ?></b></b></td>
                                        <td class="px-4 py-2 font-medium text-gray-900 dark:text-white"><b><?php echo number_format(($sum_cashTransaction->total_principal_return ?? 0) + ($sum_cashTransaction->total_interest_return ?? 0)); ?></b></td>
                                        <td class="px-4 py-2 font-medium text-gray-900 dark:text-white"><b><?php echo number_format($sum_cashTransaction->total_principal_return ?? 0); ?></b></td>
                                        <td class="px-4 py-2 font-medium text-gray-900 dark:text-white"><b><?php echo number_format($sum_cashTransaction->total_interest_return ?? 0); ?></b></td>
                                        <td class="px-4 py-2 font-medium text-gray-900 dark:text-white"><b></td>
                                        <td class="px-4 py-2 font-medium text-gray-900 dark:text-white"><?php echo number_format($sum_cashTransaction->total_aprove); ?></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    
                                    </tr>

                                    <tr>
                                       <td></td> 
                                       <td></td> 
                                       <td></td> 
                                       <td></td> 
                                       <td class="px-4 py-2 font-medium text-gray-900 dark:text-white">MUHTASALI WA KULIPISHA</td> 
                                       <td></td> 
                                       <td></td> 
                                       <td></td> 
                                       <td></td> 
                                       <td></td>  
                                    </tr>
                                    <?php foreach ($account_deposit as $account_deposits): ?>
                                    <tr>
                                       <td></td> 
                                       <td></td> 
                                       <td></td> 
                                       <td></td> 
                                       <td class="px-4 py-2 font-medium text-gray-900 dark:text-white"><b><?php echo $account_deposits->account_name; ?></b></td> 
                                       <td></td> 
                                       <td class="px-4 py-2 font-medium text-gray-900 dark:text-white"><b><?php echo number_format($account_deposits->total_deposit_acc); ?></b></td> 
                                       <td></td> 
                                       <td></td> 
                                       <td></td>  
                                    </tr>
                                     <?php endforeach; ?>
                                     <tr>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td class="px-4 py-2 font-medium text-gray-900 dark:text-white"><b>MADENI SUGU</b></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                     </tr>

                                          <?php $no = 1; ?>
                                     <?php foreach ($default_list as $default_lists): ?>
                                       <tr>
                                         <td></td>
                                         <td> </td>
                                         <td></td>
                                         <td></td>
                                         <td class="px-4 py-2 font-medium text-gray-900 dark:text-white"><?php echo $default_lists->f_name; ?> <?php echo $default_lists->m_name; ?> <?php echo $default_lists->l_name; ?></td>
                                          
                                         <td class="px-4 py-2 font-medium text-gray-900 dark:text-white"><?php echo number_format($default_lists->depost); ?></td>
                                         <td class="px-4 py-2 font-medium text-gray-900 dark:text-white"><?php echo $default_lists->account_name; ?></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                     </tr>
                                      <?php endforeach ?>
                                      <tr>
                                         <td></td>
                                         <td> </td>
                                         <td></td>
                                         <td></td>
                                         <td class="px-4 py-2 font-medium text-gray-900 dark:text-white"><b>JUMLA MADENI SUGU</b></td>
                                         <td></td>
                                         <td class="px-4 py-2 font-medium text-gray-900 dark:text-white"><b><?php echo number_format($toyal_default->total_default); ?></b></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                     </tr>
                                        <!-- <tr>
                                         <td></td>
                                         <td> </td>
                                         <td></td>
                                         <td></td>
                                         <td><b>MIAMALA HEWA</b></td>
                                         <td></td>
                                         <td><b></b></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                   

                                     <?php foreach ($miamala as $miamalas): ?>
                                          <tr>
                                         <td></td> 
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td><?php echo $miamalas->agent; ?></td>
                                         <td><?php echo $miamalas->account_name; ?></td>
                                         <td><?php echo number_format($miamalas->amount); ?></td>
                                         <td><?php echo $miamalas->blanch_name; ?></td>
                                         <td></td>
                                         <td></td>
                                     </tr>
                                     <?php endforeach; ?> -->
                                     
                                     <tr>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td class="px-4 py-2 font-medium text-gray-900 dark:text-white">MUHTASALI WA GAWA</td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                     </tr>
                                     <?php foreach ($withdrawal_account as $withdrawal_accounts): ?>
                                     <tr>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td class="px-4 py-2 font-medium text-gray-900 dark:text-white"><b><?php echo $withdrawal_accounts->account_name; ?></b></td>
                                         <td></td>
                                         <td class="px-4 py-2 font-medium text-gray-900 dark:text-white"><b><?php echo number_format($withdrawal_accounts->total_with_acc); ?></b></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                     </tr>
                                     <?php endforeach; ?>
                                      <tr>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td class="px-4 py-2 font-medium text-gray-900 dark:text-white"><b>Code No</b></td>
                                         <td></td>
                                         <td class="px-4 py-2 font-medium text-gray-900 dark:text-white"><b><?php echo number_format($total_code_no->total_interest); ?></b></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                     </tr>
                                     <tr>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td class="px-4 py-2 font-medium text-gray-900 dark:text-white"><b>JUMLA YA FOMU</b></td>
                                         <td></td>
                                         <td class="px-4 py-2 font-medium text-gray-900 dark:text-white"><b><?php echo number_format($deducted_fee->total_deducted); ?></b></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                     </tr>
                                     <tr>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td class="px-4 py-2 font-medium text-gray-900 dark:text-white"><b>JUMLA YA FAINI</b></td>
                                         <td></td>
                                         <td class="px-4 py-2 font-medium text-gray-900 dark:text-white"><b><?php echo number_format($penart_paid->total_penart); ?></b></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                     </tr>
                                           <tr>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td class="px-4 py-2 font-medium text-gray-900 dark:text-white"><b>JUMLA YA WATEJA WALIO LIPA HAI</b></td>
                                         <td></td>
                                         <td class="px-4 py-2 font-medium text-gray-900 dark:text-white"><b><?php echo number_format($hai_wateja->total_hai); ?></b></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                     </tr>
                                      <tr>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td class="px-4 py-2 font-medium text-gray-900 dark:text-white"><b>JUMLA YA WATEJA WALIO LIPA SUGU</b></td>
                                         <td></td>
                                         <td class="px-4 py-2 font-medium text-gray-900 dark:text-white"><b><?php echo number_format($sugu_wateja->total_sugu); ?></b></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                     </tr>


                                      <tr>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td class="px-4 py-2 font-medium text-gray-900 dark:text-white"><b>JUMLA YA MAUZO</b></td>
                                         <td></td>
                                         <td class="px-4 py-2 font-medium text-gray-900 dark:text-white"><b><?php echo number_format($sum_cashTransaction->total_deposit + $total_miamala->total_miamala); ?></b></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                     </tr>
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
      <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200 dark:border-neutral-700">
        <h3 id="hs-basic-modal-label" class="font-bold text-gray-800 dark:text-white">
          Filter Data
        </h3>
        <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-basic-modal">
          <span class="sr-only">Close</span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M18 6 6 18"></path>
            <path stroke-linecap="round" stroke-linejoin="round" d="m6 6 12 12"></path>
          </svg>
        </button>
      </div>

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



		