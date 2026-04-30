<!DOCTYPE html>
<html lang="sw">
  <head>
  
    <title>Mkataba wa Mkopo - <?= $compdata->comp_name ?></title>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap");

      body {
        font-family: "Poppins", sans-serif;
        font-size: 10pt;
        line-height: 1.5;
        color: #000;
      }

      .page {
        page-break-after: always;
        width: 100%;
        position: relative;
      }
      .page.last-page {
        page-break-after: auto;
      }

            .company-logo {
              max-width: 82px;
              max-height: 82px;
              display: block;
              margin: 0 auto 6px auto;
            }

      .page.page-three p {
        margin-top: 4px !important;
        margin-bottom: 4px !important;
        line-height: 1.3;
      }

      .page.page-three h3 {
        margin-top: 6px;
        margin-bottom: 6px;
      }

      .passport-placeholder-top {
        border: 2px solid black;
        height: 110px;
        width: 100px;
        margin: 0 auto;
      }

      .passport-box {
        border: 1.5px solid black;
        height: 140px;
        width: 120px;
        padding-top: 50px;
        text-align: center;
        font-weight: bold;
        margin: 0 auto;
      }

      .company-header h2 {
        font-size: 18pt;
        font-weight: 800;
        margin: 0;
        text-transform: uppercase;
      }
      .company-header p {
        font-size: 12pt;
        font-weight: 700;
        margin: 2px 0;
      }

      .red-line {
        border-bottom: 3px solid red;
        padding-bottom: 3px;
      }

      .main-title-box {
        border: 2px solid black;
        text-align: center;
        margin: 10px 0;
        padding: 5px;
        font-weight: 700;
        font-size: 11pt;
      }

      .input-box {
        border: 2px solid black;
        padding: 6px 10px;
        font-weight: bold;
        font-size: 10pt;
      }

      .stamp-box {
        border: 1.5px solid black;
        height: 100px;
        width: 180px;
        padding: 10px;
        text-align: center;
      }

      .fill-in {
        border-bottom: 1px dotted #000;
        padding: 0 5px;
      }

      .inline-fill {
        display: inline-block;
        border-bottom: 1px dotted #000;
        min-width: 90px;
        line-height: 1.1;
      }

      .checkbox {
        display: inline-block;
        width: 25px;
        height: 18px;
        border: 1.5px solid #000;
        margin-right: 6px;
        vertical-align: middle;
      }

      ol,
      ul {
        padding-left: 25px;
        margin: 5px 0 10px 0;
      }

      li {
        padding-left: 10px;
        margin-bottom: 5px;
      }

      table {
        width: 100%;
        border-collapse: collapse;
      }

      td {
        padding: 1px;
        vertical-align: top;
      }

      .bold {
        font-weight: bold;
      }

      .center {
        text-align: center;
      }

      hr {
        border: none;
        border-top: 1.5px solid #000;
        margin: 20px 0;
      }
    </style>
  </head>
  <body>
<?php
$customer_passport_value = trim((string)($customer->customer_passport ?? $customer->passport ?? ''));
$customer_passport_path = '';

if ($customer_passport_value !== '') {
  if (preg_match('#^(https?://|data:image/)#i', $customer_passport_value)) {
    $customer_passport_path = $customer_passport_value;
  }

    $customer_candidates = [
    ltrim($customer_passport_value, '/'),
    'assets/uploads/' . ltrim($customer_passport_value, '/'),
    'assets/img/' . ltrim($customer_passport_value, '/'),
    'assets/passport/' . ltrim($customer_passport_value, '/'),
        'assets/dhamana/' . ltrim($customer_passport_value, '/'),
        'assets/sponser_passport/' . ltrim($customer_passport_value, '/'),
        'assets/images/passport/' . ltrim($customer_passport_value, '/'),
        'uploads/' . ltrim($customer_passport_value, '/'),
    ];

  if ($customer_passport_path === '') {
    foreach ($customer_candidates as $candidate) {
      $relative = ltrim($candidate, '/');
      if (file_exists(FCPATH . $relative)) {
        $customer_passport_path = FCPATH . $relative;
        break;
      }
        }
    }
}

if ($customer_passport_path === '' && file_exists(FCPATH . 'assets/img/customer21.png')) {
    $customer_passport_path = FCPATH . 'assets/img/customer21.png';
}

