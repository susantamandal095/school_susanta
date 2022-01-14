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
    $query = "DELETE FROM contacts WHERE id='$id'";
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


<div class="main-content">
     
  <div class="container-fluid">
  <div class="table-responsive">
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
    
        $query = "SELECT * FROM contacts LIMIT $start_from, $per_page_record";     
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
        <button class="btn btn-success" onclick="exportTableToExcel('message_data','messages-data')"><i class="fa fa-download" aria-hidden="true"></i>  Export messages Data To Excel File</button>
        <table id="message_data" class="table table-striped table-condensed    
                                          table-bordered">   
          <thead>   
            <tr>   
              <!-- <th width="10%">ID</th>   
              <th>Name</th>    -->
              <th>S.No</th>   
              <th> ID </th>
            <th> Name </th>
            <th>Email </th>
            <th> Message </th>
            <th> Delete </th>  
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
            <td> <?php echo $file['id']; ?> </td>
            <td> <?php echo $file['name']; ?> </td>
            <td> <?php echo $file['email']; ?> </td>
            <td> <?php echo $file['message']; ?> </td>
            <td>
                <form action="message.php" method="post">
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
        $query = "SELECT COUNT(*) FROM contacts";     
        $rs_result = mysqli_query($con, $query);     
        $row = mysqli_fetch_row($rs_result);     
        $total_records = $row[0];     
          
    echo "</br>";     
        // Number of pages required.   
        $total_pages = ceil($total_records / $per_page_record);     
        $pagLink = "";       
      
        if($page>=2){   
            echo "<a href='message.php?page=".($page-1)."'>  Prev </a>";   
        }       
                   
        for ($i=1; $i<=$total_pages; $i++) {   
          if ($i == $page) {   
              $pagLink .= "<a class = 'active' href='message.php?page="  
                                                .$i."'>".$i." </a>";   
          }               
          else  {   
              $pagLink .= "<a href='message.php?page=".$i."'>   
                                                ".$i." </a>";     
          }   
        };     
        echo $pagLink;   
  
        if($page<$total_pages){   
            echo "<a href='message.php?page=".($page+1)."'>  Next </a>";   
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
        window.location.href = 'message.php?page='+page;   
    }   
  </script>  
    <script type="text/javascript">
  function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
  }
    </script>
    </div>
  </div>
</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>