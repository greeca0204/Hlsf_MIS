<div class="alert alert-info">当前位置<b class="tip"></b>新闻中心<b class="tip"></b>新政<b class="tip"></b>添加</div>

<div class="form">
    <img src="" alt="">
    <div class="form-group">
        <label for="" class="col-sm-2">标题</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="title">
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-2">副标题</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="sub_title">
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-2">图片</label>
        <div class="col-sm-10">
            <h4><span id="img_url" class="label label-success" style="cursor:pointer">选择图片</span></h4>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-2">文章内容</label>
        <div class="col-sm-10">
            <textarea name="content" id="content" cols="80" rows="10"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-2">文章来源</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="source">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-4 col-sm-offset-2">
            <button class="btn btn-success" save>保存</button>
        </div>
    </div>
</div>
<script>
$(function() {
    var content = CKEDITOR.replace('content');

    $("#img_url").on("click", function() {
        open_kcfinder("single", function(url) {
            $("#img_url").data("value", url);
            $(".form > img").attr("src", url);
        });
    });
    function check(obj) {
        return true;
    };
    $("[save]").on("click", function() {
        $(this).addClass("disabled");
        var data = {
            title: $("input[name=title]").val(),
            sub_title: $("input[name=sub_title]").val(),
            img_url: $("#img_url").data("value"),
            content: content.getData(),
            source: $("input[name=source]").val()
        };
        //console.log(data); return false;
        if(!check(data)) {
            return false;
        }
        $.post("", data, function(data) {
            window.location.href = "/Cms/News/xz";
        });
    });
});

</script>