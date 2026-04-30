
<!-- ========== END MAIN CONTENT BODY ========== -->



<?php
include_once APPPATH . "views/partials/header.php";

// --- DUMMY DATA - REMOVE AND LOAD FROM YOUR CONTROLLER ---
// Controller should pass $share, an array of shareholder objects.
// Each object should have 'share_id', 'share_name', 'share_mobile', 'share_email', 'share_sex', 'share_dob'.
// if (!isset($share)) {
//     $share = [
//         (object)['share_id' => 1, 'share_name' => 'Alice Wonderland', 'share_mobile' => '0712345001', 'share_email' => 'alice@example.com', 'share_sex' => 'female', 'share_dob' => '1985-06-15'],
//         (object)['share_id' => 2, 'share_name' => 'Bob The Builder', 'share_mobile' => '0712345002', 'share_email' => 'bob@example.com', 'share_sex' => 'male', 'share_dob' => '1978-11-02'],
//     ];
// }
// --- END DUMMY DATA ---header.php
?>


<div class="w-full lg:ps-64">
  <div class="= overflow-x-auto">


<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
    <div class="w-full">
        <!-- Start coding here -->
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only"><?php echo $this->lang->line('search'); ?></label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                              
                            </div>
                            <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" 
                placeholder="<?php echo $this->lang->line('search_customer_here'); ?>"
        data-hs-datatable-search="#shareholder_table"
              aria-label="<?php echo $this->lang->line('search'); ?>"
              >
                        </div>
                    </form>
                </div>
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
        <button type="button" class="flex items-center justify-center text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-basic-modal" data-hs-overlay="#hs-basic-modal">
    <svg class="h-4 w-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V4z" clip-rule="evenodd" />
    </svg>
    <?php echo $this->lang->line('filter_data'); ?>
</button>

 <a
        href="<?php echo base_url("admin/print_cash"); ?>"
        class="w-full md:w-auto flex items-center justify-center px-3 py-2 text-sm font-medium text-white bg-cyan-600 hover:bg-cyan-700 rounded-lg focus:outline-none focus:ring-4 focus:ring-cyan-300 dark:focus:ring-cyan-800" target="_blank"
      >
        <span class="bg-cyan-200 p-1 rounded mr-2">
          <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path
              d="M14 2H6a2 2 0 00-2 2v16c0 1.104.896 2 2 2h12a2 2 0 002-2V8l-6-6zM13 3.5L18.5 9H13V3.5zM10 14h1v4h-1v-4zm-2.5 0H9v1.5H8v.5h1v1H7.5V14zm7 0H15a1 1 0 110 2h-.5v2H13v-4z" />
          </svg>
        </span>
        <?php echo $this->lang->line('print_pdf'); ?>
      </a>

                  
                </div>
            </div>
            <div class="overflow-x-auto">
            <?php
    // Initialize totals BEFORE the condition
    $sno = 1;
    $total_restration = 0;
    $total_depost = 0;
    $total_laza = 0;
    $total_zidi = 0;
?>


                <table id="shareholder_table"  class="w-full text-sm text-left text-gray-500 dark:text-white">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-cyan-500 dark:text-white"">
                        <tr>
                        
            <th scope="col" class="px-4 py-3">S/No</th>
            <th scope="col" class="px-4 py-3"><?php echo $this->lang->line('customer_name'); ?></th>
            <th scope="col" class="px-4 py-3"><?php echo $this->lang->line('status'); ?></th>
            <th scope="col" class="px-4 py-3"><?php echo $this->lang->line('rejesho'); ?></th>
            <th scope="col" class="px-4 py-3"><?php echo $this->lang->line('paid'); ?></th>
            <th scope="col" class="px-4 py-3"><?php echo $this->lang->line('laza'); ?></th>
            <th scope="col" class="px-4 py-3"><?php echo $this->lang->line('zidi'); ?></th>
             <th scope="col" class="px-4 py-3"><?php echo $this->lang->line('debt'); ?></th>
            
            <th scope="col" class="px-4 py-3"><?php echo $this->lang->line('date'); ?></th>
            
        </tr>
            
                
                       
                    </thead>
                    <tbody>
        <?php if (!empty($lazo['details'])): ?>
            <?php
                $sno = 1;
                $total_restration = 0;
                $total_depost = 0;
                $total_laza = 0;
                $total_zidi = 0;
            ?>
            <?php foreach ($lazo['details'] as $item): ?>
                <?php
                    $laza = 0;
                    $zidi = 0;

                    if ($item->depost < $item->restration) {
                        $laza = $item->restration - $item->depost;
                    } elseif ($item->depost > $item->restration) {
                        $zidi = $item->depost - $item->restration;
                    }

                    // accumulate totals
                    $total_restration += $item->restration;
                    $total_depost += $item->depost;
                    $total_laza += $laza;
                    $total_zidi += $zidi;
                ?>
                <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                    <td class="px-4 py-2">
                        <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-white"><?= $sno++; ?></span>
                    </td>
                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="flex items-center"><?= htmlspecialchars($item->full_name) ?></div>
                    </td>
                     <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                        <?php if ($item->loan_status == 'withdrawal'): ?>
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-green-900 dark:text-green-300"><?php echo $this->lang->line('active'); ?></span>
                        <?php elseif ($item->loan_status == 'out'): ?>
                            <span class="bg-red-100 text-red-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-red-900 dark:text-red-300"><?php echo $this->lang->line('default'); ?></span>
                        <?php else: ?>
                            <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300"><?= htmlspecialchars($item->loan_status) ?></span>
                        <?php endif; ?>
                     </td>
                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= number_format($item->restration) ?></td>
                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= number_format($item->depost) ?></td>
                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $laza > 0 ? number_format($laza) : '-' ?></td>
                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $zidi > 0 ? number_format($zidi) : '-' ?></td>
                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?=  number_format($item->rem_debt) > 0 ? number_format($item->rem_debt) : 0.00 ?></td>
                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
    <?= htmlspecialchars(date('d-m-y')) ?>
