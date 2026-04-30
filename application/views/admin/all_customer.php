
<?php
include_once APPPATH . "views/partials/header.php";

$is_super_admin = ($this->session->userdata('role') === 'admin');
$can_customer_view = true;
$can_customer_delete = true;

$registered_today_count = 0;
if (isset($customer) && is_array($customer) && !empty($customer)) {
    $today = date('Y-m-d');
    foreach ($customer as $c) {
        $registered_raw = !empty($c->customer_day) ? $c->customer_day : (!empty($c->reg_date) ? $c->reg_date : '');
        if (!empty($registered_raw) && substr((string) $registered_raw, 0, 10) === $today) {
            $registered_today_count++;
        }
    }
}

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

<link rel="stylesheet" href="<?php echo base_url('assets/css/ select2.min.css'); ?>">
<style>
    .select2-container {
        min-width: 220px;
    }

    .select2-container .select2-selection--single {
        height: 42px;
        border: 1px solid rgb(209 213 219);
        border-radius: 0.5rem;
        display: flex;
        align-items: center;
        background-color: rgb(249 250 251);
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: rgb(17 24 39);
        line-height: 40px;
        padding-left: 12px;
        padding-right: 32px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 40px;
        right: 8px;
    }

    .select2-dropdown {
        border: 1px solid rgb(34 211 238);
        border-radius: 0.5rem;
        background-color: #ffffff !important;
        color: rgb(17 24 39) !important;
    }

    .select2-search__field {
        border: 1px solid rgb(209 213 219) !important;
        border-radius: 0.375rem !important;
        padding: 6px 8px !important;
        background-color: #ffffff !important;
        color: rgb(17 24 39) !important;
    }

    .select2-container--default .select2-results > .select2-results__options {
        background-color: #ffffff !important;
        color: rgb(17 24 39) !important;
    }

    .select2-results__option--highlighted {
        background-color: rgb(8 145 178) !important;
    }
