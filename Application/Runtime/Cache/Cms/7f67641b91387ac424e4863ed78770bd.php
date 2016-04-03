<?php if (!defined('THINK_PATH')) exit();?>
  <div class="alert alert-info">当前位置<b class="tip"></b>公司设置<b class="tip"></b>图片设置</div>
	
	<!-- <第一排：图形展示区> -->
	<div class="col-md-12 img-area">

		<div class = "div-s">
			<img class="img-logo img-s one-line" data-toggle="tooltip" title="logo" src="<?php echo ($company[0]["logo"]); ?>" alt="「Logo」加载失败">
			<img class="img-qrcode img-s one-line" data-toggle="tooltip" title="二维码" src="<?php echo ($company[0]["qrcode"]); ?>" alt="「二维码」加载失败">
			<img class="img-partner img-m one-line" data-toggle="tooltip" title="合作伙伴图" src="<?php echo ($company[0]["partner"]); ?>" alt="「合作伙伴图」加载失败">
		</div>

		<div class = "div-l">
			<img class="img-frame img-l one-line" data-toggle="tooltip" title="组织结构图" src="<?php echo ($company[0]["frame"]); ?>" alt="「组织结构图」加载失败">
			
		</div>

	</div>

	<!-- <分隔线> -->
    <HR class="my-hr"  style="FILTER: alpha(opacity=100,finishopacity=0,style=3)" width="95%" color=#987cb9 SIZE=1>
	
	<!-- <第二排：功能区> -->
	<div class="col-md-12 operate-pic-area">
		<!-- 选择上传图片的类型 -->
		<div class="col-md-5 col-md-offset-2">
			<div class="input-group">
  					<select id = "mySelect" class="form-control">
						<option value="logo">logo</option>
						<option value="qrcode">二维码</option>
						<option value="frame">组织结构图</option>
						<option value="partner">合作伙伴图</option>
					</select>
					<span class="input-group-btn">
							<span class="btn btn-success fileinput-button">
        	                	<i class="glyphicon glyphicon-folder-open"></i>
        	                	<span>上传图片</span>
        	                <!-- The file input field used as target for the file upload widget -->
        	                	<!-- <input id="fileupload" type="file" name="one_img"> -->
        	        		</span>
        				<!-- <button class="btn btn-success" type="button">Go!</button> -->
      				</span>
			</div>
		</div>
		<div class="col-md-2">
			<button id = "submit" class="btn btn-primary">保存并提交</button>
		</div>
	</div>
  
	<HR class="my-hr" style="border:2 dashed" width="95%" color="#00000" SIZE=1>

<!-- <script src="/Public/3rd/jQuery-File-Upload/js/vendor/jquery.ui.widget.js"></script>
<script src="/Public/3rd/jQuery-File-Upload/js/jquery.iframe-transport.js"></script>
<script src="/Public/3rd/jQuery-File-Upload/js/jquery.fileupload.js"></script> -->
<script type="text/javascript">
     
    //上传图片功能
    $(".fileinput-button").click(   
        function()
        {
            open_kcfinder("single", function(url)
            {
                var type = $("#mySelect").find("option:selected").val();
                $(".img-"+type).attr("src", url) ;
            });
        }
    );
    // $('#fileupload').fileupload(
    // {
    //     autoUpload: true,
    //     url: "/Cms/Company/upload/company" ,
    //     dataType: 'json',
    //     done: function (e, data) 
    //     { 
    //         if(data.result.ErrorCode == 1 )
    //         {
    //             //图片上传成功
    //             //alert(data.result.ErrorMessage) ;
    //             var type = $("#mySelect").find("option:selected").val();
    //             $(".img-"+type).attr("src", data.result.imgurl) ;
    //         }
    //         else
    //         {
    //             alert(data.result.ErrorMessage) ;
    //         }
    //     }
    // });

    //点击提交事件
    $("#submit").click(
    	function()
    	{
    	    //ajax提交
            var company_logo = $(".img-logo").attr("src");
            var company_qrCode = $(".img-qrcode").attr("src");
            var company_frame = $(".img-frame").attr("src");
            var company_partner = $(".img-partner").attr("src");  

            $.post( '/Cms/Common/update/company/1',
                    {
                       "logo":         company_logo ,
                       "qrCode" :      company_qrCode ,
                       "frame":        company_frame ,
                       "partner" :     company_partner    
                    }, 
                    function(data) 
                    {
                        if( data.ErrorCode == 1)
                        {
                            //数据库操作成功
                            alert("图片保存成功！");
                        }                  
                    }
            );
    	}
    );

    //other function

</script>