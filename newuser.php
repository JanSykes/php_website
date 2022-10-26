<?php
if ($_SERVER ['REQUEST_METHOD']== 'POST')
{
include 'connect.php';

if(!isset( $_POST['submit'] )){
    echo"<p>ERROR form was not submitted</p>";

}
else{
    $sql = "insert into users (firstname, lastname, email, password) values(
        '".$_POST['fname']."','".$_POST['lname']."','".$_POST['email']."','"
        .$_POST['pass']."')";

        if(!$mysqli->query($sql)){
            echo "Error: ".$mysqli->error;
        }
        else{
            echo "success";

        }
        $mysqli->close();
    
}
}
else{
?>
<!DOCTYPE html>
<html>
<head>
<title> Add User</title>
</head>
<body>
<H1>Add Record</H1>
<form action="newuser.php" method="post">
    Firstname: <input type="text" id="fname" name="fname"/>
    Surname: <input type="text" id="lname" name="lname"/>
    Email: <input type="text" id="email" name="email"/>
    Password: <input type="text" id="pass" name="pass"/>
    <input type="submit" id="submit" name="submit" value="submit"/>

</form>
</body>
</html>
<?php
}
?>
