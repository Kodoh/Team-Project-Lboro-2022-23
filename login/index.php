<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Make-It-All</title>
</head>
<body>
<div class="container-fluid login-container">

    <h3 class="center title">Sign in to Dashboard</h3>
    <div class="jumbotron form-jumbo">
        <form action="login.php" method="post">
            <div class="form-group">
              <label for="emailInput">Email Address</label>
              <input type="email" class="form-control" id="emailInput" name="emailInput">
              
            </div>
            <div class="form-group">
                <div class="group">
              <label class="pass" for="passwordInput">Password</label>
              <a style=" font-size: smaller" href="http://">Forgot Password?</a>
            </div>
              
              <input type="password" class="form-control" id="passwordInput" name="passwordInput">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
        </form>


    </div>
    <div class="jumbotron register-jumbo">
      <div class="group">
        <p>Got an auth code?</p>
        <button id = 'authCodeButton' type="button" data-toggle="modal" data-target="#exampleModal"><a>Register here</a></button>
      </div>

    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          
          <div class="modal-body">
          <form id = "AuthForm">
          <div id="error-group" class="form-group center"></div>
          <label class="Auth center" for="AuthInput">Enter Auth Code</label>
          <input type="text" class="form-control" id="AuthInput">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Confirm</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <script>
      $(document).ready(function () {
          $("#AuthForm").submit(function (event) {
            event.preventDefault(); 
            var AuthCode = $("#AuthInput").val();
            $(".form-group").removeClass("has-error");
            $(".help-block").remove();

            if (AuthCode.length == 0) {
                $("#error-group").addClass("has-error");
                $("#error-group").append('<div class="help-block">Enter an AuthCode</div>');
            } else {
              $.ajax({
                url:"checkAuthCode.php",
                type:"POST",
                data: {AuthCode: AuthCode},
                success: function(responseData){
                  if (responseData === "true"){
                    location.href = '../register/register.php';
                  } else {
                    $("#error-group").addClass("has-error");
                    $("#error-group").append('<div class="help-block">invalid Auth Code</div>');
                  }
                },
                error: function(e){
                    window.alert("Error Occurred! Please refer to console.");
                    console.log(e.message);
                }
              });
            }
          });
      });
      </script>
</div>
</div>    
</body>
</html>