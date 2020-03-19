<!DOCTYPE html>
<html>
  <head>

    <title>Delect Account</title>
    <link rel="stylesheet" type="text/css" href="Style2.css">

    <div class="topnav">

      <a href="Login.php">DashBoard</a>
      <a href="Deposit.php">Deposit</a>
      <a href="Withdraw.php">Withdraw</a>
      <a href="Balance.php">Balance Status</a>
      <a  class="active" href="Delect_account.php">Delect Account</a>
      <a id="logout" href="Login.php">Log out</a>
   
    </div>

    <br>
    <br>

    <center><font color="Red"><h1>Alpha-Z 26 Bank Ltd.</h1></font></center>

  </head>
  <body>
    
    <div class="">

      <form class="form-signin" method="post" action=""> 

        <h2 class="form-signin-heading">For Confirmation</h2>

        <input type="text" class="form-control" name="email" placeholder="Email Address" required="" autofocus="" />

        <br>
        <br>

        <input type="password" class="form-control" name="pass" placeholder="Password" required=""/>

        <br>
        <br>      
        
       <input type="submit" value="Delect" name="searching">
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

  $email = filter_input(INPUT_POST, 'email');
  $pass = filter_input(INPUT_POST, 'pass');

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {

    die("Connection failed: " . mysqli_connect_error());

  }
  if(isset($_POST['searching'])){

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $sql2 = "SELECT * FROM pms WHERE Email='$email' AND Password='$pass'";
    //echo $id2;
    $result = mysqli_query($conn, $sql2);

    if (mysqli_num_rows($result) ==1) {

      $sql="DELETE FROM pms Where Email='$email' AND Password='$pass'";

      if (mysqli_query($conn, $sql)) {

  	    header("Location: Login.php");
  	    echo "<br><br><center><font color=Red>Delect Account succssfully !</font></center";
        //echo "Delect Account succssfully";

      } 
      else {

        echo "Error delecting record: " . mysqli_error($conn);

      }

    }
    else{

      echo "<br><br><center><font color=Red>Wrong username or password !</font></center";

    }

  }

  mysqli_close($conn);
  
?>