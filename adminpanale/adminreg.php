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
?>

<?php 
if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];
    $query = "DELETE FROM admins WHERE id='$id'";
    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
    // $_SESSION['success'] =  "your data is deleteed Successfully";
    // header('Location: adminreg.php');
	echo "<script>alert('your data is deleteed Successfully.');</script>" ;
	echo "<script type='text/javascript'> document.location ='adminreg.php'; </script>";
    }
    else
    {
    // $_SESSION['status'] =  "your data is not deleteed place try agen";
    // header('Location: adminreg.php');
	echo "<script>alert('your data is not deleteed place try agen.');</script>" ;
	echo "<script type='text/javascript'> document.location ='adminreg.php'; </script>";
    }


}
	
	$information = '';
	if(isset($_POST['Registration'])){
	

	$name = $_POST['name'];
	$flatno = $_POST["flatno"];
	$gender = $_POST["gender"];
	$email = $_POST['email'];
	$phone = $_POST["phone"];
	$password = $_POST['password'];
	$age = $_POST['age'];
	$address = $_POST['address'];
	$img = $_FILES['image']['name'];
	$tmp = $_FILES['image']['tmp_name'];
	$select = "SELECT * FROM admins WHERE email='$email'";
	$query = mysqli_query($con,$select);
	$count = mysqli_num_rows($query);
	if($count == 0){
		$q = "INSERT INTO admins(id,name,password,age,email,phone,flatno,gender,image,address) VALUES ('','$name','$password','$age','$email','$phone','$flatno','$gender','$img','$address')";
		$run = mysqli_query($con,$q);
		if($run){
			move_uploaded_file($tmp, "img/".$img);
			$information = '';
			echo "<script>alert('Admin added Succesfully Thank You!!');</script>" ;
            echo "<script type='text/javascript'> document.location ='adminreg.php'; </script>";
		}else{
			
			echo "<script>alert('Failed');</script>" ;
		echo "<script type='text/javascript'> document.location ='adminreg.php'; </script>";
		}
	}else{
		echo "<script>alert('Admin already availabel! Thank you!!');</script>" ;
		echo "<script type='text/javascript'> document.location ='adminreg.php'; </script>";
	}
	

	}
	?>
	
		<div class="form-container">
			<form method="POST" enctype="multipart/form-data">
				<div class="input-group">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-user"></span>
					</span>
					<input required type="text" name="name" class="form-control" placeholder="name">
				</div>

				<div class="input-group">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-user"></span>
					</span>
					<input required type="text" name="flatno" class="form-control" placeholder="flatno">
				</div>

				<div class="input-group">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-user"></span>
					</span>
					<input required type="text" name="email" class="form-control" placeholder="email">
				</div>

				<div class="input-group">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-user"></span>
					</span>
					<input required type="text" name="phone" class="form-control" placeholder="phone">
				</div>








				<div class="input-group">
					<span class="input-group-addon">
							<span class="glyphicon glyphicon-lock"></span>
					</span>
					<input required type="password" name="password" class="form-control" placeholder="Password">
				</div>
	

				<div class="input-group">
					<span class="input-group-addon">
							<span class="glyphicon glyphicon-time"></span>
					</span>
					<input required type="text" name="age" class="form-control" placeholder="Age">
				</div>
				<div class="input-group">
					<span class="input-group-addon">
							<span class="glyphicon glyphicon-time"></span>
					</span>
					<input required type="text" name="gender" class="form-control" placeholder="Male/Female">
				</div>
	

				<div class="form-group">
					<input type="file" name="image" required>
				</div>	
	

				<div class="form-group">
				<textarea required placeholder="Address" name='address' class="form-control" rows="3"></textarea>
				</div>
	             <p><?php echo $information; ?></p>
				
				<button type="submit" name="Registration" class="btn btn-success">Register</button>
			</form>
		</div>
		<div class="table-responsive">


		<div class="main-content">
     
	 <div class="container-fluid">
	 <div class="table-responsive">
<?php
// Below is optional, remove if you have already connected to your database.


// Get the total number of records from our table "admins".
$total_pages = $con->query('SELECT * FROM admins')->num_rows;

// Check if the page number is specified and check if it's a number, if not return the default page number which is 1.
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

// Number of results to show on each page.
$num_results_on_page = 5;

if ($stmt = $con->prepare('SELECT * FROM admins ORDER BY name LIMIT ?,?')) {
	// Calculate the page to get the results we need from our table.
	$calc_page = ($page - 1) * $num_results_on_page;
	$stmt->bind_param('ii', $calc_page, $num_results_on_page);
	$stmt->execute(); 
	// Get the results...
	$result = $stmt->get_result();
	?>

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
				<tr>
                <th> ID </th>
            <th> name </th>
            <th>Email </th>
            <th>Password</th>
            <th> Flatno </th>
            <th> Age </th>
            <th> Gender </th>
            <th> Phone </th>
            <th> Image </th>
            <th> Address </th>
            <th>EDIT</th>
            <th>DELETE</th>
				</tr>
				<?php while ($row = $result->fetch_assoc()): ?>
				<tr>
				<td> <?php echo $row['id']; ?> </td>
            <td> <?php echo $row['name']; ?> </td>
            <td> <?php echo $row['email']; ?> </td>
            <td> <?php echo $row['password']; ?> </td>
            <td> <?php echo $row['flatno']; ?> </td>
            <td> <?php echo $row['age']; ?> </td>
            <td> <?php echo $row['gender']; ?> </td>
            <td> <?php echo $row['phone']; ?> </td>
            <td> <?php echo $row['image']; ?> </td>
            <td> <?php echo $row['address']; ?> </td>
            <td>
                <form action="adminprofile_data.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?> ">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $row['id'];?>">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
				</tr>

				<?php endwhile; ?>
				</thead>
			</table>
			<?php if (ceil($total_pages / $num_results_on_page) > 0): ?>
			<ul class="pagination">
				<?php if ($page > 1): ?>
				<li class="prev"><a href="adminreg.php?page=<?php echo $page-1 ?>">Prev</a></li>
				<?php endif; ?>

				<?php if ($page > 3): ?>
				<li class="start"><a href="adminreg.php?page=1">1</a></li>
				<li class="dots">...</li>
				<?php endif; ?>

				<?php if ($page-2 > 0): ?><li class="page"><a href="adminreg.php?page=<?php echo $page-2 ?>"><?php echo $page-2 ?></a></li><?php endif; ?>
				<?php if ($page-1 > 0): ?><li class="page"><a href="adminreg.php?page=<?php echo $page-1 ?>"><?php echo $page-1 ?></a></li><?php endif; ?>

				<li class="currentpage"><a href="adminreg.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>

				<?php if ($page+1 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="adminreg.php?page=<?php echo $page+1 ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
				<?php if ($page+2 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="adminreg.php?page=<?php echo $page+2 ?>"><?php echo $page+2 ?></a></li><?php endif; ?>

				<?php if ($page < ceil($total_pages / $num_results_on_page)-2): ?>
				<li class="dots">...</li>
				<li class="end"><a href="adminreg.php?page=<?php echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
				<?php endif; ?>

				<?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
				<li class="next"><a href="adminreg.php?page=<?php echo $page+1 ?>">Next</a></li>
				<?php endif; ?>
			</ul>
			<?php endif; ?>
		
	<?php
	$stmt->close();
}
?>
 </div>
  </div>
</div>














	<?php
include('includes/scripts.php');
include('includes/footer.php');
?>