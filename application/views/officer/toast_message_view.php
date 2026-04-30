<!DOCTYPE html>
<html lang="sw">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Angalizo</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="//unpkg.com/alpinejs" defer></script>
  <script>
    tailwind.config = {
      darkMode: 'class'
    }
  </script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 min-h-screen flex items-center justify-center">

  <!-- Modal -->
  <div x-data="{ open: true }" x-show="open"
       class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
       x-transition:enter="transition ease-out duration-300"
       x-transition:enter-start="opacity-0"
       x-transition:enter-end="opacity-100"
       x-transition:leave="transition ease-in duration-200"
       x-transition:leave-start="opacity-100"
       x-transition:leave-end="opacity-0">

    <!-- Card -->
    <div x-show="open"
         x-transition:enter="transition ease-out duration-500 transform"
         x-transition:enter-start="opacity-0 scale-90 -translate-y-4"
         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
         x-transition:leave="transition ease-in duration-400 transform"
         x-transition:leave-start="opacity-100 scale-100 translate-y-0"
         x-transition:leave-end="opacity-0 scale-90 -translate-y-4"
         class="
        rounded-2xl shadow-2xl max-w-md w-full p-8 relative text-white 
        md:p-10
        <?php if ($type == 'penalty'): ?>
          bg-gradient-to-br from-red-600 via-red-500 to-pink-600 dark:from-red-800 dark:via-red-700 dark:to-pink-800
        <?php elseif ($type == 'loan'): ?>
          bg-gradient-to-br from-yellow-500 via-amber-500 to-orange-600 dark:from-yellow-700 dark:via-amber-600 dark:to-orange-700
        <?php else: ?>
          bg-gradient-to-br from-blue-600 via-indigo-500 to-purple-600 dark:from-blue-800 dark:via-indigo-700 dark:to-purple-800
        <?php endif; ?>
      ">

      <!-- Close button -->
   
      <!-- Icon -->
      <div class="flex justify-center mb-5">
        <?php if ($type == 'penalty'): ?>
          <div class="bg-white/20 dark:bg-white/10 rounded-full p-5 shadow-inner text-3xl">⚠️</div>
        <?php elseif ($type == 'loan'): ?>
          <div class="bg-white/20 dark:bg-white/10 rounded-full p-5 shadow-inner text-3xl">⏳</div>
        <?php else: ?>
          <div class="bg-white/20 dark:bg-white/10 rounded-full p-5 shadow-inner text-3xl">ℹ️</div>
        <?php endif; ?>
      </div>

      <!-- Title -->
      <h2 class="text-2xl md:text-3xl font-bold text-center mb-3 tracking-wide">
        <?php if ($type == 'penalty'): ?>
          🚨 Angalizo la Faini
        <?php elseif ($type == 'loan'): ?>
          ⏰ Angalizo la Mkopo
        <?php else: ?>
          📢 Taarifa
        <?php endif; ?>
      </h2>

      <!-- Message -->
      <p class="text-center text-lg md:text-xl leading-relaxed mb-8">
        <?= $message ?>
      </p>

      <!-- Button -->
      <div class="flex justify-center">
        <a href="<?= base_url('oficer/loan_application'); ?>"
           class="bg-white text-gray-900 font-semibold py-2.5 px-8 rounded-full shadow-lg 
                  transition transform hover:scale-105 dark:bg-gray-800 dark:text-white">
          🔙 Rudi
        </a>
      </div>
    </div>
  </div>

</body>
</html>
