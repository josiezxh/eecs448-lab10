<style> <?php include 'style.css'; ?> </style>
<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "josieharding", "Tohng7ai", "josieharding");

if($mysqli->connect_errno){
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}


$name = $_POST["name"];
$text = $_POST["postContent"];
$users = "SELECT user_id FROM Users";
$haveUser = false;
$result = $mysqli->query($users);

if($name == "")
{
    echo '<h2>No username entered, try again.</h2>';
    exit();
}
if($text == "")
{
    echo '<h2>No post content entered, try again.</h2>';
    exit();
}

if($result->num_rows > 0){
    while($row = $result->fetch_assoc())
    {
        if($name == $row["user_id"])
        {
            $haveUser = true;
            break;
        }
    }
}


if($haveUser == false)
{
    echo '<body class="checkout" style="background-color: #C8A2C8;">';
    echo "<div>User <b>" . $name . "</b> doesn't exists, try again.<br></div>";
    echo '<img class="checkout" src="https://media.giphy.com/media/KPgOYtIRnFOOk/source.gif"></img>';
    echo '</body>';
    exit();
}

$query = "INSERT INTO Posts (content, author_id) VALUES ('" . $text . "', '" . $name . "')";
if($result = $mysqli->query($query)){
    echo '<body class="checkout" style="background-color: #C8A2C8;"><div>';
    echo "Posted!<br></div>";
    echo '<img class="checkout" src="https://media.giphy.com/media/R8s2pWPslY0dG/source.gif"></img>';
    echo '</body>';
}   

$mysqli->close();
?>