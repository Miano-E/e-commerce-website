<?php

    $con = new mysqli("localhost", "root", "", "e-commerce");
    if($con -> connect_error) {
        die("Connection Failed".$con->connect_error);
    }

?>