$company_logo_path = '';
$company_logo_value = trim((string)($compdata->comp_logo ?? ''));
if ($company_logo_value !== '') {
  $company_logo_candidates = [
    ltrim($company_logo_value, '/'),
    'assets/images/company_logo/' . ltrim($company_logo_value, '/'),
    'assets/img/' . ltrim($company_logo_value, '/'),
  ];

  foreach ($company_logo_candidates as $logo_candidate) {
    if (file_exists(FCPATH . $logo_candidate)) {
      $company_logo_path = FCPATH . $logo_candidate;
      break;
    }
  }
}

$branch_name_text = trim((string)($customer->blanch_name ?? $customer->branch_name ?? ''));
if ($branch_name_text === '') {
  $branch_name_text = '......';
}
?>
    <!-- PAGE 1 -->
    <div class="page">
      <table style="margin-bottom: 10px">
        <tr>
          <td style="width: 25%; vertical-align: middle">
    <div style="width:20px; height:30px; margin:0 auto; border:2px solid black; overflow:hidden; border-radius:50%;">
  <?php if (!empty($customer_passport_path)): ?>
  <img
    src="<?= $customer_passport_path ?>"
    alt="Customer Image"
    style="width: 20%; height: 20%; object-fit: cover; display: block;"
  >
  <?php else: ?>
  No Image
  <?php endif; ?>
</div>


          </td>
          <td style="width: 50%; text-align: center; vertical-align: middle">
            <div class="company-header">
            <?php if (!empty($company_logo_path)): ?>
              <img src="<?= $company_logo_path ?>" alt="Company Logo" class="company-logo">
            <?php endif; ?>
           <h2><?= strtoupper($compdata->comp_name) ?></h2>
              <p><?= strtoupper($compdata->adress) ?></p>
              <p>TAWI: <?= strtoupper($branch_name_text) ?></p>
              <!-- <p class="red-line">PHONE NO. <?= strtoupper($compdata->comp_number) ?></p> -->
            </div>
          </td>
  
<td style="width: 25%; vertical-align: middle">
  <div style="width: 50px; height: 60px; margin: 0 auto; border: 2px solid black; overflow: hidden; border-radius: 5px;">
    <?php
      // Make sure the path is not empty before trying to display it
      if (!empty($mdhamini[0]->passport_path)) {
          // FCPATH provides the server path, e.g., /var/www/html/nack/
          // The database provides the rest of the path, e.g., assets/sponser_passport/image.jpg
          $image_path = FCPATH . $mdhamini[0]->passport_path;
    ?>
    <img
      src="<?= $image_path ?>"
      alt="Mdhamini Passport"
      style="width: 20%; height: 20%; object-fit: cover; display: block;"
    >
    <?php
      } else {
          // Optional: Show a placeholder or empty box if no image path exists
          echo 'No Image';
      }
    ?>
  </div>
</td>


        </tr>
      </table>
<?php
// Assume $loan_form contains your data from the database
// Let's use an example date for demonstration
// $loan_form->loan_day = '2025-07-25 21:12:00'; 

// 1. Create a DateTime object from your date string
$date_object = new DateTime($loan_form->loan_day);

// 2. Create an array of Swahili month names
$swahili_months = [
    1 => 'Januari',
    2 => 'Februari',
    3 => 'Machi',
    4 => 'Aprili',
    5 => 'Mei',
    6 => 'Juni',
    7 => 'Julai',
    8 => 'Agosti',
    9 => 'Septemba',
    10 => 'Oktoba',
    11 => 'Novemba',
    12 => 'Desemba',
];

// 3. Get the specific parts you need from the date
$readable_date = $date_object->format('d/m/Y');
$customer_age_text = '......';
$business_type_text = trim((string)($loan_form->reason ?? ''));
$business_area_text = trim((string)($customer->place_imployment ?? ''));

