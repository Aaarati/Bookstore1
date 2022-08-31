<!DOCTYPE html>
<html>
  <head>
    <title>Book Store Management system</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width-device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      type="text/css"
      href="./bootstrap/css/bootstrap.min.css"
    />
    <link rel="stylesheet" type="text/css" href="style.css" />
  
  </head>
  <body>

<!--navbar-->
  <?php 
  include 'navbar.php';
  ?>

<!-- slider -->
  <?php
    include 'slider.php';
  ?>
<!--aboutus-->

<!-- contact -->
  <?php 
    include 'contact.php';
  ?>
    <!-- footer part --> 
  <?php 
    include 'footer.php';
  ?>


    <!--Footer part end-->
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      var tooltipTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="tooltip"]')
      );
      var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
      });
    </script>
  </body>
</html>


























