<?php
$server = "dbip:serverport";
$username = "dbusername";
$password = "dbpassword";
$dbname = "dbname";

$templates = glob('/directory/to/templates/*.php');

// Create connection
$conn = mysqli_connect($server, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

foreach ($templates as $file) {
    $testingpath = "page-templates/" . basename($file);

    $sql = "SELECT post_id FROM wp_postmeta WHERE meta_value = '" . $testingpath . "'";
    $result = $conn->query($sql);
    $id = -1;
    $content = file_get_contents($file);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $id = $row["post_id"];
        }
        $changetodefault = "UPDATE wp_postmeta SET meta_value='default' WHERE post_id =" . $id . " AND meta_key = '_wp_page_template' ";

        if ($conn->query($changetodefault) === true) {
            echo "\n". basename($file) . " template changed to default\n";
        } else {
            echo "Error updating record: " . $conn->error;
        }

        $changecontent = "UPDATE wp_posts SET post_content='" . $content . "' WHERE ID = " . $id . " AND post_status='publish'";
        if ($conn->query($changecontent) === true) {
            echo "\n". basename($file) . " content placed in page\n";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "\n". basename($file) . " is not being used as a template for a page.\n";
    }
}
$conn->close();
?>
