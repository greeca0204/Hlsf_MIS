    <div class="alert alert-info">当前位置<b class="tip"></b>团队管理<b class="tip"></b>成员管理
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
                <td class="auto-style1">姓名</td>
                <td class="auto-style1">头衔</td>
                <td class="auto-style1">副头衔</td>
                <td class="auto-style1">操作</td>
            </tr>
        </thead>

        <!-- <显示人物信息> -->
        <tbody>

<php>
	for($i = 0 ; $i < count($members); $i++ )
	{
</php>        
            <tr class="tr_chairman">
                <td class="my_td td_odrer">{$members[$i].order}</td>
                <td>{$members[$i].name}</td>
                <td>{$members[$i].title}</td>
                <td>{$members[$i].honor}</td>
                <td>
                	<a href="/Cms/{$CURRETN_CONTROLLER}/{$CURRETN_MODULE}/{$members[$i][id]}"><button class="btn btn-success edit" data-toggle="tooltip" title="编辑"><span class="glyphicon glyphicon-edit"></span></button></a>
                    <button class="btn btn-success up move" data-toggle="tooltip" title="上移" url-link ="/Cms/Common/move/team_member/up/{$members[$i][id]}"><span class="glyphicon glyphicon-arrow-up"></button>
                    <button class="btn btn-success down move" data-toggle="tooltip" title="下移" url-link ="/Cms/Common/move/team_member/down/{$members[$i][id]}"><span class="glyphicon glyphicon-arrow-down"></button>
                    <button class="btn btn-danger del" data-toggle="tooltip" title="删除" url-link ="/Cms/Common/delete/team_member/1/{$members[$i][id]}"><span class="glyphicon glyphicon-trash"></span></button>
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
		<!-- <人物图片> -->
		<div class="manager-avatar">
			<img class="img-avatar" src="{$members[0].img_url}" alt="图片加载失败">
        </div>

		<div class="col-md-5">
            <div class="one-line">
                <div class="input-group">
                    <span class="btn btn-success fileinput-button">
                        <i class="glyphicon glyphicon-folder-open"></i>
                        <span>上传头像</span>
                        <!-- The file input field used as target for the file upload widget -->
                        <!-- <input id="fileupload" type="file" name="one_img"> -->
                    </span>
                </div>
            </div>

        	<div class="one-line">
        	    <div class="input-group">
        	        <span class="input-group-addon" id="sizing-addon1">名称</span>
        	        <input id = "c_name" type="text" class="form-control" aria-describedby="sizing-addon1" value="{$members[0].name}">
        	    </div>
        	</div>
        	
        	<div class="one-line">   
        	    <div class="input-group">
        	      <span class="input-group-addon" id="sizing-addon1">头衔</span>
        	      <input id = "c_title" type="text" class="form-control" aria-describedby="sizing-addon1" value="{$members[0].title}">
        	    </div>
        	</div>

            <div class="one-line">   
                <div class="input-group">
                  <span class="input-group-addon" id="sizing-addon1">副头衔</span>
                  <input id = "c_honor" type="text" class="form-control" aria-describedby="sizing-addon1" value="{$members[0].honor}">
                </div>
            </div>

        </div>

        <div class="col-md-12 one-line">                         
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon1">详细<br/><br/>介绍</span>            
                <textarea id = "c_description" class="form-control" rows="8">{$members[0].description}</textarea>
            </div>     
        </div>

        <!-- <功能按钮> -->
        <div class="col-md-5 col-md-offset-5 one-line">
            <button class="btn btn-success" id="editInfo" url-link ="{$editInfoLink}">保存并提交</button>
            <a href="/Cms/{$CURRETN_CONTROLLER}/{$CURRETN_MODULE}/list"><button class="btn btn-success">返回</button></a>          
        </div>

<php>
	}
</php>

</div>

<script src="__THIRD__/jQuery-File-Upload/js/vendor/jquery.ui.widget.js"></script>
<script src="__THIRD__/jQuery-File-Upload/js/jquery.iframe-transport.js"></script>
<script src="__THIRD__/jQuery-File-Upload/js/jquery.fileupload.js"></script>
<script>

    //上传头像功能
    $(".fileinput-button").click(   
        function()
        {
            open_kcfinder("single", function(url)
            {
                $(".img-avatar").attr("src", url) ;
            });
        }
    );
    // $('#fileupload').fileupload(
    // {
    //     autoUpload: true,
    //     url: "/Cms/Company/upload/avatar",
    //     dataType: 'json',
    //     done: function (e, data) 
    //     { 
    //         if(data.result.ErrorCode == 1 )
    //         {
    //             //图片上传成功
    //             //alert(data.result.ErrorMessage) ;
    //             $(".img-avatar").attr("src", data.result.imgurl) ;
    //         }
    //         else
    //         {
    //             alert(data.result.ErrorMessage) ;
    //         }
    //     }
    // });

    //编辑功能
    $("#editInfo").click(
        function(event) 
        {
            var url_ = $(this).attr("url-link") ;
            var manager_name = $("#c_name").val() ; 
            var manager_title = $("#c_title").val() ;
            var manager_honor = $("#c_honor").val() ;
            var manager_img = $(".img-avatar").attr("src") ; 
            var manager_description = $("#c_description").val() ;
           
            if( manager_name == "" || manager_title == "" || manager_description == "")
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
                            "name":  manager_name,
                            "title": manager_title,
                            "honor": manager_honor,
                            "img_url":manager_img,
                            "description" : manager_description
                         },
                    dataType:"json",
                    beforeSend: function(data) 
                    {
                        // 禁用按钮防止重复提交
                        $("#editInfo").attr({ disabled: "disabled" });
                    }, 
                    success:function(data)
                    {
                        $("#editInfo").removeAttr("disabled");
                        if( data.ErrorCode == 1)
                        {
                            alert("操作成功！");
                            self.location="/Cms/Team/index" ;
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
                        self.location="/Cms/Team/index" ;
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
                            self.location="/Cms/Team/index" ;
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