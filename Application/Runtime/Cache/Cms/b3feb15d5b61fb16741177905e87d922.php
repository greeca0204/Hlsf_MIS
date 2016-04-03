<?php if (!defined('THINK_PATH')) exit(); $MODULES = array(); $MODULES[0]['name'] = 'hlzx'; $MODULES[0]['value'] = "和灵咨询"; $MODULES[1]['name'] = 'hydt'; $MODULES[1]['value'] = "行业动态"; $MODULES[2]['name'] = 'jjmt'; $MODULES[2]['value'] = "聚焦媒体"; $MODULES[3]['name'] = 'dsj'; $MODULES[3]['value'] = "大事记"; $MODULES[4]['name'] = 'tpxw'; $MODULES[4]['value'] = "图片新闻"; $MODULES[5]['name'] = 'xz'; $MODULES[5]['value'] = "新政"; ?>
            <ul class="list-group">
<?php for($i = 0; $i < count($MODULES); $i ++) { ?>
                <li class="list-group-item<?php if($CURRETN_MODULE === $MODULES[$i]['name']){echo ' active';} ?>" data-href="/Cms/<?php echo ($CURRETN_CONTROLLER); ?>/<?php echo ($MODULES[$i]['name']); ?>"><?php echo ($MODULES[$i]['value']); ?></li>
<?php } ?>

            </ul>            
<!-- <只需要修改ul里面的内容> -->
    </div><!-- end of sidebar-panel -->
</div><!-- end of sidebar -->

    <div class="operate-area col-md-10">