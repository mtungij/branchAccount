<?php
include_once APPPATH . "views/partials/officerheader.php";
?>
<div class="w-full lg:ps-64 p-2 sm:p-6 space-y-6">

<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
    <div class="w-full">

        <div class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg overflow-hidden">

            <div class="flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0 md:space-x-4 p-4">
                <div id="tab-profile" class="tab-content w-full dark:bg-gray-800 rounded shadow-xl overflow-hidden">
                    <div class="h-36 sm:h-40 bg-gradient-to-r from-cyan-500 to-blue-500"></div>
                    <div class="px-5 py-3 flex flex-col sm:flex-row sm:items-center gap-3 pb-6">
                        <div class="h-24 w-24 sm:h-28 sm:w-28 shadow-md rounded-full border-4 overflow-hidden border-white -mt-14">
                            <img class="w-full h-full object-cover" src="<?= base_url('assets/img/customer21.png') ?>" alt="Customer Image">
                        </div>
                        <div class="flex-1">
                            <h3 class="uppercase text-lg sm:text-xl font-bold text-slate-900 dark:text-white"><?= $customer->f_name ." ". $customer->m_name ." ". $customer->l_name?></h3>
                            <p class="text-sm sm:text-base text-gray-600 dark:text-gray-300"><?= $customer->phone_no?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table wrapper for horizontal scroll on mobile -->
            <div class="overflow-x-auto">
                <table id="shareholder_table" class="min-w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-cyan-500 uppercase bg-gray-50 dark:bg-cyan-500 dark:text-gray-50">
                        <tr class="font-bold text-gray-900 dark:text-white bg-gray-100 dark:bg-gray-700">
                            <th class="px-4 py-3">Idadi ya marejesho</th>
                            <th class="px-4 py-3">Tarehe</th>
                            <th class="px-4 py-3">Rejesho</th>
                            <th class="px-4 py-3">Lipwa</th>
                            <th class="px-4 py-3">Faini</th>
                            <th class="px-4 py-3">Salio La Mkopo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $loan = $customer_report[0];
                        $startDate = new DateTime($loan->loan_stat_date);
                        $startDate->modify('+1 day');
                        $intervalSpec = $loan->day == 7 ? 'P1W' : ($loan->day >= 30 ? 'P1M' : 'P1D');
                        $interval = new DateInterval($intervalSpec);
                        $dates = []; $currentDate = clone $startDate;
                        for ($i = 0; $i < $loan->session; $i++) { $dates[] = clone $currentDate; $currentDate->add($interval); }
                        $payments = []; foreach ($customer_report as $r) { if (!empty($r->depost_day)) { $payments[date('Y-m-d', strtotime($r->depost_day))] = $r->depost; } }
                        $balance = $loan->loan_int; $i=1;
                        ?>
                        <?php foreach ($dates as $date): 
                            $d = $date->format('Y-m-d');
                            $paid = $payments[$d] ?? 0;
                            $balance -= $paid;
                        ?>
                        <tr class="font-medium text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-700">
                            <td class="px-3 py-2 whitespace-nowrap"><?= $i++; ?></td>
                            <td class="px-3 py-2 whitespace-nowrap"><?= $date->format('d-m-Y'); ?></td>
                            <td class="px-3 py-2 whitespace-nowrap"><?= $loan->restration?></td>
                            <td class="px-3 py-2 whitespace-nowrap"><?= number_format($paid); ?></td>
                            <td class="px-3 py-2 whitespace-nowrap"><?= !empty($loan->penart_amount) ? number_format($loan->penart_amount) : 0; ?></td>
                            <td class="px-3 py-2 whitespace-nowrap"><?= number_format($balance); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</section>
</div>

<?php
include_once APPPATH . "views/partials/footer.php";
?>
