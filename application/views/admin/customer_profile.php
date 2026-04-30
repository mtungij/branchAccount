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
    <div class="p-4 sm:p-6 space-y-6"></div>

  
<div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 md:p-6">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-6">
                    Register Guarantors

                </h3>
                <?php
// Check if $sponser variable exists, is an object, and has the property 'customer_id'
$hasSponser = isset($customer_profile) && is_object($customer_profile) && property_exists($customer_profile, 'customer_id');

// If $hasSponser is true (meaning sponsor exists with 'customer_id'), set $action to update URL,
// otherwise set $action to create URL.
$action = $hasSponser
    ? "admin/update_sponser/{$customer_profile->customer_id}/{$customer_profile->customer_id}/{$customer_profile->comp_id}"
    : "admin/update_customer_profile_data";
?>

<?php echo form_open($action); ?>

<div class="grid sm:grid-cols-12 gap-4 sm:gap-6">
    <div class="sm:col-span-4">
        <label for="sp_name" class="block text-sm font-medium mb-2 dark:text-gray-300">* First Name:</label>
        <input type="text" id="sp_name" name="sp_name" placeholder="jina la kwanza la mdhamini" autocomplete="off" required
               class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
               value="<?php echo set_value('sp_name', isset($customer_profile->sp_name) ? $customer_profile->sp_name : ''); ?>">
        <?php echo form_error("sp_name", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
    </div>

    <div class="sm:col-span-4">
        <label for="sp_mname" class="block text-sm font-medium mb-2 dark:text-gray-300">* Middle Name:</label>
        <input type="text" id="sp_mname" name="sp_mname" placeholder="jina la pili la mdhamini" autocomplete="off" required
               class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
               value="<?php echo set_value('sp_mname', isset($customer_profile->sp_mname) ? $customer_profile->sp_mname : ''); ?>">
        <?php echo form_error("sp_mname", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
    </div>

    <div class="sm:col-span-4">
        <label for="sp_lname" class="block text-sm font-medium mb-2 dark:text-gray-300">* Last Name:</label>
        <input type="text" id="sp_lname" name="sp_lname" placeholder="jina la mwisho la mdhamini" autocomplete="off" required
               class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
               value="<?php echo set_value('sp_lname', isset($customer_profile->sp_lname) ? $customer_profile->sp_lname : ''); ?>">
        <?php echo form_error("sp_lname", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
    </div>

    <div class="sm:col-span-4">
        <label for="sp_phone_no" class="block text-sm font-medium mb-2 dark:text-gray-300">* Phone no:</label>
        <input type="number" id="sp_phone_no" name="sp_phone_no" placeholder="Namba ya simu ya mdhamini" autocomplete="off" required
               class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
               value="<?php echo set_value('sp_phone_no', isset($customer_profile->sp_phone_no) ? $customer_profile->sp_phone_no : ''); ?>">
        <?php echo form_error("sp_phone_no", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
    </div>

    <div class="sm:col-span-4">
        <label for="sp_relation" class="block text-sm font-medium mb-2 dark:text-gray-300">* Relationship With Customer:</label>
        <input type="text" id="sp_relation" name="sp_relation" placeholder="mdhamini ana uhusiano gani na mkopaji..? mf mume,kaka n.k" autocomplete="off" required
               class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
               value="<?php echo set_value('sp_relation', isset($customer_profile->sp_relation) ? $customer_profile->sp_relation : ''); ?>">
        <?php echo form_error("sp_relation", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
    </div>

    <div class="sm:col-span-4">
        <label for="nature" class="block text-sm font-medium mb-2 dark:text-gray-300">* Guarantor Business:</label>
        <input type="text" id="nature" name="nature" placeholder="Biashara ya Mdhamini" autocomplete="off" required
               class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
               value="<?php echo set_value('nature', isset($customer_profile->nature) ? $customer_profile->nature : ''); ?>">
        <?php echo form_error("nature", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
    </div>
</div>

<input type="hidden" name="comp_id" value="<?php echo htmlspecialchars($_SESSION['comp_id'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
<input type="hidden" name="customer_id" value="<?php echo htmlspecialchars($customer->customer_id ?? '', ENT_QUOTES, 'UTF-8'); ?>">

<div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
    <div class="flex justify-center gap-x-2">
        <button type="submit" class="py-2 px-4 btn-primary-sm bg-cyan-600 hover:bg-cyan-700 text-white">Save</button>
        <button type="reset" class="py-2 px-4 btn-secondary-sm">Cancel</button>
    </div>
</div>

<?php echo form_close(); ?>

            </div>
        </div>
            </div>
        </div>
        </ddi


  <?php
  include_once APPPATH . "views/partials/footer.php";
  ?>

  <?php // Script for cmd+a fix for DataTables search input (if used) ?>
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