if (!function_exists('number_to_swahili_words')) {
  function number_to_swahili_words($number)
  {
    $ones = [
      0 => 'sifuri',
      1 => 'moja',
      2 => 'mbili',
      3 => 'tatu',
      4 => 'nne',
      5 => 'tano',
      6 => 'sita',
      7 => 'saba',
      8 => 'nane',
      9 => 'tisa',
      10 => 'kumi',
      11 => 'kumi na moja',
      12 => 'kumi na mbili',
      13 => 'kumi na tatu',
      14 => 'kumi na nne',
      15 => 'kumi na tano',
      16 => 'kumi na sita',
      17 => 'kumi na saba',
      18 => 'kumi na nane',
      19 => 'kumi na tisa',
    ];

    $tens = [
      2 => 'ishirini',
      3 => 'thelathini',
      4 => 'arobaini',
      5 => 'hamsini',
      6 => 'sitini',
      7 => 'sabini',
      8 => 'themanini',
      9 => 'tisini',
    ];

    $to_words = function ($n) use (&$to_words, $ones, $tens) {
      $n = (int)$n;

      if ($n < 20) {
        return $ones[$n];
      }

      if ($n < 100) {
        $ten = (int)floor($n / 10);
        $rem = $n % 10;
        return $rem ? ($tens[$ten] . ' na ' . $ones[$rem]) : $tens[$ten];
      }

      if ($n < 1000) {
        $hund = (int)floor($n / 100);
        $rem = $n % 100;
        $head = 'mia ' . $ones[$hund];
        return $rem ? ($head . ' na ' . $to_words($rem)) : $head;
      }

      if ($n < 100000) {
        $th = (int)floor($n / 1000);
        $rem = $n % 1000;
        $head = 'elfu ' . $to_words($th);
        return $rem ? ($head . ' na ' . $to_words($rem)) : $head;
      }

      if ($n < 1000000) {
        $laki = (int)floor($n / 100000);
        $rem = $n % 100000;
        $head = 'laki ' . $to_words($laki);
        return $rem ? ($head . ' na ' . $to_words($rem)) : $head;
      }

      if ($n < 1000000000) {
        $mil = (int)floor($n / 1000000);
        $rem = $n % 1000000;
        $head = 'milioni ' . $to_words($mil);
        return $rem ? ($head . ' na ' . $to_words($rem)) : $head;
      }

      $bil = (int)floor($n / 1000000000);
      $rem = $n % 1000000000;
      $head = 'bilioni ' . $to_words($bil);
      return $rem ? ($head . ' na ' . $to_words($rem)) : $head;
    };

    $value = round((float)$number, 2);
    $value = abs($value);
    $whole = (int)floor($value);
    $cents = (int)round(($value - $whole) * 100);

    $words = $to_words($whole);
    if ($cents > 0) {
      $words .= ' na senti ' . $to_words($cents);
    }

    return $words;
  }
}

$loan_amount_words = number_to_swahili_words($loan_form->loan_int ?? 0);
$loan_interest_percent_raw = $loan_form->interest_formular ?? ($customer->interest_formular ?? null);
$loan_interest_percent_text = '......';

if ($loan_interest_percent_raw !== null && $loan_interest_percent_raw !== '') {
  $loan_interest_percent_value = (float)$loan_interest_percent_raw;
  $loan_interest_percent_text = rtrim(rtrim(number_format($loan_interest_percent_value, 2, '.', ''), '0'), '.');
}

// Build loan duration label from day + session
$_lday     = (int)($loan_form->day     ?? 0);
$_lsession = (int)($loan_form->session ?? 0);
if ($_lday == 1) {
  $_freq_label = 'kila siku';
  $_unit_label = 'siku';
} elseif ($_lday == 7) {
  $_freq_label = 'kila wiki';
  $_unit_label = 'wiki';
} elseif (in_array($_lday, [28, 29, 30, 31])) {
  $_freq_label = 'kila mwezi';
  $_unit_label = 'miezi';
} elseif ($_lday > 0) {
  $_freq_label = 'kila siku ' . $_lday;
  $_unit_label = 'siku';
} else {
  $_freq_label = '......';
  $_unit_label = '';
}
$loan_duration_text = $_freq_label . ($_lsession > 0 ? ', ' . $_unit_label . ' ' . $_lsession : '');

if ($business_type_text === '') {
  $business_type_text = '......';
}

if ($business_area_text === '') {
  $business_area_text = '......';
}

if (!empty($customer->date_birth)) {
  try {
    $customer_birth_date = new DateTime($customer->date_birth);
    $customer_age = $customer_birth_date->diff(new DateTime())->y;
    $customer_age_text = (string)$customer_age;
  } catch (Exception $exception) {
    $customer_age_text = '......';
  }
}

// Loan fee from tbl_loan_category
$_fee_type  = strtolower(trim((string)($customer->fee_category_type ?? '')));
$_fee_value = trim((string)($customer->fee_value ?? ''));
if ($_fee_value !== '' && $_fee_value !== '0') {
  if ($_fee_type === 'fixed' || $_fee_type === 'amount') {
    $loan_fee_text = 'TSH ' . number_format((float)$_fee_value);
  } else {
    // default: percentage
    $loan_fee_text = rtrim(rtrim(number_format((float)$_fee_value, 2, '.', ''), '0'), '.') . '%';
  }
} else {
  $loan_fee_text = '......';
}

