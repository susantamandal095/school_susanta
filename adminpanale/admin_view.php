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
// if(isset($_POST['email']))
// {

    $email = $_SESSION['email'];
   //  echo $id;
    
    $query = "SELECT * FROM new_admission WHERE email='$email' ";
    $query_run = mysqli_query($con, $query);

    foreach($query_run as $row)
    {
      ?>
       
<div id='printMe' class="container emp-profile">
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="img/<?php echo $row['image'];?>" style="border-radius: 50%; width:140px;" alt="" />

                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5><img src="img/logo.png" style="border-radius: 50%;margin-top: 25px; width:86px;" alt="" />
                    <label class="text-info"><b>GRAMYA PATSALA </b></label>
                       
                    </h5>
                    

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true"><i
                                    class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Profile</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-work">
                    <h3>
                        <p>Personal Details </p>
                    </h3>
                    <div class="col-md-6">
                                <label>Admin Name :</label>
                                
                            </div>
                            <div class="col-md-6">
                            <p><?php echo $row['name']; ?></p>
                            </div>
                            <div class="col-md-6">
                                <label>Mobile no :</label>
                                
                            </div>
                            <div class="col-md-6">
                            <p><?php echo $row['phone']; ?></p>
                            </div>
                            <div class="col-md-6">
                                <label>Email :</label>
                                
                            </div>
                            <div class="col-md-6">
                            <p><?php echo $row['email']; ?></p>
                            </div>

                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    
                        <div class="row">
                            <div class="col-md-6">
                                <label>Gender :</label>
                                
                            </div>
                            <div class="col-md-6">
                            <p><?php echo $row['gender']; ?></p>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-md-6">
                                <label>Address :</label>
                            </div>
                            <div class="col-md-6">
                            <p><?php echo $row['address']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Password :</label>
                            </div>
                            <div class="col-md-6">
                            <p><?php echo $row['password']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Id :</label>
                            </div>
                            <div class="col-md-6">
                            <p><?php echo $row['id']; ?></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

    </form>
    
</div>
       <?php
            }
        // }
?>
<button type="button" style="margin-left: 519px;" onclick="printDiv('printMe')" class="btn btn-outline-info">Print</button>
<!-- <div class="text-info text-center h1"> 
</div> -->
<script>
		function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;

		}
	</script>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>