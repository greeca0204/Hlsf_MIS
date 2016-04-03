<?php if (!defined('THINK_PATH')) exit();?>   	<div class="alert alert-info">当前位置<b class="tip"></b>账户管理<b class="tip"></b>修改密码</div>

   	<!-- <第1行> -->
   	<div class="col-md-12">
	   <div class="col-md-6 one-line">
	       <div class="input-group">
	           <span class="input-group-addon" id="sizing-addon1">原始密码</span>
	           <input id = "p_pwd" type="password" class="form-control" aria-describedby="sizing-addon1" value="">
	       </div>
	   </div>
   	</div>

   	<!-- <第2行> -->
   	<div class="col-md-12">
	   <div class="col-md-6 one-line">
	       <div class="input-group">
	           <span class="input-group-addon" id="sizing-addon1">&nbsp;新密码&nbsp;&nbsp;</span>
	           <input id = "n_pwd" type="password" class="form-control" aria-describedby="sizing-addon1" value="">
	       </div>
	   </div>
   	</div>

   	<!-- <第3行> -->
   	<div class="col-md-12">
	   <div class="col-md-6 one-line">
	       <div class="input-group">
	           <span class="input-group-addon" id="sizing-addon1">确认密码</span>
	           <input id = "n_pwd1" type="password" class="form-control" aria-describedby="sizing-addon1" value="">
	       </div>
	   </div>
   	</div>

   	<!-- <提交按钮> -->
   	<div class="col-md-6">
	   <div class="col-md-2 col-md-offset-10 one-line">
	       <button class="btn btn-success" id="submitPwd">&nbsp;提交</button>         
	   </div>
	</div>

<script type="text/javascript">
	$("#submitPwd").click(
		function()
		{
			var p_pwd  = $("#p_pwd").val() ;
			var n_pwd  = $("#n_pwd").val() ;
			var n_pwd1 = $("#n_pwd1").val() ;
			
			if(p_pwd == "" || n_pwd == "" || n_pwd1 == "")
			{
				alert("请补充完整信息！");
			}
			else if( n_pwd !== n_pwd1 )
			{
				alert("两次密码不一样，请重新填写！");
			}
			else
			{
				//ajax提交
				$.post(
					'/Cms/Account/update', 
					 {
					 	'p_pwd' : p_pwd,
					 	'n_pwd' : n_pwd  	
					 },
					 function(data, textStatus, xhr)
					 {
					     if( data.ErrorCode == 0 )
					     {
					     	alert(data.ErrorMessage) ;
					     	$("#p_pwd").val("") ;					     	
					     }
					     else if( data.ErrorCode == 1 )
					     {
							alert(data.ErrorMessage) ;
							//跳转到登录界面
							self.location="/Cms/Login/index" ;
					     }
					     else
					     {
					     	alert("异常错误");
					     	$("#p_pwd").val("") ;
					     	$("#n_pwd").val("") ;
					     	$("#n_pwd1").val("") ;
					     }
				     }
				);
			}
		}
	);
</script>