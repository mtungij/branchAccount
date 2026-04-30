<?php
include_once APPPATH . "views/partials/header.php";
?>
<div class="w-full lg:ps-64">
	<div class="p-4 sm:p-6 space-y-6">
		<?php if ($das = $this->session->flashdata('massage')): ?>
			<div class="rounded-lg border border-green-200 bg-green-50 p-3 sm:p-4 text-green-800">
				<div class="flex items-start gap-2">
					<svg class="w-5 h-5 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
						<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
					</svg>
					<span class="text-sm sm:text-base"><?php echo $das;?></span>
				</div>
			</div>
		<?php endif; ?>

		<div class="bg-white rounded-xl shadow-md border border-gray-200">
			<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-3 px-4 py-4 border-b border-gray-200">
				<div class="space-y-1">
					<h3 class="text-base sm:text-lg font-semibold text-gray-900">
						Previous Cash Transaction (<?php echo @$blanch_data->blanch_name; ?>)
					</h3>
					<div class="text-xs sm:text-sm text-gray-600 flex flex-wrap gap-2">
						<?php $date = date("Y-m-d"); ?>
						<span>From: <b><?php echo @$from ?></b></span>
						<span>To: <b><?php echo @$to; ?></b><?php if ($empl_id == 'all') { ?><?php }else{ ?> / <?php echo $empl_data->empl_name; ?><?php } ?></span>
					</div>
				</div>
				<div class="flex flex-col sm:flex-row gap-2">
					<a href="" class="inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-white bg-cyan-600 hover:bg-cyan-700 rounded-lg" data-toggle="modal" data-target="#kt_modal_4">
						<svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L15 13.414V19a1 1 0 01-1.447.894l-4-2A1 1 0 019 17v-3.586L3.293 6.707A1 1 0 013 6V4z"></path></svg>
						Filter
					</a>
					<?php if (count($data) > 0) { ?>
						<a href="<?php echo base_url("admin/print_previous_cash/{$from}/{$to}/{$comp_id}/{$blanch_id}/{$empl_id}"); ?>" class="inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg" target="_blank">
							Print
						</a>
					<?php } ?>
					<a href="<?php echo base_url("admin/cash_transaction"); ?>" class="inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg">
						Back
					</a>
				</div>
			</div>

			<div class="p-4">
		<!--begin: Datatable -->
		<table class="w-full text-sm text-left text-gray-600" id="kt_table_1">
								     <thead class="text-xs uppercase bg-gray-50 text-gray-700">
			  						          <tr>
										    <th class="px-3 py-3">S/No.</th>
												<th class="px-3 py-3">Customer Name</th>
												<th class="px-3 py-3">Deposit</th>
												<th class="px-3 py-3">Withdrawal</th>
												<th class="px-3 py-3">Date</th>
												<th class="px-3 py-3">Time</th>
												<th class="px-3 py-3">Action</th>
				  									
				  									
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                          <?php $no = 1; ?>
									<?php foreach ($data as $cashs): ?>
									          <tr class="border-t hover:bg-gray-50">
									<td class="px-3 py-2"><?php echo $no++; ?>.</td>
									<td class="px-3 py-2 font-medium text-gray-900"><?php echo $cashs->f_name; ?> <?php echo $cashs->m_name; ?> <?php echo $cashs->l_name; ?></td>
				  					<td>
				  						<?php if ($cashs->depost == TRUE) {
				  						 ?>
										<span class="px-3 py-2 block">TZS <?php echo number_format($cashs->depost); ?></span>
				  					<?php }elseif ($cashs->depost == FALSE) {
				  					 ?>
									 <span class="px-3 py-2 block text-gray-400">-</span>
				  					 <?php } ?>
				  					</td>
				  					<td>
				  						<?php if ($cashs->withdraw == TRUE) {
				  						 ?>
										<span class="px-3 py-2 block">TZS <?php echo number_format($cashs->withdraw); ?></span>
				  					<?php }elseif ($cashs->withdraw == FALSE) {
				  					 ?>
									 <span class="px-3 py-2 block text-gray-400">-</span>
				  					 <?php } ?>
				  					</td>
									<td class="px-3 py-2"><?php echo $cashs->lecod_day; ?></td> 
									<td class="px-3 py-2"><?php echo $cashs->time_rec; ?></td>
									<td class="px-3 py-2">
										<?php if (!empty($cashs->pay_id) && $cashs->depost > 0) { ?>
											<a href="<?php echo base_url("admin/delete_depost_data/{$cashs->pay_id}") ?>" class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg">
												Delete
											</a>
										<?php } ?>
									</td>
				  								  											  							
                                   </tr>
                      <?php endforeach; ?>
									
	                </tbody>
	                <tfoot class="bg-gray-50">
                    <tr>
					<th class="px-3 py-2 text-left">TOTAL</th>
					<th class="px-3 py-2"></th>
					<th class="px-3 py-2">TZS <?php echo number_format($total_cashDepost->cash_depost); ?></th>
					<th class="px-3 py-2">TZS <?php echo number_format($total_withdrawal->cash_withdrowal); ?></th>
					<th class="px-3 py-2"></th>
					<th class="px-3 py-2"></th>
					<th class="px-3 py-2"></th>
                    </tr>
                   </tfoot>
                   </table>
		<!--end: Datatable -->
			</div>
		</div>
	</div>
