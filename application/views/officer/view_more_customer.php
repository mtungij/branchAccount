<?php
include_once APPPATH . "views/partials/officerheader.php";

$lang_line = function ($key, $fallback) {
  $value = $this->lang->line($key);
  return !empty($value) ? $value : $fallback;
};

$resolve_image_src = function ($value, $default_rel = 'assets/img/customer21.png') {
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
    $candidates[] = 'assets/uploads/' . $raw;
    $candidates[] = 'assets/img/' . $raw;
    $candidates[] = 'assets/passport/' . $raw;
  }

  foreach ($candidates as $candidate) {
    $relative = ltrim($candidate, '/');
    if (file_exists(FCPATH . $relative)) {
      return base_url($relative);
    }
  }

  return $default_src;
};

$customer_name = trim(($customer_profile->f_name ?? '') . ' ' . ($customer_profile->m_name ?? '') . ' ' . ($customer_profile->l_name ?? ''));
$customer_passport_src = $resolve_image_src(
  $customer_profile->passport ?? ($customer_profile->passport_path ?? ($customer->passport ?? '')),
  'assets/img/customer21.png'
);

$txt_customer_profile = $lang_line('customer_profile', 'Customer Profile');
$txt_phone_number = $lang_line('phone_number', 'Phone Number');
$txt_back_all_customers = $lang_line('vmc_back_all_customers', 'Back to All Customers');
$txt_guarantors = $lang_line('guarantors', 'Guarantors');
$txt_all_loans = $lang_line('vmc_all_loans', 'All Loans');
$txt_s_no = $lang_line('s_no', 'S/No.');
$txt_passport = $lang_line('passport_size_photo', 'Passport');
$txt_full_name = $lang_line('full_name', 'Full Name');
$txt_nature = $lang_line('vmc_nature', 'Nature');
$txt_relationship = $lang_line('relationship_with_customer', 'Relationship');
$txt_employee = $lang_line('employee_label', 'Employee');
$txt_loan_approved = $lang_line('vmc_loan_approved', 'Loan Approved');
$txt_principal_interest = $lang_line('vmc_principal_interest', 'Principal + Interest');
$txt_duration = $lang_line('loan_duration', 'Duration');
$txt_repayments = $lang_line('number_of_repayments', 'Repayments');
$txt_collection = $lang_line('rejesho', 'Collection');
$txt_paid = $lang_line('paid', 'Paid');
$txt_remain = $lang_line('remain_amount', 'Remain');
$txt_penalty = $lang_line('penalty_setting', 'Penalty');
$txt_start_date = $lang_line('vmc_start_date', 'Start Date');
$txt_end_date = $lang_line('vmc_end_date', 'End Date');
$txt_status = $lang_line('status', 'Status');
$txt_action = $lang_line('action', 'Action');
$txt_collateral = $lang_line('collateral_name', 'Collateral');
$txt_loan_agreement = $lang_line('vmc_loan_agreement', 'Loan Agreement');
$txt_view_loan_agreement = $lang_line('vmc_view_loan_agreement', 'View Loan Agreement');
$txt_no_agreement = $lang_line('vmc_no_agreement', 'No Agreement');
$txt_admin = $lang_line('vmc_admin', 'Admin');
$txt_pending = $lang_line('pending', 'Pending');
$txt_approved = $lang_line('vmc_approved', 'Approved');
$txt_active = $lang_line('active', 'Active');
$txt_done = $lang_line('vmc_done', 'Done');
$txt_default = $lang_line('vmc_default', 'Default');
$txt_disbursed = $lang_line('loan_disbursed', 'Disbursed');
$txt_daily = $lang_line('day', 'Daily');
$txt_weekly = $lang_line('week', 'Weekly');
$txt_monthly = $lang_line('month', 'Monthly');
$txt_update_upload_passport = $lang_line('vmc_update_upload_passport', 'Update/Upload Passport');
$txt_upload = $lang_line('upload', 'Upload');
$txt_crop_required = $lang_line('crop_required', 'Please select passport image before submitting.');
$txt_crop_photo = $lang_line('vmc_crop_photo', 'Crop Photo');
$txt_apply_crop = $lang_line('vmc_apply_crop', 'Apply Crop');
$txt_cancel = $lang_line('cancel', 'Cancel');
?>

