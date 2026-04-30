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
	<a href="<?php echo base_url('admin/today_recevable_download'); ?>" 
   class="flex items-center justify-center text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
    <svg class="h-4 w-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V4z" clip-rule="evenodd" />
    </svg>
    <?php echo $this->lang->line('download_pdf'); ?>
</a>


                  
                </div>
            </div>
<div class="overflow-x-auto">
    <table id="shareholder_table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-cyan-500 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-4 py-3 dark:text-white">S/No</th>
                <th scope="col" class="uppercase px-4 py-3 dark:text-white">Customer Name</th>
                <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('branch_name'); ?></th>
                <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('phone_number'); ?></th>
                <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('duration_type'); ?></th>
                <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('loan_amount'); ?></th>
                <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('collection'); ?></th>
                <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('paid_total'); ?></th>
                <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('remain_debt'); ?></th>
                <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('remain_days'); ?></th>
                <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('end_date'); ?></th>
                <th scope="col" class="px-4 py-3 dark:text-white"><?php echo $this->lang->line('employee_label'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1; 
            $total_loan = 0;
            $total_collection = 0;
            $total_paid = 0;
            $total_remain_debt = 0;
            ?>
            <?php foreach($today_recevable as $today_recevables): ?>
                <?php
                    // Calculate totals
                    $total_loan += $today_recevables->loan_int;
                    $total_collection += $today_recevables->restration;
                    $total_paid += $today_recevables->total_deposit;
                    $remain_debt = $today_recevables->loan_int - $today_recevables->total_deposit;
                    $total_remain_debt += $remain_debt;
                ?>
                <tr class="border-b dark:border-gray-700">
                    <th scope="row" class="uppercase px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $no++ ?></th>
                    <td class="px-4 py-3 dark:text-white"><?= $today_recevables->f_name . ' ' . $today_recevables->m_name . ' ' . $today_recevables->l_name; ?></td>
                    <td class="px-4 py-3 dark:text-white"><?= $today_recevables->blanch_name; ?></td>
                    <td class="px-4 py-3 dark:text-white"><?= $today_recevables->phone_no; ?></td>
                    <td class="px-4 py-3 dark:text-white">
                        <?php 
                            if ($today_recevables->day == 1) echo $this->lang->line('daily');
                            elseif ($today_recevables->day == 7) echo $this->lang->line('weekly');
                            elseif (in_array($today_recevables->day, [28,29,30,31])) echo $this->lang->line('monthly');
                        ?>
                    </td>
                    <td class="px-4 py-3 dark:text-white"><?= number_format($today_recevables->loan_int); ?></td>
                    <td class="px-4 py-3 dark:text-white"><?= number_format($today_recevables->restration); ?></td>
                    <td class="px-4 py-3 dark:text-white"><?= number_format($today_recevables->total_deposit); ?></td>
                    <td class="px-4 py-3 dark:text-white"><?= number_format($remain_debt); ?></td>
                    <td class="px-4 py-3 dark:text-white"><?= $today_recevables->remain_days; ?></td>
                    <td class="px-4 py-3 dark:text-white"><?= $today_recevables->loan_end_date; ?></td>
                    <td class="px-4 py-3 dark:text-white"><?= $today_recevables->empl_name; ?></td>
                </tr>
            <?php endforeach; ?>

            <!-- Totals Row -->
            <tr class="bg-gray-100 dark:bg-gray-700 font-bold">
                <td colspan="5" class="px-4 py-3 dark:text-white text-right"><?php echo $this->lang->line('total'); ?></td>
                <td class="px-4 py-3 dark:text-white"><?= number_format($total_loan); ?></td>
                <td class="px-4 py-3 dark:text-white"><?= number_format($total_collection); ?></td>
                <td class="px-4 py-3 dark:text-white"><?= number_format($total_paid); ?></td>
                <td class="px-4 py-3 dark:text-white"><?= number_format($total_remain_debt); ?></td>
                <td colspan="3"></td>
            </tr>
        </tbody>
    </table>
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


<link href="/assets/css/select2.min.css" rel="stylesheet">

<!-- jQuery -->
<script src="/assets/js/jquery-3.6.0.min.js"></script>

<!-- Select2 JS -->
<script src="/assets/js/select2.min.js"></script>

<script>
  $(document).ready(function() {
    $('#mySelect').select2({
    placeholder: "<?php echo $this->lang->line('select'); ?>",
      allowClear: true
    });
  });
</script>

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





		