<!-- end:: Content -->
				
<?php include('incs/footer_1.php') ?>

<div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-sm-down" role="document">
		<div class="modal-content rounded-xl border border-gray-200 shadow-xl w-full">
			<div class="modal-header flex items-center justify-between px-4 py-3 border-b border-gray-200">
				<h5 class="modal-title text-sm sm:text-base font-semibold text-gray-900" id="exampleModalLabel">Filter cash transaction</h5>
				<button type="button" class="close text-gray-500 hover:text-gray-700" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body p-4 sm:p-6">
				<?php echo form_open("admin/prev_cashtransaction"); ?>

					<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
						<div>
							<label class="block text-sm font-medium text-gray-700 mb-1">Select Branch</label>
							<select class="py-2.5 px-3 block w-full border-gray-200 rounded-lg text-sm" id="blanch" name="blanch_id" required>
								   <option value="">Select Branch</option>
									<?php foreach ($blanch as $blanchs): ?>
								<option value="<?php echo $blanchs->blanch_id; ?>"><?php echo $blanchs->blanch_name; ?> </option>
									<?php endforeach; ?>
								</select>
						</div>
               
						<div>
							<label class="block text-sm font-medium text-gray-700 mb-1">Select Employee</label>
							<select class="py-2.5 px-3 block w-full border-gray-200 rounded-lg text-sm" name="empl_id" id="empl" required>
								 <option value="">Select Employee</option>
								 <option value="all">ALL</option>
								</select>
						</div>
						  <?php $date = date("Y-m-d"); ?>
						  <input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">  
                        
						<div>
						  <label class="block text-sm font-medium text-gray-700 mb-1">From</label>
							<input type="date" value="<?php echo $date; ?>" name="from" class="py-2.5 px-3 block w-full border-gray-200 rounded-lg text-sm" required>
						</div>
						 <div>
						  <label class="block text-sm font-medium text-gray-700 mb-1">To</label>
							<input type="date" name="to" value="<?php echo $date; ?>" class="py-2.5 px-3 block w-full border-gray-200 rounded-lg text-sm" required>
						</div>
					    </div>
				    </div>
				    <div class="modal-footer px-4 py-3 border-t border-gray-200 flex flex-col sm:flex-row gap-2 sm:justify-end">
					<button type="button" class="py-2 px-4 inline-flex items-center text-sm font-medium rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-50" data-dismiss="modal">Cancel</button>
					<button type="submit" class="py-2 px-4 inline-flex items-center text-sm font-medium rounded-lg bg-cyan-600 text-white hover:bg-cyan-700">Filter Data</button>
				</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
<!--end::Modal-->
</div>


<!--end::Modal-->


<?php
include_once APPPATH . "views/partials/footer.php";
?>


  <script>
$(document).ready(function(){
$('#blanch').change(function(){
var blanch_id = $('#blanch').val();
//alert(blanch_id)
if(blanch_id != ''){

$.ajax({
url:"<?php echo base_url(); ?>admin/fetch_employee_blanch",
method:"POST",
data:{blanch_id:blanch_id},
success:function(data)
{
$('#empl').html(data);
//$('#district').html('<option value="">All</option>');
}
});
}
else
{
$('#empl').html('<option value="">Select Employee</option>');
//$('#district').html('<option value="">All</option>');
}
});

});
</script>


<!--end::Modal-->