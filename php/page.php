<?php

function connection_DB($dbname){
        $servername = "basidati";
        $username = "ebicego";
        $password = "ofFX0oe2";

// Create connection
$conn = mysql_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}
else
    echo "<p>Connected successfully</p>";

mysql_select_db($dbname);

return $conn;

};



function page_start($title){
        echo "<html><body>";
        echo "<h1> $title </h1>";
};

function subtitle($str){
        echo "<p>$str</p>";
};

function back($url){
        echo "<a href=\" $url \"> back </a>";
};

function page_end(){
        echo "</body></html>";
};

?>
