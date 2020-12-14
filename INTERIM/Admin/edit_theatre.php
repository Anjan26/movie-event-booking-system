<?php
session_start();
$conn = new mysqli("localhost", "root","","interim");

if($conn->connect_error){
    die("connection error");
}
if(strlen($_SESSION['login'])==0){
    header('Location: index.php');
}
        
          $id=$_GET['id'];
          $query = "select * from theatre where id='$id'";
          $run = mysqli_query($conn,$query);
          while($row = mysqli_fetch_assoc($run)){

            $id= $row['id'];
            $theatre_name=$row['theatre_name'];
            $email=$row['email'];
            $contact_no=$row['contact_no'];
            
           
          }
          
          if(isset($_POST['update']))
          {         
            
                    $theatre_name=$_POST['theatre_name'];
                    $email=$_POST['email'];
                    $contact_no=$_POST['contact_no'];
                    

             $update = "update theatre set theatre_name='$theatre_name', email='$email', contact_no='$contact_no'  where id='$id'";
             if (mysqli_query($conn, $update)) {
                echo"<script>alert('Record Updated successfully!');window.location.href = 'theatrelist.php'</script>";
               
              } else {
                 echo "<b style='color:red;'>Error:</b> <b>Something is wrong!</b>";
              }
             }

?>



<html>
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
   
    <title>Update Theatre Details</title>
    <link rel="shortcut icon" type="image/x-icon" href="../images/logo5.png" />      
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <!-- <link href="css/simple-sidebar.css" rel="stylesheet"> -->
  <meta name="description" content="">
  <meta name="author" content="">
        <style></style>
        <script>
      
        </script>
    </head>
    <body style="background-color: #13B2B8;">


    <div class="container">
        <h1 class="mt-4 mb-3">Update Informations</h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="theatrelist.php">Back</a>
            </li>
            <li class="breadcrumb-item active">Theatre Details</li>
        </ol>
        <div style="background-color: #ccccff;  padding: 2%; border-radius: 5px;">
                <form method="post" enctype="multipart/form-data">                          
                    <div class="row">
                        <div class="col-lg-6 mb-6"> 
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                                <label class="control-label">Theatre Name:</label>
                                <input type="text" class="form-control" name="theatre_name" value="<?php echo $theatre_name;?>">
                            </div>
                        <div class="col-lg-6 mb-6"> 
                            <label class="control-label">Email Id:</label>
                            <input type="text" name="email" class="form-control "  value="<?php echo $email;?>">
		                       
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-6 mb-6"> 
                            <label class="control-label">Contact No:</label>
                            <input type="text" class="form-control" name="contact_no"  value="<?php echo $contact_no;?>">
                        </div>  
                        
                    </div>

                                          
                        <div class="modal-footer">
                            <a href="theatrelist.php"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button></a>
                            <button type="submit" class="btn btn-primary" name="update" >Update</button>
                        </div>
                      </form>
    </div>
    </div>     
    </body>
</html>