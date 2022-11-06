<?php
session_start();

if(isset($_SESSION['authcode'])){


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
    <body style="width:100% !important;">
    <title>User Registration Page</title>
</head>
<body>
<div class="container-fluid login-container">

    <h3 class="center title">Register as User</h3>
    <div class="jumbotron form-jumbo">
      <div id = 'banner'></div>
        <form name = 'Register-Form' onsubmit="return validateForm()" action = 'registerProcess.php' id = "form2" method = 'POST'>
            <div class="form-group">
              <label for="emailInput">Email Address</label>
              <input type="email" class="form-control" id="emailInput" name = "emailInput"  placeholder="youremail@make-it-all.com">
              <span class="error" aria-live="polite"></span>
            </div>
            <div class="form-group">
                <div class="group">
              <label class="pass" for="passInp">Password</label>
            </div>
              
              <input type="password" class="form-control" id="passwordInput" name = "passwordInput">
            
              <br>
              <span id="StrengthDisp" class="badge displayBadge"></span>
              <script src="register.js"></script> 
            </div>

            <div class="form-group">
                <div class="group">
              <label class="pass" for="passwordMatchInput">Confirm Password</label>
            </div>
            <input type="password" class="form-control" id="passwordMatchInput">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
            <div style="margin-top:20px ;">Already have an account? <a href='../login/index.html'>Login here</a></div>
          </form>

    </div>
</div>
</div>
    
    
</body>
</html>
<?php
}else{
  header("Location: /login/index.php");
  die();
}
?>