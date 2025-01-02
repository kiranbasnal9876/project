<?php
session_start();
if (isset($_SESSION['username'])) {
   header("Location:http://localhost/First_Project/sidebar.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log In page</title>
  <link rel="stylesheet" href="./assetes/css/bootstrap.min.css">
  <link rel="stylesheet" href="index.css">

</head>

<body>
  <div class="container-fluid parent-container">
    <div class=" container div-container">
      <div class="login-div">
        <!-- <div class="input-div "><img src="./images/sansoftwares_logo.png" alt=""></div> -->
        <p><img src="./images/sansoftwares_logo.png" alt=""></p>
        <!-- <div class="" id="login-text">LOG IN HERE</div> -->
        
        <div class="input-div">
          <label for="staticEmail" class="col-form-label">Email</label>
          <input type="text" class="form-control border" id="inputemail" oninput="validEmail()" maxlength="20">
          <span id="log_er1"></span>
        </div>
        <div class=" input-div row">
          <label for="inputPassword" class="col-form-label">Password</label>

          <input type="password" class="form-control border" id="inputPassword" oninput="validPassword()">
          <span id="log_er"></span>
        </div>
        <div class=" input-div">
          <button type="button" class="btn mt-4 form-control" id="login-btn">Log In</button>
        </div>
      </div>
      
     
  
    
    </div>


  </div>



  <script src="assetes/js/bootstrap.min.js"></script>
  <script src="assetes/jquery/jquery-3.7.1.min.js"></script>
  <script src="index.js"></script>
</body>

</html>