</style>


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

                  <!-- Branch filter -->
                  <select id="filter-branch" class="select2-branch-filter bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block px-3 py-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-cyan-500">
                    <option value=""><?php echo $this->lang->line('all_branches'); ?></option>
                    <?php foreach ($blanch as $b): ?>
                      <option value="<?php echo htmlspecialchars($b->blanch_name, ENT_QUOTES, 'UTF-8'); ?>">
                        <?php echo htmlspecialchars($b->blanch_name, ENT_QUOTES, 'UTF-8'); ?>
                      </option>
                    <?php endforeach; ?>
                  </select>

                  <!-- Status filter -->
                  <select id="filter-status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block px-3 py-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-cyan-500">
                    <option value=""><?php echo $this->lang->line('all_statuses'); ?></option>
                    <option value="open"><?php echo $this->lang->line('active'); ?></option>
                    <option value="close"><?php echo $this->lang->line('done'); ?></option>
                    <option value="pending"><?php echo $this->lang->line('pending'); ?></option>
                    <option value="out"><?php echo $this->lang->line('default'); ?></option>
                  </select>

                  <!-- PDF export -->
                  <a id="pdf-export-btn"
                     href="<?php echo base_url('admin/export_all_customer_pdf'); ?>"
                     target="_blank"
                     class="inline-flex items-center gap-x-2 rounded-lg bg-red-600 px-3 py-2 text-sm font-semibold text-white hover:bg-red-700">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586L7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z"/>
                    </svg>
                    <?php echo $this->lang->line('download_pdf'); ?>
                  </a>

                                      <span class="inline-flex items-center gap-x-2 rounded-lg border border-emerald-200 bg-emerald-50 px-3 py-2 text-sm font-semibold text-emerald-800 ring-1 ring-emerald-200/70 dark:border-emerald-500/50 dark:bg-emerald-500/20 dark:text-white dark:ring-emerald-400/40">
                                        Registered Today
                                        <span class="inline-flex min-w-6 justify-center rounded-full bg-white/80 px-2 py-0.5 text-xs dark:bg-gray-900/70"><?php echo (int) $registered_today_count; ?></span>
                                    </span>

                </div>
            </div>
            <div class="overflow-x-auto">
                <table id="shareholder_table"  class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="border-y border-cyan-200 bg-cyan-50 text-xs uppercase text-cyan-900 dark:border-cyan-500 dark:bg-cyan-600 dark:text-white">
                        <tr>
                 <th scope="col" class="border-b border-cyan-200 px-4 py-3 dark:border-cyan-500">S/No</th>
							<th scope="col" class="border-b border-cyan-200 px-4 py-3 dark:border-cyan-500"><?php echo $this->lang->line('customer_name'); ?></th>
               <th scope="col" class="border-b border-cyan-200 px-4 py-3 dark:border-cyan-500"><?php echo $this->lang->line('branch_name'); ?></th>
               <th scope="col" class="border-b border-cyan-200 px-4 py-3 dark:border-cyan-500"><?php echo $this->lang->line('phone_number'); ?></th>
					 <th scope="col" class="border-b border-cyan-200 px-4 py-3 dark:border-cyan-500"><?php echo $this->lang->line('status'); ?></th>
                     <th scope="col" class="border-b border-cyan-200 px-4 py-3 dark:border-cyan-500">Date Registered</th>
							<th scope="col" class="border-b border-cyan-200 px-4 py-3 dark:border-cyan-500"><?php echo $this->lang->line('action'); ?></th> 
                        </tr>
                    </thead>
					<tbody>
  <?php $no = 1; ?>
                                    <?php if (isset($customer ) && is_array($customer ) && !empty($customer )): ?>
                                        <?php foreach ($customer  as $customers): ?>
                <?php
                    $registered_raw = !empty($customers->customer_day) ? $customers->customer_day : (!empty($customers->reg_date) ? $customers->reg_date : '');
                    $registered_date = !empty($registered_raw) ? date('Y-m-d', strtotime($registered_raw)) : '-';
                ?>
        <tr class="border-b dark:border-gray-700"
            data-branch="<?php echo htmlspecialchars($customers->blanch_name, ENT_QUOTES, 'UTF-8'); ?>"
            data-status="<?php echo htmlspecialchars($customers->customer_status, ENT_QUOTES, 'UTF-8'); ?>">
            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $no++ ?></th>
            <td class="uppercase px-4 py-3 dark:text-white">
            <?php echo htmlspecialchars($customers->f_name, ENT_QUOTES, 'UTF-8'); ?> <?php echo htmlspecialchars($customers->m_name, ENT_QUOTES, 'UTF-8'); ?> <?php echo htmlspecialchars($customers->l_name, ENT_QUOTES, 'UTF-8'); ?>
            </td>
            <td class="px-4 py-3 dark:text-white"><?php echo ucfirst(htmlspecialchars($customers->blanch_name, ENT_QUOTES, 'UTF-8')); ?></td>
                        <td class="px-4 py-3 dark:text-white"><?php echo ucfirst(htmlspecialchars($customers->phone_no, ENT_QUOTES, 'UTF-8')); ?></td>
            <td class="px-4 py-3 dark:text-white">
                  <?php if ($customers->customer_status == 'open') {
        ?>
                <a href="#" class="inline-flex items-center rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-800 ring-1 ring-emerald-200/80 dark:bg-emerald-500/20 dark:text-emerald-100 dark:ring-emerald-400/40"><?php echo $this->lang->line('active'); ?></a>
       <?php }elseif ($customers->customer_status == 'close') {
        ?>
                <a href="#" class="inline-flex items-center rounded-full bg-sky-100 px-2.5 py-1 text-xs font-semibold text-sky-800 ring-1 ring-sky-200/80 dark:bg-sky-500/20 dark:text-sky-100 dark:ring-sky-400/40"><?php echo $this->lang->line('done'); ?></a>
        <?php }elseif($customers->customer_status == 'pending'){
         ?>
                 <a href="#" class="inline-flex items-center rounded-full bg-amber-100 px-2.5 py-1 text-xs font-semibold text-amber-800 ring-1 ring-amber-200/80 dark:bg-amber-500/20 dark:text-amber-100 dark:ring-amber-400/40"><?php echo $this->lang->line('pending'); ?></a>
         <?php }elseif ($customers->customer_status == 'out') {
          ?>
                    <a href="#" class="inline-flex items-center rounded-full bg-rose-100 px-2.5 py-1 text-xs font-semibold text-rose-800 ring-1 ring-rose-200/80 dark:bg-rose-500/20 dark:text-rose-100 dark:ring-rose-400/40"><?php echo $this->lang->line('default'); ?></a>
          <?php } ?>
            </td>
                        <td class="px-4 py-3 dark:text-white"><?php echo htmlspecialchars($registered_date, ENT_QUOTES, 'UTF-8'); ?></td>

           <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
        <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
            <button id="hs-table-action-sh-<?php echo $customers->id; ?>" type="button" class="hs-dropdown-toggle py-1.5 px-2.5 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700"><?php echo $this->lang->line('action'); ?><svg class="hs-dropdown-open:rotate-180 size-2.5" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></button>
            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-40 z-20 bg-white shadow-2xl rounded-lg p-2 mt-2 dark:divide-gray-700 dark:bg-gray-800 dark:border dark:border-gray-700" aria-labelledby="hs-table-action-sh-<?php echo $customers->id; ?>">

    <div class="py-2 first:pt-0 last:pb-0">
        <span class="block py-2 px-3 text-xs font-medium uppercase text-gray-400 dark:text-gray-500"><?php echo $this->lang->line('choose_an_option'); ?></span>
        <?php if ($can_customer_view): ?>
        <a href="<?php echo base_url("admin/view_more_customer/{$customers->customer_id}") ?>" class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-cyan-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
    </svg>
    <?php echo $this->lang->line('view_more'); ?>
