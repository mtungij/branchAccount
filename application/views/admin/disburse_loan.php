<?php
include_once APPPATH . "views/partials/header.php";

$is_super_admin = ($this->session->userdata('role') === 'admin');
$can_loan_delete = $is_super_admin || has_permission('Loans', 'can_delete') || has_permission('Mikopo', 'can_delete');

// --- DUMMY DATA - REMOVE AND LOAD FROM YOUR CONTROLLER ---
// Controller should pass $share, an array of shareholder objects.
// Each object should have 'loan_id', 'share_name', 'share_mobile', 'share_email', 'share_sex', 'share_dob'.
// if (!isset($share)) {
//     $share = [
//         (object)['loan_id' => 1, 'share_name' => 'Alice Wonderland', 'share_mobile' => '0712345001', 'share_email' => 'alice@example.com', 'share_sex' => 'female', 'share_dob' => '1985-06-15'],
//         (object)['loan_id' => 2, 'share_name' => 'Bob The Builder', 'share_mobile' => '0712345002', 'share_email' => 'bob@example.com', 'share_sex' => 'male', 'share_dob' => '1978-11-02'],
//     ];
// }
// --- END DUMMY DATA ---
?>

<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-6">

        <!-- Page Title / Subheader -->
        <div class="mb-6">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-200">
                <?php echo $this->lang->line('disbursed_loans'); ?>
            </h2>
            <!-- <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                Register, edit, and view company share holders.
            </p> -->
        </div>
        <!-- End Page Title / Subheader -->

        <?php // Flash Messages ?>
        <?php if ($das = $this->session->flashdata('massage')): ?>
        <div class="bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert">
            <div class="flex">
                <div class="shrink-0"><span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-teal-100 bg-teal-200 text-teal-800 dark:border-teal-900 dark:bg-teal-800 dark:text-teal-500"><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="m9 12 2 2 4-4"></path></svg></span></div>
                <div class="ms-3"><h3 class="text-gray-800 font-semibold dark:text-white"><?php echo $this->lang->line('success'); ?></h3><p class="mt-2 text-sm text-gray-700 dark:text-gray-400"><?php echo $das;?></p></div>
                <div class="ps-3 ms-auto"><div class="-mx-1.5 -my-1.5"><button type="button" class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-teal-50 focus:ring-teal-600 dark:bg-transparent dark:hover:bg-teal-800/50 dark:text-teal-600" data-hs-remove-element="[role=alert]"><span class="sr-only"><?php echo $this->lang->line('dismiss'); ?></span><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg></button></div></div>
            </div>
        </div>
        <?php endif; ?>

		<?php
								   @$customer_condition = $this->queries->get_borrowe_alert($loan_aproveds->customer_id);
								    //           echo "<pre>";
                                    //   print_r($customer_condition);
                                    //       exit();
								    ?>

        <!-- Card: Register Share Holder Form -->
		<div class="flex flex-col">
    <div class="-m-1.5 overflow-x-auto">
      <div class="p-1.5 min-w-full inline-block align-middle">
        <div class="bg-white border border-gray-200 rounded-xl shadow-2xs overflow-hidden dark:bg-neutral-800 dark:border-neutral-700">
          <!-- Header -->

           
        <!-- Card: Share Holder List Table -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200"><?php echo $this->lang->line('disbursed_loans'); ?></h2>
            </div>

            <div class="p-4" data-hs-datatable='{
                "pageLength": 10, "paging": true,
                "pagingOptions": { "pageBtnClasses": "min-w-10 h-10 inline-flex justify-center items-center text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 py-2.5 text-sm rounded-full disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:focus:bg-gray-700 dark:hover:bg-gray-700" },
                "language": { "zeroRecords": "<div class=\"py-10 px-5 flex flex-col justify-center items-center text-center\"><svg class=\"shrink-0 size-6 text-gray-500 dark:text-gray-400\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><circle cx=\"11\" cy=\"11\" r=\"8\"/><path d=\"m21 21-4.3-4.3\"/></svg><div class=\"max-w-sm mx-auto\"><p class=\"mt-2 text-sm text-gray-600 dark:text-gray-400\"><?php echo $this->lang->line('no_records_found'); ?></p></div></div>" }
            }'>
                <div class="flex flex-wrap items-center justify-between gap-2 mb-4">
                    <div class="relative max-w-xs w-full">
                        <label for="shareholder-table-search" class="sr-only"><?php echo $this->lang->line('search'); ?></label>
                        <input type="text" name="shareholder-table-search" id="shareholder-table-search" class="py-2 px-3 ps-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600" placeholder="<?php echo $this->lang->line('search'); ?>..." data-hs-datatable-search="#shareholder_table">
                        <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3"><svg class="size-4 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></svg></div>
                    </div>
                </div>

                <!-- Filter Form -->
