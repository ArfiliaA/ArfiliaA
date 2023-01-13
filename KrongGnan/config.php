<?php
    define("DB_SERVER", "localhost");
    define("DB_USERNAME", "root");
    define("DB_PASS", "");
    define("DB_NAME" ,"remember_db");

    $dbcon = mysqli_connect(DB_SERVER , DB_USERNAME ,DB_PASS , DB_NAME);

    if(mysqli_connect_errno()){
        echo "fail to connect to mysql :" . mysqli_connect_error();
    }

?>
