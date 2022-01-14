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
include('includes/config.php');
// $connection = mysqli_connect("localhost","root","","school");
if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];
    $query = "DELETE FROM new_admission WHERE id='$id'";
    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
    $_SESSION['success'] =  "your data is deleteed Successfully";
   // header('Location: adminprofile_data.php');
    }
    else
    {
    $_SESSION['status'] =  "your data is not deleteed place try agen";
    header('Location: exp.php');
    }


}

?>
<div class="main-content">
     
	 <div class="container-fluid">
	 <div class="table-responsive">
<?php
// Below is optional, remove if you have already connected to your database.

// Get the total number of records from our table "new_admission".
$total_pages = $con->query('SELECT * FROM new_admission')->num_rows;

// Check if the page number is specified and check if it's a number, if not return the default page number which is 1.
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

// Number of results to show on each page.
$num_results_on_page = 5;

if ($stmt = $con->prepare('SELECT * FROM new_admission ORDER BY name LIMIT ?,?')) {
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
            <th>Adhaarnumber</th>
            <th>Class</th>
            <th> Date of Birth </th>
            <th> Gender </th>
            <th> Phone </th>
            <th> Image </th>
            <th>Category</th>  
            <th> Mother's name </th>
            <th> Father's name </th>
            <th> Gargens name </th>
            <th> Gargens Occupation </th>
            <th> Gargens Phone </th>
            <th> Gargens Address </th>
            <th> Famally Income Per Year </th>
            <th> City </th>
            <th> State name </th>
            <th> Country name </th>           
            <th> Address </th>
			<th> Pin Code </th>
			<th> Delete </th>
				</tr>
				<?php while ($row = $result->fetch_assoc()): ?>
				<tr>
					<td><?php echo $row['id']; ?> </td>
            <td> <?php echo $row['name']; ?> </td>
            <td> <?php echo $row['email']; ?> </td>
            <td> <?php echo $row['adhaarnumber']; ?> </td>
            <td> <?php echo $row['class']; ?> </td>
            <td> <?php echo $row['dob']; ?> </td>
            <td> <?php echo $row['gender']; ?> </td>
            <td> <?php echo $row['phone']; ?> </td>
            <td> <?php echo $row['image']; ?> </td>
            <td> <?php echo $row['category']; ?> </td>
            <td> <?php echo $row['mothername']; ?> </td>
            <td> <?php echo $row['fathername']; ?> </td>
            <td> <?php echo $row['gargensname']; ?> </td>
            <td> <?php echo $row['gargensoccupation']; ?> </td>
            <td> <?php echo $row['gargensphone']; ?> </td>
            <td> <?php echo $row['gargensaddress']; ?> </td>
            <td> <?php echo $row['famallyincome']; ?> </td>
            <td> <?php echo $row['city']; ?> </td>
            <td> <?php echo $row['state']; ?> </td>
            <td> <?php echo $row['country']; ?> </td>
            <td> <?php echo $row['address']; ?> </td>
			<td> <?php echo $row['pincode']; ?> </td>
			<td>
                <form action="exp.php" method="post">
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
				<li class="prev"><a href="exp.php?page=<?php echo $page-1 ?>">Prev</a></li>
				<?php endif; ?>

				<?php if ($page > 3): ?>
				<li class="start"><a href="exp.php?page=1">1</a></li>
				<li class="dots">...</li>
				<?php endif; ?>

				<?php if ($page-2 > 0): ?><li class="page"><a href="exp.php?page=<?php echo $page-2 ?>"><?php echo $page-2 ?></a></li><?php endif; ?>
				<?php if ($page-1 > 0): ?><li class="page"><a href="exp.php?page=<?php echo $page-1 ?>"><?php echo $page-1 ?></a></li><?php endif; ?>

				<li class="currentpage"><a href="exp.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>

				<?php if ($page+1 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="exp.php?page=<?php echo $page+1 ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
				<?php if ($page+2 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="exp.php?page=<?php echo $page+2 ?>"><?php echo $page+2 ?></a></li><?php endif; ?>

				<?php if ($page < ceil($total_pages / $num_results_on_page)-2): ?>
				<li class="dots">...</li>
				<li class="end"><a href="exp.php?page=<?php echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
				<?php endif; ?>

				<?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
				<li class="next"><a href="exp.php?page=<?php echo $page+1 ?>">Next</a></li>
				<?php endif; ?>
			</ul>
			<?php endif; ?>
		</body>
	</html>
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