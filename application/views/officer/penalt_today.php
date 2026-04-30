
<?php
include_once APPPATH . "views/partials/officerheader.php";

// --- DUMMY DATA - REMOVE AND LOAD FROM YOUR CONTROLLER ---
// Controller should pass $share, an array of shareholder objects.
// Each object should have 'share_id', 'share_name', 'share_mobile', 'share_email', 'share_sex', 'share_dob'.
// if (!isset($share)) {
//     $share = [
//         (object)['share_id' => 1, 'share_name' => 'Alice Wonderland', 'share_mobile' => '0712345001', 'share_email' => 'alice@example.com', 'share_sex' => 'female', 'share_dob' => '1985-06-15'],
//         (object)['share_id' => 2, 'share_name' => 'Bob The Builder', 'share_mobile' => '0712345002', 'share_email' => 'bob@example.com', 'share_sex' => 'male', 'share_dob' => '1978-11-02'],
//     ];
// }
// --- END DUMMY DATA ---
?>

<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-6">

      
        <!-- End Page Title / Subheader -->

    
        <section class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5">
  <div class="w-full ">
      <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
      <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-start lg:space-y-0 lg:space-x-4">
  <div class="flex items-center flex-1 space-x-4">
      <!-- <h5>
          <span class="text-gray-500">All Products:</span>
          <span class="dark:text-white">123456</span>
      </h5> -->
      <!-- <h5>
          <span class="text-gray-500">Total sales:</span>
          <span class="dark:text-white">$88.4k</span>
      </h5> -->
  </div>
  
</div>


          
  <!-- Search Input (Left) -->
  <div class="overflow-x-auto">
  <div class="flex flex-wrap items-center gap-2 mb-4">
    <!-- Search Input -->
    <div class="relative w-full sm:w-auto">
      <label for="shareholder-table-search" class="sr-only">Search</label>
      <input
        type="search"
        name="shareholder-table-search"
        id="shareholder-table-search"
        class="py-2 px-3 ps-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
        placeholder="Search share holders..."
        data-hs-datatable-search="#shareholder_table"
        aria-label="Search share holders"
      />
      <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
        <svg class="w-4 h-4 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
          viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <circle cx="11" cy="11" r="8"></circle>
          <path d="M21 21l-4.3-4.3"></path>
        </svg>
      </div>
    </div>

    <!-- Optional Spacer for Layout (hidden on small screens) -->
    <div class="hidden md:block flex-grow"></div>

    <!-- Buttons -->
    <div
      class="flex flex-col w-full sm:w-auto space-y-2 md:flex-row md:items-center md:space-y-0 md:space-x-3">
      
      <!-- Export Button -->
      <!-- <button type="button" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-basic-modal" data-hs-overlay="#hs-basic-modal"> -->
  <!-- Filter Icon SVG -->
  <!-- <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
    <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L15 13.414V19a1 1 0 01-1.447.894l-4-2A1 1 0 019 17v-3.586L3.293 6.707A1 1 0 013 6V4z"></path>
  </svg>
  Filter Data
</button> -->


<?php 
$position = strtoupper($this->session->userdata('position_name'));

if ($position === 'LOAN OFFICER'): ?>
  <!-- <a
    href="</?php echo base_url('oficer/print_officer_cash_transaction'); ?>"
    class="w-full md:w-auto flex items-center justify-center px-3 py-2 text-sm font-medium text-white bg-green-600 hover:bg-green-700 rounded-lg focus:outline-none focus:ring-4 focus:ring-green-300 dark:focus:ring-green-800"
    target="_blank"
  >
    <span class="bg-green-200 p-1 rounded mr-2">
      <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path
          d="M14 2H6a2 2 0 00-2 2v16c0 1.104.896 2 2 2h12a2 2 0 002-2V8l-6-6zM13 3.5L18.5 9H13V3.5zM10 14h1v4h-1v-4zm-2.5 0H9v1.5H8v.5h1v1H7.5V14zm7 0H15a1 1 0 110 2h-.5v2H13v-4z" />
      </svg>
    </span>
    Print Officer PDF
  </a> -->


<?php elseif ($position === 'BRANCH MANAGER'): ?>
	<button type="button" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-basic-modal" data-hs-overlay="#hs-basic-modal">
  Filter By Date
