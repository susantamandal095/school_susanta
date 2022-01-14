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
    $query = "DELETE FROM new_admission WHERE id='$id'";
    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
    $_SESSION['success'] =  "your data is deleteed Successfully";
   // header('Location: adminprofile_data.php');
    }
    else
    {
    $_SESSION['status'] =  "your data is not deleteed place try agen";
    header('Location: add_data.php');
    }


}

?>
<div class="main-content">

  <div class="container-fluid">
    <div class="table-responsive">
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
    
        $query = "SELECT * FROM new_admission LIMIT $start_from, $per_page_record";     
        $rs_result = mysqli_query ($con, $query); 
        $files = mysqli_fetch_all($rs_result, MYSQLI_ASSOC);
        
      
    ?>

        <div class="container">
          <br>
          <div>
            <h1>All Students Data</h1>
            <p>all students data are avavale hare
            </p>
            <br>
            <button class="btn btn-success" onclick="exportTableToExcel('tblData','students-data')"><i class="fa fa-download" aria-hidden="true"></i>  Export Admin Data To Excel File</button>
            <br> <br> <br>
            <table id="tblData" class="table table-striped table-condensed table-bordered">
              <thead>
                <tr>
                  <th> Sl.No </th>
                  <th> ID </th>
                  <th> name </th>
                  <th>Email </th>
                  <th>Adhaarnumber</th>
                  <th>Class</th>
                  <th> Date of Birth </th>
                  <th> Gender </th>
                  <th> Phone </th>
                  <th> Image </th>
                  <th>Category</th>
                  <th> Mother's name </th>
                  <th> Father's name </th>
                  <th> Gargens name </th>
                  <th> Gargens Occupation </th>
                  <th> Gargens Phone </th>
                  <th> Gargens Address </th>
                  <th> Famally Income Per Year </th>
                  <th> City </th>
                  <th> State name </th>
                  <th> Country name </th>
                  <th> Address </th>
                  <th> Pin Code </th>
                  <th> Edit </th>
                  <th> View </th>
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
                  <td><?php echo $file['id']; ?> </td>
                  <td> <?php echo $file['name']; ?> </td>
                  <td> <?php echo $file['email']; ?> </td>
                  <td> <?php echo $file['adhaarnumber']; ?> </td>
                  <td> <?php echo $file['class']; ?> </td>
                  <td> <?php echo $file['dob']; ?> </td>
                  <td> <?php echo $file['gender']; ?> </td>
                  <td> <?php echo $file['phone']; ?> </td>
                  <td> <?php echo $file['image']; ?> </td>
                  <td> <?php echo $file['category']; ?> </td>
                  <td> <?php echo $file['mothername']; ?> </td>
                  <td> <?php echo $file['fathername']; ?> </td>
                  <td> <?php echo $file['gargensname']; ?> </td>
                  <td> <?php echo $file['gargensoccupation']; ?> </td>
                  <td> <?php echo $file['gargensphone']; ?> </td>
                  <td> <?php echo $file['gargensaddress']; ?> </td>
                  <td> <?php echo $file['famallyincome']; ?> </td>
                  <td> <?php echo $file['city']; ?> </td>
                  <td> <?php echo $file['state']; ?> </td>
                  <td> <?php echo $file['country']; ?> </td>
                  <td> <?php echo $file['address']; ?> </td>
                  <td> <?php echo $file['pincode']; ?> </td>
                  <td>
                    <form action="student_edit.php" method="post">
                      <input type="hidden" name="edit_id" value="<?php echo $file['id']; ?> ">
                      <button type="submit" name="edit_btn" class="btn btn-success"><i class="fas fa-edit"></i></button>
                    </form>
                  </td>
                  <td>
                    <form action="student_view.php" method="post">
                      <input type="hidden" name="view_id" value="<?php echo $file['id']; ?> ">
                      <button type="submit" name="view_btn" class="btn btn-info"><i class="fa fa-eye"
                          aria-hidden="true"></i></button>
                    </form>
                  </td>
                  <td>
                    <form action="add_data.php" method="post">
                      <input type="hidden" name="delete_id" value="<?php echo $file['id'];?>">
                      <button type="submit" name="delete_btn" class="btn btn-danger"><i class="fa fa-trash"
                          aria-hidden="true"></i></button>
                    </form>
                  </td>

                </tr>
                <?php
            $i=$i+1; endforeach;
            ?>
              </tbody>
            </table>
            <br />
            <div class="pagination">
              <?php  
        $query = "SELECT COUNT(*) FROM new_admission";     
        $rs_result = mysqli_query($con, $query);     
        $row = mysqli_fetch_row($rs_result);     
        $total_records = $row[0];     
          
    echo "</br>";     
        // Number of pages required.   
        $total_pages = ceil($total_records / $per_page_record);     
        $pagLink = "";       
      
        if($page>=2){   
            echo "<a href='add_data.php?page=".($page-1)."'>  Prev </a>";   
        }       
                   
        for ($i=1; $i<=$total_pages; $i++) {   
          if ($i == $page) {   
              $pagLink .= "<a class = 'active' href='add_data.php?page="  
                                                .$i."'>".$i." </a>";   
          }               
          else  {   
              $pagLink .= "<a href='add_data.php?page=".$i."'>   
                                                ".$i." </a>";     
          }   
        };     
        echo $pagLink;   
  
        if($page<$total_pages){   
            echo "<a href='add_data.php?page=".($page+1)."'>  Next </a>";   
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
        function go2Page() {
          var page = document.getElementById("page").value;
          page = ((page > < ? php echo $total_pages; ? > ) ? < ? php echo $total_pages; ? > : ((page < 1) ? 1 : page));
          window.location.href = 'add_data.php?page=' + page;
        }
      </script>

    </div>
  </div>
</div>
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
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>