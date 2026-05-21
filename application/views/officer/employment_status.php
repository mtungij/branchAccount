<?php
include_once APPPATH . "views/partials/officerheader.php";
?>

<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-6">
        <div class="mb-6">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-200">Hali ya Ajira</h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Weka taarifa za ajira kabla ya kuendelea na maelezo mengine ya mteja.</p>
        </div>

        <div class="bg-white border shadow-sm rounded-xl p-4 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between text-xs sm:text-sm font-medium mb-2">
                <span class="text-cyan-700 dark:text-cyan-400">Step 1 of 3: Employment Status</span>
                <span class="text-gray-500 dark:text-gray-400">33%</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2 dark:bg-gray-700">
                <div class="bg-cyan-600 h-2 rounded-full" style="width: 33%"></div>
            </div>
        </div>

        <?php if ($msg = $this->session->flashdata('massage')): ?>
        <div class="bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg p-4" role="alert">
            <?php echo $msg; ?>
        </div>
        <?php endif; ?>

        <?php if ($err = $this->session->flashdata('error')): ?>
        <div class="bg-red-100 border border-red-200 text-sm text-red-800 rounded-lg p-4" role="alert">
            <?php echo $err; ?>
        </div>
        <?php endif; ?>

        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 md:p-6">
                <?php echo form_open("oficer/save_employment_status/{$customer->customer_id}", ['novalidate' => true]); ?>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="work_status" class="block text-sm font-medium mb-2 dark:text-gray-300">* Hali ya Ajira (Employment Status):</label>
                        <?php $selected_status = set_value('work_status', isset($sub_customer->work_status) ? $sub_customer->work_status : ''); ?>
                        <select id="work_status" name="work_status" required
                            class="py-2.5 px-4 w-full border border-gray-300 rounded-md shadow-sm text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                            <option value="">Chagua hali ya ajira</option>
                            <option value="Mjasiriamali" <?php echo ($selected_status === 'Mjasiriamali') ? 'selected' : ''; ?>>Mjasiriamali</option>
                            <option value="Mwajiriwa" <?php echo ($selected_status === 'Mwajiriwa') ? 'selected' : ''; ?>>Mtumishi</option>
                        </select>
                        <?php echo form_error('work_status', '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                    </div>

                    <div>
                        <label for="place_imployment" id="employment_place_label" class="block text-sm font-medium mb-2 dark:text-gray-300">* Biashara yake ni:</label>
                        <input type="text" id="place_imployment" name="place_imployment" autocomplete="off" required
                            class="uppercase py-2.5 px-4 w-full border border-gray-300 rounded-md shadow-sm text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
                            value="<?php echo set_value('place_imployment', isset($sub_customer->place_imployment) ? $sub_customer->place_imployment : ''); ?>"
                            placeholder="Andika biashara yake">
                        <p id="employment_place_hint" class="text-xs text-gray-500 mt-1 dark:text-gray-400">Kwa mjasiriamali, andika biashara yake.</p>
                        <?php echo form_error('place_imployment', '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                    </div>
                </div>

                <div class="mt-8 border-t pt-6 border-gray-200 dark:border-gray-700">
                    <div class="flex justify-center gap-x-2">
                        <a href="<?php echo base_url('oficer/customer'); ?>" class="py-2.5 px-6 text-sm font-semibold rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-gray-700">Cancel</a>
                        <button type="submit" class="py-2.5 px-6 text-sm font-semibold rounded-lg bg-cyan-600 text-white hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500">Next</button>
                    </div>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<?php include_once APPPATH . "views/partials/footer.php"; ?>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const statusSelect = document.getElementById('work_status');
    const placeLabel = document.getElementById('employment_place_label');
    const placeInput = document.getElementById('place_imployment');
    const placeHint = document.getElementById('employment_place_hint');

    function updateEmploymentField() {
        const status = (statusSelect.value || '').trim();

        if (status === 'Mwajiriwa') {
            placeLabel.textContent = '* Sehemu ya ajira:';
            placeInput.placeholder = 'Andika sehemu ya ajira';
            placeHint.textContent = 'Kwa mtumishi, andika sehemu ya ajira.';
            return;
        }

        placeLabel.textContent = '* Biashara yake ni:';
        placeInput.placeholder = 'Andika biashara yake';
        placeHint.textContent = 'Kwa mjasiriamali, andika biashara yake.';
    }

    statusSelect.addEventListener('change', updateEmploymentField);
    updateEmploymentField();
});
</script>
