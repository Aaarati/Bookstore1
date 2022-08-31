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
 <!--<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css" />-->

     <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" />

  </head>

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
    
    th,td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    
    #header{
        background-color: #08746e;
        color: #fff;
    }
    
    h1 {
        font-weight: 600;
        text-align: center;
        background-color:  #004643;
        color: #fff;
        padding: 10px 0px;
    }
    
    tr:hover {
        background-color: #c7efcf;
        transform: scale(1.02);
        box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
    }
    
    @media only screen and (max-width: 768px) {
        table {
            width: 90%;
        }
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
          <h5 class=" h5 text-capitalize text-white">Welcome <?php echo $_SESSION['username'] ?></h5>
          <button class="buttons"><a href="login.php" class="text-decoration-none text-white">logout</a></button>
        </div>
      </div>
      <div class="row min-vh-100">
        <div class="col-sm-2  px-4 ">
          <nav class="">
            <ul>
              <li><a href="dashboard.php" >Production House</a></li>
              <li><a href="about.php">About us</a></li>
              <li><a href="contact.php" class="active" >Contact</a></li>
              <li><a href="book.php">Books</a></li>
              <li><a href="customerregistration.php">Customer registration</a></li>
              <li><a href="orders.php">Orders</a></li>
            
            </ul>
          </nav>
        </div>
        <div class="col-sm-10 p-3">
          <h1>Contact</h1>
    <hr>

    <table>
        <tr id="header">
            <th>Full name</th>
            <th>Email </th>
            <th>Message</th>
            <th>Action</th>
            
        </tr>
        <tr>
        <?php
                  include_once("config.php");
                  // create a query
                  //$sql="SELECT first,last,email,course,level,status FROM record";
                  $sql="SELECT * FROM contact ORDER BY id desc";
                  //execute query
                  $result=mysqli_query($conn,$sql);
                  if($result){                 
                  while($row=mysqli_fetch_assoc($result)){?>
                  <tr>
            <td><?php echo $row['name']; ?> </td>
            <td><?php echo $row['email']; ?> </td>
            <td><?php echo $row['message']; ?> </td>
            <td  class=" ">

             

              <a class="text-decoration-none btn btn-danger text-white" href="deletecontact.php?id=<?php echo $row["id"]; ?>">
                     <svg xmlns="http://www.w3.org/2000/svg" height="25px"fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                   </svg>Delete
                 </a></td>

            

        </tr>
        <?php
                    }
                  }
                  ?>
                  </tr>
        
    
        

    </table>

        </div>
      </div>
    </div>
     <script src="../bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
