<?php
include('config.php');
session_start();
// if(strlen($_SESSION['login'])==0){
//   header('Location: login.php');
// }
if(!isset($_SESSION['login']))
{
	header('location:login.php');
}
$_SESSION['movie_id']="";
$_SESSION['event_id']="";
?> 

<?php
$email = $_SESSION['login'];
$account_query = "select * from users where email='$email'";
 $account_view = $conn ->query($account_query);
 while ($row = $account_view->fetch_assoc()){
   $name=$row['name'];
 }
?>

<!doctype html>
<html lang="en">
  <head>
    
 
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Macondo&display=swap" rel="stylesheet">
    
    <!-- footer part -->
    <link rel="stylesheet" type="text/css" href="footer/footer.css">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="footer/footer.css">

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script src="ie-emulation-modes-warning.js"></script>

<!-- Custom styles for this template -->
<link href="css/rotating-card.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
<link href="css/anotherDefault.css" rel="stylesheet">


    <title>Homepage</title>
    <link rel="shortcut icon" type="image/x-icon" href="../images/logo5.png" />

    <style>
        body{
            background-color: #ccccff;
        }
    .nav-link:hover {
        /* text-decoration: underline; */
        background-color: #006666;       
        border-radius: 5px;
    }
    .carousel-item {
        width: 100%;
        /* height: 630px;  */
        background-size: cover;
    }
    .main{
        text-align: center;
        font-size: 220%;
        font-weight: bold;
        font-family:'Poppins', sans-serif;
        margin-top: 3%;
    }
    .category{
        
        font-size: 200%;
        font-weight: bold;
        font-family:'Poppins', sans-serif;
        margin-top: 3%;
    }

    </style>
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #13B2B8; padding-left:25px; width: 100%;">
        <a class="navbar-brand" href="index1.php" style="font-family: 'Poppins', sans-serif; font-size: 1.5vw; color: black;"><img src="../images/logo5.png" style="width: 7%;">&nbsp <b>Trend Talkies</b><br>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ml-auto">
                
                <li class="nav-item">
                    <a class="nav-link" href="index1.php" style="margin-right: 20px; font-weight: bold;color: white; ">Movies/Events </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view_review&rating.php" style="margin-right: 20px; font-weight: bold;color: white;">Review&Rating</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contactus1.php" style="margin-right: 20px; font-weight: bold;color: white;">Contact Us</a>
                </li>

                
                 
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"style="margin-right: 67px; font-weight: bold;color: white;font-family: 'Macondo', cursive;">
                <?php echo "$name"?>
                 </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="updateprofile.php">Update Profile</a>
                <a class="dropdown-item" href="booking_details.php">Bookings</a>
                <a class="dropdown-item" href="review_rating1.php">Give Review</a>
                <a class="dropdown-item" href="logout.php">Sign Out</a>
                </div>
                </li>
                <!-- <form style="margin:auto;max-width:300px;">
                <input type="text" placeholder="Search..." name="search" style="border-radius: 5px; outline: none;">
                <button type="submit" style="border-radius: 25px; outline: none;"><i class="fa fa-search"></i> </button>
                </form> -->
            </ul>
        </div>
    </nav>

  
    
    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-interval="2000">
                <img src="../images/carousel1.png" class="d-block w-100">
            </div>
            <div class="carousel-item" data-interval="2000">
                <img src="../images/carousel2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-interval="2000">
                <img src="../images/carousel3.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-interval="2000">
                <img src="../images/carousel4.png" class="d-block w-100" alt="...">
            </div>
        </div>

        <div class="container">
        <p class="main">Running Shows</p>
        
        <hr>
        <p class="category">Movies</p>

        <div class="row">
              <?php 
              $count=0;
              $res=$conn->query("select * from movies order by rand() limit 8;");
              while ($row=$res->fetch_object()) {
                // $_SESSION['movie']=;

                // if ($count==20) {
                //   echo "<div class='row'>";
                //   $count=0;
                // }

            echo " 
            <div class='col-md-3 col-sm-12'>
              <div class='card-container'>
                <div class='card'>
                  <div class='front'>
                    <div class='cover'>
                    
                      <img  src='".$row->image."'/> 
                    </div>
                    <div class='content'>
                      <div class='main'>
                        <h3 class='name'>".$row->movie_name ."</h3>

                        <p><b style='color: blue'>IMDB: </b>".$row->rating."⭐</p>

                        <p class='profession'><b style='color: blue'>Genre: </b>".$row->movie_type ."</p>
                        <p class='profession'><b style='color: blue'>In Theatres: </b>".$row->language ."</p>

                      
                      </div>
                    </div>
                  </div>
                  <!-- end front panel -->
                  <div class='back'>
                    <div class='content'>
                      <div class='main'>
                        <h4 class='text-center' style='color: red'>".$row->movie_name ."</h4>
                        <p class='profession'><b style='color: blue'>Release Date: </b>".$row->release_date ."</p>
                        <p class='text-center'><b style='color: blue'>Cast: </b>".$row->movie_cast ." </p>
                        <p class='text-center'><b style='color: blue'>Director: </b>".$row->director ." </p>
                      </div>
                      <div style='margin-top: 10vw;' class='buy_ticket'>

                       <form action='moviedetails.php' method='get' >
                        <input type='hidden' name='movie_id' value='".$row->movie_id."' >    
                        <input type='submit'  class='btn btn-info btn-xs btn-block'  value='Read More' name='submit'> 
                      </form>

                    </div>
                  </div>
                </div> <!-- end card -->
              </div> <!-- end card-container -->
            </div>
          </div>";

          $count++;
        } ?>
        </div>
 
        <hr>
        <p class="category">Events</p>
           <div class="row">
              <?php 
              $count=0;
              $res=$conn->query("select * from events order by rand() limit 8;");
              while ($row=$res->fetch_object()) {
                // $_SESSION['movie']=;

                // if ($count==20) {
                //   echo "<div class='row'>";
                //   $count=0;
                // }

            echo " 
            <div class='col-md-3 col-sm-12'>
              <div class='card-container'>
                <div class='card'>
                  <div class='front'>
                    <div class='cover'>
                    
                      <img  src='".$row->image."'/> 
                    </div>
                    <div class='content'>
                      <div class='main'>
                        <h3 class='name'>".$row->event_name ."</h3>

                        <p class='profession'><b style='color: blue'>Genre: </b>".$row->event_type ."</p>
                        <p class='profession'><b style='color: blue'>Event Date: </b>".$row->event_date ."</p>
                        
                      </div>
                    </div>
                  </div>
                  <!-- end front panel -->
                  <div class='back'>
                    <div class='content'>
                      <div class='main'>
                        <h4 class='text-center' style='color: red'>".$row->event_name ."</h4>
                        <p class='text-center'><b style='color: blue'>Description: </b>".$row->description ." </p>
                      </div>
                      <div style='margin-top: 10vw;' class='buy_ticket'>

                       <form action='eventdetails.php' method='get' >
                        <input type='hidden' name='event_id' value='".$row->event_id."' >
                        <input type='submit'  class='btn btn-info btn-xs btn-block' value='Read More' name='submit'>
                      </form>

                    </div>
                  </div>
                </div> <!-- end card -->
              </div> <!-- end card-container -->
            </div>
          </div>";

          $count++;
        } ?>
        </div>
        
</div>


<br>
<br>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
    
    <?php
    include('footer/footer.php');
    ?>
    <script src="https://kit.fontawesome.com/d03fa9b461.js" crossorigin="anonymous"></script>
  </body>
</html>