</button>

  <a 
    href="<?php echo base_url('oficer/print_manager_withdrawal_pdf'); ?>"
    class="w-full md:w-auto flex items-center justify-center px-3 py-2 text-sm font-medium text-white bg-cyan-600 hover:bg-cyan-700 rounded-lg focus:outline-none focus:ring-4 focus:ring-cyan-300 dark:focus:ring-cyan-800"
    target="_blank"
  >
    <span class="bg-cyan-200 p-1 rounded mr-2">
      <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path
          d="M14 2H6a2 2 0 00-2 2v16c0 1.104.896 2 2 2h12a2 2 0 002-2V8l-6-6zM13 3.5L18.5 9H13V3.5zM10 14h1v4h-1v-4zm-2.5 0H9v1.5H8v.5h1v1H7.5V14zm7 0H15a1 1 0 110 2h-.5v2H13v-4z" />
      </svg>
    </span>
    Print Manager PDF
  </a>



<div id="hs-basic-modal" class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-80 opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-basic-modal-label">
  <div class="sm:max-w-lg sm:w-full m-3 sm:mx-auto">
    <div class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
      <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200 dark:border-neutral-700">
        <h3 id="hs-basic-modal-label" class="font-bold text-gray-800 dark:text-white">
          Modal title
        </h3>
        <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-basic-modal">
          <span class="sr-only">Close</span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 6 6 18"></path>
            <path d="m6 6 12 12"></path>
          </svg>
        </button>
      </div>
      <div class="p-4 overflow-y-auto">
        <p class="mt-1 text-gray-800 dark:text-neutral-400">
          This is a wider card with supporting text below as a natural lead-in to additional content.
        </p>
      </div>
      <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200 dark:border-neutral-700">
        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-basic-modal">
          Close
        </button>
        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
          Save changes
        </button>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

    </div>
  </div>


  

  <!-- Spacer to push buttons right on large screens -->
  
  <table id="shareholder_table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-cyan-500 uppercase bg-gray-50 dark:bg-cyan-500 dark:text-gray-50">
        <tr>
            <th class="px-4 py-3">S/no</th>
            <th class="px-4 py-3">Jina</th>
          
            <th class="px-4 py-3">Namba Ya Simu</th>
            <th class="px-4 py-3">Aina Ya Ada</th>
            <th class="px-4 py-3">Kiasi</th>
            <th class="px-4 py-3">Afisa</th>
            <th class="px-4 py-3">Muda</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $sno = 1; 
            $total_receve_amount = 0;
        ?>

        <?php foreach( $detail_income as  $detail): ?>
            <!-- Employee Header -->
            <!-- <tr class="bg-gray-200 dark:bg-gray-700">
                <td colspan="8" class="px-4 py-2 font-bold text-blue-600 dark:text-white">
                    <?= strtoupper($empl_name); ?>
                </td>
            </tr> -->

           
                <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                    <td class="px-4 py-2"><?= $sno++; ?></td>
                    <td class="px-4 py-2 text-gray-900 dark:text-white">
                        <?= strtoupper($detail->f_name . " " . $detail->m_name . " " . $detail->l_name); ?>
                    </td>

                    <td class="px-4 py-2 text-gray-900 dark:text-white"><?= $detail->phone_no; ?></td>
                   <td class="px-4 py-2 text-gray-900 dark:text-white"><?= $detail->inc_name ?></td>
                    <td class="px-4 py-2 text-gray-900 dark:text-white"><?= number_format($detail->receve_amount, 2); ?></td>
                    <td class="px-4 py-2 text-gray-900 dark:text-white"><?= $detail->empl; ?></td>
                    <td class="px-4 py-2 text-gray-900 dark:text-white"><?= $detail->receve_date; ?></td>
                </tr>
            <?php $total_receve_amount += $detail->receve_amount; ?>
            <?php endforeach; ?>

          
    </tbody>

    <!-- 🔽 General Total -->
    <tfoot class="font-bold text-white bg-green-600">
        <tr>
            <td colspan="4" class="px-4 py-3 text-right">JUMLA YA MALIPO FAINI:</td>
            <td class="px-4 py-3"><?= number_format($total_receve_amount, 2); ?></td>
            <td colspan="2"></td>
        </tr>
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
    
      <?php echo form_open("oficer/print_manager_withdrawal_pdf", ['method' => 'get']); ?>

      <div class="p-4 overflow-y-auto">
        <div class="grid sm:grid-cols-12 gap-4 sm:gap-6">
          

          <!-- Date -->
          <?php $date = date("Y-m-d"); ?>
          <input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">  

          <div class="sm:col-span-6">
            <label for="from_date" class="block text-sm font-medium mb-2 dark:text-gray-300">
              *DATE FROM:
            </label>
            <input type="date" id="from_date" name="from_date" 
            value="<?php echo $date; ?>" 
              class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-gray-600"
              required>
          </div>

          <div class="sm:col-span-6">
            <label for="to_date" class="block text-sm font-medium mb-2 dark:text-gray-300">
              * DATE TO:
            </label>
            <input type="date" id="to_date" name="to_date"
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
         Filter
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



		