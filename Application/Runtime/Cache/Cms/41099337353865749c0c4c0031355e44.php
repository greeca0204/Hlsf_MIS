<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html>
<html lang="zh-cn">
    <head>
    <meta charset="UTF-8">
    <script src="/Public/3rd/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width">
    <title>视频流</title>
    </head>
    <body>
        <div>
            <video id="video" width="360" height="270" autoplay></video>       
            <canvas id="canvas" width="360" height="270"></canvas>    
        </div>
        <button id="snap">实时上传</button>
        <button id="stop">停止上传</button>
    </body>
</html>

<script type="text/javascript">

    // Grab elements, create settings, etc.
    var canvas = document.getElementById("canvas"),
        context = canvas.getContext("2d"),
        video = document.getElementById("video"),
        videoObj = { "video": true },
        errBack = function(error) {
            console.log("Video capture error: ", error.code); 
        };

    // Put video listeners into place
    if(navigator.getUserMedia) { // Standard
        navigator.getUserMedia(videoObj, function(stream) {
            video.src = stream;
            video.play();
        }, errBack);
    } else if(navigator.webkitGetUserMedia) { // WebKit-prefixed
        navigator.webkitGetUserMedia(videoObj, function(stream){
            video.src = window.URL.createObjectURL(stream);
            video.play();
        }, errBack);
    }
    else if(navigator.mozGetUserMedia) { // Firefox-prefixed
        navigator.mozGetUserMedia(videoObj, function(stream){
            video.src = window.URL.createObjectURL(stream);
            video.play();
        }, errBack);
    }

    var circleUpload = "ly" ;

    // 触发录像
    document.getElementById("snap")
              .addEventListener(
        "click", function() 
        {
            if( circleUpload === "ly")
            {
               circleUpload = setInterval("uploadPic()",500);//1000为1秒钟
            }
            // var canvans = document.getElementById("canvas") ;//调用canvas接口
            // context.drawImage(video, 0, 0, 360, 270);
            // var imgData = canvans.toDataURL();//获取图片的base64格式的数据     
            // var base64String = imgData.substr(22); //取得base64字串 
            // var w = 100 ;
            // var length=atob(base64String).length;
            // //var path = "/Cms/testVideo/img" ;
            // base64String = encodeURI(encodeURI(base64String));
            // var path = "http://localhost:8080" ;
            // $.post( path, 
            //     {  
            //         width : w ,
            //         frame : base64String 
            //     },          
            //     function(data, textStatus, xhr) 
            //     {
            //         /*optional stuff to do after success */
            //     }
            // );
            //alert(base64String);
        }
    );

    var imgData;
    var base64String ;
    //var path = "/Cms/testVideo/img" ;
    //var path = "http://localhost:12340" ;
    var path = "http://120.25.162.62:12340" ;
    function uploadPic()
    {
        context.drawImage(video, 0, 0, 360, 270);
        imgData = canvas.toDataURL();//获取图片的base64格式的数据     
        base64String = imgData.substr(22); //取得base64字串
        base64String = encodeURI(encodeURI(base64String)); 
 
        $.ajax({
                    type: "POST",
                    url : path ,
                    data:{
                            frame : base64String 
                         },
                    crossDomain: true
                }
        );
        // $.post( path, 
        //         {  
        //            data:{ frame : base64String } ,
        //            crossDomain: true  
        //         },                 
        //         function(data, textStatus, xhr) 
        //         {
        //             /*optional stuff to do after success */
        //         }
        // );
    }

    //停止录像
    document.getElementById("stop")
              .addEventListener(
        "click", function() 
        {
            if( circleUpload != "ly")
            {
               clearInterval(circleUpload);
               circleUpload = "ly" ;
            }
        }
    );

</script>