<?php
$connect_error = "Sorry, we're experiencing some connection issues, yeah I know, just go outside and do something productive";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$connect = mysqli_connect("localhost", "root", "", "ibisfun");
if (mysqli_connect_errno()) {
    echo $connect_error . mysqli_connect_error();
    exit();
}
