/***********************************\
 *  javaScript for expenses.phtml  *
 \**********************************/

/******************\
 *     DEMO 1     *
 \******************/
// demo 1: load database from json. if your server is support gzip. we recommended to use this rather than zip.
// for more info check README.md

$.Thailand({
    database: './plugin/jquery.Thailand.js/database/db.json',

    $district: $('#demo1 [name="district"]'),
    $amphoe: $('#demo1 [name="amphoe"]'),
    $province: $('#demo1 [name="province"]'),
    $zipcode: $('#demo1 [name="zipcode"]'),

    onDataFill: function (data) {
        console.info('Data Filled', data);
    },

    onLoad: function () {
        //console.info('Autocomplete is ready!');
        $('#loader, .demo').toggle();
    }
});

// watch on change
$('#demo1 [name="district"]').change(function () {
    //console.log('ตำบล', this.value);
});
$('#demo1 [name="amphoe"]').change(function () {
    //console.log('อำเภอ', this.value);
});
$('#demo1 [name="province"]').change(function () {
    //console.log('จังหวัด', this.value);
});
$('#demo1 [name="zipcode"]').change(function () {
    //console.log('รหัสไปรษณีย์', this.value);
});

/******************\
 *     DEMO 2     *
 \******************/
// demo 2: load database from zip. for those who doesn't have server that supported gzip.
// for more info check README.md
// $.Thailand({
//     database: './plugin/jquery.Thailand.js/database/db.zip',
//     $search: $('#demo2 [name="search"]'),
//
//     onDataFill: function (data) {
//         console.log(data)
//         var html = '<b>ที่อยู่:</b> ตำบล' + data.district + ' อำเภอ' + data.amphoe + ' จังหวัด' + data.province + ' ' + data.zipcode;
//         $('#demo2-output').prepend('<div class="uk-alert-warning" uk-alert><a class="uk-alert-close" uk-close></a>' + html + '</div>');
//     }
//
// });

/* DataTimePicker */
let resultDate = '';

/* Using let date2Show = convertToDateThai(new Date("2022-08-18")); */
function convertToDateThai(date) {
    let month_th = [
        "",
        "ม.ค.",
        "ก.พ.",
        "มี.ค.",
        "เม.ย.",
        "พ.ค.",
        "มิ.ย.",
        "ก.ค.",
        "ส.ค.",
        "ก.ย.",
        "ต.ค.",
        "พ.ย.",
        "ธ.ค."
    ];
    // return result = date.getDate() + " " + month_th[(date.getMonth() + 1)] + " " + (date.getFullYear() + 543);
    return resultDate = date.getDate() + " " + month_th[(date.getMonth() + 1)] + " " + date.getFullYear();
}

function showOnBlur(date) {
    console.log(convertToDateThai(new Date(date)));
    document.getElementById('id4_input_buydate').value = 'xxxxxxxxxxxxx';
}

$.datetimepicker.setLocale('th');

$('#id4_input_buydate').datetimepicker({
    yearOffset: 543,
    timepicker: false,
    format: "Y-m-d"
});

$('#id4_input_date_prjstart').datetimepicker({
    yearOffset: 543,
    timepicker: false,
    format: "Y-m-d"
});

$('#id4_input_date_prjstop').datetimepicker({
    yearOffset: 543,
    timepicker: false,
    format: "Y-m-d"
});

//--> TUNING DATE
/*
$("#id4_input_buydate").on("focus", function () {
    let buyDate = "<?php echo $vc_Date->dateBE($date2Show);  ?>";
    $("#id4_input_buydate").val(buyDate);
});
 */
/* DataTimePicker */

// List files

let updateFiles2Upload = function (filesName, filesDir, fileRet) {

    let btnSelectFile = document.getElementById("id4_button_file_" + filesName);
    let inpSelectFile = document.getElementById("id4_input_file_" + filesName);
    let lstSelectFile = document.getElementById("id4_span4_file_" + filesName);

    btnSelectFile.hidden = true;
    lstSelectFile.innerHTML = '<label class="btn btn-primary btn-fab btn-round" data-toggle="tooltip" data-placement="bottom" title="อัพโหลดไฟล์" onclick="uploadFiles(\'' + filesName + '\',\'' + filesDir + '\', \'' + fileRet + '\')"><i class="material-icons">file_upload</i></label>';
    lstSelectFile.innerHTML += "&nbsp;"
    for (let i = 0; i < inpSelectFile.files.length; ++i) {
        lstSelectFile.innerHTML += "&nbsp;" + inpSelectFile.files.item(i).name;
        if ((inpSelectFile.files.length > 1) && (i < (inpSelectFile.files.length - 1)))
            lstSelectFile.innerHTML += '&nbsp;|';
    }
    //output.innerHTML += '<br><label class="btn btn-info btn-sm btn-round mt-0" onclick="uploadFiles(\'' + filesName + '\',\'' + filesDir + '\', \'' + fileRet + '\')"> UpLoad </label>';
}
// List files