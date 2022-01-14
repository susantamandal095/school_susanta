<?php
include('nav/nav.php'); 
include('nav/config.php');
?>
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading"> <i class="fa fa-graduation-cap" aria-hidden="true"></i>   GRAMAYA PATSALA</h1>
        <p class="lead text-muted mb-0">Digital Library</p>
    </div>
</section>


<div class="container-fluid bg-dark">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Digital Library</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<center style="background: aliceblue;padding: 40px;">  
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
      
          $query = "SELECT * FROM digital ORDER BY date DESC LIMIT $start_from, $per_page_record";     
          $rs_result = mysqli_query ($con, $query); 
          $files = mysqli_fetch_all($rs_result, MYSQLI_ASSOC);
          
        
      ?>    
    
      <div class="container">   
        <br>   
        <div style="overflow: scroll;">
          <h3>Digital Library</h3>   
          <p  style="color: black;"> All Digital Library Available Hare !!</p>   
          <table class="table table-striped table-condensed    
                                            table-bordered">   
            <thead style="background-color: #000000;  color: #ffffff;">   
              <tr>   
                <th width="10%">ID</th>   
                <th>Date</th> 
                <th>Subject For Class:</th>   
                <th>size (in mb)</th>
                <th>Downloads</th>   
                <th>Link</th>
                <th>Action</th>

              </tr>   
            </thead>   
            <tbody> 
            <?php $i=1; foreach ($files as $file): ?>
                    <tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $file['date']; ?></td>
					<td><?php echo $file['class']; ?></td>
					<td><?php echo floor($file['size'] / 1000) . ' KB'; ?></td>
					<td><?php echo $file['downloads']; ?></td>
					<td><?php echo $file['link']; ?></td>
					<td><a href="digital_library_id.php?file_id=<?php echo $file['id'] ?>">Download</a></td>
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
              echo "<a href='digital_lib.php?page=".($page-1)."'>  Prev </a>";   
          }       
                     
          for ($i=1; $i<=$total_pages; $i++) {   
            if ($i == $page) {   
                $pagLink .= "<a class = 'active' href='digital_lib.php?page="  
                                                  .$i."'>".$i." </a>";   
            }               
            else  {   
                $pagLink .= "<a href='digital_lib.php?page=".$i."'>   
                                                  ".$i." </a>";     
            }   
          };     
          echo $pagLink;   
    
          if($page<$total_pages){   
              echo "<a href='digital_lib.php?page=".($page+1)."'>  Next </a>";   
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
          window.location.href = 'digital_lib.php?page='+page;   
      }   
    </script>  

<?php
include('nav/footer.php'); 
?>