// Approver name (from local government/officer attachment data)
$approver_name_text = trim((string)($local_officer->oficer ?? ''));
if ($approver_name_text === '') {
  $approver_name_text = trim((string)($customer->empl_name ?? ''));
}
if ($approver_name_text === '') {
  $approver_name_text = '......';
}

// Calculate loan payment start and end dates
$_loan_status  = strtolower(trim((string)($loan_form->loan_status ?? '')));
$_start_date_text = '......';
$_end_date_text   = '......';

// Prefer dates from tbl_outstand when available.
if (!empty($loan_form->loan_stat_date) && $loan_form->loan_stat_date !== '0000-00-00') {
  try {
    $_stat_date = new DateTime($loan_form->loan_stat_date);
    $_day_val = (int)($loan_form->day ?? 0);
    $_session_val = (int)($loan_form->session ?? 0);
    
    // Calculate start date based on repayment frequency
    $_start_date = clone $_stat_date;
    if ($_day_val === 1) {
      // Daily: second day from loan_stat_date
      $_start_date->modify('+1 day');
    } elseif ($_day_val === 7) {
      // Weekly: second week from loan_stat_date
      $_start_date->modify('+7 days');
    } elseif (in_array($_day_val, [28, 29, 30, 31])) {
      // Monthly: second month from loan_stat_date
      $_start_date->modify('+1 month');
    } elseif ($_day_val > 0) {
      // Custom interval
      $_start_date->modify('+' . $_day_val . ' days');
    }
    $_start_date_text = $_start_date->format('d/m/Y');
    
    // Calculate end date
    $_end_date = clone $_start_date;
    if ($_day_val === 1) {
      $_end_date->modify('+' . $_session_val . ' days');
    } elseif ($_day_val === 7) {
      $_end_date->modify('+' . $_session_val . ' weeks');
    } elseif (in_array($_day_val, [28, 29, 30, 31])) {
      $_end_date->modify('+' . $_session_val . ' months');
    } elseif ($_day_val > 0) {
      $_end_date->modify('+' . ($_session_val * $_day_val) . ' days');
    }
    $_end_date_text = $_end_date->format('d/m/Y');
  } catch (Exception $e) {
    $_start_date_text = '......';
    $_end_date_text = '......';
  }
}
if (empty($_end_date_text) || $_end_date_text === '......') {
  if (!empty($loan_form->loan_end_date) && $loan_form->loan_end_date !== '0000-00-00') {
    $_end_date_text = (new DateTime($loan_form->loan_end_date))->format('d/m/Y');
  }
}

