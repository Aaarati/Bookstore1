<?php
session_start();
if (!isset($_SESSION['username'])){
  header('location:Adminlogin.php');
  }

$id = $_GET['id'];

include 'config.php';

if(isset($_POST['update'])){
    $bname=$_POST['bookname'];
    $price=$_POST['price'];


     //to store image details

$target_dir="uploads/";
    $a=$_FILES["image"]["name"];
    $target_file=$target_dir.$a;

//store image to the path folder

if(move_uploaded_file($_FILES["image"]["tmp_name"],$target_file)){
    // die ('success');
}

    $sql = "UPDATE books SET book_name='$bname' , price='$price',image='$a' where id = '$id'";
    mysqli_query($conn,$sql);
   
    if (mysqli_affected_rows($conn)==1) {
          // header("location:food.php");
      echo ("<script>
            window.alert('Data Updated successfully');
            window.location.href='book.php';
            </script>");


   }
   else{
    echo "Data update failed".mysqli_error($conn);
   }
}
$sql1 = "select * from books where id = '$id'";
$res = mysqli_query($conn, $sql1);
$data = mysqli_fetch_assoc($res);

 


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
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

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
          <h5 class=" h5 text-capitalize text-white">Welcome
           <?php echo $_SESSION['username'] ?></h5>
          <button class="buttons"><a href="logout.php" class="text-decoration-none text-white">logout</a></button>
        </div>
      </div>
      <div class="row min-vh-100">
        <div class="col-sm-2  px-4 ">
          <nav class="">
            <ul>
              <li><a href="dashboard.php" class="font active">Production House</a></li>
              <li><a href="about.php">About us</a></li>
              <li><a href="contact.php">Contact</a></li>
              <li><a href="book.php">Books</a></li>
              <li><a href="customerregistration.php">Customer registration</a></li>
                <li><a href="orders.php">Orders</a></li>
             
            </ul>
          </nav>
        </div>

      <div class="col-sm-10 p-3">
        
        <p class="text-capitalize h4 ">Update book  details</p><hr>
        <form enctype="multipart/form-data" method="post">

                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label text-capitalize">BOOK Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="bookname" value="<?php echo $data['book_name'];?>">
                  </div>

                  
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label text-capitalize">Price</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" name="price" value="<?php echo $data['price'];?>">
                  </div>
                    

                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label text-capitalize">Image</label>
                    <input type="file" class="form-control" id="exampleFormControlInput1" name="image"><br>
                    <button type="submit" class="btn btn-primary"  name="update">submit</button>
                  </div>
                </form>
</div>
</div>
</div>