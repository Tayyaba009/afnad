<?php 
    include_once 'apis/MysqliDb.php';
    
    // Creating a new database connection
    $db = new MysqliDb(
        'videodb.mysql.database.azure.com', // Host
        'afnad',                   // Username
        'Afnad123@',                       // Password
        'new_assignment'                   // Database name
    );
    
    // Debugging the database connection object
    var_dump($db);
?>
