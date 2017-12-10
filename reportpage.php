<?php 
include_once('dbconnection.php');
$database = new db();
?>
<html>
<head>
<title> Assignment on Invoice Data </title>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 60%;
    border: 1px solid #dddddd; 
}

.intable {
    width: 100%;
}

td, th {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<script>

function showDiv(val){	
	document.getElementById('showVal_'+val).style.display="table-row";

	document.getElementById('plusbtn_'+val).style.display="none";
	document.getElementById('minbtn_'+val).style.display="block";

}
function hideDiv(val){
	document.getElementById('showVal_'+val).style.display="none";

	document.getElementById('plusbtn_'+val).style.display="block";
	document.getElementById('minbtn_'+val).style.display="none";

}
</script>

</head>
<body>

<?php

try {
$query = $database->fetchdata('2016-07-08','2016-07-08');
$val = $database->result($query);

$query1 = $database->gettypeval();
$subval = $database->type_customized_result($query1);


$i=0;
echo '<table>';
echo '<tr> <th>Type</th><th>Sale Amount</th><th>Details</th></tr>';
foreach ($val as $key1 => $value1) {
	echo '<tr>';
	echo '<td>'.$value1['type'].' </td>';
	echo '<td>'.$value1['cnt'].'</td>';
	echo '<td><input id="minbtn_'.$i.'" type="button" value="-" onclick="hideDiv('.$i.')" style="display:none;" />  <input id="plusbtn_'.$i.'" type="button" value="+" onclick="showDiv('.$i.')" /></td>';
	echo '</tr>'; 
	echo '<tr id="showVal_'.$i.'" style="display:none;">';
	echo '<td colspan="3">';

	if(array_key_exists($value1['type'], $subval)) {
		$invoice_item_array = $subval[$value1['type']];
		echo '<table class="intable">';
		echo '<tr> <th>Invoice Id</th><th>Invoice Status</th> <th>Amount</th> <th>Date</th></tr>';
		foreach ($invoice_item_array as $key2 => $value2) {
			echo '<tr>';
			echo  '<td>'.$value2['invoice_id'].'</td>';
			echo  '<td>'.$value2['status'].'</td>';
			echo  '<td>'.$value2['amount'].'</td>';
			echo  '<td>'.$value2['datepaid'].'</td>';
			echo '</tr>';
		}
		echo '</table>';
	}    
	echo '</td>';
	echo '</tr>';
$i++;
}
echo '</table>';

} catch (Exception $e) {
				echo $e->getMessage();
			}
?>


<table>
</body>
</html>