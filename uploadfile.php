<!-- this code is used to uplaod files in database -->

<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
 <div class="container">
<form method="post" enctype="multipart/form-data">
    <label>Title</label>
    <input type="text" name="title" class="form-control">
    <label>File Upload</label>
    <input type="File" name="file"class="form-control w-50"> <br><br>
    <input type="submit" name="submit" class="btn btn-primary w-100">
 
 
</form>
<?php 
include_once("conn3.php");  
 
if (isset($_POST["submit"]))
 {
     #retrieve file title
        $title = $_POST["title"];
    #file name with a random number so that similar dont get replaced
     $pname = rand(1000,10000)."-".$_FILES["file"]["name"];#choose random numbers 
    #temporary file name to store file
    $tname = $_FILES["file"]["tmp_name"];
    $fileext=explode('.',$pname);
    $filechk=strtolower(end($fileext)); #for converting lower element
    $filestored=array('png','jpg','pdf','jpeg');  #you can upload only these files which related to png jpg etc..
    if(in_array($filechk,$filestored)){
     #upload directory path
$uploads_dir = 'images';
    #TO move the uploaded file to specific location
    move_uploaded_file($tname,$uploads_dir.'/'.$pname);
}
    #sql query to insert into database
    $sql = "INSERT into fileup(title,image) VALUES('$title','$pname')";
    if(mysqli_query($mysqli,$sql)){
    echo "File Sucessfully uploaded";
    }
    else{
        echo "Error";
    }
} 
?>

    </div>
    </body>
</html>