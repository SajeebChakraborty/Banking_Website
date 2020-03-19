<!DOCTYPE html>
<html>
  <head>

    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="Style.css">

  </head>
  <body>

    <br>

    <center><font color="Red"><h1>Alpha-Z 26 Bank Ltd.</h1></font></center>

    <br>
    <div class="">

      <form class="form-signin" method="post" action="">   

        <h2 class="form-signin-heading">2 step verification</h2>
        
        <input type="text" class="form-control" name="contact" placeholder="Contact no" required="" autofocus="" />

        <br>
        <br>
             
        <a href="Login.php">Back</a>

        <br>
        <br>

       <input type="submit" value="Submit" name="searching">
       <input type="reset" value="Reset">

      </form>
    </div>
  </body>
</html>
<?php

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "formfillup";

  //$name = filter_input(INPUT_POST, 'name');

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {

    die("Connection failed: " . mysqli_connect_error());

  }
  if(isset($_POST['searching'])){
   $email=$_GET['email'];
   //$email = $_POST['email'];
   $contact = $_POST['contact'];
   //$pass = filter_input(INPUT_POST, 'pass');

   $sql2 = "SELECT * FROM pms WHERE Email='$email' AND Contact='$contact'";
   $result = mysqli_query($conn, $sql2);
   if (mysqli_num_rows($result) ==1) {

     header("Location: LoginProcess.php?contact=".$contact);
     die();

   }
   else{

     //echo '<script>alert("Wrong username or password")</script>'; 
     echo "<br><br><center><font color=Red>Wrong Contact no !</font></center";
     die();


    }

  }

?>