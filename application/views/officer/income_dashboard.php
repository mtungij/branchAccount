



<?php
include_once APPPATH . "views/partials/officerheader.php";
?>

<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
<div class="p-4 sm:p-6 space-y-6">

<!-- Page Title / Subheader -->
<div class="mb-6">
<h2 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-200">
Record Penalty
</h2>
<p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
Record Penalty For Customer.
</p>
</div>
<!-- End Page Title / Subheader -->

<?php // Flash Messages ?>
<?php if ($success = $this->session->flashdata('massage')): ?>
<!-- Success Alert -->
<div class="bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert">
<div class="flex">
<div class="flex-shrink-0">
<span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-teal-100 bg-teal-200 text-teal-800 dark:border-teal-900 dark:bg-teal-800 dark:text-teal-500">
<svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="m9 12 2 2 4-4"/></svg>
</span>
</div>
<div class="ms-3">
<h3 class="text-gray-800 font-semibold dark:text-white">Success</h3>
<p class="mt-2 text-sm text-gray-700 dark:text-gray-400"><?php echo $success; ?></p>
</div>
<div class="ps-3 ms-auto">
<div class="-mx-1.5 -my-1.5">
<button type="button" class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none" data-hs-remove-element="[role=alert]">
<span class="sr-only">Dismiss</span>
<svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
</button>
</div>
</div>
</div>
</div>
<?php endif; ?>

<?php if ($error = $this->session->flashdata('error')): ?>
<!-- Error Alert -->
<div class="bg-red-100 border border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500" role="alert">
<div class="flex">
<div class="flex-shrink-0">
<span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-red-100 bg-red-200 text-red-800 dark:border-red-900 dark:bg-red-800 dark:text-red-500">
<svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12" y2="16"/></svg>
</span>
</div>
<div class="ms-3">
<h3 class="text-gray-800 font-semibold dark:text-white">Error</h3>
<p class="mt-2 text-sm text-gray-700 dark:text-gray-400"><?php echo $error; ?></p>
</div>
<div class="ps-3 ms-auto">
<div class="-mx-1.5 -my-1.5">
<button type="button" class="inline-flex bg-red-50 rounded-lg p-1.5 text-red-500 hover:bg-red-100 focus:outline-none" data-hs-remove-element="[role=alert]">
<span class="sr-only">Dismiss</span>
<svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
</button>
</div>
</div>
</div>
</div>
<?php endif; ?>

<!-- Card: Register Share Holder Form -->
<div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
<div class="p-4 md:p-6">
<!-- <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-6">
Register New Customer
</h3> -->
<?php echo form_open(base_url("oficer/create_income_detail"), ['novalidate' => true]); ?>


