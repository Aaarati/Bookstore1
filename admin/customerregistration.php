
<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:Adminlogin.php');
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
 <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" />

  </head>

  <style>
   
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
      
</style>
  <body>
    <div class="container-fluid dashboard font">
      <div class="row px-3 py-4  font d-flex align-items-center heading-color">
        <div class="col-sm-6">
          <h5 class="text-white text-uppercase ">sn bookstore</h4>
        </div>
        <div
          class="col-sm-6 d-flex justify-content-end align-items-center gap-5"
        >
          <h5 class=" h5 text-capitalize text-white">Welcome Admin</h5>
          <button class="buttons"><a href="login.php" class="text-decoration-none text-white">logout</a></button>
        </div>
      </div>
      <div class="row min-vh-100">
        <div class="col-sm-2  px-4 ">
          <nav class="">
            <ul>
              <li><a href="dashboard.php" >Production House</a></li>
              <li><a href="about.php">About us</a></li>
              <li><a href="contact.php">Contact</a></li>
              <li><a href="book.php">Books</a></li>
              <li><a href="customerregistration.php" class="active">Customer registration</a>
              <li><a href="orders.php">Orders</a></li>
              
              </li>
            </ul>
          </nav>
        </div>
        <div class="col-sm-10 p-3">
<div class ="row  p-3">      
    <h1>Customer Registered</h1>
    <hr>

    <table class="table">
        <tr id="header">
            <th scope="col">Username</th>
            <th scope="col">Password</th>
            <th scope="col"> email</th>
            <th scope="col">Address</th>
            <th scope="col">Contact</th>
           <th scope="col">Registerdate</th>
            <th scope="col">Action</th>
            
        </tr>
        <tr>
        <?php
                  include_once("config.php");
                  // create a query
               
                  $sql="SELECT * FROM customers ORDER BY customerID asc";
                  //execute query
                  $result=mysqli_query($conn,$sql);
                  if($result){                 
                  while($row=mysqli_fetch_assoc($result)){?>
                  <tr>
            <td><?php echo $row['username']; ?> </td>
            <td><?php echo $row['password']; ?> </td>
            <td><?php echo $row['email']; ?> </td>
            <td><?php echo $row['address']; ?> </td>
            <td><?php echo $row['contact']; ?> </td>
            <td><?php echo $row['reg_date']; ?> </td>
             
            <td  class=" ">
              
              <a class ="text-decoration-none btn btn-danger text-white" href="deletecustomerregistration.php?id=<?php echo $row["customerID"]; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" height="25px"fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />Delete
                </svg>
             </a>
            </td>

            

        </tr>
        <?php
                    }
                  }
                  ?>
                  </tr>
        
    
        

    </table>
  
        <!-- <p class="text-capitalize">welcome to customer page</p> -->
        </div>
      </div>
    </div>


      <script src="../bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
