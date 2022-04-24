<?php
$con = mysqli_connect('localhost', 'root', '', 'haco_foundation');
if (!$con) {
    die("Connection Failed: " . mysqli_connect_error());
}
