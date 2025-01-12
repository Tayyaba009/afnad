<?php 
    include_once 'apis/MysqliDb.php';
$db = new MysqliDb('videodb.mysql.database.azure.com','afnad','Afnad123@,'new_assignment');
 

// $db = mysqli_init();
//ysqli_real_connect($db, "videodb.mysql.database.azure.com'", "afnad", "Afnad123@", "new_assignment", 3306);
   var_dump($db);
    return 0;
?>
