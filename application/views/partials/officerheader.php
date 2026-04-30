<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Comprehensive overview with charts, tables, and a streamlined dashboard layout for easy data visualization and analysis.">

  <title>Loan-Pocket</title>




<link rel="manifest" href="/manifest.json?v=2">
<link rel="apple-touch-icon" href="/assets/img/logo-192.png">
<meta name="theme-color" content="#0d6efd">



<button id="install-btn" onclick="promptInstall()" style="display:none; position:fixed; bottom:20px; right:20px; padding:10px 20px; background:#0d6efd; color:white; border:none; border-radius:5px;">
  Install App
</button>

<script>
if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('/sw.js')
        .then(() => console.log('Service Worker Registered'))
        .catch(err => console.log('SW Error: ', err));
}

// Optional: Listen for beforeinstallprompt to trigger install manually
let deferredPrompt;
window.addEventListener('beforeinstallprompt', (e) => {
    e.preventDefault();
    deferredPrompt = e;
    // Example: show a button to install
    // document.getElementById('install-btn').style.display = 'block';
});

function promptInstall() {
    if (deferredPrompt) {
        deferredPrompt.prompt();
        deferredPrompt.userChoice.then(choice => {
            deferredPrompt = null;
        });
    }
}
</script>


  <script>
    function getThemeFromCookie() {
      var match = document.cookie.match(/(?:^|; )color-theme=(dark|light)(?:;|$)/);
      return match ? match[1] : null;
    }

    function getSavedTheme() {
      try {
        var lsTheme = localStorage.getItem('color-theme');
        if (lsTheme === 'dark' || lsTheme === 'light') return lsTheme;
      } catch (e) {}

      var cookieTheme = getThemeFromCookie();
      if (cookieTheme === 'dark' || cookieTheme === 'light') return cookieTheme;
      return null;
    }

    function saveTheme(theme) {
      try {
        localStorage.setItem('color-theme', theme);
      } catch (e) {}
      document.cookie = 'color-theme=' + theme + '; path=/; max-age=31536000; SameSite=Lax';
    }

    (function () {
      var savedTheme = getSavedTheme();
      if (savedTheme === 'dark') {
        document.documentElement.classList.add('dark');
      } else if (savedTheme === 'light') {
        document.documentElement.classList.remove('dark');
      } else if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
        document.documentElement.classList.add('dark');
      } else {
        document.documentElement.classList.remove('dark');
      }
    })();

    // Global theme toggle helpers for all pages that use this header.
    function syncThemeToggleIcons() {
      var darkIcon = document.getElementById('theme-toggle-dark-icon');
      var lightIcon = document.getElementById('theme-toggle-light-icon');
      if (!darkIcon || !lightIcon) return;

      if (document.documentElement.classList.contains('dark')) {
        lightIcon.classList.remove('hidden');
        darkIcon.classList.add('hidden');
      } else {
        darkIcon.classList.remove('hidden');
        lightIcon.classList.add('hidden');
      }
    }

    function toggleColorTheme() {
      if (document.documentElement.classList.contains('dark')) {
        document.documentElement.classList.remove('dark');
        saveTheme('light');
      } else {
        document.documentElement.classList.add('dark');
        saveTheme('dark');
      }
      syncThemeToggleIcons();
    }

    document.addEventListener('DOMContentLoaded', function() {
      syncThemeToggleIcons();
    });
  </script>
 


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts/dist/apexcharts.css">
  <style type="text/css">
    .apexcharts-tooltip.apexcharts-theme-light
    {
      background-color: transparent !important;
      border: none !important;
      box-shadow: none !important;
    }
    
  </style>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>

  <link rel="stylesheet" href="<?php echo base_url('public/css/output.css?v=' . @filemtime(FCPATH . 'public/css/output.css')); ?>">
</head>

<body class="bg-gray-50 dark:bg-gray-900 font-poppins">
<script src="https://cdn.jsdelivr.net/npm/preline/dist/preline.js"></script>
  
  <?php include_once APPPATH . 'views/partials/navbarofficer.php'; ?> 


  <div class="sticky top-0 inset-x-0 z-20 bg-white border-y border-gray-200 px-4 sm:px-6 lg:px-8 lg:hidden dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center py-2">
   
      <button type="button" class="size-8 flex justify-center items-center gap-x-2 border border-gray-200 text-gray-800 hover:text-gray-500 rounded-lg focus:outline-hidden focus:text-gray-500 disabled:opacity-50 disabled:pointer-events-none dark:border-gray-700 dark:text-gray-200 dark:hover:text-gray-500 dark:focus:text-gray-500" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-application-sidebar" aria-label="Toggle navigation" data-hs-overlay="#hs-application-sidebar">
        <span class="sr-only">Toggle Navigation</span>
        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <rect width="18" height="18" x="3" y="3" rx="2" />
          <path d="M15 3v18" />
          <path d="m8 9 3 3-3 3" />
        </svg>
      </button>
    
      <ol class="ms-3 flex items-center whitespace-nowrap">
        <li class="flex items-center text-sm text-gray-800 dark:text-gray-400">
          Application Layout
          <svg class="shrink-0 mx-3 overflow-visible size-2.5 text-gray-400 dark:text-gray-500" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
          </svg>
        </li>
        <li class="text-sm font-semibold text-gray-800 truncate dark:text-gray-400" aria-current="page">
          Dashboard
        </li>
      </ol>
   
    </div>
  </div>


 <?php include_once APPPATH . 'views/partials/sideofficer.php'; ?>
