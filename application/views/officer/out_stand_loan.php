
<?php
include_once APPPATH . "views/partials/officerheader.php";

?>


           



	<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-6">

		<?php
		  $start_date_value = isset($start_date) ? $start_date : '';
		  $end_date_value = isset($end_date) ? $end_date : '';
		  $download_query = http_build_query([
		    'start_date' => $start_date_value,
		    'end_date' => $end_date_value,
		  ]);
		?>
		<div class="mb-4 flex w-full flex-col items-center gap-4 lg:flex-row lg:justify-center">
	<a href="<?= base_url('oficer/download_yesterday_defaulters_pdf') ?>" target="_blank"
   class="flex items-center justify-center text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">

    <!-- PDF / Document Icon -->
    <svg class="h-4 w-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path fill-rule="evenodd" 
              d="M5 2.75C5 1.784 5.784 1 6.75 1h6.5c.966 0 1.75.784 1.75 1.75v3.552c.377.046.752.097 1.126.153A2.212 2.212 0 0118 8.653v4.097A2.25 2.25 0 0115.75 15h-.241l.305 1.984A1.75 1.75 0 0114.084 19H5.915a1.75 1.75 0 01-1.73-2.016L4.492 15H4.25A2.25 2.25 0 012 12.75V8.653c0-1.082.775-2.034 1.874-2.198.374-.056.75-.107 1.127-.153L5 6.25v-3.5zm8.5 3.397a41.533 41.533 0 00-7 0V2.75a.25.25 0 01.25-.25h6.5a.25.25 0 01.25.25v3.397zM6.608 12.5a.25.25 0 00-.247.212l-.693 4.5a.25.25 0 00.247.288h8.17a.25.25 0 00.246-.288l-.692-4.5a.25.25 0 00-.247-.212H6.608z" 
              clip-rule="evenodd" />
    </svg>

    Walipaswa kumaliza mikopo Jana PDF
</a>


	<a href="<?php echo base_url(); ?>oficer/defaulters_3_30_days_pdf"
   target="_blank"
   class="flex items-center justify-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">

   <svg class="h-4 w-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd"
              d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V4z"
              clip-rule="evenodd"/>
    </svg>

   Mikopo ya Siku 3–30 Zilizochelewa
</a>

	<button type="button" 
        onclick="window.open('<?= base_url('oficer/defaulters_31_60_days_pdf'); ?>', '_blank')" 
        class="flex items-center justify-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">

    <!-- PDF / Document Icon -->
    <svg class="h-4 w-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V4z" clip-rule="evenodd" />
    </svg>

     Mikopo ya Siku 31–60 Zilizochelewa
</button>

<button type="button" 
        onclick="window.open('<?= base_url('oficer/defaulters_61_90_days_pdf'); ?>', '_blank')" 
        class="flex items-center justify-center text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-4 py-2">
    <svg class="h-4 w-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V4z" clip-rule="evenodd" />
    </svg>

   Mikopo ya Siku 61–90 Zilizochelewa
</button>


<button type="button" 
        onclick="window.open('<?= base_url('oficer/defaulters_91_plus_days_pdf'); ?>', '_blank')" 
        class="flex items-center justify-center text-white bg-red-900 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-red-900 dark:hover:bg-red-800 focus:outline-none dark:focus:ring-red-800">

    <!-- PDF / Document Icon -->
    <svg class="h-4 w-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V4z" clip-rule="evenodd" />
    </svg>

    91+ Days Past Due
