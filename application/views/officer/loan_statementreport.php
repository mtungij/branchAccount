
<?php
include_once APPPATH . "views/partials/officerheader.php";
?>
<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-6">


	<section class="bg-gray-50 dark:bg-gray-900 w-full">
    <div class="w-full">


        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">

            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
               <div id="tab-profile" class="tab-content w-full dark:bg-gray-800 rounded shadow-xl overflow-hidden">
      <div class="h-[140px] bg-gradient-to-r from-cyan-500 to-blue-500"></div>
      <div class="px-5 py-2 flex flex-col gap-3 pb-6">
        <div class="h-[90px] shadow-md w-[90px] rounded-full border-4 overflow-hidden -mt-14 border-white">
          <img class="w-full h-full rounded-full object-center object-cover" src="<?= base_url('assets/img/customer21.png') ?>" alt="Customer Image">
        </div>
        <div>
          <h3 class="uppercase text-xl text-slate-900 font-bold leading-6 dark:text-white"><?= $customer->f_name ." ". $customer->m_name ." ". $customer->l_name?></h3>
          <p class="text-sm text-gray-600  dark:text-white"><?= $customer->phone_no?></p>
        </div>
                <div class="w-full md:w-1/2">
                 
                </div>
<div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
    <a href="<?php echo base_url("oficer/print_customer_statement/{$customer_id}/{$loan_id}"); ?>" 
       target="_blank" rel="noopener noreferrer"
       class="flex items-center justify-center text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
        <svg class="h-4 w-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path fill-rule="evenodd" d="M3 14a1 1 0 011-1h3V4a1 1 0 112 0v9h3a1 1 0 010 2H4a1 1 0 01-1-1zm7 0a1 1 0 001-1V8a1 1 0 10-2 0v5a1 1 0 001 1z" clip-rule="evenodd"/>
        </svg>
        Download Repoti
    </a>
</div>


 
	

            </div>
            <div class="overflow-x-auto">
      
            <table id="shareholder_table" class="w-full overflow-x-auto text-sm text-left text-gray-500 dark:text-gray-400 border border-gray-300 dark:border-gray-700 divide-y divide-gray-200 dark:divide-gray-700">

    <thead class="text-xs text-cyan-500 uppercase bg-gray-50 dark:bg-cyan-500 dark:text-gray-50">
        <tr>
            <th scope="col" class="px-4 py-3" >Tarehe</th>
            <th scope="col" class="px-4 py-3">Maelezo</th>
            <th scope="col" class="px-4 py-3">Kiasi lipwa</th>
            <th scope="col" class="px-4 py-3">Kiasi Tolewa</th>
            <th scope="col" class="px-4 py-3">Salio</th>
            <th scope="col" class="px-4 py-3">Baki</th>
            <th scope="col" class="px-4 py-3">Penalt</th>
          
        </tr>
    </thead>
    <tbody>
    
          <?php @$loan_desc = $this->queries->get_total_pay_description_acount_statement($loan_id); ?>

 
      
<?php
// echo "<pre>";
// print_r($loan_desc);
// echo "<pre>";

?>
    

            <?php foreach ($loan_desc as $payisnulls): ?>
                      <tr class="font-bold text-gray-900 dark:text-white bg-gray-100 dark:bg-gray-700 border-b border-gray-200 dark:border-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">

                          <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $payisnulls->date_data; ?></td>
                          <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">  <?php echo $payisnulls->emply; ?>
                          <?php if ($payisnulls->emply == TRUE) {   
                           ?>
                           /
                       <?php }else{ ?>
                        <?php } ?>
                           <?php echo $payisnulls->description; ?>
                           <?php if($payisnulls->p_method == TRUE){ ?>
                            /<?php echo $payisnulls->account_name; ?>
                            <?php }else{ ?> 
                                 
                                <?php } ?>
                           <?php if ($payisnulls->fee_id == TRUE || $payisnulls->fee_id == '0' ) {
                          ?>
                          / <?php echo $payisnulls->fee_desc; ?> <?php echo $payisnulls->fee_percentage; ?> <?php echo $payisnulls->symbol; ?>
                      <?php }else{ ?>
                        <?php } ?>
                        <?php if($payisnulls->p_method == FALSE){ ?>
                        <?php }else{ ?>
                           / 
                           <?php } ?>
                           <?php //echo @$payisnulls->description; ?>  <?php echo @$payisnulls->loan_name ; ?>
                     <?php if(@$payisnulls->day == 1){
                       echo "Daily";
                }elseif(@$payisnulls->day == 7){
                     echo "Weekly";
                }elseif (@$payisnulls->day == 30 || @$payisnulls->day == 31 || @$payisnulls->day == 28 || @$payisnulls->day == 29) {
                    echo "Monthly";
                 ?> 
                <?php } ?><?php //echo $payisnulls->session; ?>  / AC/No. <?php echo @$payisnulls->loan_code; ?>
                    
                </td>

                          <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?php if($payisnulls->depost == TRUE){ ?>
                            <?php echo round(@$payisnulls->depost,2); ?>
                        <?php }elseif($payisnulls->depost == FALSE){ ?>
                        0.00
                            <?php } ?>
                        </td>
                          <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?php if (@$payisnulls->withdrow == TRUE) {
                             ?>
                            <?php echo round(@$payisnulls->withdrow,2); ?>
                            <?php }elseif (@$payisnulls->withdrow == FALSE) {
                             ?>
                             0.00
                        <?php } ?>
                        </td>
                          <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?php if (@$payisnulls->balance == TRUE) {
                             ?>
                            <?php echo round(@$payisnulls->balance,2); ?>
                            <?php }elseif (@$payisnulls->balance == FALSE) {
                             ?>
                             0.00
                             <?php } ?>
                        </td> 
                        <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                           <?php if (@$payisnulls->rem_debt == TRUE || @$payisnulls->rem_debt == '0') {
                             ?>
                            <?php echo @$payisnulls->rem_debt ?>
                        <?php }else{ ?>
                            -
                            <?php } ?> 