<form method="get" action="<?php echo base_url('admin/disbursed_loans'); ?>" class="flex flex-wrap gap-4 mb-4">

  <!-- Date From -->
  <div>
    <label for="from_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300"><?php echo $this->lang->line('from_date'); ?></label>
    <input type="date" name="from_date" id="from_date"
           value="<?php echo htmlspecialchars($this->input->get('from_date')); ?>"
           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
  </div>

  <!-- Date To -->
  <div>
    <label for="to_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300"><?php echo $this->lang->line('to_date'); ?></label>
    <input type="date" name="to_date" id="to_date"
           value="<?php echo htmlspecialchars($this->input->get('to_date')); ?>"
           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
  </div>

  <!-- Branch Dropdown -->
  <div>
    <label for="blanch_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300"><?php echo rtrim($this->lang->line('branch'), ':'); ?></label>
    <select name="blanch_id" id="blanch_id"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
    <option value="">-- <?php echo $this->lang->line('all_branches'); ?> --</option>
      <?php if (isset($branches) && is_array($branches)): ?>
        <?php foreach ($branches as $branch): ?>
          <option value="<?php echo $branch->blanch_id; ?>"
            <?php echo ($this->input->get('blanch_id') == $branch->blanch_id) ? 'selected' : ''; ?>>
            <?php echo htmlspecialchars($branch->blanch_name, ENT_QUOTES, 'UTF-8'); ?>
          </option>
        <?php endforeach; ?>
      <?php endif; ?>
    </select>
  </div>

  <!-- Submit Button -->
  <div class="flex items-end">
    <button type="submit"
            class="px-4 py-2 bg-cyan-600 text-white rounded-lg hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500">
            <?php echo $this->lang->line('filter'); ?>
    </button>
  </div>