if (
  $_start_date_text === '......' ||
  $_end_date_text === '......'
) {
  if (
    $_loan_status === 'disbursed' ||
    $_loan_status === 'disburse' ||
    $_loan_status === 'disbarsed'
  ) {
  // Calculate from dis_date
  $_dis_date_str = trim((string)($loan_form->dis_date ?? ''));
  if ($_dis_date_str !== '') {
    try {
      $_dis_date = new DateTime($_dis_date_str);
      $_day_val = (int)($loan_form->day ?? 0);
      $_session_val = (int)($loan_form->session ?? 0);
      
      if ($_day_val === 1) {
        // Daily: first payment tomorrow from dis_date
        $_start_date = clone $_dis_date;
        $_start_date->modify('+1 day');
        $_start_date_text = $_start_date->format('d/m/Y');
        
        // End date: start + session days
        $_end_date = clone $_start_date;
        $_end_date->modify('+' . $_session_val . ' days');
        $_end_date_text = $_end_date->format('d/m/Y');
      } elseif ($_day_val === 7) {
        // Weekly: first payment after 7 days
        $_start_date = clone $_dis_date;
        $_start_date->modify('+7 days');
        $_start_date_text = $_start_date->format('d/m/Y');
        
        // End date: start + session weeks
        $_end_date = clone $_start_date;
        $_end_date->modify('+' . $_session_val . ' weeks');
        $_end_date_text = $_end_date->format('d/m/Y');
      } elseif (in_array($_day_val, [28, 29, 30, 31])) {
        // Monthly: first payment after 1 month
        $_start_date = clone $_dis_date;
        $_start_date->modify('+1 month');
        $_start_date_text = $_start_date->format('d/m/Y');
        
        // End date: start + session months
        $_end_date = clone $_start_date;
        $_end_date->modify('+' . $_session_val . ' months');
        $_end_date_text = $_end_date->format('d/m/Y');
      } elseif ($_day_val > 0) {
        // Custom day interval
        $_start_date = clone $_dis_date;
        $_start_date->modify('+' . $_day_val . ' days');
        $_start_date_text = $_start_date->format('d/m/Y');
        
        // End date: start + (session * day) days
        $_end_date = clone $_start_date;
        $_end_date->modify('+' . ($_session_val * $_day_val) . ' days');
        $_end_date_text = $_end_date->format('d/m/Y');
      }
    } catch (Exception $e) {
      $_start_date_text = '......';
      $_end_date_text = '......';
    }
  }
  }
}
?>

      <div class="main-title-box">MKATABA WA MKOPO <?= strtoupper($compdata->comp_name) ?></div>

      <table style="margin-bottom: 15px">
        <tr>
          <td class="input-box" style="width: 48%">NAMBA YA MTEJA:</td>
          <td style="width: 4%"></td>
          <td class="input-box" style="width: 48%">NAMBA YA MKOPO:</td>
        </tr>
      </table>

    <p style="margin: 6px 0; text-align: justify;">
      Mkataba huu wa kukopeshana fedha umejazwa kwa makubaliano yaliyofanyika leo tarehe
      <span class="bold"><?= $readable_date ?></span>.
    </p>
    <p style="margin: 6px 0; text-align: justify;">
      Baina ya <span class="bold"><?= strtoupper($compdata->comp_name) ?></span>, kampuni iliyosajiliwa kwa sheria za
      Tanzania wa <span class="bold">S.L.P 159</span> <span class="inline-fill" style="min-width: 80px;">&nbsp;</span>,
      Tanzania (ambaye katika mkataba huu atajulikana kama <span class="bold">Mkopeshaji</span>).
    </p>
      <p class="center bold" style="margin: 8px 0">Na</p>
      <p style="margin: 6px 0; text-align: justify;">
        Ndugu <span class="bold"><?= strtoupper($customer->f_name . " " . $customer->m_name . " " . $customer->l_name) ?></span>
        mwenye Umri wa miaka <span class="bold"><?= $customer_age_text ?></span>
        wa <span class="bold">S.L.P .......</span> (ambaye katika mkataba huu atajulikana kama <span class="bold">Mkopaji</span>)
        <span class="inline-fill" style="min-width: 120px;">&nbsp;</span>. Ambaye ni mkazi wa Wilaya ya ...............
        <span class="inline-fill" style="min-width: 90px;">&nbsp;</span>, Tarafa ya ...............................
        <span class="inline-fill" style="min-width: 90px;">&nbsp;</span>, Kata ya ...............
        <span class="inline-fill" style="min-width: 90px;">&nbsp;</span>, Mtaa wa .....................
        <span class="inline-fill" style="min-width: 90px;">&nbsp;</span>, Kitongoji cha ........................
        <span class="inline-fill" style="min-width: 90px;">&nbsp;</span>. Kazi yangu <span class="bold"><?= strtoupper($business_type_text) ?></span>
        Eneo la biashara <span class="bold"><?= strtoupper($business_area_text) ?></span>.
        <span class="inline-fill" style="min-width: 90px;">&nbsp;</span> 
         Tiki na jaza namba moja kati ya nyaraka zifuatazo: kadi ya mpiga kura
         <span style="font-family: DejaVu Sans, sans-serif;">&#x2610;</span>,
         leseni ya udereva <span style="font-family: DejaVu Sans, sans-serif;">&#x2610;</span>,
         hati ya kusafiria <span style="font-family: DejaVu Sans, sans-serif;">&#x2610;</span>,
         au kitambulisho cha makazi <span style="font-family: DejaVu Sans, sans-serif;">&#x2610;</span>.

        
      </p>

      <p>
        Ndoa:Hajaoa/Hajaolewa <span style="font-family: DejaVu Sans, sans-serif;">&#x2610;</span> ameoa/ameolewa
        <span style="font-family: DejaVu Sans, sans-serif;">&#x2610;</span> meachika/Mgane/Mjane
        <span style="font-family: DejaVu Sans, sans-serif;">&#x2610;</span>
      </p>
      <p>
        Jina kamili la mwenza.<span
          class="fill-in"
          style="padding: 0 250px"
        >..................................</span>
      </p>

      <p>
        Umiliki wa makazi: kwako <span style="font-family: DejaVu Sans, sans-serif;">&#x2610;</span> umepanga
        <span style="font-family: DejaVu Sans, sans-serif;">&#x2610;</span> mengine eleza.................<span
          class="fill-in"
          style="padding: 0 180px"
        ></span>
      </p>
      <p>
        1. Kwa mantiki ya mkataba huu mimi <span class="bold"><?= strtoupper($customer->f_name . " " . $customer->m_name . " " . $customer->l_name) ?></span>
        nikiwa na akili timamu, leo hii nakiri kusaini mkataba wa mkopo wa Tshs(tarakimu) <span class="bold"><?= number_format($loan_form->loan_int) ?></span>
        Kwa maneno <span class="bold"><?= strtoupper($loan_amount_words) ?></span>.
      </p>
      <p  style="margin: 6px 0; text-align: justify;">
