<?php if (!defined('THINK_PATH')) exit();?><div class="alert alert-info">当前位置<b class="tip"></b>公司设置<b class="tip"></b>董事长专栏
<?php if($show_list == 0) { echo "<b class='tip'></b>".$show_title ; } ?>
    </div>

<div class="myTable">  

<?php if( $show_list == 1 ) { ?>
    <table class="table table-striped table-bordered table-condensed" id="top">
        <thead>
            <tr class="tr_detail">
                <td class="auto-style1">顺序</td>
                <td class="auto-style1">活动标题</td>
                <td class="auto-style1">活动时间</td>
                <td class="auto-style1">操作</td>
            </tr>
        </thead>

        <!-- <显示人物信息> -->
        <tbody>

<?php for($i = 0 ; $i < count($managers); $i++ ) { ?>        
            <tr class="tr_chairman">
                <td class="my_td td_odrer"><?php echo ($i+1); ?></td>
                <td><?php echo ($managers[$i]["title"]); ?></td>
                <td><?php echo ($managers[$i]["time"]); ?></td>
                <td>
                	<a href="/Cms/<?php echo ($CURRETN_CONTROLLER); ?>/<?php echo ($CURRETN_MODULE); ?>/<?php echo ($managers[$i][id]); ?>"><button class="btn btn-success edit" data-toggle="tooltip" title="编辑"><span class="glyphicon glyphicon-edit"></span></button></a>
<!--                     <button class="btn btn-success up move" data-toggle="tooltip" title="上移" url-link ="/Cms/Common/move/managers/up/<?php echo ($managers[$i][id]); ?>"><span class="glyphicon glyphicon-arrow-up"></button>
                    <button class="btn btn-success down move" data-toggle="tooltip" title="下移" url-link ="/Cms/Common/move/managers/down/<?php echo ($managers[$i][id]); ?>"><span class="glyphicon glyphicon-arrow-down"></button> -->
                    <button class="btn btn-danger del" data-toggle="tooltip" title="删除" url-link ="/Cms/Common/delete/managers/0/<?php echo ($managers[$i][id]); ?>"><span class="glyphicon glyphicon-trash"></span></button>
                </td>
            </tr>
<?php } ?> 		

            <!-- <添加按钮> -->                        
            <tr class="tr_pagenumber">
                <td colspan="100">
                    <a href="/Cms/<?php echo ($CURRETN_CONTROLLER); ?>/<?php echo ($CURRETN_MODULE); ?>/add"><button class="btn btn-primary add"><span class="glyphicon glyphicon-plus"></span>添加</button></a>
                </td>
            </tr>
            
        </tbody>
	</table>

<?php } ?>


<?php if( $show_list == 0 ) { ?>
		<!-- <人物图片> -->
		<div class="manager-avatar">
			<img class="img-avatar" src="<?php echo ($managers[0]["img_url"]); ?>" alt="图片加载失败">
        </div>

		<div class="col-md-5">
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

        	<div class="one-line">
        	    <div class="input-group">
        	        <span class="input-group-addon" id="sizing-addon1">活动标题</span>
        	        <input id = "m_title" type="text" class="form-control" aria-describedby="sizing-addon1" value="<?php echo ($managers[0]["title"]); ?>">
        	    </div>
        	</div>
        	
        	<div class="one-line">   
        	    <div class="input-group">
        	      <span class="input-group-addon" id="sizing-addon1">活动日期</span>
                  <input id = "m_time" type="text" class="form-control" aria-describedby="sizing-addon1" value="<?php echo ($managers[0]["time"]); ?>" readOnly>
                </div>
        	</div>
        </div>

        <div class="col-md-12 one-line">                        
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon1">内容<br/><br/>介绍</span>            
                <textarea id = "m_content" class="form-control" rows="8"><?php echo ($managers[0]["content"]); ?></textarea>
            </div>     
        </div>

        <!-- <功能按钮> -->
        <div class="col-md-5 col-md-offset-5 one-line">
            <button class="btn btn-success" id="editInfo" url-link ="<?php echo ($editInfoLink); ?>">保存并提交</button>
            <a href="/Cms/<?php echo ($CURRETN_CONTROLLER); ?>/<?php echo ($CURRETN_MODULE); ?>"><button class="btn btn-success">返回</button></a>          
        </div>

<script>

    //时间插件
    $('#m_time').datepicker(
        {
            todayBtn: "linked",
            language: "zh-CN",
            orientation: "right" ,
            format:"yyyy-mm-dd" ,
            autoclose: true
        }
    ) ;
</script>

<?php } ?>

</div>

<!-- <script src="/Public/3rd/jQuery-File-Upload/js/vendor/jquery.ui.widget.js"></script>
<script src="/Public/3rd/jQuery-File-Upload/js/jquery.iframe-transport.js"></script>
<script src="/Public/3rd/jQuery-File-Upload/js/jquery.fileupload.js"></script> -->

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
            var manager_title = $("#m_title").val() ;
            var manager_time = $("#m_time").val() ;
            var manager_img = $(".img-avatar").attr("src") ; 
            var manager_content = $("#m_content").val() ;
            
            if( manager_title == "" || manager_time == "" ||manager_title == "" || manager_content == "")
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
                            "title": manager_title,
                            "time" : manager_time ,
                            "img_url":manager_img,
                            "content" : manager_content
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
                            self.location="/Cms/Company/chairman" ;
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

    // //上移/下移功能
    // $(".move").click(
    //     function()
    //     {
    //          var url_ = $(this).attr("url-link");
    //          var that = $(this) ;

    //          $.ajax(
    //          {
    //             type:"POST",
    //             url: url_,
    //             dataType:"json",
    //             beforeSend: function() 
    //             {
    //                 // 禁用按钮防止重复提交
    //                 that.attr({ disabled: "disabled" });
    //             }, 
    //             success:function(data)
    //             {
    //                 that.removeAttr("disabled");

    //                 if( data.ErrorCode == 1)
    //                 {   
    //                     //操作成功
    //                     alert("操作成功！");
    //                     self.location="/Cms/Company/chairman" ;
    //                 }
    //                 else if( data.ErrorCode == 0)
    //                 {
    //                     alert(data.ErrorMessage); 
    //                 }
    //                 else
    //                 {

    //                 }
    //             },
    //             error:function(data)
    //             {
    //                 that.removeAttr("disabled");
    //                 alert("异常错误");
    //             }
    //          });

    //     }
    // );

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
                            self.location="/Cms/Company/chairman" ;
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