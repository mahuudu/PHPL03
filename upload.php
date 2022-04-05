<?php
  
  if ($_SERVER['REQUEST_METHOD'] !== 'POST'){
      echo "Phải Post dữ liệu";
      die;
  }

  if (!isset($_FILES["fileupload"]))
  {
      echo "Dữ liệu không đúng cấu trúc";
      die;
  }

  
  if ($_FILES["fileupload"]['error'] != 0)
  {
    echo "Dữ liệu upload bị lỗi";
    die;
  }

  if(!isset($_POST['info'])){
    echo "Nhập info";
    die;
  }

  $content = $_POST['info'];

  $target_dir    = "uploads/";

  $target_file   = $target_dir . basename($_FILES["fileupload"]["name"]);

  $allowUpload   = true;

  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


  $maxfilesize   = 800000;

  $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');

  date_default_timezone_set('Asia/Ho_Chi_Minh');



  if(isset($_POST["submit"])) {

    $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
      if($check !== false)
      {
          echo "Đây là file ảnh - " . $check["mime"] . ". \n";
          $allowUpload = true;
      }
      else
      {
          echo "Không phải file ảnh.";
          $allowUpload = false;
      }
  }

  if (file_exists($target_file))
  {
      echo "Tên file đã tồn tại trên server, không được ghi đè \n";
      $allowUpload = false;
      die;
  }

  if ($_FILES["fileupload"]["size"] > $maxfilesize)
  {
      echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
      $allowUpload = false;
  }


  if (!in_array($imageFileType,$allowtypes ))
  {
      echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
      $allowUpload = false;
  }

  if(empty($content)){
    echo "Dữ liệu info trống";
    die;
  }else{
    $filename = 'hello.txt';
    $date = date( 'Y-m-d H:i:s', strtotime( 'now' ) );
    $log = $content . ' - log on time : ' . $date . "\r\n";

    if (is_writable($filename)) {
        if (!$file= fopen($filename, 'a+')) {
            echo "Cannot open file ($filename)";
            die;
        }
        if (fwrite($file, $log) === FALSE) {
             echo "Không thể viết file ($filename)";
            die;
        }
        echo "Ghi thành công. Đã ghi nội dung ($log) vào file ($filename)";
        
        fclose($file);
        } else {
            echo "The file $filename is not writable";
        }
  }

  if ($allowUpload)
  {
      if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file))
      {
          echo "File ". basename( $_FILES["fileupload"]["name"]).
          " Đã upload thành công.";

          echo "File lưu tại " . $target_file;

      }
      else
      {
          echo "Có lỗi xảy ra khi upload file.";
      }
  }
  else
  {
      echo "Không upload được file, có thể do file lớn, kiểu file không đúng ...";
  }


?>