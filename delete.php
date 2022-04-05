<?php
$link = "http://$_SERVER[HTTP_HOST]";
include_once('connect.php');
if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
$id=$_GET['id'];
$sql = "DELETE FROM todos WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
echo "Xoá thành công!";
echo "<a href='".$link."/baitap/index.php'>Back to index </a>";
} else {
echo "Error updating record: " . $conn->error;
}
$conn->close();
}
?>