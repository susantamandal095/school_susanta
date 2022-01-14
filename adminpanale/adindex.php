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


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered Admin</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <?php 
              
              $query ="SELECT id FROM admins ORDER BY id";
              $query_run = mysqli_query($con, $query);
              $row = mysqli_num_rows($query_run);
              echo '<h6>Total Admin:' .$row. '</h6>';
              ?>


              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
       <!-- Earnings (Monthly) Card Example -->
       <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Registered Students</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <?php 
              
              $query ="SELECT id FROM new_admission ORDER BY id";
              $query_run = mysqli_query($con, $query);
              $row = mysqli_num_rows($query_run);
              echo '<h6>Total Students:' .$row. '</h6>';
              ?>


              </div>
            </div>
            <div class="col-auto">
            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Notices</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <?php 
              
              $query ="SELECT id FROM notices ORDER BY id";
              $query_run = mysqli_query($con, $query);
              $row = mysqli_num_rows($query_run);
              echo '<h6>Total Notices:' .$row. '</h6>';
              ?>


              </div>
            </div>
            <div class="col-auto">
            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  

   <!-- Earnings (Monthly) Card Example -->
   <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Results</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <?php 
              
              $query ="SELECT id FROM results ORDER BY id";
              $query_run = mysqli_query($con, $query);
              $row = mysqli_num_rows($query_run);
              echo '<h6>Total Results:' .$row. '</h6>';
              ?>


              </div>
            </div>
            <div class="col-auto">
            <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  
  
  
  </div>


  <!-- Content Row -->
 <!-- Content Row -->
 <div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-info shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Message</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">

          <?php 
          
          $query ="SELECT id FROM contacts ORDER BY id";
          $query_run = mysqli_query($con, $query);
          $row = mysqli_num_rows($query_run);
          echo '<h6>Total Message:' .$row. '</h6>';
          ?>


          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-calendar fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>
   <!-- Earnings (Monthly) Card Example -->
   <div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Subjects Link</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">

          <?php 
          
          $query ="SELECT id FROM digital ORDER BY id";
          $query_run = mysqli_query($con, $query);
          $row = mysqli_num_rows($query_run);
          echo '<h6>Total Links:' .$row. '</h6>';
          ?>


          </div>
        </div>
        <div class="col-auto">
        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Notices</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">

          <?php 
          
          $query ="SELECT id FROM notices ORDER BY id";
          $query_run = mysqli_query($con, $query);
          $row = mysqli_num_rows($query_run);
          echo '<h6>Total Notices:' .$row. '</h6>';
          ?>


          </div>
        </div>
        <div class="col-auto">
        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-danger shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Results</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">

          <?php 
          
          $query ="SELECT id FROM results ORDER BY id";
          $query_run = mysqli_query($con, $query);
          $row = mysqli_num_rows($query_run);
          echo '<h6>Total Results:' .$row. '</h6>';
          ?>


          </div>
        </div>
        <div class="col-auto">
        <i class="fas fa-comments fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>



</div>







  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>