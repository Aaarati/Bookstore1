<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
  <link rel="stylesheet" type="text/css" href="style.css">
	<link
      rel="stylesheet"
      type="text/css"
      href="./bootstrap/css/bootstrap.min.css"
    />

</head>
</head>
<body>
  <!------------------------------------- SERVER-SIDE VALIDAION ------------------------>
  <?php
    $errusername=$erraddress=$errcontact=$erremail=$errpassword=$errconpassword="";
    if (isset($_POST['submit'])) {
      $username = $_POST['username'];
      $address = $_POST['address'];
      $contact = $_POST['contact'];
      $email = $_POST['email'];
      $password = ($_POST['password']); 
      $con_password = $_POST['con_password'];

      $conn = new mysqli("localhost","root","","bookstore");
          //for unique username
      $query ="SELECT username from customers WHERE username= '".$username."'LIMIT 1";
      $result=mysqli_query($conn,$query) or die(mysqli_error($conn)); 

      if (empty($username)) {
        $errusername= "Username is required!";
      }
      if (empty($address)) {
        $erraddress= "Address is required!";
      }
      if (empty($contact)) {
        $errcontact= "Mobile number is required!";
      }
      if(((!is_numeric($contact)) || (!strlen($contact)==10)) && (!empty($contact))){
         $errcontact = "Valid mobile number is required!";
      }
      

      if (empty($email)) {
        $erremail = "Email address is required!";
      }
      if ((!filter_var($email,FILTER_VALIDATE_EMAIL)) &&(!empty($email))) {
        $erremail= "Email should be in proper format!";
      }
      if (empty($password)) {
        $errpassword = "Password is required!";
      }
      if (empty($con_password)) {
        $errconpassword = "Confirm Password is required!";
      }
      if ($password!= $con_password) {
        $errconpassword = "Passwords do not match, try again!";
      }
      if (mysqli_num_rows($result)>0) {
        $errusername="Username already exists.Please choose another!";
      }
      if (($errusername||$errconpassword||$errpassword||$erremail||$errcontact||$erraddress)=="") {
        if($username && $email && $password && $address && $contact){
        $pass = md5($password);
        $sql = "INSERT INTO customers(username,password,email,address,contact)
        VALUES ('$username','$pass','$email','$address','$contact')";
        if (mysqli_query($conn,$sql) === TRUE) {
       header("location: customerlogin.php");
        }
        else{
        echo "Error";
        }
      }  
    }
    mysqli_close($conn);
    }
  ?>
  <!---------------------------------------- CLIENT-SIDE VALIDATION --------------------->
   <script type="text/javascript">
      function userinput(){
        Username = document.register.name.value;
        Password = document.register.password.value;
        contact = document.register.contact.value;
        email = document.register.email.value;
        Address = document.register.address.value;
        Con_password = document.register.con_password.value;

        var regexEmail = /^\w+([\.-_]?\w+)*@\w+(\.?\w)*(\.\w{2,3})$/
        var regexContact = /^(98[0-9]{8})$/
        if (Username==""){ 
          document.getElementById("username_err").innerHTML ="Please enter your Username!"; 
          document.getElementById("username_err").style.color="red";
          return false;
          }
        if (Address==""){
           document.getElementById("address_err").innerHTML ="Please enter your Address!";
           document.getElementById("address_err").style.color="red";
          return false;
        }
        if (contact=="") {
          document.getElementById("contact_err").innerHTML ="Please enter your Mobile Number!";
          document.getElementById("contact_err").style.color="red";
          return false;
        }
        if (!contact.match(regexContact)) {
           document.getElementById("contact_err").innerHTML ="Please enter 10 digit Mobile Number and entered number should start from 98!";
           document.getElementById("contact_err").style.color="red";
          return false;
        }

        if (email=="") {
          document.getElementById("email_err").innerHTML ="Please enter your Email Address!";
          document.getElementById("email_err").style.color="red";
          return false;
        }
        if (!email.match(regexEmail)) {
           document.getElementById("email_err").innerHTML ="Please enter valid Email Address!";
           document.getElementById("email_err").style.color="red";
          return false;
        }
        if (Password=="") {
          document.getElementById("password_err").innerHTML ="Please enter your Password!";
          document.getElementById("email_err").style.color="red";
          return false;
        }
        if (Con_password=="") {
          document.getElementById("conpassword_err").innerHTML ="Please enter your Confirm Password!";
          document.getElementById("conpassword_err").style.color="red";
          return false;
        }
        if (Password!=Con_password) {
           document.getElementById("conpassword_err").innerHTML ="Your passwords do not match. Please try again!";
           document.getElementById("conpassword_err").style.color="red";
           return false;
        }
        }
    </script>

 
      <?php
        include "navbar.php";
      ?>

    <div class="container signup-container">
    <div class="row w-50">
    <div class="col-sm-12 d-flex justify-content-center flex-column shadow-lg rounded-2 my-3">
    
      <form method="POST" name="register" class="p-3">
      <h2 class="h4">New User!</h2><hr>
      <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Username</label>
          <input type="text" name="username" id="name" class="form-control" placeholder="Enter your Username" maxlength="30">
          <span id="username_err"><?php  echo $errusername;?></span>
      </div>
          
      <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Address</label>
          <input type="text" name="address" id="address" class="form-control" placeholder="Enter your Address">
          <span id="address_err"><?php echo $erraddress;?></span>
      </div>    
      <div class="mb-3">    
          <label for="exampleFormControlInput1" class="form-label">Mobile number</label>
          <input type="text" name="contact" id="contact"  class="form-control"placeholder="Enter your Mobile number">
          <span id="contact_err"><?php echo $errcontact;?></span>
      </div>
      <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Email Address</label>
          <input type="text" name="email" id="email"class="form-control" placeholder="Enter your Email Address">
          <span id="email_err"><?php echo $erremail;?></span>
      </div>
      <div class="mb-3">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control"id="password" placeholder="Enter your Password">
          <span id="password_err"><?php echo $errpassword;?></span>
      </div>
      <div class="mb-3">
          <label for="con_password">Confirm Password</label>
          <input type="password" name="con_password"class="form-control" id="con_password" placeholder="Re-Enter your Password">
          <span id="conpassword_err"><?php echo $errconpassword;?></span>
      </div>
          <input type="submit" class="buttons mb-3" name="submit" onclick="return userinput()" value="Sign Up" id="submit">&nbsp;&nbsp;&nbsp;
         
          <hr>
          <p class="text-center fw-bold">Already have an account? <a href="customerlogin.php">Log in</a></p>
        
      </form>
      </div>
      </div>
      </div>
      <script src="./bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
