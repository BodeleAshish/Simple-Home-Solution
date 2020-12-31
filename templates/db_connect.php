<?php

    $conn = mysqli_connect('localhost', 'root', '', 'simple_home_solutions');
    if(!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    }
    
?>