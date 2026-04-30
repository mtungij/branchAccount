<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>test</title>
</head>
<body>
	<p>total loan is <?php echo $loan_int; ?></p>
    <table>
    	<tr>
    		<th>S/no</th>
    		<th>Date</th>
    		<th>Principal</th>
    		<th>Interest</th>
    		<th>Total Instalment payment</th>
    	</tr>
    	<?php $no = 1; ?>
    	<?php foreach ($array as $r): ?>
    	<tr>
    		<td><?php echo $no++; ?></td>
    		<td><?php echo $r['date']; ?></td>
    		<td><?php echo round($day_princ,2) ?></td>
    		<td><?php echo round($day_int,2) ?></td>
    		<td><?php echo number_format($restoration); ?></td>
    	</tr>
    	<?php endforeach ?>
    	<tr>
    		<td></td>
    		<td></td>
    		<td><?php echo number_format($sum_principal); ?></td>
    		<td><?php echo number_format($sum_interest); ?></td>
    		<td><b><?php echo number_format($sum_restoration); ?></b></td>
    		
    	</tr>
    	</table>
    	
    
</body>
</html>