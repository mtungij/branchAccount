<?php
include_once APPPATH . "views/partials/officerheader.php";
?>
<!-- ========== MAIN CONTENT ========== -->
<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
        
        <!-- Page Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
            <div>
                <h1 class="text-xl font-semibold text-gray-800 dark:text-white">My Profile</h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Update your profile information, password and profile picture
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

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6">
            
            <!-- Profile Picture Card -->
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <div class="p-4 sm:p-7">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Profile Picture</h2>
                    
                    <?php echo form_open_multipart('Oficer/update_profile_picture', ['class' => 'space-y-4']); ?>
                        
                        <!-- Current Photo -->
                        <div class="flex flex-col items-center gap-3">
                            <div id="photoPreview" class="h-32 w-32 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center border-2 border-gray-300 dark:border-gray-600 overflow-hidden">
                                <?php if (!empty($employee->passport)): ?>
                                    <img src="<?php echo base_url('assets/images/passport/' . $employee->passport); ?>" 
                                         alt="Profile Picture" 
                                         class="h-full w-full object-cover"
                                         id="currentPhoto">
                                <?php else: ?>
                                    <svg class="h-16 w-16 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM3.465 14.493a1.23 1.23 0 0 0 .41 1.412A9.957 9.957 0 0 0 10 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 0 0-13.074.003Z" />
                                    </svg>
                                <?php endif; ?>
                            </div>
                            <span class="text-xs text-gray-500 dark:text-gray-400"><?php echo $employee->empl_name; ?></span>
                        </div>

                        <!-- Upload Section -->
                        <div>
                            <label for="passport" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Upload New Photo
                            </label>
                            <input type="file" 
                                   id="passport" 
                                   name="passport" 
                                   accept="image/*"
                                   class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                   onchange="previewPhoto(this)">
                            <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                                PNG, JPG, GIF up to 5MB
                            </p>
                        </div>

                        <button type="submit" 
                                class="w-full py-2.5 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-cyan-600 text-white hover:bg-cyan-700">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13.024 9.25c.47 0 .827-.433.637-.863a4 4 0 0 0-7.322 0c-.19.43.167.863.637.863h6.048ZM4 12a4 4 0 0 0 4 4h4a4 4 0 0 0 4-4v-1H4v1Z" />
                            </svg>
                            Update Photo
                        </button>
                    <?php echo form_close(); ?>
                </div>
            </div>

            <!-- Profile Information & Password -->
            <div class="lg:col-span-2 space-y-4 sm:space-y-6">
                
                <!-- Profile Information Card -->
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-4 sm:p-7">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Profile Information</h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-medium text-gray-500 dark:text-gray-400 mb-1">Full Name</label>
                                <p class="text-sm text-gray-800 dark:text-gray-200"><?php echo $employee->empl_name; ?></p>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-500 dark:text-gray-400 mb-1">Username</label>
                                <p class="text-sm text-gray-800 dark:text-gray-200"><?php echo $employee->username; ?></p>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-500 dark:text-gray-400 mb-1">Email</label>
                                <p class="text-sm text-gray-800 dark:text-gray-200"><?php echo $employee->empl_email; ?></p>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-500 dark:text-gray-400 mb-1">Phone Number</label>
                                <p class="text-sm text-gray-800 dark:text-gray-200"><?php echo $employee->empl_no; ?></p>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-500 dark:text-gray-400 mb-1">Gender</label>
                                <p class="text-sm text-gray-800 dark:text-gray-200"><?php echo ucfirst($employee->empl_sex); ?></p>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-500 dark:text-gray-400 mb-1">Account Status</label>
                                <p class="text-sm text-gray-800 dark:text-gray-200">
                                    <span class="inline-flex items-center gap-x-1.5 py-1 px-2 rounded-full text-xs font-medium <?php echo $employee->empl_status == 'open' ? 'bg-green-100 text-green-800 dark:bg-green-800/10 dark:text-green-500' : 'bg-red-100 text-red-800 dark:bg-red-800/10 dark:text-red-500'; ?>">
                                        <?php echo ucfirst($employee->empl_status); ?>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Change Password Card -->
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-4 sm:p-7">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Change Password</h2>
                        
                        <?php echo form_open('Oficer/update_my_password', ['class' => 'space-y-4']); ?>
                            
                            <!-- Current Password -->
                            <div>
                                <label for="current_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Current Password <span class="text-red-500">*</span>
                                </label>
                                <input type="password" 
                                       id="current_password" 
                                       name="current_password" 
                                       class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                       required>
                                <?php echo form_error('current_password', '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                            </div>

                            <!-- New Password -->
                            <div>
                                <label for="new_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    New Password <span class="text-red-500">*</span>
                                </label>
                                <input type="password" 
                                       id="new_password" 
                                       name="new_password" 
                                       class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                       required>
                                <?php echo form_error('new_password', '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Minimum 6 characters</p>
                            </div>

                            <!-- Confirm Password -->
                            <div>
                                <label for="confirm_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Confirm New Password <span class="text-red-500">*</span>
                                </label>
                                <input type="password" 
                                       id="confirm_password" 
                                       name="confirm_password" 
                                       class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                       required>
                                <?php echo form_error('confirm_password', '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                            </div>

                            <button type="submit" 
                                    class="py-2.5 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-cyan-600 text-white hover:bg-cyan-700">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 0 0-4.5 4.5V9H5a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-6a2 2 0 0 0-2-2h-.5V5.5A4.5 4.5 0 0 0 10 1Zm3 8V5.5a3 3 0 1 0-6 0V9h6Z" clip-rule="evenodd" />
                                </svg>
                                Update Password
                            </button>
                        <?php echo form_close(); ?>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<!-- ========== END MAIN CONTENT ========== -->

<script>
function previewPhoto(input) {
    const preview = document.getElementById('photoPreview');
    const currentPhoto = document.getElementById('currentPhoto');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            if (currentPhoto) {
                currentPhoto.src = e.target.result;
            } else {
                preview.innerHTML = `<img src="${e.target.result}" alt="Photo Preview" class="h-full w-full object-cover" id="currentPhoto">`;
            }
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

<?php
include_once APPPATH . "views/partials/footer.php";
?>