</a>
<?php endif; ?>


<?php if ($can_customer_delete): ?>
<a href="<?php echo base_url("admin/delete_customerData/{$customers->customer_id}") ?>"
    onclick="return confirm('<?php echo $this->lang->line('confirm_delete_customer'); ?>')"
   class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-cyan-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
    
    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 0a1 1 0 00-1 1v1h6V4a1 1 0 00-1-1m-4 0h4" />
    </svg>
    <?php echo $this->lang->line('delete'); ?>
</a>
<?php endif; ?>

    </div>
            </div>
        </div>
    </td>

           
      

        </tr>
    <?php endforeach; ?>





</tbody>

                </table>


                      <div id="hs-edit-shareholder-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
                <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all lg:max-w-3xl lg:w-full m-3 lg:mx-auto"> <?php // Wider modal for more fields ?>
                    <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                            <h3 class="font-bold text-gray-800 dark:text-white">Edit Staff</h3>
                            <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" ><span class="sr-only">Close</span><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg></button>
                        </div>
                        <div class="p-4 sm:p-6 overflow-y-auto">
						<?php echo form_open("admin/filter_customer_status"); ?>
                        <div class="sm:col-span-4">
                            <label for="blanch_id" class="block text-sm font-medium mb-2 dark:text-gray-300">*Branch Name:</label>
                            <select id="blanch_id" name="blanch_id" 
                                    data-hs-select='{
									"hasSearch": true,
                                        "placeholder": "Select branch",
                                        "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-gray-200\" data-title></span></button>",
                                        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2.5 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:ring-gray-600",
                                        "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-50 w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto dark:bg-gray-800 dark:border-gray-700",
                                        "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:hover:bg-gray-700 dark:text-gray-200 dark:focus:bg-gray-700",
                                        "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-gray-200\" data-title></div></div></div>",
                                        "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-gray-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                      }'>
								<option value="">Select Branch</option>
								<?php foreach ($blanch as $blanchs): ?>
                                    <option value="<?php echo $blanchs->blanch_id; ?>"><?php echo $blanchs->blanch_name; ?> </option>
                               <?php endforeach; ?>
							

                            </select>
                            
                        </div>

                        <div classol-span-4">
                            <label for="empl_sex" class="block text-sm font-medium mb-2 dark:text-gray-300">* Gender:</label>
                            <select id="empl_sex" name="customer_status" required
                                    data-hs-select='{
                                        "placeholder": "Select gender",
                                        "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-gray-200\" data-title></span></button>",
                                        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2.5 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:ring-gray-600",
                                        "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-50 w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto dark:bg-gray-800 dark:border-gray-700",
                                        "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:hover:bg-gray-700 dark:text-gray-200 dark:focus:bg-gray-700",
                                        "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-gray-200\" data-title></div></div></div>",
                                        "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-gray-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                      }'>
                                <option value="">Select gender</option>
                                <option value="pending" <?php echo set_select('empl_sex', 'pending'); ?>>PENDING</option>
                                <option value="open" <?php echo set_select('empl_sex', 'open'); ?>>ACTIVE</option>
                                <option value="close" <?php echo set_select('empl_sex', 'close'); ?>>CLOSED</option>
                            </select>
   
                        </div>

                        <input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">

					
                                <div class="mt-6 flex justify-end items-center gap-x-2 py-3">
                                    <button type="button" class="py-2 px-3 btn-secondary-sm" data-hs-overlay="#hs-edit-shareholder-modal">Close</button>
                                    <button type="submit" class="py-2 px-3 btn-primary-sm bg-cyan-600 hover:bg-cyan-700 text-white">Update</button>
                                </div>
                            <?php echo form_close(); ?>
                      /div>
                    </div>
                </div>
            </div>
         
     
       
        <?php endif; ?>




            </div>
          
        </div>
    </div>
    </section>

	</div>
  </div>


  <?php
  include_once APPPATH . "views/partials/footer.php";
  ?>

