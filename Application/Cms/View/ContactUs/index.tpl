 	<div class="alert alert-info">当前位置<b class="tip"></b>联系我们<b class="tip"></b>基本设置</div>

       <!-- <第1行> -->
        <div class="col-md-6 one-line">
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon1">地址</span>
                <input id = "address" type="text" class="form-control" aria-describedby="sizing-addon1" value="{$company[0].address}" readonly="readonly">
            </div>
        </div>
        
        <div class="col-md-6 one-line">   
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon1">邮政编码</span>
              <input id = "zipcode" type="text" class="form-control" aria-describedby="sizing-addon1" value="{$company[0].zipcode}" readonly="readonly">
            </div>
        </div>
                                              
        <!-- <第2行> -->
        <div class="col-md-6 one-line">
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon1">区号</span>
                <input id = "areacode" type="text" class="form-control" aria-describedby="sizing-addon1" value="{$company[0].areacode}" readonly="readonly">
            </div>
        </div>
        
        <div class="col-md-6 one-line">   
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon1">电话号码</span>
              <input id = "phone" type="text" class="form-control" aria-describedby="sizing-addon1" value="{$company[0].phone}" readonly="readonly">
            </div>
        </div>
                               
            
        <!-- <第3行> -->
        <div class="col-md-6 one-line">
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon1">传真</span>
                <input id = "fax" type="text" class="form-control" aria-describedby="sizing-addon1" value="{$company[0].fax}" readonly="readonly">
            </div>
        </div>
        
        <div class="col-md-6 one-line">   
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon1">HR邮箱</span>
              <input id = "email" type="text" class="form-control" aria-describedby="sizing-addon1" value="{$company[0].email}" readonly="readonly">
            </div>
        </div>
        
        <!-- <第4行> -->
        <div class="col-md-12 one-line cue">
        	<span>（注：如果有多个电话号码，请用英文逗号隔开！）</span>
        </div>   

        <!-- <第5行> -->
        <div class="col-md-2 col-md-offset-5 one-line">
            <button class="btn btn-success" id="editInfo"><span class="glyphicon glyphicon-edit"></span>&nbsp;编辑</button>
            <input class="btn btn-danger" id="submitInfo" type="button" value="保存并提交" style="display:none"/>          
        </div> 

<script>

    //编辑数据
    $("#editInfo").click(
        function(event) 
        {           
            $("#address").removeAttr("readonly");
            $("#zipcode").removeAttr("readonly");
            $("#areacode").removeAttr("readonly");
            $("#phone").removeAttr("readonly");
            $("#fax").removeAttr("readonly");
            $("#email").removeAttr("readonly");

            //定位光标
            var address = $("#address").val() ; 
            $("#address").val("").focus().val(address); 
     
            //按钮显示
            $(this).toggle() ;
            $(".cue").toggle() ; 
            $("#submitInfo").toggle() ;                     
        }
    );

    //提交数据
    $("#submitInfo").click(
        function(event) 
        {           
           
            if( confirm("确定要修改？") )
            {
                //ajax提交
                var address = $("#address").val() ;
                var zipcode = $("#zipcode").val() ;
                var areacode = $("#areacode").val() ;
                var phone = $("#phone").val() ;  
                var fax = $("#fax").val() ; 
                var email = $("#email").val() ;
                var that = $(this) ;

                $.post( '/Cms/Common/update/contact_us/1',
                        {
                           "address" :      address ,
                           "zipcode":       zipcode ,
                           "areacode" :     areacode   ,
                           "phone":         phone ,
                           "fax":  			fax ,
                           "email":         email
                        }, 
                        function(data) 
                        {
                            if( data.ErrorCode == 1)
                            {
                                //数据库操作成功
                                $("#address").attr('readonly','readonly') ;
                                $("#zipcode").attr('readonly','readonly') ;
                                $("#areacode").attr('readonly','readonly') ;
                                $("#phone").attr('readonly','readonly') ;
                                $("#fax").attr('readonly','readonly') ;
                                $("#email").attr('readonly','readonly') ;
                    
                                that.toggle() ;
                                $("#editInfo").toggle() ;
                                $(".cue").toggle() ;
                                alert("操作成功！");
                            }                  
                        }
                );
            
            }                               
        }
    ); 
    
</script>