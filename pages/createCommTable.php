<?php
    include_once('functions.php');
    $msq = connect();

    $ct1='CREATE TABLE comments(
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        comment VARCHAR(1024) UNIQUE,
        hotelid INT,
        FOREIGN KEY(hotelid) REFERENCES hotels(id) ON DELETE CASCADE
            )DEFAULT charset="utf8"';

    mysqli_query($msq, $ct1);
    $err=mysqli_errno($msq);

    if ($err){
        echo 'Error code 1:'.$err.'<br>';
        exit();
    }
    
?>