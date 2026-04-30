<?php
include_once APPPATH . "views/partials/header.php";

$branch_name = !empty($blanch->blanch_name) ? $blanch->blanch_name : 'Branch';
$customer_blanch = !empty($customer_blanch) ? $customer_blanch : array();
$branch_customer_pdf_url = !empty($blanch->blanch_id)
  ? base_url('admin/download_blanch_customer_pdf/' . $blanch->blanch_id)
  : base_url('admin/blanch');
?>

<div class="w-full lg:ps-64">
  <div class="= overflow-x-auto">

    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
      <div class="w-full">
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
          <?php if ($das = $this->session->flashdata('massage')): ?>
            <div class="m-4 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
              <?php echo $das; ?>
            </div>
          <?php endif; ?>

          <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
            <div class="w-full md:w-1/2">
              <form class="flex items-center">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                  <input
                    type="text"
                    id="simple-search"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full pl-3 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"
                    placeholder="Search customer"
                    data-hs-datatable-search="#shareholder_table"
                    aria-label="Search customer"
                  >
                </div>
              </form>
            </div>

            <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
              <span class="inline-flex items-center justify-center gap-x-2 rounded-full border border-cyan-200 bg-cyan-100 px-3 py-2 text-sm font-medium text-cyan-700 dark:border-cyan-700 dark:bg-cyan-900/40 dark:text-cyan-300">
                <?php echo htmlspecialchars($branch_name, ENT_QUOTES, 'UTF-8'); ?>
                <span class="inline-flex min-w-6 justify-center rounded-full bg-white/80 px-2 py-0.5 text-xs dark:bg-gray-900/70"><?php echo count($customer_blanch); ?></span>
              </span>

              <a href="<?php echo $branch_customer_pdf_url; ?>" class="inline-flex items-center justify-center rounded-lg border border-transparent bg-red-600 px-3 py-2 text-sm font-medium text-white hover:bg-red-700">
                Download PDF
              </a>

              <a href="<?php echo base_url('admin/blanch'); ?>" class="inline-flex items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-600">
                Back
              </a>
            </div>
          </div>

          <div class="overflow-x-auto">
            <table id="shareholder_table" class="w-full text-sm text-left text-gray-900 dark:text-gray-300">
              <thead class="text-xs text-black uppercase bg-gray-50 dark:bg-cyan-500 dark:text-white">
                <tr>
                  <th scope="col" class="px-4 py-3">S/No.</th>
                  <th scope="col" class="px-4 py-3">Customer ID no</th>
                  <th scope="col" class="px-4 py-3">Customer Name</th>
                  <th scope="col" class="px-4 py-3">Date of Birth</th>
                  <th scope="col" class="px-4 py-3">Sex</th>
                  <th scope="col" class="px-4 py-3">Phone number</th>
                  <th scope="col" class="px-4 py-3">Date</th>
                  <th scope="col" class="px-4 py-3">Status</th>
                  <th scope="col" class="px-4 py-3">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                <?php foreach ($customer_blanch as $customers): ?>
                  <tr class="border-b dark:border-gray-700">
                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $no++; ?>.</td>
                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo htmlspecialchars($customers->customer_code, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td class="px-4 py-3 uppercase font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo htmlspecialchars($customers->f_name . ' ' . $customers->m_name . ' ' . $customers->l_name, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo htmlspecialchars($customers->date_birth, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo htmlspecialchars($customers->gender, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo htmlspecialchars($customers->phone_no, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo htmlspecialchars(substr($customers->customer_day, 0, 10), ENT_QUOTES, 'UTF-8'); ?></td>
                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      <?php if ($customers->customer_status == 'open'): ?>
                        <span class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">Active</span>
                        <?php elseif ($customers->customer_status == 'close'): ?>
                          <span class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-red-100 text-red-800 rounded-full dark:bg-red-500/10 dark:text-red-500">Done</span>
                      <?php else: ?>
                        <span class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-gray-100 text-gray-700 rounded-full dark:bg-gray-500/10 dark:text-gray-300"><?php echo htmlspecialchars(ucfirst($customers->customer_status), ENT_QUOTES, 'UTF-8'); ?></span>
                      <?php endif; ?>
                    </td>
                    <td class="px-4 py-3 dark:text-white">
                      <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                        <button id="hs-table-action-sh-<?php echo $customers->customer_id; ?>" type="button" class="hs-dropdown-toggle py-1.5 px-2.5 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700">
                          Action
                          <svg class="hs-dropdown-open:rotate-180 size-2.5" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                          </svg>
                        </button>
                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-40 z-20 bg-white shadow-2xl rounded-lg p-2 mt-2 dark:divide-gray-700 dark:bg-gray-800 dark:border dark:border-gray-700" aria-labelledby="hs-table-action-sh-<?php echo $customers->customer_id; ?>">
                          <div class="py-2 first:pt-0 last:pb-0">
                            <span class="block py-2 px-3 text-xs font-medium uppercase text-gray-400 dark:text-gray-500">Choose an option</span>
                            <a href="<?php echo base_url("admin/view_more_customer/{$customers->customer_id}"); ?>" class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-cyan-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                              View Customer
                            </a>
                            <a href="<?php echo base_url("admin/delete_customer/{$customers->customer_id}"); ?>" onclick="return confirm('Are you sure?')" class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-red-600 hover:bg-red-50 focus:ring-2 focus:ring-red-500 dark:text-red-400 dark:hover:bg-gray-700">
                              Delete
                            </a>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>

                <?php if (empty($customer_blanch)): ?>
                  <tr>
                    <td colspan="9" class="px-4 py-6 text-center text-gray-500 dark:text-gray-300">No customer found.</td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

<?php include_once APPPATH . "views/partials/footer.php"; ?>
