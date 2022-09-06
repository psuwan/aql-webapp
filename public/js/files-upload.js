// Upload files
function uploadFiles(name2Up, dir2Up, fileRet) {
    //--> name2up was File name to upload
    //--> dir2up was Folder to upload
    //--> fileRet was Page to return

    console.log(name2Up);
    console.log(dir2Up);
    console.log(fileRet);

    //--> Get file(s) upload
    let fileUpload = document.getElementById("id4_input_file_" + name2Up);

    //--> Count file(s) to upload
    let totalfiles = fileUpload.files.length;

    if (totalfiles > 0) {
        let formData = new FormData();

        // Loop Read selected files
        for (let index = 0; index < totalfiles; index++) {
            formData.append('fileName_' + name2Up + '[]', fileUpload.files[index]);
        }
        formData.append('refName', name2Up);
        formData.append('dirName', dir2Up);

        let xhttp = new XMLHttpRequest();

        // Set POST method and ajax file path
        xhttp.open("post", "files-upload.php", true);

        // call on request changes state
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {   // working value was == 4 and == 200
                let response = this.responseText;           // OK don't delete

                alert('นำเข้าไฟล์ : ' + response + ' ไฟล์');      // OK don't delete
                window.location.href = fileRet;
            }
        };

        // Send request with data
        xhttp.send(formData);

    } else {
        alert("ยังไม่ได้ทำการเลือกไฟล์");
    }
}