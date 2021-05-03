<style>
    body{
        background-color: #a2b29f;
        padding: 100px;
    }

    table{
        border: black solid 5px;
        padding: 30px;
        font-size: 20px;
        border-collapse: collapse;

    }

    th, td{
        border: 1px solid black;
        padding: 10px;
    }
</style>
<head>
    <title>Lab10: View Users Posts</title>
</head>

<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "josieharding", "Tohng7ai", "josieharding");

if($mysqli->connect_errno){
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$name = $_POST["user"];
$posts = "SELECT content FROM Posts WHERE author_id='$name'";
$result = $mysqli->query($posts);

echo '<body><table><tr><td><h2>' .$name."'s Posts: </h2></td></tr>";
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo '<tr><td>' .$row["content"]. '</td></tr>';
    }
}
echo '</table></body>';

$mysqli->close();
?>