</td>

                   
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="8" class="px-4 py-3 text-center text-gray-500 dark:text-white"><?php echo $this->lang->line('no_records_today'); ?></td>
            </tr>
        <?php endif; ?>
    </tbody>
    <tfoot class="font-bold text-gray-900 dark:text-white bg-gray-100 dark:bg-gray-700">
        <tr>
            <td colspan="3" class="px-4 py-3"><?php echo $this->lang->line('total'); ?></td>
            <td class="px-4 py-3"><?= number_format($total_restration) ?></td>
            <td class="px-4 py-3"><?= number_format($total_depost) ?></td>
            <td class="px-4 py-3"><?= number_format($total_laza) ?></td>
            <td class="px-4 py-3"><?= number_format($total_zidi) ?></td>
            <td colspan="2" class="px-4 py-3"></td>
        </tr>
    </tfoot>
                </table>
        <div id="hs-basic-modal" class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-80 opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-basic-modal-label">
  <div class="sm:max-w-lg sm:w-full m-3 sm:mx-auto">
    <div class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
      <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200 dark:border-neutral-700">
        <h3 id="hs-basic-modal-label" class="font-bold text-gray-800 dark:text-white">
          <?php echo $this->lang->line('filter_employee'); ?>
        </h3>
        <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-basic-modal">
          <span class="sr-only"><?php echo $this->lang->line('close'); ?></span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 6 6 18"></path>
            <path d="m6 6 12 12"></path>
          </svg>
        </button>
      </div>
    
    <?php echo form_open("admin/prev_cashtransaction"); ?>
  <div class="p-4 overflow-y-auto space-y-4">

    <!-- Gender Dropdown -->
    

    <!-- 2-Column Grid: Phone, Email, Company Name, Address -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

    <div>
      <label for="blanch" class="block text-sm font-medium text-gray-700 dark:text-white"><?php echo $this->lang->line('choose_branch'); ?></label>
      <select  id="branchSelect" name="blanch_id"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white" data-live-search="true">
    <option value=""><?php echo $this->lang->line('choose_branch'); ?></option>
      <?php foreach ($blanch as $blanchs): ?>
    <option value="<?php echo $blanchs->blanch_id; ?>"><?php echo $blanchs->blanch_name; ?> </option>
      <?php endforeach; ?>
      </select>
    </div>
    
      <!-- Phone -->
      <div>
        <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-white"><?php echo $this->lang->line('choose_officer'); ?></label>
    <select  id="employeeSelect" name="empl_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
      <option value=""><?php echo $this->lang->line('choose_officer'); ?></option>
      <option value="all"><?php echo $this->lang->line('all'); ?></option>
      </select>
      </div>

      <!-- Email -->
      

      <!-- Company Name -->
    <?php $date = date("Y-m-d"); ?>  

      <div>
        <label for="company" class="block text-sm font-medium text-gray-700 dark:text-white"><?php echo $this->lang->line('from_date'); ?></label>
    <input type="date" value="<?php echo $date; ?>" name="from"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
      </div>

      <!-- Address -->
      <div>
        <label for="address" class="block text-sm font-medium text-gray-700 dark:text-white"><?php echo $this->lang->line('to_date'); ?></label>
    <input type="date" name="to" value="<?php echo $date; ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
      </div>
    </div>

  </div>

  <!-- Modal Footer Buttons -->
  <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200 dark:border-neutral-700">
    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 hover:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700" data-hs-overlay="#hs-basic-modal">
      <?php echo $this->lang->line('close'); ?>
    </button>
    <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-blue-600 text-white hover:bg-blue-700">
      <?php echo $this->lang->line('apply_filters'); ?>
    </button>
  </div>
  <?php echo form_close(); ?>


    </div>
  </div>
