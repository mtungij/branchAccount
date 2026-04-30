					<?php
include_once APPPATH . "views/partials/officerheader.php";
?>

<div class="w-full max-w-2xl mx-auto bg-white dark:bg-gray-800 shadow-md rounded-lg p-4 sm:p-6">
    <h2 class="text-lg sm:text-xl font-semibold text-gray-700 dark:text-gray-200 mb-4 text-center">Kalkuleta ya Mkopo</h2>
    
    <form id="loanForm" class="space-y-4">
        <div>
            <label class="block text-sm sm:text-base font-medium text-gray-700 dark:text-gray-300">Kiasi cha Mkopo (Tsh)</label>
            <input type="text" id="loan_amount" name="loan_amount" required 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 sm:text-sm sm:py-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                oninput="formatNumber(this)">
        </div>

        <div>
            <label class="block text-sm sm:text-base font-medium text-gray-700 dark:text-gray-300">Kiwango cha Riba (%)</label>
            <input type="number" id="interest_rate" name="interest_rate"  required 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 sm:text-sm sm:py-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>

        <div class="flex flex-col sm:flex-row gap-2">
            <div class="flex-1">
                <label class="block text-sm sm:text-base font-medium text-gray-700 dark:text-gray-300">Idadi jumla ya malipo</label>
                <input type="number" id="duration" name="duration" required 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 sm:text-sm sm:py-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            </div>

            <div class="flex-1">
                <label class="block text-sm sm:text-base font-medium text-gray-700 dark:text-gray-300">Aina ya malipo</label>
                <select id="duration_type" name="duration_type" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 sm:text-sm sm:py-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <option value="days">Kwa malipo ya kila siku</option>
                    <option value="weeks">Kwa malipo ya kila wiki</option>
                    <option value="months">Kwa malipo ya kila mwezi</option>
                </select>
            </div>
        </div>

        <div>
            <label class="block text-sm sm:text-base font-medium text-gray-700 dark:text-gray-300">Aina ya Riba</label>
            <select id="rate_type" name="rate_type" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 sm:text-sm sm:py-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <option value="simple">Simple Interest Formular</option>
                <option value="flat">Flat Rate Formular</option>
            </select>
        </div>

        <button type="button" onclick="calculateLoan()" 
            class="w-full bg-cyan-600 text-white py-2 sm:py-3 px-4 rounded-md shadow hover:bg-cyan-700 text-sm sm:text-base">
            Hesabu
        </button>
    </form>

    <div id="result" class="mt-6 hidden p-4 bg-gray-100 dark:bg-gray-700 rounded-lg">
        <h3 class="text-md sm:text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2 text-center">Majibu:</h3>
        <p id="loan_interest" class="text-gray-700 dark:text-gray-300"></p>
        <p id="total_payment" class="text-gray-700 dark:text-gray-300"></p>
        <p id="installment" class="text-gray-700 dark:text-gray-300"></p>
        <p id="total_duration" class="text-gray-700 dark:text-gray-300"></p>
<!-- 
        <div id="amortization" class="mt-4 hidden">
            <h4 class="font-semibold text-gray-800 dark:text-gray-200 mb-2">Ratiba ya Malipo</h4>
            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-300 dark:border-gray-600 text-sm sm:text-base text-left">
                    <thead class="bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-200">
                        <tr>
                            <th class="px-2 sm:px-3 py-1 border">Muda</th>
                            <th class="px-2 sm:px-3 py-1 border">Kiasi cha Malipo</th>
                            <th class="px-2 sm:px-3 py-1 border">Riba</th>
                            <th class="px-2 sm:px-3 py-1 border">Msingi</th>
                            <th class="px-2 sm:px-3 py-1 border">Salio</th>
                        </tr>
                    </thead>
                    <tbody id="amortization_body" class="bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300"></tbody>
                </table>
            </div>
        </div> -->
    </div>
</div>
<?php
include_once APPPATH . "views/partials/footer.php";
?>

<script>
function formatNumber(input) {
    let value = input.value.replace(/,/g, '');
    if(!isNaN(value) && value !== '') {
        input.value = parseFloat(value).toLocaleString('en-US');
    }
}

function calculateLoan() {
    let amount = parseFloat(document.getElementById('loan_amount').value.replace(/,/g, ''));
    let rate = parseFloat(document.getElementById('interest_rate').value);
    let duration = parseFloat(document.getElementById('duration').value);
    let durationType = document.getElementById('duration_type').value;
    let rateType = document.getElementById('rate_type').value;

    if(amount <=0 || rate <=0 || duration <=0){
        alert('Tafadhali ingiza namba sahihi za kiasi, riba na idadi ya malipo.');
        return;
    }

    let loanInterest = 0;
    let totalLoan = 0;

    if(rateType === 'flat'){
        let months = durationType === 'days' ? duration/30 : durationType === 'weeks' ? duration/4 : duration;
        loanInterest = amount * (rate/100) * months;
        totalLoan = amount + loanInterest;
    } else {
        loanInterest = amount * (rate/100);
        totalLoan = amount + loanInterest;
    }

    let installment = totalLoan / duration;
    let label = durationType === 'days' ? 'siku' : durationType === 'weeks' ? 'wiki' : 'mwezi';

    document.getElementById('loan_interest').innerText = "Riba: Tsh " + loanInterest.toLocaleString();
    document.getElementById('total_payment').innerText = "Jumla ya Mkopo + Riba: Tsh " + totalLoan.toLocaleString();
    document.getElementById('installment').innerText = "Kiasi cha Malipo kila " + label + ": Tsh " + installment.toLocaleString();
    document.getElementById('total_duration').innerText = "Jumla ya muda wa malipo: " + duration + " " + label;
    document.getElementById('result').classList.remove('hidden');

    let amortizationDiv = document.getElementById('amortization');
    let amortizationBody = document.getElementById('amortization_body');
    amortizationBody.innerHTML = "";
    amortizationDiv.classList.remove('hidden');

    let principalPerPeriod = amount / duration;
    let interestPerPeriod = loanInterest / duration;
    let balance = totalLoan;

    for(let i=1; i<=duration; i++){
        let installmentNow = principalPerPeriod + interestPerPeriod;
        balance -= installmentNow;
        if(balance < 0) balance = 0;

        let row = `<tr>
            <td class="px-2 sm:px-3 py-1 border">${i} ${label}</td>
            <td class="px-2 sm:px-3 py-1 border">Tsh ${installmentNow.toLocaleString()}</td>
            <td class="px-2 sm:px-3 py-1 border">Tsh ${interestPerPeriod.toLocaleString()}</td>
            <td class="px-2 sm:px-3 py-1 border">Tsh ${principalPerPeriod.toLocaleString()}</td>
            <td class="px-2 sm:px-3 py-1 border">Tsh ${balance.toLocaleString()}</td>
        </tr>`;
        amortizationBody.innerHTML += row;
    }
}
</script>

