
<?php
        include_once("config.php");

if(isset($_POST['submit'])){
    $username= $_POST['username'];
    $password = $_POST['password'];
    

    
        $sql = "INSERT INTO Adminlogin(username,password)
        Values('$username','$password')";
        $result = mysqli_query($conn,$sql);
        if($result){
            // echo"New Record is uploaded";
            header("Location: Adminlogin.php");
            // header("Location: displayclasswork.php");
        }else{
            "Record not uploaded".mysqli_error($conn);
        }
    
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SN Book store</title>
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      type="text/css"
      href="./bootstrap/css/bootstrap.min.css"
    />
  </head>
  <body>
    <div class="container signup-container">
      <div class="row w-50">
        <div
          class="col-sm-12 d-flex justify-content-center flex-column shadow-lg rounded-2"
        >
          <form action="" class="p-4" method="POST">
            <h1 class="h4 text-capitalize">sign up</h1>
            <hr />

            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label"
                >Username</label
              >
              <input
                type="text"
                name="username"
                class="form-control"
                required
              />
               
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label"
                >Password</label
              >
              <input
              name="password"
              type="password"
              class="form-control"
            
              />
              
            </div>

            <input type="submit" name="submit" class="buttons mb-3" value="submit">
           

            <p class="text-center fw-bold">
              Have A Account?
              <a href="Adminlogin.php" class="text-decoration-none form-links"
                >login now</a
              >
            </p>
          </form>
        </div>
      </div>
    </div>

    <script src="./bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
