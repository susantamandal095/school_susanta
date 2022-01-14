<?php
include('nav/nav.php'); 
include('nav/config.php');
$information = '';
	if(isset($_POST['Registration'])){

	$name = $_POST['name'];
	$class = $_POST["class"];
	$gender = $_POST["gender"];
	$gargensoccupation = $_POST["gargensoccupation"];
	$gargensname = $_POST["gargensname"];
	$gargensphone = $_POST["gargensphone"];
	$gargensaddress = $_POST["gargensaddress"];
	$famallyincome = $_POST["famallyincome"];
	$email = $_POST['email'];
	$password = "user#pass";
	$phone = $_POST["phone"];
	$category = $_POST['category'];
	$adhaarnumber = $_POST['adhaarnumber'];
	$dob = $_POST['dob'];
	$mothername = $_POST['mothername'];
	$fathername = $_POST['fathername'];
	$country = $_POST['country'];
	$state = $_POST['state'];
	$pincode = $_POST['pincode'];
	$city = $_POST['city'];
	$address = $_POST['address'];
	$img = $_FILES['image']['name'];
	$tmp = $_FILES['image']['tmp_name'];
	$select = "SELECT * FROM new_admission WHERE adhaarnumber='$adhaarnumber'";
	$query = mysqli_query($con,$select);
	$count = mysqli_num_rows($query);
	if($count == 0){
		if ($_FILES['image']['size'] > 51200) { 
			echo "<script>alert('Your File too large enter image size 20kb to 50kb');</script>" ;
			echo "<script type='text/javascript'> document.location ='add_form.php'; </script>";
			 }
			 else if($_FILES['image']['size'] < 20480){
				echo "<script>alert('Your File too small enter image size 20kb to 50kb');</script>" ;
			   echo "<script type='text/javascript'> document.location ='add_form.php'; </script>";
			   }
			   else{

		$q = "INSERT INTO new_admission(id,name,category,gargensoccupation,gargensname,gargensphone,gargensaddress,famallyincome,adhaarnumber,dob,mothername,fathername,country,state,pincode,city,email,password,phone,class,gender,image,address) VALUES ('','$name','$category','$gargensoccupation','$gargensname','$gargensphone','$gargensaddress','$famallyincome','$adhaarnumber','$dob','$mothername','$fathername','$country','$state','$pincode','$city','$email','$password','$phone','$class','$gender','$img','$address')";
		$run = mysqli_query($con,$q);
		if($run){
			move_uploaded_file($tmp, "student data/".$img);
			
			echo "<script>alert('Your Applecation Succesfully submited Thank you!!');</script>" ;
            echo "<script type='text/javascript'> document.location ='add_form.php'; </script>";
			
		
		}else{
			$information =  "Failed";
		}
	}
	}else{

		echo "<script>alert('Student already availabel! Thank you!!');</script>" ;
		echo "<script type='text/javascript'> document.location ='add_form.php'; </script>";
	}
	

	}
?>
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading"> <i class="fa fa-graduation-cap" aria-hidden="true"></i> GRAMAYA PATSALA</h1>
        <p class="lead text-muted mb-0">Admission Form</p>
    </div>
</section>


