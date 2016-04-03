<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>   
    <meta name="viewport" content="width=device-width, initial-scale=1, height=device-height, user-scalable=none">
    
    <!--引入第三方Bootstrap文件-->
    <!--第三方Bootstrap文件,需要引入jquery文件-->
    <link rel="stylesheet" type="text/css" href="__THIRD__/bootstrap-3.3.5/css/bootstrap.min.css">
    <script src="__THIRD__/jquery.min.js"></script>
    <script src="__THIRD__/bootstrap-3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="__THIRD__/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
<php>
if(isset($JS_PRELOAD)) {
    foreach($JS_PRELOAD as $value) {
</php>
    <script src="{$value}"></script>
<php>
    }
}
</php>  
    <link rel="stylesheet" type="text/css" href="__CSS__/common.css">
    <link rel="stylesheet" type="text/css" href="__CSS__/{$CURRETN_CONTROLLER}/{$CURRETN_MODULE}.css">
</head>
<body>
<div id ="heading" class="col-md-12">

    <div class="heading-div1 col-md-3">
        <span id='company-name'>和灵<br/>穗丰</span>
        <div id="logo"></div>      
    </div> 

    <div class="heading-div2">
        <div class ="navigator" >
            <ul class="nav nav-pills">
                
<php>
    $CONTROLLERS = array() ;
    $CONTROLLERS[0]['name'] = "Company"   ;  $CONTROLLERS[0]['value'] = "公司设置" ;
    $CONTROLLERS[1]['name'] = "Team"      ;  $CONTROLLERS[1]['value'] = "团队管理" ;
    $CONTROLLERS[2]['name'] = "News"      ;  $CONTROLLERS[2]['value'] = "新闻中心" ;
    $CONTROLLERS[3]['name'] = "Projects"  ;  $CONTROLLERS[3]['value'] = "投资项目" ;
    $CONTROLLERS[4]['name'] = "ContactUs" ;  $CONTROLLERS[4]['value'] = "联系我们" ;
    $CONTROLLERS[5]['name'] = "Account"   ;  $CONTROLLERS[5]['value'] = "账户管理" ;
</php>

<php>
    for($i = 0 ; $i< count($CONTROLLERS); $i++)
    {
        
</php>
                <li role="presentation"
<php>
        if( $CURRETN_CONTROLLER == $CONTROLLERS[$i]['name'] )
        {
            echo "class='active'" ;
        }
</php>
                >
                    <a class="navv" href="/Cms/{$CONTROLLERS[$i].name}/Index">                     
                         {$CONTROLLERS[$i].value}                    
                    </a>
                </li>    
<php>
    }
</php>            
            </ul>
        </div>          
        <div class ="sub-navigator">
            <span class ="sub-navigator-exit">安全退出</span>        
            <span class ="sub-navigator-welcome">您好，{$_SESSION['uid']}&nbsp;|&nbsp;</span>
        </div>
    </div>
</div>

<div class="center">
    <div class="sidebar col-md-2">
        <div class="sidebar-panel">
 
 <script> 
    $(".sub-navigator-exit").click(
        function()
        {      

            if (confirm("安全退出会清除账号密码信息,确定要关闭本页吗？"))
            {

                $.post('/Cms/Login/myExit', null ,
                    function(data, textStatus, xhr) {
                    /*optional stuff to do after success */
                });

                var userAgent = navigator.userAgent;
                if (userAgent.indexOf("Firefox") != -1 || userAgent.indexOf("Chrome") !=-1) 
                {
                    window.location.href="about:blank";
                }
                else 
                {
                    window.opener = null;
                    window.open("", "_self");
                    window.close();
                } 
            }
            else{}                                      
        }
    );
</script> 	  
