<?php
include_once APPPATH . "views/partials/header.php";

$resolve_customer_passport = function ($value, $default_rel = 'assets/img/customer21.png') {
  $default_src = base_url($default_rel);

  if (empty($value)) {
    return $default_src;
  }

  $raw = trim((string) $value);
  if ($raw === '') {
    return $default_src;
  }

  if (preg_match('#^(https?://|data:image/)#i', $raw)) {
    return $raw;
  }

  $candidates = [$raw];
  if (strpos($raw, 'assets/') !== 0) {
    $candidates[] = 'assets/img/' . $raw;
    $candidates[] = 'assets/passport/' . $raw;
    $candidates[] = 'assets/images/passport/' . $raw;
  }

  foreach ($candidates as $candidate) {
    $relative = ltrim($candidate, '/');
    if (file_exists(FCPATH . $relative)) {
      return base_url($relative);
    }
  }

  return $default_src;
};

$customerPassportValue = $customer_profile->customer_passport ?? ($customer_profile->passport ?? '');
$customer_passport_src = $resolve_customer_passport($customerPassportValue, 'assets/img/customer21.png');
?>

<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64 bg-gray-50 dark:bg-gray-900">
  <div class="p-4 sm:p-6 space-y-6">

    <div class="relative overflow-hidden rounded-3xl border border-cyan-100 bg-gradient-to-br from-cyan-50 via-white to-blue-50 p-6 shadow-sm dark:border-cyan-900 dark:from-gray-900 dark:via-gray-800 dark:to-slate-900">
      <div class="absolute -right-10 -top-10 h-40 w-40 rounded-full bg-cyan-200/40 blur-3xl dark:bg-cyan-800/20"></div>
      <div class="absolute -bottom-10 -left-10 h-40 w-40 rounded-full bg-blue-200/40 blur-3xl dark:bg-blue-800/20"></div>
      <div class="relative flex flex-col gap-5 md:flex-row md:items-center md:justify-between">
        <div class="flex items-center gap-4">
          <div class="h-16 w-16 overflow-hidden rounded-2xl border-2 border-white bg-white shadow-md dark:border-gray-700 dark:bg-gray-700">
            <img class="h-full w-full object-cover" src="<?= $customer_passport_src ?>" alt="Customer image">
          </div>
          <div>
            <h2 class="text-2xl font-bold uppercase tracking-wide text-slate-900 dark:text-white"><?= $customer_profile->f_name ." ". $customer_profile->m_name ." ". $customer_profile->l_name ?></h2>
            <p class="text-sm font-medium text-slate-500 dark:text-slate-300"><?php echo $this->lang->line('customer'); ?> ID: <?php echo $customer_profile->customer_id; ?></p>
          </div>
        </div>
        <div class="inline-flex items-center rounded-2xl border border-cyan-200 bg-white/80 p-1 shadow-sm dark:border-cyan-700 dark:bg-gray-800">
          <button class="tab-btn rounded-xl px-4 py-2 text-sm font-semibold text-slate-600 transition-colors hover:text-blue-700 dark:text-slate-300 dark:hover:text-cyan-300 data-[active=true]:bg-cyan-600 data-[active=true]:text-white" data-active="true" data-tab="profile">Personal Information</button>
          <button class="tab-btn rounded-xl px-4 py-2 text-sm font-semibold text-slate-600 transition-colors hover:text-blue-700 dark:text-slate-300 dark:hover:text-cyan-300" data-tab="experience">All Loans</button>
        </div>
      </div>
    </div>

    <div id="tab-profile" class="tab-content w-full overflow-hidden rounded-3xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
      <div class="border-b border-gray-200 bg-gray-50/80 px-6 py-4 dark:border-gray-700 dark:bg-gray-800/80">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Customer Profile Editor</h3>
      </div>
      <div class="p-6">
        <?php echo form_open("admin/update_customer_details/{$customer_profile->customer_id}"); ?>
          <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            <div>
              <label for="f_name" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">* First Name</label>
              <input type="text" id="f_name" name="f_name" placeholder="Full name" autocomplete="off" required class="block w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm uppercase focus:border-cyan-500 focus:ring-cyan-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200" value="<?php echo $customer_profile->f_name; ?>">
              <?php echo form_error("f_name", '<p class="mt-2 text-xs text-red-600">', '</p>'); ?>
            </div>

            <div>
              <label for="m_name" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">* Middle Name</label>
              <input type="text" id="m_name" name="m_name" placeholder="Full name" autocomplete="off" required class="block w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm uppercase focus:border-cyan-500 focus:ring-cyan-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200" value="<?php echo $customer_profile->m_name; ?>">
              <?php echo form_error("m_name", '<p class="mt-2 text-xs text-red-600">', '</p>'); ?>
            </div>

            <div>
              <label for="l_name" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">* Last Name</label>
              <input type="text" id="l_name" name="l_name" placeholder="Full name" autocomplete="off" required class="block w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm uppercase focus:border-cyan-500 focus:ring-cyan-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200" value="<?php echo $customer_profile->l_name; ?>">
              <?php echo form_error("l_name", '<p class="mt-2 text-xs text-red-600">', '</p>'); ?>
            </div>

            <div>
              <label for="phone_no" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">* Mobile Number</label>
              <input type="number" id="phone_no" name="phone_no" placeholder="Mobile no" autocomplete="off" required class="block w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200" value="<?php echo $customer_profile->phone_no; ?>">
              <?php echo form_error("phone_no", '<p class="mt-2 text-xs text-red-600">', '</p>'); ?>
            </div>

            <div>
              <label for="blanch" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">* Chagua Tawi</label>
              <select id="blanch" name="blanch_id" class="block w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200">
                <?php foreach ($blanch as $blanchs): ?>
                  <option value="<?php echo $blanchs->blanch_id; ?>"><?php echo $blanchs->blanch_name; ?></option>
                <?php endforeach; ?>
              </select>
              <?php echo form_error("blanch_id", '<p class="mt-2 text-xs text-red-600">', '</p>'); ?>
            </div>

            <div>
              <label for="empl" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">* Chagua Staff</label>
              <select name="empl_id" id="empl" class="block w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200">
                <option value="<?php echo $customer_profile->empl_id; ?>"><?php echo $customer_profile->empl_name; ?></option>
                <option value="">Select Employee</option>
              </select>
              <?php echo form_error("empl_id", '<p class="mt-2 text-xs text-red-600">', '</p>'); ?>
            </div>
          </div>

          <div class="mt-8 border-t border-gray-200 pt-6 text-end dark:border-gray-700">
            <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-cyan-600 px-5 py-2.5 text-sm font-semibold text-white transition-colors hover:bg-cyan-700 focus:ring-2 focus:ring-cyan-500">Update Information</button>
          </div>
        <?php echo form_close(); ?>
      </div>
    </div>

    <!-- About Tab -->
    <div id="tab-about" class="tab-content hidden w-full bg-white dark:bg-gray-800 rounded shadow-xl overflow-hidden p-6">

    </div>

    <!-- Experience Tab -->
    <div id="tab-experience" class="tab-content hidden w-full bg-white dark:bg-gray-800 rounded shadow-xl overflow-hidden p-6 space-y-4">
      <div class="overflow-hidden rounded-3xl border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
        <div class="mb-6 flex items-center justify-between gap-3">
          <div class="flex items-center gap-2 text-gray-900 dark:text-white">
          <svg class="w-5 h-5 text-cyan-500" fill="currentColor" viewBox="0 0 20 20">
            <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/>
            <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"/>
          </svg>
          <h3 class="text-lg font-semibold"><?php echo $this->lang->line('customer_loans'); ?></h3>
          </div>
          <span class="rounded-full bg-cyan-50 px-3 py-1 text-xs font-semibold text-cyan-700 dark:bg-cyan-900 dark:text-cyan-200"><?php echo count($all_customer_loan); ?> records</span>
        </div>

        <?php if (isset($all_customer_loan) && !empty($all_customer_loan)): ?>
          <div class="overflow-x-auto rounded-2xl border border-gray-200 dark:border-gray-700">
            <table class="w-full min-w-[1200px] text-left text-sm text-gray-600 dark:text-gray-300">
              <thead class="bg-gray-100 text-xs uppercase tracking-wide text-gray-700 dark:bg-gray-700 dark:text-gray-200">
                <tr>
                  <th class="px-4 py-3">#</th>
                  <th class="px-4 py-3"><?php echo $this->lang->line('loan'); ?></th>
                  <th class="px-4 py-3"><?php echo $this->lang->line('staff_name'); ?></th>
                  <th class="px-4 py-3"><?php echo $this->lang->line('sponsor_name'); ?></th>
                  <th class="px-4 py-3"><?php echo $this->lang->line('loan_approved'); ?></th>
                  <th class="px-4 py-3"><?php echo $this->lang->line('principal_interest'); ?></th>
                  <th class="px-4 py-3"><?php echo $this->lang->line('duration_type'); ?></th>
                  <th class="px-4 py-3"><?php echo $this->lang->line('collection'); ?></th>
                  <th class="px-4 py-3"><?php echo $this->lang->line('start_date'); ?></th>
                  <th class="px-4 py-3"><?php echo $this->lang->line('end_date'); ?></th>
                  <th class="px-4 py-3"><?php echo $this->lang->line('status'); ?></th>
                  <th class="px-4 py-3"><?php echo $this->lang->line('action'); ?></th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-800">
                <?php $i = 1; ?>
                <?php foreach ($all_customer_loan as $loan_collections): ?>
                  <?php
                  $frequency = '';
                  if ($loan_collections->day == '1') {
                    $frequency = $this->lang->line('daily');
                  } elseif ($loan_collections->day == '7') {
                    $frequency = $this->lang->line('weekly');
                  } elseif (in_array($loan_collections->day, ['28', '29', '30', '31'])) {
                    $frequency = $this->lang->line('monthly');
                  }

                  $status = $loan_collections->loan_status;
                  switch ($status) {
                    case 'open':
                      $color = 'bg-yellow-100 text-yellow-800 border-yellow-300';
                      $label = $this->lang->line('pending');
                      break;
                    case 'aproved':
                      $color = 'bg-sky-100 text-sky-800 border-sky-300';
                      $label = $this->lang->line('approved');
                      break;
                    case 'withdrawal':
                      $color = 'bg-blue-100 text-blue-800 border-blue-300';
                      $label = $this->lang->line('active');
                      break;
                    case 'done':
                      $color = 'bg-green-100 text-green-800 border-green-300';
                      $label = $this->lang->line('done');
                      break;
                    case 'out':
                      $color = 'bg-red-100 text-red-800 border-red-300';
                      $label = $this->lang->line('default');
                      break;
                    case 'disbarsed':
                      $color = 'bg-gray-100 text-gray-800 border-gray-300';
                      $label = $this->lang->line('disbursed');
                      break;
                    default:
                      $color = 'bg-slate-100 text-slate-800 border-slate-300';
                      $label = ucfirst($status);
                  }

                  $sponsor_passport_path = '';
                  if (!empty($loan_collections->sp_id)) {
                    $sponsor_passport_files = glob(FCPATH . 'assets/sponser_passport/' . $loan_collections->sp_id . '.*');
                    $sponsor_passport_path = !empty($sponsor_passport_files) ? 'assets/sponser_passport/' . basename($sponsor_passport_files[0]) : '';
                  }
                  ?>
                  <tr class="hover:bg-cyan-50 dark:hover:bg-gray-700/70">
                    <td class="px-4 py-3 font-semibold text-gray-800 dark:text-gray-200"><?php echo $i++; ?></td>
                    <td class="px-4 py-3">
                      <span class="font-semibold text-gray-900 dark:text-white"><?php echo !empty($loan_collections->loan_id) ? 'LN-' . $loan_collections->loan_id : $this->lang->line('loan'); ?></span>
                    </td>
                    <td class="px-4 py-3"><?php echo $loan_collections->username ? htmlspecialchars($loan_collections->empl_name, ENT_QUOTES, 'UTF-8') : $this->lang->line('not_selected'); ?></td>
                    <td class="px-4 py-3">
                      <?php if ($loan_collections->sp_id != NULL): ?>
                        <div class="flex items-center gap-3">
                          <?php if (!empty($sponsor_passport_path) && file_exists(FCPATH . $sponsor_passport_path)): ?>
                            <img class="h-10 w-10 rounded-full border-2 border-orange-300 object-cover" src="<?php echo base_url($sponsor_passport_path); ?>" alt="<?php echo $this->lang->line('sponsor_passport'); ?>">
                          <?php else: ?>
                            <img class="h-10 w-10 rounded-full border-2 border-gray-200 object-cover" src="<?php echo base_url('assets/img/customer21.png'); ?>" alt="<?php echo $this->lang->line('default_image'); ?>">
                          <?php endif; ?>
                          <div>
                            <p class="font-semibold uppercase text-gray-900 dark:text-white"><?php echo htmlspecialchars($loan_collections->sp_name . ' ' . $loan_collections->sp_mname . ' ' . $loan_collections->sp_lname, ENT_QUOTES, 'UTF-8'); ?></p>
                            <p class="text-xs text-gray-500 dark:text-gray-400"><?php echo !empty($loan_collections->sp_phone_no) ? htmlspecialchars($loan_collections->sp_phone_no, ENT_QUOTES, 'UTF-8') : $this->lang->line('not_available_short'); ?></p>
                          </div>
                        </div>
                      <?php else: ?>
                        <span class="text-gray-500 dark:text-gray-400"><?php echo $this->lang->line('no_sponsor'); ?></span>
                      <?php endif; ?>
                    </td>
                    <td class="px-4 py-3 font-semibold text-gray-900 dark:text-white"><?php echo number_format($loan_collections->loan_aprove); ?></td>
                    <td class="px-4 py-3 font-semibold text-gray-900 dark:text-white"><?php echo number_format($loan_collections->loan_int); ?></td>
                    <td class="px-4 py-3"><?php echo $frequency . ' (' . $loan_collections->session . ')'; ?></td>
                    <td class="px-4 py-3"><?php echo $loan_collections->restration ? number_format($loan_collections->restration) : '0'; ?></td>
                    <td class="px-4 py-3"><?php echo date('jS M Y', strtotime($loan_collections->loan_stat_date)); ?></td>
                    <td class="px-4 py-3"><?php echo date('jS M Y', strtotime($loan_collections->loan_end_date)); ?></td>
                    <td class="px-4 py-3">
                      <span class="inline-flex items-center rounded-full border px-3 py-1 text-xs font-semibold <?php echo $color; ?>"><?php echo $label; ?></span>
                    </td>
                    <td class="px-4 py-3">
                      <div class="flex flex-col gap-2">
                        <a href="<?php echo base_url('admin/view_selected_loan_statement/' . $customer_profile->customer_id . '/' . $loan_collections->loan_id); ?>" class="inline-flex items-center justify-center rounded-lg bg-cyan-600 px-3 py-2 text-xs font-semibold text-white hover:bg-cyan-700"><?php echo $this->lang->line('ps_view_statement'); ?></a>
                        <?php if ($loan_collections->sp_id != NULL): ?>
                          <a href="<?php echo base_url('admin/view_sponsor_details/' . $loan_collections->sp_id); ?>" class="inline-flex items-center justify-center rounded-lg bg-amber-500 px-3 py-2 text-xs font-semibold text-white hover:bg-amber-600"><?php echo $this->lang->line('edit'); ?></a>
                          <a href="<?php echo base_url('admin/view_sponsor_details/' . $loan_collections->sp_id); ?>" class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-3 py-2 text-xs font-semibold text-white hover:bg-blue-700"><?php echo $this->lang->line('view'); ?></a>
                        <?php endif; ?>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        <?php else: ?>
          <div class="rounded-2xl border border-yellow-200 bg-yellow-50 p-4 text-sm text-yellow-800 dark:border-yellow-800 dark:bg-yellow-900/20 dark:text-yellow-200">
            <?php echo $this->lang->line('no_customer_loans_found'); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
   

  </div>
