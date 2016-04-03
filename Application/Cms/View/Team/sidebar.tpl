<php>
$MODULES = array();
$MODULES[0]['name'] = 'member'; $MODULES[0]['value'] = "成员管理";
</php>
            <ul class="list-group">
<php>
            for($i = 0; $i < count($MODULES); $i ++) {
</php>
                <li class="list-group-item<php>if($CURRETN_MODULE === $MODULES[$i]['name']){echo ' active';}</php>" data-href="/Cms/{$CURRETN_CONTROLLER}/{$MODULES[$i]['name']}">{$MODULES[$i]['value']}</li>
<php>
            }                   
</php>
            </ul>            
<!-- <只需要修改ul里面的内容> -->
    </div><!-- end of sidebar-panel -->
</div><!-- end of sidebar -->

    <div class="operate-area col-md-10">
    
