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
if(isset($_POST['view_btn']))
{

    $id = $_POST['view_id'];
   //  echo $id;
    
    $query = "SELECT * FROM new_admission WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    foreach($query_run as $row)
    {
      ?>
       
<div id='printMe' class="container emp-profile">
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="../student data/<?php echo $row['image'];?>" style="border-radius: 50%; width:140px;" alt="" />

                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5><img src="img/logo.png" style="border-radius: 50%; width:86px;" alt="" />
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
                        <p>Family Details </p>
                    </h3>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Father's Name :</label>
                        </div>
                        <div class="col-md-6">
                           
                            <p><?php echo $row['fathername']; ?></p>
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label>Mother's Name :</label>
                        </div>
                        <div class="col-md-6">
                            
                            <p><?php echo $row['mothername']; ?></p>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Gargens phone Number :</label>
                        </div>
                        <div class="col-md-6">
                            
                            <p><?php echo $row['gargensphone']; ?></p>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Gargens Address :</label>
                        </div>
                        <div class="col-md-6">
                        
                            <p><?php echo $row['gargensaddress']; ?></p>
                           
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-6">
                            <label>Date of Release:</label>
                        </div>
                        <div class="col-md-6">
                            <h1>
                            <p><?php echo $row['address']; ?></p>
                            </h1>
                        </div>
                    </div> -->


                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                            <div class="col-md-6">
                                <label>Student Name :</label>
                                
                            </div>
                            <div class="col-md-6">
                            <p><?php echo $row['name']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Student Id :</label>
                                
                            </div>
                            <div class="col-md-6">
                            <p><?php echo $row['id']; ?></p>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email :</label>
                            </div>
                            <div class="col-md-6">
                            <p><?php echo $row['email']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Phone :</label>
                            </div>
                            <div class="col-md-6">
                            <p><?php echo $row['phone']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Date  Of Birth :</label>
                            </div>
                            <div class="col-md-6">
                            <p><?php echo $row['phone']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Category :</label>
                            </div>
                            <div class="col-md-6">
                            <p><?php echo $row['category']; ?></p>
                            </div>
                        </div>
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
                                <label>Adhaar Number :</label>
                            </div>
                            <div class="col-md-6">
                            <p><?php echo $row['adhaarnumber']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Class :</label>
                            </div>
                            <div class="col-md-6">
                            <p><?php echo $row['class']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Gargens Name :</label>
                            </div>
                            <div class="col-md-6">
                            <p><?php echo $row['gargensname']; ?></p>
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
                                <label>Gargens Occupation :</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $row['gargensoccupation']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Famally Income(Per year) :</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $row['famallyincome']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Country Name :</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $row['country']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>State Name :</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $row['state']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>City Name :</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $row['city']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Pin Code :</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $row['pincode']; ?></p>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-md-6">
                                <label>Cast</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $row['category']; ?></p>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-md-6">
                                <label>Address :</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $row['address']; ?></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

    </form>
</div>
       <?php
            }
        }
?>
<div class="text-info text-center h1"> <i class="fa fa-print" onclick="printDiv('printMe')" aria-hidden="true"></i>
</div>
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