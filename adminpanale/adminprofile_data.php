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
<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">EDIT Admin Profile    </h6>       
  
  </div>

  <div class="card-body">

  <?php
if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $name =$_POST['edit_name'];
    $email =$_POST['edit_email'];
    $password =$_POST['edit_password'];
    $query = "UPDATE admins SET name='$name', email='$email', password='$password' WHERE id='$id'";
    $query_run = mysqli_query($con, $query);
     if($query_run)
    {
   // $_SESSION['success'] =  "your data is updateed Successfully";
   // header('Location: adminprofile_data.php');
   echo "<script>alert('your data is updateed Successfully.');</script>" ;
 echo "<script type='text/javascript'> document.location ='adminreg.php'; </script>";
    }
    else
    {
    // $_SESSION['status'] =  "your data is not updateed place try agen";
    // header('Location: adminprofile_data.php');
    echo "<script>alert('your data is not updateed place try agen.');</script>" ;
 echo "<script type='text/javascript'> document.location ='adminreg.php'; </script>";
    }

}
if(isset($_POST['edit_btn']))
{

    $id = $_POST['edit_id'];
    
    $query = "SELECT * FROM admins WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    foreach($query_run as $row)
    {
      ?>

   <form  method="POST" enctype="multipart/form-data">
       <input type="hidden" name="edit_id" value ="<?php echo $row ['id']?>">
         <div class="form-group">
                <label> name </label>
                <input type="text" name="edit_name" value ="<?php echo $row ['name']?>" class="form-control" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="edit_email" value ="<?php echo $row ['email']?>" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="edit_password" value ="<?php echo $row ['password']?>" class="form-control" placeholder="Enter Password">
            </div>
       <a href="adminreg.php" class="btn btn-danger">CANCEL</a>
      <button type="submit" name = "updatebtn" class="btn btn-primary"> UPDATE </button> 
   </from>
 <?php
            }
        }
?>
      </div>
  </div>
</div>

</div>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>