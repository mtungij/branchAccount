<?php include_once APPPATH . "views/partials/guest_header.php"; ?>

<body class="bg-gray-100 dark:bg-gray-800">
  <style>
    body {
      background-image: url('<?php echo base_url(); ?>assets/img/mikoposoft.PNG');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: 100% 100%;
    }
  </style>

  <div class="font-poppins min-h-screen flex flex-col items-center justify-center py-12 px-4 sm:px-6 lg:px-8">

    <div class="mb-8 text-center">
      <h2 class="text-3xl sm:text-4xl font-bold">
        <span class="text-cyan-600 dark:text-orange-500">Loan-Pocket Management System</span>
      </h2>
    </div>

    <div class="w-full max-w-3xl">
      <div class="bg-white border border-gray-200 rounded-xl shadow-lg dark:bg-gray-900 dark:border-gray-700">
        <div class="p-4 sm:p-7">
          <div class="text-center mb-6">
            <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">
              <svg class="inline-block w-6 h-6 mr-2 -mt-1" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
              </svg>
              Update Your Profile
            </h1>
          </div>

          <?php if ($msg = $this->session->flashdata('massage')): ?>
          <div class="mb-4 p-4 bg-green-100 border border-green-200 text-green-700 rounded-lg">
            <p class="text-sm"><?php echo $msg; ?></p>
          </div>
          <?php endif; ?>

          <?php echo form_open('welcome/save_updated_profile'); ?>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-6">
              <div>
                <label for="empl_name" class="block text-sm mb-2 dark:text-white">Full Name</label>
                <input type="text" id="empl_name" name="empl_name" required value="<?= $employee->empl_name ?>" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400" />
                <?php echo form_error('empl_name', '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
              </div>

              <div>
                <label for="empl_email" class="block text-sm mb-2 dark:text-white">Email</label>
                <input type="email" id="empl_email" name="empl_email" required value="<?= $employee->empl_email ?>" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400" />
                <?php echo form_error('empl_email', '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
              </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-6 mt-6">
              <div>
                <label for="empl_no" class="block text-sm mb-2 dark:text-white">Phone Number</label>
                <input type="tel" id="empl_no" name="empl_no" required value="<?= $employee->empl_no ?>" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400" />
                <?php echo form_error('empl_no', '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
              </div>

              <div>
                <label for="empl_sex" class="block text-sm mb-2 dark:text-white">Gender</label>
                <select id="empl_sex" name="empl_sex" required class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                  <option value="">Select Gender</option>
                  <option value="male" <?= $employee->empl_sex == 'male' ? 'selected' : '' ?>>Male</option>
                  <option value="female" <?= $employee->empl_sex == 'female' ? 'selected' : '' ?>>Female</option>
                </select>
                <?php echo form_error('empl_sex', '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
              </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-6 mt-6">
              <div>
                <label for="password" class="block text-sm mb-2 dark:text-white">New Password</label>
                <input type="password" id="password" name="password" placeholder="Leave blank to keep current" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400" />
                <?php echo form_error('password', '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
              </div>

              <div>
                <label for="confirm_password" class="block text-sm mb-2 dark:text-white">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Repeat new password" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400" />
              </div>
            </div>

            <div class="mt-8">
              <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg bg-cyan-600 text-white hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                Save Changes
              </button>
            </div>

          <?php echo form_close(); ?>

        </div>
      </div>
    </div>
  </div>

<?php include_once APPPATH . "views/partials/footer.php"; ?>
