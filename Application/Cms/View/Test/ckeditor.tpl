<!--
ckeditor
ckfinder
http://docs.cksource.com/ckfinder3/#!/guide
http://docs.cksource.com/ckfinder3-php/quickstart.html#quickstart_installation_enable
注意：开启php.ini  extension=php_fileinfo.dll
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ckeditor测试</title>
    <script src="__THIRD__/jquery.min.js"></script>
    <script src="__THIRD__/ckeditor/ckeditor.js"></script>
    <script src="__JS__/common.js"></script>
</head>
<body>
<div>
    <textarea name="" id="editor" cols="80" rows="10"></textarea>
    <br>
    <br>

    <div>
        <button id="testkcFinder">点击选择图片</button>
        <span id="select"></span>
    </div>
    
    <div>
        <button id="testkcFinder1">点击选择多张图片</button>
        <span id="select1"></span>
    </div>
</div>
</body>
<script>
var ckeditor = CKEDITOR.replace('editor');

$("#testkcFinder").on("click", function() {
    open_kcfinder("single", function(url) {
        $("#select").html(url);
    });
});

$("#testkcFinder1").on("click", function() {
    open_kcfinder("multi", function(files) {
        $("#select1").html(JSON.stringify(files));
    });
});
</script>

</html>