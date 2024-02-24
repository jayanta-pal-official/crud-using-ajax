$(document).ready(function () {
  $("#register").on("click", function () {
    
    var data= new FormData();
    var form_data=$('#myform').serializeArray();
    $.each(form_data,function(key,input){
      data.append(input.name,input.value);
    });

    var image= $('#image').val();
    if(image !=''){
      var file_data=$('input[ name="image"]')[0].files;
      for(var i=0; i<file_data.length; i++){
        data.append("image[]",file_data[i]);
      }
    }
    var fname = $("#firstname").val();
    var lname = $("#lastname").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var confirm_password = $("#confirm_password").val();
    var image = $('#image').val();
    if (fname === "" ||lname === "" ||email === "" ||password === "" ||confirm_password === "" || image ==='') {
      // $('#error_result').text("All input filed are required");
      alert("All input filed are required");
    }else if(password !==confirm_password){
      // $('#error_result').text("password are not same");
      alert("password are not same");
    }
     else{
      $.ajax({
        url: "register_process.php",
        type: "post",
        contentType: false,
              processData: false,
        data:data,
        success: function (response, data) {
          $("#success_result").text(response);
        },
        error: function (response, data) {
          alert(response);
        },
      });
    }
  });

  //login.................
  $("#login").click(function (e) {
    var login_mail = $("#email").val();
    var login_password = $("#password").val();
    if (login_mail == "" && login_password == "") {
      alert("all filed are required");
      return false;
    } else {
      $.ajax({
        url: "login_process.php",
        type: "post",
        data: $("#myform").serialize(),
        success: function (response) {
          window.location = "welcome.php";
        },
        error: function (response) {
          alert(response);
        },
      });
      //e.preventDefault();
    }
  });


  //delete...............
  $('.delete').on('click',function(){
    var id= $(this).data('id');
    var confirm_alert= confirm("are you sure?");
    if(confirm_alert == true){
      $.ajax({
        url: 'delete.php',
        type: 'post',
        data:{id:id},
        success: function(response){
          alert(response);
          // window.location.reload();
        }
      });
    }
  });
});
