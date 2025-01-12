<?php
require_once 'connection.php';

$sTableName = $_GET['tbl'];
$sFldName = $_GET['kfld'];
$nIDValue = $_GET['kval'];
$sCmd =   $_GET['cmd'];

 
	

$query = "DELETE  FROM $sTableName WHERE $sFldName = $nIDValue";
$db->rawQuery($query);

 
header("Location: index.php?cmd=" . $sCmd);

?>
