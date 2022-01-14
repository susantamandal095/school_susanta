<?php
include('nav/nav.php');
include('nav/config.php'); 
$sql = "SELECT * FROM notices ORDER BY date DESC";
$result = mysqli_query($con, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sqls = "SELECT * FROM results ORDER BY date DESC";
$results = mysqli_query($con, $sql);

$filess = mysqli_fetch_all($results, MYSQLI_ASSOC);
?>
<!------------------------------slider------------------------------>
<div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/c1.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
          <p><a class="btn btn-primary btn-lg" href="adminpanale/adminlogin.php">Click for Admin Login Hare!</a></p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/c1.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          <p><a class="btn btn-primary btn-lg btn-learn" href="add_form.php">Click for Admission</a></p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/c1.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
          <p><a class="btn btn-primary btn-lg btn-learn" href="digital_lib.php">Click for Digital Library</a></p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<!---------------------------end of slider------------------------------>
<div class="container-fluid bg-info">
<div class="row">
  <div class="col-sm-6" style="padding: 20px;">
    <div class="embed-responsive embed-responsive-21by9" style="border-radius: 50px; border: 20px solid steelblue;">
      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0"
        allowfullscreen></iframe>
    </div>
  </div>
  <div class="col-sm-3" style="padding: 20px;">
    <div class="card card_new bg-dark" style="border-radius: 50px; border: 20px solid steelblue;">
      <h5 class="card-header text-light">Results</h5>
      <div class="card-body text-light">
        <marquee behavior="scroll" width="100%" direction="up" height="150px" scrollamount="2"
          onmouseover="this.stop();" onmouseout="this.start();">
          <?php $i=1; foreach ($filess as $file): ?>
          <ul>
            <li><?php echo $i; ?>
              <?php echo $file['date']; ?><br>
              <?php echo $file['class']; ?><br>
              <a href="results_id.php?file_id=<?php echo $file['id']?>">Click Hare</a></li>
          </ul>
          <?php $i=$i+1; endforeach;?>
        </marquee>
        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
      </div>
    </div>
  </div>
  <div class="col-sm-3" style="padding: 20px;">
    <div class="card card_new bg-dark" style="border-radius: 50px; border: 20px solid steelblue;">
      <h5 class="card-header text-light">Notices</h5>
      <div class="card-body text-light">
        <marquee behavior="scroll" width="100%" direction="up" height="150px" scrollamount="2"
          onmouseover="this.stop();" onmouseout="this.start();">
          <?php $i=1; foreach ($files as $file): ?>
          <ul>
            <li><?php echo $i; ?>
              <?php echo $file['date']; ?><br>
              <?php echo $file['noticebody']; ?><br>
              <?php echo $file['class']; ?><br>
              <a href="notice_id.php?file_id=<?php echo $file['id'] ?>">Click Hare</a></li>
          </ul>
          <?php $i=$i+1; endforeach;?>
        </marquee>
        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
      </div>
    </div>
  </div>
</div>
          </div>
<!---------------principal col------------->

<div class="container-fluid bg-dark">
  <div class="row">
    <div class="col">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">HOME</a></li>
          <li class="breadcrumb-item active" aria-current="page">PRINCIPAL</li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<div class="container-fluid bg-info">
<div class="row">
  <div class="col-sm-6">
    <div class="card border-info mb-4" style="border-radius: 50px; border: 20px solid steelblue;">
      <div class="card-body text-info">
        <h5 class="card-title">Info card title</h5>
        <p class="card-text text-dark font-italic"><i class="fa fa-arrow-right" aria-hidden="true"></i> “Education is
          the most powerful weapon which you can use to change the world.”<b> -Nelson Mandela</b></p>
        <p class="card-text text-dark font-italic"><i class="fa fa-arrow-right" aria-hidden="true"></i> “It’s not that
          I’m so smart, it’s just that I stay with problems longer”<b> – Albert Einstein</b></p>
        <p class="card-text text-dark font-italic"><i class="fa fa-arrow-right" aria-hidden="true"></i> “All the wealth
          of the world cannot help one little Indian village if the people are not taught to help themselves. Our work
          should be mainly educational, both moral and intellectual.”<b> – Swami Vivekananda </b></p>
        <p class="card-text text-dark font-italic"> <i class="fa fa-arrow-right" aria-hidden="true"></i> “Educate and
          raise the masses, and thus alone a nation is possible.”<b> – Swami Vivekananda</b>
        </p>
        <p class="card-text text-dark font-italic"><i class="fa fa-arrow-right" aria-hidden="true"></i> “A dream is not
          that which you see while sleeping, it is something that does not let you sleep.”<b> – APJ Abdul Kalam</b></p>
      </div>
    </div>
  </div>

  <div class="col-sm-6" style="padding: 21px;">
    <div class="card border-light mb-4" style="border-radius: 50px; border: 20px solid steelblue;">
      <div class="card-body text-muted">
        <h5 class="card-title">Light card title</h5>
        <img src="img/cls.jpg" class="card-img-top" alt="..." />
      </div>
    </div>
  </div>
</div>
          </div>
<!------------------activity-------------------------->
<div class="container-fluid bg-dark">
  <div class="row">
    <div class="col">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">HOME</a></li>
          <li class="breadcrumb-item active" aria-current="page">ACTIVITY</li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<div class="container-fluid bg-info">
<div class="row">
  <div class="col-sm-3" style="padding: 15px;">
    <div class="card" style="height: 437px;width: 18rem; border-radius: 50px;">
      <img src="img/a1.jpg" class="card-img-top" style="border-radius: 50px;" alt="..." />
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text card-text_others">
          Some quick example text to build on the card title and make up the bulk of the
          card's content.
        </p>
      </div>
      <div class="card-body" style="text-align: center;">
        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#myModal">More</button>
      </div>
    </div>
  </div>
  <div class="col-sm-3" style="padding: 15px;">
    <div class="card" style="width: 18rem;height: 437px;border-radius: 50px;">
      <img src="img/a2.jpg" class="card-img-top" style="border-radius: 50px;" alt="..." />
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text card-text_others">
          Some quick example text to build on the card title and make up the bulk of the
          card's content.
        </p>
      </div>
      <div class="card-body" style="text-align: center;">
        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#myModal">More</button>
      </div>
    </div>
  </div>
  <div class="col-sm-3" style="padding: 15px;">
    <div class="card" style="width: 18rem;height: 437px;border-radius: 50px;">
      <img src="img/a3.jpg" class="card-img-top" style="border-radius: 50px;" alt="..." />
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text card-text_others">
          Some quick example text to build on the card title and make up the bulk of the
          card's content.
        </p>
      </div>
      <div class="card-body" style="text-align: center;">
        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#myModal">More</button>
      </div>
    </div>
  </div>
  <div class="col-sm-3" style="padding: 15px;">
    <div class="card" style="width: 18rem;height: 437px;border-radius: 50px;">
      <img src="img/a1.jpg" class="card-img-top" style="border-radius: 50px;" alt="..." />
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text card-text_others">
          Some quick example text to build on the card title and make up the bulk of the
          card's content.
        </p>
      </div>
      <div class="card-body" style="text-align: center;">
        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#myModal">More</button>
      </div>
    </div>
  </div>
</div>
          </div>
<!-- ..................................................... -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-info text-light">
        <h4 class="modal-title">Upcoming Activity</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <h5> <span class="text-dark"> <b style="color: brown"><em> Upcoming Activity Is Comeing Soon Thank You !!.. </b></em></span> <i
            class="fa fa-smile-o text-warning" aria-hidden="true"></i> </h5>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary bg-danger" data-dismiss="modal"><i class="fa fa-times-circle" aria-hidden="true"></i> Close</button>
      </div>

    </div>
  </div>
</div>

<div class="container-fluid bg-dark">
  <div class="row">
    <div class="col">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">HOME</a></li>
          <li class="breadcrumb-item active" aria-current="page">IMAEGE GALARY</li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<div class="container-fluid bg-info">
<div class="row">
  <div class="col-sm-3" style="padding: 15px;">
    <div class="card border-light mb-4" style="border-radius: 50px; border: 20px solid steelblue;">
      <div class="card-body text-muted">
        <h5 class="card-title">Light card title</h5>
        <img src="img/about.jpg" class="card-img-top" alt="..." />
      </div>
    </div>
  </div>
  <div class="col-sm-3" style="padding: 15px;">
    <div class="card border-light mb-4" style="border-radius: 50px; border: 20px solid steelblue;">
      <div class="card-body text-muted">
        <h5 class="card-title">Light card title</h5>
        <img src="img/about.jpg" class="card-img-top" alt="..." />
      </div>
    </div>
  </div>
  <div class="col-sm-3" style="padding: 15px;">
    <div class="card border-light mb-4" style="border-radius: 50px; border: 20px solid steelblue;">
      <div class="card-body text-muted">
        <h5 class="card-title">Light card title</h5>
        <img src="img/about.jpg" class="card-img-top" alt="..." />
      </div>
    </div>
  </div>
  <div class="col-sm-3" style="padding: 15px;">
    <div class="card border-light mb-4" style="border-radius: 50px; border: 20px solid steelblue;">
      <div class="card-body text-muted">
        <h5 class="card-title">Light card title</h5>
        <img src="img/about.jpg" class="card-img-top" alt="..." />
      </div>
    </div>
  </div>
</div>
</div>





<?php
include('nav/footer.php'); 
?>