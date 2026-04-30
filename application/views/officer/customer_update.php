<?php
include_once APPPATH . "views/partials/officerheader.php";
?>

<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
<div class="p-4 sm:p-6 space-y-6">

<!-- Flash: Success -->
<?php if ($das = $this->session->flashdata('massage')): ?>
<div class="bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert">
    <div class="flex">
        <div class="flex-shrink-0">
            <span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-teal-100 bg-teal-200 text-teal-800 dark:border-teal-900 dark:bg-teal-800 dark:text-teal-500">
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="m9 12 2 2 4-4"/></svg>
            </span>
        </div>
        <div class="ms-3">
            <h3 class="font-semibold text-gray-800 dark:text-white"><?php echo $this->lang->line('success'); ?></h3>
            <p class="mt-1 text-sm text-gray-700 dark:text-gray-400"><?php echo $das; ?></p>
        </div>
        <div class="ps-3 ms-auto">
            <button type="button" class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none dark:bg-transparent dark:hover:bg-teal-800/50 dark:text-teal-600" data-hs-remove-element="[role=alert]">
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            </button>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if ($err = $this->session->flashdata('error')): ?>
<div class="bg-red-100 border border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500" role="alert">
    <div class="flex">
        <div class="flex-shrink-0">
            <span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-red-100 bg-red-200 text-red-800 dark:border-red-900 dark:bg-red-800 dark:text-red-500">
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            </span>
        </div>
        <div class="ms-3">
            <h3 class="font-semibold text-gray-800 dark:text-white">Error</h3>
            <p class="mt-1 text-sm text-gray-700 dark:text-gray-400"><?php echo $err; ?></p>
        </div>
        <div class="ps-3 ms-auto">
            <button type="button" class="inline-flex bg-red-50 rounded-lg p-1.5 text-red-500 hover:bg-red-100 focus:outline-none dark:bg-transparent dark:hover:bg-red-800/50 dark:text-red-600" data-hs-remove-element="[role=alert]">
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            </button>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- Page Header -->
<div class="flex flex-wrap items-center gap-3">
    <div class="flex items-center gap-x-3">
        <div class="inline-flex justify-center items-center size-10 rounded-full bg-cyan-100 dark:bg-cyan-900/30">
            <svg class="size-5 text-cyan-600 dark:text-cyan-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
        </div>
        <div>
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200"><?php echo $this->lang->line('update_customer'); ?></h2>
            <p class="text-xs text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('search_customer'); ?></p>
        </div>
    </div>
</div>

<!-- Search Card -->
<div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
    <div class="px-5 py-4 border-b border-gray-100 dark:border-gray-700 flex items-center gap-x-3">
        <div class="inline-flex justify-center items-center size-8 rounded-lg bg-cyan-100 dark:bg-cyan-900/30">
            <svg class="size-4 text-cyan-600 dark:text-cyan-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
        </div>
        <h3 class="text-base font-semibold text-gray-800 dark:text-gray-200"><?php echo $this->lang->line('search_customer'); ?></h3>
    </div>

    <div class="p-5 md:p-8">
        <?php echo form_open("oficer/edit_customer", ['novalidate' => true, 'id' => 'customerUpdateForm']); ?>

        <div class="max-w-2xl mx-auto">
            <label for="customerSelect" class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">
                <span class="text-red-500">*</span> <?php echo $this->lang->line('search_customer'); ?>:
            </label>
            <select id="customerSelect" name="customer_id" required
                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:placeholder-gray-500 select2">
                <option value=""><?php echo $this->lang->line('select_customer'); ?></option>
                <?php foreach ($customer as $customers): ?>
                    <option value="<?php echo $customers->customer_id; ?>">
                        <?php echo strtoupper($customers->f_name . ' ' . $customers->m_name . ' ' . $customers->l_name); ?> /
                        <?php echo strtoupper($customers->customer_code); ?> /
                        <?php echo strtoupper($customers->blanch_name ?? ''); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mt-8 pt-5 border-t border-gray-100 dark:border-gray-700 flex justify-center">
            <button type="submit"
                class="inline-flex items-center gap-x-2 py-2.5 px-6 text-sm font-semibold rounded-lg bg-cyan-600 hover:bg-cyan-700 text-white shadow-sm transition">
                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
                <?php echo $this->lang->line('search'); ?>
            </button>
        </div>

        <?php echo form_close(); ?>
    </div>
</div>

</div>
</div>
<!-- ========== END MAIN CONTENT BODY ========== -->

<!-- Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<style>
.select2-container--default .select2-selection--single {
    background-color: #1f2937; border: 1px solid #374151; border-radius: 0.5rem;
    padding: 0.65rem 2.5rem 0.65rem 1rem; height: auto; font-size: 0.875rem;
}
.select2-container--default .select2-selection--single .select2-selection__rendered { color: #f3f4f6 !important; }
.select2-container--default .select2-selection--single .select2-selection__arrow    { top:50%; transform:translateY(-50%); right:0.75rem; }
.select2-container--default .select2-selection--single .select2-selection__placeholder { color: #9ca3af; }
.custom-select2-dropdown { background-color:#1f2937; color:#d1d5db; border:1px solid #374151; border-radius:0.5rem; }
.custom-select2-dropdown .select2-results__option { padding:0.5rem 0.75rem; font-size:0.875rem; }
.custom-select2-dropdown .select2-results__option--highlighted { background-color:#06b6d4 !important; color:#fff !important; }
.select2-search__field { color:#fff !important; background-color:#111827 !important; border:1px solid #374151 !important; border-radius:0.375rem; padding:0.4rem 0.6rem !important; font-size:0.875rem; }
</style>

<?php
include_once APPPATH . "views/partials/footer.php";
?>

<script>
$(document).ready(function () {
    const editBaseUrl = "<?php echo base_url('oficer/edit_customer/'); ?>";
    const customerSelect = $('#customerSelect');

    function goToEditPage() {
        const selectedId = customerSelect.val();
        if (selectedId) {
            window.location.assign(editBaseUrl + selectedId);
        }
    }

    // Works for native select change and Select2 selection events
    customerSelect.on('change select2:select', goToEditPage);

    // Initialize Select2 only if plugin is available
    if ($.fn.select2) {
        customerSelect.select2({
            placeholder: "Select customer",
            allowClear: true,
            width: '100%',
            dropdownCssClass: 'custom-select2-dropdown'
        });
    }
});
</script>
