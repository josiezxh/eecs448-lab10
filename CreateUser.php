<style> <?php include 'style.css'; ?> </style>
<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "josieharding", "Tohng7ai", "josieharding");

if($mysqli->connect_errno){
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}


        $name = $_POST["name"];
        $users = "SELECT * FROM Users WHERE user_id='$name'";

        if($name == "")
        {
            echo '<h2>No username entered, try again.</h2>';
            exit();
        }
        else{
            $query = "INSERT INTO  Users (user_id) VALUES ('" . $name . "')";

            if($result = $mysqli->query($query)){
                echo '<body class="checkout" style="background-color: #C8A2C8;"><div>HELLO <b>' . $name . "</b>!!!!!!!!!!!!!!!<br>";
                echo "your account was saved in the system!!<br></div>";
                echo '<img class="checkout" src="https://media3.giphy.com/media/3ndAvMC5LFPNMCzq7m/giphy.webp?cid=ecf05e47fp0de0v3vdr5i4gd17b8179c2p8jcnc4m1lo4vk0&rid=giphy.webp&ct=g"></img>';
                echo '</body>';
            }
            else{
                echo '<body class="checkout" style="background-color: #C8A2C8;">';
            echo "<div>User <b>" . $name . "</b> already exists, try again.<br></div>";
            echo '<img class="checkout" src="https://i.giphy.com/media/51Uiuy5QBZNkoF3b2Z/200w.webp"></img>';
            echo '</body>';
            }
        }
    

    $mysqli->close();
?>