<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login - Payment Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
</head>
<body class="bg-gradient-to-br from-cyan-500 via-blue-500 to-purple-600 min-h-screen flex items-center justify-center p-4">
    
    <div class="w-full max-w-md">
        <!-- Logo/Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 sm:w-20 sm:h-20 bg-white rounded-full shadow-lg mb-4">
                <svg class="w-10 h-10 sm:w-12 sm:h-12 text-cyan-600" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/>
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"/>
                </svg>
            </div>
            <h1 class="text-2xl sm:text-3xl font-bold text-white mb-2">Customer Portal</h1>
            <p class="text-cyan-100 text-sm sm:text-base">Angalia malipo yako ya mkopo na historia yake</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white rounded-2xl shadow-2xl p-6 sm:p-8">
            <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-6 text-center">Karibu Tena</h2>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="mb-4 p-3 sm:p-4 bg-red-50 border-l-4 border-red-500 text-red-700 text-sm rounded">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <span><?= $this->session->flashdata('error'); ?></span>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('massage')): ?>
                <div class="mb-4 p-3 sm:p-4 bg-green-50 border-l-4 border-green-500 text-green-700 text-sm rounded">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span><?= $this->session->flashdata('massage'); ?></span>
                    </div>
                </div>
            <?php endif; ?>

            <?= form_open('customer/login', ['class' => 'space-y-5']); ?>
                
                <!-- Phone Number -->
                <div>
                    <label for="phone_no" class="block text-sm font-medium text-gray-700 mb-2">
                        Nambari ya Simu <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                            </svg>
                        </div>
                        <input type="text" 
                               id="phone_no" 
                               name="phone_no" 
                               placeholder="weka nambari yako ya simu unayotumia kwenye mkopo"
                               required
                               class="pl-10 py-2.5 sm:py-3 px-4 block w-full border-gray-300 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500">
                    </div>
                </div>

                <!-- Customer Code -->
                <div>
                    <label for="customer_code" class="block text-sm font-medium text-gray-700 mb-2">
                        Neno la Siri <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <input type="text" 
                               id="customer_code" 
                               name="customer_code" 
                               placeholder="Weka neno lako la siri"
                               required
                               class="pl-10 py-2.5 sm:py-3 px-4 block w-full border-gray-300 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500">
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Unaweza kupata neno lako la siri kwenye mkataba wako wa mkopo</p>
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full py-2.5 sm:py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-cyan-600 text-white hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                    </svg>
                    Ingia
                </button>
            <?= form_close(); ?>

            <!-- Help Text -->
            <div class="mt-6 pt-6 border-t border-gray-200">
                <p class="text-center text-xs sm:text-sm text-gray-600">
                    Ikiwa una shida kuingia, tafadhali wasiliana na tawi ulilochukua.
                </p>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center mt-6 text-white text-xs sm:text-sm">
            <p>&copy; <?= date('Y'); ?> Loan Management System. Haki zote zimehifadhiwa.</p>
        </div>
    </div>

</body>
</html>
