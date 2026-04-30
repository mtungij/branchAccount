<?php
include_once APPPATH . "views/partials/header.php";
?>

<div class="w-full lg:ps-64">
  <div class="overflow-x-auto">

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
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd"></path>
                    </svg>
                  </div>
                  <input type="text" id="simple-search"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"
                    placeholder="Search employee name, position, branch..."
                    data-hs-datatable-search="#salary_table"
                    aria-label="Search employees">
                </div>
              </form>
            </div>
            <div
              class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
              
              <!-- Download Excel Button -->
              <a href="<?= base_url("admin/download_salary_excel"); ?>"
                class="flex items-center justify-center text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">
                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                  aria-hidden="true">
                  <path fill-rule="evenodd"
                    d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
                </svg>
                Download Excel
              </a>

              <!-- Print Button -->
              <a href="<?= base_url("admin/print_salary_sheet"); ?>" target="_blank"
                class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                  aria-hidden="true">
                  <path fill-rule="evenodd"
                    d="M5 2.75C5 1.784 5.784 1 6.75 1h6.5c.966 0 1.75.784 1.75 1.75v3.552c.377.046.752.097 1.126.153A2.212 2.212 0 0118 8.653v4.097A2.25 2.25 0 0115.75 15h-.241l.305 1.984A1.75 1.75 0 0114.084 19H5.915a1.75 1.75 0 01-1.73-2.016L4.492 15H4.25A2.25 2.25 0 012 12.75V8.653c0-1.082.775-2.034 1.874-2.198.374-.056.75-.107 1.127-.153L5 6.25v-3.5zm8.5 3.397a41.533 41.533 0 00-7 0V2.75a.25.25 0 01.25-.25h6.5a.25.25 0 01.25.25v3.397zM6.608 12.5a.25.25 0 00-.247.212l-.693 4.5a.25.25 0 00.247.288h8.17a.25.25 0 00.246-.288l-.692-4.5a.25.25 0 00-.247-.212H6.608z"
                    clip-rule="evenodd" />
                </svg>
                Print Salary Sheet
              </a>

            </div>
          </div>

          <div class="overflow-x-auto">
            <table id="salary_table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-cyan-500 dark:text-gray-400">
                <tr>
                  <th scope="col" class="px-4 py-3 dark:text-white">S/No</th>
                  <th scope="col" class="px-4 py-3 dark:text-white">Employee Name</th>
                  <th scope="col" class="px-4 py-3 dark:text-white">Branch</th>
                  <th scope="col" class="px-4 py-3 dark:text-white">Position</th>
                  <th scope="col" class="px-4 py-3 dark:text-white">Phone Number</th>
                  <th scope="col" class="px-4 py-3 dark:text-white">Bank Account</th>
                  <th scope="col" class="px-4 py-3 dark:text-white">Account Number</th>
                  <th scope="col" class="px-4 py-3 dark:text-white">Salary Amount</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                <?php if (!empty($sheet)): ?>
                  <?php foreach ($sheet as $employee): ?>
                    <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                      <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?= $no++ ?>
                      </th>
                      <td class="uppercase px-4 py-3 dark:text-white">
                        <?= htmlspecialchars($employee->empl_name, ENT_QUOTES, 'UTF-8') ?>
                      </td>
                      <td class="uppercase px-4 py-3 dark:text-white">
                        <?= htmlspecialchars($employee->blanch_name, ENT_QUOTES, 'UTF-8') ?>
                      </td>
                      <td class="uppercase px-4 py-3 dark:text-white">
                        <?= htmlspecialchars($employee->position, ENT_QUOTES, 'UTF-8') ?>
                      </td>
                      <td class="px-4 py-3 dark:text-white">
                        <?= htmlspecialchars($employee->empl_no, ENT_QUOTES, 'UTF-8') ?>
                      </td>
                      <td class="uppercase px-4 py-3 dark:text-white">
                        <?= htmlspecialchars($employee->bank_account, ENT_QUOTES, 'UTF-8') ?>
                      </td>
                      <td class="px-4 py-3 dark:text-white">
                        <?= htmlspecialchars($employee->account_no, ENT_QUOTES, 'UTF-8') ?>
                      </td>
                      <td class="px-4 py-3 font-semibold dark:text-white">
                        <?= number_format($employee->salary, 2) ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  
                  <!-- Total Row -->
                  <tr class="bg-gray-100 dark:bg-gray-600 font-bold">
                    <td colspan="7" class="px-4 py-3 text-right uppercase dark:text-white">
                      Total Salary:
                    </td>
                    <td class="px-4 py-3 text-lg dark:text-white">
                      <?= number_format($total_salary->total_pay, 2) ?>
                    </td>
                  </tr>
                <?php else: ?>
                  <tr>
                    <td colspan="8" class="px-4 py-8 text-center text-gray-500 dark:text-gray-400">
                      No employee salary data found.
                    </td>
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

<?php
include_once APPPATH . "views/partials/footer.php";
?>

<script>
  // Search functionality
  document.getElementById('simple-search').addEventListener('keyup', function () {
    const filter = this.value.toLowerCase();
    const table = document.getElementById('salary_table');
    const trs = table.getElementsByTagName('tr');

    // Start from 1 to skip the header row
    for (let i = 1; i < trs.length - 1; i++) { // -1 to skip total row
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
    }, 500);
  });
</script>