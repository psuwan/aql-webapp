<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../framework-bootstrap-4.6.1/css/bootstrap.min.css">
<!--    <link rel="stylesheet" href="../plugin-select2/select2-bootstrap4.min.css">-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <title>Document</title>
</head>
<body>
<div class="row">
    <div class="col-md-4 offset-md-4">
        <select name="" id="" class="select2-basic-single">
            <option value="">test1</option>
            <option value="">test2</option>
            <option value="">test3</option>
        </select>
    </div>
</div>


<!--   Core JS Files   -->
<script src="../js/jquery-3.6.0.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../framework-bootstrap-4.6.1/js/bootstrap.min.js"></script>
<!--<script src="../plugin-select2/select2.min.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>

    $(document).ready(function () {
        <!-- Select2 -->
        $('.select2-basic-single').select2();
    });
</script>
</body>
</html>