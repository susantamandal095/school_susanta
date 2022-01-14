<?php
session_start();
if(!isset($_SESSION['email']))
{
  header("Location:adminlogin.php");
}
?> 

<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/config.php'); 
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $class = $_POST['class'];
    $link = $_POST['link'];
    $date = $_POST['date'];
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'digital/' . $filename;

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
            $sql = "INSERT INTO digital (name, class,link, date, size, downloads) VALUES ('$filename','$class','$link','$date', $size, 0)";
            if (mysqli_query($con, $sql)) {
               // echo "File uploaded successfully";
               echo "<script>alert('Links uploaded Succesfully Thank You!!');</script>" ;
               echo "<script type='text/javascript'> document.location ='digital_lib.php'; </script>";
            }
        } else {
           // echo "Failed to upload file.";
           echo "<script>alert('Failed');</script>" ;
           echo "<script type='text/javascript'> document.location ='digital_lib.php'; </script>";
        }
    }
}
?>
    <div class="container">
      <div class="row">
        <form action="digital_lib.php" method="post" enctype="multipart/form-data" >
        <label for="class">Digital Lib For Class*: </label>
        <div class="input-group">
				<span class="input-group-addon">
							<span class="glyphicon glyphicon-lock"></span>
					</span>
				    <!-- <label for="class">Digital Lib For Class*: </label> -->
				    <select id="class" class="form-control" name="class" required>
				    	<option value="V">V</option>  
				    	<option value="VI">VI</option>
		                <option value="VII">VII</option>
		                <option value="VIII">VIII</option>
						<option value="IX">IX</option>
						<option value="X">X</option>
						<option value="XI">XI</option>
						<option value="XII">XII</option>
		            </select>
			    </div><br>

          <label for="class">Enter Date*: </label>
                <div class="input-group">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-user"></span>
					</span>
					<input required type="date" name="date" class="form-control">
				</div>
        <br>

        <label for="class">Enter link*: </label>
                <div class="input-group">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-user"></span>
					</span>
					<input required type="text" name="link" class="form-control" placeholder="Enter link">
				</div>
        <br>

          <h6>Upload File</h6>
          <input class="form-control" type="file" name="myfile">
          
           <br>
          <button type="submit" class="form-control btn btn-success" name="save">upload</button>
        </form>
      </div>
    </div>
  

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
