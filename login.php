<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <style> body{margin-top: 220px; }.error {color: red;} </style>
</head>

<body>
    <center>
        <h1><b>LOGIN</b></h1>
        <form id="myform" method="post">
            <label>Email :<strong class="error" >*</strong></label>
            <input type="email" name="email" id="email" placeholder="please enter eamil" required><br><br>
            <label>Password :<strong class="error" >*</strong></label>
            <input type="text" name="password" id="password" placeholder="please enter paswword" required><br><br>
            <input type="button" class="btn btn-success" name="login" id="login" value="Login">&nbsp&nbsp&nbsp<a href="register.php" class="btn btn-info">Register</a>
        </form>
    </center>
    <script>
        $(document).ready(function() {

            $("#login").click(function() {
                var login_mail = $("#email").val();
                var login_password = $("#password").val();

                if (login_mail == "" || login_password == "") {
                    alert("all filed are required");
                    return false;
                    
                } else {
                    $.ajax({
                        url: "login_process.php",
                        type: "post",
                        data: {
                            login_mail:login_mail,
                            login_password:login_password,
                        },
                        success: function(response) {
                            if(response === "1"){
                                window.location = "welcome.php";
                            }else{
                                alert(response);
                            }
                        },
                        error: function(response) {
                            alert(response);
                        },
                    });
                }
            });
        });
    </script>
</body>

</html>