<?php
                  include_once  ('config.php');
                  $id=$_REQUEST['id'];
                  $sql="SELECT * FROM about where id='$id'";
                  $result=mysqli_query($conn,$sql);
                        if($result)
                        {
                            $row=mysqli_fetch_assoc($result);

                        }
                        ?>
                        <?php
                        if(isset($_POST['new']))
                        {
                        $id=$_REQUEST['id'];
                        $image=$_FILES["file"]["name"];
                        
                        $description=$_REQUEST['description'];
                        
                        $update="UPDATE about set file='$image' ,description='$description' where id='$id' ";
                        $result=mysqli_query($conn,$update);
                        if($result){
                        header("Location: about.php");//redirect to view.php after successfully updated record
                          }
                        else{
                            echo"Record not Updated".mysqli_error($conn);
                          }
                          }else{
                        ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../styles.css" rel="stylesheet">

</head>
<body>

        



    <form class="" name="form" action="" method="POST" enctype="multipart/form-data">
    <div class="adjust">
    <div class="wrapper">
    <div class="title">
        Edit About 
    </div>
    <div class="form">
          <input type="hidden" name="new" value="1"/>
          <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
      
      <div class="inputfield">
            <label>Image</label>
            <input type="file" class="input" name="file" value="<?php echo $row['file'];?>" required>
        </div> 




        
      <div >
        <label  >Description:</label>
        <textarea name="description" id="" cols="30" rows="10"><?php echo $row['description'];?></textarea>
      </div>
      
      
      <div class="inputfield">
        <input type="submit" value="Submit"  name="submit" class="btn">
        </div>
        </div>
</div>
    </form>
    
  
    <?php } ?>
    </body>
    </html>