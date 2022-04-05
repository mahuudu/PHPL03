<table border="1">
    <tr>
        <td>ID</td>
        <td>title</td>
        <td>content</td>
        <td> time</td>
        <td> Edit </td>
        <td> Delete </td>
    </tr>
    <?php
        require 'connect.php';
        $query=mysqli_query($conn,"select * from `todos`");
        while($row=mysqli_fetch_array($query)){
    ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['title']; ?></td>
        <td><?php echo $row['content']; ?></td>
        <td><?php echo $row['add_date']; ?></td>
        <td><a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a></td>
        <td><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
    </tr>
    <?php
    }
?>
</table>
<a href="http://localhost:8000/baitap/add.php"> Add new </a>