</form>
<!-- End Filter Form -->


                <div class="overflow-x-auto">
                    <div class="min-w-full inline-block align-middle">
                        <div class="border rounded-lg overflow-hidden dark:border-gray-700">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" id="shareholder_table">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="py-3 px-6 text-start"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">S/No.</span></div></th>
                                        <th scope="col" class="py-3 px-6 text-start"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('customer_name'); ?></span><svg class="size-3.5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path class="hs-datatable-ordering-desc:text-cyan-600 dark:hs-datatable-ordering-desc:text-cyan-500" d="m7 15 5 5 5-5"></path><path class="hs-datatable-ordering-asc:text-cyan-600 dark:hs-datatable-ordering-asc:text-cyan-500" d="m7 9 5-5 5 5"></path></svg></div></th>
                                        <th scope="col" class="py-3 px-6 text-start"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('phone_number'); ?></span><svg class="size-3.5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path class="hs-datatable-ordering-desc:text-cyan-600 dark:hs-datatable-ordering-desc:text-cyan-500" d="m7 15 5 5 5-5"></path><path class="hs-datatable-ordering-asc:text-cyan-600 dark:hs-datatable-ordering-asc:text-cyan-500" d="m7 9 5-5 5 5"></path></svg></div></th>
                                        <th scope="col" class="py-3 px-6 text-start"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400"><?php echo rtrim($this->lang->line('branch'), ':'); ?></span><svg class="size-3.5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path class="hs-datatable-ordering-desc:text-cyan-600 dark:hs-datatable-ordering-desc:text-cyan-500" d="m7 15 5 5 5-5"></path><path class="hs-datatable-ordering-asc:text-cyan-600 dark:hs-datatable-ordering-asc:text-cyan-500" d="m7 9 5-5 5 5"></path></svg></div></th>
                                        <th scope="col" class="py-3 px-6 text-start --exclude-from-ordering"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('loan_approved'); ?></span></div></th>
										<th scope="col" class="py-3 px-6 text-start --exclude-from-ordering"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('loan_plus_interest'); ?></span></div></th>
                                        <th scope="col" class="py-3 px-6 text-start --exclude-from-ordering"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('loan_duration'); ?></span></div></th>
										<th scope="col" class="py-3 px-6 text-start --exclude-from-ordering"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('collection'); ?></span></div></th>
										<th scope="col" class="py-3 px-6 text-start --exclude-from-ordering"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('customer_status'); ?></span></div></th>
                    	<th scope="col" class="py-3 px-6 text-start --exclude-from-ordering"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('disburse_date'); ?></span></div></th>
                                        <th scope="col" class="py-3 px-6 text-end --exclude-from-ordering"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('action'); ?></span></div></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

								
									
							

                                    <?php $no = 1; ?>
                                    <?php if (isset($disburse ) && is_array($disburse ) && !empty($disburse )): ?>
                                        <?php foreach ($disburse  as $loan_aproveds): ?>
										
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200"><?php echo $no++; ?>.</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php
                                               echo htmlspecialchars($loan_aproveds->f_name, ENT_QUOTES, 'UTF-8') . ' ' .
												htmlspecialchars($loan_aproveds->m_name, ENT_QUOTES, 'UTF-8') . ' ' .
												htmlspecialchars($loan_aproveds->l_name, ENT_QUOTES, 'UTF-8');
                                            ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo htmlspecialchars($loan_aproveds->phone_no, ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo htmlspecialchars($loan_aproveds->blanch_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
    <?php echo htmlspecialchars(number_format($loan_aproveds->how_loan, 0), ENT_QUOTES, 'UTF-8'); ?>
</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
    <?php echo htmlspecialchars(number_format($loan_aproveds->loan_int), ENT_QUOTES, 'UTF-8'); ?>
</td>

<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
    <?php
        if ($loan_aproveds->day == 1) {
            echo $this->lang->line('daily');
        } elseif ($loan_aproveds->day == 7) {
            echo $this->lang->line('weekly');
        } elseif (in_array($loan_aproveds->day, [28, 29, 30, 31])) {
            echo $this->lang->line('monthly');
        }

        // Add a space and the session value
        echo ' ' . htmlspecialchars(ucfirst($loan_aproveds->session), ENT_QUOTES, 'UTF-8');
    ?>
</td>


<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
    <?php echo htmlspecialchars(number_format($loan_aproveds->restration), ENT_QUOTES, 'UTF-8'); ?>
</td>
<td>
    <?php if ($loan_aproveds->total_loan == 1): ?>
        <!-- Mteja Mpya -->
        <div>
            <span class="inline-flex items-center gap-x-2 px-3 py-1.5 text-sm font-semibold text-white 
                         rounded-full bg-gradient-to-r from-green-600 to-emerald-700 
                         shadow-md ring-1 ring-green-400/30 dark:ring-green-700/50">
                <svg class="shrink-0 w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" 
                     fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 
                             2 6.477 2 12s4.477 10 10 10z"/>
                    <path d="m9 12 2 2 4-4"/>
                </svg>
                <?php echo $this->lang->line('new_customer'); ?>
            </span>
        </div>

    <?php elseif ($loan_aproveds->total_loan > 1): ?>
        <!-- Mteja wa Zamani -->
        <div>
            <span class="inline-flex items-center gap-x-2 px-3 py-1.5 text-sm font-semibold text-white 
                         rounded-full bg-gradient-to-r from-cyan-600 to-sky-700 
                         shadow-md ring-1 ring-cyan-400/30 dark:ring-cyan-700/50">
                <svg class="shrink-0 w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" 
                     fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14
                             A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/>
                    <path d="M12 9v4"/>
                    <path d="M12 17h.01"/>
                </svg>
                <?php echo $this->lang->line('existing_customer'); ?>
            </span>
        </div>

    <?php else: ?>
        <!-- Hakuna Taarifa -->
        <div>
            <span class="inline-flex items-center gap-x-2 px-3 py-1.5 text-sm font-semibold text-gray-700 
                         bg-gray-100 rounded-full shadow-sm ring-1 ring-gray-300">
                <svg class="shrink-0 w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" 
                     fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path d="M12 9v4"/>
                    <path d="M12 17h.01"/>
                    <circle cx="12" cy="12" r="10" stroke-dasharray="4 2"/>
                </svg>
                <?php echo $this->lang->line('no_information'); ?>
            </span>
        </div>
    <?php endif; ?>
</td>





  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200"><?php echo $loan_aproveds->disburse_day; ?></td>

                                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                
											<?php if ($can_loan_delete): ?>
											<a href="<?php echo base_url("admin/delete_loanDisbursed/{$loan_aproveds->loan_id}") ?>" 
    onclick="if(!confirm('<?php echo $this->lang->line('confirm_delete_loan'); ?>')) return;"
  class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 disabled:opacity-50 disabled:pointer-events-none">
    <?php echo $this->lang->line('delete'); ?>
  <svg class="shrink-0 size-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
       viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
    <path stroke-linecap="round" stroke-linejoin="round"
          d="M6 7h12M9 7V4h6v3M10 11v6M14 11v6M5 7h14l-1 14H6L5 7z" />
  </svg>
</a>
											<?php endif; ?>


                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="py-3 px-4 border-t border-gray-200 dark:border-gray-700 hidden" data-hs-datatable-paging="">
                    <nav class="flex items-center space-x-1"><button type="button" class="p-2.5 min-w-10 h-10 inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700" data-hs-datatable-paging-prev=""><span aria-hidden="true">«</span><span class="sr-only"><?php echo $this->lang->line('previous'); ?></span></button><div class="flex items-center space-x-1 [&>.active]:bg-gray-100 dark:[&>.active]:bg-gray-700" data-hs-datatable-paging-pages=""></div><button type="button" class="p-2.5 min-w-10 h-10 inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700" data-hs-datatable-paging-next=""><span class="sr-only"><?php echo $this->lang->line('next'); ?></span><span aria-hidden="true">»</span></button></nav>
                </div>
            </div>
        </div>
        <!-- End Card: Share Holder List Table -->

      
   
</div>
<!-- ========== END MAIN CONTENT BODY ========== -->

<?php
include_once APPPATH . "views/partials/footer.php";
?>

<?php // Script for cmd+a fix for DataTables search input (if used) ?>


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