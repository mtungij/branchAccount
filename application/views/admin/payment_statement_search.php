<?php
include_once APPPATH . "views/partials/header.php";
$customers = !empty($customers) ? $customers : [];
?>

<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-6">

        <!-- Page Title -->
        <div class="mb-6">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-200">
                <?php echo $this->lang->line('payment_penalty_statement'); ?>
            </h2>
        </div>

        <?php if ($err = $this->session->flashdata('error')): ?>
        <div class="bg-red-100 border border-red-200 text-sm text-red-800 rounded-lg p-4" role="alert">
            <?php echo htmlspecialchars($err); ?>
        </div>
        <?php endif; ?>

        <?php if ($das = $this->session->flashdata('massage')): ?>
        <div class="bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert">
            <div class="flex">
                <div class="shrink-0"><span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-teal-100 bg-teal-200 text-teal-800 dark:border-teal-900 dark:bg-teal-800 dark:text-teal-500"><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="m9 12 2 2 4-4"></path></svg></span></div>
                <div class="ms-3"><h3 class="text-gray-800 font-semibold dark:text-white"><?php echo $this->lang->line('success'); ?></h3><p class="mt-2 text-sm text-gray-700 dark:text-gray-400"><?php echo $das; ?></p></div>
                <div class="ps-3 ms-auto"><div class="-mx-1.5 -my-1.5"><button type="button" class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-teal-50 focus:ring-teal-600 dark:bg-transparent dark:hover:bg-teal-800/50 dark:text-teal-600" data-hs-remove-element="[role=alert]"><span class="sr-only"><?php echo $this->lang->line('dismiss'); ?></span><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg></button></div></div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Search Card -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 md:p-6">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-6">
                    <?php echo $this->lang->line('ps_search_customer'); ?>
                </h3>

                <?php echo form_open("admin/payment_statement_go"); ?>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Customer -->
                        <div>
                            <label for="customer" class="block text-sm font-medium mb-2 text-gray-200">
                                <?php echo $this->lang->line('customer'); ?> *:
                            </label>
                            <select id="customer" name="customer_id" required
                                class="w-full h-14 text-base font-semibold py-2 px-3 rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 text-white select2">
                                <option value=""><?php echo $this->lang->line('select_customer'); ?></option>
                                <?php foreach ($customers as $c): ?>
                                    <option value="<?php echo (int)$c->customer_id; ?>">
                                        <?php echo strtoupper(trim($c->f_name . ' ' . $c->m_name . ' ' . $c->l_name)); ?> /
                                        <?php echo strtoupper($c->customer_code ?? ''); ?> /
                                        <?php echo strtoupper($c->blanch_name ?? ''); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Loan -->
                        <div>
                            <label for="loan" class="block text-sm font-medium mb-2 text-gray-200">
                                <?php echo $this->lang->line('ps_select_loan'); ?> *:
                            </label>
                            <select id="loan" name="loan_id" required
                                class="w-full h-14 text-base font-semibold py-2 px-3 rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 text-white select2">
                                <option value=""><?php echo $this->lang->line('select_loan'); ?></option>
                            </select>
                        </div>
                    </div>

                    <input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">

                    <div class="mt-8 pt-6 dark:border-gray-700">
                        <div class="flex justify-center gap-x-2">
                            <button type="submit" class="py-2 px-4 btn-primary-sm bg-cyan-800 hover:bg-cyan-700 text-white">
                                <?php echo $this->lang->line('ps_view_statement'); ?>
                            </button>
                        </div>
                    </div>

                <?php echo form_close(); ?>
            </div>
        </div>

    </div>
</div>
<!-- ========== END MAIN CONTENT BODY ========== -->

<?php include_once APPPATH . "views/partials/footer.php"; ?>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Select2 CSS + JS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function(){
    var selectConfig = {
        allowClear: true,
        width: '100%',
        dropdownCssClass: 'custom-select2-dropdown',
        containerCssClass: 'custom-select2-container'
    };

    $('#customer').select2({...selectConfig, placeholder: "<?php echo $this->lang->line('select_customer'); ?>"});
    $('#loan').select2({...selectConfig, placeholder: "<?php echo $this->lang->line('select_loan'); ?>"});

    // Load loans when customer changes
    $('#customer').change(function(){
        var customer_id = $(this).val();
        if (customer_id) {
            $.ajax({
                url: "<?php echo base_url('admin/fetch_data_loanActive'); ?>",
                method: "POST",
                data: { customer_id: customer_id },
                success: function(data){
                    $('#loan').html(data).trigger('change');
                }
            });
        } else {
            $('#loan').html('<option value=""><?php echo $this->lang->line('select_loan'); ?></option>').trigger('change');
        }
    });
});
</script>

<style>
.select2-container--default .select2-selection--single {
    height: 3.5rem !important;
    line-height: 1.25rem !important;
    background-color: #1f2937 !important;
    border: 1px solid #374151 !important;
    border-radius: 0.5rem;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    line-height: 3.5rem !important;
    color: #fff !important;
    font-weight: 600;
}
.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 3.5rem !important;
    color: #fff;
}
.select2-container--default .select2-results__option {
    background-color: #1f2937;
    color: #fff;
}
.select2-container--default .select2-results__option--highlighted {
    background-color: #0891b2 !important;
    color: #fff !important;
}
</style>
