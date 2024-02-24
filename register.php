<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regester</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <!-- <script src="js/ajax.js" ></script> -->
    <!-- <script src="js/ajax_demo.js" ></script> -->
    <style>body{margin-top: 120px;} .error{color:red;}</style>
</head>
<body>
    <center>
    <strong  class="mt-5"  id="result"></strong>

        <p style="color:blue" ></p>
    <h1><b>Regester</b></h1><br>
    <form   id="myform" >
        <label>First name :<strong class="error" >*</strong></label>
        <input type="text" name="first_name" id="first_name" placeholder="please enter first name"><br><br>
        <label>Last name :<strong class="error" >*</strong></label>
        <input type="text" name="last_name" id="last_name" placeholder="please enter last name"><br><br>
        <label>Email :<strong class="error" >*</strong></label>
        <input type="text" name="email" id="email" placeholder="please enter email"><br><br>
        <label>password :<strong class="error" >*</strong></label>
        <input type="text" name="password" id="password" placeholder="please enter password"><br><br>
        <label>Confirm Password :<strong class="error" >*</strong></label>
        <input type="password" name="confirm_password" id="confirm_password" placeholder="please enter confirm password"><br><br>
        <label>Image :<strong class="error" >*</strong></label>
        <input type="file" name="image" id="image"><br><br>
        <input type="submit"  class="btn btn-success"value="Register" id="register" name="submit">&nbsp&nbsp&nbsp<a class="btn btn-info" href="login.php" >Login</a>
    </form>
    
    </center>

    <script>
        $(document).ready(function (e) {
    $("#myform").on('submit',(function(e) {
     e.preventDefault();

    var fname = $("#firstname").val();
    var lname = $("#lastname").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var confirm_password = $("#confirm_password").val();
    var image = $('#image').val();
    
    var regEx =/^[^\s@]+@[^\s@]+\.[^\s@]+$/;  
      var validEmail = regEx.test(email);  
    if (fname === "" ||lname === "" ||email === "" ||password === "" ||confirm_password === "" || image ==='') {
      $('#result').text("All  filed are required").css({'color':'red'});
    }else if(password !== confirm_password){
      $('#result').text("password are not same").css({'color':'red'});
    }
    else if(password.length <8){
      $('#result').text("password should be 8 characters long").css({'color':'red'});
    }
    else if(confirm_password.length <8){
      $('#result').text("password should be 8 characters long").css({'color':'red'});
    }else if(!validEmail){
      $('#result').text("Enter a valid email").css({'color':'red'});

    }
     else{
     $.ajax({
      url: "register_process.php",
      type: "POST",
      data:  new FormData(this),
      contentType: false,
      cache: false,
      processData:false,
    //   beforeSend : function(){
    //   $("#result").fadeOut();
    //    },
      success: function(data){
        if(data === '1'){
          $('#result').text("Registered succesfully, you can Login!!!").css({'color':'green'});
          
        }else{
          $('#result').text(data).css({'color':'red'});
        }
         },
        error: function(data){
          $('#result').text(data).css({'color':'red'});
         }          
       });
    }
    }));
});
    </script>
</body>
</html>