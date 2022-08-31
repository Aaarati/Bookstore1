<?php
session_start();
include('./admin/config.php');
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query(
$conn,
"SELECT * FROM productionhouse WHERE `productionhouseID`='$code'"
);
$row = mysqli_fetch_assoc($result);
$name = $row['book_name'];
$code = $row['productionhouseID'];
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
    $status = "<div class='box'>Product is added to your cart!</div>";
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($code,$array_keys)) {
	$status = "<div class='box' style='color:red;'>
	Product is already added to your cart!</div>";	
    } else {
    $_SESSION["shopping_cart"] = array_merge(
    $_SESSION["shopping_cart"],
    $cartArray
    );
    $status = "<div class='box'>Product is added to your cart!</div>";
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
     <?php
     include "navbar.php";
     ?>
<style>

    img{
        height:100px;
        width:100px;
    }
</style>

<body>
<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="cart.php">Cart<span>
<?php echo $cart_count; ?></span></a>
</div>
<?php
}
?>

<?php
$result = mysqli_query($conn,"SELECT * FROM productionhouse");
while($row = mysqli_fetch_assoc($result)){
    echo "<div class='product_wrapper'>
    <form method='post' action=''>
    <input type='hidden' name='code' value=".$row['productionhouseID']." />
    <div class='image'><img src='./image/".$row['image']."' /></div>
    <div class='name'>".$row['book_name']."</div>
    <div class='price'>$".$row['price']."</div>
    <button type='submit' class='buy'>Add to cart</button>
    </form>
    </div>";
        }
mysqli_close($conn);
?>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
</body>

<?php
     include "footer.php";
     
     ?>
<script src="./bootstrap/js/bootstrap.min.js"></script>


