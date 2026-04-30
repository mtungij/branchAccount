
<?php
include_once APPPATH . "views/partials/officerheader.php";


?>


<div class="w-full lg:ps-64">
<div class="p-3 sm:p-4 md:p-6 space-y-4 sm:space-y-6">


      
   

    
        <section class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5">
  <div class="w-full ">
      <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
      <div class="flex flex-col gap-3 px-4 py-3 sm:flex-row sm:items-center sm:justify-between">
        <h5 class="text-lg font-semibold dark:text-white">Orodha ya Wateja Wasumbufu</h5>
      </div>


          

 <div class="relative w-full overflow-x-auto">

  <div class="flex w-full flex-col gap-3 px-4 pb-3 sm:flex-row sm:items-center sm:justify-between">
 
  

<table
  id="shareholder_table"
  class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
>

    <thead class="text-xs text-cyan-500 uppercase bg-gray-50 dark:bg-cyan-500 dark:text-gray-50">
        <tr>
            <th scope="col" class="px-4 py-3">S/No</th>
            <th scope="col" class="px-4 py-3">JINA LA MTEJA</th>
            
            <th scope="col" class="px-4 py-3">NAMBA YA SIMU</th>
            <th scope="col" class="px-4 py-3">KIASI CHA MKOPO</th>
         
            <th scope="col" class="px-4 py-3">LIPWA</th>
            <th scope="col" class="px-4 py-3">DENI</th>
            <th scope="col" class="px-4 py-3">TAREHE YA MWISHO KULIPA</th>
            <th scope="col" class="px-4 py-3">KIASI KILICHOLIPWA</th>
             <th scope="col" class="px-4 py-3">IDADI YA SIKU</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($outstand)): ?>
            <?php
                $sno = 1;
             
            ?>
            <?php foreach ($outstand as $item): ?>
               
                <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                    <td class="px-4 py-2">
                        <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-white"><?= $sno++; ?></span>
                    </td>
                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="flex items-center"><?= htmlspecialchars($item->f_name . ' ' . $item->l_name) ?></div>
                    </td>
                      <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                       <?= $item->phone_no?>
                      </td>
                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= number_format($item->loan_int) ?></td>

                      <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $item->loan_int - $item->remain_amount ?></td> 
                     <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $item->remain_amount ?></td> 

                      <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $item->loan_end_date ?></td>
                   
                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= htmlspecialchars($item->last_payment_day) ?></td>
                     <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= htmlspecialchars($item->overdue_days) ?></td>
                   
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="8" class="px-4 py-3 text-center text-gray-500 dark:text-white">Hakuna taarifa za leo.</td>
            </tr>
        <?php endif; ?>
    </tbody>
    <tfoot class="font-bold text-gray-900 dark:text-white bg-gray-100 dark:bg-gray-700">
        <!-- <tr>
            <td colspan="2" class="px-4 py-3">JUMLA</td>
            <td></td>
            <td class="px-4 py-3"><?= number_format($total_restration) ?></td>
            <td class="px-4 py-3"><?= number_format($total_depost) ?></td>
            <td class="px-4 py-3"><?= number_format($total_laza) ?></td>
            <td class="px-4 py-3"><?= number_format($total_zidi) ?></td>
            <td colspan="2" class="px-4 py-3"></td>
        </tr> -->
    </tfoot>
</table>

          </div>
       
      </div>
  </div>
</section>
      
        <!-- End Card: Register Share Holder Form -->


       
        <!-- End Card: Share Holder List Table -->

 

        <div id="hs-basic-modal" class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-80 opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-basic-modal-label">
  <div class="sm:max-w-lg sm:w-full m-3 sm:mx-auto">
    <div class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">

      <!-- Modal Header -->
      <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200 dark:border-neutral-700">
        <h3 id="hs-basic-modal-label" class="font-bold text-gray-800 dark:text-white">
          Filter Data
        </h3>
        <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-basic-modal">
          <span class="sr-only">Close</span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M18 6 6 18"></path>
            <path stroke-linecap="round" stroke-linejoin="round" d="m6 6 12 12"></path>
          </svg>
        </button>
      </div>

      <!-- Modal Body -->
    
      <?php echo form_open("admin/prev_cashtransaction"); ?>
      <div class="p-4 overflow-y-auto">
        <div class="grid sm:grid-cols-12 gap-4 sm:gap-6">
          
          <!-- Total Withdraw -->
    

          <!-- Payment Method -->
          <div class="sm:col-span-6">
            <label for="method" class="block text-sm font-medium mb-2 dark:text-gray-300">
              * Chagua Tawi:
            </label>
            <select id="blanch" name="blanch_id"
              class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:ring-gray-600">
                 <?php foreach ($blanch as $blanchs): ?>
                                <option value="<?php echo $blanchs->blanch_id; ?>"><?php echo $blanchs->blanch_name; ?> </option>
                                    <?php endforeach; ?>
            </select>
          </div>


          <div class="sm:col-span-6">
            <label for="method" class="block text-sm font-medium mb-2 dark:text-gray-300">
              * Chagua Staff:
            </label>
            <select name="empl_id" id="empl"
              class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:ring-gray-600">
              <option value="">Select Employee</option>
              <option value="all">ALL</option>
            </select>
          </div>

          <!-- Date -->
          <?php $date = date("Y-m-d"); ?>
          <input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">  

          <div class="sm:col-span-6">
            <label for="with_date" class="block text-sm font-medium mb-2 dark:text-gray-300">
              *DATE FROM:
            </label>
            <input type="date" id="with_date" name="from" 
            value="<?php echo $date; ?>" 
              class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
              required>
          </div>

          <div class="sm:col-span-6">
            <label for="with_date" class="block text-sm font-medium mb-2 dark:text-gray-300">
              * DATE TO:
            </label>
            <input type="date" id="with_date" name="to"
            value="<?php echo $date; ?>" 
              class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
              required>
          </div>

          <!-- Code -->
   

        </div>
      </div>

      <!-- Modal Footer -->
      <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200 dark:border-neutral-700">
        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-basic-modal">
          Close
        </button>

        <!-- Submit Button -->
        <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
          Save changes
        </button>
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

<script>
document.getElementById('shareholder-table-search').addEventListener('keyup', function() {
    const filter = this.value.toLowerCase();
    const table = document.getElementById('shareholder_table');
    const trs = table.getElementsByTagName('tr');

    // Start from 1 to skip the header row
    for (let i = 1; i < trs.length; i++) {
        const tr = trs[i];
        // Convert all text in the row to lowercase for case-insensitive search
        const text = tr.textContent.toLowerCase();
        if (text.indexOf(filter) > -1) {
            tr.style.display = '';
        } else {
            tr.style.display = 'none';
        }
    }
});
</script>

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