<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
  <div class="p-4 sm:p-6 space-y-6">

    <?php if ($das = $this->session->flashdata('massage')): ?>
      <div class="bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg p-4" role="alert">
        <?php echo $das; ?>
      </div>
    <?php endif; ?>

    <?php if ($das = $this->session->flashdata('error')): ?>
      <div class="bg-red-100 border border-red-200 text-sm text-red-800 rounded-lg p-4" role="alert">
        <?php echo $das; ?>
      </div>
    <?php endif; ?>

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-4 sm:p-6">
      <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <div class="flex items-center gap-4">
          <img src="<?php echo $customer_passport_src; ?>" alt="<?php echo $txt_customer_profile; ?>" class="w-16 h-16 rounded-full object-cover border-2 border-cyan-200">
          <div>
            <h1 class="text-lg sm:text-xl font-bold text-cyan-700"><?php echo $txt_customer_profile; ?></h1>
            <p class="text-sm text-gray-500"><?php echo htmlspecialchars($customer_name); ?></p>
            <p class="text-sm text-gray-600"><?php echo $txt_phone_number; ?>: <?php echo htmlspecialchars($customer_profile->phone_no ?? ''); ?></p>
            <?php if (!empty($customer_profile->customer_id)): ?>
              <form action="<?php echo base_url('oficer/update_customer_passport_inline/' . $customer_profile->customer_id); ?>" method="post" enctype="multipart/form-data" class="mt-2 flex flex-col gap-2 passport-upload-form">
                <input type="file" name="passport" accept="image/*" class="block w-full text-xs text-gray-600 file:mr-2 file:py-1 file:px-2 file:rounded-lg file:border-0 file:bg-cyan-50 file:text-cyan-700 hover:file:bg-cyan-100 passport-file-input" required>
                <input type="hidden" name="passport_cropped" class="passport-cropped-input">
              </form>
            <?php endif; ?>
          </div>
        </div>
        <a href="<?php echo base_url('oficer/all_customer'); ?>"
           class="inline-flex items-center justify-center px-4 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-semibold">
          <?php echo $txt_back_all_customers; ?>
        </a>
      </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-2 sm:p-3">
      <div class="flex flex-wrap gap-2" role="tablist" aria-label="Customer detail tabs">
        <button type="button" class="customer-tab-btn inline-flex items-center px-4 py-2 rounded-lg text-sm font-semibold bg-cyan-600 text-white" data-tab-target="tab-guarantors" aria-selected="true"><?php echo $txt_guarantors; ?></button>
        <button type="button" class="customer-tab-btn inline-flex items-center px-4 py-2 rounded-lg text-sm font-semibold bg-gray-100 text-gray-700 hover:bg-gray-200" data-tab-target="tab-loans" aria-selected="false"><?php echo $txt_all_loans; ?></button>
      </div>
    </div>

    <div id="tab-guarantors" class="customer-tab-panel bg-white border border-gray-200 rounded-xl shadow-sm p-4 sm:p-6">
      <h2 class="text-base font-bold text-cyan-700 mb-4"><?php echo $txt_guarantors; ?></h2>

      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-cyan-600">
            <tr>
              <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-white"><?php echo $txt_s_no; ?></th>
              <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-white"><?php echo $txt_passport; ?></th>
              <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-white"><?php echo $txt_full_name; ?></th>
              <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-white"><?php echo $txt_phone_number; ?></th>
              <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-white"><?php echo $txt_nature; ?></th>
              <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-white"><?php echo $txt_relationship; ?></th>
              <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-white"><?php echo $txt_action; ?></th>

            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200 bg-white">
            <?php $no = 1; ?>
            <?php foreach ($sponser as $sponsers_datas): ?>
              <?php
                $guarantor_passport_src = $resolve_image_src(
                  $sponsers_datas->passport_path ?? ($sponsers_datas->sp_passport ?? ($sponsers_datas->passport ?? '')),
                  'assets/img/customer21.png'
                );
              ?>
              <tr class="hover:bg-gray-50">
                <td class="px-4 py-3 text-sm text-gray-700"><?php echo $no++; ?>.</td>
                <td class="px-4 py-3 text-sm text-gray-700">
                  <img src="<?php echo $guarantor_passport_src; ?>" alt="<?php echo $txt_guarantors; ?>" class="w-10 h-10 rounded-full object-cover border border-cyan-200">
                </td>
                <td class="px-4 py-3 text-sm text-gray-700"><?php echo $sponsers_datas->sp_name . ' ' . $sponsers_datas->sp_mname . ' ' . $sponsers_datas->sp_lname; ?></td>
                <td class="px-4 py-3 text-sm text-gray-700"><?php echo $sponsers_datas->sp_phone_no; ?></td>
                <td class="px-4 py-3 text-sm text-gray-700"><?php echo $sponsers_datas->nature; ?></td>
                <td class="px-4 py-3 text-sm text-gray-700"><?php echo $sponsers_datas->sp_relation; ?></td>
                <td class="px-4 py-3 text-sm text-gray-700">
                  <form action="<?php echo base_url('oficer/update_sponsor_passport/' . $sponsers_datas->sp_id . '/' . $customer_profile->customer_id); ?>" method="post" enctype="multipart/form-data" class="flex flex-col gap-2 passport-upload-form">
                    <input type="file" name="passport" accept="image/*" class="block w-full text-xs text-gray-600 file:mr-2 file:py-1 file:px-2 file:rounded-lg file:border-0 file:bg-cyan-50 file:text-cyan-700 hover:file:bg-cyan-100 passport-file-input" required>
                    <input type="hidden" name="passport_cropped" class="passport-cropped-input">
                  </form>
                </td>


              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

    <div id="tab-loans" class="customer-tab-panel hidden bg-white border border-gray-200 rounded-xl shadow-sm p-4 sm:p-6">
      <h2 class="text-base font-bold text-cyan-700 mb-4"><?php echo $txt_all_loans; ?></h2>

      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-cyan-600">
            <tr>
              <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-white"><?php echo $txt_s_no; ?></th>
              <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-white"><?php echo $txt_employee; ?></th>
              <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-white"><?php echo $txt_loan_approved; ?></th>
              <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-white"><?php echo $txt_principal_interest; ?></th>
              <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-white"><?php echo $txt_duration; ?></th>
              <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-white"><?php echo $txt_repayments; ?></th>
              <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-white"><?php echo $txt_collection; ?></th>
              <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-white"><?php echo $txt_paid; ?></th>
              <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-white"><?php echo $txt_remain; ?></th>

              <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-white"><?php echo $txt_start_date; ?></th>
              <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-white"><?php echo $txt_end_date; ?></th>
              <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-white"><?php echo $txt_status; ?></th>
              <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-white"><?php echo $txt_action; ?></th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200 bg-white">
            <?php $no = 1; ?>
            <?php foreach ($all_customer_loan as $loan_collections): ?>
              <?php
                $duration_type = '';
                if ($loan_collections->day == '1') {
                  $duration_type = $txt_daily;
                } elseif ($loan_collections->day == '7') {
                  $duration_type = $txt_weekly;
                } elseif (in_array($loan_collections->day, ['28', '29', '30', '31'], true)) {
                  $duration_type = $txt_monthly;
                }

                $remain_amount = ($loan_collections->total_depost > $loan_collections->loan_int)
                  ? 0
                  : ($loan_collections->loan_int - $loan_collections->total_depost);

                $penalty_remain = ($loan_collections->penart_paid > $loan_collections->total_penart_amount)
                  ? 0
                  : ($loan_collections->total_penart_amount - $loan_collections->penart_paid);

                $status_label = $txt_pending;
                $status_class = 'bg-amber-100 text-amber-700';
                $can_view_loan_agreement = !empty($loan_collections->loan_id)
                  && in_array($loan_collections->loan_status, ['withdrawal', 'out', 'done'], true);

                if ($loan_collections->loan_status === 'aproved') {
                  $status_label = $txt_approved;
                  $status_class = 'bg-sky-100 text-sky-700';
                } elseif ($loan_collections->loan_status === 'withdrawal') {
                  $status_label = $txt_active;
                  $status_class = 'bg-teal-100 text-teal-700';
                } elseif ($loan_collections->loan_status === 'done') {
                  $status_label = $txt_done;
                  $status_class = 'bg-emerald-100 text-emerald-700';
                } elseif ($loan_collections->loan_status === 'out') {
                  $status_label = $txt_default;
                  $status_class = 'bg-red-100 text-red-700';
                } elseif ($loan_collections->loan_status === 'disbarsed') {
                  $status_label = $txt_disbursed;
                  $status_class = 'bg-gray-100 text-gray-700';
                }
              ?>
              <tr class="hover:bg-gray-50">
                <td class="px-4 py-3 text-sm text-gray-700"><?php echo $no++; ?>.</td>
                <td class="px-4 py-3 text-sm text-gray-700"><?php echo !empty($loan_collections->username) ? $loan_collections->username : $txt_admin; ?></td>
                <td class="px-4 py-3 text-sm text-gray-700"><?php echo number_format($loan_collections->loan_aprove); ?></td>
                <td class="px-4 py-3 text-sm text-gray-700"><?php echo number_format($loan_collections->loan_int); ?></td>
                <td class="px-4 py-3 text-sm text-gray-700"><?php echo $duration_type; ?></td>
                <td class="px-4 py-3 text-sm text-gray-700"><?php echo $loan_collections->session; ?></td>
                <td class="px-4 py-3 text-sm text-gray-700"><?php echo number_format($loan_collections->restration); ?></td>
                <td class="px-4 py-3 text-sm text-gray-700"><?php echo number_format($loan_collections->total_depost); ?></td>
                <td class="px-4 py-3 text-sm text-gray-700"><?php echo number_format($remain_amount); ?></td>
                <td class="px-4 py-3 text-sm text-gray-700"><?php echo $loan_collections->loan_stat_date; ?></td>
                <td class="px-4 py-3 text-sm text-gray-700"><?php echo substr($loan_collections->loan_end_date, 0, 10); ?></td>
                <td class="px-4 py-3 text-sm text-gray-700">
                  <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold <?php echo $status_class; ?>"><?php echo $status_label; ?></span>
                </td>
                <td class="px-4 py-3 text-sm text-gray-700">
                  <div class="flex flex-wrap gap-2">
                    <a href="<?php echo base_url("oficer/view_collateral/{$loan_collections->loan_id}/{$loan_collections->customer_id}"); ?>"
                       class="inline-flex items-center px-3 py-1.5 rounded-lg bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold">
                      <?php echo $txt_collateral; ?>
                    </a>

                    <?php if ($can_view_loan_agreement): ?>
                      <a href="<?php echo base_url('oficer/view_aggrement/' . $loan_collections->customer_id . '/' . $loan_collections->loan_id); ?>" target="_blank" rel="noopener noreferrer"
                         class="inline-flex items-center px-3 py-1.5 rounded-lg bg-cyan-600 hover:bg-cyan-700 text-white text-xs font-semibold">
                        <?php echo $txt_view_loan_agreement; ?>
                      </a>
                    <?php else: ?>
                      <span class="inline-flex items-center px-3 py-1.5 rounded-lg bg-red-100 text-red-700 text-xs font-semibold">
                        <?php echo $txt_no_agreement; ?>
                      </span>
                    <?php endif; ?>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>
