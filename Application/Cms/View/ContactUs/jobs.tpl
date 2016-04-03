	<div class="alert alert-info">当前位置<b class="tip"></b>联系我们<b class="tip"></b>招贤纳士
<php>
    if($show_list == 0)
    {
       echo "<b class='tip'></b>".$show_title ;
    }
</php>
    </div>

	<div class="myTable">  

<php>
	if( $show_list == 1 )
	{
</php>
    <table class="table table-striped table-bordered table-condensed" id="top">
        <thead>
            <tr class="tr_detail">
                <td class="auto-style1">顺序</td>
                <td class="auto-style1">岗位名称</td>
                <td class="auto-style1">操作</td>
            </tr>
        </thead>

        <!-- <显示人物信息> -->
        <tbody>

<php>
	for($i = 0 ; $i < count($jobs); $i++ )
	{
</php>        
            <tr class="tr_chairman">
                <td class="my_td td_odrer">{$jobs[$i].order}</td>
                <td>{$jobs[$i].name}</td>
                <td>
                	<a href="/Cms/{$CURRETN_CONTROLLER}/{$CURRETN_MODULE}/{$jobs[$i][id]}"><button class="btn btn-success edit" data-toggle="tooltip" title="编辑"><span class="glyphicon glyphicon-edit"></span></button></a>
                    <button class="btn btn-success up move" data-toggle="tooltip" title="上移" url-link ="/Cms/Common/move/contact_us_jobs/up/{$jobs[$i][id]}"><span class="glyphicon glyphicon-arrow-up"></button>
                    <button class="btn btn-success down move" data-toggle="tooltip" title="下移" url-link ="/Cms/Common/move/contact_us_jobs/down/{$jobs[$i][id]}"><span class="glyphicon glyphicon-arrow-down"></button>
                    <button class="btn btn-danger del" data-toggle="tooltip" title="删除" url-link ="/Cms/Common/delete/contact_us_jobs/1/{$jobs[$i][id]}"><span class="glyphicon glyphicon-trash"></span></button>
                </td>
            </tr>
<php>
	}
</php> 		

            <!-- <添加按钮> -->                        
            <tr class="tr_pagenumber">
                <td colspan="100">
                    <a href="/Cms/{$CURRETN_CONTROLLER}/{$CURRETN_MODULE}/add"><button class="btn btn-primary add"><span class="glyphicon glyphicon-plus"></span>添加</button></a>
                </td>
            </tr>
            
        </tbody>
	</table>

<php>
	}
</php>


<php>
	if( $show_list == 0 )
	{
</php>

		<div class="col-md-5">
        	<div class="one-line">
        	    <div class="input-group">
        	        <span class="input-group-addon" id="sizing-addon1">岗位名称</span>
        	        <input id = "j_name" type="text" class="form-control" aria-describedby="sizing-addon1" value="{$jobs[0].name}">
        	    </div>
        	</div>
        </div>

        <div class="col-md-12 one-line">                        
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon1">岗位职责</span>            
                <textarea id = "j_duty" class="form-control" rows="7">{$jobs[0].duty}</textarea>
            </div>     
        </div>

        <div class="col-md-12 one-line">                        
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon1">任职要求</span>            
                <textarea id = "j_demand" class="form-control" rows="7">{$jobs[0].demand}</textarea>
            </div>     
        </div>

        <!-- <功能按钮> -->
        <div class="col-md-5 col-md-offset-5 one-line">
            <button class="btn btn-success" id="editInfo" url-link ="{$editInfoLink}">保存并提交</button>
            <a href="/Cms/{$CURRETN_CONTROLLER}/{$CURRETN_MODULE}"><button class="btn btn-success">返回</button></a>          
        </div>

<script>
    // //时间插件
    // $('#m_time').datepicker(
    //     {
    //         todayBtn: "linked",
    //         language: "zh-CN",
    //         orientation: "right" ,
    //         format:"yyyy-mm-dd" ,
    //         autoclose: true
    //     }
    // ) ;
</script>

<php>
	}
</php>

</div>

<!-- <script src="__THIRD__/jQuery-File-Upload/js/vendor/jquery.ui.widget.js"></script>
<script src="__THIRD__/jQuery-File-Upload/js/jquery.iframe-transport.js"></script>
<script src="__THIRD__/jQuery-File-Upload/js/jquery.fileupload.js"></script> -->

<script>
 
    //编辑功能
    $("#editInfo").click(
        function(event) 
        {
            var url_ = $(this).attr("url-link") ;
            var name = $("#j_name").val() ;
            var duty = $("#j_duty").val() 
 			var demand = $("#j_demand").val() 
            
            if( name == "" || duty == "" )
            {
                alert("信息缺失，操作失败！");
            }
            else
            {
                $.ajax(
                {
                    type:"POST",
                    url:  url_ , 
                    data:{
                            "name"  : name ,
                            "duty"  : duty ,
                            "demand": demand
                         },
                    dataType:"json",
                    beforeSend: function(data) 
                    {
                        //禁用按钮防止重复提交
                        $("#editInfo").attr({ disabled: "disabled" });
                    }, 
                    success:function(data)
                    {
                        $("#editInfo").removeAttr("disabled");
                        if( data.ErrorCode == 1)
                        {
                            alert("操作成功！");
                            self.location="/Cms/ContactUs/jobs" ;
                        }
                        else if( data.ErrorCode == 0)
                        {
                            alert("操作失败！"); 
                        }

                    },
                    error:function(data)
                    {
                        $("#editInfo").removeAttr("disabled");
                        alert("异常错误");
                    }
                });
            }
        }
    )

    //上移/下移功能
    $(".move").click(
        function()
        {
             var url_ = $(this).attr("url-link");
             var that = $(this) ;

             $.ajax(
             {
                type:"POST",
                url: url_,
                dataType:"json",
                beforeSend: function() 
                {
                    // 禁用按钮防止重复提交
                    that.attr({ disabled: "disabled" });
                }, 
                success:function(data)
                {
                    that.removeAttr("disabled");

                    if( data.ErrorCode == 1)
                    {   
                        //操作成功
                        alert("操作成功！");
                        self.location="/Cms/ContactUs/jobs" ;
                    }
                    else if( data.ErrorCode == 0)
                    {
                        alert(data.ErrorMessage); 
                    }
                    else
                    {

                    }
                },
                error:function(data)
                {
                    that.removeAttr("disabled");
                    alert("异常错误");
                }
             });
        }
    );

    //删除功能
    $(".del").click(
         function()
         {

            if(confirm("您确定要删除么？"))
            {
   
                var url_ = $(this).attr("url-link");
                var that = $(this) ;
                
                $.ajax(
                 {
                    type:"POST",
                    url: url_,
                    dataType:"json",
                    beforeSend: function() 
                    {
                        // 禁用按钮防止重复提交
                        that.attr({ disabled: "disabled" });
                    }, 
                    success:function(data)
                    {
                        that.removeAttr("disabled");

                        if( data.ErrorCode == 1)
                        {   
                            //操作成功
                            alert("操作成功！");
                            self.location="/Cms/ContactUs/jobs" ;
                        }
                        else if( data.ErrorCode == 0)
                        {
                            alert(data.ErrorMessage); 
                        }
                        else
                        {

                        }
                    },
                    error:function(data)
                    {
                        that.removeAttr("disabled");
                        alert("异常错误");
                    }
                 });
            }
        }
    );

    //---more

</script>
