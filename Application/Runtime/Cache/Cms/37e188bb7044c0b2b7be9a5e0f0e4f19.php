<?php if (!defined('THINK_PATH')) exit();?><div class="alert alert-info">当前位置<b class="tip"></b>新闻中心<b class="tip"></b>新政</div>

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
<?php for($i = 0; $i < count($data); $i ++) { ?>
        
            <tr class= "tr_chairman">
                <td class="my_td td_odrer"><?php echo ($data[$i]['id']); ?></td>
                <td><?php echo ($data[$i]['title']); ?></td>
                <td><?php echo ($data[$i]['sub_title']); ?></td>
                <td><?php echo ($data[$i]['scan_times']); ?></td>
                <td>
                    <a href="#"><button class="btn btn-success edit"><span class="glyphicon glyphicon-eye-open"></span></button></a>
                    <a href="/Cms/News/xz?act=update&id=<?php echo ($data[$i]['id']); ?>"><button class="btn btn-success edit"><span class="glyphicon glyphicon-edit"></span></button></a>
                    <button class="btn btn-danger del" delete data-id="<?php echo ($data[$i]['id']); ?>"><span class="glyphicon glyphicon-trash"></span></button>
                </td>
            </tr>
<?php } ?>
        
            <!-- <添加按钮> -->                        
            <tr>
                <td colspan="100">
                    <a href="/Cms/News/xz?act=add"><button class="btn btn-primary add"><span class="glyphicon glyphicon-plus"></span>添加</button></a>
                </td>
            </tr>
            
        </tbody>
    </table>
    <?php
?>
<ul class="pagination">
<?php
if($all == 0) { echo "<div class='no_record'>没有相关记录</div>"; } else { if($all == 1) { ?>
        <li class="active"><a href="javascript:;" data-href="?p=1" data-pjax="main_in_main">1<span class="sr-only">(current)</span></a></li>
    <?php
 } else { if($now > 1 && $now < 6) { ?>
        <li><a href="javascript:;" data-href="?p=1" data-pjax="main_in_main">第一页</a></li>
        <li><a href="javascript:;" data-href="?p=<?php echo $now-1;?>" data-pjax="main_in_main">&laquo;</a></li>
    <?php
 for($i = 1; $i < $now; $i++) { ?>
        <li><a href="javascript:;" data-href="?p=<?php echo $i;?>" data-pjax="main_in_main"><?php echo $i;?></a></li>
    <?php
 } } else if($now >= 6){ ?>
        <li><a href="javascript:;" data-href="?p=1" data-pjax="main_in_main">第一页</a></li>
        <li><a href="javascript:;" data-href="?p=<?php echo $now-1;?>" data-pjax="main_in_main">&laquo;</a></li>
        <li><a href="javascript:void(0)">...</a></li>
    <?php
 for($i = $now-4; $i < $now; $i++) { ?>
        <li><a href="javascript:;" data-href="?p=<?php echo $i;?>" data-pjax="main_in_main"><?php echo $i;?></a></li>
    <?php
 } } ?>
        <li class="active"><a href="javascript:void(0)" data-pjax="main_in_main"><?php echo $now;?><span class="sr-only">(current)</span></a></li>
    <?php
 if($all - $now > 4) { for($i = $now + 1; $i <= $now + 4; $i++) { ?>
        <li><a href="javascript:;" data-href="?p=<?php echo $i;?>" data-pjax="main_in_main"><?php echo $i;?></a></li>
    <?php
 } ?>
        <li><a href="javascript:void(0)">...</a></li>
        <li><a href="javascript:;" data-href="?p=<?php echo $now+1;?>" data-pjax="main_in_main">&raquo;</a></li>
        <li><a href="javascript:;" data-href="?p=<?php echo $all;?>" data-pjax="main_in_main">最后页</a></li>
    <?php
 } else if($all - $now >= 1) { for($i = $now + 1; $i <= $all; $i++) { ?>
        <li><a href="javascript:;" data-href="?p=<?php echo $i;?>" data-pjax="main_in_main"><?php echo $i;?></a></li>
    <?php
 } ?>
        <li><a href="javascript:;" data-href="?p=<?php echo $now+1;?>" data-pjax="main_in_main">&raquo;</a></li>
        <li><a href="javascript:;" data-href="?p=<?php echo $all;?>" data-pjax="main_in_main">最后页</a></li>
    <?php
 } } ?>
    <span class="goto">&nbsp;跳到<input type="text" class="goto-input form-control" id="goto-input" maxlength="5" value="<?php echo $now;?>">页
    <a href="javascript:void(0)" class="btn btn-default btn-sm goto-btn" id="goto-btn">GO</a>
    </span>
    </ul>
    <script>
    $(function() {
        var concat = [];
        if(location.search != '') {
            var get_arr = location.search.substr(1).split("&");
            for(var i in get_arr) {
                if(get_arr[i].substr(0, 2) != 'p=') {
                    concat.push(get_arr[i]);
                }
            }
        }

        $("#goto-btn").on("click", function(event) {
            var page = $("#goto-input").val();
            concat.unshift("?p=" + page);
            var url = concat.join("&");
            window.location.href = url;
        });

        $("a[data-href]").on("click", function() {
            var href = $(this).data("href");
            concat.unshift(href);
            var url = concat.join("&");
            window.location.href = url;
        });
    });
    </script>
<?php
} ?>

</div>
<script>
$("[delete]").on("click", function(){
    if(window.confirm("确定删除该文章?")) {
        var data = {
            'id': $(this).data("id")
        };
        $.post(window.location.pathname + "?act=delete", data, function(data) {
            window.location.href = "/Cms/News/xz";
        });
    }
});
</script>