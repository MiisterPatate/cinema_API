<?php

    DEFINE('DB_HOST', 'localhost');
    DEFINE('DB_USER', 'root');
    DEFINE('DB_PASS', 'root'); ;  //'root' as a default in MAMP servers

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS) or
    die('could not connect: '. mysqli_connect_error() );

    DEFINE('DB_NAME', 'api_cinema');

    mysqli_select_db($dbc, DB_NAME) or die('could not select db');