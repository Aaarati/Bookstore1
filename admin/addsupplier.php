 <?php 
$conn = mysqli_connect('localhost','root','','bookstore');
  if (isset($_POST['submit'])) {
    $book_name = $_POST['book_name'];
    $address = $_POST['address'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $image="";
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      die("Insert fail");
    }
    else{
      $image = $_FILES['image']['name'];
    }
    $sql = "INSERT INTO productionhouse(book_name,email,address,phone,image)
       VALUES ('$book_name','$email','$address','$contact','$image')";
    mysqli_query($conn, $sql);
    
    if (mysqli_affected_rows($conn) == 1) {
      echo ("<script>
            window.alert(' Supplier added successfully');
            window.location.href='dashboard.php';
            </script>");
   }
   else{
    echo "Data insertion failed".mysqli_error($conn);
   }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>dashboard</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
 <!--<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css" />-->

     <link 
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
     /> 

     
  <style>
    body {
        padding: 0px;
        margin: 0;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
    
    table {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        border-collapse: collapse;
        width: 800px;
        height: 200px;
        border: 1px solid #bdc3c7;
        box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
    }
    
    tr {
        transition: all .2s ease-in;
        cursor: pointer;
    }
    
    th,
    td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    
    #header {
        background-color: #08746e;
      /*  background-color: #08746e;*/
        color: #fff;
    }
    
    h1 {
        font-weight: 600;
        text-align: center;
        background-color:#004643;
        color: #fff;
        padding: 10px 0px;
    }
    
    
    
    @media only screen and (max-width: 768px) {
        table {
            width: 90%;
        }
    }
</style>
  </head>
  <body>
    <div class="container-fluid dashboard font">
      <div class="row px-3 py-4  font d-flex align-items-center heading-color">
        <div class="col-sm-6">
          <h5 class="text-white text-uppercase ">sn bookstore</h4>
        </div>
        <div
          class="col-sm-6 d-flex justify-content-end align-items-center gap-5"
        >
          <h5 class=" h5 text-capitalize text-white">Welcome user</h5>
          <button class="buttons"><a href="Adminlogin.php" class="text-decoration-none text-white">logout</a></button>
        </div>
      </div>
      <div class="row min-vh-100">
        <div class="col-sm-2  px-4 ">
          <nav class="">
            <ul>
              <li><a href="dashboard.php">Production House</a></li>
              <li><a href="about.php">About us</a></li>
              <li><a href="contact.php">Contact</a></li>
              <li><a href="book.php" class="active">Books</a></li>
              <li><a href="customerregistration.php">Customer registration</a></li>
                <li><a href="orders.php" >Orders</a></li>
            
            </ul>
          </nav>
        </div>
        <div class="col-sm-10 p-3">

         <h1>Add Supplier</h1>
<hr>
 <div class="col-md-10 ">
          <form class="row py-3 " method="post" enctype="multipart/form-data">
          <div class="col-md-12">
            <input type="text" name="book_name" class="form-control" required
            placeholder="Production house Name"><br>
          </div>
          <div class="col-md-12">
            <input type="text" name="address" placeholder="Address" class="form-control" required><br>
          </div>
          <div class="col-md-12">
            <input type="text" name="email" placeholder="Email Address" class="form-control"required><br>
          </div>
          <div class="col-md-12">
            <input type="text" name="contact" placeholder="Contact Number" maxlength="10" class="form-control" required><br>
          </div>
          <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupFile01">Thumbnail</label>
            <input type="file" name="image" class="form-control" id="inputGroupFile01" required>
          </div>
          <div class="col-md-12 mt-3 ">
            <button class="buttons mb-3"" type="submit" name="submit" >Add Supplier</button>

          </div>
          </form>
        </div>

        </div>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
      integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
      integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
      crossorigin="anonymous"
    ></script>
  </body>
</html>








