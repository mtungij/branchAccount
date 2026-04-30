<?php
include_once APPPATH . "views/partials/header.php";
?>

<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
  <div class="p-4 sm:p-6">

    <?php if ($this->session->flashdata('massage')): ?>
      <div class="mb-4 rounded-lg border border-green-200 bg-green-50 p-3 text-sm text-green-700 dark:border-green-700 dark:bg-green-900/20 dark:text-green-300">
        <?php echo $this->session->flashdata('massage'); ?>
      </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
      <div class="mb-4 rounded-lg border border-red-200 bg-red-50 p-3 text-sm text-red-700 dark:border-red-700 dark:bg-red-900/20 dark:text-red-300">
        <?php echo $this->session->flashdata('error'); ?>
      </div>
    <?php endif; ?>
    
    <!-- Back Button -->
    <div class="mb-6">
      <a href="javascript:history.back()" class="inline-flex items-center gap-x-2 text-sm font-medium text-blue-600 hover:text-blue-800">
        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        <?php echo $this->lang->line('back'); ?>
      </a>
    </div>

    <!-- Sponsor Profile Card -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
      
      <!-- Header Background -->
      <div class="h-[180px] bg-gradient-to-r from-cyan-500 via-blue-500 to-purple-500"></div>
      
      <!-- Profile Content -->
      <div class="px-6 sm:px-8 pb-8">
        
        <!-- Passport Photo -->
        <div class="flex flex-col sm:flex-row gap-6 -mt-20 relative z-10">
          <div class="flex-shrink-0">
            <div class="relative">
              <?php if (!empty($sponsor->sp_id)): ?>
                <?php 
                  // Check for passport image in sponser_passport folder
                  $passport_files = glob(FCPATH . 'assets/sponser_passport/' . $sponsor->sp_id . '.*');
                  $passport_path = !empty($passport_files) ? 'assets/sponser_passport/' . basename($passport_files[0]) : '';
                ?>
                <?php if (!empty($passport_path) && file_exists(FCPATH . $passport_path)): ?>
                  <img class="w-40 h-40 rounded-full object-cover border-8 border-white shadow-xl dark:border-gray-800" 
                       src="<?= base_url($passport_path) ?>" 
                    alt="<?php echo $this->lang->line('sponsor_passport'); ?>">
                <?php else: ?>
                  <img class="w-40 h-40 rounded-full object-cover border-8 border-white shadow-xl dark:border-gray-800" 
                       src="<?= base_url('assets/img/customer21.png') ?>" 
                    alt="<?php echo $this->lang->line('default_image'); ?>">
                <?php endif; ?>
              <?php endif; ?>
            </div>
          </div>

          <!-- Profile Info -->
          <div class="flex-1 pt-2">
            <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white uppercase">
              <?= $sponsor->sp_name . ' ' . $sponsor->sp_mname . ' ' . $sponsor->sp_lname ?>
            </h1>
            <p class="text-lg text-gray-600 dark:text-gray-300 mt-2">
              <span class="font-semibold"><?php echo $this->lang->line('relationship'); ?>:</span> 
              <span class="text-cyan-600 dark:text-cyan-400 uppercase font-medium"><?= $sponsor->sp_relation ?? $this->lang->line('not_available_short') ?></span>
            </p>
            <p class="text-lg text-gray-600 dark:text-gray-300">
              <span class="font-semibold"><?php echo $this->lang->line('occupation_business'); ?>:</span> 
              <span class="text-gray-900 dark:text-gray-100"><?= $sponsor->nature ?? $this->lang->line('not_available_short') ?></span>
            </p>
          </div>
        </div>

        <div class="mt-6 rounded-lg border border-cyan-200 bg-cyan-50/70 p-5 dark:border-cyan-800 dark:bg-cyan-900/20">
          <h3 class="mb-4 text-base font-semibold text-gray-900 dark:text-white"><?php echo $this->lang->line('edit_sponsor'); ?></h3>
          <?php echo form_open_multipart('admin/update_sponsor_details/' . $sponsor->sp_id, ['class' => 'grid grid-cols-1 gap-4 md:grid-cols-4']); ?>
            <div>
              <label for="sp_name" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300"><?php echo $this->lang->line('first_name'); ?></label>
              <input type="text" id="sp_name" name="sp_name" value="<?php echo htmlspecialchars($sponsor->sp_name, ENT_QUOTES, 'UTF-8'); ?>" required class="block w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200">
            </div>
            <div>
              <label for="sp_mname" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300"><?php echo $this->lang->line('middle_name'); ?></label>
              <input type="text" id="sp_mname" name="sp_mname" value="<?php echo htmlspecialchars($sponsor->sp_mname, ENT_QUOTES, 'UTF-8'); ?>" required class="block w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200">
            </div>
            <div>
              <label for="sp_lname" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300"><?php echo $this->lang->line('last_name'); ?></label>
              <input type="text" id="sp_lname" name="sp_lname" value="<?php echo htmlspecialchars($sponsor->sp_lname, ENT_QUOTES, 'UTF-8'); ?>" required class="block w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200">
            </div>
            <div>
              <label for="sp_phone_no" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300"><?php echo $this->lang->line('phone_number'); ?></label>
              <input type="text" id="sp_phone_no" name="sp_phone_no" value="<?php echo htmlspecialchars($sponsor->sp_phone_no, ENT_QUOTES, 'UTF-8'); ?>" required class="block w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200">
            </div>
            <div>
              <label for="sp_district" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300"><?php echo $this->lang->line('district'); ?></label>
              <input type="text" id="sp_district" name="sp_district" value="<?php echo htmlspecialchars($sponsor->sp_district ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="block w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200">
            </div>
            <div>
              <label for="sp_ward" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300"><?php echo $this->lang->line('ward'); ?></label>
              <input type="text" id="sp_ward" name="sp_ward" value="<?php echo htmlspecialchars($sponsor->sp_ward ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="block w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200">
            </div>
            <div>
              <label for="sp_street" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300"><?php echo $this->lang->line('street'); ?></label>
              <input type="text" id="sp_street" name="sp_street" value="<?php echo htmlspecialchars($sponsor->sp_street ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="block w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200">
            </div>
            <div>
              <label for="sp_bussines_area" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300"><?php echo $this->lang->line('business_area'); ?></label>
              <input type="text" id="sp_bussines_area" name="sp_bussines_area" value="<?php echo htmlspecialchars($sponsor->sp_bussines_area ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="block w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200">
            </div>
            <div class="md:col-span-4">
              <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300"><?php echo $this->lang->line('sponsor_passport'); ?> <span class="text-gray-400 font-normal">(<?php echo $this->lang->line('optional'); ?>)</span></label>
              <div class="flex items-center gap-4">
                <?php
                  $edit_passport_files = glob(FCPATH . 'assets/sponser_passport/' . $sponsor->sp_id . '.*');
                  $edit_passport_path  = !empty($edit_passport_files) ? 'assets/sponser_passport/' . basename($edit_passport_files[0]) : '';
                ?>
                <?php if (!empty($edit_passport_path) && file_exists(FCPATH . $edit_passport_path)): ?>
                  <img id="passport_preview" src="<?= base_url($edit_passport_path) ?>" class="w-16 h-16 rounded-full object-cover border-2 border-cyan-400" alt="Current passport">
                <?php else: ?>
                  <img id="passport_preview" src="<?= base_url('assets/img/customer21.png') ?>" class="w-16 h-16 rounded-full object-cover border-2 border-gray-300" alt="No passport">
                <?php endif; ?>
                <input type="file" id="sp_passport" name="sp_passport" accept="image/*"
                  onchange="document.getElementById('passport_preview').src = window.URL.createObjectURL(this.files[0])"
                  class="block text-sm text-gray-700 dark:text-gray-300 file:mr-4 file:rounded-lg file:border-0 file:bg-cyan-600 file:px-3 file:py-2 file:text-sm file:font-semibold file:text-white hover:file:bg-cyan-700">
              </div>
            </div>
            <div class="md:col-span-4 flex justify-end">
              <button type="submit" class="rounded-lg bg-cyan-600 px-4 py-2 text-sm font-semibold text-white hover:bg-cyan-700"><?php echo $this->lang->line('update'); ?></button>
            </div>
          <?php echo form_close(); ?>
        </div>

        <!-- Information Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-10">
          
          <!-- Contact Information -->
          <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
              <svg class="w-5 h-5 text-cyan-600" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
              </svg>
              <?php echo $this->lang->line('contact_information'); ?>
            </h2>
            <div class="space-y-4">
              <div class="flex items-start gap-3">
                <span class="text-sm font-medium text-gray-600 dark:text-gray-400 w-24"><?php echo $this->lang->line('phone'); ?>:</span>
                <span class="text-sm text-gray-900 dark:text-gray-100 break-all"><?= $sponsor->sp_phone_no ?? $this->lang->line('not_available_short') ?></span>
              </div>
              <div class="flex items-start gap-3">
                <span class="text-sm font-medium text-gray-600 dark:text-gray-400 w-24"><?php echo $this->lang->line('nationality'); ?>:</span>
                <span class="text-sm text-gray-900 dark:text-gray-100"><?= $sponsor->sp_nation ?? $this->lang->line('not_available_short') ?></span>
              </div>
            </div>
          </div>

          <!-- Address Information -->
          <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
              <svg class="w-5 h-5 text-cyan-600" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/>
              </svg>
              <?php echo $this->lang->line('address_information'); ?>
            </h2>
            <div class="space-y-4">
              <div class="flex items-start gap-3">
                <span class="text-sm font-medium text-gray-600 dark:text-gray-400 w-24"><?php echo $this->lang->line('district'); ?>:</span>
                <span class="text-sm text-gray-900 dark:text-gray-100"><?= $sponsor->sp_district ?? $this->lang->line('not_available_short') ?></span>
              </div>
              <div class="flex items-start gap-3">
                <span class="text-sm font-medium text-gray-600 dark:text-gray-400 w-24"><?php echo $this->lang->line('ward'); ?>:</span>
                <span class="text-sm text-gray-900 dark:text-gray-100"><?= $sponsor->sp_ward ?? $this->lang->line('not_available_short') ?></span>
              </div>
              <div class="flex items-start gap-3">
                <span class="text-sm font-medium text-gray-600 dark:text-gray-400 w-24"><?php echo $this->lang->line('street'); ?>:</span>
                <span class="text-sm text-gray-900 dark:text-gray-100"><?= $sponsor->sp_street ?? $this->lang->line('not_available_short') ?></span>
              </div>
              <div class="flex items-start gap-3">
                <span class="text-sm font-medium text-gray-600 dark:text-gray-400 w-24"><?php echo $this->lang->line('business_area'); ?>:</span>
                <span class="text-sm text-gray-900 dark:text-gray-100"><?= $sponsor->sp_bussines_area ?? $this->lang->line('not_available_short') ?></span>
              </div>
            </div>
          </div>

        </div>

        <!-- Documents Section -->
        <div class="mt-10 bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
          <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-6 flex items-center gap-2">
            <svg class="w-5 h-5 text-cyan-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <?php echo $this->lang->line('sponsor_documents'); ?>
          </h2>
          
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Identification Letter -->
            <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-4 hover:border-cyan-500 transition-colors">
              <?php 
                $barua_files = glob(FCPATH . 'assets/sponser_documents/' . $sponsor->sp_id . '_barua.*');
                $barua_path = !empty($barua_files) ? 'assets/sponser_documents/' . basename($barua_files[0]) : '';
              ?>
              <?php if (!empty($barua_path) && file_exists(FCPATH . $barua_path)): ?>
                <a href="<?= base_url($barua_path) ?>" 
                   target="_blank"
                   class="flex items-center gap-3 text-cyan-600 hover:text-cyan-800 dark:text-cyan-400 dark:hover:text-cyan-300 transition-colors">
                  <svg class="w-8 h-8 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20M10,19L12,15H9V10H15V15L13,19H10Z"/>
                  </svg>
                  <div>
                    <p class="font-semibold"><?php echo $this->lang->line('identification_letter'); ?></p>
                    <p class="text-xs text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('identification_letter_desc'); ?></p>
                  </div>
                </a>
              <?php else: ?>
                <div class="flex items-center gap-3 text-gray-400">
                  <svg class="w-8 h-8 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20M10,19L12,15H9V10H15V15L13,19H10Z"/>
                  </svg>
                  <div>
                    <p class="font-semibold"><?php echo $this->lang->line('identification_letter'); ?></p>
                    <p class="text-xs text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('not_uploaded'); ?></p>
                  </div>
                </div>
              <?php endif; ?>
            </div>

            <!-- Identity Card -->
            <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-4 hover:border-cyan-500 transition-colors">
              <?php 
                $kitambulisho_files = glob(FCPATH . 'assets/sponser_documents/' . $sponsor->sp_id . '_kitambulisho.*');
                $kitambulisho_path = !empty($kitambulisho_files) ? 'assets/sponser_documents/' . basename($kitambulisho_files[0]) : '';
              ?>
              <?php if (!empty($kitambulisho_path) && file_exists(FCPATH . $kitambulisho_path)): ?>
                <a href="<?= base_url($kitambulisho_path) ?>" 
                   target="_blank"
                   class="flex items-center gap-3 text-cyan-600 hover:text-cyan-800 dark:text-cyan-400 dark:hover:text-cyan-300 transition-colors">
                  <svg class="w-8 h-8 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20M10,19L12,15H9V10H15V15L13,19H10Z"/>
                  </svg>
                  <div>
                    <p class="font-semibold"><?php echo $this->lang->line('identity_card'); ?></p>
                    <p class="text-xs text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('identity_card_desc'); ?></p>
                  </div>
                </a>
              <?php else: ?>
                <div class="flex items-center gap-3 text-gray-400">
                  <svg class="w-8 h-8 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20M10,19L12,15H9V10H15V15L13,19H10Z"/>
                  </svg>
                  <div>
                    <p class="font-semibold"><?php echo $this->lang->line('identity_card'); ?></p>
                    <p class="text-xs text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('not_uploaded'); ?></p>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</div>

<?php
include_once APPPATH . "views/partials/footer.php";
?>

<script>
  // Print functionality
  document.addEventListener('DOMContentLoaded', function() {
    // Optional: Add print button functionality
    const printButton = document.createElement('button');
    // Can be used for future enhancements
  });
</script>
