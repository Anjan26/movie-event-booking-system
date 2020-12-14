<?php
session_start();
$conn = new mysqli("localhost", "root","","interim");

if($conn->connect_error){
    die("connection error");
}
// if(strlen($_SESSION['login'])==0){
//     header('Location: login.php');
// }
if(!isset($_SESSION['login']))
{
	header('location:login.php');
}
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
    
    
    <title>Post Review</title>
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

.clearfix:after {
	content: "";
	display: block;
	clear: both;
	visibility: hidden;
	height: 0;
}
.form_wrapper {
	background:#fff;
  width:800px;
  border-radius: 5px;
	max-width:100%;
	box-sizing:border-box;
	padding:15px;
	margin:3% auto 0;
	position:relative;
	z-index:1;
	-webkit-box-shadow:0 23px 4px -21px rgba(0, 0, 0, 0.9);
	-moz-box-shadow:0 23px 4px -21px rgba(0, 0, 0, 0.9);
	box-shadow:0 23px 4px -21px rgba(0, 0, 0, 0.9);
}
.form_container {
	padding:15px;
	border:1px dashed #ccc;
}
.form_wrapper h2 {
	font-size:1.5em;
	line-height:1.5em;
	margin:0;
}
.form_wrapper h3 {
	font-size:1.1em;
	font-weight:normal;
	line-height:1.5em;
	margin:0;
}
.form_wrapper .row {
	margin:10px -15px;
}
.form_wrapper .row > div {
	padding:0 15px;
	box-sizing:border-box;
}
.form_wrapper .col_half {
	width:50%;
	float:left;
}
.form_wrapper label {
	display:block;
	margin:0 0 5px;
}
.form_wrapper .input_field, .form_wrapper .textarea_field {
	position:relative;
}
.form_wrapper .input_field > span, .form_wrapper .textarea_field > span {
	position:absolute;
	left:0;
	top:0;
	color:#333;
	height:100%;
	border-right:1px solid #ccc;
	text-align:center;
	width:30px;
}
.form_wrapper .textarea_field > span {
	border-bottom:1px solid #ccc;
	max-height:35px;
}
.form_wrapper .input_field > span > i, .form_wrapper .textarea_field > span > i {
	padding-top:12px;
}
.form_wrapper input[type="text"], .form_wrapper input[type="email"], .form_wrapper input[type="tel"], textarea {
	width:100%;
	padding:10px 10px 10px 35px;
	border:1px solid #ccc;
	box-sizing:border-box;
	outline:none;
	-webkit-transition: all 0.30s ease-in-out;
	-moz-transition: all 0.30s ease-in-out;
	-ms-transition: all 0.30s ease-in-out;
	transition: all 0.30s ease-in-out;
}
.form_wrapper textarea {
	height:8em;
}
.form_wrapper input[type="text"]:focus, .form_wrapper input[type="email"]:focus, .form_wrapper input[type="tel"]:focus, textarea:focus {
	-webkit-box-shadow:0 0 2px 1px rgba(255, 169, 0, 0.5);
	-moz-box-shadow:0 0 2px 1px rgba(255, 169, 0, 0.5);
	box-shadow:0 0 2px 1px rgba(255, 169, 0, 0.5);
	border:1px solid #f5ba1a;
}
.form_wrapper input[type="submit"] {
	background:#f5ba1a;
	height:50px;
	line-height:50px;
	width:100%;
	border:none;
	outline:none;
	cursor:pointer;
	color:#fff;
	font-size:1.2em;
	-webkit-transition: all 0.30s ease-in-out;
	-moz-transition: all 0.30s ease-in-out;
	-ms-transition: all 0.30s ease-in-out;
	transition: all 0.30s ease-in-out;
}
.form_wrapper input[type="submit"]:hover, .form_wrapper input[type="submit"]:focus {
	background:#daa106;
}
.credit{
	position:relative;
	z-index:1;
	text-align:center;
	padding:15px;
	color:#f5ba1a;	
}
.credit a{
	color:#daa106;	
}
@media (max-width: 600px) {
.form_wrapper .col_half {
	width:100%;
	float:none;
}
.form_wrapper label {
	margin:10px 0;
}
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
               
            </ul>
        </div>
    </nav>

  
    <br> 
    
   <div class="container">
        <h1 class="mt-4 mb-3" style="font-family: 'Poppins', sans-serif;">Post Review</h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index1.php">Home</a>
            </li>
            <li class="breadcrumb-item active">Review and Rating</li>
        </ol>
        

<div class="form_wrapper">
  <div class="form_container">
    <form method="post">
      <div class="row clearfix">
        <div class="col_half">
          <label>Name</label>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
            <input type="text" name="name" placeholder="Enter Name" required />
          </div>
        </div>
        <div class="col_half">
          <label>Show watched</label>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-film"></i></span>
            <input type="text" name="show_watched" placeholder="Show Name" />
          </div>
        </div>
      </div>
      <div class="row clearfix">
        <div class="col_half">
          <label>Rating</label>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-star"></i></span>
            <input type="text" name="rating" placeholder="Rate out of 10" required  />
          </div>
        </div>
      </div>
        <div>
          <label>Review</label>
          <div class="textarea_field"> <span><i aria-hidden="true" class="fa fa-comment"></i></span>
            <textarea cols="46" rows="3" name="review"></textarea>
          </div>
        </div>
      
      <input class="button" type="submit" name="submit" value="Submit" />
<?php
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $show_watched = $_POST['show_watched'];
  $rating = $_POST['rating'];
  $review = $_POST['review'];

  $sql="insert into review_rating(name,show_watched,rating,review) values('$name','$show_watched','$rating','$review')";
  if (mysqli_query($conn, $sql)) {
   echo "<center><b style='color:#00b33c;'>Success:</b> <b>Review Posted!</b></center>";
  } else {
    echo "<center><b style='color:#00b33c;'>Error:</b> <b>Something is wrong!</b></center>";
  }
  mysqli_close($conn);
   }
  ?>
    </form>
  </div>
</div>

</div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
    <br>
    <br>
    
    <?php
    include('footer/footer.php');
    ?>
    <script src="https://kit.fontawesome.com/d03fa9b461.js" crossorigin="anonymous"></script>
  </body>
</html>