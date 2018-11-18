<!DOCTYPE html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>
<?php
$sql = "SELECT firstname, phone, charges FROM signup_worker";
$result = $conn->query($sql);

//if ($result->num_rows > 0) {
    // output data of each row
    //while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
   // }
//} else {
  //  echo "0 results";

//$conn->close();
?>

<html lang="en" dir="ltr">
<head>
<title>service</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css" type="text/css">
<!--[if lt IE 9]><script src="scripts/html5shiv.js"></script><![endif]-->
<style>
  *
  {
    font-family:Arial, Helvetica, sans-serif;
  }
</style>
</head>
<body>
<!--
<div class="wrapper row1">
  <header id="header" class="clear">
    <div id="hgroup">
      <h1><a href="#">HELP ON THE GO</a></h1>
      <h2>Always in your service...!</h2>
    </div>
    <nav>
      <ul>
        <li><a href="#">HOME</a></li>
        <li><a href="#">PROFILE</a></li>
      </ul>
    </nav>
  </header>
</div> -->
<div class="header">
  <a href="#default" class="logo" style="font-size:30px;">Help On The Go</a>
  <div class="header-right">
    <!-- <a href="homepage-final.html">Home</a> -->
    <a class="active" href="HTML/services.html">Home</a>
    <a href="../HTML/login.html">Sign Out</a>
    <a href="#about">About</a>
  </div>
</div>
<!-- content -->
<br>
<br>
<br>
<h1 style="color: #ffffff;
        font-size:35px;margin-left:510px;color:white">CHOOSE WORKER</h1>
        
  <div class="tabbed">
  <div class="tab-content" style="display:block;margin-left:150px">
            <div class="items">
              <div class="cl">&nbsp;</div>
              <ul>
                  <?php
                  while ($row=$result->fetch_assoc()) {
                  ?>
                  
                  <form method="post" action="workerlist.php">
                  <li>
                    <div class="image">
                      <a href="#"><img src="../Images/dp.png" alt="" /></a>
                    </div>
                    <p>
                      Name: <span><?php echo $row['firstname']?></span><br/>
                      Phone : <span><?php echo $row['phone']?></span><br />
                      Charges : <span><?php echo $row['charges']?></span><br />
                      <input type="hidden" name="name" value="<?php echo $row['firstname']; ?>"/>
                    </p>
                    <input type="button" class="submit" name="submit"  value="CHOOSE" style="float: center; background-color: dodgerblue;
                    color:white;padding: 10px 16px;width: 100%;border-radius: 15px;" onclick="window.location.href='../HTML/bookingConfirm.html'">
                  </li>
                  </form>
                  
                  <?php 
                  }
                  //from here t
                  if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
                    $name = $_POST['name'];
                    $conn->query("insert into picked(name) values ('$name')");
                    //echo '<script>window.location.assign(\'../HTML/confirm.html\');</script>';
                  }
                  //till here the above code should be in the php page which you want after clicking on choose you have to do $_POST['name'] for hidden type input on line 95.
                  ?>
              </ul>
              <div class="cl">&nbsp;</div>
            </div>
          </div>
        </div>

</div>

<!-- footer-->
<div class="wrapper row3">
  <div class="footer" style="font-size:18px;">
    © Webception · 2018
  </div>
</div>

</body>
</html>
