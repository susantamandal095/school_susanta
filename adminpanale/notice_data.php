<?php
session_start();
if(!isset($_SESSION['email']))
{
  header("Location:adminlogin.php");
  include('includes/config.php');
}
?> 
<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>



<?php
// connect to the database

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $noticebody = $_POST['noticebody'];
    $date = $_POST['date'];
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'notice/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO notices (name, noticebody, date, size, downloads) VALUES ('$filename','$noticebody', '$date', $size, 0)";
            if (mysqli_query($con, $sql)) {
               // echo "File uploaded successfully";
                echo "<script>alert('Notice uploaded Succesfully Thank You!!');</script>" ;
            echo "<script type='text/javascript'> document.location ='notice_data.php'; </script>";
            }
        } else {
           // echo "Failed to upload file.";
           echo "<script>alert('Failed');</script>" ;
		echo "<script type='text/javascript'> document.location ='notice_data.php'; </script>";
        }
    }
}
?>

    <div class="container">
      <div class="row">
        <form action="notice_data.php" method="post" enctype="multipart/form-data" >
        
				<div class="input-group">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-user"></span>
					</span>
					<input required type="text" name="noticebody" class="form-control" placeholder="Enter Notice Body">
				</div>
                <br>
                <div class="input-group">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-user"></span>
					</span>
					<input required type="date" name="date" class="form-control">
				</div>
                <br>
          <h3>Upload File</h3>
          <input class="form-control" type="file" name="myfile"> <br><br>
          <button type="submit" name="save" class="form-control btn btn-success">upload</button>
        </form>
      </div>
    </div>
  

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>