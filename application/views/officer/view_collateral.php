<?php
include_once APPPATH . "views/partials/officerheader.php";

$lang_line = function ($key, $fallback) {
  $value = $this->lang->line($key);
  return !empty($value) ? $value : $fallback;
};

$resolve_image_src = function ($value, $default_rel = 'assets/img/noimage.png') {
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
    $candidates[] = 'assets/uploads/' . $raw;
  }

  foreach ($candidates as $candidate) {
    $relative = ltrim($candidate, '/');
    if (file_exists(FCPATH . $relative)) {
      return base_url($relative);
    }
  }

  return $default_src;
};

$txt_collateral_list = $lang_line('collateral_list', 'Collateral List');
$txt_back = $lang_line('back', 'Back');
$txt_s_no = $lang_line('s_no', 'S/No.');
$txt_collateral_name = $lang_line('collateral_name', 'Collateral Name');
$txt_collateral_condition = $lang_line('collateral_condition', 'Collateral Condition');
$txt_collateral_current_value = $lang_line('collateral_current_value', 'Collateral Current Value');
?>

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

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm">
      <div class="p-4 sm:p-6 border-b border-gray-200">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
          <h1 class="text-lg sm:text-xl font-bold text-cyan-700"><?php echo $txt_collateral_list; ?></h1>
          <a href="<?php echo base_url('oficer/view_more_customer/' . $customer_id); ?>"
             class="inline-flex items-center justify-center px-4 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-semibold">
            <?php echo $txt_back; ?>
          </a>
        </div>
      </div>

      <div class="p-4 sm:p-6">
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-cyan-600">
              <tr>
                <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-white"><?php echo $txt_s_no; ?></th>
                <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-white"><?php echo $txt_collateral_name; ?></th>
                <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-white"><?php echo $txt_collateral_condition; ?></th>
                <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-white"><?php echo $txt_collateral_current_value; ?></th>
              </tr>
            </thead>

            <tbody class="divide-y divide-gray-200 bg-white">
              <?php $no = 1; ?>
              <?php foreach ($data_collateral as $data_collaterals): ?>
                <tr class="hover:bg-gray-50">
                  <td class="px-4 py-3 text-sm text-gray-700"><?php echo $no++; ?>.</td>
                  <td class="px-4 py-3 text-sm font-semibold uppercase text-gray-700"><?php echo $data_collaterals->description; ?></td>
                  <td class="px-4 py-3 text-sm uppercase text-gray-700"><?php echo $data_collaterals->co_condition; ?></td>
                  <td class="px-4 py-3 text-sm text-gray-700"><?php echo number_format($data_collaterals->value); ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once APPPATH . "views/partials/footer.php"; ?>
