<!DOCTYPE html>
<html>
<head>
<title>Edit Records</title>
</head>
<body>
<?php

include 'connect.php';

if(!isset($_POST['submit'] ))

{
    //echo "Not successfful";

}
else{
   // echo "Successful";
}

$updatequery ="UPDATE users SET firstname=?, lastname=?, email=?, password=? WHERE id=?";
$stmt = $mysqli->prepare ($updatequery);
$stmt->bind_param('sssss', $_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['pass'], $_GET['id']);



if (!$stmt->execute()) {
    echo "Error: ".$mysqli->error;
}
else{
    echo "Record updated successfully";
    echo "back";
}
$mysqli->close();

$populatequery ="SELECT * from users WHERE ID ='".$_GET['id']."'";
$result=$stmt->prepare ($populatequery);
if($result){
    if($result->num_rows> 0 ){
        while($row = $result -> fetch_assoc())
        {
            $fn=$row['firstname'];
            $ln=$row['lastname'];
            $em=$row['email'];
            $pw=$row['password'];
        }
    }
?>
<h1> Edit Record: </h1>
<form action= "edit.php?id=<?php echo $_GET['id']; ?>" method= "post">

<label for="fname"> Firstname: </label>
<input type = "text" id="fname" name="fname" value="<?php echo "$fn"; ?>"/><br>

<label for="lname"> Lastname: </label>
<input type = "text" id="lname" name="lname" value="<?php echo "$ln"; ?>"/><br>

<label for="email"> Email: </label>
<input type = "text" id="email" name="email" value="<?php echo "$em"; ?>"/><br>

<label for="password"> Password: </label>
<input type = "text" id="pass" name="pass" value="<?php echo "$pw"; ?>"/><br>

<input type="submit" id="submit" name="submit" value="submit"/>

</form>
</body>
</html>
<?php
}
?>