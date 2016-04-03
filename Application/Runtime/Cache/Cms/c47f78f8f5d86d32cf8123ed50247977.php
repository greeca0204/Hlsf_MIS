<?php if (!defined('THINK_PATH')) exit(); $MODULES = array(); $MODULES[0]['name'] = 'member'; $MODULES[0]['value'] = "成员管理"; ?>
            <ul class="list-group">
<?php for($i = 0; $i < count($MODULES); $i ++) { ?>
                <li class="list-group-item<?php if($CURRETN_MODULE === $MODULES[$i]['name']){echo ' active';} ?>" data-href="/Cms/<?php echo ($CURRETN_CONTROLLER); ?>/<?php echo ($MODULES[$i]['name']); ?>"><?php echo ($MODULES[$i]['value']); ?></li>
<?php } ?>
            </ul>            
<!-- <只需要修改ul里面的内容> -->
    </div><!-- end of sidebar-panel -->
</div><!-- end of sidebar -->

    <div class="operate-area col-md-10">