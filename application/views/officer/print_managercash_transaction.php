<?php
function status_svg($status) {
    switch(strtolower($status)) {
        case 'withdrawal': // active
            return '<svg width="16" height="16" style="vertical-align:middle;"><circle cx="8" cy="8" r="8" fill="#28a745"/></svg> Ndani ya Mkataba';
        case 'out': // past contract
            return '<svg width="16" height="16" style="vertical-align:middle;"><circle cx="8" cy="8" r="8" fill="#dc3545"/></svg> Deni Sugu';
        case 'done': // completed
            return '<svg width="16" height="16" style="vertical-align:middle;"><circle cx="8" cy="8" r="8" fill="#fd7e14"/></svg> Dabo';
        default:
            return '<svg width="16" height="16" style="vertical-align:middle;"><circle cx="8" cy="8" r="8" fill="#6c757d"/></svg> '.htmlspecialchars($status);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title><?= htmlspecialchars($comp_data->comp_name) ?> - Report ya Siku</title>
<style>
html, body {margin:0;padding:0;width:100%;box-sizing:border-box;font-family:"Segoe UI", Tahoma, Geneva, Verdana, sans-serif;color:#333;background-color:#f9f9f9;}
h1,h2,h3,h4{margin:5px 0;}
h1{font-size:28px;color:#007bff;text-align:center;margin-top:20px;border-bottom:2px solid #007bff;padding-bottom:5px;}
h2{text-align:center;}
h3{text-align:center;font-size:20px;color:#555;margin:20px 0 10px;text-transform:uppercase;letter-spacing:1px;}
h4{font-size:16px;color:#555;margin:25px 0 10px;border-bottom:1px dashed #ccc;padding-bottom:3px;}
.company-header{text-align:center;margin-top:20px;}
table{border-collapse:collapse;width:100%;margin-top:15px;background-color:#fff;box-shadow:0 2px 5px rgba(0,0,0,0.05);}
th,td{border:1px solid #ccc;padding:8px 10px;text-align:left;font-size:13px;}
th{background-color:#007bff;color:#fff;text-transform:uppercase;letter-spacing:0.5px;}
tr:nth-child(even){background-color:#f2f2f2;}
.total-row{background-color:#e0e0e0;font-weight:bold;}
.summary-table th,.summary-table td{text-align:center;}
</style>
</head>
<body>

<div class="company-header">
    <h2><?= htmlspecialchars($company_name) ?></h2>
    <p><?= htmlspecialchars($company_address ?? '') ?> | Phone: <?= htmlspecialchars($company_phone ?? '0753979112') ?></p>
</div>

<h1>HESABU YA SIKU</h1>
<h3>TAWI: <?= htmlspecialchars($blanch_data->blanch_name ?? 'All') ?></h3>

<h4>Cash Transactions</h4>
<table>
<thead>
<tr>
<th>S/No</th>
<th>Jina la Mteja</th>
<th>Status</th>
<th>Namba ya Simu</th>
<th>Mkopo</th>
<th>Muda Wa Marejesho</th>
<th>Rejesho</th>
<th>Account</th>
<th>Wakala</th>
<th>Lipwa</th>
<th>Lazo</th>
<th>Dabo</th>
<th>Deni</th>
<th>Afisa</th>
<th>Tarehe</th>
</tr>
</thead>
<tbody>
<?php 
$total_restration=0; $total_depost=0; $total_laza=0; $total_zidi=0; $status_summary=[]; $account_summary=[]; $no=1;
foreach ($lazo['details'] as $item):
    $laza = $item->depost < $item->restration ? $item->restration - $item->depost : 0;
    $zidi = $item->depost > $item->restration ? $item->depost - $item->restration : 0;
    $total_restration += $item->restration;
    $total_depost += $item->depost;
    $total_laza += $laza;
    $total_zidi += $zidi;
    $account = $item->account_name ?? 'Haijatajwa';
?>
<tr>
<td><?= $no++ ?></td>
<td><?= strtoupper(htmlspecialchars($item->full_name)) ?></td>
<td><?= status_svg($item->loan_status) ?></td>

<td><?= htmlspecialchars((strpos($item->phone_no,'255')===0)?'0'.substr($item->phone_no,3):$item->phone_no) ?></td>
<td><?= number_format($item->loan_amount) ?></td>
<td><?= ($item->day=='1'?'Siku':($item->day=='7'?'Wiki':'Mwezi')).' ('.htmlspecialchars($item->session).')' ?></td>
<td><?= number_format($item->restration) ?></td>
<td><?= $account ?></td>
<td><?= $item->wakala ?></td>
<td><?= number_format($item->depost) ?></td>
<td><?= number_format($laza) ?></td>
<td><?= number_format($zidi) ?></td>
<td><?= number_format($item->rem_debt) ?></td>
<td><?= !empty($item->depositor_username)?htmlspecialchars($item->depositor_username):'' ?></td>
<td><?= date('d-m-Y', strtotime($item->loan_end_date)) ?></td>
</tr>
<?php endforeach; ?>
<tr class="total-row">
<td colspan="6">JUMLA</td>
<td><?= number_format($total_restration) ?></td>
<td colspan="2"></td>
<td><?= number_format($total_depost) ?></td>
<td><?= number_format($total_laza) ?></td>
<td><?= number_format($total_zidi) ?></td>
<td colspan="3"></td>
</tr>
</tbody>
</table>

<!-- <h4>Muhtasari wa Malipo kwa Kila Status</h4>
<table class="summary-table">
<thead>
<tr><th>Status</th><th>Jumla ya Lipwa</th><th>Jumla ya Lazo</th><th>Jumla ya Dabo</th></tr>
</thead>
<tbody>
<?php foreach ($status_summary as $status=>$data): ?>
<tr>
<td><?= $status ?></td>
<td><?= number_format($data['lipwa']) ?></td>
<td><?= number_format($data['lazo']) ?></td>
<td><?= number_format($data['dabo']) ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table> -->

<h4>Malipo ya Faini</h4>
<table>
<thead>
<tr>
<th>S/No</th>
<th>Jina la Mteja</th>
<th>Namba ya Simu</th>
<th>Aina ya Mapato</th>
<th>Kiasi</th>
<th>Afisa</th>
<th>Tarehe</th>
</tr>
</thead>
<tbody>
<?php if(!empty($faini)): $sno=1; $total_receve=0; ?>
<?php foreach($faini as $detail): $total_receve += $detail->receve_amount ?? 0; ?>
<tr>
<td><?= $sno++ ?></td>
<td><?= htmlspecialchars($detail->f_name ?? '').' '.htmlspecialchars($detail->m_name ?? '').' '.htmlspecialchars($detail->l_name ?? '') ?></td>
<td><?= htmlspecialchars($detail->phone_no ?? '') ?></td>
<td><?= htmlspecialchars($detail->inc_name ?? '') ?></td>
<td><?= number_format($detail->receve_amount ?? 0) ?></td>
<td><?= htmlspecialchars($detail->empl ?? '') ?></td>
<td><?= htmlspecialchars($detail->receve_day ?? '') ?></td>
</tr>
<?php endforeach; ?>
<tr class="total-row">
<td colspan="4" style="text-align:right;">Jumla ya Malipo</td>
<td><?= number_format($total_receve) ?></td>
<td colspan="2"></td>
</tr>
<?php else: ?>
<tr><td colspan="7" style="text-align:center;">Hakuna taarifa za leo.</td></tr>
<?php endif; ?>
</tbody>
</table>

<h4>Mikopo Iliyotolewa (Gawa)</h4>
<table>
<thead>
<tr>
<th>S/No</th><th>Jina la Mteja</th><th>Namba ya Simu</th><th>Kiasi cha Mkopo</th><th>Fomu</th><th>Loan Status</th><th>Status ya Mkopo</th><th>Tarehe ya Kutolewa</th><th>Aliyepitisha</th>
</tr>
</thead>
<tbody>
<?php if(!empty($gawa)): $sno=1; $total_loan=0; $total_form=0; ?>
<?php foreach($gawa as $item): 
$total_loan+=$item->loan_aprove; 
$total_form+=$item->deducted_balance?:0; 
$status_badge = '';
if($item->loan_status=='disbursed' && empty($item->deducted_balance)){
$status_badge='<span>Mkopo umepitishwa ila hujagawiwa</span>';
}elseif($item->loan_status=='withdrawal'){
$status_badge='<span>✔ Mkopo umepitishwa na kugawiwa</span>';
}else{$status_badge=htmlspecialchars($item->loan_status);}
?>
<tr>
<td><?= $sno++ ?></td>
<td><?= htmlspecialchars($item->f_name.' '.$item->m_name.' '.$item->l_name) ?></td>
<td><?= htmlspecialchars($item->phone_no) ?></td>
<td><?= number_format($item->loan_aprove,2) ?></td>
<td><?= $item->deducted_balance?number_format($item->deducted_balance,2):'0.00' ?></td>
<td><?= status_svg($item->loan_status) ?> <?= htmlspecialchars($item->loan_status) ?></td>
<td><?= $status_badge ?></td>
<td><?= !empty($item->disburse_day)?date('d-m-Y',strtotime($item->disburse_day)):'-' ?></td>
<td><?= htmlspecialchars($item->approved_by?:'N/A') ?></td>
</tr>
<?php endforeach; ?>
<tr class="total-row">
<td colspan="3" style="text-align:right;">JUMLA</td>
<td><?= number_format($total_loan,2) ?></td>
<td><?= number_format($total_form,2) ?></td>
<td colspan="4"></td>
</tr>
<?php else: ?>
<tr><td colspan="9" style="text-align:center;">Hakuna mikopo iliyotolewa leo.</td></tr>
<?php endif; ?>
</tbody>
</table>

</body>
</html>
