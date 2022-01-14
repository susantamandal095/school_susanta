<?php
include('nav/nav.php');
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  color: black;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
</head>
<body>

<h2 style="text-align:center">Developer Desk</h2>

<div class="card">
  <img src="img/100.jpg" alt="susanta" style="width:100%">
  <h1>Susanta Mandal</h1>
  <p class="title">Full Stack Developer at Zenodeproinfotech private limited</p>
  <p>Phone No : 9679337134</p>
  <p>Email Id : susanta@zencodepro.com / susantamandal095@gmail.com</p>
  <div style="margin: 24px 0;">
    

    <a href="https://www.linkedin.com/in/susanta-mandal-b89a69127/?midToken=AQEKs2tdOcbNJg&trk=eml-email_accept_invite_single_01-header-14-profile&trkEmail=eml-email_accept_invite_single_01-header-14-profile-null-8oodax%7Ekabyj51m%7Ewd-null-neptune%2Fprofile%7Evanity%2Eview"><i class="fa fa-linkedin"></i></a>  
    <a href="https://www.facebook.com/profile.php?id=100007391058289"><i class="fa fa-facebook"></i></a> 
    <a href="https://github.com/susantamandal095"><i class="fa fa-dribbble"></i></a>
  </div>
  <p><button>Contact</button></p>
</div>

</body>
</html>

<?php     
include('nav/footer.php');
?>