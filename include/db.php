<?php
    $db['db_host'] = 'localhost:3307';
    $db['db_user'] = 'root';
    $db['db_pass'] = '';
    $db['db_name'] = 'bp';

    foreach($db as $key=>$value){
        define(strtoupper($key), $value);
    }
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    // if($connection){
    //     echo "Connected";
    // }
    // else{
    //     echo "Not connected";
    // }
?>