<!-- ========== END MAIN CONTENT BODY ========== -->

<div id="passport-crop-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/70 p-2 sm:p-4" aria-hidden="true">
  <div class="crop-modal-card w-full max-w-2xl rounded-xl bg-white p-3 sm:p-6 shadow-xl">
    <div class="flex items-center justify-between mb-3">
      <h3 class="text-base sm:text-lg font-bold text-cyan-700"><?php echo $txt_crop_photo; ?></h3>
      <button type="button" id="passport-crop-cancel-top" class="text-gray-500 hover:text-gray-700 text-sm font-semibold"><?php echo $txt_cancel; ?></button>
    </div>

    <div class="crop-modal-body border border-gray-200 rounded-lg p-2 bg-gray-50">
      <img id="passport-crop-image" alt="Crop preview" class="w-full object-contain" style="max-height:60vh;">
    </div>

    <div class="mt-4 flex flex-col-reverse sm:flex-row items-stretch sm:items-center sm:justify-end gap-2">
      <button type="button" id="passport-crop-cancel" class="w-full sm:w-auto px-4 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100 text-sm font-semibold">
        <?php echo $txt_cancel; ?>
      </button>
      <button type="button" id="passport-crop-apply" class="w-full sm:w-auto px-4 py-2 rounded-lg bg-cyan-600 hover:bg-cyan-700 text-white text-sm font-semibold">
        <?php echo $txt_apply_crop; ?>
      </button>
    </div>
  </div>
