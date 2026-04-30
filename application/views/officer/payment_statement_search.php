<?php
include_once APPPATH . "views/partials/officerheader.php";
$customers = !empty($customers) ? $customers : [];
$selected_customer_id = !empty($selected_customer_id) ? (int)$selected_customer_id : 0;
$selected_loan_id = !empty($selected_loan_id) ? (int)$selected_loan_id : 0;
?>

<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-6">

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

        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 md:p-6">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-6">
                    <?php echo $this->lang->line('ps_search_customer') ?: 'Tafuta Mteja'; ?>
                </h3>

                <?php echo form_open("oficer/payment_statement_go"); ?>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="customer" class="block text-sm font-medium mb-2 text-gray-200">
                                <?php echo $this->lang->line('customer'); ?> *:
                            </label>
                            <select id="customer" name="customer_id" required
                                class="w-full h-14 text-base font-semibold py-2 px-3 rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 text-white select2">
                                <option value=""><?php echo $this->lang->line('select_customer') ?: 'Select customer'; ?></option>
                                <?php foreach ($customers as $c): ?>
                                    <option value="<?php echo (int) $c->customer_id; ?>" <?php echo ((int)$c->customer_id === $selected_customer_id) ? 'selected' : ''; ?>>
                                        <?php echo strtoupper(trim($c->f_name . ' ' . $c->m_name . ' ' . $c->l_name)); ?> /
                                        <?php echo strtoupper($c->customer_code ?? ''); ?> /
                                        <?php echo strtoupper($c->blanch_name ?? ''); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div>
                            <label for="loan" class="block text-sm font-medium mb-2 text-gray-200">
                                <?php echo $this->lang->line('ps_select_loan') ?: 'Chagua Mkopo'; ?> *:
                            </label>
                            <select id="loan" name="loan_id" required
                                class="w-full h-14 text-base font-semibold py-2 px-3 rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 text-white select2">
                                <option value=""><?php echo $this->lang->line('select_loan') ?: 'Select loan'; ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-8 pt-6 dark:border-gray-700">
                        <div class="flex justify-center gap-x-2">
                            <button type="submit" class="py-2 px-4 btn-primary-sm bg-cyan-800 hover:bg-cyan-700 text-white">
                                <?php echo $this->lang->line('ps_view_statement') ?: 'Angalia Taarifa'; ?>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function(){
    var selectedLoanId = '<?php echo (int) $selected_loan_id; ?>';
    var selectConfig = {
        allowClear: true,
        width: '100%',
        dropdownCssClass: 'custom-select2-dropdown',
        containerCssClass: 'custom-select2-container'
    };

    $('#customer').select2({...selectConfig, placeholder: "<?php echo $this->lang->line('select_customer') ?: 'Select customer'; ?>"});
    $('#loan').select2({...selectConfig, placeholder: "<?php echo $this->lang->line('select_loan') ?: 'Select loan'; ?>"});

    function loadLoans(customer_id, selectedId) {
        if (customer_id) {
            $.ajax({
                url: "<?php echo base_url('oficer/fetch_data_loanActive'); ?>",
                method: "POST",
                data: { customer_id: customer_id },
                success: function(data){
                    $('#loan').html(data);
                    if (selectedId) {
                        $('#loan').val(selectedId);
                    }
                    $('#loan').trigger('change');
                }
            });
        } else {
            $('#loan').html('<option value=""><?php echo $this->lang->line('select_loan') ?: 'Select loan'; ?></option>').trigger('change');
        }
    }

    var initialCustomer = $('#customer').val();
    if (initialCustomer) {
        loadLoans(initialCustomer, selectedLoanId);
    }

    $('#customer').change(function(){
        var customer_id = $(this).val();
        loadLoans(customer_id, '');
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
