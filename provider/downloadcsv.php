<?php 
include_once '../includes/common_functions.php';
$_date = $_SESSION['selected_value'];
$provid = $_SESSION['provider']['serviceprovider_id'];
$file = $_SESSION['csvfile'];
output_file($file,'techmatcherdata.csv', 'application/csv');
?>