<?php include_once APPPATH . "views/partials/guest_header.php"; ?>

<body class="bg-gray-100 dark:bg-gray-800">

  <style>
    /* Keeping your explicit background style as requested. */
    body {
      background-image: url('<?php echo base_url(); ?>assets/img/branch.png');
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
  <div class="w-full max-w-5xl"> <!-- Increased width from 3xl to 5xl -->

      <div class="bg-white border border-gray-200 rounded-xl shadow-lg dark:bg-gray-900 dark:border-gray-700">
        <div class="p-4 sm:p-7">
          <div class="text-center mb-6">
            <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">
              <svg class="inline-block w-6 h-6 mr-2 -mt-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"> <?php // Example icon for plus-circle ?>
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
              </svg>
              Register Main Branch
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

          <!-- Form -->
          <?php // Using 'grid gap-y-6' for overall row spacing. Individual rows with columns will have their own grid. ?>
         
          <?php echo form_open("welcome/create_blanch", ['novalidate' => true]); ?>
                    <div class="grid sm:grid-cols-12 gap-4 sm:gap-6">
                        <div class="sm:col-span-4">
                            <label for="blanch_name" class="block text-sm font-medium mb-2 dark:text-gray-300">* Branch name:</label>
                            <input type="text" id="blanch_name" name="blanch_name" placeholder="Branch name" autocomplete="off" required
                                   class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600" value="<?php echo set_value('blanch_name'); ?>">
                            <?php echo form_error("blanch_name", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="region_id" class="block text-sm font-medium mb-2 dark:text-gray-300">* Branch region:</label>
                            <select id="region_id" name="region_id" required
                                    class="py-2.5 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:ring-gray-600">
                                <option value="">Select Region</option>
                                <?php if (isset($region) && is_array($region)): ?>
                                    <?php foreach ($region as $regions_item): ?>
                                    <option value="<?php echo htmlspecialchars($regions_item->region_id, ENT_QUOTES, 'UTF-8'); ?>" <?php echo set_select('region_id', $regions_item->region_id); ?>>
                                        <?php echo htmlspecialchars($regions_item->region_name, ENT_QUOTES, 'UTF-8'); ?>
                                    </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <?php echo form_error("region_id", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="blanch_no" class="block text-sm font-medium mb-2 dark:text-gray-300">* Branch Phone Number:</label>
                            <input type="number" id="blanch_no" name="blanch_no" placeholder="Branch phone number" required autocomplete="off"
                                   class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600" value="<?php echo set_value('blanch_no'); ?>">
                             <?php echo form_error("blanch_no", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>
                    </div>

                    <input type="hidden" name="comp_id" value="<?php echo htmlspecialchars($_SESSION['comp_id'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">

                    <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex justify-center gap-x-2">
                            <button type="submit" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-cyan-600 text-white hover:bg-cyan-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                Save
                            </button>
                         
                        </div>
                    </div>
                <?php echo form_close(); ?>
          <!-- End Form -->

          <p class="mt-8 text-center text-sm text-gray-600 dark:text-gray-400">
            Already have an account?
            <a class="text-cyan-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-cyan-500" href="<?php echo base_url('welcome/employee_login'); ?>">
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