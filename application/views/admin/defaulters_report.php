<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $compdata->comp_name; ?> | DEFAULTERS REPORT</title>
</head>
<body>

<div id="container">
  <style>
    	
		body {
			font-family: Arial, sans-serif;
			font-size: 12px;
			color: #333;
		}
		.header {
			text-align: center;
			margin-bottom: 10px;
		}
		.header img {
			max-height: 80px;
			margin-bottom: 8px;
		}
		table {
			border-collapse: collapse;
			width: 100%;
			margin-top: 10px;
		}
		th, td {
			border: 1px solid #ddd;
			padding: 6px 8px;
			text-align: left;
		}
		th {
			background: #00bcd4;
			color: #fff;
		}
		.total-row {
			background: #f2f2f2;
			font-weight: bold;
		}
		.section-title {
			margin-top: 16px;
			font-weight: bold;
			text-align: left;
		}
	</style>
  

  <table style="border: none">
    <tr style="border: none">
      <td style="border: none">
        <div style="width: 20%;">
          <?php if (!empty($compdata->comp_logo) && file_exists(FCPATH . 'assets/images/company_logo/' . $compdata->comp_logo)): ?>
            <img src="<?php echo base_url('assets/images/company_logo/' . $compdata->comp_logo); ?>" alt="Company Logo" style="max-height: 80px;">
          <?php elseif (!empty($compdata->comp_logo) && file_exists(FCPATH . 'assets/img/' . $compdata->comp_logo)): ?>
            <img src="<?php echo base_url('assets/img/' . $compdata->comp_logo); ?>" alt="Company Logo" style="max-height: 80px;">
          <?php endif; ?>
        </div> 
      </td>
      <td style="border: none">
        <div class="pull">
          <p style="font-size:14px;" class="c">
            <b><?php echo $compdata->comp_name; ?></b><br>
            <b><?php echo $compdata->adress; ?></b> <br>
          </p>
       <p style="font-size:12px;text-align:center;" class="c">
    <strong><?php echo $this->lang->line('pdf_yesterday_defaulters_report') ?: "Yesterday's Defaulters Report"; ?></strong>
    <br>
    <?php echo $this->lang->line('date') ?: 'Date'; ?>: <?php echo date("d-m-Y"); ?>
</p>

          <?php if (!empty($default_yesterday_applied)): ?>
            <p style="font-size:11px;text-align:center;color:#c62828;font-weight:700;">
              <?php
                $defaultDateText = !empty($default_end_date_value) ? date('d-m-Y', strtotime($default_end_date_value)) : date('d-m-Y', strtotime('-1 day'));
                echo ($this->lang->line('npt_yesterday') ?: 'Yesterday') . ': ' . $defaultDateText;
              ?>
            </p>
          <?php endif; ?>
          
          <?php if ($blanch_data): ?>
            <p style="font-size:11px;text-align:center;">
              <b>Branch:</b> <?php echo $blanch_data->blanch_name; ?>
            </p>
          <?php endif; ?>
          
          <?php if ($empl_data): ?>
            <p style="font-size:11px;text-align:center;">
              <b>Employee:</b> <?php echo $empl_data->empl_name; ?>
            </p>
          <?php endif; ?>
          
          <?php if ($from && $to): ?>
            <p style="font-size:11px;text-align:center;">
              <b>Period:</b> <?php echo date('d-m-Y', strtotime($from)); ?> to <?php echo date('d-m-Y', strtotime($to)); ?>
            </p>
          <?php endif; ?>
          
          <?php if (!empty($overdue_days)): ?>
            <p style="font-size:11px;text-align:center;">
              <b>Overdue Days:</b> <?php echo $overdue_days; ?>+ days
            </p>
          <?php endif; ?>
        </div>
      </td>
    </tr>
  </table>

  <div id="body">
    <hr>

    <?php
    // Group $outstand by branch
    $branches = [];
    if (!empty($outstand)) {
      foreach ($outstand as $row) {
        $branches[$row->blanch_name][] = $row;
      }
    }
    ?>

    <?php if (!empty($branches)): ?>
      <?php $grand_loan = $grand_restoration = $grand_paid = $grand_remain = 0; $branch_no = 1; ?>
      <?php foreach ($branches as $branch_name => $branch_rows): ?>
        <h3 style="background:#e0f7fa;color:#006064;padding:8px 12px;border-radius:6px;margin-top:24px;">
          <?= $branch_no++ ?>. Branch: <b><?= htmlspecialchars($branch_name) ?></b>
        </h3>
        <table style="margin-bottom:10px;">
          <thead>
            <tr>
              <th style="font-size:12px;">S/No.</th>
              <th style="font-size:12px;">Customer Name</th>
              <th style="font-size:12px;">Phone Number</th>
              <th style="font-size:12px;">Loan Amount</th>
              <th style="font-size:12px;">Restoration</th>
              <th style="font-size:12px;">Duration</th>
              <th style="font-size:12px;">Paid Amount</th>
              <th style="font-size:12px;">Remain Amount</th>
              <th style="font-size:12px;">Overdue Days</th>
              <th style="font-size:12px;">Start Date</th>
              <th style="font-size:12px;">End Date</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $b_loan = $b_restoration = $b_paid = $b_remain = 0;
            $no = 1;
            foreach ($branch_rows as $outstands):
              $b_loan += $outstands->loan_int;
              $b_restoration += $outstands->restration;
              $b_paid += $outstands->total_deposit;
              $b_remain += ($outstands->loan_int - $outstands->total_deposit);
            ?>
            <tr>
              <td><?php echo $no++; ?>.</td>
            <td>
    <?php 
        echo mb_strtoupper(
            $outstands->f_name . ' ' . 
            $outstands->m_name . ' ' . 
            $outstands->l_name,
            'UTF-8'
        ); 
    ?>
