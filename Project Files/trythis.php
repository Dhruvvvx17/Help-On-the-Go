<!DOCTYPE html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>
<?php
$sql = "SELECT name, age, pwt FROM details";
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
    <a class="active" href="#Home">Home</a>
    <a href="homepage-final.html">Sign Out</a>
    <a href="#about">About</a>
  </div>
</div>
<!-- content -->
<br>
<br>
<div class="wrapper row2">
  <h1 align="center"><font color=white>CHOOSE  WORKER</font></h1>
  <br>
  <br>
  <div id="container">
        
        <div class="tabbed">
  <div class="tab-content" style="display:block;">
            <div class="items">
              <div class="cl">&nbsp;</div>
              <ul>
                  <?php
                  while ($row=$result->fetch_assoc()) {
                  ?>
                  
                  <form method="post" action="trythis.php">
                  <li>
                    <div class="image">
                      <a href="#"><img src="css/images/dp.png" alt="" /></a>
                    </div>
                    <p>
                      NAME: <span><?php echo $row['name']?></span><br />
                      AGE : <span><?php echo $row['age']?></span><br />
                      <input type="hidden" name="name" value="<?php echo $row['name']; ?>"/>
                    </p>
                    <input class="submit" name="submit" type="submit" value="CHOOSE">
                  </li>
                  </form>
                  
                  <?php 
                  }
                  //from here t
                  if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
                    $name = $_POST['name'];
                    $conn->query("insert into picked(name) values ('$name')");
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
