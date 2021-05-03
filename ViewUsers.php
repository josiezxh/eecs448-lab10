<style>
    body{
        background-color: #a2b29f;
        padding: 100px;
    }

    table{
        border: black solid 5px;
        padding: 25px;
        font-size: 20px;

    }
</style>
<head>
    <title>Lab10: View Users</title>
</head>

<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "josieharding", "Tohng7ai", "josieharding");

if($mysqli->connect_errno){
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}


$users = "SELECT user_id FROM Users";
$result = $mysqli->query($users);

echo '<body><table><tr><td><h2>Users: </h2></td></tr>';
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "<tr><td>" .$row["user_id"]. "</td></tr>";
    }
}
echo '</table></body>';

$mysqli->close();
?>