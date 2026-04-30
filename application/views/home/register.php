<?php include_once APPPATH . "views/partials/guest_header.php"; ?>

<body class="bg-gray-100 dark:bg-gray-800">

  <style>
    /* Keeping your explicit background style as requested. */
    body {
      background-image: url('<?php echo base_url(); ?>assets/img/register.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: 100% 100%; /* Stretches image, may distort */
    }
  </style>

  <div class="font-poppins min-h-screen flex flex-col items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <?php // Centering wrapper, added py-12 for more vertical space for a longer form ?>

    <div class="mb-8 text-center"> <?php // Increased bottom margin ?>
      <h2 class="text-3xl sm:text-4xl font-bold">
        <span class="text-cyan-600 dark:text-orange-500">Loan-Pocket Management System</span>
        <!-- <span class="text-gray-500 dark:text-gray-400">System</span> -->
      </h2>
    </div>

    <?php // Main Sign Up Card - wider than login: max-w-3xl ?>
    <div class="w-full max-w-5xl"> <!-- Or even max-w-6xl for more width -->

      <div class="bg-white border border-gray-200 rounded-xl shadow-lg dark:bg-gray-900 dark:border-gray-700">
        <div class="p-4 sm:p-7">
          <div class="text-center mb-6">
            <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">
              <svg class="inline-block w-6 h-6 mr-2 -mt-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"> <?php // Example icon for plus-circle ?>
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
              </svg>
              Create Microfinance Account
            </h1>
          </div>

          <?php // Flash Success Message - Tailwind styled ?>
          <?php if ($das = $this->session->flashdata('massage')): ?>
          <div class="mb-4 p-4 bg-green-100 border border-green-200 text-green-700 rounded-lg dark:bg-green-800/10 dark:border-green-900 dark:text-green-500" role="alert">
            <div class="flex">
              <div class="flex-shrink-0">
                <svg class="flex-shrink-0 size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                  <path d="m9 12 2 2 4-4"></path>
                </svg>
              </div>
              <div class="ms-3">
                <p class="text-sm"><?php echo $das;?></p>
              </div>
            </div>
          </div>
          <?php endif; ?>

          <?php // Flash Error Message ?>
          <?php if ($error = $this->session->flashdata('error')): ?>
          <div class="mb-4 p-4 bg-red-100 border border-red-200 text-red-700 rounded-lg dark:bg-red-800/10 dark:border-red-900 dark:text-red-500" role="alert">
            <div class="flex">
              <div class="flex-shrink-0">
                <svg class="flex-shrink-0 size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <circle cx="12" cy="12" r="10"></circle>
                  <path d="m15 9-6 6"></path>
                  <path d="m9 9 6 6"></path>
                </svg>
              </div>
              <div class="ms-3">
                <p class="text-sm"><?php echo $error;?></p>
              </div>
            </div>
          </div>
          <?php endif; ?>

          <!-- Form -->
          <?php // Using 'grid gap-y-6' for overall row spacing. Individual rows with columns will have their own grid. ?>
  
          <?php echo form_open_multipart("welcome/create_company", ['class' => 'grid grid-cols-1 md:grid-cols-3 gap-6']); ?>

  <!-- Company Name -->
  <div class="col-span-1">
    <label for="comp_name" class="block text-sm mb-2 dark:text-white">Microfinance Name</label>
    <div class="relative">
      <input type="text" id="comp_name" name="comp_name" class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:placeholder-gray-500 dark:focus:ring-gray-600" required autocomplete="off" placeholder="microfinance name">
      <?php $comp_name_error = form_error("comp_name"); if ($comp_name_error): ?>
        <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
          <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
          </svg>
        </div>
      <?php endif; ?>
    </div>
    <?php if ($comp_name_error): ?>
      <p class="text-xs text-red-600 mt-2"><?php echo strip_tags($comp_name_error); ?></p>
    <?php endif; ?>
  </div>

  <!-- Registration Number -->
  <div class="col-span-1">
    <label for="comp_number" class="block text-sm mb-2 dark:text-white">Registration Number</label>
    <div class="relative">
      <input type="text" id="comp_number" name="comp_number" class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:placeholder-gray-500 dark:focus:ring-gray-600" required autocomplete="off" placeholder="Registration Number">
      <?php $comp_number_error = form_error("comp_number"); if ($comp_number_error): ?>
        <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
          <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
          </svg>
        </div>
      <?php endif; ?>
    </div>
    <?php if ($comp_number_error): ?>
      <p class="text-xs text-red-600 mt-2"><?php echo strip_tags($comp_number_error); ?></p>
    <?php endif; ?>
  </div>

  <!-- Phone Number -->
  <div class="col-span-1">
    <label for="comp_phone" class="block text-sm mb-2 dark:text-white">Office Phone Number</label>
    <div class="relative">
      <input type="tel" id="comp_phone" name="comp_phone" class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:placeholder-gray-500 dark:focus:ring-gray-600" required autocomplete="off" placeholder="Phone Number">
      <?php $comp_phone_error = form_error("comp_phone"); if ($comp_phone_error): ?>
        <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
          <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
          </svg>
        </div>
      <?php endif; ?>
    </div>
    <?php if ($comp_phone_error): ?>
      <p class="text-xs text-red-600 mt-2"><?php echo strip_tags($comp_phone_error); ?></p>
    <?php endif; ?>
  </div>

  <!-- Address -->
  <div class="col-span-1">
    <label for="adress" class="block text-sm mb-2 dark:text-white">Address</label>
    <div class="relative">
      <input type="text" id="adress" name="adress" class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:placeholder-gray-500 dark:focus:ring-gray-600" required autocomplete="off" placeholder="Address">
      <?php $adress_error = form_error("adress"); if ($adress_error): ?>
        <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
          <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
          </svg>
        </div>
      <?php endif; ?>
    </div>
    <?php if ($adress_error): ?>
      <p class="text-xs text-red-600 mt-2"><?php echo strip_tags($adress_error); ?></p>
    <?php endif; ?>
  </div>

  <!-- Region -->
  <div class="col-span-1">
    <label for="region_id" class="block text-sm mb-2 dark:text-white">Region</label>
    <select id="region_id" name="region_id" class="py-2.5 sm:py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:placeholder-gray-500 dark:focus:ring-gray-600" required>
      <option value="">Select Region</option>
      <?php foreach ($region as $regions): ?>
        <option value="<?php echo htmlspecialchars($regions->region_id, ENT_QUOTES, 'UTF-8'); ?>">
          <?php echo htmlspecialchars($regions->region_name, ENT_QUOTES, 'UTF-8'); ?>
        </option>
      <?php endforeach; ?>
    </select>
    <?php $region_id_error = form_error("region_id"); if ($region_id_error): ?>
      <p class="text-xs text-red-600 mt-2"><?php echo strip_tags($region_id_error); ?></p>
    <?php endif; ?>
  </div>

  <!-- Email -->
  <div class="col-span-1">
    <label for="comp_email" class="block text-sm mb-2 dark:text-white">Email</label>
    <div class="relative">
      <input type="email" id="comp_email" name="comp_email" class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:placeholder-gray-500 dark:focus:ring-gray-600" required autocomplete="off" placeholder="Email">
      <?php $comp_email_error = form_error("comp_email"); if ($comp_email_error): ?>
        <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
          <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
          </svg>
        </div>
      <?php endif; ?>
    </div>
    <?php if ($comp_email_error): ?>
      <p class="text-xs text-red-600 mt-2"><?php echo strip_tags($comp_email_error); ?></p>
    <?php endif; ?>
  </div>

  <!-- Company Logo -->
  <div class="col-span-1 md:col-span-3">
    <label for="comp_logo" class="block text-sm mb-2 dark:text-white font-semibold">Company Logo</label>
    <div class="relative">
      <input type="file" id="comp_logo" name="comp_logo" accept="image/*" class="py-2.5 sm:py-3 px-4 block w-full border-2 border-gray-200 border-dashed rounded-lg text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-cyan-50 file:text-cyan-700 hover:file:bg-cyan-100 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:file:bg-cyan-900 dark:file:text-cyan-400">
      <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
        <svg class="inline w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
        </svg>
        PNG, JPG, JPEG up to 2MB (Recommended: 200x200px)
      </p>
    </div>
  </div>

  <!-- Hidden Field -->
  <input type="hidden" name="sms_status" value="NO">

  <!-- Submit Button -->
  <div class="col-span-1 md:col-span-3 mt-6">
    <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-cyan-600 text-white hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900 disabled:opacity-50 disabled:pointer-events-none">
      Sign Up
    </button>
  </div>

<?php echo form_close(); ?>


          <p class="mt-8 text-center text-sm text-gray-600 dark:text-gray-400">
            Already have an account?
            <a class="text-cyan-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-cyan-500" href="<?php echo base_url("welcome/employee_login"); ?>">
              Sign In
            </a>
          </p>

        </div>
      </div>
    </div>
  </div> <?php // End centering div ?>

<?php
include_once APPPATH . "views/partials/footer.php";
?>