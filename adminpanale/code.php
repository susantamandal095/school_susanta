<!-- <?php
session_start();

include('includes/config.php');


           
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
    $_SESSION['success'] =  "your data is updateed Successfully";
    header('Location: adminreg.php');
    }
    else
    {
    $_SESSION['status'] =  "your data is not updateed place try agen";
    header('Location: adminreg.php');
    }

}


if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];
    $query = "DELETE FROM admins WHERE id='$id'";
    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
    $_SESSION['success'] =  "your data is deleteed Successfully";
    header('Location: adminreg.php');
    }
    else
    {
    $_SESSION['status'] =  "your data is not deleteed place try agen";
    header('Location: adminreg.php');
    }


}

?> 