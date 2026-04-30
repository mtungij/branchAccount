<?php
// Ensure this path is correct and the file exists.
include_once APPPATH . "views/partials/guest_header.php";
?>

<body class="bg-gray-100 dark:bg-gray-800"> <?php // Default body background, overridden by your image ?>

  <style>
    /*
      Keeping your explicit background style as requested.
      Consider moving to Tailwind utility classes for easier management in the future if feasible:
      e.g., class="bg-[url('<?php echo base_url(); ?>assets/img/mikoposoft.PNG')] bg-no-repeat bg-fixed bg-cover" (or bg-fill)
    */
    body {
      background-image: url('<?php echo base_url(); ?>assets/img/mikoposoft.PNG');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: 100% 100%; /* Stretches image, may distort */
    }
  </style>

  <div class="font-poppins font-poppins min-h-screen flex flex-col items-center justify-center py-6 px-4 sm:px-6 lg:px-8">
    <?php // Centering wrapper ?>

    <div class="mb-6 text-center">
      <?php // The old code had an empty span after "Admin". We'll just use "Admin". ?>
      <h2 class="text-3xl sm:text-4xl font-bold text-cyan-600 dark:text-cyan-500">
        Admin Login
      </h2>
    </div>

    <?php // Main Login Card ?>
    <div class="w-full max-w-md">
      <div class="bg-white border border-gray-200 rounded-xl shadow-lg dark:bg-gray-800 dark:border-gray-600">
        <div class="p-4 sm:p-7">
          <div class="text-center">
            <?php // The new template has a "Sign in" title, let's use a more specific one or remove if redundant with above.
                  // For now, keeping a generic "Login" which can be changed.
            ?>
            <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Login to Your Account</h1>

            <?php // Admin/Employee toggle links from your old panel-heading ?>
            <div class="mt-3 mb-4 text-center">
              <a href="<?php echo base_url("welcome/admin_login"); ?>" class="inline-flex items-center gap-x-1 text-sm text-cyan-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-cyan-500">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"> <?php // Placeholder Key Icon ?>
                  <path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v2.586l-2.293-2.293a1 1 0 00-1.414 1.414L7.586 7H5a1 1 0 000 2h2.586l-2.293 2.293a1 1 0 101.414 1.414L9 10.414V13a1 1 0 102 0v-2.586l2.293 2.293a1 1 0 001.414-1.414L12.414 9H15a1 1 0 100-2h-2.586l2.293-2.293a1 1 0 00-1.414-1.414L11 4.586V3a1 1 0 00-1-1zm0 8a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                </svg>
                <b>Admin</b>
              </a>
              <span class="mx-2 text-gray-400 dark:text-gray-500">|</span>
              <a href="<?php echo base_url("welcome/employee_login"); ?>" class="inline-flex items-center gap-x-1 text-sm text-orange-500 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-orange-400">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"> <?php // Placeholder Key Icon ?>
                   <path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v2.586l-2.293-2.293a1 1 0 00-1.414 1.414L7.586 7H5a1 1 0 000 2h2.586l-2.293 2.293a1 1 0 101.414 1.414L9 10.414V13a1 1 0 102 0v-2.586l2.293 2.293a1 1 0 001.414-1.414L12.414 9H15a1 1 0 100-2h-2.586l2.293-2.293a1 1 0 00-1.414-1.414L11 4.586V3a1 1 0 00-1-1zm0 8a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                </svg>
                <b>Employee</b>
              </a>
            </div>
          </div>

          <?php // Flash Messages - Tailwind styled (both shown as danger as per original) ?>
          <?php if ($das = $this->session->flashdata('massage')): ?>
          <div class="mb-4 p-4 bg-red-100 border border-red-200 text-red-700 rounded-lg dark:bg-red-800/10 dark:border-red-900 dark:text-red-300" role="alert">
             <div class="flex">
              <div class="flex-shrink-0">
                <svg class="flex-shrink-0 size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <circle cx="12" cy="12" r="10"></circle>
                  <path d="m15 9-6 6"></path>
                  <path d="m9 9 6 6"></path>
                </svg>
              </div>
              <div class="ms-3">
                <p class="text-sm"><?php echo $das;?></p>
              </div>
            </div>
          </div>
          <?php endif; ?>

          <?php if ($das = $this->session->flashdata('mass')): ?>
          <div class="mb-4 p-4 bg-red-100 border border-red-200 text-red-700 rounded-lg dark:bg-red-800/10 dark:border-red-900 dark:text-red-300" role="alert">
             <div class="flex">
              <div class="flex-shrink-0">
                <svg class="flex-shrink-0 size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <circle cx="12" cy="12" r="10"></circle>
                  <path d="m15 9-6 6"></path>
                  <path d="m9 9 6 6"></path>
                </svg>
              </div>
              <div class="ms-3">
                <p class="text-sm"><?php echo $das;?></p>
              </div>
            </div>
          </div>
          <?php endif; ?>

          <!-- Form -->
          <?php echo form_open("welcome/signin", ['class' => 'mt-5 grid gap-y-4']); ?>
            <!-- Form Group for Phone Number -->
            <div>
              <label for="comp_phone" class="block text-sm mb-2 dark:text-white">Phone Number</label>
              <div class="relative">
                <input type="tel" id="comp_phone" name="comp_phone" class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg text-sm text-gray-800 focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-gray-500 dark:text-gray-100 dark:placeholder-gray-300 dark:focus:ring-gray-500" required autocomplete="off" placeholder="Enter phone number">
                <?php
                  $comp_phone_error = form_error("comp_phone");
                  if ($comp_phone_error):
                ?>
                <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
                  <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                  </svg>
                </div>
                <?php endif; ?>
              </div>
              <?php if ($comp_phone_error): ?>
                <p class="text-xs text-red-600 mt-2" id="comp_phone-error"><?php echo strip_tags($comp_phone_error); ?></p>
              <?php endif; ?>
            </div>
            <!-- End Form Group -->

            <!-- Form Group for Password -->
            <div>
              <div class="flex flex-wrap justify-between items-center gap-2">
                <label for="password" class="block text-sm dark:text-white">Password</label>
                <a class="inline-flex items-center gap-x-1 text-sm text-cyan-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-cyan-500" href="<?php echo base_url('welcome/employee_forgot_password'); ?>">Reset password</a>
              </div>
              <div class="relative mt-2">
                <input type="password" id="password" name="password" class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg text-sm text-gray-800 focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-gray-500 dark:text-gray-100 dark:placeholder-gray-300 dark:focus:ring-gray-500" required autocomplete="off" placeholder="******">
                <?php
                  $password_error = form_error("password");
                  if ($password_error):
                ?>
                <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
                  <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                  </svg>
                </div>
                <?php endif; ?>
              </div>
               <?php if ($password_error): ?>
                <p class="text-xs text-red-600 mt-2" id="password-error"><?php echo strip_tags($password_error); ?></p>
              <?php endif; ?>
            </div>
            <!-- End Form Group -->

            <!-- Checkbox (from new template, remove if not applicable for Admin login) -->
            <div class="flex items-center">
              <div class="flex">
                <input id="remember-me" name="remember-me" type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded text-cyan-600 focus:ring-cyan-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-cyan-500 dark:checked:border-cyan-500 dark:focus:ring-offset-gray-900">
              </div>
              <div class="ms-3">
                <label for="remember-me" class="text-sm dark:text-white">Remember me</label>
              </div>
            </div>
            <!-- End Checkbox -->

            <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-cyan-600 text-white hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900 disabled:opacity-50 disabled:pointer-events-none">Login</button>
          <?php echo form_close(); ?>
          <!-- End Form -->

          <?php // This version of the login page did NOT have a "Sign up here" link in the original. So, it's omitted here.
                // If you want it, you can add:
          /*
          <p class="mt-6 text-center text-sm text-gray-600 dark:text-gray-400">
            Don't have an account yet?
            <a class="text-cyan-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-cyan-500" href="<?php echo base_url("welcome/register"); ?>">
              Sign up here
            </a>
          </p>
          */
          ?>

        </div>
      </div>
    </div>

  </div> <?php // End centering div ?>

<?php
// Assuming this should be the footer include.
// Please verify the actual filename for your footer partial.
// If it's truly guest_header.php again, that's unusual and might cause issues.
include_once APPPATH . "views/partials/footer.php"; // <<<< ASSUMED FOOTER
?>