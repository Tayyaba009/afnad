<?php
include_once 'apis/MysqliDb.php';

$db = new MysqliDb(
    'videodb.mysql.database.azure.com', // Replace this with your Azure MySQL server name
    'afnad@videodb',                   // Replace this with your admin username (include the server name suffix if needed)
    'your_password_here',              // Replace this with your MySQL admin password
    'assignment1'                      // Replace this with your database name
);
 var_dump($db);
    return 0;
?>
