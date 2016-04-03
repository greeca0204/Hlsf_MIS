<?php
//传入变量格式 array('all' => , 'now' => )
//此页面为分页页面插件
//接收两个参数
//$now  表示当前的页码
//$all  表示总页数
?>
<ul class="pagination">
<?php
if($all == 0) {
    echo "<div class='no_record'>没有相关记录</div>";
} else {
    if($all == 1) { ?>
        <li class="active"><a href="javascript:;" data-href="?p=1" data-pjax="main_in_main">1<span class="sr-only">(current)</span></a></li>
    <?php
    } else {
        if($now > 1 && $now < 6) { ?>
        <li><a href="javascript:;" data-href="?p=1" data-pjax="main_in_main">第一页</a></li>
        <li><a href="javascript:;" data-href="?p=<?php echo $now-1;?>" data-pjax="main_in_main">&laquo;</a></li>
    <?php
            for($i = 1; $i < $now; $i++) { ?>
        <li><a href="javascript:;" data-href="?p=<?php echo $i;?>" data-pjax="main_in_main"><?php echo $i;?></a></li>
    <?php
            }
        } else if($now >= 6){ ?>
        <li><a href="javascript:;" data-href="?p=1" data-pjax="main_in_main">第一页</a></li>
        <li><a href="javascript:;" data-href="?p=<?php echo $now-1;?>" data-pjax="main_in_main">&laquo;</a></li>
        <li><a href="javascript:void(0)">...</a></li>
    <?php
            for($i = $now-4; $i < $now; $i++) { ?>
        <li><a href="javascript:;" data-href="?p=<?php echo $i;?>" data-pjax="main_in_main"><?php echo $i;?></a></li>
    <?php
            }
        } ?>
        <li class="active"><a href="javascript:void(0)" data-pjax="main_in_main"><?php echo $now;?><span class="sr-only">(current)</span></a></li>
    <?php
        if($all - $now > 4) {
            for($i = $now + 1; $i <= $now + 4; $i++) { ?>
        <li><a href="javascript:;" data-href="?p=<?php echo $i;?>" data-pjax="main_in_main"><?php echo $i;?></a></li>
    <?php
            } ?>
        <li><a href="javascript:void(0)">...</a></li>
        <li><a href="javascript:;" data-href="?p=<?php echo $now+1;?>" data-pjax="main_in_main">&raquo;</a></li>
        <li><a href="javascript:;" data-href="?p=<?php echo $all;?>" data-pjax="main_in_main">最后页</a></li>
    <?php
        } else if($all - $now >= 1) {
            for($i = $now + 1; $i <= $all; $i++) { ?>
        <li><a href="javascript:;" data-href="?p=<?php echo $i;?>" data-pjax="main_in_main"><?php echo $i;?></a></li>
    <?php
            } ?>
        <li><a href="javascript:;" data-href="?p=<?php echo $now+1;?>" data-pjax="main_in_main">&raquo;</a></li>
        <li><a href="javascript:;" data-href="?p=<?php echo $all;?>" data-pjax="main_in_main">最后页</a></li>
    <?php
        }
    } ?>
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
}
?>
