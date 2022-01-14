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
if (isset($_POST['save'])) { 
    $class = $_POST['class'];
    $date = $_POST['date'];
    $filename = $_FILES['myfile']['name'];
   $destination = 'results/' . $filename;
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];
   if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO results (name, class, date, size, downloads) VALUES ('$filename','$class', '$date', $size, 0)";
            if (mysqli_query($con, $sql)) {
                echo "<script>alert('Results uploaded Succesfully Thank You!!');</script>" ;
                echo "<script type='text/javascript'> document.location ='result_data.php'; </script>";
            }
        } else {
           echo "<script>alert('Failed');</script>" ;
           echo "<script type='text/javascript'> document.location ='result_data.php'; </script>";
        }
    }
}
?>
 <div class="container">
      <div class="row">
        <form action="result_data.php" method="post" enctype="multipart/form-data" >
        
        <div class="input-group">
				<span class="input-group-addon">
							<span class="glyphicon glyphicon-lock"></span>
					</span>
				    
				    <select id="class" class="form-control" name="class" required>
                    <option value="Result for Class*:">Result for Class*:</option> 
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
                <div class="input-group">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-user"></span>
					</span>
					<input required type="date" name="date" class="form-control">
				</div><br>
          <h6>Upload File</h6><br>
          <input class="form-control" type="file" name="myfile"> <br>
          <button  type="submit" class="form-control btn btn-success" name="save">upload</button><br><br>
        </form>
      </div>
    </div>
  

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
