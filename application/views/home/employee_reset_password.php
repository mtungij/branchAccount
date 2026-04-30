<?php
include_once APPPATH . "views/partials/guest_header.php";
?>

<body class="bg-gray-100 dark:bg-gray-800">
  <style>
    body {
      background-image: url('<?php echo base_url(); ?>assets/img/finance.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: 100% 100%;
    }
  </style>

  <div class="font-poppins min-h-screen flex flex-col items-center justify-center py-6 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md grid grid-cols-1 gap-6">
      <div id="reset-password-card" class="bg-white border border-gray-200 rounded-xl shadow-lg dark:bg-gray-800 dark:border-gray-600 p-5 sm:p-6">
        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">Weka Nenosiri Jipya</h2>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Pata tokeni kutoka menejimenti, kisha weka nenosiri jipya.</p>

        <?php if ($msg = $this->session->flashdata('massage')): ?>
        <div class="mt-4 p-3 bg-teal-100 border border-teal-200 text-teal-800 rounded-lg text-sm dark:bg-teal-900/30 dark:border-teal-700 dark:text-teal-200"><?php echo $msg; ?></div>
        <?php endif; ?>

        <?php if ($err = $this->session->flashdata('mass')): ?>
        <div class="mt-4 p-3 bg-red-100 border border-red-200 text-red-700 rounded-lg text-sm dark:bg-red-900/30 dark:border-red-700 dark:text-red-200"><?php echo $err; ?></div>
        <?php endif; ?>

        <?php echo form_open('welcome/reset_employee_password_with_code', ['class' => 'mt-4 grid gap-y-4']); ?>
          <div>
            <label for="reset_empl_no" class="block text-sm mb-2 dark:text-white">Namba yako ya simu uliyopo kwenye mfumo</label>
            <input type="tel" id="reset_empl_no" name="empl_no" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm text-gray-800 focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-500 dark:text-gray-100 dark:placeholder-gray-300" required autocomplete="off">
            <?php echo form_error('empl_no', '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
          </div>

          <div>
            <label for="reset_code" class="block text-sm mb-2 dark:text-white">Tokeni ya Uthibitisho</label>
            <input type="text" id="reset_code" name="reset_code" maxlength="6" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm text-gray-800 focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-500 dark:text-gray-100 dark:placeholder-gray-300" required autocomplete="off" placeholder="Tokeni ya namba 6">
            <?php echo form_error('reset_code', '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
          </div>

          <div>
            <label for="new_password" class="block text-sm mb-2 dark:text-white">Nenosiri Jipya</label>
            <input type="password" id="new_password" name="new_password" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm text-gray-800 focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-500 dark:text-gray-100 dark:placeholder-gray-300" required autocomplete="off">
            <?php echo form_error('new_password', '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
          </div>

          <div>
            <label for="confirm_password" class="block text-sm mb-2 dark:text-white">Thibitisha Nenosiri Jipya</label>
            <input type="password" id="confirm_password" name="confirm_password" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm text-gray-800 focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-500 dark:text-gray-100 dark:placeholder-gray-300" required autocomplete="off">
            <?php echo form_error('confirm_password', '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
          </div>

          <button type="submit" class="w-full py-2.5 px-4 inline-flex justify-center items-center text-sm font-medium rounded-lg border border-transparent bg-emerald-600 text-white hover:bg-emerald-700">Weka Nenosiri Jipya</button>
        <?php echo form_close(); ?>

        <div class="mt-4 flex items-center justify-between">
          <a href="<?php echo base_url('welcome/employee_forgot_password'); ?>" class="inline-flex items-center gap-x-1 text-sm text-cyan-600 hover:underline">Omba Tokeni ya Kurejesha</a>
          <a href="<?php echo base_url('welcome/employee_login'); ?>" class="inline-flex items-center gap-x-1 text-sm text-cyan-600 hover:underline">Rudi Kwenye Ingia ya Mfanyakazi</a>
        </div>
      </div>
    </div>
  </div>
</body>
