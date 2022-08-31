
<?php
include_once("config.php");
if(isset($_POST['login'])){

    $username= $_POST['username'];
    $password=$_POST['password'];

    $sql = "SELECT * FROM Adminlogin
            where username='$username' AND password= '$password' ";
    $result= mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)==1){
        session_start();
        $_SESSION['username'] = $username;
        
        // echo "connected";
        header("Location: dashboard.php");
        
    }else{
        echo "login failed";
    }


}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Adminlogin</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  </head>
  <body>
    
    <div class="container login-container">
      <div class="row w-50">
        <div
          class="col-sm-12 d-flex justify-content-center flex-column shadow-lg rounded-2"
        >
          <form action="" class="p-4" method="POST">
            <h1 class="h4">Login</h1>
            <hr />

            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label"
                >Username</label
              >
              <input
                type="text"
                name="username"
                class="form-control"
                id="exampleFormControlInput1"
               required
              />
              
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label"
                >Password</label
              >
              
              <input
                type="password"
                name="password"
                class="form-control"
                id="exampleFormControlInput1"
               
              />
              
            </div>
            <input type="submit" name="login" class="buttons mb-3" value="submit">
         

            <p class="text-center fw-bold">
              Don't Have An Account?
              <a href="Adminregister.php" class="text-decoration-none form-links"
                >Register now</a>
            </p><hr>

            <p class="text-center fw-bold">Login as <a class="text-decoration-none text-capitalize" href="../customerlogin.php">customer</a></p>
          </form>
        </div>
      </div>
    </div>

    <script src="./bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
