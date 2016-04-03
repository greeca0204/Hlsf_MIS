<?php if (!defined('THINK_PATH')) exit();?> 
    <div class="alert alert-info">当前位置<b class="tip"></b>公司设置<b class="tip"></b>基本设置</div>

        <!-- <第1行> -->
        <div class="col-md-6 one-line">
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon1">名称</span>
                <input id = "c_name" type="text" class="form-control" aria-describedby="sizing-addon1" value="<?php echo ($company[0]["name"]); ?>" readonly="readonly">
            </div>
        </div>
        
        <div class="col-md-6 one-line">   
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon1">地址</span>
              <input id = "c_address" type="text" class="form-control" aria-describedby="sizing-addon1" value="<?php echo ($company[0]["address"]); ?>" readonly="readonly">
            </div>
        </div>
                                              
        <!-- <第2行> -->
        <div class="col-md-6 one-line">
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon1">口号</span>
                <input id = "c_slogan" type="text" class="form-control" aria-describedby="sizing-addon1" value="<?php echo ($company[0]["slogan"]); ?>" readonly="readonly">
            </div>
        </div>
        
        <div class="col-md-6 one-line">   
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon1">ICP备案号</span>
              <input id = "c_icp" type="text" class="form-control" aria-describedby="sizing-addon1" value="<?php echo ($company[0]["icp"]); ?>" readonly="readonly">
            </div>
        </div>
                               
            
        <!-- <第3行> -->
        <div class="col-md-12 one-line">                         
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon1">概述</span>
                <textarea id = "c_description" class="form-control" rows="3" readonly="readonly"><?php echo ($company[0]["description"]); ?></textarea>            
            </div>
        </div>
                     
        <!-- <第4行> -->
        <div class="col-md-12 one-line">                         
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon1">详细<br/><br/>介绍</span>            
                <textarea id = "c_introduction" class="form-control" rows="8" readonly="readonly"><?php echo ($company[0]["introduction"]); ?></textarea>
            </div>     
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
            $("#c_name").removeAttr("readonly");
            $("#c_address").removeAttr("readonly");
            $("#c_slogan").removeAttr("readonly");
            $("#c_icp").removeAttr("readonly");
            $("#c_description").removeAttr("readonly");
            $("#c_introduction").removeAttr("readonly");

            //定位光标
            var company_name = $("#c_name").val() ; 
            $("#c_name").val("").focus().val(company_name); 
     
            //按钮显示
            $(this).toggle() ;
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
                var company_name = $("#c_name").val() ;
                var company_address = $("#c_address").val() ;
                var company_slogan = $("#c_slogan").val() ;
                var company_icp = $("#c_icp").val() ;  
                var company_description = $("#c_description").val() ; 
                var company_introduction = $("#c_introduction").val() ;
                var that = $(this) ;

                $.post( '/Cms/Common/update/company/1',
                        {
                           "name":          company_name ,
                           "address" :      company_address ,
                           "slogan":        company_slogan ,
                           "ICP" :          company_icp    ,
                           "description":   company_description ,
                           "introduction":  company_introduction
                        }, 
                        function(data) 
                        {
                            if( data.ErrorCode == 1)
                            {
                                //数据库操作成功
                                $("#c_name").attr('readonly','readonly') ;
                                $("#c_address").attr('readonly','readonly') ;
                                $("#c_slogan").attr('readonly','readonly') ;
                                $("#c_icp").attr('readonly','readonly') ;
                                $("#c_description").attr('readonly','readonly') ;
                                $("#c_introduction").attr('readonly','readonly') ;
                    
                                that.toggle() ;
                                $("#editInfo").toggle() ;
                                alert("操作成功！");
                            }                  
                        }
                );
            
            }                               
        }


    ); 
       
</script>