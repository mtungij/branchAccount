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
      <div class="bg-white border border-gray-200 rounded-xl shadow-lg dark:bg-gray-800 dark:border-gray-600 p-5 sm:p-6">
        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">Omba Tokeni ya Kurejesha Nenosiri</h2>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Ingiza namba yako ya simu uliyopo kwenye mfumo. Tokeni itatumwa kwa viongozi ili uwaombe wakutajie.</p>

        <?php if ($msg = $this->session->flashdata('massage')): ?>
        <div class="mt-4 p-3 bg-teal-100 border border-teal-200 text-teal-800 rounded-lg text-sm dark:bg-teal-900/30 dark:border-teal-700 dark:text-teal-200"><?php echo $msg; ?></div>
        <?php endif; ?>

        <?php if ($err = $this->session->flashdata('mass')): ?>
        <div class="mt-4 p-3 bg-red-100 border border-red-200 text-red-700 rounded-lg text-sm dark:bg-red-900/30 dark:border-red-700 dark:text-red-200"><?php echo $err; ?></div>
        <?php endif; ?>

        <?php echo form_open('welcome/request_employee_reset_code', ['class' => 'mt-4 grid gap-y-4']); ?>
          <div>
            <label for="empl_no" class="block text-sm mb-2 dark:text-white">Namba yako ya simu uliyopo kwenye mfumo</label>
            <input type="tel" id="empl_no" name="empl_no" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm text-gray-800 focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-500 dark:text-gray-100 dark:placeholder-gray-300" required autocomplete="off" placeholder="mf. 07XXXXXXXX">
            <?php echo form_error('empl_no', '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
          </div>
          <button type="submit" class="w-full py-2.5 px-4 inline-flex justify-center items-center text-sm font-medium rounded-lg border border-transparent bg-cyan-600 text-white hover:bg-cyan-700">Tuma Tokeni</button>
        <?php echo form_close(); ?>

        <a href="<?php echo base_url('welcome/employee_reset_password'); ?>" class="mt-4 inline-flex items-center gap-x-1 text-sm text-emerald-600 hover:underline dark:text-emerald-400">Nina token tayari? Weka nenosiri jipya</a>
      </div>

    </div>
  </div>
</body>
