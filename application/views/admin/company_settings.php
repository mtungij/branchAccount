<?php
include_once APPPATH . "views/partials/header.php";
?>

<!-- ========== MAIN CONTENT ========== -->
<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
        
        <!-- Page Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
            <div>
                <h1 class="text-xl font-semibold text-gray-800 dark:text-white">Company Settings</h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Update your company information and logo
                </p>
            </div>
        </div>

        <!-- Flash Messages -->
        <?php if ($this->session->flashdata('massage')): ?>
        <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded-lg dark:bg-green-800/10 dark:border-green-900 dark:text-green-500" role="alert">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ms-3">
                    <p class="text-sm"><?php echo $this->session->flashdata('massage'); ?></p>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
        <div class="bg-red-100 border border-red-200 text-red-700 px-4 py-3 rounded-lg dark:bg-red-800/10 dark:border-red-900 dark:text-red-500" role="alert">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16ZM8.28 7.22a.75.75 0 0 0-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 1 0 1.06 1.06L10 11.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L11.06 10l1.72-1.72a.75.75 0 0 0-1.06-1.06L10 8.94 8.28 7.22Z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ms-3">
                    <p class="text-sm"><?php echo $this->session->flashdata('error'); ?></p>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Company Settings Form -->
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 sm:p-7">
                <?php echo form_open_multipart('admin/update_company_settings', ['class' => 'space-y-6']); ?>

                    <!-- Company Logo Section -->
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Company Logo</h2>
                        
                        <div class="flex flex-col sm:flex-row gap-6 items-start">
                            <!-- Current Logo Preview -->
                            <div class="flex flex-col items-center gap-3">
                                <div id="logoPreview" class="h-32 w-32 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center border-2 border-gray-300 dark:border-gray-600 overflow-hidden">
                                    <?php if (!empty($company->comp_logo)): ?>
                                        <img src="<?php echo base_url('assets/images/company_logo/' . $company->comp_logo); ?>" 
                                             alt="Company Logo" 
                                             class="h-full w-full object-contain"
                                             id="currentLogo">
                                    <?php else: ?>
                                        <svg class="h-16 w-16 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M10 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM6 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0ZM1.49 15.326a.78.78 0 0 1-.358-.442 3 3 0 0 1 4.308-3.516 6.484 6.484 0 0 0-1.905 3.959c-.023.222-.014.442.025.654a4.97 4.97 0 0 1-2.07-.655ZM16.44 15.98a4.97 4.97 0 0 0 2.07-.654.78.78 0 0 0 .357-.442 3 3 0 0 0-4.308-3.517 6.484 6.484 0 0 1 1.907 3.96 2.32 2.32 0 0 1-.026.654ZM18 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0ZM5.304 16.19a.844.844 0 0 1-.277-.71 5 5 0 0 1 9.947 0 .843.843 0 0 1-.277.71A6.975 6.975 0 0 1 10 18a6.974 6.974 0 0 1-4.696-1.81Z" />
                                        </svg>
                                    <?php endif; ?>
                                </div>
                                <span class="text-xs text-gray-500 dark:text-gray-400">Current Logo</span>
                            </div>

                            <!-- Upload Section -->
                            <div class="flex-1">
                                <label for="comp_logo" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Upload New Logo
                                </label>
                                <input type="file" 
                                       id="comp_logo" 
                                       name="comp_logo" 
                                       accept="image/*"
                                       class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                       onchange="previewLogo(this)">
                                <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                                    PNG, JPG, GIF up to 10MB. Recommended size: 200x200px
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Company Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Company Name -->
                        <div>
                            <label for="comp_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Company Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   id="comp_name" 
                                   name="comp_name" 
                                   value="<?php echo set_value('comp_name', $company->comp_name ?? ''); ?>"
                                   class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                   required>
                            <?php echo form_error('comp_name', '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>

                        <!-- Company Phone -->
                        <div>
                            <label for="comp_phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Company Phone <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   id="comp_phone" 
                                   name="comp_phone" 
                                   value="<?php echo set_value('comp_phone', $company->comp_phone ?? ''); ?>"
                                   class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                   required>
                            <?php echo form_error('comp_phone', '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>

                        <!-- Company Email -->
                        <div>
                            <label for="comp_email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Company Email <span class="text-red-500">*</span>
                            </label>
                            <input type="email" 
                                   id="comp_email" 
                                   name="comp_email" 
                                   value="<?php echo set_value('comp_email', $company->comp_email ?? ''); ?>"
                                   class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                   required>
                            <?php echo form_error('comp_email', '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>

                        <!-- Registration Number -->
                        <div>
                            <label for="comp_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Registration Number
                            </label>
                            <input type="text" 
                                   id="comp_number" 
                                   name="comp_number" 
                                   value="<?php echo set_value('comp_number', $company->comp_number ?? ''); ?>"
                                   class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                            <?php echo form_error('comp_number', '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>

                        <!-- Address -->
                        <div class="md:col-span-2">
                            <label for="adress" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Address <span class="text-red-500">*</span>
                            </label>
                            <textarea id="adress" 
                                      name="adress" 
                                      rows="3"
                                      class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                      required><?php echo set_value('adress', $company->adress ?? ''); ?></textarea>
                            <?php echo form_error('adress', '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">
                        <a href="<?php echo base_url('admin/index'); ?>" 
                           class="py-2.5 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700">
                            Cancel
                        </a>
                        <button type="submit" 
                                class="py-2.5 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-cyan-600 text-white hover:bg-cyan-700 disabled:opacity-50">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                            </svg>
                            Update Company Settings
                        </button>
                    </div>

                <?php echo form_close(); ?>
            </div>
        </div>

    </div>
</div>
<!-- ========== END MAIN CONTENT ========== -->

<script>
function previewLogo(input) {
    const preview = document.getElementById('logoPreview');
    const currentLogo = document.getElementById('currentLogo');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            if (currentLogo) {
                currentLogo.src = e.target.result;
            } else {
                preview.innerHTML = `<img src="${e.target.result}" alt="Logo Preview" class="h-full w-full object-contain" id="currentLogo">`;
            }
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

<?php
include_once APPPATH . "views/partials/footer.php";
?>