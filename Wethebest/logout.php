<?php
error_reporting(0);
session_start();
if (isset($_POST['logout'])) {
    session_unset();
    // session_abort();
    session_destroy();
    header("location:./login/");
}
