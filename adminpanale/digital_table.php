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
    $query = "DELETE FROM digital WHERE id='$id'";
    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
    $_SESSION['success'] =  "your data is deleteed Successfully";
   // header('Location: adminprofile_data.php');
    }
    else
    {
    $_SESSION['status'] =  "your data is not deleteed place try agen";
    header('Location: message.php');
    }


}
?>
<center>  
<?php
          $per_page_record = 10; 
          if (isset($_GET["page"])) {    
              $page  = $_GET["page"];    
          }    
          else {    
            $page=1;    
          }    
      
          $start_from = ($page-1) * $per_page_record;     
      
          $query = "SELECT * FROM digital ORDER BY date DESC LIMIT $start_from, $per_page_record";     
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
                    <th>Sl. No</th>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Filename</th>
                    <th>Subject For Class:</th>
                    <th>size (in mb)</th>
                    <th>Downloads Time</th>
                    <th>Link</th>
                    <th>Action</th>
                    <th>Delete</th>

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
                    <td><?php echo $file['id']; ?></td>
      <td><?php echo $file['date']; ?></td>
      <td><?php echo $file['name']; ?></td>
      <td><?php echo $file['class']; ?></td>
      <td><?php echo floor($file['size'] / 1000) . ' KB'; ?></td>
      <td><?php echo $file['downloads']; ?></td>
      <td><?php echo $file['link']; ?></td>
      <td><a href="../digital_library_id.php?file_id=<?php echo $file['id'] ?>">Download</a></td>
      <td>
                <form action="digital_table.php" method="post">
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
          $query = "SELECT COUNT(*) FROM digital";     
          $rs_result = mysqli_query($con, $query);     
          $row = mysqli_fetch_row($rs_result);     
          $total_records = $row[0];     
            
      echo "</br>";     
          // Number of pages required.   
          $total_pages = ceil($total_records / $per_page_record);     
          $pagLink = "";       
        
          if($page>=2){   
              echo "<a href='digital_table.php?page=".($page-1)."'>  Prev </a>";   
          }       
                     
          for ($i=1; $i<=$total_pages; $i++) {   
            if ($i == $page) {   
                $pagLink .= "<a class = 'active' href='digital_table.php?page="  
                                                  .$i."'>".$i." </a>";   
            }               
            else  {   
                $pagLink .= "<a href='digital_table.php?page=".$i."'>   
                                                  ".$i." </a>";     
            }   
          };     
          echo $pagLink;   
    
          if($page<$total_pages){   
              echo "<a href='digital_table.php?page=".($page+1)."'>  Next </a>";   
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
          window.location.href = 'digital_table.php?page='+page;   
      }   
    </script>  

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
