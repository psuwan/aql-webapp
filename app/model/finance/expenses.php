<?php

date_default_timezone_set('Asia/Bangkok');
include $config['PATH2_LIB'] . 'class_dateTime.php';
$vc_Date = new class_dateTime();

/* Page global variable */
$title = 'รายจ่าย';
$recordID = genToken(50);

$vg_buyList2Edit = filter_input(INPUT_GET, 'buyList2Edit');
if (empty($vg_buyList2Edit)) {
    $date2Show = date('Y-m-d');
}

if (isset($_POST['submit'])) {
    print_r($_POST);
    die();
}

function chkFileExist($refNumber, $fileFolder)
{
    $baseDir = dirname(__FILE__) . DIRECTORY_SEPARATOR;
    $folder2Scan = $baseDir . $fileFolder;

    if (!empty($refNumber)) {
        $files2 = glob($folder2Scan . DIRECTORY_SEPARATOR . $refNumber . "*");

        if ($files2) {
            $filecount = count($files2);
            for ($iFiles2 = 0; $iFiles2 < $filecount; ++$iFiles2) {
                $tmpGenID4DelIcon = explode(".", str_replace($baseDir . $fileFolder . DIRECTORY_SEPARATOR, '', $files2[$iFiles2]));
                $genID4DelIcon = $tmpGenID4DelIcon[0];
                echo "&nbsp;<a href=\"file-delete.php?projRefnumber=" . $refNumber . "&file2Delete=" . str_replace($baseDir, '', $folder2Scan) . str_replace($folder2Scan, '', $files2[$iFiles2]) . "\" onclick=\"return confirm('ต้องการลบไฟล์')\">";
                echo "<i class=\"bi bi-x-circle text-danger\"></i>";
                echo "</a>";

                //--> Allow file extension
                //--> pdf", "doc", "docx", "xls", "xlsx", "jpg", "png", "jpeg", "ppt", "pptx", "ods"
                $extension = pathinfo(str_replace($baseDir, '', $folder2Scan) . str_replace($folder2Scan, '', $files2[$iFiles2]), PATHINFO_EXTENSION);

                echo "<a class=\"btn btn-sm btn-round btn-warning font-size-12px\" href=\"" . str_replace($baseDir, '', $folder2Scan) . str_replace($folder2Scan, '', $files2[$iFiles2]) . "\">";
                echo "ไฟล์ " . ($iFiles2 + 1) . "->[" . $extension . "]";
                echo "</a>";
            }
        } else {
            echo "";
        }
    } else {
        echo "no refCode";
    }
}