</div>

            </div>
          
        </div>
    </div>
    </section>

  </div>
  </div>


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
url:"<?php echo base_url(); ?>admin/fetch_employee_blanch_deposit",
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
$('#empl').html('<option value=""><?php echo $this->lang->line('select_employee'); ?></option>');
//$('#district').html('<option value="">All</option>');
}
});

});
</script>


  <?php // Script for cmd+a fix for DataTables search input (if used) ?>
  <script>
$(document).ready(function() {
    $('#shareholder_table').DataTable({
        // optional: set to false if you don’t want it
        searching: true,
        paging: true,
        info: false
    });
});
</script>

  <script>
document.getElementById('simple-search').addEventListener('keyup', function() {
    const filter = this.value.toLowerCase();
    const table = document.getElementById('shareholder_table');
    const trs = table.getElementsByTagName('tr');

    // Start from 1 to skip the header row
    for (let i = 1; i < trs.length; i++) {
        const tr = trs[i];
        const text = tr.textContent.toLowerCase();
        if (text.indexOf(filter) > -1) {
            tr.style.display = '';
        } else {
            tr.style.display = 'none';
        }
    }
});
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Include Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<style>
.select2-container--default .select2-selection--single {
    background-color: #1f2937;
    border: 1px solid #374151;
    border-radius: 0.5rem;
    padding: 0.75rem 2.5rem 0.75rem 1rem;
    height: auto;
    color: #06b6d4; 
    font-size: 0.875rem;
    position: relative;
}
.select2-selection__rendered,
.select2-selection__clear,
.select2-selection__arrow {
    color: #d1d5db;
}
.select2-selection__arrow {
    right: 1rem;
    top: 0;
    width: 1.5rem;
    position: absolute;
}
.select2-selection__clear {
    right: 2.5rem;
    top: 50%;
    transform: translateY(-50%);
    position: absolute;
}
.custom-select2-dropdown {
    background-color: #1f2937;
    color: #d1d5db;
    border: 1px solid #374151;
    border-radius: 0.5rem;
    padding: 0.5rem;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #ffffff !important; /* Force white text */
}
.custom-select2-dropdown .select2-results__option--highlighted {
    background-color: #06b6d4 !important; /* Tailwind cyan-400 */
    color: #ffffff !important;
}

/* White text in the dropdown input if searchable */
.select2-search__field {
    color: #ffffff !important;
    background-color: #1f2937 !important; /* match dark bg */
    border: 1px solid #374151;
}
.custom-select2-dropdown .select2-results__option--highlighted {
    background-color: #06b6d4;
    color: #ffffff;
}
.custom-select2-container { margin: 0; }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        HSStaticMethods.autoInit(); // This is required to initialize all hs-select dropdowns
    });
</script>
<script>
window.addEventListener('load', () => {
  setTimeout(() => {
    const inputs = document.querySelectorAll('input[data-hs-datatable-search]');
    inputs.forEach((input) => {
      input.addEventListener('keydown', function (evt) {
        if ((evt.metaKey || evt.ctrlKey) && (evt.key === 'a' || evt.key === 'A')) {
          this.select();
        }
      });
    });
    // HSStaticMethods.autoInit(['select']); // If Preline selects need explicit init
  }, 500);
});
</script>

<script>
$(document).ready(function () {
    const selectConfig = {
        placeholder: "<?php echo $this->lang->line('select'); ?>",
        allowClear: true,
        width: '100%',
        dropdownCssClass: 'custom-select2-dropdown',
        containerCssClass: 'custom-select2-container'
    };

    $('#branchSelect').select2({...selectConfig, placeholder: "<?php echo $this->lang->line('select_branch'); ?>"});
    $('#employeeSelect').select2({...selectConfig, placeholder: "<?php echo $this->lang->line('select_employee'); ?>"});

    $('#branchSelect').on('change', function () {
        const branchId = $(this).val();

        $.post('fetch_employee_blanch', { blanch_id: branchId }, function (data) {
            const employeeSelect = $('#employeeSelect');
            employeeSelect.html(data).select2({...selectConfig, placeholder: "<?php echo $this->lang->line('select_employee'); ?>"});

            // If using Preline's hsSelect
            const customSelect = $('[data-hs-select]');
            if (customSelect.length) {
                customSelect.html(data);
                customSelect.hsSelect();
            }
        }).fail(function (xhr, status, error) {
            console.error('AJAX error:', status, error);
        });
    });
});

// Age Calculation
function getAge(dob) {
    const age = new Date().getFullYear() - new Date(dob).getFullYear();
    document.getElementById('age').value = isNaN(age) ? '' : age;
}
</script>




 