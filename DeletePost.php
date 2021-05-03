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
    <title>Lab10: Delete Posts</title>
</head>

<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "josieharding", "Tohng7ai", "josieharding");

if($mysqli->connect_errno){
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$toDelete = $_POST["post_id"];
$query = "SELECT post_id, content, author_id FROM Posts";
$result = $mysqli->query($query);

echo '<body><h2>Posts removed: <br>';
echo '<table><tr><th>Post id</th><th>Post Content</th></tr>';
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $rm = $_POST[$row["post_id"]];
        if($rm == "on"){
            $query = "DELETE FROM Posts WHERE post_id='" .$row["post_id"]. "'";
            $rmd = $mysqli->query($query);
            echo '<tr><td>' .$row["post_id"]. '</td><td>' .$row["content"]. '</td></tr>';
        }
    }
}
echo '</table></body>';

$mysqli->close();
?>