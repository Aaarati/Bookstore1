<link
      rel="stylesheet"
      type="text/css"
      href="./bootstrap/css/bootstrap.min.css"
    />
    <link rel="stylesheet" type="text/css" href="style.css" />
     <?php
     include "navbar.php";
     ?>
  <section main="main_heading my-5" id="about"> 
    <?php
    include('./admin/config.php');
    $query="SELECT * FROM about ORDER BY id desc LIMIT 1 ";
    
    $result=mysqli_query($conn,$query);

    if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_array($result))
    {
    ?>
<div class=" text-center "> 
     <h1 class="display-4 mt-5" >About us</h1>
       <hr class="w-25 mx-auto" />
</div>
<div class="container ">
  <div class="row my-5 ">
    <div class="col-lg-6 col-md-6 col-12 col-xxl-6 ">
       <?php echo '<img src="./admin/uploads/'. $row["file"].'" alt="piano" height="100%" width="90%" >'; ?>

    </div>

 
  <div class="col-lg-6 col-md-6 col-12 col-xxl-6  ">
    <h3>Our Books</h3> 
    <p>
          <?php echo $row["description"]; ?>
    </p>

    <button type="button" class="buttons mb-md-1""data-bs-toggle="tooltip" data-bs-placement="right" title=" Tooltip on right" >Check more</button>
  </div>

  </div>
</div>
<?php 
    }
    }               
    ?>

</section>
<?php
     include "footer.php";
     ?>

<script src="./bootstrap/js/bootstrap.min.js"></script>

