


 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title><?= htmlspecialchars($company_data->comp_name) ?> - REPORT YA SIKU</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 6px 8px;
            text-align: left;
        }
        th {
            background-color: #00bcd4;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .total-row {
            background-color: #ddd;
            font-weight: bold;
        }
        .company-header {
            text-align: center;
            margin-top: 20px;
        }
        .company-header img {
            max-height: 80px;
            margin-bottom: 10px;
        }
.badge {
  display: inline-block;
  font-size: 12px;
  font-weight: 500;
  line-height: 1;
  padding: 2px 8px;
  border-radius: 4px;
  margin-right: 6px;
  border: 1px solid transparent;
}

/* Red badge */
.badge-red {
  background-color: #fee2e2; /* light red */
  color: #991b1b;           /* dark red */
  border-color: #f87171;    /* medium red */
}

/* Green badge */
.badge-green {
  background-color: #dcfce7; /* light green */
  color: #166534;           /* dark green */
  border-color: #4ade80;    /* medium green */
}

/* Yellow badge */
.badge-yellow {
  background-color: #fef9c3; /* light yellow */
  color: #854d0e;           /* dark yellow */
  border-color: #facc15;    /* medium yellow */
}



    </style>
</head>
<body>
<?php 
// $company_phone = $company_data->comp_phone;
$logo_path = FCPATH . 'assets/img/cdclogo.png';
$logo_url = 'file://' . $logo_path;
?>

<!-- Company Header -->
<div class="company-header">
    
      <img src="<?= $logo_url ?>" alt="Company Logo" style="max-height: 100px; width: auto;" /> 

    <h2><?= strtoupper(htmlspecialchars($company_name)) ?></h2>
    <!-- <p><?= htmlspecialchars($company_address) ?></p> -->
    <!-- <p>Email: <?= htmlspecialchars($company_email) ?> | Phone: <?= htmlspecialchars($company_phone) ?></p> -->
</div>

<!-- Report Title -->
<h3 style="text-align: center; margin-top: 30px;">REPORT YA SIKU-<?= $blanch_data->blanch_name ?></h3>

  <?php
    // Initialize totals BEFORE the condition
    $sno = 1;
    $total_restration = 0;
    $total_depost = 0;
    $total_laza = 0;
    $total_zidi = 0;
?>


<!-- Table -->
<table>
    <thead>
        <tr>
            <th>S/No</th>
            <th>Jina La Mteja</th>
            <th>Status</th>
            <th>Mkopo + Riba</th>
            <th>Rejesho</th>
            <th>Lipwa</th>
             <th>Method</th>
             <th>Wakala</th>
            <th>Dabo</th>
            <th>lazo</th>
            <!-- <th>iliyolipwa Jumla</th> -->
            <th>Deni Lilobaki</th>
        </tr>
    </thead>
    <tbody>


     <?php 
        $no = 1;
        $total_rejesho = 0;
        $total_lipwa = 0;
        $total_laza = 0;
        $total_zidi = 0;

        foreach ($cash as $cashs): 
            if (empty($cashs->depost) || empty($cashs->customer_id)) {
                continue;
            }

            $rejesho = $cashs->restrations;
            $lipwa = $cashs->depost;
            $laza = ($lipwa < $rejesho) ? ($rejesho - $lipwa) : 0;
            $zidi = ($lipwa > $rejesho) ? ($lipwa - $rejesho) : 0;

            $total_rejesho += $rejesho;
            $total_lipwa += $lipwa;
            $total_laza += $laza;
            $total_zidi += $zidi;
        ?>
       <tr class="font-bold text-gray-900 dark:text-white bg-gray-100 dark:bg-gray-700">
            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $no++; ?></td>
          <td>
    <?php echo strtoupper($cashs->f_name . ' ' . $cashs->m_name . ' ' . $cashs->l_name); ?>
</td>

<td>
    <?php if ($cashs->loan_status == 'withdrawal'): ?>
        <span class="badge badge-green">Ndani ya mkataba</span>
    <?php elseif ($cashs->loan_status == 'out'): ?>
        <span class="badge badge-red">Nje ya mkataba</span>
    <?php elseif ($cashs->loan_status == 'done'): ?>
        <span class="badge badge-yellow">Done</span>
    <?php else: ?>
        <span class="badge"><?=$cashs->loan_status?></span>
    <?php endif; ?>
</td>



            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= number_format($cashs->loan_int)?></td>
            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo number_format($rejesho); ?></td>
            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo number_format($lipwa); ?></td>
           
               <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $cashs-> account_name; ?></td>
                 <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $cashs->wakala; ?></td>
             <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $zidi > 0 ? number_format($zidi) : '-'; ?></td>
            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $laza > 0 ? number_format($laza) : '-'; ?></td>

             <!-- <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?=number_format($cashs->total_deposit)?></td>  -->
                  <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= number_format($cashs->loan_int - $cashs->total_deposit)?></td> 
        </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot class="font-bold text-gray-900 dark:text-white bg-gray-100 dark:bg-gray-700">
        <tr>
            <th>JUMLA</th>
            <th  class="px-4 py-3"></th>
            <th  class="px-4 py-3"><?php echo number_format($total_rejesho); ?></th>
            <th  class="px-4 py-3"><?php echo number_format($total_lipwa); ?></th>
            <th  class="px-4 py-3"><?php echo number_format($total_laza); ?></th>
            <th  class="px-4 py-3"><?php echo number_format($total_zidi); ?></th>
            <th  class="px-4 py-3"></th>
             <th  class="px-4 py-3"></th>
        </tr>
    </tfoot>

    </tbody>
</table>

</body>
</html>