<script src="<?php echo base_url('assets/js/select2.min.js'); ?>"></script>

<script>
$(document).ready(function(){
if ($.fn.select2) {
    $('#filter-branch').select2({
        placeholder: '<?php echo $this->lang->line('all_branches'); ?>',
        allowClear: true,
        width: '220px'
    });
}

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
$('#empl').html('<option value="">Select Employee</option>');
//$('#district').html('<option value="">All</option>');
}
});

});
</script>


  <script>
  (function () {
    var branchSel = document.getElementById('filter-branch');
    var statusSel = document.getElementById('filter-status');
    var pdfBtn    = document.getElementById('pdf-export-btn');
    var baseUrl   = '<?php echo base_url('admin/export_all_customer_pdf'); ?>';

    function buildPdfUrl() {
      var params = [];
      if (branchSel.value) params.push('blanch_name=' + encodeURIComponent(branchSel.value));
      if (statusSel.value) params.push('status='      + encodeURIComponent(statusSel.value));
      pdfBtn.href = baseUrl + (params.length ? '?' + params.join('&') : '');
    }

    function applyFilters() {
      var branch = branchSel.value.toLowerCase();
      var status = statusSel.value.toLowerCase();
      var rows   = document.querySelectorAll('#shareholder_table tbody tr');
      rows.forEach(function (row) {
        var rowBranch = (row.getAttribute('data-branch') || '').toLowerCase();
        var rowStatus = (row.getAttribute('data-status') || '').toLowerCase();
        var show = (!branch || rowBranch === branch) && (!status || rowStatus === status);
        row.style.display = show ? '' : 'none';
      });
      buildPdfUrl();
    }

    branchSel.addEventListener('change', applyFilters);
    statusSel.addEventListener('change', applyFilters);
  })();
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







		




