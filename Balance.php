<!DOCTYPE html>
<html>
  <head>
    <title>Balance Status</title>
    <link rel="stylesheet" type="text/css" href="Style2.css">

     <div class="topnav">

      <a href="Login.php">DashBoard</a>
      <a href="Deposit.php">Deposit</a>
      <a href="Withdraw.php">Withdraw</a>
      <a class="active" href="Balance.php">Balance Status</a>
      <a href="Delect_account.php">Delect Account</a>
      <a id="logout" href="Login.php">Log out</a>
   
    </div>
  </head>
  <body>

    <br> 
    <br>

     <center><font color="Red"><h1>Alpha-Z 26 Bank Ltd.</h1></font></center>

    <div class="">

      <form class="form-signin" method="post" action="">   

        <h2 class="form-signin-heading">For Confirmation</h2>

        <input type="text" class="form-control" name="email" placeholder="Email Address" required="" autofocus="" />

        <br>
        <br>

        <input type="password" class="form-control" name="pass" placeholder="Password" required=""/>
             
        <br>  
        <br>

       <input type="submit" value="Check" name="searching">
       <input type="reset" value="Reset">

      </form>
    </div>
  </body>
</html>
<?php

    //$email = filter_input(INPUT_POST, 'email');
    $email = filter_input(INPUT_POST, 'email');
    $pass = filter_input(INPUT_POST, 'pass');
    //$pass = filter_input(INPUT_POST, 'pass');
    //$id=rand(1001,9999);

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "formfillup";
    
    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

    if (mysqli_connect_error()){

      die('Connect Error ('. mysqli_connect_errno() .') '
      . mysqli_connect_error());

    }

    if(isset($_POST['searching'])){

      // Create connection
      $email = $_POST['email'];
      $pass = $_POST['pass'];

      $sql2 = "SELECT * FROM pms WHERE Email='$email' AND Password='$pass'";

      //echo $id2;
      $result = mysqli_query($conn, $sql2);
      if (mysqli_num_rows($result) ==1) {

        //header( "Location: DashBoard.php" ); die;
        $email2 = $_POST['email'];
        $pass2 = $_POST['pass'];
        $sql = "SELECT * FROM pms WHERE Email='$email2' AND Password='$pass2'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
           
            echo " <center><font color=Red><h2><br> Your Balance is : " . $row["Balance"]. "<br></font> </h2></center>";
          
          }

        }
        else {

          echo "No match! Please enter the right contact number";

        }

      }
      else{

        //echo '<script>alert("Wrong mobile number")</script>';      
        //echo '<script>alert("Wrong mobile number")</script>'; 
        echo "<br><br><center><font color=Red>Wrong username or password</font></center>";
               
        die();

      }

    }

?>