<td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
<?php
$penalty_amount = 0;

// Track index and total for oldest 3-row condition
static $row_index = 0;
$total_rows = count($loan_desc);
$row_index++;

// Only calculate penalty if not one of the 3 oldest rows
if ($row_index <= ($total_rows - 3)) {
    // Skip penalty if description is "SYSTEM WITHDRAWAL" and fee_id is not null
    if (
        isset($payisnulls->description, $payisnulls->fee_id) &&
        strtoupper(trim($payisnulls->description)) === 'SYSTEM WITHDRAWAL' &&
        !empty($payisnulls->fee_id)
    ) {
        $penalty_amount = 0;
    } else {
        if (
            !empty($payisnulls->penat_status) &&
            strtoupper(trim($payisnulls->penat_status)) === 'YES' &&
            isset($payisnulls->action_penart, $payisnulls->restration, $payisnulls->penart)
        ) {
            $deposit    = floatval($payisnulls->depost ?? 0);
            $withdraw   = isset($payisnulls->withdrow) ? floatval($payisnulls->withdrow) : null;
            $restration = floatval($payisnulls->restration);
            $penart     = floatval($payisnulls->penart);
            $action     = strtoupper(trim($payisnulls->action_penart));

            if ($withdraw !== null && $withdraw == $restration) {
                $penalty_amount = 0;
            } else {
                if ($action === 'PERCENTAGE VALUE') {
                    if ($deposit == 0) {
                        $penalty_amount = ($penart / 100) * $restration;
                    } elseif ($deposit < $restration) {
                        $penalty_amount = $restration / 2;
                    }
                } elseif ($action === 'MONEY VALUE') {
                    if ($deposit == 0) {
                        $penalty_amount = $penart;
                    } elseif ($deposit < $restration) {
                        $penalty_amount = $penart / 2;
                    }
                }
            }
        }
    }
} else {
    // Skip for the 3 oldest rows
    $penalty_amount = 0;
}

// Output
echo ($penalty_amount > 0)
    ? '<span class="text-red-500 font-bold">' . number_format($penalty_amount, 2) . '</span>'
    : '-';
?>

</td>



                      
                          </tr>
                    <?php endforeach; ?>
    
    </tbody>
 
</table>

            </div>
          
        </div>
    </div>
    </section>


</div>
</div>
<!-- ========== END MAIN CONTENT BODY ========== -->

<?php
include_once APPPATH . "views/partials/footer.php";
?>
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
        placeholder: "Select",
        allowClear: true,
        width: '100%',
        dropdownCssClass: 'custom-select2-dropdown',
        containerCssClass: 'custom-select2-container'
    };

    $('#branchSelect').select2({...selectConfig, placeholder: "Select Branch"});
    $('#employeeSelect').select2({...selectConfig, placeholder: "Select Employee"});

    $('#branchSelect').on('change', function () {
        const branchId = $(this).val();

        $.post('fetch_employee_blanch', { blanch_id: branchId }, function (data) {
            const employeeSelect = $('#employeeSelect');
            employeeSelect.html(data).select2({...selectConfig, placeholder: "Select Employee"});

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



















