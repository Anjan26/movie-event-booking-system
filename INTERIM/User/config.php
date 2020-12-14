<?php

$conn = new mysqli("localhost", "root","","interim");

if($conn->connect_error){
    die("connection error");
}