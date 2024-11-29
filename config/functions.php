<?php
// query
function queryF($sql) {
  global $link;
  $query = mysqli_query($link, $sql);
  return $query;
}
// upload files
function upload($source, $allowed, $destination) {
  $namaFile = $_FILES[$source]['name'];
  $tmp = $_FILES[$source]['tmp_name'];
  $error = $_FILES[$source]['error'];

  if($error === 4) {
    echo '<script>alert("Pilih foto terlebih dahulu!");</script>';
    return false;
  }

  $ekstensiValid = $allowed;
  $ekstensi = explode('.', $namaFile);
  $ekstensi = strtolower(end($ekstensi));

  if(!in_array($ekstensi, $ekstensiValid)) {
    echo '<script>alert("Ekstensi file tidak valid!");</script>';
    return false;
  }

  move_uploaded_file($tmp, $destination . $namaFile);

  return $namaFile;
}

// get total data
function getTotal($link, $table) {
    return mysqli_num_rows(mysqli_query($link, "SELECT * FROM $table"));
}
// random string for transaction id
function crTrId($length) {
  $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
  return substr(str_shuffle($str_result), 0, $length);
}
// limit
function PHPEL($text, $length) {
  if(strlen($text)<=$length) {
    echo $text;
  } else {
    $more = substr($text,0,$length) . '...';
    echo $more;
  }
}
?>