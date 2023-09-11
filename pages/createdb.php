<?php
    include_once('functions.php');
    $msq = connect();

    $ct1='CREATE TABLE countries(
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        country VARCHAR(64) UNIQUE
            )DEFAULT charset="utf8"';

    $ct2='CREATE TABLE cities(
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        city VARCHAR(64), 
        countryid INT,
        FOREIGN KEY(countryid) REFERENCES countries(id) ON DELETE CASCADE,
        ucity VARCHAR(128),
        UNIQUE INDEX ucity(city, countryid)
            )DEFAULT charset="utf8"';

    $ct3='CREATE TABLE hotels(
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        hotel VARCHAR(64),
        cityid INT,
        FOREIGN KEY(cityid) REFERENCES cities(id) ON DELETE CASCADE,
        countryid INT,
        FOREIGN KEY(countryid) REFERENCES countries(id) ON DELETE CASCADE,
        stars INT,
        cost INT,
        info VARCHAR(1024)
            )DEFAULT charset="utf8"';

    $ct4='CREATE TABLE images(
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        imagepath VARCHAR(255),
        hotelid INT,
        FOREIGN KEY(hotelid) REFERENCES hotels(id) ON DELETE CASCADE
            )DEFAULT charset="utf8"';

    $ct5='CREATE TABLE roles(
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        part VARCHAR(32)
            )DEFAULT charset="utf8"';

    $ct6='CREATE TABLE users(
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        login_user VARCHAR(32) UNIQUE,
        pass VARCHAR(128),
        email VARCHAR(128),
        discount INT,
        roleid INT,
        FOREIGN KEY(roleid) REFERENCES roles(id) ON DELETE CASCADE,
        avatar MEDIUMBLOB
            )DEFAULT charset="utf8"';

    mysqli_query($msq, $ct1);
    $err=mysqli_errno($msq);

    if ($err){
        echo 'Error code 1:'.$err.'<br>';
        exit();
    }
    
    mysqli_query($msq, $ct2);
    $err=mysqli_errno($msq);

    if ($err){
        echo 'Error code 2:'.$err.'<br>';
        exit();
    }

    mysqli_query($msq, $ct3);
    $err=mysqli_errno($msq);

    if ($err){
        echo 'Error code 3:'.$err.'<br>';
        exit();
    }

    mysqli_query($msq, $ct4);
    $err=mysqli_errno($msq);

    if ($err){
        echo 'Error code 4:'.$err.'<br>';
        exit();
    }

    mysqli_query($msq, $ct5);
    $err=mysqli_errno($msq);

    if ($err){
        echo 'Error code 5:'.$err.'<br>';
        exit();
    }

    mysqli_query($msq, $ct6);
    $err=mysqli_errno($msq);
    
    if ($err){
        echo 'Error code 6:'.$err.'<br>';
        exit();
    }
?>