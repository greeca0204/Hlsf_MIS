<!--
https://github.com/blueimp/jQuery-File-Upload
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>测试文件上传</title>
    <script src="__THIRD__/jquery.min.js"></script>
    <script src="__THIRD__/jQuery-File-Upload/js/vendor/jquery.ui.widget.js"></script>
    <script src="__THIRD__/jQuery-File-Upload/js/jquery.iframe-transport.js"></script>
    <script src="__THIRD__/jQuery-File-Upload/js/jquery.fileupload.js"></script>
</head>
<body>
<!-- 多文件上传 -->
    <input type="file" id="upload" name="files[]" multiple>
<!-- -->

<br>
<br>
<br>
<!-- 单文件上传 -->
    <input type="file" id="upload1" name="files[]">
<!-- -->
</body>
<script>
$(function() {
    var url = '/Util/Upload/index';
    $("#upload").fileupload({
        url: url,
        dataType: 'json'
    }).on('fileuploaddone', function (e, data) {
        console.log(data);
        console.log(data.result.files);
    });

    $("#upload1").fileupload({
        url: url,
        dataType: 'json',
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
        maxFileSize: 10000
    }).on('fileuploaddone', function (e, data) {
        console.log(data);
        console.log(data.result.files);
    });
});
</script>
</html>