</div>

<?php
include_once APPPATH . "views/partials/footer.php";
?>

<!-- Scripts -->

<script>
function getDate(data){
let now = new Date();
let bod = (new Date(data));

let age = now.getFullYear() - bod.getFullYear();
let _age = document.querySelector("#age");
_age.value = age;
//alert(age)
}
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



// $('#customer').change(function(){
// var customer_id = $('#customer').val();
//  //alert(customer_id)
// if(customer_id != '')
// {
// $.ajax({
// url:"<?php echo base_url(); ?>admin/fetch_data_vipimioData",
// method:"POST",
// data:{customer_id:customer_id},
// success:function(data)
// {
// $('#loan').html(data);
// //$('#malipo_name').html('<option value="">select center</option>');
// }
// });
// }
// else
// {
// $('#loan').html('<option value="">Select Active loan</option>');
// //$('#malipo_name').html('<option value="">chagua vipimio</option>');
// }
// });

// $('#social').change(function(){
//  var district_id = $('#social').val();
//  if(district_id != '')
//  {
//   $.ajax({
//    url:"<?php echo base_url(); ?>user/fetch_data_malipo",
//    method:"POST",
//    data:{district_id:district_id},
//    success:function(data)
//    {
//     $('#malipo_name').html(data);
//     //$('#malipo').html('<option value="">chagua malipo</option>');
//    }
//   });
//  }
//  else
//  {
//   //$('#vipimio').html('<option value="">chagua vipimio</option>');
//   $('#malipo_name').html('<option value="">chagua vipimio</option>');
//  }
// });


});
</script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const tabButtons = document.querySelectorAll(".tab-btn");
    const tabContents = document.querySelectorAll(".tab-content");

    function setActiveTab(activeButton) {
      tabButtons.forEach(btn => {
        btn.setAttribute("data-active", "false");
        btn.classList.remove("bg-cyan-600", "text-white", "shadow-sm");
        btn.classList.add("text-slate-600", "dark:text-slate-300", "hover:text-blue-700", "dark:hover:text-cyan-300");
      });

      activeButton.setAttribute("data-active", "true");
      activeButton.classList.remove("text-slate-600", "dark:text-slate-300", "hover:text-blue-700", "dark:hover:text-cyan-300");
      activeButton.classList.add("bg-cyan-600", "text-white", "shadow-sm");
    }

    tabButtons.forEach(button => {
      button.addEventListener("click", () => {
        const target = button.getAttribute("data-tab");

        tabContents.forEach(content => {
          content.classList.add("hidden");
        });

        setActiveTab(button);

        const selectedContent = document.getElementById("tab-" + target);
        if (selectedContent) {
          selectedContent.classList.remove("hidden");
        }
      });
    });

    const initialActive = document.querySelector('.tab-btn[data-active="true"]') || tabButtons[0];
    if (initialActive) {
      setActiveTab(initialActive);
    }
  });
</script>