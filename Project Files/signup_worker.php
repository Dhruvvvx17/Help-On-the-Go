<?php
    // obatining all fields from the form
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $phone = $_POST['phone'];
    $email = $_POST['Email'];
    $username = $_POST['username'];
    $pw = $_POST['password'];
    $addr = $_POST['address'];   
    $pw2 = $_POST['confirmPassword'];


    // To check the form details once php script loads
    echo $firstname;
    echo "<br>";
    echo $lastname;
    echo "<br>";
    echo $email;
    echo "<br>";
    echo $phone;
    echo "<br>";
    echo $addr;
    echo "<br>";
    echo $username;
    echo "<br>";
    echo $pw;
    echo "<br>";
    echo $pw2;
    echo "<br>";

    
    // Steps to run this php code:
    // 1.Turn on MYSQL through xampp server.
    // 2.Create a database called 'testdb'
    // 3.Create a table called 'usersignup'
    // 4.Run the 'signup_user.html' file on browser to fill the user signup form.

    // database constructs
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "testdb";

    // create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if(mysqli_connect_error()){
        die('Connect Error ('. mysqli_connect_error().')'. mysqli_connect_error());
    }
    else{
        echo "<br>Connected<br>";
        $SELECT = "SELECT email From usersignup Where email = ? Limit 1";
        $INSERT = "INSERT Into usersignup (firstname,lastname,email,phone,address,username,password) values(?,?,?,?,?,?,?)";    
    }
    
    // Prepare statement
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();

    $rnum = $stmt->num_rows;

    if($rnum==0){
        $stmt->close();

        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("sssisss",$firstname,$lastname,$email,$phone,$addr,$username,$pw);
        $stmt->execute();
        echo "New Record inserted successfully";
    }
    else{
        echo "Email ID already registered";
    }

    $stmt->close();
    $conn->close();
?>