<!DOCTYPE html>
<html>

<head>
    <title>Editing MySQL Data</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php
        $link = "http://$_SERVER[HTTP_HOST]";
        include 'connect.php';
    ?>
    <form method="POST" class="form">
        <h2>add </h2>
        <label>title: <input type="text" value="" name="title"></label><br />
        <label>content: <input type="text" value="" name="content"></label><br />
        <input type="submit" value="add" name="add_todos">
        <?php

    if (isset($_POST['add_todos'])){
        $title= strip_tags($_POST['title']);
        $content= strip_tags($_POST['content']);
        
        // Create connection
        $conn = new mysqli("localhost", "root", "", "baitap");
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        $sql = "INSERT INTO `todos`(`id`,`title`,`content`,`add_date`) VALUES(NULL,'".$title."','".$content."','".date("Y-m-d H:i:s")."')";
        // var_dump($sql);
        // exit();
        if ($conn->query($sql) === TRUE) {
            echo "Record add successfully";
            echo "<a href='".$link."/baitap/index.php'>Back to index </a>";
        } else {
        echo "Error add record: " . $conn->error;
        }
        $conn->close();
        }
    ?>
    </form>
</body>

</html>