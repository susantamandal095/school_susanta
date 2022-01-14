<?php
include('nav/nav.php');  
include('nav/config.php');

if(isset($_POST['Registration'])){
	$name = $_POST['name'];
	$message = $_POST["message"];
	$email = $_POST['email'];
	$select = "SELECT * FROM admins WHERE name='$email'";
	$query = mysqli_query($con,$select);
	$count = mysqli_num_rows($query);
	if($count == 0){
		$q = "INSERT into `contacts` (name,message,email)
		VALUES ('$name','$message','$email')";
		$run = mysqli_query($con,$q);
		if($run){
			echo "<script>alert('Message Sended Succesfully Thank You!!');</script>" ;
            echo "<script type='text/javascript'> document.location ='cont_us.php'; </script>";
		}else{
		echo "<script>alert('Failed');</script>" ;
		echo "<script type='text/javascript'> document.location ='cont_us.php'; </script>";
		}
	}else{
		
		echo "<script>alert('Message already availabel! Thank you!!');</script>" ;
		echo "<script type='text/javascript'> document.location ='cont_us.php'; </script>";
	}
	

	}
	
?>

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading"> <i class="fa fa-graduation-cap" aria-hidden="true"></i>   GRAMAYA PATSALA</h1>
        <p class="lead text-muted mb-0">Contact Us</p>
    </div>
</section>


<div class="container-fluid bg-dark">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="container-fluid bg-info" style="padding:20px">
    <div class="row">
        <div class="col">
            <div class="card" style="border:20px solid #E0F7EA; border-radius: 40px;margin-left: 39px;height: 581px;">
                <div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i> Contact us.
                </div>
                <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp"
                                placeholder="Enter name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"
                                placeholder="Enter email" required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="message" class="form-control" id="message" rows="6" required></textarea>
                        </div>
                        <div class="mx-auto">
                            <button type="submit" name="Registration" class="btn btn-primary text-right">Submit</button></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card bg-light mb-3">
                        <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> Address
                        </div>
                        <div class="card-body" style="border:20px solid #E0F7EA; border-radius: 100px;text-align: center;">
                            <p class="text-dark"> <b> <i class="fa fa-home" style="color: red;"></i> <em style="color: blueviolet;"> Villege & Post office :  Alangari ; </em> </b> </p>
                            <p class="text-dark"> <b> <i class="fa fa-map-marker" style="color: red;" aria-hidden="true"></i> <em style="color: blueviolet;"> District :  Purba Medinipur ; </em> </b> </p>
                            <p class="text-dark"> <b> <i class="fa fa-map-marker" style="color: red;" aria-hidden="true"></i> <em style="color: blueviolet;"> West Bengal ; India-731140; </em> </b> </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card bg-light mb-3">
                        <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-map-marker" aria-hidden="true"></i> Map
                        </div>
                        <div class="card-body">
                            <iframe style="border:20px solid #E0F7EA; border-radius: 40px;margin-left: 39px;"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1847.50280438633!2d87.08711437376844!3d22.16385854208398!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a1d1258a1279057%3A0x13b70d7a61ca902a!2sRohini+C.+R.+D.+High+School!5e0!3m2!1sen!2sin!4v1549520699047"
                                width="496" height="206" frameborder="0" style="border:0" allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
include('nav/footer.php'); 
?>