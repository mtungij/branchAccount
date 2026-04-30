
<?php include_once APPPATH . "views/partials/officerheader.php"; ?>

<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-6">

        <!-- Page Title / Subheader -->
        <div class="mb-6">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-200">
               Angalia Statement ya mikopo ya mteja 
            </h2>
            <!-- <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                kumbuka kama atakuwa hajamaliza mkopo system itakataa kumuombea mkopo.
            </p> -->
        </div>
        <!-- End Page Title / Subheader -->

        <?php // Flash Messages ?>
        <?php if ($das = $this->session->flashdata('massage')): ?>
        <div class="bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert">
            <div class="flex">
                <div class="flex-shrink-0"><span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-teal-100 bg-teal-200 text-teal-800 dark:border-teal-900 dark:bg-teal-800 dark:text-teal-500"><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="m9 12 2 2 4-4"></path></svg></span></div>
                <div class="ms-3"><h3 class="text-gray-800 font-semibold dark:text-white">Success</h3><p class="mt-2 text-sm text-gray-700 dark:text-gray-400"><?php echo $das;?></p></div>
                <div class="ps-3 ms-auto"><div class="-mx-1.5 -my-1.5"><button type="button" class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-teal-50 focus:ring-teal-600 dark:bg-transparent dark:hover:bg-teal-800/50 dark:text-teal-600" data-hs-remove-element="[role=alert]"><span class="sr-only">Dismiss</span><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg></button></div></div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Card: Register Share Holder Form -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 md:p-6">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-6">
                   Search Customer
                </h3>
               
               <?php echo form_open_multipart("oficer/loan_statementreport"); ?>
                   
                    
                        <!-- Branch Select2 Dropdown -->
					

<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
  <div>
    <label for="customer" class="block text-sm font-medium mb-2 text-gray-200">
      Mteja *:
    </label>
    <select id="customer" name="customer_id" required
      class="w-full h-14 text-base font-semibold py-2 px-3 rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 text-white select2">
      <option value="">Select customer</option>
      <?php foreach ($customer as $customers): ?>
        <option value="<?= $customers->customer_id ?>">
          <?= strtoupper($customers->f_name . " " . $customers->m_name . " " . $customers->l_name); ?> /
          <?= strtoupper($customers->customer_code); ?> /
          <?= strtoupper($customers->blanch_name); ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>

  <div>
    <label for="loan" class="block text-sm font-medium mb-2 text-gray-200">
      Mkopo *:
    </label>
    <select id="loan" name="loan_id" required
      class="w-full h-14 text-base font-semibold py-2 px-3 rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 text-white select2">
      <option value="">Select loan</option>
    </select>
  </div>
</div>


<input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">


                    
                    <div class="mt-8 pt-6  dark:border-gray-700">
                        <div class="flex justify-center gap-x-2">
                            <button type="submit" class="py-2 px-4 btn-primary-sm bg-cyan-800 hover:bg-cyan-700 text-white">Search</button>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>







    </div>
</div>
<!-- ========== END MAIN CONTENT BODY ========== -->

<?php
include_once APPPATH . "views/partials/footer.php";
?>


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Select2 CSS + JS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function(){
    // Config ya Select2
    const selectConfig = {
        placeholder: "Select",
        allowClear: true,
        width: '100%',
        dropdownCssClass: 'custom-select2-dropdown',
        containerCssClass: 'custom-select2-container'
    };

    // Initialize select2
    $('#customer').select2({...selectConfig, placeholder: "Select Customer"});
    $('#loan').select2({...selectConfig, placeholder: "Select Loan"});

    // Event: customer akichaguliwa
    $('#customer').change(function(){
        var customer_id = $(this).val();
        if(customer_id != ''){
            $.ajax({
				url:"<?php echo base_url(); ?>oficer/fetch_data_loanActive",
                method:"POST",
                data:{customer_id:customer_id},
                success:function(data){
                    $('#loan').html(data).trigger('change'); // update loan select
                }
            });
        } else {
            $('#loan').html('<option value="">Select loan</option>').trigger('change');
        }
    });
});
</script>

<style>
.select2-container--default .select2-selection--single {
    height: 3.5rem !important; /* match h-14 */
    line-height: 1.25rem !important;
    background-color: #1f2937 !important; /* Tailwind bg-gray-800 */
    border: 1px solid #374151 !important; /* Tailwind border-gray-700 */
    border-radius: 0.5rem;
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
    line-height: 3.5rem !important;
    color: #fff !important; /* white text */
    font-weight: 600; /* semibold */
}

.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 3.5rem !important;
    color: #fff;
}

.select2-container--default .select2-results__option {
    background-color: #1f2937; /* bg-gray-800 */
    color: #fff; /* white text */
}

.select2-container--default .select2-results__option--highlighted {
    background-color: #059669 !important; /* cyan-600 */
    color: #fff !important;
}



</style>