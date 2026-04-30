<?php
// application/views/partials/navbar.php
?>
<!-- ========== HEADER ========== -->
<header class="sticky top-0 inset-x-0 flex flex-wrap sm:justify-start sm:flex-nowrap z-30 w-full bg-white border-b border-gray-200 text-sm py-2.5 sm:py-4 lg:ps-64 dark:bg-gray-800 dark:border-gray-700">
  <nav class="flex basis-full items-center w-full mx-auto px-4 sm:px-6" aria-label="Global">
    <div class="me-5 lg:me-0 lg:hidden">
      <!-- Logo for mobile (can be same as desktop) -->
      <a class="flex-none text-xl font-semibold dark:text-white" href="<?php echo base_url("admin/index"); // Link to dashboard/home ?>" aria-label="Brand">
        <img class="h-8 sm:h-10" src="<?php echo base_url('assets/img/logo.png'); // Adjust path and style as needed ?>" alt="Logo">
      </a>
    </div>

    <div class="w-full flex items-center justify-end ms-auto sm:justify-between sm:gap-x-3 sm:order-3">
      <div class="sm:hidden">
        <button type="button" class="p-2 inline-flex justify-center items-center gap-x-2 rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-gray-700 dark:text-white dark:hover:bg-white/10">
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
        </button>
      </div>

      <div class="hidden sm:block">
        <?php // Optional: Search bar - can be added here if needed
        /*
        <label for="icon" class="sr-only">Search</label>
        <div class="relative">
          <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-4">
            <svg class="shrink-0 size-4 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
          </div>
          <input type="text" id="icon" name="icon" class="py-2 px-4 ps-11 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="Search">
        </div>
        */
        ?>
      </div>

      <div class="flex flex-row items-center justify-end gap-2">
        <?php
          $ui_lang = $this->session->userdata('ui_lang') ?: 'english';
          $next_lang = ($ui_lang === 'swahili') ? 'english' : 'swahili';
          $lang_button_label = ($ui_lang === 'swahili') ? 'EN' : 'SW';
        ?>
        <a href="<?php echo base_url('admin/switch_language?lang=' . $next_lang); ?>"
           class="inline-flex items-center justify-center rounded-full border border-gray-200 bg-gray-50 px-3 py-2 text-xs font-semibold text-gray-700 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700"
            title="<?php echo $this->lang->line('switch_language'); ?>">
          <?php echo $lang_button_label; ?>
        </a>

        <?php
          $is_management_user = ((int) $this->session->userdata('position_id') === 22);
          $reset_notifications = [];
          $reset_notification_count = 0;
          if ($is_management_user && !empty($this->session->userdata('comp_id'))) {
              $this->load->model('queries');
              $comp_id = (int) $this->session->userdata('comp_id');
              $reset_notification_count = $this->queries->count_pending_employee_password_reset_notifications($comp_id);
              $reset_notifications = $this->queries->get_pending_employee_password_reset_notifications($comp_id, 10);
          }
        ?>

        <?php if ($is_management_user): ?>
        <div class="hs-dropdown [--placement:bottom-right] relative inline-flex">
          <button id="hs-reset-code-notification" type="button" class="hs-dropdown-toggle relative p-2 inline-flex justify-center items-center gap-x-2 rounded-full border border-gray-200 bg-gray-50 text-gray-700 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700">
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 17h5l-1.4-1.4A2 2 0 0 1 18 14.2V11a6 6 0 1 0-12 0v3.2a2 2 0 0 1-.6 1.4L4 17h5"/><path d="M10 17a2 2 0 1 0 4 0"/></svg>
            <?php if ($reset_notification_count > 0): ?>
            <span class="absolute -top-1 -inset-e-1 inline-flex items-center justify-center min-w-5 h-5 rounded-full bg-red-500 px-1.5 text-[10px] font-bold text-white"><?php echo $reset_notification_count; ?></span>
            <?php endif; ?>
            <span class="sr-only">Reset code notifications</span>
          </button>

          <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-80 max-w-sm bg-white shadow-md rounded-lg p-2 dark:bg-gray-800 dark:border dark:border-gray-700" aria-labelledby="hs-reset-code-notification">
            <div class="py-2 px-3 border-b border-gray-200 dark:border-gray-700">
              <p class="text-sm font-semibold text-gray-800 dark:text-gray-200">Password Reset Tokens</p>
              <p class="text-xs text-gray-500 dark:text-gray-400">Share token with employee to reset password</p>
            </div>

            <div class="max-h-80 overflow-y-auto">
              <?php if (!empty($reset_notifications)): ?>
                <?php foreach ($reset_notifications as $item): ?>
                <div class="py-2 px-3 border-b border-gray-100 dark:border-gray-700/60 last:border-b-0">
                  <p class="text-xs text-gray-500 dark:text-gray-400"><?php echo htmlspecialchars($item->empl_name ?? 'Employee', ENT_QUOTES, 'UTF-8'); ?> (<?php echo htmlspecialchars($item->requested_phone ?? '-', ENT_QUOTES, 'UTF-8'); ?>)</p>
                  <p class="text-sm font-mono font-semibold text-cyan-700 dark:text-cyan-300 tracking-wider"><?php echo htmlspecialchars($item->reset_code_plain ?? '------', ENT_QUOTES, 'UTF-8'); ?></p>
                  <p class="text-xs text-gray-500 dark:text-gray-400">Expires: <?php echo htmlspecialchars($item->expires_at ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
                <?php endforeach; ?>
              <?php else: ?>
                <div class="py-8 px-3 text-center text-sm text-gray-500 dark:text-gray-400">No pending reset token notifications.</div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <?php endif; ?>

        <?php // Theme switcher button (Dark/Light mode) - Preline has examples for this.
              // This logic is already in your new partials/header.php's <script> section.
              // We just need a button to toggle it.
        ?>
        <button id="theme-toggle" type="button" onclick="toggleColorTheme()" class="inline-flex items-center justify-center rounded-full border border-gray-200 bg-gray-50 p-2 text-gray-700 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700">
          <svg id="theme-toggle-dark-icon" class="hidden size-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 116.707 2.707a8.001 8.001 0 0010.586 10.586z"></path></svg>
          <svg id="theme-toggle-light-icon" class="hidden size-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.464 4.05a1 1 0 00-1.414 1.414l.707.707A1 1 0 006.171 4.757l-.707-.707zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"></path></svg>
        </button>

        <button id="pwa-install-btn" type="button" class="hidden items-center justify-center rounded-full border border-cyan-200 bg-cyan-50 p-2 text-cyan-700 hover:bg-cyan-100 dark:border-cyan-700 dark:bg-cyan-800/30 dark:text-cyan-200 dark:hover:bg-cyan-700/40" aria-label="Install app">
          <svg class="size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 16a1 1 0 0 1-.707-.293l-4-4a1 1 0 0 1 1.414-1.414L11 12.586V4a1 1 0 1 1 2 0v8.586l2.293-2.293a1 1 0 0 1 1.414 1.414l-4 4A1 1 0 0 1 12 16z"/><path d="M5 18a1 1 0 0 1 1-1h12a1 1 0 1 1 0 2H6a1 1 0 0 1-1-1z"/></svg>
        </button>


        <!-- Profile Dropdown -->
        <div class="hs-dropdown [--placement:bottom-right] relative inline-flex">
          <button id="hs-dropdown-with-header" type="button" class="hs-dropdown-toggle p-1 inline-flex items-center gap-x-2 text-sm font-semibold rounded-full border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700">
            <?php 
            // Get employee passport from session or database
            $empl_id = $this->session->userdata('empl_id');
            $passport = null;
            
            if ($empl_id) {
                $this->load->model('queries');
                $employee = $this->queries->get_employee_data($empl_id);
                $passport = $employee->passport ?? null;
            }
            
            if (!empty($passport) && file_exists(FCPATH . 'assets/images/passport/' . $passport)): 
            ?>
                <img class="inline-block size-8 rounded-full ring-2 ring-white dark:ring-gray-800 object-cover" 
                     src="<?php echo base_url('assets/images/passport/' . $passport); ?>" 
                     alt="Profile Picture">
            <?php else: ?>
                <div class="inline-flex size-8 rounded-full ring-2 ring-white dark:ring-gray-800 bg-gradient-to-br from-cyan-500 to-blue-600 items-center justify-center">
                    <svg class="size-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM3.465 14.493a1.23 1.23 0 0 0 .41 1.412A9.957 9.957 0 0 0 10 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 0 0-13.074.003Z" />
                    </svg>
                </div>
            <?php endif; ?>
            <span class="hidden md:block text-gray-600 dark:text-gray-400 text-xs font-medium ms-1 me-2">
              <?php echo htmlspecialchars($_SESSION['empl_name'] ?? 'User', ENT_QUOTES, 'UTF-8'); ?>
            </span>
            <svg class="hidden md:block hs-dropdown-open:rotate-180 size-2.5 text-gray-500 dark:text-gray-500" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
          </button>

          <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg p-2 dark:bg-gray-800 dark:border dark:border-gray-700" aria-labelledby="hs-dropdown-with-header">
            <div class="py-3 px-5 -m-2 bg-gray-100 rounded-t-lg dark:bg-gray-700">
              <p class="text-sm text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('signed_in_as'); ?></p>
              <p class="text-sm font-medium text-gray-800 dark:text-gray-300">
                <?php echo htmlspecialchars($_SESSION['empl_name'] ?? 'User', ENT_QUOTES, 'UTF-8'); ?>
              </p>
            </div>
            <div class="mt-2 py-2 first:pt-0 last:pb-0">
              <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-cyan-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="<?php echo base_url("admin/my_profile"); ?>">
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                <?php echo $this->lang->line('my_profile'); ?>
                <span class="ms-auto text-xs text-gray-500 dark:text-gray-500"><?php echo $this->lang->line('user_settings'); ?></span>
              </a>

               <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-cyan-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="<?php echo base_url("admin/company_settings"); ?>">
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                <?php echo $this->lang->line('company_profile'); ?>
                <span class="ms-auto text-xs text-gray-500 dark:text-gray-500"> <?php echo $this->lang->line('company_settings'); ?></span>
              </a>
              <!-- <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-cyan-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="<?php echo base_url("admin/sms_history"); ?>">
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                SMS
                 <span class="ms-auto text-xs text-gray-500 dark:text-gray-500">SMS History</span>
              </a> -->
              <?php // Add other dropdown items here if needed ?>
              <hr class="my-2 border-gray-200 dark:border-gray-700">
              <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-red-600 hover:bg-gray-100 focus:ring-2 focus:ring-cyan-500 dark:text-red-500 dark:hover:bg-gray-700" href="<?php echo base_url("welcome/logout"); ?>">
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
                <?php echo $this->lang->line('sign_out'); ?>
              </a>
            </div>
          </div>
        </div>
        <!-- End Profile Dropdown -->
      </div>
    </div>
  </nav>
</header>
<!-- ========== END HEADER ========== -->

<script>
  (function () {
    var installBtn = document.getElementById('pwa-install-btn');
    if (!installBtn) return;

    var deferredPrompt = null;

    window.addEventListener('beforeinstallprompt', function (e) {
      e.preventDefault();
      deferredPrompt = e;
      installBtn.classList.remove('hidden');
      installBtn.classList.add('inline-flex');
    });

    installBtn.addEventListener('click', function () {
      if (!deferredPrompt) return;
      deferredPrompt.prompt();
      deferredPrompt.userChoice.finally(function () {
        deferredPrompt = null;
        installBtn.classList.add('hidden');
        installBtn.classList.remove('inline-flex');
      });
    });

    window.addEventListener('appinstalled', function () {
      installBtn.classList.add('hidden');
      installBtn.classList.remove('inline-flex');
    });
  })();
</script>