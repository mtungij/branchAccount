<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title><?= htmlspecialchars($comp_data->comp_name) ?> - Loan Pending</title>
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
        .text-right {
            text-align: right;
        }
        .company-header {
            text-align: center;
            margin-top: 20px;
        }
        .company-header img {
            max-height: 80px;
            margin-bottom: 10px;
        }
        .company-header h2 {
            margin: 5px 0;
        }
        .company-header p {
            margin: 2px 0;
        }
    </style>
</head>
<body>
    

    <!-- ✅ Report Title -->
    <h3 style="text-align: center; margin-top: 30px;">Malazo Report</h3>

    <!-- ✅ Table -->
    <table>
        <thead>
            <tr>
            
                          <th scope="col" class="px-4 py-3">S/No</th>
                          <th scope="col" class="px-4 py-3">TAWI</th>
                          <th scope="col" class="px-4 py-3">JINA LA MTEJA</th>
                          <th scope="col" class="px-4 py-3">NAMBA YA SIMU</th>
                          <th scope="col" class="px-4 py-3">MKOPO</th>
						  <th>PRODUCT YA MKOPO</th>
                          <th scope="col" class="px-4 py-3">AINA YA MAREJESHO</th>
                          <th scope="col" class="px-4 py-3">LAZO</th>
                          <th scope="col" class="px-4 py-3">TAREHE</th>
                      
            </tr>
        </thead>
        <tbody>

        <?php 
        $no = 1; 
        $total_loan_int = 0; 
        $total_lazo = 0; 
    ?>

    <?php foreach ($new_pending as $new_pendings): 
        $total_loan_int += $new_pendings->loan_int;
        $total_lazo += $new_pendings->total_pend;
    ?>

           
                   
                  
                       
<tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
            <td ><?php echo $no++; ?>.</td>
            <td ><?php echo $new_pendings->blanch_name; ?></td>
            <td><?php echo $new_pendings->f_name; ?> <?php echo $new_pendings->m_name; ?> <?php echo $new_pendings->l_name; ?></td>
            <td ><?php echo $new_pendings->phone_no; ?></td>
            <td ><?php echo number_format($new_pendings->loan_int); ?></td>
			<td ><?php echo $new_pendings->loan_name; ?></td>
            <td>
    <?php 
        $frequency = '';
        if ($new_pendings->day == '1') {
            $frequency = "Siku";
        } elseif ($new_pendings->day == '7') {
            $frequency = "Week";
        } elseif (in_array($new_pendings->day, ['28','29','30','31'])) {
            $frequency = "Monthly";
        }

        echo $frequency . ' (' . number_format($new_pendings->session) . ')';
    ?>
</td>

            <td ><?php echo number_format($new_pendings->total_pend); ?></td>
            <td ><?php echo $new_pendings->date; ?></td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td>JUMLA</td>
        <td></td>
        <td></td>
        <td></td>
        <td><b><?php echo number_format($total_loan_int); ?></b></td>
        <td></td>
		<td></td>
        <td><b><?php echo number_format($total_lazo); ?></b></td>
        <td></td>
    </tr>
             
        </tbody>
    </table>
</body>
</html>