</div>

<?php
include_once APPPATH . "views/partials/footer.php";
?>

<link rel="stylesheet" href="<?php echo base_url('assets/vendor/croppr/croppr.min.css'); ?>">
<script src="<?php echo base_url('assets/vendor/croppr/croppr.min.js'); ?>"></script>

<style>
  #passport-crop-modal .crop-modal-card {
    max-height: calc(100vh - 1rem);
    display: flex;
    flex-direction: column;
  }

  #passport-crop-modal .crop-modal-body {
    flex: 1 1 auto;
    min-height: 0;
    overflow: auto;
  }

  #passport-crop-image {
    display: block;
    margin: 0 auto;
    max-width: 100%;
    max-height: min(62vh, 560px);
  }

  #passport-crop-modal .croppr-handle {
    width: 16px;
    height: 16px;
  }

  @media (max-width: 640px) {
    #passport-crop-modal .crop-modal-card {
      max-height: calc(100vh - 0.5rem);
    }

    #passport-crop-image {
      max-height: 52vh;
    }
  }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const tabButtons = document.querySelectorAll('.customer-tab-btn');
  const tabPanels = document.querySelectorAll('.customer-tab-panel');
  const cropRequiredMessage = <?php echo json_encode($txt_crop_required); ?>;
  const cropModal = document.getElementById('passport-crop-modal');
  const cropImage = document.getElementById('passport-crop-image');
  const cropApply = document.getElementById('passport-crop-apply');
  const cropCancel = document.getElementById('passport-crop-cancel');
  const cropCancelTop = document.getElementById('passport-crop-cancel-top');

  let cropprInstance = null;
  let activeForm = null;
  let activeFileInput = null;
  let originalImageData = '';
  const body = document.body;
  const originalBodyOverflow = body.style.overflow;

  tabButtons.forEach(function (button) {
    button.addEventListener('click', function () {
      const target = button.getAttribute('data-tab-target');

      tabButtons.forEach(function (btn) {
        btn.classList.remove('bg-cyan-600', 'text-white');
        btn.classList.add('bg-gray-100', 'text-gray-700');
        btn.setAttribute('aria-selected', 'false');
      });

      tabPanels.forEach(function (panel) {
        panel.classList.add('hidden');
      });

      button.classList.remove('bg-gray-100', 'text-gray-700');
      button.classList.add('bg-cyan-600', 'text-white');
      button.setAttribute('aria-selected', 'true');

      const activePanel = document.getElementById(target);
      if (activePanel) {
        activePanel.classList.remove('hidden');
      }
    });
  });

  function closeCropModal(resetFileInput) {
    body.style.overflow = originalBodyOverflow;
    cropModal.classList.add('hidden');
    cropModal.classList.remove('flex');
    cropModal.setAttribute('aria-hidden', 'true');

    if (cropprInstance) {
      cropprInstance.destroy();
      cropprInstance = null;
    }

    cropImage.removeAttribute('src');
    originalImageData = '';

    if (resetFileInput && activeFileInput) {
      activeFileInput.value = '';
    }

    activeForm = null;
    activeFileInput = null;
  }

  function openCropModal(form, fileInput, file) {
    const reader = new FileReader();
    reader.onload = function (event) {
      originalImageData = event.target.result;
      cropImage.src = originalImageData;

      cropImage.onload = function () {
        if (cropprInstance) {
          cropprInstance.destroy();
        }

        cropprInstance = new Croppr(cropImage, {
          aspectRatio: 1,
          startSize: [80, 80, '%']
        });

        activeForm = form;
        activeFileInput = fileInput;

        body.style.overflow = 'hidden';
        cropModal.classList.remove('hidden');
        cropModal.classList.add('flex');
        cropModal.setAttribute('aria-hidden', 'false');
      };
    };
    reader.onerror = function () {
      alert(cropRequiredMessage);
    };
    reader.readAsDataURL(file);
  }

  function autoCropImage(file, done, failed) {
    const reader = new FileReader();
    reader.onload = function (event) {
      const img = new Image();
      img.onload = function () {
        const size = Math.min(img.width, img.height);
        const sx = Math.floor((img.width - size) / 2);
        const sy = Math.floor((img.height - size) / 2);

        const canvas = document.createElement('canvas');
        canvas.width = 500;
        canvas.height = 500;

        const ctx = canvas.getContext('2d');
        if (!ctx) {
          failed();
          return;
        }

        ctx.drawImage(img, sx, sy, size, size, 0, 0, 500, 500);
        done(canvas.toDataURL('image/jpeg', 0.92));
      };
      img.onerror = failed;
      img.src = event.target.result;
    };
    reader.onerror = failed;
    reader.readAsDataURL(file);
  }

  function applyCropSelection() {
    if (!cropprInstance || !activeForm || !activeFileInput || !originalImageData) {
      alert(cropRequiredMessage);
      return;
    }

    const croppedInput = activeForm.querySelector('.passport-cropped-input');
    const cropData = cropprInstance.getValue();
    const source = new Image();

    source.onload = function () {
      const canvas = document.createElement('canvas');
      canvas.width = 500;
      canvas.height = 500;

      const ctx = canvas.getContext('2d');
      if (!ctx) {
        alert(cropRequiredMessage);
        return;
      }

      const displayedWidth = cropImage.width || source.width;
      const displayedHeight = cropImage.height || source.height;
      const scaleX = source.naturalWidth / displayedWidth;
      const scaleY = source.naturalHeight / displayedHeight;

      const sx = Math.max(0, Math.round(cropData.x * scaleX));
      const sy = Math.max(0, Math.round(cropData.y * scaleY));
      const sWidth = Math.max(1, Math.round(cropData.width * scaleX));
      const sHeight = Math.max(1, Math.round(cropData.height * scaleY));
      const formToSubmit = activeForm;

      ctx.drawImage(source, sx, sy, sWidth, sHeight, 0, 0, 500, 500);
      croppedInput.value = canvas.toDataURL('image/jpeg', 0.92);

      closeCropModal(false);
      if (formToSubmit && typeof formToSubmit.requestSubmit === 'function') {
        formToSubmit.requestSubmit();
      } else if (formToSubmit) {
        formToSubmit.submit();
      }
    };

    source.onerror = function () {
      alert(cropRequiredMessage);
    };

    source.src = originalImageData;
  }

  cropApply.addEventListener('click', applyCropSelection);
  cropCancel.addEventListener('click', function () { closeCropModal(true); });
  cropCancelTop.addEventListener('click', function () { closeCropModal(true); });
  cropModal.addEventListener('click', function (event) {
    if (event.target === cropModal) {
      closeCropModal(true);
    }
  });

  document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape' && cropModal.getAttribute('aria-hidden') === 'false') {
      closeCropModal(true);
    }
  });

  document.querySelectorAll('.passport-upload-form').forEach(function (form) {
    const fileInput = form.querySelector('.passport-file-input');
    const croppedInput = form.querySelector('.passport-cropped-input');

    fileInput.addEventListener('change', function () {
      croppedInput.value = '';
      if (!fileInput.files || !fileInput.files[0]) {
        return;
      }

      if (typeof Croppr === 'undefined') {
        autoCropImage(
          fileInput.files[0],
          function (croppedDataUrl) {
            croppedInput.value = croppedDataUrl;
          },
          function () {
            alert(cropRequiredMessage);
          }
        );
        return;
      }

      openCropModal(form, fileInput, fileInput.files[0]);
    });

    form.addEventListener('submit', function (event) {
      if (!croppedInput.value) {
        event.preventDefault();
        alert(cropRequiredMessage);
      }
    });
  });
});
</script>
