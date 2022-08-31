<?php
  session_start();
  

    include './admin/config.php';

    $status=" ";

    if(isset($_POST['code']) && $_POST['code']!==""){
        $code=$_POST['code'];

        $result = mysqli_query(
            $conn,"SELECT * FROM books WHERE `id`='$code'"
            );
            $row = mysqli_fetch_assoc($result);
            $name = $row['book_name'];
            $code = $row['id'];
            $price = $row['price'];
            $image = $row['image'];
            
            $cartArray = array(
                $code=>array(
                'name'=>$name,
                'code'=>$code,
                'price'=>$price,
                'quantity'=>1,
                'image'=>$image)
            );
            
            if(empty($_SESSION["shopping_cart"])) {
                $_SESSION["shopping_cart"] = $cartArray;
                $status = "<div class='alert alert-success' role='alert' >Book added to cart!</div>";
            }
            else{
                $array_keys = array_keys($_SESSION["shopping_cart"]);
                
                if(in_array($code,$array_keys)) {
                   
                $status = "<div class='alert alert-danger fw-bold h5 ' role='alert'>
                Book is already in cart!</div>"; 
                }

                else{
                $_SESSION["shopping_cart"] +=$cartArray; 
                
                $status = "<div  class='alert alert-success ' role='alert'>Book added to cart!</div>";
                }
            
          }
             
     }
    
?>
  
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet" />
    <link
      rel="stylesheet"
      type="text/css"
      href="./bootstrap/css/bootstrap.min.css"
    />
    <link rel="stylesheet" type="text/css" href="style.css" />
  <title>SN Book Store</title>
</head>

  
<body>
  <div class="main-container">
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand h1 fs-4" href="#">SN BOOK STORE</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse navbar-collapse justify-content-between"
          id="navbarSupportedContent"
        >
          <ul
            class="navbar-nav justify-content-center w-100 ml-auto mb-2 mb-lg-0"
          >
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">ABOUT</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="bookcard.php">BOOKS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./index.php#contact">CONTACT US</a>
            </li>
          </ul>
          
              <div class=" d-flex justify-content-center align-items-center  " >
               <div class=" cart me-3">
                  <?php
              if(!empty($_SESSION["shopping_cart"])) {
              $cart_count = count(array_keys($_SESSION["shopping_cart"]));
              ?>
<a href="cart.php" class="Cart text-decoration-none  px-3 text-black" >Cart(<?php echo $cart_count; ?>)</a>

            <?php
            }
            ?>
</div>
            <button class="buttons">
              <a  class="text-decoration-none text-white" href="customerlogin.php">Login</a>
            </button>
          </div>
        </div>
      </div>
    </nav>





    <div class="row mt-4">
      <h2 class="text-center h3 ">Our Book</h2>
    </div>
    
    
    <div class="container " >
      <div class="message_box" style="margin:10px 0px;" onclick="this.remove();">
<?php echo $status; ?>
</div>
      <div class="row">

    <?php
$result = mysqli_query($conn,"SELECT * FROM books");
while($row = mysqli_fetch_assoc($result)){
  echo " 
  
   <div class='col-md-2 col-lg-4 mb-4 '>
 <div class='card '>
  <form method='post' action=''>
  <img class='image card-img-top rest-img' height='250px' width='250px'
   src='./admin/uploads/".$row['image']."' />
  <div class='card-body text-capitalize'>
  <input type='hidden' name='code' value=".$row['id']." />
  <div class='name card-title h4  '>".$row['book_name']."</div>
  
  <div class='price card_price mb-2 fw-bold '>Rs ".$row['price']."</div>
  <button type='submit' class=' buy btn buttons'>Add to cart</button>
  </div>
  </form>
</div>
  </div>";
  } 
mysqli_close($conn);
?>


    </div>
  </div>
</div>
</body>

  <?php include 'footer.php'; ?>
  
</body>

</html>