<div class="container-fluid bg-dark">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Admission Form</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="container-fluid bg-info">
    <div class="container">
        <p><?php echo $information; ?></p>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="class">Admission for Class*: </label>
                            <select id="class" name="class" class="form-control" required>
                                <option value="V">V</option>
                                <option value="VI">VI</option>
                                <option value="VII">VII</option>
                                <option value="VIII">VIII</option>
                                <option value="IX">IX</option>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                            </select>
                        </div>

                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input required type="text" name="name" class="form-control" placeholder="name" require>
                        </div>
                    </div>


                    <div class="col-sm-4">
                        <div class="form-group">

                            <label for="email">Email address</label>
                            <input required type="text" name="email" class="form-control"
                                placeholder="example001@gmail.com" require>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="name">Phone*:</label>

                            <input required type="text" name="phone" class="form-control" maxlength="10"
                                placeholder="9679337134" require>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">

                            <label for="class">Mother's Name*: </label>
                            <input required type="text" name="mothername" class="form-control" placeholder="Mother name"
                                require>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">

                            <label for="class">Father's Name*: </label>
                            <input required type="text" name="fathername" class="form-control" placeholder="father name"
                                require>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">

                            <label for="class">Gargens Name*: </label>
                            <input required type="text" name="gargensname" class="form-control"
                                placeholder="Gargens name" require>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">

                            <label for="class">Gargens Occupation*: </label>
                            <input required type="text" name="gargensoccupation" class="form-control"
                                placeholder="Gargens Occupation" require>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">

                            <label for="class">Gargens phone Number*: </label>
                            <input required type="text" name="gargensphone" class="form-control"
                                placeholder="Gargens phone number" require>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">

                            <label for="class">Gargens Address*: </label>
                            <input required type="text" name="gargensaddress" class="form-control"
                                placeholder="Gargens Address" require>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">

                            <label for="class">famally Income(Per year)*: </label>
                            <input required type="text" name="famallyincome" class="form-control"
                                placeholder="famally income per year" require>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">

                            <label for="class">Aadhaar Number*: </label>
                            <input required type="text" name="adhaarnumber" class="form-control" maxlength="12"
                                placeholder="123465414562" require>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">

                            <label for="class">Country Name*: </label>
                            <!-- <input required type="text" name="country" class="form-control" placeholder="country" require> -->
                            <select id="class" name="country" class="form-control" required>
                                <option value="INDIA">INDIA</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="class">Select State*: </label>
                            <select name="state" id="state" class="form-control">
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                <option value="Daman and Diu">Daman and Diu</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Lakshadweep">Lakshadweep</option>
                                <option value="Puducherry">Puducherry</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Odisha">Odisha</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Telangana">Telangana</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="Uttarakhand">Uttarakhand</option>
                                <option value="West Bengal">West Bengal</option>
                            </select>
                        </div>

                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">

                            <label for="class">City Name*: </label>
                            <input required type="text" name="city" class="form-control" placeholder="City" require>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">

                            <label for="class">Pin Code*: </label>
                            <input required type="text" name="pincode" maxlength="6" class="form-control"
                                placeholder="Pincode" require>
                        </div>
                    </div>






                    <div class="col-sm-4">
                        <!-- <div class="form-group">
                        <label for="class">Select Cast*: </label>
                        <input required type="text" name="category" class="form-control"
                            placeholder="GEN/SC/ST/OBC-A/OBC-B/PWD" require>
                    </div> -->
                        <div class="form-group">
                            <label for="class">Select Cast*:</label>
                            <select id="class" name="category" class="form-control" required>
                                <option value="Gen">Gen</option>
                                <option value="SC">SC</option>
                                <option value="ST">ST</option>
                                <option value="OBC-A">OBC-A</option>
                                <option value="OBC-B">OBC-B</option>
                                <option value="PWD">PWD</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">

                            <label for="class">Date of barth*: </label>
                            <input required type="date" name="dob" class="form-control" placeholder="dob" require>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <!-- <div class="form-group">

                        <label for="class">Gender*: </label>
                        <input required type="text" name="gender" class="form-control" placeholder="male/female/other"
                            require>
                    </div> -->
                        <div class="form-group">
                            <label for="class">Gender*: </label>
                            <select id="class" name="gender" class="form-control" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">

                            <label for="class">Add your photo*: </label>
                            <input type="file" name="image" required>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">

                            <label for="class">Enter Your Address*: </label>
                            <textarea required placeholder="Address" name='address' class="form-control"
                                rows="3"></textarea>
                        </div>
                    </div>
                    <p><?php echo $information; ?></p>

                    <button style="font-size: 20px; width: 170px; height: 70px;" type="submit"
                        name="Registration" class="btn btn-warning">Submit <i class="fa fa-paper-plane"
                            aria-hidden="true"></i></button>
                </div>
            </form>
        </div>
    </div>

</div>




<?php
include('nav/footer.php'); 
?>