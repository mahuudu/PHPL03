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
        $id=$_GET['id'];
        $stmt = $conn->prepare('SELECT * FROM todos WHERE id = ?');
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row=$result->fetch_assoc();
    ?>
    <form method="POST" class="form">
        <h2>Sửa </h2>
        <label>title: <input type="text" value="<?php echo $row['title']; ?>" name="title"></label><br />
        <label>content: <input type="text" value="<?php echo $row['content']; ?>" name="content"></label><br />
        <input type="submit" value="Update" name="update_todos">
    <?php

    if (isset($_POST['update_todos'])){
        $id=$_GET['id'];
        $title= strip_tags($_POST['title']);
        $content= strip_tags($_POST['content']);
        
        // Create connection
        $conn = new mysqli("localhost", "root", "", "baitap");
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        $sql = "UPDATE `todos` SET title='$title', content='$content' WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            echo "<a href='".$link."/baitap/index.php'>Back to index </a>";
        } else {
        echo "Error updating record: " . $conn->error;
        }
        $conn->close();
        }
    ?>
        </form>
    </body>

</html>