</td>
              <td><?php echo $outstands->phone_no; ?></td>
              <td><?php echo number_format($outstands->loan_int); ?></td>
              <td><?php echo number_format($outstands->restration); ?></td>
              <td>
                <?php 
                  if ($outstands->day == 1) $duration = "Daily";
                  elseif ($outstands->day == 7) $duration = "Weekly";
                  elseif (in_array($outstands->day, [28, 29, 30, 31])) $duration = "Monthly";
                  else $duration = "-";
                  echo $duration . ' (' . number_format($outstands->session) . ')';
                ?>
              </td>
              <td><?php echo number_format($outstands->total_deposit); ?></td>
              <td><?php echo number_format($outstands->loan_int - $outstands->total_deposit); ?></td>
              <td><b><?php 
              if ($outstands->loan_int == $outstands->total_deposit) {
                  echo 0; // Not default
              } else {
                  echo $outstands->pending_day;
              }
              
              
              ?></b></td>
              <td><?php echo substr($outstands->loan_stat_date, 0, 10); ?></td>
              <td><?php echo substr($outstands->loan_end_date, 0, 10); ?></td>
            </tr>
            <?php endforeach; ?>
            <!-- Branch Subtotals -->
            <tr style="background:#b2ebf2;color:#006064;font-weight:bold;">
              <td colspan="3" style="text-align:right;"><b>Branch Total:</b></td>
              <td><b><?php echo number_format($b_loan); ?></b></td>
              <td><b><?php echo number_format($b_restoration); ?></b></td>
              <td></td>
              <td><b><?php echo number_format($b_paid); ?></b></td>
              <td><b><?php echo number_format($b_remain); ?></b></td>
              <td colspan="3"></td>
            </tr>
          </tbody>
        </table>
        <?php
          $grand_loan += $b_loan;
          $grand_restoration += $b_restoration;
          $grand_paid += $b_paid;
          $grand_remain += $b_remain;
        ?>
      <?php endforeach; ?>
      <!-- Grand Totals -->
      <div style="margin-top:24px; max-width:600px; margin-left:auto; margin-right:auto; border-radius:10px; box-shadow:0 2px 8px rgba(0,0,0,0.08); overflow:hidden;">
        <div style="background:#00bcd4; color:#fff; padding:12px 20px; font-size:18px; font-weight:bold; text-align:center; letter-spacing:1px;">
          Grand Totals
        </div>
        <div style="background:#e0f7fa; color:#006064; display:flex; flex-wrap:wrap; justify-content:space-between; padding:18px 20px; font-size:16px;">
          <div style="flex:1 1 45%; margin-bottom:10px; min-width:200px;">
            <span style="font-weight:600;">Total Loan Amount:</span> <span style="float:right;"><?php echo number_format($grand_loan); ?></span>
          </div>
          <div style="flex:1 1 45%; margin-bottom:10px; min-width:200px;">
            <span style="font-weight:600;">Total Restoration:</span> <span style="float:right;"><?php echo number_format($grand_restoration); ?></span>
          </div>
          <div style="flex:1 1 45%; margin-bottom:10px; min-width:200px;">
            <span style="font-weight:600;">Total Paid:</span> <span style="float:right;"><?php echo number_format($grand_paid); ?></span>
          </div>
          <div style="flex:1 1 45%; margin-bottom:10px; min-width:200px;">
            <span style="font-weight:600;">Total Remain:</span> <span style="float:right;"><?php echo number_format($grand_remain); ?></span>
          </div>
        </div>
      </div>
    <?php else: ?>
      <div style="text-align:center;padding:20px;">No defaulters found for the selected criteria.</div>
    <?php endif; ?>