<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

  <!-- Customer -->
  <div>
    <label for="customer" class="block text-sm font-medium mb-2 text-gray-900 dark:text-gray-300">
      * Select Customer:
    </label>
    <select id="customer" name="customer_id" class="select2 block w-full ...">
      <option value="">Select customer</option>
      <?php foreach ($customer as $customers): ?>
        <option value="<?php echo $customers->customer_id; ?>">
          <?php echo $customers->f_name . " " . $customers->m_name . " " . $customers->l_name; ?>
        </option>
      <?php endforeach; ?>
    </select>
    <?php echo form_error("customer_id", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
  </div>

  <!-- Active Loan -->
  <div>
    <label for="loan" class="block text-sm font-medium mb-2 text-gray-900 dark:text-gray-300">
      * Active Loan:
    </label>
    <select name="loan_id" id="loan" required class="select2 block w-full ...">
      <option value="">Select Active Loan</option>
    </select>
    <?php echo form_error("loan_id", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
  </div>

  <!-- Income Type -->
  <div>
    <label for="inc_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
      Income Type
    </label>
    <select id="inc_id" name="inc_id" class="block w-full ...">
      <option value="">Select Income type</option>
      <?php foreach ($income as $incomes): ?>
        <option value="<?php echo $incomes->inc_id; ?>"><?php echo $incomes->inc_name; ?></option>
      <?php endforeach; ?>
    </select>
    <?php echo form_error("inc_id", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
  </div>

  <!-- Amount -->
  <div>
    <label for="receve_amount" class="block text-sm font-medium mb-2 text-gray-900 dark:text-gray-300">
      * Amount:
    </label>
    <input type="text" id="receve_amount" name="receve_amount" value="<?php echo set_value('receve_amount'); ?>" class="block w-full ..." autocomplete="off">
    <?php echo form_error("receve_amount", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
  </div>

</div>

<input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">
<input type="hidden" name="blanch_id" value="<?php echo $empl_data->blanch_id; ?>">
<input type="hidden" name="empl" value="<?php echo $_SESSION['username']; ?>">
<input type="hidden" name="receve_day" value="<?php echo date("Y-m-d"); ?>">

<div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
  <div class="flex justify-center gap-x-2">
    <button type="submit" class="py-2 px-4 btn-primary-sm bg-cyan-800 hover:bg-cyan-700 text-white">
      Submit
    </button>
  </div>
</div>
<?php echo form_close(); ?>




</div>
</div>

<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
<div class="w-full">
<!-- Start coding here -->
<div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
<div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
<div class="w-full md:w-1/2">
<form class="flex items-center">
<label for="simple-search" class="sr-only">Search</label>
<div class="relative w-full">
<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
</div>
<input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" 
placeholder="tafuta mteja hapa"
data-hs-datatable-search="#shareholder_table"
aria-label="Search share holders"
>
</div>
</form>
</div>
<div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">


<a
href="<?php echo base_url("oficer/print_penalt"); ?>"
class="w-full md:w-auto flex items-center justify-center px-3 py-2 text-sm font-medium text-white bg-cyan-600 hover:bg-cyan-700 rounded-lg focus:outline-none focus:ring-4 focus:ring-cyan-300 dark:focus:ring-cyan-800" target="_blank"
>
<span class="bg-cyan-200 p-1 rounded mr-2">
<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"
xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
<path
d="M14 2H6a2 2 0 00-2 2v16c0 1.104.896 2 2 2h12a2 2 0 002-2V8l-6-6zM13 3.5L18.5 9H13V3.5zM10 14h1v4h-1v-4zm-2.5 0H9v1.5H8v.5h1v1H7.5V14zm7 0H15a1 1 0 110 2h-.5v2H13v-4z" />
</svg>
</span>
Print PDF
</a>

</div>
</div>
<div class="overflow-x-auto">

<table id="shareholder_table" class="w-full text-sm text-left text-gray-500 dark:text-gray-200">
<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-cyan-600 dark:text-white">
<tr>
<th scope="col" class="px-4 py-3">S/No</th>
<th scope="col" class="px-4 py-3">Customer Name</th>
<th scope="col" class="px-4 py-3">Phone Number</th>
<th scope="col" class="px-4 py-3">Income Type</th>
<th scope="col" class="px-4 py-3">Income Amount</th>
<th scope="col" class="px-4 py-3">Received By</th>
<th scope="col" class="px-4 py-3">Date</th>



</tr>
</thead>

<tbody>
<?php if (!empty($detail_income)): ?>
    <?php 
    $sno = 1; 
    $total_receve = 0; 
    ?>
    <?php foreach ($detail_income as $detail_incomes): ?>
        <?php $total_receve += $detail_incomes->receve_amount; ?>
        <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
            <td class="px-4 py-2">
                <span class=" text-cyan-800 text-xs font-medium px-2 py-0.5 rounded dark:text-white">
                    <?= $sno++; ?>
                </span>
            </td>
            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <?= $detail_incomes->f_name . ' ' . $detail_incomes->m_name . ' ' . $detail_incomes->l_name; ?>
            </td>
            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <?= $detail_incomes->phone_no; ?>
            </td>
            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <?= $detail_incomes->inc_name; ?>
            </td>
            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <?= number_format($detail_incomes->receve_amount); ?>
            </td>
            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <?= $detail_incomes->empl; ?>
            </td>
            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <?= $detail_incomes->receve_day; ?>
            </td>
            <td class="px-4 py-2"></td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="8" class="px-4 py-3 text-center text-gray-500 dark:text-gray-200">
            Hakuna taarifa za leo.
        </td>
    </tr>
<?php endif; ?>
</tbody>

<?php if (!empty($detail_income)): ?>
 <tfoot class="font-bold text-gray-900 dark:text-white bg-gray-100 dark:bg-gray-700">
    <tr>
        <td colspan="4" class="px-4 py-3 text-right">JUMLA</td>
        <td class="px-4 py-3"><b><?= number_format($total_receve) ?></b></td>
        <td colspan="3"></td>
    </tr>
</tfoot> 
<?php endif; ?>



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

<?php // Script for cmd+a fix for DataTables search input (if used) ?>

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

$('#branchSelect').select2({...selectConfig, placeholder: "Select Customer"});
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

<script>
$(document).ready(function(){
$('#blanch').change(function(){
var blanch_id = $('#blanch').val();
//alert(blanch_id)
if(blanch_id != ''){

$.ajax({
url:"<?php echo base_url(); ?>admin/fetch_ward_data",
method:"POST",
data:{blanch_id:blanch_id},
success:function(data)
{
$('#customer').html(data);
//$('#district').html('<option value="">All</option>');
}
});
}
else
{
$('#customer').html('<option value="">Select customer</option>');
//$('#district').html('<option value="">All</option>');
}
});

$('#customer').change(function(){
var customer_id = $('#customer').val();
//alert(customer_id)
if(customer_id != '')
{
$.ajax({
url:"<?php echo base_url(); ?>oficer/fetch_loanActive",
method:"POST",
data:{customer_id:customer_id},
success:function(data)
{
$('#loan').html(data);
//$('#malipo_name').html('<option value="">select center</option>');
}
});
}
else
{
$('#loan').html('<option value="">Select Active loan</option>');
//$('#malipo_name').html('<option value="">chagua vipimio</option>');
}
});

// $('#social').change(function(){
// var district_id = $('#social').val();
// if(district_id != '')
// {
// $.ajax({
// url:"<?php echo base_url(); ?>user/fetch_data_malipo",
// method:"POST",
// data:{district_id:district_id},
// success:function(data)
// {
// $('#malipo_name').html(data);
// //$('#malipo').html('<option value="">chagua malipo</option>');
// }
// });
// }
// else
// {
// //$('#vipimio').html('<option value="">chagua vipimio</option>');
// $('#malipo_name').html('<option value="">chagua vipimio</option>');
// }
// });

});
</script>

<script>
$('.select2').select2();
</script>

<script>
  const amountInput = document.getElementById('receve_amount');
  const form = document.querySelector('form');

  // Function to format the input as money while typing
  amountInput.addEventListener('input', function (e) {
    let value = e.target.value;

    // Remove all characters except numbers and decimal
    value = value.replace(/[^\d.]/g, '');

    // Allow only one decimal point
    const parts = value.split('.');
    if (parts.length > 2) {
      value = parts[0] + '.' + parts[1];
    }

    // Format integer part with commas
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    value = parts.join('.');

    e.target.value = value;
  });

  // Before form submission, remove formatting (commas)
  form.addEventListener('submit', function () {
    let rawValue = amountInput.value.replace(/,/g, '');
    amountInput.value = rawValue;
  });
</script>









