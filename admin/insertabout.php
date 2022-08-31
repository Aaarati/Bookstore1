<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:Adminlogin.php');
}
?>
<?php
include_once('config.php');
if(isset($_POST['submit']))
{
    $file=$_FILES["file"]["name"];
    $temp_name=$_FILES["file"]["tmp_name"];
    $path="uploads/".$file;

    move_uploaded_file($temp_name,$path);

$description=$_POST['description'];



$sql="INSERT into about(file,description) values('$file','$description')";
$result=mysqli_query($conn,$sql);
if($result)
{
    // echo"Data inserted";
    header("Location: about.php");
}
else{
    echo"Data not inserted".mysqli_error($conn);
}

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Articles</title>
    <!-- <link href="../styles.css" rel="stylesheet"> -->


</head>
<body>
    



  <div >

    

    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
<div class="adjust">
<div class="wrapper">
    <div class="title">
        About 
    </div>
    <div class="form">
        <div class="inputfield">
            <label>Image</label>
            <input type="file" class="input" name="file" required>
        </div>  
        
        <div class="inputfield">
            <label>Description</label>
            <textarea type="text" class="input" name="description"> </textarea>
        </div>  

        
        <div class="inputfield">
        <input type="submit" value="Submit"  name="submit" class="btn">
        </div>
    </div>
</div>
</div>

</form>



    
</div>
</body>
</html>