ambazo ni mkopo wa fedha taslimu pamoja na riba ya <?= $loan_interest_percent_text ?>% <span class="bold"><?= strtoupper($loan_duration_text) ?></span>.
  </p>
  <p style="margin: 6px 0; text-align: justify;">
        Kiasi hiki cha mkopo niliokopa ni kwa ajili ya <span class="bold\"><?= strtoupper($loan_form->reason) ?></span>.
      </p>

      2. Naapa na kukiri kwamba, mimi ndiye mwenye majina na anwani tajwa hapo juu,deni tajwa ni halali kabisa.
       Na kwamba pesa za mkopo huu niliokopa nitazirejesha kwa mujibu wa vigezo na masharti ya mkataba huu.
<br>
       3. Kwa mantiki ya makubaliano nitalipa deni hili bila ya usumbufu wowote ndani ya  muda wa <span class="bold"><?= strtoupper($loan_duration_text) ?></span> 
       ambapo nitapaswa kulipa kiasi cha TSH.<b><?= number_format($loan_form->restration) ?></b> <?= strtoupper($loan_duration_text) ?>.
       <br>
       jumla ya deni nitakalolipa itakuwa ni TSH.<b><?= number_format($loan_form->loan_int) ?></b> ndani ya muda wa <span class="bold"><?= strtoupper($loan_duration_text) ?></span>.


      <p style="margin: 6px 0; text-align: justify;">
        Nakiri na kuhaidi kuwa nitakuwa  mwaminifu na mwenye kuheshimu masharti ya mkataba huu na kwamba nitarejesha mkopo huu kwa wakati bila kuchelewa au kushindwa kulipa kwa uzembe.
        Vinginevyo, hatua za kisheria dhidi yangu ikiwa ni pamoja na kushitakiwa kujipatia fedha/mali kwa njia ya  udanganyifu.
  </p>

    </div>

    <!-- PAGE 2 -->
    <div class="page page-three last-page">

     

      <p class="bold" style="margin-top: 15px; text-transform: uppercase">
        VIGEZO NA MASHARTI YA MKATABA HUU
      </p>
      <ol>
        <li>
           Mkopaji atalipia fomu hii ya mkopo asilimia <span class="bold"><?= $loan_fee_text ?></span> ya mkopo anaochukua kwa ajili ya gharama za uandaaji wa mkataba wa mkopo huu.
        </li>
        <li>
           Mkopaji atapaswa kuanza kurejesha mkopo huu kuanzia tarehe <span class="bold"><?= $_start_date_text ?></span> mpaka tarehe <span class="bold"><?= $_end_date_text ?></span>.
        </li>
        <li>
          3. Wajibu wa pande mbili (mdai na mdaiwa), utatekelezwa kwa mujibu wa sheria za nchi ya Tanzania.
        </li>
        <li>
          Pande zote mbili zinakubaliana kwamba kila upande unapaswa kutoa taarifa mapema kwa upande mwingine iwapo itatokea kuna jambo lililo nje ya uwezo wake kuhusu mkataba huu.
        </li>
        <li>
          Iwapo mgogoro utatokea kati ya pande mbili, pande zote mbili zinakubaliana kutafuta suluhisho kwa njia ya mazungumzo na usuluhishi kabla ya kwenda mahakamani.
        </li>
        <li>
          Mkopaji anakubali kwamba endapo atashindwa kulipa mkopo huu kwa wakati au kwa uzembe, basi Mkopeshaji atakuwa na haki ya kuchukua hatua za kisheria dhidi yake ili kuhakikisha mkopo huu unarejeshwa kikamilifu.
        </li>
        <li>
          Nimesoma na kuelewa vigezo na masharti ya mkataba huu wa mkopo, nakubaliana na masharti haya bila kushurutishwa na mtu yeyote.
        </li>
      </ol>

      <p class="bold" style="margin-top: 15px; text-transform: uppercase">
        DHAMANA YA MKOPO
      </p>

      <ol>
        <li>LENGO LA DHAMANA</li>
      </ol>
      <p style="margin: 6px 0; text-align: justify;">
          (a) Lengo la dhamana ya mkopo ni kampuni  kujidhisha kuwa Mkopaji anarejesha mkopo huu pamoja na riba na gharama zozote  zitakazojitokeza katika kutekeleza mapatano ya mkopo huu
      </p>

      <ol start="2">
        <li> MALI ILIYOWEKWA DHAMANA YA MKOPO</li>
      </ol>
      <p style="margin: 6px 0; text-align: justify;">
        Mimi <span class="bold"><?= strtoupper($customer->f_name . " " . $customer->m_name . " " . $customer->l_name) ?></span> nikiwa na akili timamu, leo tarehe <span class="bold"><?= date('d-m-Y') ?></span> hii nakiri kuweka dhamana zifuatazo kwa ajili ya mkopo huu.
      </p>
      <ul>
        <?php if (!empty($collateral)): ?>
          <?php foreach ($collateral as $item): ?>
            <li>
              <span class="fill-in" style="display: block; width: 100%">&nbsp;</span>
              <span class="bold"><?= $item->description ?></span>
            </li>
          <?php endforeach; ?>
        <?php else: ?>
          <li>
            <span class="fill-in" style="display: block; width: 100%">&nbsp;</span>
            <span class="bold">Dhamana hazijajazwa</span>
          </li>
        <?php endif; ?>
      </ul>
      <p style="margin: 6px 0; text-align: justify;">
        (a) Ninatamka nikiwa na akili timamu kuwa endapo nikishindwa kulipa mkopo kwa mujibu wa makubaliano haya basi kampuni (mdai) itakuwa na haki kwa mujibu wa mapatano haya kufidia deni kwa kumiliki au kuuza dhamana iliyowekwa/zilizowekwa bila
        masharti yoyote wala kikwazo kutoka kwangu wala mtu yeyote kufidia deni na gharama zitakazokuwa zimejitokeza kama na mdai kufuatilia deni hilo.ninakabidhi mali iliyowekwa/zilizowekwa kwa mdai ndani ya siku tatu bila ya usumbufu wowote baada ya muda wa malipo kuisha au kuanzia pale nitakapokuwa ninaanza kukiuka makubaliano ya kulipa.
      </p>

      <p style="margin: 6px 0; text-align: justify;">
        (b)Endapo muda wa mkataba huu ukiisha bila deni lolote deni lote kulipwa ama kukiuka makubaliano ya kulipa,ikifika wakati wa kukabidhi dhamana ikawa imepoteza thamani yake au imeharibika kwa kiasi kikubwa, basi mdai atakuwa na haki ya kukabidhi dhamana nyingine yenye thamani sawa au zaidi kwa ajili ya kufidia deni hili.
      </p>
      <p class="bold" style="margin-top: 12px; text-align: justify;">
        SAHIHI YA MKOPAJI ............................
        <span class="inline-fill" style="min-width: 180px;">&nbsp;</span>.
        DOLE GUMBA ..........................................
        <span class="inline-fill" style="min-width: 180px;">&nbsp;</span>.
      </p>
    </div>

    <!-- PAGE 3 -->
    <div class="page">
      <h3 class="center bold" style="margin-bottom: 10px">
        SEHEMU YA MDHAMINI
      </h3>
      <p style="margin: 6px 0; text-align: justify;">
  <?php
