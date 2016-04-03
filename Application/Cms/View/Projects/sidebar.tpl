 <php>
    $MODULES = array() ;
    unset($MODULES);
    $MODULES[0]['name'] = "index"           ;  $MODULES[0]['value'] = "上市项目"       ;                  
    $MODULES[1]['name'] = "emphasisProject" ;  $MODULES[1]['value'] = "重点投资项目"     ;
 </php>  
            <ul class="list-group">

<php>
	for( $i= 0 ; $i < count($MODULES) ; $i++ )
	{
		if( $CURRETN_MODULE ==  $MODULES[$i]['name'] )
		{

</php>
                <li class="list-group-item active" one-module link="/Cms/{$CURRETN_CONTROLLER}/{$MODULES[$i]['name']}">
<php>
		}
		else
		{
</php>
				<li class="list-group-item" one-module link="/Cms/{$CURRETN_CONTROLLER}/{$MODULES[$i]['name']}">

<php>
		}
</php>  
  				{$MODULES[$i].value}		
				</li>
<php>
	}
</php>              
            </ul>
<!-- 只需要修改ul里面的内容 -->
    </div><!-- end of sidebar-panel -->
</div><!-- end of sidebar -->
    
<script type="text/javascript">
  $("li[one-module]").click(
  	function() 
  	{
  	  	var href = $(this).attr("link") ;
        //页面跳转
        window.location.href = href ;
  	}
  );
</script>

<div class="operate-area col-md-10">
    
