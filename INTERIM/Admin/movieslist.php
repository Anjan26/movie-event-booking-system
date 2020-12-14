<?php
session_start();
$conn = new mysqli("localhost", "root","","interim");

if($conn->connect_error){
    die("connection error");
}
if(strlen($_SESSION['login'])==0){
    header('Location: index.php');
}
if(isset($_POST['submit']))
                 {
                    $movie_name=$_POST['movie_name'];
                    $movie_type=$_POST['movie_type'];
                    $language=$_POST['language'];
                    $duration=$_POST['duration'];
                    $movie_cast=$_POST['movie_cast'];
                    $director=$_POST['director'];
                    $date=$_POST['date'];
                    $rating=$_POST['rating'];
                    
                    $target_dir = "../images/";
                    $target_file = $target_dir . basename($_FILES["images"]["name"]);
                    move_uploaded_file($_FILES["images"]["tmp_name"], $target_file);
                  
                    $link=$_POST['link'];

                    $sql="INSERT INTO movies(movie_name,movie_type,language,duration,movie_cast,director,release_date,rating,image,link) VALUES('$movie_name','$movie_type','$language','$duration','$movie_cast','$director','$date','$rating','$target_file','$link')";
                    if (mysqli_query($conn, $sql)) {
                       //  echo "<b style='color:#00b33c;'>Success:</b> <b>Record saved successfully!</b>";
                      
                     } else {
                        echo "<b style='color:#00b33c;'>Error:</b> <b>Something is wrong!</b>";
                     }
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

  <title>Movies List</title>
  <link rel="shortcut icon" type="image/x-icon" href="../images/logo5.png" /> 

  <script>
$(document).ready(function(){
    $("#myModal").on("show.bs.modal", function(event){
        // Get the button that triggered the modal
        var button = $(event.relatedTarget);

        // Extract value from the custom data-* attribute
        var titleData = button.data("title");
        $(this).find(".modal-title").text(titleData);
    });
});


</script>


</head>
<style>
  
	td img{
		width: 50px;
		height: 75px;
		margin:auto;
	}
    
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

table { 
  width: 100%; 
  border-collapse: collapse; 
}

@media
only screen and (max-width: 760px), (min-device-width: 768px) 
  and (max-device-width: 1024px)   {
  table, thead, tbody, th, td, tr {
    display: block;
  }
  thead tr {
    position: absolute;
    top: -9999px;
    left: -9999px;
  }
  tr { border: 1px solid #ccc; }
  td {
    border: none;
    border-bottom: 1px solid #eee;
    position: relative;
    padding-left: 200px;
    margin-left: 150px;
  }
  td:before {
    position: absolute;
    top: 12px;
    left: 6px;
    width: 200px;
    padding-right: 40px;
    white-space: nowrap;
    margin-left: -150px;
  }
  td:nth-of-type(1):before { content: "#"; }
  td:nth-of-type(2):before { content: "Cover"; }
  td:nth-of-type(3):before { content: "Title"; }
  td:nth-of-type(4):before { content: "Type";}
  td:nth-of-type(5):before { content: "Duration"; }
  td:nth-of-type(6):before { content: "Action";}
}

.myButton:active {
	position:relative;
	top:1px;
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
        <div class="col-md-12 ">
        <h2 class="page-title" style="width:80%; padding:0.5%;margin-top:2%;margin-left:1.5%; padding-left: 1%; background-color:#336699;border-radius: 10px; box-shadow: 5px 5px #888888; color:#ffffcc;">Movies List</h2>
        <br>
        <div class="row">
          <div class="col-md-12">
            <button class="myButton btn btn-danger" type="button" id="new_movie" style="margin-left: 3%"; data-toggle="modal" data-target="#myModal" data-title="New Movie"><i class="fa fa-plus"></i> New Movie</button>
          
          <div id="myModal" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <form method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal Window</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">                        
                        <div class="form-group" >
                          
				                    <input type="hidden" name="movie_id">
                            <label class="control-label">Movie Name:</label>
                            <input type="text" class="form-control" name="movie_name">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Movie Type:</label>                   
                            <select  class="form-control" name="movie_type" >
                              <option value=""></option>
                              <option value="Action">Action</option>
                              <option value="Adventure">Adventure</option>
                              <option value="Comedy">Comedy</option>
                              <option value="Crime">Crime</option>
                              <option value="Drama">Drama</option>
                            </select>
                        </div>  
                        <div class="form-group">
                            <label class="control-label">Language:</label>
                            <select name="language"  class="form-control">
                              <option value=""></option>
                              <option value="English">English</option>
                              <option value="Hindi">Hindi</option>
                              <option value="Telugu">Telugu</option>
                              <option value="Tamil">Tamil</option>
                            </select>
                        </div> 
                        <div class="form-group">
                            <label class="control-label">Duration:</label>
                            <input type="text" name="duration" required="" class="form-control " >
		                       
			                  </div>
                        
                        <div class="form-group">
                            <label class="control-label">Movie Cast:</label>
                            <input type="text" class="form-control" name="movie_cast" >
                        </div>  
                        <div class="form-group">
                            <label class="control-label">Director:</label>
                            <input type="text" class="form-control" name="director">                       
                        </div>  
                        <div class="form-group">
                            <label class="control-label">Release Date:</label>
                            <input type="date" class="form-control" name="date">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Rating:</label>
                            <input type="floatval" class="form-control" name="rating">
                        </div>  
                        <div class="form-group">
                            <label class="control-label">Link:</label>
                            <input type="text" class="form-control" name="link">
                        </div> 
                        <div class="form-group">
                            <label class="control-label">Image:</label>
                            <input class="form-control" type="file" name="images" required autofocus>
                        </div>                         
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>          
          
          
          </div>
        </div>
            <div class="row">
                <div class="card col-md-8 mt-3" style="margin-left: 5%;background-color: #ccccff;">
                <div class="card-body">
                <?php
                  
                  if(isset($_REQUEST['del']))
                  {
                      $did=intval($_GET['del']);
                      $sql = "delete from movies where movie_id='$did'";
                  
                      if (mysqli_query($conn, $sql)){
                      echo "<b style='color:#00b33c;margin-left:2%;'>Success:</b> <b>Details Deleted Successfully!</b> ";
                      }
                  } 

                 ?>
          

				<table class="table table-bordered">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Cover</th>
							<th class="text-center">Title</th>
              <th class="text-center">Type</th>
              <th class="text-center">Duration</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
          
            <?php
          
          $movie = $conn->query("SELECT * FROM movies");
          $cnt=1;
          while($row=$movie->fetch_assoc()){

            echo "<tr role='row'>";
            echo "<td role='cell'>$cnt</td>";
            echo "<td role='cell'> <img src='".$row['image']."' alt=''> </td>";
            echo "<td role='cell'>".$row["movie_name"]."</td>"; 
            echo "<td role='cell'>".$row["movie_type"]."</td>";
            echo "<td role='cell'>".$row["duration"]."</td>"; 
            echo '<td> 
            <center>
            <div class="btn-group">
              <button type="button" class="btn btn-danger">Action</button>
              <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item edit_movie"  type="submit" href="edit_movie.php?movie_id='.$row['movie_id'].'" >Edit</a> 
                <div class="dropdown-divider"></div>
                <a class="dropdown-item delete_movie"  href="movieslist.php?del='.$row['movie_id'].'"  onclick=\'javascript:return confirm("Do you really want to delete this record");\'>Delete</a>
              </div>
            </div>
            </center>
            </td>';             

					   
            echo"</tr>";
                        
            ?>
         <?php $cnt=$cnt+1; } ?> 
        
      
					</tbody>
				</table>
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