<div class="alert alert-info">当前位置<b class="tip"></b>新闻中心<b class="tip"></b>和灵咨询</div>

<div class="myTable">
    <table class="table table-striped table-bordered table-condensed" id="top">
        <thead>
            <tr class= "tr_detail">
                <td class="auto-style1">编号</td>
                <td class="auto-style1">标题</td>
                <td class="auto-style1">副标题</td>
                <td class="auto-style1">浏览量</td>
                <td class="auto-style1">操作</td>
            </tr>
        </thead>

        <!-- <显示人物信息> -->
        <tbody>
<php>
        for($i = 0; $i < count($data); $i ++) {        
</php>
        
            <tr class= "tr_chairman">
                <td class="my_td td_odrer">{$data[$i]['id']}</td>
                <td>{$data[$i]['title']}</td>
                <td>{$data[$i]['sub_title']}</td>
                <td>{$data[$i]['scan_times']}</td>
                <td>
                    <a href="#"><button class="btn btn-success edit"><span class="glyphicon glyphicon-eye-open"></span></button></a>
                    <a href="/Cms/News/hlzx?act=update&id={$data[$i]['id']}"><button class="btn btn-success edit"><span class="glyphicon glyphicon-edit"></span></button></a>
                    <button class="btn btn-danger del" delete data-id="{$data[$i]['id']}"><span class="glyphicon glyphicon-trash"></span></button>
                </td>
            </tr>
<php>
        }
</php>
        
            <!-- <添加按钮> -->                        
            <tr>
                <td colspan="100">
                    <a href="/Cms/News/hlzx?act=add"><button class="btn btn-primary add"><span class="glyphicon glyphicon-plus"></span>添加</button></a>
                </td>
            </tr>
            
        </tbody>
    </table>
    <include file = "./Application/Cms/View/Common/pagination.tpl"/>
</div>
<script>
$("[delete]").on("click", function(){
    if(window.confirm("确定删除该文章?")) {
        var data = {
            'id': $(this).data("id")
        };
        $.post(window.location.pathname + "?act=delete", data, function(data) {
            window.location.href = "/Cms/News/hlzx";
        });
    }
});
</script>
    