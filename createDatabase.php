<?php
    $conn = mysqli_connect('localhost', 'root', '');
    
    if (!$conn) {
        die("Kết nối thất bại: " . mysqli_connect_error());
    }
    
    $sql = "CREATE DATABASE baitap";
    

    if (mysqli_query($conn, $sql)) {
        echo "Tạo database thành công";
    } else {
        echo "Tạo database thất bại: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);