</button>

		</div>
		<!--begin: Datatable -->
		<div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700">
		<table class="min-w-full divide-y divide-gray-200 text-sm text-gray-700 dark:divide-gray-700 dark:text-gray-300" id="kt_table_1">
							     <thead class="bg-gray-50 text-xs uppercase text-gray-500 dark:bg-gray-800 dark:text-gray-400">
							          <tr>
							    		    <th class="px-4 py-3 text-left font-semibold">S/No.</th>
							    		    <th class="px-4 py-3 text-left font-semibold">Branch Name</th>
										<th class="px-4 py-3 text-left font-semibold">Customer Name</th>
										<th class="px-4 py-3 text-left font-semibold">Phone Number</th>
										<th class="px-4 py-3 text-left font-semibold">Loan Amount</th>
										<th class="px-4 py-3 text-left font-semibold">Rejesho</th>
										<th class="px-4 py-3 text-left font-semibold">Number of Repayment</th>
										<th class="px-4 py-3 text-left font-semibold">Amelipa</th>
										<th class="px-4 py-3 text-left font-semibold">Deni</th>
										<th class="px-4 py-3 text-left font-semibold">pending Day</th>
										<th class="px-4 py-3 text-left font-semibold">Gawa Tarehe</th>
										<th class="px-4 py-3 text-left font-semibold">Mwisho Tarehe</th>
								           </tr>
			                  </thead>
			
								    <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                                          <?php $no = 1; ?>
									<?php foreach ($outstand as $outstands): ?>
									          <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50">
							  			<td class="px-4 py-2 font-medium text-gray-900 dark:text-gray-100 c"><?php echo $no++; ?> </td>
							  			<td class="px-4 py-2 text-gray-700 dark:text-gray-300 c">
				  					   <?php echo $outstands->blanch_name; ?>
				  					</td>
							  			<td class="px-4 py-2 text-gray-700 dark:text-gray-300 c">
				  						<?php echo $outstands->f_name; ?> <?php echo $outstands->m_name; ?> <?php echo $outstands->l_name; ?>
				  					</td>
							  			<td class="px-4 py-2 text-gray-700 dark:text-gray-300"><?php echo $outstands->phone_no; ?></td>
							  			<td class="px-4 py-2 text-gray-700 dark:text-gray-300"><?php echo number_format($outstands->loan_int); ?></td> 
							  			<td class="px-4 py-2 text-gray-700 dark:text-gray-300"><?php echo number_format($outstands->restration); ?></td> 
							  			<td class="px-4 py-2 text-gray-700 dark:text-gray-300">
    <?php 
        if ($outstands->day == '1') {
            echo "Daily";
        } elseif ($outstands->day == '7') {
            echo "Weekly";
        } elseif ($outstands->day == '30') {
            echo "Monthly";
        }

        echo " (" . $outstands->session . ")";
		
    ?>
</td>
					<td class="px-4 py-2 text-gray-700 dark:text-gray-300"> <?php echo number_format($outstands->total_deposit); ?></td>
					 <td><?= number_format($outstands->loan_int - $outstands->total_deposit) ?></td>
					<td class="px-4 py-2 text-red-600 dark:text-red-400">
					  <?php
					    $endDateStr = substr($outstands->loan_end_date, 0, 10);
					    $endDate = DateTime::createFromFormat('Y-m-d', $endDateStr);
					    $today = new DateTime();
					    if ($endDate instanceof DateTime) {
					      $diff = $endDate->diff($today);
					      $pendingDays = $diff->invert ? 0 : $diff->days;
					      echo $pendingDays;
					    } else {
					      echo '-';
					    }
					  ?>
					</td> 
					<td class="px-4 py-2 text-gray-700 dark:text-gray-300"><?php echo $outstands->loan_stat_date; ?></td> 
					<td class="px-4 py-2 text-gray-700 dark:text-gray-300"><?php echo substr($outstands->loan_end_date, 0,10); ?></td> 
				  			
				  								  											  							
                                   </tr>
                      <?php endforeach; ?>
									
	                </tbody>
	                <tfoot class="bg-gray-50 text-gray-700 dark:bg-gray-800 dark:text-gray-300">
                     <tr>
                    <th class="px-4 py-3 text-left font-semibold">TOTAL</th>
					<th class="px-4 py-3"></th>
					<th class="px-4 py-3"><?php //echo number_format($sum_depost->cash_depost); ?></th>
					<th class="px-4 py-3"><?php //echo number_format($sum_withdrawls->cash_withdrowal); ?></th>
					<th class="px-4 py-3"></th>
					<th class="px-4 py-3"></th>
					<th class="px-4 py-3"><?php //echo number_format($pend->total_pending); ?></th>
					<th class="px-4 py-3"><?php //echo number_format($pend->total_pending); ?></th>
				
					<th class="px-4 py-3"><?php //echo number_format($pend->total_pending); ?></th>
					<th class="px-4 py-3"><?php //echo number_format($pend->total_pending); ?></th>
					<th class="px-4 py-3"><?php //echo number_format($pend->total_pending); ?></th>
					
                    </tr> 
                   </tfoot>
                   </table>
			</div>
		<!--end: Datatable -->
	</div>
</div>
			

<script>
	(function () {
		var searchInput = document.getElementById('outstand-search');
		var table = document.getElementById('kt_table_1');
		if (!searchInput || !table) return;

		searchInput.addEventListener('input', function () {
			var query = searchInput.value.toLowerCase().trim();
			var rows = table.querySelectorAll('tbody tr');
			rows.forEach(function (row) {
				var text = row.textContent.toLowerCase();
				row.style.display = text.indexOf(query) !== -1 ? '' : 'none';
			});
		});
	})();
</script>
				
<?php
include_once APPPATH . "views/partials/footer.php";
?>