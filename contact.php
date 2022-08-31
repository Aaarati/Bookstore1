
  <link
      rel="stylesheet"
      type="text/css"
      href="./bootstrap/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="style.css">
<?php
include_once("admin/config.php");
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
   
        $sql = "INSERT INTO  contact(name,email,message) Values('$name','$email','$message')";
    $result= mysqli_query($conn,$sql);
    if($result){
        header("Location: index.php");
    }   
}
?>

 <section id="contact">
      <div class="container w-100">
        <div class="text-center">
          <h1 class="display-4 mt-5">Contact us</h1>
          <hr class="w-25 mx-auto" />
        </div>

 <div class="contact">
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method= "POST">
     <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label"
                    >Full Name</label
                  >
                <input type="text"
                name="name"
                 class="form-control"
                  placeholder="john doe" required />
        </div>
        <div class="mb-3">
                 <label for="exampleFormControlInput1" class="form-label" 
                  >Email
                </label>
                <input
                  type="email"
                  name="email"
                  class="form-control"
                  id="exampleFormControlInput1"
                  placeholder="name@example.com"
                  required
                />
        </div>
        <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label"
                  >Message</label
                >
              <textarea
              name="message"
                class="form-control"
                id="exampleFormControlTextarea1"
                rows="3"
              ></textarea>
        </div>

              <input
                type="submit"
                name="submit"
                class="buttons mb-5"
                value="submit"
              />
  
      
  </form>
  </div>
</div>
    </section>