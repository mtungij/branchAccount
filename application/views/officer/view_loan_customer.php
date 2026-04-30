

<?php
include_once APPPATH . "views/partials/officerheader.php";
?>

<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-6">

        <?php if ($das = $this->session->flashdata('massage')): ?>
        <div class="bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert">
            <div class="flex">
                <div class="flex-shrink-0"><span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-teal-100 bg-teal-200 text-teal-800 dark:border-teal-900 dark:bg-teal-800 dark:text-teal-500"><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="m9 12 2 2 4-4"></path></svg></span></div>
                <div class="ms-3"><h3 class="text-gray-800 font-semibold dark:text-white">Success</h3><p class="mt-2 text-sm text-gray-700 dark:text-gray-400"><?php echo $das;?></p></div>
                <div class="ps-3 ms-auto"><button type="button" class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-teal-50 focus:ring-teal-600 dark:bg-transparent dark:hover:bg-teal-800/50 dark:text-teal-600" data-hs-remove-element="[role=alert]"><span class="sr-only">Dismiss</span><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg></button></div>
            </div>
        </div>
        <?php endif; ?>

        <div class="bg-gray-100">
    <div class="w-full bg-cyan-600 text-white">
        <div class="flex flex-col max-w-screen-xl px-4 mx-auto md:flex-row md:justify-between md:px-6 lg:px-8">
            <div class="p-4 flex flex-row items-center justify-between">
                <a href="#" class="text-lg font-semibold tracking-widest uppercase rounded-lg focus:outline-none focus:shadow-outline">
                    Loan Application Form
                </a>
            </div>
        </div>
    </div>
</div>


    <div class="container mx-auto my-3 p-4">
    <div class="md:flex justify-between md:-mx-2">

        <!-- Customer Card (LEFT) -->
        <div class="w-full md:w-3/12 md:mx-2">
            <div class="bg-white p-3 border-t-4 border-green-400">
                <?php foreach ($customer_data as $customer_profiles): ?>
                    <div class="image overflow-hidden">
                        <?php
                            $customer_image = !empty($customer_profiles->passport)
                                ? base_url($customer_profiles->passport)
                                : base_url('assets/img/customer21.png');
                        ?>
                        <img class="h-56 w-full object-cover rounded-md mx-auto" src="<?= $customer_image; ?>" alt="Customer Image">

                        <h1 class="text-green-500 font-bold text-xl text-center my-1">
                            <?= strtoupper($customer_profiles->f_name) . " " . strtoupper(substr($customer_profiles->m_name, 0, 1)) . " " . strtoupper($customer_profiles->l_name) ?>
                        </h1>

                        <h1 class="text-center font-semibold">
                            <?= $customer_profiles->phone_no; ?>
                        </h1>

                        <ul class="bg-gray-100 py-2 px-3 mt-3 rounded shadow-sm">
                            <li class="flex justify-between py-2">
                                <span>Status</span>
                                <span class="bg-green-500 px-2 text-white text-sm rounded">Loan Processing</span>
                            </li>
                            <li class="flex justify-between py-2">
                                <span>Member since</span>
                                <span><?= date('Y-m-d', strtotime($customer_profiles->customer_day)); ?></span>
                            </li>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Sponsor Card (RIGHT) -->
        <div class="w-full md:w-3/12 md:mx-2">
            <div class="bg-white p-3 border-t-4 border-cyan-400">
                <?php foreach ($sponser_detail as $data): ?>
                    <div class="image overflow-hidden">
                        <?php
                            $sponser_image = !empty($data->passport_path)
                                ? base_url($data->passport_path)
                                : base_url('assets/img/customer21.png');
                        ?>
                        <img class="h-56 w-full object-cover rounded-md mx-auto" src="<?= $sponser_image; ?>" alt="Sponsor Image">

                        <h1 class="text-green-500 font-bold text-xl text-center my-1">
                            <?= strtoupper($data->sp_name) . " " . strtoupper(substr($data->sp_mname, 0, 1)) . " " . strtoupper($data->sp_lname) ?>
                        </h1>

                        <h1 class="text-center font-semibold">
                            <?= $data->sp_phone_no; ?>
                        </h1>

                        <ul class="bg-gray-100 py-2 px-3 mt-3 rounded shadow-sm">
                            <li class="flex justify-between py-2">
                                <span>Uhusiano</span>
                                <span class="bg-green-500 px-2 text-white text-sm rounded"><?= ucfirst($data->sp_relation); ?></span>
                            </li>
                            <li class="flex justify-between py-2">
                                <span>Biashara Ya Mkopaji</span>
                                <span><?= ucfirst($data->nature); ?></span>
                            </li>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</div>


