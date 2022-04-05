<?php
    $conn = new mysqli('localhost', 'root', '', 'baitap');

    if ($conn->connect_error) {
        die("Kết nối không thành công: " . $conn->connect_error);
    } 
    
    $sql = "CREATE TABLE Todos (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(30) NOT NULL,
        content TEXT,
        add_date TIMESTAMP
    )";
    

    if ($conn->query($sql) === TRUE) {
        echo "Tạo table thành công";
    } else {
        echo "Tạo table thất bại: " . $conn->error;
    }
    
    $conn->close();

?>