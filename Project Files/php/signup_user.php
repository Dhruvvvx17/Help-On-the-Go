<?php
    // obatining all fields from the form
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
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
    echo"<br>";
    echo getcwd();
    echo"<br>";

//-------------------------------- 
    require ("../phpmailertest/class.phpmailer.php");

    $mail = new PHPMailer;

    $mail->isSMTP();                            // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                     // Enable SMTP authentication
    $mail->Username = 'help.onthego1@gmail.com';          // SMTP username
    $mail->Password = '$password@123'; // SMTP password
    $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                          // TCP port to connect to

    $mail->setFrom('help.onthego1@gmail.com', 'HelpOnTheGo');
    $mail->addReplyTo('help.onthego1@gmail.com', 'HelpOnTheGo');
    $mail->addAddress("$email");   // Add a recipient
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    $mail->isHTML(true);  // Set email format to HTML

    $bodyContent = '<h1>Account Verification Mail from Help On The Go</h1>';
    $bodyContent .= '<p>Thank you for using <b>Help On The Go</b> Your account has been verified and you can start using our services.<br> For any feedback or query please contact us on: help.onthego1@gmail.com </p>';

    $mail->Subject = 'Help On The Go Account Confirmation';
    $mail->Body    = $bodyContent;

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
// ----------------------------

    $stmt->close();
    $conn->close();

    echo '<script>window.location.assign(\'../HTML/accConfirm.html\');</script>'
?>