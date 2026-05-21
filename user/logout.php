<?php
include ('Connection.php');
include ('../admin/function/fetchfunction.php');


session_start();


session_unset();
session_destroy();


header("Location: home.php"); 
exit();


        
