<?php
include('nav/nav.php'); 
include('nav/config.php'); 
include('notice_id.php');
?>
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading"> <i class="fa fa-graduation-cap" aria-hidden="true"></i>   GRAMAYA PATSALA</h1>
        <p class="lead text-muted mb-0">Notices</p>
    </div>
</section>


<div class="container-fluid bg-dark">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Notices</li>
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
    
        $query = "SELECT * FROM notices ORDER BY date DESC LIMIT $start_from, $per_page_record";     
        $rs_result = mysqli_query ($con, $query);    
        $files = mysqli_fetch_all($rs_result, MYSQLI_ASSOC);
    ?>    
  
    <div class="container">   
      <br>   
      <div style="overflow: scroll;">
        <h3>Notice</h3>   
        <p style="color: black;"> All Notice Available Hare !!</p>   
        <table class="table table-striped table-condensed    
                                          table-bordered">   
          <thead style="background-color: #000000;  color: #ffffff;">   
            <tr>   
              <th width="10%">ID</th>   
              <th>Date</th>   
              <th>Notice Body</th>   
              <th>Class</th>
              <th>Downlood</th>
            </tr>   
          </thead>   
          <tbody>
          <?php $i=1; foreach ($files as $file): ?>
            <tr>   
               
            <td><?php echo $i; ?></td>
              <td><?php echo $file['date']; ?></td>
              <td><?php echo $file['noticebody']; ?></td>
              <td><?php echo $file['class']; ?></td>
              <td><a href="notice_id.php?file_id=<?php echo $file['id'] ?>">Click hare to Download</a></td>                                          
              </tr>    
            <?php $i=$i+1; endforeach;?>                                  
         
            
          </tbody>   
        </table>   
  
     <div class="pagination">    
      <?php  
        $query = "SELECT COUNT(*) FROM notices";     
        $rs_result = mysqli_query($con, $query);     
        $row = mysqli_fetch_row($rs_result);     
        $total_records = $row[0];     
          
    echo "</br>";     
        // Number of pages required.   
        $total_pages = ceil($total_records / $per_page_record);     
        $pagLink = "";       
      
        if($page>=2){   
            echo "<a href='notice.php?page=".($page-1)."'>  Prev </a>";   
        }       
                   
        for ($i=1; $i<=$total_pages; $i++) {   
          if ($i == $page) {   
              $pagLink .= "<a class = 'active' href='notice.php?page="  
                                                .$i."'>".$i." </a>";   
          }               
          else  {   
              $pagLink .= "<a href='notice.php?page=".$i."'>   
                                                ".$i." </a>";     
          }   
        };     
        echo $pagLink;   
  
        if($page<$total_pages){   
            echo "<a href='notice.php?page=".($page+1)."'>  Next </a>";   
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
        window.location.href = 'notice.php?page='+page;   
    }   
  </script>  

<?php
include('nav/footer.php'); 
?>