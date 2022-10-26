<!DOCTYPE html>
<html>
<head>
<title> My first page</title>
</head>
<body>
<?php
include 'connect.php';

$sql = "SELECT ID, firstname, lastname, email FROM users";
$result = $mysqli->query ($sql);
if ($result){
if ($result->num_rows > 0){
        echo "<tables>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Firstname</th>";
    echo "<th>Surname</th>";
    echo "<th>Email</th>";
    echo "<tr>";
    while ($row = $result -> fetch_assoc())
    {
        //output of data in each row
        echo "<tr>";
        echo "<td>".$row['ID']."</td>";
        echo "<td>".$row['firstname']."</td>";
        echo "<td>".$row['lastname']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "</tr>";
    }
     echo "</table>";
} else{
    echo "<p> 0 results </p>";
}
$result ->close();
$mysqli -> close();
}
?>

</body>
</html>