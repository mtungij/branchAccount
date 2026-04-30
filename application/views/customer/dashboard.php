
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashibodi ya Mteja - Mikopo Yangu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
</head>
<body class="bg-gray-50">

    <!-- Navigation -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-14 sm:h-16">
                <div class="flex items-center">
                    <svg class="w-8 h-8 sm:w-10 sm:h-10 text-cyan-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/>
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"/>
                    </svg>
                    <span class="ml-2 text-lg sm:text-xl font-bold text-gray-800 hidden sm:block">Portal Ya Wateja</span>
                </div>
                <div class="flex items-center gap-2 sm:gap-4">
                    <span class="text-xs sm:text-sm text-gray-600 truncate max-w-32 sm:max-w-none">
                        <?= $this->session->userdata('customer_name'); ?>
                    </span>
                    <a href="<?= base_url('customer/logout'); ?>" 
                       class="inline-flex items-center px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm font-medium text-red-600 hover:text-red-700 hover:bg-red-50 rounded-lg transition-colors">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        <span class="hidden sm:inline">Logout</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 py-4 sm:py-6 lg:py-8">

        <!-- Success Message -->
        <?php if ($this->session->flashdata('massage')): ?>
            <div class="mb-4 sm:mb-6 p-3 sm:p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-lg">
                <div class="flex items-start">
                    <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-sm sm:text-base"><?= $this->session->flashdata('massage'); ?></span>
                </div>
            </div>
        <?php endif; ?>

        <!-- Customer Info Card -->
        <div class="bg-gradient-to-r from-cyan-600 to-blue-600 rounded-xl sm:rounded-2xl shadow-xl p-4 sm:p-6 lg:p-8 text-white mb-4 sm:mb-6 lg:mb-8">
            <div class="flex flex-col sm:flex-row items-center sm:items-start gap-4 sm:gap-6">
                <div class="flex-shrink-0">
                    <?php if (!empty($customer->passport)): ?>
                        <img src="<?= base_url($customer->passport); ?>" 
                             alt="Profile" 
                             class="w-20 h-20 sm:w-24 sm:h-24 rounded-full border-4 border-white shadow-lg object-cover">
                    <?php else: ?>
                        <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-full border-4 border-white shadow-lg bg-white/20 flex items-center justify-center">
                            <svg class="w-10 h-10 sm:w-12 sm:h-12" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="flex-grow text-center sm:text-left">
                    <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold mb-2">
                        <?= strtoupper($customer->f_name . ' ' . $customer->m_name . ' ' . $customer->l_name); ?>
                    </h1>
                    <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4 text-sm sm:text-base">
                        <span class="flex items-center justify-center sm:justify-start">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                            </svg>
                            <?= $customer->phone_no; ?>
                        </span>
                        <span class="flex items-center justify-center sm:justify-start">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"/>
                            </svg>
                            Code: <?= $customer->code; ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Notifications Section -->
        <?php if (!empty($notifications) && count($notifications) > 0): ?>
            <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg p-4 sm:p-6 lg:p-8 mb-4 sm:mb-6 lg:mb-8">
                <div class="flex justify-between items-center mb-4 sm:mb-6">
                    <h2 class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-800">Arifa</h2>
                    <?php if ($unread_count > 0): ?>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                            <?= $unread_count; ?> Mpya
                        </span>
                    <?php endif; ?>
                </div>

                <div class="space-y-3 sm:space-y-4">
                    <?php foreach ($notifications as $notification): ?>
                        <?php 
                            $type_colors = [
                                'info' => 'border-blue-200 bg-blue-50',
                                'warning' => 'border-yellow-200 bg-yellow-50',
                                'success' => 'border-green-200 bg-green-50',
                                'promotion' => 'border-purple-200 bg-purple-50'
                            ];
                            $badge_colors = [
                                'info' => 'bg-blue-100 text-blue-800',
                                'warning' => 'bg-yellow-100 text-yellow-800',
                                'success' => 'bg-green-100 text-green-800',
                                'promotion' => 'bg-purple-100 text-purple-800'
                            ];
                            $type_labels = [
                                'info' => 'Taarifa',
                                'warning' => 'Onyo',
                                'success' => 'Mafanikio',
                                'promotion' => 'Tangazo'
                            ];
                            $icon_colors = [
                                'info' => 'text-blue-600',
                                'warning' => 'text-yellow-600',
                                'success' => 'text-green-600',
                                'promotion' => 'text-purple-600'
                            ];
                            $type = $notification->notification_type ?? 'info';
                            $is_read = !empty($notification->is_read);
                        ?>
                        <div class="border-l-4 <?= $type_colors[$type]; ?> p-4 rounded-lg transition-all hover:shadow-md <?= $is_read ? 'opacity-75' : ''; ?>" 
                             id="notification-<?= $notification->notification_id; ?>">
                            <div class="flex items-start justify-between gap-3">
                                <div class="flex items-start gap-3 flex-grow">
                                    <!-- Icon -->
                                    <div class="flex-shrink-0 mt-1">
                                        <?php if ($type == 'info'): ?>
                                            <svg class="w-5 h-5 sm:w-6 sm:h-6 <?= $icon_colors[$type]; ?>" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                            </svg>
                                        <?php elseif ($type == 'warning'): ?>
                                            <svg class="w-5 h-5 sm:w-6 sm:h-6 <?= $icon_colors[$type]; ?>" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                            </svg>
                                        <?php elseif ($type == 'success'): ?>
                                            <svg class="w-5 h-5 sm:w-6 sm:h-6 <?= $icon_colors[$type]; ?>" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                        <?php else: ?>
                                            <svg class="w-5 h-5 sm:w-6 sm:h-6 <?= $icon_colors[$type]; ?>" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"/>
                                            </svg>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Content -->
                                    <div class="flex-grow min-w-0">
                                        <div class="flex items-center gap-2 mb-1">
                                            <h3 class="font-semibold text-gray-900 text-sm sm:text-base">
                                                <?= htmlspecialchars($notification->title); ?>
                                            </h3>
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium <?= $badge_colors[$type]; ?>">
                                                <?= $type_labels[$type]; ?>
                                            </span>
                                            <?php if (!$is_read): ?>
                                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                    Mpya
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <p class="text-gray-600 text-xs sm:text-sm mb-2">
                                            <?= nl2br(htmlspecialchars($notification->message)); ?>
                                        </p>
                                        <p class="text-xs text-gray-400">
                                            <?= date('M d, Y h:i A', strtotime($notification->created_at)); ?>
                                        </p>
                                    </div>
                                </div>

                                <!-- Mark as Read Button -->
                                <?php if (!$is_read): ?>
                                    <button onclick="markAsRead(<?= $notification->notification_id; ?>)" 
                                            class="flex-shrink-0 text-xs sm:text-sm text-gray-600 hover:text-gray-900 hover:bg-gray-100 px-2 py-1 rounded transition-colors whitespace-nowrap">
                                        Weka Imesomwa
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Active Loan Summary -->
        <?php if (!empty($active_loan)): ?>
            <?php 
                $loan_amount = $active_loan->loan_int ?? 0;
                $total_deposit = $total_paid->total_Deposit ?? 0;
                $amount_paid = ($total_deposit > $loan_amount) ? $loan_amount : $total_deposit;
                $remaining = max(0, $loan_amount - $total_deposit);
                $progress = ($loan_amount > 0) ? ($amount_paid / $loan_amount) * 100 : 0;
            ?>
            <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg p-4 sm:p-6 lg:p-8 mb-4 sm:mb-6 lg:mb-8">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 sm:mb-6 gap-2">
                    <h2 class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-800">Mkopo wa Sasa Unaoendelea</h2>
                    <!-- <span class="px-3 py-1 text-xs sm:text-sm font-semibold rounded-full <?= $active_loan->loan_status == 'withdrawal' ? 'bg-green-100 text-green-800' : ($active_loan->loan_status == 'done' ? 'bg-blue-100 text-blue-800' : 'bg-yellow-100 text-yellow-800'); ?>">
                        <?= ucfirst($active_loan->loan_status); ?>
                    </span> -->
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 lg:gap-6 mb-4 sm:mb-6">
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-4 rounded-lg">
                        <p class="text-xs sm:text-sm text-blue-600 font-medium mb-1">Kiasi cha Mkopo</p>
                        <p class="text-xl sm:text-2xl font-bold text-blue-900">TZS <?= number_format($loan_amount); ?></p>
                    </div>
                    <div class="bg-gradient-to-br from-green-50 to-green-100 p-4 rounded-lg">
                        <p class="text-xs sm:text-sm text-green-600 font-medium mb-1">Kiasi Kilicholipwa</p>
                        <p class="text-xl sm:text-2xl font-bold text-green-900">TZS <?= number_format($amount_paid); ?></p>
                    </div>
                    <div class="bg-gradient-to-br from-red-50 to-red-100 p-4 rounded-lg">
                        <p class="text-xs sm:text-sm text-red-600 font-medium mb-1">Kilichobaki</p>
                        <p class="text-xl sm:text-2xl font-bold text-red-900">TZS <?= number_format($remaining); ?></p>
                    </div>
                    <!-- <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-4 rounded-lg">
                        <p class="text-xs sm:text-sm text-purple-600 font-medium mb-1">Awamu</p>
                        <p class="text-xl sm:text-2xl font-bold text-purple-900">TZS <?= number_format($active_loan->restration ?? 0); ?></p>
                    </div> -->
                </div>

                <!-- Progress Bar -->
                <div class="mb-4 sm:mb-6">
                    <div class="flex justify-between text-xs sm:text-sm text-gray-600 mb-2">
                        <span>Maendeleo ya Malipo</span>
                        <span class="font-semibold"><?= number_format($progress, 1); ?>%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-3 sm:h-4">
                        <div class="bg-gradient-to-r from-cyan-500 to-blue-500 h-3 sm:h-4 rounded-full transition-all duration-500" 
                             style="width: <?= min(100, $progress); ?>%"></div>
                    </div>
                </div>

                <!-- Loan Dates -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4 text-sm border-t pt-4">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-gray-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <p class="text-gray-500 text-xs">Tarehe ya Kuchukua</p>
                            <p class="font-semibold text-gray-800"><?= $active_loan->loan_stat_date ?? 'BADO HUJAPEWA MKOPO'; ?></p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-gray-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <p class="text-gray-500 text-xs">Tarehe ya Mwisho</p>
                            <p class="font-semibold text-gray-800"><?= !empty($active_loan->loan_end_date) ? substr($active_loan->loan_end_date, 0, 10) : 'BADO HUJAPEWA MKOPO'; ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Loan Progress Tracker -->
            <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg p-4 sm:p-6 lg:p-8 mb-4 sm:mb-6">
                <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-6">Maendeleo ya Mkopo</h3>
                
                <div class="relative">
                    <!-- Progress Line -->
                    <div class="absolute top-5 left-0 w-full h-1 bg-gray-200" style="z-index: 0;">
                        <div class="h-full bg-gradient-to-r from-cyan-500 to-blue-500 transition-all duration-500" 
                             style="width: <?= $active_loan->loan_status == 'open' ? '33%' : ($active_loan->loan_status == 'disburse' ? '66%' : '100%'); ?>"></div>
                    </div>
                    
                    <!-- Steps -->
                    <div class="relative grid grid-cols-3 gap-2" style="z-index: 1;">
                        <!-- Step 1: Open -->
                        <div class="flex flex-col items-center">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center mb-2 <?= $active_loan->loan_status == 'open' || $active_loan->loan_status == 'disburse' || $active_loan->loan_status == 'withdrawal' ? 'bg-gradient-to-r from-cyan-500 to-blue-500 text-white' : 'bg-gray-200 text-gray-500'; ?>">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="text-center">
                                <p class="text-xs sm:text-sm font-semibold <?= $active_loan->loan_status == 'open' ? 'text-cyan-600' : 'text-gray-600'; ?>">
                                    Maombi
                                </p>
                                <p class="text-xs text-gray-500 mt-1">Yametumwa</p>
                            </div>
                        </div>
                        
                        <!-- Step 2: Disbursed -->
                        <div class="flex flex-col items-center">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center mb-2 <?= $active_loan->loan_status == 'disburse' || $active_loan->loan_status == 'withdrawal' ? 'bg-gradient-to-r from-cyan-500 to-blue-500 text-white' : 'bg-gray-200 text-gray-500'; ?>">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="text-center">
                                <p class="text-xs sm:text-sm font-semibold <?= $active_loan->loan_status == 'disburse' ? 'text-cyan-600' : 'text-gray-600'; ?>">
                                    Imeidhinishwa
                                </p>
                                <p class="text-xs text-gray-500 mt-1">Mkopo Umepitishwa</p>
                            </div>
                        </div>
                        
                        <!-- Step 3: Withdrawal -->
                        <div class="flex flex-col items-center">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center mb-2 <?= $active_loan->loan_status == 'withdrawal' ? 'bg-gradient-to-r from-cyan-500 to-blue-500 text-white' : 'bg-gray-200 text-gray-500'; ?>">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/>
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="text-center">
                                <p class="text-xs sm:text-sm font-semibold <?= $active_loan->loan_status == 'withdrawal' ? 'text-cyan-600' : 'text-gray-600'; ?>">
                                    Umetolewa
                                </p>
                                <p class="text-xs text-gray-500 mt-1">Mkopo Umepewa</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Current Status Message -->
                <div class="mt-6 p-4 rounded-lg <?= $active_loan->loan_status == 'open' ? 'bg-yellow-50 border-l-4 border-yellow-400' : ($active_loan->loan_status == 'disburse' ? 'bg-blue-50 border-l-4 border-blue-400' : 'bg-green-50 border-l-4 border-green-400'); ?>">
                    <div class="flex items-start gap-3">
                        <div class="flex-shrink-0 mt-0.5">
                            <?php if ($active_loan->loan_status == 'open'): ?>
                                <svg class="w-5 h-5 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                            <?php elseif ($active_loan->loan_status == 'disburse'): ?>
                                <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            <?php else: ?>
                                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            <?php endif; ?>
                        </div>
                        <div>
                            <h4 class="font-semibold text-sm sm:text-base <?= $active_loan->loan_status == 'open' ? 'text-yellow-900' : ($active_loan->loan_status == 'disburse' ? 'text-blue-900' : 'text-green-900'); ?>">
                                <?php if ($active_loan->loan_status == 'open'): ?>
                                    Maombi ya Mkopo Yametumwa
                                <?php elseif ($active_loan->loan_status == 'disburse'): ?>
                                    Hongera! Mkopo Wako Umeidhinishwa
                                <?php else: ?>
                                    Mkopo Umetolewa - Anza Malipo
                                <?php endif; ?>
                            </h4>
                            <p class="text-xs sm:text-sm mt-1 <?= $active_loan->loan_status == 'open' ? 'text-yellow-700' : ($active_loan->loan_status == 'disburse' ? 'text-blue-700' : 'text-green-700'); ?>">
                                <?php if ($active_loan->loan_status == 'open'): ?>
                                    Maombi yako ya mkopo wa TZS <?= number_format($loan_amount); ?> yamepokewa na yanakagua. Tafadhali subiri majibu kutoka ofisi.
                                <?php elseif ($active_loan->loan_status == 'disburse'): ?>
                                    Mkopo wako wa TZS <?= number_format($loan_amount); ?> umeidhinishwa! Subiri kwa muda mfupi kwa utaratibu wa kutoa fedha.
                                <?php else: ?>
                                    Mkopo wako wa TZS <?= number_format($loan_amount); ?> umetolewa. Angalia historia ya malipo hapa chini.
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <?php if (in_array($active_loan->loan_status, ['withdrawal', 'done', 'out'], true) && !empty($loan_details)): ?>
            <!-- Payment History (Show for active/closed loans) -->
            <div class="bg-white rounded-xl sm:rounded-2xl shadow-xl overflow-hidden border border-gray-200">
                <div class="p-4 sm:p-6 bg-gradient-to-r from-cyan-50 via-blue-50 to-cyan-50 border-b-2 border-cyan-200">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2">
                        <div class="flex items-center gap-3">
                            <div class="bg-cyan-100 p-2 rounded-lg">
                                <svg class="w-6 h-6 text-cyan-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <h3 class="text-lg sm:text-xl font-bold text-gray-800">Historia ya Malipo</h3>
                        </div>
                        <div class="w-full sm:w-auto flex flex-col sm:items-end gap-1">
                            <a href="<?= base_url('customer/print_receipt/' . $active_loan->loan_id); ?>"
                               class="inline-flex w-full sm:w-auto justify-center items-center px-3 py-1.5 sm:px-4 sm:py-2 text-xs sm:text-sm font-medium text-white bg-gradient-to-r from-cyan-600 to-blue-600 hover:from-cyan-700 hover:to-blue-700 rounded-lg shadow-md transition-all duration-200 hover:shadow-lg">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                Pakua Risiti (PDF)
                            </a>
                            <p class="text-[11px] sm:text-xs text-gray-500">Risiti ya malipo yote ya mkopo huu.</p>
                        </div>
                    </div>
                    <p class="mt-3 text-xs sm:text-sm text-gray-600">
                        Rangi: <span class="text-green-700 font-semibold">Kijani</span> = Malipo ndani ya ratiba, 
                        <span class="text-purple-700 font-semibold">Zambarau</span> = Malipo nje ya mkataba, 
                        <span class="text-red-700 font-semibold">Nyekundu</span> = Haijalipwa
                    </p>
                </div>

                <!-- Today's Payment Status Card -->
                <?php 
                    $today = date('Y-m-d');
                    $paid_today = false;
                    $today_amount = 0;
                    if (!empty($loan_details)) {
                        foreach ($loan_details as $payment) {
                            if (date('Y-m-d', strtotime($payment->depost_day)) == $today && $payment->depost > 0) {
                                $paid_today = true;
                                $today_amount = $payment->depost;
                                break;
                            }
                        }
                    }
                ?>
                <div class="px-4 sm:px-6 py-4 border-b border-gray-100">
                    <?php if ($paid_today): ?>
                        <div class="bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 rounded-lg p-4 sm:p-5 shadow-sm">
                            <div class="flex items-center gap-3">
                                <div class="flex-shrink-0">
                                    <svg class="w-8 h-8 sm:w-9 sm:h-9 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="flex-grow">
                                    <h3 class="text-base sm:text-lg font-bold text-green-900 mb-1">Malipo ya leo yamelipwa</h3>
                                    <p class="text-sm sm:text-base text-green-700">
                                        Kiasi kilicholipwa leo: <span class="font-bold">TZS <?= number_format($today_amount, 2); ?></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="bg-gradient-to-r from-orange-50 to-red-50 border-l-4 border-orange-500 rounded-lg p-4 sm:p-5 shadow-sm">
                            <div class="flex items-center gap-3">
                                <div class="flex-shrink-0">
                                    <svg class="w-8 h-8 sm:w-9 sm:h-9 text-orange-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="flex-grow">
                                    <h3 class="text-base sm:text-lg font-bold text-orange-900 mb-1">Malipo ya leo hayajapokelewa</h3>
                                    <p class="text-sm sm:text-base text-orange-700">
                                        Bado hakuna malipo yaliyoingizwa kwa leo.
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gradient-to-r from-gray-100 to-gray-50">
                            <tr>
                                <th class="px-3 py-3 sm:px-6 sm:py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider border-b-2 border-cyan-200">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-cyan-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                        </svg>
                                        Tarehe
                                    </div>
                                </th>
                                <th class="px-3 py-3 sm:px-6 sm:py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider hidden sm:table-cell border-b-2 border-cyan-200">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-cyan-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                        </svg>
                                        Maelezo
                                    </div>
                                </th>
                                <th class="px-3 py-3 sm:px-6 sm:py-4 text-right text-xs font-bold text-gray-700 uppercase tracking-wider border-b-2 border-cyan-200">
                                    <div class="flex items-center justify-end gap-2">
                                        <svg class="w-4 h-4 text-cyan-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/>
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"/>
                                        </svg>
                                        Malipo
                                    </div>
                                </th>
      
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            <?php if (!empty($loan_details)): ?>
                                <?php 
                                    $row_number = 0;
                                ?>
                                <?php foreach ($loan_details as $payment): ?>
                                    <?php 
                                        $row_number++;
                                        $is_missed = isset($payment->is_missed) && $payment->is_missed;
                                    $is_outside_contract = isset($payment->is_outside_contract) && $payment->is_outside_contract;
                                    $row_bg = $row_number % 2 == 0 ? 'bg-gray-50' : 'bg-white';
                                    
                                    if ($is_outside_contract) {
                                        $row_class = 'bg-purple-50 hover:bg-purple-100 border-l-4 border-purple-400';
                                    } elseif ($is_missed) {
                                        $row_class = 'bg-red-50 hover:bg-red-100 border-l-4 border-red-400';
                                    } else {
                                        $row_class = $row_bg . ' hover:bg-cyan-50 border-l-4 border-transparent hover:border-cyan-300';
                                    }
                                ?>
                                    <tr class="<?= $row_class; ?> transition-all duration-200">
                                        <td class="px-3 py-3 sm:px-6 sm:py-4 whitespace-nowrap text-xs sm:text-sm <?= $is_outside_contract ? 'text-purple-700 font-semibold' : ($is_missed ? 'text-red-700 font-semibold' : 'text-gray-900 font-medium'); ?>">
                                            <div class="flex items-center gap-2">
                                                <?php if ($is_outside_contract): ?>
                                                    <svg class="w-4 h-4 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                                    </svg>
                                                <?php elseif ($is_missed): ?>
                                                    <svg class="w-4 h-4 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                                    </svg>
                                                <?php else: ?>
                                                    <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                    </svg>
                                                <?php endif; ?>
                                                <?= date('d/m/Y', strtotime($payment->depost_day)); ?>
                                            </div>
                                        </td>
                                        <td class="px-3 py-3 sm:px-6 sm:py-4 text-xs sm:text-sm hidden sm:table-cell">
                                            <div class="max-w-xs lg:max-w-md <?= $is_outside_contract ? 'text-purple-700 font-semibold' : ($is_missed ? 'text-red-700 font-semibold' : 'text-gray-700'); ?>">
                                                <?php if ($is_outside_contract): ?>
                                                    <span class="inline-flex items-center px-2 py-1 rounded-md bg-purple-100 text-purple-800 text-xs font-medium">
                                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                                        </svg>
                                                        Malipo Nje ya Mkataba
                                                    </span>
                                                <?php elseif ($is_missed): ?>
                                                    <span class="inline-flex items-center px-2 py-1 rounded-md bg-red-100 text-red-800 text-xs font-medium">
                                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                                        </svg>
                                                        Haijalipwa (Imechelewa)
                                                    </span>
                                                <?php else: ?>
                                                    <span class="inline-flex items-center px-2 py-1 rounded-md bg-green-100 text-green-800 text-xs font-medium mr-2">
                                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                        </svg>
                                                        Ndani ya Ratiba
                                                    </span>
                                                    <?php if (!empty($payment->account_name)): ?>
                                                        <?= $payment->account_name; ?>
                                                    <?php else: ?>
                                                        <?php 
                                                            $desc = $payment->description ?? 'MALIPO';
                                                            echo ($desc == 'Malipo' || $desc == 'MALIPO') ? 'CASH' : strtoupper($desc);
                                                        ?>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                        <td class="px-3 py-3 sm:px-6 sm:py-4 whitespace-nowrap text-right text-xs sm:text-sm">
                                            <?php if ($payment->depost > 0): ?>
                                                <div class="inline-flex items-center gap-2">
                                                    <span class="font-bold <?= $is_outside_contract ? 'text-purple-600 text-base' : 'text-green-600 text-base'; ?>">TZS <?= number_format($payment->depost, 2); ?></span>
                                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium <?= $is_outside_contract ? 'bg-purple-100 text-purple-800' : 'bg-green-100 text-green-800'; ?>">
                                                        <?= $is_outside_contract ? 'Nje ya Mkataba' : 'Imelipwa'; ?>
                                                    </span>
                                                </div>
                                            <?php else: ?>
                                                <div class="inline-flex items-center gap-2">
                                                    <span class="font-bold <?= $is_missed ? 'text-red-600 text-base' : 'text-gray-400'; ?>">
                                                        <?= $is_missed ? 'TZS 0.00' : '0.00'; ?>
                                                    </span>
                                                    <?php if ($is_missed): ?>
                                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                            Haijalipwa
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                       
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="px-3 py-6 sm:px-6 sm:py-8 text-center text-sm text-gray-500">
                                        Hakuna rekodi za malipo
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php endif; ?>
        <?php else: ?>
            <!-- No Active Loan -->
            <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg p-8 sm:p-12 text-center">
                <svg class="w-16 h-16 sm:w-20 sm:h-20 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <h3 class="text-lg sm:text-xl font-semibold text-gray-700 mb-2">Hakuna Mkopo wa Sasa</h3>
                <p class="text-sm sm:text-base text-gray-500">Huna mkopo wa sasa unaoendelea. Wasiliana na tawi lako kwa maelezo zaidi.</p>
            </div>
        <?php endif; ?>

        <!-- All Loans History (if available) -->
        <?php if (!empty($all_loans) && count($all_loans) > 1): ?>
            <div class="mt-6 sm:mt-8 bg-white rounded-xl sm:rounded-2xl shadow-lg p-4 sm:p-6">
                <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-4">Historia ya Mikopo</h3>
                <div class="space-y-3">
                    <?php foreach ($all_loans as $loan): ?>
                        <?php if ($loan->loan_id != $active_loan->loan_id): ?>
                            <?php 
                                $loan_status_hist = strtolower(trim($loan->loan_status ?? ''));
                                $return_date = !empty($loan->return_date) ? date('Y-m-d', strtotime($loan->return_date)) : null;
                                $end_date = !empty($loan->loan_end_date) ? date('Y-m-d', strtotime($loan->loan_end_date)) : null;
                                $completed_within = ($loan_status_hist == 'done' && $return_date && $end_date && $return_date <= $end_date);
                                $completed_outside = ($loan_status_hist == 'done' && $return_date && $end_date && $return_date > $end_date);
                            ?>
                            <div class="border border-gray-200 rounded-lg p-3 sm:p-4 hover:border-cyan-300 hover:shadow-md transition-all">
                                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2">
                                    <div>
                                        <p class="text-xs sm:text-sm text-gray-500">Kiasi cha Mkopo</p>
                                        <p class="text-base sm:text-lg font-bold text-gray-900">TZS <?= number_format($loan->loan_int); ?></p>
                                    </div>
                                    <div class="text-left sm:text-right">
                                        <p class="text-xs text-gray-500"><?= $loan->loan_stat_date; ?></p>
                                        <span class="inline-block mt-1 px-2 py-1 text-xs font-semibold rounded-full <?= $loan->loan_status == 'done' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800'; ?>">
                                            <!-- <?= ucfirst($loan->loan_status); ?> -->
                                        </span>
                                        <?php if ($completed_within): ?>
                                            <span class="inline-block mt-1 px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                                Imekamilika Ndani ya Mkataba
                                            </span>
                                        <?php elseif ($completed_outside): ?>
                                            <span class="inline-block mt-1 px-2 py-1 text-xs font-semibold rounded-full bg-purple-100 text-purple-800">
                                                Imekamilika Nje ya Mkataba
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

    </div>

    <!-- Footer -->
    <footer class="bg-white border-t mt-8 sm:mt-12 py-4 sm:py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-xs sm:text-sm text-gray-600">
            <p>&copy; <?= date('Y'); ?> Mfumo wa Usimamizi wa Mikopo. Haki zote zimehifadhiwa.</p>
        </div>
    </footer>

    <script>
        // Mark notification as read
        function markAsRead(notificationId) {
            fetch('<?= base_url("customer/mark_notification_read/"); ?>' + notificationId, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Add fade out animation
                    const notificationEl = document.getElementById('notification-' + notificationId);
                    notificationEl.style.transition = 'opacity 0.3s ease';
                    notificationEl.style.opacity = '0.5';
                    
                    // Update the notification to show it's read
                    setTimeout(() => {
                        const newBadge = notificationEl.querySelector('.bg-red-100.text-red-800');
                        if (newBadge) {
                            newBadge.remove();
                        }
                        const markButton = notificationEl.querySelector('button');
                        if (markButton) {
                            markButton.remove();
                        }
                        notificationEl.classList.add('opacity-75');
                        notificationEl.style.opacity = '';
                        
                        // Update unread count badge
                        const unreadBadge = document.querySelector('.bg-red-100.text-red-800');
                        if (unreadBadge && unreadBadge.textContent.includes('New')) {
                            const currentCount = parseInt(unreadBadge.textContent.match(/\d+/)[0]);
                            if (currentCount > 1) {
                                unreadBadge.textContent = (currentCount - 1) + ' New';
                            } else {
                                unreadBadge.remove();
                            }
                        }
                    }, 300);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Imeshindwa kuweka arifa kama imesomwa. Tafadhali jaribu tena.');
            });
        }
    </script>

</body>
</html>
