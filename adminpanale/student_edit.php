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
            <h6 class="m-0 font-weight-bold text-primary">EDIT Students Profile </h6>

        </div>

        <div class="card-body">

            <?php
if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $name =$_POST['edit_name'];
    $email =$_POST['edit_email'];
    $adhaarnumber =$_POST['edit_adhaarnumber'];
    $class =$_POST['edit_class'];
    $gender =$_POST['edit_gender'];
    $phone =$_POST['edit_phone'];
    $dob =$_POST['edit_dob'];
    $gargensaddress =$_POST['edit_gargensaddress'];
    $fathername =$_POST['edit_fathername'];
    $gargensname =$_POST['edit_gargensname'];
    $gargensoccupation =$_POST['edit_gargensoccupation'];
    $gargensphone =$_POST['edit_gargensphone'];
    $mothername =$_POST['edit_mothername'];
    $address =$_POST['edit_address'];
    $famallyincome =$_POST['edit_famallyincome'];
    $country =$_POST['edit_country'];
    $state =$_POST['edit_state'];

    $city =$_POST['edit_city'];
    $pincode =$_POST['edit_pincode'];
    $category =$_POST['edit_category'];

    $query = "UPDATE new_admission SET name='$name', email='$email' ,dob='$dob' ,gargensaddress='$gargensaddress' ,fathername='$fathername' ,gargensname='$gargensname' ,gargensoccupation='$gargensoccupation',gargensphone='$gargensphone',address='$address' ,famallyincome='$famallyincome'  ,country='$country' ,state='$state' ,city='$city' ,pincode='$pincode' ,category='$category', mothername='$mothername', phone='$phone', class='$class', gender='$gender' WHERE id='$id'";
    $query_run = mysqli_query($con, $query);
     if($query_run)
    {
   // $_SESSION['success'] =  "your data is updateed Successfully";
   // header('Location: adminprofile_data.php');
   echo "<script>alert('your data is updateed Successfully.');</script>" ;
 echo "<script type='text/javascript'> document.location ='add_data.php'; </script>";
    }
    else
    {
    // $_SESSION['status'] =  "your data is not updateed place try agen";
    // header('Location: adminprofile_data.php');
    echo "<script>alert('your data is not updateed place try agen.');</script>" ;
 echo "<script type='text/javascript'> document.location ='add_data.php'; </script>";
    }

}
if(isset($_POST['edit_btn']))
{

    $id = $_POST['edit_id'];
    // echo $id;
    
    $query = "SELECT * FROM new_admission WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    foreach($query_run as $row)
    {
      ?>

            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="edit_id" value="<?php echo $row ['id']?>">
                <div class="form-group">
                    <label for="class">Admission for Class*: </label>
                    <span> <b style="color:red;">[ Your Current class is <?php echo $row ['class']?> ]</b> </span>
                    <select id="class" name="edit_class" class="form-control" required>
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
                <div class="form-group">
                    <label> Name </label>
                    <span> <b style="color:red;">[ Your Current Name is <?php echo $row ['name']?> ]</b> </span>
                    <input type="text" name="edit_name" value="<?php echo $row ['name']?>" class="form-control"
                        placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <span> <b style="color:red;">[ Your Current Email is <?php echo $row ['email']?> ]</b> </span>
                    <input type="email" name="edit_email" value="<?php echo $row ['email']?>" class="form-control"
                        placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <label>Adhaar Number</label>
                    <span> <b style="color:red;">[ Your Current Adhaar Number is <?php echo $row ['adhaarnumber']?>
                            ]</b> </span>
                    <input type="text" name="edit_adhaarnumber" value="<?php echo $row ['adhaarnumber']?>"
                        class="form-control" placeholder="Enter Adhaar Number">
                </div>
                <div class="form-group">

                    <label for="class">Date of barth*: </label>
                    <span> <b style="color:red;">[ Your Current Date of barth is <?php echo $row ['dob']?> ]</b></span>
                    <input required type="date" name="edit_dob" class="form-control" placeholder="dob" require>
                </div>
                <div class="form-group">
                    <label for="class">Gender*: </label>
                    <span> <b style="color:red;">[ Your Current Gender is <?php echo $row ['gender']?> ]</b> </span>
                    <select id="class" name="edit_gender" class="form-control" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Phone*:</label>
                    <span> <b style="color:red;">[ Your Current Phone is <?php echo $row ['phone']?> ]</b> </span>
                    <input required type="text" name="edit_phone" value="<?php echo $row ['phone']?>"
                        class="form-control" maxlength="10" placeholder="9679337134" require>
                </div>
                <div class="form-group">

                    <label for="class">Mother's Name*: </label>
                    <span> <b style="color:red;">[ Your Current Mother Name is <?php echo $row ['mothername']?> ]</b>
                    </span>
                    <input required type="text" name="edit_mothername" value="<?php echo $row ['mothername']?>"
                        class="form-control" placeholder="Mother name" require>
                </div>
                <div class="form-group">
                    <label for="class">Father's Name*: </label>
                    <span> <b style="color:red;">[ Your Current Father's Name is <?php echo $row ['fathername']?> ]</b>
                    </span>
                    <input required type="text" name="edit_fathername" value="<?php echo $row ['fathername']?>"
                        class="form-control" placeholder="father name" require>
                </div>

                <div class="form-group">

                    <label for="class">Gargens Name*: </label>
                    <span> <b style="color:red;">[ Your Current Gargens Name is <?php echo $row ['gargensname']?> ]</b>
                    </span>
                    <input required type="text" name="edit_gargensname" value="<?php echo $row ['gargensname']?>"
                        class="form-control" placeholder="Gargens name" require>
                </div>
                <div class="form-group">

                    <label for="class">Gargens Occupation*: </label>
                    <span> <b style="color:red;">[ Your Current Gargens Occupation is
                            <?php echo $row ['gargensoccupation']?> ]</b> </span>
                    <input required type="text" name="edit_gargensoccupation"
                        value="<?php echo $row ['gargensoccupation']?>" class="form-control"
                        placeholder="Gargens Occupation" require>
                </div>
                <div class="form-group">

                    <label for="class">Gargens phone Number*: </label>
                    <span> <b style="color:red;">[ Your Current Gargens phone Number is
                            <?php echo $row ['gargensphone']?> ]</b> </span>
                    <input required type="text" name="edit_gargensphone" value="<?php echo $row ['gargensphone']?>"
                        class="form-control" placeholder="Gargens phone number" require>
                </div>

                <div class="form-group">

                    <label for="class">Gargens Address*: </label>
                    <span> <b style="color:red;">[ Your Current Gargens Address is <?php echo $row ['gargensaddress']?>
                            ]</b> </span>
                    <input required type="text" name="edit_gargensaddress" value="<?php echo $row ['gargensaddress']?>"
                        class="form-control" placeholder="Gargens Address" require>
                </div>
                <div class="form-group">

                    <label for="class">Famally Income(Per year)*: </label>
                    <span> <b style="color:red;">[ Your Current famally Income(Per year) is <?php echo $row ['famallyincome']?> ]</b>
                    <input required type="text" name="edit_famallyincome" value="<?php echo $row ['famallyincome']?>" class="form-control"
                        placeholder="famally income per year" require>
                </div>
                <div class="form-group">

                    <label for="class">Country Name*: </label>
                    <span> <b style="color:red;">[ Your Current Country Name is <?php echo $row ['country']?> ]</b>
                    <!-- <input required type="text" name="country" class="form-control" placeholder="country" require> -->
                    <select id="class" name="edit_country" class="form-control" required>
                        <option value="INDIA">INDIA</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="class">Select State*: </label>
                    <span> <b style="color:red;">[ Your Current State Name is <?php echo $row ['state']?> ]</b>
                    <select name="edit_state" id="state" class="form-control">
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
                <div class="form-group">

                    <label for="class">City Name*: </label>
                    <span> <b style="color:red;">[ Your Current City Name is <?php echo $row ['city']?> ]</b>
                    <input required type="text" name="edit_city" class="form-control" value="<?php echo $row ['city']?>" placeholder="City" require>
                </div>
                <div class="form-group">

                    <label for="class">Pin Code*: </label>
                    <span> <b style="color:red;">[ Your Current Pin Code is <?php echo $row ['pincode']?> ]</b>
                    <input required type="text" name="edit_pincode" maxlength="6" value="<?php echo $row ['pincode']?>" class="form-control" placeholder="Pincode"
                        require>
                </div>
                <div class="form-group">
                    <label for="class">Select Cast*:</label>
                    <span> <b style="color:red;">[ Your Current Cast is <?php echo $row ['category']?> ]</b>
                    <select id="class" name="edit_category" class="form-control" required>
                        <option value="Gen">Gen</option>
                        <option value="SC">SC</option>
                        <option value="ST">ST</option>
                        <option value="OBC-A">OBC-A</option>
                        <option value="OBC-B">OBC-B</option>
                        <option value="PWD">PWD</option>
                    </select>
                </div>
                <div class="form-group">

                    <label for="class">Enter Your Address*: </label>
                    <span> <b style="color:red;">[ Your Current Address is <?php echo $row ['address']?> ]</b>
                    <input type="text" required placeholder="Address" name='edit_address' class="form-control" value="<?php echo $row ['address']?>">
                </div>
                <a href="add_data.php" class="btn btn-danger">CANCEL</a>
                <button type="submit" name="updatebtn" class="btn btn-primary"> UPDATE </button>
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