<div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
			<div class="bg-gray-100">
    <div class="w-full bg-cyan-600 text-white">
        <div class="flex flex-col max-w-screen-xl px-4 mx-auto md:flex-row md:justify-between md:px-6 lg:px-8">
            <div class="p-2 flex flex-row items-center justify-between">
                <a href="#" class="text-lg font-semibold tracking-widest uppercase rounded-lg focus:outline-none focus:shadow-outline">
				Taarifa Za Mdhamini Wa Mkopo
                </a>
            </div>
        </div>
    </div>
</div>

            <div class="p-4">
              
                <div class="overflow-x-auto">
                    <div class="min-w-full inline-block align-middle">
                        <div class="border rounded-lg overflow-hidden dark:border-gray-700">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" >
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="py-3 px-6 text-start"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">S/No.</span></div></th>
                                        <th scope="col" class="py-3 px-6 text-start"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Jina La Mdhamini</span><svg class="size-3.5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path class="hs-datatable-ordering-desc:text-cyan-600 dark:hs-datatable-ordering-desc:text-cyan-500" d="m7 15 5 5 5-5"></path><path class="hs-datatable-ordering-asc:text-cyan-600 dark:hs-datatable-ordering-asc:text-cyan-500" d="m7 9 5-5 5 5"></path></svg></div></th>
                                        <th scope="col" class="py-3 px-6 text-start"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Namba Ya Simu</span><svg class="size-3.5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path class="hs-datatable-ordering-desc:text-cyan-600 dark:hs-datatable-ordering-desc:text-cyan-500" d="m7 15 5 5 5-5"></path><path class="hs-datatable-ordering-asc:text-cyan-600 dark:hs-datatable-ordering-asc:text-cyan-500" d="m7 9 5-5 5 5"></path></svg></div></th>
                                        <th scope="col" class="py-3 px-6 text-start"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Uhusiano Na Mkopaji</span><svg class="size-3.5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path class="hs-datatable-ordering-desc:text-cyan-600 dark:hs-datatable-ordering-desc:text-cyan-500" d="m7 15 5 5 5-5"></path><path class="hs-datatable-ordering-asc:text-cyan-600 dark:hs-datatable-ordering-asc:text-cyan-500" d="m7 9 5-5 5 5"></path></svg></div></th>
                                        <th scope="col" class="py-3 px-6 text-start --exclude-from-ordering"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Biashara/Kazi Ya Mdhamini</span></div></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
								
								     <?php $no = 1; ?>
                                    <?php if (isset($sponser_detail) && is_array($sponser_detail) && !empty($sponser_detail)): ?>
                                        <?php foreach ($sponser_detail as $sponser_details): ?>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200"><?php echo $no++; ?>.</td>
											<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo htmlspecialchars($sponser_details->sp_name, ENT_QUOTES, 'UTF-8'); ?> <?php echo htmlspecialchars($sponser_details->sp_mname, ENT_QUOTES, 'UTF-8'); ?> <?php echo htmlspecialchars($sponser_details->sp_lname, ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo htmlspecialchars($sponser_details->sp_phone_no, ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo htmlspecialchars($sponser_details->sp_relation, ENT_QUOTES, 'UTF-8'); ?></td>
											<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo ucfirst(htmlspecialchars($sponser_details->nature, ENT_QUOTES, 'UTF-8')); ?></td>

                                        </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

				
            </div>
			
        </div>
		<div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
		<div class="w-full bg-cyan-600 text-white">
        <div class="flex flex-col max-w-screen-xl px-4 mx-auto md:flex-row md:justify-between md:px-6 lg:px-8">
            <div class="p-2 flex flex-row items-center justify-between">
                <a href="#" class="text-lg font-semibold tracking-widest uppercase rounded-lg focus:outline-none focus:shadow-outline">
				Taarifa Za Dhamana Za Mkopo
                </a>
            </div>
        </div>
    </div>
			

            <div class="p-4">
              
                <div class="overflow-x-auto">
                    <div class="min-w-full inline-block align-middle">
                        <div class="border rounded-lg overflow-hidden dark:border-gray-700">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" >
    <thead class="bg-gray-50 dark:bg-gray-700">
        <tr>
            <th class="py-3 px-6 text-start">
                <div class="inline-flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">S/No.</span>
                </div>
            </th>
            <th class="py-3 px-6 text-start">
                <div class="inline-flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Jina La Dhamana</span>
                    <!-- Sorting icon -->
                    <svg class="size-3.5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="m7 15 5 5 5-5" />
                        <path d="m7 9 5-5 5 5" />
                    </svg>
                </div>
            </th>
            <th class="py-3 px-6 text-start">
                <div class="inline-flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Hali ya Dhamana</span>
                    <svg class="size-3.5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="m7 15 5 5 5-5" />
                        <path d="m7 9 5-5 5 5" />
                    </svg>
                </div>
            </th>
            <th class="py-3 px-6 text-start">
                <div class="inline-flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Thamani ya Dhamana</span>
                    <svg class="size-3.5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="m7 15 5 5 5-5" />
                        <path d="m7 9 5-5 5 5" />
                    </svg>
                </div>
            </th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
    <?php if (!empty($collateral) && is_array($collateral)): ?>
        <?php 
            $no = 1; 
            $total_value = 0;
        ?>
        <?php foreach ($collateral as $item): ?>
            <?php $total_value += $item->value; ?>
            <tr>
                <td class="px-6 py-4 text-sm font-medium text-gray-800 dark:text-gray-200">
                    <?= $no++; ?>.
                </td>
                <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">
                    <?= htmlspecialchars($item->description, ENT_QUOTES, 'UTF-8'); ?>
                </td>
                <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">
                    <?= htmlspecialchars($item->co_condition, ENT_QUOTES, 'UTF-8'); ?>
                </td>
                <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">
                    <?= number_format($item->value, 2); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                Taarifa za dhamana hazijajazwa.
            </td>
        </tr>
    <?php endif; ?>
</tbody>

<?php if (!empty($collateral) && is_array($collateral)): ?>
<tfoot class="bg-gray-50 dark:bg-gray-800">
    <tr>
        <td colspan="3" class="px-6 py-4 text-sm font-semibold text-right text-gray-700 dark:text-gray-200">Jumla:</td>
        <td class="px-6 py-4 text-sm font-bold text-gray-800 dark:text-white"><?= number_format($total_value, 2); ?></td>
    </tr>
</tfoot>
<?php endif; ?>

</table>

                        </div>
                    </div>
                </div>

				
            </div>
			
        </div>

        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
		<div class="w-full bg-cyan-600 text-white">
        <div class="flex flex-col max-w-screen-xl px-4 mx-auto md:flex-row md:justify-between md:px-6 lg:px-8">
            <div class="p-2 flex flex-row items-center justify-between">
                <a href="#" class="text-lg font-semibold tracking-widest uppercase rounded-lg focus:outline-none focus:shadow-outline">
				Maombi ya mkopo Ulioombwa
                </a>
            </div>
        </div>
    </div>
			

    <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 md:p-6">
                <?php
                    $position_id = $this->session->userdata('position_id');
                    if (empty($position_id)) {
                        if (isset($privillage) && is_array($privillage) && !empty($privillage)) {
                            $position_id = $privillage[0]->position_id;
                        } elseif (isset($privillage) && is_object($privillage)) {
                            $position_id = $privillage->position_id;
                        }
                    }
                    $is_manager = ($position_id == '21');
                    $is_not_verified = empty($loan_form->verified_by);
                    $can_edit = $is_manager && $is_not_verified;
                    $form_action = $can_edit ? "oficer/verify_loan_update/{$loan_form->loan_id}" : "oficer/aprove_loan/{$loan_form->loan_id}";
                ?>
                <?php echo form_open($form_action, ['novalidate' => true]); ?>
                    <div class="grid sm:grid-cols-12 gap-4 sm:gap-6">

                    
                        <div class="sm:col-span-4">
                            <label for="category_id" class="block text-sm font-medium mb-2 dark:text-gray-300">* Aina Ya Mkopo:</label>
                            <?php if ($can_edit): ?>
                            <select id="category_id" name="category_id" class="py-2.5 px-4 block w-full border-blue-500 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-blue-500 dark:text-gray-300 dark:focus:ring-gray-600">
                                <?php if (!empty($loan_categories)): ?>
                                    <?php foreach ($loan_categories as $cat): ?>
                                    <option value="<?php echo $cat->category_id; ?>" <?php echo ($cat->category_id == $loan_form->category_id) ? 'selected' : ''; ?>>
                                        <?php echo strtoupper(htmlspecialchars($cat->loan_name, ENT_QUOTES, 'UTF-8')); ?>
                                    </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <?php else: ?>
                            <input type="text" id="category_id" readonly autocomplete="off"
                                   class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
                                   value="<?php echo isset($loan_form->loan_name) ? strtoupper(preg_replace('/[^a-zA-Z]/', '  ', $loan_form->loan_name)) : ''; ?>">
                            <?php endif; ?>
                        </div>

						<div class="sm:col-span-4">
                            <label for="how_loan" class="block text-sm font-medium mb-2 dark:text-gray-300">* Kiasi Kilichoombwa:</label>
                            <input type="text" id="how_loan" name="" readonly autocomplete="off" 
                                   class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600" 
                                   value="<?php echo isset($loan_form->how_loan) ? number_format((float)$loan_form->how_loan, 0) : ''; ?>">
                        </div>

                        <div class="sm:col-span-4">
                            <label for="how_loan" class="block text-sm font-medium mb-2 dark:text-gray-300">* Kiasi Kinachopitishwa:</label>
                            <input type="text" id="how_loan" name="loan_aprove" placeholder="Full name" autocomplete="off" 
                                   class="py-2.5 px-4 block w-full border-green-600 rounded-lg text-sm focus:border-green-500 focus:ring-green-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600" 
                                   value="<?php echo set_value('sp_lname', isset($loan_form->how_loan) ? $loan_form->how_loan : ''); ?>"
                       required>
                        </div>

                        <input type="hidden" name="penat_status" value="YES">
                        

                        <div class="sm:col-span-4">
    <label for="day" class="block text-sm font-medium mb-2 dark:text-gray-300">* Marejesho Ya:</label>
    <?php if ($can_edit): ?>
    <select id="day" name="day" class="py-2.5 px-4 block w-full border-blue-500 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-blue-500 dark:text-gray-300 dark:focus:ring-gray-600">
        <option value="1" <?php echo (isset($loan_form->day) && $loan_form->day == 1) ? 'selected' : ''; ?>>Siku (Daily)</option>
        <option value="7" <?php echo (isset($loan_form->day) && $loan_form->day == 7) ? 'selected' : ''; ?>>Wiki (Weekly)</option>
        <option value="30" <?php echo (isset($loan_form->day) && in_array($loan_form->day, [28,29,30,31])) ? 'selected' : ''; ?>>Mwezi (Monthly)</option>
    </select>
    <?php else: ?>
    <input type="text" id="day" readonly autocomplete="off"
        class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
        value="<?php
            if (isset($loan_form->day)) {
                if ($loan_form->day == 1) echo 'Siku';
                elseif ($loan_form->day == 7) echo 'Week';
                elseif (in_array($loan_form->day, [28,29,30,31])) echo 'Mwezi';
            }
        ?>">
    <?php endif; ?>
</div>




                        <div class="sm:col-span-4">
                            <label for="phone_no" class="block text-sm font-medium mb-2 dark:text-gray-300">* Idadi Jumla Ya Marejesho:</label>
                            <input type="number" id="phone_no" name="<?php echo $can_edit ? 'session' : ''; ?>" <?php echo $can_edit ? '' : 'readonly'; ?> autocomplete="off" required
                                   class="py-2.5 px-4 block w-full <?php echo $can_edit ? 'border-blue-500 dark:border-blue-500' : 'border-gray-200 dark:border-gray-600'; ?> rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600" 
                                   value="<?php echo set_value('session', isset($loan_form->session) ? $loan_form->session : ''); ?>">
                           
                        </div>

                        <div class="sm:col-span-4">
                            <label for="reason" class="block text-sm font-medium mb-2 dark:text-gray-300">* Biashara Ya Mkopaji:</label>
                            <input type="text" id="reason" name="<?php echo $can_edit ? 'reason' : ''; ?>" <?php echo $can_edit ? '' : 'readonly'; ?> autocomplete="off" required
                                   class="py-2.5 px-4 block w-full <?php echo $can_edit ? 'border-blue-500 dark:border-blue-500' : 'border-gray-200 dark:border-gray-600'; ?> rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600" 
                                   value="<?php echo set_value('reason', isset($loan_form->reason) ? $loan_form->reason : ''); ?>">
                           
                        </div>
                        
						
<div class="sm:col-span-4">
    <label for="age" class="block text-sm font-medium mb-2 dark:text-gray-300">* Tarehe Ya Maombi Ya Mkopo:</label>
    <input type="text" readonly id="age" name="" autocomplete="off"
           class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
            value="<?php echo set_value('customer_day', isset($loan_form->loan_day) ? $loan_form->loan_day : ''); ?>">
</div>

<div class="sm:col-span-4">
    <label for="age" class="block text-sm font-medium mb-2 dark:text-gray-300">* Afisa Aliyeomba Mkopo:</label>
    <input type="text" readonly id="age" name="" autocomplete="off"
           class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
            value="<?php echo set_value('customer_day', isset($loan_form->creator_name) ? $loan_form->creator_name : ''); ?>">
</div>


                    </div>
                    <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex justify-center gap-x-2">
                            <?php if ($can_edit): ?>
                            <button type="submit" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-green-500 bg-green-600 text-white hover:bg-green-700">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                                <?php echo $this->lang->line('verify') ?? 'Verify'; ?>
                            </button>
                            <?php else: ?>
                            <button type="submit" class="py-2 px-4 btn-primary-sm bg-cyan-800 hover:bg-cyan-700 text-white">Tuma Maombi</button>
                            <?php endif; ?>
                            <a href="<?php echo base_url("oficer/reject_loan/{$loan_form->loan_id}") ?>" class="py-2 px-4 bg-red-600 dark:bg-red-800 rounded border border-red-500 hover:bg-red-700 text-white">Kataa</a>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
			
        </div>
</div>
</div>
<!-- ========== END MAIN CONTENT BODY ========== -->

<?php
include_once APPPATH . "views/partials/footer.php";
?>






