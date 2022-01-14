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
<button class="btn btn-success" onclick="exportTableToExcel('admin_data','admins-data')"><i class="fa fa-download" aria-hidden="true"></i>  Export Admins Data To Excel File</button>
<!-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> -->
<table class="table table-bordered" id="admin_data" width="100%" cellspacing="0">
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
           
				</tr>

				<?php endwhile; ?>
				</thead>
			</table>
			<?php if (ceil($total_pages / $num_results_on_page) > 0): ?>
			<ul class="pagination">
				<?php if ($page > 1): ?>
				<li class="prev"><a href="admin_tables.php?page=<?php echo $page-1 ?>">Prev</a></li>
				<?php endif; ?>

				<?php if ($page > 3): ?>
				<li class="start"><a href="admin_tables.php?page=1">1</a></li>
				<li class="dots">...</li>
				<?php endif; ?>

				<?php if ($page-2 > 0): ?><li class="page"><a href="admin_tables.php?page=<?php echo $page-2 ?>"><?php echo $page-2 ?></a></li><?php endif; ?>
				<?php if ($page-1 > 0): ?><li class="page"><a href="admin_tables.php?page=<?php echo $page-1 ?>"><?php echo $page-1 ?></a></li><?php endif; ?>

				<li class="currentpage"><a href="admin_tables.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>

				<?php if ($page+1 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="admin_tables.php?page=<?php echo $page+1 ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
				<?php if ($page+2 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="admin_tables.php?page=<?php echo $page+2 ?>"><?php echo $page+2 ?></a></li><?php endif; ?>

				<?php if ($page < ceil($total_pages / $num_results_on_page)-2): ?>
				<li class="dots">...</li>
				<li class="end"><a href="admin_tables.php?page=<?php echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
				<?php endif; ?>

				<?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
				<li class="next"><a href="admin_tables.php?page=<?php echo $page+1 ?>">Next</a></li>
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
<script type="text/javascript">
  function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
  }
    </script>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>