$first_mdhamini = $mdhamini[0]; // Access the first sponsor

$full_mdhamini_name = strtoupper(
    $first_mdhamini->sp_name . ' ' .
    $first_mdhamini->sp_mname . ' ' .
    $first_mdhamini->sp_lname
);
?>
        Mimi Ndugu <span class="bold"><?= $full_mdhamini_name ?></span>
        <span class="inline-fill" style="min-width: 120px;">&nbsp;</span>. Ni mkazi wa Wilaya ya ............................
        <span class="inline-fill" style="min-width: 90px;">&nbsp;</span>, Tarafa .........................
        <span class="inline-fill" style="min-width: 90px;">&nbsp;</span>, Kata .................................
        <span class="inline-fill" style="min-width: 90px;">&nbsp;</span>, Mtaa........................................
        <span class="inline-fill" style="min-width: 90px;">&nbsp;</span>, Kitongoji...................................
        <span class="inline-fill" style="min-width: 90px;">&nbsp;</span>.
        Namba ya simu <span class="bold"><?= $first_mdhamini->sp_phone_no ?></span>.
        Kazi yangu <span class="bold"><?= strtoupper($first_mdhamini->nature) ?></span>.
        <span class="inline-fill" style="min-width: 90px;">&nbsp;</span>.
        Namba moja kati ya nakala zifuatazo: kadi ya mpiga kura <span style="font-family: DejaVu Sans, sans-serif;">&#x2610;</span>,
        hati ya kusafiria/leseni ya udereva <span style="font-family: DejaVu Sans, sans-serif;">&#x2610;</span>,
        kitambulisho cha utaifa na kitambulisho cha mkazi <span style="font-family: DejaVu Sans, sans-serif;">&#x2610;</span>.
      </p>
      <p style="margin: 4px 0 8px 0; text-align: justify;">
        Namba ya kitambulisho .................................
        <span class="inline-fill" style="min-width: 260px;">&nbsp;</span>
      </p>
      <p style="margin: 6px 0; text-align: justify;">
        <b>Kwa hiari yangu mwenyewe na nikiwa na akili timamu bila kushurutishwa na
        mtu yeyote nakubali kumdhamini</b> Bw/Bi
        <span class="bold"><?= strtoupper($customer->f_name . " " . $customer->m_name . " " . $customer->l_name) ?></span>.
        ambaye ninathibithisha kuwa ninamfahamu mkopaji vizuri anapofanyia kazi/biashara, na nyumbani anapoishi Na ya kwamba nitakuwa tayari kwa lolote litakalojitokeza endapo
        niliye mdhamini ataenda kinyume na moja kati ya vigezo na masharti ya
        mkataba huu. Nipo tayari  kumlipia endapo atashindwa kurejesha au
        kuchukuliwa dhamana zangu nilizoandikia kwa ajili ya kufidia deni lake.
      </p>

      <!-- <p>
        Ndoa: Hajaoa/hajaolewa <span class="checkbox"></span> amevaa/ameolewa
        <span class="checkbox"></span> ameachika/mgane/mjane
        <span class="checkbox"></span>
      </p> -->
      <!-- <p>
        Jina kamili la mwenza
        <span class="fill-in" style="padding: 0 200px"></span>.umaarufu
        <span class="fill-in" style="padding: 0 200px"></span>
      </p> -->
      <!-- <p>
        Umiliki wa makazi: Kwako <span class="checkbox"></span> umepanga
        <span class="checkbox"></span> mengine (eleza)<span
          class="fill-in"
          style="padding: 0 200px"
        ></span>
      </p> -->
      <p style="margin: 6px 0; text-align: justify;">
        Pesa taslimu ninayomdhamini ni TSH ................
        <span class="inline-fill" style="min-width: 140px;">&nbsp;</span>
        (kwa maneno) .............................
        <span class="inline-fill" style="min-width: 160px;">&nbsp;</span>.
      </p>
      <table style="margin-top: 10px; width: 100%; border-collapse: collapse;">
        <tr>
          <td style="width: 44%; padding: 4px 0;"><span class="bold">SAINI YA MDHAMINI</span></td>
          <td style="width: 56%; padding: 4px 0;">: ........................................ <span class="inline-fill" style="min-width: 260px;">&nbsp;</span></td>
        </tr>
        <tr>
          <td style="padding: 4px 0;"><span class="bold">DOLE GUMBA</span></td>
          <td style="padding: 4px 0;">: <span class="inline-fill" style="min-width: 260px;">&nbsp;</span></td>
        </tr>
        <br>
        <tr>
          <td style="padding: 4px 0;">JINA LA MKOPESHAJI (AFISA MIKOPO)</td>
          <td style="padding: 4px 0;">: <span class="bold"><?= strtoupper($customer->empl_name ?? '......') ?></span></td>
        </tr>
        <tr>
          <td style="padding: 4px 0;">SAHIHI YA MKOPESHAJI</td>
          <td style="padding: 4px 0;">: ........................................<span class="inline-fill" style="min-width: 260px;">&nbsp;</span></td>
        </tr>
        <tr>
          <td style="padding: 4px 0;">JINA LA MUIDHINISHA MKOPO</td>
          <td style="padding: 4px 0;">: ........................................</span></td>
        </tr>
        <tr>
          <td style="padding: 4px 0;">SAHIHI YA MUIDHINISHA MKATABA</td>
          <td style="padding: 4px 0;">: ........................................<span class="inline-fill" style="min-width: 260px;">&nbsp;</span></td>
        </tr>
      </table>
    </div>

  </body>
</html>
