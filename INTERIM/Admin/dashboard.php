<?php
session_start();
$conn = new mysqli("localhost", "root","","interim");

if($conn->connect_error){
    die("connection error");
}
if(strlen($_SESSION['login'])==0){
    header('Location: index.php');
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Metal+Mania&family=Original+Surfer&display=swap" rel="stylesheet">
    

    <!-- Sidenav CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.0/animate.min.css">
    <script src="https://kit.fontawesome.com/d03fa9b461.js" crossorigin="anonymous"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js" integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous"></script>
   

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <!-- <link href="css/simple-sidebar.css" rel="stylesheet"> -->
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>
  <link rel="shortcut icon" type="image/x-icon" href="../images/logo5.png" /> 
</head>
<style>
    
    #wrapper {
    overflow-x: hidden;
 }

#sidebar-wrapper {
  min-height: 100vh;
  margin-left: -15rem;
  -webkit-transition: margin .25s ease-out;
  -moz-transition: margin .25s ease-out;
  -o-transition: margin .25s ease-out;
  transition: margin .25s ease-out;
}

#sidebar-wrapper .sidebar-heading {
  padding: 0.875rem 1.25rem;
  font-size: 1.2rem;
}

#sidebar-wrapper .list-group {
  width: 15rem;
}

#page-content-wrapper {
  min-width: 100vw;
}

#wrapper.toggled #sidebar-wrapper {
  margin-left: 0;
}

@media (min-width: 768px) {
  #sidebar-wrapper {
    margin-left: 0;
  }

  #page-content-wrapper {
    min-width: 0;
    width: 100%;
  }

  #wrapper.toggled #sidebar-wrapper {
    margin-left: -15rem;
  }
}
#list{
    background-color: #13B2B8; 
    color: black;
}
#list:hover{   
    background-color: #ccccff;            
    }
</style>

<body style="background-color: #ccccff;">
   
<div class="d-flex" id="wrapper">

<!-- Sidebar -->
<div class=" border-right" id="sidebar-wrapper"  style="background-color: #13B2B8;">
  <div class="sidebar-heading" style="color:black;"><u><b>Contents </b></u></div>
  <div class="list-group list-group-flush">
    <a href="dashboard.php" class="list-group-item list-group-item-action" id="list"><i class="fas fa-tachometer-alt"></i>&nbsp Dashboard</a>
    <a href="movieslist.php" class="list-group-item list-group-item-action" id="list"><i class="fas fa-list-ol"></i>&nbsp Movies List</a>
    <a href="eventslist.php" class="list-group-item list-group-item-action" id="list"><i class="fas fa-list-ol"></i>&nbsp Events List</a>
    <a href="theatrelist.php" class="list-group-item list-group-item-action" id="list"><i class="fas fa-desktop"></i>&nbsp Theatre List</a>
    <a href="user_bookings.php" class="list-group-item list-group-item-action" id="list"><i class="fas fa-users"></i>&nbsp User Bookings</a>
    <a href="managequery.php" class="list-group-item list-group-item-action" id="list"><i class="far fa-question-circle"></i>&nbsp Manage Query</a>
    <a href="changepassword.php" class="list-group-item list-group-item-action" id="list"><i class="fas fa-eye"></i>&nbsp Change Password</a>
    <a href="logout.php" class="list-group-item list-group-item-action" id="list"><i class="fas fa-power-off"></i>&nbsp Logout</a>
  </div>
</div>
<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">

  <nav class="navbar navbar-expand-lg navbar-light border-bottom" style="background-color: #13B2B8;">
    <button class="btn btn-light" id="menu-toggle">Menu</button>

    <a class="navbar-brand" href="#" style="font-family: 'Poppins', sans-serif; font-size: 1.5vw; color: black;"><img src="../images/logo5.png" style="width: 7%;  margin-left:2%;">&nbsp <b>Trend Talkies</b>
        </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
       
      </ul>
    </div>
  </nav>



<div class="container-wrapper">
    <div class="row">
          <h2 class="page-title" style="width:80%; padding:0.5%;margin-top:2%;margin-left:3.5%; padding-left: 1%; margin-bottom: 3%; background-color:#336699;border-radius: 10px; box-shadow: 5px 5px #888888; color:#ffffcc;">Dashboard</h2>
          <br>
          <div class="column">
            <div class="row">
                <div class="col-md-4" style="margin-left: 9%; ">
                    
                           
                  <?php
                   $query = "select count(movie_id) from movies";
                   $result = mysqli_query($conn,$query);
                  ?>

                    <div class="card text-center" style="width: 18rem;">
                      <div class="card-body" style="background-color: #336699; color: #ffffcc;">
                         <h5 class="card-title">
                          <?php
                          while($row = $result->fetch_assoc()){
                           echo "".$row["count(movie_id)"];
                           }
                          ?>
                         </h5>
                          <p class="card-text"><b>MOVIES LIST</b></p>
                          <a href="movieslist.php" class="btn btn-light">Full Detail <i class="fas fa-arrow-circle-right"></i> </a>
                      </div>
                    </div>
                </div>



                <div class="col-md-4" style="margin-left: 9%; ">                         
                    <?php
                    $query = "select count(id) from contactusquery";
                    $result = mysqli_query($conn,$query);
                    ?>
                    <div class="card text-center" style="width: 18rem;">
                      <div class="card-body" style="background-color: #336699; color: #ffffcc;">
                          <h5 class="card-title">
                    <?php
                      while($row = $result->fetch_assoc()){
                        echo "".$row["count(id)"];
                      }
                    ?>
                          </h5>
                          <p class="card-text"><b>TOTAL QUERIES</b></p>
                          <a href="managequery.php" class="btn btn-light">Full Detail <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                </div>
              </div>
          
                    
              <div class="row">
                <div class="col-md-4" style="margin-left: 9%; ">
                    
                           
                  <?php
                   $query = "select count(event_id) from events";
                   $result = mysqli_query($conn,$query);
                  ?>

                    <div class="card text-center" style="width: 18rem;">
                      <div class="card-body" style="background-color: #336699; color: #ffffcc;">
                         <h5 class="card-title">
                          <?php
                          while($row = $result->fetch_assoc()){
                           echo "".$row["count(event_id)"];
                           }
                          ?>
                         </h5>
                          <p class="card-text"><b>EVENTS LIST</b></p>
                          <a href="eventslist.php" class="btn btn-light">Full Detail <i class="fas fa-arrow-circle-right"></i> </a>
                      </div>
                    </div>
                </div>



                <div class="col-md-4" style="margin-left: 9%; ">                         
                    <?php
                    $query = "select count(id) from theatre";
                    $result = mysqli_query($conn,$query);
                    ?>
                    <div class="card text-center" style="width: 18rem;">
                      <div class="card-body" style="background-color: #336699; color: #ffffcc;">
                          <h5 class="card-title">
                    <?php
                      while($row = $result->fetch_assoc()){
                        echo "".$row["count(id)"];
                      }
                    ?>
                          </h5>
                          <p class="card-text"><b>THEATRE LIST</b></p>
                          <a href="theatrelist.php" class="btn btn-light">Full Detail <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                </div>
              </div>
        </div>
</div>

    


<!-- Bootstrap core JavaScript
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

<!-- Menu Toggle Script -->
<script>
$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});
</script>
</body>
</html>