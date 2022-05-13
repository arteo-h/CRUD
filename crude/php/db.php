<?php

function Createdb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Grades";

    $con = mysqli_connect($servername, $username, $password);

    if (!$con){
        die("Connection Failed;".mysqli_connect_error());
    }

    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

    if (mysqli_query($con,$sql)){
        $con = mysqli_connect($servername, $username, $password, $dbname);

        $sql = "
        CREATE TABLE IF NOT EXISTS grade (
            web FLOAT NOT NULL,
            finance FLOAT NOT NULL ,
            network FLOAT,
            intern FLOAT 
        );
        ";

        if (mysqli_query($con, $sql)){
            return $con;
        }else{
            echo "Table can not be created";
        }
    }else{
        echo "Error creating database".mysqli_error($con);
    }
}
