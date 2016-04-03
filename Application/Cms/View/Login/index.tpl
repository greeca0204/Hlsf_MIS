<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>和灵穗丰</title>

    <link rel="stylesheet" type="text/css" href="__CSS__/Login/admin-all.css"/>
    <link rel="stylesheet" type="text/css" href="__CSS__/Login/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="__CSS__/Login/login.css" />

    <script src="__THIRD__/jquery.min.js"></script>
    <script src="__THIRD__/bootstrap-3.3.5/js/bootstrap.min.js"></script>
    <script src="__JS__/Login/chur.min.js"></script>

</head>

<body>
    <div id="clouds" class="stage"></div>
    <div class="loginmain">
    </div>

    <div class="row-fluid">
        <h1>『和灵穗丰』后台管理系统</h1>
        <p>
            <label>帐&nbsp;&nbsp;&nbsp;号：<input type="text" id="uid" /></label>
        </p>
        <p>
            <label>密&nbsp;&nbsp;&nbsp;码：<input type="password" id="pwd" /></label>
        </p>
        <p class="tip" style="display:none">&nbsp;</p>
        <hr />
        <input type="button" value=" 登 录 " class="btn btn-primary btn-large login" />
        &nbsp;&nbsp;&nbsp;
        <input type="button" value=" 退 出 " class="btn btn-large exit" />
    </div>
</body>

<script type="text/javascript">
        $(function () {

            $('.login').click(
                function () 
                {
                    if ($('#uid').val() == "" || $('#pwd').val() == "" || $('#code').val() == "") 
                    { 
                        $('.tip').html('用户名或密码不可为空！');
                        $('.tip').show();
                        $('.tip').fadeOut(1500) ;
                    }
                    else 
                    {
                        //ajax发送信息
                        $.post( '/Cms/Login/validate',
                                {
                                    account: $('#uid').val(),
                                    pwd : $('#pwd').val()
                                }, 
                                function(data) 
                                {
                                    if( data.errorCode == 0)
                                    {
                                        $('.tip').html('用户名或密码输入错误！');
                                        $('.tip').show();
                                        $('.tip').fadeOut(1500) ;
                                    }
                                    else if( data.errorCode == 1)
                                    {
                                        //页面跳转
                                        window.location.href= data.url;
                                    }
                                    else
                                    {

                                    }
                                }
                        );
                    }
                }
            ) ;

            $(".exit").click(
                function()
                {      

                    if (confirm("您确定要关闭本页吗？"))
                    {
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

        })
</script>

</html>




