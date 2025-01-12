<?php 
    include_once 'apis/MysqliDb.php';
$db = new MysqliDb('videodb.mysql.database.azure.com','afnad','Afnad123@,'assignment1');
 

// $db = mysqli_init();
//ysqli_real_connect($db, "videodb.mysql.database.azure.com'", "afnad", "Afnad123@", "assignment1", 3306);
   var_dump($db);
    return 0;
?>
