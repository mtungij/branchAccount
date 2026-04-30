<?php include_once APPPATH . "views/partials/guest_header.php" ?>

<body class="bg-gray-100 dark:bg-gray-800">

  <div class="font-poppins min-h-screen flex flex-col items-center justify-center py-6 px-4 sm:px-6 lg:px-8">
    <?php // This div will center the content on the page ?>

    <div class="mb-6 text-center">
      <h2 class="text-3xl sm:text-4xl font-bold text-gray-800 dark:text-white">
        <span class="text-green-600 dark:text-green-500">MikopoSoft Management</span>
        <span class="text-gray-500 dark:text-gray-400">System</span>
      </h2>
    </div>

    <?php // Main Login Card - derived from your Tailwind template ?>
    <div class="w-full max-w-md">
      <div class="bg-white border border-gray-200 rounded-xl shadow-lg dark:bg-gray-900 dark:border-gray-700">
        <div class="p-4 sm:p-7">
          <div class="text-center">
            <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Sign in</h1>
            <?php /*
              The original template had Admin/Employee links here.
              Let's put them below the "Sign in" title or integrate them where it makes sense.
              Given the "Sign in" title, it's better to clarify which sign-in.
              Or, the user might intend for different login forms entirely.
              For now, let's adapt the provided "Don't have an account yet?" for general registration
              and place the Admin/Employee links more prominently if they lead to different login *types* or areas.
            */ ?>

            <div class="mt-3 mb-4 text-center"> <?php // Added this wrapper for Admin/Employee links ?>
              <a href="<?php echo base_url("welcome/admin_login") ?>" class="inline-flex items-center gap-x-1 text-sm text-cyan-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-cyan-500">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"> <?php // Example SVG for key icon ?>
                  <path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v2.586l-2.293-2.293a1 1 0 00-1.414 1.414L7.586 7H5a1 1 0 000 2h2.586l-2.293 2.293a1 1 0 101.414 1.414L9 10.414V13a1 1 0 102 0v-2.586l2.293 2.293a1 1 0 001.414-1.414L12.414 9H15a1 1 0 100-2h-2.586l2.293-2.293a1 1 0 00-1.414-1.414L11 4.586V3a1 1 0 00-1-1zm0 8a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                </svg>
                <b>Admin Login</b>
              </a>
              <span class="mx-2 text-gray-400 dark:text-gray-500">|</span>
              <a href="<?php echo base_url("welcome/employee_login"); ?>" class="inline-flex items-center gap-x-1 text-sm text-orange-500 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-orange-400">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"> <?php // Example SVG for key icon ?>
                   <path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v2.586l-2.293-2.293a1 1 0 00-1.414 1.414L7.586 7H5a1 1 0 000 2h2.586l-2.293 2.293a1 1 0 101.414 1.414L9 10.414V13a1 1 0 102 0v-2.586l2.293 2.293a1 1 0 001.414-1.414L12.414 9H15a1 1 0 100-2h-2.586l2.293-2.293a1 1 0 00-1.414-1.414L11 4.586V3a1 1 0 00-1-1zm0 8a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                </svg>
                <b>Employee Login</b>
              </a>
            </div>
          </div>

          <?php // Flash Messages - Tailwind styled ?>
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

          <?php if ($das = $this->session->flashdata('mass')): ?>
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
                <p class="text-sm"><?php echo $das;?></p>
              </div>
            </div>
          </div>
          <?php endif; ?>


          <?php // Original template had Google Sign in & "Or" divider. Removed for now to match your old form closely.
                // If you need them, uncomment this section.
          /*
          <div class="mt-5">
            <button type="button" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:bg-gray-800">
              <svg class="w-4 h-auto" width="46" height="47" viewBox="0 0 46 47" fill="none">
                <path d="M46 24.0287C46 22.09 45.8533 20.68 45.5013 19.2112H23.4694V27.9356H36.4069C36.1429 30.1094 34.7347 33.37 31.5957 35.5731L31.5663 35.8669L38.5191 41.2719L38.9885 41.3306C43.4477 37.2181 46 31.1669 46 24.0287Z" fill="#4285F4"/>
                <path d="M23.4694 47C29.8061 47 35.1161 44.9144 39.0179 41.3012L31.625 35.5437C29.6301 36.9244 26.9898 37.8937 23.4987 37.8937C17.2793 37.8937 12.0281 33.7812 10.1505 28.1412L9.88649 28.1706L2.61097 33.7812L2.52296 34.0456C6.36608 41.7125 14.287 47 23.4694 47Z" fill="#34A853"/>
                <path d="M10.1212 28.1413C9.62245 26.6725 9.32908 25.1156 9.32908 23.5C9.32908 21.8844 9.62245 20.3275 10.0918 18.8588V18.5356L2.75765 12.8369L2.52296 12.9544C0.909439 16.1269 0 19.7106 0 23.5C0 27.2894 0.909439 30.8731 2.49362 34.0456L10.1212 28.1413Z" fill="#FBBC05"/>
                <path d="M23.4694 9.07688C27.8699 9.07688 30.8622 10.9863 32.5344 12.5725L39.1645 6.11C35.0867 2.32063 29.8061 0 23.4694 0C14.287 0 6.36607 5.2875 2.49362 12.9544L10.0918 18.8588C11.9987 13.1894 17.25 9.07688 23.4694 9.07688Z" fill="#EB4335"/>
              </svg>
              Sign in with Google
            </button>

            <div class="py-3 flex items-center text-xs text-gray-400 uppercase before:flex-1 before:border-t before:border-gray-200 before:me-6 after:flex-1 after:border-t after:border-gray-200 after:ms-6 dark:text-gray-500 dark:before:border-gray-600 dark:after:border-gray-600">Or</div>
          </div>
          */ ?>

          <!-- Form -->
          <?php // Using space-y-4 for consistent spacing between form elements. ?>
          <?php echo form_open("welcome/signin", ['class' => 'mt-5 grid gap-y-4']); ?>
            <!-- Form Group for Phone Number -->
            <div>
              <label for="comp_phone" class="block text-sm mb-2 dark:text-white">Phone Number</label>
              <div class="relative">
                <?php // Note: type="tel" is semantically better for phone numbers than "number" ?>
                <input type="tel" id="comp_phone" name="comp_phone" class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:placeholder-gray-500 dark:focus:ring-gray-600" required autocomplete="off" placeholder="Enter phone number">
                <?php
                  // Handling form error display from CodeIgniter
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
                <p class="text-xs text-red-600 mt-2" id="comp_phone-error"><?php echo strip_tags($comp_phone_error); // strip_tags to remove CI's default <p> ?></p>
              <?php endif; ?>
            </div>
            <!-- End Form Group -->

            <!-- Form Group for Password -->
            <div>
              <div class="flex flex-wrap justify-between items-center gap-2">
                <label for="password" class="block text-sm dark:text-white">Password</label>
                <?php // Kept "Forgot password?" link from new template.  ?>
                <a class="inline-flex items-center gap-x-1 text-sm text-cyan-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-cyan-500" href="#">Forgot password?</a>
              </div>
              <div class="relative mt-2"> <?php // Added mt-2 to match original label spacing ?>
                <input type="password" id="password" name="password" class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:placeholder-gray-500 dark:focus:ring-gray-600" required autocomplete="off" placeholder="******">
                <?php
                  // Handling form error display from CodeIgniter
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

            <!-- Checkbox - Kept from new template, remove if not needed -->
            <div class="flex items-center">
              <div class="flex">
                <input id="remember-me" name="remember-me" type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded text-cyan-600 focus:ring-cyan-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-cyan-500 dark:checked:border-cyan-500 dark:focus:ring-offset-gray-900">
              </div>
              <div class="ms-3">
                <label for="remember-me" class="text-sm dark:text-white">Remember me</label>
              </div>
            </div>
            <!-- End Checkbox -->

            <?php // Submit button styled like btn-success ?>
            <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-cyan-600 text-white hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900 disabled:opacity-50 disabled:pointer-events-none">Login</button>
          <?php echo form_close(); ?>
          <!-- End Form -->

          <!-- <p class="mt-6 text-center text-sm text-gray-600 dark:text-gray-400">
            Don't have an account yet?
            <a class="text-cyan-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-cyan-500" href="<?php echo base_url("welcome/register"); ?>">
              Sign up here
            </a> -->
          <!-- </p> -->

          

        </div>
      </div>
    </div>


  </div> <?php // End centering div ?>

  <?php // Tawk.to script can remain here if it's global for the site ?>
  <!--Start of Tawk.to Script-->
  <!-- ... your Tawk.to script ... -->
  <!--End of Tawk.to Script-->

  <?php include_once APPPATH . "views/partials/guest_header.php" ?>