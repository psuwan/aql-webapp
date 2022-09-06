<?php

date_default_timezone_set('Asia/Bangkok');
$dateNow = date("Y-m-d");
$timeNow = date("H:i:s");

$dir4Sys = dirname(__DIR__) . DIRECTORY_SEPARATOR;
$dir4App = dirname(__FILE__);

$dir4Asset = $dir4Sys . "app-uit-asset" . DIRECTORY_SEPARATOR;
$dir4Lib = $dir4Sys . "app-uit-lib" . DIRECTORY_SEPARATOR;

$varpost_fileRefNumber = filter_input(INPUT_POST, 'refName');
$varpost_folder2Upload = filter_input(INPUT_POST, 'dirName');
$upload_location = $varpost_folder2Upload . DIRECTORY_SEPARATOR;

if (!file_exists($upload_location)) {
    mkdir($upload_location, 0755, true);
}

//--> Count total files, array of upload files
$countType = "fileName_" . $varpost_fileRefNumber;
$countUploadFiles = count($_FILES[$countType]['name']);

$count = 0;
for ($i = 0; $i < $countUploadFiles; $i++) {

    // File name
    $filename = $_FILES[$countType]['name'][$i];

    // File path
    $path = $upload_location . $filename;

    // file extension
    $file_extension = pathinfo($path, PATHINFO_EXTENSION);
    $file_extension = strtolower($file_extension);

    // Valid file extensions
    $valid_ext = array("pdf", "doc", "docx", "xls", "xlsx", "jpg", "png", "jpeg", "ppt", "pptx", "ods");

    // Check extension
    if (in_array($file_extension, $valid_ext)) {
        //--> Change file name to ref-number append random number
        //--> $fileNameExtend = str_pad(rand(1, 9999), 4, "0", STR_PAD_LEFT);
        //--> Change file name to ref-number append 15char token
        //--> $fileNameExtend = genToken(15);
        $temp = explode(".", $_FILES[$countType]['name'][$i]);
        //        $newfilename = $upload_location . $varpost_fileRefNumber . "_" . $i . '.' . end($temp);
        $newfilename = $upload_location . $varpost_fileRefNumber . '.' . end($temp);
        //psuwan's edited
        if (move_uploaded_file($_FILES[$countType]['tmp_name'][$i], $newfilename)) {
            //--> from Example
            //--> if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $path)) {
            //--> logWrite("UPLOAD FILE", "UPLOAD OK", "BY USER " . $_SESSION["USERNAME"]);
            $count += 1;
        }
    }
}
echo "รวม : " . $count;
exit;
