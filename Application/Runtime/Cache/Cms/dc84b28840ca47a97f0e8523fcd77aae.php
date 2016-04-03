<?php if (!defined('THINK_PATH')) exit();?>    <div class="alert alert-info">当前位置<b class="tip"></b>投资项目<b class="tip"></b>重点投资项目
<?php if($show_list == 0) { echo "<b class='tip'></b>".$show_title ; } ?>
    </div>

<?php if($show_list == 1) { ?>

 <div class="myTable">  

    <table class="table table-striped table-bordered table-condensed" id="top">
        <thead>
            <tr class="tr_detail">
                <td class="auto-style1">顺序</td>
                <td class="auto-style1">项目名称</td>
                <td class="auto-style1">交易所</td>
                <td class="auto-style1">项目代码</td>
                <td class="auto-style1">操作</td>
            </tr>
        </thead>

        <!-- <显示项目信息> -->
        <tbody>

<?php for($i = 0 ; $i < count($projects); $i++ ) { ?>        
            <tr class="tr_chairman">
                <td class="my_td td_odrer"><?php echo ($projects[$i]["order"]); ?></td>
                <td><?php echo ($projects[$i]["name"]); ?></td>
                <td><?php echo ($projects[$i]["bourse"]); ?></td>
                <td><?php echo ($projects[$i]["code"]); ?></td>
                <td>
                	<a href="/Cms/Projects/<?php echo ($CURRETN_MODULE); ?>/<?php echo ($projects[$i]["id"]); ?>"><button class="btn btn-success edit" data-toggle="tooltip" title="编辑"><span class="glyphicon glyphicon-edit"></span></button></a>
                    <button class="btn btn-success up move" data-toggle="tooltip" title="上移" url-link ="/Cms/Common/move/project_zdxm/up/<?php echo ($projects[$i][id]); ?>"><span class="glyphicon glyphicon-arrow-up"></button>
                    <button class="btn btn-success down move" data-toggle="tooltip" title="下移" url-link ="/Cms/Common/move/project_zdxm/down/<?php echo ($projects[$i][id]); ?>"><span class="glyphicon glyphicon-arrow-down"></button>
                    <button class="btn btn-danger del" data-toggle="tooltip" title="删除" url-link ="/Cms/Common/delete/project_zdxm/1/<?php echo ($projects[$i][id]); ?>"><span class="glyphicon glyphicon-trash"></span></button>
                </td>
            </tr>
<?php } ?> 	
            <!-- <添加按钮> -->                        
            <tr class="tr_pagenumber">
                <td colspan="100">
                    <a href="/Cms/Projects/<?php echo ($CURRETN_MODULE); ?>/add"><button class="btn btn-primary add"><span class="glyphicon glyphicon-plus"></span>添加</button></a>
                </td>
            </tr>

        </tbody>
	</table>

<?php if(count($projects) == 0) { echo "暂无相关数据"; } ?>

<?php } if($show_list == 0) { ?>

		<!-- <项目图片> -->
		<div class="manager-avatar">
			<img class="img-project" src="<?php echo ($project[0]["img_url"]); ?>" alt="图片加载失败">
        </div>

        <div class="col-md-6">
            <div class="one-line">
                <div class="input-group">
                    <span class="btn btn-success fileinput-button">
                        <i class="glyphicon glyphicon-folder-open"></i>
                        <span>上传图片</span>
                        <!-- The file input field used as target for the file upload widget -->
                        <!-- <input id="fileupload" type="file" name="one_img"> -->
                    </span>
                </div>
            </div>
        </div>

	    <div class="col-md-8 one-line">
	        <div class="input-group">
	            <span class="input-group-addon" id="sizing-addon1">名称</span>
	            <input id = "p_name" type="text" class="form-control" aria-describedby="sizing-addon1" value="<?php echo ($project[0]["name"]); ?>">
	        </div>
	    </div>
	    
	    <div class="col-md-8 one-line">   
	        <div class="input-group">
	          <span class="input-group-addon" id="sizing-addon1">交易所</span>
	          <input id = "p_bourse" type="text" class="form-control" aria-describedby="sizing-addon1" value="<?php echo ($project[0]["bourse"]); ?>">
	        </div>
	    </div>
	                                          
	    
	    <div class="col-md-8 one-line">
	        <div class="input-group">
	            <span class="input-group-addon" id="sizing-addon1">代码</span>
	            <input id = "p_code" type="text" class="form-control" aria-describedby="sizing-addon1" value="<?php echo ($project[0]["code"]); ?>">
	        </div>
	    </div>

	    <!-- <功能按钮> -->
        <div class="col-md-5 col-md-offset-5 one-line">
            <button class="btn btn-success" id="submitInfo" url-link ="<?php echo ($editInfoLink); ?>">保存并提交</button>
            <a href="/Cms/Projects/<?php echo ($CURRETN_MODULE); ?>"><button class="btn btn-success">返回</button></a>        
        </div>	               
<?php } ?>

</div>

<script>
    //上传头像功能
    $(".fileinput-button").click(   
        function()
        {
            open_kcfinder("single", function(url)
            {               
                $(".img-project").attr("src", url) ;
            });
        }
    );
 	//提交功能
    $("#submitInfo").click(
        function(event) 
        {
            var url_ = $(this).attr("url-link") ;

            var project_img = $(".img-project").attr("src") ;
            var project_name = $("#p_name").val() ; 
            var project_bourse = $("#p_bourse").val() ;
            var project_code = $("#p_code").val() ;
              
            if( project_name == "" || project_bourse == "" || project_code == "")
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
                            "name":  project_name,
                            "bourse": project_bourse,
                            "img_url":project_img ,
                            "code" : project_code
                         },
                    dataType:"json",
                    beforeSend: function(data) 
                    {
                        // 禁用按钮防止重复提交
                        $("#submitInfo").attr({ disabled: "disabled" });
                    }, 
                    success:function(data)
                    {
                        $("#submitInfo").removeAttr("disabled");
                        if( data.ErrorCode == 1)
                        {
                            alert("操作成功！");
                            self.location="/Cms/Projects/emphasisProject" ;
                        }
                        else if( data.ErrorCode == 0)
                        {
                            alert("操作失败！"); 
                        }

                    },
                    error:function(data)
                    {
                        $("#submitInfo").removeAttr("disabled");
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
                        self.location="/Cms/Projects/emphasisProject" ;
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
                            self.location="/Cms/Projects/emphasisProject" ;
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

    //more
</script>