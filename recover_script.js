$("#recoverPwd").submit(function(e){
  var data = $("#recoverPwd").serialize();
  $.ajax({
    url:'do_pwd.php',
    type:'post',
    data:data,
      beforeSend: function(){
        $("#recoverPwd").hide();
        $("#mmm").show();
      },
      success:function(dr){
        var dataResult = JSON.parse(dr);
        if(dataResult.statusCode==200){
          response = "We have emailed you a temporary password. Please use it in logging in. Click login to continue";
          $("#recoverPwd")[0].reset()
          $("#mmm").html("<i style='color:red; text-align:center;'>"+response+"</i>");
          $("#errTxt").html(response);      
        }else{
          alert(dataResult.statusCode);
        }
      }
  });

    e.preventDefault();
});

