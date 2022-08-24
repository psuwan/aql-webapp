<?php
date_default_timezone_set('Asia/Bangkok');
include $config['PATH2_LIB']. 'class_dateTime.php';
$vc_Date = new class_dateTime();

$vg_buyList2Edit = filter_input(INPUT_GET, 'buyList2Edit');
if (empty($vg_buyList2Edit)) {
    $date2Show = date('Y-m-d');
}

if (isset($_POST['submit'])) {
    print_r($_POST);
    die();
}