<?php
session_start();


$status="";
if (isset($_POST['action']) && $_POST['action']=='remove'){
if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
      if($_POST["code"] == $value["code"]){
      unset($_SESSION["shopping_cart"][$key]);
      $status = "<div class= 'box alert alert-success' role='alert'>
      Book removed from cart!</div>";
      }

      
    
      if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
      }   
    
}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    
    } 
  
}


}


?>
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



<div class="container mt-4">
  <h5 class="h4 text-center ">Shopping cart</h5>
  <div class="message_box" style="margin:10px 0px;" onclick="this.remove();">
<?php echo $status; ?>
</div>
  <?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>  
  <div class="row mt-3">
  <table class="table table-success ">
    <thead class="table buttons ">
      <th>Image</th>
      <th>Name</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Subtotal</th>
      <th>Action</th>
    </thead>
  
    <tbody>
         <?php      
foreach ($_SESSION["shopping_cart"] as $product){
?>
            <tr>
            <td><img src='./admin/uploads/<?php echo $product["image"]; ?>' width="150px" height="150px" /></td>
            <td><?php echo $product["name"];?></td>
            <td><?php echo "Rs"." ".$product["price"]; ?></td>
            <td>
            <form method='post' action=''>
                <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                <input type='hidden' name='action' value="change" />
                <input type="number" id="number" min="1" name='quantity' class="quantity" onchange="this.form.submit()" 
                value="<?php echo $product["quantity"];?>">

                </form>
       
            </td>
            <td>
            <?php echo "Rs"." ".$product["price"]*$product["quantity"];?> 
           </td>
            <td>
            <form method='post' action=''>
            <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                <input type='hidden' name='action' value="remove" />
                <button type='submit' class='remove btn btn-danger'>
                     <svg xmlns="http://www.w3.org/2000/svg" height="20px"fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>Delete From Cart</button>
                </form>
                </td>
            </tr>
            <tr>
            <?php
            $total_price += ($product["price"]*$product["quantity"]);
            }
            ?>
         <td colspan="4" class="total"><strong>Total amount </strong> </td>
         <td><?php echo "<strong>Rs"." " .$total_price."</strong>"; ?></td>
         <td> <button class="btn buttons "> <a  class="text-decoration-none text-white" href="checkout.php">Proceed to checkout</a></button></td>
        </tr>
        

    </tbody>

        <tfoot>
           <?php
        }else{
          echo "<h3>Your cart is empty!</h3>";
          }
        ?>
              
        </tfoot>
           
    </table>

    </div>
      </div>
   
  
</div>
</body>

<?php include 'footer.php'; ?>
  
<script>
    // disable negative values
var number = document.getElementById('number');

// Listen for input event on numInput.
number.onkeydown = function(e) {
    if(!((e.keyCode > 95 && e.keyCode < 106)
      || (e.keyCode > 47 && e.keyCode < 58) 
      || e.keyCode == 8)) {
        return false;
    }
}
</script>