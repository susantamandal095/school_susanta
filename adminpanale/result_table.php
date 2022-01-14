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
if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];
    $query = "DELETE FROM results WHERE id='$id'";
    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
    $_SESSION['success'] =  "your data is deleteed Successfully";
   // header('Location: adminprofile_data.php');
    }
    else
    {
    $_SESSION['status'] =  "your data is not deleteed place try agen";
    header('Location: result_data.php');
    }


}
?>
<center>  
    <?php  
      
    // Import the file where we defined the conection to Database.     
       // require_once "conection.php";   
    
        $per_page_record = 10;  // Number of entries to show in a page.   
        // Look for a GET variable page if not found default is 1.        
        if (isset($_GET["page"])) {    
            $page  = $_GET["page"];    
        }    
        else {    
          $page=1;    
        }    
    
        $start_from = ($page-1) * $per_page_record;     
    
        $query = "SELECT * FROM results ORDER BY date DESC LIMIT $start_from, $per_page_record";     
        $rs_result = mysqli_query ($con, $query); 
        $files = mysqli_fetch_all($rs_result, MYSQLI_ASSOC);
        
      
    ?>    
  
    <div class="container">   
      <br>   
      <div>   
        <h1>Pagination Simple Example</h1>   
        <p>This page demonstrates the basic    
           Pagination using PHP and MySQL.   
        </p>   
        <table class="table table-striped table-condensed    
                                          table-bordered">   
          <thead>   
            <tr>   
              <!-- <th width="10%">ID</th>   
              <th>Name</th>    -->
              <th>S.No</th>   
              <th>Date</th>
              <th>Class</th>   
              <th>Download</th>
              <th>Action</th>   
            </tr>   
          </thead>   
          <tbody>   
    
            <?php 
            if(mysqli_num_rows($rs_result)>0)
            {
            }
            else
            {
               //  echo "<h1 style="color:Tomato;">'No Recorrd Found'</h1>";
               echo '<span style="color:red;text-align:center;font-size:30px">Sorry!! No Recorrd Found!</span>';
             }
            $i=1; foreach ($files as $file): ?>
            <tr>     
            <td><?php echo $i; ?></td>
              <td><?php echo $file['date']; ?></td>
              <td><?php echo $file['class']; ?></td>
              <td><a href="../results_id.php?file_id=<?php echo $file['id'] ?>">Click hare to Download</a></td>                                          
              <td>
                <form action="result_table.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $file['id'];?>">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
            </tr>     
            <?php $i=$i+1; endforeach;?>    
          </tbody>   
        </table>   
  
     <div class="pagination">    
      <?php  
        $query = "SELECT COUNT(*) FROM results";     
        $rs_result = mysqli_query($con, $query);     
        $row = mysqli_fetch_row($rs_result);     
        $total_records = $row[0];     
          
    echo "</br>";     
        // Number of pages required.   
        $total_pages = ceil($total_records / $per_page_record);     
        $pagLink = "";       
      
        if($page>=2){   
            echo "<a href='result_table.php?page=".($page-1)."'>  Prev </a>";   
        }       
                   
        for ($i=1; $i<=$total_pages; $i++) {   
          if ($i == $page) {   
              $pagLink .= "<a class = 'active' href='result_table.php?page="  
                                                .$i."'>".$i." </a>";   
          }               
          else  {   
              $pagLink .= "<a href='result_table.php?page=".$i."'>   
                                                ".$i." </a>";     
          }   
        };     
        echo $pagLink;   
  
        if($page<$total_pages){   
            echo "<a href='result_table.php?page=".($page+1)."'>  Next </a>";   
        }   
  
      ?>    
      </div>  
  
  
      <div class="inline">   
      <input id="page" type="number" min="1" max="<?php echo $total_pages?>"   
      placeholder="<?php echo $page."/".$total_pages; ?>" required>   
      <button onClick="go2Page();">Go</button>   
     </div>    
    </div>   
  </div>  
</center>   
  <script>   
    function go2Page()   
    {   
        var page = document.getElementById("page").value;   
        page = ((page><?php echo $total_pages; ?>)?<?php echo $total_pages; ?>:((page<1)?1:page));   
        window.location.href = 'result_table.php?page='+page;   
    }   
  </script>  

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>